<?php
namespace app\admin\controller;

class Index extends Comm{

    public function index()
    {

        $Name = session('adminId');
        $numberOfLogin = db('admin') -> where('adminId',$Name) -> field('numberOfLogin') -> find();
        session('numberOfLogins',$numberOfLogin['numberOfLogin']);

        //获取访问者的浏览器
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $br = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/MSIE/i', $br)) {
                $br = 'MSIE';
            } else if (preg_match('/Firefox/i', $br)) {
                $br = 'Firefox';
            } else if (preg_match('/Chrome/i', $br)) {
                $br = 'Chrome';
            } else if (preg_match('/Safari/i', $br)) {
                $br = 'Safari';
            } else if (preg_match('/Opera/i', $br)) {
                $br = 'Opera';
            } else {
                $br = 'Other';
            }
            //return $br;
        } else {
            $br = 'unknow';
            //return $br;
        }
        session('browser',$br);
        return view();

    }

    public function time(){
        return view();
    }

    public function config(){

    }
}
