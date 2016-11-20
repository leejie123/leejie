<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<meta content="" name="Copyright" />
<meta content="" name="Keywords">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<link href="{__STATIC_URL__}/public/??yiyuan/css/normalize.css,yiyuan/css/pub.css,yiyuan/ui/boboui.css,yiyuan/pintuan/public.css,yiyuan/css/ico.css?v=201512163" rel="stylesheet" type="text/css" />
		<script src="{__STATIC_URL__}/public/??yiyuan/zepto.min.js,yiyuan/touch_and_fx.js,yiyuan/boboweb.js,yiyuan/ui/boboui.js"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<style type="text/css">
		.winner:after {
        content: '';
        position: absolute;
        display: inline-block;
        top: -20px;
        left: 12px;
        width: 40px;
        height: 40px;
        transform: rotate(-9deg);
        background-image: url('{__STATIC_URL__}/public/front/default/images/demo/icon/queen.png');
        background-position: center center;
        background-size: 100%;
    }
    .caption{
        position: relative;
    }
    .caption:before {
        content: '';
        position: absolute;
        display: inline-block;
        z-index: 1000000000;
        top: -4px;
        left: -9px;
        transform: rotate(4deg);
        width: 18px;
        height: 18px;
        background-repeat: no-repeat;
        background-image: url('{__STATIC_URL__}/public/front/default/images/demo/icon/captain.png');
        background-position: center center;
        background-size: 100%;
    }
		</style>
		<?php 
		$public = $this->getPublic();
		$__wx_api_url__ = rtrim(\Lib\App\Config::get('wx_api_url'),'/');
		$__wx_api_url__ = str_replace('$APPID$',$public['public_id'],$__wx_api_url__);
		?>
		<?=isset($share_script) ? $share_script : '
<script src="'.$__wx_api_url__.'/getJsApiConfig?type=config&api_list=onMenuShareAppMessage,onMenuShareTimeline,onMenuShareQQ,onMenuShareWeibo,hideMenuItems"></script>
<script>
wx.ready(function(){

	wx.onMenuShareAppMessage(
    	{"title":document.title,"desc":"'.cur_url().'","link":"'.$base_share_url.'","imgUrl":"'.$this->getConfig('AppGlobalSetting.shopLogo').'"}
	);

	wx.onMenuShareTimeline(
    	{"title":document.title,"link":"'.$base_share_url.'","imgUrl":"'.$this->getConfig('AppGlobalSetting.shopLogo').'"}
	);

	wx.onMenuShareQQ(
    	{"title":document.title,"link":"'.$base_share_url.'","imgUrl":"'.$this->getConfig('AppGlobalSetting.shopLogo').'"}
	);

	wx.onMenuShareWeibo(
    	{"title":document.title,"link":"'.$base_share_url.'","imgUrl":"'.$this->getConfig('AppGlobalSetting.shopLogo').'"}
	);
	wx.hideMenuItems({
	    menuList: ["menuItem:originPage","menuItem:openWithQQBrowser","menuItem:openWithSafari","menuItem:share:email","menuItem:readMode"]
	    // success: function (res) {
	    //     alert("已隐藏");
	    //   },
	    //   fail: function (res) {
	    //     alert(JSON.stringify(res));
	    //   }
	});

});
</script>
'?>
