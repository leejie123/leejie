<?php include $this->tpl('yiyuan:public/html_header.php'); ?>
<title><?=val($title,'name','商品分类')?></title>
<!-- <link href="{__STATIC_URL__}/public/yiyuan/css/product.css?v=20151223-2" rel="stylesheet" type="text/css" /> -->
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/product1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<!-- <nav class="topSubNav clearfix">
	<a class="" style="
    width: 100%;
    border-right: 0;
    background-color: #da3651;
    color: #fff;
    font-size: 16px;
    height: 30px;
"><?=val($title,'name','商品分类')?></a>
</nav> -->
<div id="topSubNavListContainer" class="topSubNavListContainer">
	<nav class="topSubNavList clearfix">
		<?php
		  if(!empty($cate)){
		  	$index=0;
		 	foreach($cate as $k=>$v){
		 	$index++;
		 	if($index%3==1){
		 		if($index!=1) echo '</div>';
		 		echo '<div class="clearfix">';
		 	}
		?>
			<a href="/yiyuan/ShopGoods/ProductList?cid=<?=$v['id']?>" <?php if($cid==$v['id']) echo 'class="red"' ?>><?php if(!empty($v['pic_url'])){ ?><img src="<?=$v['pic_url']?>" align="middle"><?php } ?><?=$v['name']?></a>
		<?php }
			echo '</div>';
			}
		?>
	</nav>
</div>
<div id="mainContianer" class="clearfix">
</div>
<div class="more"></div>
<?php include $this->tpl('yiyuan:public/footerNav.php') ?>
<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script>
	$(function(){
		//显示进度动画
		function animationProgress(){
			$('.progress-bar').each(function(){
				var $this=$(this);
				var width=parseInt($this.attr('data-to'))+"%";
				$this.css('width',width);
			});
		}
		setTimeout(animationProgress,500);
		var t1=new Date('<?=$time_now?>');
		console.log('t1:'+t1.getTime());
		var t2=new Date();
		var nowTimeOffset=t1.getTime()-t2.getTime();
		var urlPageList='/yiyuan/ShopGoods/ProductList?cid=<?=$cid;?>&sort=<?=$sort;?>&code_price=<?=$code_price;?>&tag=<?=$tag;?>';
		var $container=$('#mainContianer');
		var arrTimeTips=[];
		var arrTem=doPage(urlPageList,$container,function($data){
			reSetBuyToCart($data);
			//如果有倒计时的，初始化
			$data.find(".clockTip").each(function(){
				$thisTip=$(this);
				var id=$thisTip.data('id');
				var t=$thisTip.data('time')||'';//time:通过php转date('Y/m/d H:i:s',..)  例如：2015/12/26 16:00:00
				if(t!=0&&t!='0'&&t!=''){
					arrTimeTips.push([$thisTip,t,id]);
				}
			});//end find(".clockTip")
			//console.log(arrTimeTips.length);
			var colockTipInterval=setInterval(function(){
				var c=arrTimeTips.length;
				var arrRemove=[];//保存需要删除的元素
				var NowTime =new Date().getTime()+nowTimeOffset;
				for(var i=0;i<c;i++){
					var $arrTem=arrTimeTips[i]
					var $item=$arrTem[0];
					var $timeTip=$item.find('.right');
					var endTime=$arrTem[1]||'';
					var goods_id=$arrTem[2]||0;
					//console.log(endTime);
					if(endTime!=0){
						var EndTime= new Date(endTime);
						var t =EndTime.getTime() - NowTime;
						var m=Math.floor(t/1000/60%60);
						var s=Math.floor(t/1000%60);
						var ss=Math.floor(t%1000);
						if(m<0) m=0;
						if(s<0) s=0;
						if(ss<0) ss=0;
						var str='揭晓倒计时:';
						if(m>9){
							str+= m + ":";//分
						}else{
							str+= "0"+m + ":";//分
						}
						if(s>9){
							str+= s + ":";//秒
						}else{
							str+= "0"+s + ":";//秒
						}
						str+=  ss;//毫秒
						if(m==0&&s==0&&ss==0){ //结束
							arrTimeTips.splice(i,1);
							i--;
							c--;
							$timeTip.html('已开奖,点我看详情');
							$timeTip.click(function(){
								app.alert('温馨提示','因网络延时，如未看到结果，请多刷新几次页面',function(){
									window.location.href='/yiyuan/ShopGoods/ProductPastTimes?goods_id='+goods_id;
								})
							});
						}else{
							$timeTip.html(str);
						}
						//console.log('运行：'+i+','+c);
					}
				}
				if(c==0) clearInterval(colockTipInterval);
			},100);  //end setInterval
		},<?=$begin_time?>);//end doPage

		var BBL=arrTem[0];
		var app=arrTem[1];
		//
		//加购物车
		var $cartProductCount=$('#cartProductCount');
		if(parseInt($cartProductCount.text())==0) $cartProductCount.hide();
		var targetW=$window.width()*0.2;
		var targetLeft=targetW*3;
		var BFly=new BBL.BFlyToTarget($cartProductCount,targetW,targetW,targetLeft);
		function reSetBuyToCart($target){
			$target.find('.buyToCart').each(function(){
					$this=$(this);
					var url=$this.attr('href');
					var id=$this.data('id');
					var $proimg=$target.find('#proimg-'+id);
					$this.attr('href','#');
					$this.click(function(e){
						e.preventDefault();
						//app.popupWait();


						$.ajax({
							url:url,
							type:'get',
							success: function(item) {
								app.close();
								item=$.parseJSON(item);
								if(item.success){
									if(item.success===true){
										//app.alert('提示','已成功加入购物车');
										var count=item.successParam||0;
										$cartProductCount.show()
										$cartProductCount.text(count);
										return;
									}
								}
								if(item.msg){
									app.alert('提示',item.msg);
								}
							},
							error:function(){
								app.close();
//								app.alert('提示','网络超时,请重试！');
							}
						});
						try{
							BFly.fly($proimg);
						}catch(e){
							console.log('fly error!!');
						}
					});
				});
		}
		reSetBuyToCart($body);
	});
</script>
</body>
<?php include $this->tpl('yiyuan:public/qrcode.php')  ?>

</html>
