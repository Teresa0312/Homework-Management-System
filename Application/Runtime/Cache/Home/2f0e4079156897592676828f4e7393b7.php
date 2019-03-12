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
			<h4>修改用户</h4>
			<hr>
			<form class="add-form" method="post" action="/homeworks/index.php/Home/Users/updates/id/1.html">
				<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
				<div class="control-group">
					<label class="control-label" for="inputTrueName">请输入账号</label>
					<input type="text" name="account" class="form-control" id="inputTrueName" value="<?php echo ($data["account"]); ?>">
				</div>
				<div class="control-group">
					<label class="control-label" for="inputName">请输入用户名</label>
					<input type="text" name="username" class="form-control" id="inputName" value="<?php echo ($data["username"]); ?>">
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPwd">请输入密码</label>
					<input type="password" name="password" class="form-control" id="inputPwd" value="<?php echo ($data["password"]); ?>">
				</div>
				<div class="control-group">
					<label class="control-label" for="inputTrueName">请输入期数</label>
					<input type="text" name="usernum" class="form-control" id="inputTrueName" value="<?php echo ($data["usernum"]); ?>">
				</div>
				<button type="submit" class="btn btn-success">确认修改</button>
			</form>
		</div>
	</div>
</body>

</html>