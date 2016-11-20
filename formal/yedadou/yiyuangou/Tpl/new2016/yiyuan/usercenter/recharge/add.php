<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>充值</title>
<link rel="stylesheet" href="{__STATIC_URL__}/public/yiyuan/new2016/css/recharge1.css">
<link href="{__STATIC_URL__}/public/css/pure-min.css" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
<script src="{__STATIC_URL__}/public/yiyuan/new2016/js/shortAlert.js"></script> 
 
</head>
<body>
<body>
	<!-- <header class="clearfix"><a href="#" class="select">我要充值</a><a href="/yiyuan/UserCenter/recharge">充值记录</a></header> -->
	<form id="payGo" method="post" action="">
		<div class="container">
			<div style="height:48px;color:#666;font-size:12px;margin:0 18px;line-height:20px;padding-top:5px;"><span style="color:#db3855">备注：</span>充值余额将用于平台支付，充值款项将无法进行退回，但会极大缩短抢购时间哦~</div>

			<!-- left-money -->
			<div class="cus-list">
				<label for="">当前余额</label>
				<div><span><?=val($balance, 'balance', 0.00)?></span>元</div>
			</div>
			<!-- left-money -->

			<!-- <div>当前金额：<span class="red1"><?=val($balance, 'balance', 0.00)?></span>元</div> -->

			<!-- money-list -->
			<div class="money-list">
				<div class="pure-g">
					<div class="pure-u-1-3">
						<div class="list-items selected">
							<span>10</span>元
						</div>
					</div>
					<div class="pure-u-1-3">
						<div class="list-items">
							<span>20</span>元
						</div>
					</div>
					<div class="pure-u-1-3">
						<div class="list-items">
							<span>30</span>元
						</div>
					</div>
				</div>
				<div class="pure-g">
					<div class="pure-u-1-3">
						<div class="list-items">
							<span>50</span>元
						</div>
					</div>
					<div class="pure-u-1-3">
						<div class="list-items">
							<span>100</span>元
						</div>
					</div>
					<div class="pure-u-1-3">
						<div class="list-items">
							<span>150</span>元
						</div>
					</div>
				</div>
			</div>
			<!-- money-list -->

			<!-- input-item -->
			<div class="input-item">
				<label for="">充值金额</label>
				<div>
					<input type="tel" name="money" id="moneyInput" value="10">
					元
				</div>
			</div>
			<!-- input-item -->

			<!-- <div class="moneylist">
				<div>
					<button>10元</button>
					<button>20元</button>	
					<button>30元</button>
				</div>
				<div>
					<button>50元</button> 
					<button>100元</button> 
					<button>150元</button>
				</div>
			</div> -->
			<div class="recharge">
				<!-- <div>充值金额：<input type="tel" name="money" id="moneyInput"></div> -->
				<?php if(!empty($resultPayType)):?>
					<?php foreach($resultPayType as $v):?>
						<?php if(val($v, 'payment_code', '') != 'Balance'):?>
				<div class="group">
					<span><?=val($v, 'payment_name', '')?><span class="red1 orderAmount"></span></span>
					<label class="cus-radio" style="float:right;width:48px;text-align:right;margin: 0px;">
						<input type="radio" name="payment" value="<?=val($v,'payment_code','')?>" <?php echo val($v,'payment_code','') == 'Weixin' ? 'checked': '';?>/>
						<i style="margin-right:0px;"></i>
					</label>
				</div>
						<?php endif;?>
			<?php endforeach;?>
				<?php endif;?>
			</div>
			<div style="text-align:center;">
				<a id="submit" type="submit" class="cus-btn cus-btn-lg cus-btn-red" href="#" style="width:82%;margin-bottom:12px;">支付充值</a>
			</div>
		</div>
	</form>
	<script type="text/javascript">
	$(function(){

		var $body = $("body");
		var once = true;
		var sAlert = new shortAlert($body)
		var $moneyInput=$('#moneyInput');
		$('.money-list .list-items').click(function(e){
			e.preventDefault();
			var $this=$(this);
			var m=parseInt($this.find('span').text());
			$('.list-items').removeClass('selected')
			$this.addClass('selected');
			//var m1=parseInt($moneyInput.val())||0;
			$moneyInput.val(m);
		});
		var $payGo=$('#payGo');
		// $('#submit').click(function(e){
		// 	e.preventDefault();
		// 	$payGo.submit();
		// });
		// var data1 = $payGo.serialize();
		$('#submit').on('click', function(e) {
			e.preventDefault();
			var payment = $('input[name=payment]:checked').val();
			var money = $('#moneyInput').val();
			// console.log(payment)
			if (once) {
					$.ajax({
					url: '/yiyuan/UserCenter/recharge/post',
					data: {
						payment: payment,
						money: money
					},
					type: 'post',
					success: function(data) {
						try {
							var data1 = $.parseJSON(data);
						} catch(e) {

						}

						if (data1.error) {
							sAlert.show(data1.msg);
							return;
						}
						// if (data1.success) {
						// 	sAlert.show(data1.msg);
						// }
						window.location.href = data1.url;
						once = false;
						
					},
					error: function() {
						sAlert.show('网络问题，请稍后重试');
					}
				})
			}
			
		})
		
	});
	</script>
</body>
</html>