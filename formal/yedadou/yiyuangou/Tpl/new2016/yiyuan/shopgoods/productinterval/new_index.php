<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>最新揭晓</title>
<!-- <link href="{__STATIC_URL__}/public/yiyuan/css/binggoList_new.css" rel="stylesheet" type="text/css" /> -->
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/binggoList_new1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.tuan-container{
	position: absolute;
}
.tuan{
    font-size: 15px;
    color: #fff;
    padding: 2px;
    padding-right: 5px;
    width: 22px;
    text-align: center;
    opacity: 0.9;
    position: absolute;
    top: -10px;
    left: -20px;
    width: 50px;
    height: 50px;
    background-repeat: no-repeat;
    background-size: 80% auto;
}
.proItem .tipterm {
	background-color: rgba(0,0,0,.65)
}
</style>
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<?php //include $this->tpl('yiyuan:public/header.php') ?>
<div id="container" class="clearfix">
</div>
<?php //include $this->tpl('yiyuan:public/footer.php') ?>
<?php include $this->tpl('yiyuan:public/footerNav.php') ?>

<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script type="text/javascript">
	$(function(){
		var urlPageList='/yiyuan/ShopGoods/ProductInterval';
		var $container=$('#container');
		var t1=new Date('<?=$time_now?>');
		var t2=new Date();
		var nowTimeOffset=t1.getTime()-t2.getTime();
		var arrTimeTips=[];
		doPage(urlPageList,$container,function($data){
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
		}, <?=$hit_time?>);//end doPage

	});
</script>

</body>
</html>

