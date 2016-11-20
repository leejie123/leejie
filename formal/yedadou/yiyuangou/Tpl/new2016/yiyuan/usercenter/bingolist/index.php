<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>中奖记录</title>
<meta name="format-detection" content="telephone=no" />
<link href="{__STATIC_URL__}/public/css/pure-min.css" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/??public1.css,bingolist1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div id="container" class="clearfix">
</div>
<?php $topNavCenter=true?>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script type="text/javascript">	
	$(function(){
		var urlPageList='/yiyuan/UserCenter/BingoList';
		var $container=$('#container');
		doPage(urlPageList,$container);
		$conatainer.load(urlPageList)
	});
</script>
</body>
</html>