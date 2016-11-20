<?php include $this->tpl('yiyuan:public/html_header.php') ?>
	<link href="{__STATIC_URL__}/public/newcss/css/??pure-min.css,public.css" rel="stylesheet" type="text/css" />
	<title>分类浏览</title>
</head>
<body>
<div>
		<!-- big-title -->
		<div class="cus-list cus-mg-b-9">
			<a class="cus-list-item item-link format1" href="/yiyuan/ShopGoods/ProductList?sort=new">
				<div>
					<div class="item-media">
						<div class="item-media-icon" style="background-image: url('{__STATIC_URL__}/public/newcss/img/ico-list.jpg')"></div>
					</div>
					<div class="item-content" style="">
						<h3>全部商品</h3>
					</div>
				</div>
			</a>
		</div>
		<!-- big-title -->

		<!-- title-divider -->
		<div class="cus-title-divider">
			<span class="title">分类浏览</span>
		</div>
		<!-- title-divider -->
		<!-- list-item -->
		<div class="cus-list">
			<?php if(!empty($data)){ 
			//
			foreach ($data as $key => $value) {
				$name=$value['name'];
				$img=$value['pic_url'];
				if($img=='') $img='{__STATIC_URL__}/public/newcss/img/cus-icon-other.png';
				//val($dataTip,$name,'img/cus-icon-other.png');
				$url='/yiyuan/ShopGoods/ProductList?cid='.$value['id'];
			?>
			<a class="cus-list-item item-link" href="<?=$url?>">
				<div>
					<div class="item-media">
						<div class="item-media-icon" style="background-image:url('<?=$img?>')"></div>
					</div>
					<div class="item-content" style="">
						<h3><?=$name?></h3>
					</div>
				</div>
			</a>
			<?php 
				} 
			}
			?>
		</div>
		<!-- list-item -->

	</div>
<?php include $this->tpl('yiyuan:public/footerNav.php') ?>
</body>
</html>
