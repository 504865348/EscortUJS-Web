<?php 

namespace User\Controller;
use Think\Controller;
class CommonController extends Controller{
	function _initialize(){
		if(!isset($_COOKIE["user_phone"])||$_COOKIE["user_phone"]==""){
			$this->redirect("User/Login/login");
		}
	}
}