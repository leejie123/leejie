<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>最新揭晓</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/binggoList.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<?php include $this->tpl('yiyuan:public/header.php') ?>
<div id="container" class="clearfix">
</div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script type="text/javascript">
	$(function(){
		var urlPageList='/yiyuan/ShopGoods/ProductInterval';
		var $container=$('#container');
		doPage(urlPageList,$container);
	});
</script>

</body>
</html>

