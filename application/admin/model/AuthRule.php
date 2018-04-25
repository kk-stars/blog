<?php
namespace app\admin\model;
use think\Model;
class AuthRule extends Model{

    public function AuthRuleTree(){
        $AuthRuleData = $this->where('status','1')->order('sort desc')->select();
        return $this->sort($AuthRuleData);
    }

    //栏目排序
    public function sort($data,$pid = 0){
        //定义一个静态的空数组
        static $arr = array();
        foreach ($data as $k => $v){
            //找出第一个顶级栏目
            if ($v['pid'] == $pid){
                $v['dataid'] = $this->getparentid($v['id']);
                //将顶级栏目放入空数组内
                $arr[] = $v;
                //使用递归，，指向自己
                $this->sort($data,$v['id']);
            }
        }
        return $arr;
    }


    public function getchilrenid($authRuleId){
        $AuthRuleRes = $this -> where('status','1') -> select();
        //dump($AuthRuleRes);die;
        return $this->_getchilrenid($AuthRuleRes, $authRuleId);
    }


    public function _getchilrenid($AuthRuleRes, $authRuleId){
        //dump($AuthRuleRes);
        //dump($authRuleId);die;
        static $arr = array();
        foreach ($AuthRuleRes as $k => $v){
            if ($v['pid'] == $authRuleId){
                $arr[] = $v['id'];
                $this->_getchilrenid($AuthRuleRes, $v['id']);
            }else{
                //dump($v['id']);die;
            }
        }
        return $arr;
    }


    public function getparentid($authRuleId){
//         dump($authRuleId);
        $AuthRuleRes = $this -> select();
//         dump($AuthRuleRes);
        return $this->_getparentid($AuthRuleRes, $authRuleId, TRUE);
    }


    public function _getparentid($AuthRuleRes, $authRuleId, $clear = FALSE){
//         print_r($AuthRuleRes);die;
//         dump($authRuleId);die;
        static $arr = array();
        if ($clear){
            $arr = array();
        }
        foreach ($AuthRuleRes as $k => $v){
//             dump($k);
//             dump($v['id']);die;
            if ($v['id'] == $authRuleId){
                $arr[] = $v['id'];
                $this->_getparentid($AuthRuleRes, $v['pid'], FALSE);
            }else{
                //dump($v['id']);die;
            }
        }
        asort($arr);//从小到大排序
        $arrStr = implode('-', $arr);//implode分割字符串
//         dump($arr);die;
        return $arrStr;
    }
}
?>