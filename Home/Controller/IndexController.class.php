<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

    	$username='';
    	$phone='';
    	$email='';

    	if ($_SESSION['username']!="") {
    		$where['username']=$_SESSION['username'];
    		$list=M('user')->where($where)->select();
    		$username=$list[0]['truename'];
    		$phone=$list[0]['phone'];
    		$email=$list[0]['email'];
    	}

        

    	$this->assign("username",$username);
    	$this->assign("phone",$phone);
    	$this->assign("email",$email);

        $this->display("home");
    }



    public function login(){
    	$username=I('post.user');	
		$password=I('post.pasd');

        if(strlen($username) > 6 && preg_match("/^[\w\-\.]+@[\w\-]+(\.\w+)+$/",$username)){
            $where2['email']=$username;
            $list2=M('user')->where($where2)->select();

            if ($list2) {
                $sessionname=$list2[0]['username'];
                $pasd=$list2[0]['password'];
                if (md5($password)==$pasd){
                     $_SESSION['username']=$sessionname;
                     echo 1;
                }
                else{
                    echo 0;
                }
            }
            else{
                echo 2;
            }
        }
        else{
            $where['username']=$username;
            $list=M('user')->where($where)->select();
            if ($list) {
                $pasd=$list[0]['password'];
                if (md5($password)==$pasd) {
                    $_SESSION['username']=$username;
                    echo 1;
                }
                else{
                    echo 0;
                }
            }
            else{
                echo 2;
            }

		}
       

    }


    public function Sessionuse(){
    	$_SESSION['username']=NULL;
    	$this->redirect("Index/index");
    }


}