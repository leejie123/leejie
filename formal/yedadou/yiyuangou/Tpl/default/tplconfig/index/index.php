<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>编辑模板</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/js/kindeditor/themes/default/default.css,/assets/css/ace.css,/css/public.css" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public/js/colorpicker/prettify.min.css" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public/js/colorpicker/bootstrap.colorpickersliders.css" />
		<script>
			var THEME = '<?=$theme?>';
		</script>
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public/admin/css/shop/config/shopTemplateConfig/tpl_config.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1">编辑模板</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<div class="pages">
									<ul>
									<?php foreach ($pages as $key => $page): ?>
										<li>
											<a href="<?=$page['url_path']?>?test_uid=<?=urlencode($test_uid)?>&theme=<?=$theme?>" target="page_view_frame"<?=$key==0 ? ' class="active"' : ''?>><?=$page['name']?> >></a>
										</li>
									<?php endforeach ?>
									</ul>
								</div>
								<div class="contail">
									<div class="page_view">
										<iframe src="" name="page_view_frame" frameborder="0" id="page_view_frame" class="page_view_frame"></iframe>
									</div>
								</div>
								<div class="config tabbable hide" id="config-contail">
									<ul class="nav nav-tabs padding-12 tab-color-blue">
										<li class="active">
											<a data-toggle="tab" href="#tab1">模块(挂件)编辑 - <span class="mod-name"></span></a>
										</li>
									</ul>
									<div class="tab-content no-border padding-0 pt10">
										<div id="tab1" class="tab-pane active">
											<div class="config-form"><form action="" class="form-horizontal"></form></div>
											<div class="config-btns text-center">
												<input type="button" value="提交" id="submit" class="btn btn-info">
												<input type="button" value="关闭" id="close" class="btn btn-notice">
											</div>
										</div>
									</div>
									
								</div>
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
		<!--对话框-->
		<div id="modalDialog" class="dialog-content hide">
			<div class="loading-bg">
				<div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div>
			</div>
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>
		</div>

		<div style="background-color:rgba(0,0,0,0.4);position:absolute;padding:0;display:none;top:0;left:0" id="mod_mask">
			<h6 style="background-color:rgba(0,0,0,0.7);color:#ffffff;text-align:right;position:absolute;top:-25px;height:25px;width:100%;line-height:25px;margin:0;">
				<span class="fa fa-plus"></span><span class="fa fa-arrow-up"></span><span class="fa fa-arrow-down"></span><span class="fa fa-trash"></span><span class="fa fa-cog"></span>
			</h6>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
		<!--选色组件-->
		<script src="{__STATIC_URL__}/public/js/colorpicker/tinycolor.min.js"></script>
		<script src="{__STATIC_URL__}/public/js/colorpicker/bootstrap.colorpickersliders.js"></script>
		<!--自动渲染web组件-->
		<script src="{__STATIC_URL__}/public/widget/js/autoRenderWebCompent.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/shopTemplateConfig/tpl_config.js"></script>
	</body>

</html>