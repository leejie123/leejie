<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>充值记录</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/rechargeList.css" rel="stylesheet" type="text/css" />

<link href="{__STATIC_URL__}/public/css/pure-min.css" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
<style>

	.table {
		border-bottom: 1px solid #eee;
	}

	.table>div+div {
		border-top: 1px solid #eee;
	}
	
	.table > div {
		height: 48px;
		line-height: 48px;
	}

	.table > div > div {
		padding: 0px!important	;
	}

	.table>div:first-child {
		background-color: #fff;
	}

	#mainContainer>div:first-child {
		background-color:#fff;
	}

</style>
</head>
<body>
	<!-- <header class="clearfix"><a href="/yiyuan/UserCenter/recharge/add">我要充值</a><a href="#" class="select">充值记录</a></header> -->
	<form id="payGo" method="post">
		<div class="container">
			<div style="margin:12px auto;">
				<div class="cus-list-input1">
					<div style="border-bottom:0px;">
						<label>
							当前余额
						</label>
						<div class="item-text">
							<span class=""><?=val($balance, 'balance', 0.00)?></span> 元
						</div>
					</div>
				</div>
			</div>
            <?php if(!empty($money)):?>

            <div style="height:23px;line-height:23px;margin-left:18px;">最近三个月的充值记录</div>
			<!-- <div class="tip red1">*最近三个月的充值记录</div> -->
			<div class="table" id="list">
				<div>
					<div>金额</div>
					<div>方式</div>
					<div>时间</div>
				</div>
			</div>
            <?php endif;?>
			<div class="table" id="mainContainer" style="background-color:#fff;border-bottom: 0;">

			</div>
		</div>
	</form>
</body>
</html>
<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script>
	$(function(){
		var urlPageList='/yiyuan/UserCenter/recharge';
		var $container=$('#mainContainer');
		doPage(urlPageList,$container);
	});
</script>