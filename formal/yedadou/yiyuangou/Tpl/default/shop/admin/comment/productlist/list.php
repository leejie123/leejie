<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>商品列表</title>
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
							<li>
								<a href="/shop/admin/manage">商品评论</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-th"></i> 商品列表</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="post" action="" enctype="multipart/form-data">
										<div class="pull-right clearfix">
											<div class="pull-left">
												<input id="productName" name="productName" type="text" class="" placeholder="商品名称">
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
											<th class="center" width="100">商品ID</th>
											<th class="center">商品名称</th>
											<th class="center">商品图片</th>
											<th class="center" width="100">操作</th>
										</tr>
									</thead>
									<tbody>
										<!--data-id表示该行数据的ID-->
										<?php if(!empty($products)){?>
										<?php foreach ($products as $key=>$value):?>
										<tr data-id="<?php echo empty($value['goods_id'])?0:$value['goods_id'] ?>">
											<td class="center"><?php echo empty($value['goods_id'])?0:$value['goods_id'] ?></td>
											<td class="center"><?php echo empty($value['title'])?'':$value['title'] ?></td>
											<td class="center">
												<img src="<?php echo empty($value['pic_url'])?'':$value['pic_url'] ?>" class="table-image">
											</td>
											<td class="center">
												<a href="javascript:void(0)" data-href="/shop/admin/comment/manage/add" class="blue" data-id="add">添加评论</a>
											</td>
										</tr>
										<?php endforeach;?>
										<?php }?>
										
									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
								<?php echo isset($page_html)?$page_html:''; ?>
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
		<script src="{__STATIC_URL__}/public/admin/js/shop/comment/manage/list.js"></script>
	</body>

</html>