<?php include $this->tpl('shop:public/html_header.php') ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/editAddress.css" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public/css/pure-min.css">
		<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
		<script src="{__STATIC_URL__}/public/??yiyuan/new2016/js/shortAlert.js,yiyuan/new2016/js/editAddress1.js"></script>
		<title>收货地址</title>
	</head>

	<body class="">
		<div class="wrapper">
				<form id="dataForm" method="post" action="" enctype="multipart/form-data">
					<div class="cart-not-empty">
						<div class="" id="adressContainer">
							<!--地址操作类型:add或edit,默认为add-->
							<input type="hidden" id="addressType" name="addressType" value="edit" />
							<!--地址ID,当修改状态时要设置该值-->
							<input type="hidden" id="addressId" name="addressId" value="<?=$address['id']?>" />
							<?php 
							$ydd_api_url = rtrim(\Lib\App\Config::get('ydd_api_url'),'/');
							?>
							<input type="hidden" id="addressDataUrl" name="addressDataUrl" value="<?=$ydd_api_url?>/getRegion" />
							<div class="cus-list-input1">
								<div class="">
									<label class="required">
										收货人姓名
									</label>
									<div class="item-input">
										<input type="text"  id="realName" name="realName" placeholder="" value="<?=$address['consignee']?>">
									</div>
								</div>
							</div>
							<div class="cus-list-input1">
								<div class="">
									<label class="required">
										手机号码
									</label>
									<div class="item-input">
										<input type="text"  id="phone" name="phone" placeholder="" value="<?=$address['phone']?>">
									</div>
								</div>
							</div>

							<div class="cus-list-select">
								<div class="">
									<label class="reuqired">
										地区
									</label>
									<div class="item-select">
										<div>
											<div class="cus-select">
												<select id="category1" name="province" data-tip="请选择省份">
												<?php foreach($data as $v):?>
													<option value="<?php echo $v['name']?>" data-id="<?php echo $v['sn']?>"
													<?php 
														if($address['province']) {
															if($address['province'] == $v['name']) {
																	echo "selected";
															}
														}
													?>
													>
													<?php echo $v['name']?>
													</option>
												<?php endforeach;?>
												</select>
											</div>
										</div>
										
										<div>
											<div class="cus-select">
												<select id="category2" name="city" data-tip="请选择城市">
												<?php if(!empty($city)) foreach($city as $v):?>
													<option value="<?php echo $v['name']?>" data-id="<?php echo $v['sn']?>"
													<?php 
														if($address['city']) {
															if($address['city'] == $v['name']) {
																	echo "selected";
															}
														}
													?>
													>
													<?php echo $v['name']?>
													</option>
												<?php endforeach;?>
												</select>
											</div>	
										</div>
										
										<div>
											<div class="cus-select">
												<select id="category3" name="area" data-tip="请选择区域">
												<?php if(!empty($district)) foreach($district as $v):?>
													<option value="<?php echo $v['name']?>" data-id="<?php echo $v['sn']?>"
													<?php 
														if($address['street']) {
															if($address['street'] == $v['name']) {
																	echo "selected";
															}
														}
													?>
													>
													<?php echo $v['name']?>
													</option>
												<?php endforeach;?>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="cus-list-input1">
								<div class="">
									<label class="required">
										详细地址
									</label>
									<div class="item-input">
										<input type="text"  id="address" name="address" placeholder="" value="<?=$address['address']?>">
									</div>
								</div>
							</div>

							<div class="cus-list-input1">
								<div class="" style="border-bottom: 0px;">
									<label class="required">
										是否默认
									</label>
									<div class="item-radio">
										<label class="cus-radio">
											<input id='setDefault1' name="default" type="radio" value="1" <?php if($address['is_default']==1):?>checked="checked"<?php endif?>/>
											<i class="red-radio"></i>
											是
										</label>
										<label class="cus-radio">
											<input id='setDefault2' name="default" type="radio" value="0" <?php if($address['is_default']==0):?>checked="checked"<?php endif?>/>
											<i class="red-radio"></i>
											否
										</label>
									</div>
								</div>	
							</div>

							<div style="margin-top: 18px;text-align:center;">
								<button id="cancel" onclick="history.back(-1);" class="cus-btn cus-btn-lg cus-btn-grey" style="width:40%;margin-right:18px;" type="button">取消</button>
								<!--data-href是保存的地址,返回格式为{"success":true,"msg":"保存成功","sub_msg":"","url":""}-->
								<button id="save" data-href="/yiyuan/UserCenter/address/update?id=<?=$address['id']?>" class="cus-btn-lg cus-btn cus-btn-red" style="width:40%;" type="button">保存</button>
							</div>
						</div>

					</div>
				</form>
			<!-- </div> -->
		<?php include $this->tpl('yiyuan:public/footer.php') ?>
	</body>

</html>