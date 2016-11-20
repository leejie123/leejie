<!--公用底部开始-->
			<footer class="footer-menu clearfix" id="footer">
				<?php if(1==2){?>
				<div class="footer-logo pull-left">
					<div class="middle-outer">
						<div class="middle-inner text-center">
							<a href="/shop/index"><img src="<?=$storeLogo?>" height="23" alt="" /></a>
						</div>
					</div>
				</div>
				<?php }?>
				<div class="footer-container" style="margin-left: 0;">
					<div class="footer-item4">
						<a href="/shop/index">
							<div class="middle-outer">
								<div class="middle-inner text-center">
									<img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico6.png" height="15">
									<div class="footer-text">
										首页
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="footer-item4">
						<a href="/shop/ShopGoods/ProductList">
							<div class="middle-outer">
								<div class="middle-inner text-center">
									<img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/ico5.png" height="15">
									<div class="footer-text">
										商品分类
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="footer-item4">
						<a href="/shop/UserCenter/index">
							<div class="middle-outer">
								<div class="middle-inner text-center">
									<img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/user.png" height="15">
									<div class="footer-text">
										个人中心
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="footer-item" style="width: 25%">
						<a href="/shop/cart/">
							<div class="middle-outer">
								<div class="middle-inner text-center">
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
					<?php if(1==2){?>
					<div class="footer-item">
						<a href="#" data-auto-target="#footerShareTip">
							<div class="middle-outer">
								<div class="middle-inner text-center">
									<img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/share.png" height="15">
									<div class="footer-text">
										分享
									</div>
								</div>
							</div>
						</a>
					</div>
					<?php }?>
				</div>
			</footer>
			<?php include $this->tpl('shop:public/footer_share.php') ?>