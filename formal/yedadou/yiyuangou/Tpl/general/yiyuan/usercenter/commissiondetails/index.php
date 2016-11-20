<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>佣金明细</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/commissionDetails.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
	<div class="title">累计获得积分：<span class="red1"><?=val($balance[0],'point')?></span></div>
	<table>
		<thead>
			<tr>
				<td>会员</td>
				<td>时间</td>
				<td>购买金额<br>（元）</td>
				<td>积分</td>
			</tr>
		</thead>
		<tbody id="timeline-container">
			
		</tbody>
	</table>
	<?php include $this->tpl('yiyuan:public/footer.php') ?>
	<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
	<script>
	$(function(){
		var urlPageList='/yiyuan/UserCenter/CommissionDetails';
		var $container=$('#timeline-container');
		doPage(urlPageList,$container);
	});
	</script>
</body>
</html>
