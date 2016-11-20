<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>添加虚拟用户</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/js/kindeditor/themes/default/default.css,/admin/css/shop/comment/virtualUser/add.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="userName"><strong>用户名称：</strong></label>
							</div>
							<div class="control-wrapper">
								<input type="text" id="userName" name="userName" class="form-control" value="" placeholder="请输入用户名称">
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="headImage"><strong>用户头像：</strong></label>
							</div>
							<div class="control-wrapper">
								<div class="input-group">
										<input type="text" value="" id="headImage" name="headImage" class="form-control" placeholder="请直接输入图片地址或使用上传图片按钮上传图片" />
										<span class="input-group-btn">
	       									<button id="upload" type="button" class="btn btn-info btn-sm">上传图片</button>
	      								</span>
									</div>
									<img id="previewImage" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
							</div>
						</div>
						<div class="space"></div>
						<div class="button-panel">
							<button type="submit" class="btn btn-info btn-sm btn-space-right" data-href="" data-action="submit" data-refresh="parent" data-mask="parent"><i class='ace-icon fa fa-check'></i> 确定</button>
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
		<script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/comment/virtualUser/add.js"></script>
	</body>

</html>