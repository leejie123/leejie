<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>订单支付</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/payOrder.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php if(!empty($cart_data)):?>
<form id="payGo" method="post">
	<?php foreach($cart_data as $v) :?>
	<div class="timeline-item clearfix">
		<div class="user">
			<img alt="Susan't Avatar" src="<?=$v['pic_url'];?>">
		</div>
		<div class="info clearfix">
			<div class="row"><?=$v['title'];?></div>
			<div class="row clearfix">第（<span class="red1"><?= val($term, trim($v['goods_id']), 1);?></span>）期         <span class="red1"><?= val($count, $v['id'], 1);?></span>人次</div>
		</div>
	</div>
	<?php endforeach;?>
	<div class="padContent money row">
		<div class="col70">商品合计：</div>
		<div class="col4">
			<span class="red1" id="goods_amount"><?=val($amount_price,'goods_amount',0);?></span> 元
		</div>
	</div>
	<?php if ($amount_price['enable_point_consump']): ?>
		<div class="padContent money row">
			<div class="col70">可用积分：<span class="red1"><?= val($balance, 'point', 0);?></span></div>
			<div class="col4">
				<select class="pull-right"<?=val($balance, 'point', 0)==0 ? ' disabled' : ''?> name="point_deductible" id="isPoint">
				   <option value="0">不使用</option>
				   <option value="1">积分抵扣</option>
				</select>
			</div>
		</div>
	<?php endif ?>
	
	<div class="padContent paySet clearfix">
	<div class="group" id="point_consump" style="display:none">
		<span>积分优惠<span class="red1 discount" id="use_point_money"></span>元 (使用<span class="red1" id="use_point_consump">0</span>积分)</span>
	</div>
	
	<?php if ($is_enable_balance): ?>
		<div class="group">
			<span>余额支付<span class="red1 orderAmount"><?=$goods_amount;?></span>元 (可用余额: <?= val($balance, 'balance', 0);?>)</span>
			<input class="yuezhifu" type="radio"<?= val($balance, 'balance', 0)==0 ? ' disabled' : ''?> name="payment" value="balance"/>
		</div>
	<?php endif ?>
	
	<?php if(!empty($resultPayType)){
		foreach ($resultPayType as $key1 => $value1) {?>
			<div class="group">
				<span><?=$value1['payment_name']?><span class="red1 orderAmount"><?=$goods_amount;?></span>元</span>
				<input class="<?=$value1['payment_code']?>" type="radio" name="payment"<?=$key1==0 ? ' checked' : ''?> value="<?=$value1['payment_code']?>"/>
			</div>
	<?php }}?>
	</div>
	<input type="hidden" name="goods_ids" value="<?=$goods_ids?>">
</form>
<div class="more"></div>
<a id="btnPay" href="#">确认支付</a>
<?php endif;?>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
<script>
	$(function(){
		$window=$(window);
		//设置$body的高度和宽度
		$body=$("body");
		$body.height($window.height());
		var BBL=BOBOLIB_fun().init($,this,$window,$body);
		var app=new MainApp(BBL);
		var $payGo=$("#payGo");
		$("#btnPay").click(function(e){
			e.preventDefault();
			var formData=$payGo.serialize();
			//console.log(formData);
			//return;
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
								/*app.alert('成功',data.msg,function(){
									window.location.href=data.url;
								},btnName);*/
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
								app.alert('提示','网络超时,请重试！');
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