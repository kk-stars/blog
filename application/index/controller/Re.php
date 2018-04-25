<?php
namespace app\index\controller;
use think\Controller;

class Re extends Comm{

    public function re(){
        if(request()->isPost()){
            $register['contactNumber'] = $_POST['mobile'];
            $register['userPassword'] = $_POST['userPassword'];
            $register['userName'] = $_POST['userName'];;

            $rpPwd = $_POST['repeatPassword'];
            $mbcd = $_POST['mobile_code'];

            $dataUserName = db('user') -> where('userName',$register['userName']) -> field('userName') -> find();
            $mobile = db('user') -> where('contactNumber',$register['userName']) -> field('contactNumber') -> find();

            if($mobile == null){
                if( $register['contactNumber'] != $_SESSION['mobile']
                    or $mbcd != $_SESSION['mobile_code']
                    or empty($register['contactNumber'])
                    or empty($mbcd) )
                {
                    $result = array('code' => 0,'message' => '手机验证码输入错误！');
                    echo json_encode($result);die;
                }else{
                    if($dataUserName == null){
                        if($register['userPassword'] !== null && $rpPwd !== null && $register['userPassword'] === $rpPwd){
                            $register['userPassword'] = md5($register['userPassword']);
                            $result = db('user') -> insert($register);
                            if($result){
                                $info = array('code' => 1,'message' => '注册成功！');
                            }else{
                                $info = array('code' => 0,'message' => '注册失败!');
                            }
                        }else{
                            $info = array('code' => -1,'message' => '确认密码不一致!');
                        }
                    }else{
                        $info = array('code' => -2,'message' => '此用户名已被注册!');
                    }
                }
            }else{
                    $info = array('code' => -3,'message' => '此手机号码已被注册!');
            }
            echo json_encode($info);die;
        }
        return view();
    }

    public function sms(){

        //接口类型：互亿无线触发短信接口，支持发送验证码短信、订单通知短信等。
        // 账户注册：请通过该地址开通账户http://sms.ihuyi.com/register.html
        // 注意事项：
        //（1）调试期间，请用默认的模板进行测试，默认模板详见接口文档；
        //（2）请使用APIID（查看APIID请登录用户中心->验证码短信->产品总览->APIID）及 APIkey来调用接口
        //（3）该代码仅供接入互亿无线短信接口参考使用，客户可根据实际需要自行编写；

        //开启SESSION
        //session_start();

        header("Content-type:text/html; charset=UTF-8");

        //请求数据到短信接口，检查环境是否 开启 curl init。
        function Post($curlPost,$url){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_NOBODY, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
            $return_str = curl_exec($curl);
            curl_close($curl);
            return $return_str;
        }

        //将 xml数据转换为数组格式。
        function xml_to_array($xml){
            $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
            if(preg_match_all($reg, $xml, $matches)){
                $count = count($matches[0]);
                for($i = 0; $i < $count; $i++){
                    $subxml= $matches[2][$i];
                    $key = $matches[1][$i];
                    if(preg_match( $reg, $subxml )){
                        $arr[$key] = xml_to_array( $subxml );
                    }else{
                        $arr[$key] = $subxml;
                    }
                }
            }
            return $arr;
        }

        //random() 函数返回随机整数。
        function random($length = 6 , $numeric = 0) {
            PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
            if($numeric) {
                $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
            } else {
                $hash = '';
                $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
                $max = strlen($chars) - 1;
                for($i = 0; $i < $length; $i++) {
                    $hash .= $chars[mt_rand(0, $max)];
                }
            }
            return $hash;
        }
        //短信接口地址
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
        //获取手机号
        $mobile = $_POST['mobile'];
        //获取验证码
        $send_code = $_POST['send_code'];
        //生成的随机数
        $mobile_code = random(4,1);
        if(empty($mobile)){
            $error = array('message' => '手机号码不能为空');
            echo json_encode($error);die;
        }

        $mobileData = db('user') -> where('contactNumber',$_POST['mobile']) -> find();
        if($mobileData != null){
            $error = array('message' => '此手机号码已被注册');
            echo json_encode($error);die;
        }

        //防用户恶意请求
        if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
            //exit('请求超时，请刷新页面后重试');
            $error = array('message' => '请求超时，请刷新页面后重试');
            echo json_encode($error);die;
        }

        $post_data = "account=C56991510&password=96a59fef3c5607830a10b457c351d872&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
        //用户名是登录用户中心->验证码短信->产品总览->APIID
        //查看密码请登录用户中心->验证码短信->产品总览->APIKEY
        $gets =  xml_to_array(Post($post_data, $target));
        if($gets['SubmitResult']['code']==2){
            $_SESSION['mobile'] = $mobile;
            $_SESSION['mobile_code'] = $mobile_code;
        }
        echo $gets['SubmitResult']['msg'];
    }
}
