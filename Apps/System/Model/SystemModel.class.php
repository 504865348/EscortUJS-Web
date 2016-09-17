<?php

namespace System\Model;
use Think\Model;

class SystemModel extends Model{
	function validate_login($acc,$pwd){
		$sys_acc = $this->where("sys_infoname='account'")->getField('sys_infovalue');
		$sys_pwd = $this->where("sys_infoname='pwd'")->getField('sys_infovalue');
		if($acc == $sys_acc && $pwd == $sys_pwd) return true;
			else 	return false;
	}
}