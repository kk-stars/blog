<?php
namespace app\index\controller;
use think\Controller;

class Index extends Comm{
    public function index(){
        //轮播文章
        $slider = db('article') -> alias('a') -> join('user u','a.ator = u.userId') -> join('cate c','a.articleCate = c.cateId') -> field('a.*,u.userName,c.cateName,c.cateId') -> where(['a.status' => 1,'a.slider' => 1]) -> order('a.addTime asc')  -> limit('5') -> select();
        $this->assign('slider',$slider);

        return view();
    }

    //搜索结果
    public function search(){
        $keywords = input('k');
        if($keywords){
            //标题搜索
            $searchTitle = db('article') -> alias('a') -> join('user u','a.ator = u.userId') ->
            join('cate c','a.articleCate = c.cateId') ->
            field('a.*,u.userName,c.cateName') -> where('a.articleTitle','like','%'.$keywords.'%') -> select();

            //栏目搜索
            $searchCate = db('article') -> alias('a') -> join('user u','a.ator = u.userId') ->
            join('cate c','a.articleCate = c.cateId') ->
            field('a.*,u.userName,c.cateName') -> where('a.articleCate','like','%'.$keywords.'%') -> select();

            //内容搜索
            $searchContent = db('article') -> alias('a') -> join('user u','a.ator = u.userId') ->
            join('cate c','a.articleCate = c.cateId') ->
            field('a.*,u.userName,c.cateName') -> where('a.articleContent','like','%'.$keywords.'%') -> select();

            //作者搜索
            $searchUserName = db('article') -> alias('a') -> join('user u','a.ator = u.userId') ->
            join('cate c','a.articleCate = c.cateId') ->
            field('a.*,u.userName,c.cateName') -> where('u.username','like','%'.$keywords.'%') -> select();

            //描述搜索
            $searchDescription = db('article') -> alias('a') -> join('user u','a.ator = u.userId') ->
            join('cate c','a.articleCate = c.cateId') ->
            field('a.*,u.userName,c.cateName') -> where('a.articleDescription','like','%'.$keywords.'%') -> select();
        }

        if($searchTitle){
            $this->assign('search',$searchTitle);

        }elseif($searchCate){
            $this->assign('search',$searchCate);

        }elseif($searchContent){
            $this->assign('search',$searchContent);

        }elseif($searchUserName){
            $this->assign('search',$searchUserName);

        }elseif($searchDescription){
            $this->assign('search',$searchDescription);

        }else{
            $this->assign('search',null);
//             $info = array('code' => '0','message' => '无搜索结果');
//             echo json_encode($info);
        }
        $this->assign('keywords',$keywords);
        return view('search');
    }

    public function flow(){
            $getPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $aData = db('article') -> alias('a') -> join('user u','a.ator = u.userId') -> join('cate c','a.articleCate = c.cateId') -> field('a.*,u.userName,c.cateName,c.cateId') -> where('a.status',1) -> paginate(12,true,['page' => $getPage]);
            echo json_encode($aData);
    }

    public function indexArticle(){
        return view();
    }

    public function date(){
        return view();
    }

    public function time(){
        return view();
    }
}
