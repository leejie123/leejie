<?php include($this->tpl('shop/public:html_header.php')) ?>		
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/refund.css" />
		<title>订单退换</title>
	</head>

	<body class="">
		<div class="wrapper">
			<!--公用头部开始 -->
			<?php include $this->tpl('shop:public/header.php') ?>

			<div class="common-container">
				<form id="dataForm" method="post" action="">
					<div class="common-box">
						<span class="">* 退/换货：</span>
						<label class="checkbox2">
							<input id="returnGoods" name="returnGoods" type="checkbox" data-id="return" value="1">
							<span class="">退货</span>
						</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label class="checkbox2">
							<input id="changeGoods" name="changeGoods" type="checkbox" data-id="return" value="2">
							<span class="">换货</span>
						</label>
					</div>
					<div class="common-box">
						<span class="pull-left">* 退/换货原因：</span> 
						<select class="form-control pull-right" style="width:55%;margin-bottom: 8px;">
						  <option value="缺货/未收到货">缺货/未收到货</option>
				          <option value="商品描述与实物不一致">商品描述与实物不一致</option>
				          <option value="认为是假货">认为是假货</option>
				          <option value="商品破损">商品破损</option>
				          <option value="发货问题">发货问题</option>
				          <option value="商品质量问题">商品质量问题</option>
				          <option value="三无产品">三无产品</option>
				          <option value="效果不好/不喜欢">效果不好/不喜欢</option>
				          <option value="退运费">退运费</option>
				          <option value="商品错发/漏发">商品错发/漏发</option>
				          <option value="其它原因">其它原因</option>
						</select>
						<br>
						<textarea id="reason" name="reason" class="form-control height80 clearfix"  style="margin-bottom: 8px;" placeholder="备注说明"></textarea>
						<span class="clearfix">* 退/换货商品：</span>
						<div id="cartList" class="cart-list-container" style="margin-top:10px">
							<!--商品[START]-->
														<div class="g-item" id="cart-goods-191">
								<div class="media relative">
									<label class="checkbox3 check-row-box">
										<input name="goods_ids[]" type="checkbox" value="191" data-id="191">
										<span class=""><strong>隐藏</strong></span>
									</label>
									<div class="media-left ">
										<a href="/shop/shopGoods/ProductDetails?id=68">
											<img class="media-object" src="http://img.yedadou.com/store/1632/70b129f1e97d604a2f3f7ba9a1ed2d7a.jpg_80x80.jpg">
										</a>
									</div>
									<div class="media-body relative" style=" height: 140px;">
										<h4 class="media-heading">
										<a href="/shop/shopGoods/ProductDetails?id=68">
											ILIFE 驰为静音拖地扫地机器人进口家用全自动吸尘器超薄智能地宝  
										</a>
									</h4>
									<div class="specification">
																					</div>
										<div class="price-container">
											<span class="color-yellow bold price">10224.00</span> ×
											<span class="quantity">1</span>
											<input type="hidden" name="goods_count[]" id="goods_count" value="1" />
										</div>
										<div class="input-group num-input">
											<span class="input-group-btn">
							        			<button data-id="minus" data-href="http://1006.w.yedadou.com/shop/cart/index/update" class="btn btn-default" type="button"><i class="fa fa-minus"></i></button>
							     	 		</span>
											<input readonly="readonly" data-id="count" name="count[]" type="text" class="form-control text-center" placeholder="" value="1" />
											<span class="input-group-btn">
										       <button data-id="plus" data-href="http://1006.w.yedadou.com/shop/cart/index/update" class="btn btn-default" class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
										      </span>
										</div>
									</div>
								</div>
							</div>
														<!--商品[END]-->
						</div>
						
					  </div>
					  
					  <div class="common-box">
							<span class="">* 退货物流：</span>
							<div class="form-group">
								<select class="form-control">
								  <option>物流公司1</option>
								  <option>物流公司2</option>
								  <option>物流公司3</option>
								  <option>物流公司4</option>
								  <option>物流公司5</option>
								</select>
							</div>
							<div class="form-group">
						    <input type="email" class="form-control" placeholder="物流单号">
						   </div>
						</div>
					  
					  
					<div class="bottom-container">
						<div class="info-title">请将商品寄回以下地址：</div>
						<div class="address-container">
							<div class="clearfix">
								<div class="edit-label pull-left">
									<label>
										<span class=""><span class="color-yellow">*</span> 姓名：</span>
									</label>
								</div>
								<div class="edit-wrapper">
									<span class="">庞掌柜</span>
								</div>
							</div>
							<div class="clearfix">
								<div class="edit-label pull-left">
									<label>
										<span class=""><span class="color-yellow">*</span> 电话：</span>
									</label>
								</div>
								<div class="edit-wrapper">
									<span class="">188-2002-5689</span>
								</div>
							</div>
							<div class="clearfix">
								<div class="edit-label pull-left">
									<label>
										<span class=""><span class="color-yellow">*</span> 地址：</span>
									</label>
								</div>
								<div class="edit-wrapper">
									<span class="">广东省-深圳市-福田区-36号新世纪中心10F1006室36号新世纪中心10F1006室</span>
								</div>
							</div>
						</div>
						<div class="buttons center">
							<button id="sure" class="button-yellow bg-red" type="button">确认</button>&nbsp;&nbsp;
							<button id="cancel" onclick="history.back(-1);" class="button-default" type="button">取消</button>
						</div>
					</div>
				</form>
			</div>
			
			<!--退单提示-->
			<div id="tpl-tips" class="hide">
				<div class="tips-content">
					<p>您的订单我们将不会发出货物，您的退款将会于三个工作日内退回到您的微信红包或者您微信绑定的银行卡内。</p>
					<p>请注意查收！</p>
				</div>
			</div>
			
			<!--公用底部开始-->
		<?php include $this->tpl('shop:public/footer.php') ?>
		</div>
	</body>
<script src="{__STATIC_URL__}/public/front/default/js/refund.js"></script>
</html>