<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>商品分类</title>
<link href="http://static.yedadou.com/public/yiyuan/css/productCategory.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header id="menu" class="row">
	<nav class="row clearfix">
		<a href="/yiyuan/ShopGoods/ProductList?act=category" class="col2">全部商品<div class="line"></div></a>
		<a href="/yiyuan/ShopGoods/ProductList?act=sort" class="col2 select">即将揭晓</a>
	</nav>
</header>
<div id="mainContianer">
    <nav class="menu clearfix">
		<a href="/yiyuan/ShopGoods/ProductList?sort=buynum"><div class="title">即将揭晓</div><div class="arrow-right"></div></a>
		<a href="/yiyuan/ShopGoods/ProductList?sort=popular"><div class="title">人气商品</div><div class="arrow-right"></div></a>
		<a href="/yiyuan/ShopGoods/ProductList?sort=recommend"><div class="title">推荐商品</div><div class="arrow-right"></div></a>
		<a href="/yiyuan/ShopGoods/ProductList?sort=pdesc"><div class="title">按价格（从高到低）</div><div class="arrow-right"></div></a>
		<a href="/yiyuan/ShopGoods/ProductList?sort=pasc"><div class="title">按价格（从低到高）</div><div class="arrow-right"></div></a>
		<a href="/yiyuan/ShopGoods/ProductList?sort=new"><div class="title">最新的商品</div><div class="arrow-right"></div></a>
	</nav>
</div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
</body>
</html>
