<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>充值</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">

		<div class="container-fluid no-padding overflow-hidden">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="alert alert-warning">
						<div class="row">
							<div class="col-xs-6">
								<span><strong>编号：</strong><span id="serialNumber">XXXXX</span></span>
							</div>
							<div class="col-xs-6">
								<span><strong>门店名称：</strong><span id="storeName">XXXX</span></span>
							</div>
						</div>
					</div>
					<!--表格-->
					<form method="post" action="" enctype="multipart/form-data" class="p10 no-padding-top" data-submit="auto">
						<table id="dynamic-table" class="table table-bordered table-vertical-middle">
							<thead>
								<tr>
									<th class="center" width="120">充值类型</th>
									<th class="center">数量</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td class="center">
										<div class="space"></div>
										<div class="space"></div>
										余额
									</td>
									<td class="center">
										<div class="form-group clearfix">
											<div class="label-wrapper">
												<label>
													增加数量：
													<input name="moneyType" type="radio" class="ace" value="1" checked="" data-id="money_add">
													<span class="lbl"> </span>
												</label>
											</div>
											<div class="control-wrapper">
												<input type="text" class="form-control" id="money_add" name="money_add" placeholder="">
											</div>
										</div>
										<div class="form-group clearfix">
											<div class="label-wrapper">
												<label>
													减少数量：
													<input name="moneyType" type="radio" class="ace" value="0" data-id="money_minus">
													<span class="lbl"> </span>
												</label>
											</div>
											<div class="control-wrapper">
												<input type="text" class="form-control" id="money_minus" name="money_minus" placeholder="">
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="center">
										<div class="space"></div>
										<div class="space"></div>
										积分
									</td>
									<td class="center">
										<div class="form-group clearfix">
											<div class="label-wrapper">
												<label>
													增加数量：
													<input name="pointsType" type="radio" class="ace" value="1" checked="" data-id="points_add">
													<span class="lbl"> </span>
												</label>
											</div>
											<div class="control-wrapper">
												<input type="text" class="form-control" id="points_add" name="points_add" placeholder="">
											</div>
										</div>
										<div class="form-group clearfix">
											<div class="label-wrapper">
												<label>
													减少数量：
													<input name="pointsType" type="radio" class="ace" value="0" data-id="points_minus">
													<span class="lbl"> </span>
												</label>
											</div>
											<div class="control-wrapper">
												<input type="text" class="form-control" id="points_minus" name="points_minus" placeholder="">
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="space-4"></div>
						<div class="button-panel">
							<button type="submit" class="btn btn-info btn-sm btn-space-right" data-href="" data-action="submit" data-refresh="window" data-mask="parent"><i class='ace-icon fa fa-check'></i> 确定</button>
							<button id="cancel" type="button" class="btn btn-danger btn-sm" data-action="close"><i class='ace-icon fa fa-times'></i> 取消</button>
						</div>
					</form>
					<!--表格结束-->

					<!--内容结束-->
				</div>
			</div>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/store/settlement/recharge.js"></script>
	</body>

</html>