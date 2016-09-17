<?php

namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	public function getID($user_phone){
		$where['user_phone']=$user_phone;
		return $this->where($where)->getField('user_id');
	}
}