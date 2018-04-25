<?php
namespace app\index\controller;
use think\Controller;

class Article extends Comm{
    public function article(){
        $aid = input('aid');
        db('article') -> where('articleId',$aid) -> setInc('articleClicks');

        $comment = db('comment') ->alias('c') -> join('user u','u.userId = c.commentAtor') -> where(['c.status' => 1,'c.commentArticleid' => $aid]) -> order('addTime desc') -> field('c.*,u.userName') -> select();
        foreach($comment as $k => $v){
            $comment[$k]['addTime'] = date('Y年m月d日 H:i:s',strtotime($comment[$k]['addTime']));

            $uid = session('userId');
            if( !isset( $_COOKIE['cpuser_'.$uid.'_'.$comment[$k]['commentId']] ) ){
                $comment[$k]['praiseStatus'] = '0';
            }else{
                $comment[$k]['praiseStatus'] = '1';
            }
        }
        $this->assign('comment',$comment);


        $adata = db('article') -> alias('a') -> join('cate c','a.articleCate = c.cateId') -> join('user u','a.ator = u.userId') -> where('articleId',$aid) -> field('a.*,u.userName,c.cateName,c.cateId') -> find();

        if($adata !== null){
            $about = db('aboutme') -> where('meId',$adata['ator']) -> find();

            $date= strtotime($adata['addTime']);//strtotime() 函数将任何英文文本的日期或时间描述解析为 Unix 时间戳（自 January 1 1970 00:00:00 GMT 起的秒数）
            $adata['addTime'] = date("Y/m/d",$date);

            $adata['articleTags'] = explode('|', $adata['articleTags']);

            $down = db('article') -> where('articleCate',$adata['cateId']) -> where('articleId','>',$aid) -> order('articleId asc') -> field('articleId') -> find();//下一篇

            $up = db('article') -> where('articleCate',$adata['cateId']) -> where('articleId','<',$aid) -> order('articleId desc') -> field('articleId') -> find();//下一篇
            $upAid = $up['articleId'];
            $downAid = $down['articleId'];
            //$upUrl = "url('article/article',array('aid' => $up))";//下一篇地址

            //$downUrl = "url('article/article',array('aid' => $down))";//下一篇地址

            $uid = session('userId');
            if( !isset( $_COOKIE['cpuser_'.$uid.'_'.$aid] ) ){
                $adata['praiseStatus'] = '0';
            }else{
                $adata['praiseStatus'] = '1';
            }
            //dump($_COOKIE);die;

            //栏目最新
            $new = db('article') -> where(['status' => 1,'articleCate' => $adata['cateId']]) -> order('praiseClicks desc') -> limit(5) -> select();

            $click = input('clickAid');
            if($click){
                db('article') -> where('articleId',$click) -> setInc('articleClicks');
            }

            $this->assign([
                'ad'   => $adata,
                'am'   => $about,
                'upA'   => $upAid,
                'downA' => $downAid,
                'cateHeat' => $new,
                'aid'  => $aid
            ]);

        }

        if(request()->isPost()){
            $cm['commentAtor'] = session('userId');
            $cm['commentArticleid'] = input('aid');
            $cm['commentContent'] = strip_tags(input('commentContent'));

            if($cm['commentAtor'] !== null && $cm['commentArticleid'] !== null && $cm['commentContent'] !== null)
            {
                $result = db('comment') -> insert($cm);
                if($result){
                    $info = array('code' => 1,'message' => '评论成功');
                }else{
                    $info = array('code' => 0,'message' => '评论失败');
                }
            }else{
                $info = array('code' => -1,'message' => '评论失败','data' => $cm);
            }
            echo json_encode($info);die;
        }

        return view();
    }

    //文章
    public function artlist(){
        if(input('cid') !== null){
            //栏目文章列表
            $cateId = input('cid');
            $cName = db('cate') -> where('cateId',$cateId) -> field('cateName') -> find();

            $articles = db('article') -> alias('a') -> join('cate c','a.articleCate = c.cateId') -> join('user u','a.ator = u.userId') -> where(['a.articleCate' => $cateId,'a.status' => 1]) -> field('a.*,u.userName,c.cateName') -> order('addtime desc') -> paginate(13);

            $this -> assign([
                'cateName' => $cName['cateName'],
                'n'   => '1',
            ]);

        }else if(input('t') !== null){
            $tag = input('t');
            $articles = db('article') -> alias('a') -> join('user u','a.ator = u.userId') ->
            join('cate c','a.articleCate = c.cateId') ->
            field('a.*,u.userName,c.cateName') -> where('a.articleTags','like','%'.$tag.'%') -> order('addtime desc') -> paginate(13);
            $this -> assign([
                'tag' => $tag,
                'n'   => '2',
            ]);

        }else{
            $articles = db('article') -> alias('a') -> join('cate c','a.articleCate = c.cateId') -> join('user u','a.ator = u.userId') -> where('a.status',1) -> field('a.*,u.userName,c.cateName') -> order('addtime desc') -> paginate(13);
            $this->assign('n','0');

        }
        $this->assign('art',$articles);
        return view();
    }

    public function comment(){
        if(request()->isPost()){

        }
    }
}
