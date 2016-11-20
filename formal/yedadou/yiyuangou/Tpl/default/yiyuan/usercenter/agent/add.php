<?php include $this->tpl('shop:public/html_header.php') ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/editAddress.css" />
		<title>申请代理</title>
	</head>

	<body class="">
		<div class="wrapper">
			

			<div class="cart-container">
				<form id="dataForm" method="post" action="/Yiyuan/UserCenter/Agent/add">
					<div class="cart-not-empty">
						<div class="container-fluid" id="adressContainer">
							<div class="row">
								<div class="edit-label pull-left">
									<label>
                                        <strong style="color: red">*</strong>姓名:
									</label>
								</div>
								<div class="edit-wrapper">
									<input type="text" class="form-control" id="realName" name="realname" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="edit-label pull-left">
									<label>
                                        <strong style="color: red">*</strong>手机:
									</label>
								</div>
								<div class="edit-wrapper">
									<input type="tel" class="form-control" id="phone" name="phone" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="edit-label pull-left">
									<label>
                                        <strong style="color: red">*</strong>微信号:
									</label>
								</div>
								<div class="edit-wrapper">
									<input type="text" class="form-control" id="weixin" name="wx_user" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="edit-label pull-left">
									<label>
										<strong style="color: red">*</strong>申请级别:
									</label>
								</div>
								<div class="edit-wrapper">
									<select id="leveltype" name="level">
										<option value="">选择申请代理级别</option>
                                        <?php if($agents){ $i=0;  foreach($agents as $v): ?>
                                            <option value="<?=$v?>"><?=$v?></option>
                                        <?php endforeach;}?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="edit-label pull-left">
									<label>
										备注:
									</label>
								</div>
								<div class="edit-wrapper">
									<textarea class="form-control" name="comment" id="descripte" placeholder
='不能大于18个汉字'></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
								<button id="cancel" onclick="history.back(-1);" class="button-default button-large" type="button">取消</button>&nbsp;&nbsp;
								</div>
								<div class="col-xs-3 col-xs-offset-2">
									<button id="save"  class="button-red button-large" type="submit">提交</button>
								</div>
							</div>
						</div>

					</div>
				</form>
			</div>
	</body>


</html>