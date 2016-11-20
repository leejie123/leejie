<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>门店提现</title>
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
								<a data-toggle="tab" href="#tab1">门店提现</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="get" action="" enctype="multipart/form-data">
										<div class="pull-right clearfix">
											<div class="pull-left">
												<label>
													<select id="withdrawType" name="withdrawType">
														<option value="0">待提现</option>
														<option value="1" selected>提现已通过</option>
														<option value="-1">提现不通过</option>
													</select>
													&nbsp;
												</label>
											</div>
											<div class="pull-left">
												<input id="searchContent" name="searchContent" type="text" class="" placeholder="门店编号/名称">
											</div>
											<button type="submit" class="btn btn-info btn-sm pull-left">
												<i class="ace-icon fa fa-search bigger-110"></i> 搜索
											</button>
										</div>
									</form>
								</div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th class="center" width="100">序号</th>
											<th class="center" width="100">门店编号</th>
											<th class="center">门店名称</th>
											<th class="center" width="100">提现金额</th>
											<th class="center">收款账户</th>
											<th class="center" width="150">账号类型</th>
											<th class="center" width="150">申请时间</th>
											<th class="center" width="100">操作</th>
										</tr>
									</thead>

									<tbody>
										<?php if(!$isEmpty):?>
										<?php foreach ($itemes as $arr):?>
										<?php $startIndex++;?>
										<tr>
											<td class="center"><?=$startIndex?></td>
											<td class="center"><?=$arr['store_no']?></td>
											<td class="center"><?=$arr['name']?></td>
											<td class="center"><?=$arr['money']?></td>
											<td class="center"><?=$arr['account']?></td>
											<td class="center"><?=$arr['account_type']?></td>
											<td class="center"><?php 
											$date=$arr['add_time'];
											echo date("Y-m-d h:i:s",$date);
											?></td>
											<td class="center">
												<a href="/shop/admin/store/Withdraw/update?id=<?=$arr['id']?>" class="blue" data-id="operation">操作</a>&nbsp;&nbsp;
											</td>
										</tr>
										<?php endforeach?>
										<?php endif?>
									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<?=$pageBtnsHtml?>
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
		<script src="{__STATIC_URL__}/public/admin/js/shop/store/withdraw/index.js"></script>
	</body>

</html>