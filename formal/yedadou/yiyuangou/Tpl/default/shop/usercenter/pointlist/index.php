<?php include $this->tpl('shop:public/html_header.php') ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/bonus.css" />
		<title>我的<?php echo !empty($footerConfig[6][0]) ? $footerConfig[6][0] : '分享客'; ?></title>
	</head>

	<body class="">
		<div class="wrapper">
			<?php include $this->tpl('shop:public/header.php') ?>

			<!--通用容器-->
			<div class="common-container">
				<div class="list-container relative">
					<div class="list-header">
						我的<?php echo !empty($footerConfig[6][0]) ? $footerConfig[6][0] : '分享客'; ?>
					</div>
					<div class="inner-list">
						<table id="dataTable" class="table">
							<tbody>
								<?php if(!$isEmpty):?>
								<?php foreach ($itemes as $v):?>
								<tr>
									<td><?=$v['source_name']?></th>
									<td><?=$v['add_time']?></td>
									<td><?=$v['point']?></td>
								</tr>
								<?php endforeach?>
								<?php endif?>
							</tbody>
						</table>
					</div>
					<!--下拉按钮,点击可以翻页-->
					<div id="nextPage" class="next-page" title="点击加载更多" data-auto-page="true" data-page-table="#dataTable" data-auto="ajax" data-href="/shop/UserCenter/PointList/get" data-tip="" data-show-tip="true" data-submit-id="page" data-success-function="showCurrentPage" data-show-response="false">
						<!--当前页数-->
						<input type="hidden" name="page" id="page" value="1"  />
						<i class="fa fa-angle-double-down"></i>
					</div>
				</div>
				<!--<div class="center mt10">
					<button class="button-red center">积分商城</button>
				</div>-->
			</div>
			
		<?php include $this->tpl('shop:public/footer.php') ?>
	</body>

</html>