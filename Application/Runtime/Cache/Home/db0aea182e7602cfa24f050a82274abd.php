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
		<a href="<?php echo U('Index/hello');?>"><button type="button" class="btn btn-info back">返回</button></a>
		<div class="col-md-12 add">
			<h4>修改密码</h4>
			<hr>
			<form class="add-form" method="post" action="/homeworks/index.php/Home/Users/alters">
				<div class="control-group">
					<label class="control-label" for="inputPwd">请输入原密码</label>
					<input type="password" name="password" class="form-control" placeholder="密码">
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPwd">请输入新密码</label>
					<input type="password" name="newpassword" class="form-control" placeholder="新密码">
				</div>
				<button type="submit" class="btn btn-success">修改</button>
			</form>
		</div>
	</div>
</body>

</html>