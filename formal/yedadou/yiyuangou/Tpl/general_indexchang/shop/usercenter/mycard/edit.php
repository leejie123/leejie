<?php include $this->tpl('shop:public/html_header.php') ?>
		<style type="text/css">
		body{
			font-size: 14px;
		}
		.cart-container{
			margin: 10px 5px 20px 5px;
		}
		.item {
		    border-radius: 5px;
		    -webkit-border-radius: 5px;
		    -moz-border-radius: 5px;
		    margin: 0;
		    padding: 2px;
		}
		.carousel-inner {
		    width: 90%;
		    overflow: hidden;
		    border: 1px solid #ddd;
		    border-radius: 4px;
		    margin: 0 auto;
		}
		.tip{
			color: #f00;
		}
		.carousel-inner .item img {
		      width: auto;
		    max-height: 300px;
		    margin: 0 auto;
		}
		</style>
		<script>
		function TouchAndMouseStartMoveEnd($target,onOff,funStart,funMove,funEnd){function cssStrToNum(str){var num=parseInt(str);if(!num){return 0}return num}var _THIS=this;var _$obj=$target;var _onOff=onOff||3;var _obj=_$obj.get(0);var _funStart=funStart||function(a){};var _funMove=funMove||function(a,b,c,d,e,f){};var _funEnd=funEnd||function(a){};var _startX=null;var _startY=null;var _moveEndX=null;var _moveEndY=null;var _touchObjPointX=null;var _touchObjPointY=null;var _currentX=null;var _currentY=null;var _isOpStart=true;var _isStart=false;var _fun_touchstart=function(event){if(event.targetTouches.length==1){var touch=event.targetTouches[0];_currentX=touch.pageX;_currentY=touch.pageY;_startX=touch.pageX;_startY=touch.pageY;_touchObjPointX=touch.pageX-cssStrToNum(_$obj.css("left"));_touchObjPointY=touch.pageY-cssStrToNum(_$obj.css("top"));_isStart=true;_funStart(_THIS)}};var _fun_touchend=function(event){var dx=0;var dy=0;if(_moveEndX!=null){dx=_moveEndX-_startX}if(_moveEndY!=null){dy=_moveEndY-_startY}_startX=_startY=null;_isStart=false;_moveEndX=null;_moveEndY=null;_funEnd(_THIS,dx,dy)};var _fun_touchmove=function(event){if(!_isOpStart){return}if(!_isStart){return}if(event.targetTouches.length==1){event.preventDefault();var touch=event.targetTouches[0];var left=(touch.pageX-_touchObjPointX);var top=(touch.pageY-_touchObjPointY);_currentX=touch.pageX;_currentY=touch.pageY;_moveEndX=touch.pageX;_moveEndY=touch.pageY;_funMove(_THIS,touch.pageX,touch.pageY,left,top,touch)}};if(_onOff==1||_onOff==3){_obj.addEventListener("touchstart",_fun_touchstart,false);_obj.addEventListener("touchend",_fun_touchend,false);_obj.addEventListener("touchmove",_fun_touchmove,false)}if(_onOff==2||_onOff==3){_$obj.mousedown(function(e){e.preventDefault();_isStart=true;_startX=e.pageX;_startY=e.pageY;_currentX=e.pageX;_currentY=e.pageY;_touchObjPointX=_startX-cssStrToNum(_$obj.css("left"));_touchObjPointY=_startY-cssStrToNum(_$obj.css("top"));_funStart(_THIS)});_$obj.mouseup(function(e){e.preventDefault();_startX=_startY=null;_isStart=false;var dx=0;var dy=0;if(_moveEndX!=null){dx=_moveEndX-_startX}if(_moveEndY!=null){dy=_moveEndY-_startY}_moveEndX=null;_moveEndY=null;_funEnd(_THIS,dx,dy)});_$obj.mousemove(function(e){e.preventDefault();if(!_isOpStart){return}if(!_isStart){return}var touch=e;_moveEndX=touch.pageX;_moveEndY=touch.pageY;_currentX=touch.pageX;_currentY=touch.pageY;var left=(touch.pageX-_touchObjPointX);var top=(touch.pageY-_touchObjPointY);_funMove(_THIS,e.pageX,e.pageX,left,top,touch)})}this.getTouchTargetXDistance=function(){return _touchObjPointX};this.getTouchTargetYDistance=function(){return _touchObjPointY};this.getStartX=function(){return _startX};this.getStartY=function(){return _startY};this.getCurrentTouchX=function(){return _currentX};this.getCurrentTouchY=function(){return _currentY};this.getTarget=function(){return _$obj};this.stopOp=function(isStart){_isOpStart=isStart};this.remove=function(){this.stopOp();if(_obj){_obj.removeEventListener("touchstart",_fun_touchstart,false);_obj.removeEventListener("touchend",_fun_touchend,false);_obj.removeEventListener("touchmove",_fun_touchmove,false)}}};
		$(function() {
			var currentIndex=1;
			var currentIndexCount=<?=$myCardTempletCount?>;
			var $currentindex=$("#currentindex");
			var $itemData=$(".carousel-inner .item");
			function setCurrentIndex(){
				var v=$itemData.eq(currentIndex-1).data('id');
				$currentindex.val(v);
			}
			//
			var $setT=$("#setT");
			var isV=false;
			$("#optionsRadios1").click(function(){
				isV=!isV;
				if(isV){
					$setT.show();
				}else{
					$setT.hide();
				}
			});
			function goR(){
				currentIndex--;
					if(currentIndex<=0){
						currentIndex=currentIndexCount;
					//	return;
					}
					setCurrentIndex();
					$("#image-list").carousel('prev');
			}
			function goL(){
				currentIndex++;
					if(currentIndex>currentIndexCount){
						currentIndex=1;
						//return;
					}
					setCurrentIndex();
					$("#image-list").carousel('next');
			}
			var $window=$('.cart-container');
			new TouchAndMouseStartMoveEnd($window,1,function(THIS){
			},function(THIS,touch_pageX,touch_pageX,left,top,touch){
			},function(THIS,dx,dy){
				//console.log("end ");
				if(dx>0){
					//console.log("right");
					goR();
				}else{
					//console.log("left");
					goL();
				}
			});
			$('#tipBtnLeft').click(function(){
				goL();
			});
			$('#tipBtnRight').click(function(){
				goR();
			});
			
		});
	</script>
		<title>新建名片</title>
	</head>

	<body id="touchArea">
		<div class="wrapper">
			<?php include $this->tpl('shop:public/header.php') ?>
			<!--我的推广容器-->
			<div class="cart-container">
					<div class="cart-not-empty">
						<div id="cartList" class="cart-list-container">
							<div class="image-list">
				<div id="image-list" class="carousel slide" data-ride="carousel" data-interval="false">
				<div class="carousel-inner" role="listbox">
						<?php $tem='';?>
						<?php if(!$isEmpty):?>
						<?php foreach ($myCardTemplet as $arr):?>
						<div data-id="<?=$arr['id']?>" class="item <?php if($tem==''){
							echo 'active';
							$tem=$arr['id'];
						}
						
						?>">
							<img src="<?=$arr['tpl_url']?>" alt="" height="150">
							<div class="carousel-caption"></div>
						</div>
						<?php endforeach?>
						<?php endif?>
													
				</div>
				</div>
			</div>
							
							
						</div>
					</div>
			</div>
			<i id="tipBtnRight" class="fa fa-chevron-right color-yellow" style="
    position: fixed;
    right: 10px;
    font-size: 80px;
    top: 26%;
    width: 50px;
    height: 200px;
"></i>
<i id="tipBtnLeft" class="fa fa-chevron-left color-yellow" style="
    position: fixed;
    left: 10px;
    font-size: 80px;
    top: 26%;
    width: 50px;
    height: 200px;
"></i>
			<div class="tip text-center">* 左右划动可以设置</p>
			<div class="buttons center">
				<form action="/shop/UserCenter/MyCard/update" method="post">
				   <input type="hidden" name="currentindex" id="currentindex" value="<?=$tem?>">
				   <p>自定义推广语: <input type="text" name="promotion_text" id="promotion_text" value=""></p>
				   <div class="form-group">
				  	 <button type="submit" class="button-yellow button-large">确定</button>
				  	</div>
				</form>
				
			</div>
		</div>
		<?php include $this->tpl('shop:public/footer.php') ?>
	</body>

</html>