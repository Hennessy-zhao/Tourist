<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title></title>
  
    <meta charset="UTF-8">

    <!-- Bootstrap -->
    <link href="/tourist/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/tourist/Public/css/font-awesome.min.css" rel="stylesheet">
    <link href="/tourist/Public/css/templatemo_style.css" rel="stylesheet">

    
    <link href="/tourist/Public/css/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="/tourist/Public/css/nivo-slider.css">
    <link href='http://fonts.useso.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
    <script src="/tourist/Public/js/modernizr.custom.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<div id="backcolor" style="background-color: rgb(235,84,37);">
    <header>
        <div id="slider" class="nivoSlider">
            <a href="#"><img src="/tourist/Public/images/slider/img_1.jpg" alt="slide 1" /></a>
            <a href="#"><img src="/tourist/Public/images/slider/img_2.jpg" alt="slide 2" /></a>
            <a href="#"><img src="/tourist/Public/images/slider/img_3.jpg" alt="slide 3" /></a>
      </div>
    </header>
    <div class="mWrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-md-4" style="padding:0px;">
            <div class="logo">
              <!-- <img class="imglogo" src="/tourist/Public/images/logo.jpg" height="50"> -->
            </div>
          </div>
          <div class="col-sm-8 col-md-8">
            <nav class="mainMenu">
              <ul class="nav">
                <li><a href="#templatemo_top">主页</a></li>
                <li><a href="#templatemo_services">关于我们</a></li>
                <li><a href="#templatemo_portfolio">旅游路线</a></li>
                <!-- <li><a href="#templatemo_about">关于我们</a></li> -->
                <li><a href="#templatemo_contact">投诉建议</a></li>
                <li>
                  <?php if(($_SESSION['username'] == NULL)): ?><a data-toggle="modal" data-target="#myModal">登陆</a>
                    <?php else: ?>
                      <form action="<?php echo U('Home/Index/Sessionuse','','');?>" id="sessionuse">
                        <a onclick="change()"><?php echo ($_SESSION['username']); ?></a>
                      </form><?php endif; ?>
                  
                </li>

              </ul> 
            </nav>

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
            
          </div>
        </div>
      </div>
    </div>

    <div id="templatemo_services" class="section1">
      <fieldset>
        <legend>关于我们 &nbsp; | &nbsp; About us</legend>
        <p>xxxx公司成立于2016年11月份。</p>
        <p>xxx公司旨在为广大想要旅游的用户提供一个选择自己想要游玩地点的平台。其核心创始人为江苏师范大学智慧与教育学院14级五位学生：李茜、任驰、许微微、张雨秋、赵益石（按姓名首字母排序）。</p>
        <p>随着互联网普及到千家万户，越来越多的公司有了自己的网站和网上服务点，越来越多的人选择在网上去获取自己想要的东西或者处理事情。</p>
        <p>在xxxx旅游平台上，你可以选择自己想要的路线，并且进行网上付款和网上签约，不需要家-旅行社两点一线的来回跑，来回确认信息。如果您对我们的服务有什么不满，可以在下面投诉部分进行投诉或者一些建议，我们会在最短时间内进行处理。</p>
      </fieldset>
    </div> <!-- e/o section1 -->
</div>
    <div id="templatemo_portfolio" class="section2">
        <h3>旅游路线</h3>
        <h4>Tour Routes</h4>
        <div class="routes">
          <a href="<?php echo U('Home/Travel/popular','','');?>">
          <div class="oneroute" style="background-image: url(/tourist/Public/images/kinds/1.jpg);">
            <div class="routecover">
              <h1>P</h1>
              <h4>热门游</h4>
              <p>Popular Travel</p>
            </div>
            <div class="routeflow">
              <h2>+</h2>
              <h3>热门游</h3>
              <p>杭州、厦门、三亚、云南</p>
            </div>
          </div>
          </a>
          <a href="<?php echo U('Home/Travel/around','','');?>">
          <div class="oneroute" style="background-image: url(/tourist/Public/images/kinds/2.jpg);">
            <div class="routecover">
              <h1>A</h1>
              <h4>周边游</h4>
              <p>Around Travel</p>
            </div>
            <div class="routeflow">
              <h2>+</h2>
              <h3>周边游</h3>
              <p>台儿庄、窑湾古镇、微山湖、大珠山</p>
            </div>
          </div>
          </a>
          <a href="<?php echo U('Home/Travel/internal','','');?>">
          <div class="oneroute" style="background-image: url(/tourist/Public/images/kinds/3.jpg);">
            <div class="routecover">
              <h1>D</h1>
              <h4>国内游</h4>
              <p>Domestic Travel</p>
            </div>
            <div class="routeflow">
              <h2>+</h2>
              <h3>国内游</h3>
              <p>北京、厦门、三亚、内蒙</p>
            </div>
          </div>
          </a>
          <a href="<?php echo U('Home/Travel/harbor','','');?>">
          <div class="oneroute" style="background-image: url(/tourist/Public/images/kinds/4.jpg);">
            <div class="routecover">
              <h1>H</h1>
              <h4>港澳台游</h4>
              <p>Hong Kong, Macao and Taiwan Travel</p>
            </div>
            <div class="routeflow">
              <h2>+</h2>
              <h3>港澳台游</h3>
              <p>香港、澳门、台湾</p>
            </div>
          </div>
          </a>
          <a href="<?php echo U('Home/Travel/island','','');?>">
          <div class="oneroute" style="background-image: url(/tourist/Public/images/kinds/5.jpg);">
            <div class="routecover">
              <h1>J</h1>
              <h4>日韩游</h4>
              <p>Japan and South Korea Travel</p>
            </div>
            <div class="routeflow">
              <h2>+</h2>
              <h3>日韩游</h3>
              <p>日本、韩国</p>
            </div>
          </div>
          </a>
          <a href="<?php echo U('Home/Travel/europe','','');?>">
          <div class="oneroute" style="background-image: url(/tourist/Public/images/kinds/6.jpg);">
            <div class="routecover">
              <h1>E</h1>
              <h4>欧美游</h4>
              <p>Europe and the United States Travel</p>
            </div>
            <div class="routeflow">
              <h2>+</h2>
              <h3>欧美游</h3>
              <p>英国、意大利、美国、荷兰</p>
            </div>
          </div>
          </a>
          <a href="<?php echo U('Home/Travel/border','','');?>">
          <div class="oneroute" style="background-image: url(/tourist/Public/images/kinds/7.jpg);">
            <div class="routecover">
              <h1>B</h1>
              <h4>边境游</h4>
              <p>Border Travel</p>
            </div>
            <div class="routeflow">
              <h2>+</h2>
              <h3>边境游</h3>
              <p>泰国、新加坡、马来西亚、越南</p>
            </div>
          </div>
          </a>
          <a href="<?php echo U('Home/Travel/austra','','');?>">
          <div class="oneroute" style="background-image: url(/tourist/Public/images/kinds/8.jpg);">
            <div class="routecover">
              <h1>A</h1>
              <h4>澳新非游</h4>
              <p>Australia, New Zealand and Africa Travel</p>
            </div>
            <div class="routeflow">
              <h2>+</h2>
              <h3>澳新非游</h3>
              <p>澳大利亚、新西兰、迪拜、埃及</p>
            </div>
          </div>
          </a>
          
        </div>
    </div> <!-- e/o section2 -->

   
 
    <div id="templatemo_contact" class="section5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="secHeader">
              <p class="text-center" style="font-family:Microsoft YaHei;font-size:2em;font-weight:bold;color:rgb(119,119,119);">投&nbsp;诉&nbsp;建&nbsp;议</p>
              <p class="text-center" style="font-family:Microsoft YaHei;font-size:1em;color:rgb(119,119,119);font-weight:bold;">
              如果您对本公司有任何不满或者建议，可以通过下面进行投诉。
              </p>
              <p class="text-center" style="font-size:1em;color:rgb(119,119,119);">If you have any complaints or Suggestions to this company, you can through the following complaints. </p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <form role="form">
              <div class="form-group">
                <input name="fullname" type="text" class="form-control" id="fullname" placeholder="请输入您的姓名（必填）" maxlength="30">
              </div>
              <div class="form-group">
                <input name="phone" type="text" class="form-control" id="fullname" placeholder="请输入您的联系电话" maxlength="30">
              </div>
              <div class="form-group">
                <input name="email" type="text" class="form-control" id="email" placeholder="请输入您的电子邮箱（必填）" maxlength="30">
              </div>
              <div><button type="button" class="btn btn-success" style="width:100px;">提交</button></div>
            </form>
          </div>
          <div class="col-md-6">
            <div class="txtarea">
              <textarea name="message" rows="10" class="form-control" id="message"></textarea>
            </div>
          </div>
          <div class="col-md-3">
            <div class="addr" style="font-family:Microsoft YaHei;font-size:1em;color:rgb(119,119,119);font-weight:bold;">
              <p>联系方式：</p>
              <ul>
                <li><i class="fa fa-map-marker" style="color:rgb(119,119,119);"></i>xx省xx市xx区xx路xx号</li>
                <li><i class="fa fa-mobile-phone" style="color:rgb(119,119,119);"></i>000-000-0000</li>
                <li><i class="fa fa-envelope" style="color:rgb(119,119,119);"></i>xxx@xx.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div> <!-- eo section 5 -->

      <div id="back-top" class="gotop text-center">
        <a href="#">Back to top</a>
      </div>

      <div class="bfWrap text-center">
        <div class="templatemo_footer">版权信息 © 2016 幻游网 </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://code.jquery.com/jquery.js"></script> -->
    <script src="/tourist/Public/js/jquery-1.10.2.min.js"></script>
    <script src="/tourist/Public/js/bootstrap.min.js"></script>
    <script src="/tourist/Public/js/jquery.cycle2.min.js"></script>
    <script src="/tourist/Public/js/jquery.cycle2.carousel.min.js"></script>
    <script src="/tourist/Public/js/jquery.nivo.slider.pack.js"></script>
    <script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
    <script src="/tourist/Public/js/jquery.cookie.js"></script>
    <script type="text/javascript">
      $(function(){
          var default_view = 'grid';
          if($.cookie('view') !== 'undefined'){
              $.cookie('view', default_view, { expires: 7, path: '/' });
          } 
          function get_grid(){
              $('.list').removeClass('list-active');
              $('.grid').addClass('grid-active');
              $('.prod-cnt').animate({opacity:0},function(){
                  $('.prod-cnt').removeClass('dbox-list');
                  $('.prod-cnt').addClass('dbox');
                  $('.prod-cnt').stop().animate({opacity:1});
              });
          }
          function get_list(){
              $('.grid').removeClass('grid-active');
              $('.list').addClass('list-active');
              $('.prod-cnt').animate({opacity:0},function(){
                  $('.prod-cnt').removeClass('dbox');
                  $('.prod-cnt').addClass('dbox-list');
                  $('.prod-cnt').stop().animate({opacity:1});
              });
          }
          if($.cookie('view') == 'list'){ 
              $('.grid').removeClass('grid-active');
              $('.list').addClass('list-active');
              $('.prod-cnt').animate({opacity:0});
              $('.prod-cnt').removeClass('dbox');
              $('.prod-cnt').addClass('dbox-list');
              $('.prod-cnt').stop().animate({opacity:1}); 
          } 

          if($.cookie('view') == 'grid'){ 
              $('.list').removeClass('list-active');
              $('.grid').addClass('grid-active');
              $('.prod-cnt').animate({opacity:0});
                  $('.prod-cnt').removeClass('dboxlist');
                  $('.prod-cnt').addClass('dbox');
                  $('.prod-cnt').stop().animate({opacity:1});
          }

          $('#list').click(function(){   
              $.cookie('view', 'list'); 
              get_list()
          });

          $('#grid').click(function(){ 
              $.cookie('view', 'grid'); 
              get_grid();
          });

          /* filter */
          $('.menuSwitch ul li').click(function(){
              var CategoryID = $(this).attr('category');
              $('.menuSwitch ul li').removeClass('cat-active');
              $(this).addClass('cat-active');
              
              $('.prod-cnt').each(function(){
                  if(($(this).hasClass(CategoryID)) == false){
                     $(this).css({'display':'none'});
                  };
              });
              $('.'+CategoryID).fadeIn(); 
              
          });
      });
    </script>

    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
          prevText: '',
          nextText: '',
          controlNav: false,
        });
    });
    </script>
    <script>
      $(document).ready(function(){

        // hide #back-top first
        $("#back-top").hide();
        
        // fade in #back-top
        $(function () {
          $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
              $('#back-top').fadeIn();
            } else {
              $('#back-top').fadeOut();
            }
          });

          // scroll body to 0px on click
          $('#back-top a').click(function () {
            $('body,html').animate({
              scrollTop: 0
            }, 800);
            return false;
          });
        });

      });
      </script>
      <script type="text/javascript">
      <!--
          function toggle_visibility(id) {
             var e = document.getElementById(id);
             if(e.style.display == 'block'){
                e.style.display = 'none';
                $('#togg').text('show footer');
            }
             else {
                e.style.display = 'block';
                $('#togg').text('hide footer');
            }
          }
      //-->
      </script>
      <script type="text/javascript" src="/tourist/Public/js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

      <script type="text/javascript">
      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
      </script>
      <script src="/tourist/Public/js/stickUp.min.js" type="text/javascript"></script>
      <script type="text/javascript">
        //initiating jQuery
        jQuery(function($) {
          $(document).ready( function() {
            //enabling stickUp on the '.navbar-wrapper' class
            $('.mWrapper').stickUp();
          });
        });
      </script>
      
</body>

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

</html>