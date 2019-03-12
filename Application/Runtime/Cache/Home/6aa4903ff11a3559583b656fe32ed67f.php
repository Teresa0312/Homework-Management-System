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
			<a href=<?php echo U( 'Questions/adds');?> ><button type="button" class="btn btn-info back" id="add">添加题目</button></a>
			<table class="table table-hover table-striped">
				<tr>
					<th>ID</th>
					<th>类型</th>
					<th>题目</th>
					<th>开始时间</th>
					<th>结束时间</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($data)): foreach($data as $key=>$val): ?><tr id="t<?php echo ($val["id"]); ?>">
						<td>
							<?php echo ($val["id"]); ?>
						</td>
						<td>
							<?php if(is_array($tdata)): foreach($tdata as $key=>$v): if($val["typeid"] == $v["id"]): echo ($v["name"]); endif; endforeach; endif; ?>
						</td>
						<td>
							<?php echo ($val["name"]); ?>
						</td>
						<td>
							<?php echo ($val["stime"]); ?>
						</td>
						<td>
							<?php echo ($val["etime"]); ?>
						</td>
						<td>
							<a href=<?php echo U( 'Questions/updates?id='.$val[ 'id']);?> ><button class="btn btn-primary">修改</button></a>
							<button class="btn btn-danger" onclick="deletes(<?php echo ($val["id"]); ?>)">删除</button>
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
</script>