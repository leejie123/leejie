<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>商品详情</title>
<link href="http://static.yedadou.com/public/yiyuan/css/productDetails.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="slider-box">
		<div id="slider" class="swipe">
			<div class="swipe-wrap" id="swipe-wrap">
		    <?php if(!empty($img_list)){
			 foreach ($img_list as $key=>$value):
			?>	
				<div>
					<a href="#" target="_blank">
						<img alt="<?php echo val($data, 'title', '')?>" src="<?php echo $value;?>">
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
	</div>
<div id="mainContianer">
	<div class="row title"><?php echo val($data, 'title', '')?></div>
	<div class="price">期号：<?php echo val($term,'term', 1);?>
		<div style="    float: right;width: 200px;text-align: right;padding-right: 5px;">价值：<span class="blue"><?php echo round(val($data, 'price', 0))?></span></div>
	</div>
    <div class="clearfix">
    	<div class="shareBtn"><i class="yiyuan-icon">&#xe80c;</i>分享</div>
    	<div class="progressContainer">
    		<div class="progress">
		      <div class="progress-bar" data-to="<?=(val($term,'buy_num',0)*100/val($term, 'code_num', 1));?>"></div>
		    </div>
		    <div class="row clearfix">
		    	<div class="col3 states"><span class="blue"><?php echo val($term, 'buy_num', 0);?></span><br>已参与</div>
		    	<div class="col3 states"><span class="blue"><?php echo val($term, 'code_num', 0)?></span><br>总需</div>
		    	<div class="col3 states"><span class="red1"><?php echo val($term,'last_num', 0);?></span><br>剩余</div>
		    </div>
    	</div>
	</div>
  <?php if(val($term,'status')==3){?>
	<div class="hitUser">
    	<div class="tip">获奖</div>
    	<div class="userinfo">
    <?php
        preg_match('/http\:\/\/avatar.www.qzone.cc/', $term['hit_avatar'], $pic);
        $avatar = '{__STATIC_URL__}/public/images/default_user.gif'; 
        if(!empty($term['hit_avatar'])) {
            if(!empty($pic)) {
                $avatar = $term['hit_avatar'];
            }else{
                $avatar = substr($term['hit_avatar'],0,strlen($term['hit_avatar'])-1).'46';
            }
        }
    ?>
    		 <div class="userico" style="background-image: url(<?php echo $avatar;?>)"></div> 
    		<div class="list">
    			<div class="info1">获奖者：<span class="blue"><?php echo val($term,'hit_nick', '');?></span><?php if(!empty($term['province'])){?>（<?=val($term,'province','');?> <?=val($term,'city','');?>）<?php } ?></div>
    			<div class="info1">用户ID：<?php echo val($term,'hit_uid', '');?></div>
    			<div class="info1">本期参与：<?php echo val($term,'hit_buy_num', '');?>人次</div>
    			<div class="info1">揭晓时间：<?php if(!empty($term['hit_time'])){ echo date('Y-m-d H:i:s',$term['hit_time']);}else{ echo '';}?></div>
    		</div>
    	</div>
    	<div class="code">幸运号码：<?php echo val($term,'hit_code', '');?><a href="/yiyuan/ShopGoods/log?term_id=<?=$term['id']?>&goods_id=<?=$term['goods_id']?>" target="_self" class="logdetail">查看计算详情</a></div>
    </div>
   <?php if(!empty($term['ing'])){?>
    <div class="goRunning">
   		<a class="link" href="/yiyuan/ShopGoods/ProductDetails?id=<?php echo val($term,'goods_id', 0);?>&term_id=<?php echo val($term['ing'],'id', 0);?>">查看详情</a><div class="tip">第<?php echo val($term['ing'],'term', '');?>期 正在运行中...</div>
    </div>
   <?php }?>
  <?php }?>
	<?php if(val($term,'interval_time')>0){ ?>
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
	    if(d!=0) document.getElementById("t_d").innerHTML = d + "天";
	    document.getElementById("t_h").innerHTML = h + "时";
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
	<nav class="menu clearfix">
		<a href="/yiyuan/ShopGoods/ProductDetails?act=detail&goods_id=<?php echo val($data, 'id', 0)?>">图文详情<div class="arrow-right"></div></a>
		<a href="/yiyuan/ShopGoods/ProductPastTimes?goods_id=<?php echo val($data, 'id', 0)?>">往期揭晓<div class="arrow-right"></div></a>
		<a href="/yiyuan/UserCenter/ShareOrder?goods_id=<?php echo val($data, 'id', 0)?>" >晒单分享<div class="arrow-right"></div></a>
	</nav>
	<div id="timeline-container" class="timeline-container clearfix">
		
	</div>
	<div style="height: 40px;"></div>
</div>
<?php if(val($term,'status')==1){?>
<nav id="menu" class="row clearfix">
		<a href="/yiyuan/cart/index/add?goods_id=<?php echo val($data, 'id', 0)?>&spec=<?php echo val($term, 'id', 0)?>" class="col2 select">立即参与</a>
		<a id="btnAddCart" href="#" class="col2">加入购物车</a>
</nav>
<?php include $this->tpl('yiyuan:public/topNavCenter.php') ?>
<?php }else{ ?>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
<?php } ?>
<script src="http://static.yedadou.com/public/yiyuan/swipe.min.js"></script>
<script type="text/javascript" src="http://static.yedadou.com/public/yiyuan/dopage.js"></script>
<script>
	$(function(){
		var urlPageList='/yiyuan/ShopGoods/ProductBuyer?term_id=<?=$term_id?>';
		var $container=$('#timeline-container');
		doPage(urlPageList,$container);
		//
		$window=$(window);
		//设置$body的高度和宽度
		$body=$("body");
		//$body.width($window.width()-10);
		$body.height($window.height());
		var BBL=BOBOLIB_fun().init($,this,$window,$body);
		var app=new MainApp(BBL);
		//弹出分享提示图片
		$('.shareBtn').click(function(){
			var strDiv=$('<div><img src="http://static.yedadou.com/public/yiyuan/images/sharetip.png" alt="点击右上角【发送给朋友】或【分享到朋友圈】" width="90%"></div>');
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
					app.alert('提示','网络超时,请重试！');
				}
			});
		});
	});
</script>
</body>
</html>
