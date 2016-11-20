<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>消息模板</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
		<style>
		.inner-content div{display:inline-block;padding:0px 5px;border:1px solid #cccccc;margin:5px;}
		</style>
	</head>
<style>
	.input-group{
		display: inline;
	}
</style>
	<body>
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/config/messageTemplate/index.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-edit"></i>消息模板</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="msg_tpl_form" data-submit="auto">
									<div class="row">
										<div class="col-xs-6">
											<table class="table table-bordered">
												<tbody>
													<tr>
														<td class="left-td">
															购买商品付款成功：
														</td>
														<td>
															<div class="form-group no-margin-left no-margin-right mt4">
																<div class="input-group">																	
																	<textarea id="paySuccess" name="paySuccess" maxlength="300"  class="form-control height80" placeholder="请输入要回复的内容"><?php echo isset($msgTpl['paySuccess'])  ? $msgTpl['paySuccess']:'';?></textarea>
																	<!--<span class="input-group-addon" style="cursor:pointer">使用微信模板</span>-->
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="left-td">
															购买成功通知上级：
														</td>
														<td>
															<div class="form-group no-margin-left no-margin-right mt4">
																<div class="input-group">
																	<input type="text" id="paySuccessSuper" name="paySuccessSuper" class="form-control" value="<?php echo isset($msgTpl['paySuccessSuper'])  ? $msgTpl['paySuccessSuper']:'';?>" placeholder="" />
																	<!--<span class="input-group-addon" style="cursor:pointer">使用微信模板</span>-->
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="left-td">
															发货通知：
														</td>
														<td>
															<div class="form-group no-margin-left no-margin-right mt4">
																<div class="input-group">
																	<input type="text" id="ship" name="ship" class="form-control" value="<?php echo isset($msgTpl['ship']) ? $msgTpl['ship']:'';?>" placeholder="" />
																	<!--<span class="input-group-addon" style="cursor:pointer">使用微信模板</span>-->
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="left-td">
															中奖通知 :
														</td>
														<td>
															<div class="form-group no-margin-left no-margin-right mt4">
																<div class="input-group">
																	<input type="text" id="winning" name="winning" class="form-control" value="<?php echo isset($msgTpl['winning']) ? $msgTpl['winning']:'';?>" placeholder="" />
																	<!--<span class="input-group-addon" style="cursor:pointer">使用微信模板</span>-->
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="col-xs-6 line-height-30">
											<div class="head-title">引用参数说明</div>
											<div class="inner-content">
												<div><span><strong>会员ID：</strong></span>
												<span>{$uid}</span></div>
												<div><span><strong>昵称</strong></span>
												<span>{$nick}</span></div>
												<div><span><strong>是否代理</strong></span>
												<span>{$is_agent}</span></div>
												<div><span><strong>代理级别</strong></span>
												<span>{$agent_level}</span></div>
												<div><span><strong>是否分享客</strong></span>
												<span>{$is_sharer}</span></div>
												<div><span><strong>会员级别</strong></span>
												<span>{$sharer_level}</span></div>
												<div><span><strong>上级UID</strong></span>
												<span>{$parent_uid}</span></div>
												<div><span><strong>上级昵称</strong></span>
												<span>{$parent_nick}</span></div>
												<div><span><strong>下级UID</strong></span>
												<span>{$current_uid}</span></div>
												<div><span><strong>下级昵称</strong></span>
												<span>{$current_nick}</span></div>
												<div><span><strong>是否已关注</strong></span>
												<span>{$is_subscribe}</span></div>
												<div><span><strong>是否超级合伙人</strong></span>
												<span>{$is_super_partner}</span></div>
												<div><span><strong>省份</strong></span>
												<span>{$province}</span></div>
												<div><span><strong>城市</strong></span>
												<span>{$city}</span></div>
												<div><span><strong>县区</strong></span>
												<span>{$street}</span></div>
												<div><span><strong>公众号名称</strong></span>
												<span>{$public_nick}</span></div>
												<div style="border:1px solid #cccccc;height:1px;display:block;float:both"></div>
											<h2>订单类</h2>
												<div><span><strong>订单号</strong></span>
												<span>{$order_sn}</span></div>
												<div><span><strong>订单实付款</strong></span>
												<span>{$amount_paid}</span></div>
												<div><span><strong>商品数量</strong></span>
												<span>{$quantity}</span></div>
												<div><span><strong>商品总额</strong></span>
												<span>{$goods_amount}</span></div>
												<div><span><strong>运费</strong></span>
												<span>{$freight_fee}</span></div>
												<div><span><strong>折扣</strong></span>
												<span>{$discount}</span></div>
												<div><span><strong>购买者UID</strong></span>
												<span>{$buyer_uid}</span></div>
												<div><span><strong>购买者昵称</strong></span>
												<span>{$buyer_name}</span></div>
												<div><span><strong>下单时间</strong></span>
												<span>{$create_time}</span></div>
												<div><span><strong>支付时间</strong></span>
												<span>{$pay_time}</span></div>
												<div><span><strong>支付单号</strong></span>
												<span>{$trade_sn}</span></div>
												<div><span><strong>发货物流</strong></span>
												<span>{$express_name}</span></div>
												<div><span><strong>运单号</strong></span>
												<span>{$invoice}</span></div>
												<div><span><strong>订单完成时间</strong></span>
												<span>{$finish_time}</span></div>
												<div><span><strong>订单状态</strong></span>
												<span>{$status}</span></div>
												<div><span><strong>订单金额</strong></span>
												<span>{$order_amount}</span></div>
												<div><span><strong>佣金</strong></span>
												<span>{$commission}</span></div>
												<div><span><strong>返佣类型</strong></span>
												<span>{$type}</span></div>
												<div><span><strong>分佣所得者</strong></span>
												<span>{$commission_user}</span></div>
											</div>
											<div class="head-title">消息示例 -- 注意：会员变量只适应会员类通知，订单变量只适应订单类通知</div>
											<div class="inner-content">
												恭喜你的粉丝【{$nick}】成功购买商品，订单完成后您将得到【{$commission}】元【{$type}】，分享赚钱，就这么简单，就这么任性！
											</div>
										</div>
									</div>
									<div class="space"></div>
									<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit" data-href="/yiyuan/admin/config/messageTemplate" data-action="submit" data-refresh="parent" data-mask="parent" ><i class="ace-icon fa fa-save"></i> 保存</button>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<!--data-href为微信消息模板列表的网址,data-message为根据消息ID获取消息数据的网址-->
<!--									<a href="#" data-href="/shop/config/messageTemplate/add" data-message="/action/message.aspx" class="btn btn-success" id="selectWeixin" name="selectWeixin" type="button"><i class="ace-icon fa fa-list"></i> 添加微信消息模板</a> &nbsp;&nbsp;&nbsp;-->
									<!--已经添加的微信消息的id,以逗号分隔-->
									<input type="hidden" name="weixinMessageIds" id="weixinMessageIds" value="" />
									<div class="space"></div>

<!--									<div class="head-title no-margin-bottom">微信消息模板</div>
									<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
										<thead>
											<tr>
												<th class="center">标题</th>
												<th class="center">内容</th>
												<th class="center" width="80">操作</th>
											</tr>
										</thead>
										<tbody id="messageTable">
                                                <?php// if($msgTpl):?>
                                                <?php //foreach($msgTpl as $v):?>
											data-id表示该行数据的ID
											<tr data-id="<?php //echo $v['id'];?>">
												<td class="center"><?php //echo $v['name'];?></td>
												<td class="center"><?php //echo $v['content'];?></td>
												<td class="center">
													<a href="#" data-href="/action/delete.aspx" class="blue" data-id="delete">删除</a>
												</td>
											</tr>
                                                <?php //endforeach;?>
                                                <?php //endif;?>
										</tbody>
									</table>-->
									<div class="space"></div>
								</form>
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
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>
		</div>

		<!--模板-表格行-->
		<table class="hide">
			<tbody id="tpl-message">
				<tr data-id="1">
					<td class="center"></td>
					<td class="center"></td>
					<td class="center">
						<a href="#" data-href="/action/delete.aspx" class="blue" data-id="delete">删除</a>
					</td>
				</tr>
			</tbody>
		</table>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/messageTemplate/index.js"></script>
	</body>

</html>