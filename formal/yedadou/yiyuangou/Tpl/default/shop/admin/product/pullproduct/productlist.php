<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>选择商品</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/store/list/product.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->

					<div class="clearfix">
						<form method="post" action="" enctype="multipart/form-data">
							<div class="pull-right clearfix">
								<div class="pull-left">
									<input id="productName" name="productName" type="text" class="pname" placeholder="商品名称">
									<input id="productCode" name="productCode" type="text" class="pcode" placeholder="商品编码">
										&nbsp;
								</div>
								<div class="input-group price-range pull-left">
									<input id="minPrice" name="minPrice" type="text" class="form-control" placeholder="价格开始">
									<span class="input-group-addon">--</span>
									<input id="maxPrice" name="maxPrice" type="text" class="form-control" placeholder="价格结束">
								</div>
								<div class="pull-left">
									<label>
										&nbsp;
										<select id="category" name="category">
											<option value="0" selected>商品分类</option>
											<option value="1">分类1</option>
											<option value="2">分类2</option>
											<option value="3">分类3</option>
											<option value="4">分类4</option>
										</select>
										&nbsp;
									</label>
									<label>
										<select id="category" name="category">
											<option value="0" selected>全部</option>
											<option value="1">已加入</option>
											<option value="2">未加入</option>
										</select>
										&nbsp;
									</label>
								</div>

								<button type="submit" class="btn btn-info btn-sm pull-left">
									<i class="ace-icon fa fa-search bigger-110"></i> 搜索
								</button>
							</div>
						</form>
					</div>
					<div class="space-4"></div>
					<!--表格-->
					<!--顶部工具条-->
					<div class="table-head-toolbar clearfix">
						<form method="post" action="" enctype="multipart/form-data">
							<button data-href="cancel.php" class="btn btn-danger btn-sm" id="cancel" type="button"><i class="ace-icon fa fa-undo"></i> 取消加入</button>
							<button data-href="add.php" class="btn btn-info btn-sm" id="add"  type="button"><i class="ace-icon fa fa-plus"></i> 加入</button>
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
								<th class="center">商品名称</th>
								<th class="center" width="100">成本价</th>
								<th class="center" width="150">添加时间</th>
								<th class="center" width="100">是否加入</th>
								<th class="center" width="100">操作</th>
							</tr>
						</thead>

						<tbody>
							<?php if(!$isEmpty):?>
							<?php foreach ($itemes as $arr):?>
							<?php $startIndex++;?>
							<!--data-id表示该行数据的ID-->
							<tr data-id="<?=$arr['id']?>">
								<td class="center">
									<label class="pos-rel">
										<input name="check-row" type="checkbox" class="ace" />
										<span class="lbl"></span>
									</label>
								</td>
								<td class="product-wrapper">
									<a href="#">
										<img src="{__STATIC_URL__}/public/admin/images/avartar.jpg" class="table-image pull-left">
									</a>
									<div class="product-info">
										<a href="#" class="blue">
											<span class="title"><?=$arr['title']?></span>
										</a>
										<span class="code">商家编码: <?=$arr['biz_id']?></span>
									</div>
								</td>
								<td class="center font-red" valign="middle">50.00</td>
								<td class="center"><?=$arr['add_time']?></td>
								<td class="center">已添加未添加</td>
								<td class="center">
									<a href="cancel.php" class="blue" data-id="cancel">加入</a>
									<a href="cancel.php" class="blue" data-id="cancel">取消加入</a>
								</td>
							</tr>
							<?php endforeach?>
							<?php endif?>
						</tbody>
					</table>
					<!--底部工具条-->
					<div class="table-foot-toolbar clearfix">
						<div class="pull-left">
							<button data-href="cancel.php" class="btn btn-danger btn-sm" id="cancel2" type="button"><i class="ace-icon fa fa-undo"></i> 取消加入</button>
							<button data-href="add.php" class="btn btn-info btn-sm" id="add2"  type="button"><i class="ace-icon fa fa-plus"></i> 加入</button>
						</div>
						<?php echo $pageBtnsHtml;?>
					</div>
					<!--表格结束-->
					<div class="space-4"></div>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>

		<!--备注-->
		<div id="tpl-remark" class="hide">
			<div class="row pt10 pr10">
				<div class="col-xs-12">
					<div class="form-group">
						<div class="label-wrapper">
							<label class="control-label" for="title">备注：</label>
						</div>
						<div class="control-wrapper">
							<input type="text" placeholder="" value="" class="form-control">
							<!--<span class="help-block">备注名称（4个汉字或8个字母以内）</span>-->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--对话框-->
		<div id="modalDialog" class="dialog-content hide">
			<div class="loading-bg">
				<div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div>
			</div>
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>
		</div>

		<!--对话框-->
		<div id="dialog-edit" class="hide">
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/store/list/product.js"></script>
	</body>

</html>