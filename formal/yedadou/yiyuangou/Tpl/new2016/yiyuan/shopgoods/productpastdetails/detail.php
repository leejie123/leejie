<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>商品详情</title>
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/??productDetails1.css,productpastdetails.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div class="slider-box" style="position:relative;">
		<div id="slider" class="swipe"  style="height:176px;">
			<div class="swipe-wrap" id="swipe-wrap">
		    <?php if(!empty($img_list)){
			 foreach ($img_list as $key=>$value):
			?>
				<div>
					<a href="#" target="_blank"style="style=width:100%;height:176px;background:url(<?php echo $value;?>) no-repeat;background-size:cover;background-position:center;">
						<!-- <img  style="height:300px;" alt="<?php echo val($data, 'title', '')?>" src="<?php echo $value;?>"> -->
					</a>
			    </div>
			<?php endforeach;?>
			<?php }?>
			</div>
		</div>
		<ul id="slidePosition">
		<?php if(!empty($img_list)){
		$index=0;
		 foreach ($img_list as $key=>$value){
		 	$index++;
		?>
			<?php if($index>0){ ?>
				<li <?php if($index==1){ ?>class="on"<?php } ?>></li>
			<?php } ?>
		<?php }?>
		<?php }?>
		</ul>
    	<!-- <div class="shareBtn"><i></i></div> -->
	</div>
<div id="mainContianer">
	<div style="padding: 18px;padding-bottom:0px;background-color: #fff;margin-bottom: 8px;padding-top: 8px;">
		<div class="row title">
    		<div class="shareBtn"><i></i></div>
			<div style="margin-right:40px;"><?php echo val($data, 'title', '')?></div>
		</div>
		<div class="price">期号：<?php echo val($term,'term', 1);?>
			<div style="float: right;width: 200px;text-align: right;padding-right: 5px;">价值：<span class="blue"><?php echo round(val($data, 'price', 0))?></span></div>
		</div>
	    <div class="clearfix">
	    	<div class="progressContainer">
	    		<div class="progress">
			      <div class="progress-bar" data-to="<?=(val($term,'buy_num',0)*100/val($term, 'code_num', 1));?>"></div>
			    </div>
			    <div class="row clearfix" style="line-height:10px;">
			    	<div class="col3 states">
						<span>
			    			<span class=""><?php echo val($term, 'buy_num', 0);?></span>参与人数</div>
						</span>
			    	<div class="col3 states">
						<span>
			    			<span class=""><?php echo val($term, 'code_num', 0)?></span>总需人数</div>
						</span>
			    	<div class="col3 states">
						<span>
			    			<span class="blue"><?php echo val($term,'last_num', 0);?></span>剩余机会</div>
						</span>
			    </div>
	    	</div>
		</div>
	</div>
  <?php if(val($term,'status')==3){?>
	<div class="hitUser">
    	<div class="code">幸运号码：<span style="font-size:16px;"><?php echo val($term,'hit_code', '');?></span><a href="/yiyuan/ShopGoods/log?term_id=<?=$term['id']?>&goods_id=<?=$term['goods_id']?>" target="_self" class="logdetail">查看计算详情</a></div>
    	<!-- <div class="tip">获奖</div> -->
    	<div class="userinfo">
    <?php
        preg_match('/http\:\/\/ydd.img.yedadou.com/', $term['hit_avatar'], $pic);
        $avatar = '{__STATIC_URL__}/public/images/default_user.gif';
        if(!empty($term['hit_avatar'])) {
            if(!empty($pic)) {
                $avatar = $term['hit_avatar'];
            }else{
                $avatar = substr($term['hit_avatar'],0,strlen($term['hit_avatar'])-1).'46';
            }
        }
    ?>
    <div class="win"></div>
    <div class="userico" style="background-image: url(<?php echo  $avatar;?>)"></div>
    		<div class="list">
    			<div class="info1">获 奖 者：<span class="blue"> <?php echo val($term,'hit_nick', '');?></span><?php if(!empty($term['province'])){?>（<?=val($term,'province','');?> <?=val($term,'city','');?>）<?php } ?></div>
    			<div class="info1">用 户 ID：<span style="color:#999"> <?php echo val($term,'hit_uid', '');?></span>	</div>
    			<div class="info1">本期参与：<span class="red1"> <?php echo val($term,'hit_buy_num', '');?></span>人次</div>
    			<div class="info1">揭晓时间：<span style="color:#999"> <?php if(!empty($term['hit_time'])){ echo date('Y-m-d H:i:s',$term['hit_time']);}else{ echo '';}?></span>	</div>
    		</div>
    	</div>
    </div>
  <?php }?>
    <?php
    //立即揭晓倒计时
    $isShowTime=true;
    $end_time=val($term,'end_time', 0);
    if($end_time<time()){
        $isShowTime=false;
    }
    if(!$end_time){
        $isShowTime=false;
    }
    if($end_time==0){
        $isShowTime=false;
    }
    if($isShowTime===true){ ?>
        <div class="remainingDate" id="getRTime">
            <span id="t_d"></span>
            <span id="t_h"></span>
            <span id="t_m"></span>
            <span id="t_s"></span>
        </div>
        <script type="text/javascript">
            var t1=new Date('<?=$time_now?>');
            var t2=new Date();
            var NowTimeOffset=t1.getTime()-t2.getTime();
            function getRTime(){
                var EndTime= new Date('<?=date('Y/m/d H:i:s',$end_time);?>');
                var NowTime=new Date().getTime()+NowTimeOffset;
                var t =EndTime.getTime() - NowTime;
                var m=Math.floor(t/1000/60%60);
                var s=Math.floor(t/1000%60);
                var ss=Math.floor(t%1000);
                if(m<0) m=0;
                if(s<0) s=0;
                if(ss<0) ss=0;
                document.getElementById("t_h").innerHTML ="距离本期开奖还有："+m + ":";
                if(s<0){
                    document.getElementById("t_m").innerHTML ="0"+s + ":";
                }else{
                    document.getElementById("t_m").innerHTML =s + ":";
                }
                if(ss<100){
                    document.getElementById("t_s").innerHTML = '0'+ss;
                }else{
                    document.getElementById("t_s").innerHTML = ss;
                }

                if(m==0&&s==0&&ss==0){
                    clearInterval(getRTimeIndex1);
                    document.getElementById("getRTime").innerHTML='请稍等正在开奖';
                    setTimeout(function(){
                        window.location.href='/yiyuan/ShopGoods/ProductPastTimes?goods_id=<?=val($term,'goods_id',0)?>';
                    },2000);
                }
            }
            var getRTimeIndex1=setInterval(getRTime,100);
        </script>
    <?php } ?>

    <?php if(!empty($term['ing'])){?>
        <div class="goRunning">
            <a class="link" href="/yiyuan/ShopGoods/ProductDetails?id=<?php echo val($term,'goods_id', 0);?>">查看详情</a><div class="tip">第<?php echo val($term['ing'],'term', '');?>期 正在运行中...</div>
        </div>
    <?php }?>
	<?php if(val($term,'interval_time')>0){ //定时揭晓倒计时?>
    <div class="remainingDate" id="getRTime">
		<span id="t_d"></span>
		<span id="t_h"></span>
		<span id="t_m"></span>
		<span id="t_s"></span>
	</div>
	<script type="text/javascript">
	function getRTime(){
	    var EndTime= new Date('<?=date('Y/m/d H:i:s',$term['interval_time']);?>');
	    var NowTime = new Date();
	    var t =EndTime.getTime() - NowTime.getTime();
	    var d=Math.floor(t/1000/60/60/24);
	    var h=Math.floor(t/1000/60/60%24);
	    var m=Math.floor(t/1000/60%60);
	    var s=Math.floor(t/1000%60);
	    if(d<0) d=0;
	    if(h<0) h=0;
	    if(m<0) m=0;
	    if(s<0) s=0;
		   if(d!=0){
	   	    	document.getElementById("t_d").innerHTML ="距离本期开奖还有："+d + "天";
	   	    	document.getElementById("t_h").innerHTML = h + "时";
	   	    }else{
	   	    	document.getElementById("t_h").innerHTML ="距离本期开奖还有："+h + "时";
	   	    }
	    document.getElementById("t_m").innerHTML = m + "分";
	    document.getElementById("t_s").innerHTML = s + "秒";
	    if(d==0&&h==0&&m==0&&s==0){
	    	clearInterval(getRTimeIndex);
	    	document.getElementById("getRTime").innerHTML='已结束';
	    }
	}
	var getRTimeIndex=setInterval(getRTime,1000);
	</script>
	<?php } ?>
    <?php if(!empty($shopOrder)){?>
        <div class="comment-container">
            <p style="font-size:14px;color: #333;margin-bottom:8px;">晒单评论</p>
            <div class="" id="comment1">
                <?php    foreach($shopOrder as $v){?>
                    <div class="items" data-id="<?php echo $v['id']?>" data-url="/yiyuan/UserCenter/ShareOrder?id=<?=val($v,'id','');?>">
                        <?php if(isset($v['avatar'])&&$v['avatar']!=''){ ?>
                            <img alt="Susan't Avatar" src="<?php $defaultAvatar = '{__STATIC_URL__}/public/images/default_user.gif'; echo !empty($v['avatar'])?substr($v['avatar'],0,strlen($v['avatar'])-1).'46':$defaultAvatar;?>" onClick="window.location.href='/yiyuan/ShopGoods/BuyRecord?buyer_id=<?=$v['uid']?>'">
                        <?php } ?>
                        <div class="left-item">
                            <p>
                                <span class="name"><?=val($v,'nick','');?></span>
                                <span class="num">期数：<?=val($v,'term','');?></span>
                                <span class="time"><?php echo val($v,'add_time','')?date('Y-m-d H:i:s',val($v,'add_time','')):'';?></span>
                            </p>
                            <p style="margin-bottom:8px;"><?=val($v,'content','');?></p>
                            <!--            <div>-->
                            <!--                --><?php //if(!empty($v['share_img'])){ $shareImg=explode(',', $v['share_img']);  foreach($shareImg as $v){?>
                            <!--                    <img src="--><?//=$v;?><!--" style="width:50px;height:50px;margin-right:8px;" alt="">-->
                            <!--                --><?php //}}?>
                            <!--            </div>-->
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="more1">
                <a id="more1" href="">更多晒单</a>
            </div>
        </div>
    <?php }?>

	<!-- <nav class="menu clearfix">
		<a href="/yiyuan/ShopGoods/ProductDetails?act=detail&goods_id=<?php echo val($data, 'id', 0)?>">图文详情<div class="arrow-right"></div></a>
		<a href="/yiyuan/ShopGoods/ProductPastTimes?goods_id=<?php echo val($data, 'id', 0)?>">往期揭晓<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/ShareOrder?goods_id=<?php echo val($data, 'id', 0)?>" >晒单分享<div class="arrow-right"></div></a>
	</nav> -->
	<nav class="menu clearfix" class="footer1">
		<a id="tab_before" href="/yiyuan/UserCenter/ShareOrder?goods_id=<?php echo val($data, 'id', 0)?>" >往期揭晓</a>
		<a id="tab_detail" href="/yiyuan/ShopGoods/ProductDetails?act=detail&goods_id=<?php echo val($data, 'id', 0)?>">图文详情</a>
		<a id="tab_record" class="active"  href="/yiyuan/ShopGoods/ProductPastTimes?goods_id=<?php echo val($data, 'id', 0)?>">参与记录</a>
		<!-- <a href="/yiyuan/UserCenter/ShareOrder?goods_id=<?php echo val($data, 'id', 0)?>" >晒单分享</a> -->
	</nav>
	<div id="timeline-container" class="timeline-container clearfix">

	</div>
	<div style="height: 40px;"></div>
</div>
<?php if(val($term,'status')==1){?>
<!-- <nav id="menu" class="row clearfix footer1">
		<a href="/yiyuan/cart/index/add?goods_id=<?php echo val($data, 'id', 0)?>&spec=<?php echo val($term, 'id', 0)?>" class="col2 select">立即参与</a>
		<a id="btnAddCart" href="#" class="col2">加入购物车</a>
</nav> -->
<nav id="menu" class="row clearfix footer1">
	<i onclick="window.location.href='/yiyuan/cart/index'"><em>11</em></i>
	<div>
		<!-- <a href="/yiyuan/cart/index/add?goods_id=5&amp;spec=35" class="col2 select">立即参与</a> -->
		<a href="/yiyuan/cart/index/add?goods_id=<?php echo val($data, 'id', 0)?>&spec=<?php echo val($term, 'id', 0)?>" class="col2 select">立即参与</a>
		<a id="btnAddCart" href="#" class="col2">加入购物车</a>
	</div>
</nav>
<?php } ?>
<script src="{__STATIC_URL__}/public/yiyuan/swipe.min.js"></script>
<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script>
	$(function(){
		// var urlPageList='/yiyuan/ShopGoods/ProductBuyer?term_id=<?=$term_id?>';
		// var $container=$('#timeline-container');
		// doPage(urlPageList,$container);
		//
		$window=$(window);
		//设置$body的高度和宽度
		$body=$("body");
		//$body.width($window.width()-10);
		$body.height($window.height());
		var BBL=BOBOLIB_fun().init($,this,$window,$body);
		var app=new MainApp(BBL);
		//弹出分享提示图片
		$("#tab_record").on('click', function(e)  {
			e.preventDefault();
			var urlPageList='/yiyuan/ShopGoods/ProductBuyer?term_id=<?=$term_id?>';
			var $container=$('#timeline-container');
			$('.menu > a').removeClass('active');
			$(this).addClass('active');
			$container.empty();
			doPage(urlPageList,$container);
		});
		$('#tab_record').click();

		$('.shareBtn').click(function(){
			var strDiv=$('<div id="shareBtnImg"><img src="{__STATIC_URL__}/public/yiyuan/new2016/images/share.png" alt="点击右上角【发送给朋友】或【分享到朋友圈】" width="90%"></div>');
			strDiv.css('text-align','right');
			var bimg=new BBL.BBase(strDiv,{dockType:9,resizeW:.9,resizeH:0.5,offsetX:0,offsetY:0,cssPosition:'fixed'});
			var lockDiv=app.popup(bimg);
			lockDiv=lockDiv.parent().find('#shareBtnImg').prev();
			lockDiv.width(lockDiv.width()+10);
			strDiv.click(function(){
				app.close();
			});
		});
		<?php if(!empty($img_list)){ ?>
		//幻灯
		var $dullets=$('#slidePosition>li');
		var slider=Swipe(document.getElementById('slider'), {
		    auto: 5000,
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
		//显示进度动画
		function animationProgress(){
			$('.progress-bar').each(function(){
				var $this=$(this);
				var width=parseInt($this.attr('data-to'));
				$this.css('width',width+"%");
			});
		}
		setTimeout(animationProgress,500);

		function showAppWait(){ //节点后面加一个加载的动画条
			var $wait=app.popupWait(3,2,$container);
			$wait.css('display','block');
		    $wait.css('width','10px');
		    $wait.css('margin','25px auto');
		}
		$('#btnAddCart').click(function(){
			app.popupWait();
			$.ajax({
				url:"/yiyuan/cart/index/add?goods_id=<?php echo val($data, 'id', 0)?>&spec=<?php echo val($term, 'id', 0)?>",
				type:'get',
				success: function(item) {
					app.close();
					item=$.parseJSON(item);
					if(item.success){
						if(item.success===true){
							app.confirm('提示','已成功加入购物车',function(index){
								if(index==0){
									window.location.href='/yiyuan/ShopGoods/ProductList';
								}else{
									window.location.href='/yiyuan/cart/index';
								}
							},'再逛一逛','查看购物车');
							return;
						}
					}
					if(item.msg){
						app.alert('提示',item.msg);
					}
				},
				error:function(){
					app.close();
					app.alert('提示','网络超时#1,请重试！');
				}
			});
		});

		$('#tab_detail').on('click', function(e) {
			e.preventDefault();
			$('.menu > a').removeClass('active');
			$(this).addClass('active');
			var $container = $('.timeline-container');
			$container.empty();
			// if (once) {
				$.ajax({
					url: "/yiyuan/ShopGoods/ProductDetails",
					data:{
						page_no:page,
						// nowtime:_time
						goods_id: <?php echo val($data, 'id', 0)?>,
						act: 'detail'
						
					},
					success: function(data){
						app.close();
						// once = false;
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
						// if(loadendDo) loadendDo(data);
						// 
						$container.append(data);
					},
					error:function(){
						app.close();
						//app.alert('提示','网络超时,请重试！');
						isLoadList=false;
					}
				});
			// }
		})
		$('#tab_before').on('click', function(e) {
			e.preventDefault();
			$('.menu > a').removeClass('active');
			$(this).addClass('active');
			$container = $('#timeline-container');
			$container.empty();
			// if (once) {
				$.ajax({
					url: "/yiyuan/ShopGoods/ProductPastTime",
					data:{
						// nowtime:_time
						goods_id: <?php echo val($data, 'id', 0)?>,
					},
					success: function(data){
						app.close();
						once = false;
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
						// if(loadendDo) loadendDo(data);
						$container.append(data);
					},
					error:function(){
						app.close();
						//app.alert('提示','网络超时,请重试！');
						isLoadList=false;
					}
				});
			// }
		})
		var page = 0;
		$('#more1').on('click', function(e) {
			e.preventDefault();
			page++;
			var $container = $('#comment1');
			var data_id = 0 || $('.items').data('id');
			$.ajax({
				url:'/yiyuan/ShopGoods/ShareOrder',
				data:{
					// page_no:page,
					// nowtime:_time
					goods_id: <?php echo val($data, 'id', 0)?>,
					page_no: page,
					data_id: data_id
				},
				success: function(data){
					console.log(data)
					app.close();
					isLoadList=false;
					var toData={};
					try{
						toData=$.parseJSON(data);
					}catch(e){
						
					}
					if (toData.end) {
						app.alert('提示',toData.msg);
						return;
					}
					if(toData.error){
						if(toData.end){
							isPageEnd=true;
							$('.comment-container').hide();
							return;
						}
						if(toData.msg!='') app.alert('提示',toData.msg);
						return;
					}
					$container.append(data)

					//console.log(data);
					// if(loadendDo) loadendDo(data);
				},
				error:function(){
					app.close();
					//app.alert('提示','网络超时,请重试！');
					isLoadList=false;
				}
			});
		})
	});
</script>
</body>
</html>