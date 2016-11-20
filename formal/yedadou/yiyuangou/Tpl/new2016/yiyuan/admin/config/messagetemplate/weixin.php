<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>微信消息模板列表</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<!--表格-->
					<!--顶部工具条-->
					<div class="table-head-toolbar clearfix">
						<form method="post" action="" >
							<div class="pull-right">
								<input id="searchContent" name="searchContent" type="text" value="" placeholder="" />
								<button type="submit" name="searchButton" class="btn btn-info btn-sm">
									<span class="ace-icon fa fa-search"></span>搜索
								</button>
							</div>
						</form>
					</div>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
						<thead>
							<tr>
								<th class="center">编号</th>
								<th class="center">标题</th>
								<th class="center">一级行业</th>
								<th class="center">二级行业</th>
								<th class="center">使用人数(人)</th>
								<th class="center" width="90">操作</th>
							</tr>
						</thead>
						<tbody>
							<!--data-id表示该行数据的ID-->
							<tr id="row-1" data-id="1">
								<td class="center">TM00598</td>
								<td class="center">订单创建成功通知</td>
								<td class="center">消费品</td>
								<td class="center">消费品</td>
								<td class="center">3021</td>
								<td class="center">
									<a href="#" class="blue" data-id="select">选择</a>
								</td>
							</tr>
							<tr id="row-1" data-id="2">
								<td class="center">TM00598</td>
								<td class="center">订单创建成功通知</td>
								<td class="center">消费品</td>
								<td class="center">消费品</td>
								<td class="center">3021</td>
								<td class="center">
									<a href="#" class="blue" data-id="select">选择</a>
								</td>
							</tr>
							<tr id="row-1" data-id="3">
								<td class="center">TM00598</td>
								<td class="center">订单创建成功通知</td>
								<td class="center">消费品</td>
								<td class="center">消费品</td>
								<td class="center">3021</td>
								<td class="center">
									<a href="#" class="blue" data-id="select">选择</a>
								</td>
							</tr>
						</tbody>
					</table>
					<!--底部工具条-->
					<div class="table-foot-toolbar clearfix">
						<div class="pull-left">总计2条,当前显示第1到2条</div>
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
					<div class="space"></div>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/messageTemplate/weixin.js"></script>
	</body>

</html>