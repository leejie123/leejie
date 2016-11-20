<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>订单详情</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/product/list/index.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li>
								<a href="/yiyuan/admin/order/orderList/get">订单列表</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab1">订单详情</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
						<?php if(!empty($user)){ ?>
							<div id="tab1" class="tab-pane active">

								<div class="table-head-toolbar clearfix">
									<div>
										<label class="" for=""><strong>商品ID：</strong></label>
										<span class="lbl"><?=$data['goods_id']?></span>
									</div>
									<div>
										<label class="" for=""><strong>商品期数：</strong></label>
										<span class="lbl">第（<?=$data['term']?>）期，最大期数<?=$data['term_num']?>期</span>
									</div>
									<div>
										<label class="" for=""><strong>商品标题：</strong></label>
										<span class="lbl"><?=$data['goods_title']?></span>
									</div>
									<div>
										<label class="" for=""><strong>商品信息：</strong></label>
										<span class="lbl">总价格：<?=$data['goods_price']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
										<span class="lbl">单价：<?=$data['goods_code_price']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
										<span class="lbl">总需人次：<?=$data['code_num']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
										<span class="lbl">参与人次：<?=$data['buy_num']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
									</div>
									<div>
										<label class="" for=""><strong>开奖状态：</strong></label>
										<span class="lbl"><?=$data['status_name']?></span>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<?php if($data['status']!=1){?>
										<label class="" for=""><strong>中奖人：</strong></label>
										<span class="lbl"><?=$data['hit_nick']?></span>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<label class="" for=""><strong>中奖购买码：</strong></label>
										<span class="lbl"><?=$data['hit_code']?></span>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<label class="" for=""><strong>揭晓时间：</strong></label>
										<span class="lbl"><?=date('Y-m-d H:i:s',$data['hit_time'])?></span>
										<?php }?>
									</div>
								</div>
								<div class="space-4"></div>
								<div class="table-head-toolbar clearfix">
									<div>
										<label class="" for=""><strong>购买者ID：</strong></label>
										<span class="lbl"><?=isset($user['uid']) ? $user['uid']:"--"?></span>
									</div>
									<div>
										<label class="" for=""><strong>收件人：</strong></label>
										<span class="lbl"><?=val($address, 'consignee', '--')?></span>
									</div>
									<div>
										<label class="" for=""><strong>收件人邮箱：</strong></label>
										<span class="lbl"><?=isset($user['email']) ? $user['email'] :"--"?></span>
									</div>
									<div>
										<label class="" for=""><strong>收件人手机号：</strong></label>
										<span class="lbl"><?=val($address, 'phone', '--')?></span>
									</div>
									<div>
										<label class="" for=""><strong>收货信息：</strong></label>
										<span class="lbl"><?=val($address, 'province', '--').val($address, 'city', '--').val($address, 'street', '--').val($address, 'address', '--')?></span>
									</div>
									<div>
										<label class="" for=""><strong>购买时间</strong></label>
										<span class="lbl"><?=isset($data['buy_time']) ?$data['buy_time'] :"--"?></span>
									</div>
									<div>
										<label class="" for=""><strong>购买次数：</strong></label>
										<span class="lbl"><?=isset($data['count']) ? $data['count']:"--"?>人次</span>
									</div>
									<div>
										<label class="" for=""><strong>购买码：</strong></label>
										<span class="lbl" style="word-wrap: break-word;word-break: break-all;"><?php
										foreach($data['code'] as $k => $v) { 
											if($data['hit']>=1) {
												$key = array_search(1, $data['hits']);
												$key==$k ? $data['code'][$k] = "<a href='#' style='color:red;'>{$data['code'][$k]}</a>" : '';
											}
										}
										echo isset($data['code']) ? implode(',', $data['code']) : "--";
										?></span>
									</div>
								</div>
								<div class="space-4"></div>
								<?php if($data['hit']>=1){ ?>
								<form action="/yiyuan/admin/order/OrderList/get?act=detail" method="post">
								<div class="table-head-toolbar clearfix" id="div1" style="<?php if(!empty($data['order_status']) && $data['order_status']>=3){ echo  "display:none";}?>">
									<div>
										<label class="" for=""><strong>订单状态：</strong></label>
										<span class="lbl"><?=val($data,'order_status_name', '');?></span>
									</div>
									<div>
										<label class="" for=""><strong>物流公司：</strong></label>
										<label class="lbl">
											<select id="express" name="express" class="form-control" style="width:150px;">
												<?=$kuaidiOptions?>
											</select>
										</label>
									</div>
									<div>
										<label class="" for=""><strong>快递单号：</strong></label>
										<input name="invoice" value="<?=val($data,'invoice','')?>" type="text">
									</div>
									<div>
										<label class="" for=""><strong>运 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 费： </strong></label>
										<input name="freight_fee" value="<?=val($data,'freight_fee','')?>" type="text">
									</div>
									<div>
										<input name="id" value="<?php echo $user['uid']?>" type="hidden">
										<input name="term_id" value="<?php echo val($data, 'id', 0)?>" type="hidden">
										<input name="order_sn" value="<?php echo val($data, 'order_sn', 0)?>" type="hidden">
										<input name="order_id" value="<?php echo val($data, 'order_id', 0)?>" type="hidden">
										<input name="submit" value="发货" type="submit">
									</div>
								</div>
								<div class="table-head-toolbar clearfix" id="div2"style="<?php if(!empty($data['order_status']) && $data['order_status']>=3){ } else{ echo "display:none";}?>">
									<div>
										<label class="" for=""><strong>物流公司：</strong></label>
										<span class="lbl">
											<select id="express" name="express" class="form-control" disabled style="width:150px;">
												<?=$kuaidiOptions?>
											</select>
										</span>
									</div>
									<div>
										<label class="" for=""><strong>快递单号：</strong></label>
										<span class="lbl"><?=val($data, 'invoice', '');?></span>
									</div>
									<div>
										<label class="" for=""><strong>运费：</strong></label>
										<span class="lbl"><?=val($data, 'freight_fee', 0.00);?></span>
									</div>
									<div>
										<input value="更改发货信息" type="button" id="changeFa">
										<a href="/yiyuan/admin/order/orderList/get?act=viewInvoice&invoice=<?=$data['invoice']?>">查看物流</a>
										<!-- <input name="submit" value="查看物流" type="button" > -->
									</div>
								</div>
								</form>
								<?php } ?>
								<div class="space-4"></div>

							</div>
						<?php } ?>
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
		<script src="{__STATIC_URL__}/public/yiyuan/admin/product/list.js"></script>
		<script>
		$("#changeFa").click(function() {
			 $("#div1").toggle(function() {
			 	$("#div2").hide('fast');
			 });
		});
		</script>
	</body>

</html>