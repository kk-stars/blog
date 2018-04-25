<?php
namespace app\admin\controller;

class Notice extends Comm{
    public function notice()
    {
        $notices = db('notice') -> where('status','1') -> paginate(15);
        $count = db('notice') -> where('status','1') -> count();
        $this->assign('count',$count);
        $this->assign('notice',$notices);
        return view();
    }

    public function noticeRecovery()
    {
        $notices = db('notice') -> where('status','0') -> paginate(15);
        $count = db('notice') -> where('status','0') -> count();
        $this->assign('count',$count);
        $this->assign('notice',$notices);
        return view();
    }

    public function noticeDel(){
        $noticeId = input('noticeId');
        $result = db('notice') -> where('noticeId',$noticeId) -> update(['status' => '0']);
        if($result){
            $info = array('code' => 1,'message' => '公告删除成功!');
//             $this->success('公告删除成功!正在跳转……',url('notice/notice'));
        }else{
            $info = array('code' => 0,'message' => '公告删除错误!');
//             $this->error('公告删除错误!');
        }
        echo json_encode($info);die;
    }

    public function noticeReduction(){
        $noticeId = input('noticeId');
        $result = db('notice') -> where('noticeId',$noticeId) -> update(['status' => '1']);
        if($result){
            $this->success('公告还原成功!正在跳转……',url('notice/notice'));
        }else{
            $this->error('公告还原错误!');
        }
    }

    public function noticeRecoveryDel(){
        $noticeId = input('noticeId');
        $result = db('notice') -> where('noticeId',$noticeId) -> delete();
        if($result){
            $info = array('code' => 1,'message' => '公告彻底删除成功!');
//             $this->success('公告彻底删除成功!正在跳转……',url('notice/notice'));
        }else{
            $info = array('code' => 0,'message' => '公告彻底删除错误!');
//             $this->error('公告彻底删除错误!');
        }
        echo json_encode($info);die;
    }
}
