<?php
/**
 * Created by PhpStorm.
 * User: lait
 * Date: 2016/3/18
 * Time: 15:57
 */
$QrCode=val($_COOKIE,'QrCode','');

?>
<script type="text/javascript">
				$(function(){
					$body=$('body');
					$body.height($(window).height());

                    <?php if($is_subscribe!=1 && empty($QrCode)){ ?>
    //表示有收获地址则判断是否关注公众号了


    var $window=$(window);
    $body.height($window.height());
    $body.css('width','100%');
    var BL=BOBOLIB_fun().init($,this,$window,$body);
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
    //		    	    img.css('margin-top','14.8%');
    //		    	    img.css('margin-left','11%');
    strDiv.append(img);
    //				    strDiv.css('background-repeat','no-repeat');
    //				    strDiv.css('background-position','left top');
    //				    strDiv.css('background-size','100% auto');
    //			    	strDiv.css('background-image','url(http://static.yedadou.com/public/yiyuan/images/qr1.png)');
    strDiv.css('color','#fff');
    strDiv.css('font-size','16px');
    var bimg=new BL.BBase(strDiv,{dockType:9,resizeW:.9,resizeH:0.5,offsetX:0,offsetY:0,cssPosition:'fixed'});
    lockLayout.popup(bimg);
    strDiv.click(function(){
    lockLayout.reomveLockLayer();
    });




<?php cookie('QrCode','123');  } ?>
});
</script>
