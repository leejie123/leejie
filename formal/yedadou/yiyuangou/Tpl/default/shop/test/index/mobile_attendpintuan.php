
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
		</style>


		<title>商品详情</title>
	</head>

	<body class="">
		<div class="wrapper">
			<!--公用头部开始 -->
			<!--公用头部开始 -->
			<div class="cart-container">
				<!-- 订单列表不为空 -->
				<div class="sec1">
					<div class="row-content"> 
						<div style="padding: 10px 0;">
							<div class="item-media">
								<a href="">
									<div style="width: 100%;height:100%;background-image:url('http://placehold.it/200x200');" class="bg-format"></div>
								</a>
							</div>
							<div class="item-content1">
								<a href="" class="bold text-break">f撒搜房is覅撒酒疯is及覅偶f撒搜房is覅撒酒疯is及覅偶</a>
								<span style="display:block;font-size:12px;">国行正品，正品包邮国行正品，正品包邮国行正品，正品包邮国行正品，正品包邮</span>
							</div>
						</div>
					</div>
					<div class="row-content clearfix color-greyx"> 
						<span class="pull-left">
							价值：￥
							<em>4488</em>
						</span>
						<span class="pull-right">
							已参与：
							<em>3/10</em>
						</span>
					</div>
					<div class="row-content clearfix">
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
					<div class="row-content">
						<div class="button-red" style="display:block;text-align:center;">
							剩余时间： 12-12-12-12:12:12
						</div>
					</div>
				</div>
				<div class="sec1">
					<div class="row-content"> 
						<div style="padding: 10px 0;">
							<div class="item-media">
								<a href="">
									<div style="width: 100%;height:100%;background-image:url('http://placehold.it/200x200');" class="bg-format"></div>
								</a>
							</div>
							<div class="item-content1">
								<a href="" class="bold text-break">f撒搜房is覅</a>
								<span style="display:block;font-size:12px;">国行正品，正品包邮国行正</span>
							</div>
						</div>
					</div>
					<div class="row-content clearfix color-greyx"> 
						<span class="pull-left">
							价值：￥
							<em>4488</em>
						</span>
						<span class="pull-right">
							已参与：
							<em>3/10</em>
						</span>
					</div>
					<div class="row-content clearfix">
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
						</ul>
					</div>
					<div class="row-content">
						<div class="button-red" style="display:block;text-align:center;">
							剩余时间： 
							<span>12-12-12-12:12:12</span>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</body>

		<script src="http://static.yedadou.com/public/newlib/sea.js"></script>
		<script type="text/x-handlebars-template" id="template" style="display:none">
		{#each items}}
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
				          		<email class="quantity style-normal bold">{{price}}</em>
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
		</script>{
		<script type="text/javascript">
			seajs.config({
				alias: {
					'$': 'zepto.min',
					'zepto_touch_and_fx': 'touch_and_fx',
					'boboweb': 'bobowebpath/boboweb',
				},
				paths: {
					'bobowebpath' : 'http://static.yedadou.com/public/newlib/boboweb'
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
</html>































