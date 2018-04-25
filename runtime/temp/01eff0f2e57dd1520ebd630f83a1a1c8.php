<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:61:"D:\B\AppServ\www\blog/application/admin\view\admin\admin.html";i:1524019769;s:63:"D:\B\AppServ\www\blog/application/admin\view\Public\header.html";i:1524129480;s:62:"D:\B\AppServ\www\blog/application/admin\view\Public\aside.html";i:1524014121;s:68:"D:\B\AppServ\www\blog/application/admin\view\Public\loginRecord.html";i:1524130899;s:63:"D:\B\AppServ\www\blog/application/admin\view\Public\wechat.html";i:1524130402;s:63:"D:\B\AppServ\www\blog/application/admin\view\Public\prompt.html";i:1517304229;}*/ ?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>管理员 - Babysbreath博客管理系统</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/css/beyond.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="__PUBLIC__admin/images/icon/icon.png">
<link rel="shortcut icon" href="__PUBLIC__admin/images/icon/favicon.ico">
<script src="__PUBLIC__admin/js/jquery-2.1.4.min.js"></script>
</head>

<body class="admin-select">
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
    <h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a data-toggle="modal" data-target="#addAdmin">增加管理员</a></li>
        </ol>
        <h1 class="page-header">管理 <span class="badge"><?php echo \think\Request::instance()->session('adminCount'); ?></span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th width="100"><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">ID</span></th>
                <th><span class="glyphicon glyphicon-bookmark"></span> <span class="visible-lg">姓名</span></th>
                <th><span class="glyphicon glyphicon-admin"></span> <span class="visible-lg">用户名</span></th>
                <th><span class="glyphicon glyphicon-bookmark"></span> <span class="visible-lg">职位</span></th>
                <th width="200"><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">创建时间</span></th>
                <th width="200"><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">上次登录时间</span></th>
				<th class="text-center" style="width:10%;">启用状态</th>
                <th width="150"><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
             <?php if(is_array($AdminData) || $AdminData instanceof \think\Collection || $AdminData instanceof \think\Paginator): $i = 0; $__LIST__ = $AdminData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?>
              <tr id="adminId_<?php echo $a['adminId']; ?>">
                <td><?php echo $a['adminId']; ?></td>
                <td><?php echo $a['adminName']; ?></td><!-- 管理员名    -->
                <td><?php echo $a['loginName']; ?></td><!-- 登录账号 -->
                <td><?php echo $a['position']; ?></td>	  <!-- 职位 -->
                <td><?php echo $a['addTime']; ?></td>
                <td><?php echo $a['lastLoginTime']; ?></td>
                <td style="text-align: center;">
                <?php if($a['adminId'] != \think\Request::instance()->session('adminId')): ?>
                   <label>
                     <input class="checkbox-slider slider-icon colored-blue status" id="status_<?php echo $a['adminId']; ?>" value="<?php echo $a['status']; ?>" name="status" type="checkbox" <?php if($a['status'] == 1): ?> checked <?php endif; ?>>
                     <span class="text" id="slider" onclick='status(<?php echo $a['adminId']; ?>)'></span>
                   </label>
                <?php else: ?>
                	<p style="font-style: italic;color: #8c8c8c;">不可操作</p>
                <?php endif; ?>
                </td>
                <td><a rel="1" onclick="updadmin(<?php echo $a['adminId']; ?>)" data-toggle="modal" data-target="#upAdmin">
	                	<i class="fa fa-edit"></i> 修改　</a>
                    <a rel="1" onclick="deladmin(<?php echo $a['adminId']; ?>)">
	                	<i class="fa fa-trash-o"></i> 删除　</a>
                </td>
              </tr>
             <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
        </div>
    </div>
  </div>
</section>
<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="addadminModalLabel">
  <div class="modal-dialog" role="document" style="max-width:450px;">
    <form action="" method="post" autocomplete="off" draggable="false">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" >增加管理员</h4>
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
                <td wdith="20%">联系电话:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="contactNumber" name="contactNumber" maxlength="11" autocomplete="off" /></td>
              </tr>
              <tr>
              	<td width="20%">职位:</td>
              	<td width="80%">
              		<select id="position" name="position" style=" width:320px; border-radius: 5px; border-color: #ccc; height: 34px; padding: 6px 12px; outline: none;">
              			<option value="0">请选择管理员的职位</option>
              			<option value="1">1.文章管理</option>
              			<option value="2">2.栏目管理</option>
              			<option value="3">3.评论管理</option>
              			<option value="4">4.留言管理</option>
              			<option value="5">5.用户管理</option>
              			<option value="6">6.友情链接管理</option>
              		</select>
              	</td>
              </tr>
              <tr>
                <td wdith="20%">新密码:</td>
                <td width="80%"><input type="password" class="form-control" id="loginPassword" name="loginPassword" maxlength="18" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">确认密码:</td>
                <td width="80%"><input type="password" class="form-control" id="repeatPassword" name="repeatPassword" maxlength="18" autocomplete="off" /></td>
              </tr>
            </tbody>
            <tfoot>
              <tr></tr>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="submit" onclick="addSubmit()" id="submit" class="btn btn-primary">提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!--用户信息模态框-->
<div class="modal fade" id="upAdmin" tabindex="-1" role="dialog" aria-labelledby="seeadminModalLabel">
  <div class="modal-dialog" role="document" style="max-width:450px;">
    <form action="" method="post" autocomplete="off" draggable="false">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">修改管理员</h4>
        </div>
        <div class="modal-body">
          <table class="table" style="margin-bottom:0px;">
            <thead>
              <tr> </tr>
            </thead>
            <tbody>
              <tr>
                <td wdith="20%">姓名:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="up_adminName" name="adminName" maxlength="10" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">用户名:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="up_loginName" name="loginName" maxlength="10" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">电话:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="up_contactNumber" name="contactNumber" maxlength="11" autocomplete="off" /></td>
              </tr>
              <tr>
              	<td width="20%">职位:</td>
              	<td width="80%">
              		<select id="up_position" name="position" style=" width:320px; border-radius: 5px; border-color: #ccc; height: 34px; padding: 6px 12px; outline: none;">
              			<option value="1">1.文章管理</option>
              			<option value="2">2.栏目管理</option>
              			<option value="3">3.评论管理</option>
              			<option value="4">4.留言管理</option>
              			<option value="5">5.用户管理</option>
              			<option value="6">6.友情链接管理</option>
              		</select>
              	</td>
              </tr>
              <tr>
                <td wdith="20%">旧密码:</td>
                <td width="80%"><input type="password" class="form-control" id="oldAdminPassword" name="oldAdminPassword" maxlength="18" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">新密码:</td>
                <td width="80%"><input type="password" placeholder="留空则不做修改" class="form-control" id="loginPassword" name="loginPassword" maxlength="18" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">确认密码:</td>
                <td width="80%"><input type="password" class="form-control" id="repeatNewPassword" name="repeatPassword" maxlength="18" autocomplete="off" /></td>
              </tr>
            </tbody>
            <tfoot>
              <tr></tr>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="up_adminId" name="adminId" value="" />
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" onclick="upsubmit()" id="submit" class="btn btn-primary">提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="modal fade" id="deladmin" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 400px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="closeX" data-dismiss="modal" aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="adminModalLabel">
					删除用户
				</h4>
			</div>
			<div class="modal-body" id='delAdminBody'>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="close" data-dismiss="modal" >关闭 </button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--增加用户模态框-->
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
                <td width="80%"><input type="text" value="" class="form-control" id="infoAdminName" name="adminName" maxlength="10" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">用户名:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="infoLoginName" name="loginName" maxlength="10" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">电话:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="infoContactNumber" name="contactNumber" maxlength="13" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">旧密码:</td>
                <td width="80%"><input type="password" class="form-control" name="infoOldPassword" id="oldPassword" maxlength="18" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">新密码:</td>
                <td width="80%"><input type="password" class="form-control" name="infoLoginPassword" id="loginPassword" maxlength="18" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">确认密码:</td>
                <td width="80%"><input type="password" class="form-control" name="infoNewPassword" id="newPassword" maxlength="18" autocomplete="off" /></td>
              </tr>
            </tbody>
            <tfoot>
              <tr></tr>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="adminId" id="infoAdminId" value="" />
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" onclick="submitInfo()" class="btn btn-primary">提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="upInfo" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 400px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="closeX" data-dismiss="modal" aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="infoModalLabel">
					修改个人信息
				</h4>
			</div>
			<div class="modal-body" id='upInfoBody'>

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
<script src="__PUBLIC__admin/js/admin-scripts.js"></script><script>
function updadmin(adminId){
	$.get('__URL__/updateAdminData',{'adminId':adminId},function(data){
		var d = JSON.parse(data);
		document.getElementById('up_adminName').value = d.adminName;
		document.getElementById('up_loginName').value = d.loginName;
		document.getElementById('up_contactNumber').value = d.contactNumber;
		document.getElementById('up_adminId').value = d.adminId;
		document.getElementById('up_position').value = d.position;
	});
}

function upsubmit(){
	var uAdminId = $('#up_adminId').val();
	var uAdmName = $('#up_adminName').val();
	var uLogName = $('#up_loginName').val();
	var uCttNum = $('#up_contactNumber').val();
	var oAdmPwd = $('#oldAdminPassword').val();
	var aDmnPwd = $('#loginPassword').val();
	var rAdmPwd = $('#repeatNewPassword').val();
	var uPosition = $('#up_position').val();

	var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
	var phone = $.trim(uCttNum);
	if (!phoneReg.test(phone)) {
	  alert('请输入有效的手机号码！');
	  return false;
	}

	if(oAdmPwd != '' && aDmnPwd != '' && rAdmPwd != '' && aDmnPwd == rAdmPwd){
		$.post('__URL__/updateAdminData',{'adminId':uAdminId,'adminName':uAdmName,'loginName':uLogName,'contactNumber':uCttNum,'oldAdminPassword':oAdmPwd,'loginPassword':aDmnPwd,'repeatPassword':rAdmPwd,'position':uPosition},function(info){
		var d = JSON.parse(info);
		if(d.code == 1){
			$('#adminModalLabel').html('修改管理员');
			$('#delAdminBody').html(d.message);
			$('#deladmin').modal('show');
			$('#upAdmin').modal('hide');
			setTimeout("location.reload()",1500);
			}
		});
	}else if(oAdmPwd == '' || aDmnPwd == '' && rAdmPwd == ''){
		$.post('__URL__/updateAdminData',{'adminId':uAdminId,'adminName':uAdmName,'loginName':uLogName,'contactNumber':uCttNum,'oldAdminPassword':0,'loginPassword':0,'repeatPassword':0,'position':uPosition},function(info){
			var d = JSON.parse(info);
			if(d.code == 1){
				$('#adminModalLabel').html('修改管理员');
				$('#delAdminBody').html(d.message);
				$('#deladmin').modal('show');
				$('#upAdmin').modal('hide');
				setTimeout("location.reload()",1500);
				}
			});
	}else{
   	  alert('密码错误!');
   	  return false;
	}

}

function addSubmit(){
	//var uAdminId = $('#adminId').val();
	var uAdmName = $('#adminName').val();
	var uLogName = $('#loginName').val();
	var uCttNum = $('#contactNumber').val();
	var aDmnPwd = $('#loginPassword').val();
	var rAdmPwd = $('#repeatPassword').val();
	var uPosition = $('#position').val();

	var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
	//电话
	var phone = $.trim(uCttNum);
	if (!phoneReg.test(phone)) {
	  alert('请输入有效的手机号码！');
	  return false;
	}

	if(aDmnPwd != '' && rAdmPwd != '' && aDmnPwd == rAdmPwd){
		$.post('__URL__/addAdmin',{'adminName':uAdmName,'loginName':uLogName,'contactNumber':uCttNum,'loginPassword':aDmnPwd,'repeatPassword':rAdmPwd,'position':uPosition},function(info){
			var d = JSON.parse(info);
			if(d.code == 1){
				alert(d.message);
				/* $('#delAdminBody').html(d.message);
				$('#deladmin').modal('show'); */
				setTimeout("location.reload()",1500);
			}
		});
	}else{
   	  alert('密码错误!');
   	  return false;
	}

}

function deladmin(adminId){
	var c = confirm("确定要删除此管理员吗?");
	if(c == true){
		$.post('__URL__/delAdmin',{'adminId':adminId},function(data){
			var d = JSON.parse(data);
			if(d.code == 1){
				$('#delAdminBody').html(d.message);
				$('#deladmin').modal('show');
				$('#adminId_'+adminId).remove();
			}else{
				$('#delAdminBody').html(d.message);
				$('#deladmin').modal('show');
			}
		});
	}
    return false;
}

function status(adminId){
	var sTatus = document.getElementById("status_"+adminId).value;
	$.post('__URL__/statusAdmin',{'adminId':adminId,'status':sTatus},function(info){
		var d = JSON.parse(info);//解析
		if(sTatus == 1){
			//alert(d.message);
			document.getElementById("status_"+adminId).value = d.message;
		}else if(sTatus == 0){
			//alert(d.message);
			document.getElementById("status_"+adminId).value = d.message;
		}else{
			alert(d.message);
		}
		//location.reload();
	});
}
</script>
<script>
function loginInfo(aid){
	$.get('__URL__/info',{'adminId':aid},function(data){
		var d = JSON.parse(data);
		document.getElementById('infoAdminId').value = aid;
		document.getElementById('infoAdminName').value = d.adminName;
		document.getElementById('infoLoginName').value = d.loginName;
		document.getElementById('infoContactNumber').value = d.contactNumber;
	});
}

function submitInfo(){
	var aAdmId = $('#infoAdminId').val();
	var aAdmName = $('#infoAdminName').val();
	var aLogName = $('#infoLoginName').val();
	var aCttNum = $('#infoContactNumber').val();
	var aAdmPwd = $('#infoOldPassword').val();
	var aLogPwd = $('#infoLoginPassword').val();
	var aNewPwd = $('#infoNewPassword').val();

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
				$('#infoModalLabel').html('信息提示');
				$('#upInfoBody').html(d.message);
				$('#upInfo').modal('show');
				$('#seeUserInfo').modal('hide');
				setTimeout('location.href = "<?php echo url('admin/Login/login'); ?>";',2000);
			}
		});
	}else if(aAdmPwd == '' || aLogPwd == '' && aNewPwd == ''){
		$.post('__URL__/info',{'adminId':aAdmId,'adminName':aAdmName,'loginName':aLogName,'contactNumber':aCttNum,'oldPassword':0,'loginPassword':0,'newPassword':0},function(info){
			var d = JSON.parse(info);
			if(d.code == 1){
				$('#infoModalLabel').html('信息提示');
				$('#upInfoBody').html(d.message);
				$('#upInfo').modal('show');
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
