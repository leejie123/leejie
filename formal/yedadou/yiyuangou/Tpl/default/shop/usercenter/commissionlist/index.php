<?php include $this->tpl('shop:public/html_header.php') ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/dataTable.css" />
		<title>佣金明细</title>
	</head>

	<body class="">
		<div class="wrapper">
			<?php include $this->tpl('shop:public/header.php') ?>

			<!--通用容器-->
			<div class="common-container">
				<div class="list-container relative">
					<div class="list-header">
						累计佣金： <span class="red1 bold"><?=$comission_count?></span> 元
					</div>
					<div class="inner-list">
						<table id="dataTable" class="table">
							<thead>
								<tr>
									<th>订单号</th>
									<th>佣金</th>
									<th>状态</th>
									<th>返佣时间</th>
								</tr>
							</thead>
							<tbody>
								<?php if(!$isEmpty):?>
								<?php foreach ($itemes as $v):?>
								<tr>
									<td><?=$v['order_sn']?></th>
									<td><?=$v['comission_amount']?> </td>
									<td><?=$v['status_name']?></td>
									<td><?=$v['check_time']?></td>
								</tr>
								<?php endforeach?>
								<?php endif?>
							</tbody>
						</table>
					</div>
					<!--下拉按钮,点击可以翻页-->
					<div id="nextPage" class="next-page" title="点击加载更多" data-auto-page="true" data-page-table="#dataTable" data-auto="ajax" data-href="/shop/UserCenter/CommissionList/get" data-tip="" data-show-tip="true" data-submit-id="page" data-success-function="showCurrentPage" data-show-response="false">
						<!--当前页数-->
						<input type="hidden" name="page" id="page" value="1"  />
						<i class="fa fa-angle-double-down"></i>
					</div>
				</div>
			</div>

			<?php include $this->tpl('shop:public/footer.php') ?>
	</body>

</html>