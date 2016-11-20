<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<script src="{__STATIC_URL__}/public/??yiyuan/zepto.min.js"></script>
<script src="{__STATIC_URL__}/public/yiyuan/pintuan/Countdown.js"></script>

<script>
$(function(){
	var $container=$('body');
	var second=100,//剩余秒数
	doInterval=function(h,m,s,ms,obj){//回调
		$container.empty();//清空
		if(h<10) h='0'+h;
		if(m<10) m='0'+m;
		if(s<10) s='0'+s;
		$container.html(h+':'+m+':'+s+':'+ms); //显示
	}
	var cd=new BCountdown(second,doInterval);
	cd.start();//开始
});

</script>
	            </head>
	            <body>

	            </body>
</html>