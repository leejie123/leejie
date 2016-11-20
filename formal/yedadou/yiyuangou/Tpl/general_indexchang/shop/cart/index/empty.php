<?php include($this->tpl('shop/public:html_header.php')) ?>
	<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/cart.css" />
		<script src="{__STATIC_URL__}/public/front/default/js/cart.js"></script>
		<title>购物车</title>
	</head>

	<body class="">
		<div class="wrapper">
			<?php include($this->tpl('shop/public:header.php')) ?>
			<!--购物车容器-->
			<div class="cart-container">
				<form id="buyForm" method="post" action="buySuccess.html" >
					<!--购物车为空-->
					<div class="cart-empty text-center">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="{__STATIC_URL__}/public/front/default/images/demo/icon/cart-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您的购物车为空</div>
							<div class="cart-empty-buy">
								<a title="" class="color-yellow" href="/shop/index">
									马上去逛逛吧 &gt;
								</a>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!--公用底部开始-->
			<footer class="footer-menu clearfix" id="footer">
				<div class="footer-container">
					<div class="footer-item total-button disable">
						<div class="middle-outer">
							<div class="middle-inner text-center white">
								合计：￥<span id="totalMoney">0</span>
							</div>
						</div>
					</div>
					<!--如果购物车为空则要加上disable类-->
					<!--<div class="footer-item pay-button disable" id="payButton">-->
					<div class="footer-item pay-button disable" id="payButton">
						<div class="middle-outer">
							<div class="middle-inner text-center white">
								微信支付
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</body>

</html>