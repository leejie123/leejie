<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title><?=$shopName?> 个人中心</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/getMoney.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div class="title">可提现积分：<span class="red1">5000</span>积分</div>
	<div class="tip">100积分=1元，最低提现1元</div>
	<form id="payGo" method="post" action="/yiyuan/UserCenter/GetMoney">
		<div class="container">
			<div class="recharge">
				<div>提现金额：<input type="tel" name="moneyInput" id="moneyInput"></div>
				<div class="group">提取方式：</div>
				<div class="group">
					<span>　微信转帐</span>
					<input type="radio" name="payment" value="balance" />
				</div>
			</div>
			<a id="submit" href="#">确认提现</a>
		</div>
	</form>

	<table>
		<thead>
			<tr>
				<td>时间</td>
				<td>提现</td>
			</tr>
		</thead>
		<tbody id="loadContainer">
		</tbody>
	</table>
	<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script>
	$(function(){
		var urlPageList='/yiyuan/UserCenter/GetMoney';
		var $container=$('#loadContainer');
		doPage(urlPageList,$container);
		//
		var $payGo=$('#payGo');
		$('#submit').click(function(){
			$payGo.submit();
		});
	});
</script>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
</body>
</html>
