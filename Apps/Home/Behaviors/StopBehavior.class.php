<?php

namespace Home\Behaviors;
use Think\Behavior;
class StopBehavior extends Behavior{
	public function run(&$param){
		$time = strtotime(C('SERVER_CLOSE_TIME'));
		if(time()>$time){
			echo "<script>location.href='http://{$_SERVER['SERVER_NAME']}/Home/Index/stopServer';</script>";
		}
	}
}
