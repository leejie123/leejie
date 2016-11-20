<footer>
	<nav>
		<a href="/yiyuan/" class="<?php echo isset($over1)?'over':''?>"><i class="" style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_home.png')"></i>首页</a>
		<a href="/yiyuan/ShopGoods/ProductInterval" class="<?php echo isset($over2)?'over':''?>"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_zxjx-.png')"></i>最新揭晓</a>
		<a href="/yiyuan/ShareOrder/index?act=show" class="<?php echo isset($over3)?'over':''?>"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_bask.png')"></i>晒单</a>
		<a href="/yiyuan/cart/index" class="<?php echo isset($over4)?'over':''?>"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_shoppingcart.png')" ></i>购物车
		<?php $quantity=0;$footerStyle=' style="display:none;"';
		if(isset($base_cart_quantity)&&$base_cart_quantity>0){
			$quantity=$base_cart_quantity;
			$footerStyle='';
		}
		?>
		<span id="cartProductCount" class="label label-danger cart-product-count" <?=$footerStyle?>><?=$quantity?></span></a>
		<a href="/yiyuan/UserCenter/" class="<?php echo isset($over5)?'over':''?>"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_my.png')"></i>我</a>
	</nav>
</footer>