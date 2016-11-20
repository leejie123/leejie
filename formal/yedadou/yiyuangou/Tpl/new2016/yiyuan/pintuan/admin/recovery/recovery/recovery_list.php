<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>商品回收站列表</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/datepicker.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
		<style type="text/css">
			.color-orange {
				color:rgb(225, 100, 119);
			}
			.line-h-15	{
				line-height: 15px;
			}
		</style>
	</head>

	<body class="no-skin">

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="javascript:void(0);">商品回收站列表</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="get" action="" >
									<input type="hidden" name='serach' value='1'>
										<div class="pull-right clearfix">
											<div class="pull-left">
												<label>
													<input type="text"  name="id" placeholder="商品ID">
													<input type="text" name="title" placeholder="商品名称/关键字">
												</label>
											</div>
											<div class='pull-left' style="margin: 0 10px;">
												<div class="pull-left span-label">加入时间:</div>
												<div class="input-group input-daterange pull-left">
													<input id="startTime" name="start_time" type="text" class="form-control">
													<span class="input-group-addon">
														<i class="fa fa-exchange"></i>
													</span>
													<input id="endTime" name="end_time" type="text" class="form-control">
												</div>
											</div>
											<div class="input-group  pull-right" style="width:50px;">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-info btn-sm">
													<i class="ace-icon fa fa-search bigger-110"></i> 
														搜索
													</button>
												</span>
											</div>
										</div>
									</form>
									
								</div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th class="center" width="600">商品名称</th>
											<th class="center" width="250">商品ID</th>
											<th class="center" width="250">排序</th>
											<th class="center" width="250">拼团价</th>
											<th class="center" width="300">已开团/总库存</th>
											<th class="center" width="300">操作</th>
										</tr>
									</thead>

									<tbody>
										<!--data-id表示该行数据的ID-->		
									    <?php if(!empty($goods)){?>
									    <?php foreach ($goods as $item):?>
									    <tr>
											<td class="" valign="middle">
												<img src="<?=val($itme,'pic_url')?>" class="table-image pull-left">
												<div style="margin-left:70px;">
													<a href="#"><?=val($item,'title')?></a>	
												</div>
											</td>
											<td class="center">
												<?=val($item,'id')?>
											</td>
											<td class="center color-orange"><?=val($item,'sort_order')?></td>
											<td class="center"><?=val($item,'price')?></td>
											<td class="center"><?=val($item,'stock_static')-val($item,'stock')?>/<?=val($item,'stock_static')?></td>
											<td class="middle">
												<a href="" data-url="/yiyuan/pintuan/admin/product/updateProduct?id=<?=val($item,'id',0)?>" data-click="reopen" class="line-h-15" >重新开团</a>
												<a href="/yiyuan/pintuan/admin/recovery/recovery/delete?id=<?=val($item,'id',0)?>" data-click="del">删除</a>
												<a href="/yiyuan/pintuan/admin/record/recordList?id=<?=val($item,'id',0)?>">拼团记录</a>
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

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script type="text/javascript">
			$(function () {
				$('.input-daterange').datepicker({autoclose:true});
				General.extendDialog(); //扩展对话框
				General.initCheckbox();

				$('a[data-click="reopen"]').on('click', function (e) {
					General.stopEvent(e);
					var url = $(this).data('url');
					General.confirm('您确定要重新开团吗？', '<i class="fa fa-info-circle"></i> 提醒', function() {
						window.location.href = url;
					}, function (){})
				})

				$('a[data-click="del"]').on('click', function () {
					return confirm('您确定删除吗？');
				})

			})
		</script>
	</body>
	</html>