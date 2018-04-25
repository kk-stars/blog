<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:61:"D:\B\AppServ\www\blog/application/index\view\article\tag.html";i:1523507932;s:60:"D:\B\AppServ\www\blog/application/index\view\public\nav.html";i:1523426132;s:61:"D:\B\AppServ\www\blog/application/index\view\Public\info.html";i:1523446361;s:64:"D:\B\AppServ\www\blog/application/index\view\Public\backtop.html";i:1522998704;s:63:"D:\B\AppServ\www\blog/application/index\view\Public\footer.html";i:1523453490;}*/ ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php echo $conf['title']; ?> - 标签</title>
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
  <link href="__PUBLIC__index/img/bootstrap.min.css" rel="stylesheet">
  <link href="__PUBLIC__index/img/font-awesome.min.css" rel="stylesheet">
<style>
	#p-bottom{
	    width: 714px;
	    margin: 5px 20px;
	    padding-bottom: 5px;
	    border-bottom: 1px solid #ccc;
	    float: left;
	    margin-bottom: 0;
	}
	#div-p-content img{
		width:200px;
	}
</style>
</head>

<body id="blog">
<div style="    border-radius: 0 0 20px 20px;position: fixed; left: 0; top: 0; z-index: 999; right: 0; box-shadow: 0 3px 15px -3px #ccc; background: #fff;">
	<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header" style="border-radius: 10px; border-bottom: solid 2px #86d1ef;">
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
				<img src="__PUBLIC__index/images/flower.png" style="    margin-top: -24px; width: 450px; background: #fff;" />
		</div>
	<!--
				  <div class="am-u-sm-8 am-u-sm-centered">
	        <img width="100%" height="130px" src="/blog/public/static/index/images/babysbreath130.jpg" alt="Amaze UI Logo"/>
	    </div> -->
	</header>

<nav class="am-g am-g-fixed blog-fixed blog-nav" style="width:833px;">
	<div class="navbar-header" style="position: absolute; margin-left: -278px; margin-top: 5px;">
		<a href="home"><img alt="" src="__PUBLIC__index/images/lg.png" style="background: #fff;width: 278px;" title="BABYSBREATH" /></a>
  	</div>
  <div class="am-collapse am-topbar-collapse" id="blog-collapse" style="width: 80%;margin: 10px auto;">
    <ul class="am-nav am-nav-pills am-topbar-nav" id="active">
      <li class="am-dropdown am-active"><a href="home">首页</a></li>
      <li><a href="imgs">图片库</a></li>
      <li><a href="mood">心情随笔</a></li>
      <!-- <li><a href="">书屋</a></li> -->
      <?php if($conf['message'] == 1): ?><li><a href="message">BLOG留言</a></li><?php endif; ?>
      <li><a href="notice">网站公告</a></li>
      <li><a href="blogger">关于博主</a></li>
    </ul>
    <script>
/*  		$('.am-nav>li>a').click(function(e){
			e.preventDefault();
 			$(this).parent().addClass('am-active').siblings('.am-active').removeClass('am-active');
 			 var id = $(this).attr('href');
 			 $(id).addClass('active').siblings('.active').removeClass('active');
 		}); */
/*  		$('.am-nav > li').click(function(e) {
			e.preventDefault();
 		    if($(this).hasClass('am-active')) {
 		        //$(this).removeClass('am-active');
 		        //return false;
 		    } else {
 		        $(this).addClass('am-active').siblings('.am-active').removeClass('am-active');
 		        return false;
 		    }
 		}); */
    </script>
    <form method="get" action="search" style="line-height:50px;margin-top: -5px;float:right;margin-right:-225px;" class=" am-topbar-right am-form-inline" role="search"><!-- class ="am-topbar-form" -->
      <div class="am-form-group" style="    height: 30px;">
        <input type="text" name="search" class="am-form-field am-input-sm" style="border-radius:20px;width:150px;position:absolute;" placeholder="搜索..." />
        <input type="submit" class="" placeholder="　搜索" style=" position: relative; width: 30px; height: 30px; margin-top: -25px; margin-left: 115px; text-indent: -999px; border: 0; cursor: pointer; background: url(/blog/public/static/index/images/icon.png) no-repeat 0 -360px; outline: 0;" />
      </div>
    </form>
  </div>
</nav>
</div>




<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed" style="margin-top:120px;*background:#fff;padding-top: 20px;padding-left: 1.5rem;
    padding-right: 1.5rem;">
    <div class="am-u-md-12 am-u-sm-12">
		<div style="width:105%;height:30px;background:;border-radius:10px;border-bottom:2px solid #86d1ef;font-size:14px;margin-left: -18px;">　标签 >> <?php echo $tag; ?><a style="float:right;" href="<?php echo url('index/index'); ?>">返回首页>>　</a></div>
		<?php if(is_array($tagArticles) || $tagArticles instanceof \think\Collection || $tagArticles instanceof \think\Paginator): $i = 0; $__LIST__ = $tagArticles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ta): $mod = ($i % 2 );++$i;?>
	        <article class="am-g blog-entry-article" id='my-art'>
                <h1 style="padding-left: 18px;font-size:1.17em;letter-spacing:1px;margin-bottom: 0;">
                	<a href="article?aid=<?php echo $ta['articleId']; ?>">
                		<?php echo mb_strlen($ta['articleTitle'], 'utf-8') > 35 ? mb_substr($ta['articleTitle'], 0, 35, 'utf-8').'...' : $ta['articleTitle'];//三目运算符 ?>
                	</a>
                </h1>
	            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img" style="width:340px;">
	            	<?php if($ta['articlePic'] == null): ?>
		                <a href="article?aid=<?php echo $ta['articleId']; ?>" >
		                	<img src="__PUBLIC__index/images/noimage.png" style="cursor:pointer;padding-top:1rem;" alt="" title="暂无图片(no image)" class="am-u-sm-12" height="183px">
		                </a>
	                <?php else: ?>
		                <a href="article?aid=<?php echo $ta['articleId']; ?>" >
		                	<img src="__PUBLIC__<?php echo $ta['articlePic']; ?>" style="cursor:pointer;padding-top:1rem;" alt="" title="<?php echo $ta['articleTitle']; ?>" class="am-u-sm-12">
		                </a>
	                <?php endif; ?>
	                <p id='p-bottom'>
	                	<span id='cateName'>
	                		<i class='am-icon-navicon' style="color:#10D07A;"></i> <?php echo $ta['cateName']; ?>
	                	</span> &nbsp;&nbsp;

	                	<span id='userName'>
	                		<i class='am-icon-at'></i> <?php echo $ta['userName']; ?>
	                	</span> &nbsp;&nbsp;

	                	<span id='addTime'>
	                		<i class='am-icon-clock-o'></i>
	                		<?php echo mb_strlen($ta['addTime'], 'utf-8') > 10 ? mb_substr($ta['addTime'], 0, 10, 'utf-8') : $ta['addTime'];//三目运算符 ?>
	                	</span> &nbsp;&nbsp;
						<?php if($ta['praiseClicks'] != null): ?>
              			<span><i class='am-icon-heart' style="color:#ef6464;"> </i>&nbsp;<?php echo $ta['praiseClicks']; ?> </span> &nbsp;&nbsp;
              			<?php else: ?>
              			<span><i class='am-icon-heart' style="color:#ef6464;"> </i>&nbsp;0 </span> &nbsp;&nbsp;
              			<?php endif; if($ta['articleClicks'] != null): ?>
              			<span><i class='am-icon-eye'> </i>&nbsp;<?php echo $ta['articleClicks']; ?> </span> &nbsp;&nbsp;
              			<?php else: ?>
              			<span><i class='am-icon-eye'> </i>&nbsp;0 </span> &nbsp;&nbsp;
              			<?php endif; ?>

	                	<a href="article?aid=<?php echo $ta['articleId']; ?>" style="float:right;color:#10D07A;">阅读原文>></a>
	                </p>
	            </div>
	            <div style="width:405px;color:#888;font-size: 14px;padding: 10px;letter-spacing:2px;" class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text" id='div-p-content'>
	                <p id='articleContent'><?php echo mb_strlen(strip_tags($ta['articleContent']), 'utf-8') > 180 ? mb_substr(strip_tags($ta['articleContent']), 0, 180, 'utf-8').'...' : strip_tags($ta['articleContent']);//三目运算符 ?></p>
	            </div>
	        </article>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
		    <div class="am-u-md-4 am-u-sm-12 blog-sidebar" style="width:34.5%;float:right;" id="blog-sidebar">
        <div class="blog-sidebar-widget blog-bor" style="min-height: 426px;">
            <h2 class="blog-text-center blog-title"><span>关于博主</span></h2>
            <?php if($about['picture'] != null): ?>
            <img src="__PUBLIC__<?php echo $about['picture']; ?>" alt="about me" class="blog-entry-img" >
            <?php endif; ?>
            <p><?php echo $about['aboutMe']; ?></p>
        </div>
        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
           <h2 class="blog-title"><span>文章分类 </span></h2>
           <div class="am-u-sm-12 blog-clear-padding">
        	<?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
        		<a href="cate?cid=<?php echo $c['cateId']; ?>" class="blog-tag" title="<?php echo $c['cateName']; ?>">
        		<?php echo mb_strlen($c['cateName'] ,'utf-8' ) > 4 ? mb_substr($c['cateName'] ,0 ,4 ,'utf-8' ).'...' : $c['cateName']; ?>
        		</a>
          	<?php endforeach; endif; else: echo "" ;endif; ?>
           </div>
       	</div>

	    <div class="blog-sidebar-widget blog-bor">
	        <h2 class="blog-title"><span>最热文章</span></h2>
	        <ul class="am-list">
        		<!-- 只显示五条数据 -->
	        	<?php if(is_array($heatArticles) || $heatArticles instanceof \think\Collection || $heatArticles instanceof \think\Paginator): $i = 0; $__LIST__ = $heatArticles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$has): $mod = ($i % 2 );++$i;?>
            		<li><a href="article?aid=<?php echo $has['articleId']; ?>">
			    		<?php echo mb_strlen($has['articleTitle'], 'utf-8') > 19 ? mb_substr($has['articleTitle'], 0, 19, 'utf-8').'....' : $has['articleTitle'];//三目运算符 ?>
			    		</a>
			    		<span style="font-size:14px;">
			    			<p style="color:#888">
			    			<?php echo mb_strlen(strip_tags($has['articleContent']), 'utf-8') > 70 ? mb_substr(strip_tags($has['articleContent']), 0, 70, 'utf-8').'....' : strip_tags($has['articleContent']);//三目运算符  ?>
			    			</p>
			    		</span>
			    	</li>
	            <?php endforeach; endif; else: echo "" ;endif; ?>
	        </ul>
	    </div>
	    <div class="blog-sidebar-widget blog-bor">
	        <h2 class="blog-title"><span>最新文章</span></h2>
	        <ul class="am-list">
        		<!-- 只显示五条数据 -->
	        	<?php if(is_array($newArticles) || $newArticles instanceof \think\Collection || $newArticles instanceof \think\Paginator): $i = 0; $__LIST__ = $newArticles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nas): $mod = ($i % 2 );++$i;?>
            		<li><a href="article?aid=<?php echo $nas['articleId']; ?>">
			    		<?php echo mb_strlen($nas['articleTitle'], 'utf-8') > 19 ? mb_substr($nas['articleTitle'], 0, 19, 'utf-8').'....' : $nas['articleTitle'];//三目运算符 ?>
			    		</a>
			    		<span style="font-size:14px;">
			    			<p style="color:#888">
			    			<?php echo mb_strlen(strip_tags($nas['articleContent']), 'utf-8') > 70 ? mb_substr(strip_tags($nas['articleContent']), 0, 70, 'utf-8').'....' : strip_tags($nas['articleContent']);//三目运算符  ?>
			    			</p>
			    		</span>
			    	</li>
	            <?php endforeach; endif; else: echo "" ;endif; ?>
	        </ul>
	    </div>
	    <div class="blog-sidebar-widget blog-bor">
	        <h2 class="blog-title"><span>点赞排名</span></h2>
	        <ul class="am-list">
        		<!-- 只显示五条数据 -->
	        	<?php if(is_array($praiseArticles) || $praiseArticles instanceof \think\Collection || $praiseArticles instanceof \think\Paginator): $i = 0; $__LIST__ = $praiseArticles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ras): $mod = ($i % 2 );++$i;?>
            		<li><a href="article?aid=<?php echo $ras['articleId']; ?>">
			    		<?php echo mb_strlen($ras['articleTitle'], 'utf-8') > 19 ? mb_substr($ras['articleTitle'], 0, 19, 'utf-8').'....' : $ras['articleTitle'];//三目运算符 ?>
			    		</a>
			    		<span style="font-size:14px;">
			    			<p style="color:#888">
			    			<?php echo mb_strlen(strip_tags($ras['articleContent']), 'utf-8') > 70 ? mb_substr(strip_tags($ras['articleContent']), 0, 70, 'utf-8').'....' : strip_tags($ras['articleContent']);//三目运算符  ?>
			    			</p>
			    		</span>
			    	</li>
	            <?php endforeach; endif; else: echo "" ;endif; ?>
	        </ul>
	    </div>

        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>最新留言</span></h2>
            <ul class="am-list" id="am-list">
            	<?php if(is_array($message) || $message instanceof \think\Collection || $message instanceof \think\Paginator): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mg): $mod = ($i % 2 );++$i;?>
               		<li><a href="mood"><?php echo mb_strlen($mg['messageContent'],'utf-8') > 19 ? mb_substr($mg['messageContent'],'0','18','utf-8').'...' : $mg['messageContent']; ?></a>
               			<p style="font-size:14px;float:left;">　留言人：<?php echo $mg['userName']; ?></p>
               			<p style="font-size:14px;float:left;">　留言时间：<?php echo $mg['addTime']; ?></p>
               		</li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

	    <?php if($tags != null): ?>
	        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
	            <h2 class="blog-title"><span>标签</span></h2>
	            <div class="am-u-sm-12 blog-clear-padding">
					<?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?>
	            		<a href="tag?t=<?php echo $t; ?>" class="blog-tag">
	            		<?php echo mb_strlen($t ,'utf-8' ) > 4 ? mb_substr($t ,0 ,4 ,'utf-8' ).'...' : $t; ?>
	            		</a>
	            	<?php endforeach; endif; else: echo "" ;endif; ?>
	            </div>
	        </div>
	    <?php endif; if($friendshiplink != null): ?>
	        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
	            <h2 class="blog-title"><span>友情链接</span></h2>
	            <div class="am-u-sm-12 blog-clear-padding">
					<?php if(is_array($friendshiplink) || $friendshiplink instanceof \think\Collection || $friendshiplink instanceof \think\Paginator): $i = 0; $__LIST__ = $friendshiplink;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fl): $mod = ($i % 2 );++$i;?>
	            		<a href="<?php echo $fl['friendshipLinkURL']; ?>" target="_Blank" class="blog-tag">
	            		<?php echo mb_strlen($fl['friendshipLinkName'] ,'utf-8' ) > 4 ? mb_substr($fl['friendshipLinkName'] ,0 ,4 ,'utf-8' ).'...' : $fl['friendshipLinkName']; ?>
	            		</a>
	            	<?php endforeach; endif; else: echo "" ;endif; ?>
	            </div>
	        </div>
	    <?php endif; ?>
    </div>
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



<footer class="blog-footer">
    <div class="am-g am-g-fixed blog-fixed footer blog-footer-padding" style="width:800px">
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4" style="width:66%">
            <h3><?php echo $conf['keywords']; ?></h3>
            <p class="am-text-sm"><?php echo $conf['description']; ?></p>
        </div>
<!--         <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>社交账号</h3>
            <p>
                <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-github am-icon-fw blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-weibo am-icon-fw blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-reddit am-icon-fw blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-weixin am-icon-fw blog-icon blog-icon"></span></a>
            </p>
            <h3>Credits</h3>
            <p>心若没有栖息的地方，到哪里都是在流浪。太柔软的心不敢敞开给人任意伤。只能背起坚硬的壳，继续流浪。</p>
        </div> -->
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h1>我们站在巨人的肩膀上</h1>
            <p>
                <ul>
                	<li><a href="imgs">图片库</a></li>
                	<li><a href="mood">心情随笔</a></li>
                	<li><a href="message">BLOG留言</a></li>
                	<li><a href="notice">网站公告</a></li>
                	<li><a href="bloger">关于博主</a></li>
                </ul>
            </p>
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