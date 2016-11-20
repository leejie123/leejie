<div class="topNavCenter">
	<i class="yiyuan-icon">&#xe80d;</i>
	<nav>
		<a href="/yiyuan/"><i class="yiyuan-icon icon-shop">&#xe805;</i>首页</a>
		<a href="/yiyuan/ShopGoods/ProductList"><i class="yiyuan-icon icon-th-large-outline">&#xe803;</i>商品分类</a>
		<a href="/yiyuan/cart/index"><i class="yiyuan-icon icon-basket">&#xe80a;</i>购物车</a>
		<a href="/yiyuan/UserCenter/"><i class="yiyuan-icon icon-user">&#xe806;</i>我的</a>
	</nav>
</div>
<script type="text/javascript">
	$(function(){
		var $navTopCenter=$('.topNavCenter>nav');
		$('.topNavCenter').click(function(){
			$navTopCenter.toggle();
		});
		$(body).click(function(){
			$navTopCenter.hide();
		});
	});
</script>