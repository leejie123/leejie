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
.winning{
	  width: 100px;
	  line-height: 45px;
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
								<form class="form-horizontal" method="post" action="" enctype="multipart/form-data"   data-submit="auto">
									<table id="" class="table table-bordered">
										<tbody>
											<tr>
												<td class="left-td">
													一元购名称：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<input type="text" id="shopName" name="shopName" class="form-control" value="<?php echo val($ganeral, 'shopName', '');?>" placeholder="请输入商城名称" />
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													LOGO：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<div class="input-group">
															<input type="text" value="<?php echo  val($ganeral, 'shopLogo', '');?>" id="shopLogo" name="shopLogo" class="form-control" placeholder="请直接输入图片地址或使用上传图片按钮上传图片" />
															<span class="input-group-btn">
						       									<button id="upload" type="button" class="btn btn-info btn-sm">上传图片</button>
						      								</span>
														</div>
														<img id="previewImage" class="preview-image" src="<?php echo val($ganeral, 'shopLogo', '{__STATIC_URL__}/public/admin/images/noupload.png');?>" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													分享标题：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<input type="text" id="shareTitle" name="shareTitle" class="form-control" value="<?php echo $ganeral ? $ganeral['shareTitle']: '';?>" placeholder="" />
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
														<input type="text" id="shareContent" name="shareContent" class="form-control" value="<?php echo val($ganeral, 'shareContent', '');?>" placeholder="" />
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
													关注按钮设置：
												</td>
												<td>
													<?php 
													$concerned=val($ganeral, 'concerned','1');
													$jumpLink=val($ganeral, 'jumpLink','');
													?>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<label>
															<input name="concerned" type="radio" class="ace" value="1" data-value="1" <?php if(isset($concerned)&&$concerned=='1'){echo 'checked';}?>>
															<span class="lbl"> 公众号二维码</span>
														</label>
														&nbsp;
														<label>
															<input name="concerned" type="radio" class="ace" value="2" data-value="2" <?php if(isset($concerned)&&$concerned=='2'){echo 'checked';}?>>
															<span class="lbl"> 跳转链接</span>
														</label>
														<span class="<?php if(!isset($concerned)||$concerned=='1'){echo 'hide';}?>" id="extraConainer"><input id="link" name="jumpLink" type="text" value="<?php if(isset($jumpLink)) echo $jumpLink;?>" placeholder="输入跳转链接" /></span>
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													晒单可获得积分：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<input type="text" id="baskPoint" name="baskPoint" class="form-control" value="<?php echo val($ganeral, 'baskPoint','');?>" placeholder="" />
													</div>
												</td>
											</tr>
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
													佣金自动审核时机：
												</td>
												<td style="float: left; margin-right: 30px;">
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<select id="autoAuditCommission" name="autoAuditCommission" class="form-control">
															<option value="0" selected>手动审核</option>                                        
															<option value="2" <?php echo val($ganeral,'autoAuditCommission')==2?'selected':null;?> >订单支付完成时</option>
															
														</select>
													</div>
												</td>
											</tr>
											
											<tr>
												<td class="left-td">
													中奖规则：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short checkbox-container">
														<table>
															<tr>
																<td class="winning">
																	<label>
																		<input name="winningRule" type="radio" class="ace" value="1" <?php echo $ganeral ? (val($ganeral, 'winningRule', 0) == '1' ? "checked" : ''): 'checked';?>>
																		<span class="lbl"> 默认规则</span>
																	</label>
																</td>
																<td>
																	取商品最后购买时间前网站所有商品100条购买时间记录之和除以商品总需参与人次后取余数，余数加上10,000,001作为“幸运码”。
																</td>
															</tr>
															<tr>
																<td>
																	<label>
																		<input name="winningRule" type="radio" class="ace" value="2" <?php echo $ganeral ? (val($ganeral, 'winningRule', 0) == '2' ? "checked" : ''): '';?>>
																		<span class="lbl"> 老时彩</span>
																	</label>
																</td>
																<td>
																	取最近一期中国福利彩票“老时时彩”的开奖结果+100组数值之和除以商品总需参与人次后取余数，余数加上10,000,001作为“幸运码”
																</td>
															</tr>
														</table>
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													购买完等待揭晓时间(秒)：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<input type="text" id="intervalRime" name="intervalRime" class="form-control" value="<?php echo val($ganeral, 'intervalRime', 0);?>" placeholder="时间单位为秒"  />
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													前端商品排序：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short checkbox-container">
														<label>
															<input name="tagSort" type="radio" class="ace" value="1" <?php echo $ganeral ? (val($ganeral, 'tagSort', 0) == '1' ? "checked" : ''): 'checked';?>>
															<span class="lbl"> 按进度排序</span>
														</label>
														&nbsp;&nbsp;&nbsp;
														<label>
															<input name="tagSort" type="radio" class="ace" value="2" <?php echo $ganeral ? (val($ganeral, 'tagSort', 0) == '2' ? "checked" : ''): '';?>>
															<span class="lbl"> 自定义排序</span>
														</label>


													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													匹配关键词：
												</td>
												<td>
													<div class="form-group no-margin-left no-margin-right mt4 short">
														<input type="text" id="match" name="match" class="form-control" value="<?php echo val($ganeral, 'match', '');?>" placeholder="当用户回复特定关键词时推送商城首页给用户" />
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
									<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit" data-href="/yiyuan/admin/config/general" data-action="submit" data-refresh="window" data-mask="parent"><i class="ace-icon fa fa-save"></i> 保存</button>
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