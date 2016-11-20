<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>选择地区</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap-duallistbox.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
						<div id="multiSelect">
							<select multiple="multiple" size="10" name="duallist" id="duallist">
								<option value="1">北京市</option>
								<option value="2">河北省</option>
								<option value="3">山西省</option>
								<option value="4">内蒙古自治区</option>
								<option value="5">辽宁省</option>
								<option value="6">吉林省</option>
								<option value="7">黑龙江省</option>
								<option value="8">上海市</option>
								<option value="9">江苏省</option>
								<option value="10">浙江省</option>
								<option value="11">安徽省</option>
								<option value="12">福建省</option>
								<option value="13">江西省</option>
								<option value="14">山东省</option>
								<option value="15">河南省</option>
								<option value="16">湖北省</option>
								<option value="17">湖南省</option>
								<option value="18">广东省</option>
								<option value="19">广西壮族自治区</option>
								<option value="20">海南省</option>
								<option value="21">四川省</option>
								<option value="22">贵州省</option>
								<option value="23">云南省</option>
								<option value="24">西藏自治区</option>
								<option value="25">陕西省</option>
								<option value="26">甘肃省</option>
								<option value="27">青海省</option>
								<option value="28">宁夏回族自治区</option>
								<option value="29">新疆维吾尔自治区</option>
							</select>
						</div>
						<div class="space"></div>
						<div class="button-panel">
							<button id="sure" type="button" class="btn btn-info btn-sm btn-space-right"><i class='ace-icon fa fa-check'></i> 确定</button>
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
		<script src="{__STATIC_URL__}/public/assets/js/jquery.bootstrap-duallistbox.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/freight/area.js"></script>
	</body>

</html>