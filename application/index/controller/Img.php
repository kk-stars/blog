<?php
namespace app\index\controller;
use think\Controller;

class Img extends Comm{
    public function img(){
        return view();
    }

    public function flow(){

        $ipage = isset($_GET['ipage']) ? $_GET['ipage'] : 1 ;
        $idata = db('imgs') -> where('status','1') -> paginate(20,true,['page' => $ipage]);
        //paginate（$listRows  ，  $simple ， $config ） $simple 是否简洁模式或者总记录数   需要填true 否则  始终只查询得到第一页的数据

        echo json_encode($idata);die;
    }
}
