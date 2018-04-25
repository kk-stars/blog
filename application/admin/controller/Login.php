<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\AdminLog as AdLog;
use think\Request;

class Login extends Controller{
    protected function _initialize(){
        session('[destroy]');
        session(null);

        $config = db('config') -> where('id','1') -> find();
        $this->assign('conf',$config);
    }

/*     public function checkLoginInfo(){

        $adminname = $_POST['loginName'];
        $data = array();
        $adnmInfo = db('admin') -> where('loginName',$adminname) -> find();
        if($adnmInfo != null){
            $data = array('code' => 1,'message' => "管理员名称输入正确");
        }else{
            $data = array('code' => 0,'message' => "无此管理员");
        }
        echo json_encode($data);die;

    } */

    public function login(){

        if (request()->isPost()){
            $Name = strip_tags($_POST['loginName']);//strip_tags ： 清除字符串中的   HTML 和   PHP 标签
            $password = md5($_POST['loginPassword']);

            $info = array();
            if ($Name != null || $password != null){
                $admin = db('admin') -> where(['loginName' => $Name,'status' => 1]) -> find();
                if ($admin['loginPassword'] === $password){

                    session('adminId',$admin['adminId']);//将管理员名称和密码存入session会话中
                    session('loginName',$admin['loginName']);//将管理员名称和密码存入session会话中
                    session('loginPassword',$admin['loginPassword']);

                    $adLog = db('adminlog') -> where('status',1) -> order('addTime desc') -> limit(1) -> find();
                    session('time',$adLog['addTime']);//上一次登录时间
                    session('ip',$adLog['IP']);//上一次登录IP地址

                    $info = array('code' => 1,'message' => "登录成功!正在跳转……",'status' => '1');
                }else{
                    $info = array('code' => 0,'message' => "管理员密码输入不正确!",'status' => '0');
                }
                /*
                 * @var \app\admin\model\AdminLog $adlog
                 *              管理员  日志  模型
                 *  AdminLog模型 调用  log 添加管理员日志    必填参数（  操作类型   ，管理员   ， 信息   ，操作ip ，状态：1为成功，2为失败 ）
                 */
                $adlog = new AdLog();
                $ip = Request::instance() ->ip(); // 获取用户IP地址
                session('nowIP',$ip);
                $adlog ->log(1, $admin['adminId'], $info['message'], $ip, $info['status']);
                //operation操作类型：1为登录，2为修改密码，3为删除操作，4为添加操作，5为修改操作， 6为其它操作
                $adlog ->loginInfo($Name);

            }else{
                $info = array('code' => -1,'message' => "数据错误!");
            }


            echo JSON_encode($info);die;
        }
        return view();
    }

    public function loginExit(){

        session('[destroy]');
        session(null);
        $this->success('退出成功!',url('Login/login'));
    }

}
