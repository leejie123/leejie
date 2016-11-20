<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>中奖记录</title>
<meta name="format-detection" content="telephone=no" />
<!-- <link href="{__STATIC_URL__}/public/yiyuan/css/binggoList.css" rel="stylesheet" type="text/css" /> -->
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/bingolist1.css" rel="stylesheet" type="text/css" />
<style>
	.listItem {
		height: 130px;
	}
	#menu > a.over {
		border-bottom: 2px solid #db3855!important
	}
</style>
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<!-- <div class="cus-empty">
	<div>
		<p>您还未参加任何拼团哦~</p>
		<a href="cus-btn cus-btn-lg cus-btn-red">立即去开团</a>
	</div>
</div> -->
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