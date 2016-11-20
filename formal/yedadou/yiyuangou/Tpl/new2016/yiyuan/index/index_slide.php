<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<script type="text/javascript">
$(function(){
	$window=$(window);
	$body=$("body");
	$body.width($window.width());
	$body.height($window.height());
	$body.width($window.width());
	var BBL=BOBOLIB_fun().init($,this,$window,$body);
	var B=BBL;
	var slidWidth=$window.width();
	var slideHeight=$window.height();
	var imgUrl="<?=val($slidedata,0,['pic_url'=>''])['pic_url']?>";
	if(imgUrl!=''){
		BBL.Utility.imgReady(imgUrl, function () {
			var imgWH=this.width/this.height;
			var imgW=slidWidth;//slideHeight*imgWH;
			var imgH=slideHeight;
			var arrImges=[
				<?php 
					$iTem=0;
					foreach ($slidedata as $key => $value) {
						if($iTem!=0) echo ',';
						$iTem++;
						echo '{'."\n";
							echo 'url:"'.$value['pic_url'].'",'."\n";
							echo 'width:imgW,'."\n";
							echo 'height:imgH'."\n";
						echo '}'."\n";
					}
				?>
		  ];
		  
			layoutType=3;
			var slid=new BBL.BSlide(arrImges,slidWidth,slideHeight,null,layoutType);
			$body.append(slid.$target);
			slid.$target.css('position','absolute');
			new B.TouchAndMouseStartMoveEnd($body,3,function(o){
			},function(o,touch_pageX,touch_pageX,left,top,touch){
			},function(o,dx,dy){
				if(dy>0){
					B.debug('swipeDown');
					var isOk=slid.pre(function(objThis,endDo){
						var $target=objThis.$slideContent;
						var toy=B.Utility.cssStrToNum($target.css('top'))+slideHeight;
						$target.animate({'top':toy},600,'ease-out',function(){
							endDo();
						});
					});
				}else if(dy<0){
					B.debug('swipeUp');
					var isOk=slid.next(function(objThis,endDo){
						var $target=objThis.$slideContent;
						var toy=B.Utility.cssStrToNum($target.css('top'))-slideHeight;
						$target.animate({'top':toy},600,'ease-out',function(){
							endDo();
						});
					});
				}
			});
			//
	 });
	 //
	}
	$tip=$("<a href=\"/yiyuan/ShopGoods/ProductList\" class=\"button orange medium\" style=\"position: fixed;bottom: 0px;padding: 5px; z-index: 10000;text-align: center;display: block;background-color: #fff;width: 100%;font-size: 25px;font-weight: bold;color: #525252;\">点击进入</a>");
	B.Utility.Css3SetShowAlpha($tip,0.8);
	$body.append($tip);
});
</script>
<title>一元购</title>
</head>
<body ontouchmove="event.preventDefault()">

</body>
</html>