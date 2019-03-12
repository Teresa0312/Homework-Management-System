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

			<?php if(is_array($data)): foreach($data as $key=>$val): ?><div class="list-group">
					<a href="#" class="list-group-item active" style="height:auto">
						<h4 class="list-group-item-heading" style="height:auto">
            <?php echo ($val["name"]); ?>
        </h4>
					</a>
					<div href="#" class="list-group-item">

						<p class="list-group-item-text">
							<span class="titles" >题目类型:<span>
							<span class="cons">	
							<?php if(is_array($tdata)): foreach($tdata as $key=>$v): if($val["typeid"] == $v["id"]): echo ($v["name"]); endif; endforeach; endif; ?>
							</span>
							
							<span class="titles">开始时间:</span><span class="cons"><?php echo ($val["stime"]); ?></span>
							<span class="titles">结束时间:</span><span class="cons"><?php echo ($val["etime"]); ?></span>
						<button onclick="gets(<?php echo ($val["id"]); ?>)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo ($val["id"]); ?>">查看题目详情</button>
						</p>
						</a>

						<a href="#" class="list-group-item">

							<p class="list-group-item-text">
						

						<?php if($flag != 1 ): if($val["time"] == 'yes' ): if($val["add"] == 'y'): ?><a href=<?php echo U( 'Passwords/lists?id='.$val[ 'id']);?> onclick="" ><button class="btn btn-success">查看其它答案</button></a>
									<?php else: ?>
									<span style="color:red">请先做题</span><?php endif; ?>

								<?php if($val["add"] == 'n' ): ?><a href=<?php echo U( 'Passwords/adds?id='.$val[ 'id']);?> onclick="" ><button class="btn btn-success">添加答案</button></a>
									<?php else: ?>
									<span style="color:red">不可重复做题</span><?php endif; ?>
								<?php else: ?>
								<span style="color:red"><b>不在做题时间内 可查看或修改答案</b>	</span>
								<?php if($val["add"] == 'y'): ?><a href=<?php echo U( 'Passwords/lists?id='.$val[ 'id']);?> onclick="" ><button class="btn btn-success">查看其它答案</button></a><?php endif; endif; ?>

							<?php else: ?>	
							<a href=<?php echo U( 'Passwords/lists?id='.$val[ 'id']);?> onclick="" ><button class="btn btn-success">查看答案</button></a>
                            <a href=<?php echo U( 'Passwords/adds?id='.$val[ 'id']);?> onclick="" ><button class="btn btn-success">添加答案</button></a><?php endif; ?>	
							</p>
						</a>

					</div>

<div class="modal fade" id="myModal<?php echo ($val["id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel<?php echo ($val["id"]); ?>">
              <?php echo ($val["name"]); ?>
                </h4>
            </div>
            <div class="modal-body">
            	<textarea id="myEditor<?php echo ($val["id"]); ?>" name="content" class="textarea"><?php echo ($val["content"]); ?></textarea>            	

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
               
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
    </div><?php endforeach; endif; ?>
	
			</div>

		</div>
			<label style="text-align:center;width:100%;">
				<?php echo ($page); ?>
			</label>
			
	
</div>			
</body>

</html>

<script language="javascript" type="text/javascript" src="/homeworks/Public/My97DatePicker/WdatePicker.js"></script>
<link href="/homeworks/Public/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/homeworks/Public/ueditor/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/homeworks/Public/ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/homeworks/Public/ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="/homeworks/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript" src="/homeworks/Public/js/bootstrap.min.js"></script>
<script>

	
		
function gets(id){
	var ids='myEditor'+id;
	UM.getEditor(ids, {
		initialFrameWidth: "100%",
		readonly: true,
		toolbar: [],
		initialFrameHeight: 8

	});	
}
			
			
	/*	public function chenckAdd(id){
					return false; 
					if(!confirm('您确定要删除？')){
							  return false;
							}
						    $.ajax({
							type:"get",
							dataType:'json',
							url:"<?php echo U('dels', '', FALSE); ?>/id/"+id,			
							success:function(data){
								alert(data.msg);
								var tid='#t'+id;			
								$(tid).remove();	
								window.location.reload();						   
					}
				});			
				}
				
					public function chenckAll(id){
					
						if(!confirm('您确定要删除？')){
							  return false;
							}
						    $.ajax({
							type:"get",
							dataType:'json',
							url:"<?php echo U('dels', '', FALSE); ?>/id/"+id,			
							success:function(data){
								alert(data.msg);
								var tid='#t'+id;			
								$(tid).remove();	
								window.location.reload();						   
					}
				});				
				}
				*/
</script>