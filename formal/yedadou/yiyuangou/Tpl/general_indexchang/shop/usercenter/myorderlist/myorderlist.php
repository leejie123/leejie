<?php include($this->tpl('shop/public:html_header.php')) ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/order.css" />

		<title>我的订单</title>
	</head>

	<body class="">
		<div class="wrapper">
			<!--公用头部开始 -->
		
			<?php include $this->tpl('shop:public/header.php') ?>
			<!--购物车容器-->
			<input  type="hidden" id='isEnableReturn' value='<?php echo val($appGlobalSetting,'isEnableReturn',2); ?>' />
			<input  type="hidden" id='period' value='<?php echo val($appGlobalSetting,'period',7); ?>' />
			
			<div class="cart-container">
				<!--导航-->
				<div class="tab-list">
					<ul>
						<li class="active" data-toggle="#tab1">
							<a href="javascript:void(0);">
								<span class="">全部</span><span class="red1 bold">
								
								<?php 
								    $count = 0;
									if(!empty($myOrders)){
                                       foreach ($myOrders as $key=>$value){
										 	if($value['status'] >= 0){					 		
										 		$count++;
										 	}
										 }
									}
									echo $count;
										
								?>
								
								</span>
							</a>
						</li>
						<li data-toggle="#tab2">
							<a href="javascript:void(0);">
								<span class="">未付款</span><span class="color-yellow bold">
								
								<?php 
								$count = 0;
									if(!empty($myOrders)){	
												
										 foreach ($myOrders as $key=>$value){
										 	if($value['status'] == 1){					 		
										 		$count++;
										 	}
										 }
									}
									echo $count;
								?>
								
								</span>
							</a>
						</li>
						<li data-toggle="#tab3">
							<a href="javascript:void(0);">
								<span class="">进行中</span><span class="red1 bold">
								<?php 
								$count = 0;
									if(!empty($myOrders)){	
												
										 foreach ($myOrders as $key=>$value){
										 	if($value['status'] >1 && $value['status'] < 4){					 		
										 		$count++;
										 	}
										 }
									}
									echo $count;
								?>
								</span>
							</a>
						</li>
						<li data-toggle="#tab4">
							<a href="javascript:void(0);">
								<span class="">已完成</span><span class="red1 green">
								<?php 
									$count = 0;
									if(!empty($myOrders)){	
												
										 foreach ($myOrders as $key=>$value){
										 	if($value['status'] >= 4){					 		
										 		$count++;
										 	}
										 }
									}
									echo $count;
								?>
								</span>
							</a>
						</li>
					</ul>
				</div>
				<?php if(!empty($myOrders)):?>
				<!--全部-->
				<div id="tab1" class="cart-list-container tab-list-content active">
					<!--订单[START]-->
				
					<?php foreach ($myOrders as $key=>$value):?>
					<div class="g-item">
                        <?php if($value['status'] >=0 ):?>
                        <?php if($value['status'] ==1 || $value['status'] >=4):?>
						<a data-id="delete" title="删除订单" class="close-icon" href="/shop/UserCenter/MyOrderList/update?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&status=-1">
							<i class="fa fa-times"></i>
						</a>
                        <?php endif;?>
						<div class="g-title-container center color64 relative">
							<span class="g-item-title single-line">订单编号	<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?></span>
							<div class="order-time text-center">
								<?php echo !empty($value['create_time'])?date('Y-m-d h:i',$value['create_time']):'';?>
							</div>
						</div>
						<?php if (!empty($value['items'])):?>
						<?php $count = count($value['items']);?>
						<?php foreach ($value['items'] as $k=>$val):?>
						<!--单个商品[START]-->
						<div class="media relative">
							<div class="media-left ">
								<a href="/shop/shopGoods/ProductDetails?id=<?php echo !empty($val['goods_id'])?$val['goods_id']:0;?>">
									<img class="media-object" src="<?php echo !empty($val['pic_url'])?$val['pic_url']:'';?>" alt="">
								</a>
							</div>
							<div class="media-body relative" style="height: 95px;">
								<h4 class="media-heading">
									<a href="/shop/shopGoods/ProductDetails?id=<?php echo !empty($val['goods_id'])?$val['goods_id']:0;?>">
										<?php echo !empty($val['title'])?$val['title']:'';?>
									</a>
								</h4>
								<div class="specification"><?php echo !empty($val['spec'])?$val['spec']:'';?></div>
								<div class="">
									<span class="color64">共<span class="color-yellow"><?php echo !empty($val['quantity'])?$val['quantity']:'';?></span>件商品</span>&nbsp;&nbsp;
									<a data-id="share" href="#" class=""><i class="fa fa-share-square-o color-yellow"></i></a>
								</div>
								<?php //if($value['status'] == 1 || $value['status'] == 4 || $value['status'] == 5 ):?>
<!-- 								<a data-id="refund" title="申请退货" class="refund" href="/shop/userCenter/Refund?order_sn= > -->
<!-- 									申请退货 -->
<!-- 								</a> -->
								<?php //endif;?>	
								
								<div class="price-container">
									<span class="color-yellow bold price">总价：￥<?php echo !empty($val['price'])?$val['price']:'';?></span>
								</div>
								<?php if($k+1 == $count):?>
								<div style="position: absolute;width: 150px;right: 0;    top: 70px;">
								<?php if($value['status'] ==0 ):?>
								<span class="color-yellow order-state">已取消</span>								
								<?php endif;?>
								<?php if($value['status'] ==1 ):?>
								<span class="color-yellow order-state">待付款</span>
								<a data-id="pay" title="" class="button-yellow operation" href="/pay/pay?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&app=<?=$this->getApp()['biz_app_id']?>">
									立即支付
								</a>
								<?php endif;?>
								<?php if($value['status'] ==2 ):?>
								<span class="color-yellow order-state">待发货</span>
								<?php endif;?>	
								<?php if($value['status'] ==3 ):?>
								<span class="color-yellow order-state">已发货</span>
								<a data-id="sure" title="" class="button-yellow operation" href="/shop/UserCenter/MyOrderList/update?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&status=4">
									确认收货
								</a>
								<?php endif;?>		
								<?php if($value['status'] ==4 ):?>
								<span class="color-yellow order-state">待评论</span>
								<a data-id="pay" title="" class="button-yellow operation" href="#">
									去评论
								</a>
								<?php endif;?>
								<?php if($value['status'] ==5 ):?>
								<span class="color-yellow order-state">已完成</span>
								<?php endif;?>
								</div>
								<?php endif;?>
							</div>
							    <?php if($value['status'] ==3||$value['status'] ==4||$value['status'] ==5 ):?>
								<a data-id="" title="" href="/shop/UserCenter/MyOrderList/update?act=viewInvoice&invoice=<?php echo val($value['info'], 'invoice', '');?>" style="bottom: -40px;left: -40px;width: 80px;">
								<div class="list-header">
									<span class="list-header-image"></span>
									<span class="list-header-title">查看物流</span>&nbsp;
									<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
								</div>
								</a>
								<?php endif;?>
						</div>
					<!--单个商品[END]-->
						<?php endforeach;?>
						<?php endif;?>
						<?php endif;?>
						<!--物流信息-->
<!--						<div class="g-description relative" style='display: none'>
							<div class="container-fluid">
								<div class="row">
									<div class="label-wrapper">
										<label>2015-07-15 16:07</label>
									</div>
									<div class="label-content-wrapper">
										<span class="">浙江省金华市义乌市市场部 已发货</span>
									</div>
								</div>
								<div class="row">
									<div class="label-wrapper">
										<label>2015-07-15 16:07</label>
									</div>
									<div class="label-content-wrapper">
										<span class="">浙江省金华市义乌市市场部 已发货</span>
										<span class="pull-right"><a data-id="express" title="" class="" href="#"><i class="fa fa-chevron-right color-yellow"></i></a></span>
									</div>
								</div>
							</div>
						</div>-->
					</div>
					<?php endforeach;?>
									
					<!--订单[END]-->
				</div>
				<?php else:?>	
				
				<div id="tab1" class="cart-list-container tab-list-content active">
					<!--订单列表为空-->
					<div class="cart-empty text-center">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="{__STATIC_URL__}/public/front/default/images/demo/icon/order-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您的订单为空！</div>
							<div class="cart-empty-buy">
								<a title="" class="color-yellow" href="/shop/">
									马上去逛逛吧 &gt;
								</a>
							</div>
						</div>
					</div>
				</div>				
				<?php endif;?>	
			
				
				
				<!-- 待付款 -->
				<?php 
				$hasOrder = false;
				if(!empty($myOrders)){				
					 foreach ($myOrders as $key=>$value){
					 	if($value['status'] == 1){					 		
					 		if(!empty($value['items']))
					 			$hasOrder = true;
					 	}
					 }
				}
					 if($hasOrder){
				?>
				
				
				<div id="tab2" class="cart-list-container tab-list-content ">
					<!--订单[START]-->
				
					<?php foreach ($myOrders as $key=>$value):?>
					<?php if($value['status'] == 1):?>
					<div class="g-item">
						<a data-id="delete" title="删除订单" class="close-icon" href="/shop/UserCenter/MyOrderList/update?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&status=-1">
							<i class="fa fa-times"></i>
						</a>
						<div class="g-title-container center color64 relative">
							<span class="g-item-title single-line">订单编号	<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?></span>
							<div class="order-time text-center">
								<?php echo !empty($value['create_time'])?date('Y-m-d h:i',$value['create_time']):'';?>
							</div>
						</div>
						<?php if (!empty($value['items'])):?>
						<?php $count = count($value['items']);?>
						<?php foreach ($value['items'] as $k=>$val):?>
						<!--单个商品[START]-->
						<div class="media relative">
							<div class="media-left ">
								<a href="/shop/shopGoods/ProductDetails?id=<?php echo !empty($val['goods_id'])?$val['goods_id']:0;?>">
									<img class="media-object" src="<?php echo !empty($val['pic_url'])?$val['pic_url']:'';?>" alt="">
								</a>
							</div>
							<div class="media-body relative" style="height: 95px;">
								<h4 class="media-heading">
									<a href="/shop/shopGoods/ProductDetails?id=<?php echo !empty($val['goods_id'])?$val['goods_id']:0;?>">
										<?php echo !empty($val['title'])?$val['title']:'';?>
									</a>
								</h4>
								<div class="specification"><?php echo !empty($val['spec'])?$val['spec']:'';?></div>
								<div class="">
									<span class="color64">共<span class="color-yellow"><?php echo !empty($val['quantity'])?$val['quantity']:'';?></span>件商品</span>&nbsp;&nbsp;
									<a data-id="share" href="#" class=""><i class="fa fa-share-square-o color-yellow"></i></a>
								</div>
								
<!-- 								<a data-id="refund" title="申请退货" class="refund" href="/shop/userCenter/Refund?order_sn=> -->
<!-- 									申请退货 -->
<!-- 								</a> -->
								
								
								<div class="price-container">
									<span class="color-yellow bold price">总价：￥<?php echo !empty($val['price'])?$val['price']:'';?></span>
								</div>
								
								<?php 								
								if($k+1 == $count):?>
								<?php if($value['status'] ==0 ):?>
								<span class="color-yellow order-state">已取消</span>								
								<?php endif;?>
								<?php if($value['status'] ==1 ):?>
								<span class="color-yellow order-state">待付款</span>
								<a data-id="pay" title="" class="button-yellow operation" href="/pay/pay?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&app=<?=$this->getApp()['biz_app_id']?>">
									立即支付
								</a>
								<?php endif;?>
								<?php if($value['status'] ==2 ):?>
								<span class="color-yellow order-state">待发货</span>
								<?php endif;?>	
								<?php if($value['status'] ==3 ):?>
								<span class="color-yellow order-state">已发货</span>
								<a data-id="sure" title="" class="button-yellow operation" href="/shop/UserCenter/MyOrderList/update?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&status=4">
									确认收货
								</a>
								<?php endif;?>								
								<?php if($value['status'] ==4 ):?>
								<span class="color-yellow order-state">待评论</span>
								<a data-id="pay" title="" class="button-yellow operation" href="#">
									去评论
								</a>
								<?php endif;?>
								<?php if($value['status'] ==5 ):?>
								<span class="color-yellow order-state">已完成</span>
								<?php endif;?>
								<?php endif;?>
							</div>
						</div>
					<!--单个商品[END]-->
						<?php endforeach;?>
						<?php endif;?>
						
	
						<!--物流信息-->
<!--						<div class="g-description relative" style='display: none'>
							<div class="container-fluid">
								<div class="row">
									<div class="label-wrapper">
										<label>2015-07-15 16:07</label>
									</div>
									<div class="label-content-wrapper">
										<span class="">浙江省金华市义乌市市场部 已发货</span>
									</div>
								</div>
								<div class="row">
									<div class="label-wrapper">
										<label>2015-07-15 16:07</label>
									</div>
									<div class="label-content-wrapper">
										<span class="">浙江省金华市义乌市市场部 已发货</span>
										<span class="pull-right"><a data-id="express" title="" class="" href="#"><i class="fa fa-chevron-right color-yellow"></i></a></span>
									</div>
								</div>
							</div>
						</div>-->
					</div>
					<?php endif;?>
					<?php endforeach;?>
									
					<!--订单[END]-->
				</div>
				<?php }else{?>	
				
				<div id="tab2" class="cart-list-container tab-list-content">
					<!--订单列表为空-->
					<div class="cart-empty text-center">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="{__STATIC_URL__}/public/front/default/images/demo/icon/order-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您没有等待付款的订单！</div>
							<div class="cart-empty-buy">
								<a title="" class="color-yellow" href="/shop/">
									马上去逛逛吧 &gt;
								</a>
							</div>
						</div>
					</div>
				</div>				
				<?php }?>	
				
				
				<!-- 进行中 -->
				<?php 
				$hasOrder = false;
				if(!empty($myOrders)){	
		
					 foreach ($myOrders as $key=>$value){
					 	if($value['status'] > 1 && $value['status'] < 4){					 		
					 		if(!empty($value['items']))
					 			$hasOrder = true;
					 	}
					 }
				}
					 if($hasOrder){
				?>
				
				<div id="tab3" class="cart-list-container tab-list-content">
					<!--订单[START]-->
				
					<?php foreach ($myOrders as $key=>$value):?>
					<?php if($value['status'] >1 && $value['status']< 4):?>
					<div class="g-item">
						<div class="g-title-container center color64 relative">
							<span class="g-item-title single-line">订单编号	<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?></span>
							<div class="order-time text-center">
								<?php echo !empty($value['create_time'])?date('Y-m-d h:i',$value['create_time']):'';?>
							</div>
						</div>
						<?php if (!empty($value['items'])):?>
						<?php $count = count($value['items']);?>
						<?php foreach ($value['items'] as $k=>$val):?>
						<!--单个商品[START]-->
						<div class="media relative">
							<div class="media-left ">
								<a href="/shop/shopGoods/ProductDetails?id=<?php echo !empty($val['goods_id'])?$val['goods_id']:0;?>">
									<img class="media-object" src="<?php echo !empty($val['pic_url'])?$val['pic_url']:'';?>" alt="">
								</a>
							</div>
							<div class="media-body relative" style="height: 95px;">
								<h4 class="media-heading">
									<a href="/shop/shopGoods/ProductDetails?id=<?php echo !empty($val['goods_id'])?$val['goods_id']:0;?>">
										<?php echo !empty($val['title'])?$val['title']:'';?>
									</a>
								</h4>
								<div class="specification"><?php echo !empty($val['spec'])?$val['spec']:'';?></div>
								<div class="">
									<span class="color64">共<span class="color-yellow"><?php echo !empty($val['quantity'])?$val['quantity']:'';?></span>件商品</span>&nbsp;&nbsp;
									<a data-id="share" href="#" class=""><i class="fa fa-share-square-o color-yellow"></i></a>
								</div>

								<div class="price-container">
									<span class="color-yellow bold price">总价：￥<?php echo !empty($val['price'])?$val['price']:'';?></span>
								</div>
								
								<?php 								
								if($k+1 == $count):?>
								<div style="position: absolute;width: 150px;right: 0;    top: 70px;">
								<?php if($value['status'] ==0 ):?>
								<span class="color-yellow order-state">已取消</span>								
								<?php endif;?>
								<?php if($value['status'] ==1 ):?>
								<span class="color-yellow order-state">待付款</span>
								<a data-id="pay" title="" class="button-yellow operation" href="/pay/pay?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&app=<?=$this->getApp()['biz_app_id']?>">
									立即支付
								</a>
								<?php endif;?>
								<?php if($value['status'] ==2 ):?>
								<span class="color-yellow order-state">待发货</span>
								<?php endif;?>	
								<?php if($value['status'] ==3 ):?>
								<span class="color-yellow order-state">已发货</span>
								<a data-id="sure" title="" class="button-yellow operation" href="/shop/UserCenter/MyOrderList/update?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&status=4">
									确认收货
								</a>
								<?php endif;?>								
								<?php if($value['status'] ==4 ):?>
								<span class="color-yellow order-state">待评论</span>
								<a data-id="pay" title="" class="button-yellow operation" href="#">
									去评论
								</a>
								<?php endif;?>
								<?php if($value['status'] ==5 ):?>
								<span class="color-yellow order-state">已完成</span>
								<?php endif;?>
								</div>								
								<?php endif;?>
							</div>
							<?php if($value['status'] ==3||$value['status'] ==4||$value['status'] ==5 ):?>
								<a data-id="" title="" href="/shop/UserCenter/MyOrderList/update?act=viewInvoice&invoice=<?php echo val($value['info'], 'invoice', '');?>" style="bottom: -40px;left: -40px;width: 80px;">
								<div class="list-header">
									<span class="list-header-image"></span>
									<span class="list-header-title">查看物流</span>&nbsp;
									<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
								</div>
								</a>
								<?php endif;?>
						</div>
					<!--单个商品[END]-->
						<?php endforeach;?>
						<?php endif;?>
						
	
						<!--物流信息-->
<!--						<div class="g-description relative" style='display: none'>
							<div class="container-fluid">
								<div class="row">
									<div class="label-wrapper">
										<label>2015-07-15 16:07</label>
									</div>
									<div class="label-content-wrapper">
										<span class="">浙江省金华市义乌市市场部 已发货</span>
									</div>
								</div>
								<div class="row">
									<div class="label-wrapper">
										<label>2015-07-15 16:07</label>
									</div>
									<div class="label-content-wrapper">
										<span class="">浙江省金华市义乌市市场部 已发货</span>
										<span class="pull-right"><a data-id="express" title="" class="" href="#"><i class="fa fa-chevron-right color-yellow"></i></a></span>
									</div>
								</div>
							</div>
						</div>-->
					</div>
					<?php endif;?>
					<?php endforeach;?>
									
					<!--订单[END]-->
				</div>
				<?php }else{?>	
				
				<div id="tab3" class="cart-list-container tab-list-content">
					<!--订单列表为空-->
					<div class="cart-empty text-center">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="{__STATIC_URL__}/public/front/default/images/demo/icon/order-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您没有正在进行中的订单！</div>
							<div class="cart-empty-buy">
								<a title="" class="color-yellow" href="/shop/">
									马上去逛逛吧 &gt;
								</a>
							</div>
						</div>
					</div>
				</div>				
				<?php }?>	
				
				
				
				<!-- 已完成 -->
				<?php 
				$hasOrder = false;
				if(!empty($myOrders)){	
	
					 foreach ($myOrders as $key=>$value){
					 	if($value['status'] >=4 ){					 		
					 		if(!empty($value['items']))
					 			$hasOrder = true;
					 	}
					 }
				}
					 if($hasOrder){
				?>
				<div id="tab4" class="cart-list-container tab-list-content ">
					<!--订单[START]-->
					<?php foreach ($myOrders as $key=>$value):?>
					<?php if($value['status'] >= 4):?>
					<div class="g-item">
						<a data-id="delete" title="删除订单" class="close-icon" href="/shop/UserCenter/MyOrderList/update?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&status=-1">
							<i class="fa fa-times"></i>
						</a>
						<div class="g-title-container center color64 relative">
							<span class="g-item-title single-line">订单编号	<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?></span>
							<div class="order-time text-center">
								<?php echo !empty($value['create_time'])?date('Y-m-d h:i',$value['create_time']):'';?>
							</div>
						</div>
						<?php if (!empty($value['items'])):?>
						<?php $count = count($value['items']);?>
						<?php foreach ($value['items'] as $k=>$val):?>
						<!--单个商品[START]-->
						<div class="media relative">
							<div class="media-left ">
								<a href="/shop/shopGoods/ProductDetails?id=<?php echo !empty($val['goods_id'])?$val['goods_id']:0;?>">
									<img class="media-object" src="<?php echo !empty($val['pic_url'])?$val['pic_url']:'';?>" alt="">
								</a>
							</div>
							<div class="media-body relative">
								<h4 class="media-heading">
									<a href="/shop/shopGoods/ProductDetails?id=<?php echo !empty($val['goods_id'])?$val['goods_id']:0;?>">
										<?php echo !empty($val['title'])?$val['title']:'';?>
									</a>
								</h4>
								<div class="specification"><?php echo !empty($val['spec'])?$val['spec']:'';?></div>
								<div>
									<span class="color64">共<span class="color-yellow"><?php echo !empty($val['quantity'])?$val['quantity']:'';?></span>件商品</span>&nbsp;&nbsp;
									<a data-id="share" href="#" class=""><i class="fa fa-share-square-o color-yellow"></i></a>
								</div>
								<?php if(0):?>
								<a data-id="refund" title="申请退货" class="refund" href="/shop/userCenter/Refund?order_id=order_sn=<?php 
								echo !empty($value['order_sn'])?$value['order_sn']:'';?>&goods_id=<?php echo !empty($val['goods_id'])?$val['goods_id']:'';?>&status=<?php echo !empty($value['status'])?$value['status']:'';?>
								
								">
									申请退货
								</a>
								<?php endif;?>	
								
								<div class="price-container" style="bottom: 13px;">
									<span class="color-yellow bold price">总价：￥<?php echo !empty($val['price'])?$val['price']:'';?></span>
								</div>
								
								<?php 								
								if($k+1 == $count):?>
								<div style="position: absolute;width: 150px;right: 0;top: 70px;">
								<?php if($value['status'] ==0 ):?>
								<span class="color-yellow order-state">已取消</span>								
								<?php endif;?>
								<?php if($value['status'] ==1 ):?>
								<span class="color-yellow order-state">待付款</span>
								<a data-id="pay" title="" class="button-yellow operation" href="/pay/pay?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&app=<?=$this->getApp()['biz_app_id']?>">
									立即支付
								</a>
								<?php endif;?>
								<?php if($value['status'] ==2 ):?>
								<span class="color-yellow order-state">待发货</span>
								<?php endif;?>	
								<?php if($value['status'] ==3 ):?>
								<span class="color-yellow order-state">已发货</span>
								<a data-id="sure" title="" class="button-yellow operation" href="/shop/UserCenter/MyOrderList/update?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&status=4">
									确认收货
								</a>
								<?php endif;?>								
								<?php if($value['status'] ==4 ):?>
								<span class="color-yellow order-state">待评论</span>
								<a data-id="pay" title="" class="button-yellow operation" href="#">
									去评论
								</a>
								<?php endif;?>
								<?php if($value['status'] ==5 ):?>
								<span class="color-yellow order-state">已完成</span>
								<?php endif;?>	
								</div>							
								<?php endif;?>
							</div>
							<?php if($value['status'] ==3||$value['status'] ==4||$value['status'] ==5 ):?>
								<a data-id="" title="" href="/shop/UserCenter/MyOrderList/update?act=viewInvoice&invoice=<?php echo val($value['info'], 'invoice', '');?>" style="bottom: -40px;left: -40px;width: 80px;">
								<div class="list-header">
									<span class="list-header-image"></span>
									<span class="list-header-title">查看物流</span>&nbsp;
									<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
								</div>
								</a>
								<?php endif;?>
						</div>
					<!--单个商品[END]-->
						<?php endforeach;?>
						<?php endif;?>
						
	
						<!--物流信息-->
<!--						<div class="g-description relative" style='display: none'>
							<div class="container-fluid">
								<div class="row">
									<div class="label-wrapper">
										<label>2015-07-15 16:07</label>
									</div>
									<div class="label-content-wrapper">
										<span class="">浙江省金华市义乌市市场部 已发货</span>
									</div>
								</div>
								<div class="row">
									<div class="label-wrapper">
										<label>2015-07-15 16:07</label>
									</div>
									<div class="label-content-wrapper">
										<span class="">浙江省金华市义乌市市场部 已发货</span>
										<span class="pull-right"><a data-id="express" title="" class="" href="#"><i class="fa fa-chevron-right color-yellow"></i></a></span>
									</div>
								</div>
							</div>
						</div>-->
					</div>
					<?php endif;?>
					<?php endforeach;?>
									
					<!--订单[END]-->
				</div>
				<?php }else{?>	
				
				<div id="tab4" class="cart-list-container tab-list-content">
					<!--订单列表为空-->
					<div class="cart-empty text-center">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="{__STATIC_URL__}/public/front/default/images/demo/icon/order-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您还没有完成的订单！</div>
							<div class="cart-empty-buy">
								<a title="" class="color-yellow" href="/shop/">
									马上去逛逛吧 &gt;
								</a>
							</div>
						</div>
					</div>
				</div>				
				<?php }?>	
				

			</div>
			<!--公用底部开始-->
			<?php include $this->tpl('shop:public/footer.php') ?>
		</div>		
	</body>
		<script src="{__STATIC_URL__}/public/front/default/js/order.js?v=201511242"></script>
</html>