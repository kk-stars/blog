<?php
namespace app\admin\controller;

use app\admin\model\Article;
use app\admin\model\Cate as CateModel;

class Update extends Comm{
    public function updateArticle()
    {
        $articleId = input('articleId');
        if($articleId){
            $idData = db('article') -> where('articleId',$articleId) -> find();
            $cateModel = new CateModel();
            $cateSort = $cateModel->cateTree();

            $this->assign('article',$idData);
            $this->assign('cate',$cateSort);

            if(request()->isPost()){
                $articleModel = new Article;
                $upData = input('post.');

                //通过控制器上传图片
                if (!empty($_FILES['articlePic']['name'])){
                    $pic = request()->file('articlePic');
                    $path = ROOT_PATH."public".DS."static\admin\Upload";
                    $picInfo = $pic -> validate(['sixe'=>'5000 * 1024','ext'=>'jpg,gif,jpeg,png']) -> move($path);
                    if ($picInfo){
                        $upData['articlePic'] = "admin/Upload/" . date('Ymd') . '/' . $picInfo->getFilename();
                    }else{
                        return $this->error($pic->getError);
                    }
                    if($data['saveImg'] == 1){
                        db('imgs') -> insert(['imgSrc' => $data['articlePic']]);
                    }
                }

                $update = $articleModel-> update($upData);
                if($update){
                    $this->success('修改文章成功!正在跳转……',url('Article/article'));
                }else{
                    $this->error('修改文章失败!');
                }
                //dump($upData);die;

            }
        }
        return view();
    }

    public function updateCategory()
    {
        $cateModel = new CateModel();
        $cateSort = $cateModel->cateTree();
        $this->assign('cates',$cateSort);

        $cateId = input('cateId');
        $cate = db('cate') -> where('cateId',$cateId) -> find();
        $this -> assign('cate',$cate);

        if(request() -> isPost()){
            $updata = input('post.');
            $result = db('cate') -> where('cateId',$cateId) -> update($updata);
            if($result){
                $this->success('修改栏目成功!正在跳转……',url('cate/category'));
            }else{
                $this->error('修改栏目失败!');
            }
        }
        return view();
    }

    public function updateFlink()
    {
        return view();
    }

    public function updateNotice()
    {
        $noticeId = input('noticeId');
        $notice = db('notice') -> where('noticeId',$noticeId) -> find();
        $this->assign('notice',$notice);

        if(request()->isPost()){
            $noticeData = input('post.');
            $result = db('notice') -> where('noticeId',$noticeId) -> update($noticeData);
            if($result){
                $this->success('公告修改成功!正在跳转……',url('notice/notice'));
            }else{
                $this->error('公告修改失败!');
            }
        }
        return view();
    }

}
