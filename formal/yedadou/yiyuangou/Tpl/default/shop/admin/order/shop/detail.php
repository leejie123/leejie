<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>订单详情</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/admin/css/order/shop/detail.css" />
	</head>

	<body class="no-skin" id="orderContent">

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<?php
					$classComplete=['','','','',''];
					$classComplete[$oderStatus-1]=' class="complete"';
					if(!function_exists('formateOrderTime')){
						function formateOrderTime($num){
							if($num==0){
								echo '';
							}else{
								echo date("Y-m-d H:i:s",$num);
							}
						}
					}
					?>
					<div class="box">
						<ul class="steps">
							<li data-step="1"<?=$classComplete[0]?>>
								<span class="step">1</span>
								<span class="title">提交订单</span>
								<div class="pt5">
									<span class="label label-warning"><i class="ace-icon fa fa-exclamation-triangle"><?=formateOrderTime($order['create_time'])?></i></span>
								</div>
							</li>
							<li data-step="2"<?=$classComplete[1]?>>
								<span class="step">2</span>
								<span class="title">支付</span>
								<span class="label label-warning"><?=formateOrderTime($order['pay_time'])?></span>
							</li>
							<li data-step="3"<?=$classComplete[2]?>>
								<span class="step">3</span>
								<span class="title">发货</span>
								<span class="label label-warning"><?=formateOrderTime($order['shipping_time'])?></span>
							</li>
							<li data-step="4"<?=$classComplete[3]?>>
								<span class="step">4</span>
								<span class="title">确认收货</span>
								<span class="label label-warning"><?=formateOrderTime($order['confirmation_time'])?></span>
							</li>
							<li data-step="5"<?=$classComplete[4]?>>
								<span class="step">5</span>
								<span class="title">完成</span>
								<span class="label label-warning"><?=formateOrderTime($order['finish_time'])?></span>
							</li>
						</ul>
						<?php if ($oderStatus ==1000000): ?>
						<!--当前状态对应的按钮,没有按钮可以隐藏起来-->
						<div class="action-area">
							<!--待发货状态有打印订单,发货,无其它按钮-->
							<a href="#" class="btn btn-info btn-xs">发货</a>
						</div>
						<!--当前状态对应的按钮,没有按钮可以隐藏起来-->
						<div class="action-area">
							<!--已发货状态有确认收货,无其它按钮-->
							<a href="#" class="btn btn-info btn-xs">确认收货</a>
						</div>
						<!--当前状态对应的按钮,没有按钮可以隐藏起来-->
						<div class="action-area">
							<!--申请退款状态有退货确认,退款,无其它按钮-->
							<a href="#" class="btn btn-info btn-xs">退货确认</a><a href="#" class="btn btn-info btn-xs">退款</a>
						</div>
					</div>
					<?php endif?>
					<!--标题,如果是申请退款或已退款状态应为"退单信息"-->
					<div class="head-title">订单信息11<div class="pull-right"><a id="btnOrderPrint" target="_self" class="btn btn-info btn-xs">订单打印</a></div></div>
					<!--<div class="head-title">退单信息</div>-->
					<!--订单信息开始-->
					<div class="row wrapper">
						<div class="col-xs-6">
							<div class="label-wrapper">
								昵称：
							</div>
							<div class="control-wrapper">
								<?=$order['buyer_name']?>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								购买者ID：
							</div>
							<div class="control-wrapper">
								<?=$order['buyer_uid']?>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								订单编号：
							</div>
							<div class="control-wrapper">
								<?=$order['order_sn']?>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								下单时间：
							</div>
							<div class="control-wrapper">
								<?=date("Y-m-d H:i:s",$order['create_time'])?>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								<?=$order['pay_time']==0?'':'支付时间：'?>
							</div>
							<div class="control-wrapper">
								<?=$order['pay_time']==0?'':date("Y-m-d H:i:s",$order['pay_time'])?>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								备注：
							</div>
							<div class="control-wrapper">
								<?=$order['info']['remark']?>
							</div>
						</div>
					</div>
					<!--订单信息结束-->
					<div class="space"></div>
					<!--收件人信息开始-->
					<div class="row wrapper">
						<div class="col-xs-6">
							<div class="label-wrapper">
								收件人：
							</div>
							<div class="control-wrapper">
								<?=$order['info']['consignee']?>;<?=$order['info']['phone']?>,<?=$order['info']['tel']?>;<?=$order['info']['province']?> <?=$order['info']['city']?> <?=$order['info']['street']?> <?=$order['info']['address']?> <?=$order['info']['zip_code']?> 
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								物流公司：
							</div>
							<div class="control-wrapper">
								<?php $express = \Lib\App\Util::getExpressList();echo val($express,$order['info']['express_name'],'其它');?>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								快递单号：
							</div>
							<div class="control-wrapper">
								<?=$order['info']['invoice']?> &nbsp;&nbsp;&nbsp;
								<?php if ($order['info']['express_name']!=''): ?>
								<a id="showExpress" href="#" class="btn btn-info btn-xs" data-q="com=<?=$order['info']['express_name']?>&nu=<?=$order['info']['invoice']?>">查看物流</a>
								<?php endif?>
							</div>
						</div>
					</div>
					<div class="space"></div>
					<!--收件人信息结束-->
					
					<!--退款信息开始-->
					<div class="row wrapper">
						<div class="col-xs-6">
							<div class="label-wrapper">
								退款编号：
							</div>
							<div class="control-wrapper">
								
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								申请时间：
							</div>
							<div class="control-wrapper">
								
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								退款原因：
							</div>
							<div class="control-wrapper">
								
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								退款金额：
							</div>
							<div class="control-wrapper">
								
							</div>
						</div>
					</div>
					<div class="space"></div>
					<!--退款信息结束-->
					
					<!--寄件人信息开始-->
					<div class="row wrapper" style="display: none;">
						<div class="col-xs-6">
							<div class="label-wrapper">
								寄件人：
							</div>
							<div class="control-wrapper">
								xxx；123123123xxxxxxxx
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								收货地址：
							</div>
							<div class="control-wrapper">
								xxxxxxxxxxxxxxxxxxx
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								物流公司：
							</div>
							<div class="control-wrapper">
								xxxx
							</div>
						</div>
						<div class="col-xs-6">
							<div class="label-wrapper">
								退货单号：
							</div>
							<div class="control-wrapper">
								xxxxxxxxxxxxxxxxx &nbsp;&nbsp;&nbsp;
								<a href="#" class="btn btn-info btn-xs">查看物流</a>
							</div>
						</div>
					</div>
					<div class="space"></div>
					<!--寄件人信息结束-->

					
					<!--内容结束-->
					<!--表格开始-->
					<table class="table table-bordered table-vertical-middle table-hover">
						<thead>
							<tr>
								<!--如果是申请退款或已退款状态应为退货商品-->
								<!--<th class="column1">退货商品</th>-->
								<th class="column1">商品</th>
								<th class="column2">规格型号</th>
								<th class="column3">商品ID</th>
								<th class="column4">单价</th>
								<th class="column5">购买数量</th>
								<th class="column6">商品总价</th>
							</tr>
						</thead>
						<tbody>
							<?php $temIndex=0; $itemsCount=count($order['items']);?>
							<?php
							if(!isset($order['items'])) $order['items']=[];
							?>
							<?php foreach ($order['items'] as $arr):?>
							<?php $temIndex++; ?>
							<tr>
								<td class="column1">
									<div class="product-image pull-left">
										<div class="middle-outer">
											<div class="middle-inner">
												<a href="#">
													<img src="<?=$arr['pic_url']?>">
												</a>
											</div>
										</div>
									</div>
									<div class="product-name">
										<div class="middle-outer ">
											<div class="middle-inner">
												<?=$arr['title']?>
											</div>
										</div>
									</div>
								</td>
								<td class="column2">
									<div class="middle-outer">
										<div class="middle-inner">
											<?=$arr['spec']?>
										</div>
									</div>
								</td>
								<td class="column3">
									<div class="middle-outer">
										<div class="middle-inner">
											<?=$arr['goods_id']?>
										</div>
									</div>
								</td>
								<td class="column4">
									<div class="middle-outer">
										<div class="middle-inner">
											<?=$arr['price']?>
										</div>
									</div>
								</td>
								<td class="column5">
									<div class="middle-outer">
										<div class="middle-inner">
											<?=$arr['quantity']?>
										</div>
									</div>
								</td>
								<?php if ($temIndex==1): ?>
								<!--说明:rowspan要和商品个数一致-->
								<td class="column6" rowspan="<?=$itemsCount?>">
									<div class="middle-outer">
										<div class="middle-inner">
											<div class="state">
													<?php
															$refund_status=intval($order['refund_status']);
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
											<div class="total">
												¥：<?php 
															$rmb=0;
															foreach ($order['items'] as $key => $value) {
																$rmb+=$value['quantity']*$value['price'];
															}
															echo $rmb;
															?>元
											</div>
											<div class="freight">
												（含运费<?=$order['freight_fee']?>元）
											</div>
										</div>
									</div>
								</td>
								<?php endif?>
							</tr>
							<?php endforeach?>
						</tbody>
					</table>
					<!--表格结束-->
					<!--分佣信息开始-->
					<?php if (!empty($commissions)): ?>
					<table class="table table-bordered bonus">
						<thead>
							<tr>
								<th>分佣总额</th>
								<th>分佣比例</th>
								<th>现金</th>
								<th>积分</th>
								<th>红包</th>
								<th>状态</th>
								<th>分佣者</th>
							</tr>
						</thead>
					<?php foreach ($commissions as $key => $commission): ?>
						<tbody>
							<tr>
								<td><?=$commission['comission_amount']?></td>
								<td><?=$commission['comission_rate']?></td>
								<td><?=$this->getCommissionByType($commission,'money')?></td>
								<td><?=$this->getCommissionByType($commission,'point')?></td>
								<td><?=$this->getCommissionByType($commission,'repack')?></td>
								<td class="font-red"><?=['-2'=>'无效','-1'=>'审核不通过','0'=>'未审核','1'=>'审核通过'][$commission['status']]?></td>
								<td><?=$commission['nick']?>(<?=$commission['uid']?>)</td>
							</tr>
						</tbody>
					<?php endforeach ?>	
					</table>
					<?php endif ?>
					<!--分佣信息结束-->
					<div class="space"></div>
					<?php
					if(!function_exists('formateOrderStatus')){
						function formateOrderStatus($s){
							$s=intval($s);
							$msg='';
							//-1删除 0取消 1待付款 2已付款待发货 3已发货待收货 4已收货待评价 5已评价交易完成
							switch ($s) {
								case -1:
									$msg='删除';
									break;
								case 0:
									$msg='取消';
									break;
								case 1:
									$msg='待付款';
									break;
								case 2:
									$msg='已付款待发货';
									break;
								case 3:
									$msg='已发货待收货';
									break;
								case 4:
									$msg='已收货待评价';
									break;
								case 5:
									$msg='已评价交易完成';
									break;
								default:
									$msg='未知:'.$s;
									break;
							}
							return $msg;
						}
					}
					?>
					<div class="head-title">订单日志</div>
					<table class="table table-bordered table-vertical-middle table-hover">
						<thead>
							<tr>
								<th style="width: 50px;">序号</th>
								<th class="column2">旧的状态</th>
								<th class="column3">新的状态</th>
								<th class="column5">操作者</th>
								<th class="column6">操作时间</th>
								<th class="column7">备注</th>
							</tr>
						</thead>
						<tbody>
							<?php $temIndex=0;?>
							<?php foreach ($logs as $logItem):?>
							<?php $temIndex++; ?>
							<tr>
								<td>
											<?php echo $temIndex;?>
								</td>
								<td>
											<?=formateOrderStatus($logItem['old_status'])?>
								</td>
								<td>
											<?=formateOrderStatus($logItem['new_status'])?>
								</td>
								<td>
											<?=$logItem['handler']?>
								</td>
								<td>
											<?=formateOrderTime($logItem['op_time'])?>
								</td>
								<td>
											<?=$logItem['remark']?>
								</td>
							</tr>
							<?php endforeach?>
						</tbody>
					</table>
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
		<script src="{__STATIC_URL__}/public/admin/js/order/shop/detail.js"></script>
	</body>

</html>