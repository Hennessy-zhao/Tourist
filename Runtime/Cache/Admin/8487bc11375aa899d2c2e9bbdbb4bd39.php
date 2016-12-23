<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="/tourist/Public/css/bootstrap.min.css" rel="stylesheet">
	<script src="/tourist/Public/js/jquery-2.1.4.min.js"></script>
    <script src="/tourist/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/tourist/Public/css/admin/user_look.css">
</head>
<body>
	<header class="col-md-12">
		<a href="<?php echo U('Admin/User/index','','');?>">
			<span class="glyphicon glyphicon-home"></span>
			主页
		</a>

		<a href="<?php echo U('Admin/User/index','','');?>">
			>&nbsp;&nbsp;
			用户管理
		</a>

		<a href="#">
			>&nbsp;&nbsp;
			用户信息
		</a>
	</header>

	<section class="col-md-12">
		<div class="col-md-12 onemsg">
			<label>用户名：</label>
			<?php echo ($user["username"]); ?>
		</div>
		<div class="col-md-12 onemsg">
			<label>姓名：</label>
			<?php echo ($user["truename"]); ?>
		</div>
		<div class="col-md-12 onemsg">
			<label>邮箱：</label>
			<?php echo ($user["email"]); ?>
		</div>
		<div class="col-md-12 onemsg">
			<label>电话：</label>
			<?php echo ($user["phone"]); ?>
		</div>
		<div class="col-md-12 onemsg">
			<label>身份证号：</label>
			<?php echo ($user["idnumber"]); ?>
		</div>
		<div class="col-md-12 onemsg">
			<label>性别：</label>
			<?php echo ($user["sex"]); ?>
		</div>
		<div class="col-md-12 onemsg">
			<label>家庭住址：</label>
			<?php echo ($user["address"]); ?>
		</div>
		<div class="col-md-12 onemsg">
			<label>参与路线数：</label>
			<?php echo ($user["ordercount"]); ?>
		</div>
		<div class="col-md-12 onemsg">
			<label>投诉数：</label>
			<?php echo ($user["advisecount"]); ?>
		</div>

		<div class="col-md-12">
			<h3><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;向他发送邮件</h3>
			<textarea class="form-control" rows="3" style="width: 60%;"></textarea>
			<br>
			<button class="btn btn-primary">发送</button>
		</div> 
	</section>
</body>
</html>