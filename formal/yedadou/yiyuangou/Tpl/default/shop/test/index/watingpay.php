<!doctype html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<link rel="stylesheet" href="http://static.yedadou.com/public/??css/bootstrap.min.css,css/font-awesome.min.css,front/default/css/public/public.css" />
		<script>
			//设置全居变量：未购买能否分享，是否关注，是否是分享客
			window.canShare=2;
			window.isSharer=0;
			window.isSubscribe=1;
		</script>
		<script src="http://static.yedadou.com/public/??js/jquery.min.js,js/bootstrap.min.js,js/jquery.cookie.js,js/hammer.min.js,front/default/js/public/public.js"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script src="http://$APPID$.weiapi.yedadou.com/getJsApiConfig?type=config&api_list=onMenuShareAppMessage,onMenuShareTimeline,onMenuShareQQ,onMenuShareWeibo,hideMenuItems"></script>
		<script>
		wx.ready(function(){

			wx.onMenuShareAppMessage(
		    	{"title":document.title,"desc":"http://1047.m.yedadou.com/shop/UserCenter/MyOrderList","link":"http://1047.m.yedadou.com/shop/UserCenter/MyOrderList?uid=50&app_id=2&store_id=59","imgUrl":"http://testimg.yedadou.com/shop/1054/f23e8a63b03c44dc7d50343d6867052d.jpg"}
			);

			wx.onMenuShareTimeline(
		    	{"title":document.title,"link":"http://1047.m.yedadou.com/shop/UserCenter/MyOrderList?uid=50&app_id=2&store_id=59","imgUrl":"http://testimg.yedadou.com/shop/1054/f23e8a63b03c44dc7d50343d6867052d.jpg"}
			);

			wx.onMenuShareQQ(
		    	{"title":document.title,"link":"http://1047.m.yedadou.com/shop/UserCenter/MyOrderList?uid=50&app_id=2&store_id=59","imgUrl":"http://testimg.yedadou.com/shop/1054/f23e8a63b03c44dc7d50343d6867052d.jpg"}
			);

			wx.onMenuShareWeibo(
		    	{"title":document.title,"link":"http://1047.m.yedadou.com/shop/UserCenter/MyOrderList?uid=50&app_id=2&store_id=59","imgUrl":"http://testimg.yedadou.com/shop/1054/f23e8a63b03c44dc7d50343d6867052d.jpg"}
			);
			wx.hideMenuItems({
			    menuList: ["menuItem:originPage","menuItem:openWithQQBrowser","menuItem:openWithSafari","menuItem:share:email","menuItem:readMode"]
			    // success: function (res) {
			    //     alert("已隐藏");
			    //   },
			    //   fail: function (res) {
			    //     alert(JSON.stringify(res));
			    //   }
			});

		});
</script>
		<link rel="stylesheet" href="http://static.yedadou.com/public/front/default/css/order.css" 
		/>
		<link rel="stylesheet" href="http://static.yedadou.com/public/??assets/css/font-awesome.css,newtpl/default/cart/confirm.css,newtpl/default/pub.css,newlib/boboweb/ui/theme1.css"/>


		<style type="text/css">
			.add_quan {
				height: 34px;
			}
			.item-content {
				margin-left: 120px;
			}

			.item-media {
				width: 100px!important;
			}

			.media-img {
				margin-left: 0px!important;
			}
		
			.color-grey {
				color: #646464;
			}
			span > em {
				font-style: normal;
			}

			.mg-b-10 {
				margin-bottom: 10px;
			}

			.tab-list li {
				width: 33.33%
			}
			/*.color-grey {
				color: #eeeeee;
			}*/

			body {
			    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
			    font-size: 12px;
				line-height: 1.6;
		    }
		    .foot1 {
		    	border-bottom: 1px solid #ddd;
		    	margin-bottom:10px;
		    	padding-bottom: 10px;
		    }
		    .mg-r-10 {
		    	margin-right:10px;
		    }

		    .text-limit {
	    	    max-height: 3em;
			    overflow: hidden;
			    text-overflow: ellipsis;
			    white-space: nowrap;
		    }

		    .button-yellow-sm{
				display: inline-block;
				/*display: block;*/
				/*height: 34px;*/
				padding: 5px 10px;
				border-radius: 5px;
				border:none;
				/*border: 1px solid #1fb5ad;*/
				outline: none;
				font-size: 12px;
				min-width: 70px;
				cursor: hand;
				cursor: pointer;
				background-color: #ffa716;
				color: #fff;
				color: #fff !important;
			}
			.card-header {
				margin-bottom:10px;
				border-bottom: 1px dotted #ddd;
			}

			.card-header .order{
				border-radius: 10px;
				background-color: #ffa716;
				padding: 2px 0;
			}

			.share {
			    font-size: 15px;
    			margin-left: 10px;
			}
			*[disabled] {
				opacity: 0.7;
			}
		</style>


		<title>我的订单</title>
	</head>

	<body class="">
		<div class="wrapper">
			<!--公用头部开始 -->
			<!--公用头部开始 -->
			<!--购物车容器-->
			<input  type="hidden" id='isEnableReturn' value='' />
			<input  type="hidden" id='period' value='0' />
			
			<div class="cart-container">
				<!--导航-->
				<div class="tab-list">
					<ul>
						<!-- <li class="active" data-toggle="#tab1">
							<a href="javascript:void(0);">
								<span class="">全部</span><span class="red1 bold">
								
								0								
								</span>
							</a>
						</li> -->
						<li data-toggle="#tab2" class="active">
							<a href="javascript:void(0);">
								<span class="">未付款</span><span class="color-yellow bold">
								
								0								
								</span>
							</a>
						</li>
						<li data-toggle="#tab3">
							<a href="javascript:void(0);">
								<span class="">进行中</span><span class="red1 bold">
								0								
								</span>
							</a>
						</li>
						<li data-toggle="#tab4">
							<a href="javascript:void(0);">
								<span class="">已完成</span><span class="red1 green">
								0								
								</span>
							</a>
						</li>
					</ul>
				</div>
				
				<!-- <div id="tab1" class="cart-list-container tab-list-content active">
					<div class="cart-empty text-center">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="http://static.yedadou.com/public/front/default/images/demo/icon/order-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您的订单为空！</div>
							<div class="cart-empty-buy">
								<a title="" class="color-yellow" href="/shop/">
									马上去逛逛吧 &gt;
								</a>
							</div>
						</div>
					</div>
				</div>	 -->			
				
				<!-- 待付款 -->
				<div id="tab2" class="cart-list-container active tab-list-content">
					<!--订单列表为空-->
					<div class="cart-empty text-center" style="display: none;">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="http://static.yedadou.com/public/front/default/images/demo/icon/order-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您没有等待付款的订单！</div>
							<div class="cart-empty-buy">
								<a title="" class="color-yellow" href="/shop/">
									马上去逛逛吧 &gt;
								</a>
							</div>
						</div>
					</div>
					<!-- 订单列表不为空 -->
					<div class="card" data-cardprice="500" data-fare="100">
						<div class="card-header"> 
							<div class="text-center order">
								<span>订单号</span>
								<span>123546459</span>
							</div>
							<div class="small text-center">2015-12-12 11:11:11</div>
						</div>
						<div class="card-inner">
							<!-- php循环一个商品 -->
							<div class="item-list" data-id="3048" data-itemprice="1000">
								<div class="item-media">
									<a href="http://1047.m.yedadou.com/shop/shopGoods/ProductDetails?id=3048">
										<div style="background-image:url('http://testimg.yedadou.com/store/1906/f0bf1363512829d4dce885cae0f9da4c.jpg');" class="bg-100 media-img"></div>
									</a>
								</div>
								<div class="item-content">
									<div class="font-16 mg-b-5 color-grey bold text-limit">
										好东西啊啊啊啊
									</div>
									<div class="mg-b-5" style="margin-right: 30px;position:relative;wdith: 100%">
										<!-- <a href="" style="position:absolute;top:0px;right:-30px;" data-delid="8723" data-click="del"><i class="fa fa-trash" style="font-size: 25px;color:#999"></i></a> -->
										<div class="mg-b-10">
											<div style="min-height:30px;">黄金 黄金 1.4寸</div>
											<!-- 如果没有属性，用下面这个： -->
											<!-- <div style="min-height:30px;">该商品暂时没有属性</div> -->
								          	<span class="display-b red1">价格：
								          		<em class="quantity style-normal bold">5988</em>
								          	</span>
										</div>
							          	<span class="display-b red1">
							          		数量X<em class="">100</em>
							          		<a href="" class="color-grey share">
							          			<i class="fa fa-share-square-o"></i>
							          		</a>
							          	</span>
									</div>	
								</div>
							</div>
							<div class="item-list" data-id="3048" data-itemprice="1000">
								<div class="item-media">
									<a href="http://1047.m.yedadou.com/shop/shopGoods/ProductDetails?id=3048">
										<div style="background-image:url('http://testimg.yedadou.com/store/1906/f0bf1363512829d4dce885cae0f9da4c.jpg');" class="bg-100 media-img"></div>
									</a>
								</div>
								<div class="item-content">
									<div class="font-16 mg-b-5 color-grey bold text-limit">
										好东西啊啊啊啊
									</div>
									<div class="mg-b-5" style="margin-right: 30px;position:relative;wdith: 100%">
										<!-- <a href="" style="position:absolute;top:0px;right:-30px;" data-delid="8723" data-click="del"><i class="fa fa-trash" style="font-size: 25px;color:#999"></i></a> -->
										<div class="mg-b-10">
											<div style="min-height:30px;">黄金 黄金 1.4寸</div>
											<!-- 如果没有属性，用下面这个： -->
											<!-- <div style="min-height:30px;">该商品暂时没有属性</div> -->
								          	<span class="display-b red1">价格：
								          		<em class="quantity style-normal bold">5988</em>
								          		<a class="" class="color-grey share">
													<i class="fa fa-share-square-o"></i>
												</a>
								          	</span>
										</div>
							          	<span class="display-b red1">
							          		数量X<em class="">100</em>
							          		<a href="" class="share color-grey">
							          			<i class="fa fa-share-square-o"></i>
							          		</a>
							          	</span>
									</div>	
								</div>
							</div>
							<!-- php循环一个商品 -->
						</div>
						<div class="card-footer clearfix">
							<div class="clearfix"  style="border-bottom: 1px solid #ddd;margin-bottom:10px;padding-bottom: 10px;">
								<div class="pull-left"><strong>配送方式</strong></div>
								<div class="pull-right">	
									<span class="">顺丰快递：</span>
									<span class="color-red">包邮</span>
								</div>
							</div>
							<div>
								<div class="pull-left">
									<span>应付:</span>
									<span class="color-red">￥</span>
									<span class="color-red item-price">998.00</span>
								</div>
								<div class="pull-right">
									<button class="button-yellow-sm" data-click="cancel" data-url="">取消订单</button>
									<button class="button-red" data-click="pay" data-url="">去付款</button>
								</div>
							</div>
						</div>
					</div>	
				</div>				
				
				<!-- 进行中 -->
				<div id="tab3" class="cart-list-container tab-list-content">
					<!--订单列表为空-->
					<div class="cart-empty text-center" style="display:none">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="http://static.yedadou.com/public/front/default/images/demo/icon/order-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您没有正在进行中的订单！</div>
							<div class="cart-empty-buy">
								<a title="" class="color-yellow" href="/shop/">
									马上去逛逛吧 &gt;
								</a>
							</div>
						</div>
					</div>
					<!-- 订单列表不为空 -->
					<div class="card" data-cardprice="500" data-fare="100">
						<div class="card-header" style=""> 
							<div class="text-center order">
								<span>订单号</span>
								<span>123546459</span>
							</div>
							<div class="small text-center color-grey">2015-12-12 11:11:11</div>
							<div class="clearfix bg-grey" style="border-top: 1px dotted #ddd;padding:0 5px;">
								<span class="pull-left">手机自营</span>
								<span class="pull-right color-red">商家已发货</span>
							</div>
						</div>
						<div class="card-inner">
							<!-- php循环一个商品 -->
							<div class="item-list" data-id="3048" data-itemprice="1000">
								<div class="item-media">
									<a href="http://1047.m.yedadou.com/shop/shopGoods/ProductDetails?id=3048">
										<div style="background-image:url('http://placehold.it/200/#e9e9e9/rgb(33,33,33)')" class="bg-100 media-img"></div>
									</a>
								</div>
								<div class="item-content">
									<div class="font-16 mg-b-5 color-grey bold text-limit">
										好东西啊啊啊啊
									</div>
									<div class="mg-b-5" style="margin-right: 30px;position:relative;wdith: 100%">
										<div class="mg-b-10">
											<!-- <div style="min-height:30px;">黄金 黄金 1.4寸</div> -->
											<!-- 如果没有属性，用下面这个： -->
											<!-- <div style="min-height:30px;">该商品暂时没有属性</div> -->
								          	<span class="display-b red1">数量：
								          		<em class="quantity style-normal bold">X 2</em>
												<a href="" class="color-grey share"><i class="fa fa-share-square-o"></i> </a>
								          	</span>
										</div>
							          	<span class="display-b mg-b-10">
							          		总价： ￥<em class="red1">100（含运费）</em>
							          	</span>
							          	<a href="" style="" data-delid="8723" class="button-yellow-sm">
											申请售后
										</a>
									</div>	
								</div>
							</div>
							<div class="item-list" data-id="3048" data-itemprice="1000">
								<div class="item-media">
									<a href="http://1047.m.yedadou.com/shop/shopGoods/ProductDetails?id=3048">
										<div style="background-image:url('http://testimg.yedadou.com/store/1906/f0bf1363512829d4dce885cae0f9da4c.jpg');" class="bg-100 media-img"></div>
									</a>
								</div>
								<div class="item-content">
									<div class="font-16 mg-b-5 color-grey bold text-limit">
										好东西啊啊啊啊
									</div>
									<div class="mg-b-5" style="margin-right: 30px;position:relative;wdith: 100%">
										<div class="mg-b-10">
											<!-- <div style="min-height:30px;">黄金 黄金 1.4寸</div> -->
											<!-- 如果没有属性，用下面这个： -->
											<!-- <div style="min-height:30px;">该商品暂时没有属性</div> -->
								          	<span class="display-b red1">数量：
								          		<em class="quantity style-normal bold">X 2</em>
												<a href="" class="color-grey share"><i class="fa fa-share-square-o"></i> </a>
								          	</span>
										</div>
							          	<span class="display-b mg-b-10">
							          		总价： ￥<em class="red1">100（含运费）</em>
							          	</span>
							          	<a href="" style="" data-delid="8723" class="button-yellow-sm">
											申请售后
										</a>
									</div>	
								</div>
							</div>
							<!-- php循环一个商品 -->
						</div>
						<div class="card-footer clearfix">
							<div class="clearfix">
								<div class="pull-left">
									<strong>选择操作</strong>
								</div>
								<div class="pull-right ">
									<button class="button-green mg-r-10 disabled" data-click="receipt">确认收货</button>
									<button class="button-yellow-sm" disabled>查看物流</button>
								</div>
							</div>
							<!-- <div>
								<div class="pull-left">
									<span>应付:</span>
									<span class="color-red">￥</span>
									<span class="color-red item-price">998.00</span>
								</div>
								<div class="pull-right">
									<button class="btn btn-default btn-xs" data-click="cancel" data-url="">取消订单</button>
									<button class="btn btn-danger btn-xs" data-click="pay" data-url="">去付款</button>
								</div>
							</div> -->
						</div>
					</div>	
				</div>				
				
				<!-- 已完成 -->
				<div id="tab4" class="cart-list-container tab-list-content">
					<!--订单列表为空-->
					<div class="cart-empty text-center" style="display:none;">
						<div class="cart-empty-info">
							<div class="cart-empty-image"><img src="http://static.yedadou.com/public/front/default/images/demo/icon/order-empty.png" alt="" /></div>
							<div class="cart-empty-tip">您还没有完成的订单！</div>
							<div class="cart-empty-buy">
								<a title="" class="color-yellow" href="/shop/">
									马上去逛逛吧 &gt;
								</a>
							</div>
						</div>
					</div>
					<!-- 订单列表不为空 -->
					<!-- 订单列表不为空 -->
					<div class="card" data-cardprice="500" data-fare="100">
						<div class="card-header" style=""> 
							<div class="text-center order">
								<span>订单号</span>
								<span>123546459</span>
							</div>
							<div class="small text-center">2015-12-12 11:11:11</div>
						</div>
						<div class="card-inner">
							<!-- php循环一个商品 -->
							<div class="item-list" data-id="3048" data-itemprice="1000">
								<div class="item-media">
									<a href="http://1047.m.yedadou.com/shop/shopGoods/ProductDetails?id=3048">
										<div style="background-image:url('http://testimg.yedadou.com/store/1906/f0bf1363512829d4dce885cae0f9da4c.jpg');" class="bg-100 media-img"></div>
									</a>
								</div>
								<div class="item-content">
									<div class="font-16 mg-b-5 color-grey bold text-limit">
										好东西啊啊啊啊
									</div>
									<div class="mg-b-5" style="margin-right: 30px;position:relative;wdith: 100%">
										<div class="mg-b-10">
											<!-- <div style="min-height:30px;">黄金 黄金 1.4寸</div> -->
											<!-- 如果没有属性，用下面这个： -->
											<!-- <div style="min-height:30px;">该商品暂时没有属性</div> -->
								          	<span class="display-b red1">数量：
								          		<em class="quantity style-normal bold">X 2</em>
												<a href="" class="color-grey share"><i class="fa fa-share-square-o"></i></a>
								          	</span>
										</div>
							          	<span class="display-b mg-b-10">
							          		总价： ￥<em class="red1">100（含运费）</em>
							          	</span>
							          	<a href="" style="" data-delid="8723" class="button-yellow-sm">
											申请售后
										</a>
									</div>	
								</div>
							</div>
							<div class="item-list" data-id="3048" data-itemprice="1000">
								<div class="item-media">
									<a href="http://1047.m.yedadou.com/shop/shopGoods/ProductDetails?id=3048">
										<div style="background-image:url('http://testimg.yedadou.com/store/1906/f0bf1363512829d4dce885cae0f9da4c.jpg');" class="bg-100 media-img"></div>
									</a>
								</div>
								<div class="item-content">
									<div class="font-16 mg-b-5 color-grey bold text-limit">
										好东西啊啊啊啊
									</div>
									<div class="mg-b-5" style="margin-right: 30px;position:relative;wdith: 100%">
										<div class="mg-b-10">
											<!-- <div style="min-height:30px;">黄金 黄金 1.4寸</div> -->
											<!-- 如果没有属性，用下面这个： -->
											<!-- <div style="min-height:30px;">该商品暂时没有属性</div> -->
								          	<span class="display-b red1">数量：
								          		<em class="quantity style-normal bold">X 2</em>
								          		<a href="" class="color-grey share"><i class="fa fa-share-square-o"></i></a>
								          	</span>
										</div>
							          	<span class="display-b mg-b-10">
							          		总价： ￥<em class="red1">100（含运费）</em>
							          	</span>
							          	<a href="" style="" data-delid="8723" class="button-yellow-sm">
											申请售后
										</a>
									</div>	
								</div>
							</div>
							<!-- php循环一个商品 -->
						</div>
						<div class="card-footer clearfix">
							<div class="clearfix">
								<div class="pull-left">
									<strong>选择操作</strong>
								</div>
								<div class="pull-right ">
									<button class="button-green mg-r-10 disabled">确认收货</button>
									<button class="button-yellow-sm" disabled>查看物流</button>
								</div>
							</div>
							<!-- <div>
								<div class="pull-left">
									<span>应付:</span>
									<span class="color-red">￥</span>
									<span class="color-red item-price">998.00</span>
								</div>
								<div class="pull-right">
									<button class="btn btn-default btn-xs" data-click="cancel" data-url="">取消订单</button>
									<button class="btn btn-danger btn-xs" data-click="pay" data-url="">去付款</button>
								</div>
							</div> -->
						</div>
					</div>	
				</div>				
			</div>
		</div>		
	</body>

		<script src="http://static.yedadou.com/public/newlib/sea.js"></script>
		<script type="text/x-handlebars-template" id="template" style="display:none">
		{{#each items}}
			<div class="item-list">
				<div class="item-media">
					<a href="http://1047.m.yedadou.com/shop/shopGoods/ProductDetails?id=3048">
						<div style="background-image:url('{{address_time}}');" class="bg-100 media-img"></div>
					</a>
				</div>
				<div class="item-content">
					<div class="font-16 mg-b-5 color-grey bold text-limit">
						{{title}}
					</div>
					<div class="mg-b-5" style="margin-right: 30px;position:relative;wdith: 100%">
						<!-- <a href="" style="position:absolute;top:0px;right:-30px;" data-delid="8723" data-click="del"><i class="fa fa-trash" style="font-size: 25px;color:#999"></i></a> -->
						<div class="mg-b-10">
							<div style="min-height:30px;">黄金 黄金 1.4寸</div>
							<!-- 如果没有属性，用下面这个： -->
							<!-- <div style="min-height:30px;">该商品暂时没有属性</div> -->
				          	<span class="display-b red1">价格：
				          		<em class="quantity style-normal bold">{{price}}</em>
				          	</span>
						</div>
			          	<span class="display-b red1">
			          		数量X<em class="">{{quantity}}</em>
			          		<a href="" class="color-grey share">
			          			<i class="fa fa-share-square-o"></i>
			          		</a>
			          	</span>
					</div>	
				</div>
			</div>
		{{/each}}
		</script>
		<script type="text/javascript">
			seajs.config({
				alias: {
					'$': 'zepto.min',
					'zepto_touch_and_fx': 'touch_and_fx',
					'boboweb': 'bobowebpath/boboweb',
				},
				paths: {
					'bobowebpath' : '{__STATIC_URL__}/public/newlib/boboweb'
				},
				vars: {

				},
				debug: true,
				charset: 'utf-8'
			})

			define('main',['$', 'boboweb','boboweb/ui/UITip', 'boboweb/ScrollDownPage', 'handlebars'], function (require, exports, module) {
				function main() {


					 var B=require('boboweb');
					    B.init({'isDebug':true},require)
					    .extend('boboweb/ui/UITip')
					    .extend('boboweb/ScrollDownPage');
					    B.$body.height(B.$window.height()); 
					    var ui=new B.UITip();
					    console.log(ui)
					    ui.popupWait('1', '1')

					    /**
					     * alert: (head,msg,doFun,tip1,tip2)
					     * changeThemeType: (type,waitType)
					     * close: ()
					     * confirm: (head,msg,doFun,tip1,tip2)
					     *  getThemeType: ()
					     *  popup: (bbase)
					     *  popupWait: (t,showt,$afterTarget)
					     *  popupWebUrl: (head,url,doFun,height,width)
					     *  select: (type,head,msg,doFun,tip1,tip2)
					     */
					    
					   //-----------------下拉加载-----------------
					   function loadendDo (data, obj) {
					   		B.debug(data);
						      if(data.success){
						          if(data.data.end){ //如果没有找到
						            obj.stop();
						            return;
						          }
						          var listdata=data.data;
						          console.log('xx')
						          console.log(listdata)
						          //模板
						          var myTemplate = Handlebars.compile($("#template").html());
						          console.log(myTemplate)
						          var html=myTemplate(listdata);
						          var $html=$(html);

						          $uiWaitParent.append($html);
						      }else{
						        B.error(data.msg);
						      }
					   }
					   var urlPageList = '/Shop/Cart/Index/get';
					   // http://1047.m.yedadou.com/shop/test/index?tplName=test1

					   // /Shop/Cart/Index/get
					   var uiTip = ui;
					   var $uiWaitParent = $('.card-inner');
						$uiWaitClassName='';
						var cdp=new B.ScrollDownPage(urlPageList,loadendDo,uiTip,$uiWaitParent, $uiWaitClassName);//*/
					
				}

				main(this)
			})

			seajs.use('main')
			
		</script>	
		

		<script src="http://static.yedadou.com/public/front/default/js/order.js?v=201511242"></script>
		<script>
			$('*[disabled]').on('click', function (e) {
				General.stopEvent(e);
			})
			// tab1
			$('button[data-click="cancel"]').on('click', function () {
				var cancelUrl = $(this).data('url');
				General.confirm('您确定要取消订单吗？','<i class="fa fa-info-circle"></i> 提醒信息', function () {
						window.location.href = cancelUrl;
					}, function() {},'')
			})
			$('button[data-click="pay"]').on('click', function() {
				var payUrl = $(this).data('url');
				General.confirm('您确定要去付款吗？','<i class="fa fa-info-circle"></i> 提醒信息', function () {
						window.location.href = payUrl;
					}, function() {},'')
			})

			// 确认收货
			$('button[data-click="receipt"]').on('click', function () {
				General.confirm('您确定要确认收货？', '<i class="fa fa-info-circle"> 提示信息', function () {
					window.location.href = "http://www.baidu.com";
				}, function () {})
			})
			// tab1
		</script>
</html>































