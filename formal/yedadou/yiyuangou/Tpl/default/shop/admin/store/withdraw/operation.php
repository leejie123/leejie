<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>返现操作</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/assets/css/jquery-ui.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap-datetimepicker.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
						<div class="form-group">
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td class="center" width="100"><strong>提现金额</strong></td>
										<td class="center">
											<?=$cashme?>
										</td>
										<td class="center" width="100"><strong>申请时间</strong></td>
										<td class="center">
											<?=$myDate?>
										</td>
									</tr>
									<tr>
										<td class="center" width="100"><strong>收款账户</strong></td>
										<td class="center">
											<?=$CollectionAccount?>
										</td>
										<td class="center" width="100"><strong>账户类型</strong></td>
										<td class="center">
											<?=$TypeAccount?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="order"><strong>支付单号：</strong></label>
							</div>
							<div class="control-wrapper">
								<input type="text" id="order" name="order" class="form-control" value="<?=$paymentOrder?>" placeholder="请输入支付单号">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="time"><strong>支付时间：</strong></label>
							</div>
							<div class="control-wrapper">
								<input type="text" id="time" name="time" class="form-control" value="<?=$paymentDate?>" placeholder="请输入支付时间">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="comment"><strong>备注：</strong></label>
							</div>
							<div class="control-wrapper">
								<textarea id="comment" name="comment" class="form-control height80" placeholder="请输入备注内容"><?=$conent?></textarea>
							</div>
						</div>
						<div class="space"></div>
						<div class="button-panel">
							<button type="submit" class="btn btn-info btn-sm btn-space-right" data-href="/shop/admin/store/Withdraw/update?isset=1&id=<?=$id?>" data-action="submit" data-refresh="parent" data-mask="parent"><i class='ace-icon fa fa-check'></i> 确定</button>
							<button id="cancel" type="button" class="btn btn-danger btn-sm" data-action="close"><i class='ace-icon fa fa-times'></i> 取消</button>
						</div>
					</form>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/moment.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/zh-cn.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datetimepicker.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/store/withdraw/operation.js"></script>
	</body>

</html>