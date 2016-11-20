<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>虚拟用户</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1">虚拟用户</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="post" action="" enctype="multipart/form-data">
										<button class="btn btn-danger btn-sm" id="delete" type="button"><i class="ace-icon fa fa-trash-o"></i> 删除</button>
										<a class="btn btn-info btn-sm" id="add" href="#" data-href="/shop/admin/comment/virtualUser/add"><i class="ace-icon fa fa-plus"></i> 添加虚拟用户</a>
										<!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
										<input type="hidden" name="checkedIds" id="checkedIds" value="" />
									</form>
								</div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th class="center" width="30">
												<label class="pos-rel">
													<input id="check-all" type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</th>
											<th class="center" width="100">序号</th>
											<th class="center">用户名称</th>
											<th class="center" width="80">用户头像</th>
											<th class="center" width="80">操作</th>
										</tr>
									</thead>
									<tbody>
										<!--data-id表示该行数据的ID-->
										<tr data-id="1">
											<td class="center">
												<label class="pos-rel">
													<input name="check-row" type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</td>
											<td class="center">1</td>
											<td class="center">用户名称1</td>
											<td class="center">
													<img src="{__STATIC_URL__}/public/admin/images/avartar.jpg" class="table-image">
											</td>
											<td class="center">
												<a href="#" class="blue" data-id="delete">删除</a>
											</td>
										</tr>
									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<div class="pull-left page-info">总计2条,当前显示第1到2条</div>
									<div class="pull-right">
										<!--分页-->
										<ul class="pagination">
											<li class="disabled">
												<a href="#" title="首页"><i class="ace-icon fa fa-step-backward"></i></a>
											</li>
											<li>
												<a href="#" title="上一页"><i class="ace-icon fa fa-backward"></i></a>
											</li>
											<li class="active">
												<a href="#">1</a>
											</li>

											<li>
												<a href="#">2</a>
											</li>

											<li>
												<a href="#">3</a>
											</li>

											<li>
												<a href="#">4</a>
											</li>

											<li>
												<a href="#">5</a>
											</li>

											<li>
												<a href="#" title="下一页"><i class="ace-icon fa fa-forward"></i></a>
											</li>
											<li class="disabled">
												<a href="#" title="末页"><i class="ace-icon fa fa-step-forward"></i></a>
											</li>
										</ul>
										<!--页面跳转-->
										<form role="form" action="" method="post">
											<div class="input-group page-number pull-right">
												<input type="text" name="pageNumber" class="form-control" placeholder="页数">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-info btn-sm">转到</button>
												</span>
											</div>
										</form>
									</div>
								</div>
								<!--表格结束-->

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
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="auto"></iframe>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/comment/virtualUser/index.js"></script>
	</body>

</html>