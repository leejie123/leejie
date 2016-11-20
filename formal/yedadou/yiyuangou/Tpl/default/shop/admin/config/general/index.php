<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>全局设置</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/js/kindeditor/themes/default/default.css,/assets/css/ace.css,/css/public.css,/assets/css/jquery-ui.css" />
	</head>
<style>
#link{
	width: 60%;
}
</style>
	<body>
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/config/global/index.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">

							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-edit"></i>全局设置</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<form class="form-horizontal" method="post" action="/shop/admin/config/general" >
									<table id="" class="table table-bordered">
										<tbody>
											<tr>
												<td class="left-td">
													商城名称：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<input type="text" id="shopName" name="shopName" class="form-control" value="<?php echo val($ganeral,'shopName');?>" placeholder="请输入商城名称" />
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													商城LOGO：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<div class="input-group">
															<input type="text" value="<?php echo val($ganeral,'shopLogo');?>" id="shopLogo" name="shopLogo" class="form-control" placeholder="请直接输入图片地址或使用上传图片按钮上传图片" />
															<span class="input-group-btn">
						       									<button id="upload" type="button" class="btn btn-info btn-sm">上传图片</button>
						      								</span>
														</div>
														<img id="previewImage" class="preview-image" src="<?php echo  !empty($ganeral['shopLogo'])? $ganeral['shopLogo']: '{__STATIC_URL__}/public/admin/images/noupload.png';?>" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													分享标题：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<input type="text" id="shareTitle" name="shareTitle" class="form-control" value="<?php echo val( $ganeral,'shareTitle');?>" placeholder="" />
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													分享图片：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<div class="input-group">
															<input type="text" value="<?php echo isset($ganeral['sharePic']) ? $ganeral['sharePic']: '';?>" id="sharePic" name="sharePic" class="form-control" placeholder="请直接输入图片地址或使用上传图片按钮上传图片" />
															<span class="input-group-btn">
						       									<button id="uploadSharePic" type="button" class="btn btn-info btn-sm">上传图片</button>
						      								</span>
														</div>
														<img id="previewShareImage" class="preview-image" src="<?php echo isset($ganeral['sharePic']) ? $ganeral['sharePic']: '{__STATIC_URL__}/public/admin/images/noupload.png';?>" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													分享内容：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<input type="text" id="shareContent" name="shareContent" class="form-control" value="<?php echo val($ganeral,'shareContent');?>" placeholder="" />
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													分享可获得积分：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<input type="text" id="sharePoint" name="sharePoint" class="form-control" value="<?php echo val($ganeral, 'sharePoint','');?>" placeholder="" />
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													引导关注提示语：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<input type="text" id="cue" name="cue" class="form-control" value="<?php echo !empty($ganeral['cue'] )? $ganeral['cue']: '';?>" />
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													关注按钮设置：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<label>
															<input name="concerned" type="radio" class="ace" value="qrcode" data-value="1" <?php echo !empty($ganeral['concerned'] )? ($ganeral['concerned']=='qrcode' ? "checked" : ''): 'checked';?>>
															<span class="lbl"> 公众号二维码</span>
														</label>
														&nbsp;
														<label>
															<input name="concerned" type="radio" class="ace" value="link" data-value="2" <?php echo !empty($ganeral['concerned'] )? ($ganeral['concerned']=='link' ? "checked" : ''): '';?>>
															<span class="lbl"> 跳转链接</span>
														</label>
														<span <?php if(empty($ganeral['jumpLink'] )):?>class="hide" <?php endif;?>id="extraConainer"><input id="link" name="jumpLink" type="text" value="<?php echo !empty($ganeral['jumpLink'] )? $ganeral['jumpLink']: '';?>" placeholder="输入跳转链接" /> 
													</div>
												</td>
											</tr>
											<!--<tr>
												<td class="left-td">
													是否启用分销：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short checkbox-container">
														<label class="pos-rel">
															<input id="isEnable" name="isEnable" type="checkbox" class="ace" <?php //echo $ganeral ? ($ganeral['isEnable'] ? "checked" : ''): '';?>>
															<span class="lbl"> 启用</span>
														</label>
													</div>
												</td>
											</tr>-->
											<tr>
												<td class="left-td">
													分销规则设置：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<select id="rule" name="rule" class="form-control">
															<option value="0" selected="">不启动分销</option>
                                                            <?php if($rule): foreach($rule as $r):?>
															<option value="<?php echo $r['id'];?>" <?php echo $ganeral ? ($r['id'] == $ganeral['rule'] ? 'selected' : ''): '';?>><?php  echo $r['config']['ruleName'];?></option>
                                                            <?php endforeach;?>
                                                            <?php endif; ?>
														</select>
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													未购买能否分享：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short checkbox-container">
														<label>
															<input name="canShare" type="radio" class="ace" value="1" <?php echo val($ganeral,'canShare',1) == 1 ? "checked" : ''; ?>>
															<span class="lbl"> 能</span>
														</label>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<label>
															<input name="canShare" type="radio" class="ace" value="0" <?php echo val($ganeral,'canShare') == 0 ? "checked" : ''; ?>>
															<span class="lbl"> 不能</span>
														</label>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 该选项指定会员未购买本店产品的情况下，能否进行分享
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													代理商消费打折：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short checkbox-container">
														<label>
															<input name="canDiscount" type="radio" class="ace" value="1" <?php echo val($ganeral,'canDiscount',1) == 1 ? "checked" : '';?>>
															<span class="lbl"> 能</span>
														</label>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<label>
															<input name="canDiscount" type="radio" class="ace" value="2" <?php echo val($ganeral,'canDiscount') == 2 ? "checked" : '';?>>
															<span class="lbl"> 不能</span>
														</label>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 该选项指定代理商在购买商品时是否享受打折，折扣在分销规则里设置
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													启用商品评价：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short checkbox-container">
														<label class="pos-rel">
															<input id="isEnableComment" name="isEnableComment" type="checkbox" class="ace" <?php echo val($ganeral,'isEnable')? "checked" : '';?>>
															<span class="lbl"> 启用</span>
														</label>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 选择启用后，用户在浏览商品时可看到其他用户的评价内容，和购买后进行评价
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													是否启用退换货：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short checkbox-container">
														<label>
															<input name="isEnableReturn" type="radio" class="ace" value="1" <?php echo val($ganeral,'isEnableReturn')== 1 ? "checked" : '';?>>
															<span class="lbl"> 是</span>
														</label>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<label>
															<input name="isEnableReturn" type="radio" class="ace" value="2" <?php echo val($ganeral,'isEnableReturn')== 2 ? "checked" : '';?>>
															<span class="lbl"> 否</span>
														</label>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 启用了退换货，佣金需等待订单完成才能返现
														<div class="form-group period-container hide" id="periodContainer">
															<div class="label-wrapper">
																<label class="" for="period">退换货周期：</label>
															</div>
															<div class="control-wrapper">
																<div class="input-group">
																	<input type="text" value="<?php echo val($ganeral,'period',0)?>" name="period" id="period" class="form-control" placeholder="">
																	<span class="input-group-addon">天</span>
																</div>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													佣金自动审核时机：
												</td>
												<td style="float: left; margin-right: 30px;">
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<select id="autoAuditCommission" name="autoAuditCommission" class="form-control">
															<option value="0" selected>手动审核</option>                                        
															<option value="2" <?php echo val($ganeral,'autoAuditCommission')==2?'selected':null;?> >订单支付完成时</option>
															<option value="3" <?php echo val($ganeral,'autoAuditCommission')==3?'selected':null;?> >发货完成时</option>
															<option value="4" <?php echo val($ganeral,'autoAuditCommission')==4?'selected':null;?> >确认收货时</option>
														</select>
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													未付款订单超时时间：
												</td>
												<td>
													<div class="col-md-3 input-group" style="float: left; margin-right: 30px;">
												 	<input type="text" class="form-control input-sm" data-onlyNumber='true' name="time" id="time" value="<?php echo !empty($ganeral['time']) ? $ganeral['time']: '';?>"><div class="input-group-addon">小时</div>
												  </div>
												  <div class="pull-left" style="margin-top: 5px;"> 未付款订单超时后将自动取消</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													订单自动确认收货周期：
												</td>
												<td>
													<div class="col-md-3 input-group" style="float: left; margin-right: 30px;">
												 	<input type="text" class="form-control input-sm" data-onlyNumber='true' name="cycle" id="cycle" value="<?php echo !empty($ganeral['cycle']) ? $ganeral['cycle']: '';?>"><div class="input-group-addon">天</div>
												  </div>
												  <div class="pull-left" style="margin-top: 5px;"> 订单自发货时间起, 到期后消费者未确认收货时系统自动将订单确认收货</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													匹配关键词：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<input type="text" id="match" name="match" class="form-control" value="<?php echo val($ganeral,'match');?>" placeholder="当用户回复特定关键词时推送商城首页给用户" />
														<input type="hidden" name="match_id" value="<?php echo val($ganeral,'match_id',0);?>" />
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													商城入口：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short label-container">
														<a target="_blank" href="<?=site_url().$this->getApp()['url']?>"><?=site_url().$this->getApp()['url']?></a>
													</div>
												</td>
											</tr>

										</tbody>
									</table>
									<div class="space"></div>
									<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit"><i class="ace-icon fa fa-save"></i> 保存</button>
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

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/global/index.js"></script>
	</body>

</html>