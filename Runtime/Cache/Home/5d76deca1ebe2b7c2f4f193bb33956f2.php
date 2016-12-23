<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>注册</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<script src="/tourist/Public/js/jquery-2.1.4.min.js" ></script>
	<link  rel="stylesheet" href="/tourist/Public/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/tourist/Public/css/user/register.css">
	<script src="/tourist/Public/js/bootstrap.js" ></script>
	
</head>
<body ng-app="myapp">
	<div class="column">
		<div class="col-md-8 col-md-offset-2" id="logo">
			<img src="/tourist/Public/images/logo.png" id="biglogo" >
		</div>
		<div class="col-md-8 col-md-offset-2" style="padding-left:30px;padding-right:30px;">
			<div class="row">
				<div class="col-md-12" id="content" ng-controller="contentController">
					<div class="column">
						<div class="col-md-12" id="title">
							<p>欢迎注册畅游网会员，请填写以下内容，其中标注*为必填。<span style="float:right;"><a href="<?php echo U('Home/Index/index','','');?>" class="a1">登陆</a></span></p>
						</div>
						<div class="col-md-12" id="message">
							<form id="form1" action="<?php echo U('Home/User/register','','');?>" name="registerForm" method="post">
								<div class="row">
									<div class="col-md-3" id="form-left">
										*&nbsp;用&nbsp;户&nbsp;名&nbsp;:
									</div>
									<div class="col-md-5" id="form-middle">
										<div class="form-group">
											<input type="text" name="username" class="form-control" placeholder="请输入用户名" 
											required  ng-model="data.username" ng-minlength="4" ng-maxlength="16">
										</div>
									</div>
									<div class="col-md-4" id="form-right">
										<p class="errors" ng-show="registerForm.username.$error.minlength||registerForm.username.$error.maxlength">用户名长度在4~16个字范围内</p>
										<p class="errors" ng-show="repeatusername">此用户名已被使用，请选择其他用户名</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3" id="form-left">
										*&nbsp;姓&nbsp;名&nbsp;:
									</div>
									<div class="col-md-5" id="form-middle">
										<div class="form-group">
											<input type="text" name="truename" class="form-control" placeholder="请输入您的姓名" 
											required  ng-model="data.truename" pattern="[\u4E00-\u9FA5]{2,5}(?:·[\u4E00-\u9FA5]{2,5})*">
										</div>
									</div>
									<div class="col-md-4" id="form-right">
										<p class="errors" ng-show="registerForm.truename.$dirty&&registerForm.truename.$invalid">姓名格式错误</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3" id="form-left">
										*&nbsp;密&nbsp;码&nbsp;:
									</div>
									<div class="col-md-5" id="form-middle">
										<div class="form-group">
											<input type="password" name="password" class="form-control" placeholder="请输入密码" required ng-model="data.password" ng-minlength="6" ng-maxlength="20">
										</div>
									</div>
									<div class="col-md-4" id="form-right">
										<p class="errors" ng-show="registerForm.password.$error.minlength||registerForm.password.$error.maxlength">密码长度在6~20个字范围内</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3" id="form-left">
										*&nbsp;重&nbsp;复&nbsp;密&nbsp;码&nbsp;:
									</div>
									<div class="col-md-5" id="form-middle">
										<div class="form-group">
											<input type="password" name="repassword" class="form-control" placeholder="请再次输入密码" required ng-model="data.repassword">
										</div>
									</div>
									<div class="col-md-4" id="form-right">
										<p class="errors" ng-show="registerForm.repassword.$dirty&&data.password!=data.repassword">两次密码输入不一致</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3" id="form-left">
										*&nbsp;邮&nbsp;箱&nbsp;:
									</div>
									<div class="col-md-5" id="form-middle">
										<div class="form-group">
											<input name="email" type="email" class="form-control" placeholder="请输入邮箱" required ng-model="data.email">
										</div>
									</div>
									<div class="col-md-4" id="form-right">
										<p class="errors" ng-show="registerForm.email.$dirty&&registerForm.email.$invalid">邮箱格式错误</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3" id="form-left">
										*&nbsp;联&nbsp;系&nbsp;电&nbsp;话&nbsp;:
									</div>
									<div class="col-md-5" id="form-middle">
										<div class="form-group">
											<input type="text" name="phone" class="form-control" placeholder="请输入联系电话" required ng-model="data.phone" ng-pattern="/^1\d{10}$|^(0\d{2,3}-?|\(0\d{2,3}\))?[1-9]\d{4,7}(-\d{1,8})?$/">
										</div>
									</div>
									<div class="col-md-4" id="form-right">
										<p class="errors" ng-show="registerForm.phone.$dirty&&registerForm.phone.$invalid">电话格式错误</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3" id="form-left">
										*&nbsp;身&nbsp;份&nbsp;证&nbsp;号&nbsp;:
									</div>
									<div class="col-md-5" id="form-middle">
										<div class="form-group">
											<input type="text" name="idnumber" class="form-control" placeholder="请输入身份证号" required ng-model="data.idnumber" ng-pattern="/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/">
										</div>
									</div>
									<div class="col-md-4" id="form-right">
										<p class="errors" ng-show="registerForm.idnumber.$dirty&&registerForm.idnumber.$invalid">身份证号格式错误</p>
										<p class="errors" ng-show="repeatidnumber&&registerForm.idnumber.$valid">该身份证已有人使用</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3" id="form-left">
										&nbsp;性&nbsp;别&nbsp;:
									</div>
									<div class="col-md-5" id="form-middle">
										<div class="form-group">
											<select name="sex">
												<option value="0">--请选择--</option>
												<option value="1">男</option>
												<option value="2">女</option>
											</select>
										</div>
									</div>
									<div class="col-md-4" id="form-right">
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-3" id="form-left">
										&nbsp;家&nbsp;庭&nbsp;住&nbsp;址&nbsp;:
									</div>
									<div class="col-md-5" id="form-middle">
										<div class="form-group">
											<textarea name="address" class="form-control" placeholder="请输入家庭住址" rows="2"></textarea>
										</div>
									</div>
									<div class="col-md-4" id="form-right">
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" style="margin-top:20px;">
										<center>
											<input type="submit" class="btn btn-success" value="注册" ng-disabled="registerForm.$invalid">&nbsp;&nbsp;
											<input type="reset" class="btn btn-default">
											
										</center>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="col-md-12">
			<p> 版权所有：畅游公司&nbsp;&nbsp;&nbsp;2016-2020</p>
			<p> 联系电话：000-000-000&nbsp;&nbsp;&nbsp;email:xxxxxxxxxx@qq.com</p>
		</footer>
	</div>

	<script src="/tourist/Public/js/angular.min.js"></script>
	<script src="/tourist/Public/js/user/register.js"></script>

	
</body>
</html>