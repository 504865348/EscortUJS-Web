<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="" name="Keywords" />
        <meta content="" name="Description" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <base target="_blank" /> -->
      <link href="<?php echo (BOOT_URL); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet" />
	   <link href="<?php echo (CSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo (BOOT_URL); ?>js/bootstrap.js"></script>
		<title>代寄快递</title>
		<script type="text/javascript" src="<?php echo (LAYER_URL); ?>layer.js"></script>
	</head>
	<body>
	<div class="jumbotron">
	  <div class="container">
	  <h1>毕业季代寄服务</h1>
	  <p>我们是江大学生创业团队，今年将毕业季行李托运我们做了线上平台，希望今年的毕业季可以远离‘兵荒马乱’、走得潇洒肆意！让你的快递不出宿舍就可以完成代寄，在我们平台预约下单后可以邀请你的好友参与到预约中，凑一个‘团购寄’，实实在在的优惠哦！</p>
	  <hr/>
		  <div class="row">
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <img src="<?php echo (IMAGES_URL); ?>cend.jpg" alt="直接派送" />
			      <div class="caption">
			        <h3>个人代寄</h3>
			        <p>匆匆四年，总有那么一段时间喜欢自己静静做自己喜欢的事，喜欢一个人的旅行......</p>
			        <p><a href="/Home/Cend/cend_express" class="btn btn-primary" role="button">我要下单</a> <a href="/Home/Cend/direct_desc" class="btn btn-default" role="button">更多详情</a></p>
			      </div>
			    </div>
			  </div>
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <img src="<?php echo (IMAGES_URL); ?>lovercend.jpg" alt="情侣派送" />
			      <div class="caption">
			        <h3>情侣代寄</h3>
			        <p>幸运的你遇到了幸运的她。感谢在最美的青春年华有你的陪伴......</p>
			        <p><a href="/Home/Cend/lover_cend" class="btn btn-primary" role="button">我要下单</a> <a href="/Home/Cend/lover_desc" class="btn btn-default" role="button">更多详情</a></p>
			      </div>
			    </div>
			  </div>
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <img src="<?php echo (IMAGES_URL); ?>groupcend.jpg" alt="组团代寄" />
			      <div class="caption">
			        <h3>好友代寄</h3>
			        <p>都说大学最好的不过挚友。是否还记得当初许下互相拜访家乡求包养的誓言......</p>
			        <p><a href="/Home/Cend/apply_group" class="btn btn-primary" role="button">我要下单</a> <a href="/Home/Cend/group_desc" class="btn btn-default" role="button">更多详情</a></p>
			      </div>
			    </div>
			  </div>
			</div>
	  </div>
	</div>
	</body>
</html>