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
					<li class="active">
						<a href="/shop/UserCenter/favorites">
							<span class="">收藏的商品</span><span class="red1 bold">（<?=$goodsCount?>）</span>
						</a>
					</li>
					<li>
						<a href="/shop/UserCenter/favorites?t=2">
							<span class="">收藏的门店</span><span class="red1 bold">（<?=$storeCount?>）</span>
						</a>
					</li>
				</ul>
			</div>
			<!--商品列表-->
			<div id="tab1" class="product-container active">
				<!--单个商品(START)-->
				<?php foreach ($items as $arr):?>
				<div class="product1 clearfix">
					<div class="g-item">
						<a title="取消收藏" class="close-icon" href="/shop/UserCenter/favorites/delete?t=1&id=<?=$arr['c_id']?>">
							<i class="fa fa-times"></i>
						</a>
						<div class="g-image-wrapper">
							<a href="/shop/shopGoods/ProductDetails?id=<?=$arr['id']?>">
								<img class="img-responsive" src="<?=$arr['pic_url']?>">
							</a>
							<div class="product-info">
								<div class="p-title">
									<a href="/shop/shopGoods/ProductDetails?id=<?=$arr['id']?>"><?=$arr['title']?></a>
									<a href="#" class="p-share" data-id="1"><i class="fa fa-share-square-o"></i> 分享</a>
								</div>
								<div class="">
									<a href="/shop/shopGoods/ProductDetails?id=<?=$arr['id']?>" class="button-red pull-right">立即购买</a>
									<div class="price-container">
										<span class="current-price">¥<?=$arr['price']?></span>
										<span class="market-price">¥<?=$arr['market_price']?></span>
										<span class="sell">(已售<span class="sell-count"> <?=$arr['sale_num']?> </span>件)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach?>
				<!--单个商品(END)-->
				
			</div>
			
			
			</div>
			<?php include $this->tpl('shop:public/footer.php') ?>
		</div>
	</body>

</html>