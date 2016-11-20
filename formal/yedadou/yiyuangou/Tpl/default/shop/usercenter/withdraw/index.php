<?php include($this->tpl('shop/public:html_header.php')) ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/withdraw.css" />
		<script src="{__STATIC_URL__}/public/front/default/js/withdraw.js"></script>
		<title>申请提现</title>
	</head>

	<body class="">
		<div class="wrapper">
			<?php include($this->tpl('shop/public:header.php')) ?>
			<div class="common-container">
				<div class="top-container center">
					<div>
						<span class="">*可提现金额：<span class="red1 bold">￥<span id="maxMoney"><?=$balance['comission']?></span></span></span>
					</div>
					<div style="color:#999999">
						<?=$this->showBonusLimit()?>
					</div>
				</div>

				<form id="dataForm" method="post" action="">
					<div class="middle-container center">
						<div class="">提现金额</div>
						<div class="money-container center">
							<input type="text"<?=$canWithdraw ? '' : ' disabled'?> class="form-control center" id="money" name="money" placeholder="最低提现额度<?=$minLimit?>元" min="<?=$minLimit?>">
						</div>
						<div class="withdraw-type">
							<span class="type-title">提取方式</span>
							<!-- <label class="radio2">
								<input name="account_type" type="radio" value="redpack" checked data-id="account_type" data-toggle=""/>
								<span class="">微信红包</span>
							</label> -->
							<label class="radio2">
								<input name="account_type" type="radio" value="wx_transfer" data-id="account_type" data-toggle="" checked/>
								<span class="">微信转账</span>
							</label>
							<!-- <label class="radio2">
								<input name="account_type" type="radio" value="bank" data-id="account_type" data-toggle="typeContainer" />
								<span class="">银行卡</span>
							</label> -->
						</div>

						<div class="withdraw-container hide" id="typeContainer">
							<div class="container-fluid">
								<div class="row">
									<div class="edit-label pull-left">
										<label>
											开户行:
										</label>
									</div>
									<div class="edit-wrapper">
										<input type="text" class="form-control" id="bank" value="<?=val($account,'bank_name')?>" name="bank_name" placeholder="输入开户行">
									</div>
								</div>
								<div class="row">
									<div class="edit-label pull-left">
										<label>
											银行卡号:
										</label>
									</div>
									<div class="edit-wrapper">
										<input type="text" class="form-control" id="cardNumber" value="<?=val($account,'account')?>" name="account" placeholder="输入银行卡号">
									</div>
								</div>
								<div class="row">
									<div class="edit-label pull-left">
										<label>
											持卡人姓名:
										</label>
									</div>
									<div class="edit-wrapper">
										<input type="text" class="form-control" id="name"value="<?=val($account,'account_name')?>" name="account_name" placeholder="输入持卡人姓名">
									</div>
								</div>
							</div>
						</div>

						<div class="buttons center">
							<button id="save" class="button-yellow " type="button">确认</button>&nbsp;&nbsp;
							<button id="cancel" onclick="history.back(-1);" class="button-default" type="button">取消</button>
						</div>
					</div>
				</form>
				<div class="line"></div>
				<div class="tips">
					<div class="tips-title">温馨提示：</div>
					<div class="tips-content">
						如选择提现到银行卡，您所提现的金额将在三个工作日内到账，请注意查收！
					</div>
				</div>
				<!--<div class="line"></div>
				<div class="line"></div>-->
				<?php if(!$user['is_subscribe']):?>
				<div class="bottom-container center">
					<div class="center follow-tip">
						<span class="pull-left follow-tip-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/not-follow.png"></span>
						<div class="follow-tip-content">
							<div class="middle-outer">
								<div class="middle-inner">
									您还未关注本公众号，会影响发放红包给您哟！
								</div>
							</div>
						</div>
					</div>

					<div class="center follow-button">
						<a title="" class="button-red button-large" href="http://mp.weixin.qq.com/s?__biz=MzA5Nzg1NTM5NQ==&mid=215759124&idx=1&sn=45069e2a0ce8e0c7e938786583a9736e#rd">点击关注</a>
					</div>
				</div>
				<?php endif?>
				</div>
			</div>

			<?php include($this->tpl('shop/public:footer.php')) ?>
		</div>
	</body>

</html>