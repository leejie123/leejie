<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>取消冻结帐户</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
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
					<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
						<div class="space"></div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="p10 center mt10">
							确定要取消冻结 门店名称（编号）的账户？ 
						</div>
						<div class="space"></div>
						<div class="button-panel">
							<button type="submit" class="btn btn-info btn-sm btn-space-right" data-href="" data-action="submit" data-refresh="window" data-mask="parent"><i class='ace-icon fa fa-check'></i> 确定</button>
							<button id="cancel" type="button" class="btn btn-danger btn-sm" data-action="close"><i class='ace-icon fa fa-times'></i> 取消</button>
						</div>
					</form>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
	</body>

</html>