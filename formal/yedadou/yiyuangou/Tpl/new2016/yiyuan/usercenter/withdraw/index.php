<?php include($this->tpl('shop/public:html_header.php')) ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/yiyuan/css/ico.css" />
		<link href="{__STATIC_URL__}/public/css/pure-min.css" rel="stylesheet" type="text/css" />
		<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/??public1.css,withdraw.css" rel="stylesheet" type="text/css" />
		<script src="{__STATIC_URL__}/public/yiyuan/new2016/js/??shortAlert.js,withdraw1.js"></script> 
		<title>申请提现</title>
		
	</head>

	<body class="">
		<div class="wrapper">
			<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
			<!-- <div class="common-container"> -->
				<div class="top-container center">
					<!-- <div>
						<<s></s>pan class="">*可提现积分：<span class="red1 bold"><span id="maxMoney"><?=$balance['point']?></span></span></span></br>
						<span class="">*可兑换金额：<span class="red1 bold">￥<span id="maxMoney"><?=$withdraw?></span></span></span></br>
						<span class="">*累计兑换金额：<span class="red1 bold">￥<span id="maxMoney"><?=empty($sum)?'0.00':$sum;?></span></span></span>
					</div> -->
					<div style="color:#999999">
						<?=$this->showBonusLimit()?>
					</div>
				</div>
            <?php
            $ydd_api_url = rtrim(\Lib\App\Config::get('ydd_api_url'),'/');
            ?>
				<input type="hidden" id="addressDataUrl" name="addressDataUrl" value="<?=$ydd_api_url?>/getRegion" />		
				<form id="dataForm" method="post" action="">
					<!-- <input type="hidden" name="type" value="1"> -->
					<div class="middle-container center">
						<!-- <div class="">提现金额</div> -->
						
						<!-- <div class="money-container center">
							<input type="text"<?=$canWithdraw && $left<=0 ? '' : ' disabled'?> class="form-control center" id="money" name="money" placeholder="最低提现额度<?=$minLimit?>元" min="<?=$minLimit?>">
						</div> -->
						<!-- <div class="withdraw-type">
							<span class="type-title">提取方式</span>
							<label class="radio2">
								<input name="account_type" type="radio" value="redpack" checked data-id="account_type" data-toggle=""/>
								<span class="">微信红包</span>
							</label>
							<label class="radio2">
								<input name="account_type" type="radio" value="wx_transfer" data-id="account_type" data-toggle="" checked/>
								<span class="">微信转账</span>
							</label>
							<label class="radio2">
								<input name="account_type" type="radio" checked value="bank" data-id="account_type" data-toggle="typeContainer" />
								<span class="">银行卡</span>
							</label>
						</div> -->

						<div class="" id="typeContainer">

							<div class="cus-list-input1">
								<div>
									<label>
										现有积分
									</label>
									<div class="item-text" style="color:#db3855">
										<?=$balance['point']?>
									</div>
								</div>
							</div>

							<div class="cus-list-input1">
								<div>
									<label>
										兑换余额
									</label>
									<div class="item-text" style="color:#db3855">
										￥ <?=$withdraw?>
									</div>
								</div>
							</div>

							<div class="cus-list-input1" style="margin-bottom: 12px;"> 
								<div style="border-bottom: 0px;">
									<label>
										历史提现记录
									</label>
									<div class="item-text" style="color:#db3855">
										￥ <?=empty($sum)?'0.00':$sum;?>
									</div>
								</div>
							</div>

							<div class="cus-list-input1">
								<div>
									<label>
										收款人
									</label>
									<div class="item-input">
										<input type="text" id="name"value="<?=val($account,'account_name')?>" name="account_name" placeholder="输入持卡人姓名">
									</div>
								</div>
							</div>

							<div class="cus-list-input1">
								<div>
									<label>
										收款账号
									</label>
									<div class="item-input">
										<input type="tel" id="cardNumber" value="<?=val($account,'account')?>" name="account" placeholder="输入银行卡号">
									</div>
								</div>
							</div>

							<div class="cus-list-select">
								<div class="">
									<label class="reuqired">
										开户所在地
									</label>
									<div class="item-select">
										<div>
											<div class="cus-select">
												<select id="category1" name="province" data-tip="省份">
													<option value="" data-id="0" selected>请选择省份</option>
													<option value="广东省" data-id="440000">广东省</option>
													<option value="北京" data-id="110000">北京</option>
													<option value="天津" data-id="120000">天津</option>
													<option value="河北省" data-id="130000">河北省</option>
													<option value="山西省" data-id="140000">山西省</option>
													<option value="内 cl蒙古" data-id="150000">内蒙古</option>
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
											</div>
										</div>
										
										<div>
											<div class="cus-select">
												<select id="category2" name="city" data-tip="城市">
													<option value="" data-id="0" selected>请选择城市</option>
												</select>
											</div>	
										</div>
										
										<div>
											<div class="cus-select">
												<select id="category3" name="area" data-tip="区域">
													<option value="" data-id="0" selected>请选择区域</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="cus-list-select">
								<div class="" style="border-bottom:0px;">
									<label class="reuqired">
										收款银行
									</label>
									<div class="item-select">
										<div>
											<div class="cus-select">
												<select id="category1" name="bank" data-tip="" placeholder="请选择收款银行">
                                                    <option value="">请选择收款银行</option>
                                                    <?php foreach($banks as $v){?>
													<option value="<?=$v?>"><?=$v?></option>
                                                    <?php }?>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="cus-list-input1" style="margin-bottom: 12px;height:56px;">
								<div class="" style="border-bottom:0px;">
									<label>
									</label>
									<div class="item-input" >
										<input type="text" style="border-radius:0px;border-bottom:1px solid #eee;" placeholder="" id="bank" value="" name="bank_name" style="padding-right:30px;" placeholder="">
									</div>
									<span style="position: relative;margin-top: -32px;float: right;color: #989898">支行</span>
								</div>
							</div>

							<div class="cus-list-input1">
								<div class="" style="border-bottom: 0px;">
									<label>
										提现金额
									</label>
									<div class="item-input">
										<span id="maxMoney" style="display:none;"><?=$withdraw?></span>
										<!-- <input id="money" type="text" placeholder="最低提现额度<?=$minLimit?>元" id="bank" value="" name=""> -->
										<input type="tel"<?=$canWithdraw && $left<=0 ? '' : ' disabled'?> id="money" name="money" placeholder="最低提现额度<?=$minLimit?>元" min="<?=$minLimit?>">
									</div>
								</div>
							</div>

						</div>

						<?php if($left>0){ ?>
						<span style="color: #db3855;line-height:29px;height:29px;text-align:center;">距离您下次可提现时间还剩<?=ceil($left/86400)?>天</span>
						<?php } ?>
						<div class="" style="text-align:center; margin-bottom:18px;margin-top:18px;">
							<button id="save" style="width:41.5%;margin-right:18px;" class="cus-btn cus-btn-md cus-btn-red" type="submit">确认</button>
							<button id="cancel" style="width:41.5%" onclick="history.back(-1);" class="cus-btn cus-btn-md cus-btn cus-btn-grey" type="button">取消</button>
						</div>
					</div>
				</form>
				<div class="notice">
					<label>温馨提示：</label>
					<div class="">
						<span>您所提现的金额将在七个工作日左右内到账，请注意查收！</span>
						<span>请留意银行卡账户变动信息</span>
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
			<!-- </div> -->
			<script>
			</script>

			<?php include($this->tpl('yiyuan/public:footer.php')) ?>
		</div>
	</body>

</html>