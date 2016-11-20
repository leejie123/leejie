<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>新增门店</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/js/kindeditor/themes/default/default.css,/admin/css/shop/store/list/add.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li>
								<a href="/shop/admin/supplier/storeList/get">门店列表</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-plus"></i> 新增门店</a>
							</li>
						</ul>
						<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
							<div class="tab-content no-border  padding-0 pt10">
								<div id="tab1" class="tab-pane active">
<!--									<div class="form-group">-->
<!--										<div class="label-wrapper">-->
<!--											<label class="" for="countType"><strong>门店类型：</strong></label>-->
<!--										</div>-->
<!--										<div class="control-wrapper">-->
<!--											<select id="storeType" name="type" class="form-control">-->
<!--												<option value="1" selected>直营店</option>-->
<!--												<option value="2">加盟店</option>-->
<!--											</select>-->
<!--										</div>-->
<!--									</div>-->
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="storeNumber"><strong>门店编号：</strong></label>
										</div>
										<div class="control-wrapper">
											<input type="text" id="storeNumber" name="store_no" class="form-control" value="" placeholder="请输入门店编号">
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="storeName"><strong>门店名称：</strong></label>
										</div>
										<div class="control-wrapper">
											<input type="text" id="storeName" name="name" class="form-control" value="" placeholder="请输入门店名称">
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="logo"><strong>门店logo：</strong></label>
										</div>
										<div class="control-wrapper">
											<div class="input-group">
												<input type="text" value="" id="logo" name="logo" class="form-control" placeholder="请直接输入图片地址或使用上传图片按钮上传图片" />
												<span class="input-group-btn">
	       									<button id="upload" type="button" class="btn btn-info btn-sm">上传图片</button>
	      								</span>
											</div>
											<img id="previewImage" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
										</div>
									</div>

<!--									<div style="border:1px solid #FE8340;padding:10px;margin:15px;">-->
										<div class="form-group">
											<div class="label-wrapper">
												<label class="" for="account"><strong>管理员账号：</strong></label>
											</div>
											<div class="control-wrapper">
												<input id="account" name="user_name" type="text" class="form-control" value="" placeholder="" />
											</div>
										</div>
<!--										<div class="form-group">-->
<!--											<div class="label-wrapper">-->
<!--												<label class="" for="user_group"><strong>角色：</strong></label>-->
<!--											</div>-->
<!--											<div class="control-wrapper">-->
<!--												<select name="user_group" id="user_group">-->
<!--													<option value="">请选择角色</option>-->
<!--													--><?php //foreach ($groups as $key => $group): ?>
<!--														<option value="--><?//=$group['group_id']?><!--">--><?//=$group['group_name']?><!--</option>-->
<!--													--><?php //endforeach ?>
<!--												</select>-->
<!--											</div>-->
<!--										</div>-->
										<div class="form-group">
											<div class="label-wrapper">
												<label class="" for="password"><strong>登录密码：</strong></label>
											</div>
											<div class="control-wrapper">
												<input id="password" name="password" type="password" class="form-control" value="" placeholder="" />
											</div>
										</div>
										<div class="form-group">
											<div class="label-wrapper">
												<label class="" for="confirmPassword"><strong>确认登录密码：</strong></label>
											</div>
											<div class="control-wrapper">
												<input id="confirmPassword" name="confirmPassword" type="password" class="form-control" value="" placeholder="" />
											</div>
										</div>
<!--									</div>-->

									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="description"><strong>门店介绍：</strong></label>
										</div>
										<div class="control-wrapper">
											<textarea id="description" name="desc" class="form-control height80" placeholder=""></textarea>
										</div>
									</div>
<!--									<div class="form-group">-->
<!--										<div class="label-wrapper">-->
<!--											<label class="" for="dimension"><strong>门店面积：</strong></label>-->
<!--										</div>-->
<!--										<div class="control-wrapper">-->
<!--											<div class="input-group ">-->
<!--												<input type="text" value="" name="acreage" id="dimension" class="form-control" placeholder="">-->
<!--												<span class="input-group-addon">平方米</span>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="title"><strong>电话：</strong></label>
										</div>
										<div class="control-wrapper">
											<input id="phone" name="phone" type="text" class="form-control" value="" placeholder="请输入电话" />
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for=""><strong>所在区域：</strong></label>
										</div>
										<div class="control-wrapper">
											<!--分类数据-->
											<input type="hidden" name="categoryData" id="addressDataUrl" value='http://tapi.yedadou.com/yedadou/getRegion'
											/>
											<select id="category1" name="province" data-tip="请选择省份">
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
											<select id="category3" name="area" data-tip="请选择区域">
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for=""><strong>地址：</strong></label>
										</div>
										<div class="control-wrapper">
											<button id="search" class="btn btn-info btn-sm pull-right" type="button">
												<span class="ace-icon fa fa-search"></span>搜索
											</button>
											<div style="margin-right: 80px;">
												<input id="address" name="address" type="text" class="form-control" placeholder="输入地址可搜索" value="">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper long">
											<label class="" for=""></label>
										</div>
										<div class="control-wrapper long">
                                            <span class="help-block">
												 经度:&nbsp;<input name="longitude" value="" type="text" readonly="readonly" id="longitude" />
												纬度:&nbsp;<input name="latitude" value="" type="text" readonly="readonly" id="latitude" />
											</span>
											<div id="mapContainer" class="map-container">

											</div>

										</div>
									</div>
									<!--<div class="form-group">
										<div class="label-wrapper">
											<label class="" for=""><strong>退货地址：</strong></label>
										</div>
										<div class="control-wrapper">
											<div style="margin-right: 80px;">
												<input id="refund_address" name="refund_address" type="text" class="form-control" placeholder="请输入退货地址" value="">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="title"><strong>退货邮编：</strong></label>
										</div>
										<div class="control-wrapper">
											<input id="refund_code" name="refund_code" type="text" class="form-control" value="" placeholder="请输入退货邮编" />
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="title"><strong>退货电话：</strong></label>
										</div>
										<div class="control-wrapper">
											<input id="refund_phone" name="refund_phone" type="text" class="form-control" value="" placeholder="请输入退货电话" />
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="title"><strong>收货人：</strong></label>
										</div>
										<div class="control-wrapper">
											<input id="refund_consignee" name="refund_consignee" type="text" class="form-control" value="" placeholder="请输入收货人" />
										</div>
									</div>-->
									<div class="space-2"></div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for=""></label>
										</div>
										<div class="control-wrapper">
											<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit"><i class="ace-icon fa fa-check"></i> 提交</button>
										</div>
									</div>
								</div>
							</div>
							<div class="space"></div>
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

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
		<script src="http://api.map.baidu.com/api?v=2.0&ak=ERbdhIdASjrTYg8WrY49D5Uy"></script>
		<script src="{__STATIC_URL__}/public/supplierAdmin/store/storeList/add.js"></script>

	</body>

</html>