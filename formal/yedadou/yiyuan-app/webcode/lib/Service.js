/**
 * 设备调用api
 * @param  {[type]} require      [description]
 * @param  {[type]} exports      [description]
 * @param  {Object} module){var returnObj     [description]
 * @return {[type]}              [description]
 */
define('app/Service',function(require,exports,module){
var returnObj={};
returnObj.MainJS;
returnObj.sign;//签名
returnObj.signQuerystring;//签名的Querystring
returnObj.debugInfo='';
returnObj.debug=function(msg){
	this.debugInfo+='<hr>'+msg;
}
returnObj.getDebugInfo=function(){
	return this.debugInfo;
}
returnObj.forinObj=function(obj){
	var strType=typeof(obj);
	if(strType=='object'){
		var info='【';
		for(k in obj){
			info+=k+':'+returnObj.forinObj(obj[k])+'，'
		}
		info+='】';
		return info;
	}else{
		if(strType=='function') return '【function】';
		return obj;
	}
}
returnObj.init=function(MainJS){
	this.MainJS=MainJS;
	/*签名算法*/
	function YedadouSign(){
		var THIS=this;
		var randomString=function(len) {
		　　len = len || 32;
		　　var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';    /****默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1****/
		　　var maxPos = $chars.length;
		　　var pwd = '';
		　　for (i = 0; i < len; i++) {
		　　　　pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
		　　}
		　　return pwd;
		}
		this.getSign=function(appid,key){
			var nonce_str=randomString();//1
			var timestamp=Math.round(new Date().getTime()/1000);//1235
			var arr=[];
			arr.push("app_id="+appid);
			arr.push("nonce_str="+nonce_str);
			arr.push("timestamp="+timestamp);
			arr=arr.sort();
			var stringA=arr.join('&');
			var strinJoin=stringA;
			stringA=stringA+"&key="+key;
			stringA=hex_md5(stringA);
			stringA=stringA.toUpperCase();
			return {
				sign:stringA,
				querystring:strinJoin
			};
		}
	}//end YedadouSign
	var YS=new YedadouSign();
	appid=3;
	key='MD5';
	var objTem=YS.getSign(appid,key);
	var arrSignQuerystring=objTem.querystring;
	this.signQuerystring=arrSignQuerystring.split('&');
	this.sign=objTem.sign;
}
returnObj.ajax=function(url,config){
	returnObj.debug('ajax:'+url);
	var $=this.MainJS.$;
	var defaultConfig={
		data:'', 
		type:'get',
		success:function(data,msg){},
		error:function(data,msg,type){}
	};
	config=$.extend(defaultConfig,config);
	returnObj.debug('config:'+returnObj.forinObj(config));
	$.ajax({
		url:url,
		data:config.data,
		type:config.type,
		success: function(item) {
			returnObj.debug('success:');
			returnObj.debug(returnObj.forinObj(item));
			item=$.parseJSON(item);
			//console.log(item);
			var msg='';
			if('msg' in item){
				msg=item.msg;
			}
			if('success' in item){
				if(item.success===true){
					config.success(item,msg);
					return;
				}
			}
			config.error(item,msg,1);
		},
		error:function(){
			returnObj.debug('error!');
			config.error(null,'',0);
		}
	});
}
returnObj.getApi=function(url,data,success,error){
	switch(url){//这里拦截请求，放入调试信息
		case 'xxxx':
			var returnData=[];
			var msgTem='';
			success(returnData,msgTem);
		break;
	}
	var apiData=this.signQuerystring;
	if(data) apiData=apiData.concat(data);
	var config={
		data:apiData,
		success:success,
		error:error,
	};
	this.ajax(url,config);
}




return returnObj;
});
