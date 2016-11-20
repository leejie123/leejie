<?php include($this->tpl('shop/public:html_header.php')) ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/list.css" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public/widget/protCategory2/index.min.css" />
		<title>商品列表页</title>
	</head>

	<body class="">
		<div class="wrapper">
			<!--公用头部开始 -->
		   <?php include $this->tpl('shop:public/header.php');?>
			<!--商品-->
			<div class="product-container pull-right">
				<!--单个商品(START)-->
				
				<?php
				 if(!empty($products)){
				 	$index=0;
				?>
				<?php foreach ($products as $key=>$value):?>
				<?php $index++;$m=$index%2?>
				<?php if($m!=0){  //每一行需要用这个包起来。
					echo '<div class="productList2 container-fluid"><div class="row clearfix">';
				}?>
				  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 item" onclick="location.href='/shop/shopGoods/productDetails?id=<?php echo $value['goods_id']?>';">
				  	<div class="container-fluid">
					  	<div class="img" style="background-image: url(<?php echo $value['pic_url'];?>)"></div>
					  	<div class="title"><?php echo $value['title']?></div>
					  	<div class="container-fluid price-container">
					  		<div class="pull-left price">￥<?php echo $value['wx_price']?> </div>
					  		<div><img class="ico" src="{__STATIC_URL__}/public/images/cartIco.jpg" /></div>
					  	</div>
				  	</div>
				  </div>
				<?php 
				if($m==0){
					echo '</div></div>';
				}
				?>
				<?php endforeach;?>
				<?php if($index%2!=0) echo '</div></div>';?>
				<?php }?>	
				
				<?php if(1==2){ //暂时保存一行一个产品?>
				<?php if(!empty($products)){?>
				<?php foreach ($products as $key=>$value):?>
				<div class="product1 clearfix">
					<form method="post" action="/shop/order/buy" >
					<input type="hidden" name="goods_id" value='<?php echo $value['goods_id']?>' />
					<div class="g-item">
						<div class="g-image-wrapper">
							<a href="/shop/shopGoods/productDetails?id=<?php echo $value['goods_id']?>">
								<img class="img-responsive" src="<?php echo $value['pic_url'];?>">
							</a>
<!-- 							<div  title="切换收藏状态" class="favorite"  data-auto="ajax" data-href="/shop/UserCenter/favorites/add?id=" data-tip="操作进行中" data-show-tip="false" data-submit-id="" data-success-function="toggleFavorit" data-show-response="false"> -->
<!-- 								<i class="fa fa-star-o"></i> -->
								<!--<i class="fa fa-star"></i>-->
<!-- 							</div> -->
							<div class="product-info">
								<div class="p-title">
									<a href="/shop/shopGoods/productDetails?id=<?php echo $value['goods_id']?>"><?php echo $value['title']?></a>
									<a href="#" class="p-share" data-id="1" data-auto-target="#shareTip<?php echo $value['goods_id']?>"><i class="fa fa-share-square-o"></i> 分享</a>
								</div>
								<div class="">
								    <button class="button-red pull-right" type="submit">立即购买</button>
									<!--  <a href="" class="button-red pull-right">立即购买</a>-->
									<div class="price-container">
										<span class="current-price"><?php echo $value['wx_price']?></span>
										<span class="market-price"><?php echo $value['market_price']?></span>
										<span class="sell">(已售<span class="sell-count"> <?php echo  $value['sale_num'];?> </span>件)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					</form>
				</div>				
				<?php endforeach;?>
				<?php }?>	
				<?php }?>								
			</div>
			<?php if(!empty($productCate) ): ?>
		    <div class="leftNavCotainer">
			  <ul class="proCategory-container">
			 <?php foreach ($productCate as $key => $value):?>
			 <?php if( !empty(val($value,'sub_cate', '') ) ):?>
			  <li> 
			       <a href="#"><?php echo val($value,'name');?></a>
			       <ul class="er">
			       			<?php foreach($value['sub_cate'] as $v):?>
							<li><a  href="/shop/ShopGoods/ProductList?sub_cid=<?php echo $v['id'];?>&cid=<?=$key;?>"><?php echo $v['name'];?></a></li>
							<?php endforeach; ?>
				   </ul>
			  </li>
			  <?php else:?>
			   <li> <a class="xz"  href="/shop/ShopGoods/ProductList?cid=<?=$key;?>"><?php echo $value['name'];?></a> </li>
			   <?php endif;?>
			  <?php endforeach; ?>
			  <div class="clearfix"></div>
		 </ul>
		 </div>
			<script type="text/javascript">
			$(function(){
				//左边分类需要有一个容器才能上下拖动
				var leftNavCotainerHeight=$(window).height()-50;
				$('.leftNavCotainer').css('height',leftNavCotainerHeight+"px");
				var temTop=0;
				$(".proCategory-container").css('top',temTop+'px');
			    $(".proCategory-container > li > a").click(function(){
				     $(this).addClass("xz").parents().siblings().find("a").removeClass("xz");
					 $(this).parents().siblings().find(".er").hide(300);
					 $(this).siblings(".er").toggle(300);
					 $(this).parents().siblings().find(".er > li > .thr").hide().parents().siblings().find(".thr_nr").hide();
				})
			    $(".er > li > a").click(function(){
			        $(this).addClass("sen_x").parents().siblings().find("a").removeClass("sen_x");
			        $(this).parents().siblings().find(".thr").hide(300);	
				    $(this).siblings(".thr").toggle(300);	
				})
			    $(".thr > li > a").click(function(){
				     $(this).addClass("xuan").parents().siblings().find("a").removeClass("xuan");
					 $(this).parents().siblings().find(".thr_nr").hide();	
				     $(this).siblings(".thr_nr").toggle();
				})
			})
			</script>
			<?php endif; ?>
			<div class="table-foot-toolbar clearfix pubPageList">
			<?php echo empty($page_html)?'':$page_html; ?>
			</div>
			<!--分享提示框-->
				<?php if(!empty($products)){?>
				<?php foreach ($products as $key=>$value):?>
			<div id="shareTip<?php echo $value['goods_id']?>" class="mask-bg hide" data-auto-hide>
				<div class="middle-outer">
					<div class="middle-inner text-center" id="shareimg">
						<div id="shareimg">
							<div><img src="{__STATIC_URL__}/public/front/default/images/sharebak.png" class="bak"></div>
							<div><img src="<?php echo $urls[$value['goods_id']];?>" class="qcode" alt="<?php //echo $url;?>"></div>
						</div>
					</div>
				</div>
			</div>				
				<?php endforeach;?>
				<?php }?>	
			<!--公用底部开始-->
			<?php include $this->tpl('shop:public/footer.php') ?>
		</div>
	</body>

		<script src="{__STATIC_URL__}/public/front/default/js/list.js"></script>
</html>