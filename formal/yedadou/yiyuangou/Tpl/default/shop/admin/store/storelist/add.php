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
								<a href="/shop/admin/store/StoreList/get">门店列表</a>
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

									<div style="border:1px solid #FE8340;padding:10px;margin:15px;">
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
									</div>

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
											<input type="hidden" name="categoryData" id="categoryData" value='[{"id":"1","name":"广东省","child":[{"id":"11","name":"广州","child":[{"id":"112","name":"海珠区"},{"id":"113","name":"番禺区"},{"id":"114","name":"越秀区"}]},{"id":"12","name":"湛江","child":[]},{"id":"13","name":"汕头","child":[]}]},{"id":"2","name":"广西","child":[{"id":"21","name":"南宁","child":[]},{"id":"22","name":"北海","child":[]}]}]'
											/>
											<select id="category1" name="province" data-tip="请选择省份">
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
		<script src="{__STATIC_URL__}/public/admin/js/shop/store/list/add.js"></script>
	</body>

</html>