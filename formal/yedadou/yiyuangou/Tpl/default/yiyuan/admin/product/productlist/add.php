<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>添加商品</title>
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
								<a href="/yiyuan/admin/product/productList/get">商品列表</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-plus"></i> 添加商品</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<form method="post" action="/yiyuan/admin/product/productList/add" >
									<div class="space-2"></div>
									<div class="tabbable">

										<div class="tab-content padding-0 pt10">
											<div id="t1" class="tab-pane active clearfix">
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>排序：</strong></label>
													</div>
													<div class="control-wrapper short">													
														<label>
															<input name="sort_order" value="99999" type="text">			
														</label>
														<span class="help-block">
															说明：排序值越大则排序越靠后。
														</span>															
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>商品分类：</strong></label>
													</div>
													<div class="control-wrapper short">
														<!--分类数据-->

														<input type="hidden" name="categoryData" id="categoryData" value='<?php echo $cateJson; ?>'/> 
														<select id="category1" name="category1" data-tip="请选择一级分类">
														</select>
														&nbsp;
														<select id="category2" name="category2" data-tip="请选择二级分类">
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="title"><strong>商品标题：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="title" name="title" type="text" class="form-control" value="" placeholder="最多只能输入30个汉字或60个英文字符" />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="subTitle"><strong>商品副标题：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="subTitle" name="sub_title" type="text" class="form-control" value="" placeholder="" />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="serialNumber"><strong>编码：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="serialNumber" name="code" type="text" class="form-control" value="" placeholder="" />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>商品属性：</strong></label>
													</div>
													<div class="control-wrapper short">
														<label>
															<span class="lbl"> 推荐</span>
														</label>
														<label>
															<select id="tag_recommend" name="tag_recommend">
																<option value="0" selected>无</option>
																<?php for($i=1; $i<=20;$i++){?>
																<option value="<?=$i?>" ><?php echo "推荐".$i;?></option>
																<?php } ?>
															</select>
															&nbsp;
														</label>
														<label>
															<span class="lbl"> 人气</span>
														</label>
														<label>
															<select id="tag_popular" name="tag_popular">
																<option value="0" selected>无</option>
																<?php for($i=1; $i<=20;$i++){?>
																<option value="<?=$i?>" ><?php echo "人气".$i;?></option>
																<?php } ?>
															</select>
															&nbsp;
														</label>
														<label>
															<span class="lbl"> 新品</span>
														</label>
														<label>
															<select id="tag_new" name="tag_new">
																<option value="0" selected>无</option>
																<?php for($i=1; $i<=20;$i++){?>
																<option value="<?=$i?>" ><?php echo "新品".$i;?></option>
																<?php } ?>
															</select>
															&nbsp;
														</label>
														<label>
															<span class="lbl"> 年货</span>
														</label>
														<label>
															<select id="tag_stocking" name="tag_stocking">
																<option value="0" selected>无</option>
																<?php for($i=1; $i<=20;$i++){?>
																<option value="<?=$i?>" ><?php echo "年货".$i;?></option>
																<?php } ?>
															</select>
															&nbsp;
														</label>
														<span class="help-block">
															说明：级别越高排序越靠前，例如设为推荐1将排在推荐商品最前。
														</span>
													</div>
												</div>
												<!-- <div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>商品属性：</strong></label>
													</div>
													<div class="control-wrapper short">
														<label>
															<input name="tag_re" type="checkbox" class="ace" value="1" >
															<span class="lbl"> 推荐</span>
															<input name="tag_recommend" type="input" class="ace" value="0">
														</label>
														</br>
														<label>
															<input name="tag_po" type="checkbox" class="ace" value="1" >
															<span class="lbl"> 人气</span>
															<input name="tag_popular" type="input" class="ace" value="0">
														</label>
														</br>
														<label>
															<input name="tag_ne" type="checkbox" class="ace" value="1" >
															<span class="lbl"> 新品</span>
															<input name="tag_new" type="input" class="ace" value="0">
														</label>
														<span class="help-block">
															说明：数值默认为零则表示未选中该属性，数值越大则排序越靠后。
														</span>
													</div>
												</div> -->
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="price"><strong>商品总价：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="" name="price" id="price" class="form-control" placeholder="">
															<span class="input-group-addon">元</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="oncePrice"><strong>购买单次价格：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="1" name="code_price" id="oncePrice" class="form-control" placeholder="">
															<span class="input-group-addon">元</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="maxNumber"><strong>最大期数：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="" name="term_num" id="maxNumber" class="form-control" placeholder="期数上限为65535期,每期揭晓后会根据此值自动添加新一期商品！">
															<span class="input-group-addon">期</span>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="">
														<strong style="display: block;">商品图片：</strong>
														<span class="font-red" style="float: left;">(单张&lt;2M)</span>
														</label>
													</div>
													<div class="control-wrapper ">
														<ul class="image-list" id="imageList">
															<li>
																<img id="previewImage1" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
																<input type="hidden" name="img_list[]" id="imageUrl1" value="" />
																<button class="btn btn-info btn-xs" id="upload1" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel1" type="button">删除</button>
															</li>
															<li>
																<img id="previewImage2" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
																<input type="hidden" name="img_list[]" id="imageUrl2" value="" />
																<button class="btn btn-info btn-xs" id="upload2" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel2" type="button">删除</button>
															</li>
															<li>
																<img id="previewImage3" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
																<input type="hidden" name="img_list[]" id="imageUrl3" value="" />
																<button class="btn btn-info btn-xs" id="upload3" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel3" type="button">删除</button>
															</li>
															<li>
																<img id="previewImage4" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
																<input type="hidden" name="img_list[]" id="imageUrl4" value="" />
																<button class="btn btn-info btn-xs" id="upload4" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel3" type="button">删除</button>
															</li>
															<li>
																<img id="previewImage5" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
																<input type="hidden" name="img_list[]" id="imageUrl5" value="" />
																<button class="btn btn-info btn-xs" id="upload5" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel3" type="button">删除</button>
															</li>
														</ul>
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="base"><strong>返佣基数：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="0" name="base_commission" id="base" class="form-control" placeholder="">
															<span class="input-group-addon">元</span>
														</div>
														<span class="help-block">
															说明：佣金计算方式为：<span style="font-weight: bold;">（购买单价 x 购买数量）/ 商品总价  x 返佣基数 x 返佣比例</span>。
															</br>商品不进行分销，设置返佣基数为0；请用积分形式返佣，且积分兑换比例≥100； 
														</span>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>分享积分：</strong></label>
													</div>
													<div class="control-wrapper short">
														<label>
															<input name="is_share" type="checkbox" class="ace" value="1">
															<span class="lbl"> 分享可获得积分</span>
														</label>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>开始时间：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div  class="time-container ">
															<input id="bTime" name="begin_time" type="text" class="">
														</div>
														<span class="lbl">*如不填写，商品添加成功后立即开始！</span>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>限时揭晓：</strong></label>
													</div>
													<div class="control-wrapper short">
														<label>
															<input name="is_interval" type="radio" class="ace" value="0" checked="true">
															<span class="lbl"> 不启用限时</span>
														</label>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<span>*购买人次达到所需总人次时即刻揭晓，同时自动开始下一期。</span>
													</div>
													<div class="control-wrapper short">
														<div  class="time-container ">
															<label>
																<input name="is_interval" type="radio" class="ace" value="1" >
																<span class="lbl"> 限时揭晓</span>
															</label>
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<label class="" for="iTime">揭晓时间：</label>
															<input id="iTime" name="interval_time" type="text" class="">
														</div>
														<span class="lbl">*限时揭晓只可进行一期。若揭晓时购买人次未满足所需，揭晓时同样会根据规则产生幸运码。</span>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="description">
														<strong style="display: block;">商品详情：</strong>
														<span class="font-red" style="float: left;">(单张&lt;2M)</span>
														</label>
													</div>
													<div class="control-wrapper long">
														<textarea id="description" name="desc" class="form-control" placeholder=""></textarea>
													</div>
												</div>

											</div>

										</div>
									</div>
									<div class="space"></div>
									<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit"><i class="ace-icon fa fa-check"></i> 提交</button>
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