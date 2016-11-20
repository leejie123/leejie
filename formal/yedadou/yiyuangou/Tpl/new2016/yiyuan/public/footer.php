<?php if(isset($topNavCenter)&&$topNavCenter){ ?>
<?php /*<div class="topNavCenter">
	<i class="yiyuan-icon">&#xe803;</i>
	<nav>
		<a href="/yiyuan/"><i class="yiyuan-icon icon-shop">&#xe805;</i>首页</a>
		<a href="/yiyuan/ShopGoods/ProductList"><i class="yiyuan-icon icon-th-large-outline">&#xe803;</i>商品分类</a>
		<a href="/yiyuan/cart/index"><i class="yiyuan-icon icon-basket">&#xe80a;</i>购物车</a>
		<a href="/yiyuan/UserCenter/"><i class="yiyuan-icon icon-user">&#xe806;</i>我的</a>
	</nav>
</div>
<script type="text/javascript">
	$(function(){
		var isHide=true;
		var $navTopCenter=$('.topNavCenter>nav');
		$('.topNavCenter').click(function(e){
			if(isHide){
				$navTopCenter.css('display','block')
			}else{
				$navTopCenter.css('display','none')
			}
			isHide=!isHide;
		});
	});
</script>*/
?>
<div class="topNavCenter" style="
    text-align: center;
    padding-left: 3px;
    padding-right: 2px;
    padding-top: 5px;
    padding-bottom: 0;
    bottom: 70px;
    width: 35px;
    opacity: 0.8;
    position: fixed;
    right: 0;
">
	<a href="/yiyuan/" style="display: block;"><img src="{__STATIC_URL__}/public/yiyuan/images/home.png" style="
    width: 100%;
    position: relative;
    top: -1px;
    "></a>
</div>
<?php } ?>
