<?php include($this->tpl('shop/public:html_header.php')) ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/cart.css" />
		<script src="{__STATIC_URL__}/public/front/default/js/cart.js"></script>
		<title>购物车</title>
	</head>

	<body class="">
		<script>
		var freightTpl = <?=$this->json($freight_tpl)?>;
		</script>
		<div class="wrapper">
			<?php include($this->tpl('shop/public:header.php')) ?>
			<!--购物车容器-->
			<div class="cart-container">
				<form id="buyForm" method="post" action="/shop/order/submit">
					<!--购物车不为空-->
					<div class="cart-not-empty">
						<div class="top-container">
							<!--收货地址为空时要加上hide类-->
							<!--<div class="container-fluid hide"  id="defaultAdressContainer">-->
							<input type="hidden" id="addressId" name="address_id" value="<?=val($address,'id','')?>" />
							<div class="container-fluid<?=empty($address) ? ' hide' : ''?>"  id="defaultAdressContainer">
								<div class="row">
									<div class="label-wrapper">
										<label>
											收货人：
										</label>
									</div>
									<div class="label-content-wrapper">
										<span class="" id="defaultName"><?=val($address,'consignee')?></span>&nbsp;&nbsp;
										<span class="phone-color" id="defaultPhone"><?=val($address,'phone')?></span>
									</div>
								</div>
								<div class="row">
									<div class="label-wrapper">
										<label class="">
											收货地址：
										</label>
									</div>
									<!-- <a id="editAddress" title="修改地址" class="pull-right edit-address" href="#"> -->
									<a id="" title="修改地址" class="pull-right edit-address" href="<?=$wx_address_url?>">
										<i class="fa fa-edit color64"></i>
									</a>
									<div class="label-content-wrapper mr20">
										<span class="address color64"  id="defaultAddress"><?=val($address,'province')?><?=val($address,'city')?><?=val($address,'street')?><?=val($address,'address')?></span>
									</div>
								</div>
							</div>
							<!--收货地址为空或点击上面的编辑按钮时显示-->
							<div class="container-fluid<?=!empty($address) ? ' hide' : ''?>" id="adressContainer">
								<!--地址操作类型:add或edit,默认为add,点击上面的编辑按钮时,值变为edit-->
								<!-- <input type="hidden" id="addressType" name="addressType" value="add" /> -->
								<!--地址ID,值为空表示还未有地址,此时不能保存-->
								<!-- <input type="hidden" id="addressDataUrl" name="addressDataUrl" value="http://api.yedadou.com/yedadou/getRegion" />
								<div class="row">
									<div class="edit-label pull-left">
										<label>
											*收货人姓名:
										</label>
									</div>
									<div class="edit-wrapper">
										<input type="text" class="form-control" id="realName" name="realName" placeholder="">
									</div>
								</div>
								<div class="row">
									<div class="edit-label pull-left">
										<label>
											*手机号码:
										</label>
									</div>
									<div class="edit-wrapper">
										<input type="text" class="form-control" id="phone" name="phone" placeholder="">
									</div>
								</div>
								<div class="row">
									<div class="edit-label pull-left">
										<label>
											*地区:
										</label>
									</div>
									<div class="edit-wrapper">
										<select id="category1" name="province" data-tip="请选择省份">
											<option value="请选择省份" data-id="0" selected>请选择省份</option>
											<option value="广东省" data-id="440000">广东省</option>
										</select>
										&nbsp;
										<select id="category2" name="city" data-tip="请选择城市">
											<option value="请选择城市" data-id="0" selected>请选择城市</option>
										</select>
										&nbsp;
										<select id="category3" name="area" data-tip="请选择区域">
											<option value="请选择区域" data-id="0" selected>请选择区域</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="edit-label pull-left">
										<label>
											*详细地址:
										</label>
									</div>
									<div class="edit-wrapper">
										<input type="text" class="form-control" id="address" name="address" placeholder="">
									</div>
								</div> -->
								<div class="row">
									<div class="edit-label pull-left">
										<label>
											
										</label>
									</div>
									<div class="edit-wrapper">
										<!--data-href是保存的地址,返回格式为{"success":true,"id":"66"}-->
										 <!-- <button id="save" data-href="/action/test.aspx?id=5" class="button-red button-large" type="button">保存</button>&nbsp;&nbsp; -->
										<button id="synchronous" data-href="<?=$wx_address_url?>" class="button-green button-large" type="button">同步微信地址</button>
									</div>
								</div>
							</div>
						</div>
						<div class="type-container">
							<span class="type-title bold">配送方式</span>
							<span style="color:red">快递发货</span>
							<label class="radio2 hide" >
								<input name="freight_tpl_id" data-fee="<?=$freight_fee?>" checked type="radio" value="<?=$freight_tpl['id']?>" />
								<span class=""><?=$freight_tpl['name']?></span>
							</label>
							<!-- <label class="radio2">
								<input name="deliveryType" type="radio" value="2" checked/>
								<span class="">门店自提</span>
							</label> -->
							<span class="type-title" style="float: right;color:red">运费: ￥<span id="freight_fee"><?php echo $freight_fee ?></span></span>	
						</div>
						<div id="cartList" class="cart-list-container">
							<!--商品[START]-->
							<?php foreach($cart_goods as $goods):?>
							<?php 
								$is_disabled = isset($goods['wx_price']) && isset($goods['status']) && $goods['status']>1;
							?>
							<div class="g-item" id="cart-goods-<?=$goods['id']?>">
								<div class="media relative">
									<label class="checkbox3 check-row-box">
										<input name="goods_ids[]" type="checkbox" value="<?=$goods['id']?>" data-id="<?=$goods['id']?>"<?=$is_disabled ? ' disabled' : ' checked'?>>
										<span class=""><strong>隐藏</strong></span>
									</label>
									<div class="media-left ">
										<a href="/shop/shopGoods/ProductDetails?id=<?=$goods['goods_id']?>">
											<img class="media-object" src="<?=$goods['pic_url']?>_80x80.jpg">
										</a>
									</div>
									<div class="media-body relative" style=" height: 140px;">
										<h4 class="media-heading">
										<a href="/shop/shopGoods/ProductDetails?id=<?=$goods['goods_id']?>">
											<?=$goods['title']?>  
										</a>
									</h4>
									<div class="specification">
											<?=$goods['spec']?>
										</div>

										<a title="删除商品" class="delete-icon" data-href="/shop/cart/index/delete" data-id="<?=$goods['id']?>">
											<i class="fa fa-trash fz20"></i>
										</a>
										<div class="price-container">
											<span class="color-yellow bold price"><?=val($goods,'price')?></span> ×
											<span class="quantity red" ><?=val($goods,'quantity',1)?></span>
											<?=$is_disabled ? '<span style="color:red">[已下架]</span>' : ''?>
										</div>
										<div class="input-group num-input">
											<span class="input-group-btn">
							        			<button data-id="minus" data-href="<?=site_url()?>/shop/cart/index/update" class="btn btn-default" type="button"><i class="fa fa-minus"></i></button>
							     	 		</span>
											<input style="color:red" readonly="readonly" data-id="count" name="count[]" type="text" class="form-control text-center" placeholder="" value="<?=val($goods,'quantity',1)?>" />
											<span class="input-group-btn">
										       <button data-id="plus" data-href="<?=site_url()?>/shop/cart/index/update" class="btn btn-default" class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
										      </span>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach?>
							<!--商品[END]-->
						</div>
						<div class="clause-container center">
							<label class="checkbox2">
								<input id="isAgree" name="isAgree" type="checkbox" value="1" checked>
								<span class="">
								<!--<a title="查看购买条款"  href="#">-->
							同意手域商城购买条款，方可提交订单
								<!--</a>-->
							</span>
							</label>
						</div>

					</div>
					<!-- 支付方式 -->
					<input type="hidden" name="payment" value="weixin">
				</form>
			</div>
			<!--公用底部开始-->
			<footer class="footer-menu clearfix" id="footer">
				<div class="footer-container">
					<div class="footer-item total-button">
						<div class="middle-outer">
							<div class="middle-inner text-center white">
								合计：￥<span id="totalMoney">0.00</span>
							</div>
						</div>
					</div>
					<!--如果购物车为空则要加上disable类-->
					<!--<div class="footer-item pay-button disable" id="payButton">-->
					<div class="footer-item pay-button" id="payButton">
						<div class="middle-outer">
							<div class="middle-inner text-center white">
								微信支付
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<script>
		$('#synchronous').click(function(){
			window.location.href = $(this).attr('data-href');
		});
		</script>
	</body>

</html>