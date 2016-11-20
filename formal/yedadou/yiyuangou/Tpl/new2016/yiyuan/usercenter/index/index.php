	<?php include $this->tpl('yiyuan:public/html_header.php') ?>
	<title>个人中心</title>
	<meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="{__STATIC_URL__}/public/emoji/emoji.css" />
	<link href="{__STATIC_URL__}/public/css/pure-min.css" rel="stylesheet" type="text/css" />
	<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
	<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/userCenter1.css" rel="stylesheet" type="text/css" />
	</head>	
	<body>										
	<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
	<?php //include $this->tpl('yiyuan:public/header.php') ?>
	<div class="mainContainer">
		<div class="user">
			<!-- <div class="left">
				<img alt="Susa	n't Avatar" src="">
			</div> -->
			
			<!-- info-card -->
			<div class="info-card">
				<a href="/yiyuan/UserCenter/userInfo/add">
					<i></i>
				</a>
				<div>
					<div class="avatar">
						<img src="<?php $defaultAvatar = '{__STATIC_URL__}/public/images/default_user.gif'; echo !empty($user['avatar'])?substr($user['avatar'],0,strlen($user['avatar'])-1).'46':$defaultAvatar;?>" alt="">
					</div>
					<div class="content">
						<p>
							<span style="font-size: 18px; width:80px;display:inline-block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;"><?=$user['nick']?></span>
						</p>
						<p style="margin-bottom: 4px;">会员 I D: <?=$user['uid']?></p>
						<p><?php echo $agent?'代理级别:'.$agent:'会员级别:普通会员' ?><?php echo $status?'(已冻结)':''?></p>
					</div>
				</div>
			</div>
			<!-- info-card -->

			<!-- fun -->
			<div class="pure-g operate">
				<div class="pure-u-1-2">
					<div class="point">
						<div onclick="window.location.href='/yiyuan/UserCenter/CommissionDetails'">
							<h3 style="display:block;;width:100px;overflow:hidden;color: #db3855;text-align:center;"><?=$balance['point']?><span style="color:#fff;position: absolute;opacity: 0;">point</span></h3>
							 <span>积分</span>
						</div>
						<a href="/yiyuan/UserCenter/withdraw" class="cus-btn cus-btn-red-border cus-btn-sm btnTx">提现</a>
					</div>
				</div>			
				<div class="pure-u-1-2">
					<div class="balance" onclick="window.location.href='/yiyuan/UserCenter/recharge'">
						<div>
							<h3 style="display:block;;width:100px;overflow:hidden;white-space:nowrap;color: #db3855;"><?=$balance['balance']?> <span style="font-size:10px;">元</span></h3>
							 <span>余额</span>
						</div>
						<a href="/yiyuan/UserCenter/recharge/add" class="cus-btn cus-btn-red-border cus-btn-sm">充值</a>
					</div>
				</div>			
			</div>
			<!-- fun -->

			<!-- aboutme -->
			<div class="card1">
				<div class="top">
					<div>
						<a href="/yiyuan/UserCenter/BingoList" class="icon">
							<div></div><span>我的大奖</span>
						</a>
						<a style="float:right;"><span>查看物流</span><i class=""></i></a>
					</div>
				</div>
				<div class="pure-g bottom">
					<div class="pure-u-1-3">
						<a href="/yiyuan/UserCenter/YiyuanRecord" class="content">
							<img src="{__STATIC_URL__}/public/yiyuan/new2016/images/btn_one.png" alt=""><br/>
							<span>一元购记录</span>
						</a>
					</div>
					<div class="pure-u-1-3">
						<a href="/yiyuan/UserCenter/PintuanRecord" class="content">
							<img src="{__STATIC_URL__}/public/yiyuan/new2016/images/btn_pin.png" alt=""><br/>
							<span>拼团记录</span>
						</a>
					</div>
					<div class="pure-u-1-3">
						<a href="/yiyuan/UserCenter/ShareOrder" class="content">
							<img src="{__STATIC_URL__}/public/yiyuan/new2016/images/btn_shai.png" alt=""><br/>
							<span>我的晒单</span>
						</a>
					</div>
				</div>
			</div>
			<!-- aboutme -->


			<!-- <div class="right">
				<div class="name">()</div>
				<div>积分：</div>
				<div><?php echo $agent?'代理级别:'.$agent:'' ?><?php echo $status?'(已冻结)':''?></div>
				<div>余额：元<a href="" id="btnMoney">充值</a></div>
			</div> -->
		</div>
		
		<!-- menu -->
		<div>
			<div class="menu clearfix" style="margin-bottom: 8px;">
				<a href="/yiyuan/UserCenter/ShareMoney"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_team.png')"></i><span>我的团队</span></a>
				<a href="<?php echo substr($makeMoney,0,4)=='http'?$makeMoney:'http://'.$makeMoney;?>"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_money.png')"></i><span>赚钱宝典</span></a>
			</div>

			<div class="menu clearfix" style="margin-bottom: 8px;">
				<a href="/yiyuan/UserCenter/CommissionDetails"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_integral.png')"></i><span>积分明细</span></a>
				<a href="/yiyuan/UserCenter/recharge"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_Recharge.png')"></i><span>充值记录</span></a>
			</div>


			<div class="menu clearfix" style="margin-bottom: 8px;">
				<a href="/yiyuan/UserCenter/MyCard"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_QR code.png')"></i><span>我的二维码</span></a>
				<a href="<?php echo substr($commonProblems,0,4)=='http'?$commonProblems:'http://'.$commonProblems;?>"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_question.png')"></i><span>常见问题</span></a>
			</div>

			<!-- texting -->
			<div style="display:none;">
				<a href="/yiyuan/UserCenter/address/add">收货地址</a><br/>
				<a href="/yiyuan/UserCenter/agent/get">agent</a>
				<a href="/yiyuan/UserCenter/address/update?id=15">修改收货地址</a>
				<a href="/yiyuan/UserCenter/address/get">新增地址</a>
				<a href="http://1047.m.yedadou.com/yiyuan/UserCenter/withdraw">提现</a>
				<a href="http://1047.m.yedadou.com/yiyuan/UserCenter/ShareOrder?act=show">晒单</a>
			</div>
			<!-- texting -->

			<!-- <div class="menu clearfix" >
				<a href="/yiyuan/UserCenter/CommissionDetails"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_integral.png')"></i>积分明细</a>
				<a href="/yiyuan/UserCenter/YiyuanRecord"><i style="background-image:url('"></i>购买记录</a>
				<a href="/yiyuan/UserCenter/BingoList"><i style="background-image:url('')"></i>中奖纪录</a>
			</div>

			<div class="menu clearfix">
				<a href="/yiyuan/UserCenter/PintuanRecord"><i style="background-image:url('')"></i>拼团记录</a>
				<a href="/yiyuan/UserCenter/ShareOrder"><i style="background-image:url('')"></i>晒单</a>
			</div>

			<div class="menu clearfix">
				<a href="/yiyuan/UserCenter/ShareMoney"><i style="background-image:url('')"></i>推广中心</a>
			</div>

			<div class="menu clearfix">
				<a href="/yiyuan/UserCenter/UserInfo"><i style="background-image:url('')"></i>账号设置</a>
				<a href="/yiyuan/UserCenter/Address"><i style="background-image:url('')"></i>收货地址</a>
			</div> -->
		</div>
		<!-- menu -->

	</div>
		<div style="display:block;height:53px;"></div>
		<!-- <div class="more"></div> -->
	<?php //include $this->tpl('yiyuan:public/footer.php') ?>
	<script>
		$('.top').on('click', function() {
			window.location.href = '/yiyuan/UserCenter/BingoList';
		})
	</script>
	<?php include $this->tpl('yiyuan:public/footerNav.php') ?>

	</body>
	</html>