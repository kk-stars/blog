<?php
namespace app\index\validate;
use \think\Validate;

class ValidateLogin extends Validate{

    protected $rule = [
        'userName'  =>  'require',//字段不能为空  and 正则匹配空白字符串
        //'userName'  =>  'regex:\s+g',//字段不能为空  and 正则匹配空白字符串
        'userPassword'  =>  'require',
        'userPassword'  =>  'min:8',
        //'userPassword'  =>  'regex:\s',
    ];

    protected $message = [
        'userName.require'  =>  '请输入用户名1',
        //'userName.regex'  =>  '请输入用户名2',
        'userPassword.require'  =>  '请输入密码',
        'userPassword.min'  =>  '密码长度最短8位',
    ];

}
?>