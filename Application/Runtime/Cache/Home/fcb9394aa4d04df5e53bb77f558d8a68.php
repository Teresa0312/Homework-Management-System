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
		<div class="table-responsive">
			<a href=<?php echo U( 'Users/adds');?> ><button type="button" class="btn btn-info back" id="add">添加用户</button></a>
			<table class="table table-hover table-striped">
				<tr>
					<th>账号</th>
					<th>用户名</th>
					<th>期数</th>
					<th>做题总数</th>
					<th>操作</th>
					<th>设置管理员</th>
				</tr>
				<?php if(is_array($data)): foreach($data as $key=>$val): ?><tr id="t<?php echo ($val["id"]); ?>">
						<td>
							<?php echo ($val["account"]); ?>
						</td>
						<td>
							<?php echo ($val["username"]); ?>
						</td>
						<td>
							<?php echo ($val["usernum"]); ?>
						</td>
						<td><?php echo ($val["count"]); ?></td>
						<td>
							<?php if($val["flag"] != 1): ?><a href=<?php echo U( 'Users/updates?id='.$val[ 'id']);?> ><button class="btn btn-primary">修改</button></a>
								<?php else: ?>
								<span style="color:red;"> 超级管理员</span><?php endif; ?>

							<?php if($val["flag"] != 1): ?><button class="btn btn-danger" onclick="deletes(<?php echo ($val["id"]); ?>)">删除</button><?php endif; ?>
						</td>
						<td>

							<?php if($val["flag"] == 1): ?><span style="color:red;"> 超级管理员</span><?php endif; ?>

							<?php if($val["flag"] == 2): ?><button class="btn btn-warning" onclick="clears(<?php echo ($val["id"]); ?>)">撤销管理员</button><?php endif; ?>

							<?php if($val["flag"] == 0): ?><button class="btn btn-success" onclick="set(<?php echo ($val["id"]); ?>)">设置管理员</button><?php endif; ?>
						</td>
					</tr><?php endforeach; endif; ?>
				<tr>
					<td align="center" colspan="5">
						<?php echo ($page); ?>
					</td>
				</tr>
			</table>
		</div>

	</div>
</body>

</html>
<script type="text/javascript" src="/homeworks/Public/js/jquery.js"></script>
<script type="text/javascript" src="/homeworks/Public/js/bootstrap.min.js"></script>
<script type="text/javascript">
	function deletes(id) {

		if(!confirm('您确定要删除？')) {
			return false;
		}
		$.ajax({
			type: "get",
			dataType: 'json',
			url: "<?php echo U('dels', '', FALSE); ?>/id/" + id,
			success: function(data) {
				alert(data.msg);
				var tid = '#t' + id;
				$(tid).remove();
				window.location.reload();

			}
		});
	}
	
		function set(id) {

		$.ajax({
			type: "get",
			dataType: 'json',
			url: "<?php echo U('sets', '', FALSE); ?>/id/" + id,
			success: function(data) {
				console.log(data);
				alert(data.msg);
				window.location.reload();

			}
		});
	}

	function clears(id) {

		$.ajax({
			type: "get",
			dataType: 'json',
			url: "<?php echo U('clears', '', FALSE); ?>/id/" + id,
			success: function(data) {
				console.log(data);
				alert(data.msg);
				window.location.reload();

			}
		});
	}
</script>