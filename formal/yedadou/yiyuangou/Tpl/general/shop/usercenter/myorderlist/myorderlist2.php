<?php include($this->tpl('shop/public:html_header.php')) ?>
		<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/order.css" />

		<title>我的订单</title>
	</head>

	<body class="">
		<div class="wrapper">
			<!--公用头部开始 -->
		
			<?php include $this->tpl('shop:public/header.php') ?>
			<!--购物车容器-->
			<div class="cart-container">
				<!--导航-->
				<div class="tab-list">
					<ul>
						<li class="active" data-toggle="#tab1">
							<a href="javascript:void(0);">
								<span class="">待付款</span><span class="red1 bold"><?php echo $pendingOrdersCount?></span>
							</a>
						</li>
						<li data-toggle="#tab2">
							<a href="javascript:void(0);">
								<span class="">进行中</span><span class="color-yellow bold"><?php echo $goingOrdersCount?></span>
							</a>
						</li>
						<li data-toggle="#tab3">
							<a href="javascript:void(0);">
								<span class="">已完成</span><span class="red1 green"><?php echo $complitedOrdersCount?></span>
							</a>
						</li>
						<li data-toggle="#tab4">
							<a href="javascript:void(0);">
								<span class="">退款退货</span><span class="red1 green"><?php echo $refundOrdersCount?></span>
							</a>
						</li>
					</ul>
				</div>
				
				<!--待付款-->
				<?php if(!empty($pendingOrders)){?>
				<div id="tab1" class="cart-list-container tab-list-content active">
					<!--订单[START]-->
					<?php foreach ($pendingOrders as $key=>$value){?>
					<div class="g-item">
						<a data-id="delete" title="删除订单" class="close-icon" href="/shop/userCenter/myOrderList/update?order_sn=<?php echo $value['order_sn']?>&status=-1">
							<i class="fa fa-times"></i>
						</a>
						<div class="g-title-container center color64 relative">
							<span class="g-item-title single-line">订单编号  <?php echo $value['order_sn']?></span>
							<div class="order-time text-center">
								<?php echo $value['create_time']?>
							</div>
						</div> 
						
						<!--单个商品[START]-->
						
						<?php if(!empty($value['items'])){?>
						<?php $count = count($value['items']);?>
						<?php foreach ($value['items'] as $k=>$val){?>
						<?php if($count == $k+1){?>
						<div class="media relative">
							<div class="media-left ">
								<a href="#">
									<img class="media-object" src="<?php echo $val['pic_url']?>" alt="">
								</a>
							</div>
							<div class="media-body relative">
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
								<a data-id="refund" title="申请退货" class="refund" href="/shop/userCenter/refund?order_sn=<?php echo $value['order_sn']?>">
									申请退货
								</a>
								<div class="price-container">
									<span class="color-yellow bold price">总价：￥<?php echo !empty($val['price'])?$val['price']:'';?></span>
								</div>
								<span class="color-yellow order-state">待付款</span>
								<a data-id="pay" title="" class="button-yellow operation" href="/pay/pay?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>">
									立即支付
								</a>
							</div>
						</div>
						<?php }else{?>
						<div class="media relative">
							<div class="media-left ">
								<a href="#">
									<img class="media-object" src="<?php echo $val['pic_url']?>" alt="">
								</a>
							</div>
							<div class="media-body relative">
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
							</div>
						</div>						
						<?php }?>
						<?php }?>
						<?php }?>
						<!--物流信息-->
						<div class="g-description relative" style="display:none">
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
						</div>						
					</div>
					<?php }?>	
					
					<?php if($pendingOrdersCount != count($pendingOrders)){?>
					<div>
					<input type="button" value="加载更多" name='more' class='getOrder' />
					<input type="hidden" name="page_no" value="<?php echo $pending_page_no?> " />
					<input type="hidden" name="tab"     value="1" />
					</div>
					<?php }else{?>
					<p>全部加载完成...</p>
					<?php }?>
					
					</div>			
					<?php }else{?>
					<div id="tab1" class="cart-list-container tab-list-content">				 
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
				
					


				
				<!--进行中-->
				<?php if(!empty($goingOrders)){?>
				<div id="tab2" class="cart-list-container tab-list-content">
					<!--订单[START]-->
					<?php foreach ($goingOrders as $key=>$value){?>
					<div class="g-item">						
						<div class="g-title-container center color64 relative">
							<span class="g-item-title single-line">订单编号  <?php echo $value['order_sn']?></span>
							<div class="order-time text-center">
								<?php echo $value['create_time']?>
							</div>
						</div> 
						
						<!--单个商品[START]-->
						
						<?php if(!empty($value['items'])){?>
						<?php $count = count($value['items']);?>
						<?php foreach ($value['items'] as $k=>$val){?>
						<?php if($count == $k+1){?>
						<div class="media relative">
							<div class="media-left ">
								<a href="#">
									<img class="media-object" src="<?php echo $val['pic_url']?>" alt="">
								</a>
							</div>
							<div class="media-body relative">
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
								<?php if($value['status'] ==2 ){?>
								<span class="color-yellow order-state">待发货</span>
								<?php }?>	
								<?php if($value['status'] ==3 ){?>
								<span class="color-yellow order-state">已发货</span>
								<a data-id="sure" title="" class="button-yellow operation" href="/shop/UserCenter/MyOrderList/update?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&status=4">
									确认收货
								</a>
								<?php }?>	
							</div>
						</div>
						<?php }else{?>
						<div class="media relative">
							<div class="media-left ">
								<a href="#">
									<img class="media-object" src="<?php echo $val['pic_url']?>" alt="">
								</a>
							</div>
							<div class="media-body relative">
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
							</div>
						</div>						
						<?php }?>
						<?php }?>
						<?php }?>
						<!--物流信息-->
						<div class="g-description relative" style="display:none">
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
						</div>						
					</div>
					<?php }?>	
					
					<?php if($goingOrdersCount != count($goingOrders)){?>
					<div>
					<input type="button" value="加载更多" name='more' class='getOrder' />
					<input type="hidden" name="page_no" value="<?php echo $going_page_no?> " />
					<input type="hidden" name="tab"     value="2" />
					</div>
					<?php }else{?>
					<p>全部加载完成...</p>
					<?php }?>
					
					</div>			
					<?php }else{?>
					<div id="tab1" class="cart-list-container tab-list-content">				 
					<div class="cart-empty text-center">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="{__STATIC_URL__}/public/front/default/images/demo/icon/order-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您没有进行中的订单！</div>
							<div class="cart-empty-buy">
								<a title="" class="color-yellow" href="/shop/">
									马上去逛逛吧 &gt;
								</a>
							</div>
						</div>
					</div>
				</div>					
				<?php }?>
				
				
				
				
				<!--已完成-->
				<?php if(!empty($complitedOrders)){?>
				<div id="tab3" class="cart-list-container tab-list-content">
					<!--订单[START]-->
					<?php foreach ($complitedOrders as $key=>$value){?>
					<div class="g-item">	
					<a data-id="delete" title="删除订单" class="close-icon" href="/shop/userCenter/myOrderList/update?order_id=<?php echo $value['id']?>&status=-1">
							<i class="fa fa-times"></i>
						</a>					
						<div class="g-title-container center color64 relative">
							<span class="g-item-title single-line">订单编号  <?php echo $value['order_sn']?></span>
							<div class="order-time text-center">
								<?php echo $value['create_time']?>
							</div>
						</div> 
						 
						<!--单个商品[START]-->
						
						<?php if(!empty($value['items'])){?>
						<?php $count = count($value['items']);?>
						<?php foreach ($value['items'] as $k=>$val){?>
						<?php if($count == $k+1){?>
						<div class="media relative">
							<div class="media-left ">
								<a href="#">
									<img class="media-object" src="<?php echo $val['pic_url']?>" alt="">
								</a>
							</div>
							<div class="media-body relative">
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
								<?php if($value['status'] ==4 ){?>
								<span class="color-yellow order-state">已完成</span>
								<a data-id="" title="" class="button-yellow operation" href="/shop/UserCenter/MyOrderList/update?order_sn=<?php echo !empty($value['order_sn'])?$value['order_sn']:'';?>&status=4">
									去评论
								</a>
								<?php }?>	
								<?php if($value['status'] ==5 ){?>
								<span class="color-yellow order-state">已完成</span>								
								<?php }?>	
							</div>
						</div>
						<?php }else{?>
						<div class="media relative">
							<div class="media-left ">
								<a href="#">
									<img class="media-object" src="<?php echo $val['pic_url']?>" alt="">
								</a>
							</div>
							<div class="media-body relative">
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
							</div>
						</div>						
						<?php }?>
						<?php }?>
						<?php }?>
						<!--物流信息-->
						<div class="g-description relative" style="display:none">
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
						</div>						
					</div>
					<?php }?>	
					
					<?php
					echo $complitedOrdersCount;
					echo count($complitedOrders);
					if($complitedOrdersCount != count($complitedOrders)){?>
					<div>
					<input type="button" value="加载更多" name='more' class='getOrder' />
					<input type="hidden" name="page_no" value="<?php echo $complited_page_no?> " />
					<input type="hidden" name="tab"     value="3" />
					</div>
					<?php }else{?>
					<p>全部加载完成...</p>
					<?php }?>
					
					</div>			
					<?php }else{?>
					<div id="tab1" class="cart-list-container tab-list-content">				 
					<div class="cart-empty text-center">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="{__STATIC_URL__}/public/front/default/images/demo/icon/order-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您没有完成的订单！</div>
							<div class="cart-empty-buy">
								<a title="" class="color-yellow" href="/shop/">
									马上去逛逛吧 &gt;
								</a>
							</div>
						</div>
					</div>
				</div>					
				<?php }?>
					
			
			<!--公用底部开始-->
			<?php include $this->tpl('shop:public/footer.php') ?>
		</div>
	</body>
		<script src="{__STATIC_URL__}/public/front/default/js/order.js"></script>
</html>