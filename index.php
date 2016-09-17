<?php

define('NO_CACHE_RUNTIME',true);
define('APP_PATH','./Apps/');
define('APP_DEBUG',true);
//定义站点
define('SITE_URL','/Apps/');
//定义样式目录
define('CSS_URL',SITE_URL.'Public/Css/');
//定义图片目录
define('IMAGES_URL',SITE_URL.'Public/images/');
//定义js目录
define('JS_URL',SITE_URL.'Public/Js/');
//定义bootstrap样式目录
define('BOOT_URL',SITE_URL.'Public/bootstrap/');
//定义组团代寄链接二维码的地址
define('GROUPCEND_URL',SITE_URL.'Public/images/group_cend/');
define('UEDITOR_URL','/Public/ueditor/');
//定义laydate地址
define('LAYDATE_URL',SITE_URL.'Public/laydate/laydate.js');
//定义layer地址
define("LAYER_URL",'/Public/layer/');

require "./ThinkPHP/ThinkPHP.php";

