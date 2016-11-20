<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>中奖订单</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public/emoji/emoji.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/product/list/index.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1">中奖订单</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">

								<div class="table-head-toolbar clearfix">
									<form method="get" action="/yiyuan/admin/order/orderList/get?act=hit">
										<input  name="act" type="hidden" value="hit" />
										<div class="pull-right clearfix">
											<div class="pull-left">
												<input id="orderId" name="orderId" type="text" class="pid" placeholder="订单号" value="<?=isset($search['order_sn'])?$search['order_sn']:'';?>">
												<input id="userCount" name="userCount" type="text" class="pname" placeholder="用户ID/昵称" value="<?=isset($search['userCount'])?$search['userCount']:'';?>">
												<input id="goodsCount" name="goodsCount" type="text" class="pcode" placeholder="商品ID/标题" value="">
											</div>
											<div class="pull-left">
                                                <div class="pull-left span-label" id="returnShowLabel">&nbsp;订单状态:</div>

                                                <label>
													&nbsp;
													<select id="send" name="send">
														<option value="" selected>全部</option>
														<option value="1" <?=isset($search['send']) && $search['send']== 1?'selected':'';?>>待发货</option>
														<option value="2" <?=isset($search['send']) && $search['send']== 2?'selected':'';?>>已发货</option>
													</select>
													&nbsp;
												</label>
											</div>
											<div class="pull-left span-label" id="returnShowLabel">中奖时间:</div>
										    <div class="input-group input-daterange pull-left">
												<input id="startTime" name="startTime" type="text" class="form-control" value="<?=val($search,'startTime','')?>" />
												<span class="input-group-addon">
												<i class="fa fa-exchange"></i>
											</span>
												<input id="endTime" name="endTime" type="text" class="form-control" value="<?=val($search,'endTime','')?>" />
											</div>
											<button type="submit" class="btn btn-info btn-sm pull-left">
												<i class="ace-icon fa fa-search bigger-110"></i> 搜索
											</button>
										</div>
									</form>
										<a href="#" id="purview" class="btn btn-info btn-sm" data-url="/yiyuan/admin/order/exportHitOrder/get?isExport=1&hit=1&orderId=<?=val($search,'order_sn','')?>&userCount=<?=val($search,'userCount','')?>&goodsCount=<?=val($search,'goodsCount','')?>&send=<?=val($search,'send','')?>&startTime=<?=val($search,'startTime','')?>&endTime=<?=val($search,'endTime','')?>">导出</a>
										<a id="import" class="btn btn-info btn-sm" href="javascript:void(0)">导入</a>
								</div>
								<div class="space-4"></div>
								<!--表格-->
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th class="center">订单号</th>
											<th class="center">商品</th>
											<th class="center">商品ID</th>
											<th class="center">期数</th>
											<th class="center">购买用户</th>
											<th class="center">购买总价</th>
											<th class="center">支付金额</th>
											<th class="center">积分抵扣</th>
											<th class="center">购买时间</th>
											<th class="center">中奖时间</th>
											<th class="center">订单状态</th>
											<th class="center" width="100">管理</th>
										</tr>
									</thead>

									<tbody>
										<!--data-id表示该行数据的ID-->
										<?php if(!empty($data)){?>
										<?php foreach ($data as $key=>$value):?>
												<tr id="row-<?php echo $key; ?>" data-id="<?php echo isset($value['id'])?$value['id']:''; ?>">
											<td class="center">
												<?=$value['hit_order_sn']?>
											</td>
											<td class="product-wrapper">
													<a href="#" class="blue">
														<span class="title"><?php echo isset($value['goods_title'])?$value['goods_title']:''; ?></span>
													</a>
											</td>
											<td class="center" valign="middle"><?=$value['goods_id']?></td>
											<td class="center" valign="middle"><?=$value['term']?>/<?php echo isset($value['term_num'])?$value['term_num']:''; ?></td>
											<td class="center" valign="middle"><?=$value['hit_nick']?>&nbsp;(<?=$value['hit_uid']?>)</td>
											<td class="center" valign="middle">￥<?=val($value,'order_amount',0)?></td>
											<td class="center" valign="middle">￥<?=val($value,'amount_paid',0)?></td>
											<td class="center" valign="middle"><?=val($value,'use_point',0)?></td>
											<td class="center"><?=date('Y-m-d H:i:s',$value['add_time']) ?></td>
											<td class="center"><?=date('Y-m-d H:i:s',$value['hit_time']) ?></td>
											<td class="center"><?=val($value,'status_name','已支付 待发货')?></td>
											<td class="center">
												<a href="/yiyuan/admin/order/OrderList/get?act=detail&id=<?php echo $value['hit_uid'];?>&term_id=<?php echo $value['id'];?>&order_sn=<?=$value['hit_order_sn'];?>" class="blue" data-id="edit">查看详细</a>
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
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script type="text/javascript">
			window.kindeditorUpUrl='<?=site_url()?>/shop/admin/product/productList?isUpfile=1';
		</script>
		<script src="{__STATIC_URL__}/public/yiyuan/admin/order/list.js"></script>
	</body>

</html>
