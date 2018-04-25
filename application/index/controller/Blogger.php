<?php
namespace app\index\controller;
use think\Controller;

class Blogger extends Comm{
    public function blogger(){
//         $about = db('aboutme')  -> where('meId',1) -> find();
//         $about['birthDate'] = date('Y-m-d',strtotime($about['birthDate']));
//         $this->assign('aboutme',$about);

        $message = db('message') -> alias('m') -> join('user u','u.userId = m.messageAtor') -> where('m.status',1) -> field('m.*,u.userName') -> limit(5) -> select();
        $this -> assign('message',$message);
        return view();
    }
}
