<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title><?=$shopName?></title>
<link href="{__STATIC_URL__}/public/yiyuan/general/indexchange/index.css?v=2016331" rel="stylesheet" type="text/css" />
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
{__CONTENT__}
<div class="radioResult">
	<div class="radio"><img src="{__STATIC_URL__}/public/yiyuan/images/radio.jpg" alt=""></div>
	<div class="tip">
		<a href="">恭喜<span class="user">xxx</span>获得cxxxxcvxvcxcv</a>
	</div>
</div>

<div class="hotProitem clearfix">
	<div class="title">
		<a href="#" class="over hotbtn">立即揭晓</a>
		<a href="#" class="hotbtn">人气</a>
		<a href="#" class="hotbtn">最新<div id="hotTipC"></div></a>
		<a href="#" class="hotbtn" style="background-image: url({__STATIC_URL__}/public/yiyuan/images/indexsort.jpg)">总需人次</a>
	</div>
	<div id="mainContianer" class="clearfix">
	</div>
</div>
<?php include $this->tpl('yiyuan:public/footerNav.php') ?>
<script src="{__STATIC_URL__}/public/yiyuan/swipe.min.js"></script>
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
				var canBuy=$this.data('can');
				if(canBuy=='0') return;
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
							//app.alert('提示','网络超时,请重试！');
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
		<?php if(!empty($hit)){?>
			//广播
			var $radioContainer=$('.radioResult .tip');
			var arrRadio=[];
			<?php foreach ($hit as $k=>$v):?>
			arrRadio.push('<a href="/yiyuan/ShopGoods/ProductPastDetails?term_id=<?=$v['id'];?>" style="top:0">恭喜<span class="user"><?=$v['hit_nick']?></span>获得<?=$v['goods_title']?></a>');
			<?php endforeach;?>
			var arrRadioC=arrRadio.length;
			$radioIndex=0;
			$radioContainer.html(arrRadio[$radioIndex]);
			setInterval(function(){
				$radioIndex++;
				if($radioIndex>=arrRadioC){
					$radioIndex=0;
				}
				setTimeout(function(){
					$radioContainer.find('a').css('top','-30px');
					setTimeout(function(){
						$radioContainer.html(arrRadio[$radioIndex]);
					},2000)
				},300);
			},4000);
		<?php }?>
		//翻页
		function doPage(loadendDo){
					var urlPageList='/yiyuan/index?t=1';
					var $container=$('#mainContianer');
					var currentType=1;
					$btns=$('.hotbtn');
					$btns.click(function(e){
						e.preventDefault();
						var $this=$(this);
						var type=$this.index()+1;
						if(type!=4&&currentType==type) return;
						if(currentType==5){
							$btns.eq(3).removeClass('over');
						}else{
							$btns.eq(currentType-1).removeClass('over');
						}
						if(type==4){
							if(currentType==4) type=5;
							if(currentType==5) type=4;
						}
						currentType=type;
						if(currentType==5){
							$btns.eq(3).addClass('over');
						}else{
							$btns.eq(currentType-1).addClass('over');
						}
						if(currentType==4) $btns.eq(3).css('background-image','url({__STATIC_URL__}/public/yiyuan/images/indexsort.jpg)');
						if(currentType==5) $btns.eq(3).css('background-image','url({__STATIC_URL__}/public/yiyuan/images/indexsort-2.jpg)');
						urlPageList='/yiyuan/index?t='+currentType;
						currentPage=1;
						$container.empty();
						loadList(currentPage);
						isLoadList=true;
						isPageEnd=false;
					})
					$window=$(window);
					//设置$body的高度和宽度
					$body=$("body");
					$body.width($window.width()-5);
					$body.height($window.height());
					var BBL=BOBOLIB_fun().init($,this,$window,$body);
					var app=new MainApp(BBL);
					var currentPage=0;
					function showAppWait(){ //节点后面加一个加载的动画条
						var $wait=app.popupWait(3,2,$container);
						$wait.css('display','block');
					    $wait.css('width','10px');
					    $wait.css('margin','25px auto');
					}
					//翻页
					var currentPage=0;
					function loadList(page){
						isLoadList=true;
						showAppWait();
						currentPage=page;
						url=urlPageList;
						$.ajax({
							url:url,
							data:{page_no:page},
							success: function(data){
								app.close();
								isLoadList=false;
								var toData={};
								try{
									toData=$.parseJSON(data);
								}catch(e){

								}
								if(toData.error){
									if(toData.end){
										isPageEnd=true;
										return;
									}
									if(toData.msg!='') app.alert('提示',toData.msg);
									return;
								}
								//console.log(data);
								var $data=$(data);
								$data.find('.progress-bar').each(function(){
									var $this=$(this);
									var width=parseInt($this.attr('data-to'))+"%";
									$this.css('width',width);
								});
								if(loadendDo) loadendDo($data);
								$container.append($data);
							},
							error:function(){
								app.close();
////								app.alert('提示','网络超时,请重试！');
								isLoadList=false;
							}
						});
					}
					loadList(1);
					var isLoadList=true;
					var isPageEnd=false;
					//滚动条是否滚到底部
					window.onscroll=function(){
						//变量t就是滚动条滚动时，到顶部的距离
						var windowScrollEndy=document.documentElement.scrollHeight||document.body.scrollHeight;
						windowScrollEndy-=30;
						var viewHeight=document.documentElement.clientHeight||document.body.clientHeight;
						var t =document.documentElement.scrollTop||document.body.scrollTop;
						t+=viewHeight;
						if( t >=windowScrollEndy) {
							if(isPageEnd) app.close();
							if(isLoadList||isPageEnd){
								return;
							}
							loadList(currentPage+1);
						}
					}
					return [BBL,app];
				}
		doPage(function($data){
			initBuyToCart($data);
		});
	});
</script>
</body>
<?php include $this->tpl('yiyuan:public/qrcode.php')  ?>

</html>