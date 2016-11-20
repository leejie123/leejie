<footer>
	<nav>
		<a href="/yiyuan/"><i class="yiyuan-icon icon-shop">&#xe805;</i>首页</a>
		<a href="/yiyuan/ShopGoods/ProductList"><i class="yiyuan-icon icon-th-large-outline">&#xe803;</i>商品分类</a>
		<a href="/yiyuan/UserCenter/ShareOrder?act=show"><i class="yiyuan-icon icon-basket">&#xe80c;</i>晒单</a>
		<a href="/yiyuan/cart/index"><i class="yiyuan-icon icon-basket">&#xe80a;</i>购物车
		<?php $quantity=0;$footerStyle=' style="display:none;"';
		if(isset($base_cart_quantity)&&$base_cart_quantity>0){
			$quantity=$base_cart_quantity;
			$footerStyle='';
		}
		?>
		<span id="cartProductCount" class="label label-danger cart-product-count" <?=$footerStyle?>><?=$quantity?></span></a>
		<a href="/yiyuan/UserCenter/"><i class="yiyuan-icon icon-user">&#xe806;</i>我的</a>
	</nav>
</footer>
