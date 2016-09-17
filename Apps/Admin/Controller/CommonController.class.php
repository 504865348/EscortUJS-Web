<?php

namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function _initialize(){
		//行为添加
		\Think\Hook::add('stop_server','Admin\\Behaviors\\TestBehavior');
		//后台登录检测
		if(!isset($_SESSION["account"])||$_SESSION["account"]==""){
			$this->error('非法进入后台，请登录',U('Admin/Login/login'));
		}
		if(!isset($_SESSION['vals'])||md5($_SESSION['account'].'vals')!=$_SESSION['vals']){
			$this->error('非法进入后台，请登录',U('Admin/Login/login'));
		}
		//为模板分配变量
		$account=$_SESSION['account'];
		$this->assign('account',$account);
	}
}