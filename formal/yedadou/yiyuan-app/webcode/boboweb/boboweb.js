define('boboweb/boboweb',['$'],function(require,exports,module){
	var B={};
	B.version="boboweb v0.1.201506026";
	//获得当前浏览器的信息
	/*
	B.BROWSER.versions.trident//IE内核
	B.BROWSER.versions.presto//opera内核
	B.BROWSER.versions.webKit//苹果、谷歌内核
	B.BROWSER.versions.gecko//火狐内核
	B.BROWSER.versions.mobile//是否为移动终端
	B.BROWSER.versions.ios//ios终端
	B.BROWSER.versions.android//android终端或者uc浏览器
	B.BROWSER.versions.iPhone//是否为iPhone或者QQHD浏览器
	B.BROWSER.versions.iPad//是否iPad
	B.BROWSER.versions.webApp//是否web应该程序，没有头部与底部
	*/
	B.BROWSER = {
        versions: function () {
            var u = navigator.userAgent, app = navigator.appVersion;
            return {//移动终端浏览器版本信息 
                trident: u.indexOf('Trident') > -1, //IE内核
                presto: u.indexOf('Presto') > -1, //opera内核
                webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                mobile: !!u.match(/AppleWebKit.*Mobile.*/) || !!u.match(/AppleWebKit/), //是否为移动终端
                ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
                iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //是否为iPhone或者QQHD浏览器
                iPad: u.indexOf('iPad') > -1, //是否iPad
                webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
            };
        } (),
        language: (navigator.browserLanguage || navigator.language).toLowerCase()
	 };
	//获得ie的版本号
	B.BROWSER_IE_versions= function () {
        var UA = navigator.userAgent,
            isIE = UA.indexOf('MSIE') > -1,
            v = isIE ? /\d+/.exec(UA.split(';')[1]) :-1;
        return v;
    }
	//设置相应平台的css3的前缀
	B.CSS3_prefix='';
	if(B.BROWSER.versions.webKit){
		//苹果、谷歌内核
		B.CSS3_prefix='-webkit-';
	}else if(B.BROWSER.versions.trident){
		//IE内核
		B.CSS3_prefix='-ms-';
	}else if(B.BROWSER.versions.presto){
		//opera内核
		prefix='-o-';
	}else if(B.BROWSER.versions.gecko){
		//火狐内核
		B.CSS3_prefix='-moz-';
	}else{
		B.CSS3_prefix='';
	}
	//获得一个统一递增的div编号
	B.BOBOLIB_DIV_ID_index=0;
	B.getOneDivId=function(){
		B.BOBOLIB_DIV_ID_index++;
		return 'BOBOLIB_DIV_ID'+B.BOBOLIB_DIV_ID_index;
	}
	/**
	 * @description 打印调试信息
	 * @param {String}
	 *            msg 调试信息，注：也可以是多个参数
	 */
	B.debug = function(msg) {
		if(!B.isDebug) return;
		if (window.console) {
			if (arguments.length != 1) {
				var tem_msg = '';
				for ( var i = 0; i < arguments.length; i++) {
					tem_msg += arguments[i];
					if (i < arguments.length - 1) {
						tem_msg += ',';
					}
				}
				window.console.log(tem_msg);
			} else {
				window.console.log(msg);
			}
		}
	}
	/**
	 * 抛出错误提示
	 * @param {[type]} msg [description]
	 */
	B.error=B.Error= function(msg) {
		//throw new Error(msg);
		if('console' in window){
			window.console.log(msg);
		}else{
			console.log(msg);
		}
	}
	//-----------------加载扩展库------------------start
	/**
	 * 返回seajs的require函数的引用。
	 * @return {[type]} [description]
	 */
	B.getSeajsRequire=function(){
		return B.seajsRequire;
	}
	/**
	 * 加载扩展类(seasjs简单的封装),注：需要seajs define里设置依赖库 
	 * @param  {[type]} path [description]
	 * @return {[type]}      [description]
	 */
	B.extend=function(path){
		var o=B.seajsRequire(path);
		try{
			o.extend(B);
		}catch(e){
			B.Error('require error or not find "extend()"'.o);
		}
		return B;
	}
	/**
	 * 异步加载扩展类(seasjs简单的封装)
	 * @param  {[type]} path  [description]
	 * @param  {[type]} dofun [description] 加载完成时的回调，格式:function(B)
	 * @return {[type]}       [description]
	 */
	B.extendAsync=function(path,dofun){
		B.seajsRequire.async(path,function(o){
			try{
				o.extend(B);
			}catch(e){
				B.Error('require error or not find "extend()"'.o);
			}
			if(dofun) dofun(B);
		});
	}
	/**
	 * 极致性能的 JS 模板引擎
	 * Github：https://github.com/yangjiePro/tppl
	 * 作者：杨捷  
	 * 邮箱：yangjie@jojoin.com
	 *
	 * @param tpl {String}    模板字符串
	 * @param data {Object}   模板数据（不传或为null时返回渲染方法）
	 *
	 * @return  {String}    渲染结果
	 * @return  {Function}  渲染方法
	 *
	 */
	B.template=function(tpl, data){
		var fn =  function(d) {
		            var i, k = [], v = [];
		            for (i in d) {
		                k.push(i);
		                v.push(d[i]);
		            };
		            return (new Function(k, fn.$)).apply(d, v);
		        };
		        if(!fn.$){
		            var tpls = tpl.replace(/[\r\n]/g, "").split('[:');
		            // log(tpls);
		            fn.$ = "var $=''";
		            for(var t in tpls){
		                var p = tpls[t].split(':]');
		                if(t!=0){
		                    fn.$ += '='==p[0].charAt(0)
		                      ? "+("+p[0].substr(1)+")"
		                      : ";"+p[0]+"$=$"
		                }
		                fn.$ += "+'"+p[p.length-1].replace(/\'/g,"\\'")+"'"
		            }
		            fn.$ += ";return $;";
		            // log(fn.$);
		        }
		        return data ? fn(data) : fn;
    }
 	/**
	 * -------===================================库依来的工具方法=======================----------------
	 */
	if(!B.Utility){
		B.Utility = {};
	}
	B.Utility.JqueryIsFind = function($obj) {
		if ($obj.length > 0) {
			return true;
		}
		return false;
	}
	//jquery 对象是否绑定事件
	B.Utility.JqueryIsBind = function($obj,eventname) {
		var objEvt = $._data($obj[0], "events");
		if (objEvt && objEvt[eventname]) {
			return true;
		}
		return false;
	}
	//jquery 对象是否绑定hover事件
	B.Utility.JqueryIsHover=function($obj){
		return B.Utility.JqueryIsBind($obj,'mouseenter')&&B.Utility.JqueryIsBind($obj,'mouseleave');
	}
	//删除jquery 对象hover事件
	B.Utility.JqueryRemoveHover=function($obj){
		if(B.Utility.JqueryIsHover($obj)){
			$obj.unbind(mouseenter).unbind(mouseleave); 
		}
	}
	// 通过jquery设置透明度
	// $item jquery对象,alpha 值0~1
	B.Utility.JquerySetAlpha = function($item, alpha) {
		if (B.Utility.JqueryIsFind($item)) {
			$item.css("-moz-opacity", alpha);
			$item.css("-khtml-opacity", alpha);
			$item.css("opacity", alpha);
			$item.css("filter", "Alpha(opacity=" + (alpha * 100) + ")");
		} else {
			B.Error("B.Utility.JquerySetAlpha $item==null!");
		}
	}
	//是否是数组
	B.Utility.isArray = function(obj) { 
		return Object.prototype.toString.call(obj) === '[object Array]'; 
	} 
	//是否是字符串
	B.Utility.isString=function(str){ 
		return (typeof str=='string')&&str.constructor==String; 
	} 
	/**
	 * 将一个key-value格式的对象，格化生成url用的queryString 字符串
	 * @param  {[type]} data [description]
	 * @return {[type]}      [description]
	 */
	B.Utility.toQueryString=function(data){
		var str='';
		for(var key in data){
			if(str!='') str+='&';
			str+=key+'='+data[key];
		}
		return str;
	}
	/**
	 * html转化字符串
	 * @param  {[type]} str [description]
	 * @return {[type]}     [description]
	 */
	B.Utility.htmlspecialchars=function(str) {
	      var s = "";
	      if (str.length == 0) return "";
	      for(var i=0; i<str.length; i++)
	      {
	          switch (str.substr(i,1))
	          {
	              case "<": s += "&lt;"; break;
	              case ">": s += "&gt;"; break;
	              case "&": s += "&amp;"; break;
	              case " ":
	                  if(str.substr(i + 1, 1) == " "){
	                      s += " &nbsp;";
	                      i++;
	                  } else s += " ";
	                  break;
	              case "\"": s += "&quot;"; break;
	              case "\n": s += "<br>"; break;
	              default: s += str.substr(i,1); break;
	          }
	      }
	      return s;
	  }
	  /**
	   * htmlspecialchars的反转
	   * @param  {[type]} str [description]
	   * @return {[type]}     [description]
	   */
	 B.Utility.htmlspecialchars_decode=function(str){
	      str = str.replace(/&amp;/g, '&');
	      str = str.replace(/&lt;/g, '<');
	      str = str.replace(/&gt;/g, '>');
	      str = str.replace(/&quot;/g, "''");
	      str = str.replace(/&#039;/g, "'");
	      return str;
	}
	//是否是图片
	B.Utility.isImg=function(src)
	{
		if(!B.Utility.isString(src)) return null;
		var ext = ['.gif', '.jpg', '.jpeg', '.png'];
		var s = src.toLowerCase();
		var r = false;
		for(var i = 0; i < ext.length; i++)
		{
			if (s.indexOf(ext[i]) > 0)
			{
				r = true;
				break;
			}
		}	
		return r;
	}
	B.init=function(options,seajsRequire){
		if(!seajsRequire) B.Error('error,seajsRequire undefined!');
		B.seajsRequire=seajsRequire;
		var defaults = {
			'isDebug':false,
			'$window':$(window),
			'$body':$("body")
		};
		var config =$.extend(defaults, options);
		B.isDebug=config.isDebug;
		B.$ = $;
		B.$window=config.$window;
		B.$body=config.$body;
		//B.debug('boboweb init..');
		//B.debug('boboweb version:'+B.version);
		return B;
	}
			/**
			 * -------===================================基类=======================----------------
			 */
			// 基类
			// $target jquery对象的html节点，注意：一定需要有父节点。
			// 停靠到父容器的9个位置：0不依靠，1左上，2上，3右上，4右，5右下，6下，7左下，8左，9中
			// 根据父容器大小而进行改变：0不改变，1为改为宽度100%,0~1之改为宽度的百分比，
			// offsetX:0,offsetY:0 在依靠的位置处，x或y加上这些偏移量
			// options {dockType:0,resizeW:0,resizeH:0,offsetX:0,offsetY:0,cssPosition:'absolute'}
			B.BBase = function($target, options) {
				if (!B.Utility.JqueryIsFind($target)) {
					B.Error("B.BBase($target) $target==null!");
				}
				/*if(!B.Utility.JqueryIsFind($target.parent())){
					B.Error("B.BBase($target) $target.parent()==null!");
					return;
				}*/
				this.__classType='BBase';
				//
				var defaults = {
					dockType : 0,
					resizeW : 0,
					resizeH : 0,
					offsetX : 0,
					offsetY : 0,
					cssPosition:'absolute'
				};
				var opts = B.$.extend(defaults, options);
				this.$target = $target;
				$target.css("position", opts.cssPosition);
				//
				this.remove=function(){
					this.$target.remove();
				}
				this.appendTo=function($parent){
					this.$target.appendTo($parent);
				}
				this.setXY = function(x, y) {
					this.setX(x);
					this.setY(y);
				}
				this.setX=function(x){
					$target.css("left", x+"px");
				}
				this.setY=function(y){
					$target.css("top", y+"px");
				}
				//设置旋转  注：css3才有效
				var _rotate=0;
				this.setRotate=function(rotate){
					//B.debug('setRotate:'+rotate,prefix);
					var obj={'transform':'rotate('+rotate+'deg)'};
					B.Utility.Css3SetPrefix(obj,$target);
					_rotate=rotate;
				}
				this.getRotate=function(){
					return _rotate;
				}
				var _scale=1;
				this.setScale=function(value){
					var obj={'transform':'scale('+value+')'};
					B.Utility.Css3SetPrefix(obj,$target);
					_scale=value;
				}
				this.getScale=function(){
					return _scale;
				}
				//设置css3的transform
				/*
				var obj={
							'transform-origin':'0 0',
							'transform':'scale(1)',
							'transform':'rotate(度数deg)',
							'skew':'(30deg)',
					     };
				setTransform(obj);
				 */
				this.setTransform=function(obj){
					//http://www.w3cplus.com/css3/transform-origin.html
					B.Utility.Css3SetPrefix(obj,$target);
				}
				this.setZ_index=function(z){
					$target.css("z-index", z);
				}
				this.getZ_index=function(){
					return $target.css("z-index");
				}
				this.setWH = function(w, h) {
					this.setW(w);
					this.setH(h);
				}
				this.setW = function(w) {
					$target.css("width",w);
				}
				this.setH = function(h) {
					$target.css("height",h);
				}
				this.resetDockType = function(type, offsetX, offsetY) {
					(offsetX==0)||offsetX || (offsetX = opts.offsetX);
					(offsetY==0)||offsetY || (offsetY = opts.offsetY);
					opts.dockType = type;
					opts.offsetX = offsetX;
					opts.offsetY = offsetY;
					this.resize();
				}
				this.resetResizeW = function(val) {
					opts.resizeW = val;
					this.resize();
				}
				this.resetResizeH = function(val) {
					opts.resizeH = val;
					this.resize();
				}
				this.getXY = function() {
					return {
						x : this.getX(),
						y : this.getY()
					};
				}
				this.getX=function(){
					var str=$target.css("left");
					if(str==''){
						return 0;
					}
					//return parseInt(str.split("px")[0]);
					return parseInt(str);
				}
				this.getY=function(){
					var str=$target.css("top");
					if(str==''){
						return 0;
					}
					return parseInt(str);
				}
				this.getWH = function() {
					return {
						w : $target.width(),
						h : $target.height()
					};
				}
				this.getW = function() {
					var str=$target.css("width");
					if(str==''){
						return 0;
					}
					return parseInt(str);
				}
				this.getH = function() {
					var str=$target.css("height");
					if(str==''){
						return 0;
					}
					return parseInt(str);
				}
				this.remove = function() {
					$target.remove();
				}
				this.getDock = function() {
					return opts.dockType;
				}
				this.getResizeW = function() {
					return opts.resizeW;
				}
				this.getResizeH = function() {
					return opts.resizeH;
				}
				//刷新自适应
				this.resize = function() {
					//B.debug('b resize..');
					//如果没有父节点，就不刷新
					if(!B.Utility.JqueryIsFind($target.parent())){
						B.Error("\"B.BBase.resize\" not find $target.parent !resize() not run.!");
						//B.debug("\"B.BBase.resize\" not find $target.parent !! resize() not run.",$target.parent()[0]);
						return;
					}
					var toX = 0;
					var toY = 0;
					var $parent = $target.parent();
					var ww = $parent.width();
					var wh = $parent.height();
					//B.debug("resize:"+ww+","+wh);
					opts.resizeW > 0 && opts.resizeW <= 1 && this.setW(ww * opts.resizeW);
					opts.resizeH > 0 && opts.resizeH <= 1 && this.setH(wh * opts.resizeW);
		
					var obj = $target;
					//B.debug("resize:dockType:"+opts.dockType+",offsetX:"+opts.offsetX+",offsetY:"+opts.offsetY+",html:"+this.$target.html());
					switch (opts.dockType) {
					case 1:
						this.setXY(toX, toY);
						break;
					case 2:
						toX = (ww - obj.width()) / 2;
						toY = 0;
						break;
					case 3:
						toX = (ww - obj.width());
						toY = 0;
						break;
					case 4:
						toX = (ww - obj.width());
						toY = (wh - obj.height()) / 2;
						break;
					case 5:
						toX = (ww - obj.width());
						toY = (wh - obj.height());
						break;
					case 6:
						toX = (ww - obj.width()) / 2;
						toY = (wh - obj.height());
						break;
					case 7:
						toX = 0;
						toY = (wh - obj.height());
						break;
					case 8:
						toX = 0;
						toY = (wh - obj.height()) / 2;
						break;
					case 9:
						toX = (ww - obj.width()) / 2;
						toY = (wh - obj.height()) / 2;
						break;
					}
					toX < 0 && (toX = 0);
					toY < 0 && (toY = 0);
					toX += opts.offsetX;
					toY += opts.offsetY;
					this.setXY(toX, toY);
					//
				}
				if(B.Utility.JqueryIsFind($target.parent())){
					this.resize();
				}
				
			}
			//图片
			//imgPath  背景图片地址，可以为空。
			//imgW,imgH 相对设计稿的实际宽，高。通过这两个值，该类可以进进缩小或放大的时候，可以对它内站的节点也进行相应的改变
			//BTargetOptions BBbase 的配置文件。  注：该类会把用
			//是否设置 css的top,left都为0，默认为是设置,如果设置任何值，则不设置。
			B.BContainer=function(imgPath,imgW,imgH,BTargetOptions,setLeftTop0){
				var _isSetLeftTop0;
				if(!setLeftTop0){
					_isSetLeftTop0=true;
				}else{
					_isSetLeftTop0=false;
				}
				this.__classType='BContainer';
				var _$target;
				if(imgPath==''){
					_$target=$('<div id="'+B.getOneDivId()+'"></div>');
				}else{
					_$target=$('<div id="'+B.getOneDivId()+'"></div>');
					_$target.css("background-image","url("+imgPath+")");
				}
				if(_isSetLeftTop0){
					_$target.css("top",0);
					_$target.css("left",0);
				}
				this.iniX=0;
				this.iniY=0;
				_$target.css('position','absolute');
				_$target.addClass('BOBOLIB_BImage');
				var _scalseX=1;
				var _scalseY=1;
				var _BTarget=new B.BBase(_$target,BTargetOptions);
				var _imgW=imgW;
				var _imgH=imgH;
				_BTarget.setWH(imgW,imgH);
				this.$target=_$target;
				//B.debug(imgW,imgH,_BTarget.getW(),_BTarget.getH());
				var _arrBImgesChildes=[];
				//获得实际宽度
				this.getInitWidth=function(){
					return _imgW;
				}
				//获得实际高度
				this.getInitHeight=function(){
					return _imgH;
				}
				//添加一个
				/*
				 new B.BContainer('',imgW,imgH);
				 var imgPath='images/1_txt1.png';
		     	 page.addChild(imgPath,{
		     		id:'page1_txt1',
		     		w:230,h:115,
		     		x:199,
		     		y:495,
		     		scale:1,
					visible:true,
					alpha:1,
					init:function(objThis,addChildBat_config){}   //获得这个添加的对象，会调用这个方法
		     	 });
		     	 //返回一个B.BContainer
				 */
				this.addChild=function(imgPath,options){
					//B.debug('addChild:',imgPath);
					var defaults = {
							x : 0,
							y : 0,
							scale : 1,
							visible : true,
							z_index : 0,
							alpha:1,
							init:function(objThis,addChildBat_config){}
					};
					var options = B.$.extend(defaults, options);
					var _w=options.w;
					var _h=options.h;
					var _x=options.x;
					var _y=options.y;
					var _scale=options.scale;
					_w=_w*_scale;
					_h=_h*_scale;
					var _visible=options.visible;
					var _z_index=options.z_index;
					var _bImg=new B.BContainer(imgPath,_w,_h);
					_bImg.iniX=_x;
					_bImg.iniY=_y;
					var bTem=_bImg.getBTarget();
					bTem.setXY(_x,_y);
					if(_visible){
						bTem.$target.show();
					}else{
						bTem.$target.hide();
					}
					if(_z_index!=0) bTem.setZ_index(_z_index);
					if(options.alpha!=1) B.Utility.JquerySetAlpha(bTem.$target,options.alpha);
					//bTem.$target.appendTo(_$target);
					_$target.append(bTem.$target);
					_arrBImgesChildes.push(_bImg);
					if(options.init) options.init(_bImg,options);
					return _bImg;
				}
				this.getChildIndex=function(index){
					if(index>_arrBImgesChildes.length-1) B.Error("getChildIndex()  index>"+(_arrBImgesChildes.length-1)+',index:'+index);
					return _arrBImgesChildes[index];
				}
				this.getChildes=function(){
					return _arrBImgesChildes;
				}
				this.getChildeCount=function(){
					return _arrBImgesChildes.length;
				}
				//添加一批
				/*
				page.addChildBat([{
		     		path:'images/1_txt2.png',
		     		w:230,h:60,
		     		x:202,
		     		y:611,
		     		scale:1,
					visible:true,
					alpha:1,
					init:function(objThis,addChildBat_config){}   //获得这个添加的对象，会调用这个方法
		     	},
		     	{
		     		path:'images/1_txt3.png',
		     		w:415,h:75,
		     		x:119,
		     		y:702,
		     		scale:1,
					visible:true,
					alpha:1,
					init:function(objThis,addChildBat_config){}
		     	}]
	     	  );
				 */
				this.addChildBat=function(arrChildObjConfig){
					for ( var i = 0; i < arrChildObjConfig.length; i++) {
						var obj=arrChildObjConfig[i];
						var item=this.addChild(obj.path,obj);
					}
				}
				this.getScalseX=function(){
					return _scalseX;
				}
				this.getScalseY=function(){
					return _scalseY;
				}
				this.resize=function(width,height){
					return this.setWH(width,height);
				}
				//改变宽，高    注：目前只设置宽度
				this.setWH=function(width,height){
					var scalseX=width/_imgW;
					var scalseY=scalseX;
					_scalseX=scalseX;
					_scalseY=scalseY;
					this.setScalse(scalseX,scalseY);
					return _scalseX;
				}
				this.setScalse=function(scalseX,scalseY){
					//B.debug('setScalse----start',_arrBImgesChildes.length);
					var toW=_imgW;
					var toH=_imgH;
					_BTarget.setWH(toW*scalseX,toH*scalseY);
					B.$.each(_arrBImgesChildes,function(index,item){
						//B.debug('setScalse..',index);
						var bTem=item.getBTarget();
						bTem.setXY(item.iniX*scalseX,item.iniY*scalseY);
						item.setScalse(scalseX,scalseY);
					});//end B.$.each
					//B.debug('setScalse----end');
				}
				this.appendTo=function($parent){
					_BTarget.appendTo($parent);
				}
				//获得目标的BBase对象
				this.getBTarget=function(){
					return _BTarget;
				}
				this.remove=function(){
					B.$.each(_arrBImgesChildes,function(index,item){
						var bTem=item.getBTarget();
						bTem.$target.remove();
					});
					_arrBImgesChildes=null;
					_$target.remove();
				}
				//
			}
			//
			//dockType  BBase里的：停靠到父容器的9个位置：0不依靠，1左上，2上，3右上，4右，5右下，6下，7左下，8左，9中
			//注：需要调用parentResize()这个方法，可以执行对齐和自适应
			B.BPage=function($parent,bakImgPath,BPageInitW,BPageInitH,dockType){
				this.__classType='BPage';
				var _$parent=$parent;
				var _PageW=BPageInitW;
				var _PageH=BPageInitH;
				var _pageWH=_PageW/_PageH;
				var bOpration = {
						dockType : dockType
					};
				var _target=new B.BContainer(bakImgPath,BPageInitW,BPageInitH,bOpration);
				this.$target=_target.$target;
				_target.appendTo($parent);
				this.getBContainer=function(){
					return _target;
				}
				this.addChild=function(imgPath,options){
					_target.addChild(imgPath,options);
				}
				this.getChildIndex=function(index){
					return _target.getChildIndex(index);
				}
				this.addChildBat=function(arrChildObjConfig){
					_target.addChildBat(arrChildObjConfig);
				}
				//
				//最小的那边自适应，父类的宽度。如果父类的宽度太大，就改在BPageInitW
				this.parentResize=function(pwidth,pheight){
					pwidth=pwidth||_$parent.width();
					pheight=pheight||_$parent.height();
					var tw=pwidth;
					if(tw>_PageW){ //如果父类的宽度大于初始的宽度，就不要在大了
						tw=_PageW; 
					}
					var th=tw/_pageWH;
					if(_PageW>_PageH){
						th=pheight;
						if(th>_PageH){
							th=_PageH; 
						}
						tw=th*_pageWH;
					}
					//
					_target.setWH(tw,th);
					var btarget=_target.getBTarget();
					var rW=btarget.getW();
					var rH=btarget.getH();
					btarget.resize();
				}
			}
			/**
			 * -------===================================加载进度提示=======================----------------
			 *
			 loadAnimateGigUrl,  加载的gif动画路径
			 width, gif宽度
			 height  gif 高度
			 */
			B.BLoadingTipCenter = function(loadAnimateGigUrl,width,height,$body) {
				this.__classType='BLoadingTipCenter';
				var _url = loadAnimateGigUrl;
				var _$body=$body;
				//
				var THIS = this;
				var _$html =  $('<div><img src="'+_url+'"></div>');
				_$html.width(width);
				_$html.height(height);
				_$html.css("position","absolute");
				_$html.appendTo(_$body);
				var _bTarget=new B.BBase(_$html,{dockType:9});
				//
				//这个会返回一个BBase对象，需要放在window.resize里。  xx.getBTarget().resize();
				this.getBTarget=function(){
					return _bTarget;
				}
				this.loadError=function(){
					this.setVisible(false);
				}
				this.resize=function(){
					_bTarget.resize();
				}
				//设置显示或隐藏
				this.setVisible=function(isVisible,loaded,loadTotal){
					if(isVisible){
						_$html.show();
					}else{
						_$html.hide();
					}
				}
				
			}
			/**
			 * -------===================================预加载一个资源=======================----------------
			 */
			// 预加载一个资源
			// 会分发两种事件
			/*
			 * B.BPreload.EventSuccess="B_BPreload_success"; //成功
			 * B.BPreload.EventError="B_BPreload_Error"; //失败 同时传入的参数 //status -
			 * B.BPreload.EventTryAgain  //重试
			 * 包含请求的状态（"success", "notmodified", "error", "timeout" 或 "parsererror"）
			 * //xhr - 包含 XMLHttpRequest 对象 .listenTo(object,
			 * B.BPreload.EventSuccess,function(B.BPreload,$loadContent,status,xhr){ });
			 * .listenTo(object, B.BPreload.EventError,function(B.BPreload,status,xhr){
			 * });
			 * 
			 */
			//
			B.BPreload = function(url, options) {
				this.__classType='BPreload';
				this.url = url;
				this.$loader;
				//
				var THIS = this;
				var defaults = {
					retry : 3
					// 如果没有找到，重试的次数
				};
				var opts = B.$.extend(defaults, options);
				opts.retry--;
				//
				//
				var $loader = this.$loader = $("<div></div>");
				var loadurl = url;
				var retry_index = 0;
				var _response = '';
				var loadComplete = function(response, status, xhr) {
					if (isStop) {
						return;
					}
					_response = response;
					if (status == "success" || status == "notmodified") {
						// 分发加载成功事件
						$loader.trigger(B.BPreload.EventSuccess, [$loader,status, xhr]);
					} else {
						if (retry_index < opts.retry) {
							retry_index++;
							$loader.load(loadurl, loadComplete);
							$loader.trigger(B.BPreload.EventTryAgain, [status, xhr]);
						} else {
							// 分发加载失败事件
							$loader.trigger(B.BPreload.EventError, [status, xhr]);
						}
					}
				}
				var isStop = false;
				this.stop = function() {
					isStop = true;
					$loader = this.$loader = $("<div></div>");
				}
				this.listenTo=function(eventName,fun){
					$loader.bind(eventName,fun);
				}
				$loader.load(loadurl, loadComplete);
				
			}
			B.BPreload.EventSuccess = "B_BPreload_success";
			B.BPreload.EventError = "B_BPreload_Error";
			B.BPreload.EventTryAgain = "B_BPreload_TryAgain";
			/**
			 * -------===================================预加载一组资源=======================----------------
			 */
			// 预加载一组资源
			// 分发的事件为：完成（里面可能有一些没有加载）
			/*
			 * .listenTo(object,
			 * B.BPreloadQueue.EventComplete,function(B.BPreloadQueue){ });
			 * //loaded,loadCount 加载数/总数 .listenTo(object,
			 * B.BPreloadQueue.EventProgress,function(B.BPreloadQueue,loaded,loadCount){
			 * });
			 */
			B.BPreloadQueue = function(urls) {
				this.__classType='BPreloadQueue';
				var THIS = this;
				//用于发关事件：
				var $trigger=$("<div></div>");
				this.listenTo=function(eventName,fun){
					$trigger.bind(eventName,fun);
				}
				this.urls = urls;
				this.isComplete = false;// 是否加载处理完.
				this.loadCount = urls.length; // 资源总数
				var loadSuccessCount = this.loadSuccessCount = 0; // 加载正确的数量
				var loadErrorCount = this.loadErrorCount = 0; // 加载失败的数量
				var loadUrls = urls;
				var loadCount = this.loadCount;
				// 保存每一个加载资源的类BPreload
				var _bPreloads = [];
				// 获得加载资源的类的某个对象B.BPreload
				this.getPreload = function(index) {
					return _bPreloads[index];
				}
				// 是否停止
				var isStop = false;
				var loadOne = function() { // 返回加载的路径
					if (isStop) {
						// 如果停止，就不继续
						return;
					}
					if (loadUrls.length == 0) {
						return;
					}
					var url = loadUrls.shift();
					var isimg=B.Utility.isImg(url);
					if(isimg==null) return;
					if(isimg){
						$.imgpreload(url,
						{
					        each: function()//each的意思是，每次加载完一个图片后，执行此匿名函数中的代码，本例仅仅是将图片的地址打印到页面而已，所以大家不用纠结“为什么没有看到图片”
					        {
					        	var isSuccess = $(this).data('loaded')?true:false;
					        	if(isSuccess){
					        		loadSuccessCount++;
									trigger_EventProgress();
									chekLoadComplete();
									loadOne();
					        	}else{
					        		loadErrorCount++;
									trigger_EventProgress();
									chekLoadComplete();
									loadOne();
					        	}
					           //var status = $(this).data('loaded')?'success':'error';
					           //$('#status').append('<li>'+ $(this).attr('src') + ' ' + status + '</li>');
					        },
					        all: function()//all的意思是，当所有图片加载完毕之后，执行此函数体内的内容；举个例子，如果有5张图片需要预加载，则each中的function会执行5次，而all的function 只会执行一次~
					        {
					           // $('#status').append('<li> all images loaded </li>');
					        	
					        }
					    })
					}else{
						var preLoad = new B.BPreload(url);
						_bPreloads.push(preLoad);
						preLoad.listenTo(B.BPreload.EventSuccess, function(bPreload,$loadContent,status, xhr) {
							loadSuccessCount++;
							trigger_EventProgress();
							chekLoadComplete();
							loadOne();
						});
						preLoad.listenTo(B.BPreload.EventError, function(bPreload,status, xhr) {
							loadErrorCount++;
							trigger_EventProgress();
							chekLoadComplete();
							loadOne();
						});
					}
					
					return url;
				}
				function chekLoadComplete() {
					var temCount=loadSuccessCount + loadErrorCount;
					if (temCount >= loadCount) {
						setIsComplete();
						isStop = true;
						trigger_EventProgress();
						$trigger.trigger(B.BPreloadQueue.EventComplete);
						return true;
					}
					return false;
				}
				function setIsComplete() {
					this.isComplete = true;
				}
				// 分发加载进度
				var trigger_EventProgress = function() {
					var loaded = loadSuccessCount + loadErrorCount;
					//console.log('trigger_EventProgress:'+loaded+','+loadCount);
					$trigger.trigger(B.BPreloadQueue.EventProgress,[loaded,loadCount]);
				}
				// 开始加载 parallelCount：并行加载的次数 默认为2
				this.start = function(parallelCount) {
					var c=loadUrls.length;
					if(c<=0){
						$trigger.trigger(B.BPreloadQueue.EventComplete);return;
					}
					parallelCount || (parallelCount = 2);
					c == 1 && (parallelCount = 1);
					for ( var i = 0; i < parallelCount; i++) {
						loadOne();
					}
				}
				// 停止加载
				this.stop = function() {
					isStop = true;
					for(var i=0;i<_bPreloads.length;i++){
						var item=_bPreloads[i];
						item.stop();
					}
					/*_.each(_bPreloads, function(element, index, list) {
						element.stop();
					});*/
				}
				// 重新设置，重新开始
				this.reset = function(urls) {
					this.urls = urls;
					this.isComplete = false;// 是否加载处理完.
					this.loadCount = urls.length; // 资源总数
					loadSuccessCount = this.loadSuccessCount = 0; // 加载正确的数量
					loadErrorCount = this.loadErrorCount = 0; // 加载失败的数量
					loadUrls = urls;
					loadCount = this.loadCount;
					// 关闭之前的。。
					for(var i=0;i<_bPreloads.length;i++){
						var item=_bPreloads[i];
						item.stop();
					}
					/*_.each(_bPreloads, function(element, index, list) {
						element.stop();
					});*/
					_bPreloads = [];
					isStop=false;
				}
		
			}
			B.BPreloadQueue.EventComplete = "B_BPreloadQueue_complete";
			B.BPreloadQueue.EventProgress = "B_BPreloadQueue_EventProgress";
			/**
			 * -------===================================加载模块=======================----------------
			 */
			/**
			 * 分页加载管理
			 * @param {[type]} $parent [description]
			 * @param {[type]} MainJS 加载的页面通过B.MainJS来决定调用的全局上下文，通常指定在应用的全局环境里。
			 */
			B.BPageManagement=function($parent,MainJS){
				this.__classType='BPageManagement';
				var THIS = this;
				THIS.MainJS=MainJS;
				//用于发关事件：
				var $trigger=$("<div></div>");
				THIS.$trigger=$trigger;
				this.listenTo=function(eventName,fun){
					$trigger.bind(eventName,fun);
				}
				this.$parent=$parent;
				this.loader=null;
				this.$currentLoadContent=null;
				this.lastLoadContentHtml='';//上一个页面加载的html
				//如果需要调用当前页的方法，需要用到这个变量
				this.$currentLoadContentJS=null;
				this.$currentLoadContentPreLoadQ=null;
				this.resetParent=function($parent){
					this.$parent=$parent;
				}
				this.stopLoad=function(){
					if(THIS.loader!=null){
						THIS.loader.stop();
					}
				}
				this.remove=function(){
					THIS.loaderKill();
					if(THIS.$currentLoadContent){
						THIS.$currentLoadContent.remove();
					}
				}
				//
				function loaderKill(){
					if(THIS.loader!=null){
						THIS.loader.stop();
						delete THIS.loader;
						THIS.loader=null;
					}
					if(THIS.$currentLoadContent!=null){
						if(typeof(THIS.$currentLoadContent.remove)!="undefined") THIS.$currentLoadContent.remove();
						delete THIS.$currentLoadContent;
						THIS.$currentLoadContent=null;
					}
					if(THIS.$currentLoadContentJS!=null){
						if(typeof(THIS.$currentLoadContentJS.BOBOLIB_page_remove)!="undefined") THIS.$currentLoadContentJS.BOBOLIB_page_remove();
						delete THIS.$currentLoadContentJS;
						THIS.$currentLoadContentJS=null;
					}
				}
				this.loaderKill=loaderKill;
				//加载页面
				/*
		//下面是一个加载的页面模板：
		
		<div>
			<style type="text/css">
				#BOBOWEB_PAGE_这里写上唯一的标识{
					background-color: #fff;
				}
			</style>
			<div id="BOBOWEB_PAGE_这里写上唯一的标识">
			</div>
		</div>
		<script>function(){  //注：<script>和function 之间不要换行
			var THIS=this;
			THIS.ROOT=null;//指向B   系统会自动给他附值   注：如果需要获得加载它所在的js范围 可以使用：THIS.ROOT.MainJS
			var B,$,MainJS;
			var ParentID;//系统会自动给他附值，设置唯一的id号
			var $CurrentPage;//当前页面的$引用
			THIS.ParentID=ParentID;
			THIS.$CurrentPage=$CurrentPage;
			//获得需要预加载的资源
			this.BOBOLIB_page_PreloadResources=function(){
				var arrTest=[];  //如果需要预加载，请把它们写在这里面,如：var arrTest=["1.jpg","2.jpg"..];
				return arrTest;
			}
			//初始化,页面加载好，会自动调用这个方法。
			this.BOBOLIB_page_init=function(){
				window.console.log("page_init..");
				B=THIS.ROOT;
				$=THIS.ROOT.$;
				MainJS=THIS.ROOT.MainJS;
				$CurrentPage=THIS.$CurrentPage;
				//
				//
				
			}
			//离开该页面需要处理的一些事件
			this.BOBOLIB_page_remove=function(){
				window.console.log("page_remove..");
			}
			//设置宽高
			this.BOBOLIB_setWH=function(w,h){
				
			}
			//
			//自定方法-----开始-----------------------------------
		}();
		</script>
		
				 */
				this.url='';
				this.load=function(url){
					this.url=url;
					loaderKill();
					THIS.loader=new B.BPreload(url);
					THIS.loader.listenTo(B.BPreload.EventError,function(loader, status, xhr){
						//B.debug("加载错误");
						THIS.$trigger.trigger(B.BPageManagement.EventError,[THIS,loader, status, xhr]);
					});
					THIS.loader.listenTo(B.BPreload.EventTryAgain,function(loader, status, xhr){
						//B.debug("加载重试");
						THIS.$trigger.trigger(B.BPageManagement.EventTryAgain,[THIS,loader, status, xhr]);
					});
					THIS.loader.listenTo(B.BPreload.EventSuccess,function(loader, $loadContent,status, xhr){
						//B.debug("加载成功");
						var $data = $loadContent;
						var temHtml = $data.children("div").eq(0);
						THIS.$currentLoadContent=temHtml;
						var temJs = $data.children("script").eq(0);
						//B.debug('temHtml='+temHtml.html());
						//B.debug(temJs.html());
						eval("THIS.$currentLoadContentJS=new "+temJs.html());
						THIS.$currentLoadContentJS.ROOT=B;
						THIS.$currentLoadContentJS.MainJS=THIS.MainJS
						//设置一个唯一的id号
						var idTem=B.getOneDivId();
						THIS.$currentLoadContentJS.ParentID=idTem;
						THIS.$currentLoadContent.attr('id',idTem);
						THIS.$currentLoadContentJS.$CurrentPage=THIS.$currentLoadContent;
						//B.debug('THIS.$currentLoadContentJS.$CurrentPage',THIS.$currentLoadContentJS.$CurrentPage);
						//是否有预加载
						var arrPreResources=THIS.$currentLoadContentJS.BOBOLIB_page_PreloadResources();
						if(arrPreResources.length==0){
							//如果没有预加载
							//B.debug("没有预加载");
							THIS.$parent.append(THIS.$currentLoadContent);
							THIS.$currentLoadContentJS.BOBOLIB_page_init();
							THIS.$trigger.trigger(B.BPageManagement.EventSuccess,[THIS,loader, status, xhr]);
						}else{
							//B.debug("有预加载");
							THIS.$currentLoadContentPreLoadQ=new B.BPreloadQueue(arrPreResources);
							THIS.$currentLoadContentPreLoadQ.listenTo(B.BPreloadQueue.EventComplete,function(preLoadq){
								//B.debug("页面批量加载完成");
								THIS.$parent.append(THIS.$currentLoadContent);
								THIS.$currentLoadContentJS.BOBOLIB_page_init();
								THIS.$trigger.trigger(B.BPageManagement.EventSuccess,[THIS,loader,preLoadq, status, xhr]);
							});
							THIS.$currentLoadContentPreLoadQ.listenTo(B.BPreloadQueue.EventProgress,function(preLoadq,loaded,loadTotal){
								//B.debug("页面批量加载进度:",preLoadq,loaded,loadTotal);
								THIS.$trigger.trigger(B.BPageManagement.EventProgress,[THIS,preLoadq,loaded,loadTotal]);
							});
							THIS.$currentLoadContentPreLoadQ.start();
						}
						//
						
					});
				}
				
			}
			B.BPageManagement.EventError = "B_BPageManagement_error"; //加载页面错误
			B.BPageManagement.EventTryAgain = "B_BPageManagement_tryAgain"; //重试加载页面
			B.BPageManagement.EventSuccess = "B_BPageManagement_success"; //加载页面成功
			B.BPageManagement.EventProgress = "B_BPageManagement_Progress"; //如果有预加载时，加载进度 
			//
			/**
			 * -------===================================加载模块之间的过渡效果=======================----------------
			 */
			//调用方法需要注意的，先实例化以后，在合适的地方调用init来设置旧的页面，在加载到新页成功的地方调用run来运行过渡动画
			B.BPageManagementTransition=function(){
				var THIS=this;
				var _$lastPage=null;
				var _$newPage=null;
				//设置旧的页面，注：它的原理是把旧的页面的html提取出来，复制一份，进行过渡动画操作。
				this.init=function($lastPage,$p){
					if(!$p) $p=$lastPage.parent();
					if($p==null){
						B.debug('BPageManagementTransition init $p==null');
						return;
					}
					_$lastPage=$($lastPage.html());
					$p.append(_$lastPage);
				}
				//运行动画
				//$newPage:页的页面,
				//moveType过渡动类型：1.fadeout  淡入淡出 
				this.run=function($newPage,moveType){
					_$newPage=$newPage;
					switch(moveType){
						case 'fadeout':
							_moveFadeOut();
							break;
						default:
							break;
					}
				}
				function _moveRightToLeft(){
					
				}
				function _moveFadeOut(){
					B.Utility.JquerySetAlpha(_$newPage,0);
					if(_$lastPage!=null){  //如果是空，说明是第一次加载
						_$lastPage.animate({opacity:"0"},1000,function(){
							_$lastPage.remove();
						});
					}
					_$newPage.animate({opacity:"1"},1000);
				}
			}
			/**
			 * -------===================================弹出层=======================----------------
			 */
			B.BPopup=function($parent,options){
				this.__classType='BPopup';
				var THIS = this;
				this.$parent=$parent;
				var _bTip=null;
				var defaults = {
					islockLayer : true,
					lockLayerColor : "#000",
					lockLayerAlpha : .8,
					cssPosition:'absolute'
				};
				this.bLockLayer=null;
			    var opts = B.$.extend(defaults, options);
			    this.reomveLockLayer=function(){
			    	if(_bTip!=null){
			    		_bTip.remove();
			    		_bTip=null;
			    	}
			    	if(this.bLockLayer!=null){
			    		this.bLockLayer.remove();
				    	this.bLockLayer=null;
			    	}
			    }
			    //弹出一个遮蔽层
			  //返回：遮蔽层的$对象
				this.popupLockLayer=function(){
					this.reomveLockLayer();
					// 弹出层
					THIS.bLockLayer = new B.BBase($("<div></div>").appendTo($parent), {
						dockType : 1,
						resizeW : 1,
						resizeH : 1,
						cssPosition:opts.cssPosition
					});
					THIS.bLockLayer.setZ_index(20000);
					THIS.bLockLayer.$target.css("background-color", opts.lockLayerColor);
					B.Utility.JquerySetAlpha(THIS.bLockLayer.$target,opts.lockLayerAlpha);
					return THIS.bLockLayer.$target;
				}
				//弹出一个图层
				//返回：遮蔽层的$对象
				this.popup=function(bTip){
					var $tem=this.popupLockLayer();
					_bTip=bTip;
					_bTip.setZ_index(20001);
					bTip.$target.appendTo($parent);
					if(_bTip!=null) _bTip.resize();
					this.resize();
					
					return $tem;
				}
				this.resize=function(){
					if(_bTip!=null) _bTip.resize();
					THIS.bLockLayer.resize();
				}
			}
	return B;
	
});//end define