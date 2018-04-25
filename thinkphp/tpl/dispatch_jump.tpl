<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>提示信息</title>
    <link rel="stylesheet" href="/blog/public/static/admin/login/css/pintuer.css">
    <style type="text/css">
        *{ margin:0px; padding:0px;}
        .error-container{ background:#fff; border:1px solid #0ae;  text-align:center; width:450px; margin:250px auto; font-family:Microsoft Yahei; padding-bottom:30px; border-top-left-radius:5px; border-top-right-radius:5px;  }
        .error-container h1{margin-top:-35px;border-radius:3px; font-size:16px; padding:12px 0; background:#0ae; color:#fff;}
        .errorcon{ padding:35px 0; text-align:center; color:#0ae; font-size:18px;}
        .errorcon i{ display:block; margin:12px auto; font-size:30px; }
        .errorcon span{color:red;}
        h4{ font-size:14px; color:#666;}
        a{color:#0ae;}
        .error-container .success,.error-container .error{ line-height: 1.8em; font-size: 36px; }
    </style>
</head>
<body class="no-skin">
<div class="error-container">
    <div class="errorcon">
		<?php switch ($code) {?>
		    <?php case 1:?>
		    <h1>后台管理系统-信息提示</h1>
		    <i class="icon-smile-o"></i><?php echo(strip_tags($msg));?>
		    <?php break;?>
		    <?php case 0:?>
		    <h1>后台管理系统-信息提示</h1>
		    <i class="icon-frown-o"></i><?php echo(strip_tags($msg));?>
		    <?php break;?>
		<?php } ?>
    </div>
    <h4 class="smaller">页面自动 <a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b></h4>
</div>

<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
</script>
</body>
</html>

