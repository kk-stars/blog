<?php
namespace app\admin\controller;

class Flink extends Comm{
    public function flink()
    {
        $flink = db('friendshiplink') -> where('status','1') -> paginate(15);
        $this->assign('fl',$flink);
        return view();
    }
}
