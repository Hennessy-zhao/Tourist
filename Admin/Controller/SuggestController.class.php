<?php
namespace Admin\Controller;
use Think\Controller;
class SuggestController extends Controller {

    public function index(){
        $this->display("index");
    }



    public function getsuggets(){
    	$list=M('suggest')->select();
        $arrs="[";
        
        foreach($list as $list){
        
            $arrs=$arrs."{";
            $arrs=$arrs."id : ".$list['id'].",";
            $arrs=$arrs."name : '".$list['name']."',";
            $arrs=$arrs."phone : '".$list['phone']."',";
            $arrs=$arrs."email : '".$list['email']."',";
            $arrs=$arrs."reply : '".$list['reply']."',";
            $arrs=$arrs."message : '".$list['message']."'},";
        
        }
        $arrs=$arrs."]";
        var_dump($arrs);
    }


    public function deletesuggest(){
    	$id=I('post.id');
        $where['id']=intval($id);
        $res=M('suggest')->where($where)->delete();
       
        if ($res) {
            echo 1;
        }
        else{
            echo 2;
        }
    }

    public function reply(){
    	$id=I('post.id');
    	$reply=I('post.reply');
    	$data['reply'] = $reply;
    	$where['id']=$id;
		$result=M('suggest')->where($where)->save($data);

        $email=M('suggest')->where($where)->getField("email");

        sendMail($email,'你好!亲爱的畅游网用户',"我们已经收到您的投诉/建议，并对此进行回复：".$reply);
          
		if ($result) {
		   echo 1;
		}
		else{
			echo 2;
		}                             
    }
  

}