<?php include $this->tpl('shop:public/html_header.php') ?>
	<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/moneyAccount.css" />
	<script src="{__STATIC_URL__}/public/front/default/js/moneyAccount.js"></script>
	<title>修改银行卡</title>
	
	</head>
				
	<body class="no-skin">
		<div class="wrapper">
			<?php include $this->tpl('shop:public/header.php') ?>
			<div  style="padding: 10px;">
				<div id="addForm" style="margin-top: 10px;" class="alert alert-warning" role="alert">
					<form action="/shop/UserCenter/MoneyAccount/update?id=<?=$id?>" class="form-horizontal" method="post" >
					  <div class="form-group">
					    <label for="account_name" class="col-sm-2 col-xs-3 control-label">姓名:</label>
					    <div class="col-sm-10 col-xs-9">
					      <input type="text" class="form-control" id="account_name" name="account_name" value="<?=$account_name?>">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="account" class="col-sm-2 col-xs-3 control-label" style="white-space:nowrap;">开户行：</label>
					    <div class="col-sm-10 col-xs-9">
					      <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?=$bank_name?>">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="account" class="col-sm-2 col-xs-3 control-label">账户：</label>
					    <div class="col-sm-10 col-xs-9">
					      <input type="text" class="form-control" id="account" name="account" value="<?=$account?>">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-xs-offset-3 col-sm-10 col-xs-9">
					      <button type="submit" class="btn btn-default">修改</button>
					    </div>
					  </div>
					</form>
				</div>
				</div>
			</div>
			<?php include $this->tpl('shop:public/footer.php') ?>
	</body>

</html>