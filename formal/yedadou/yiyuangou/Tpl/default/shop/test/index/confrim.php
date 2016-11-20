	<title>确认订单</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="http://static.yedadou.com/public/??css/bootstrap.min.css,css/font-awesome.min.css,front/default/css/public/public.css" />
	<script src="http://static.yedadou.com/public/??js/jquery.min.js,js/bootstrap.min.js,js/jquery.cookie.js,js/hammer.min.js,front/default/js/public/public.js"></script>
</head>

<body>
	<style type="text/css">
		.add_quan {
			height: 34px;
		}
		.item-content {
			margin-left: 120px!important;
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

		body {
	    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
	    font-size: 12px;
		line-height: 1.6;
    }
	</style>
	<link rel="stylesheet" href="http://static.yedadou.com/public/??assets/css/font-awesome.css,newtpl/default/cart/confirm.css,newtpl/default/pub.css,newlib/boboweb/ui/theme1.css"/>
	<input type="hidden" id="checkaddress" data-result="true">
	<form id="" method="post" action="">
		<input type="hidden" id="checkedIds">
		<div class="notice_block text-center" >
			<a class="text-center btn btn-info" id="noaddress" data-createAddess="" data-wxAddress="">填写收货地址</a>
		</div>
		<div class="notice_block" id="widthaddress">
			<div>
				<label>
					<strong>收货地址</strong>
				 </label>
				<span>广东省番禺大道北336号海印星玥xx</span>
			</div> 
			<div>
				<label>
					<strong>收货人</strong>
				 </label>
				<span>谢先生</span>
			</div> 
			<div>
				<label>
					<strong>电话</strong>
				 </label>
				<span>123124654654</span>
			</div> 
		</div>
		<div class="card" data-cardprice="500" data-fare="100">
			<div class="card-inner">
					<div class="item-list" data-id="3048" data-itemprice="1000">
						<div class="item-media">
							<a href="http://1047.m.yedadou.com/shop/shopGoods/ProductDetails?id=3048">
								<div style="background-image:url('http://testimg.yedadou.com/store/1906/f0bf1363512829d4dce885cae0f9da4c.jpg');" class="bg-100 media-img"></div>
							</a>
						</div>
						<div class="item-content">
							<div class="font-16 mg-b-5 color-grey bold">好东西啊啊啊啊</div>
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
					          	</span>
							</div>	
						</div>
					</div>
					<div class="item-list" data-id="3048" data-itemprice="100">
						<div class="item-media">
							<a href="http://1047.m.yedadou.com/shop/shopGoods/ProductDetails?id=3048">
								<div style="background-image:url('http://testimg.yedadou.com/store/1906/f0bf1363512829d4dce885cae0f9da4c.jpg');" class="bg-100 media-img"></div>
							</a>
						</div>
						<div class="item-content">
							<div class="font-16 mg-b-5 color-grey bold">好东西啊啊啊啊</div>
							<div class="mg-b-5" style="margin-right: 30px;position:relative;wdith: 100%">
								<!-- <a href="" style="position:absolute;top:0px;right:-30px;" data-delid="8723" data-click="del"><i class="fa fa-trash" style="font-size: 25px;color:#999"></i></a> -->
								<div style="min-height:30px;"></div>
					          	<span class="display-b red1">价格：
					          		<em class="quantity style-normal color-red bold">5988</em>
					          	</span>
							</div>	
						</div>
					</div>
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
					<div class="pull-right">
						<span>应付:</span>
						<span class="color-red">￥</span>
						<span class="color-red item-price">998.00</span>
					</div>
				</div>
			</div>
		</div>	
	</form>
<script>
	$('#noaddress').on('click', function (e) {
		General.stopEvent(e);
		var createAddess = $(this).data('createAddess');
		var wxAddress = $(this).data('wxAddress');
		General.confirm('是否允许购美商城同步您的微信地址？', '<i class="fa fa-info-circle"></i> 信息', function(){
			window.location.href = wxAddress;
		}, function () {
			General.alert('您取消了同步微信地址，去创建地址？', '<i class="fa fa-info-circle"></i> 信息', function () {
				window.location.href = createAddess
			}, '') {

		} , '') 
	})
</script>
</body>
</html>
	