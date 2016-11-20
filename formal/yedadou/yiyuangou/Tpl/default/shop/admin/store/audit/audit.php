<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>门店审核</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/js/kindeditor/themes/default/default.css,/admin/css/shop/store/list/add.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="storeName"><strong>门店名称：</strong></label>
							</div>
							<div class="control-wrapper">
								<input readonly="readonly" type="text" id="storeName" name="name" class="form-control" value="<?=$store['name']?>" placeholder="请输入门店名称">
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="logo"><strong>门店logo：</strong></label>
							</div>
							<div class="control-wrapper">
								<input readonly="readonly" type="text" value="<?=$store['logo']?>" id="logo" name="logo" class="form-control" placeholder="" />
								<img id="previewImage" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
							</div>
						</div>

						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="description"><strong>门店介绍：</strong></label>
							</div>
							<div class="control-wrapper">
								<textarea readonly="readonly" id="description" name="desc" class="form-control height80" placeholder=""><?=$store['desc']?></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="dimension"><strong>门店面积：</strong></label>
							</div>
							<div class="control-wrapper">
								<div class="input-group ">
									<input readonly="readonly" type="text" value="<?=$store['acreage']?>" name="acreage" id="dimension" class="form-control" placeholder="">
									<span class="input-group-addon">平方米</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="title"><strong>电话：</strong></label>
							</div>
							<div class="control-wrapper">
								<input readonly="readonly" id="phone" name="phone" type="text" class="form-control" value="<?=$store['phone']?>" placeholder="" />
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="title"><strong>传真：</strong></label>
							</div>
							<div class="control-wrapper">
								<input readonly="readonly" id="fax" name="fax" type="text" class="form-control" value="" placeholder="" />
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for=""><strong>所在区域：</strong></label>
							</div>
							<div class="control-wrapper">
								<label class="" for=""><?=$store['area']?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for=""><strong>地址：</strong></label>
							</div>
							<div class="control-wrapper">
								<div>
									<input readonly="readonly" id="address" name="address" type="text" class="form-control" placeholder="" value="<?=$store['address']?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper long">
								<label class="" for=""></label>
							</div>
							<div class="control-wrapper long">
								<div id="mapContainer" class="map-container">
								</div>
								<span class="help-block">
									 经度:&nbsp;<input name="longitude" value="<?=$store['longitude']?>" type="text" readonly="readonly" id="longitude" />
									纬度:&nbsp;<input name="latitude" value="<?=$store['latitude']?>" type="text" readonly="readonly" id="latitude" />
								</span>
							</div>
						</div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="space"></div>
						<div class="button-panel">
							<button type="submit" class="btn btn-info btn-sm btn-space-right" data-href="/shop/admin/store/Audit/update?id=<?=$store['id']?>&status=1" data-action="submit" data-refresh="parent" data-mask="parent"><i class='ace-icon fa fa-check'></i> 审核通过</button>
							<button type="submit" class="btn btn-danger btn-sm" data-href="/shop/admin/store/Audit/update?id=<?=$store['id']?>&status=-1" data-action="submit" data-refresh="parent" data-mask="parent"><i class='ace-icon fa fa-times'></i> 审核不通过</button>
						</div>
					</form>
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
		<script src="http://api.map.baidu.com/api?v=2.0&ak=ERbdhIdASjrTYg8WrY49D5Uy"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/store/auditStore/audit.js"></script>
	</body>

</html>