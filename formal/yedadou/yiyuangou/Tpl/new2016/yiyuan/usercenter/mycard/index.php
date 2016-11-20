<?php include $this->tpl('shop:public/html_header.php') ?>
<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/address.css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/??public1.css,mycard.css" rel="stylesheet" type="text/css" />
<title>我要推广</title>
<style>
	.cus-empty {
		height:350px;
		min-height: 350px;
	}
</style>
	</head>

	<body class="">
	<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
		<div class="wrapper">
			<?php //include $this->tpl('yiyuan:public/header.php') ?>
			<!--我的推广容器-->
			<div class="cart-container">
					<div class="cart-not-empty">
						<div id="cartList" class="cart-list-container">
							<!--商品[START]-->
							<?php if(!$isEmpty):?>
							<?php foreach ($myCard as $arr):?>
							<div class="g-item" style="height:130px;">
								<div class="media relative">
									<div class="media-left ">
										<a href="/yiyuan/userCenter/myCardView?card_id=<?=$arr['id']?>">
											<img class="media-object" src="<?=$arr['thumb_url']?>" alt="">
										</a>
									</div>
									<div class="media-body relative">
										<div class="footerBtn">
											<a class="cus-btn cus-btn-md cus-btn-red-border" style="letter-spacing:6px;width:80px;letter-spacing:" href="/yiyuan/userCenter/sendCardToWx?card_id=<?=$arr['id']?>" role="button">分享</a>
											<a class="cus-btn cus-btn-md cus-btn-orange-border" style="letter-spacing:6px;width:80px;letter-spacing:" href="/yiyuan/UserCenter/MyCard/update?opT=1&tpl_id=<?=$arr['tpl_id']?>" role="button">刷新</a>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach?>
							<?php endif?>
						</div>
					</div>
			</div>
			<div class="cus-empty">
				<div style="vertical-align:middle;">
					<?php if($isEmpty):?><p>您还没有自己的专属名片哦~</p><?php endif?>
					<a href="/yiyuan/UserCenter/MyCard/update" id="share" style="width: 150px;" class="cus-btn cus-btn-lg cus-btn-red">立即新建名片</a>
				</div>
			</div>
			
		</div>
		<?php $topNavCenter=true?>
		<?php include $this->tpl('yiyuan:public/footer.php') ?>
	</body>
</html>