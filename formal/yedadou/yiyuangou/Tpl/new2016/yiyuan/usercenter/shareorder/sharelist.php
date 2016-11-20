<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>晒单</title>
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/shareList1.css" rel="stylesheet" type="text/css" />
<style>
	.cus-empty {
		min-height: 350px;
		height: 350px;
	}
	.cus-empty > div {
		height: 350px;
	}
</style>
</head>
<body>
<?php 
if(!empty($show)){
	include $this->tpl('yiyuan:public/subscribe.php');
	//include $this->tpl('yiyuan:public/header.php');
}else{
	include $this->tpl('yiyuan:public/subscribe.php');
}?>

<div id="mainContianer"></div>
<div class="more"></div>
<?php //include $this->tpl('yiyuan:public/footer.php') ?>
<?php include $this->tpl('yiyuan:public/footerNav.php') ?> 

<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script type="text/javascript">
	$(function(){
		var urlPageList='/yiyuan/UserCenter/ShareOrder?act=<?=$show?>&goods_id=<?=$goods_id?>';
		var $container=$('#mainContianer');
		doPage(urlPageList,$container,function(dom) {
			var $dom = dom;
			var once = true;
			 $dom.find(".zan").on('click', function(e) {
				e.preventDefault()
				var id = $(this).data('id');
				var $text = $(this).find('span');
				var text = parseInt($text.text(), 10);
				var $this = $(this)
				if (once) {
					$.ajax({
						url: '/yiyuan/ShareOrder/Index/update',
						type: 'get', 
						data: {
							id: id
						},
						success: function(data) {
							try{
								var data1 = $.parseJSON(data);
							} catch(e) {

							}
							if (data1.error) {
								return;
							}
							if (data1 && !data1.error) {
								if (isNaN(text)) {
									$text.text('1');
								} else {
									$text.text(text + 1);
								}
								$this.addClass('over-red');
								// once = false;
							}
							once = false;
						},
						error: function(data) {
							alert('出现了错误，请稍后重试');
						}
					})
				}
			})
		});

		
	});
</script>
</body>
</html>
	