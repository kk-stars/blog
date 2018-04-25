<?php
namespace app\admin\controller;

class User extends Comm{

    protected function _initialize(){
        if (!session('adminId')){
            $this->error('尚未登录系统!请先登录……',url('Login/Login'));
        }

        $user = db('user') -> field('userId') -> select();
        //$article = db('article') -> select();
        foreach($user as $k => $v){
            $article = db('article') -> where('ator',$v['userId']) -> count();
            db('user') -> where('userId',$v['userId']) -> update(['userArticles' => $article]);
        }

        $userCount = db('user') -> where('status','1') -> count();
        session('userCount' , $userCount);      //用户数
    }

    public function User()
    {
        $user = db('user') ->where('status','1') -> paginate(10);
        $this->assign('user',$user);
        return view();
    }



    public function deluser()
    {
        $userId = input('userId');
        if($userId){
            //查询此用户是否发表过评论
            $sectCmt = db('comment') -> where('commentAtor',$userId) -> select();
            //查询此用户是否发布过文章
            $sectArt = db('article') -> where('ator',$userId) -> select();

            if($sectCmt){
                //如果此用户发表过评论     就将其删除
                db('comment') -> where('commentAtor',$userId) -> delete();
            }

            if($sectArt){
                //如果  删除评论成功    和     此用户发布过文章
                foreach($sectArt as $k => $v){
                    //删除此用户发布的文章需将它下面的其它评论先删除
                    db('comment') -> where('commentArticleId',$sectArt[$k]['articleId']) -> delete();
                }
                // 再删除文章
                db('article') -> where('ator',$userId) -> delete();
            }
            //此用户没有发布过文章        直接删除此用户
            $result = db('user') -> where('userId',$userId) -> delete();
            if($result){
                $info = array('code' => '1','message' => '删除用户成功!✺◟(∗❛ัᴗ❛ั∗)◞✺');
            }else{
                $info = array('code' => '0','message' => '删除用户失败!(╯︵╰)');
            }
        }else{
            $info = array('code' => '-5','message' => '数据接收错误!(╯︵╰)');
        }
        echo json_encode($info);die;
        return view();
    }


    public function updateUserData()
    {
        if(request()->isGet()){
            $userId = input('userId');
            $info = db('user') -> where('userId' , $userId) -> find();
            echo json_encode($info);die;
        }


        if(request()->isPost()){
             $userData['name'] = input('name');
             $userData['userId'] = input('userId');
             $userData['userName'] = input('userName');
             $userData['contactNumber'] = input('contactNumber');
             $userData['userPassword'] = input('userPassword');

             $oldUserPwd = md5(input('oldUserPassword'));
             $repUserPwd = input('repeatUserPassword');

             $dataTableUserPwd = db('user') -> where('userId',$userData['userId']) -> field('userPassword') -> find();
             $dataTableUserPwd = $dataTableUserPwd['userPassword'];

             if($oldUserPwd == 0 && $userData['userPassword'] == 0 && $repUserPwd == 0){

                 //不修改密码
                 $userData['userPassword'] = db('user') -> where('userId',$userData['userId']) -> field('userPassword') -> find();
                 $result = db('user') -> where('userId',$userData['userId']) -> update($userData);
                 if($result){
                     $info = array('code' => '1', 'message' => '修改用户成功!✺◟(∗❛ัᴗ❛ั∗)◞✺');
                 }else{
                     $info = array('code' => '-1', 'message' => '修改用户失败!(╯︵╰)');
                 }
             }else{

                 //需要修改密码
                 if($oldUserPwd === $dataTableUserPwd && $repUserPwd === $userData['userPassword']){
                     $userData['userPassword'] = md5($userData['userPassword']);
                     if($userData){
                         $result = db('user') -> where('userId',$userData['userId']) -> update($userData);
                         if($result){
                             $info = array('code' => '1', 'message' => '修改用户成功!✺◟(∗❛ัᴗ❛ั∗)◞✺');
                         }else{
                             $info = array('code' => '-1', 'message' => '修改用户失败!(╯︵╰)');
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


    //状态（ 禁用 、启用 ）
    public function statusUser()
    {
        $userId = input('userId');
        $status = input('status');
        if($status == 1){
            db('user') -> where('userId',$userId) -> update(['status' => '0']);
            $info = array('code' => '1','message' => '0');
        }elseif($status == 0){
            db('user') -> where('userId',$userId) -> update(['status' => '1']);
            $info = array('code' => '1','message' => '1');
        }else{
            $info = array('code' => '0','message' => '未知错误!');
        }
        echo json_encode($info);die;
    }


    //用户日志（   记录用户进行了哪些操作，比如登录 、 修改密码、 注册  ）
    public function userLog()
    {
        $log = db('userlog') -> alias('u') -> join('user','user.userId = u.uid') -> field('user.userName,u.*') -> where('u.status',1) -> paginate(18);
        $uLogCount = db('userlog') -> where('status','1') -> count();
        $this->assign('uLogCount',$uLogCount);
        $this->assign('uLog',$log);
        return view();
    }

    public function logInfo(){

        $id = input('id');
        $log = db('userlog') -> alias('u') -> join('user ur','u.uid = ur.userId') -> field('u.*,ur.userName') -> where(['u.status' => 1,'u.id' => $id]) -> find();
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
        $log = db('userlog') -> where('id' , $id) -> update(['status' => 0]);

        if($log){
            $info = array('code' => 1 , 'message' => '删除日志成功');
        }else{
            $info = array('code' => 0 , 'message' => '删除日志失败');
        }
        echo json_encode($info);die;
    }
}
