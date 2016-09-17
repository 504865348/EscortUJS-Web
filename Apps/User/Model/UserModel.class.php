<?php

namespace User\Model;
use Think\Model;

class UserModel extends Model{
    public function getID($user_phone){
        $where['user_phone']=$user_phone;
        return $this->where($where)->getField('user_id');
    }

    //注册用户，用于完成数据验证和添加记录到数据库的功能
    public function addUser($type="add"){
    	$data['passcode'] = I('passcode');
		$data['user_phone'] = I('user_phone');
		$data['user_password'] = md5(I('user_password'));
		$data['user_enpassword'] = md5(I('user_enpassword'));
		$data['user_regtime'] = time();
		$valrst = $this->validate($data);
		if($valrst['status']){
			unset($data['user_enpassword']);
			if($type == "add")	$rst = $this -> add($data);
			if($type == "save") $rst = $this -> save($data);
			if(!$rst){
				$valrst['status'] = false;
				$valrst['errmsg'] = "由于系统原因，用户注册失败";
			}
		}
		return $valrst;
    }
    private function validate($data){
    	$rstArr = array ('status' => false);
    	if(md5($data['passcode'])!=$_SESSION['passcode']){
    		$rstArr['errmsg'] = "验证码错误";
    		return $rstArr;
    	}
    	if($this->getID($user_phone)>0){
    		$rstArr['errmsg'] = "用户已注册，请直接登录";
    		return $rstArr;
    	}
    	if(!preg_match("/^[a-zA-Z0-9_]{6,}$/", $data['user_password'])){
    		$rstArr['errmsg'] = "密码不符合规则，要求最少六位，大小写字母、数字、下划线";
    		return $rstArr;
    	}
    	if($data['user_password']!=$data['user_enpassword']){
    		$rstArr['errmsg'] = "两次密码不相同";
    		return $rstArr;
    	}
    	$rstArr['status'] = true;
    	return $rstArr;
    }
}