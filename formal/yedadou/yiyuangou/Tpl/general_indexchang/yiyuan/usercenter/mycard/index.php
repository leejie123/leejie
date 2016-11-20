<?php include $this->tpl('shop:public/html_header.php') ?>
<link rel="stylesheet" href="{__STATIC_URL__}/public/??yiyuan/css/address.css,yiyuan/general/css/pub.css,yiyuan/ui/boboui.css,yiyuan/css/ico.css" />
<style type="text/css">
body{
	font-size: 14px;
}
.cart-container{
	margin: 10px 5px 20px 5px;
}
/*********************商品 *********************/
/*单个商品*/
.g-item {
	margin-bottom: 10px;
	background-color: #fff;
	/*border: 1px solid #dedede;*/
	position: relative;
	border-radius: 5px;
	padding: 10px 10px 10px 10px;
	/*padding-bottom: 0;*/
	box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.3);
	margin-bottom: 20px;
}
.g-item a{
	color: #000;
}
.media {
  margin-top:0px;
  
  /*padding-bottom: 5px;*/
}
.media-left {
}
.media-left img{
	width: auto;
	height: 80px;
}
p.media-heading{
	font-size: 14px;
}

.footerBtn{
	position: absolute;
    width: 55px;
    right: 0px;
    bottom: 0px;
}
.footerBtn a{
	margin-top: 5px;
}
		</style>
		<title>我要推广</title>
	</head>

	<body class="">
	<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
		<div class="wrapper">
			<!--我的推广容器-->
			<div class="cart-container">
					<div class="cart-not-empty">
						<div id="cartList" class="cart-list-container">
							<!--商品[START]-->
							<?php if(!$isEmpty):?>
							<?php foreach ($myCard as $arr):?>
							<div class="g-item">
								<div class="media relative">
									<div class="media-left ">
										<a href="/yiyuan/userCenter/myCardView?card_id=<?=$arr['id']?>">
											<img class="media-object" src="<?=$arr['thumb_url']?>" alt="">
										</a>
									</div>
									<div class="media-body relative">
										<div class="footerBtn">
											<a class="btn btn-default btn-sm" href="/yiyuan/UserCenter/MyCard/update?opT=1&tpl_id=<?=$arr['tpl_id']?>" role="button">刷新</a>
											<a class="btn btn-default btn-sm" href="/yiyuan/userCenter/sendCardToWx?card_id=<?=$arr['id']?>" role="button">分享</a>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach?>
							<?php endif?>
						</div>
					</div>
			</div>
			
			
			<div class="buttons center">
				<a href="/yiyuan/UserCenter/MyCard/update" id="share" class="button-yellow button-large">新建名片</a>
			</div>
		</div>
		<?php include $this->tpl('yiyuan:public/footer.php') ?>
	</body>

</html>