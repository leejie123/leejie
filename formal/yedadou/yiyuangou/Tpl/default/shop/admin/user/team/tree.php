<!DOCTYPE html>
<html ng-app="app">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>团队树</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public/??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css<?=isset($local_css) && !empty($local_css) ? ','.$local_css : ''?>"/>
		<?=isset($remote_css) ? $remote_css : ''?>
		<script src="{__STATIC_URL__}/public/assets/js/ace-extra.js"></script>
	    <script src="{__STATIC_URL__}/public/assets/js/??jquery.js,bootstrap.js,jquery-ui.js,ace/elements.scroller.js,ace/ace.js,ace/ace.ajax-content.js,ace/ace.touch-drag.js,ace/ace.sidebar.js,ace/ace.sidebar-scroll-1.js"></script>
	    <script src="{__STATIC_URL__}/public/assets/js/??ace/ace.submenu-hover.js,ace/ace.widget-box.js,ace/ace.settings.js,ace/ace.settings-rtl.js,ace/ace.settings-skin.js,ace/ace.widget-on-reload.js,ace/ace.searchbox-autocomplete.js"></script>
	    <script src="{__STATIC_URL__}/public/js/??bootstrap-modal.js,bootstrap-switch.min.js,bootbox.min.js"></script>
	    <script src="{__STATIC_URL__}/public/admin/js/??common/common.js"></script>
	    <script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
	</head>

		<div class="container-fluid no-padding-top">
			<div class="row">
				<div class="alert alert-success info">团队人数：<?=$count?>人</div>
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="menu-tree">
						<ul id="menuTree" class="ztree"></ul>
					</div>
					<!--内容结束-->
				</div>
				<div class="space"></div>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>

		<!--对话框-->
		<div id="dialog-edit" class="hide">
		</div>

		<script src="{__STATIC_URL__}/public/js/zTree/js/jquery.ztree.core-3.5.js"></script>
		<script src="{__STATIC_URL__}/public/js/zTree/js/jquery.ztree.excheck-3.5.js"></script>
		<script src="{__STATIC_URL__}/public/js/zTree/js/jquery.ztree.exedit-3.5.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/user/tree.js"></script>
	</body>

</html>