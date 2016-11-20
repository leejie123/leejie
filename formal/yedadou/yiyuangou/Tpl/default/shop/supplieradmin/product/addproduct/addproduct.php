
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>新增商品</title>
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
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-edit"></i> 编辑商品</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<form method="post" action="/shop/supplierAdmin/product/addProduct" >
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
														<input id="title" name="title" type="text" class="form-control" value="" placeholder="最多只能输入30个汉字或60个英文字符" />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="sub_title"><strong>商品副标题：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="sub_title" name="sub_title" type="text" class="form-control" value="" placeholder="最多只能输入20个汉字或60个英文字符" />
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>商品分类：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input type="hidden" name="addressDataUrl" id="addressDataUrl" value="">
														<select id="category1" name="category1" data-tip="请选择一级分类">
															<option  value="">请选择一级分类</option>
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
															</thead>
															<tbody id="parameterTable">
															</tbody>
														</table>
														<div class="space-4"></div>
														<button class="btn btn-info btn-xs" id="add" type="button"><i class="ace-icon fa fa-plus"></i> 增加</button>
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="pur_price"><strong>供货价：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input  id="pur_price"  type="text"  name="pur_price" value="" class="form-control" placeholder="">
															<span class="input-group-addon">元</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="re_price"><strong>参考销售价：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="" name="re_price" id="re_price" class="form-control" placeholder="">
															<span class="input-group-addon">元</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="code"><strong>编码：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="code" name="code" type="text" class="form-control" value="" placeholder="" />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong style="display: block;">商品图片：</strong><span  class="font-red" style="float: left;">(单张<2M)</span></label>
													</div>
													<div class="control-wrapper ">
														<ul class="image-list" id="imageList">
																													<li>
																<img id="previewImage1" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" >
																<input type="hidden" name="img_list[]" id="imageUrl1" value="" />
																<button class="btn btn-info btn-xs" id="upload1" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel1" type="button">删除</button>
															</li>
																													<li>
																<img id="previewImage2" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" >
																<input type="hidden" name="img_list[]" id="imageUrl2" value="" />
																<button class="btn btn-info btn-xs" id="upload2" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel2" type="button">删除</button>
															</li>
																													<li>
																<img id="previewImage3" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" >
																<input type="hidden" name="img_list[]" id="imageUrl3" value="" />
																<button class="btn btn-info btn-xs" id="upload3" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel3" type="button">删除</button>
															</li>
																													<li>
																<img id="previewImage4" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" >
																<input type="hidden" name="img_list[]" id="imageUrl4" value="" />
																<button class="btn btn-info btn-xs" id="upload4" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel4" type="button">删除</button>
															</li>
																													<li>
																<img id="previewImage5" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" >
																<input type="hidden" name="img_list[]" id="imageUrl5" value="" />
																<button class="btn btn-info btn-xs" id="upload5" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel5" type="button">删除</button>
															</li>
																																										</ul>
													</div>
												</div> 
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="description"><strong>商品详情：</strong></label>
													</div>
													<div class="control-wrapper long">
														<textarea id="description" name="desc" class="form-control height80" placeholder=""></textarea>
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
														<label><strong>运费模板：</strong></label>
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
		window.kindeditorUpUrl='<?=site_url()?>/shop/common/upLoad';
		</script>
		<script>
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
		// 添加二级分类
			function get_cate (url, success){
				$.ajax({
					type: 'GET',
					url: '',
					success: function (data) {
						success(data);
					},
					fail: function() {

					}
				})
			}
		  $('#category1').on('change', function (){
  				var parent = $('#category2');

  				get_cate('后台的url', function (data) {
  					$(parent).empty();
			  		if (data.success) {
			  			$(data).each(function(key, value) {
			  				var option = '<option value="" data-id="">' + value.name + '</option>';
			  				parent.append(option);
				  		})
			  		} else {
			  			alert('您所需要的东西不存在');
			  		}
  				})
		  });

		  // 添加三级分类属性
		  $('#category2').on('change', function() {
		  	var title = $(this).find('option:selected').html();
  			var template = $('#tpl-parameter_');
  			$(template).empty();
  			$('#parameterTable').empty()
		  	$(data).each(function(key, value) {
		  		if (value.name == title) {
		  			var parent = $('#attr_').find('thead');
		  			$(parent).empty()
		  			var temp1 = $('<tr></tr>');

		  			// 修改模板
		  			var tr = $('<tr></tr>').appendTo(template);

		  			$(value.sub_cate).each(function(k, v){
		  				$('<th width="100"><input type="text" value="' + v + '" disabled="disabled"></th>').appendTo(temp1);
		  				// 修改模板
		  				$('<td><input type="text" value="" name="" class="form-control" placeholder="请填写' + v + '信息"></td>').appendTo(tr);
		  			})

		  			var temp = $('<th class="center">价格</th>').appendTo(temp1);
		  			var temp = $('<th class="center">库存</th>').appendTo(temp1)
		  			var temp = $('<th class="center" width="70">操作</th>').appendTo(temp1);
		  			// 修改模板
		  			$('<td><input type="text" value="" name="" class="form-control" placeholder=""></td>').appendTo(tr);
		  			$('<td><input type="text" value="" name="" class="form-control" placeholder=""></td>').appendTo(tr);
		  			$('<td class="center pt14"><a href="#" class="blue" data-id="delete">删除</a></td>').appendTo(tr);

		  			temp1.appendTo(parent)
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