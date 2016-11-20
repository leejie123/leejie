<?php include $this->tpl('shop:public/html_header.php') ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/address.css" />
		<title>收货地址</title>
	</head>

	<body class="">
		<div class="wrapper">
			<?php include $this->tpl('shop:public/header.php') ?>

			<!--收货地址容器-->
			<div class="cart-container">
				<form id="dataForm" method="post" action="<?=$addressUrl?>" >
					<?php if(!$isEmpty):?>
					<!--收货地址不为空-->
					<div class="cart-not-empty">
						<?php foreach ($itemes as $v):?>
						<!--单个收货地址(START)-->
						<div class="address-list relative">
							<label class="radio2">
								<input name="checkAddress" type="radio" value="<?=$v['id']?>" <?php if($v['is_default']==1):?>checked="checked"<?php endif?>/>
								<span class=""></span>
							</label>
							<div class="container-fluid">
								<div class="row">
									<div class="label-wrapper">
										<label>
											收货人：
										</label>
									</div>
									<div class="label-content-wrapper">
										<a title="修改地址" class="pull-right edit-address" href="/shop/UserCenter/address/update?id=<?=$v['id']?>">
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
										<span class="address color64"><?=$v['address']?></span>
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
						<a id="save" href="/shop/UserCenter/address/add" class="button-yellow button-large" type="button">新增地址</a>&nbsp;&nbsp;
						<button id="synchronous" data-href="" class="button-green button-large" type="submit">同步微信地址</button>
					</div>
				</form>
			</div>
			<?php include $this->tpl('shop:public/footer.php') ?>
	</body>

</html>