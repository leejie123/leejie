<?php include $this->tpl('shop:public/html_header.php') ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/favorite.css" />
		<script src="{__STATIC_URL__}/public/front/default/js/favorite.js"></script>
		<title>我的收藏</title>
	</head>

	<body class="no-skin">
		<div class="wrapper">
			<?php include $this->tpl('shop:public/header.php') ?>

			<!--导航-->
			<div class="tab-list">
				<ul>
					<li>
						<a href="/shop/UserCenter/favorites">
							<span class="">收藏的商品</span><span class="red1 bold">（<?=$goodsCount?>）</span>
						</a>
					</li>
					<li class="active">
						<a href="/shop/UserCenter/favorites?t=2">
							<span class="">收藏的门店</span><span class="red1 bold">（<?=$storeCount?>）</span>
						</a>
					</li>
				</ul>
			</div>
			<!--门店列表-->
			<div id="tab2" class="store-container">
				<!--门店(START)-->
				<?php foreach ($items as $arr):?>
					<div class="g-item">
					<a title="取消收藏" class="close-icon" href="/shop/UserCenter/favorites/delete?t=2&id=<?=$arr['c_id']?>">
						<i class="fa fa-times"></i>
					</a>
					<div class="media">
						<div class="media-left">
							<a href="#">
								<img class="media-object" src="<?=$arr['logo']?>" alt="">
							</a>
							<div class="center entrance">
								<a href="#" class="button-entrance">进入店铺</a>
							</div>
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<a href="#">
									<?=$arr['name']?>
									<!--<img class="pin" src="{__STATIC_URL__}/public/front/default/images/demo/icon/pin.png" alt="">-->
								</a>
							</h4>
							<p class="media-heading">编号：<?=$arr['store_no']?> </p>
							<p class="media-heading">电话：<?=$arr['phone']?></p>
							<p class="media-heading"><?=$arr['province']?><?=$arr['city']?><?=$arr['address']?></p>
						</div>
					</div>
				</div>
				<?php endforeach?>
				<!--门店(END)-->
			</div>
			<?php include $this->tpl('shop:public/footer.php') ?>
		</div>
	</body>

</html>