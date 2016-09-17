<?php
return array(
	//'配置项'=>'配置值'
	'URL_HTML_SUFFIX'       =>   '',
	
	/* 数据库设置 */
    'DB_HOST'               =>   '115.28.74.4',
    'DB_USER'               =>   'express', 
    'DB_PWD'                =>   '123456',
	
	/*公用数据库配置*/
	'DB_TYPE'               =>   'mysql',     
	'DB_PORT'               =>   '3306',
	'DB_NAME'               =>   'express',
    'DB_PREFIX'             =>   'exp_',
    'DB_CHARSET'            =>   'utf8',
	
	'URL_MODEL'             =>   '2',
	'SESSION_AUTO_START'    =>   true,
	
	'LANG_SWITCH_ON'        =>   true,   
	'LANG_AUTO_DETECT'      =>   true,
	'LANG_LIST'             =>   'zh-cn,en-us,zh-tw', 
	'VAR_LANGUAGE'          =>   'hl', 
	'COOKIE_EXPIRE'         =>   8640000,
	
	//缓存
	'APP_DEBUG'             =>   true, 
	'DB_FIELD_CACHE'        =>   false, 
	'HTML_CACHE_ON'         =>   false,
	'TMPL_CACHE_ON'         =>   false,

	//表单令牌启用
	'TOKEN_ON'              =>   true,  // 是否开启令牌验证
	'TOKEN_NAME'            =>   '__hash__',    // 令牌验证的表单隐藏字段名称
	'TOKEN_TYPE'            =>   'md5',  //令牌哈希验证规则 默认为MD5
	'TOKEN_RESET'           =>   true,  //令牌验证出错后是否重置令牌 默认为true
	
	//程序内配置
	'SERVER_CLOSE_TIME'		=>	"2016-5-24 12:51:00", //关闭主页面服务的时间
	);