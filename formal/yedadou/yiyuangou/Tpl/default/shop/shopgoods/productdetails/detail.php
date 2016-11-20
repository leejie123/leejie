<?php include $this->tpl('shop:public/html_header.php') ?>
<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/detail.css?t=201511201" />
		<title>商品详情</title>
</head>
		<div class="wrapper">
			<!--公用头部开始 -->
		<?php include $this->tpl('shop:public/header.php') ?>
			<!-- 滑动图片列表 -->
			<div class="image-list">
				<div id="image-list" class="carousel slide" data-ride="carousel">
					<?php //暂时隐藏幻灯片提示点 ?>
					<?php if(100==101):?>
					<ol class="carousel-indicators">
                        <?php if($productConfig['goodsConfig']) : ?>
						<?php
							$slideIndex=0;
						 ?>
                        <?php foreach($productConfig['goodsConfig']['img_list'] as $k=>$v):?>
                        <?php if($v): ?>
                        <?php
                        
						$slideCls='';
						if($slideIndex==0) $slideCls='class="active"';
						$slideIndex++;
                        ?>
						<li data-target="#image-list" data-slide-to="<?=$slideIndex-1?>" <?=$slideCls?>></li>
                        <?php endif; ?>
                        <?php endforeach;?>
                        <?php endif;?>
					</ol>
					<?php endif?>
					<div class="carousel-inner" role="listbox">
						<?php
							$slideIndex=0;
						 ?>
                        <?php if($productConfig['goodsConfig']) : ?>
                        <?php foreach($productConfig['goodsConfig']['img_list'] as $v):?>
                        <?php if($v):?>
                        <?php
                        
						$slideCls='';
						if($slideIndex==0) $slideCls='active';
						$slideIndex++;
                        ?>
						<div class="item <?=$slideCls?>">
							<a href="#">
								<img src="<?php echo $v;?>" alt="" class="img-responsive">
								<div class="carousel-caption">

								</div>
							</a>
						</div>
                        <?php endif; ?>
                        <?php endforeach;?>
                        <?php endif;?>
					</div>
				</div>
			</div>

			<!--商品信息-->
			<div class="product-info">
				<!--商品ID-->
				<input type="hidden" name="productId" id="productId" value="<?php echo $productConfig['ShopGoods'] ? $productConfig['ShopGoods']['id'] :0; ?>"  />
				<div class="product-title bold">
					<?php echo $productConfig['ShopGoods'] ? $productConfig['ShopGoods']['title'] :""?>
				</div>
				<div class="sub-title-container">
                    <span title="切换收藏状态" class="favorite pull-right" data-auto="ajax" data-href="/shop/UserCenter/favorites/add?id=<?php echo $productConfig['ShopGoods'] ? $productConfig['ShopGoods']['id'] :0; ?>" data-tip="操作进行中" data-show-tip="false" data-submit-id="" data-success-function="toggleFavorit" data-show-response="false">
                        <?php if(!empty($productConfig['goodsConfig']['is_collection'])):?>
					<i class="fa fa-star"></i> <span>已收藏</span>
                        <?php else:?>
                        <i class="fa fa-star-o"></i> <span>收藏</span>
                        <?php endif;?>
					</span>
					<span class="sub-title red1">
						<?php echo $productConfig['ShopGoods'] ? $productConfig['ShopGoods']['sub_title'] :""?>
					</span>
				</div>
				<div class="row-container"><span class="row-label bold">原价</span><span class="row-content original-price">¥<span id="originalPrice"><?php echo $productConfig['ShopGoods'] ? $productConfig['ShopGoods']['market_price'] :0?></span></span>
				</div>
				<div class="row-container"><span class="row-label bold">商城价</span><span class="row-content red1 bold">¥<span id="price"><?php echo $productConfig['storeGoods'] ? $productConfig['storeGoods']['wx_price'] :0?></span></span>
				</div>
				<div class="row-container"><span class="row-label bold">库存</span><span class="row-content"><span id="stock" class="red1 bold"><?php echo $productConfig['goodsConfig'] ? $productConfig['goodsConfig']['total'] :0?></span> 件</span>
				</div>
				<?php $isHaveProperty=false;  //通过这个变量来确定，如果没有属性，就在页面上显示数量和总价 
			if($productConfig['goodsConfig']){
				if($productConfig['goodsConfig']['param']){
					$isHaveProperty=true;
				}
			}
		?>	
				<?php if(!$isHaveProperty) :?>
		<!-- 如没有属性，就在页面上显示数量和总价   start -->
		<div class="row-container num-container">
					<span class="row-label bold">数量</span>
					<span class="row-content">
						<div class="" style="display: inline-block; ">
							<div class="input-group num-input">
							      <span class="input-group-btn">
							        <button id="minus" class="btn btn-default" type="button"><i class="fa fa-minus"></i></button>
							      </span>
					<input id="count" name="count" type="text" class="form-control text-center" placeholder="" value="1" max="<?php $_shop_goods = val($productConfig,'ShopGoods');echo val($_shop_goods,'limit_num',0)?>"/>
					<span class="input-group-btn">
							       <button id="plus" class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
							      </span>
				</div>
			</div>
			</span>
		</div>
		<div class="row-container mt10">
			<span class="row-label bold red1">总价</span>
			<span class="row-content bold red1">¥<span id="totalMoney"><?php echo $productConfig['storeGoods'] ? $productConfig['storeGoods']['wx_price'] :0?></span></span>
		</div>
		<!-- 如没有属性，就在页面上显示数量和总价   end -->
		<?php endif;?>
			
		<!-- 弹出sku   start -->
		<div class="modal" id="windowSku" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document" style="position: absolute;
    bottom: 0px;
    width: 100%;
    margin: 0;">
		    <div class="modal-content">
		      <div class="modal-header"style="    background-color: #f0ad4e;
    border-color: #eea236;
    width: 80%;
    height: 40px;
    color: #fff;
    margin: 0 auto;
    position: absolute;
    top: -40px;
    left: 10%;
    border-radius: 15px 15px 0 0;">
    
		        <h5 class="modal-title" style="text-align: center;" id="myModalLabel">请选择商品属性</h5>
		      </div>
		      <div class="modal-body">
		  		<!--没有多属性时不生成sku这个div  start-->
				<div id="sku" class="sku">
					<input type="hidden" name="priceData" id="priceData" value='<?php echo $productConfig['goodsConfig'] ? $productConfig['goodsConfig']['sku'] :0?>'/>
                    <?php if($productConfig['goodsConfig']) : ?>
                    <?php 																												
						$data= isset($productConfig['goodsConfig']['sku_name'])?$productConfig['goodsConfig']['sku_name']:'';
						$sku_name =json_decode($data,true);	
						$index=0;	
							
					?>
                    <?php foreach($productConfig['goodsConfig']['param'] as $k => $v): ?>
                    <?php if(!empty($v)):?>
                    	<div class="row-container clearfix">
                    	<?php if(!empty($sku_name[$index])){?>
                    	<span class="row-label bold" style="float: left;"><?php echo $sku_name[$index].':'?></span>
                    	<?php }?>                   	
						<span class="row-content" style="float: left;">
                          <?php foreach($v as $param):?>
                            <?php if (!empty($param)):?>
							<a href="#" class="property" data-value="<?php echo $param;?>"><?php echo $param;?></a>
							<?php endif;?>
                    	  <?php endforeach;?>
						</span>
					
					  </div>
					    <?php $index++;?>
					   <?php endif;?>
                    <?php endforeach;?>
                    <?php endif;?>
				</div>
				<!--没有多属性时不生成sku这个div  end-->
				<?php if($isHaveProperty) :?>
				<div class="row-container num-container">
						<span class="row-label bold">数量</span>
						<span class="row-content">
							<div class="" style="display: inline-block; ">
								<div class="input-group num-input">
								      <span class="input-group-btn">
								        <button id="minus" class="btn btn-default" type="button"><i class="fa fa-minus"></i></button>
								      </span>
						<input id="count" name="count" type="text" class="form-control text-center" placeholder="" value="1" max="<?php $_shop_goods = val($productConfig,'ShopGoods');echo val($_shop_goods,'limit_num',0)?>"/>
						<span class="input-group-btn">
								       <button id="plus" class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
								      </span>
					</div>
				</div>
				</span>
			</div>
			<div class="row-container mt10">
			<span class="row-label bold red1">总价</span>
			<span class="row-content bold red1">¥<span id="totalMoney"><?php echo $productConfig['storeGoods'] ? $productConfig['storeGoods']['wx_price'] :0?></span></span>
		</div>
		<?php endif;?>
		      </div>
		      <div class="modal-footer" style="padding: 0">
		      	<button type="button" id="windowSkuBtnOk" class="btn btn-warning btn-block btn-lg" style="background-color: #EC1F1F;
    border-color: #CC1127;">确定</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- 弹出sku   end -->
		<a href="#" class="button-share" data-auto-target="#shareTip">立即分享 &nbsp;<i class="fa fa-share"></i></a>
		</div>
		<?php if($isHaveProperty) :?>
		<div class="product-selecttype" id="btnPopSku">选择尺寸颜色分类<span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span></div>
		<?php endif;?>
		
		
		
		<!--分享提示框-->
		<div id="shareTip" class="mask-bg hide" data-auto-hide>
			<div class="middle-outer">
				<div class="middle-inner text-center" id="shareimg">
					<div id="shareimg">
						<div><img src="{__STATIC_URL__}/public/front/default/images/sharebak.png" class="bak"></div>
						<div><img src="<?php echo $url;?>" class="qcode" alt="<?php //echo $url;?>"></div>
					</div>
				</div>
			</div>
		</div>
		<!--分期付款-->
		<div class="period-container single">
			<span class="tags"><i class="fa fa-tags"></i> </span>
			<span class="period-title">分期付款</span>
			<span class="period-content">分期好享受，时尚轻松购！</span>
			<a href="#">
				<span class="period-apply pull-right">点击申请
					<span class="">
					 <img src="{__STATIC_URL__}/public/front/default/images/demo/icon/circle-right.png" alt="" />
					</span>
				</span>
			</a>
		</div>

		<!--图文详情和产品参数-->
		<div class="tabs-container">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active ml10"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">图文详情</a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">产品参数</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active text-center" id="home" style="padding-top: 8px;">
                        <?php echo $productConfig['goodsConfig'] ? html_entity_decode($productConfig['goodsConfig']['desc']) :''?>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="profile"><?php echo $productConfig['goodsConfig'] ? html_entity_decode($productConfig['goodsConfig']['property']) :''?></div>
			</div>
		</div>

		<!--公用底部开始-->
		<footer class="footer-menu clearfix" id="footer">
			<div class="footer-logo pull-left">
				<div class="middle-outer">
					<div class="middle-inner text-center">
						<a href="/shop/"><img src="<?php echo $storeLogo;?>" alt=""  height="23"/></a>
					</div>
				</div>
			</div>
			<div class="footer-container">
				<div class="footer-item add-to-card">
					<!--href是#不变,data-href是点击时添加到购物车的地址-->
					<a href="#" data-href="/shop/cart/index/add" id="addProductToCart" data-isEmptyparam="<?=$isEmptyparam?>">
						<div class="middle-outer">
							<div class="middle-inner text-center white">
								加入购物车
							</div>
						</div>
					</a>
				</div>
				<div class="footer-item buy">
					<!--href是#不变,data-href是点击时的购买地址-->
					<a href="#" data-href="/shop/cart/index/add" id="buy" data-isEmptyparam="<?=$isEmptyparam?>">
						<div class="middle-outer">
							<div class="middle-inner text-center white">
								立即购买
							</div>
						</div>
					</a>
				</div>
				<div class="footer-item">
					<a href="/shop/cart/">
						<div class="middle-outer">
							<div class="middle-inner text-center" id="movieBuyEnd">
								<img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/cart.png" height="15">
								<div class="footer-text">
									购物车
								</div>
								<span id="cartProductCount" class="label label-danger cart-product-count"><?=$shop_cart_num?></span>
								<span id="cartAnimationCount" class="cart-add-count">+<span>1</span></span>
							</div>
						</div>
					</a>
				</div>		
			</div>
		</footer>
		<?php include $this->tpl('shop:public/footer_share.php') ?>
		</div>
	</body>
		<script src="{__STATIC_URL__}/public/js/jquery.fly.min.js"></script>
		<script src="{__STATIC_URL__}/public/front/default/js/detail.js?v=20151115"></script>
</html>