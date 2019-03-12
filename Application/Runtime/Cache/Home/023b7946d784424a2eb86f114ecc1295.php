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
		<a href=<?php echo U( 'Types/lists');?> ><button type="button" class="btn btn-info back pull-left" id="add">题目类型列表</button></a>

		<div class="col-md-10 add" style="margin-top: 20px;">
			<form class="add-form" method="post" action="/homeworks/index.php/Home/Types/updates/id/6.html">
				<div class="col-md-6 add">

					<div class="input-group">
						<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
						<input type="text" name="name" class="form-control" value="<?php echo ($data["name"]); ?>">
						<span class="input-group-btn">
				    <button type="submit" class="btn btn-success" id="add">修改</button>
				</span>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>