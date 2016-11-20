
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
		<script src="http://wx0e1e4e800b2804b5.weiapi.yedadou.com/getJsApiConfig?type=config&api_list=onMenuShareAppMessage,onMenuShareTimeline,onMenuShareQQ,onMenuShareWeibo,hideMenuItems&t=eb640a82f760a516f857480ecbfc3ba0"></script>
<script>
wx.ready(function(){

	wx.onMenuShareAppMessage(
    	{"title":"flower","desc":"flower","imgUrl":"_160x160.jpg","link":"http://1047.m.yedadou.com/shop/shopGoods/productDetails?id=3047&uid=50&app_id=2&store_id=59&sharer_id=50"}
	);

	wx.onMenuShareTimeline(
    	{"title":"flower","desc":"flower","imgUrl":"_160x160.jpg","link":"http://1047.m.yedadou.com/shop/shopGoods/productDetails?id=3047&uid=50&app_id=2&store_id=59&sharer_id=50"}
	);

	wx.onMenuShareQQ(
    	{"title":"flower","desc":"flower","imgUrl":"_160x160.jpg","link":"http://1047.m.yedadou.com/shop/shopGoods/productDetails?id=3047&uid=50&app_id=2&store_id=59&sharer_id=50"}
	);

	wx.onMenuShareWeibo(
    	{"title":"flower","desc":"flower","imgUrl":"_160x160.jpg","link":"http://1047.m.yedadou.com/shop/shopGoods/productDetails?id=3047&uid=50&app_id=2&store_id=59&sharer_id=50"}
	);

	wx.hideMenuItems(
    	{menuList: ["menuItem:originPage","menuItem:openWithQQBrowser","menuItem:openWithSafari","menuItem:share:email","menuItem:readMode"]}
	);

});
</script>
    <link rel="stylesheet" href="http://static.yedadou.com/public/front/default/css/detail.css?t=201511201" />
    <title>商品详情</title>
    <style type="text/css">
    body {
        background-color: rgb(242,242,242);
    }
    .bg-white{
        background-color: #fff;
    }
    
    .input_add {
        position: absolute;
        width: 120px;
        left: 0px;
        top: -10px;
    }

    .bg-red {
        background-color: #df1314;
    }

    .bg-orange {
        background-color: #ffa716;
    }

    .text-limit {
        white-space: nowrap;
        display: inline-block;
        max-width: 100px;
        text-overflow:ellipsis;
        overflow:hidden;
    }

    .button-wrap {
        display: block;
        text-align: center;
        background-color: #fff;
        padding: 10px;
    }
    </style>

    <style>
    /* SIMPLE DEMO STYLES */
    body {
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
      font-size: 12px;
      line-height: 1.6;
    }

    .product-info {
        padding: 10px;
        background-color: #fff;
    }
    .container {
      margin: 50px;
      max-width: 700px;
    }
    .container img {
      width: 100%;
    }
    .container .pull-left {
      width: 55%;
      float: left;
      margin: 20px 20px 20px -80px;
    }
    .color-grey {
        color: #999;
    }
    .carousel-inner {
        height: 300px;
    }

    .member > a > li {
        float: left;
        margin: 3px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .swiper-container {
        width: 500px;
        height: 300px;
        margin: 20px auto;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    @media (min-width: 750px) {
      body {
        font-size: 16px;
        line-height: 1.6;
      }
      .container {
        margin: 100px auto;
      }
    }
    </style>
</head>

    <link rel="stylesheet" href="http://static.yedadou.com/public/front/default/css/person.css" />
    <link rel="stylesheet" href="http://static.yedadou.com/public/swipe/css/swiper.min.css" />
    <div class="wrapper">
        <!--公用头部开始 -->
		<!--公用头部开始 -->
        <!-- 滑动图片列表 -->
        <!-- <div class="image-list">
            <div id="image-list" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#image-list" data-slide-to="" class="active"></li>
                    <li data-target="#image-list" data-slide-to=""></li>
                    <li data-target="#image-list" data-slide-to=""></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <a href="#">
                            <div class="carousel-caption"></div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="carousel-caption"></div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="carousel-caption"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img style="width: 100%" src="http://wx.qlogo.cn/mmopen/TUTkVStdiaGDXnRmdgmtT9TiaHfwXgw8Q3siaF5NuMKqOWQwuDriayJXPLfaMicOGD4esO7g09HicDFRRicyjPsKJIB0HxbE2Tv285d/46" alt="" class="img-responsive">
                </div>
                <div class="swiper-slide">
                    <img style="width:100%;" src="http://wx.qlogo.cn/mmopen/TUTkVStdiaGDibXJcEMPD8kFtXoMgqzfzd26DYbibyaltACUdHH1icxaqVKnPAT8TnSR11IymdiaS38MyDVbFqqOiaMLlkOLSYlibgV/46" alt="" class="img-responsive">
                </div>
                <div class="swiper-slide">
                    <img style="width:100%;" src="http://wx.qlogo.cn/mmopen/ibzbm1FfBENgqh18AFXYu54svL63peBd1RsF6VudmN9eEZKv3tB4BXL6LTCBuCPMicfQ8zK8D0iaQqEViaEgkSRLh3ckPhAoMjfo/46" alt="" class="img-responsive">
                </div>
            </div>
        </div>

        <!--商品信息-->
        <form action="" method="" >
            <div class="product-info">
                <!--商品ID-->
                <input type="hidden" name="productId" id="productId" value="3047"  />
                <div class="product-title bold">
                    iphone 6s 4.7 4G手机四色，国行正品，全网通用，顺丰包
                </div>
                
                <div class="row-container">
                    <span class="row-label bold">价值：</span>
                    <span class="row-content red1 bold">¥<span id="price">4440.00</span></span>
                </div>
                
                <div class="help-block red1 well">
                    <i class="fa fa-info-circle"></i>
                    成功开团并邀请伙伴参与，达到人数即可开奖，随机抽取参团其中一人中奖。人数不足到期自动退款，详见下方玩法介绍
                </div>

                <div class="row-container">
                    <span class="row-label bold">开团人数</span>
                    <div class="row-content">
                        <div class="input-group input_add">   
                          <input type="tel" class="form-control quan" data-max="20" data-price="商品的价格" aria-label="Amount (to the nearest dollar)">
                          <span class="input-group-addon">人</span>
                        </div>
                    </div>
                    <div class="help-block">本团最多参加人数20人</div>
                </div>

                <div class="row-container mt10">
                    <span class="row-label bold red1">开团金额</span>
                    <span class="row-content bold red1">¥<span id="totalMoney" class="unit_price">100.00</span></span>
                </div>
            </div>   

            <div class="button-wrap">
                <button class="button button-red" type="submit">马上开团</button>
            </div>
        </form>


        ****我的拼团：进行中****
        <form action="">
            <div class="product-info">
                <!--商品ID-->
                <input type="hidden" name="productId" id="productId" value="3047"  />
                <div class="product-title bold">
                    iphone 6s 4.7 4G手机四色，国行正品，全网通用，顺丰包
                    <!-- <a href="/Shop/Order/Comment">去评论</a> -->
                </div>
                
                <div class="row-container">
                    <span class="row-label bold">价值</span>
                    <span class="row-content red1 bold">¥<span id="price">4440.00</span></span>
                </div>
                <!-- 提示 -->
                <div class="help-block red1 well">
                    <i class="fa fa-info-circle"></i> 成功开团并邀请伙伴参与，达到人数即可开奖，随机抽取参团其中一人中奖。人数不足到期自动退款，详见下方玩法介绍
                </div>

                <!-- 剩余时间 -->
                <div class="row-container">
                    <div class="button-red bg-orange"  style="width: 100%;text-align:center;"> 剩余时间：23:18:56</div>
                </div>

                
                <!-- 拼团成功 -->
                <div class="row-container">
                    <div class="button-green"  style="width: 100%;text-align:center;">拼团成功</div>
                </div>  

                <!-- 拼团失败 -->
                <div class="row-container">
                    <div class="button-red" disabled style="width: 100%;text-align:center;">拼团失败</div>
                </div>  

                <!-- 参团人数 -->
                <div class="row-container">
                    <span class="row-label bold" style="vertical-align:middle">参团人数</span>
                    <span class="row-content">
                        <span>
                            <em class="red1">1</em class="red1">/<em>s5</em>人
                        </span>
                    </span>
                </div>

                <div class="row-container">
                    <span class="row-label bold" style="vertical-align:middle">参团支付</span>
                    <span class="row-content">
                        526
                    </span>
                </div>

                <div class="row-container">
                    <span class="row-label bold" style="vertical-align:middle">拼团ID</span>
                    <span class="row-content red1">
                        <span>800</span>
                    </span>
                </div>

                <div class="row-container">
                    <span class="row-label bold" style="vertical-align:middle">团长</span>
                    <span class="row-content red1">
                        ￥<span>时代uhusaidf</span>
                    </span>
                </div>
        
                <!-- 中奖名单 -->
                <div class="row-container clearfix">
                   <ul class="member">
                        <a href="">
                            <li style="background-image: url('http://placehold.it/200x200')"> </li>
                        </a>
                        <a href="">
                            <li style="background-image: url('http://placehold.it/200x200')"> </li>
                        </a>
                        <a href="">
                            <li style="background-image: url('http://placehold.it/200x200')"> </li>
                        </a>
                        <a href="">
                            <li style="background-image: url('http://placehold.it/200x200')"> </li>
                        </a>
                        <a href="">
                            <li style="background-image: url('http://placehold.it/200x200')"> </li>
                        </a>
                        <a href="">
                            <li style="background-image: url('http://placehold.it/200x200')"> </li>
                        </a>
                        <a href="">
                            <li style="background-image: url('http://placehold.it/200x200')"> </li>
                        </a>
                        <a href="">
                            <li style="background-image: url('http://placehold.it/200x200')"> </li>
                        </a>
                        <a href="">
                            <li style="background-image: url('http://placehold.it/200x200')"> </li>
                        </a>
                        <a href="">
                            <li style="background-image: url('http://placehold.it/200x200')"> </li>
                        </a>
                        <a href="">
                            <li style="background-image: url('http://placehold.it/200x200')"> </li>
                        </a>
                    </ul>
                </div>
            </div>   
            
            <div class="button-wrap text-center">
                <button class="button button-red">马上邀请小伙伴</button>
            </div>
            <div class="button-wrap text-center">
                <button class="button button-red">加入拼团</button>
            </div>
        </form>
        <!--商品信息-->
       

        <!-- ****我的拼团：进行中**** -->

        <!-- 图文详情&玩法介绍 -->
        <div class="group-block">
            <!--图文详情[START]-->
            <div class="list-container relative">
                <a href="#" data-id="toggle" data-init="0">
                    <div class="list-header">
                        <span class="list-header-image"><img class="" src="http://static.yedadou.com/public/front/default/images/demo/icon/icondetail.png"></span>
                        <span class="list-header-title">图文详情</span>&nbsp;
                        <span class="red1">0位</span>
                        <span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
                    </div>
                </a>
            </div>
            <!--图文详情[END]-->
            <!--玩法介绍[START]-->
            <div class="list-container relative">
                <a href="http://1047.m.yedadou.com/shop/test/index?tplName=mobile_playrule" data-id="toggle" data-init="0">
                    <div class="list-header">
                        <span class="list-header-image"><img class="" src="http://static.yedadou.com/public/front/default/images/demo/icon/iconhelp.png"></span>
                        <span class="list-header-title">玩法介绍</span>&nbsp;
                        <span class="red1">0位</span>
                        <span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
                    </div>
                </a>
            </div>
            <!--玩法介绍[END]-->
        </div>    
    </div>
    </body>
    <script>
        var obj = {};
        obj.calculate = function() {
            this.data = {
                max_quan: null,
                unit_price:null,
                product_price: null
            };
            this.init = function ($info) {
                /**
                 * quan 开团人数
                 * product_price 商品价格
                 * max_quan 最多的人数
                 */
                var that = this;

                var max_quan = parseFloat($info.find('.quan').data('max'));
                var product_price = parseFloat($info.find('#price').html());
                this.data.product_price = product_price;
                this.data.max_quan = max_quan;

                $info.find('.quan').on('change', function () {
                    var quan = parseFloat($(this).val());

                    if (isNaN(quan) || quan <= 1 || typeof(quan) != 'number') {
                        quan = 2;
                        $info.find('.quan').val(quan);
                    }

                    if (quan <= that.data.max_quan) {
                        var unit_price = that.data.product_price/quan;
                        unit_price = Math.round(unit_price * 100) / 100;
                        that.data.unit_price = unit_price;

                        $('.unit_price').html(that.data.unit_price);
                    } else {
                            var unit_price = that.data.product_price / quan;
                            unit_price = Math.round(unit_price * 100) / 100;
                            that.data.unit_price = unit_price;

                            $info.find('.quan').val(that.data.max_quan);
                            $('.unit_price').html(that.data.unit_price);
                    } 
                    that.para()
                 })
            };
            this.para = function () {
                console.log('最多参与人数是：' + this.data.max_quan)
                console.log('每个人应该付钱是：' + this.data.unit_price)
                console.log('商品价格是：' + this.data.product_price)
            }

        }

        $('.product-info').each(function (k, v) {
            var cal = new obj.calculate();
            cal.init($(v));
        })
    </script>

    <!-- Swiper JS -->
    <script src="http://static.yedadou.com/public/swipe/js/swiper.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container');
    </script>
</html> 
