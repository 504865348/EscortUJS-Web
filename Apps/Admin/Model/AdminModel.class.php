<?php

namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{
	public function findAdmin(){
		$admin_account =I('admin_account');
		$admin_password = md5(I('admin_password'));
		$where['admin_account'] = $admin_account;
		$where['admin_password'] = $admin_password;
		$rst=$admin->where($where)->select();
		return $rst;
	}
}