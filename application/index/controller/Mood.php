<?php
namespace app\index\controller;
use think\Controller;

class Mood extends Comm{
    public function mood(){
        $mood = db('mood')  -> where('status',1) -> select();
        foreach($mood as $k => $v){
            $mood[$k]['day'] = date('\'d',strtotime($mood[$k]['addTime']));
        }
        $this->assign('mood',$mood);

        return view();
    }
}
