<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>商品分类</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/product.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<nav class="topSubNav clearfix">
	<a id="procate" href="#" class="select">商品分类<i class="yiyuan-icon">&#xe801;</i></a>
	<div class="clearfix">
		<a href="/yiyuan/ShopGoods/ProductList?sort=new" <?php if($sort=='new') echo 'class="red"';?>>新品</a>
		<a href="/yiyuan/ShopGoods/ProductList?sort=recommend" <?php if($sort=='recommend') echo 'class="red"';?>>推荐</a>
		<a href="/yiyuan/ShopGoods/ProductList?sort=popular" <?php if($sort=='popular') echo 'class="red"';?>>人气</a>
		<a href="/yiyuan/ShopGoods/ProductList?sort=<?=$sort=='pasc'?'pdesc':'pasc';?>" <?php if($sort=='pasc' || $sort=='pdesc') echo 'class="red"';?>>所需人次</a>
	</div>
</nav>
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
<?php include $this->tpl('yiyuan:public/footer.php') ?>
<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script>
	$(function(){
		//商品分类
		var $topSubNavListContainer=$("#topSubNavListContainer");
		var isTopSubNavListContainerShow=false;
		var $procateI=$('#procate>i');
		$('#procate').click(function(){
			var $this=$(this);
			isTopSubNavListContainerShow=!isTopSubNavListContainerShow;
			if(isTopSubNavListContainerShow){
				$topSubNavListContainer.show();
				$this.addClass('select');
				$procateI.addClass('iselect');
			}else{
				$topSubNavListContainer.hide();
				$this.removeClass('select');
				$procateI.removeClass('iselect');
			}
		});
		//显示进度动画
		function animationProgress(){
			$('.progress-bar').each(function(){
				var $this=$(this);
				var width=parseInt($this.attr('data-to'))+"%";
				$this.css('width',width);
			});
		}
		setTimeout(animationProgress,500);
		//
		var urlPageList='/yiyuan/ShopGoods/ProductList?cid=<?=$cid;?>&sort=<?=$sort;?>&tag=<?=$tag;?>&code_price=<?=$code_price;?>';
		var $container=$('#mainContianer');
		var arrTem=doPage(urlPageList,$container,function($data){
			reSetBuyToCart($data);
		},<?=$begin_time?>);
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
