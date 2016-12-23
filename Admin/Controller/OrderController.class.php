<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {
 
 
    public function index(){
        $this->display("index");
    }

   
    public function getorders(){
    	$where['selectnumber'] > 0;
    	$list=M('routes')->where("selectnumber > 0")->select();
        $arrs="[";
        
        foreach($list as $list){
        
            $arrs=$arrs."{";
            $arrs=$arrs."id : '".$list['id']."',";
            $arrs=$arrs."name : '".$list['name']."',";
            $arrs=$arrs."traveldesc : '".$list['traveldesc']."',";
            $arrs=$arrs."daytimes : '".$list['daytimes']."',";
            $arrs=$arrs."selectnumber : '".$list['selectnumber']."'},";
        
        }
        $arrs=$arrs."]";
        var_dump($arrs);
    }


    public function lookorder(){
        $routeid=I('get.routeid');
        $where1['id']=$routeid;
        $routename=M('routes')->where($where1)->getField("name");
        $this->assign("routename",$routename);

        $where['routeid']=$routeid;
        $orderlist=M('orders')->where($where)->select();
        $this->assign("order",$orderlist);


        $ordermemeber=M('ordermemeber')->where($where)->select();
        $this->assign("member",$ordermemeber);

        $this->display("lookorder");

    }

    public function deleteallorder(){
        $routeid=I('post.id');

        $where['routeid']=intval($routeid);
        $res=M('orders')->where($where)->delete();

        $where1['routeid']=intval($routeid);
        $res1=M('ordermemeber')->where($where1)->delete();
        if ($res&&$res1) {
            echo 1;
        }
        else{
            echo 2;
        }
    }


    public function deletorder(){
        $id=I('post.id');
        $where['id']=intval($id);
        $res=M('orders')->where($where)->delete();

        $where1['orderid']=intval($id);
        $res1=M('ordermemeber')->where($where1)->delete();
        if ($res&&$res1) {
            echo 1;
        }
        else{
            echo 2;
        }
    }


}