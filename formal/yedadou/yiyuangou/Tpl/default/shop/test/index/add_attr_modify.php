
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>编辑门店商品</title>
		<meta name="iewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />

	</head>

	<body class="no-skin">
		<style type="text/css">
			th > input {
				width: 100px;
			}
		</style>
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap-datetimepicker.css,/admin/css/shop/product/list/add.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li>
								<a href="/shop/admin/product/storeProductList">门店商品列表</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-edit"></i> 编辑商品</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<form method="post" action="/shop/admin/product/updateStoreProduct?page_no=1" >
								<input type='hidden' value="3043 " name='goods_id'/>
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
														<label class="" for="title"><strong>商品标题：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="title" name="title" type="text" class="form-control" value="最多只能输入20个汉字货60个英文字符" placeholder="最多只能输入30个汉字或60个英文字符" />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="subTitle"><strong>商品副标题：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="subTitle" name="sub_title" type="text" class="form-control" value="最多只能输入30个汉字货80个英文字符" placeholder="最多只能输入20个汉字货60个英文字符" />
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>商品分类：</strong></label>
													</div>
													<div class="control-wrapper short">
														<!--分类数据-->
														<input type="hidden" name="addressDataUrl" id="addressDataUrl" value="http://www.baidu.com">
														<!-- <input type="hidden" name="addressDataUrl" id="addressDataUrl" value="http://tapi.yedadou.com/yedadou/getRegion"> -->
														<!-- <input type="hidden" name="categoryData" id="categoryData" value='[{"id":"1","name":"数码","child":[{"id":"2","name":"手机"}]}]' />  -->
														<select id="category1" name="category1" data-tip="请选择一级分类">
															<option  value="" data-option="select">请选择一级分类</option>
															<option value="数码" data-id="440000">数码</option>
															<option value="衣服" data-id="110000">衣服</option>
														</select>
														&nbsp;
														<select id="category2" name="category2" data-tip="请选择二级分类">
															<option  value="">请选择二级分类</option>
															<option  value="2" >手机</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>库存信息：</strong></label>
													</div>
													<div class="control-wrapper short">
														<table class="table table-striped table-bordered table-hover table-vertical-middle" id="attr_">
															<thead>
																<!-- 后台输出表格头部 -->
																<tr>
																	<th width="100">
																		<input type="text" value="相机" disabled="disabled">
																	</th>
																	<th width="100">
																		<input type="text" value="相机" disabled="disabled">
																	</th>
																	<th width="100">
																		<input type="text" value="相机" disabled="disabled">
																	</th>
																	<th class="center">价格</th>
																	<th class="center">库存</th>
																	<th class="center" width="70">操作</th>
																</tr>
																<!-- 后台输出表格头部 -->
															</thead>
															<tbody id="parameterTable">
																<!-- 后台输出表格body -->
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
																<!-- 后台输出表格body -->
															</tbody>
														</table>
														<div class="space-4"></div>
														<button class="btn btn-info btn-xs" id="add" type="button"><i class="ace-icon fa fa-plus"></i> 增加</button>
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="wx_price"><strong>供货价：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="1.00" name="wx_price" id="wx_price" class="form-control" placeholder="">
															<span class="input-group-addon">元</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="marketPrice"><strong>参考销售价：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="10.00" name="market_price" id="marketPrice" class="form-control" placeholder="">
															<span class="input-group-addon">元</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="serialNumber"><strong>编码：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="serialNumber" name="code" type="text" class="form-control" value="111" placeholder="" />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong style="display: block;">商品图片：</strong><span  class="font-red" style="float: left;">(单张<2M)</span></label>
													</div>
													<div class="control-wrapper ">
														<ul class="image-list" id="imageList">
															<li>
																<img id="previewImage1" class="preview-image" src="http://testimg.yedadou.com/store/186/1730e051b143421c9b4e2ee62a6b159f.jpg" >
																<input type="hidden" name="img_list[]" id="imageUrl1" value="http://testimg.yedadou.com/store/186/1730e051b143421c9b4e2ee62a6b159f.jpg" />
																<button class="btn btn-info btn-xs" id="upload1" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel1" type="button">删除</button>
															</li>
															<li>
																<img id="previewImage2" class="preview-image" src="http://static.yedadou.com/public/admin/images/noupload.png" >
																<input type="hidden" name="img_list[]" id="imageUrl2" value="" />
																<button class="btn btn-info btn-xs" id="upload2" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel2" type="button">删除</button>
															</li>
																													<li>
																<img id="previewImage3" class="preview-image" src="http://static.yedadou.com/public/admin/images/noupload.png" >
																<input type="hidden" name="img_list[]" id="imageUrl3" value="" />
																<button class="btn btn-info btn-xs" id="upload3" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel3" type="button">删除</button>
															</li>
																													<li>
																<img id="previewImage4" class="preview-image" src="http://static.yedadou.com/public/admin/images/noupload.png" >
																<input type="hidden" name="img_list[]" id="imageUrl4" value="" />
																<button class="btn btn-info btn-xs" id="upload4" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel4" type="button">删除</button>
															</li>
																													<li>
																<img id="previewImage5" class="preview-image" src="http://static.yedadou.com/public/admin/images/noupload.png" >
																<input type="hidden" name="img_list[]" id="imageUrl5" value="" />
																<button class="btn btn-info btn-xs" id="upload5" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel5" type="button">删除</button>
															</li>
													</div>
												</div> 
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="description"><strong>商品详情：</strong></label>
													</div>
													<div class="control-wrapper long">
														<textarea id="description" name="desc" class="form-control height80" placeholder="">&lt;img src=&quot;http://testimg.yedadou.com/store/1122/16f799b87a7f3b6dea5b2019a42f4888.jpg&quot; alt=&quot;&quot; /&gt;</textarea>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>减库存：</strong></label>
													</div>
													<div class="control-wrapper short">
														<label>
															<input name="auto_inv" type="radio" class="ace" value="2" checked>
															<span class="lbl"> 付款减库存</span>
														</label>
														
														&nbsp;
														<label>
															<input name="auto_inv" type="radio" class="ace" value="1" >
															<span class="lbl"> 拍下减库存</span>
														</label>
														&nbsp;
														<label>
															<input name="auto_inv" type="radio" class="ace" value="0" >
															<span class="lbl"> 不减库存</span>
														</label>
													</div>
												</div>

												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="subTitle"><strong>运费模板：</strong></label>
													</div>
													<div class="control-wrapper short">
														<select class='form-control'>
															<option vlaue="申通">申通</option>
															<option vlaue="中通">中通</option>
															<option vlaue="圆通">圆通</option>
														</select>
													</div>
												</div>

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
			<tbody id="tpl-parameter_">
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
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/js/Sortable.min.js"></script>
		<script type="text/javascript">	
			window.kindeditorUpUrl='http://1047.m.yedadou.com/shop/common/upLoad';
		</script>
		<script>
		var get_attrUrl = 'http://1047.m.yedadou.com/shop/test/index?tplName=add_attr_data';
		var data = [
				    {
				        "name": "数码",
				        "sub_cate": [
				            "手机",
				            "相机",
				            "ipad"
				        ]
				    },
				    {
				        "name": "衣服",
				        "sub_cate": [	
				            "男装",
				            "女装"
				        ]
				    }
				]
			

		  $('#category1').on('change', function (){
  				var parent = $('#category2');
  				var $selec = $(this).find('option:selected');
  				var select_obj = $selec.data('option');
  				var name = $selec.html()

  				if (select_obj == 'select') {
  					$(parent).empty();
  					$(parent).append('<option data-option="select" selected>请选择二级分类</option>')
  				} else {
  					$(parent).empty();
  					var option = '<option data-option="select" selected>请选择二级分类</option>';
		  			$(data).each(function(key, value) {
		  				if (name == value.name) {
		  					$(value.sub_cate).each(function (k, v) {
		  						option += '<option value="" data-id="">' + v + '</option>';
		  					}) 
		  				}
			  		})
	  				parent.append(option);
  				}
		  });

		  // 添加三级分类属性
		  $('#category2').on('change', function() {
		  	var title = $(this).find('option:selected').html();
  			var template = $('#tpl-parameter_');
  			$(template).empty();

  			$('#parameterTable').empty();
  			$.ajax({
  				url: get_attrUrl, 
  				type: 'GET',
  				dataType: 'text',	
  				success: function(data) {
  					if (data) {
  						var content = $.parseJSON(data)
  						var result = false;
			  			var parent = $('#attr_').find('thead');
	  					$(content).each(function(key, value) {
					  		if (value.name == title) {
					  			$(parent).empty()
					  			var temp1 = $('<tr></tr>');

					  			// 修改模板
					  			var tr = $('<tr></tr>').appendTo(template);

					  			$(value.sub_cate).each(function(k, v){
					  				$('<th width="100"><input type="text" value="' + v + '" disabled="disabled"></th>').appendTo(temp1);
					  				// 修改模板
					  				$('<td><input type="text" value="" name="" class="form-control" placeholder="请填写' + v + '信息"></td>').appendTo(tr)
					  			})

					  			var temp = $('<th class="center">价格</th>').appendTo(temp1);
					  			var temp = $('<th class="center">库存</th>').appendTo(temp1)
					  			var temp = $('<th class="center" width="70">操作</th>').appendTo(temp1);
					  			// 修改模板
					  			$('<td><input type="text" value="" name="" class="form-control" placeholder=""></td>').appendTo(tr);
					  			$('<td><input type="text" value="" name="" class="form-control" placeholder=""></td>').appendTo(tr);
					  			$('<td class="center pt14"><a href="#" class="blue" data-id="delete">删除</a></td>').appendTo(tr);

					  			temp1.appendTo(parent);
					  			result = true;
					  		}
					  	})
						if (result) {

						} else {
							General.alert('不存在该商品属性');
				  			$(parent).empty()
						}
  					} else  {

  					}
  				},
  				error: function () {
  					General.alert('网络错误，稍后重试')
  				}
  			})
		  	
		  })
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