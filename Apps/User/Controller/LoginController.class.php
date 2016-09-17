<?php

namespace User\Controller;
use Think\Controller;

class LoginController extends Controller{
	public function login(){
		if(empty($_POST)){
			$this->display();
			return ;
		}
		$user = M('User');
		$user_phone = I('user_phone');
		$user_password = I('user_password');
		$where['user_phone'] = $user_phone;
		$where['user_password'] = md5($user_password);
		$res = $user->where($where)->find();
		if(NULL != $res){
			if($res['status']==1){
				session('[start]');
				session(null);
				$_SESSION['user_phone']=$user_phone;
				cookie('user_phone',$user_phone);
				$this->success('登录成功',U('Home/Index/index'),2);					
			}
			else{
				$this->error('你的账号已查封');
			}

		}else{
			$this->error("登录失败");
		}
	}
	
	public function logout(){
		session_destroy();
		cookie(null);
		$this->success("退出登录成功",U('User/Login/login'),2);
	}
}