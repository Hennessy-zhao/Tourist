<?php
namespace Home\Controller;
use Think\Controller;
class SelectController extends Controller {
    public function index(){

    	$id=I('get.routeid');

    	$this->assign('routeid',$id);

        $this->display("index");
    }

    public function getroutemsg(){
    	$id=I('get.routeid');
    	$where['id']=intval($id);
    	$list=M('routes')->field(true)->where($where)->select();

    	$arrs="[";
        
      	$arrs=$arrs."{";
        $arrs=$arrs."id : '".$list[0]['id']."',";
        $arrs=$arrs."name : '".$list[0]['name']."',";
        $arrs=$arrs."image : '".$list[0]['image']."',";
        $arrs=$arrs."price : '".$list[0]['price']."',";
        $arrs=$arrs."traffic : '".$list[0]['traffic']."',";
        $arrs=$arrs."daynumber : '".$list[0]['daynumber']."',";
        $arrs=$arrs."liveimg : '".$list[0]['liveimg']."',";
        $arrs=$arrs."livedesc : '".$list[0]['livedesc']."',";
        $arrs=$arrs."fooddesc : '".$list[0]['fooddesc']."',";
        $arrs=$arrs."daytimes : '".$list[0]['daytimes']."',";
        $arrs=$arrs."traveldesc : '".$list[0]['traveldesc']."'},";
        
        $arrs=$arrs."]";

        var_dump($arrs);
    }


    public function getschemsg(){
    	$id=I('get.routeid');
    	$where['routeid']=intval($id);
    	$list=M('schedule')->field(true)->where($where)->select();

    	$arrs="[";
        
         foreach($list as $list){
        
            $arrs=$arrs."{";
            $arrs=$arrs."routeid : '".$list['routeid']."',";
            $arrs=$arrs."daynumber : '".$list['daynumber']."',";
            $arrs=$arrs."travelimg : '".$list['travelimg']."',";
            $arrs=$arrs."traveldesc : '".$list['traveldesc']."'},";
        //}
        }

        $arrs=$arrs."]";
        var_dump($arrs);
    }


    public function pay(){
        $id=I('get.routeid');

        $where['id']=$id;
        $list=M('routes')->field(true)->where($where)->select();

        $travelname=$list[0]['name'];
        $price=$list[0]['price'];
        $this->assign('routename',$travelname);
        $this->assign('price',$price);


        $this->display("pay");
    }


    public function addorder(){
        
    }
   


}