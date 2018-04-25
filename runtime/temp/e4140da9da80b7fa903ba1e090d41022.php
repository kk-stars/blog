<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"G:\PHPWAMP_IN2\wwwroot\blog/application/admin\view\login\login.html";i:1524128871;}*/ ?>
<!doctype html>
<html>
<head>
<title>Backstage management center</title>
  <link rel="icon" type="image/png" href="__PUBLIC__index/assets/i/logo.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- font files  -->

<!-- css files -->
<link href="__PUBLIC__admin/login/css/style.css" rel='stylesheet' type='text/css' media="all" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/css/bootstrap.min.css">
<!-- /css files -->

<!-- js -->
<script type="text/javascript" src="__PUBLIC__admin/login/js/jquery-2.1.1.min.js"></script>
<script src="__PUBLIC__admin/js/bootstrap.min.js"></script>
<!-- /js -->
</head>
<body>
<h1 style="color:#fff;">后台管理中心</h1>
<div class="log">
	<div class="content1">
		<h2>登录</h2>
		<form action="" method="post">
			<input type="text" name="loginName" id="adminname" value="" placeholder="登录名" autocomplete="off" />
			<input type="password" name="loginPassword" id="adminpwd" value="" placeholder="登录密码" autocomplete="off" />
			<div class="button-row">
				<input type="button" onclick="login()" class="sign-in" value="登录" />
				<input type="reset" class="reset" value="重置" />
				<div class="clear"></div>
			</div>
		</form>
	</div>
<!--	<div class="content2">
		<h2>注册</h2>
		<form>
			<input type="text" name="userid" value="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'NAME AND SURNAME';}">
			<input type="tel" name="usrtel" value="PHONE" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PHONE';}">
			<input type="email" name="email" value="EMAIL ADDRESS" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'EMAIL ADDRESS';}">
			<input type="password" name="psw" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}">
			<input type="submit" class="register" value="Register">
		</form>
	</div>
	<div class="clear"></div>-->
</div>
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 400px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="closeX" data-dismiss="modal" aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="infoModalLabel">
					登录信息提示
				</h4>
			</div>
			<div class="modal-body" id='infoBody'>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
$(function(){
	$('body').keyup(function(event){
		if(event.keyCode==13){ 	//回车键  13
			login();			//回车键触发事件
		}
	});
});

function login(){
    var oNval = $('#adminname').val();
	var oPval = $('#adminpwd').val();

	if(oNval == ''){
		$('#infoBody').html('请填写登录名!');
        $('#info').modal('show');

	}else if(oPval == ''){
		$('#infoBody').html('请填写登录密码!');
        $('#info').modal('show');
	}else{
		$.post('__URL__/login',{'loginName':oNval,'loginPassword':oPval},function(info){
			var i = JSON.parse(info);
			if (i.code == 1){
	            //登录成功
				$('#infoBody').html(i.message);
	            $('#info').modal('show');
	            /*	setTimeout 延时操作   。 	延时1秒后跳转	*/
			    setTimeout('location.href = "<?php echo url('admin/Index/index'); ?>";', 1000);
			}else{
				//登录失败
	            /*	 提示登录失败信息	*/
				$('#infoBody').html(i.message);
	            $('#info').modal('show');
	        }
		})
	}
}
</script>
<div class="footer">
	<p>Copyright ©2018 <?php echo $conf['url']; ?> Powered By<a href="http://<?php echo $conf['url']; ?>" target="_blank" title=""><?php echo $conf['keywords']; ?></a> Version 1.0.0</p><a href="http://www.miitbeian.gov.cn/" target="_blank" title=""><?php echo $conf['beian']; ?></a>
</div>

</body>
</html>