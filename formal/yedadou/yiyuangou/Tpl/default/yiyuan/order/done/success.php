<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<link href="{__STATIC_URL__}/public/yiyuan/css/done.css" rel="stylesheet" type="text/css" />
		<title>购买成功</title>
	</head>
	<body class="">
			<div class="doneimg"></div>
			<div class="title"><span class="tipColor">恭喜您，参与成功</span><br>请等待系统为您揭晓</div>
					<div class="tip">现在您可以：去<a href="/yiyuan/UserCenter/">个人中心</a> 完善个人资料<br>以便中奖后能够及时联系发货。</div>
				<nav id="menu" class="clearfix">
					<a href="/yiyuan/ShopGoods/ProductList">再逛一逛</a>
					<a href="/yiyuan/UserCenter/YiyuanRecord">查看记录</a>
					<a href="/Yiyuan/UserCenter/address/add">新增地址</a>
				</nav>
				<div id="container">
					<div id="contentList">
					</div>
				</div>
	</body>
<script type="text/javascript">
	$container=$('#contentList');
	$window=$(window);
	//设置$body的高度和宽度
	$body=$("body");
	var BBL=BOBOLIB_fun().init($,this,$window,$body);
	var app=new MainApp(BBL);
	function showAppWait(){ //节点后面加一个加载的动画条
		var $wait=app.popupWait(3,2,$container);
		$wait.css('display','block');
	    $wait.css('width','10px');
	    $wait.css('margin','25px auto');
	}
	function refresh(){
		showAppWait();
		$.ajax({
			url:'/yiyuan/order/done?order_sn=<?=$order_sn?>&act=ajaxObtain',
			success: function(data){
				app.close();
				if(data.length<10){
					setTimeout(refresh,1000);
					return;
				}
				$container.html(data);
			},
			error:function(){
				app.close();
				$container.html('网络超时,请刷新页面');
			}
		});
	}
	setTimeout(refresh,1000);
</script>
</html>