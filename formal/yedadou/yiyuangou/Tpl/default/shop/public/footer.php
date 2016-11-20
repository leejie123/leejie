<!--公用底部开始-->
			<footer class="footer-menu clearfix" id="footer">
				<div class="footer-logo pull-left">
					<div class="middle-outer">
						<div class="middle-inner text-center">
							<a href="/shop/index"><img src="<?=$storeLogo?>" width="110" alt="" /></a>
						</div>
					</div>
				</div>
				<div class="footer-container">
					<div class="footer-item">
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
					<div class="footer-item">
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
				</div>
			</footer>
			<?php include $this->tpl('shop:public/footer_share.php') ?>