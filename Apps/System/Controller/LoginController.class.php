<?php

namespace System\Controller;
use Think\Controller;

class LoginController extends Controller{
	function index(){
		if(!isset($_POST)||empty($_POST)){
			//显示登录页面
			$this->display();
		}else{
			//登录逻辑
			$acc = I('sys_account');
			$pwd = I('sys_password');
			$system = D('System');
			if($system->validate_login($acc,$pwd)){
				cookie('sys_account',$acc,'expire=3600');
				cookie('sys_password',$pwd,'expire=3600');
				echo json_encode(array('status'=>true));
				
			}else{
				echo json_encode(array('status'=>false));
				
			}
		}
	}
	function login(){
		$this->display();
	}
}