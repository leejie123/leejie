<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<meta name="format-detection" content="telephone=no" />
<title>晒单</title>
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/??public1.css,shareList1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
if(!empty($show)){
	include $this->tpl('yiyuan:public/subscribe.php');
}else{
	include $this->tpl('yiyuan:public/subscribe.php');
}?>

<div id="mainContianer"></div>
<div class="more"></div>
<?php include $this->tpl('yiyuan:public/footerNav.php') ?> 

<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script type="text/javascript">
	$(function(){
		var urlPageList='/yiyuan/ShareOrder/index?act=<?=$show?>&goods_id=<?=$goods_id?>';
		var $container=$('#mainContianer');
		var once = true;
		doPage(urlPageList,$container,function($data){
			$data.find('.foot-comm .zan').click(function() {
				var $text = $(this).find('.right > .zan > span');
				var text = parseInt($text.text(), 10);
				var id = $(this).data('id');
				$this = $(this)

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
	