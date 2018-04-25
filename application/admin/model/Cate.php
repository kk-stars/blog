<?php
namespace app\admin\model;
use think\Model;

class Cate extends Model{

    public function cateTree(){
        $cateData = db('cate') -> where('status','1') -> select();
        return $this->sort($cateData);
    }

    public function sort($cateData,$pid = 0,$level = 0){
        //定义一个静态的数组 arr
        static $arr = array();
        foreach($cateData as $k => $v){
            if($v['cateFather'] == $pid){
               $v['level'] = $level;
               $arr[] = $v;
               //使用递归
               $this->sort($cateData,$v['cateId'],$level + 1);
            }
        }
        return $arr;
    }



    public function getchilrenid($cateid){
        $cateData = $this -> where('status','1') -> select();
        return $this->_getchilrenid($cateData, $cateid);
    }

    public function _getchilrenid($cateData, $cateid){
        static $arr = array();
        foreach ($cateData as $k => $v){
            if ($v['cateFather'] == $cateid){
                $arr[] = $v['cateId'];
                $this->_getchilrenid($cateData, $v['cateId']);
            }
        }
        return $arr;
    }
}

?>