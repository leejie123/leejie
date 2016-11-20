<!doctype html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<link rel="stylesheet" href="{__STATIC_URL__}/public/??css/bootstrap.min.css,css/font-awesome.min.css,front/default/css/public/public.css" />
		<script>
			//设置全居变量：未购买能否分享，是否关注，是否是分享客
			window.canShare=<?php echo !empty($footerConfig[7]) ? $footerConfig[7] :2; ?>;
			window.isSharer=<?php echo !empty($footerConfig[3]) ? $footerConfig[3] :0; ?>;
			window.isSubscribe=<?php echo !empty($footerConfig[4]) ? $footerConfig[4] :0; ?>;
		</script>
		<script src="{__STATIC_URL__}/public/??js/jquery.min.js,js/bootstrap.min.js,js/jquery.cookie.js,js/hammer.min.js,front/default/js/public/public.js"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<?php 
		$public = $this->getPublic();
		$__wx_api_url__ = rtrim(\Lib\App\Config::get('wx_api_url'),'/');
		$__wx_api_url__ = sprintf($__wx_api_url__,$public['public_id']);
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
