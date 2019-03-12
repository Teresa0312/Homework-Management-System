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
	<div class="container main">
		<!--
    <a href="question.html"><button type="button" class="btn btn-info" id="add">返回题目列表</button></a>
--><ul class="list-group" >
    <li class="list-group-item" style="background:#F0F8FF;"><span class="span">题目类型:</span><span class="spans">    <?php if(is_array($tdata)): foreach($tdata as $key=>$val): if($qdata["typeid"] == $val['id']): echo ($val["name"]); endif; endforeach; endif; ?></span></li>
			<li class="list-group-item" style="background:#F0F8FF;"><span class="span">题目名称:</span><span class="cons"><?php echo ($qdata["name"]); ?></span></li>
			<li class="list-group-item" style="background:#F0F8FF;"><span class="span">题目内容:</span>
				<textarea id="myEditor1" name="content" class="textarea"><?php echo ($qdata["content"]); ?></textarea>
			</li>
			<li class="list-group-item" style="background:#F0F8FF;"><span class="span">开始时间:</span><span class="spans"><?php echo ($qdata["stime"]); ?></span></li>
			<li class="list-group-item" style="background:#F0F8FF;"><span class="span">结束时间:</span><span class="spans"><?php echo ($qdata["etime"]); ?></span></li>
		</ul>

		<div class="col-md-12 question">
			<?php if(is_array($data)): foreach($data as $key=>$val): ?><label for="myEditor">
		<?php if(is_array($udata)): foreach($udata as $key=>$v): if($val["uid"] == $v['id']): ?><span class="titles">提交人：</span><span class="cons"><?php echo ($v["username"]); ?>	
		<span class="titles">期数：</span><span class="cons"><?php echo ($v["usernum"]); ?>	
		<span class="titles">提交时间：</span><span class="cons"><?php echo ($val["time"]); ?>	
			<?php if($v['id']==$id): ?><a href=<?php echo U('Passwords/updates?id='.$val['id']);?>><button class="btn btn-success"> 修改答案</button></a><?php endif; endif; endforeach; endif; ?>
	  	</label>
				<div class="form-group">
					<textarea id="myEditor" name="content" class="textarea"><?php echo ($val["content"]); ?></textarea>

				</div><?php endforeach; endif; ?>

		</div>
	</div> 
	<label style="text-align:center;width:100%;">
				<?php echo ($page); ?>
	</label>
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
		readonly: true,
		toolbar: [],
		initialFrameHeight: 8

	});
	UM.getEditor('myEditor1', {
		initialFrameWidth: "100%",
		readonly: true,
		toolbar: [],
		initialFrameHeight: 8

	});
</script>

</html>