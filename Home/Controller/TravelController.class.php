<?php
namespace Home\Controller;
use Think\Controller;
class TravelController extends Controller {

    //热门游
    public function popular(){
         $this->display("popular");   
    }

    //周边游
    public function around(){
        $this->display("around");
    }

    //国内游
    public function internal(){
        $this->display("internal");
    }

    //港澳台游
    public function harbor(){
        $this->display("harbor");
    }

    //日韩游
    public function island(){
        $this->display("island");
    }

    //欧美游
    public function europe(){
        $this->display("europe");
    }

    //边境游
    public function border(){
        $this->display("border");
    }

    //澳新非游

    public function austra(){
        $this->display("austra");
    }

    
    //获取最受欢迎的路线
    public function getmost(){
        $kinds=I('get.kinds');
        if ($kinds==0) {
            $list=M('routes')->field(true)->order('selectnumber desc')->limit(3)->select();
        }else{
            $where['kinds']=$kinds;
            $list=M('routes')->field(true)->where($where)->order('selectnumber desc')->limit(3)->select();
        }
        

        $arrs="[";
        
         foreach($list as $list){
        
            # code...
            $arrs=$arrs."{";
            $arrs=$arrs."id : '".$list['id']."',";
            $arrs=$arrs."name : '".$list['name']."',";
            $arrs=$arrs."image : '".$list['image']."',";
            $arrs=$arrs."traveldesc : '".$list['traveldesc']."'},";
        //}
        }
        $arrs=$arrs."]";
        var_dump($arrs);
    }

    //获取最受欢迎的路线
    public function getroutes(){
        $kinds=I('get.kinds');
        if ($kinds==0) {
            $list=M('routes')->field(true)->order('selectnumber desc')->select();
        }
        else{
           $where['kinds']=$kinds;
            $list=M('routes')->field(true)->where($where)->select(); 
        }
        
        $arrs="[";
        
         foreach($list as $list){
        
            # code...
            $arrs=$arrs."{";
            $arrs=$arrs."id : '".$list['id']."',";
            $arrs=$arrs."name : '".$list['name']."',";
            $arrs=$arrs."image : '".$list['image']."',";
            $arrs=$arrs."price : '".$list['price']."',";
            $arrs=$arrs."traveldesc : '".$list['traveldesc']."'},";
        //}
        }
        $arrs=$arrs."]";
        var_dump($arrs);
    }


}