<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="" name="Keywords" />
<meta content="" name="Description" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo (BOOT_URL); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (CSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/bootstrap.js"></script>
<script type="text/javascript" src="/Public/layer/layer.js"></script>
<title>镖局留言板</title>
<script type="text/javascript">
function comment_show()
{
	layer.open({
		type:2,
		title:'test',
		content:'http://www.baidu.com'
	});
}
</script>
</head>
<body>
	<div>
		<div>
		<?php if(is_array($msg)): $i = 0; $__LIST__ = $msg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["user_realname"]); ?>&nbsp;&nbsp;<?php echo (date('Y-m-d H:i:s',$vo["msg_time"])); ?><br/><?php echo ($vo["msg_content"]); ?><br/>
			<a href="javascript:comment_show()">评论</a><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
</body>
</html>