<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>分销平台</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/admin/css/index.css" />
		<script src="{__STATIC_URL__}/public/assets/js/ace-extra.js"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try {
					ace.settings.check('navbar', 'fixed')
				} catch (e) {}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left pos-rel">
					<a href="http://www.yedadou.com/" class="navbar-brand" target="_blank">
						<img class="brand-logo" src="{__STATIC_URL__}/public/admin/images/logoicon.png" alt="" />
						<small class="">
							平台<?=$this->getApp()['name']?>管理后台
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<!--公众号对应的应用-->
						<li class="dropdown-hover purple">
							<a data-toggle="dropdown " class="dropdown-toggle" target="_blank" href="<?=$this->getApp()['url']?>">
								<i class="ace-icon fa fa-weixin"></i>
								<?=$this->getApp()['name']?>应用
								<span class="badge badge-important"><?=count($my_apps)?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-cubes"></i> <?=count($my_apps)?>个应用
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
									<?php foreach($my_apps as $myapp):?>
										<li>
											<a href="<?=$myapp['admin_url']?>" target="top">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														<?=$myapp['name']?>应用
													</span>
												</div>
											</a>
										</li>
									<?php endforeach?>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="<?=$this->getApp()['admin_url']?>">
										返回系统
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>


						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!--<img class="nav-user-photo" src="{__STATIC_URL__}/public/admin/images/avartar.jpg" alt="" />-->
								<span class="user-info">
									<small>管理员</small>
									<?=$user['user_name']?>
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<?php if($user['user_name']!='super_admin'):?>
								<li>
									<a id="id-a-edit-password" href="#">
										<i class="ace-icon fa fa-pencil"></i> 修改密码
									</a>
								</li>
								<li class="divider"></li>
								<?php endif?>

								<li>
									<a href="javascript:;" data-url="<?=$logout_url?>" id="id-a-exit">
										<i class="ace-icon fa fa-power-off"></i> 安全退出
									</a>
								</li>
							</ul>
						</li>

					</ul>
				</div>

			</div>
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try {
					ace.settings.check('main-container', 'fixed')
				} catch (e) {}
			</script>

			<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try {
						ace.settings.check('sidebar', 'fixed')
					} catch (e) {}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button id="id-btn-home" class="btn btn-success" data-rel="tooltip" data-placement="top" data-url="/yiyuan/admin/product/ProductList" title="" data-original-title="首页">
							<i class="ace-icon fa fa-home"></i>
						</button>
						<button id="id-btn-refresh" class="btn btn-info" data-rel="tooltip" data-placement="top" title="" data-original-title="刷新数据">
							<i class="ace-icon fa fa-refresh"></i>
						</button>

						<button id="id-btn-edit-password" class="btn btn-warning" data-rel="tooltip" data-url="/shop/admin/updatePassword" data-placement="top" title="" data-original-title="修改密码">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button id="id-btn-exit" class="btn btn-danger" data-rel="tooltip" data-url="/shop/admin/logOut" data-placement="top" title="" data-original-title="安全退出">
							<i class="ace-icon fa fa-power-off"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>
						<span class="btn btn-info"></span>
						<span class="btn btn-warning"></span>
						<span class="btn btn-danger"></span>
					</div>
				</div>

				<!--菜单-->
				<ul id="id-sidebar-menu" class="nav nav-list"></ul>
				<!--<ul id="id-sidebar-menu" class="nav nav-list" currentId="56" parentId="41"></ul>-->
				<!--<ul id="id-sidebar-menu" class="nav nav-list" currentId="88"></ul>-->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!--<script type="text/javascript">
					try {
						ace.settings.check('sidebar', 'collapsed')
					} catch (e) {}
				</script>-->
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<!--<script type="text/javascript">
							try {
								ace.settings.check('breadcrumbs', 'fixed')
							} catch (e) {}
						</script>-->

						<ul class="breadcrumb " id="id-breadcrumb">
							<li><i class="ace-icon fa fa-home home-icon"></i><a href="/yiyuan/admin/product/ProductList/get" target="top-container">首页</a></li>
						</ul>
						<span id="operation-tip" class="hide"><i class="fa fa-spinner fa-spin fa-lg"></i> <span>操作正在进行,请稍候</span><span></span></span>
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="请输入搜索内容" class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div>
					</div>

					<div class="page-content no-padding" id="iframe-container">
						<iframe id="top-container" name="top-container" src="/yiyuan/admin/product/ProductList/get" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>
					</div>
				</div>
			</div>
		</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		</div>
		<!--备注对话框内容-->
		<div id="tpl-remark" class="hide">
			<div class="row padding-12">
				<div class="col-xs-12 center ">
					<div class="space-4"></div>
					<!--<p class="margin-15">-->
					<span class="red bigger-110">*</span>备注:
					<input type="text" value="" />
					<!--</p>-->
				</div>
			</div>
		</div>
		<!--添加分组对话框内容-->
		<div id="tpl-add-group" class="hide">
			<div class="row padding-12">
				<div class="col-xs-12 center ">
					<div class="space-4"></div>
					<!--<p class="margin-15">-->
					<span class="red bigger-110">*</span>分组名称:
					<input type="text" value="" />
					<!--</p>-->
				</div>
			</div>
		</div>
		<!--对话框-->
		<div id="dialog-edit" class="hide">
		</div>
		<!-- /.main-container -->

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/elements.scroller.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.ajax-content.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.touch-drag.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.sidebar.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.submenu-hover.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.widget-box.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.settings.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.settings-rtl.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.settings-skin.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.searchbox-autocomplete.js"></script>
		
		<script>
		var sourceMenuUrl = '/yiyuan/admin/getMenu';
		</script>
		<!--<script>var sourceMenuUrl = "../action/ListMenu.aspx?id=40";</script>-->
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/globalMenu.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/officialAccounts.js"></script>
	</body>

</html>