<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>添加运费模板</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public/??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css"/>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/js/duallistbox/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public/js/duallistbox/css/select2.css" />
		<link rel="stylesheet" type="text/css" href="{__STATIC_URL__}/public/js/duallistbox/css/bootstrap-duallistbox.css">
		<link rel="stylesheet" type="text/css" href="{__STATIC_URL__}/public/js/duallistbox/css/bootstrap-multiselect.csss">
	</head>

	<body class="no-skin">
		<style type="text/css">
			body {
				background-color: #fff;
			}
		</style>
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/config/freight/add.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li>
								<a href="/shop/SupplierAdmin/Settings/Freight">运费设置</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-plus"></i> 添加运费模板</a>
							</li>
						</ul>
						<form method="post" action="/shop/SupplierAdmin/Settings/Freight/add"  data-submit="auto">
							<div class="tab-content  padding-0 pt10">
								<div id="tab1" class="tab-pane active">
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="freightName"><strong>快递名称：</strong></label>
										</div>
										<div class="control-wrapper short">
											<input type="text" id="" name="" class="form-control" value="" placeholder="运费模板名称">
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="freightName"><strong>运费方式：</strong></label>
										</div>
										<div class="control-wrapper short">
											<label>
												<input name="transfer_type" type="radio" data-type="baoyou" class="ace transfer" value="0" checked>
												<span class="lbl"> 包邮</span>
											</label>
											<label>
												<input name="transfer_type" type="radio" data-type="zdyf" class="ace transfer" value="0">
												<span class="lbl"> 指定运费</span>
											</label>
										</div>
									</div>
									<div class="form-group" id="trasfer" style="display:none">
										<div class="label-wrapper">
											<label class="" for="express"><strong>运送方式：</stron></label>
										</div>
										<div class="control-wrapper">
											<div class="h4 bld" style="padding-top: 8px;">除了指定地区外，其他地区的运费采用“默认运费”</div>
											<!-- 运费开始 -->
											<div>
												<!--固定运费(end)-->
												<!--按件计费(start)-->
												<table class="table table-bordered table-striped ">
													<tbody>
														<tr>
															<td class="center inner-title  unit-label" width="200">默认运费：</td>
															<td class="center" width="250">
																<div class="input-group">
																	<input type="text" value="" name="[]" class="form-control"><span class="input-group-addon">件</span>
																</div>
															</td>
															<td class="center" width="250">
																<div class="input-group">
																	<input type="text" value="" name="[]" class="form-control"><span class="input-group-addon">元</span>
																</div>
															</td>
															<td width="100" class="center inline-title unit-label">每增加</td>
															<td class="center" width="250">
																<div class="input-group">
																	<input type="text" value="" name="[]" class="form-control"><span class="input-group-addon">件</span>
																</div>
															</td>
															<td width="100" class="center inline-title unit-label">增加运费</td>
															<td class="center" width="250">
																<div class="input-group">
																	<input type="text" value="" name="[]" class="form-control"><span class="input-group-addon">元</span>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<!-- 运费结束 -->
											<div class="help-block" style="padding: 10px 0;">
												<a href="http://placehold.it" id="add_template">为其他城市设置运费模板</a>
											</div>
											<!-- 另外城市模板 -->
											<!--按件计费(end)-->
											<div class="form-group" id="template" style="display:none;">
												<!-- 运费开始 -->
												<div>
													<!--固定运费(end)-->
													<!--按件计费(start)-->
													<table class="table table-bordered table-striped ">
														<tbody>
															<tr>
																<td class="center inner-title  unit-label" width="200">默认运费：</td>
																<td class="center" width="250">
																	<div class="input-group">
																		<input type="text" value="" name="[]" class="form-control"><span class="input-group-addon">件</span>
																	</div>
																</td>
																<td class="center" width="250">
																	<div class="input-group">
																		<input type="text" value="" name="[]" class="form-control"><span class="input-group-addon">元</span>
																	</div>
																</td>
																<td width="100" class="center inline-title unit-label">每增加</td>
																<td class="center" width="250">
																	<div class="input-group">
																		<input type="text" value="" name="[]" class="form-control"><span class="input-group-addon">件</span>
																	</div>
																</td>
																<td width="100" class="center inline-title unit-label">增加运费</td>
																<td class="center" width="250">
																	<div class="input-group">
																		<input type="text" value="" name="[]" class="form-control"><span class="input-group-addon">元</span>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												<!-- 运费结束 -->
												<div class="">
													<div class="h4 bold">请选择区域</div>
													<select id="category1" data-tip="省份" multiple="multiple" size="10" name="provinces[]" id="duallist">
														<!-- <option value="请选择省份" data-id="0" selected>请选择省份</option> -->
														<option value="440000" data-id="440000">广东省</option>
														<option value="110000" data-id="110000">北京</option>
														<option value="120000" data-id="120000">天津</option>
														<option value="130000" data-id="130000">河北省</option>
														<option value="140000" data-id="140000">山西省</option>
														<option value="150000" data-id="150000">内蒙古</option>
														<option value="210000" data-id="210000">辽宁省</option>
														<option value="220000" data-id="220000">吉林省</option>
														<option value="230000" data-id="230000">黑龙江省</option>
														<option value="310000" data-id="310000">上海</option>
														<option value="320000" data-id="320000">江苏省</option>
														<option value="330000" data-id="330000">浙江省</option>
														<option value="340000" data-id="340000">安徽省</option>
														<option value="350000" data-id="350000">福建省</option>
														<option value="360000" data-id="360000">江西省</option>
														<option value="370000" data-id="370000">山东省</option>
														<option value="410000" data-id="410000">河南省</option>
														<option value="420000" data-id="420000">湖北省</option>
														<option value="430000" data-id="430000">湖南省</option>
														<option value="450000" data-id="450000">广西</option>
														<option value="460000" data-id="460000">海南省</option>
														<option value="500000" data-id="500000">重庆市</option>
														<option value="510000" data-id="510000">四川省</option>
														<option value="520000" data-id="520000">贵州省</option>
														<option value="530000" data-id="530000">云南省</option>
														<option value="540000" data-id="540000">西藏</option>
														<option value="610000" data-id="610000">陕西省</option>
														<option value="620000" data-id="620000">甘肃省</option>
														<option value="630000" data-id="630000">青海省</option>
														<option value="640000" data-id="640000">宁夏</option>
														<option value="650000" data-id="650000">新疆</option>
														<option value="710000" data-id="710000">台湾</option>
														<option value="810000" data-id="810000">香港特别行政区</option>
														<option value="820000" data-id="820000">澳门特别行政区</option>
														<input type="hidden" id="area_select">
													</select>
													<input type="hidden" id="city_data">
												</div>
											</div>
											<!-- 另外城市模板 -->
										</div>
									</div>
								</div>
							</div>
							<div class="space"></div>
							<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit" data-href="/shop/supplierAdmin/settings/freight/add" ><i class="ace-icon fa fa-save"></i> 保存</button>
							<div class="space"></div>
						</form>
					</div>
					<!--内容结束-->
				</div>
			</div>
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

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/freight/add.js"></script>

		<script type="text/javascript">
			window.jQuery || document.write("<script src='{__STATIC_URL__}/public/assets/js/jquery.js'>"+"<"+"/script>");
		</script>	

		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		<script src="{__STATIC_URL__}/public/js/duallistbox/js/jquery.bootstrap-duallistbox.js"></script>
			
		<!-- ace scripts -->	
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('#add_template').on('click', function (e) {
					General.stopEvent(e);
					$('#template').slideToggle();
				})

				$('.transfer').on('click', function() {
					var type = $(this).data('type');
					init(type);
				})

				function init (type) {
					if (type == 'baoyou') {
						$('#trasfer').hide();
					} else if (type == 'zdyf') {
						$('#trasfer').show();
					}	
				}
				
				$('.transfer').on('click', function () {

				})
			})
			jQuery(function($){
			    var demo1 = $('#category1').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
				var container1 = demo1.bootstrapDualListbox('getContainer');
				container1.find('.btn').addClass('btn-white btn-info btn-bold');			
			});
		</script>
	</body>
</html>