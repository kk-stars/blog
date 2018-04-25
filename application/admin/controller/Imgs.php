<?php
namespace app\admin\controller;

class Imgs extends Comm{

    public function index()
    {
        $imgCount = db('imgs') -> where('status','1') -> count();

        $imgs = db('imgs') -> where('status','1') -> paginate(6);
        $this->assign('imgData',$imgs);
        $this->assign('imgCount',$imgCount);

        return view();
    }

    public function img()
    {
        if(request() -> isPost()){
            if(!empty($_FILES['imgs']['name'])){

                $imgs = request() -> file('imgs');
                $path = ROOT_PATH."public".DS."static\admin\Upload";
                foreach($imgs as $img){
                    $picInfo = $img -> validate(['sixe'=>'5000 * 1024','ext'=>'jpg,gif,jpeg,png']) -> move($path);
                    $imgData['imgSrc'] = "admin/Upload/" . date('Ymd') . '/' . $picInfo->getFilename();
                    db('imgs') -> insert($imgData);
                    if($picInfo){

                        //echo $picInfo->getExtension();
                        //echo $picInfo->getFilename();
                        //$info = array('code' => '1','message' => $picInfo->getExtension());
                        //$info = array('code' => '2','message' => $picInfo->getFilename());
                    }else{
                        //$info = array('code' => '0','message' => $picInfo->getError());

                        $this->error($picInfo->getError());
                        //echo json_encode($info);die;
                        //echo $picInfo->getError();
                    }
                }
                $this->success('添加成功!',url('Imgs/index'));
            }
        }

        return view();
    }

    public function delImg(){
        $imgId = input('imgId');
        if($imgId){
            $result = db('imgs') -> where('imgId',$imgId) -> update(['status' => '0']);
            if($result){
                $info = array('code' => '1','message' => '删除此图片成功!');
            }else{
                $info = array('code' => '0','message' => '删除此图片失败!');
            }
            echo json_encode($info);die;
        }
    }

    public function reductionImg(){
        $imgId = input('imgId');
        if($imgId){
            $imgs = db('imgs') -> where('imgId',$imgId) -> update(['status' => '1']);
            if($imgs){
                $info = array('code' => '1','message' => '还原此图片成功!');
            }else{
                $info = array('code' => '0','message' => '还原此图片失败!');
            }
            echo json_encode($info);die;
        }
    }


    public function imgRecovery(){
        $imgCount = db('imgs') -> where('status','0') -> count();

        $imgs = db('imgs') -> where('status','0') -> paginate(6);
        $this->assign('imgData',$imgs);
        $this->assign('imgCount',$imgCount);

        return view();
    }
}
