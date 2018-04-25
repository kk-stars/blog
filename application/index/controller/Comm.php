<?php
namespace app\index\controller;
use think\Controller;
use think\Cookie;
use think\Request;

class Comm extends Controller{


    public function _initialize(){

        //网站配置
        $config = db('config') -> limit('1') -> find();
        $this->assign('conf',$config);
            //判断是否关闭网站
            if($config['close'] === 1){
                $this->close();
            }


        $cate = db('cate') -> where('status',1) -> select();
        $this->assign('cate',$cate);

        //关于我
        $about = db('aboutme') -> where('meId',1) -> find();
        //$about['tags'] = explode('|', $about['tags']);
        $about['lifeSentence'] = explode('|', $about['lifeSentence']);
        $about['birthDate'] = date('Y-m-d',strtotime($about['birthDate']));
        //dump($about['likeSentence'][0]);die;
        $this->assign('about',$about);

        $ip = Request::instance() -> ip(); // 获取用户IP地址
        $res = explode('.', $ip);
        for($i = 0;$i < count($res);$i++){
            static $num = '';
            $num .= $res[$i];
        }

        if(!isset($_COOKIE['ip_'.$num])){
            cookie('ip_'.$num,$ip);
            db('config') -> where('id',1) -> setInc('visit');
        }else{}

        $this -> heatArticles();

        $this -> newArticles();

        $this -> praiseArticles();

        $this -> friendshiplink();

        $this -> tags();

        $this -> message();

        $this -> cate();

    }

    //热门文章
    public function heatArticles(){
        $heat = db('article') -> where('status',1) -> order('articleClicks desc') -> limit(5) -> select();
        $this -> assign('heatArticles',$heat);
    }

    //最新文章
    public function newArticles(){
        $new = db('article') -> where('status',1) -> order('addTime desc') -> limit(5) -> select();
        $this -> assign('newArticles',$new);

    }

    //点赞排名
    public function praiseArticles(){
        $praise = db('article') -> where('status',1) -> order('praiseClicks desc') -> limit(5) -> select();
        $this -> assign('praiseArticles',$praise);

    }

    //友情链接
    public function friendshiplink(){
        $friendshiplink = db('friendshiplink') -> where('status',1) -> select();
        $this -> assign('friendshiplink',$friendshiplink);

    }

    //标签
   /*  public function tags(){
        $tags = db('tag') -> where('status',1) -> select();
        $this -> assign('tags',$tags);

    } */

    public function tags(){

        //$tag = db('article') -> where('status',1) -> field('articleTags') -> select();
        $tag = db('article') -> where('status',1) -> distinct('articleTags') -> field('articleTags') -> select();
        foreach($tag as $k => $v){
            $tags[] = implode('', $tag[$k]);
        }
        foreach($tags as $k2 => $v2){
            $tagss[] = explode('|', $tags[$k2]);
        }
        foreach($tagss as $k3 => $v3){
            foreach($v3 as $k4 => $v4){
                $tagsss[] = $v4;
            }
        }
        $this->assign('tags',$tagsss);
    }

    //留言
    public function message(){
        $message = db('message') -> alias('m') -> join('user u','u.userId = m.messageAtor') -> where('m.status',1) -> field('m.*,u.userName') -> limit(5) -> select();
        $this -> assign('message',$message);

    }

    //点赞
    public function Praise(){

        $praise = input('post.');

        if ($praise != null) {
            $apnum = db('article') -> where('articleId',$praise['aid']) -> field('praiseClicks,articleId') -> find();
            $pnum = $apnum['praiseClicks'];
            $puid = $praise['puser'];

            if( !isset( $_COOKIE['cpuser_'.$puid.'_'.$apnum['articleId']] ) ){
                //如果没有设置 cookie【‘cpuser’】，说明此用户第一次点赞， 那么点赞
                $pnum = $pnum + 1;//点赞数加一   点赞
                db('article') -> where('articleId',$praise['aid']) -> update(['praiseClicks' => $pnum]);
                Cookie::set('cpuser_'.$puid.'_'.$apnum['articleId'],$puid.'_'.$apnum['articleId']);//将用户id存放入cookie里，用来验证用户登录点赞的唯一性

                $info = array('code' => 1,'message' => '点赞','pnum' => $pnum);

            }elseif( $_COOKIE['cpuser_'.$puid.'_'.$apnum['articleId']]  ==  $puid.'_'.$apnum['articleId'] ){
                //如果cookie里面保存的用户id 等于    前台提交过来的用户id，就说明此用户已点过赞
                $pnum = $pnum - 1;//点赞数减一  取消赞
                db('article') -> where('articleId',$praise['aid']) -> update(['praiseClicks' => $pnum]);
                Cookie::delete( 'cpuser_'.$puid.'_'.$apnum['articleId'] );//取消赞后，将此用户id从cookie中删除

                $info = array('code' => 0,'message' => '取消','pnum' => $pnum);

            }else{
                $info = array('code' => -1,'message' => '未知错误');
            }
        }else{
            $info = array('code' => -2,'message' => '数据错误');
        }

        echo json_encode($info);die;

    }

    public function cate(){
        $cate = db('cate') -> where('status',1) -> select();
        $this->assign('cate',$cate);
    }


}
?>