<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->display("register");
    }



    public function register(){
    	$username=I('post.username');
    	$truename=I('post.truename');		
		$psd=I('post.password');   
		$password=md5($psd);  
		$email=I('post.email'); 
		$phone=I('post.phone');
		$idnumber=I('post.idnumber');
		$sex=I('post.sex');
		$address=I('post.address');

		$data=array(
			'username' => $username,
			'truename' => $truename,
			'password' => $password,
			'email' => $email,
			'idnumber' => $idnumber,
			'sex' => $sex,
			'address' => $address,
			'phone' => $phone
			);

		$result=M('user')->add($data);
        if ($result) {
            sendMail($email,'您已成功注册畅游网账户',$truename.'先生/女士，您好。您已成功注册畅游网账户，用户名为：'.$username);
        }

		$_SESSION['username']=$username;
		$this->redirect("Index/index");

    }


    public function suggest(){
    	$name=I('post.name');
    	$phone=I('post.phone');
    	$email=I('post.email');
    	$message=I('post.message');

    	$data=array(
    		'name' => $name,
    		'phone' => $phone,
    		'email' => $email,
    		'message' => $message,
    		'daytimes' => date('y-m-d H:i:s',time())
    		);
    	$result=M('suggest')->add($data);

        if ($name!='') {
            $where['truename']=$name;
            $advisecount=M('user')->where($where)->getField('advisecount');
            $newadvisecount=intval($advisecount)+1;
            $data1['advisecount'] = $newadvisecount;
            $result1=M('user')->where($where)->save($data1);
        }
        

    	if ($result) {
    		echo 1;
    	}
    	else{
    		echo 2;
    	}
    }


    public function repeatname(){
    	$username=I('get.username');	

		$where['username']=$username;
		$res=M('user')->where($where)->select();

		if ($res) {
            echo 1;
        }
        else{
            echo 2;
        }
   }

   public function repeatidnumber(){
        $idnumber=I('get.idnumber');    

        $where['idnumber']=$idnumber;
        $res=M('user')->where($where)->select();

        if ($res) {
            echo 1;
        }
        else{
            echo 2;
        }
   }

   public function repeatemail(){
        $email=I('get.email');
        $where['email']=$email;
        $res=M('user')->where($where)->select();

        if ($res) {
            echo 1;
        }
        else{
            echo 2;
        }
   }

   public function identity(){
      
        $username=I('post.username');
        $where['username']=$username;
        $res=M('user')->where($where)->select();
        if (!$res) {
            echo 2;
        }
        else{
            echo 0;
            $email=M('user')->where($where)->getField('email');
            $code=rand(1,99);
            $data['code'] = $code;
            $list=M('user')->where($where)->save($data);
            $url="http://182.254.208.17/Tourist/index.php/Home/User/newpasd/username/".$username."/code/".$code;
            if (sendMail($email,'修改密码',"用户".$username.'请点击链接修改密码: '.$url)) {
               echo 1;
            }
            else{
                echo 0;
            }
            
       }
    } 


   public function newpasd(){
        $username =I('get.username');
        $code=I('get.code');
        $where['username']=$username;
        $usercode=M('user')->where($where)->getField('code');
        if ($usercode==$code&&$usercode!=0) {
            $this->assign("username",$username);
            $this->display("newpasd");
        }
        else{
            echo "<h1>警告！！！！您现在无权修改密码或非法操作！！！</h1>";
        }
        
   }

   public function updatepasd(){
        $username = I('post.username');
        $password = I('post.password');

        $where['username']=$username;
        $data['password'] = md5($password);
        $data['code']=0;
        $list=M('user')->where($where)->save($data);
        if ($list) {
            echo 1;
        }
        else{
            echo 0;
        }

   }


}









