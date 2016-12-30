<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $count=M('user')->field(true)->count();

        $this->assign('count',$count);
        $this->display("index");
    }
 
    public function getusers(){
    	$list=M('user')->field(true)->select();
        $arrs="[";
        
         foreach($list as $list){
        
            # code...
            $arrs=$arrs."{";
            $arrs=$arrs."id : ".$list['id'].",";
            $arrs=$arrs."username : '".$list['username']."',";
            $arrs=$arrs."email : '".$list['email']."',";
            $arrs=$arrs."phone : '".$list['phone']."',";
            $arrs=$arrs."ordercount : '".$list['ordercount']."',";
            $arrs=$arrs."advisecount : '".$list['advisecount']."'},";
        //}
        }
        $arrs=$arrs."]";
        var_dump($arrs);
    }


    public function deleteuser(){
    	$id=I('post.id');
        $where['id']=intval($id);
        $res=M('user')->where($where)->delete();
        if ($res) {
            echo 1;
        }
        else{
            echo 2;
        }
    }



    public function look(){
    	$userid=I('get.userid');
    	$where['id']=$userid;
    	$list=M('user')->where($where)->select();
    	$user=$list[0];
    	$this->assign("user",$user);

    	$this->display("look");

    }

    public function doemail(){
        $email=I('post.email');
        $message=I('post.messages');
        if(sendMail($email,'你好!亲爱的畅游网用户',$message)){
            echo 1;
        }
        else{
            echo 2;
        }
    }
  

}