<?php

namespace System\Controller;
use Think\Controller;

class CommonController extends Controller{
	function _initialize(){
		$system=D('System');
		$acc = cookie('sys_account');
		$pwd = cookie('sys_password');
		if(!$system->validate_login($acc,$pwd)){
			$this->redirect('Login/index');
		}
	}
}