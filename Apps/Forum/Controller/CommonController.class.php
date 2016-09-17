<?php

namespace Forum\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function _initialize(){
		if(!isset($_COOKIE["user_phone"])||$_COOKIE["user_phone"]==""){
			$this->redirect("User/Login/login");
		}
	}
}