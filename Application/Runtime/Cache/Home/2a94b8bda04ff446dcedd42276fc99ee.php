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
	<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
		<a href="" class="logo">WEB组作业提交系统</a>
		<ul class="nav navbar-nav navbar-right user">
			<li id="timeShow" class="time"></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<?php echo ($username); ?><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo U('Users/alterpwd');?>"  target="myIframe">修改密码</a>
						<a href="<?php echo U('Login/logout');?>">退出</a>
					</li>
				</ul>
			</li>

			<script type="text/javascript">
				var t = null;
				t = setTimeout(time, 1000); //开始执行
				function time() {
					clearTimeout(t); //清除定时器
					dt = new Date();
					var year = dt.getFullYear();
					var month = dt.getMonth();
					var day = dt.getDate();
					var h = dt.getHours();
					var m = dt.getMinutes();
					var s = dt.getSeconds();
					document.getElementById("timeShow").innerHTML = year + "年" + (month+1) + "月" + day + "日" + h + ":" + m + ":" + s;
					t = setTimeout(time, 1000); //设定定时器，循环执行             
				}
			</script>
		</ul>
		</div>
		<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	<div class="container-fluid main">
		<div class="col-md-2 main-left" id="nav-left">
			<div class="col-md-12 nopadding">

				<ul class="list-group nav-left" id="nav-left">
					<li>
							<audio src="/homeworks/Public/music/one.mp3" loop="loop"  autoplay="autoplay" controls="controls">
										您的浏览器不支持播放音乐
							</audio>
					</li>
					<?php if($flag == 1): ?><li>
							<a href=<?php echo U( 'Users/lists');?> class="list-group-item li-active" target="myIframe">用户管理</a>
						</li>
						<li>
							<a href=<?php echo U( 'Types/lists');?> class="list-group-item li-active" target="myIframe">题目类型管理</a>
						</li>
						<li>
							<a href=<?php echo U( 'Questions/lists');?> class="list-group-item li-active" target="myIframe">题目管理</a>
						</li>
						<li >
							<a style="background-color: #d6d3e6;" href="https://c.runoob.com/compile/1" class="list-group-item li-active" target="myIframe">代码测试</a>
						</li><?php endif; ?>
					<?php if(is_array($tdata)): foreach($tdata as $key=>$val): ?><li>
							<a href="<?php echo U('Questions/qlists?tid='.$val['id']);?>" class="list-group-item li-active" target="myIframe">
								<?php echo ($val["name"]); ?>
							</a>
						</li><?php endforeach; endif; ?>

				</ul>
			</div>
		</div>

		<div class="col-md-10 nopadding frame-bor">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="<?php echo U('Index/hello');?>" name="myIframe"></iframe>
			</div>
		</div>
	</div>

</body>

</html>
<script type="text/javascript" src="/homeworks/Public/js/jquery.js"></script>
<script type="text/javascript">
	var liActive = $("li").filter("#li-active");
	var liHidden = $("li").filter("#li-hidden");
	for(var i = 0; i < liActive.length; i++)
		liActive[i].index = i;
	liActive.on('click', function(event) {
		dropDown(event);
	});

	function dropDown(event) {
		var index = event.target.index;
		if($(liHidden[index]).css("display") == "none") {
			$(liHidden[index]).slideDown();
			$(liActive[index]).css("border-left", "4px solid #E46F61");
			$(event.target).attr("class", "dropup list-group-item li-active");
		} else {
			$(liHidden[index]).slideUp();
			$(liActive[index]).css("border-left", "4px solid #2AB4D7");
			$(event.target).attr("class", "list-group-item li-active");
		}
	}
</script>
<script type="text/javascript" src="/homeworks/Public/js/bootstrap.min.js"></script>