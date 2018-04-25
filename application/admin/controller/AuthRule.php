<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Comm;
use app\admin\model\AuthRule as AuthRuleModel;
class AuthRule extends Comm {

    /* 权限显示 */
    public function Lst() {
        $AuthRuleModel = new AuthRuleModel;
        $AuthRuleData = $AuthRuleModel -> authRuleTree();
        $authRuleCount = db('auth_rule') -> where('status','1') -> count();

        $this->assign('AuthRule',$AuthRuleData);
        $this->assign('arcount',$authRuleCount);

        return view();
    }


    /* 权限添加 */
    public function Add(){
        if (request()->isPost()){
            $AddData = input('post.');
            $PidLevel = db('auth_rule') -> where('id',$AddData['pid']) ->field('level') -> find();
            if ($PidLevel){
                $AddData['level'] = $PidLevel['level'] + 1;
            }else{
                $PidLevel['level'] = 0;
            }
            //dump($PidLevel['level']);die;
            $AddRes = db('auth_rule') -> insert($AddData);
            if ($AddRes) {
                $info = array('code' => 1,'message' => '添加权限成功');
                //$this->success("添加权限成功!正在跳转……",url('Lst'));
            }else{
                $info = array('code' => 0,'message' => '添加权限失败');
                //$this->error('添加权限失败!');
            }
            echo json_encode($info);die;
        }
        $AuthRuleModel = new AuthRuleModel;
        $RuleLst = $AuthRuleModel -> authRuleTree();
        $this->assign('RuleLst',$RuleLst);
        return view();
    }


    /* 权限修改 */
    public function Edit(){
        /* 上级权限的权限列表 */
        $AuthRuleModel = new AuthRuleModel;
        $Rule = $AuthRuleModel -> authRuleTree();
        $this->assign('Rule',$Rule);

        if(request()->isGet()){
            /* 权限数据 */
            $ruleId = input('id');
            $RuleLst = db('auth_rule') -> where('id',$ruleId) -> find();

            if($RuleLst['pid'] !== 0){
                /* 查询上级权限的权限名字 */
                $pname = db('auth_rule') -> where('id',$RuleLst['pid']) -> field('name') -> find();
            }else{
                $pname = null;
            }

            $data = array('code' => 1,'message' => '权限数据','data' => $RuleLst,'pname' => $pname);
            echo json_encode($data);die;
        }

        if (request()->isPost()){
            $AuthRule = input('post.');
            $PidLevel = db('auth_rule') -> where('id',$AuthRule['pid']) ->field('level') -> find();
            if ($PidLevel){
                $AuthRule['level'] = $PidLevel['level'] + 1;
                //dump($AuthRule['level']);die;
            }else{
                $AuthRule['level'] = 0;
            }


            $RuleEdit = db('auth_rule') -> where('id',input('id')) -> update($AuthRule);
            if ($RuleEdit){
                $info = array('code' => 1,'message' => '修改权限成功');
                //$this->success('!正在跳转……',url('Lst'));
            }else{
                $info = array('code' => 0,'message' => '修改权限失败');
                //$this->error('修改权限失败!');
            }
            echo json_encode($info);die;
        }
        return view();
    }
/*
    //前置操作         $beforeActionList
    protected $beforeActionList = [
        //数组键名   就是   前置方法名

        //'first',//如果前置方法名没有值的话就表示执行以下的任意方法都会先执行前置方法

        //'second' => ['except' => 'hello'],

        //在执行     cate_del  方法之前先执行    delsoncate  方法
        //这里    cate_del 方法名不能使用大写
        'delsoncate' => ['only' => 'del'],
    ]; */


    /* 权限删除 */
    public function Del(){
        $AuthRule = new AuthRuleModel;
        $AuthRule -> getparentid(input('id'));
        $id = input('id');
        //dump($id);die;
        $sonId = $AuthRule -> getchilrenid($id);
        $sonId[] = input('id');
        //dump($sonId);die;
        foreach ($sonId as $k => $v){
            $delRes = AuthRuleModel::where('id',$v)->update(['status' => '0']);
        }
        if ($delRes){
            $info = array('code' => 1,'message' => '删除权限成功');
            //$this->success('删除权限成功!正在跳转……',url('Lst'));
        }else{
            $info = array('code' => 0,'message' => '删除权限失败');
            //$this->error('删除权限失败!');
        }
        echo json_encode($info);die;
    }

/*     public function delsoncate(){
        //echo '111';die;
        $AuthRule = new AuthRuleModel;
        $authRuleId = input('id');
        //dump($authRuleId);die;
        $sonId = $AuthRule -> getchilrenid($authRuleId);
        //dump($sonId);die;
        $arrSonId = $sonId;
        $arrSonId[] = $authRuleId;
        foreach ($arrSonId as $k => $v){
            AuthRuleModel::where(array('id' => $v)) -> update(['status' => '0']);
        }
        if ($sonId){
            //dump($sonId);die;
            foreach ($sonId as $k => $v){
                AuthRuleModel::where(array('id' => $v)) -> update(['status' => '0']);
            }
        }
    } */
}
?>












