
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>编辑商品</title>
		<meta name="iewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />

	</head>

	<body class="no-skin">
		<style type="text/css">
			th > input {
				width: 100px;
			}
			.inline{
				display: inline;
			}
		</style>
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap-datetimepicker.css,/admin/css/shop/product/list/add.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-edit"></i> 编辑商品</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<form method="post" action="/yiyuan/pintuan/admin/product/addProduct/add" >
								<input type="hidden" name="goodsId" value="<?=val($goods,'goods_id')?>">
									<div class="space-2"></div>
									<div class="tabbable">
										<ul class="nav nav-tabs" id="productTab">
											<li class="">
												<a data-toggle="tab" href="#t1">基本信息</a>
											</li>
										</ul>

										<div class="tab-content padding-0 pt10">
											<div id="t1" class="tab-pane active clearfix">
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="sort_order"><strong>商品排序：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="sort_order" name="sort_order" type="text" class="form-control" value="<?=val($goods,'sort_order')?>"  />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="title"><strong>商品标题：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input  id="title" name="title" type="text" class="form-control" value="<?=val($goods,'title')?>" />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="subTitle"><strong>商品副标题：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="subTitle"  name="subTitle" type="text" class="form-control" value="<?=val($goods,'sub_title')?>" />
													</div>
												</div>
												<div class="form-group clearfix">
													<div class="label-wrapper">
														<label class="" for="yiyuan_price"><strong>商品总价：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group  pull-left">
															<input type="text"  readonly value="<?=val($goods,'yiyuan_price')?>" name="yiyuanPrice" id="yiyuan_price" class="form-control" >
															<span class="input-group-addon">元</span>
														</div>
													</div>
												</div>
												<div class="form-group clearfix">
													<div class="label-wrapper">
														<label class="" for="price"><strong>拼团价：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group  pull-left">
															<input type="text"  value="<?=val($goods,'price')?>" name="price" id="price" class="form-control" >
															<span class="input-group-addon">元</span>
														</div>
													</div>
												</div>
												<div class="form-cotnrol">
													<div class="label-wrapper">
														<label class="" for="commission"><strong>团长提成：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text"  value="<?=val($goods,'commission')?>" name="commission" id="commission" class="form-control" >
															<span class="input-group-addon">元</span>
														</div>
														<div class="help-block"><span class="color-red">*</span> 价格必须为整数</div>
													</div>
												</div>
												<div class="form-group clearfix">
													<div class="pull-left" style="width:40%;">
														<div class="label-wrapper">
															<label class="" for="stock"><strong>总库存：</strong></label>
														</div>
														<div class="control-wrapper short">
															<div class="input-group ">
																<input type="text"  value="<?=val($goods,'stock')?>" name="stock" id="stock" class="form-control" placeholder="">
																<span class="input-group-addon">件</span>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="max_turnout"><strong>最多参与人数：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="<?=val($goods,'max_turnout')?>" name="maxTurnout" id="max_turnout" class="form-control" >
															<span class="input-group-addon">人</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong style="display: block;">商品图片：</strong><span  class="font-red" style="float: left;">(单张<2M)</span></label>
													</div>
													<div class="control-wrapper ">
														<ul class="image-list" id="imageList">
														<?php if(!empty($goods['img_list'])){?>
														<?php $imgs = json_decode($goods['img_list']);?>
														<?php foreach ($imgs as $item):?>
														<li>
																<img id="previewImage1" class="preview-image" src="<?php echo $item?$item:'{__STATIC_URL__}/public/admin/images/noupload.png';?> " >
																<input type="hidden" name="imgList[]" id="imageUrl1" value="<?=$item?>" />
																<button class="btn btn-info btn-xs" id="upload1" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel1" type="button">删除</button>
															</li>
														<?php endforeach;?>
														<?php }?>
													</div>
												</div> 
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="description"><strong>商品详情：</strong></label>
													</div>
													<div class="control-wrapper long">
														<textarea  id="description" name="desc" class="form-control height80" placeholder=""><?=htmlspecialchars_decode(val($goods,'desc',''))?></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
										</div>
									</div>
									<div class="space"></div>
									<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit"><i class="ace-icon fa fa-save"></i> 保存</button>
									<button class="btn btn-info" type="button"  onclick="history.go(-1)"><i class="ace-icon fa fa-undo"></i>取消</button>
									<div class="space"></div>
								</form>
							</div>
						</div>
					</div>
					<!--内容结束-->
				</div>
			</div>
		</div>
		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/moment.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/zh-cn.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datetimepicker.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/js/Sortable.min.js"></script>
		<script type="text/javascript">	
			window.kindeditorUpUrl='<?=site_url();?>/shop/common/upLoad';
		</script>
		<!-- add.js -->
		<script type="text/javascript">
			/******************** 
			作用:添加商品
			作者:蔡俊雄
			版本:V1.0
			时间:2015-08-05
			修改:2015-08-06
			修改:2015-08-14(按善强的新原型修改物流运费)
			修改:2015-08-18(添加上架时间和下架时间)
			修改:2015-08-24(商品图片改成可拖动排序)
			********************/

			$(function() {

				var categoryData = []; //分类数据
				var tableId = "#parameterTable"; //表格ID
				var upShelfUrl = ""; //上架的网址
				var offShelfUrl = ""; //下架的网址
				var deleteUrl = ""; //删除的地址
				var levelTip1 = $("#category1").attr("data-tip"); //一级产品分类提示
				var levelTip2 = $("#category2").attr("data-tip"); //二级产品分类提示
				var idNotSelect = "0"; //不选产品分类时的ID
				var eventName = 'keyup blur paste';
				
				//添加编辑器
				var kItems=[
									'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
									'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
									'insertunorderedlist', '|', 'emoticons', 'image','multiimage', 'link','videoqq'];
				var kConfigOther={
					items :kItems,
					uploadJson: window.kindeditorUpUrl,
					allowFileManager: false,
					height:300
				};
				var editor = KindEditor.create("#parameter",kConfigOther); //商品参数
				var descriptionEditor = KindEditor.create("#description",kConfigOther); //商品描述
				$('#productTab a:first').tab('show');
				//$('#productTab a:eq(2)').tab('show');
				
				//-----------------属性行操作-----------------
				//点击"增加"按钮
				$("#add").on("click", function(e) {
					General.stopEvent(e);
					//console.log('123123...');
					var str = $("#tpl-parameter_").html();
					$(str).appendTo($(tableId)).find("a[data-id=delete]:not([disabled])").on("click", function(e) {
						General.stopEvent(e);
						$(this).closest("tr").remove();
						showTotalEarnings();
					});
				});
				//点击行内"删除"按钮
				$(tableId + " a[data-id=delete]:not([disabled])").on("click", function(e) {
					General.stopEvent(e);
					$(this).closest("tr").remove();

				});

				//-----------------上传图片设置-----------------
				//编辑器设置
				var uploadEditor = KindEditor.editor(kConfigOther);
				//显示图片上传对话框
				function showImageUploadDialog(imageId, hiddenId) {
					uploadEditor.loadPlugin('image', function() {
						uploadEditor.plugin.imageDialog({
							showRemote:false,
							imageUrl: $(hiddenId).val(),
							clickFn: function(url, title, width, height, border, align) {
								$(hiddenId).val(url);
								$(imageId).attr("src", url);
								uploadEditor.hideDialog();
							}
						});
					});
				}

				function initImageUploadDialog(btnId, imageId, hiddenId) {
					$(btnId).on("click", function(e) {
						showImageUploadDialog(imageId, hiddenId);
					});
				}
				function initImageUploadDel(btnId, imageId, hiddenId){
					$(btnId).on("click", function(e) {
						$(hiddenId).val('');
						$(imageId).attr("src",'');
					});
				}
				//初始化
				function init() {
					var count = $(".image-list li").length; //总共有多少个上传图片
					var btnId, imageId, hiddenId;
					for (var i = 1; i <= count; i++) {
			//			btnId = "#previewImage" + i + ",#upload" + i;
						btnId = "#upload" + i;
						imageId = "#previewImage" + i;
						hiddenId = "#imageUrl" + i;
						initImageUploadDialog(btnId, imageId, hiddenId);
						initImageUploadDel("#uploaddel" + i, imageId, hiddenId);
					}
					initCategory(); //初始化一级分类
			//		changeFreightTemplate();
					initDatetimePicker(); //初始化选择日期时间
					
						
				}

				init(); //初始化
				
				//-----------------拖动图片排序-----------------
				var sort = new Sortable(document.getElementById("imageList"), {
					handle: ".preview-image",
					draggable: "li"
				});
				
				//-----------------物流运费中的运费模板操作-----------------
				$("input[name=freight]").on("click", function(e) {
					//获取当前组别
					var group=$(this).attr("data-group");
					var isCheck=$(this).prop("checked");
					if(isCheck){
						var allFreight=$("input[name=freight]");
						var index=allFreight.index($(this));
						if(group=="fix"){
							allFreight.prop("checked",false);
							$(this).prop("checked",true);
						}else{
							allFreight.filter("[data-group=fix]").prop("checked",false);
						}
					}
				});

				
				//-----------------商品分类关联操作-----------------
				//初始化一级分类
				function initCategory() {
					//获取数据
					try {
						//			categoryData=JSON.parse($("#categoryData").val());
						categoryData = eval($("#categoryData").val());
					} catch (e) {
						categoryData = [];
					}

					var str = '';
					str += '<option value="' + idNotSelect + '" selected>' + levelTip1 + '</option>';
					$.each(categoryData, function(index, obj) {
						str += '<option value="' + obj["id"] + '">' + obj["name"] + '</option>';
					});
					$("#category1").html(str);
					changeCategory();
					//根据一级分类切换二级分类
					$("#category1").on("change", function(e) {
						changeCategory();
					});
				};
				//切换分类
				function changeCategory() {
					var id = $("#category1").val();
					var idIndex = -1;
					$.each(categoryData, function(index, obj) {
						if (obj["id"] == id) {
							idIndex = index;
							return false;
						}
					});
					var str = '';
					str += '<option value="' + idNotSelect + '" selected>' + levelTip2 + '</option>';
					if (idIndex != -1) {
						$.each(categoryData[idIndex]["child"], function(index, obj) {
							str += '<option value="' + obj["id"] + '">' + obj["name"] + '</option>';
						});
					}
					$("#category2").html(str);
				}
				//-----------------物流运费中的运费模板操作-----------------
				//根据下拉列表的选项切换运费模板
				//	$("#freight").on("change", function(e) {
				//		changeFreightTemplate();
				//	});
				//	//切换运费模板
				//	function changeFreightTemplate() {
				//		var index = $("#freight option:checked").index();
				//		$("#t3 .type-content").removeClass("active").eq(index).addClass("active");
				//	}
					
					//粉丝框显示与隐藏
					$("#commission_role_yes").on("click", function(e) {
						
				          $('#fansCommission').show();
					});
					$("#commission_role_no").on("click", function(e) {
						
				        $('#fansCommission').hide();
					});
					
					//独立运费显示价格
					var $alone_freight=$("input:checkbox[name='alone_freight']");
					var $alone_freight_fee=$("#alone_freight_fee");
					$alone_freight.click(function(){
						
						if($(this).prop("checked")){
							$alone_freight_fee.removeClass('hide');
						}else{
							$alone_freight_fee.addClass('hide');
						}
					});
					
					
					//-----------限购与不限购
					var $purchase=$("input:radio[name='limit']");
					var $purchaseCount=$("#purchaseCount");
					$purchase.click(function(){
						if($(this).val()==1){
							$purchaseCount.addClass('hide');
						}else{
							$purchaseCount.removeClass('hide');
						}
					});
					
					
					$("#parameterTable").delegate('input.sku_stock', eventName, function(e) {	
						if (e.type == "focusout" || e.type == "paste") {
							checkIsNumber($(e.target), true); //检查输入值是否为数字
							showTotalEarnings();
						} else {
							checkIsNumber($(e.target)); //检查输入值是否为数字
						}
					});
					
					$("#parameterTable").delegate("a[data-id=delete]", "click", function(e) {
						General.stopEvent(e);
						General.confirm("您确定要删除吗?", null, deleteSkuRow, null, $(this));
					});
					function deleteSkuRow (element) {
						element.closest("tr").remove();
						showTotalEarnings();
					}
					function showTotalEarnings() {
						var totalstock = 0;
						$(".sku_stock").each(function() {
							var current = parseInt($(this).val());
							if (isNaN(current)) {
								current = 0;
								$(this).val(current);
							}
							totalstock += current;
						})
						$("#wx_stock").val(totalstock);		
					}
					/**
					 * 检查输入值是否为数字
					 * @param {String} element 目标元素
					 */
					function checkIsNumber(element, checkValid) {
						var value = element.val().replace(/[^.0123456789]/g, '');
						if (checkValid) {
							var re = /^[1-9]\d*|^[1-9]\d*\.\d*|0\.\d*[1-9]\d*$/; //非负整数+小数点  							
							if (!re.test(value) && value != "") {
								$(element).val(0);
							} else {
								element.val(value);
							}
						} else {
							element.val(value);
						}

					};
					
				});

		</script>
	</body>

</html>