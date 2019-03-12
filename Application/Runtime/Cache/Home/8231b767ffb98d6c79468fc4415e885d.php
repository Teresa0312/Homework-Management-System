<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" href="/homeworks/Public/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/homeworks/Public/css/home.css" />
		<link rel="stylesheet" type="text/css" href="/homeworks/Public/css/nav.css" />
		<link rel="stylesheet" type="text/css" href="/homeworks/Public/css/styles.css" />

	</head>
	

<body>
	<div class="container-fluid">
		<a href="<?php echo U('Users/lists');?>"><button type="button" class="btn btn-info back" id="add">返回用户列表</button></a>
		<div class="col-md-12 add">
			<form class="add-form" method="post" action="/homeworks/index.php/Home/Users/adds.html">
				<div class="control-group">
					<label class="control-label" for="inputTrueName">请输入账号</label>
					<input type="text" name="account" class="form-control" placeholder="账号">
				</div>
				<div class="control-group">
					<label class="control-label" for="inputName">请输入用户名</label>
					<input type="text" name="username" class="form-control" placeholder="用户名">
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPwd">请输入密码</label>
					<input type="password" name="password" class="form-control" placeholder="密码">
				</div>
				<div class="control-group">
					<label class="control-label" for="inputTrueName">请输入期数</label>
					<input type="text" name="usernum" class="form-control" placeholder="第几期">
				</div>
				<button type="submit" class="btn btn-success" id="add">添加</button>
			</form>
		</div>
	</div>
</body>

</html>