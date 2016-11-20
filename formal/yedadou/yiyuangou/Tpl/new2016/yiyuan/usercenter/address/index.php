<?php include $this->tpl('shop:public/html_header.php') ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/??yiyuan/new2016/css/pub1.css" />
		<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
		<title>收货地址</title>
	</head>
	<body class="">
	<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
		<div class="wrapper">
		<?php //include $this->tpl('yiyuan:public/header.php') ?>
			<!--收货地址容器-->
			<!-- <div class="cart-container"> -->
				<form id="dataForm" method="post" action="<?=$addressUrl?>" >
					<?php if(!$isEmpty):?>
					<!--收货地址不为空-->
					<div class="cart-not-empty">
						<?php foreach ($itemes as $v):?>
						<!--单个收货地址(START)-->
						<div class="address-list relative" style="margin-bottom:12px;background-color:#fff;height:70px;padding:18px;">
							<div class="container-fluid" style="margin-left: 0">
								<div class="row">
									<div class="label-content-wrapper" style="margin:0px;font-size:14px;">
										<a title="删除地址" class="pull-right edit-address" data-click="del" data-href="/yiyuan/UserCenter/address/post" href="/yiyuan/UserCenter/address/post?id=<?=$v['id']?>" style="position: relative;left: 20px;top:5px;position:relative;">
											<i class="fa fa-trash" style="font-size:20px;color:#db3855"></i>
										</a>
										<a title="修改地址" style="position:relative;top:5px;" class="pull-right edit-address" href="/yiyuan/UserCenter/address/update?id=<?=$v['id']?>">
											<i class="fa fa-edit" style="font-size:20px;color:#db3855"></i>
										</a>
										<span class="" style="float:left;overflow:hidden;max-width:100px;margin-right:8px;display:inline-block;font-size:14px;"><?=$v['consignee']?></span>
										<span class="display:inline-block;max-width:100px;overflow:hidden;float:left;phone-color;font-size:14px;"><?=$v['phone']?></span>
									</div>
								</div>
								<div class="row">
									<div class="label-content-wrapper" style="font-size:14px;margin:0px;">
										<?php if($v['is_default']==1):?>
										<span  class="" style='color:#db3855;display:inline-block;float:left'>[默认]</span>&nbsp;
										<?php endif?>
										<span class="address color64" style="float:left;max-width:80%;overflow:hidden;display:inline-block;"><?=$v['province']?><?=$v['city']?><?=$v['street']?><?=$v['address']?></span>
									</div>
								</div>
							</div>
						</div>
						<!--单个收货地址(END)-->
						<?php endforeach?>
					</div>
					<?php else:?>

					<!--收货地址为空-->
					<div class="cart-empty text-center">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="{__STATIC_URL__}/public/front/default/images/demo/icon/address-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您还没有设置收货地址哟~ </div>
							<div class="cart-empty-tip">您可添加新的地址，</div>
							<div class="cart-empty-tip">或同步微信收货地址！</div>
						</div>
					</div>
					<?php endif?>
					<div class="center address-buttons">
						<a id="save" href="/Yiyuan/UserCenter/address/add"  class="cus-list-input1" style="background:url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_return.png) #fff no-repeat;background-size:15px;background-position:97% center;display: block;padding:0 18px;">
							<div style="border-bottom:0px;">
								<label>
									添加地址
								</label>
								<div class="item-input">

								</div>
							</div>
						</a>
						<!-- <a id="save" href="/Yiyuan/UserCenter/address/add" class="button-yellow button-large" type="button">新增地址</a>&nbsp;&nbsp; -->
						<?php if(1==2){ ?>
						<a id="synchronous" data-href="" class="button-green button-large" type="submit" class="cus-list-input1"  style="background:url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_return.png) #fff no-repeat;background-size:15px;background-position:97% center;display: block;padding:0 18px;">
							<div style="border-bottom:0px;">
								<label class="required">
									同步微信地址
								</label>
								<div class="item-input">
									
								</div>
							</div>
						</a>
						<!-- <button id="synchronous" data-href="" class="button-green button-large" type="submit">同步微信地址</button>						 -->
						<?php }?>
					</div>
				</form>
			<!-- </div> -->
			<script src="{__STATIC_URL__}/public/yiyuan/new2016/js/shortAlert.js"></script> 
			<script src="{__STATIC_URL__}/public/??yiyuan/boboweb.js,yiyuan/ui/boboui.js"></script>
			<script>
			$(function() {
				var $body = $('body')
				var sAlert = new shortAlert($body)
				$('a[data-click="del"]').on('click', function(e) {
					var url = $(this).data('href');
					$this = $(this)
					e.preventDefault();
					$.ajax({
						url: url,
						type: 'get',
						data: {
							id:"<?=$v['id']?>"
						},
						success: function(data) {
							var data1 = $.parseJSON(data);
							if (data1.success) {
								$this.closest('.address-list').remove();
								sAlert.show(data1.msg);
								setTimeout(function(){
									window.location.href = data1.url;
								}, 2000)
								// widow.location.href = data1.url;
							}
							if (data1.error) {
								sAlert.show(data1.msg)
							}
						},
						error: function(data) {
							sAlert.show('网络出现问题，请稍后重试')
						}
					})
				})
			})
			</script>
			<?php include $this->tpl('yiyuan:public/footerNav.php') ?>
	</body>

</html>