<?php
namespace app\admin\controller;

use app\admin\model\Cate as CateModel;

class Add extends Comm{
    //文章
    public function addArticle(){
        $cateModel = new CateModel();
        $cateSort = $cateModel->cateTree();
        $this->assign('cate',$cateSort);

        if(request()->isPost()){
            $data = input('post.');
            $data['ator'] = session('adminId');

            //通过控制器上传图片
            if (!empty($_FILES['articlePic']['name'])){
                $pic = request()->file('articlePic');
                $path = ROOT_PATH."public".DS."static\admin\Upload";
                $picInfo = $pic -> validate(['sixe'=>'5000 * 1024','ext'=>'jpg,gif,jpeg,png']) -> move($path);
                if ($picInfo){
                    $data['articlePic'] = "admin/Upload/" . date('Ymd') . '/' . $picInfo->getFilename();
                }else{
                    return $this->error($pic->getError());
                }
                if($data['saveImg'] == 1){
                    db('imgs') -> insert(['imgSrc' => $data['articlePic']]);
                }
            }

            $addResult = db('article') -> insert($data);
            //dump($addResult);die;
            if($addResult){
                $this->success('文章添加成功!正在跳转……',url('Article/article'));
            }else{
                $this->error('文章添加失败!');
            }
        }
        return view();
    }
    //栏目
    public function addCategory(){
        $cateModel = new CateModel();
        $cateSort = $cateModel->cateTree();
        $this->assign('cate',$cateSort);

        if(request()->isPost()){
            $cateData = input('post.');
            $result = db('cate') -> insert($cateData);
            if($result){
                $this->success('栏目添加成功!正在跳转……',url('Cate/category'));
            }else{
                $this->error('栏目添加失败!');
            }
        }
        return view();
    }


    public function addFlink(){
        $linkData = input('post.');
        if(request()->isPost()){

            if(!empty($_FILES['pic']['name'])){
                $pic = request() -> file('pic');
                $path = ROOT_PATH.'public'.DS."static\admin\Upload";
                $picinfo = $pic -> validate(['sixe' => '5000 * 1024','ext' => 'jpeg,gif,jpg,png']) -> move($path);
                if($picinfo){
                    $linkData['pic'] = 'admin/Upload/'.date('Ymd').'/'.$picinfo -> getFilename();
                }else{
                    return $this->error($pic -> getError());
                }

            }
            $ressult = db('friendshiplink') -> insert($linkData);
            if($ressult){
                $this->success('链接添加成功!正在跳转……',url('Flink/flink'));
            }else{
                $this->error('链接添加失败!');
            }
        }
        return view();
    }


    public function addNotice(){
        $noticeData = input('post.');
        if(request()->isPost()){
            $ressult = db('notice') -> insert($noticeData);
            if($ressult){
                $this->success('公告添加成功!正在跳转……',url('notice/notice'));
            }else{
                $this->error('公告添加失败!');
            }
        }
        return view();
    }


    public function addMood(){
        $moodData = input('post.');
        if(request()->isPost()){

            if(!empty($_FILES['moodPic']['name'])){
                $pic = request() -> file('moodPic');
                $path = ROOT_PATH.'public'.DS."static\admin\Upload";
                $picinfo = $pic -> validate(['sixe' => '5000 * 1024','ext' => 'jpeg,gif,jpg,png']) -> move($path);
                if($picinfo){
                    $moodData['moodPic'] = 'admin/Upload/'.date('Ymd').'/'.$picinfo -> getFilename();
                }else{
                    return $this->error($pic -> getError());
                }

            }
            $ressult = db('mood') -> insert($moodData);
            if($ressult){
                $this->success('新心情添加成功!正在跳转……',url('mood/mood'));
            }else{
                $this->error('新心情添加失败!');
            }
        }
        return view();
    }


    //添加用户
    public function addUser(){
        if(request()->isPost()){
            $userData['name'] = input('name');
            $userData['userName'] = input('userName');
            $userData['userPassword'] = input('userPassword');
            $userData['contactNumber'] = input('contactNumber');

            $repeatPwd = input('repeatUserPassword');

            if( $userData['name'] != null ||
                $userData['userPassword'] != null ||
                $userData['userName'] != null ||
                $userData['contactNumber'] != null ||
                $repeatPwd != null){
                if($userData['userPassword'] === $repeatPwd && strlen($userData['userPassword']) >= 6){
                    $userData['userPassword'] = md5($userData['userPassword']);
                    $result = db('user') -> insert($userData);
                    if($result){
                        $this->success('添加用户成功!正在跳转……',url('user/user'));
                    }else{
                        $this->error('添加用户失败!');
                    }
                }
            }else{
                $this->error('请填写完整信息!');
            }
        }
    }
}
