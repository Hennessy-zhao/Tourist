<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
	<link href="/tourist/Public/css/bootstrap.min.css" rel="stylesheet">
	<script src="/tourist/Public/js/jquery-1.10.2.min.js"></script>
    <script src="/tourist/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/tourist/Public/css/admin/main.css">
</head>
<body>

	<header class="col-md-12">
		
	</header>
	<div class="row" style="padding:0px;margin:0px;">
		<aside class="col-md-2">
			<a class="selected" href="<?php echo U('Admin/User/index','','');?>" target="managepage"><span class="glyphicon glyphicon-user"></span>用户管理</a>
			<a href="<?php echo U('Admin/Suggest/index','','');?>" target="managepage"><span class="glyphicon glyphicon-user"></span>投诉管理</a>
			<a href="<?php echo U('Admin/Order/index','','');?>" target="managepage"><span class="glyphicon glyphicon-list"></span>订单管理</a>
			<a href="<?php echo U('Admin/Route/index','','');?>" target="managepage"><span class="glyphicon glyphicon-list-alt"></span>旅游路线管理</a>
			</ul>
		</aside>
		<section class="col-md-10" style="padding: 0px;height:90vh;" >
			<iframe  src="<?php echo U('Admin/User/index','','');?>" name="managepage" frameborder="0" width="99%" height="100%" scrolling="yes"></iframe>
		</section>
	</div>

	<script>
		$(function(){
			$("aside > a").on("click",function(){
				$("aside > a").removeClass("selected");
				$(this).addClass("selected");
			})
		})
	</script>
</body>
</html>