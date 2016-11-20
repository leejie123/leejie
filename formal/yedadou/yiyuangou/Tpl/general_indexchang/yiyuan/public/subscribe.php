<?php if($is_subscribe!=1){ ?>
<style type="text/css">
	#chkInWiexin{
		height: 50px;
	    color: #ffffff;
	    width: 100%;
	    padding: 8px 30px;
	    background-color: rgba(0,0,0,0.5);
	    font-size: 12px;
	    position: fixed;
	    z-index: 1000;
	    top: -1px;
	}
	#chkInWiexin>div{
		color: #eee;
		text-align: center;
		padding-top: 20px;
		padding-left:10px;
		font-size: 14px;
	}
	#chkInWiexin>button{
		float: right;
	    display: block;
	    height: 35px;
	    width: 90px;
	    font-size: 14px;
	    border-radius: 3px;
	    border: 1px solid #00AC00;
	    padding: 5px;
	    margin-right: 40px;
	    margin-top: 8px;
	    background: #00AC00;
	}
	#chkInWiexin .userico{
		position: absolute;
	    height: 45px;
	    width: auto;
	    left: -5px;
	    top: -5px;
	}
</style>
<div id="chkInWiexin" class="clearfix"><button id="shareweixin">点击关注</button><div>关注送积分，免费抽取6S</div></div>
<script type="text/javascript">
$(function(){
		var $body=$('body');
		$('#shareweixin').click(function(){
			<?php if($shareBtnType=='2'){ ?>
				window.location.href="<?=$shareweixinUrl?>";
			<?php }else{ ?>
            var BL=BOBOLIB_fun().init($,this,$(window),$body);
            $body.css('width','auto');
            var lockLayout=new BL.BPopup($body,{
                lockLayerColor : "#000",
                lockLayerAlpha : .8,
                cssPosition:'fixed'
            });
            var strDiv=$('<div></div>');
            var img=$('<img src="<?=$qrcode_url?>">');
            img.css('width','100%');
            img.css('margin','0px');
            img.css('padding','0px%');
//		    	img.css('margin-top','14.8%');
//		    	img.css('margin-left','11%');
            strDiv.append(img);
//				strDiv.css('background-repeat','no-repeat');
//				strDiv.css('background-position','left top');
//				strDiv.css('background-size','100% auto');
//				strDiv.css('background-image','url({__STATIC_URL__}/public/yiyuan/images/qr1.png)');
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
<!--客服插件-->
<?=$plugin;?>
