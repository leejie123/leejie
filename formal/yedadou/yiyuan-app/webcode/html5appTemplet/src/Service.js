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
		if(strType=='function') return '';//return '【function】';
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
	this.signQuerystring=objTem.querystring
	this.sign=objTem.sign;
}
returnObj.ajax=function(url,config){
	returnObj.debug('ajax:'+url);
	var $=this.MainJS.$;
	var defaultConfig={
		data:'', 
		type:'get',
		dataType:'json',
		success:function(data,msg){},
		error:function(data,msg,type){}
	};
	config=$.extend(defaultConfig,config);
	returnObj.debug('config:'+returnObj.forinObj(config));
	$.ajax({
		url:url,
		data:config.data,
		type:config.type,
		dataType:config.dataType,
		success: function(item) {
			returnObj.debug('success:');
			returnObj.debug(returnObj.forinObj(item));
			//item=$.parseJSON(item);
			//console.log(item);
			var msg='';
			if('msg' in item){
				msg=item.msg;
			}
			config.success(item,msg);
		},
		error:function(){
			returnObj.debug('error!');
			config.error(null,'',0);
		}
	});
}
returnObj.getApi=function(url,data,success,error){
	returnObj.debug('getApi:');
	var urlPrefix='http://1034.w.zhj.test.yedadou.cn/yiyuan/AppApi/';
	switch(url){//这里拦截请求，放入调试信息
		case 'Basic':
			break;
		case 'indexSlide': 
			var msgTem='';
			returnData = '{"success":"1","data":{"slide":[{"pic_url":"http:\/\/img.zhj.test.yedadou.cn\/shop\/400\/451403906b761834dddb212b62a2335f.jpg","link":""},{"pic_url":"http:\/\/img.zhj.test.yedadou.cn\/shop\/562\/0881f5aabe601515c1af667c7e1cdf44.jpg","link":""}],"hit":[{"id":"3","public_id":"wx9b58f614c41a164b","term":"1","goods_id":"13","begin_time":"1460794862","end_time":"0","interval_time":"0","code_num":"1000","buy_num":"1000","status":"3","hit_code":"10000868","hit_uid":"14","hit_nick":"????Piece(\u00ac_\u00ac)????????","hit_order_sn":"2016041932228249693","goods_title":"dsfasdf","goods_price":"1000.00","goods_code_price":"1.00","term_num":"1000","cid":"2","hit_time":"1461032230","pic_url":"http:\/\/img.sang.test.yedadou.cn\/yiyuan\/994\/c40032e9533d6fdbb6e9c50c84f3447d.jpg","is_robot_winning":"0","cqssc_results":"0","cqssc_term":"","oid":"4296","send":"0","is_hide":"0"},{"title": "商品type1 and page =1","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}}';
			returnData = $.parseJSON(returnData)
			success(returnData,msgTem);
			break;
		case 'goods_tpl': 
			console.log(data);
			if (data.t == 1) {
				if (data.page_no == 1) { 
					// var returnData = '{"success":"1","pageEnd": false, "data":[{"singlePrice":"10", "id": 1,"title": "商品type1 and page =1","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31", "price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}';
					// var returnData = '{"success":"1","pageEnd": false, "data":{"goods":[{"id": 1, "title": "商品type1 and page =1","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"title": "商品type1 and page =1","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"title": "商品2","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=2","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"title": "商品3","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=4","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}}';
					var returnData = '{"success":"1","pageEnd": false, "data":[{"singlePrice":"10","id": 1,"title": "商品111111 && page1","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品3333","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}';
				} else if (data.page_no == 2) {	
					var returnData = '{"success":"1","pageEnd": false, "data":[{"singlePrice":"10","id": 1,"title": "商品111111  page3","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品3333","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}';
					// var returnData = '{"success":"1","pageEnd": false, "data":{"goods":[{"id": 3,"title": "商品type1 and page =2","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 0,"title": "商品type1 and page =1","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 19,"title": "商品2","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=2","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 1,"title": "商品3","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=4","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}}';
				} else if (data.page_no == 3) {
					var returnData = '{"success":"1","pageEnd": false, "data":[{"singlePrice":"10","id": 1,"title": "商品111111 page2","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品3333","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}';
					// var returnData = '{"success":"1","pageEnd": true}';
				}
			} else if (data.t == 2) {
					var returnData = '{"success":"1","pageEnd": false, "data":[{"singlePrice":"10","id": 1,"title": "商品111111","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品3333","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}';
				// var returnData = '{"success":"1","pageEnd": false, "data":{"goods":[{"id": 4,"title": "商品type2","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 12,"title": "商品2","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=2","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 18,"title": "商品type1 and page =1","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 1,"title": "商品3","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=4","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}}';
			} else if (data.page_no == 2) {
					var returnData = '{"success":"1","pageEnd": false, "data":[{"singlePrice":"10","id": 1,"title": "商品111111","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品3333","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}';
				// var returnData = '{"success":"1","pageEnd": false, "data":{"goods":[{"id": 6,"title": "商品type1 and page =2","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 13,"title": "商品type1 and page =1","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 1,"title": "商品2","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=2","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 1,"title": "商品3","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=4","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}}';
			} else if (data.t == 3) {
					var returnData = '{"success":"1","pageEnd": false, "data":[{"singlePrice":"10","id": 1,"title": "商品111111","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品222222","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"singlePrice":"10","id": 1,"title": "商品3333","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","buyed": "90","needed": "100","left": "10","buyLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}';
				// var returnData = '{"success":"1","pageEnd": false, "data":{"goods":[{"id": 7,"title": "商品type3","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 14,"title": "商品2","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=2","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 17,"title": "商品type1 and page =1","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=31","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"},{"id": 1,"title": "商品3","image": "http:\/\/img.yedadou.cn\/yiyuan\/1762\/8987ec702378ad59cfaf5071706f1b3b.png_400x400.jpg" ,"link": "/yiyuan/ShopGoods/ProductDetails?id=4","price": "100.00","process": "30","buyed": "90","needed": "100","left": "10","qiangLink": "\/yiyuan\/cart\/index\/add?goods_id=31&spec=115"}]}}';
			}
			var msgTem='';
			returnData = $.parseJSON(returnData);
			success(returnData, msgTem);
			return;
			break;
		case 'addCart':
			var returnData = '{"success": "1", "msg": "加入购物车成功", "url":"http://www.baidu.com", "successParam":11}';
			var msgTem='';
			returnData = $.parseJSON(returnData);	
			success(returnData, msgTem);
			return;
			break;
		default:
			returnObj.debug('无效的接口地址~:'+url);
			this.MainJS.ui.shortAlert('无效的接口地址~');
			error(null,'无效的接口地址~');
			return;
			break;
	}
	url=urlPrefix+url;
	url=url+"&"+this.signQuerystring+'&sign='+this.sign;
	var config={
		dataType:'jsonp',
		success:success,
		error:error,
		data:data
	};
	this.ajax(url,config);
}



return returnObj;
});

	