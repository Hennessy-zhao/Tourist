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
    <link rel="stylesheet" type="text/css" href="/tourist/Public/css/admin/suggest_index.css">

	
</head>
<body ng-app="myapp">
	<header class="col-md-12">
		<a href="<?php echo U('Admin/User/index','','');?>">
			<span class="glyphicon glyphicon-home"></span>
			主页
		</a>

		<a href="#">
			>&nbsp;&nbsp;
			投诉管理
		</a>
	</header>
	
	<section>
		<div id="routes" class="col-md-11" ng-controller="contentController">
			<div id="titles" class="col-md-12">
				<span class="glyphicon glyphicon-list"></span>
				<p>投诉列表</p>
				
			</div>
			<aside class="col-md-12">
				<span>Search:</span>
				<input type="text" ng-model="search" class="form-control">
			</aside>

			<!-- modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;
							</button>
							<h4 class="modal-title" id="myModalLabel">
								回复&nbsp;<span id="replyname"></span>&nbsp;:
							</h4>
						</div>
						<div class="modal-body"> 
							<textarea id="replymsg"  class="form-control" rows="3" placeholder="请输入回复内容..."></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">关闭
							</button>
							<button type="button" id="replymsgs" class="btn btn-primary">
								提交回复
							</button>
						</div>
					</div><!-- /.modal-content -->
				</div>
			</div>
			<!-- end of modal -->

			<table class="table table-striped lists">
				<thead>
					<tr>
						<th width="15%">投诉人</th>
						<th width="15%">联系电话</th>
						<th width="15%">邮箱</th>
						<th width="20%">投诉内容</th>
						<th width="20%">回复内容</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="task in routes | filter:search">
						<td>{{task.name}}</td>
						<td>{{task.phone}}</td>
						<td>{{task.email}}</td>
						<td>{{task.message}}</td>
						<td>{{task.reply}}</td>
						<td>
							<span class="edits glyphicon glyphicon-envelope" alt="{{task.id}}" onclick="looks(this)" title="{{task.name}}" data-toggle="modal" data-target="#myModal" ></span>
							<span class="deletes glyphicon glyphicon-trash" alt="{{task.id}}"  onclick="deletes(this)"></span>
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
	
			$http.get('<?php echo U("Admin/Suggest/getsuggets","","");?>').success(function(data){

				
				data=data.split('"');
				$scope.routes=eval(data[1]);
				//console.log($scope.routes)
				
			});


			

		}])

	</script>

	<script>
		looks=function(obj){
			$thisone=obj;
			$alt=$thisone.getAttribute("alt");
			$replyname=$thisone.getAttribute("title");
			$("#replyname").text($replyname);
			window.suggestid=$alt;


		}
	</script>
	
	<script>
		deletes=function(obj){
			$thisone=obj;
			$alt=$thisone.getAttribute("alt");
			if (confirm("确定删除该投诉项吗？？")) {
				$.post("<?php echo U('Admin/Suggest/deletesuggest','','');?>",{
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

	<script>
		$(function(){
			$("#replymsgs").click(function(){
				if (confirm("确定向该用户发送邮件吗？？")) {
					$.post("<?php echo U('Admin/Suggest/reply','','');?>",{
					          id : window.suggestid,
					          reply : $("#replymsg").val() 
					      },function(data){
					        if (data==1) {
					           	alert("邮件已顺利发送");
					            location.reload();
					        }
					        else
					        {
					          	alert("*系统异常，请稍后再试");
					        }
					})
				}

			})
		})
	</script>
	

</body>
</html>