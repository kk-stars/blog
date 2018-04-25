<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"D:\B\AppServ\www\blog/application/index\view\message\message.html";i:1524042598;s:60:"D:\B\AppServ\www\blog/application/index\view\public\nav.html";i:1523937922;s:64:"D:\B\AppServ\www\blog/application/index\view\Message\liuyan.html";i:1523015168;s:63:"D:\B\AppServ\www\blog/application/index\view\Public\footer.html";i:1524029503;}*/ ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php echo $conf['title']; ?> - 博客留言</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="icon" type="image/png" href="__PUBLIC__index/assets/i/logo.png">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="__PUBLIC__index/assets/i/logo.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="__PUBLIC__index/assets/i/logo.png">
  <meta name="msapplication-TileImage" content="__PUBLIC__index/assets/i/logo.png">
  <meta name="msapplication-TileColor" content="#0e90d2">
  <link rel="stylesheet" href="__PUBLIC__index/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="__PUBLIC__index/assets/css/app.css">
  <link href="__PUBLIC__index/img/font-awesome.min.css" rel="stylesheet">
<style>
	#art{
	    *width: 1200px;
	    margin-bottom: 50px;
		margin:0 auto;
	}
	#my-art{
		margin-left:0;
	}
	#p-bottom{
		margin:5px;
	}
	#ator{
	    margin-left: -50px;
    	margin-bottom: 10px;
	}
	#bigdiv{
		width:1200px;
		margin:0 auto;
		background:#fff;
		padding:15px;
		margin-top:120px;
		box-shadow:0 4px 15px -3px #ccc;
		border-radius:10px;
		border-top:2px solid #86d1ef;
	}
	#articleContent{
		margin-bottom:0;
	}
	#p-bottom{
		font:14px "微软雅黑", Arial, Helvetica, sans-serif;
	}
	.am-icon-heart{
		transition:color .5s linear;
		cursor:pointer;
	}
	.am-icon-heart:hover{
		color:#ef6464
	}
	.redheart{
		color:#ef6464;
	}
</style>
</head>

<body id="blog-article-sidebar">

<!-- nav start -->
<div style="border-radius: 0 0 20px 20px;position: fixed; left: 0; top: 0; z-index: 999; right: 0; box-shadow: 0 3px 15px -3px #ccc; background: rgba(255, 255, 255, 0.74);" id="nav">
	<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header" style="border-radius: 10px; border-bottom: solid 2px rgba(134, 209, 239, 0.34);">
		<div style="height:30px;font-size:14px;">
			<div style="float:left; margin-left:20px; line-height:30px;">Hi &nbsp;
				<script type="text/javascript">
					today=new Date();var day; var date; var hello;hour=new Date().getHours();if(hour < 6){ hello=' 凌晨好！ ';}else if(hour < 9){ hello=' 早上好！';}else if(hour < 12){ hello=' 上午好！';}else if(hour < 14){ hello=' 中午好！ ';}else if(hour < 17){ hello=' 下午好！ ';}else if(hour < 19){ hello=' 傍晚好！';}else if(hour < 22){ hello=' 晚上好！ ';}else{ hello='夜深了！ ';}function GetCookie(sName) { var arr = document.cookie.match(new RegExp("(^| )"+sName+"=([^;]*)(;|$)")); if(arr !=null){return unescape(arr[2])}; return null;}var Guest_Name = decodeURIComponent(GetCookie('author'));var webUrl = webUrl;if (Guest_Name != "null" && Guest_Name != "" ){ hello = Guest_Name+' , '+hello+' 欢迎回来。';}document.write(' '+hello);
				</script>
			 	&nbsp;今天是: &nbsp;
			 	<script type="text/javascript">
			 		today=new Date(); var tdate,tday, x,year; var x = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五","星期六");var MSIE=navigator.userAgent.indexOf("MSIE");if(MSIE != -1){ year =(today.getFullYear());} else { year = (today.getYear()+1900);} tdate= year+ "年" + (today.getMonth() + 1 ) + "月" + today.getDate() + "日" + " " + x[today.getDay()];document.write(tdate);
			 	</script> &nbsp;
				<iframe name="" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" height="15px" src="<?php echo url('Index/time'); ?>"></iframe>
			</div>

		    <?php if(\think\Request::instance()->session('userId') == null): ?>
			    <div class="" style="float:right;line-height:30px;text-align:right;margin-right: 20px;">
			    	<i class="fa fa-sign-in"></i> &nbsp;<a href="log">登录</a>
			    	　|　
			    	<i class="fa am-icon-plus"></i> &nbsp;<a href="re">注册</a>
			    </div>
			<?php else: ?>
			    <div class="" style="float:right;line-height:30px;text-align:right;margin-right: 20px;">
			    	<i class="fa fa-user"></i> &nbsp;<a href="info" title="点击查看个人信息" style="font-style: italic;"><?php echo mb_strlen(session('userName'), 'utf-8') > 10 ? mb_substr(session('userName'), 0, 10, 'utf-8').'....' : session('userName') ;//三目运算符 ?></a>
			    	　|　
			    	<i class="fa am-icon-sign-out"></i><a href="javascript:;" onclick="logexit(<?php echo \think\Request::instance()->session('userId'); ?>)" title="点击注销"  style="margin-left:10px;">注销</a>
			    </div>
		    <?php endif; ?>
	    	<p class="blogger">您好！欢迎到访<a href="blogger" title="点击查看博主信息" style="font-style: italic;"> BABYSBREATH </a>  的个人博客&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
		    <script>
		    	function logexit(uid){
		    		$.post('<?php echo url('Log/logexit'); ?>',{'userId':uid},function(info){
						var i = JSON.parse(info);
						if(i.code = 1){
							location.href = "log";
						}
		    		});
		    	};

		    </script>
		</div>
	</header>

<nav class="am-g am-g-fixed blog-fixed blog-nav" style="width:930px;">
	<div class="navbar-header" style="position: absolute; margin-left: -278px; margin-top: 5px;">
		<a href="home"><img alt="" src="__PUBLIC__<?php echo $conf['logo']; ?>" style="width: 278px;" title="BABYSBREATH" /></a>
  	</div>
  <div class="am-collapse am-topbar-collapse" id="blog-collapse" style="width: 80%;margin: 10px auto;">
    <ul class="am-nav am-nav-pills am-topbar-nav" id="active">
      <li class="am-dropdown"><a href="home">首页</a></li>
      <li><a href="artlist">文章</a></li>
      <li><a href="mood">心情随笔</a></li>
      <li><a href="imgs">图片库</a></li>
      <?php if($conf['message'] == 1): ?><li><a href="message">BLOG留言</a></li><?php endif; ?>
      <li><a href="notice">网站公告</a></li>
      <li><a href="blogger">关于博主</a></li>
    </ul>
    <form method="get" action="search" style="line-height:50px;margin-top: -5px;float:right;margin-right:-225px;" class=" am-topbar-right am-form-inline" role="search"><!-- class ="am-topbar-form" -->
      <div class="am-form-group" style="height: 30px;">
        <input type="text" name="k" class="am-form-field am-input-sm" style="border-radius:20px;width:150px;position:absolute;background: rgba(255, 255, 255, 0);" placeholder="搜索..." />
        <input type="submit" class="" placeholder="　搜索" style=" position: relative; width: 30px; height: 30px; margin-top: -25px; margin-left: 115px; text-indent: -999px; border: 0; cursor: pointer; background: url(/blog/public/static/index/images/icon.png) no-repeat 0 -360px; outline: 0;" />
      </div>
    </form>
  </div>
</nav>
</div>



<!-- nav end -->

<!-- content srart -->
<div id="bigdiv">
		<div class="entry">
			<div style="background: #e1e2e9;">
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong><br>
					</strong></span>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong><br>
					</strong></span>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong>如果你发现了本站的漏洞&nbsp;<img
							src="__PUBLIC__index/images/hacker.gif" alt="" height="auto"
							original="__PUBLIC__index/images/hacker.gif"
							style="height: auto;">&nbsp; &nbsp;
					</strong></span>
				</p>
				<p style="text-align: center;">
					<br>
				</p>
				<p style="text-align: center;">
					<br>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong>如果你对本站有什么意见或建议
							&nbsp;&nbsp;<img src="__PUBLIC__index/images/yijian.gif"
							alt="" height="auto" style="height: auto;"
							original="__PUBLIC__index/images/yijian.gif">
					</strong></span>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong><br>
					</strong></span>
				</p>
				<p style="text-align: center;">
					<br>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong>如果你有什么比较好的文章
							&nbsp;&nbsp;<img src="__PUBLIC__index/images/page.gif" alt=""
							height="auto" style="height: auto;"
							original="__PUBLIC__index/images/page.gif">
					</strong></span>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong><br>
					</strong></span>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong><br>
					</strong></span>
				</p>
				<p style="text-align: center;">
					<br>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong>都可以联系
							&nbsp;</strong></span><span style="font-size: 16px; font-family: NSimSun;"><strong>℡ <?php echo $conf['alias']; ?></strong></span>
				</p>
				<p style="text-align: center;">
					<br>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong>邮箱：<?php echo $conf['email']; ?>
							&nbsp;&nbsp;<img src="__PUBLIC__index/images/mail.gif" alt=""
							height="auto" style="height: auto;"
							original="__PUBLIC__index/images/mail.gif">
					</strong></span>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong><br>
					</strong></span>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong><br>
					</strong></span>
				</p>
				<p style="text-align: center;">
					<span style="font-size: 16px; font-family: NSimSun;"><strong><br>
					</strong></span>
				</p>
			</div>
		</div>
		﻿<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="__PUBLIC__index/comment/comment.css" type="text/css" />
<script src="__PUBLIC__index/assets/js/jquery.min.js"></script>
<style>
	.big{
		margin-top:-30px;
		*margin-top: 120px;
	    *width: 1200px;
	    *margin-bottom: 30px;
	}
</style>
</head>

<body>
<div class="big">
	<div class="top">
		<div class="woyao">我要留言</div>
	</div>
    <form action="" method="post" id="form">
       <div class="bottom">

       		<!-- if判断是否登录  -->
			<?php if(session('userId') !== null): ?>
	            <div class="area">
	                <textarea class="textarea" name="messageContent" id="messageContent" required="required" placeholder=" 来说两句吧 . . ."></textarea>
	                <div></div>
	            </div>
	            <input type="button" id="submit" class="submit" value="提交" />

	       	<?php else: ?>

	            <div onclick="alert('请先登录再进行留言!');">
		            <div class="area">
		                <textarea class="textarea" disabled="disabled" placeholder=" 来说两句吧 . . ."></textarea>
		            </div>
	                <input type="button" class="submit" value="提交" />
	           	</div>
	       	<?php endif; ?>

        </div>
    </form>
</div>
</body>

</html>

	<div id="art">
		<article class="am-g blog-entry-article" id='my-art'>
			<ins id="ins"></ins>
			<?php if(is_array($message) || $message instanceof \think\Collection || $message instanceof \think\Paginator): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>
			    <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img" style="width:98.3%;padding:10px;padding-left:70px;border-bottom:1px dashed #e5e5e5;margin:0 10px;"">
			    	<p id="ator"><?php echo $m['userName']; ?></p>
					<img alt="" src="__PUBLIC__index/images/headIMG.jpg" style="margin-left: -50px; position: absolute;">
			        <p id='p-bottom'><?php echo $m['messageContent']; ?></p>
				    <div style="width:25%;color:#888;font-size: 14px;float:right;" class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text" id='div-p-content'>
				        <p id='articleContent'><time id="time"><?php echo $m['addTime']; ?>　</time>
				        	<span>
				        		<?php if($m['praiseStatus'] == 1): ?>
				        			<i class='am-icon-heart redheart' id="heart_<?php echo $m['messageId']; ?>" onclick="praise(<?php echo \think\Request::instance()->session('userId'); ?> + 0,<?php echo $m['messageId']; ?>)"> </i>
				        		<?php else: ?>
				        			<i class='am-icon-heart' id="heart_<?php echo $m['messageId']; ?>" onclick="praise(<?php echo \think\Request::instance()->session('userId'); ?> + 0,<?php echo $m['messageId']; ?>)"> </i>
				        		<?php endif; ?>
				        		<num id="num_<?php echo $m['messageId']; ?>"><?php echo $m['praise']; ?></num>
				        	</span>
				        </p>
				    </div>
			    </div>
		    <?php endforeach; endif; else: echo "" ;endif; ?>
		</article>
	</div>
</div>
<!-- content end -->
<footer class="blog-footer" id="footer">
    <div class="am-g am-g-fixed blog-fixed footer blog-footer-padding" style="width:1000px">
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4" style="width:66%;margin-top:15px;">
            <h3><?php echo $conf['keywords']; ?></h3>
            <p class="am-text-sm"><?php echo $conf['description']; ?></p>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <p>
                <ul style="font-size:20px;">
                	<li style="    border-bottom: 1px solid #fff;">指导老师：陈雪冬</li>
                	<li style="    border-bottom: 1px solid #fff;">班　主任：母浩</li>
                	<li style="    border-bottom: 1px solid #fff;">学生姓名：何坤</li>
                	<li style="    border-bottom: 1px solid #fff;">班　　级：15三年PHP一班</li>
                </ul>
            </p>
            <h1>我们站在巨人的肩膀上</h1>
        </div>
    </div>
    <div class="blog-text-center">Copyright ©2018 <?php echo $conf['url']; ?> Powered By
	  	<a href="http://<?php echo $conf['url']; ?>" target="_blank" title=""><?php echo $conf['keywords']; ?></a> Version 1.0.0
	  	<a href="http://www.miitbeian.gov.cn/" target="_blank" title=""><?php echo $conf['beian']; ?></a>
  	</div>
 </footer>

<script src="__PUBLIC__index/assets/js/jquery.min.js"></script>
<script src="__PUBLIC__index/assets/js/amazeui.min.js"></script>
<!-- <script src="__PUBLIC__index/assets/js/app.js"></script> -->
   	<script>
   	$(function(){
   		$('#submit').click(function(){
			var content = $('#messageContent').val();
			var art = document.getElementById('ins');
			if(content !== ''){
				$.post('__URL__/add',{'messageContent' : content},function(info){
					var d = JSON.parse(info);
					if(d.code == 1){
						var msgHTML = "<div class='am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img' style='width:98.3%;padding:2rem 10px 10px 70px;border-bottom:1px dashed #e5e5e5;margin:0 10px;'> <p id='ator'>" + d.mid.userName + "</p> <img alt='' src='__PUBLIC__index/images/headIMG.jpg' style='margin-left: -50px; position: absolute;'> <p id='p-bottom'>" + d.data.messageContent + "</p> <div style='width:25%;color:#888;font-size: 14px;float:right;' class='am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text' id='div-p-content'> <p id='articleContent'><time id='time'>" + d.mid.addTime + "　</time> <span><i class='am-icon-heart' id='heart_" + d.mid.messageId + "' onclick='praise(" + d.data.messageAtor + " + 0," + d.mid.messageId + ")'></i>&nbsp;<num id='num_" + d.mid.messageId + "'>0</num></span> </p> </div> </div>";
						//art.innerHTML += msgHTML;
						art.insertAdjacentHTML("afterEnd",msgHTML);
						$('#messageContent').val('');
					}else{

					}
				});
			}
   		});
   	})
   	</script>

<script>
				 //点赞的用户,留言id
	function praise( pUser , mid ){
		if(pUser !== 0){
			$.post('__URL__/Praise',{'puser' : pUser, 'mid' : mid},function(info){
				var I = JSON.parse(info);
				var pnm = I.pnum;
		        if( I.code == 1 ) {
			        $( "#num_" + mid ).html( pnm );
			    	$( '#heart_' + mid ).css( "color" , "#ef6464" )

		        } else if( I.code == 0 ) {
			        $( "#num_" + mid ).html( pnm );
			    	$( '#heart_' + mid ).css( "color" , "#888888" )
		        }
			});
		}else{
			alert("需要登录后才可以点赞哦！");
		}
	}
</script>
</body>
</html>