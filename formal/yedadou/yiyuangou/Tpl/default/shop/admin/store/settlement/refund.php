<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>退款记录</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/store/settlement/index.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="alert alert-warning">
						<strong>累计退款：</strong> 150 元 
					</div>
					<!--表格-->
					<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
						<thead>
							<tr>
								<th class="center">序号</th>
								<th class="center">单号</th>
								<th class="center">退款金额（元）</th>
								<th class="center">退款备注</th>
								<th class="center">状态</th>
								<th class="center">退款时间</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="center">1</td>
								<td class="center">201508088283748483772</td>
								<td class="center">50</td>
								<td class="center">七天无理由退款</td>
								<td class="center"><span class="text-success">成功</span></td>
								<td class="center">2015-07-15  12:10:56</td>
							</tr>
							<tr>
								<td class="center">2</td>
								<td class="center">201508088283748483772</td>
								<td class="center">50</td>
								<td class="center">七天无理由退款</td>
								<td class="center"><span class="text-warning">失败</span></td>
								<td class="center">2015-07-15  12:10:56</td>
							</tr>
							<tr>
								<td class="center">3</td>
								<td class="center">201508088283748483772</td>
								<td class="center">50</td>
								<td class="center">七天无理由退款</td>
								<td class="center"><span class="text-success">成功</span></td>
								<td class="center">2015-07-15  12:10:56</td>
							</tr>
							<tr>
								<td class="center">4</td>
								<td class="center">201508088283748483772</td>
								<td class="center">50</td>
								<td class="center">七天无理由退款</td>
								<td class="center"><span class="text-success">成功</span></td>
								<td class="center">2015-07-15  12:10:56</td>
							</tr>
							<tr>
								<td class="center">5</td>
								<td class="center">201508088283748483772</td>
								<td class="center">50</td>
								<td class="center">七天无理由退款</td>
								<td class="center"><span class="text-success">成功</span></td>
								<td class="center">2015-07-15  12:10:56</td>
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
									<input type="text" name="pageNumber" class="form-control" placeholder="页数" />
									<span class="input-group-btn">
										<button type="submit" class="btn btn-info btn-sm">转到</button>
									</span>
								</div>
							</form>
						</div>
					</div>
					<!--表格结束-->
					<div class="space-6"></div>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
	</body>

</html>