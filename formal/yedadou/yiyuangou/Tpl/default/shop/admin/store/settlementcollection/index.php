<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>代收款记录 </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/store/settlement/index.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-warning">
						<strong>:{ 稍后推出</strong>
					</div>
					<?php if(!$isEmpty):?>
					<!--内容开始-->
					<div class="alert alert-warning">
						<strong>累计代收款：</strong> <?=$total?> 元 <span class="font-red">（扣除抽成后的统计）</span>
					</div>
					<!--表格-->
					<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
						<thead>
							<tr>
								<th class="center">序号</th>
								<th class="center">订单号</th>
								<th class="center">商品</th>
								<th class="center">收款金额（元）</th>
								<th class="center">抽成</th>
								<th class="center">结余</th>
								<th class="center">支付时间</th>
							</tr>
						</thead>

						<tbody>
							
							<?php foreach ($itemes as $arr):?>
							<?php $startIndex++;?>
							<tr>
								<td class="center">1</td>
								<td class="center">201508088283748483772</td>
								<td class="center">歌云帝红酒</td>
								<td class="center">50</td>
								<td class="center">5%</td>
								<td class="center">47.5</td>
								<td class="center">2015-07-15  12:10:56</td>
							</tr>
							<?php endforeach?>
						</tbody>
					</table>
					<!--底部工具条-->
					<div class="table-foot-toolbar clearfix">
						<?=$pageBtnsHtml?>
					</div>
					<!--表格结束-->
					<div class="space-6"></div>
					<!--内容结束-->
				</div>
				<?php endif?>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
	</body>

</html>