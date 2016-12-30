//angular

var app=angular.module("myapp",[]);

app.controller("contentController",['$scope','$http',function($scope,$http){
	$scope.repeatusername=false;
	$scope.repeatidnumber=false;
	$scope.repeatemail=false;



	$scope.$watch('data.username',function(body){
		if (body) {
			$http.get("repeatname/username/"+body
				).success(function(data){
					
				if (data==1) {
					$scope.repeatusername=true;
				}
				else{
					$scope.repeatusername=false;
				}
					
					
			});
		}
	});

	$scope.$watch('data.idnumber',function(body){
		if (body) {
			$http.get("repeatidnumber/idnumber/"+body
				).success(function(data){
					
				if (data==1) {
					$scope.repeatidnumber=true;
				}
				else{
					$scope.repeatidnumber=false;
				}
					
					
			});
		}
	});


	$scope.$watch('data.email',function(body){
		if (body) {
			$http.get("repeatemail/email/"+body
				).success(function(data){
					
				if (data==1) {
					$scope.repeatemail=true;
				}
				else{
					$scope.repeatemail=false;
				}
					
					
			});
		}
	})
}])




//jquery


$(function(){
	$("#form1").submit(function(){
		alert("注册信息已提交，跳转到主页则为注册成功");
		return true;
	})
})

