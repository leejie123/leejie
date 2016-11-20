<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>最新揭晓</title>
<link href="http://static.yedadou.com/public/yiyuan/css/binggoList.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div id="container" class="clearfix">
</div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
<script type="text/javascript" src="http://static.yedadou.com/public/yiyuan/dopage.js"></script>
<script type="text/javascript">
	$(function(){
		var urlPageList='/yiyuan/ShopGoods/ProductInterval';
		var $container=$('#container');
		doPage(urlPageList,$container);
	});
</script>

</body>
</html>

