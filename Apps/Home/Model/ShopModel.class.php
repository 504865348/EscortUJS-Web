<?php

namespace Home\Model;
use Think\Model;

class ShopModel extends Model{
    public function fetchTableShop(){
    	$data = array ();
		$data['shop_realname']=I('shop_realname');
		$data['shop_phone']=I('shop_phone');
		$data['shop_comment']=I('shop_comment');
		$data['school_area_id']=I('school_area_id');
		$data['school_area_detail_id']=I('school_area_detail_id');
		$data['shop_roomid']=I('shop_roomid');
		return $data;
    }

    //既用于标准提交验证，也用于ajax验证
    public function shopDataValidate(&$data){
    	$msg = array ();
    	$msg['status'] = 1;

    	//自我感觉，用if比switch好，用foreach还要消耗循环时间
    	if(trim($data['shop_realname'])==''){
    		$msg['status'] = 0;
    		$msg['shop_realname'] = "购物人姓名不能为空";
    		$data['shop_realname'] = '';
    	}
    	$data['shop_phone'] = trim($data['shop_phone']);
    	if(!preg_match('/^1[3458][0-9]{9}$/', $data['order_phone'])){
    		$msg['status'] = 0;
    		$msg['order_phone'] = "请输入正确的购物人手机号码，不要保留+86等格式";
    	}
    	if(trim($data['shop_comment'])==''){
    		$msg['status'] = 0;
    		$msg['order_comment'] = "请填写详细的购物信息";
    	}
    	if(!is_numeric(trim($data['school_area_id']))){
    		$msg['status'] = 0;
    		$msg['school_area_id'] = "请选择学校区域";
    		$data['school_area_id'] = "";
    	}
    	if(!is_numeric(trim($data['school_area_detail_id']))){
    		$msg['status'] = 0;
    		$msg['school_area_detail_id'] = "请选择所在楼栋";
    		$data['school_area_detail_id'] = "";
    	}
    	if(!is_numeric(trim($data['shop_room_id']))){
    		$msg['status'] = 0;
    		$msg['order_room_id'] = "请填写房间编号";
    		$data['order_room_id'] = "";
    	}
    	return $msg;
    }
    
    public function addShop($user_id,$data){
    	$shop_data = array ();
    	$shop_data = $data;
		$shop_data['shop_userid'] = $user_id;
		$shop_data['shop_time'] = time();
		$shop_data['shop_deleted']=0;
		return $this->add($shop_data);
    }
}
