<?php
namespace app\admin\model;
use think\Model;

class Article extends Model{

    protected static function init(){
        //在修改文章图片前先删除文章原来的图片，然后上传新的图片
        Article::event('before_update', function ($art) {
            if ($_FILES['articlePic']['tmp_name']) {
                $articlePic = article::get(['articleId' => $art['articleId']]);
                $articlePicPath = $_SERVER['DOCUMENT_ROOT'] . '/blog/public/static/' . $articlePic['articlePic'];
                // printf($articlePicPath);die;
                if (file_exists($articlePicPath)) {
                    // unlink($articlePicPath);
                    @unlink($articlePicPath);
                }
            }
        });
    }
}

?>