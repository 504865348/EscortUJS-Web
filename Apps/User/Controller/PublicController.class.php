<?php

namespace User\Controller;
use Think\Controller;

class PublicController extends Controller{
	public function verify(){
		$config = array(
			'imageH' => 20,
			'imageW' => 120,
			'fontSize' => 12
		);
		$verify = new \Think\Verify($config);
		$verify -> entry();
	}
	public function test(){
		
	}
}