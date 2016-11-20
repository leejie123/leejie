<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>个人中心</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/userCenter.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<?php include $this->tpl('yiyuan:public/header.php') ?>
<div class="mainContainer">
	<div class="user">
		<div class="left">
			<img alt="Susan't Avatar" src="<?php $defaultAvatar = '{__STATIC_URL__}/public/images/default_user.gif'; echo !empty($user['avatar'])?substr($user['avatar'],0,strlen($user['avatar'])-1).'46':$defaultAvatar;?>">
		</div>
		<div class="right">
			<div class="name"><?=$user['nick']?>(<?=$user['uid']?>)</div>
			<div>积分：<?=$balance['point']?></div>
			<div>余额：<?=$balance['balance']?>元<a href="/yiyuan/UserCenter/recharge/add" id="btnMoney">充值</a></div>
		</div>
	</div>
	<div class="menu clearfix">
		<a href="/yiyuan/UserCenter/YiyuanRecord">购买记录<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/BingoList">中奖纪录<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/ShareOrder">晒单<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/ShareMoney">推广中心<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/CommissionDetails">积分明细<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/UserInfo">账号设置<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/Address">收货地址<div class="arrow-right"></div></a>
	</div>
</div>
	<div class="more"></div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
</body>
</html>