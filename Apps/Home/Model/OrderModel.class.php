<?php

namespace Home\Model;
use Think\Model;

class OrderModel extends Model{
    public function fetchTableOrder(){
    	$data = array ();
		$data['order_realname']=I('order_realname');
		$data['order_phone']=I('order_phone');
		$data['order_expcompany_id']=I('order_expcompany_id');
		$data['order_server_id']=I('order_server_id');
		$data['order_comment']=I('order_comment');
		$data['school_area_id']=I('school_area_id');
		$data['school_area_detail_id']=I('school_area_detail_id');
		$data['order_express_id']=I('order_express_id');
		$data['order_room_id']=I('order_room_id');
		return $data;
    }

    //既用于标准提交验证，也用于ajax验证
    public function orderDataValidate(&$data){
    	$msg = array ();
    	$msg['status'] = 1;

    	//自我感觉，用if比switch好，用foreach还要消耗循环时间
    	if(trim($data['order_realname'])==''){
    		$msg['status'] = 0;
    		$msg['order_realname'] = "收件人姓名不能为空";
    		$data['order_realname'] = '';
    	}
    	$data['order_phone'] = trim($data['order_phone']);
    	if(!preg_match('/^1[3458][0-9]{9}$/', $data['order_phone'])){
    		$msg['status'] = 0;
    		$msg['order_phone'] = "请输入正确的收件人手机号码，不要保留+86等格式";
    	}
    	if(!is_numeric(trim($data['order_expcompany_id']))){
    		$msg['status'] = 0;
    		$msg['order_expcompany_id'] = "请选择快递公司";
    		$data['order_expcompany_id'] = "";
    	}
    	if(!is_numeric(trim($data['order_server_id']))){
    		$msg['status'] = 0;
    		$msg['order_server_id'] = "请选择服务";
    		$data['order_server_id'] = "";
    	}
    	if(trim($data['order_comment'])==''){
    		$msg['status'] = 0;
    		$msg['order_comment'] = "请填写详细的快递信息";
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
    	if(!is_numeric(trim($data['order_express_id']))){
    		$msg['status'] = 0;
    		$msg['order_express_id'] = "请填写快递编号";
    		$data['order_express_id'] = "";
    	}
    	if(!is_numeric(trim($data['order_room_id']))){
    		$msg['status'] = 0;
    		$msg['order_room_id'] = "请填写房间编号";
    		$data['order_room_id'] = "";
    	}
    	return $msg;
    }

    public function addOrder($user_id,$data){
    	$order_data = array ();
    	$order_data = $data;
		$order_data['order_user_id'] = $user_id;
		$order_data['order_time'] = time();
		return $this->add($order_data);
    }
}
