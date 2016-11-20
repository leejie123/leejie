<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>订单列表</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/datepicker.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/admin/css/order/shop/list.css"
		/>
	</head>
	<body class="no-skin">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<!--表格-->
					<div>
						<!--顶部工具条-->
						<div class="table-head-toolbar clearfix">
							<form id="form1" name="form1" method="get" action="" enctype="multipart/form-data">
								<div class="pull-left">
									<a target="_blank" id="export" name="export" class="btn btn-info btn-sm" href="<?=$currentUrl?>&isExport=1">导出</a>
									<a target="_blank" id="exportAll" name="exportAll" class="btn btn-info btn-sm" href="<?=$currentUrl?>&isExporAll=1">导出所有</a>
								</div>
								<div class="pull-right">
									<!--除了已退款状态下显示-->
									<div class="pull-left span-label" id="returnShowLabel">下单日期:</div>
									<!--已退款状态下显示-->
									<div class="pull-left span-label hide" id="normalShowLabel">申请日期:</div>
									<div class="input-group input-daterange pull-left">
										<input id="startTime" name="startTime" type="text" class="form-control" />
										<span class="input-group-addon">
										<i class="fa fa-exchange"></i>
									</span>
										<input id="endTime" name="endTime" type="text" class="form-control" />
									</div>
									<input id="order_sn" name="order_sn" type="text" value="" placeholder="订单号" />
									<input id="consignee" name="consignee" type="text" value="" placeholder="收货人" />
									<button type="submit" class="btn btn-info btn-sm">
										<span class="ace-icon fa fa-search"></span>搜索
									</button>
								</div>
								<!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
								<input type="hidden" name="t" id="t" value="<?=$getT?>" />
								<!--input type="hidden" name="issearch" id="issearch" value="1" /-->
							</form>
						</div>
						<!--订单列表-->
						<div>
							<!--单个订单开始-->
							<?php if(!$isEmpty):?>
							<?php foreach ($orders as $arr):?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="order-number">订单编号：<?=$arr['order_sn']?></span>
									<span class="order-time">订单时间：<?=date("Y-m-d H:i:s",$arr['create_time'])?></span>
									<div class="pull-right">
									<?php
									$status=intval($arr['status']);?>
									<?php if($action == "forwarding" && $status == 2):?>
									<a data-parame="order_id=<?=$arr['id']?>&order_sn=<?=$arr['order_sn']?>&optype=4&t=<?=$getT?>" class="btn btn-info btn-xs" data-id="send">发货</a>
									<?php endif;?>
														</div>
								</div>
								<table class="table table-bordered table-vertical-middle">
									<tbody>
										<tr>
											<td class="column1">
												<?php foreach ($arr['items'] as $item):?>
												<table>
													<tbody>
														<tr class="column2">
															<td class="product-image">
																<div class="middle-outer ">
																	<div class="middle-inner">
																		<a href="#">
																			<img src="<?=$item['pic_url']?>_80x80.jpg">
																		</a>
																	</div>
																</div>
															</td>
															<td class="text-left product-detail">
																<div class="middle-outer ">
																	<div class="middle-inner">
																		<div class="product-name">
																			商品名称:<?=$item['title']?>
																		</div>
																		<div class="model">
																			型号规格:<?=$item['spec']?>
																		</div>
																		<div class="serial-number">
																			商品编码:<?=$item['goods_id']?>
																		</div>
																	</div>
																</div>
															</td>
															<td class="quantity">
																<div class="middle-outer">
																	<div class="middle-inner">
																		数量:<?=$item['quantity']?>
																	</div>
																</div>
															</td>
															<td class="money">
																<div class="middle-outer">
																	<div class="middle-inner">
																		<?=$item['price']?>元
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
												<?php endforeach?>
											</td>
											<td class="column2">
												<div class="middle-outer">
													<div class="middle-inner">
														<div class="receive-member">
															收货人：<?=val($arr['info'],'consignee')?>
														</div>
														<div class="phone-number">
															<?=$arr['info']['phone']?><?=$arr['info']['tel']?>
														</div>
														<div class="address">
															<?=$arr['info']['province']?><?=$arr['info']['city']?>
														</div>
													</div>
												</div>
											</td>
											<td class="column3">
												<div class="middle-outer">
													<div class="middle-inner">
														<div class="state">
															<?php
															$refund_status=intval($arr['refund_status']);
															//退款状态 -1退款被拒绝 0正常 1已申请退款 2厂商或代理已同意退款等待买家退货 3买家已发货 4卖家收到退货同意退款
															$tip='';
															switch ($refund_status) {
																case -1:
																	$tip='退款被拒绝';
																	break;
																case 0:
																	$tip='正常';
																	break;
																case 1:
																	$tip='已申请退款';
																	break;
																case 2:
																	$tip='厂商或代理已同意退款等待买家退货';
																	break;
																case 3:
																	$tip='买家已发货';
																	break;
																case 4:
																	$tip='卖家收到退货同意退款';
																	break;
																default:
																	$tip='不正常';
																	break;
															}
															echo $tip;
															?>
														</div>
														<div class="detail">
															<a href="/shop/admin/Order/Shop?order_sn=<?=$arr['order_sn']?>&optype=1" class="blue" data-id="detail">订单详情</a>
														</div>
														<?php if($action !="forwarding" && $username != "super_admin" && val($arr, 'is_forwarding') == 0):?>
														<div class="detail">
									                                       <a data-parame="order_id=<?=$arr['id']?>&order_sn=<?=$arr['order_sn']?>" class="btn btn-info btn-xs" data-id="forwarding">转总店发货</a>
														</div>
														<?php endif;?>
													</div>
												</div>
											</td>
											<td class="column4">
												<div class="middle-outer">
													<div class="middle-inner">
														<div class="total">
															<?php 
															$rmb=0;
															foreach ($arr['items'] as $key => $value) {
																$rmb+=intval($value['quantity'])*floatval($value['price']);
															}
															echo $rmb+floatval($arr['freight_fee']);
															?>元
														</div>
														<div class="freight">
															（含运费<?=$arr['freight_fee']?>元）
														</div>
														<!--待付款和待发货状态没有查看物流按钮,其它状态都有该按钮-->
														<div class="logistics">
															<?php if ($arr['info']['express_name']!=''): ?>
															<a data-q="com=<?=$arr['info']['express_name']?>&nu=<?=$arr['info']['invoice']?>" class="btn btn-info btn-xs showExpressSome">查看物流</a>
															<?php endif?>
														</div>
													</div>
												</div>
											</td>
											<?php if($action != "forwarding" && $status == 2):?>
											<td class="column4">
												<div id="actionView-<?=$arr['id']?>">
												<?php if(!empty($arr['info']['remark']) ):?>
													<div id="con-<?=$arr['id']?>"><?php echo $arr['info']['remark']; ?></div>
									                          <a data-parame="order_id=<?=$arr['id']?>" class="btn btn-info btn-xs" data-id="editRemark" data-oid="<?=$arr['id']?>" id="edit<?=$arr['id']?>">修改备注</a>
									                    <?php else:?>
								                                 <a data-parame="order_id=<?=$arr['id']?>" class="btn btn-info btn-xs" data-id="addRemark" data-oid="<?=$arr['id']?>" id="add<?=$arr['id']?>">添加备注</a>
												<?php endif;?>
												</div>
											       <div  id="remark-<?=$arr['id']?>" class="hide">
											           <textarea id="remarkcon-<?=$arr['id']?>"><?php echo !empty($arr['info']['remark']) ? $arr['info']['remark'] : '';?></textarea >
								                               <a data-parame="order_id=<?=$arr['id']?>&action=remark" class="btn btn-info btn-xs" data-id="submitRemark" data-oid="<?=$arr['id']?>">提交</a>
								                               <a class="btn btn-info btn-xs" data-id="closeRemark" data-oid="<?=$arr['id']?>">关闭</a>
											       </div>
											</td>
										<?php endif;?>
										</tr>
									</tbody>
								</table>
							</div>
							<?php endforeach?>
							<?php endif?>
							<!--单个订单结束-->
						</div>
						<!--底部工具条-->
						<div class="clearfix">
							<!--<div class="pull-left">总计2条,当前显示第1到2条</div>-->
							<?=$pageBtnsHtml?>
						</div>
					</div>
					<!--表格结束-->
					<div class="space"></div>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		
		<!--对话框-->
		<div id="modalDialog" class="dialog-content hide">
			<div class="loading-bg"><div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div></div>
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>												
		</div>
		<!--对话框-->
		<div id="dialog-edit" class="hide">
		</div>
		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/order/shop/list.js"></script>
	</body>

</html>