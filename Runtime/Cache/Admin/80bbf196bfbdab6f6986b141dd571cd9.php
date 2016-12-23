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
    <link rel="stylesheet" type="text/css" href="/tourist/Public/css/admin/order_index.css">

	
</head>
<body ng-app="myapp">
	<header class="col-md-12">
		<a href="<?php echo U('Admin/User/index','','');?>">
			<span class="glyphicon glyphicon-home"></span>
			主页
		</a>

		<a href="<?php echo U('Admin/Order/index','','');?>">
			>&nbsp;&nbsp;
			订单管理
		</a>

		<a href="#">
			>&nbsp;&nbsp;
			路线&nbsp;<?php echo ($routename); ?>&nbsp;订单
		</a>
	</header>
	
	<section>
		<div id="routes" class="col-md-11" ng-controller="contentController">
			<div id="titles" class="col-md-12">
				<span class="glyphicon glyphicon-list"></span>
				<p>路线&nbsp;<?php echo ($routename); ?>&nbsp;订单</p>
				
			</div>
			<table class="table table-striped lists">
				<thead>
					<tr>
						<th width="15%">预订人</th>
						<th width="10%">预订人数</th>
						<th width="50%">成员列表</th>
						<th width="15%">共交金额</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<!-- <tr ng-repeat="task in routes | filter:search"> -->
					<?php if(is_array($order)): foreach($order as $key=>$order): ?><tr>
						<td><?php echo ($order['username']); ?></td>
						<td><?php echo ($order['memcount']); ?></td>
						<td>
							<?php if(is_array($member)): foreach($member as $key=>$member): if($member['orderid'] == $order['id'] ): ?>姓名：<?php echo ($member['name']); ?>
							&nbsp;&nbsp;
							身份证号:<?php echo ($member['idnumber']); ?>
							<br/><?php endif; endforeach; endif; ?>
						</td>
						<td><?php echo ($order['price']); ?></td>
						<td>
							<span class="deletes glyphicon glyphicon-trash" alt="<?php echo ($order['id']); ?>" style="width: 60%;" onclick="deletes(this)"></span>
						</td>
					</tr><?php endforeach; endif; ?>
				</tbody>
			</table>
		</div>
	</section>

	<script src="/tourist/Public/js/angular.min.js"></script>
	
	<script>
		var app=angular.module("myapp",[]);


		

		//contentcontroller
		app.controller("contentController",['$scope','$http',function($scope,$http){
	
			$http.get('<?php echo U("Admin/Order/getorders","","");?>').success(function(data){

				
				data=data.split('"');
				$scope.routes=eval(data[1]);
				
				
			});


			

		}])

	</script>

	<script>
		looks=function(obj){
			$thisone=obj;
			$alt=$thisone.getAttribute("alt");

			window.location.href="http://localhost:8081/tourist/index.php/Admin/order/lookorder/routeid/"+$alt;
		}
	</script>
	
	<script>
		deletes=function(obj){
			$thisone=obj;
			$alt=$thisone.getAttribute("alt");
			if (confirm("确定删除该订单吗？？")) {
				$.post("<?php echo U('Admin/Order/deletorder','','');?>",{
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