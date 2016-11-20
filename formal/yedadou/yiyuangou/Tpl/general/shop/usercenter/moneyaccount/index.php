<?php include $this->tpl('shop:public/html_header.php') ?>
	<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/moneyAccount.css" />
	<script src="{__STATIC_URL__}/public/front/default/js/moneyAccount.js"></script>
	<title>帐号管理</title>
	</head>

	<body class="no-skin">
		<div class="wrapper">
			<?php include $this->tpl('shop:public/header.php') ?>
			<div  style="padding: 10px;">
				<a id="btnAdd" class="btn btn-default btn-block" href="">添加银行卡<span class="glyphicon glyphicon-menu-down icoOffset"></span></a>
				<div id="addForm" style="display: none;margin-top: 10px;" class="alert alert-warning" role="alert">
					<form action="/shop/UserCenter/MoneyAccount/add" class="form-horizontal" method="post" enctype="multipart/form-data">
					  <div class="form-group">
					    <label for="account_type" class="col-sm-2 col-xs-3 control-label">类型:</label>
					    <div class="col-sm-10 col-xs-9">
					     <label class="radio-inline">
						  <input type="radio" id="account_type" name="account_type" value="3" checked="checked"> 银行卡
						</label>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="account_name" class="col-sm-2 col-xs-3 control-label">姓名:</label>
					    <div class="col-sm-10 col-xs-9">
					      <input type="text" class="form-control" id="account_name" name="account_name">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="account" class="col-sm-2 col-xs-3 control-label" style="white-space:nowrap;">开户行：</label>
					    <div class="col-sm-10 col-xs-9">
					      <input type="text" class="form-control" id="bank_name" name="bank_name">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="account" class="col-sm-2 col-xs-3 control-label">账户：</label>
					    <div class="col-sm-10 col-xs-9">
					      <input type="text" class="form-control" id="account" name="account">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-xs-offset-3 col-sm-10 col-xs-9">
					      <button type="submit" class="btn btn-default">添加</button>
					    </div>
					  </div>
					</form>
				</div>
					<?php if(!$isEmpty):?>
					<?php foreach ($itemes as $arr):?>
					<div class="container item accountList">
						<div class="row">
							<div class="col-xs-3 account_type">
								<?php
								$account_type='未知';
								switch($arr['account_type']){
									case 1:
										$account_type='支付宝';
										break;
									case 2:
										$account_type='微信';
										break;
									case 3:
										$account_type='银行卡';
										break;
								}
								echo $account_type;
							 ?>
							</div>
							<div class="col-xs-9 account_name">
								<?=$arr['account_name']?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 account">
								<?=$arr['bank_name']?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 account">
								<?=$arr['account']?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 account">
								<a href='/shop/UserCenter/MoneyAccount/update?id=<?=$arr['id']?>' class="btn btn-default btn-sm">编辑</a> <a href='/shop/UserCenter/MoneyAccount/delete?id=<?=$arr['id']?>' class="btn btn-default btn-sm">删除</a>
							</div>
						</div>
					</div>
					<?php endforeach?>
					<?php endif?>
				</div>
			</div>
			<?php include $this->tpl('shop:public/footer.php') ?>
	</body>

</html>