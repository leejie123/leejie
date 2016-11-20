<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>充值记录</title>
<link href="http://static.yedadou.com/public/yiyuan/css/rechargeList.css" rel="stylesheet" type="text/css" />
</head>
<body>
<body>
	<header class="clearfix"><a href="/yiyuan/UserCenter/recharge/add">我要充值</a><a href="#" class="select">充值记录</a></header>
	<form id="payGo" method="post">
		<div class="container">
			<div class="title">当前金额：<span class="red1"><?=val($balance, 'balance', 0.00)?></span>元</div>
			<div class="tip red1">*最近三个月的充值记录</div>
			<div class="table" id="list">
				<div>
					<div>金额</div>
					<div>方式</div>
					<div>时间</div>
				</div>
			</div>
			<div class="table" id="mainContainer">

			</div>
		</div>
	</form>
</body>
</html>
<script type="text/javascript" src="http://static.yedadou.com/public/yiyuan/dopage.js"></script>
<script>
	$(function(){
		var urlPageList='/yiyuan/UserCenter/recharge';
		var $container=$('#mainContainer');
		doPage(urlPageList,$container);
	});
</script>