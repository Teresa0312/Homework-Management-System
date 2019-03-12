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
	
<link rel="stylesheet" type="text/css" href="/homeworks/Public/css/index.css" />

<body>
	<div class="container">
		<div class="col-md-3">
		</div>
		<div class="col-md-6 loginForm">
			<legend>
				<h2>WEB组作业提交系统后台管理</h2></legend>
			<form class="login" method="post" action="/homeworks/index.php/Home/Login/login">
				<div class="control-group">
					<label class="control-label" for="inputName">账号</label>
					<input type="text" name="account" class="form-control" id="inputName" placeholder="账号">
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPassword">密码</label>
					<input type="password" name="password" class="form-control" id="inputPassword" placeholder="密码">
				</div>
				<div class="control-group">
					<input type="submit" class="btnLogin" value="登录" \></input>
				</div>
			</form>
		</div>
	</div>
	<!-- container end -->
</body>

</html>