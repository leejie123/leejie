<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>账户余额</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

		<style type="text/css">
			.table > tbody > tr > td {
				  border: none;
				}
			.table > tbody > tr > td{
				border-bottom: 1px solid  #C5D0DC;
			}
			.center > a{
				text-align: center;
				vertical-align: middle;
			}
		</style>
	<body class="no-skin">

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1">账户余额</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
							<table class="table table-condensed table-hover">
								<tr>
									<td>账户余额:</td>
									<td><b>1422 元</b></td>
									<td class="center"><a  class="btn btn-info btn-xs">提　　现</a></td>
								</tr>
								<tr>
									<td>累计提现:</td>
									<td><b>5689 元</b></td>
									<td class="center"><a  class="btn btn-info btn-xs">提现明细</a></td>
								</tr>
								<tr>
									<td>商城代收款:</td>
									<td><b>5689 元</b></td>
									<td class="center"><a class="btn btn-info btn-xs">代收款明细</a></td>
								</tr>
							</table>
							</div>
						</div>
					</div>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/carousel/index.js"></script>
	</body>

</html>