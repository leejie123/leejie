<?php include $this->tpl('shop:public/html_header.php') ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/index.css" />
		<script src="{__STATIC_URL__}/public/front/default/js/index.js?v=201511203"></script>
		<title><?=$headerTitle?></title>
	</head>

	<body class="">
		<div class="wrapper">
<?php include $this->tpl('shop:public/header.php') ?>
			<!-- 滑动图片列表 -->
			<div class="image-list">
				<div id="image-list" class="carousel slide" data-ride="carousel">
					<?php //暂时隐藏幻灯片提示点 ?>
					<?php if(100==101):?>
					<ol class="carousel-indicators">
						<?php
							$slideIndex=0;
						 ?>
						<?php foreach ($slideItems as $arr):?>
						<?php
						$slideCls='';
						if($slideIndex==0) $slideCls='class="active"';
						$slideIndex++;
						 ?>
						<li data-target="#image-list" data-slide-to="<?=$slideIndex-1?>" <?=$slideCls?>></li>
						<?php endforeach?>
					</ol>
					<?php endif?>
					<div class="carousel-inner" role="listbox">
						<?php
							$slideIndex=0;
						 ?>
						<?php foreach ($slideItems as $arr):?>
						<?php
						$slideCls='';
						if($slideIndex==0) $slideCls='active';
						$slideIndex++;
						 ?>
						<div class="item <?=$slideCls?>">
							<a href="<?=$arr['link']?>"><img src="<?=$arr['pic_url']?>" alt="" class="img-responsive"></a>
							<div class="carousel-caption">
							</div>
						</div>
						<?php endforeach?>
					</div>
				</div>
			</div>

			<!-- 导航 -->
			<a href="/shop/pay">支付测试</a>
			{__CONTENT__}
			</div>

<?php include $this->tpl('shop:public/footer.php') ?>
		</div>

	</body>

</html>