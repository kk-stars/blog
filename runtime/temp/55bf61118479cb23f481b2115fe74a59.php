<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\B\AppServ\www\blog/application/index\view\log\forget.html";i:1524128524;}*/ ?>
<?php
//接口类型：互亿无线触发短信接口，支持发送验证码短信、订单通知短信等。
//账户注册：请通过该地址开通账户http://sms.ihuyi.com/register.html
//注意事项：
//（1）调试期间，请用默认的模板进行测试，默认模板详见接口文档；
//（2）请使用APIID（查看APIID请登录用户中心->验证码短信->产品总览->APIID）及 APIkey来调用接口；
//（3）该代码仅供接入互亿无线短信接口参考使用，客户可根据实际需要自行编写；

//session_start();
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
$_SESSION['send_code'] = random(6,1);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>BABYSBREATH 满 天 星  ☆  何 坤 个 人 博 客  - 重设密码</title>

  <!-- Set render engine for 360 browser -->
  <meta name="renderer" content="webkit">

  <!-- No Baidu Siteapp-->
  <meta http-equiv="Cache-Control" content="no-siteapp"/>

  <link rel="icon" type="image/png" href="__PUBLIC__index/assets/i/logo.png">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="__PUBLIC__index/assets/i/logo.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="__PUBLIC__index/assets/i/logo.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="__PUBLIC__index/assets/i/logo.png">
  <meta name="msapplication-TileColor" content="#0e90d2">

  <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
  <!--
  <link rel="canonical" href="http://www.example.com/">
  -->

  <link rel="stylesheet" href="__PUBLIC__index/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="__PUBLIC__index/assets/css/app.css">
</head>
<body>
<header style="width:100%;height:60px;background: rgba(0, 0, 0, 0.19);position:absolute">
	<div class="navbar-header" style="margin-left:10%;">
		<a href="home"><img alt="" src="__PUBLIC__index/images/lg-white.png" style="width: 300px;" title="BABYSBREATH" /></a>
  	</div>
  <div class="log-re" style="line-height:56px;">
    <button type="button" id="login" class="am-btn am-btn-default am-radius log-button">登 录</button>　
    <button type="button" id="register" class="am-btn am-btn-default am-radius log-button">注册</button>　
    <button type="button" id="index" class="am-btn am-btn-default am-radius log-button">首页</button>
  </div>
</header>

<div class="log">
  <div class="am-g">
  <div class="am-u-lg-3 am-u-md-6 am-u-sm-8 am-u-sm-centered log-content">
    <h1 class="log-title am-animation-slide-top">重设密码</h1>
    <br>
    <form class="am-form" id="log-form" method="post" action="<?php echo url('log/sms'); ?>">
      <div class="am-input-group am-animation-slide-left log-animation-delay" id="userPassword">
        <input type="text" id="mobile" class="am-form-field am-radius log-input" name="mobile" placeholder="手机电话" minlength="11" size="25" onkeyup="this.value=this.value.replace(/\s+/g,'')" required><!-- onkeyup="this.value=this.value.replace(/\s+/g,'')" 替换空格字符串 -->
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-phone am-icon-sm am-icon-fw"></i></span>
      </div>
      <br>

      <div class="am-input-group am-animation-slide-left log-animation-delay" id="userPassword">
        <input type="password" id="check-code" class="am-form-field am-radius log-input" name="mobile_code" placeholder="验证码" onkeyup="this.value=this.value.replace(/\s+/g,'')" style="width:50%;">
        <input class="forget" type="button" id="zphone" onclick="get_mobile_code();" value=" 获取手机验证码" />
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-check-square-o am-icon-sm am-icon-fw"></i></span>
      </div>
      <br>

      <div class="am-input-group am-animation-slide-left log-animation-delay" id="userPassword">
        <input type="password" id="setPassword" class="am-form-field am-radius log-input" name="userPassword" placeholder="设置密码" minlength="8" onkeyup="this.value=this.value.replace(/\s+/g,'')" required>
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
      </div>
      <br>

      <div class="am-input-group am-animation-slide-left log-animation-delay-a" id="reUserPasswordDIV">
        <input type="password" data-equal-to="#log-password" id="repPassword" class="am-form-field am-radius log-input" name="reUserPassword" placeholder="确认密码" onkeyup="this.value=this.value.replace(/\s+/g,'')" data-validation-message="请确认密码一致" required>
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
      </div>
      <br>
      <button type="button" class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius am-animation-slide-bottom log-animation-delay-b" id="submit">提　交</button>
      <br>
    </form>
  </div>
  </div>

  <footer class="log-footer">Copyright ©2018 <?php echo $conf['url']; ?> Powered By
  	<a href="http://<?php echo $conf['url']; ?>" target="_blank" title=""><?php echo $conf['keywords']; ?></a> Version 1.0.0
  	<a href="http://www.miitbeian.gov.cn/" target="_blank" title=""><?php echo $conf['beian']; ?></a>
  </footer>
</div>

<script src="__PUBLIC__index/assets/js/jquery.min.js"></script>
<script src="__PUBLIC__index/assets/js/amazeui.min.js"></script>
<script src="__PUBLIC__index/assets/js/app.js"></script>
<script>
$('#submit').click(function(){
    var uMobile = $('#mobile').val();	   /* val 获取手机号码输入框的 value 值	*/
	var uSetPwd = $('#setPassword').val(); /* 设置密码  */
	var uRepPwd = $('#repPassword').val(); /* 确认密码 */
	var uChCode = $('#check-code').val();  /* 手机验证码 */
    var style = {						   /* style 信息提示框样式  */
       	position: "fixed",
       	top: "0",
       	marginLeft:"45%",
        background:"#fff",
        zIndex:10,
        width:"200px",
        color:"#000",
        borderRadius:"3px",
		textAlign:"center",
        adding:"30px",
		padding:'20px',
        fontFamily: '"Microsoft Yahei","Hiragino Sans GB","Helvetica Neue",Helvetica,tahoma,arial,"WenQuanYi Micro Hei",Verdana,sans-serif,"\5B8B\4F53"',
        fontSize:"14px",
        boxShadow:"0 0 14px rgba(0,0,0,.1)",
        WebkitBoxShadow:"0 3px 9px rgba(0,0,0,.5)",
        boxShadow:"0 3px 9px rgba(0,0,0,.5)",
        border:"1px solid #999",
        border:"1px solid rgba(0,0,0,.2)"
    };
	if(uSetPwd != '' && uRepPwd != '' && uRepPwd === uSetPwd && uSetPwd.length >= 8 && uRepPwd.length >= 8){

	    $.post('__URL__/forget',{'mobile':uMobile,'mobile_code':uChCode,'userPassword':uSetPwd,'repeatPassword':uRepPwd},function(result)
	    {
			var d = JSON.parse(result);
			if (d.code == 1){
                               //登录成功

                $("#LoginSuccess").remove();
                                /*   LoginSuccess 登录成功信息提示框  */
                var LoginSuccess = document.createElement('div');
                LoginSuccess.id = "LoginSuccess";
                for (var i in style)LoginSuccess.style[i] = style[i];
                if (document.getElementById('LoginSuccess') == null){
                    document.body.appendChild(LoginSuccess);
                                    /*	 提示登录成功信息	*/
                    $("#LoginSuccess").css("display",'block').html(d.message).fadeOut(5000);
                }
                                /*	setTimeout 延时操作   。 	延时1秒后跳转	*/
				setTimeout('location.href = "log";', 1500);
			}else{
						    //登录失败

                $("#LoginError").remove();
                                /*   LoginError 登录失败信息提示框  */
                var LoginError = document.createElement('div');
                LoginError.id = "LoginError";
                for (var i in style)LoginError.style[i] = style[i];
                if (document.getElementById('LoginError') == null){
                	document.body.appendChild(LoginError);
                                    /*	 提示登录失败信息	*/
                    $("#LoginError").css("display",'block').html(d.message).fadeOut(5000);
            	}
			}
		});
	}else{
	    //密码错误

		$("#LoginError").remove();
		            /*   LoginError 信息提示框  */
		var LoginError = document.createElement('div');
		LoginError.id = "LoginError";
		for (var i in style)LoginError.style[i] = style[i];
		if (document.getElementById('LoginError') == null){
			document.body.appendChild(LoginError);
		                /*	 提示密码信息	*/
		    var eMessage = "密码错误!";
			$("#LoginError").css("display",'block').html(eMessage).fadeOut(5000);
		}
	}
})

$('#login').click(function(){
	location.href = "log";
});
$('#index').click(function(){
	location.href = "home";
});
$('#register').click(function(){
	location.href = "re";
});
</script>

<script type="text/javascript" src="__PUBLIC__index/forget/jquery.js"></script>
<script>
	function get_mobile_code(){
        $.post('__URL__/sms', {mobile:jQuery.trim($('#mobile').val()),send_code:<?php echo $_SESSION['send_code'];?>}, function(msg) {
            //alert(jQuery.trim(unescape(msg)));
			if(msg=='提交成功'){
				RemainTime();
			}
        });
	};
	var iTime = 59;
	var Account;
	function RemainTime(){
		document.getElementById('zphone').disabled = true;
		var iSecond,sSecond="",sTime="";
		if (iTime >= 0){
			iSecond = parseInt(iTime%60);
			iMinute = parseInt(iTime/60)
			if (iSecond >= 0){
				if(iMinute>0){
					sSecond = iMinute + "分" + iSecond + "秒";
				}else{
					sSecond = iSecond + "秒";
				}
			}
			sTime=sSecond;
			if(iTime==0){
				clearTimeout(Account);
				sTime='获取手机验证码';
				iTime = 59;
				document.getElementById('zphone').disabled = false;
			}else{
				Account = setTimeout("RemainTime()",1000);
				iTime=iTime-1;
			}
		}else{
			sTime='没有倒计时';
		}
		document.getElementById('zphone').value = sTime;
	}
</script>
</body>
</html>