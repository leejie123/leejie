<?php include $this->tpl('shop:public/html_header.php') ?>
	<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
	<script src="{__STATIC_URL__}/public/??yiyuan/boboweb.js,yiyuan/ui/boboui.js,front/default/js/moneyAccount.js"></script>


	<title>账号设置</title>
	<style type="text/css">
		#usrInfo{
			font-size: 16px;
		}
	</style>
	</head>

	<body class="no-skin">
	<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
	<div class="menu clearfix" style="margin-bottom: 12px;">
		<a href="/yiyuan/UserCenter/agent/get"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/icon_daili.png');background-color:#fff;"></i><span>申请代理</span></a>
	</div>
	<div class="menu clearfix">
		<a href="/yiyuan/UserCenter/address" style="border-top:0px;"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/icon_address.png');background-color:#fff;"></i><span>收货地址管理</span></a>
	</div>
	</body>

</html>