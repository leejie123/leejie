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
	var refresh_index=0;
	function refresh(){
		refresh_index++;
		if(refresh_index>10){
			$container.html('<div id="container"><div class="headtip" style="font-size: 16px;margin-top: 30px;font-weight: bold;">获取购买码超时，可以己被买光，请到<a href="/yiyuan/UserCenter/">个人中心</a>确认是否退款</div></div>');
			return;
		}
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

    var addresses=<?=$addresses?>;
    if(addresses){
        <?php if($is_subscribe!=1){ ?>
        //表示有收获地址则判断是否关注公众号了
        $(function(){
            var $body=$('body');
            var $window=$(window);
            $body.height($window.height());
            var BL=BOBOLIB_fun().init($,this,$(window),$body);
            $body.css('width','auto');
            var lockLayout=new BL.BPopup($body,{
                lockLayerColor : "#000",
                lockLayerAlpha : .8,
                cssPosition:'fixed'
            });
            var strDiv=$('<div></div>');
            var img=$('<img src="<?=$qrcode_url?>">');
            img.css('width','100%');
            img.css('margin','0px');
            img.css('padding','0px%');
            strDiv.append(img);
            strDiv.css('color','#fff');
            strDiv.css('font-size','16px');
            var bimg=new BL.BBase(strDiv,{dockType:9,resizeW:.9,resizeH:0.5,offsetX:0,offsetY:0,cssPosition:'fixed'});
            lockLayout.popup(bimg);
            strDiv.click(function(){
                lockLayout.reomveLockLayer();
            });



        });
        <?php } ?>
    }else{
        function turl(){
            window.location='/Yiyuan/UserCenter/address/add?order_sn=<?=$order_sn?>';
        }
        setTimeout(turl,1500);
    }
</script>
</html>