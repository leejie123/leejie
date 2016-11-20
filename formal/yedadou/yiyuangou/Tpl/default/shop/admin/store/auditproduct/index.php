<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>商品审核</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/store/auditProduct/index.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1">商品审核</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<div class="alert alert-warning">
									<strong>温馨提示：</strong> 这里的商品是加盟店添加的其他商品，如果你允许他们在平台销售，你将要为他们提供代收款服务。同时，你也可以在多门店设置里设置代收款抽成
								</div>
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="post" action="" enctype="multipart/form-data">
										<div class="pull-right clearfix">
											<div class="pull-left">
												<input id="storeCode" name="storeCode" type="text" class="" placeholder="门店编号">
												<input id="storeName" name="storeName" type="text" class="" placeholder="门店名称">
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
											<th class="center">商品名称</th>
											<th class="center" width="100">价格</th>
											<th class="center" width="100">所属门店</th>
											<th class="center" width="100">门店编号</th>
											<th class="center" width="150">发布时间</th>
											<th class="center" width="150">操作</th>
										</tr>
									</thead>

									<tbody>
										<?php if(!$isEmpty):?>
										<?php foreach ($itemes as $arr):?>
										<?php $startIndex++;?>
										<!--data-id表示该行数据的ID-->
										<tr id="row-<?=$arr['id']?>" data-id="<?=$arr['id']?>">
											<td class="product-wrapper">
												<a href="#">
													<img src="<?=$arr['pic_url']?>" class="table-image pull-left">
												</a>
												<div class="product-info">
													<a href="#" class="blue">
														<span class="title"><?=$arr['title']?></span>
													</a>
													<span class="code">商家编码: <?=$arr['biz_id']?></span>
												</div>
											</td>
											<td class="center font-red" valign="middle">50.00</td>
											<td class="center">门店名称</td>
											<td class="center"><?=$arr['store_id']?></td>
											<td class="center"><?=date('Y/m/d H:i',$arr['add_time'])?></td>
											<td class="center">
												<a href="/shop/admin/store/AuditProduct/update?id=<?=$arr['id']?>&status=1" class="blue" data-id="pass">审核通过</a>
												<a href="/shop/admin/store/AuditProduct/update?id=<?=$arr['id']?>&status=-1" class="blue" data-id="nopass">不通过</a>
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

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/store/auditProduct/index.js"></script>
	</body>

</html>