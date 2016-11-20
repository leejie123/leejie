<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>运费模板</title>
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
								<a data-toggle="tab" href="#tab1">运费模板</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
								</div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<!--
											<th class="center" width="30">
												<label class="pos-rel">
													<input id="check-all" type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</th>
											-->
											<th class="center" width="100">序号</th>
											<th class="center">名称</th>
											<th class="center">物流公司</th>
											<th class="center">计费方式</th>
											<th class="center">发货区域</th>
											<th class="center" width="100">设为默认</th>
											<th class="center" width="150">操作</th>
										</tr>
									</thead>
									<tbody>
										<?php if (empty(!$freights)): ?>
										<?php foreach ($freights as $key => $val): ?>
										<tr data-id="<?= $val['id']; ?>">
											<td class="center"><?= $val['id']; ?></td>
											<td class="center"><?= $val['name']; ?></td>
											<td class="center"><?= val($kuaidiList, $val['express'], ''); ?></td>
											<td class="center"><?php
												switch($val['type']) {
													case 1:
														echo '固定运费';
														break;
													case 2:
														echo '按件计费';
														break;
													default:
														break;
												}
											?></td>
											<td class="center"><?php
												$strs = [];
												$keys = [];
												$keys = explode(',', $val['province']);
												array_walk($keys, function ($val) use (&$list, &$strs) {
													array_push($strs, val($list, $val, ''));
												});
												echo join('、', $strs);
											?></td>
											<td class="center">
												<label class="pos-rel first-radio">
													<input data-href="/shop/SupplierAdmin/Settings/Freight/update?action=set&id=<?= $val['id']; ?>" name="isDefault" type="radio" class="ace" <?= ($val['is_default']==1) ? 'checked' : ''; ?> value="1">
													<span class="lbl"></span>
												</label>
											</td>
											<td class="center">
												<a href="/shop/SupplierAdmin/Settings/Freight/update?action=edit&id=<?= $val['id']; ?>" class="blue" data-id="edit">编辑</a>
												<a href="#" class="blue" data-id="delete">删除</a>
											</td>
										</tr>
										<?php endforeach; ?>
										<?php else: ?>
											<td colspan="7">暂无运费模板</td>
										<?php endif;?>

									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<a class="btn btn-info btn-sm" id="add" href="/shop/SupplierAdmin/Settings/Freight/add">
										<i class="ace-icon fa fa-plus"></i>新增运费模版
									</a>
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
	</body>
	<script type="text/javascript">
		$(function() {
			var tableId = "#dynamic-table"; //表格ID
			var deleteUrl = "/shop/SupplierAdmin/Settings/Freight/delete"; //删除的地址(说明:要修改为具体的PHP地址)
			
			General.initCheckbox();//初始化表格中的复选框事件监听
			General.extendDialog(); //扩展对话框
			
			//-----------------设为默认-----------------
			//点击"设为默认"单选按钮
			$("input[type=radio]").on("click", function(e) {
				var url=$(this).attr("data-href");
				var data = {};
				var tip = "操作中,请稍候";
				Common.ajaxPostWantResult(url, data, tip, window, window);
			});
			
			//-----------------删除-----------------
			//点击行内"删除"按钮
			$(tableId + ">tbody a[data-id=delete]:not([disabled])").on("click", function(e) {
				var tr = $(this).closest("tr");
				var id = tr.attr("data-id");
				console.log(tr);
				General.confirm("您确定要删除该运费模板吗?",null,startDelete,null,id);
			});
			//开始删除
			function startDelete(ids) {
				General.showMask();
				if(typeof(ids)=="object"){
					ids=ids.join(",");
				}
				var url = deleteUrl;
				var data = {
					"id": ids
				};
				var tip = "正在删除";
				Common.ajaxPostWantResult(url, data, tip, window, window);
			};
		});
	</script>

</html>