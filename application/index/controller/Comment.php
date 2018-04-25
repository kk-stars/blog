<?php
namespace app\index\controller;
use think\Controller;
use think\Cookie;

class Comment extends Comm{

    //点赞
    public function Praise(){

        $praise = input('post.');

        if ($praise != null) {
            $pnum = db('comment') -> where('commentId',$praise['cid']) -> field('commentId,praise') -> find();
            $mId  = $pnum['commentId'];
            $pnum = $pnum['praise'];
            $puid = $praise['puser'];

            if( !isset( $_COOKIE['cpuser_'.$puid.'_'.$mId] ) ){
                //如果没有设置 cookie【‘cpuser’】，说明此用户第一次点赞， 那么点赞
                $pnum = $pnum + 1;//点赞数加一   点赞
                db('comment') -> where('commentId',$praise['cid']) -> update(['praise' => $pnum]);
                Cookie::set('cpuser_'.$puid.'_'.$mId,$puid);//将用户id存放入cookie里，用来验证用户登录点赞的唯一性

                $info = array('code' => 1,'message' => '点赞','pnum' => $pnum);

            }elseif( $_COOKIE['cpuser_'.$puid.'_'.$mId]  ==  $praise['puser'] ){
                //如果cookie里面保存的用户id 等于    前台提交过来的用户id，就说明此用户已点过赞
                $pnum = $pnum - 1;//点赞数减一  取消赞
                db('comment') -> where('commentId',$praise['cid']) -> update(['praise' => $pnum]);
                Cookie::delete( 'cpuser_'.$puid.'_'.$mId );//取消赞后，将此用户id从cookie中删除

                $info = array('code' => 0,'message' => '取消','pnum' => $pnum);

            }else{
                $info = array('code' => -1,'message' => '未知错误');
            }
        }else{
            $info = array('code' => -2,'message' => '数据错误');
        }

        echo json_encode($info);die;

    }

    public function add(){
        if(request()->isPost()){
            $data['commentContent'] = strip_tags(input('commentContent'));
            if($data !== null){
                $data['commentAtor'] = session('userId');
                db('comment') -> insert($data);
                $cid = db('comment') -> alias('c') -> join('user u','u.userId = c.commentAtor') -> where('c.commentAtor',$data['commentAtor']) -> field('c.commentId,c.addTime,u.userName') -> order('c.addTime desc') -> limit(1) -> find();
                $cid['addTime'] = date('Y年m月d日 H:i:s',strtotime($cid['addTime']));
                $info = array('code' => 1,'message' => '留言成功','data' => $data,'cid' => $cid);
            }else{
                $info = array('code' => 0,'message' => '留言失败');
            }
            echo json_encode($info);die;
        }
    }
}
