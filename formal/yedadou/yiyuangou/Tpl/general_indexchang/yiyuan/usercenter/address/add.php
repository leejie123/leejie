<?php include $this->tpl('shop:public/html_header.php') ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/??yiyuan/general/css/pub.css,yiyuan/ui/boboui.css,yiyuan/css/ico.css" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/editAddress.css" />
		<style type="text/css">
			.button-red {
				background-color: #f60 !important;
			}
		</style>
		<script src="{__STATIC_URL__}/public/front/default/js/editAddress.js"></script>
		<title>收货地址</title>
	</head>

	<body class="">
		<div class="wrapper">
			

			<div class="cart-container">
				<form id="dataForm" method="post" action="" >
					<div class="cart-not-empty">
						<div class="container-fluid" id="adressContainer">
							<!--地址操作类型:add或edit,默认为add-->
							<input type="hidden" id="addressType" name="addressType" value="add" />
							<!--地址ID,当修改状态时要设置该值-->
							<input type="hidden" id="addressId" name="addressId" value="" />
                            <!--订单号,当从完成支付后跳转到此页面就有这个东西-->
                            <input type="hidden" id="order_sn" name="order_sn" value="<?=$order_sn?>" />
							<?php 
							$ydd_api_url = rtrim(\Lib\App\Config::get('ydd_api_url'),'/');
							?>
							<input type="hidden" id="addressDataUrl" name="addressDataUrl" value="<?=$ydd_api_url?>/getRegion" />
							<div class="row">
								<div class="edit-label pull-left">
									<label>
										*收货人姓名:
									</label>
								</div>
								<div class="edit-wrapper">
									<input type="text" class="form-control" id="realName" name="realName" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="edit-label pull-left">
									<label>
										*手机号码:
									</label>
								</div>
								<div class="edit-wrapper">
									<input type="text" class="form-control" id="phone" name="phone" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="edit-label pull-left">
									<label>
										*地区:
									</label>
								</div>
								<div class="edit-wrapper">
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
									<br>
									<select id="category2" name="city" data-tip="请选择城市">
										<option value="请选择城市" data-id="0" selected>请选择城市</option>
									</select>
									<br>
									<select id="category3" name="area" data-tip="请选择区域">
										<option value="请选择区域" data-id="0" selected>请选择区域</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="edit-label pull-left">
									<label>
										*详细地址:
									</label>
								</div>
								<div class="edit-wrapper">
									<input type="text" class="form-control" id="address" name="address" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="edit-label pull-left">
									<label>
										*是否默认:
									</label>
								</div>
								<div class="edit-wrapper">
									是<input id='setDefault1' name="default" type="radio" value="1" />
									否<input id='setDefault2' name="default" type="radio" value="0" />
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
								<button id="cancel" onclick="history.back(-1);" class="button-default button-large" type="button">取消</button>&nbsp;&nbsp;
								</div>
								<div class="col-xs-3 col-xs-offset-2">
									<button id="save" data-href="/yiyuan/UserCenter/address/add" class="button-red button-large" type="button">保存</button>
								</div>
							</div>
						</div>

					</div>
				</form>
			</div>
			<?php //include $this->tpl('yiyuan:public/footer.php') ?>
	</body>

</html>