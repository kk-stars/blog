<?php
namespace app\admin\controller;

class Comment extends Comm{
    public function comment()
    {
        $comment = db('comment') -> alias('c') -> join('article a','c.commentArticleid = a.articleId') -> join('user u','c.commentAtor = u.userId') -> field('c.*,a.articleTitle,u.userName') -> order('c.commentId asc') -> where('c.status','1') -> paginate(18);
        $this->assign('comment',$comment);
        return view();
    }


    public function seeComment()
    {
        $commentId = $_POST['commentId'];
        //$commentId = input('commentId');
        $result = db('comment') -> alias('c') -> join('article a','c.commentArticleid = a.articleId') -> join('user u','c.commentAtor = u.userId') -> field('c.*,a.articleTitle,u.userName') -> where('c.commentId',$commentId) -> find();
        //dump($result);die;
        if($result){
            $info = array('code' => '1','message' => $result);
        }else{
            $info = array('code' => '0','message' => '数据查询错误!');
        }
        echo json_encode($info);die;
        return view();
    }


    public function delComment()
    {
        $commentId = input('commentId');
        $result = db('comment') -> where('commentId',$commentId) -> delete();
        if($result){
            $info = array('code' => '1','message' => '数据删除成功!');
        }else{
            $info = array('code' => '0','message' => '数据删除错误!');
        }
        echo json_encode($info);die;
        return view();
    }
}
