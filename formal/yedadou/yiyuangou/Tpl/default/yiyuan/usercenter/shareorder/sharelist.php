<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>晒单</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/shareList.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
if(!empty($show)){
	include $this->tpl('yiyuan:public/subscribe.php');
	include $this->tpl('yiyuan:public/header.php');
}else{
	include $this->tpl('yiyuan:public/subscribe.php');
}?>
<div id="mainContianer"></div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script type="text/javascript">
	$(function(){
		var urlPageList='/yiyuan/UserCenter/ShareOrder?act=<?=$show?>&goods_id=<?=$goods_id?>';
		var $container=$('#mainContianer');
		doPage(urlPageList,$container);
	});
</script>
</body>
</html>
