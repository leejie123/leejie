<?php include $this->tpl('shop:public/html_header.php') ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/??yiyuan/css/address.css,yiyuan/general/css/pub.css,yiyuan/ui/boboui.css,yiyuan/css/ico.css" />
		<title>收货地址</title>
	</head>

	<body class="">
	<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
		<div class="wrapper">
			<!--收货地址容器-->
			<div class="cart-container">
				<form id="dataForm" method="post" action="<?=$addressUrl?>" >
					<?php if(!$isEmpty):?>
					<!--收货地址不为空-->
					<div class="cart-not-empty">
						<?php foreach ($itemes as $v):?>
						<!--单个收货地址(START)-->
						<div class="address-list relative">
							<div class="container-fluid">
								<div class="row">
									<div class="label-wrapper">
										<label>
											收货人：
										</label>
									</div>
									<div class="label-content-wrapper">
										<a title="删除地址" class="pull-right edit-address" href="/yiyuan/UserCenter/address/delete?id=<?=$v['id']?>" style="position: relative;left: 20px;">
											<i class="fa fa-trash color64"></i>
										</a>
										<a title="修改地址" class="pull-right edit-address" href="/yiyuan/UserCenter/address/update?id=<?=$v['id']?>">
											<i class="fa fa-edit color64"></i>
										</a>
										<span class=""><?=$v['consignee']?></span>&nbsp;&nbsp;
										<span class="phone-color"><?=$v['phone']?></span>
									</div>
								</div>
								<div class="row">
									<div class="label-wrapper">
										<label class="">
											收货地址：
										</label>
									</div>
									<div class="label-content-wrapper mr20">
										<span class="address color64"><?=$v['province']?><?=$v['city']?><?=$v['street']?><?=$v['address']?></span>
										<?php if($v['is_default']==1):?>
										<span  class="pull-right phone-color" style="position: absolute;right: 10px; top: 36px;">默认</span>
										<?php endif?>
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
						<a id="save" href="/Yiyuan/UserCenter/address/add" class="button-yellow button-large" type="button">新增地址</a>&nbsp;&nbsp;
					</div>
				</form>
			</div>
			<?php include $this->tpl('yiyuan:public/footer.php') ?>
	</body>

</html>