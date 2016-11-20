<?php 
$t=get('t');
$page_no=get('page_no');
if($t==1){
	if($page_no==3){
		echo json_encode(['error'=>true,'end'=>true]);
		return;
	}
	for($i=0;$i<70;$i++){
		echo '<li><a href="#"><img src="http://wx.qlogo.cn/mmopen/yTW6sgXCtyYA85oRUQZJapia4zNia6xqic3XFI6NMLt0icwBsroNP49riaSKEbU6pGMjqNkicwo5QibeKKFYbfHDqDoB2orEzkqEgIic/46"></a></li>';
	}
	return;
}
?>
<head>
<meta charset="utf-8"/>
<meta content="" name="Copyright" />
<meta content="" name="Keywords">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<link href="http://test.static.yedadou.com/public/??yiyuan/css/normalize.css,yiyuan/css/pub.css,yiyuan/ui/boboui.css,yiyuan/pintuan/public.css,yiyuan/css/ico.css?v=201512163" rel="stylesheet" type="text/css" />
		<script src="http://test.static.yedadou.com/public/??yiyuan/zepto.min.js,yiyuan/touch_and_fx.js,yiyuan/boboweb.js,yiyuan/ui/boboui.js"></script>
    <title></title>
<style type="text/css">
	body{
		background-color: #f7f7f7;
	}
	.top{
		background-color: #666;
	    color: #fff;
	    width: 60px;
	    display: block;
	    text-align: center;
	    padding-top: 10px;
	    padding-bottom: 10px;
	    position: fixed;
	    right: 0;
	    bottom: 0px;
	}
	ul{
		background-color: #fff;
		padding: 5px !important;
	}
	ul>li{
		float: left;
		margin:5px;
		margin-left: 17px;
	}
	ul>li img{
		width: 100%;
	    border-radius: 50%;
	    overflow: hidden;
	    border: 1px solid #eee;
	}
	@media ( max-width: 320px ) {
		ul>li{
			float: left;
			margin:5px;
			margin-left: 20px;
		}
	}
</style>

</head>
<body>
    <a id="top" class="top" href="">返回</a>
    <ul id="usercontainer" class="clearfix">

    </ul>
    </body>
    <script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#top').click(function(e){
				e.preventDefault();
				window.history.go(-1);
			});
			var $container=$('#usercontainer');
			//
			$window=$(window);
			//设置$body的高度和宽度
			$body=$("body");
			$body.height($window.height());
			var BBL=BOBOLIB_fun().init($,this,$window,$body);
			var app=new MainApp(BBL);
			var urlPageList='/shop/test/index?tplName=pintuanuserlist&t=1';
			
			doPage(urlPageList,$container,function($data){
				
			});

		});

	</script>
</html>