<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Comm;
use app\admin\model\AuthRule as AuthRuleModel;
class AuthGroup extends Comm
{

    public function lst()
    {
        $AuthGroupData = db('auth_group') -> where('status','1') -> select();
        $agCount = db('auth_group') -> where('status','1') -> count();
        $this->assign('AuthGroupData',$AuthGroupData);
        $this->assign('agc',$agCount);

        $AuthRuleModel = new AuthRuleModel;
        $AuthRuleLst = $AuthRuleModel -> authRuleTree();
        $this->assign('AuthRuleLst',$AuthRuleLst);

        return view();
    }


    public function Add()
    {
        if (request()->isPost()){
            $AuthGroup = input('post.');
            if (isset($AuthGroup['rules'])){
                $AuthGroup['rules'] = implode(',', $AuthGroup['rules']);
            }
            $Res = db('auth_group') -> insert($AuthGroup);
            if ($Res) {
                $this->success('添加用户组成功!正在跳转……',url('lst'));
            }else{
                $this->error('添加用户组失败!');
            }
        }
        $AuthRuleModel = new AuthRuleModel;
        $AuthRuleLst = $AuthRuleModel -> authRuleTree();
        $this->assign('AuthRuleLst',$AuthRuleLst);
        return view();
    }


    public function Edit(){

        $dataId = input('id');

        $dataFind = db('auth_group') -> where('id',$dataId) -> find();
        $this->assign('ag',$dataFind);

        if (request()->isPost()){
            $data = input('post.');
            if (isset($data['rules'])){
                $data['rules'] = implode(',', $data['rules']);
            }
            //dump($data);die;
            $dataUpdate = db('auth_group') -> where('id',$dataId) -> update($data);
            if ($dataUpdate){
                $this->success('修改用户组成功!正在跳转……',url('lst'));
            }else{
                $this->error('修改用户组失败!');
            }
        }
        $rules = db('auth_group') -> find(input('id'));
        $this->assign('rules',$rules);
        $AuthRuleModel = new AuthRuleModel;
        $AuthRuleLst = $AuthRuleModel -> authRuleTree();
        $this->assign('AuthRuleLst',$AuthRuleLst);

        return view();
    }


    public function del(){
        $dataId = input('id');
        $delRes = db('auth_group') ->where('id',$dataId) -> update(['status' => '0']);
        if ($delRes){
            $info = array('code' => 1,'message' => '删除用户组成功');
//             $this->success('删除用户组成功!正在跳转……',url('lst'));
        }else{
            $info = array('code' => 0,'message' => '删除用户组失败');
//             $this->error('删除用户组失败!');
        }
        echo json_encode($info);die;
    }
}
?>












