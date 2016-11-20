<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>商城订单</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<!--三级菜单-->
		<div class="tabbable">
			<ul id="tabs" class="nav nav-tabs padding-12 tab-color-blue background-blue">
				<li class="active"><a data-toggle="tab" href="#" data-url="/Shop/Admin/Order/SupplierOrderList?type=all" aria-expanded="true">全部 </a></li>
				<li><a data-toggle="tab" href="#" data-url="/Shop/Admin/Order/SupplierOrderList?type=1" aria-expanded="false">待付款 </a></li>
				<li><a data-toggle="tab" href="#" data-url="/Shop/Admin/Order/SupplierOrderList?type=2" aria-expanded="false">待发货</a></li>
				<li><a data-toggle="tab" href="#" data-url="/Shop/Admin/Order/SupplierOrderList?type=3" aria-expanded="false">已发货</a></li>
				<li><a data-toggle="tab" href="#" data-url="/Shop/Admin/Order/SupplierOrderList?type=4" aria-expanded="false">已完成</a></li>
				<li><a data-toggle="tab" href="#" data-url="/Shop/Admin/Order/SupplierOrderList?type=5" aria-expanded="false">待退款 </a></li>
				<li><a data-toggle="tab" href="#" data-url="/Shop/Admin/Order/SupplierOrderList?type=6" aria-expanded="false">已退款</a></li>
			</ul>
			<!--内容开始-->
			<div class="page-content no-padding" id="menu-iframe-container">
				<iframe id="top-container" src="/Shop/Admin/Order/SupplierOrderList?type=all" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>
			</div>
		</div>

		<!--内容结束-->
		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/order/shop/index.js"></script>
	</body>

</html>