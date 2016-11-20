			<header>
				<div class="goback" onclick="history.back(-1);"><i class="fa fa-chevron-left"></i> 返回
				</div>
				<span class="header-title"><?=isset($headerTitle) ? $headerTitle : $this->getConfig('AppGlobalSetting.shopName')?></span> 
				<div class="toggle-top-menu" id="toggle-top-menu" mark="top-menu"><i mark="top-menu" class="fa fa-ellipsis-h"></i>
				</div>
				<!--顶部菜单 -->
				<ul class="nav-top-menu none" id="top-menu">
					<li>
						<a href="/shop/">
							<span class="list-title">返回首页</span>
						</a>
					</li>
					<li>
						<a href="/shop/UserCenter/index">
							<span class="list-title">会员中心</span>
						</a>
					</li>
					<li>
						<a href="/shop/UserCenter/MyOrderList">
							<span class="list-title">我的订单</span>
						</a>
					</li>
					<li>
						<a href="/shop/cart/">
							<span class="list-title">购&nbsp;物&nbsp;车</span>
						</a>
					</li>
					<li>
						<a href="/shop/UserCenter/address">
							<span class="list-title">收货地址</span>
						</a>
					</li>
					<li>
						<a href="#" onclick="location.reload();">
							<span class="list-title">刷新页面</span>
						</a>
					</li>
				</ul>
			</header>
			<!--公用头部开始12313 -->
			<?php if(empty($footerConfig[4])||intval($footerConfig[4])!=1){?>
<div class="noTip"><div class="pull-left tip"><?php echo $footerConfig[5]; ?></div><a type="button" href="/shop/concerned"  class="btn btn-attentionMe btn-sm pull-right">点击关注</a></div>
<!--http://mp.weixin.qq.com/s?__biz=MzA5Nzg1NTM5NQ==&mid=215759124&idx=1&sn=45069e2a0ce8e0c7e938786583a9736e#rd-->
			<?php }?>
