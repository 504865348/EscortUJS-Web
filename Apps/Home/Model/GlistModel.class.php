<?php

namespace Home\Model;
use Think\Model;

class GlistModel extends Model{
	function add_apply($user_id,$posts){
		$data['glist_userid']=$user_id;
		$data['glist_phone']=$posts['phone'];
		$data['glist_count']=$posts['count'];
		$data['glist_gids']='';
		$data['glist_deleted']=0;
		$data['glist_time']=time();
		return $this->add($data);
	}
	function getcount($gid){
		$where['glist_id'] = $gid;
		return $this->where($where)->getField('glist_count');
	}
	function getgids($gid){
		$where['glist_id'] = $gid;
		return $this->where($where)->getField('glist_gids');
	}
	function getphone($gid){
		$where['glist_id'] = $gid;
		return $this->where($where)->getField('glist_phone');
	}
}