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

        $this->assign('routeid',$id);
        $this->assign('routename',$travelname);
        $this->assign('price',$price);


        $this->display("pay");
    }


    public function addorder(){
        $memcount=I('post.memcount');
        $price=I('post.price');
        $routeid=I('post.routeid');


        //添加新的订单
        $where['username']=$_SESSION['username'];
        $userid=M('user')->where($where)->getField('id');
        $truename=M('user')->where($where)->getField('truename');
        $ordercount=M('user')->where($where)->getField('ordercount');

        $data=array(
            'routeid' => $routeid,
            'userid' => $userid,
            'username' => $truename,
            'price' => $price*$memcount,
            'memcount' => $memcount,
            'daytimes' => date('y-m-d H:i:s',time())
            );

        $result=M('orders')->add($data);

        //在旅游路线中数量selectnumber数据
        $where1['id']=$routeid;
        $numbers=M('routes')->where($where1)->getField('selectnumber');
        $selectnumber=intval($numbers)+1;
        $data1['selectnumber'] = $selectnumber;
        $result1=M('routes')->where($where1)->save($data1);

        //在user表的ordercount加一个
        $newordercount=intval($ordercount)+1;
        $newdata['ordercount']=$newordercount;
        $where2['id']=$userid;
        $result2=M('user')->where($where2)->save($newdata);

        //向数据表ordermemeber里面添加数据
        for ($i=1; $i <= $memcount; $i++) { 
            $data2=array(
                'orderid' => $result,
                'name' => I('post.membername_'.$i),
                'idnumber' => I('post.memberid_'.$i),
                'routeid' => $routeid,
                'daytimes' => date('y-m-d H:i:s',time())
            );
            $results=M('ordermemeber')->add($data2);
        }

        $wheres['id']=$routeid;
        $list=M('routes')->where($wheres)->select();
        $emailmessage=$truename."先生/女士，您好，您的旅游订单已提交，我们的导游会尽快联系您。具体旅游信息如下：\n".$list[0]['name']."\n 旅游简介：".$list[0]['traveldesc']."\n 旅游天数：".$list[0]['daynumber']."\n 旅行时间：".$list[0]['daytimes']."\n 交通:".$list[0]['traffic']."\n 住宿条件：".$list[0]['livedesc']."\n 三餐条件：".$list[0]['fooddesc']."\n 感谢您的参加。";
        $whereuser['id']=$userid;
        $useremail=M('user')->where($whereuser)->getField('email');
        sendMail($useremail,'旅行信息',$emailmessage);


       $this->redirect("Home/select/index/routeid/".$routeid);
        
    }
   


}