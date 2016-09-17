<?php

namespace Home\Model;
use Think\Model;

class LcendModel extends Model{
	function add_sheet($user_id,$posts){
		$data['lcend_userid']=$user_id;
		$data['lcend_firstrealname']=$posts['firstrealname'];
		$data['lcend_secondrealname']=$posts['secondrealname'];
		$data['lcend_firstphone']=$posts['firstphone'];
		$data['lcend_secondphone']=$posts['secondphone'];
		$data['lcend_firstaddress']=$posts['firstaddress'];
		$data['lcend_secondaddress']=$posts['secondaddress'];
		$data['lcend_firsttoaddress']=$posts['firsttoaddress'];
		$data['lcend_secondtoaddress']=$posts['secondtoaddress'];
		$data['lcend_time']=time();
		$data['lcend_delete']=0;
		$data['lcend_gtime']=strtotime($posts['get_day'].' '.$posts['get_time']);
		return $this->add($data);
	}
}