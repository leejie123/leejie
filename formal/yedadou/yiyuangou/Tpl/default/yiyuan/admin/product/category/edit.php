<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>编辑分类</title>
		<meta name="iewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/product/category/edit.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
						<!--分类ID-->
						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="name"><strong>分类名称：</strong></label>
							</div>
							<div class="control-wrapper short">
								<input id="name" name="name" type="text" class="form-control" value="<?php echo isset($productCate['name'])?$productCate['name']:''; ?>" placeholder="" />
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="order"><strong>排序：</strong></label>
							</div>
							<div class="control-wrapper short">
								<input id="order" name="sort_order" type="text" class="form-control" value="<?php echo isset($productCate['sort_order'])?$productCate['sort_order']:''; ?>" placeholder="" />
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="isShow"><strong>是否显示：</strong></label>
							</div>
							<div class="control-wrapper short">
								<label class="pos-rel">
									<input id="isShow" name="display" type="checkbox" class="ace" <?php echo !empty($productCate['display'])?'checked':''; ?>/>
									<span class="lbl"></span>
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for=""><strong>分类图片：</strong></label>
							</div>
							<div class="control-wrapper short">
								<div class="input-group">
									<input type="text" value="<?php echo isset($productCate['pic_url'])?$productCate['pic_url']:''; ?>" id="imageUrl" name="pic_url" class="form-control" placeholder="请直接输入图片地址或使用上传图片按钮上传图片"/>
									<span class="input-group-btn">
       									<button id="upload" type="button" class="btn btn-info btn-sm">上传图片</button>
      								</span>
								</div>
								<img id="previewImage" class="preview-image" src="<?php echo isset($productCate['pic_url'])?$productCate['pic_url']:''; ?>" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
							</div>
						</div>
						<div class="space"></div>
						<div class="button-panel">
							<button type="submit" class="btn btn-info btn-sm btn-space-right" data-href="/yiyuan/admin/product/category/update" data-action="submit" data-refresh="parent" data-mask="parent"><i class='ace-icon fa fa-check'></i> 确定</button>
							<button id="cancel" type="button" class="btn btn-danger btn-sm" data-action="close"><i class='ace-icon fa fa-times'></i> 取消</button>
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
		<script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script type="text/javascript">
			window.kindeditorUpUrl='<?=site_url()?>/shop/admin/product/productList?isUpfile=1';
		</script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/product/category/edit.js"></script>
	</body>

</html>