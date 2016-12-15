
//退出登录
function change(){
    if(confirm("您确定退出登陆状态吗？")){
        document.getElementById("sessionuse").submit();
    }
}

//登陆验证
$(function(){
  $("#login").click(function(){
      var user = $("#user").val();
      var password =$("#pasd").val();

      $.post("{:U('Home/Index/login','','')}",{
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


//添加新用户
function addmembers(){
	$num=$("#membernum").val();

	$("#memberlist").text("");
	$labels=$("<label>请填写人员信息</label>");
	$("#memberlist").append($labels);

	for (var $i = 1; $i <=$num; $i++) {
		$peo=$("<p class='peo'>"+$i+"）第"+$i+"个成员</p>");
		$("#memberlist").append($peo);

		//name

		$peopledata=$("<div class='col-md-12 peopledata'></div>");
		$("#memberlist").append($peopledata);
		$label1=$("<label class='col-md-2'>姓名：</label>");
		$text1=$("<input type='text' class='form-control' name='membername_"+$i+"' required>");
		$peopledata.append($label1);
		$peopledata.append($text1);

		$peopledata1=$("<div class='col-md-12 peopledata'></div>");
		$("#memberlist").append($peopledata1);
		$label2=$("<label class='col-md-2'>身份证号：</label>");
		$text2=$("<input type='text' class='form-control' name='memberid_"+$i+"' required>");
		$peopledata1.append($label2);
		$peopledata1.append($text2);

	}

	$("p.pay").text("");
	$money=$("#container").attr("alt");
	$moneysum=$num*$money;
	$("p.pay").append("支付金额："+$moneysum+"￥");
	
		
}

