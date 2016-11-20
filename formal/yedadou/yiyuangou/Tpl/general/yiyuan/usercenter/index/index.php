<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>个人中心</title>
<link href="http://static.yedadou.com/public/yiyuan/general/css/userCenter.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div class="mainContainer">
	<div class="user">
		<div class="left">
			<img alt="Susan't Avatar" src="<?php $defaultAvatar = 'http://static.yedadou.com/public/images/default_user.gif'; echo !empty($user['avatar'])?substr($user['avatar'],0,strlen($user['avatar'])-1).'46':$defaultAvatar;?>">
		</div>
		<div class="right">
			<div class="name">(<span class="yellow"><?=$user['uid']?></span>)<?=$user['nick']?></div>
		</div>
	</div>
	<div class="userInfo">
		<div class="left">积分：<span class="yellow"><?=$balance['point']?></span>
		</div>
		<div class="right">
			<div>余额：<span class="yellow"><?=$balance['balance']?></span>元<a href="/yiyuan/UserCenter/recharge/add" id="btnMoney">去充值</a></div>
		</div>
	</div>
	<div class="menu clearfix">
		<a href="/yiyuan/UserCenter/YiyuanRecord">一元购记录<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/BingoList">中奖纪录<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/ShareOrder">我的晒单<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/ShareMoney">分享赚钱<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/CommissionDetails">积分明细<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/UserInfo">账号设置<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/Address">收货地址<div class="arrow-right"></div></a>
	</div>
</div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
</body>
</html>
