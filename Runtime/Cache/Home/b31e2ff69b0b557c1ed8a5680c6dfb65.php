<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link href="/tourist/Public/css/bootstrap.min.css" rel="stylesheet">
	<script src="/tourist/Public/js/jquery-1.10.2.min.js"></script>
    <script src="/tourist/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/tourist/Public/css/travel/popular.css">

</head>
<body ng-app="myapp" style="background-image: url(/tourist/Public/images/travel/bag3.jpg);">
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
					<li><a href="<?php echo U('Home/Travel/popular','','');?>">热门游</a></li>
					<li><a href="<?php echo U('Home/Travel/around','','');?>">周边游</a></li>
					<li><a href="<?php echo U('Home/Travel/internal','','');?>">国内游</a></li>
					<li><a href="<?php echo U('Home/Travel/harbor','','');?>">港澳台游</a></li>
					<li><a href="<?php echo U('Home/Travel/island','','');?>">日韩游</a></li>
					<li><a href="<?php echo U('Home/Travel/europe','','');?>">欧美游</a></li>
					<li><a href="<?php echo U('Home/Travel/border','','');?>">边境游</a></li>
					<li><a href="<?php echo U('Home/Travel/austra','','');?>">澳新非游</a></li>
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


	<div id="container" ng-controller="contentController">
		<div class="row">
			<div class="col-md-10 col-md-offset-1" id="body">
				<div class="column">
					<div class="col-md-12" id="toppic">
						<h4>国&nbsp;内&nbsp;游</h4>
						<p>推荐景点</p>
						<div class="row" style="padding:0px;">
							<a class="toselect" href="#" onclick="toselectpage(this)" ng-repeat="task in mosts" alt="{{task.id}}">
							<div class="col-md-4" style="padding:0px;">
								<div class="boxes">
									<div class="grid_4">
										<figure>
											<div><img width="100%" height="300px" src="/tourist/Public/routepic/{{task.image}}" alt=""></div>
											<figcaption>
														<h3>{{task.name}}</h3>
														<p>{{task.traveldesc}}</p>						
											</figcaption>
										</figure>
									</div>
								</div>
							</div>
							</a>
							
						</div>
					</div>
				</div>
				<div class="col-md-12" id="message">
					<div class="row">
						<div class="col-md-12" id="message-left">
							<div class="row">
								<div class="col-md-3" id="msgtop">热&nbsp;门&nbsp;游&nbsp;信&nbsp;息</div>
								<div class="col-md-9" id="msgnot"></div>
								<div class="col-md-12" id="msgcontent">
									<div class="searchs col-md-12" >
										<label for="">查询：</label>
										<input type="text" placeholder="Search" class="form-control" ng-model="searchroute">
									</div>
									<div class="row">
										<a href="#" onclick="toselectpage(this)" ng-repeat="task in routes | filter:searchroute" alt="{{task.id}}">
										<div class="col-md-6" style="padding:10px;">
											<div class="col-md-12" id="onetravel">
												<div class="row">
													<div class="col-md-7" style="padding:10px;">
														<img class="img-rounded" width="100%" height="200px" src="/tourist/Public/routepic/{{task.image}}">
													</div>
													<div class="col-md-5">
														<h3>{{task.name}}</h3>
														<p>{{task.traveldesc}}</p>
														<p>价格：{{price}}/人</p>
													</div>
												</div>
											</div>

										</div>
										</a>
										
										
									</div>
									<div class="row">
										<div class="col-md-12" style="margin-bottom:20px;">
											<center>
												<ul class="pagination">
												  <li><a href="#">&laquo;</a></li>
												  <li class="active"><a href="#">1</a></li>
												  <li><a href="#">&raquo;</a></li>
												</ul>
											</center>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" id="footer">
				<p>地址：xx省xx市xx街xx号幻游在线交换旅游网公司  联系电话：000-000-000   邮箱：xxx@22.com</p>
				<p>2016-2020</p>
			</div>
		</div>
	</div>

<script src="/tourist/Public/js/angular.min.js"></script>
	
<script>
	var app=angular.module("myapp",[]);

	//contentcontroller
	app.controller("contentController",['$scope','$http',function($scope,$http){
	
		$http.get("<?php echo U('Home/Travel/getmost',array('kinds'=> 2));?>"

			).success(function(data){
				

				data=data.split('"');
				$scope.mosts=eval(data[1]);
				//console.log($scope.mosts)
				
		});

		$http.get("<?php echo U('Home/Travel/getroutes',array('kinds'=> 2));?>"

			).success(function(data){
				

				data=data.split('"');
				$scope.routes=eval(data[1]);
				console.log($scope.routes)
				
		});


			

	}])

</script>

<script type="text/javascript">
   function change(){
      if(confirm("您确定退出登陆状态吗？")){
        document.getElementById("sessionuse").submit();
      }
   }
</script>

<script type="text/javascript">
$(function(){
  $("#login").click(function(){
      var user = $("#user").val();
      var password =$("#pasd").val();

      $.post("<?php echo U('Home/Index/login','','');?>",{
          user : user,
          pasd : password
      },function(data){
        if (data==1) {
           window.location.reload(true);
            
        }
        else if(data==2){
          alert("用户名或密码错误");
        }
        else
        {
          alert("系统异常，请稍后再试");
        }
      })
  })
})


</script>

<script>


	function toselectpage(obj){
		
		var attrs=obj.getAttribute("alt");
		
		window.location.href="http://localhost:8081/tourist/index.php/Home/select/index/routeid/"+attrs;
		
		return false;
	}
</script>

</body>
</html>