<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link href="/tourist/Public/css/bootstrap.min.css" rel="stylesheet">
	<script src="/tourist/Public/js/jquery-1.10.2.min.js"></script>
    <script src="/tourist/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/tourist/Public/css/select/pay.css">
</head>
<body>

	<header>
		<ul>
			<?php if(($_SESSION['username'] == NULL)): ?><a data-toggle="modal" data-target="#myModal"><li class="navtitle">登陆</li>
            <?php else: ?>
                <form action="<?php echo U('Home/Index/Sessionuse','','');?>" id="sessionuse">
                    <a onclick="change()"><li class="navtitle"><?php echo ($_SESSION['username']); ?></li></a>
                </form><?php endif; ?>
			</a>
			<a href="#"><li class="navtitle">
				旅游路线
				<ul class="secnav">
					<li>热门游</li>
					<li>周边游</li>
					<li>国内游</li>
					<li>港澳台游</li>
					<li>日韩游</li>
					<li>欧美游</li>
					<li>边境游</li>
					<li>澳新非游</li>
				</ul>
			</li>
			</a>
			<a href="<?php echo U('Home/Index/index','','');?>"><li class="navtitle">主页</li></a>
		</ul>
	</header>

	<!-- 模态框（Modal） -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
               aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog" style="width:300px;">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" 
                           aria-hidden="true">×
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                           用户登录
                        </h4>
                     </div>
                     <form action="#" method="post">
                       <div class="modal-body">

                          <div class="form-group">
                            <input id="user" name="user"  class="form-control" type="text" placeholder="请输入用户名"> 
                          </div>
                          <div class="form-group">
                            <input id="pasd" name="pasd"  class="form-control" type="password" placeholder="请输入密码"> 
                          </div>
                       </div>
                       <div class="modal-footer">
                          <a class="btn btn-default" target="_blank" 
                              href="<?php echo U('Home/User/index','','');?>">
                             注册
                          </a>
                          <input type="button" id="login"  class="btn btn-primary" value="登陆">
                       </div>
                      </form>
                  </div><!-- /.modal-content -->
               </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


	<section id="container" alt="<?php echo ($price); ?>" class="col-md-10 col-md-offset-1">
		<form action="<?php echo U('Home/Select/addorder','','');?>" method="post">
		<h3>支付信息</h3>
		<div class="onedata col-md-12">
			<label class="col-md-3">您的旅游项目是：</label>
			<p class="col-md-9"><?php echo ($routename); ?></p>
		</div>
		<div class="onedata col-md-12">
			<label class="col-md-3">请选择报名人数：</label>
			<input type="number" style="width: 10%;" id="membernum" class="form-control" onchange="addmembers()" required>
		</div>
		<div class="onedata col-md-12" id="memberlist">
			
			<!-- <p class="peo">1）第一个成员</p>
			<div class="col-md-12 peopledata">
				<label class="col-md-2">姓名：</label>
				<input type="text" class="form-control">
			</div>
			<div class="col-md-12 peopledata" >
				<label class="col-md-2">身份证号：</label>
				<input type="text" class="form-control">
			</div> -->

			

			
			
		</div>
		
		<p class="pay">支付金额：0￥</p>
		<button class="btn btn-success" type="submit">确认报名</button>

		</form>
	</section>


<script src="/tourist/Public/js/travel/pay.js"></script>

	
</body>
</html>