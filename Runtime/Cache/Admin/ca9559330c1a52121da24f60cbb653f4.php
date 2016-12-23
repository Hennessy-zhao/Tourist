<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="renderer" content="webkit">
	<link href="/tourist/Public/css/bootstrap.min.css" rel="stylesheet">
	<script src="/tourist/Public/js/jquery-2.1.4.min.js"></script>
    <script src="/tourist/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/tourist/Public/css/admin/route_update.css">
</head>
<body>
<header class="col-md-12">
		<a href="<?php echo U('Admin/User/index','','');?>">
			<span class="glyphicon glyphicon-home"></span>
			主页
		</a>

		<a href="<?php echo U('Admin/Route/index','','');?>">
			>&nbsp;&nbsp;
			旅游路线管理
		</a>

		<a href="#">
			>&nbsp;&nbsp;
			路线修改
		</a>
	</header>

	<section>
		<form action="<?php echo U('Admin/Route/infoupdate','','');?>" enctype="multipart/form-data" method="post" name="routeForm">
			<input type="hidden" value="<?php echo ($data['id']); ?>" name="routeid">
		<div class="col-md-12 oneupdate">
			<label class="col-md-2">路线名称&nbsp;：</label>
			<input type="text" class="form-control" required value="<?php echo ($data['name']); ?>" name="name">
		</div>
		<div class="col-md-12 oneupdate">
			<label class="col-md-2">路线简介&nbsp;：</label>
		
			<textarea rows="3" class="form-control" required name="traveldesc"><?php echo ($data['traveldesc']); ?></textarea>
		</div>
		<div class="col-md-12 oneupdate">
			<label class="col-md-2">路线图片&nbsp;：</label>
		
			<img src="/tourist/Public/routepic/<?php echo ($data['image']); ?>" alt="">
			<div class="col-md-12" style="height: 10px;"></div>
			<div class="frontpage col-md-offset-2">
				<div class="uploader white">
					<input type="text" class="filename" readonly/>
					<input type="hidden" class="hidden" name="images" />
					<input type="button" name="file" class="button" value="上传..."/>
					<input type="file" name="routeimg[]" id="routeimg" size="30" />
				</div>
			</div>
		</div>
		<div class="col-md-12 oneupdate">
			<label class="col-md-2">单人价格&nbsp;：</label>
			<input type="text" class="form-control" required value="<?php echo ($data['price']); ?>" name="price">
		</div>

		<div class="col-md-12 oneupdate">
			<label class="col-md-2">天数&nbsp;：</label>
			<input type="text" class="form-control" required value="<?php echo ($data['daynumber']); ?>" name="daynumber">
		</div>

		<div class="col-md-12 oneupdate">
			<label class="col-md-2">交通介绍&nbsp;：</label>
			<input type="text" class="form-control" required value="<?php echo ($data['traffic']); ?>" name="traffic">
		</div>
		<div class="col-md-12 oneupdate">
			<label class="col-md-2">住宿环境&nbsp;：</label>
			<input type="text" class="form-control" required value="<?php echo ($data['livedesc']); ?>" name="livedesc">
		</div>
		<div class="col-md-12 oneupdate">
			<label class="col-md-2">住宿图片&nbsp;：</label>
			<img src="/tourist/Public/routepic/<?php echo ($data['liveimg']); ?>" alt="">
			<div class="col-md-12" style="height: 10px;"></div>
			<div class="frontpage col-md-offset-2">
				<div class="uploader white">
					<input type="text" class="filename" readonly/>
					<input type="hidden" class="hidden" name="liveimg" />
					<input type="button" name="file" class="button" value="上传..."/>
					<input type="file" name="routeimg[]" id="liveimg" size="30" />
				</div>
			</div>
		</div>
		<div class="col-md-12 oneupdate">
			<label class="col-md-2">三餐条件&nbsp;：</label>
			<input type="text" class="form-control" required value="<?php echo ($data['fooddesc']); ?>" name="fooddesc">
		</div>
		<div class="col-md-12 oneupdate">
			<label class="col-md-2">旅行时间&nbsp;：</label>
			<input type="text" class="form-control" required value="<?php echo ($data['daytimes']); ?>" name="daytimes">
		</div>

		<button type="submit" class="btn btn-success">确认修改</button>
		</form>
	</section>


	<script>
		$(function(){
				
		$("#routeimg").parents(".uploader").find(".filename").val("请选择景点图片文件...");

		$("#routeimg").change(function(){
			$(this).parents(".uploader").find(".filename").val($(this).val());
			$(this).parents(".uploader").find(".hidden").val($(this).val());
		});
				
	});
	</script>

	<script>
		$(function(){
				
		$("#liveimg").parents(".uploader").find(".filename").val("请选择居住环境图片文件...");

		$("#liveimg").change(function(){
			$(this).parents(".uploader").find(".filename").val($(this).val());
			$(this).parents(".uploader").find(".hidden").val($(this).val());
		});
				
	});
	</script>
	
</body>
</html>