
<!DOCTYPE html>
<!-- saved from url=(0041)http://vendor.yedadou.com/UserCenter/Fans -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>设置</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css">
		<style type="text/css">
			.color-orange {
				color:rgb(225, 100, 119);
			}
			.line-h-15	{
				line-height: 15px;
			}
			.mg-r-10{
				margin-right: 10px;
			}
			.mg-b-10{
				margin-bottom: 10px;
			}

			.bold {
				font-weight: bold
			}
			.pd-b-10{
				padding-bottom: 10px;
			}
		</style>
	</head>

	<body class="no-skin">

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="">
								<a href="/yiyuan/admin/WorkMan/DataStatistics">数据统计</a>
							</li>
							<!-- http://vendor.yedadou.com/UserCenter/Fans#tab1 -->
							<li class="">
								<a href="/yiyuan/admin/WorkMan/LuckyOrder">幸运订单</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab3">设置</a>
							</li>
						</ul>
<form action="" method="post">
						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane"></div>
							<div id="tab2" class="tab-pane"></div>
							<div id="tab3" class="tab-pane active">
								<div class="form-group">
									<div class="label-wrapper">
										<label class="" for="storeName"><strong>是否开工：</strong></label>
									</div>
									<div class="control-wrapper">
										<div class="switch switch-large">
										    <input type="checkbox" name="is_open_robot" <?=val($config, 'is_open_robot',0) ? 'checked' : '';?> />
										</div>
									</div>
								</div>

								<div class="form-group clearfix">
									<label class="label-wrapper"><strong>工人数量：</strong></label>
									<div class="">
										<input id="order_sn" name="robot_number" placehoder="请填写工人数量" type="text" class="form-control input-large" value=" <?=val($config, 'robot_number',0)?>" style="display:inline-block"><button class="btn btn-info" disabled style="margin-top:-1px;padding:2px 10px">人</button>
									</div>	
								</div>

								<div class="form-group mg-b-10">
									<div class="label-wrapper">
										<label class="" for=""><strong>所在区域：</strong></label>
									</div>
									<div class="control-wrapper">
										<!--分类数据-->
										<input type="hidden" id="addressDataUrl" value='http://tapi.yedadou.com/yedadou/getRegion'
										/>
										<select id="category1" class="mg-b-10" data-tip="请选择省份">
											<option value="请选择省份" data-id="0" selected>请选择省份</option>
											<option value="广东省" data-id="440000">广东省</option>
											<option value="北京" data-id="110000">北京</option>
											<option value="天津" data-id="120000">天津</option>
											<option value="河北省" data-id="130000">河北省</option>
											<option value="山西省" data-id="140000">山西省</option>
											<option value="内蒙古" data-id="150000">内蒙古</option>
											<option value="辽宁省" data-id="210000">辽宁省</option>
											<option value="吉林省" data-id="220000">吉林省</option>
											<option value="黑龙江省" data-id="230000">黑龙江省</option>
											<option value="上海" data-id="310000">上海</option>
											<option value="江苏省" data-id="320000">江苏省</option>
											<option value="浙江省" data-id="330000">浙江省</option>
											<option value="安徽省" data-id="340000">安徽省</option>
											<option value="福建省" data-id="350000">福建省</option>
											<option value="江西省" data-id="360000">江西省</option>
											<option value="山东省" data-id="370000">山东省</option>
											<option value="河南省" data-id="410000">河南省</option>
											<option value="湖北省" data-id="420000">湖北省</option>
											<option value="湖南省" data-id="430000">湖南省</option>
											<option value="广西" data-id="450000">广西</option>
											<option value="海南省" data-id="460000">海南省</option>
											<option value="重庆市" data-id="500000">重庆市</option>
											<option value="四川省" data-id="510000">四川省</option>
											<option value="贵州省" data-id="520000">贵州省</option>
											<option value="云南省" data-id="530000">云南省</option>
											<option value="西藏" data-id="540000">西藏</option>
											<option value="陕西省" data-id="610000">陕西省</option>
											<option value="甘肃省" data-id="620000">甘肃省</option>
											<option value="青海省" data-id="630000">青海省</option>
											<option value="宁夏" data-id="640000">宁夏</option>
											<option value="新疆" data-id="650000">新疆</option>
											<option value="台湾" data-id="710000">台湾</option>
											<option value="香港特别行政区" data-id="810000">香港特别行政区</option>
											<option value="澳门特别行政区" data-id="820000">澳门特别行政区</option>
										</select>
										&nbsp;
										<select id="category2" name="city" data-tip="请选择城市">
										</select>
										&nbsp;
										<!-- <select id="category3" name="area" data-tip="请选择区域">
										</select> -->
										<button type="button" class="btn btn-info btn-xs" id="add_area"><i class="fa fa-plus" ></i> 添加</button>
										<textarea class="form-control text1" placeholder="请选择添加所在区域" style="width: 40%;height: 200px;" placeholder="" name="batArea"><?=val($config, 'set_area',0)?></textarea>
									</div>
								</div>

								<div class="mg-b-10" id="appendContain">
									<div class="label-wrapper">
										<label class="" for="storeName"><strong>参与商品：</strong></label>
									</div>
									<?php $variable = val($config, 'goods_purchase',[0])?>
									<?php $begin_num = val($config, 'begin_num',[])?>
									<?php $end_num = val($config, 'end_num',[])?>
									<?php foreach ($variable as $key => $value):?>
									<div class="control-wrapper pd-b-10 form-control mg-b-10" style="height: auto;width: 30%">
										<div class="mg-b-10">
											<label class="pull-left bold">ID:</label>
											<input type="" class="form-control" name="goods_purchase[<?=$key?>]" value="<?=$value;?>">
										</div>
										<div >
											<label class="pull-left bold" style="display:block;width: 100%;">参与次数:</label><br/>
											<div class="input-group">
											<input name="begin_num[<?=$key?>]" type="text" class="form-control" value="<?=val($begin_num, $key, '')?>">
											<span class="input-group-addon">
												<i class="fa fa-exchange"></i>
											</span>
											<input  name="end_num[<?=$key?>]" type="text" class="form-control" value="<?=val($end_num, $key, '')?>">
											</div>
										</div>
									</div>
									<?php endforeach;?>
								</div>

								<div class="form-group ">
									<div class="label-wrapper">
										<label class="" for="storeName"><strong></strong></label>
									</div>
									<div class="control-wrapper">
										<div class="button btn btn-info btn-xs" id="add"><i class="fa fa-plus"></i> 添加</div>
									</div>
								</div>

								<div class="form-group ">
									<div class="label-wrapper">
										<label class="" for="storeName"><strong></strong></label>
									</div>
									<div class="control-wrapper">
										<button class="button btn btn-info" id="add">提交</button>
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<a href="http://vendor.yedadou.com/UserCenter/Fans#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		<div id="template" class="hide">
			<div class="control-wrapper pd-b-10 form-control mg-b-10" style="height: auto;width: 30%">
				<div class="mg-b-10">
					<label class="pull-left bold">ID:</label>
					<input type="" class="form-control" name="goods_purchase[]" value="">
				</div>
				<div >
					<label class="pull-left bold" style="display:block;width: 100%;">参与次数:</label><br/>
					<div class="input-group">
						<input name="begin_num[]" type="text" class="form-control" value="">
						<span class="input-group-addon">
							<i class="fa fa-exchange"></i>
						</span>
						<input  name="end_num[]" type="text" class="form-control" value="">
					</div>
				</div>
			</div>

		</div>	
		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script type="text/javascript">
			var val = [];
			$('#add_area').on('click', function () {
				var value1 = $('#category1 > option:selected').val();
				var value2 = $('#category2 > option:selected').val();
				if (value1 == '请选择省份' || value2 == '请选择城市') {
					General.alert('请选择所在区域')
				} else {
					var value3 = value1 + ' ' + value2;
					val.push(value3);
					$('.text1').val(val)
				}
				
			})
			$('#add').on('click', function() {
				var template = $('#template').html();
				$('#appendContain').append(template)
			})

			var levelTip1 = $("#category1").attr("data-tip"); //一级分类提示
			var levelTip2 = $("#category2").attr("data-tip"); //二级分类提示
			var levelTip3 = $("#category3").attr("data-tip"); //三级分类提示
			var idNotSelect = "0"; //不选分类时的ID
			var addressDataUrl = $("#addressDataUrl").val();


			//-----------------省市区关联操作-----------------
			initCategory()
			//初始化一级分类
			function initCategory() {
				//根据一级分类切换二级分类
				$("#category1").on("change", function(e) {
					changeCategory();
				});
				//根据二级分类切换三级分类
				// $("#category2").on("change", function(e) {
				// 	changeCategory2();
				// });
			};
			//根据一级分类切换二级分类


			function changeCategory() {
				var id = $("#category1 option:selected").attr("data-id");
				var str = '';
				str += '<option value="' + levelTip2 + '" data-id="' + idNotSelect + '" selected>' + levelTip2 + '</option>';
				$("#category2").html(str);
				var str3 = '<option value="' + levelTip3 + '" data-id="' + idNotSelect + '" selected>' + levelTip3 + '</option>';
				$("#category3").html(str3);
				if (id !== "0") {
					$("#category2,#category3").prop("disabled", "disabled");
					var url = addressDataUrl + "?type=city&id=" + id;
					//加载市
					$.ajax({
						type: "GET",
						url: url,
						cache: false,
						dataType: 'jsonp',
						success: function(data) {
							try {
								$.each(data.city, function(key, value) {
									str += '<option value="' + value + '" data-id="' + key + '">' + value + '</option>';
									$("#category2").html(str).prop("disabled", false);
								});
							} catch (e) {}
						},
						error: function() {
							try {
								General.alert("获取市失败,请检查网络连接");
							} catch (e) {}
						}
					});
				} else {

				}
			};
		</script>
	</body>
	</html>