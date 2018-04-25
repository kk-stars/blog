<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:57:"D:\B\AppServ\www\blog/application/index\view\img\img.html";i:1523876664;s:60:"D:\B\AppServ\www\blog/application/index\view\public\nav.html";i:1523937922;s:64:"D:\B\AppServ\www\blog/application/index\view\Public\backtop.html";i:1522998704;s:63:"D:\B\AppServ\www\blog/application/index\view\Public\footer.html";i:1524029503;}*/ ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php echo $conf['title']; ?> - 图片</title>
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
  <link rel="stylesheet" href="__PUBLIC__index/my/my.css">

  <!-- 图片查看  start -->
  <!-- <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script> -->
  <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="__PUBLIC__index/img/bootstrap.min.js"></script>
  <script src="__PUBLIC__index/img/jquery.magnify.js"></script>
  <script>
  $('[data-magnify]').magnify({
    headToolbar: [
      'close'
    ],
    initMaximized: true
  });

  </script>

  <link href="__PUBLIC__index/img/bootstrap.min.css" rel="stylesheet">
  <link href="__PUBLIC__index/img/jquery.magnify.css" rel="stylesheet">
  <link href="__PUBLIC__index/img/font-awesome.min.css" rel="stylesheet">
  <!-- 图片查看  end -->

  <script src="__PUBLIC__index/assets/js/ajax.js"></script>
  <script src="__PUBLIC__index/assets/js/flow.js"></script>
  <script>

  window.onload = function(){
  	var uLi = document.getElementById('container');//获取id 为    container
  	var oLi = uLi.getElementsByTagName('div');//获取div(id = container) 下的div标签

  	var oLiLen = oLi.length;//div(id = container) 下的div的个数
  	var ipage = 1;//初始页数为  1

  	var b = true; //布尔值

  	getImg();//初始化数据处理

  	function getImg(){
  		ajax('get','__URL__/flow',"ipage=" + ipage,function(data){
  			var d = JSON.parse(data);//JSON.parse 解析数据
  			var dlen = d.data.length;//获取图片个数
  			if(!dlen){
  				return ;//数据已全部加载
  			}

  			for(var i = 0; i <　dlen; i++){
  				var gs = getShort();//获取高度最短的div

  			    var imgCode = "<a data-magnify='gallery' data-caption='" + '图片' + (i + 1) + "' href='__PUBLIC__" + d.data[i].imgSrc + "'> <img width='200'  src='__PUBLIC__" + d.data[i].imgSrc + "' alt=''> </a>";
  				oLi[gs].innerHTML += imgCode;//将imgCode添加到 高度最短的图片下
  			}
  			b = true;//b 为  true 表示前面数据执行成功
  		});
  	}

  	//窗口滚动条  滚动  触发  事件
  	window.onscroll = function(){
  		var gsh = getShort();//获取高度最短的div
  		var iGsh = oLi[gsh];
  		var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
  		//document.body.scrollTop 与   document.documentElement.scrollTop : 获取当前页面滚动条纵坐标的位置

  		//offsetHeight : 返回的高度是  内容高  + padding + 边框( 不包括  margin )
  		//clientHeight : clientHeight 在页面上返回  内容  的  可视高度（ 不包括边框   , 边距或滚动条 ）
  		if(getTop( iGsh ) + iGsh.offsetHeight < document.documentElement.clientHeight + scrollTop ){
  			if(b){
  				b = false;
  				ipage++; //页数加一
  				getImg();//调用 getImg() 方法
  			}
  		}

  	}

  	function getShort(){	//获取高度最短的图片
  		var num = 0;
  		var n = oLi[num].offsetHeight;
  		for(var i = 1; i < oLiLen; i++){

  			if(oLi[i].offsetHeight < n){

  				num = i;
  				n = oLi[i].offsetHeight;
  			}
  		}
  		return num;
  	}

  	function getTop(obj){
  		var iTop = 0;

  		while(obj){

  			iTop += obj.offsetTop; //offsetTop    : 获取对象相对于版面或由 offsetTop 属性指定的父坐标的计算顶端位置
  			obj = obj.offsetParent;//offsetParent : 方法返回最近的祖先定位元素
  		}
  		return iTop;
  	}
  }
  </script>
  <!-- 瀑布流  -->
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

<!-- content start -->
  <div class="container" id="container">
    <div class="image-set" id="image-set"> </div>
    <div class="image-set" id="image-set"> </div>
    <div class="image-set" id="image-set"> </div>
    <div class="image-set" id="image-set"> </div>
  </div>
<!-- content end -->


  <style type="text/css">

		*{margin:0;padding:0;list-style-type:none;}

		a,img{border:0;}

		/* actGotop */

		.actGotop{position:fixed;_position:absolute;bottom:100px;right:5%;width:50px;height:50px;display:none;}

		.actGotop a,.actGotop a:link{width:50px;height:50px;display:inline-block;background:url(__PUBLIC__/index/backtop/images/backtop.png) no-repeat;_background:url(__PUBLIC__/index/backtop/images/backtop.png) no-repeat;outline:none;}

		.actGotop a:hover{background:url(__PUBLIC__/index/backtop/images/backtop.png) no-repeat;outline:none;}

</style>
<div class="actGotop"><a href="javascript:;" title="返回顶部"></a></div>

<script type="text/javascript" src="__PUBLIC__/index/backtop/js/jquery.min.js"></script>

<script type="text/javascript">

$(function(){

	$(window).scroll(function() {

		if($(window).scrollTop() >= 100){

			$('.actGotop').fadeIn(300);

		}else{

			$('.actGotop').fadeOut(300);

		}

	});

	$('.actGotop').click(function(){

		$('html,body').animate({scrollTop: '0px'}, 800);
	});

});

</script>



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
<script src="__PUBLIC__index/assets/js/amazeui.min.js"></script><!--
<script src="__PUBLIC__index/assets/js/pinto.min.js"></script>
<script src="__PUBLIC__index/assets/js/img.js"></script> -->
</body>
</html>