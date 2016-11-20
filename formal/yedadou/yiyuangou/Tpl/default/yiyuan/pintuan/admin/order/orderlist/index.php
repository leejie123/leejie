

<!DOCTYPE html>
<!-- saved from url=(0041)http://vendor.yedadou.com/UserCenter/Fans -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>订单列表</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css">
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
								<a data-toggle="tab" href="http://vendor.yedadou.com/UserCenter/Fans#tab1">订单列表</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="get" action="" >
										<div class="pull-left">

											<a href="#" id="btnExport" class="btn btn-info btn-sm" data-url="/yiyuan/pintuan/admin/order/exportOrder?isExport=1&order_sn=<?=val($search,'order_sn','')?>&userCount=<?=val($search,'userCount','')?>&good=<?=val($search,'good','')?>&startTime=<?=val($search,'startTime','')?>&endTime=<?=val($search,'endTime','')?>&status=<?=val($search,'status','')?>&tid=<?=val($search,'tid','')?>&hit=<?=val($search,'hit','')?>">导出</a><!-- &tuan_status=<?=val($search,'tuan_status','')?> -->
											<!-- <a href="#" id="btnImport" data-url="/pintuan/admin/order/importOrders" class="btn btn-info btn-sm"> 导入</a> -->
											<a id="import" class="btn btn-info btn-sm" href="javascript:void(0)">导入</a>
										</div>								
										<div class="pull-right clearfix">
											<div class="pull-left">
												<label>
													<input type="text" placeholder="订单号" name="order_sn" value="<?=val($search, 'order_sn', '');?>">
													<input type="text" placeholder="用户ID/昵称" name="userCount" value="<?=val($search, 'userCount', '');?>">
													<input type="text" placeholder="商品ID/标题" name="good" value="<?=val($search, 'good', '');?>">
												</label>
											</div>
											<div class='pull-left' style="margin: 0 10px;">
												<div class="pull-left span-label">订单状态</div>
												<div class="pull-left">
													<label style="width: 150px;">
														<select type="text" class="form-control" placeholder="关键字" name="status">
															<option value="all" <?=isset($search['status']) && $search['status']== 'all'?'selected':'';?>>全部</option>
															<option value="2" <?=isset($search['status']) && $search['status']== 2?'selected':'';?>>待发货</option>
															<option value="3" <?=isset($search['status']) && $search['status']== 3?'selected':'';?>>已发货</option>
														</select>
													</label>
												</div>
											</div>
											<div class='pull-left'>
												<div class="pull-left span-label">是否中奖</div>
												<div class="pull-left">
													<label>
														<select type="text" class="form-control" placeholder="关键字" name="hit">
															<option value="all" <?=isset($search['hit']) && $search['hit']== 'all'?'selected':'';?>>全部</option>
															<option value="1" <?=isset($search['hit']) && $search['hit']== 1?'selected':'';?>>是</option>
															<option value="0" <?=isset($search['hit']) && $search['hit']== "0"?'selected':'';?>>否</option>
														</select>
													</label>
												</div>
											</div>
										<!-- 	<div class='pull-left' style="margin: 0 10px;">
												<div class="pull-left span-label">拼团状态</div>
												<div class="pull-left">
													<label style="width: 150px;">
														<select type="text" class="form-control" placeholder="关键字" name="tuan_status">
															<option value="all">全部</option>
															<option value="-1">失败</option>
															<option value="1">进行中</option>
															<option value="2">拼团成功</option>
														</select>
													</label>
												</div>
											</div> -->
											<div class='pull-left' style="margin: 0 10px;">
												<div class="pull-left span-label">拼团ID</div>
												<div class="pull-left">
													<label style="width: 150px;">
														<input type="text" name='tid' value="<?=val($search, 'tid', '');?>">
													</label>
												</div>
											</div>
											<div class='pull-left' style="margin: 0 10px;">
												<div class="pull-left span-label">时间</div>
												<div class="input-group input-daterange pull-left">
													<input id="startTime" name="startTime" type="text" class="form-control" value="<?=val($search, 'startTime', '');?>">
													<span class="input-group-addon">
														<i class="fa fa-exchange"></i>
													</span>
													<input id="endTime" name="endTime" type="text" class="form-control" value="<?=val($search, 'endTime', '');?>">
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
										<!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
										<input type="hidden" name="checkedIds" id="checkedIds" value="">

									</form>
									
								</div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
										<!-- 	<th class="center" width="140">
												<label class="pos-rel">
													<input id="check-all" type="checkbox" class="ace">
													<span class="lbl"></span>
												</label>
											</th> -->
											<th class="center" width="300">订单号</th>
											<th class="center" width="600">商品</th>
											<th class="center" width="250">商品ID</th>
											<th class="center" width="250">拼团ID</th>
											<th class="center" width="200">购买用户</th>
											<th class="center" width="250">购买总价</th>
											<th class="center" width="250">购买时间</th>
											<th class="center" width="250">拼团状态</th>
											<th class="center" width="250">是否中奖</th>
											<th class="center" width="300">订单状态</th>
											<th class="center" width="300">管理</th>
										</tr>
									</thead>

									<tbody>
									<?php if(!empty($order)):?>
										<!--data-id表示该行数据的ID-->		
									    	<?php foreach ($order as $key => $value): ?>									
										<tr id="row-<?=val($value, 'id', 0);?>" data-id="<?=val($value, 'id', 0);?>" data-uid="<?=val($value, 'uid', 0);?>" data-authid="<?=val($value, 'id', 0);?>">
									<!-- 		<td class="center">
												<label class="pos-rel">
													<input name="check-row" type="checkbox" class="ace">
													<span class="lbl"></span>
												</label>
											</td> -->	
											<td class="center"><?=val($value, 'order_sn', 0);?></td>
											<td class="" valign="middle">
												<a href="#"><?=val($value, 'goods_title', '');?></a>	
											</td>
											<td class="center"><?=val($value, 'goods_id', 0);?></td>
											<td class="center"><?=val($value, 'tid', 0);?></td>
											<td class="center"><?=val($value, 'nick', '');?>&nbsp;(<?=val($value, 'uid', 0);?>)</td>
											<td class="center">￥<?=val($value, 'price', 0);?>元</td>
											<td class="center color-orange"><?=val($value, 'join_time', 0) > 0? date("Y-m-d H:i:s", val($value, 'join_time', time())) : '--';?></td>
											<td class="center">
												<?php

												switch (val($value, 'status', 0)) {
													case -1:
														echo '失败';
														break;
													case 0:
														echo '未开始';
														break;
													case 1:
														echo '进行中';
														break;
													case 2:
														echo '拼团成功';
														break;
												}
												?>
											</td>
											<td class="center">
											<?php if(val($value, 'hit', 0)):?>
											<span class="color-orange">中奖</span>
											<?php else:?>
												否
											<?php endif;?>
											</td>
											<td class="center">
											<?php
												switch (val($value, 'order_status', 0)) {
													case 1:
														echo '未支付';
														break;
													case 2:
														$order_status_name = '已支付';
														if(val($value, 'hit', 0) == 1) {
															$order_status_name = '已支付  待发货';
														}
														echo $order_status_name;
														break;
													case 3:
														echo '已发货';
														break;
													case 4:
														echo '已退款';
														break;
													default:
														echo '--';
														break;
												}
											?>
											</td>
											<td class="center"><!--<?=val($value, 'id', 0)?>-->
												<a href="/yiyuan/pintuan/admin/order/detail?tid=<?php echo val($value, 'tid', 0); ?>&orderSn=<?php echo val($value, 'order_sn', 0); ?>" class="dispass line-h-15">订单详情</a>
											</td>
										</tr>
										<?php endforeach;?>
									<?php endif;?>
									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix"><?=$page_html;?></div>
								<!--表格结束-->

							</div>
						</div>
					</div>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<a href="http://vendor.yedadou.com/UserCenter/Fans#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
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
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script type="text/javascript">
			$(function () {
				General.extendDialog(); //扩展对话框
				General.initCheckbox();
				//
				$('.input-daterange').datepicker({autoclose:true});
				$("#btnImport").click(function(){
						var title =  '导入订单';
						var url=$(this).data('url');
						showImportDialog(title,url);
					});
				$("#import").click(function(){
		
					var title =  '导入订单';
					var url = '/yiyuan/pintuan/admin/order/importOrders'
					showImportDialog(title,url);
				});
					/**
					 * 显示"导入"窗口
					 * @param {String} title 弹出窗口的标题
					 */
					function showImportDialog(title,url){
						General.showDialogWidthHeight(title,url,500,300);
					}
				//导出
					$('#btnExport').on('click', function(e) {
						General.stopEvent(e);
						var accountLimitUrl=$(this).data('url');
						General.showDialogWidthHeight('导出订单', accountLimitUrl, 500, 250);
					});
			})
		</script>
	</body>
	</html>