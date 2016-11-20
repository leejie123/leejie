/**
 * 设备调用api
 * @param  {[type]} require      [description]
 * @param  {[type]} exports      [description]
 * @param  {Object} module){var returnObj     [description]
 * @return {[type]}              [description]
 */
define('app/Device',function(require,exports,module){
var returnObj={};
returnObj.MainJS;
returnObj.init=function(MainJS){
	this.MainJS=MainJS;
}



returnObj.alert=function(message, alertCallback,title,buttonName){
	title=title||'';
	alertCallback=alertCallback||function(){};
	buttonName=buttonName||'ok';
	if('notification' in navigator){
		navigator.notification.alert(
	        message,
	        alertCallback,
	        title,
	        buttonName
    	);
	}else{
		this.MainJS.ui.alert(title,message,alertCallback,buttonName);
	}
};
returnObj.confirm=function(message, confirmCallback,title,buttonLabels){
	buttonLabels=buttonLabels||['yes','no'];
	title=title||'';
	confirmCallback=confirmCallback||function(){};
	if('notification' in navigator){
		navigator.notification.confirm(message, confirmCallback,title,buttonLabels)
	}else{
		this.MainJS.ui.confirm(title,message,confirmCallback,buttonLabels[0],buttonLabels[1]);
	}
};
returnObj.beep=function(times){
	times=times||1;
	if('notification' in navigator){
		navigator.notification.beep(times);
	}else{
		this.MainJS.ui.shortAlert('deep '+times+' times!');
	}
};
returnObj.popupWebUrl=function(head,url,doFun,target,options){
	head=head||head;
	doFun=doFun||function(){};
	target=target||'_blank';
	options=options||'location=no,toolbar=no';
	try{
		var ref = cordova.InAppBrowser.open(url,target,options);
	    //注：这样事件，只有在_blank上才起作用
	    ref.addEventListener('loadstart',function(e){
	        inAppBrowserEventInfo(e,'loadstart');
	        var url='url' in e?e.url:'';
	        if(url.indexOf('inappbrowserClose')!=-1){
	            ref.close();
	            return;
	        }
	    });
	    ref.addEventListener('loadstop',function(e){
	    	doFun(e);
	    });
	    ref.addEventListener('loaderror',function(e){
	        doFun(e);
	    });
	    ref.addEventListener('exit',function(e){
	    	doFun(e);
	    });
	    ref.insertCSS({code:"body{margin:0}.boboBrowerTitle .clearfix:after,.boboBrowerTitle .clearfix:before{display:table;line-height:0;content:\"\"}.boboBrowerTitle .clearfix:after{clear:both}.boboBrowerTitle div{-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box}.boboBrowerTitle{background-color:#fff;width:100%;border:1px solid #efe3ff}.boboBrowerTitle>.bheader{background-color:#d5d5d5;height:40px;padding-top:10px}.boboBrowerTitle>.bheader>.btitle{text-align:left;padding-left:5px;font-size:16px;margin-left:50px;padding-top:3px;overflow:hidden}.boboBrowerTitle .bclose{width:26px;height:26px;display:block;float:left;position:relative;left:5px}.boboBrowerTitle>.bheader>.bclose>b{display:inline-block;width:24px;height:2px;background:#525252;font-size:0;line-height:0;vertical-align:middle;-webkit-transform:rotate(45deg)}.boboBrowerTitle>.bheader>.bclose>b:after{content:'.';display:block;width:24px;height:2px;background:#525252;-webkit-transform:rotate(-90deg)}"});
	    ref.executeScript({code:"(function(){var ie=!!(window.attachEvent&&!window.opera);var wk=/webkit\/(\d+)/i.test(navigator.userAgent)&&(RegExp.$1<525);var fn=[];var run=function(){for(var i=0;i<fn.length;i++)fn[i]()};var d=document;d.readyOk123=function(f){if(!ie&&!wk&&d.addEventListener)return d.addEventListener('DOMContentLoaded',f,false);if(fn.push(f)>1)return;if(ie)(function(){try{d.documentElement.doScroll('left');run()}catch(err){setTimeout(arguments.callee,0)}})();else if(wk)var t=setInterval(function(){if(/^(loaded|complete)$/.test(d.readyState))clearInterval(t),run()},0)}})();document.readyOk123(function(){var divObj=document.createElement(\"div\");divObj.innerHTML='<div class=\"boboBrowerTitle clearfix\"><div class=\"bheader\"><a href=\"\" class=\"bclose\"><b></b></a><div class=\"btitle\">百度</div></div></div>';var first=document.body.firstChild;document.body.insertBefore(divObj,first)});alert(123);"});
	}catch(e){
		this.MainJS.ui.popupWebUrl(head,url,doFun);
	}
};
returnObj.getSplashscreen=function(){
	if('splashscreen' in navigator){
		return navigator.splashscreen;
	}
	return null;
};
//扫码 cordova plugin add cordova-plugin-barcodescanner
returnObj.QR=function(){
	
	cordova.plugins.barcodeScanner.scan(
      function (result) {
        var msg="We got a barcode\n" +
                "Result: " + result.text + "\n" +
                "Format: " + result.format + "\n" +
                "Cancelled: " + result.cancelled;
        navigator.notification.alert(
            msg,  // 显示信息
            function(){},         // 警告被忽视的回调函数
            '扫码结果',            // 标题
            '好的'                  // 按钮名称
          );
      }, 
      function (error) {
          navigator.notification.alert(
            error,  // 显示信息
            function(){},         // 警告被忽视的回调函数
            '扫码错误',            // 标题
            '好的'                  // 按钮名称
          );
      }
    );
}

return returnObj;
});
