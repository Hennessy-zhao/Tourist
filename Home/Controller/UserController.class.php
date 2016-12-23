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

}









