<?php
namespace app\admin\model;
use think\Model;

class UserLog extends Model{

    public function operation($op){
        //操作：1为登录，2为注册，3为修改密码，4为留言操作 ，5为评论操作，6为其它操作
        if($op === 1){
            $op = '登陆';
        }else if($op === 2){
            $op = '注册';
        }else if($op === 3){
            $op = '修改密码';
        }else if($op === 4){
            $op = '留言操作 ';
        }else if($op === 5){
            $op = '评论操作';
        }else{
            $op = '其它操作';
        }

        return $op;
    }

    //添加日志（操作代表数，用户id，信息，IP地址）
    public function log($op,$uid,$info,$ip,$opStatus){

        $op = $this->operation($op);

        $data['uid'] = $uid;
        $data['operation'] = $op;
        $data['operationStatus'] = $opStatus;
        $data['info'] = $info;
        $data['IP'] = $ip;

        $info = db('userlog') -> insert($data);//添加日志
    }

    public function loginInfo($Name,$num){
        //判断用户使用    2：手机号码    登录还是使用   1：用户名    登录
        if($num === 1){
            db('user') -> where('userName',$Name) -> update(['lastLoginTime' => date("Y-m-d H:i:s")]);/* 保存登录时间  */
            db('user') -> where('userName',$Name) -> setInc('numberOfLogin');/* 登录成功后登录次数加  1   */
        }else{
            db('user') -> where('contactNumber',$Name) -> update(['lastLoginTime' => date("Y-m-d H:i:s")]);/* 保存登录时间  */
            db('user') -> where('contactNumber',$Name) -> setInc('numberOfLogin');/* 登录成功后登录次数加  1   */
        }

    }
}

?>