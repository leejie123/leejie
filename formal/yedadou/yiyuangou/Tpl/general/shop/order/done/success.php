<?php include($this->tpl('shop/public:html_header.php')) ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/cartSuccess.css?t=2015092501" />
		<style>
			body{font-size: 14px;background:#ffffff;}			
		</style>
		<title>购买成功</title>
	</head>
	<body class="">
		<div class="wrapper">
			<?php include($this->tpl('shop/public:header.php')) ?>
			<!--购物车容器-->
			<div class="cart-container">
					<!--购买成功-->
					<div class="cart-success text-center">
						<div class="cart-success-info">
							<div class="cart-success-image"><img src="{__STATIC_URL__}/public/front/default/images/demo/icon/cart-success.png" alt="" /></div>
							<div class="cart-success-tip">购买成功</div>
							<div class="cart-success-tip">订单号：<?=$order_sn?></div>
							<div class="cart-success-buy">
								<a title="" class="color-yellow" href="/shop/userCenter/myOrderList">
									订单管理
									
								</a>&nbsp;&nbsp;
								<a title="" class="color-yellow" href="/shop/">
									继续逛逛 &gt;
								</a>
								
							</div>
						</div>
					</div>
			</div>
			<?php include($this->tpl('shop/public:footer.php')) ?>
		</div>
	</body>
</html>