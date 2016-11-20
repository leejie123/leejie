<!DOCTYPE html>
<html ng-app="app">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>新增商品分类</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="http://static.yedadou.com/public/??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css"/>
		
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="http://static.yedadou.com/public??/admin/css/home/account/index.css" />
		<style type="text/css">
			.control-wrapper label {
				width: 50%;
			}
			.red {
				color: red;
			}
		</style>
		<div class="container-fluid">
			<div class="">
				<form class="form-horizontal" method="post" action="/shop/admin/category/category" >
					<div class="space-8"></div>
					<div class="form-group">
						<div class="label-wrapper">
							<label class="" for="confirmPassword"><strong>添加分类：</strong></label>
						</div>
						<div class="control-wrapper short">
							<div class="form-group">
								<div class="col-xs-12 col-sm-6 col-md-8">
									<span style="display:block" class="red">请选择您您要添加的分类</span>

									<?php if(!empty($cate_property)){?>
									<?php foreach ($cate_property as $value):?>
									<label class="pos-rel mr20">
										<input name="cate_name" type="checkbox" class="ace" value="<?=val($value,'cate_name')?>" >
										<span class="lbl"><?=val($value,'cate_name')?></span>
									</label>
									<?php endforeach;?>
									<?php }?>
									
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="label-wrapper">
							<label class="" for=""></label>
						</div>
						<div class="control-wrapper">
							<button class="btn btn-info btn-sm" id="submitBtn" name="submitBtn" type="submit" ><i class="ace-icon fa fa-save"></i> 保存</button>
							&nbsp;
							<button class="btn btn-danger btn-sm" id="return" name="return" type="button" data-action='close'><i class="ace-icon fa fa-undo"></i> 取消</button>
						</div>
					</div>

					<div class="space"></div>
				</form>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		<script src="http://static.yedadou.com/public/assets/js/ace-extra.js"></script>
	    <script src="http://static.yedadou.com/public/assets/js/??jquery.js,bootstrap.js,jquery-ui.js,ace/elements.scroller.js,ace/ace.js,ace/ace.ajax-content.js,ace/ace.touch-drag.js,ace/ace.sidebar.js,ace/ace.sidebar-scroll-1.js"></script>
	    <script src="http://static.yedadou.com/public/assets/js/??ace/ace.submenu-hover.js,ace/ace.widget-box.js,ace/ace.settings.js,ace/ace.settings-rtl.js,ace/ace.settings-skin.js,ace/ace.widget-on-reload.js,ace/ace.searchbox-autocomplete.js"></script>
	    <script src="http://static.yedadou.com/public/js/??bootstrap-modal.js,bootstrap-switch.min.js,bootbox.min.js"></script>
	    <script src="http://static.yedadou.com/public/admin/js/??common/common.js"></script>
	    <script src="http://static.yedadou.com/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="http://static.yedadou.com/public/js/kindeditor/lang/zh_CN.js"></script>
		<script src="http://static.yedadou.com/public/assets/js/ace/ace.js"></script>
	</body>

</html>