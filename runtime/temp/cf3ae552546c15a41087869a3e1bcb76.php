<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:65:"D:\B\AppServ\www\blog/application/index\view\article\article.html";i:1524021630;s:60:"D:\B\AppServ\www\blog/application/index\view\public\nav.html";i:1523937922;s:65:"D:\B\AppServ\www\blog/application/index\view\article\comment.html";i:1524042590;s:64:"D:\B\AppServ\www\blog/application/index\view\Public\backtop.html";i:1522998704;s:63:"D:\B\AppServ\www\blog/application/index\view\Public\footer.html";i:1524029503;}*/ ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php echo $conf['title']; ?> - 文章详情</title>
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
  <link rel="stylesheet" type="text/css" href="__PUBLIC__index/praise/css/style.css"/>
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
<div class="am-g am-g-fixed blog-fixed blog-content banner-div1">
    <div class="am-u-sm-12 content-div1" id="content">
      <article class="am-article blog-article-p my-article">
        <div class="am-article-hd">
          <h1 class="am-article-title"><?php echo $ad['articleTitle']; ?></h1>
          <p class="am-article-meta">
              <span><a href="cate?cid=<?php echo $ad['cateId']; ?>" class="blog-color">
              <i class='am-icon-bars my-art-icon-i'></i> <?php echo $ad['cateName']; ?></a></span> &nbsp;- &nbsp;
              <span>&nbsp;<?php echo $ad['userName']; ?></span> &nbsp;- &nbsp;
              <span><i class='am-icon-clock-o'></i>&nbsp;<?php echo $ad['addTime']; ?></span> &nbsp;- &nbsp;
              <?php if($ad['praiseClicks'] != null): ?>
              <span><i class='am-icon-heart'></i>&nbsp;<num id="praiseClicks_<?php echo $ad['articleId']; ?>"><?php echo $ad['praiseClicks']; ?></num></span> &nbsp;- &nbsp;
              <?php else: ?>
              <span><i class='am-icon-heart'></i>&nbsp;0</span> &nbsp;- &nbsp;
              <?php endif; if($ad['articleClicks'] != null): ?>
              <span><i class='am-icon-eye'></i>&nbsp;<?php echo $ad['articleClicks']; ?></span>
              <?php else: ?>
              <span><i class='am-icon-eye'></i>&nbsp;0</span>
              <?php endif; ?>
          </p>
        </div>
        <div class="am-article-bd">
	        <?php if($ad['articlePic'] != null): ?>
	        	<img src="__PUBLIC__<?php echo $ad['articlePic']; ?>" alt="" class="blog-entry-img blog-article-margin">
	        <?php endif; ?>
	        <span id="span-p-img"><?php echo $ad['articleContent']; ?></span>
        </div>
      </article>

        <div class="am-g blog-article-widget blog-article-margin">
			<article class="htmleaf-container art-praise" title="点个赞呗">
				<div id="praise">
					<div class="feed" id="feed">
						<?php if($ad['praiseStatus'] == 1): ?>
							<div class="heart redHeart" onclick="artPraise(<?php echo \think\Request::instance()->session('userId'); ?> + 0,<?php echo $ad['articleId']; ?>)" id="like" rel="unlike"></div>
						<?php else: ?>
							<div class="heart" onclick="artPraise(<?php echo \think\Request::instance()->session('userId'); ?> + 0,<?php echo $ad['articleId']; ?>)" id="like" rel="like" style="background-position: left center;"></div>
						<?php endif; ?>
						<div class="likeCount" id="likeCount"><num id="likes_<?php echo $ad['articleId']; ?>"><?php echo $ad['praiseClicks']; ?></num><p style="font-size:13px;">人赞</p></div>
					</div>
				</div>
			</article>
			<script src="__PUBLIC__index/praise/js/jquery-1.11.0.min.js"></script>
			<script>
							 //点赞的用户,文章id
				function artPraise( pUser , aid ){
					if(pUser !== 0){
						$.post('__URL__/Praise',{'puser' : pUser, 'aid' : aid},function(info){
							var I = JSON.parse(info);
							var pnm = I.pnum;
					    	$('#like').css( "background-position" , "" )
					        if( I.code == 1 ) {
					        	$( '#praiseClicks_' + aid ).html( pnm );
						        $( "#likes_" + aid ).html( pnm );
						        $( '#like' ).addClass( "heartAnimation" ).attr( "rel" , "unlike" );

					        } else if( I.code == 0 ) {
					        	$( '#praiseClicks_' + aid ).html( pnm );
						        $( "#likes_" + aid ).html( pnm );
						        $( '#like' ).removeClass( "heartAnimation" ).removeClass( "redHeart" ).attr( "rel" , "like" );
						        $( '#like' ).css( "background-position" , "left" );
					        }
						});
					}else{
						alert("需要登录后才可以点赞哦！");
					}
				}
			</script>
          <div class="am-u-lg-4 am-u-md-5 am-u-sm-7 am-u-sm-centered blog-text-center">
            <?php if($ad['articleTags'] != null): ?>
            <span class="am-icon-tags" title="标签"> &nbsp;:</span>
              <?php if(is_array($ad['articleTags']) || $ad['articleTags'] instanceof \think\Collection || $ad['articleTags'] instanceof \think\Paginator): $i = 0; $__LIST__ = $ad['articleTags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aTags): $mod = ($i % 2 );++$i;?>
            	<a href="#"><?php echo $aTags; ?></a> ,
              <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            <hr>
            <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
            <a href=""><span class="am-icon-wechat am-icon-fw blog-icon"></span></a>
            <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
          </div>
        </div>
        <hr>
        <ul class="am-pagination blog-article-margin">
          <?php if($upA != null): ?>
          	<li class="am-pagination-prev"><a href="article?aid=<?php echo $upA; ?>">&laquo; 一切的回顾</a></li>

          	<?php else: ?>

          	<li class="li-up-null" title="没有了">&laquo; 一切的回顾</li>
          <?php endif; if($downA != null): ?>
          	<li class="am-pagination-next"><a href="article?aid=<?php echo $downA; ?>">不远的未来 &raquo;</a></li>

          	<?php else: ?>

          	<li class="li-down-null" title="没有了">不远的未来 &raquo;</li>
          <?php endif; ?>
        </ul>
        <hr>
        <div class="am-g blog-author blog-article-margin">
          <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
            <img src="__PUBLIC__<?php echo $am['picture']; ?>" alt="" class="blog-author-img am-circle">
          </div>
          <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
          <h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color"><?php echo $ad['userName']; ?></span></h3>
            <p><?php echo $am['aboutMe']; ?></p>
          </div>
        </div>

        <hr>
        <?php if($conf['comment'] == 1): ?>
	        <div id="bigdiv">
	        	﻿<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="__PUBLIC__index/comment/comment.css" type="text/css" />
<script src="__PUBLIC__index/assets/js/jquery.min.js"></script>
<style>
	#art{
	    *width: 1200px;
	    margin-bottom: 50px;
		margin:0 auto;
	}
	#my-art{
		margin-left:0;
		margin-right:0;
	}
	#p-bottom{
		margin:5px;
	}
	#ator{
	    margin-left: -50px;
    	margin-bottom: 10px;
	}
	#bigdiv{
		*width:1200px;
		margin:0 auto;
		background:#fff;
		padding:15px;
		*margin-top:120px;
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
	.big{
		margin-top:-30px;
	}
</style>
</head>

<body>
<div class="big">
	<div class="top">
		<div class="woyao">文章评论</div>
	</div>
    <form action="" method="post" id="form">
       <div class="bottom">

       		<!-- if判断是否登录  -->
			<?php if(session('userId') !== null): ?>
	            <div class="area">
	                <textarea class="textarea" name="commentContent" id="commentContent" required="required" placeholder=" 来说两句吧 . . ."></textarea>
	                <div></div>
	            </div>
	            <input type="hidden" id="aid" value="<?php echo $aid; ?>" />
	            <input type="button" id="submit" class="submit" value="提交" />

	       	<?php else: ?>

	            <div onclick="alert('请先登录再进行评论!');">
		            <div class="area">
		                <textarea class="textarea" disabled="disabled" placeholder=" 来说两句吧 . . ."></textarea>
		            </div>
	                <input type="button" class="submit" value="提交" />
	           	</div>
	       	<?php endif; ?>

        </div>
    </form>
   	<script>
   	$(function(){
   		$('#submit').click(function(){
   			var aid     = $('#aid').val();
			var content = $('#commentContent').val();
			$.post('__URL__/article',{'commentContent' : content,'aid' : aid},function(info){
				var d = JSON.parse(info);
				if(d.code == 1){
					$('#commentContent').val('');
				}else{

				}
			});
   		});
   	})
   	</script>
</div>

<div id="art">
	<article class="am-g blog-entry-article" id='my-art'>
		<ins id="ins"></ins>
		<?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
		    <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img" style="width:98.3%;padding:10px;padding-left:70px;border-bottom:1px dashed #e5e5e5;margin:0 10px;"">
		    	<p id="ator"><?php echo $c['userName']; ?></p>
				<img alt="" src="__PUBLIC__index/images/headIMG.jpg" style="margin-left: -50px; position: absolute;">
		        <p id='p-commentContent'><?php echo $c['commentContent']; ?></p>
			    <div style="width:45%;color:#888;font-size: 14px;float:right;" class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text" id='div-p-content'>
			        <p id='articleContent'><time id="time"><?php echo $c['addTime']; ?>　</time>
			        	<span>
			        		<?php if($c['praiseStatus'] == 1): ?>
			        			<i class='am-icon-heart redheart' id="heart_<?php echo $c['commentId']; ?>" onclick="praise(<?php echo \think\Request::instance()->session('userId'); ?> + 0,<?php echo $c['commentId']; ?>)"> </i>
			        		<?php else: ?>
			        			<i class='am-icon-heart' style="color:#888" id="heart_<?php echo $c['commentId']; ?>" onclick="praise(<?php echo \think\Request::instance()->session('userId'); ?> + 0,<?php echo $c['commentId']; ?>)"> </i>
			        		<?php endif; ?>
			        		<num id="num_<?php echo $c['commentId']; ?>"><?php echo $c['praise']; ?></num>
			        	</span>
			        </p>
			    </div>
		    </div>
	    <?php endforeach; endif; else: echo "" ;endif; ?>
	</article>
</div>

   	<script>
   	$(function(){
   		$('#submit').click(function(){
			var content = $('#commentContent').val();
			var art = document.getElementById('ins');
			if(content !== ''){
				$.post("<?php echo url('comment/add'); ?>",{'commentContent' : content},function(info){
					var d = JSON.parse(info);
					if(d.code == 1){
						var msgHTML = "<div class='am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img' style='width:98.3%;padding:2rem 10px 10px 70px;border-bottom:1px dashed #e5e5e5;margin:0 10px;'> <p id='ator'>" + d.cid.userName + "</p><img alt='' src='__PUBLIC__index/images/headIMG.jpg' style='margin-left: -50px; position: absolute;'> <p id='p-commentContent'>" + d.data.commentContent + "</p> <div style='width:45%;color:#888;font-size: 14px;float:right;' class='am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text' id='div-p-content'> <p id='articleContent'><time id='time'>" + d.cid.addTime + "　</time> <span><i class='am-icon-heart' id='heart_" + d.cid.commentId + "' onclick='praise(" + d.data.commentAtor + " + 0," + d.cid.commentId + ")'></i>&nbsp;<num id='num_" + d.cid.commentId + "'>0</num></span> </p> </div> </div>";
						//art.innerHTML += msgHTML;
						art.insertAdjacentHTML("afterEnd",msgHTML);
						$('#commentContent').val('');
					}else{

					}
				});
			}
   		});
   	})
   	</script>

<script>
				 //点赞的用户,评论id
	function praise( pUser , cid ){
		if(pUser !== 0){
			$.post("<?php echo url('comment/Praise'); ?>",{'puser' : pUser, 'cid' : cid},function(info){
				var I = JSON.parse(info);
				var pnm = I.pnum;
		        if( I.code == 1 ) {
			        $( "#num_" + cid ).html( pnm );
			    	$( '#heart_' + cid ).css( "color" , "#ef6464" )

		        } else if( I.code == 0 ) {
			        $( "#num_" + cid ).html( pnm );
			    	$( '#heart_' + cid ).css( "color" , "#888888" )
		        }
			});
		}else{
			alert("需要登录后才可以点赞哦！");
		}
	}
</script>
</body>

</html>

			</div>
	        <hr>
	    <?php endif; ?>
    </div>
    <div class="am-u-md-4 am-u-sm-12 blog-sidebar div-info" id="blog-sidebar">

        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
           <h2 class="blog-title"><span>文章分类 </span></h2>
           <div class="am-u-sm-12 blog-clear-padding">
        	<?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
        		<a href="artlist?cid=<?php echo $c['cateId']; ?>" class="blog-tag" title="<?php echo $c['cateName']; ?>">
        		<?php echo mb_strlen($c['cateName'] ,'utf-8' ) > 4 ? mb_substr($c['cateName'] ,0 ,4 ,'utf-8' ).'...' : $c['cateName']; ?>
        		</a>
          	<?php endforeach; endif; else: echo "" ;endif; ?>
           </div>
       	</div>
	    <div class="blog-sidebar-widget blog-bor">
	        <h2 class="blog-title"><span>栏目最热</span></h2>
	        <ul class="am-list">
        		<!-- 只显示五条数据 -->
	        	<?php if(is_array($cateHeat) || $cateHeat instanceof \think\Collection || $cateHeat instanceof \think\Paginator): $i = 0; $__LIST__ = $cateHeat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ch): $mod = ($i % 2 );++$i;?>
            		<li><a href="article?aid=<?php echo $ch['articleId']; ?>">
			    		<?php echo mb_strlen($ch['articleTitle'], 'utf-8') > 19 ? mb_substr($ch['articleTitle'], 0, 19, 'utf-8').'....' : $ch['articleTitle'];//三目运算符 ?>
			    		</a>
			    		<span style="font-size:14px;">
			    			<p style="color:#888">
			    			<?php echo mb_strlen(strip_tags($ch['articleContent']), 'utf-8') > 70 ? mb_substr(strip_tags($ch['articleContent']), 0, 70, 'utf-8').'....' : strip_tags($ch['articleContent']);//三目运算符  ?>
			    			</p>
			    		</span>
			    	</li>
	            <?php endforeach; endif; else: echo "" ;endif; ?>
	        </ul>
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
	    <div class="blog-sidebar-widget blog-bor" id="sidebarBefore">
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
	    <div class="blog-sidebar-widget blog-bor" id="sidebar">
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
<script src="__PUBLIC__index/assets/js/stickySidebar.js"></script>
<script>
	$(document).ready(function() {
		$('#sidebar').stickySidebar({
			sidebarTopMargin: 102,
			footerThreshold: 0
		});
	});
</script>
</body>
</html>