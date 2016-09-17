<?php

namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{
	//执行登录
	public function dologin(){
		if(!isset($_POST)){
			$this->error('非法登录',U('Admin/Login/login'),2);
		}
		$rst = D('admin')->findAdmin();
		if(!$rst){
			$this->error('登录失败',U('Admin/Login/login'),2);
		}
		$_SESSION['account']=$admin_account;
		$_SESSION['vals']=md5($_SESSION['account'].'vals');
		$this->success('登录成功',U('Admin/Index/index'),2);
	}
	
	//退出登录
	public function logout(){
		if(!isset($_SESSION["account"])||$_SESSION["account"]==""){
			$this->error('非法进入后台，请登录',U('Admin/Login/login'));
		}
		if(!isset($_SESSION['vals'])||md5($_SESSION['account'].'vals')!=$_SESSION['vals']){
			$this->error('非法进入后台，请登录',U('Admin/Login/login'));
		}
		session_destroy();
		$this->success('成功退出',U('Admin/Login/login'));
	}
}