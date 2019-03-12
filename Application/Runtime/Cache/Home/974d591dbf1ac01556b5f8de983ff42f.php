<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" href="/homeworks/Public/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/homeworks/Public/css/frame.css" />
	</head>

	<body>
		<a href=<?php echo U( 'Questions/lists');?> ><button type="button" class="btn btn-info back pull-left" id="add">题目列表</button></a>
		<div class="container-fluid">

			
			<div class="col-md-10 add" style="margin-top: 20px;">
				<h4>添加题目</h4>
				<hr>
				<form class="add-form" method="post" action="/homeworks/index.php/Home/Questions/updates/id/11.html">
					<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />

					<div class="control-group">
						<label class="control-label" for="inputTitle">选择题目类型</label>
						<select class="form-control" name="typeid">
							<?php if(is_array($tdata)): foreach($tdata as $key=>$val): ?><option value="<?php echo ($val["id"]); ?>" <?php if($data["typeid"] == $val["id"]): ?>selected=selected<?php endif; ?> >
									<?php echo ($val["name"]); ?>
								</option><?php endforeach; endif; ?>
						</select>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEnd">题目名称</label>
						<input type="text" name="name" class="form-control"  placeholder="题目 " value="<?php echo ($data["name"]); ?>" >
					</div>
					<div class="control-group">
						<label class="control-label" for="inputContent">请输入题目内容</label><br/>
						<textarea id="myEditor" name="content" class="textarea"><?php echo ($data["content"]); ?></textarea>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputStart">请输入开始时间</label>
						<input type="text" name="stime" class="form-control" id="inputStart" placeholder="开始时间" value="<?php echo ($data["stime"]); ?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})">
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEnd">请输入结束时间</label>
						<input type="text" name="etime" class="form-control" id="inputEnd" placeholder="结束时间 " value="<?php echo ($data["etime"]); ?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})">
					</div>

					<button type="submit" class="btn btn-success">修改题目</button>
				</form>
			</div>
		</div>
	</body>
	<script language="javascript" type="text/javascript" src="/homeworks/Public/My97DatePicker/WdatePicker.js"></script>
	<link href="/homeworks/Public/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="/homeworks/Public/ueditor/third-party/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="/homeworks/Public/ueditor/umeditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="/homeworks/Public/ueditor/umeditor.min.js"></script>
	<script type="text/javascript" src="/homeworks/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript">
		UM.getEditor('myEditor', {
			initialFrameWidth: "100%",
			initialFrameHeight: 400

		});
	</script>

</html>