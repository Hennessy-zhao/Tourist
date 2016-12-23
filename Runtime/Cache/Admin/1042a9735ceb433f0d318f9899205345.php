<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache"> 
	<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache"> 
	<META HTTP-EQUIV="Expires" CONTENT="0">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/> 
	<meta name="renderer" content="webkit">
	<link href="/tourist/Public/css/bootstrap.min.css" rel="stylesheet">
	<script src="/tourist/Public/js/jquery-2.1.4.min.js"></script>
    <script src="/tourist/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/tourist/Public/css/admin/user_index.css">

	
</head>
<body ng-app="myapp">
	<header class="col-md-12">
		<a href="<?php echo U('Admin/User/index','','');?>">
			<span class="glyphicon glyphicon-home"></span>
			主页
		</a>

		<a href="#">
			>&nbsp;&nbsp;
			用户管理
		</a>
	</header>
	
	<section>
		<div id="numbers" class="col-md-3">
			<img src="/tourist/Public/images/admin/card.jpg" alt="">
			328
			<p>users</p>
		</div>
		<div id="routes" class="col-md-11" ng-controller="contentController">
			<div id="titles" class="col-md-12">
				<span class="glyphicon glyphicon-list"></span>
				<p>用户列表</p>
				
			</div>
			<aside class="col-md-12">
				<span>Search:</span>
				<input type="text" ng-model="search" class="form-control">
			</aside>
			<table class="table table-striped lists">
				<thead>
					<tr>
						<th width="20%">真名</th>
						<th width="25%">邮箱</th>
						<th width="20%">电话</th>
						<th width="10%">订单个数</th>
						<th width="10%">投诉个数</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="task in knows | filter:search">
						<td>{{task.truename}}</td>
						<td>{{task.email}}</td>
						<td>{{task.phone}}</td>
						<td>{{task.ordercount}}</td>
						<td>{{task.advisecount}}</td>
						<td>
							<span class="edits glyphicon glyphicon-list-alt" alt="{{task.id}}" onclick="looks(this)"></span>
							<span class="deletes glyphicon glyphicon-trash" alt="{{task.id}}" onclick="deletes(this)"></span>
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>
	</section>

	<script src="/tourist/Public/js/angular.min.js"></script>
	
	<script>
		var app=angular.module("myapp",[]);


		

		//contentcontroller
		app.controller("contentController",['$scope','$http',function($scope,$http){
	
			$http.get('<?php echo U("Admin/User/getusers","","");?>').success(function(data){

				
				data=data.split('"');
				$scope.knows=eval(data[1]);
				console.log($scope.knows)
				
			});


			

		}])

	</script>

	<script>
		looks=function(obj){
			$thisone=obj;
			$alt=$thisone.getAttribute("alt");

			window.location.href="http://localhost:8081/tourist/index.php/Admin/user/look/userid/"+$alt;
		}
	</script>
	
	<script>
		deletes=function(obj){
			$thisone=obj;
			$alt=$thisone.getAttribute("alt");
			if (confirm("确定删除该用户吗？？")) {
				$.post("<?php echo U('Admin/User/deleteuser','','');?>",{
				          id : $alt
				      },function(data){
				        if (data==1) {
				           
				            location.reload();
				        }
				        else
				        {
				          	alert("*系统异常，请稍后再试");
				        }
				})
			}

		}


	</script>


	

</body>
</html>