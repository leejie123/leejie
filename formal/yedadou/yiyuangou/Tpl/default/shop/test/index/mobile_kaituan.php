
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
			
			body {
			    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
			    font-size: 12px;
				line-height: 1.6;
		    }
		    .text-limit {
	    	    max-height: 3em;
			    overflow: hidden;
			    text-overflow: ellipsis;
			    white-space: nowrap;
		    }

		    .text-break {
		    	word-break: break-all; 
		    	white-space: normal;
		    	color: #000;
		    	font-size: 16px;
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

			.share {
			    font-size: 15px;
    			margin-left: 10px;
			}
			*[disabled] {
				opacity: 0.7;
			}
			.item-media {
				float: left;
				width: 60px;
				height: 60px;
			}
			.item-content1 {
				margin-left: 70px;
				max-width: 78%;
			}

			.item-content1 {
				word-break: break-all; 
				white-space: normal;
				color: #000;
				font-size: 16px;
			}

			span > em {
				font-style: normal;
			}

			.member > a:first-child > li{
				border: 3px solid #ffa716;
			}

			.color-greyx {
				color:#999;
			}

			.row-content {
				padding: 0 10px;
				margin-bottom: 10px;
			}

			.member > a > li {
				float: left;
				margin: 3px;
				width: 40px;
				height: 40px;
				border-radius: 50%;
			}

			.sec1 {
				display:block;
				background-color:#fff;
				padding-bottom:5px;
				border-bottom:1px solid #ddd;
			}
			.block {
				display:inline-block;
				width: 100%;
			}

			.label1 {
				min-width: 80px;
			}
		</style>


		<title>商品详情</title>
	</head>

	<body class="">
		<div class="wrapper">
			<!--公用头部开始 -->
			<!--公用头部开始 -->
			<div class="cart-container">
				<form action="" method="">
					<!-- 支付倒计时 -->
					<div style="width: 100%;text-align:center;background-color:#fff;padding: 10px;">
						剩余支付时间：00:02:59
					</div>
					<!-- 详情介绍 -->
					<div class="row-content" style="background-color: #fff; margin-top: 10px;">
						<div> 
							<div style="padding: 10px 0;">
								<div class="item-media">
									<a href="">
										<div style="width: 100%;height:100%;background-image:url('http://placehold.it/200x200');" class="bg-format"></div>
									</a>
								</div>
								<div class="item-content1">
									<a href="" class="bold text-break">f撒搜房is覅撒酒疯is及覅偶f撒搜房is覅撒酒疯is及覅偶</a>
									<span style="display:block;font-size:12px;">国行正品，正品包邮国行正品，正品包邮国行正品，正品包邮国行正品，正品包邮
									</span>
								</div>
							</div>
						</div>
						<div>
							<div>
								<label class="label1" for="" ><strong>拼团ID</strong></label>
								<span>568</span>
							</div>
							<div>
								<label class="label1" for=""><strong>支付金额</strong></label>
								<span>568</span>
							</div>
							<div>
								<label class="label1" for=""><strong>参团人数</strong></label>
								<span><em class="red1">1</em>/5</span>
							</div>
						</div>
					</div>
					<!-- 选择付款 -->
					<div class="row-content" style="background-color: #fff;margin-top: 10px;padding: 10px;">
						<div class="block">
							<span class="pull-left">
								余额支付<em class="red1"> 5</em>
								<em class="color-grey">(可用余额：0.00元)</em>
							</span>
							<span class="pull-right">
								<input type="radio" name="pay_type" checked>
							</span>
						</div>
						<div class="block">
							<span class="pull-left">
								微信支付<em class="red1"> 5</em>
								<em class="color-grey">(可用余额：0.00元)</em>
							</span>
							<span class="pull-right">
								<input type="radio" name="pay_type">
							</span>
						</div>
					</div>
					<div class="row-content">
						<!-- 后台这里不明白问下明究 -->
						<button class="button-red" type="submit">立即开（参）团</button>
						<button class="button-red" type="submit">立即开团</button>
						<button class="button-red" type="submit">发起支付</button>
					</div>
				</form>
			</div>
		</div>		
	</body>
</html>































