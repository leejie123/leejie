<?php include($this->tpl('shop/public:html_header.php')) ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/cartSuccess.css?t=2015092501" />
		<title>购买成功</title>
	</head>
<?php
// 壹宝对接
$return_url = site_url().'/shop/userCenter/yibao';
$params = [
	'uid' => $this->getUid(),
	'appid' => 'sy63a5b1ef5c568b1f',
	'timestamp' => time(),
];
$sign = \Lib\App\Util::getMd5Sign($params,'f0&Sd#$6As@Df!(7');
$params['sign'] = $sign;
$params['return_url'] = $return_url;
$query_str = array2query($params);
$yb_api_url = 'http://m.ebaodai.com/?user&q=wxb_api_entry&'.$query_str;
$mod = model();
$mod->setTableName('yibao_status');
$yibao_status = $mod->where("uid={$this->getUid()}")->fetch();
$public = $this->getPublic();
?>
	<body class="">
		<div class="wrapper">
			<?php include($this->tpl('shop/public:header.php')) ?>
			<div><img src="<?=val($public,'qrcode_url')?>" class="qcodeMe" alt=""></div>
			<div class="cart-container">
					<!--购买成功-->
					<div class="cart-success text-center hide">
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
			<div id="hereMoneyTip"<?=val($yibao_status,'status')==1 ? ' style="display:none"' : ''?> class="mask-bg">
				<div class="middle-outer">
					<div class="text-center">
						<div id="hereMoney">
							<div><img src="{__STATIC_URL__}/public/front/default/images/demo/icon/successPop.png" class="bak"></div>
							<div class="btn1"></div>
							<div class="btn2"><a href="<?=$yb_api_url?>"></a></div>
							<div class="tip">您获得了10000元理财基金</div>
						</div>
					</div>
				</div>
			</div>
			<?php include($this->tpl('shop/public:footer.php')) ?>
		</div>
		<script>
			$(function(){
				$('#hereMoney .btn1').click(function(){
					$("#hereMoneyTip").hide();
				});
				
			});
		</script>
	</body>

</html>