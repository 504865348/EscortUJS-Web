<?php
namespace Admin\Controller;
use Think\Controller;
class PrintController extends Controller{
	function tt(){
		if($_GET['id']&&$_GET['from']){
			$content=W('Order/orderContent',array('order_id'=>$_GET['id']));
			echo $content;
		}
	}	

	function get_scan(){
		vendor("phpqrcode.phpqrcode");
		$str = "http://express.vastsum.net/index.php/Admin/print/check/orderid=100&confirm=ok&device=android";
		$level = 'L';
		$size = 5;
		$path = "Apps/Public/images/ordercodes/";
		$order_id = 100;
		$fileName = $path.$order_id.'png';
		\Qrcode::png($str,$fileName,$level,$size);
		echo "<img src='http://express.vastsum.net/".$fileName."'/>";
	}

	function  check(){
		if($_GET['orderid']==100 && $_GET['confirm']=='ok' && $_GET['device'] == 'android'){
			$ajaxResult = array ('status' => 1,'msg' => 'Confirm finished');
			echo json_encode($ajaxResult);
		}else{
			$ajaxResult = array ('status' => 0,'msg' => 'Confirm failed');
			echo json_encode($ajaxResult);
		}
	}
}