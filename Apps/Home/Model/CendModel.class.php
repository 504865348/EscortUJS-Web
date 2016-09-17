<?php

namespace Home\Model;
use Think\Model;

class CendModel extends Model{
	function add_sheet($user_id,$posts){
		$data['user_id']=$user_id;
		$data['realname']=$posts['realname'];
		$data['phone']=$posts['phone'];
		$data['address']=$posts['address'];
		$data['register_time']=time();
		$data['status_id']=1;
		$data['delete']=0;
		$data['get_time']=strtotime($posts['get_day'].' '.$posts['get_time']);
		$data['cender_address']=$posts['cender_address'];
		return $this->add($data);
	}
	function validate_post(){
		
	}
}