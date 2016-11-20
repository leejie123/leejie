<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>中奖记录</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/binggoList.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div id="container" class="clearfix">

</div>
<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script type="text/javascript">
	$(function(){
		var urlPageList='/yiyuan/UserCenter/PintuanRecord';
		var $container=$('#container');
		doPage(urlPageList,$container,function(a){},<?=$hit_time?>);
	});
</script>
</body>
</html>