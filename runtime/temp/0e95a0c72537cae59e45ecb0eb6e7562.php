<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:65:"D:\B\AppServ\www\blog/application/admin\view\setting\setting.html";i:1523453563;s:63:"D:\B\AppServ\www\blog/application/admin\view\Public\header.html";i:1524129480;s:62:"D:\B\AppServ\www\blog/application/admin\view\Public\aside.html";i:1524014121;s:61:"D:\B\AppServ\www\blog/application/admin\view\Public\info.html";i:1521016881;s:68:"D:\B\AppServ\www\blog/application/admin\view\Public\loginRecord.html";i:1524130899;s:63:"D:\B\AppServ\www\blog/application/admin\view\Public\wechat.html";i:1524130402;s:63:"D:\B\AppServ\www\blog/application/admin\view\Public\prompt.html";i:1517304229;}*/ ?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>常规设置 - Babysbreath博客管理系统</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/css/beyond.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="__PUBLIC__admin/images/icon/icon.png">
<link rel="shortcut icon" href="__PUBLIC__admin/images/icon/favicon.ico">
<script src="__PUBLIC__admin/js/jquery-2.1.4.min.js"></script>
<!--[if gte IE 9]>
  <script src="__PUBLIC__admin/js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="__PUBLIC__admin/js/html5shiv.min.js" type="text/javascript"></script>
  <script src="__PUBLIC__admin/js/respond.min.js" type="text/javascript"></script>
  <script src="__PUBLIC__admin/js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
<style>
	.checkbox{
	width: 219px;
    float: left;
    margin: 0 5px 0 5px;
    height: 80px;
	text-align:center;
	}
</style>
</head>

<body class="user-select">
<section class="container-fluid">
    <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="<?php echo url('Index/index'); ?>">Babysbreath</a> </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
  <!--           <li><a href="">消息 <span class="badge">1</span></a></li> -->
            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo \think\Request::instance()->session('loginName'); ?> <span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-menu-left">
                <li><a title="查看或修改个人信息" data-toggle="modal" onclick="loginInfo(<?php echo \think\Request::instance()->session('adminId'); ?>)" id="loginInfo"  data-target="#seeUserInfo">个人信息</a></li>
                <li><a title="查看您的登录记录" data-toggle="modal" data-target="#seeUserLoginlog" onclick="log(<?php echo \think\Request::instance()->session('adminId'); ?>)">登录记录</a></li>
              </ul>
            </li>
            <li><a href="<?php echo url('Login/login'); ?>" onClick="if(!confirm('是否确认退出？'))return false;">退出登录</a></li>
            <!-- <li><a data-toggle="modal" data-target="#WeChat">帮助</a></li> -->
          </ul>
          <!-- <form action="" method="post" class="navbar-form navbar-right" role="search">
            <div class="input-group">
              <input type="text" class="form-control" autocomplete="off" placeholder="键入关键字搜索" maxlength="15">
              <span class="input-group-btn">
              <button class="btn btn-default" type="submit">搜索</button>
              </span> </div>
          </form> -->
        </div>
      </div>
    </nav>
  </header>

  <div class="row">
  
    <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
      <ul class="nav nav-sidebar">
        <li><a href="<?php echo url('Index/index'); ?>">报告</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="<?php echo url('Article/article'); ?>">文章</a></li>
        <li><a href="<?php echo url('mood/mood'); ?>">心情随笔</a></li>
        <li><a class="dropdown-toggle" id="otherMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">图片</a>
          <ul class="dropdown-menu" aria-labelledby="otherMenu">
        	<li><a href="<?php echo url('imgs/index'); ?>">图片列表</a></li>
        	<li><a href="<?php echo url('imgs/img'); ?>">添加图片</a></li>
        	<li><a href="<?php echo url('imgs/imgRecovery'); ?>">图片回收站</a></li>
          </ul>
        </li>
        <li><a href="<?php echo url('Notice/notice'); ?>">公告</a></li>
        <li><a href="<?php echo url('Comment/comment'); ?>">评论</a></li>
        <li><a href="<?php echo url('Message/message'); ?>">网站留言</a></li>
        <!-- <li><a data-toggle="tooltip" data-placement="bottom" title="网站暂无留言功能">留言</a></li> -->
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="<?php echo url('Cate/category'); ?>">栏目</a></li>
        <li><a class="dropdown-toggle" id="otherMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">其他</a>
          <ul class="dropdown-menu" aria-labelledby="otherMenu">
            <li><a href="<?php echo url('Flink/flink'); ?>">友情链接</a></li>
            <li class="disabled"><a data-toggle="modal" data-target="#areDeveloping">访问记录</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">管理员</a>
          <ul class="dropdown-menu" aria-labelledby="userMenu">
            <li><a href="<?php echo url('admin/admin'); ?>">管理员</a></li>
            <li><a href="<?php echo url('Auth_rule/lst'); ?>">权限管理</a></li>
            <li><a href="<?php echo url('Auth_group/lst'); ?>">用户组管理</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo url('admin/adminLog'); ?>">管理员日志</a></li>
          </ul>
        </li>
        <li><a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用户</a>
          <ul class="dropdown-menu" aria-labelledby="userMenu">
            <!-- <li><a data-toggle="modal" data-target="#areDeveloping">管理用户组</a></li> -->
            <li><a href="<?php echo url('User/user'); ?>">管理用户</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo url('User/userLog'); ?>">用户日志</a></li>
          </ul>
        </li>
        <li><a class="dropdown-toggle" id="settingMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">设置</a>
          <ul class="dropdown-menu" aria-labelledby="settingMenu">
            <li><a href="<?php echo url('Setting/setting'); ?>">基本设置</a></li>
            <!-- <li class="disabled"><a href="<?php echo url('Readset/readset'); ?>">阅读设置</a></li>
            <li role="separator" class="divider"></li>
            <li class="disabled"><a data-toggle="modal" data-target="#areDeveloping">安全配置</a></li> -->
            <li role="separator" class="divider"></li>
            <li class="disabled"><a>扩展菜单</a></li>
          </ul>
        </li>
      </ul>
    </aside>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        <form action="<?php echo url('Setting/setting'); ?>" method="post" enctype="multipart/form-data">
          <div class="col-md-9">
            <h1 class="page-header">网站设置</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点标题</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="title" class="form-control" placeholder="请输入站点标题" required autofocus autocomplete="off" value="<?php echo $conf['title']; ?>" />
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>网站负责人信息</span></h2>
              <div class="add-article-box-content" style="    height: 55px;">
                <input type="text" name="name" style="width:49%;float:left;" value="<?php echo $conf['name']; ?>" class="form-control" placeholder="请输入网站负责人名称" autocomplete="off" title="网站负责人名称"  />

                <input type="text" name="mobile" style="width:49%;float:right;" value="<?php echo $conf['mobile']; ?>" class="form-control" placeholder="请输入网站负责人电话号码" title="网站负责人电话号码" autocomplete="off" />
                <!-- <span class="prompt-text">用简洁的文字描述本站点。</span>  -->
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点地址（URL）</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="url" value="<?php echo $conf['url']; ?>" class="form-control" placeholder="在此处输入站点地址（URL）" required autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点关键字</span></h2>
              <div class="add-article-box-content">
                <textarea class="form-control" name="keywords" autocomplete="off"><?php echo $conf['keywords']; ?></textarea>
                <span class="prompt-text">关键字会出现在网页的keywords属性中。</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>站点描述</span></h2>
              <div class="add-article-box-content">
                <textarea class="form-control" name="description" rows="4" autocomplete="off"><?php echo $conf['description']; ?></textarea>
                <span class="prompt-text">描述会出现在网页的description属性中。</span> </div>
            </div>

            <div class="add-article-box checkbox" style="margin-top:-5px;">
              <h2 class="add-article-box-title"><span>是否允许评论</span></h2>
              <div class="add-article-box-content">
               	<label>

                	<input type="checkbox" name="comment" class="checkbox-slider slider-icon colored-blue status" value="1" <?php if($conf['comment'] == 1): ?> checked <?php endif; ?>/>

                     <span class="text" id="slider" onclick=''></span>
               	</label>
              </div>
            </div>

            <div class="add-article-box checkbox">
              <h2 class="add-article-box-title"><span>是否允许留言</span></h2>
              <div class="add-article-box-content">
               	<label>

	                <input type="checkbox" name="message" class="checkbox-slider slider-icon colored-blue status" value="1" <?php if($conf['message'] == 1): ?> checked <?php endif; ?>/>

	                <span class="text" id="slider" onclick=''></span>
                </label>
             </div>
            </div>

            <div class="add-article-box checkbox">
              <h2 class="add-article-box-title"><span>是否关闭网站</span></h2>
              <div class="add-article-box-content">
               	<label>

	                <input type="checkbox" name="close" class="checkbox-slider slider-icon colored-blue status" value="1" <?php if($conf['close'] == 1): ?> checked <?php endif; ?>/>

	                <span class="text" id="slider" onclick=''></span>
                </label>
              </div>
            </div>

            <div class="add-article-box checkbox">
              <h2 class="add-article-box-title"><span>是否启用验证码</span></h2>
              <div class="add-article-box-content">
               	<label>

	                <input type="checkbox" name="code" class="checkbox-slider slider-icon colored-blue status" value="1" <?php if($conf['code'] == 1): ?> checked <?php endif; ?>/>

	                <span class="text" id="slider" onclick=''></span>
                </label>
              </div>
            </div>

<!--             <div class="add-article-box checkbox">
              <h2 class="add-article-box-title"><span>是否可以上传图片</span></h2>
              <div class="add-article-box-content">
               	<label>

	                <input type="checkbox" name="uploadPic" class="checkbox-slider slider-icon colored-blue status" value="1" <?php if($conf['uploadPic'] == 1): ?> checked <?php endif; ?>/>

	                <span class="text" id="slider" onclick=''></span>
                </label>
              </div>
            </div> -->
          </div>

          <div class="col-md-3">
            <h1 class="page-header">站点</h1>

            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>logo</span></h2>
              <div class="add-article-box-content" id="imgDiv">
              	<input type="file" id="add-img" name="logo" />
              	<?php if($conf['logo'] != null): ?>
              		<img src="__PUBLIC__<?php echo $conf['logo']; ?>" title="logo" width="340px" />
              	<?php endif; ?>
              </div>
            </div>

            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>自动清除缓存</span></h2>
              <div class="add-article-box-content">
              	<select name="cache" >
              		<option value="0">暂不清除</option>
              		<option value="1">1</option>
              		<option value="2">2</option>
              		<option value="3">3</option>
              		<option value="4">4</option>
              		<option value="5">5</option>
              	</select>
              </div>
            </div>

            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>电子邮件地址</span></h2>
              <div class="add-article-box-content">
                <input type="email" name="email" class="form-control" value="<?php echo $conf['email']; ?>" placeholder="在此处输入邮箱" autocomplete="off" />
                <span class="prompt-text">这个电子邮件地址仅为了管理方便而填写</span> </div>
            </div>

            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>ICP备案号</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="beian" class="form-control" value="<?php echo $conf['beian']; ?>" placeholder="在此处输入备案号" autocomplete="off" />
              </div>
            </div>

            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>登录超时</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="logOverTime" class="form-control" value="<?php echo $conf['logOverTime']; ?>" placeholder="在此处输入超时时间(s)" value="3600" required autocomplete="off" />
                <span class="prompt-text">单位(秒),超时将强制退出</span> </div>
            </div>
            <button class="btn btn-primary" type="submit" style="float:right;">更新</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!--个人信息模态框-->
  
<div class="modal fade" id="seeUserInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form method="post" action="">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" >个人信息</h4>
        </div>
        <div class="modal-body">
          <table class="table" style="margin-bottom:0px;">
            <thead>
              <tr> </tr>
            </thead>
            <tbody>
              <tr>
                <td wdith="20%">姓名:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="adminName" name="adminName" maxlength="10" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">用户名:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="loginName" name="loginName" maxlength="10" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">电话:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="infoContactNumber" name="contactNumber" maxlength="13" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">旧密码:</td>
                <td width="80%"><input type="password" class="form-control" name="oldPassword" id="oldPassword" maxlength="18" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">新密码:</td>
                <td width="80%"><input type="password" class="form-control" name="loginPassword" id="loginPassword" maxlength="18" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">确认密码:</td>
                <td width="80%"><input type="password" class="form-control" name="newPassword" id="newPassword" maxlength="18" autocomplete="off" /></td>
              </tr>
            </tbody>
            <tfoot>
              <tr></tr>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="adminId" id="adminId" value="" />
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" onclick="submitInfo()" class="btn btn-primary">提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="upadmin" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 400px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="closeX" data-dismiss="modal" aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="adminModalLabel">
					修改个人信息
				</h4>
			</div>
			<div class="modal-body" id='upAdminBody'>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--个人登录记录模态框-->
  
<div class="modal fade" id="seeUserLoginlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >登录记录</h4>
      </div>
      <div class="modal-body">
        <table class="table" style="margin-bottom:0px;">
          <thead>
            <tr>
              <th>登录IP</th>
              <th>登录时间</th>
              <th>状态</th>
            </tr>
          </thead>
          <tbody id="tbody">
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">朕已阅</button>
      </div>
    </div>
  </div>
</div>
<script>
	function log(aid){
		$.post('__URL__/loginLog',{'aid' : aid},function(data){
			var d = JSON.parse(data);
			var dLen = d.message.length;
			if(d.code == 1){
				var tbody = document.getElementById('tbody');
				tbody.innerHTML = '';
				for(var i = 1; i < dLen; i++){
					if(d.message[i].operationStatus == 1){
						var dOpStatus = '成功';
					}
					var html = "<tr><td id='ip'>" + d.message[i].IP + "</td> <td id='time'>" + d.message[i].addTime + "</td> <td id='status'>" + dOpStatus + "</td></tr>";

					tbody.innerHTML += html;
				}
				$('#seeUserLoginlog').modal('show');
			}
		});
	}
</script>
<!--微信二维码模态框-->
  
<div class="modal fade user-select" id="WeChat" tabindex="-1" role="dialog" aria-labelledby="WeChatModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:120px;max-width:280px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="WeChatModalLabel" style="cursor:default;">微信扫一扫</h4>
      </div>
      <!-- <div class="modal-body" style="text-align:center"> <img src="__PUBLIC__admin/images/weixin.jpg" alt="" style="cursor:pointer"/> </div> -->
    </div>
  </div>
</div>
<!--提示模态框-->
  
<div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog" aria-labelledby="areDevelopingModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
      </div>
      <div class="modal-body"> <img src="__PUBLIC__admin/images/baoman/baoman_01.gif" alt="深思熟虑" />
        <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
      </div>
    </div>
  </div>
</div>
<script src="__PUBLIC__admin/js/bootstrap.min.js"></script>
<script src="__PUBLIC__admin/js/admin-scripts.js"></script>
<script>
function loginInfo(aid){
	$.get('__URL__/info',{'adminId':aid},function(data){
		var d = JSON.parse(data);
		document.getElementById('adminId').value = aid;
		document.getElementById('adminName').value = d.adminName;
		document.getElementById('loginName').value = d.loginName;
		document.getElementById('infoContactNumber').value = d.contactNumber;
	});
}

function submitInfo(){
	var aAdmId = $('#adminId').val();
	var aAdmName = $('#adminName').val();
	var aLogName = $('#loginName').val();
	var aCttNum = $('#infoContactNumber').val();
	var aAdmPwd = $('#oldPassword').val();
	var aLogPwd = $('#loginPassword').val();
	var aNewPwd = $('#newPassword').val();

	var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
	//电话
	var phone = $.trim(aCttNum);
	if (!phoneReg.test(phone)) {
	  alert('请输入有效的手机号码！');
	  return false;
	}

	if(aAdmPwd != '' && aLogPwd != '' && aNewPwd != '' && aLogPwd == aNewPwd){
		$.post('__URL__/info',{'adminId':aAdmId,'adminName':aAdmName,'loginName':aLogName,'contactNumber':aCttNum,'oldPassword':aAdmPwd,'loginPassword':aLogPwd,'newPassword':aNewPwd},function(info){
			var d = JSON.parse(info);
			if(d.code == 1){
				$('#adminModalLabel').html('信息提示');
				$('#upAdminBody').html(d.message);
				$('#upadmin').modal('show');
				$('#seeUserInfo').modal('hide');
				setTimeout('location.href = "<?php echo url('admin/Login/login'); ?>";',2000);
			}
		});
	}else if(aAdmPwd == '' || aLogPwd == '' && aNewPwd == ''){
		$.post('__URL__/info',{'adminId':aAdmId,'adminName':aAdmName,'loginName':aLogName,'contactNumber':aCttNum,'oldPassword':0,'loginPassword':0,'newPassword':0},function(info){
			var d = JSON.parse(info);
			if(d.code == 1){
				$('#adminModalLabel').html('信息提示');
				$('#upAdminBody').html(d.message);
				$('#upadmin').modal('show');
				$('#seeUserInfo').modal('hide');
				setTimeout('location.href = "<?php echo url('admin/Login/login'); ?>";',2000);
			}
		});
	}else{
   	  alert('密码错误!');
   	  return false;
	}
}
</script>
</body>
</html>