<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<link rel="stylesheet" href="{__STATIC_URL__}/public/??front/default/css/address.css,yiyuan/css/pub.css,yiyuan/new2016/plugin/Slider/css/iSlider.css,yiyuan/new2016/css/mycard1.css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />

<?php 
	$myCardTempletCount=0;
	if(!$isEmpty){
		$myCardTempletCount=count($myCardTemplet);
	}
	?>
<?php if(!$isEmpty||$myCardTempletCount>1){  //如果为空，或者为1，不需要js?>
<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/new2016/plugin/Slider/js/??iSlider.js,iSlider.animate.js"></script>
<?php } ?>
		<style type="text/css">
		body{
			font-size: 14px;
		}
		</style>
		<title>新建名片</title>
	</head>
	<body>
	<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
	<!-- <div id="slider">
	<?php 
	$currentindex='';
	if($myCardTempletCount==1){
		$currentindex=$myCardTemplet[0]['id'];
		?>
		<div class="ui-slider-item" style="width: 107px; position: absolute; transform: translate3d(107px, 0px, 0px); z-index: 899; height: 150px;"><a href="#"><img src="<?=$myCardTemplet[0]['tpl_url']?>"></a><p>1</p></div>
	<?php } ?>
	</div> -->
	<div id="iSlider-wrapper" style="perspective:200px!important"></div>

	<div class="tip text-center">
	<p style="height;18px;line-height:18px;margin:8px 18px;text-align:left;margin-bottom:18px;"> <?php if(!$isEmpty){ ?>备注：左右滑动可设置 <?php }else{ ?>没有找到<?php } ?></p>
		<div class="buttons center">
			<form action="/yiyuan/UserCenter/MyCard/update" method="post">
			   <input type="hidden" name="currentindex" id="currentindex" value="<?=$currentindex?>">
			   <input type="hidden" name="promotion_text" id="promotion_text" value="">
			   <?php if(!$isEmpty){ ?> <button type="submit" class="cus-btn-red cus-btn cus-btn-lg" style="width:150px;">确定</button> <?php } ?>
			</form>
		</div>
	</div>
	<?php include $this->tpl('yiyuan:public/footer.php') ?>
	<?php if(!$isEmpty||$myCardTempletCount>1){  //如果为空，或者为1，不需要js?>
	<script>
		$(function(){
			var $currentindex=$('#currentindex');
			var content=[];
			<?php 
				$tem='';
				if(!$isEmpty){
					$index=0;
					
					foreach ($myCardTemplet as $arr){ 
						$index++;
						if($index==2){ ?>
							$currentindex.val(<?=$arr['id']?>);
						<?php } ?>
						content.push({
							// content:"<?=$arr['tpl_url']?>",
							content:"<div data-id='<?=$arr['id']?>' style='background-image:url(<?=$arr['tpl_url']?>)' class='card-item'></div>",
						});
					<?php }
				} ?>
				
		    var slider = new iSlider(document.getElementById('iSlider-wrapper'), content, {
		        animateType: 'flow',	
		        isLooping: 1,
		        isOverspread: 1,
		        isAutoplay: false,
		        animateTime: 800,
		    });
		    var contentC=content.length;
		   	slider.on('slideChanged', function(o, index) {
		   		var id = $(index).find('div').data('id');
		    	$currentindex.val(id);
		   	})
		});
	</script>
	<?php } ?>
	</body>

</html>