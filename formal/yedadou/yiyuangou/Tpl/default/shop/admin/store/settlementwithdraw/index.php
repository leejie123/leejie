<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>提现记录 </title>
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
						<strong>累计提现：</strong> <?=$total?> 元
					</div>
					<!--表格-->
					<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
						<thead>
							<tr>
								<th class="center">序号</th>
								<th class="center">变更项</th>
								<th class="center">订单号</th>
								<th class="center">提现金额</th>
								<th class="center">提现账号</th>
								<th class="center">申请时间</th>
								<th class="center">状态</th>
								<th class="center">操作员</th>
								<th class="center">返现时间</th>
								
							</tr>
						</thead>

						<tbody>
							<?php foreach ($itemes as $arr):?>
							<?php $startIndex++;?>
							<tr>
								<td class="center">1</td>
								<td class="center">提现</td>
								<td class="center">201508088283748483772</td>
								<td class="center">-1000</td>
								<td class="center">3774834973273282（支付宝）</td>
								<td class="center">2015/07/01 13:23</td>
								<td class="center">审核中</td>
								<td class="center">-</td>
								<td class="center">-</td>
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
					<?php endif?>
				</div>
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