<?php include $this->tpl('yiyuan:public/html_header.php') ?>

<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/done.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	.ball-spin-fade-loader{display: none !important;};
</style>
		<title>购买成功</title>
	</head>
	<body class="">
		<div class="doneimg"></div>
		<div id="tipError" class="title" style="display:none;">
			<span class="tipColor clearfix" style="color: #3399fe;padding-top: 20px;display: block;">非常遗憾</span>
			<span class="tipColor clearfix" style="color: #3399fe;margin-bottom: 10px;display: block;padding-top: 30px;">幸运码已经被抢光，下次记得下手快点哦~</span>
			<span class="tipColor clearfix" style="display:block">你的支付金额已退回至您的余额帐户中</span>
			<span class="tipColor clearfix" style="display:block">用余额支付可以快人一步哦~</span>
		</div>
		<div id="tipNoError" class="title" style="padding-top:25px;">
			<img width="8%" src="{__STATIC_URL__}/public/yiyuan/new2016/images/done.jpg"><br><span id="tipSucess1" class="tipColor">恭喜您，出码成功</span><span id="tipWait1" class="tipColor">恭喜您，支付成功</span>
			<div id="tipSucess" class="tip" style="margin-bottom: 15px;display:none;"><a href="/yiyuan/index">再去商城逛逛</a></div>
			<div id="tipWait" class="tip" style="margin-bottom: 15px;color:#ff9900;font-size: 14px;">正在为您生成幸运码..</div>
			<div id="container">
				<div class="row" style="background-color: #f7f7f7; display:none;" id="proTitle">
					<div class="label" style="width: 90px;background-color: #f7f7f7;">购买商品详情</div>
					<div class="tip" style="background-color: #f7f7f7;">　</div>
				</div>
				<div id="contentList">
					<img width="100%" src="{__STATIC_URL__}/public/yiyuan/new2016/images/donewait.jpg">
				</div>
			</div>
		</div>

		<div id="container">
			<div class="row du0" style="border: 0;">
				<div class="label">猜你喜欢</div>
				<div class="tip"></div>
k			<div class="proItemContainer1">
				<div class="row du0 proItemContainer2">
					<div class="proItemContainer">
					<?php foreach ($goods_rand as $key => $item){ ?>
						<div class="proItem" onclick="location.href='/yiyuan/cart/index/add?goods_id=<?=val($item,'id')?>&spec=<?=val($item,'spec','')?>'">
							<div class="img" style="background-image:url('<?=val($item,'pic_url')?>')">
								<div class="tip"><?=val($item,'title')?></div>
							</div>
							<a href="#">立即抢购</a>
						</div>
					<?php } ?>
					</div>
				</div>
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
	var $tipError=$('#tipError');//如果没有找到，的错误提示
	var $tipNoError=$('#tipNoError');//这个div里面,有加载提示和加载成功的提示
	var $tipSucess=$('#tipSucess');
	var $tipWait=$('#tipWait');
	var $tipSucess1=$('#tipSucess1');
	var $tipWait1=$('#tipWait1');
	var $proTitle=$('#proTitle');
	$tipSucess.hide();
	$tipWait.show();
	$tipSucess1.hide();
	$tipWait1.show();
	function refresh(){
		refresh_index++;
		if(refresh_index>10){//如果10次重试都没有获得。提示错误
			$tipNoError.hide();
			$tipError.show();
			return;
		}
		showAppWait();
		$proTitle.hide();
		$.ajax({
			url:'/yiyuan/order/done?order_sn=<?=$order_sn?>&act=ajaxObtain',
			success: function(data){
				app.close();
				if(data.length<10){
					setTimeout(refresh,1000);
					return;
				}
				$tipError.hide();
				$tipNoError.show();
				$proTitle.show();
				$tipSucess.show();
				$tipWait.hide();
				$tipSucess1.show();
				$tipWait1.hide();
				var $data=$(data);
				$container.empty();
				$container.append($data);
				$data.find('.codeItem').each(function(index,element){
					var $this=$(this);
					var strCode=$this.text();
					var arr=strCode.split(', ');
					$this.empty();
					var appendStr1='';
					var c1=arr.length;
					if(c1<5){
						for(var i=0;i<c1;i++){
							appendStr1+='<span">'+arr.shift()+'</span>';
						}
						$this.html('<div style="width: 225px;display: inline-block;">'+appendStr1+'</div>');
						return;
					}
					var c2=c1<5?c1:4;
					for(var i=0;i<c2;i++){
						appendStr1+='<span>'+arr.shift()+'</span>';
					}
					$this.html('<div style="width: 225px;display: inline-block;">'+appendStr1+'</div>');
					var appendStr2='<div style="width: 225px;display: inline-block;"><span>'+arr.join('</span><span>')+'</div>';
					var $more=$('<a class="codeMoreTip" href="#">更多</a>');
					$this.append($more);
					var isMore=true;
					$more.click(function(e){
						e.preventDefault();
						if(isMore){
							appendStr=appendStr1+appendStr2;
							$this.html(appendStr);
							$more.html('隐藏');
						}else{
							$this.html(appendStr1);
							$more.html('更多');
						}
						isMore=!isMore;
						$this.append($more);
					});
				});
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
        setTimeout(turl,3000);
    }
</script>
</html>