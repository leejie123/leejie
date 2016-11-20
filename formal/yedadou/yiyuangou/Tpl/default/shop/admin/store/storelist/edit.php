<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>管理门店</title>
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
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-edit"></i> 管理门店</a>
							</li>
						</ul>
						<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
							<div class="tab-content no-border  padding-0 pt10">
								<div id="tab1" class="tab-pane active">
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="countType"><strong>门店类型：</strong></label>
										</div>
										<div class="control-wrapper">
											<?php  if($store['type']==0){?>
												<input readonly="readonly"  type="text" class="form-control" value="总店" />
											<?php  }else{?>
											<select id="storeType" name="type" class="form-control">
												<option value="1" selected>直营店</option>
												<option value="2">加盟店</option>
											</select>
											<?php }?>
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="storeNumber"><strong>门店编号：</strong></label>
										</div>
										<div class="control-wrapper">
											<input type="text" id="storeNumber" name="store_no" class="form-control" value="<?=$store['store_no']?>" placeholder="请输入门店编号">
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="storeName"><strong>门店名称：</strong></label>
										</div>
										<div class="control-wrapper">
											<input type="text" id="storeName" name="name" class="form-control" value="<?=$store['name']?>" placeholder="请输入门店名称">
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="logo"><strong>门店logo：</strong></label>
										</div>
										<div class="control-wrapper">
											<div class="input-group">
												<input type="text" value="<?=$store['logo']?>" id="logo" name="logo" class="form-control" placeholder="请直接输入图片地址或使用上传图片按钮上传图片" />
												<span class="input-group-btn">
	       									<button id="upload" type="button" class="btn btn-info btn-sm">上传图片</button>
	      								</span>
											</div>
											<?php if($store['logo']):?>
											<img id="previewImage" class="preview-image" src="<?=$store['logo']?>" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
											<?php else:?>
											<img id="previewImage" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
											<?php endif?>
										</div>
									</div>


									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="description"><strong>门店介绍：</strong></label>
										</div>
										<div class="control-wrapper">
											<textarea id="description" name="description" class="form-control height80" placeholder=""><?=$store['desc']?></textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="dimension"><strong>门店面积：</strong></label>
										</div>
										<div class="control-wrapper">
											<div class="input-group ">
												<input type="text" value="<?=$store['acreage']?>" name="acreage" id="dimension" class="form-control" placeholder="">
												<span class="input-group-addon">平方米</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="title"><strong>电话：</strong></label>
										</div>
										<div class="control-wrapper">
											<input id="phone" name="phone" type="text" class="form-control" value="<?=$store['phone']?>" placeholder="请输入电话" />
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
											<select id="category1" name="province" data-tip="<?=$store['province']?>">
											</select>
											&nbsp;
											<select id="category2" name="city" data-tip="<?=$store['city']?>">
											</select>
											&nbsp;
											<select id="category3" name="area" data-tip="<?=$store['area']?>">
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
												<input id="address" name="address" type="text" class="form-control" placeholder="输入地址可搜索" value="<?=$store['address']?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="label-wrapper long">
											<label class="" for=""></label>
										</div>
										<div class="control-wrapper long">
											<div id="mapContainer" class="map-container">

											</div>
											<span class="help-block">
												 经度:&nbsp;<input name="longitude" value="<?=$store['longitude']?>" type="text" readonly="readonly" id="longitude" />
												纬度:&nbsp;<input name="latitude" value="<?=$store['latitude']?>" type="text" readonly="readonly" id="latitude" />
											</span>
										</div>
									</div>
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
		<script src="{__STATIC_URL__}/public/admin/js/shop/store/list/edit.js"></script>
	</body>

</html>