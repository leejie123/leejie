<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>充值</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/rechargeAdd.css" rel="stylesheet" type="text/css" />
</head>
<body>
<body>
	<header class="clearfix"><a href="#" class="select">我要充值</a><a href="/yiyuan/UserCenter/recharge">充值记录</a></header>
	<form id="payGo" method="post" action="/yiyuan/UserCenter/recharge/update">
		<div class="container">
			<div>当前金额：<span class="red1"><?=val($balance, 'balance', 0.00)?></span>元</div>
			<div class="moneylist">
				<button>10元</button>
				<button>20元</button>
				<button>30元</button>
				<button>50元</button>
				<button>100元</button>
				<button>150元</button>
			</div>
			<div class="recharge">
				<div>充值金额：<input type="tel" name="money" id="moneyInput"></div>
				<?php if(!empty($resultPayType)):?>
					<?php foreach($resultPayType as $v):?>
						<?php if(val($v, 'payment_code', '') != 'Balance'):?>
				<div class="group">
					<span><?=val($v, 'payment_name', '')?><span class="red1 orderAmount"></span></span>
					<input type="radio" name="payment" value="<?=val($v,'payment_code','')?>" <?php echo val($v,'payment_code','') == 'Weixin' ? 'checked': '';?>/>
				</div>
						<?php endif;?>
			<?php endforeach;?>
				<?php endif;?>
			</div>
			<a id="submit" href="#">支付充值</a>
		</div>
	</form>
	<script type="text/javascript">
	$(function(){
		var $moneyInput=$('#moneyInput');
		$('.moneylist>button').click(function(e){
			e.preventDefault();
			var $this=$(this);
			var m=parseInt($this.text());
			//var m1=parseInt($moneyInput.val())||0;
			$moneyInput.val(m);
		});
		var $payGo=$('#payGo');
		$('#submit').click(function(e){
			e.preventDefault();
			$payGo.submit();
		});
		
	});
	</script>
</body>
</html>