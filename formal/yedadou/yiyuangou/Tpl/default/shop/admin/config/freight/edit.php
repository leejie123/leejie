<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>编辑运费模板</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/config/freight/add.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li>
								<a href="/shop/admin/config/freight">运费设置</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-edit"></i> 编辑运费模板</a>
							</li>
						</ul>
						<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
                            <input type="hidden" name="id" value="<?php echo $freight ? $freight['id'] : '';?>"/>
                            <input type="hidden" name="is_fixed" value="<?php  echo $freight ? array_key_exists('is_fixed',$freight['config']) ? $freight['config']['is_fixed']:'' : '';?>"/>
							<div class="tab-content  padding-0 pt10">
								<div id="tab1" class="tab-pane active">

									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="freightName"><strong>名称：</strong></label>
										</div>
										<div class="control-wrapper">
											<input type="text" id="freightName" name="freightName" class="form-control" value="<?php echo $freight ? $freight['name'] : '';?>" placeholder="请输入名称">
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="express"><strong>快递名称：</strong></label>
										</div>
										<div class="control-wrapper">
											<select id="express" name="express" class="form-control">
												<option value="<?php echo $freight ? $freight['express'] : '0';?>" selected><?php echo $freight ? $freight['expressName'] : '请选择快递名称';?></option>
												<?=$kuaidiOptions?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="countType"><strong>计算方式：</strong></label>
										</div>
										<div class="control-wrapper">
											<select id="countType" name="countType" class="form-control">
												<option value="1" <?php echo $freight ? ($freight['type'] == '1' ? 'selected':'') : '';?>>固定运费</option>
												<option value="2"<?php echo $freight ? ($freight['type'] == '2' ? 'selected':'') : '';?>>按件计费</option>
												<option value="3"<?php echo $freight ? ($freight['type'] == '3' ? 'selected':'') : '';?>>按重量计算</option>
											</select>
										</div>
									</div>
									<!--运费模板对应上面下拉列表中的模式,被选中的要在class里加上active,否则去掉active-->
									<!--固定运费(start)-->
									<div class="type-content active">
										<div class="form-group">
											<div class="label-wrapper">
												<label class="" for=""><strong>运费：</strong></label>
											</div>
											<div class="control-wrapper">
												<div class="input-group">
													<input type="text" value="<?php  echo $freight ? $freight['config']['price']['fixMoney'] : '';?>" name="fixMoney" class="form-control"><span class="input-group-addon">元</span>
												</div>
											</div>
										</div>
									</div>
									<!--固定运费(end)-->
									<!--按件计费(start)-->
									<div class="type-content">
										<div class="form-group">
											<div class="label-wrapper">
												<label class="" for=""><strong>运费：</strong></label>
											</div>
											<div class="control-wrapper">
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td class="center inner-title  unit-label">首件</td>
															<td class="center">
																<div class="input-group">
																	<input type="text" value="<?php  echo $freight ? array_key_exists(0,$freight['config']['price']['pieceFirst']) ? $freight['config']['price']['pieceFirst'][0]:'' : '';?>" name="pieceFirst[]" class="form-control"><span class="input-group-addon">件</span>
																</div>
															</td>
															<td class="center">
																<div class="input-group">
																	<input type="text" value="<?php  echo $freight ? array_key_exists(1,$freight['config']['price']['pieceFirst']) ? $freight['config']['price']['pieceFirst'][1]:'' : '';?>" name="pieceFirst[]" class="form-control"><span class="input-group-addon">元</span>
																</div>
															</td>
														</tr>
														<tr>
															<td class="center inner-title unit-label">续件</td>
															<td class="center">
																<div class="input-group">
																	<input type="text" value="<?php  echo $freight ? array_key_exists(0,$freight['config']['price']['pieceOther']) ? $freight['config']['price']['pieceOther'][0]:'' : '';?>" name="pieceOther[]" class="form-control"><span class="input-group-addon">件</span>
																</div>
															</td>
															<td class="center">
																<div class="input-group">
																	<input type="text" value="<?php  echo $freight ? array_key_exists(1,$freight['config']['price']['pieceOther']) ? $freight['config']['price']['pieceOther'][1]:'' : '';?>" name="pieceOther[]" class="form-control"><span class="input-group-addon">元</span>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!--按件计费(end)-->

								</div>
							</div>
							<div class="space"></div>
							<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit"  data-href="/shop/admin/config/freight/update" data-action="submit" data-refresh="window" data-mask="parent" ><i class="ace-icon fa fa-save"></i> 保存</button>
							<div class="space"></div>
						</form>
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
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="auto"></iframe>
		</div>

		<!--模板-固定运费-->
		<table class="hide">
			<tbody id="tpl-fix">
				<tr>
					<td class="text-left area">
						<input type="hidden" name="fixAreaIds[]" value="" />
					</td>
					<td class="center">
						<div class="input-group">
							<input type="text" value="" name="fixMoney" class="form-control"><span class="input-group-addon">元</span>
						</div>
					</td>
					<td class="center fix-delete">
						<a href="#" class="blue" data-id="delete">删除</a>
					</td>
				</tr>
			</tbody>
		</table>

		<!--模板-按件计费-->
		<table class="hide">
			<tbody id="tpl-piece">
				<tr>
					<td class="text-left area">
						<input type="hidden" name="pieceAreaIds[]" value="" />
					</td>
					<td class="center no-padding">
						<table class="table no-border">
							<tbody>
								<tr>
									<td class="center inner-title border-right unit-label">首件</td>
									<td class="center border-right">
										<div class="input-group">
											<input type="text" value="" name="pieceFirstCount[]" class="form-control"><span class="input-group-addon">件</span>
										</div>
									</td>
									<td class="center">
										<div class="input-group">
											<input type="text" value="" name="pieceFirstMoney[]" class="form-control"><span class="input-group-addon">元</span>
										</div>
									</td>
								</tr>
								<tr>
									<td class="center inner-title border-right border-top unit-label">续件</td>
									<td class="center border-right border-top">
										<div class="input-group">
											<input type="text" value="" name="pieceOtherCount[]" class="form-control"><span class="input-group-addon">件</span>
										</div>
									</td>
									<td class="center border-top">
										<div class="input-group">
											<input type="text" value="" name="pieceOtherMoney[]" class="form-control"><span class="input-group-addon">元</span>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
					<td class="center piece-delete">
						<a href="#" class="blue" data-id="delete">删除</a>
					</td>
				</tr>
			</tbody>
		</table>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/freight/edit.js"></script>
	</body>

</html>