<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>回复</title>
		<meta name="iewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
		<style type="text/css">
		.time_tip{margin-left: 10px;width: 600px;}
		</style>
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap-datetimepicker.css,/assets/css/bootstrap-timepicker.css,/admin/css/shop/product/list/add.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li>
								<a href="/yiyuan/admin/show/showList/get">晒单列表</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-plus"></i> 回复</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<form method="post" action="/yiyuan/admin/show/showList/add" >
									<div class="space-2"></div>
									<div class="tabbable">

										<div class="tab-content padding-0 pt10">
											<div id="t1" class="tab-pane active clearfix">
												<div class="clearfix ">
													<div>
														<label class="" style="width: 145px;text-align: right;"><strong>商品名称：</strong></label>
														<span class="lbl"><?=val($term,'goods_title','') ?></span>
													</div>
													<div>
														<label class="" style="width: 145px;text-align: right;"><strong>商品ID：</strong></label>
														<span class="lbl"><?=val($term,'goods_id','') ?></span>
													</div>
													<div>
														<label class="" style="width: 145px;text-align: right;"><strong>会员昵称：</strong></label>
														<span class="lbl"><?=val($term,'hit_nick','') ?></span>
													</div>
													<div>
														<label class="" style="width: 145px;text-align: right;"><strong>会员ID：</strong></label>
														<span class="lbl"><?=val($term,'hit_uid','') ?></span>
													</div>
													<div>
														<label class="" style="width: 145px;text-align: right;"><strong>晒单标题：</strong></label>
														<span class="lbl"><?=val($share,'title','') ?></span>
													</div>
													<div>
														<label class="" style="width: 145px;text-align: right;"><strong>晒单内容：</strong></label>
														<span class="lbl"><?=val($share,'content','') ?></span>
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="">
														<strong style="display: block;">晒单图片：</strong>
														</label>
													</div>
													<div class="control-wrapper ">
														<ul class="image-list" id="imageList">
															<?php if(!empty($share['share_img'] )){?>
															<?php foreach ($share['share_img'] as $key=>$v):?>
															<li>
																<img id="previewImage1"  src="<?=isset($v)?$v:'{__STATIC_URL__}/public/admin/images/noupload.png';?>">
															</li>
															<?php endforeach;?>
															<?php }?>
														</ul>
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="description">
														<strong style="display: block;">回复TA：</strong>
														</label>
													</div>
													<div class="control-wrapper long">
														<textarea  name="content" class="form-control" placeholder=""></textarea>
													</div>
												</div>

											</div>

										</div>
									</div>
									<div class="space"></div>
									<input name="goods_id" type="hidden" value="<?=val($share,'goods_id','') ?>" />
									<input name="share_id" type="hidden" value="<?=val($share,'id','') ?>" />
									<input name="term_id" type="hidden" value="<?=val($share,'term_id','') ?>" />
									<input name="order_id" type="hidden" value="<?=val($share,'order_id','') ?>" />
									<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit"><i class="ace-icon fa fa-check"></i> 发表</button>
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

		<!--模板-属性表格行-->
		<table class="hide">
			<tbody id="tpl-parameter">
				<tr>
					<td class="">
						<input type="text" value="" name="sku[param1][]" class="form-control" placeholder="">
					</td>
					<td class="">
						<input type="text" value="" name="sku[param2][]" class="form-control" placeholder="">
					</td>
					<td class="">
						<input type="text" value="" name="sku[price][]" class="form-control" placeholder="">
					</td>
					<td class="">
						<input type="text" value="" name="sku[stock][]" class="form-control" placeholder="">
					</td>
					<td class="center pt14">
						<a href="#" class="blue" data-id="delete">删除</a>
					</td>
				</tr>
			</tbody>
		</table>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/moment.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/zh-cn.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datetimepicker.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-timepicker.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/js/Sortable.min.js"></script>
		<script type="text/javascript">
			window.kindeditorUpUrl='<?=site_url()?>/yiyuan/common/upLoad';
		</script>
		<script src="{__STATIC_URL__}/public/yiyuan/admin/product/add.js"></script>

	</body>

</html>