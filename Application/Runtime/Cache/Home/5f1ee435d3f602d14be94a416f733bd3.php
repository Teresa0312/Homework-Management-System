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
		<div class="col-md-12 col-xs-12 nopadding">

			<div class="col-md-3 col-xs-12 nopadding" style="margin-left: 40%;margin-top: 10%;">
				<h4 style="color:red"><b><?php echo ($username); ?></b></h4>
				<h5>欢迎登陆WEB组作业提交系统</h5>
				<h5>做题总数:<?php echo ($sum); ?></h5>
				<h5 style="color:red;">
				<marquee direction="left" behavior="scroll"><b>修改答案功能和截止做题功能已上线</b></marquee>
				</h5>
			</div>
		</div>

	</div>
</body>

</html>