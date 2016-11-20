<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>积分明细</title>
<link href="{__STATIC_URL__}/public/css/pure-min.css" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/css/commissionDetails.css?v=2016120" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
<style>
	table {
		border: none;
		margin: 0px;
		width: 100%;
		
	}
	table > thead > tr {
		height: 48px;
		background: #FFF;
		border-bottom: 1px solid #eee;
	}

	table > tbody{
		padding:0 18px;
	}

	table > tbody > tr {
		height: 48px;
		background: #FFF;
		border-bottom: 1px solid #eee;
	}
	table > tbody > tr:last-child{
		border-bottom: 0px;
	}
	table > tbody > tr {
		border-bottom: 1px solid #eee;
	}
</style>
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
	<div class="header">
		<a href="/yiyuan/UserCenter/CommissionDetails?act=com" <?php if($act!='point'){?>class="select"<?php }?>>积分返佣明细</a>
		<a href="/yiyuan/UserCenter/CommissionDetails?act=point" <?php if($act=='point'){?>class="select"<?php }?>>积分变动明细</a>
	</div>
	<?php if($act!='point'){?>
	<div style="margin:12px auto">
		<div class="cus-list-input1">
			<div style="border-bottom:0px;">
				<label>
					可用积分
				</label>
				<div class="item-text">
					<span class="red1"><?=$sum?></span>
				</div>
			</div>
		</div>
	</div>
	<table>
		<thead>
			<tr>
				<td>会员</td>
				<td>时间</td>
				<td style="width: 140px;">订单号</td>
				<td>积分</td>
			</tr>
		</thead>
		<tbody id="timeline-container">

		</tbody>
	</table>
	<?php }else{?>
	<div style="margin:12px auto">
		<div class="cus-list-input1">
			<div>
				<label>
					历史累计提现积分
				</label>
				<div class="item-text">
					<span class="red1"><?=$drawsum?></span>
				</div>
			</div>
		</div>
		<div class="cus-list-input1">
			<div style="border-bottom:0px;">
				<label>
					剩余可提积分
				</label>
				<div class="item-text">
				<span class="red1"><?=val($balance[0],'point')?></span>
				</div>
			</div>
		</div>
	</div>
	<table>
		<thead>
			<tr>
				<td style="width: 60px;">积分来源</td>
				<td>时间</td>
				<!-- <td>状态</td> -->
				<td>积分</td>
			</tr>
		</thead>
		<tbody id="timeline-container">
		</tbody>
	</table>
	<?php }?>
	<?php include $this->tpl('yiyuan:public/footer.php') ?>
	<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
	<script>
	$(function(){
		var urlPageList='/yiyuan/UserCenter/CommissionDetails?act=<?=$act?>';
		var $container=$('#timeline-container');
		doPage(urlPageList,$container);
	});
	</script>
</body>
</html>
