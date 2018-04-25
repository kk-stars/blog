<?php
namespace app\index\controller;
use think\Controller;

class Notice extends Comm{
    public function notice(){
        $notice = db('notice')  -> where('status',1) -> select();
        foreach($notice as $k => $v){
            $notice[$k]['day'] = date('\'d',strtotime($notice[$k]['addTime']));
        }
        $this->assign('notice',$notice);

        return view();
    }
}
