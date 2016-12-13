<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta charset="UTF-8">
	<link href="/tourist/Public/css/bootstrap.min.css" rel="stylesheet">
	<script src="/tourist/Public/js/jquery-1.10.2.min.js"></script>
    <script src="/tourist/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/tourist/Public/css/admin/new.css">

	
</head>
<body ng-app="myapp">
	<header class="col-md-12">
		<a href="<?php echo U('Admin/User/users','','');?>">
			<span class="glyphicon glyphicon-home"></span>
			主页
		</a>

		<a href="<?php echo U('Admin/Route/index','','');?>">
			>&nbsp;&nbsp;
			旅游路线管理
		</a>
		<a href="#">
			>&nbsp;&nbsp;
			添加新线路
		</a>
	</header>
	<section class="col-md-12" ng-controller="contentController">
		<form action="<?php echo U('Admin/Route/adds','','');?>" enctype="multipart/form-data" method="post" name="routeForm">
		<div class="col-md-12 oneform">
			<label class="col-md-2" >线路名称:</label>
			<input type="text" class="form-control input1" name="routename" ng-model="data.routename" required>
			<p class="errors" ng-show="routeForm.routename.$dirty&&routeForm.routename.$invalid">*线路名称不能为空</p>
		</div>
		<div class="col-md-12 oneform">
			<label class="col-md-2">路线图片:</label>
			<div class=" frontpage">
				<div class="uploader white">
					<input type="text" class="filename" readonly/>
					<input type="button" name="file" class="button" value="上传..."/>
					<input type="file" name="routeimg[]" id="routeimg" size="30" required />
				</div>
			</div>
		</div>
		<div class="col-md-12 oneform">
			<label class="col-md-2">路线介绍:</label>
			<textarea rows="5" class="form-control" name="routedesc" ng-model="data.routedesc" ng-maxlength="90" required></textarea>
			<p class="errors" ng-show="routeForm.routedesc.$dirty&&routeForm.routedesc.$invalid&&!routeForm.routedesc.$error.maxlength">*线路介绍不能为空</p>
			<p class="errors" ng-show="routeForm.routedesc.$error.maxlength">*线路介绍字数不能超过90字</p>
		</div>
		<div class="col-md-12 oneform">
			<label class="col-md-2">单人价格:</label>
			<input type="text" class="form-control input2" name="price" ng-model="data.price" ng-pattern="/^([0-9.]+)$/" required>
			<p class="errors" ng-show="routeForm.price.$dirty&&routeForm.price.$invalid&&!routeForm.price.$error.pattern">*单人价格不能为空</p>
			<p class="errors" ng-show="routeForm.price.$error.pattern">*单人价格只能为数字</p>
		</div>
		<div class="col-md-12 oneform">
			<label class="col-md-2">旅行时间:</label>
			<input type="text" class="form-control input1" name="daytimes" ng-model="data.daytimes" required>
			<p class="errors" ng-show="routeForm.daytimes.$dirty&&routeForm.daytimes.$invalid">*旅行时间不能为空</p>
		</div>
		<div class="col-md-12 oneform">
			<label class="col-md-2">交通工具:</label>
			<input type="text" class="form-control input1" name="traffic" ng-model="data.traffic" ng-maxlength="20" required>
			<p class="errors" ng-show="routeForm.traffic.$dirty&&routeForm.traffic.$invalid&&!routeForm.traffic.$error.maxlength">*交通工具不能为空</p>
			<p class="errors" ng-show="routeForm.traffic.$error.maxlength">*交通工具字数不能超过20字</p>
		</div>
		<div class="col-md-12 oneform">
			<label class="col-md-2">住宿条件:</label>
			<input type="text" class="form-control input1" name="livedesc" ng-model="data.livedesc" ng-maxlength="20" required>
			<p class="errors" ng-show="routeForm.livedesc.$dirty&&routeForm.livedesc.$invalid&&!routeForm.livedesc.$error.maxlength">*住宿条件不能为空</p>
			<p class="errors" ng-show="routeForm.livedesc.$error.maxlength">*住宿条件字数不能超过20字</p>
		</div>
		<div class="col-md-12 oneform">
			<label class="col-md-2">三餐条件:</label>
			<input type="text" class="form-control input1" name="fooddesc" ng-model="data.fooddesc" ng-maxlength="20" required>
			<p class="errors" ng-show="routeForm.fooddesc.$dirty&&routeForm.fooddesc.$invalid&&!routeForm.fooddesc.$error.maxlength">*住宿条件不能为空</p>
			<p class="errors" ng-show="routeForm.fooddesc.$error.maxlength">*住宿条件字数不能超过20字</p>
		</div>
		
		<div class="col-md-12 oneform">
			<label class="col-md-2">住宿图片:</label>
			<div class=" frontpage">
				<div class="uploader white">
					<input type="text" class="filename" readonly/>
					<input type="button" name="file" class="button" value="上传..."/>
					<input type="file" name="routeimg[]" id="liveimg" size="30" required />
				</div>
			</div>
		</div>

		<div class="col-md-12 oneform">
			<label class="col-md-2">路线种类:</label>
			<select class="form-control" name="kinds" ng-model="data.kinds" required>
				<option >请选择旅游种类</option>
				<option value="1">周边游</option>
				<option value="2">国内游</option>
				<option value="3">港澳台游</option>
				<option value="4">日韩游</option>
				<option value="5">欧美游</option>
				<option value="6">边境游</option>
				<option value="7">澳新非游</option>
			</select>
			<p class="errors" ng-show="routeForm.kinds.$dirty&&routeForm.kinds.$invalid">*路线种类不能为空</p>
		</div>
		<div class="col-md-12 oneform">
			<label class="col-md-2">旅游天数:</label>
			<input type="text" class="form-control input2" onchange="adddays()" id="daynumber" name="daynumber" ng-model="data.daynumber" ng-pattern="/^([0-9.]+)$/" required>
			<p class="errors" ng-show="routeForm.daynumber.$dirty&&routeForm.daynumber.$invalid&&!routeForm.daynumber.$error.pattern">*旅游天数不能为空</p>
			<p class="errors" ng-show="routeForm.daynumber.$error.pattern">*旅游天数只能为数字</p>
		</div>

		<div style="width:100%;border-top: 1px dashed rgb(200,200,200);float:left;"></div>
		<h3>行程安排</h3>
		<div id="days" class="col-md-12">
		
			
			
		</div>
		
	
		<div class="col-md-10 col-md-offset-1" id="subbtn">
			<button type="submit" ng-disabled="routeForm.$invalid" class="btn btn-success">添加新路线</button>
			<button type="reset" class="btn btn-warning">清空表单</button>
		</div>
		</form>
	</section>



<script src="/tourist/Public/js/angular.min.js"></script>

<script>
	var app=angular.module("myapp",[]);

	app.controller("contentController",['$scope',function($scope){
		
	}])
</script>

<script src="/tourist/Public/js/admin/new.js"></script>



	
</body>
</html>