<?php

namespace Home\Model;
use Think\Model;

class GcendModel extends Model{
	function add_sheet($posts){
		$glist = D('Glist');
		$gid = $posts['gid'];
		$count = $glist -> getcount($gid);
		$gids = $glist -> getgids($gid);
		//echo $gid."~".$count.'~'.$gids;
		//exit();
		$curcount = count(explode("|",$gids))-1;
		if($curcount==$count){
			return false;
		}
		$data['gcend_gid']=$gid;
		$data['gcend_realname']=$posts['realname'];
		$data['gcend_phone']=$posts['phone'];
		$data['gcend_address']=$posts['address'];
		$data['gcend_toaddress']=$posts['toaddress'];
		$data['gcend_time']=time();
		$data['gcend_gtime']=strtotime($posts['get_day'].' '.$posts['get_time']);
		$data['gcend_deleted']=0;
		return $this->add($data);

	}
	function validate_post(){
		
	}
}