<?php if(!isset($topNav)) $topNav=0; ?>
<nav class="topNav clearfix">
	<a href="/yiyuan/index" <?php if($topNav==1) echo 'class="select"'; ?>>首页</a>
	<a href="/yiyuan/ShopGoods/ProductList" <?php if($topNav==2) echo 'class="select"'; ?>>全部商品</a>
	<a href="/yiyuan/UserCenter/ShareOrder?act=show" <?php if($topNav==3) echo 'class="select"'; ?>>晒单</a>
	<a href="/yiyuan/UserCenter/" <?php if($topNav==4) echo 'class="select"'; ?>>个人中心</a>
</nav>