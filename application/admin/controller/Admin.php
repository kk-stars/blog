<?php
namespace app\admin\controller;
use app\admin\model\AdminLog;

class Admin extends Comm{
    public function Admin()
    {
        $selectResult = db('Admin') -> where('status','1') -> paginate(6);
        $this->assign('AdminData',$selectResult);

        return view();
    }


    //添加管理员
    public function addAdmin(){
        if(request()->isPost()){
            $userData['adminName'] = input('adminName');
            $userData['loginName'] = input('loginName');
            $userData['loginPassword'] = input('loginPassword');
            $userData['contactNumber'] = input('contactNumber');
            $userData['position'] = input('position');

            $repeatPwd = input('repeatPassword');

            if( $userData['adminName'] != null ||
                $userData['loginPassword'] != null ||
                $userData['loginName'] != null ||
                $userData['contactNumber'] != null ||
                $repeatPwd != null){
                    if($userData['loginPassword'] === $repeatPwd && mb_strlen($userData['loginPassword'],'UTF8') >= 6){
                        $userData['loginPassword'] = md5($userData['loginPassword']);
                        $result = db('admin') -> insert($userData);
                        if($result){
                            $info = array('code' => 1,'message' => '添加管理员成功!');
//                             $this->success('添加用户成功!正在跳转……',url('user/user'));
                        }else{
                            $info = array('code' => 0,'message' => '添加管理员失败!');
//                             $this->error('添加用户失败!');
                        }
                    }else{
                        $info = array('code' => -1,'message' => '密码长度不足6位或确认密码错误','1' => $repeatPwd,'2' => $userData['loginPassword']);
                    }
            }else{
                $info = array('code' => -2,'message' => '请填写完整信息!');
//                 $this->error('请填写完整信息!');
            }
            echo json_encode($info);die;
        }
    }


    public function updateAdminData()
    {
        if(request()->isGet()){
            $userId = input('adminId');
            $info = db('Admin') -> where('adminId' , $userId) -> find();
            echo json_encode($info);die;
        }


        if(request()->isPost()){
            $userData['loginName'] = input('loginName');
            $userData['adminId'] = input('adminId');
            $userData['adminName'] = input('adminName');
            $userData['contactNumber'] = input('contactNumber');
            $userData['loginPassword'] = input('loginPassword');
            $userData['position'] = input('position');

            $oldUserPwd = md5(input('oldAdminPassword'));
            $repUserPwd = input('repeatPassword');

            $dataTableUserPwd = db('admin') -> where('adminId',$userData['adminId']) -> field('loginPassword') -> find();
            $dataTableUserPwd = $dataTableUserPwd['loginPassword'];

            if($oldUserPwd == 0 && $userData['loginPassword'] == 0 && $repUserPwd == 0){

                //不修改密码
                $userData['loginPassword'] = db('admin') -> where('adminId',$userData['adminId']) -> field('loginPassword') -> find();
                $result = db('admin') -> where('adminId',$userData['adminId']) -> update($userData);
                if($result){
                    $info = array('code' => '1', 'message' => '修改管理员成功!✺◟(∗❛ัᴗ❛ั∗)◞✺');
                }else{
//                     $info = array('code' => '-1','message' => $userData,'result' => $result);
                    $info = array('code' => '-1', 'message' => '修改管理员失败!(╯︵╰)');
                }
            }else{

                //需要修改密码
                if($oldUserPwd === $dataTableUserPwd && $repUserPwd === $userData['loginPassword']){
                    $userData['loginPassword'] = md5($userData['loginPassword']);
                    if($userData){
                        $result = db('admin') -> where('adminId',$userData['adminId']) -> update($userData);
                        if($result){
                            $info = array('code' => '1', 'message' => '修改管理员成功!✺◟(∗❛ัᴗ❛ั∗)◞✺');
                        }else{
                            $info = array('code' => '-1', 'message' => '修改管理员失败!(╯︵╰)');
                        }
                    }else{
                        $info = array('code' => '0' , 'message' => '数据接收错误!');
                    }
                }else{
                    $info = array('code' => '-2' , 'message' => '密码错误!');
                }
            }
            echo json_encode($info);die;
        }
    }

    //删除
    public function delAdmin(){
        $update = db('Admin') -> where('AdminId',input('adminId')) -> update(['status' => '0']);
        if ($update){
            $info = array('code' => '1', 'message' => '删除管理员成功!✺◟(∗❛ัᴗ❛ั∗)◞✺');
//             $this->success("删除栏目成功!正在跳转……",url('Admin'));
        }else {
            $info = array('code' => '0', 'message' => '删除管理员失败!(╯︵╰)','id' => input('adminId'));
//             $this->error("删除栏目失败!");
        }
        echo json_encode($info);die;
    }

    //还原
    public function reduction(){
        $AdminId = input('AdminId');
        if($AdminId){
            $update = db('Admin') -> where('AdminId',$AdminId) -> update(['status' => '1']);
            if ($update){
                $info = array('code' => '1', 'message' => '还原管理员成功!✺◟(∗❛ัᴗ❛ั∗)◞✺');
//                 $this->success("还原栏目成功!正在跳转……",url('Admin/AdminRecovery'));
            }else {
                $info = array('code' => '0', 'message' => '还原管理员失败!(╯︵╰)');
//                 $this->error("还原栏目失败!");
            }
        }else{
            $info = array('code' => '-1', 'message' => '数据错误(╯︵╰)');
//             $this->error('此文章的所属栏目不存在,无法还原!');
        }
        echo json_encode($info);die;
    }

    //回收站
    public function AdminRecovery(){
        $selectResult = db('Admin') -> where('status','0') -> paginate(10);
        //dump($selectResult);die;
        $this->assign('AdminData',$selectResult);

        return view();
    }

    //彻底删除
    public function delRecovery(){

        $AdminId = input('AdminId');
        if($AdminId){
            $result = db('Admin') -> where('AdminId',$AdminId) -> delete();
            if($result){
                $info = array('code' => '-1', 'message' => '彻底删除管理员成功!✺◟(∗❛ัᴗ❛ั∗)◞✺');
//                 $this->success('文章彻底删除成功!正在跳转……',url('Admin/AdminRecovery'));
            }else{
                $info = array('code' => '-1', 'message' => '彻底删除管理员失败!(╯︵╰)');
//                 $this->error('文章彻底删除失败!');
            }
        }
        echo json_encode($info);die;
    }


    //状态（ 禁用 、启用 ）
    public function statusAdmin()
    {
        $userId = input('adminId');
        $status = input('status');
        if($userId != session('adminId')){
            if($status == 1){
                db('admin') -> where('adminId',$userId) -> update(['status' => '0']);
                $info = array('code' => '1','message' => '0');
            }elseif($status == 0){
                db('admin') -> where('adminId',$userId) -> update(['status' => '1']);
                $info = array('code' => '1','message' => '1');
            }else{
                $info = array('code' => '0','message' => '未知错误!(╯︵╰)');
            }
        }else{
            $info = array('code' => '-1','message' => '不可操作');
        }
        echo json_encode($info);die;
    }



    //管理员日志（   记录管理员进行了哪些操作，比如登录 、 修改密码、 ）
    public function adminLog()
    {
        $log = db('adminlog') -> alias('a') -> join('admin ad','a.aid = ad.adminId') -> field('a.*,ad.adminName') -> where('a.status',1) -> paginate(18);
        $aLogCount = db('adminlog') -> where('status','1') -> count();
        $this->assign('aLogCount',$aLogCount);
        $this->assign('aLog',$log);
        return view();
    }

    public function logInfo(){

        $id = input('id');
        $log = db('adminlog') -> alias('a') -> join('admin ad','a.aid = ad.adminId') -> field('a.*,ad.adminName') -> where(['a.status' => 1,'a.id' => $id]) -> find();
        if($log['operationStatus'] === 1 ){
            $log['operationStatus'] = '成功';
        }else{
            $log['operationStatus'] = '失败';
        }

        if($log){
            $info = array('code' => 1 , 'message' => $log);
        }else{
            $info = array('code' => 0 , 'message' => '数据查询失败');
        }
        echo json_encode($info);die;
    }

    public function delLog(){

        $id = input('id');
        $log = db('adminlog') -> where('id' , $id) -> update(['status' => 0]);

        if($log){
            $info = array('code' => 1 , 'message' => '删除日志成功');
        }else{
            $info = array('code' => 0 , 'message' => '删除日志失败');
        }
        echo json_encode($info);die;
    }
}
