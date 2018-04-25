<?php
namespace app\admin\controller;

class Message extends Comm{
    public function message()
    {
        $message = db('message') -> alias('m') -> join('user u','u.userId = m.messageAtor') -> field('m.*,u.userName') -> where('m.status','1') -> paginate(18);
        $mCount = db('message') -> where('status','1') -> count();
        $this->assign('message',$message);
        $this->assign('mCount',$mCount);
        return view();
    }


    public function seeMessage()
    {
        $messageId = $_POST['messageId'];
        //$messageId = input('messageId');
        $result = db('message') -> alias('m') -> join('user u','u.userId = m.messageAtor') -> field('m.*,u.userName') -> where('m.messageId',$messageId) -> find();
        //dump($result);die;
        if($result){
            $info = array('code' => '1','message' => $result);
        }else{
            $info = array('code' => '0','message' => '数据查询错误!');
        }
        echo json_encode($info);die;
        return view();
    }


    public function delMessage()
    {
        $messageId = input('messageId');
        $result = db('message') -> where('messageId',$messageId) -> delete();
        if($result){
            $info = array('code' => '1','message' => '数据删除成功!');
        }else{
            $info = array('code' => '0','message' => '数据删除错误!');
        }
        echo json_encode($info);die;
        return view();
    }
}
