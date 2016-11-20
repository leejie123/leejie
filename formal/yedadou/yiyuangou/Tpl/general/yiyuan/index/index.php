<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title><?=$shopName?></title>
<link href="http://static.yedadou.com/public/yiyuan/general/css/index.css?v=2015112802" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div class="slider-box">
	<div id="slider" class="swipe">
		<div class="swipe-wrap" id="swipe-wrap">
	    <?php if(!empty($slidedata)){
		 foreach ($slidedata as $key=>$value):
		?>
			<div>
				<a href="<?=$value['link']?>" target="_blank">
					<img src="<?php echo val($value,'pic_url','');?>">
				</a>
		    </div>
		<?php endforeach;?>
		<?php }?>
		</div>
	</div>
	<ul id="slidePosition">
	<?php if(!empty($slidedata)){
		$index=0;
	 foreach ($slidedata as $key=>$value){
	 	$index++;
	?>	
		<?php if($index>0){ ?>
			<li <?php if($index==1){ ?>class="on"<?php } ?>></li>
		<?php } ?>
	<?php }?>
	<?php }?>
	</ul>
</div>
<div class="topproitem clearfix">
	<div class="title">最新揭晓<a href="/yiyuan/ShopGoods/ProductInterval">更多</a></div>
	<?php if(!empty($hit)){?>
	<?php foreach ($hit as $k=>$v):?>
	<div class="item" onclick="window.location.href='/yiyuan/ShopGoods/ProductDetails?id=<?=$v['goods_id'];?>&term_id=<?=$v['id'];?>';">
		<div style="background-image: url(<?=$v['pic_url']?>)"></div>
		<!--div style="background-image: url(http://static.yedadou.com/public/yiyuan/tem/index.jpg)"></div-->
		<div>恭喜<span class="red"><?=$v['hit_nick']?></span></div>
	</div>
	<?php endforeach;?>
	<?php }?>
</div>
<div class="topproitem clearfix">
	<div class="title">推荐商品<a href="/yiyuan/ShopGoods/ProductList?sort=recommend">更多</a></div>
	<?php if(!empty($recommen)){?>
	<?php foreach ($recommen as $k=>$v):?>
	<div class="item" onclick="window.location.href='/yiyuan/ShopGoods/ProductDetails?id=<?=$v['id'];?>&term_id=<?=$v['term_id'];?>';">
		<div style="background-image: url(<?=$v['pic_url']?>)"></div>
		<div><?=$v['title']?></div>
	</div>
	<?php endforeach;?>
	<?php }?>
</div>

<div class="hotProitem clearfix">
	<div class="title">人气商品<a href="/yiyuan/ShopGoods/ProductList?sort=popular">更多</a></div>
	<div id="mainContianer" class="clearfix">
	</div>
</div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
<script src="http://static.yedadou.com/public/yiyuan/swipe.min.js"></script>
<script type="text/javascript" src="http://static.yedadou.com/public/yiyuan/dopage.js"></script>
<script type="text/javascript">
	$(function(){
		<?php if(!empty($slidedata)){ ?>
		//幻灯
		var $dullets=$('#slidePosition>li');
		var slider=Swipe(document.getElementById('slider'), {
		    auto: 2000,
		    continuous: true,
		    callback: function(pos) {
		      var i = $dullets.length;
		      while (i--) {
		      	$dullets.eq(i).removeClass('on');
		      }
		      $dullets.eq(pos).addClass('on');
		    }
		 });
		<?php } ?>
		$window=$(window);
		//设置$body的高度和宽度
		$body=$("body");
		//$body.width($window.width()-10);
		$body.height($window.height());
		var $cartProductCount=$('#cartProductCount');
		if(parseInt($cartProductCount.text())==0) $cartProductCount.hide();
		var BBL=BOBOLIB_fun().init($,this,$window,$body);
		var app=new MainApp(BBL);
		var targetW=$window.width()*0.2;
		var targetLeft=targetW*3;
		var BFly=new BBL.BFlyToTarget($cartProductCount,targetW,targetW,targetLeft);
		function initBuyToCart($targetData){
			$targetData.find('.buyToCart').each(function(){
				$this=$(this);
				var url=$this.attr('href');
				var id=$this.data('id');
				var $proimg=$targetData.find('#img-'+id);
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
									$cartProductCount.show();
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
							app.alert('提示','网络超时,请重试！');
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
		//翻页
		var urlPageList='/yiyuan/index';
		var $container=$('#mainContianer');
		doPage(urlPageList,$container,function($data){
			initBuyToCart($data);
		});
	});
</script>
</body>
</html>