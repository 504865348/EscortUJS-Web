<?php

namespace User\Controller;
use Think\Controller;

class RegisterController extends Controller{
	
	//用户注册
	 public function register(){
		if(empty($_POST)){
			$this->display();
			exit ;
		}
		$rst = D('User')->addUser();
		if($rst['status']){
			$this->success('注册成功',U('User/Login/login'),2);
		}else{
			$this->error($rst['msg']);
		}
	}

	//忘记密码
	public function forgetpassword(){
		if(empty($_POST)){
			$this->display();
			exit();
		}
		$rst = D('User')->addUser("save");
		if($rst['status']){
			$this->success('修改密码成功',U('User/Login/login'),2);
		}else{
			$this->error($rst['msg']);
		}
	}
	
	//ajax注册验证
	public function regValidate(){
		if(!isset($_GET['pnum'])){
			echo "非法进入";
		}else if(D('user')->getID(I('get.pnum'))){
			echo "用户已注册，请直接登录";
		}
	}
	
	//执行验证码发送
	public function cendMessage(){
		$user_phone = I('user_phone');
		$code = I('code');
		session('passcode',md5($code));
		$argv = array( 
			'name'    .  '='  .   '15751005437',     //必填参数。用户账号
			'pwd'     .  '='  .   '9FA6EB4D075A98F84F896CF0D451',     //必填参数。（web平台：基本资料中的接口密码）
			'content' .  '='  .   '短信验证码为：'.$code.'，请勿将验证码提供给他人。',   //必填参数。发送内容（1-500 个汉字）UTF-8编码
			'mobile'  .  '='  .   $user_phone,   //必填参数。手机号码。多个以英文逗号隔开
			'stime'   .  '='  .   '',   //可选参数。发送时间，填写时已填写的时间发送，不填时为当前时间发送
			'sign'    .  '='  .   '兼职么',    //必填参数。用户签名。
			'type'    .  '='  .   'pt',  //必填参数。固定值 pt
			'extno'   .  '='  .   ''    //可选参数，扩展码，用户定义扩展码，只能为数字
		); 
		//构造要post的字符串
		$params = implode('&',$argv);
		$url = "http://sms.1xinxi.cn/asmx/smsservice.aspx?".$params; //提交的url地址
		$con= substr( file_get_contents($url), 0, 1 );  //获取信息发送后的状态
		echo $con;
	}
	
	
}