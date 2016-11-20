<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>多门店设置</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/assets/css/jquery-ui.css" />
	</head>

	<body>
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/config/multiStore/index.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">

							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-edit"></i>多门店设置</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<form class="form-horizontal" method="post" action="" enctype="multipart/form-data"  data-submit="auto">
									<table id="" class="table table-bordered">
										<tbody>
											<tr>
												<td class="left-td">
													启用门店类型：
												</td>
												<td>
													<div class="checkbox-container">
														<label class="pos-rel mr20">
															<input name="directStore" type="checkbox" class="ace" value="1" <?php echo $multiStore ? (array_key_exists('directStore', $multiStore) && $multiStore['directStore']  ? 'checked':''): '';?>/>
															<span class="lbl"> 直营店</span>
														</label>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<label class="pos-rel">
															<input name="joinStore" type="checkbox" class="ace" value="2" <?php echo $multiStore ? (array_key_exists('joinStore', $multiStore)&& $multiStore['joinStore'] ? 'checked':''): '';?>/>
															<span class="lbl"> 加盟店</span>
														</label>
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													<div class="space"></div>
													<div class="space"></div>
													直营店设置：
												</td>
												<td class="no-padding">
													<div class="row-container">
														<label for="" class="label-box">允许店员参与分佣：</label>
														<label class="pos-rel first-radio">
															<input name="participate" type="radio" class="ace" value="1" <?php echo $multiStore ? (array_key_exists('participate', $multiStore)&& $multiStore['participate']  ? 'checked':''): 'checked';?>>
															<span class="lbl"> 允许</span>
														</label>
														<label class="pos-rel last-radio">
															<input name="participate" type="radio" class="ace" value="0" <?php echo $multiStore ? (array_key_exists('participate', $multiStore)&& $multiStore['participate']  ? '':'checked'): '';?>>
															<span class="lbl"> 不允许</span>
														</label>
														<span class="description">设置允许时，门店及店员均为代理商，其代理级别请在门店管理的员工列表中设置</span>
													</div>
													<div class="row-container no-border">
														<label for="" class="label-box">门店销售的商品：</label>
														<label class="pos-rel first-radio">
															<input name="product" type="radio" class="ace" value="1" <?php echo $multiStore ? (array_key_exists('product', $multiStore)&& $multiStore['product']  ? 'checked':''): 'checked';?>>
															<span class="lbl"> 全部商品</span>
														</label>
														<label class="pos-rel last-radio">
															<input name="product" type="radio" class="ace" value="0" <?php echo $multiStore ? (array_key_exists('product', $multiStore) && $multiStore['product'] ? '':'checked'): '';?>>
															<span class="lbl"> 指定商品</span>
														</label>
														<span class="description">指定商品时须手动添加商品，请在门店管理中的商品列表中添加，门店不可修改商城发布的商品属性和价格</span>
													</div>
												</td>
											</tr>
											<tr>
												<td class="left-td">
													<div class="space"></div>
													<div class="space"></div>
													<div class="space"></div>
													<div class="space"></div>
													<div class="space"></div>
													<div class="space"></div>
													<div class="space-10"></div>
													加盟店设置：
												</td>
												<td class="no-padding">
													<div class="row-container">
														<label for="" class="label-box">允许店员参与分佣：</label>
														<label class="pos-rel first-radio">
															<input name="participate2" type="radio" class="ace" value="1" <?php echo $multiStore ? (array_key_exists('participate2', $multiStore)&& $multiStore['participate2'] ? 'checked':''): 'checked';?>>
															<span class="lbl"> 允许</span>
														</label>
														<label class="pos-rel last-radio">
															<input name="participate2" type="radio" class="ace" value="0" <?php echo $multiStore ? (array_key_exists('participate2', $multiStore)&& $multiStore['participate2'] ? '':'checked'): '';?>>
															<span class="lbl"> 不允许</span>
														</label>
														<span class="description">设置允许时，门店及店员均为代理商，其代理级别请在门店管理的员工列表中设置</span>
													</div>
													<div class="row-container">
														<label for="" class="label-box">门店销售的商品：</label>
														<label class="pos-rel first-radio">
															<input name="product2" type="radio" class="ace" value="1" <?php echo $multiStore ? (array_key_exists('product2', $multiStore)&& $multiStore['product2']  ? 'checked':''): '';?>>
															<span class="lbl"> 全部商品</span>
														</label>
														<label class="pos-rel last-radio">
															<input name="product2" type="radio" class="ace" value="0" <?php echo $multiStore ? (array_key_exists('product2', $multiStore)&& $multiStore['product2']  ? '':'checked'): 'checked';?>>
															<span class="lbl"> 指定商品</span>
														</label>
														<span class="description">指定商品时须手动添加商品，请在门店管理中的商品列表中添加，门店不可修改商城发布的商品属性和价格</span>
														<div id="decideContainer" class="hide">
															<div class="space-10"></div>
															<label for="" class="label-box"></label>
															<label class="pos-rel mr20">
																<input name="decide" type="checkbox" class="ace" value="<?php echo $multiStore ? (array_key_exists('decide', $multiStore) ? $multiStore['decide']:''): '';?>"/>
																<span class="lbl"> 由门店自主选择添加商品</span>
															</label>
														</div>
													</div>
													<div class="row-container no-border">
														<div class="mb20">
															<label for="" class="label-box">允许销售其他商品：</label>
															<label class="pos-rel first-radio">
																<input name="other2" type="radio" class="ace" value="1" <?php echo $multiStore ? (array_key_exists('other2', $multiStore)&& $multiStore['other2']  ? 'checked':''): 'checked';?>>
																<span class="lbl"> 允许</span>
															</label>
															<label class="pos-rel last-radio">
																<input name="other2" type="radio" class="ace" value="0" <?php echo $multiStore ? (array_key_exists('other2', $multiStore)&& $multiStore['other2']  ? '':'checked'): '';?>>
																<span class="lbl"> 不允许</span>
															</label>
															<span class="description">指定商品时请在门店管理中的商品列表中添加；门店不可修改商城发布的商品属性和价格</span>
														</div>
														<div class="mb20">
															<label for="" class="label-box">添加其他商品是否需要审核：</label>
															<label class="pos-rel first-radio">
																<input name="audit" type="radio" class="ace" value="1" <?php echo $multiStore ? (array_key_exists('audit', $multiStore)&& $multiStore['audit']   ? 'checked':''): '';?>>
																<span class="lbl"> 需要</span>
															</label>
															<!--<label class="pos-rel last-radio">
																<input name="audit" type="radio" class="ace" value="0">
																<span class="lbl"> 不需要</span>
															</label>-->
														</div>
														<div class="input-container">
															<label for="" class="label-box pull-left">门店销售其他商品代收款抽成：</label>
															<div class="right-box">
																<div class="input-group">
																	<input type="text" value="<?php echo $multiStore ? (array_key_exists('commission', $multiStore) ? $multiStore['commission']:''): '';?>" name="commission" id="commission" class="form-control" placeholder="">
																	<span class="input-group-addon">%</span>
																</div>
															</div>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<div class="space"></div>
									<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit" data-href="/shop/admin/config/MultiStore" data-action="submit" data-refresh="window" data-mask="parent"><i class="ace-icon fa fa-save"></i> 保存</button>
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
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/multiStore/index.js"></script>
	</body>

</html>