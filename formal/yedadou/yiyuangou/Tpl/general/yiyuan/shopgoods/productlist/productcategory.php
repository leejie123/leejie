<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>商品分类</title>
<link href="http://static.yedadou.com/public/yiyuan/css/productCategory.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header id="menu" class="row">
	<nav class="row clearfix">
		<a href="/yiyuan/ShopGoods/ProductList?act=category" class="col2 select">全部商品<div class="line"></div></a>
		<a href="/yiyuan/ShopGoods/ProductList?act=sort" class="col2">即将揭晓</a>
	</nav>
</header>
<div id="mainContianer">
    <nav class="menu clearfix">
    	<a href="/yiyuan/ShopGoods/ProductList"><div class="title">全部商品</div><div class="arrow-right"></div></a>
    <?php if(!empty($data)) :?>
	<?php foreach($data as $v):?>
		<a href="/yiyuan/ShopGoods/ProductList?cid=<?=$v['id']?>">
		<!-- <img src="http://static.yedadou.com/public/yiyuan/tem/avatar1.png"> -->
		<div class="title"><?=$v['name']?></div><div class="arrow-right"></div></a>
	<?php endforeach;?>
	<?php endif;?>
	</nav>
</div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
</body>
</html>
