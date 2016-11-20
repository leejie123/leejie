<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>限时揭晓</title>
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
								<a href="/yiyuan/admin/publish/publish/get">限时揭晓</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab1">查看详细</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">

								<div class="table-head-toolbar clearfix">
									<div>
										<label class="" for=""><strong>商品ID：</strong></label>
										<span class="lbl"><?=val($data, 'goods_id', 0)?></span>
									</div>
									<div>
										<label class="" for=""><strong>商品期数：</strong></label>
										<span class="lbl">第（<?=val($data, 'term', 0)?>）期，最大期数<?=val($data, 'term_num', 0)?>期</span>
									</div>
									<div>
										<label class="" for=""><strong>商品标题：</strong></label>
										<span class="lbl"><?=val($data, 'goods_title', 0)?></span>
									</div>
									<div>
										<label class="" for=""><strong>商品信息：</strong></label>
										<span class="lbl">总价格：<?=val($data, 'goods_price', 0)?></span>&nbsp;&nbsp;&nbsp;&nbsp;
										<span class="lbl">单价：<?=val($data, 'goods_code_price', 0)?></span>&nbsp;&nbsp;&nbsp;&nbsp;
										<span class="lbl">总需人次：<?=val($data, 'code_num', 0)?></span>&nbsp;&nbsp;&nbsp;&nbsp;
										<span class="lbl">参与人次：<?=val($data, 'buy_num', 0)?></span>&nbsp;&nbsp;&nbsp;&nbsp;
										<span class="lbl">剩余人次：<?=val($data, 'code_num', 0)-val($data, 'buy_num', 0)?></span>&nbsp;&nbsp;&nbsp;&nbsp;
									</div>
									<div>
										<label class="" for=""><strong>开奖状态：</strong></label>
										<span class="lbl" style="color:red;'"><?=val($data, 'status_name', 0)?></span>
									<?php if(val($data, 'status', 2) >= 2):?>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<label class="" for=""><strong>中奖人：</strong></label>
										<span class="lbl"><?=val($data, 'hit_nick', 0)?></span>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<label class="" for=""><strong>中奖幸运码：</strong></label>
										<span class="lbl"><?=val($data, 'hit_code', 0)?></span>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<label class="" for=""><strong>揭晓时间：</strong></label>
										<span class="lbl"><?php echo isset($data['hit_time'])?date('Y-m-d H:i',$data['hit_time']):'未限时';?></span>
									<?php endif;?>
									</div>
								</div>
								<div class="space-4"></div>
								<!--表格-->
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th class="center">订单号</th>
											<th class="center">购买用户</th>
											<th class="center">幸运码</th>
											<th class="center">购买次数</th>
											<th class="center">购买时间</th>
											<th class="center">是否中奖</th>
										</tr>
									</thead>

									<tbody>
										<!--data-id表示该行数据的ID-->
										<?php if(!empty($orders)){?>
										<?php foreach ($orders as $order_sn=>$value):?>
										<tr id="row-<?php echo $order_sn; ?>" data-id="<?php echo isset($order_sn)?$order_sn:''; ?>">
											<td class="center" valign="middle"><?=$order_sn?></td>
											<td class="center" valign="middle"><?=$value['buyer_nick']?></td>
											<td class="center blue" valign="middle" style="word-wrap: break-word;word-break: break-all">
											<?php 
												if(array_sum($value['hit'])>=1) {
													$key = array_search(1, $value['hit']);
													$value['code'][$key] = "<a href='#' style='color:red;'>{$value['code'][$key]}</a>";
												}
												echo isset($value['code']) ? implode(',', $value['code']) : "123";
											?>
											</td>
											<td class="center" valign="middle"><?= $value['count']?></td>
											<td class="center"><?= val($value, 'add_time', '');?></td>
											<td class="center"><?=array_sum($value['hit'])>=1?'<span class="red">中奖</span>':'否';?></td>
										</tr>
										<?php endforeach;?>
										<?php }?>
									
									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<div class="pull-left">
									</div>							
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
		<script src="{__STATIC_URL__}/public/yiyuan/admin/product/list.js"></script>
	</body>

</html>