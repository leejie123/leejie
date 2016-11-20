<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>中奖记录</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/binggoList.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div id="container" class="clearfix">

</div>
<div class="more"></div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script type="text/javascript">
	$(function(){
		var urlPageList='/yiyuan/UserCenter/BingoList';
		var $container=$('#container');
		doPage(urlPageList,$container);
	});
</script>
</body>
</html>
