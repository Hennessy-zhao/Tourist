<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
	<link href="/tourist/Public/css/bootstrap.min.css" rel="stylesheet">
	<script src="/tourist/Public/js/jquery-1.10.2.min.js"></script>
    <script src="/tourist/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/tourist/Public/css/admin/login.css">
</head>
<body>

	<div class="col-md-4 col-md-offset-4" id="login">
		<div class="col-md-12" id="titles">
			<h3>Login</h3>
		</div>
		<div class="col-md-12" id="content">
			<input type="text" id="names" placeholder="请输入你的用户名">
			<input type="password" id="passwords" placeholder="请输入你的密码">

			<center><a id="submit" href="<?php echo U('Admin/Index/main','','');?>" class="btn btn-primary">管理员登陆</a></center>
		</div>
	</div>

	<script>
		$(function(){
			$("#submit").click(function(){
				$name=$("#names").val();
				$password=$("#passwords").val();
				if ($name!="admin" || $password!="123456") {
					alert("用户名或密码错误");
					return false;
				}
			})
		})
	</script>
	
</body>
</html>