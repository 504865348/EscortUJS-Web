<?php

/**
 * 重置一个数组
 * @param  Array $arr  需要重置的数组
 * @return Array       返回一个空数组
 */
function reset_array($arr){
	$arr = array();
	return $arr;
}

/**
 * 加密算法
 * @param  string $string 需要加密的字符串
 * @param  string $way    加密的方式，默认为md5
 * @return string         加密后的字符串
 */
function encrypt($string, $way="md5"){
	return $way($string);
}

function success_redirect($action,$msg="登录成功"){
	$url = SITE_URL."index.php";
	$options = explode("/",$action);
	if(count($options) == 1){
		$url .= "/" . MODULE_NAME;
		$url .= "/" . CONTROLLER_NAME;
		$url .= "/" . $options[0];
	}elseif(count($options) == 2){
		$url .= "/" . MODULE_NAME;
		$url .= "/" . $options[0];
		$url .= "/" . $options[1];
	}elseif(count($options) == 3){
		$url .= "/" .$options[0];
		$url .= "/" . $options[1];
		$url .= "/" . $options[2];
	}
	header("refresh:3;url=".$url);
	print($msg);
	print('<br/>正在加载，请稍等...<br/>三秒后自动跳转。');
}

function error_redirect(){
	printf("登录失败");
	print("<script>javascript:history.back(-1);</script>");
}

//用户输入的过滤
function post_filter($post_field){
	return htmlspecialchars($_POST[$post_field]);
}

function notEmptyValue($value){
	if(trim($value)==''){
		return false;
	}else{
		return true;
	}
}

