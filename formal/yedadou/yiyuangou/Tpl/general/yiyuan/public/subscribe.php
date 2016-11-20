<?php if($is_subscribe!=1){ ?>
<?php if($parent==0){ ?>
<div id="chkInWiexin" class="clearfix"><button id="shareweixin">点击关注</button><div>您还没有关注哦~</div></div>
<?php }else{ ?>
	<div id="chkInWiexin" class="clearfix"><button id="shareweixin">点击关注</button><div><span class="red"><?=$parent_nick ?></span>给您推荐了“<?=$public_nick?>”</div>
		<div class="userico"><img src="<?=isset($shareweixinUserIcoUrl)?$shareweixinUserIcoUrl:'' ?>" style="width:45px;heigth:45px"></div>
	</div>
<?php } ?>
<script type="text/javascript">
$(function(){
		var $body=$('body');
		$('#shareweixin').click(function(){
			<?php if($shareBtnType=='2'){ ?>
				window.location.href="<?=$shareweixinUrl?>";
			<?php }else{ ?>
				var BL=BOBOLIB_fun().init($,this,$(window),$body);
				var lockLayout=new BL.BPopup($body,{ 
					lockLayerColor : "#000",
					lockLayerAlpha : .8,
					cssPosition:'fixed'
				});
				var strDiv=$('<div></div>');
				var img=$('<img src="<?=$qrcode_url?>">');
				img.css('width','60%');
		    	img.css('margin-top','14.8%');
		    	img.css('margin-left','18.5%');
		    	strDiv.append(img);
				strDiv.css('background-repeat','no-repeat');
				strDiv.css('background-position','left top');
				strDiv.css('background-size','100% auto');
				strDiv.css('background-image','url(http://static.yedadou.com/public/yiyuan/images/qr1.png)');
				strDiv.css('color','#fff');
				strDiv.css('font-size','16px');
				var bimg=new BL.BBase(strDiv,{dockType:9,resizeW:.9,resizeH:0.5,offsetX:0,offsetY:0,cssPosition:'fixed'});
				lockLayout.popup(bimg);
				strDiv.click(function(){
					lockLayout.reomveLockLayer();
				});
			<?php } ?>
		});
		
	});

</script>
<?php } ?>