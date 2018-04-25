<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"D:\B\AppServ\www\blog/application/index\view\blogger\blogger.html";i:1523876522;s:60:"D:\B\AppServ\www\blog/application/index\view\public\nav.html";i:1523937922;s:63:"D:\B\AppServ\www\blog/application/index\view\Public\footer.html";i:1524029503;}*/ ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php echo $conf['title']; ?> - 关于博主</title>
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
  <link rel="stylesheet" href="__PUBLIC__index/my/my.css">
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
<div class="am-g am-g-fixed blog-fixed blog-content my-div1">
    <div class="am-u-sm-12 my-div1-div1">
        <h1 class="blog-text-center" style="margin-top:20px;">-- 关于博主 --</h1>
        	<ul>
        		<li>
        			<strong>姓名：&nbsp;&nbsp;</strong><?php echo $about['name']; ?>　　　&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        		<strong>性别：&nbsp;&nbsp;</strong><?php echo $about['sex']; ?>　　　&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        		<strong>生年：&nbsp;&nbsp;</strong><?php echo $about['birthDate']; ?>　　　&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        		<strong>籍貫：&nbsp;&nbsp;</strong><?php echo $about['address']; ?>　　　&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        	</li>
        		<li>
        			<strong>邮箱：&nbsp;&nbsp;</strong><?php echo $about['email']; ?>　　　&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        	</li>
        		<li>
        			<strong>Q Q： &nbsp;&nbsp;</strong><?php echo $about['qq']; ?>　　　&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        	</li>
        		<li>
        			<strong>微信：&nbsp;&nbsp;</strong><?php echo $about['weixin']; ?>　　　&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        	</li>
        		<li>
        			<strong>微博：&nbsp;&nbsp;</strong><?php echo $about['weibo']; ?>　　　&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        	</li>
        	</ul>
        	<ul>
        		<li>
        			<strong>人生物語：&nbsp;&nbsp;</strong><br>
       				<?php if(is_array($about['lifeSentence']) || $about['lifeSentence'] instanceof \think\Collection || $about['lifeSentence'] instanceof \think\Paginator): $i = 0; $__LIST__ = $about['lifeSentence'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$alife): $mod = ($i % 2 );++$i;?>
						<p class="p-key"><?php echo $key + 1; ?>、<?php echo $alife; ?> </p>
					<?php endforeach; endif; else: echo "" ;endif; ?>
	        	</li>
        		<li>
        			<strong>专业技能：&nbsp;&nbsp;</strong><br>
						<p class="p-key"><?php echo $about['skill']; ?> </p><p><br/></p>
	        	</li>
        	</ul>
        <hr>
    </div>
    <div class="my-div1-div2">
		<div class="div2-div1">
  			<div><a class="div-name-a" href="home">Babysbreath</a></div>
		</div>

	    <div class="blog-sidebar-widget blog-bor div2-div2">
	        <h2 class="blog-text-center blog-title"><span>联系博主</span></h2>
            <?php if($about['picture'] != null): ?>
            	<img src="__PUBLIC__<?php echo $about['picture']; ?>" alt="about me" class="blog-entry-img" >
            <?php endif; ?>
	        <p>
	            <a href="javascript:;" ><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
	            <a href="javascript:;" ><span class="am-icon-github am-icon-fw blog-icon"></span></a>
	            <a href="javascript:;" ><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
	            <a href="javascript:;" ><span class="am-icon-reddit am-icon-fw blog-icon"></span></a>
	            <a href="javascript:;" ><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
	        </p>
	    </div>

        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>最新留言</span></h2>
            <ul class="am-list">
            	<?php if(is_array($message) || $message instanceof \think\Collection || $message instanceof \think\Paginator): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>
               		<li style="height: 100px;"><a href="mood"><?php echo mb_strlen($m['messageContent'],'utf-8') > 17 ? mb_substr($m['messageContent'],'0','17','utf-8').'...' : $m['messageContent']; ?></a>
               			<p class="msg-li-p">　留言人：<?php echo $m['userName']; ?></p>
               			<p class="msg-li-p">　留言时间：<?php echo $m['addTime']; ?></p>
               		</li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
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

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="__PUBLIC__index/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="__PUBLIC__index/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="__PUBLIC__index/assets/js/amazeui.min.js"></script>
<!-- <script src="__PUBLIC__index/assets/js/app.js"></script> -->
</body>
</html>