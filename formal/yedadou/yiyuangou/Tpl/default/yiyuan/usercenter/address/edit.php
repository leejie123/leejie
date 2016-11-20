<?php include $this->tpl('shop:public/html_header.php') ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/editAddress.css" />
		<script src="{__STATIC_URL__}/public/front/default/js/editAddress.js"></script>
		<title>收货地址</title>
	</head>

	<body class="">
		<div class="wrapper">
			

			<div class="cart-container">
				<form id="dataForm" method="post" action="" enctype="multipart/form-data">
					<div class="cart-not-empty">
						<div class="container-fluid" id="adressContainer">
							<!--地址操作类型:add或edit,默认为add-->
							<input type="hidden" id="addressType" name="addressType" value="edit" />
							<!--地址ID,当修改状态时要设置该值-->
							<input type="hidden" id="addressId" name="addressId" value="<?=$address['id']?>" />
							<input type="hidden" id="addressDataUrl" name="addressDataUrl" value="http://api.yedadou.com/yedadou/getRegion" />
							<div class="row">
								<div class="edit-label pull-left">
									<label>
										*收货人姓名:
									</label>
								</div>
								<div class="edit-wrapper">
									<input type="text" class="form-control" id="realName" name="realName" placeholder="" value="<?=$address['consignee']?>">
								</div>
							</div>
							<div class="row">
								<div class="edit-label pull-left">
									<label>
										*手机号码:
									</label>
								</div>
								<div class="edit-wrapper">
									<input type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?=$address['phone']?>">
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
									&nbsp;
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
									&nbsp;
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
							<div class="row">
								<div class="edit-label pull-left">
									<label>
										*详细地址:
									</label>
								</div>
								<div class="edit-wrapper">
									<input type="text" class="form-control" id="address" name="address" placeholder="" value="<?=$address['address']?>">
								</div>
							</div>
							<div class="row">
								<div class="edit-label pull-left">
									<label>

									</label>
								</div>
								<div class="edit-wrapper">
									<button id="cancel" onclick="history.back(-1);" class="button-default button-large" type="button">取消</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<!--data-href是保存的地址,返回格式为{"success":true,"msg":"保存成功","sub_msg":"","url":""}-->
									<button id="save" data-href="/yiyuan/UserCenter/address/update?id=<?=$address['id']?>" class="button-red button-large" type="button">保存</button>
								</div>
							</div>
						</div>

					</div>
				</form>
			</div>
		<?php include $this->tpl('yiyuan:public/footer.php') ?>
	</body>

</html>