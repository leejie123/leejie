<!DOCTYPE html>
<html lang="en">
<head>
	<head>
	<meta charset="UTF-8">
	<title>搜索结果</title>
	<link rel="stylesheet" href="{__STATIC_URL__}/public/css/pure-min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{__STATIC_URL__}/public/widget/search//css/list.css">
	<link rel="stylesheet" href="http://test.static.yedadou.com/public/??yiyuan/css/normalize.css,yiyuan/new2016/ui/boboui.css,yiyuan/css/ico.css?v=201512163">
	<script src="http://test.static.yedadou.com/public/??yiyuan/zepto.min.js,yiyuan/touch_and_fx.js,yiyuan/boboweb.js,yiyuan/new2016/ui/boboui.js"></script>
</head>
<body>

	<div class="wrap">
		<form id="form" action="/shop/shopGoods/productSearch" method="get">
			<div style="padding:8px 0;background-color:#f3f3f3">
				<a href="" class="return"></a>
				<div class="search">
					<div style="">
						<button style=""></button>
						<input type="text" id="search" placeholder="请输入关键词"  name="keyWord" value="<?=$keyWord?>">
					</div>
				</div>
			</div>
		</form>
		<div id="main">
			<div class="goodList" id="container" data-url="/shop/shopGoods/productSearch/post?keyWord=<?=$keyWord;?>">


			</div>
		</div>
	</div>
</body>
	<script src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
	<script>
		$(function(){
			$window=$(window);
			$body=$("body");
			$body.width($window.width());
			$body.height($window.height()-80);
			var BBL=BOBOLIB_fun().init($,this,$window,$body);
			var app=new MainApp(BBL);

			function showAppWait(){ //节点后面加一个加载的动画条
				var $wait=app.popupWait(2,2,$container);
				$wait.css('display','block');
			    $wait.css('width','10px');
			    $wait.css('margin','25px auto');
			    $wait.css('color','red');
			}
			var urlPageList=$('#container').data('url');
			var $container=$('#container');
			doPage(urlPageList,$container,function(a){}, 0);
		});
	</script>
</html>