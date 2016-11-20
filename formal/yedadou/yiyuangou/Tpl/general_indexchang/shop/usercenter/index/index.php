<?php include $this->tpl('shop:public/html_header.php') ?>
<script>
	$(function(){
		//$('#noAttentionTip1').modal();
		//$('#noAttentionTip2').modal();
	});
	
</script>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/person.css" />
		<script src="{__STATIC_URL__}/public/front/default/js/person.js?t=201510291648"></script>
		
		<title>个人中心</title>
	</head>

	<body class="">
		<div class="wrapper">
			<?php include $this->tpl('shop:public/header.php') ?>
			<!--顶部-->
			<div class="top-container center">
				<div class="user-image-container center">
					<a href="<?=$this->getAuthUrl(cur_url())?>" id="userImage">
						<div class="user-image"><img src="<?=\Lib\App\Util::getAvatarBySize($avatar,64)?>" alt="" /></div>
					</a>
				</div>
				<a href="/shop/UserCenter/UserInfo" class="edit-info">
				</a>
				<div class="id-and-name color64">
					<div class="">会员ID : <?=$uid?> </div>
					<div class="">昵 称: <?=$nick?></div>
				</div>
				<div class="achievement-list clearfix">
					<ul>
						<li>
							<a href="/shop/UserCenter/PointList">
								<div><?php
								echo val($footerConfig[6],0,'积分');
								 ?></div>
								<div><?=$point?></div>
							</a>
						</li>
						<li>
							<a>
								<div>销售业绩</div>
								<div><?=price(array_sum(array_values(val($tree_data,'sale_count',[])))+$total_sale)?></div>
							</a>
						</li>
						<li>
							<a href="/shop/UserCenter/CommissionList">
								<div>
								<?php //佣金
								echo val($footerConfig[6],1,'佣金');   
								?>
								</div>
								<div><?=$total_comission?></div>
							</a>
						</li>
					</ul>
				</div>
			</div>
			
			<!--通用容器-->
			<div class="common-container">
				<div class="group-block">
					<!--用户信息[START]-->
					<div class="list-container relative nopb">
						<a href="#" data-id="toggle">
							<div class="list-header">
								<span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico1.png"></span>
								<span class="list-header-title">饮水思源</span>
								<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
							</div>
						</a>
						<div class="inner-list">
							<div class="media relative user-info">
								<?php if($parentUser):?>
								<div class="media-left ">
									<a href="#">
										<img class="media-object" src="<?=$parentUser['avatar']?>" alt="">
									</a>
								</div>
								<div class="media-body relative">
									<!--<a id="contact" title="" class="button-blue contact pull-right" href="#">点击联系</a>-->
									
									<div class="user-rows relative">
										<div class="user-row">
											<div class="user-label pull-left">昵称：</div>
											<div class="user-label-wrapper"><?=$parentUser['nick']?></div>
										</div>
										<div class="user-row">
											<div class="user-label pull-left">ID：</div>
											<div class="user-label-wrapper"><?=$parentUser['uid']?></div>
										</div>
										<div class="user-row">
											<div class="user-label pull-left">TEL：</div>
											<div class="user-label-wrapper"><?=$parentUser['phone']?></div>
										</div>
									</div>
								</div>
								<?php endif?>
							</div>
						</div>
					</div>
					<!--用户信息[END]-->
				</div>

				<div class="group-block">
					<!--我的合伙人[START]-->
					<div class="list-container relative">
						<a href="#" data-id="toggle">
							<div class="list-header">
								<span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico2.png"></span>
								<span class="list-header-title">我的合伙人</span>&nbsp;
								<span class="red1"><?=val($tree_data['fans_count'],'level1',0)?>位</span>
								<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
							</div>
						</a>
						<div class="inner-list">
							<table id="partnerTable" class="normal-table">
								<tbody>
									
								</tbody>
							</table>
						</div>
						<!--下拉按钮,点击可以翻页-->
						<div data-template="#tpl-partner" class="next-page" title="点击加载更多" data-auto-page="true" data-page-table="#partnerTable" data-auto="ajax" data-href="/shop/UserCenter/getTree?level=1" data-tip="" data-show-tip="true" data-submit-id="partnerPage:page" data-success-function="showPartnerPage"
						data-show-response="false">
							<!--当前页数-->
							<input type="hidden" id="partnerPage" value="1" />
							<i class="fa fa-angle-double-down"></i>
						</div>
					</div>
					<!--我的合伙人[END]-->
					<!--我的小伙伴[START]-->
					<div class="list-container relative">
						<a href="#" data-id="toggle">
							<div class="list-header">
								<span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico3.png"></span>
								<span class="list-header-title">我的小伙伴</span>&nbsp;
								<span class="red1"><?=val($tree_data['fans_count'],'level2',0)?>位</span>
								<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
							</div>
						</a>
						<div class="inner-list">
							<table id="littleTable" class="normal-table">
								<tbody>
									
								</tbody>
							</table>
						</div>
						<!--下拉按钮,点击可以翻页-->
						<div data-template="#tpl-little" class="next-page" title="点击加载更多" data-auto-page="true" data-page-table="#littleTable" data-auto="ajax" data-href="/shop/UserCenter/getTree?level=2" data-tip="" data-show-tip="true" data-submit-id="littlePage:page" data-success-function="showLittlePage"
						data-show-response="false">
							<!--当前页数-->
							<input type="hidden" id="littlePage" value="1" />
							<i class="fa fa-angle-double-down"></i>
						</div>
					</div>
					<!--我的小伙伴[END]-->
					<!--我的创客圈[START]-->
					<div class="list-container relative">
						<a href="#" data-id="toggle">
							<div class="list-header">
								<span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico4.png"></span>
								<span class="list-header-title">我的创客圈</span>&nbsp;
								<span class="red1"><?=val($tree_data['fans_count'],'level3',0)?>位</span>
								<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
							</div>
						</a>
						<div class="inner-list">
							<table id="makerTable" class="normal-table">
								<tbody>
									
								</tbody>
							</table>
						</div>
						<!--下拉按钮,点击可以翻页-->
						<div data-template="#tpl-maker" class="next-page" title="点击加载更多" data-auto-page="true" data-page-table="#makerTable" data-auto="ajax" data-href="/shop/UserCenter/getTree?level=3" data-tip="" data-show-tip="true" data-submit-id="makerPage:page" data-success-function="showMakerPage"
						data-show-response="false">
							<!--当前页数-->
							<input type="hidden" id="makerPage" value="1" />
							<i class="fa fa-angle-double-down"></i>
						</div>
					</div>
					<!--我的创客圈[END]-->
				</div>

				<div class="group-block">
					<div class="list-container relative">
						<a href="/shop/UserCenter/UserInfo">
							<div class="list-header">
								<span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico2.png"></span>
								<span class="list-header-title">个人资料</span>
								<span class="list-header-icon pull-right"><i class="fa fa-edit fa-chevron-right color-yellow"></i></span>
							</div>
						</a>
					</div>
					<div class="list-container relative">
						<a href="/shop/UserCenter/MyCard">
							<div class="list-header">
								<span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico2.png"></span>
								<span class="list-header-title">我要推广</span>
								<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
							</div>
						</a>
					</div>
					<!--我的收藏[START]-->
					<div class="list-container relative">
						<a href="/shop/UserCenter/favorites">
							<div class="list-header">
								<span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico5.png"></span>
								<span class="list-header-title">我的收藏</span>
								<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
							</div>
						</a>
					</div>
					<!--我的收藏[END]-->
				</div>

				<div class="group-block">
					<!--我的订单[START]-->
					<div class="list-container relative">
						<a href="/shop/UserCenter/MyOrderList">
							<div class="list-header">
								<span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico6.png"></span>
								<span class="list-header-title">我的订单</span>
								<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
							</div>
						</a>
					</div>
					<!--我的订单[END]-->
					<!--收货地址[START]-->
					<div class="list-container relative">
						<a href="/shop/UserCenter/address">
							<div class="list-header">
								<span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico7.png"></span>
								<span class="list-header-title">收货地址</span>
								<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
							</div>
						</a>
					</div>
					<!--收货地址[END]-->
				</div>

				<div class="group-block">
					<!--申请提现[START]-->
					<div class="list-container relative">
						<a href="#" data-id="toggle">
							<div class="list-header">
								<span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico7.png"></span>
								<span class="list-header-title">申请提现</span>
								<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
							</div>
						</a>
						<div class="inner-list">
							<ul class="list-group">
								<li class="list-group-item list-group-item-warning">佣金未到账: <span class="red1">￥<?=abs(price($total_comission-$comission-$total_withdraw))?></span></li>
								<!-- <li class="list-group-item list-group-item-warning">提现审核中: <span class="red1">￥</span></li> -->
								<li class="list-group-item list-group-item-warning">可提现金额: <span class="red1">￥<?=$comission?></span></li>
							</ul>
							<div class="center"><a title="" class="button-yellow button-large" href="/shop/UserCenter/Withdraw">立即提现</a></div>
							<div class="history"><span title="" class="button-tab">历史提现记录</span></div>
							<table id="withdrawTable" class="normal-table">
								<tbody>
									<!--<tr>
										<td>
											<span class="color64 withdraw-time">* <span data-id="dataTime">2015-07-11  10:09:13</span></span>
											<span class="color64 withdraw-money">提现:<span class="red1 bold">￥<span data-id="dataBonus">410</span></span></span>
										</td>
									</tr>-->
								</tbody>
							</table>
						</div>
						<!--下拉按钮,点击可以翻页-->
						<div data-template="#tpl-withdraw" class="next-page" title="点击加载更多" data-auto-page="true" data-page-table="#withdrawTable" data-auto="ajax" data-href="/shop/UserCenter/WithdrawList" data-tip="" data-show-tip="true" data-submit-id="withdrawPage:page"
						data-success-function="showWithdrawPage" data-show-response="false">
							<!--当前页数-->
							<input type="hidden" id="withdrawPage" value="1" />
							<i class="fa fa-angle-double-down"></i>
						</div>
					</div>
					<!--申请提现[END]-->
					<!--账号管理[START]-->
					<div class="list-container relative">
						<a href="/shop/UserCenter/MoneyAccount">
							<div class="list-header">
								<span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico8.png"></span>
								<span class="list-header-title">账号管理</span>
								<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
							</div>
						</a>
					</div>
					<!--账号管理[END]-->
				</div>
			</div>

			<!--分页模板开始-->
			<!--我的合伙人-->
			<div id="tree-tpl" class="hide">
				<span class="partner-image"><img class="" data-id="dataImage" src=""></span>
				<span class="partner-bonus">佣金/<span class="red1 bold">￥<span data-id="dataBonus">0</span></span>
				</span>
				<div class="partner-info"><span class="partner-title" data-id="dataTitle"></span><span class="partner-bill"><span class="color-yellow bold" data-id="dataBill">0</span> 单</span>
				</div>
			</div>
			
			<!--申请提现-->
			<div id="tpl-withdraw" class="hide">
				<span class="color64 withdraw-time">* <span data-id="dataTime"></span></span>
				<span class="color64 withdraw-status center"><span data-id="dataStatus"></span></span>
				<span class="color64 withdraw-money">提现:<span class="red1 bold">￥<span data-id="dataBonus">0</span></span></span>
			</div>
			<!--分页模板结束-->
			<?php include $this->tpl('shop:public/footer.php') ?>
		</div>
	</body>

</html>