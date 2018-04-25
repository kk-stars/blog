<?php
namespace app\admin\model;
use think\Model;

class AdminLog extends Model{

    public function operation($op){
        //操作：1为登录，2为修改密码，3为删除操作，4为添加操作，5为修改操作， 6为其它操作
        if($op === 1){
            $op = '登陆';
        }else if($op === 2){
            $op = '修改密码';
        }else if($op === 3){
            $op = '删除操作';
        }else if($op === 4){
            $op = '添加操作';
        }else if($op === 5){
            $op = '修改操作';
        }else{
            $op = '其它操作';
        }
    }

    //成功日志（操作代表数，管理员id，信息，IP地址）
    public function log($op,$aid,$info,$ip,$opStatus){
        $this->operation($op);

        $data['aid'] = $aid;
        $data['operation'] = $op;
        $data['info'] = $info;
        $data['IP'] = $ip;
        $data['operationStatus'] = $opStatus;

        db('adminlog') -> insert($data);//添加日志
    }

    public function loginInfo($Name){
        db('admin') -> where('loginName',$Name) -> update(['lastLoginTime' => date("Y-m-d H:i:s")]);/* 保存登录时间  */
        db('admin') -> where('loginName',$Name) -> setInc('numberOfLogin');/* 登录成功后登录次数加  1   */

    }
}

?>