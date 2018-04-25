<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

class Comm extends Controller{

    protected function _initialize(){

        if (!session('adminId')){
            $this->error('尚未登录系统!请先登录……',url('Login/Login'));
        }

        $config = db('config') -> where('id','1') -> find();
        $this->assign('conf',$config);

/*         $Auth = new Auth();
        $Request = Request::instance();
        $AuthContr = $Request -> controller();  //设置或者获取当前的控制器名
        $Action = $Request -> action();         //设置或者获取当前的操作名
        $Name = $AuthContr . '/' .$Action;      //控/方
        //dump($Name);die;

        //如果检查数据成功   并且   控制器名不等于'Trash'  并且    控/方名不为'Index/index'  也不为 'Admin/adminlst'  ； 那么没有权限访问
        if (!$Auth -> check($Name, session('adminId')) && $Name != 'Index/index'){
            $this->error('没有权限访问!',url('Index/index'));
        } */

        $count = db('comment') -> where('status','1') -> count();
        $adminCount = db('Admin') -> where('status','1') -> count();
        $articleCount = db('article') -> where('status','1') -> count();
        $friendshiplink = db('friendshiplink') -> where('status','1') -> count();
        session('commentCount' , $count);       //评论数
        session('adminCount' , $adminCount);    //管理员数
        session('flinkCount' , $friendshiplink);//链接数
        session('articleCount' , $articleCount);//文章数

        session('php',PHP_VERSION);             //php版本
        session('phpSapiName',php_sapi_name()); //php运行方式
        session('apacheGetVersion',apache_get_version());//服务器软件
        session('phpUnameS',php_uname('s'));    //操作系统

        $mysql = 'select version();';           //原生查询mysql版本
        $result = \think\db::query($mysql);
        if($result !== null){
            $version = implode('', $result[0]);
        }else{
            $version = '未知版本';
        }
        session('mysqlVersion',$version);

    }

    public function info(){
        if(request()->isGet()){
            $aid = input('adminId');
            if($aid){
                $info = db('admin') -> where('adminId',$aid) -> find();
            }
            echo json_encode($info);
        }

        if(request()->isPost()){
            $aInfo['adminId'] = input('adminId');
            $aInfo['adminName'] = input('adminName');
            $aInfo['loginName'] = input('loginName');
            $aInfo['contactNumber'] = input('contactNumber');
            $aInfo['loginPassword'] = input('loginPassword');

            $aOldPwd = md5(input('oldPassword')); //原始密码
            $aNewPwd = input('newPassword');//确认密码


            $dataTableUserPwd = db('admin') -> where('adminId',$aInfo['adminId']) -> field('loginPassword') -> find();
            $dataTableUserPwd = $dataTableUserPwd['loginPassword'];

            if($aOldPwd === 0 && $aInfo['loginPassword'] === 0 && $aNewPwd === 0){

                //不修改密码
                $aInfo['loginPassword'] = db('admin') -> where('adminId',$aInfo['adminId']) -> field('loginPassword') -> find();
                $aInfo['loginPassword'] = $aInfo['loginPassword']['loginPassword'];
                $result = db('admin') -> where('adminId',$aInfo['adminId']) -> update($aInfo);
                if($result){
                    $info = array('code' => '1', 'message' => '您已成功修改个人信息，需重新登录……');
                }else{
                    $info = array('code' => '-1', 'message' => '修改个人信息失败!(╯︵╰)');
                }
            }else{

                //需要修改密码
                if($aOldPwd === $dataTableUserPwd && $aNewPwd === $aInfo['loginPassword']){
                    $aInfo['loginPassword'] = md5($aInfo['loginPassword']);
                    if($aInfo){
                        $result = db('admin') -> where('adminId',$aInfo['adminId']) -> update($aInfo);
                        if($result){
                            $info = array('code' => '1', 'message' => '您已成功修改个人信息，需重新登录……');
                        }else{
                            $info = array('code' => '-1', 'message' => '修改个人信息失败!(╯︵╰)','data' => $aInfo);
                        }
                    }else{
                        $info = array('code' => '0' , 'message' => '数据接收错误!');
                    }
                }else{
//                     $info = array('1' => $aInfo['loginPassword'],'2' => $aOldPwd,'3' => $aNewPwd,'4' => $dataTableUserPwd);
                    $info = array('code' => '-2' , 'message' => '密码错误!');
                }
            }
            echo json_encode($info);die;
        }
    }

    public function loginLog(){
        $aid = input('aid');
        if($aid){
            $log = db('adminlog') -> where('aid',$aid) -> select();
            if($log){
                $data = array('code' => 1,'message' => $log);
            }else{
                $data = array('code' => 0,'message' => '查看失败');
            }
            echo json_encode($data);die;
        }
    }
}

?>