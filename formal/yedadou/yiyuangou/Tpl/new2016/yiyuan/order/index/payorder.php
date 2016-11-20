<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<meta name="format-detection" content="telephone=no" />

<title>订单支付</title>
<!-- <link href="{__STATIC_URL__}/public/yiyuan/css/payOrder.css" rel="stylesheet" type="text/css" /> -->
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/payOrder1.css" rel="stylesheet" type="text/css" />
<style>
	body {
		height: auto !important;
		padding-bottom: 0 !important;
	}
</style>
</head>
<body>
<?php if(!empty($cart_data)):?>
<form id="payGo" method="post">
	<div style="margin-bottom:12px;">
	<?php foreach($cart_data as $v) :?>
		<div class="timeline-item clearfix">
			<div class="user">
				<div alt="Susan't Avatar" style="background-image:url('<?=$v['pic_url'];?>')"></div>
			</div>
			<div class="info clearfix">
				<div class="row"><?=$v['title'];?></div>
				<div class="row clearfix">第（<span class="red1"><?= val($term, trim($v['goods_id']), 1);?></span>）期         <span class="red1"><?= val($count, $v['id'], 1);?> 人次</span></div>
			</div>
		</div>
	<?php endforeach;?>
	</div>

	<!-- <div class="padContent money row">
		<div class="col70">商品合计：</div>
		<div class="col4">
		</div>
	</div> -->
	<div class="cus-list-input1" style="margin-bottom:12px;">
		<div style="border-bottom:0px;">
			<label class="">
				商品合计
			</label>
			<div class="item-text">
				<span class="red1" id="goods_amount"><?=val($amount_price,'goods_amount',0);?></span> 元
			</div>
		</div>
	</div>
	<?php if ($amount_price['enable_point_consump']): ?>
		<!-- <div class="padContent money row">
			<div class="col70">可用积分：<span class="red1"><?= val($balance, 'point', 0);?></span></div>
			<div class="col4">
				<select class="pull-right"<?=val($balance, 'point', 0)==0 ? ' disabled' : ''?> name="point_deductible" id="isPoint">
				   <option value="0">不使用</option>
				   <option value="1">积分抵扣</option>
				</select>
			</div>
		</div> -->

		<div class="cus-list-select" style="margin-bottom:12px;">
			<div>
				<label class="">
					可用积分：<span class="red1"><?= val($balance, 'point', 0);?></span>
				</label>
				<div class="item-select">
					<div style="border-bottom:0px;">
						<div class="cus-select" style="float:right;width:60%;">
							<select class=""<?=val($balance, 'point', 0)==0 ? ' disabled' : ''?> name="point_deductible" id="isPoint">
							   <option value="0">不使用</option>
							   <option value="1">积分抵扣</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="cus-list-input1">
			<div>
				<label class="required">
					可用积分：<span class="red1"><?= val($balance, 'point', 0);?></span>
				</label>
				<label class="cus-checkbox">
					<input class="yuezhifu" type="checkbox"<?= val($balance, 'balance', 0)==0 ? ' disabled' : ''?> name="payment" value="balance"/>
					<i style="margin-right: 0px;"></i>
				</label>
			</div>
		</div> -->
	<?php endif ?>
	
	<div class="padContent paySet clearfix">
	<div class="group" id="point_consump" style="display:none;padding-left:18px;">
		<span>积分优惠<span class="red1 discount" id="use_point_money"></span>元 (使用<span class="red1" id="use_point_consump">0</span>积分)</span>
	</div>

	<div style="height: 30px;line-height: 30px;background: #f8f8f8;padding-left: 18px;">支付方式</div>
	
	<?php if ($is_enable_balance): ?>
		<div class="group" style="padding-left:18px;">
			<label class="cus-radio" style="float:right">
				<input class="yuezhifu" type="radio"<?= val($balance, 'balance', 0)==0 ? ' disabled' : ''?> name="payment" value="balance"/>
				<i style="margin-right: 0px;"></i>
			</label>
			<span style="margin-right: 50px;display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">余额支付<span class="red1 orderAmount"><?=$goods_amount;?></span>元 (可用余额: <?= val($balance, 'balance', 0);?>)</span>
		</div>
	<?php endif ?>
	
	<?php if(!empty($resultPayType)){
		foreach ($resultPayType as $key1 => $value1) {?>
			<div class="group" style="padding-left:18px;">
				<span><?=$value1['payment_name']?><span class="red1 orderAmount"><?=$goods_amount;?></span>元</span>
				<label class="cus-radio" style="float:right">
					<input class="<?=$value1['payment_code']?>" type="radio" name="payment"<?=$key1==0 ? ' checked' : ''?> value="<?=$value1['payment_code']?>"/>
					<i style="margin-right:0px;"></i>
				</label>
			</div>
	<?php }}?>
	</div>
	<div class="group" style="padding-left:18px;height:48px;line-height:48px;text-align:center;">
		<label class="cus-radio" style="margin-right:0px;">
	  		<input type="checkbox" id="cAgree" name="agree" value="1" style="margin-right: 0px;width: 0;display: none;" checked="checked">
			<i style="margin-right:0px;"></i>
		</label>
		<span> 我已阅读并同意《<a href="#" id="agreeContent" style="color:#f60;">一元购商城购物条款</a>》</span>
	</div>
	<input type="hidden" name="goods_ids" value="<?=$goods_ids?>">
</form>
<!-- <div class="more"></div> -->
<div style="margin: 12px 0;text-align:center;margin-bottom:20px;">
	<a id="btnPay" class="cus-btn cus-btn-lg cus-btn-red" href="#" style="width:84%;">立即支付</a>
</div>
<?php endif;?>
<script>
	$(function(){
		$window=$(window);
		//设置$body的高度和宽度
		$body=$("body");
		$body.height($window.height());
		var BBL=BOBOLIB_fun().init($,this,$window,$body);
		var app=new MainApp(BBL);
		var $payGo=$("#payGo");
		$('#agreeContent').click(function(e){
			e.preventDefault();
			app.popupWebUrl('《一元购商城购物条款》','/Yiyuan/Order/Appoint/get').css('top','5%');
		});
		var $cAgree=$('#cAgree');
		$('#agreeDiv').click(function(e){
			e.preventDefault();
			var checked=!$cAgree.prop('checked');
			if(checked){
				$btnPay.css('background-color','#f60');
			}else{
				$btnPay.css('background-color','#ccc');
			}
			$cAgree.prop('checked',checked);
		});
		var $btnPay=$("#btnPay");
		$btnPay.click(function(e){
			e.preventDefault();
			var formData=$payGo.serialize();
			if(formData.indexOf('agree=1')==-1){
				app.alert('错误','请同意并勾选《一元购商城购物条款》后提交。');
				return;
			}
			var reSubmitIndex=0;
			function gotoUrl(){
				app.popupWait();
				var url='/yiyuan/order/submit';
				$.ajax({
						url:url,
						type:'post',
						data:formData,
						dataType:'json',
						success: function(data){
							//console.log(data.msg);
							app.close();
							var btnName=data.btnName||'确定';
							if(data.sucess){
								window.location.href=data.url;
								return;
							}
							app.alert('错误',data.msg,function(){
								if(data.url) window.location.href=data.url;
							},btnName);
						},
						error:function(){
							app.close();
							if(reSubmitIndex++<3){
								setTimeout(gotoUrl,500);
							}else{
//								app.alert('提示','网络超时,请重试！');
							}
							//
						}
					});
			}
			gotoUrl();
			//
		});
		var point_info = <?=json_encode($amount_price)?>;
		$("#isPoint").change(function() {
			if($(this).val() == 0) {
				$("#point_consump").hide();
				$(".orderAmount").text(<?=$goods_amount?>);
			} else {
				$("#point_consump").show();
				$("#use_point_money").text(point_info.discount);
				$("#use_point_consump").text(point_info.use_point);
				$('.orderAmount').text(point_info.amount_paid);
			}
		});
	});	
</script>
</body>
</html>