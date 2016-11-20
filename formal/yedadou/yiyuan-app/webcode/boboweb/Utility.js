define('boboweb/Utility',function(require,exports,module){
var returnObj={};
returnObj.extend=function(B){
//扩展--------------------------------start
	if(!B.Utility){
		B.Utility={};
	}
	//获得随机数
	B.Utility.getRandomNum=function(Min,Max)
	{   
		var Range = Max - Min;   
		var Rand = Math.random();   
		return(Min + Math.round(Rand * Range));   
	}   
	B.Utility._DeviceHWProportion=null; //缓存getDeviceHWProportion()里面的值
	//根据设备的高与宽的比值返回一个适当的比值字符串，注：格式为：3_2
	//通过这个比值可以获得特定的目录名，起到一些设备适配的作用。
	//h,w 分别是高和宽  如果不传，默认会自动获得设置的高和宽  isRefresh＝true 是否重新计算，false 直接拿缓存
	B.Utility.getDeviceHWProportion=function(h,w,isRefresh){
		isRefresh=isRefresh&&false;
		if(isRefresh){
			if(B.Utility._DeviceHWProportion!=null) return B.Utility._DeviceHWProportion;
		}
		h=h||B.$window.height();
		w=w||B.$window.width();
		//B.debug(h,w);
		/*
		5/3 =1.6666666
		4/3=1.333333
		16/9=1.77777
		3/2=1.5
		*/
		var hw=h/w;
		hw*=100;
		var hw=Math.round(hw);
		//console.log(hw);
		var strOut='';
		if(hw<=133){
			strOut="4_3";
		}else if(hw>133&&hw<=150){
			strOut="3_2";
		}else if(hw>150&&hw<=166){
			strOut="5_3";
		}else if(hw>166&&hw<=177){
			strOut="16_9";
		}else{
			strOut="16_9";
		}
		B.Utility._DeviceHWProportion=strOut;
		return strOut;
	}
	//传入一个装有字符串的的数组，对里面每个元素的头部加入特定的字符串
	B.Utility.addPrefixString=function(arrStr,strPrefix){
		for(var i=0;i<arrStr.length;i++){
			arrStr[i]=strPrefix+arrStr[i];
		}
		return arrStr;
	}
	//对css属性值转在数值，空的话返回为0
	B.Utility.cssStrToNum=function(str){
		var num=parseInt(str);
		if(!num){
			return 0;
		}
		return num;
	}
	//等比缩放宽度
	//initW 实际宽
	//initH 实际高
	//toWidth 需要设置的宽度
	//$target  目标  可以为空
	//返回高度
	B.Utility.ResizeWidth=function(initW,initH,toWidth,$target){
		var hw=initH/initW;
		var toHeight=hw*toWidth;
		if($target){
			$target.css('height',toHeight);
			$target.css('width',toWidth);
		}
		return toHeight;
	}
	//等比缩放高度
	//initW 实际宽
	//initH 实际高
	//toHeight 需要设置的宽度
	//$target  目标  可以为空
	//返回宽度
	B.Utility.ResizeHeight=function(initW,initH,toHeight,$target){
		var wh=initW/initH;
		var toWidth=wh*toHeight;
		if($target){
			$target.css('height',toHeight);
			$target.css('width',toWidth);
		}
		return toWidth;
	}
	//根据不同平台加上对应的css3的属性前缀。
	//obj  包括有属性和值对象   注：每个属名需要用引号括起来。因为有些属性有：-  这个号码
	//$target 如果不空，会调用$target.css() 进行应用。
	/*
	 var objAdd={
		"transform":'rotate(30deg)',
		"transform-origin":'0 100%' 
	};
	B.Utility.Css3SetPrefix(objAdd,$target);
	 */
	B.Utility.Css3SetPrefix=function(obj,$target){
		var prefix=B.CSS3_prefix
		/*if(B.BROWSER.versions.webKit){
			//苹果、谷歌内核
			prefix='-webkit-';
		}else if(B.BROWSER.versions.trident){
			//IE内核
			prefix='-ms-';
		}else if(B.BROWSER.versions.presto){
			//opera内核
			prefix='-o-';
		}else if(B.BROWSER.versions.gecko){
			//火狐内核
			prefix='-moz-';
		}else{
			prefix='';
		}*/
		var returnObj={};
		B.$.each(obj,function(index,item){
			index=prefix+index+'';
			returnObj[index]=item;
			if($target){
			   $target.css(index,item);
			  // B.debug('B.Utility.Css3SetPrefix:',index,item);
			}
		});
		return returnObj;
	}
	//设置显示和透明度
	B.Utility.Css3SetShowAlpha=function($target,alpha){
		$target.css('display','block');
		var strA=B.CSS3_prefix+'opacity';
		$target.css(strA,alpha);
		$target.css('opacity',alpha);
		return $target;
	}
	//是否是数组
	B.Utility.isArray = function(obj) { 
		return Object.prototype.toString.call(obj) === '[object Array]'; 
	} 
	//是否是字符串
	B.Utility.isString=function(str){ 
		return (typeof str=='string')&&str.constructor==String; 
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
	//监听css3Animate动画结束的回调方法。
	B.Utility.css3AnimateEndSetFun=function($target,funDo){
		if(B.BROWSER.versions.webKit){
			//苹果、谷歌内核
			$target.one('webkitAnimationEnd',funDo);
		}else if(B.BROWSER.versions.trident){
			//IE内核
			$target.one('MSAnimationEnd',funDo);
		}else if(B.BROWSER.versions.presto){
			//opera内核
			$target.one('oanimationend',funDo);
		}else if(B.BROWSER.versions.gecko){
			//火狐内核
			$target.one('mozAnimationEnd',funDo);
		}else{
			$target.one('animationend',funDo);
		}
	}
	//监听Transition动画结束的回调方法。
	B.Utility.css3TransitionSetFun=function($target,funDo){
		if(B.BROWSER.versions.webKit){
			//苹果、谷歌内核
			$target.one('webkitTransitionEnd',funDo);
		}else if(B.BROWSER.versions.trident){
			//IE内核
			$target.one('MSTransitionEnd',funDo);
		}else if(B.BROWSER.versions.presto){
			//opera内核
			$target.one('oTransitionEnd',funDo);
		}else if(B.BROWSER.versions.gecko){
			//火狐内核
			$target.one('mozTransitionEnd',funDo);
		}else{
			$target.one('animationend',funDo);
		}
	}
	/**
	 * 图片头数据加载就绪事件 - 更快获取图片尺寸
	 * @version	2011.05.27
	 * @see		http://blog.phpdr.net/js-get-image-size.html
	 * @param	{String}	图片路径
	 * @param	{Function}	尺寸就绪
	 * @param	{Function}	加载完毕 (可选)
	 * @param	{Function}	加载错误 (可选)
	 * @example imgReady('http://www.google.com.hk/intl/zh-CN/images/logo_cn.png', function () {
			alert('size ready: width=' + this.width + '; height=' + this.height);
		});
	 */
	B.Utility.imgReady = (function () {
		var list = [], intervalId = null,

		// 用来执行队列
		tick = function () {
			var i = 0;
			for (; i < list.length; i++) {
				list[i].end ? list.splice(i--, 1) : list[i]();
			};
			!list.length && stop();
		},

		// 停止所有定时器队列
		stop = function () {
			clearInterval(intervalId);
			intervalId = null;
		};
		return function (url, ready, load, error) {
			var onready, width, height, newWidth, newHeight,
				img = new Image();

			img.src = url;

			// 如果图片被缓存，则直接返回缓存数据
			if (img.complete) {
				ready.call(img);
				load && load.call(img);
				return;
			};

			width = img.width;
			height = img.height;

			// 加载错误后的事件
			img.onerror = function () {
				error && error.call(img);
				onready.end = true;
				img = img.onload = img.onerror = null;
			};

			// 图片尺寸就绪
			onready = function () {
				newWidth = img.width;
				newHeight = img.height;
				if (newWidth !== width || newHeight !== height ||
					// 如果图片已经在其他地方加载可使用面积检测
					newWidth * newHeight > 1024
				) {
					ready.call(img);
					onready.end = true;
				};
			};
			onready();
			// 完全加载完毕的事件
			img.onload = function () {
				// onload在定时器时间差范围内可能比onready快
				// 这里进行检查并保证onready优先执行
				!onready.end && onready();

				load && load.call(img);

				// IE gif动画会循环执行onload，置空onload即可
				img = img.onload = img.onerror = null;
			};

			// 加入队列中定期执行
			if (!onready.end) {
				list.push(onready);
				// 无论何时只允许出现一个定时器，减少浏览器性能损耗
				if (intervalId === null) intervalId = setInterval(tick, 40);
			};
		};
	})();//end B.Utility.imgReady
	//在数组里某个值出现的的第一个位置
	B.Utility.ArrayIndexOf=function(arr,val){
		for (var i = 0; i < arr.length; i++) {  
	        if (arr[i] == val) return i;  
	    }  
	    return -1;
	}
	//删除数组里某个值的出现的第一个位置
	B.Utility.ArrayRemov=function(arr,val){
		var index=B.Utility.ArrayIndexOf(arr,val);
		if (index > -1) {
			arr.splice(index, 1);
	    }
	}
	B.Utility.StringReplaceAll=function(str,seachStr,replaceStr){
		return str.replace(new RegExp(seachStr,"gm"),replaceStr);   
	}
	
	//对jquery对象进行z-index值进行排列
	//startIndex
	//$arrItem
	//isAdd  true 自加，  false 自减
	B.Utility.JqueryCssZ_index=function(startIndex,$arrItem,isAdd){
		var _isAdd=isAdd&&true;
		for(var i=0;i<$arrItem.length;i++){
			var z_index=startIndex+i;
			if(!_isAdd){
				z_index=startIndex-i;
			}
			$arrItem[i].css('z-index',z_index);
		}
	}
	//对jquery对象进行z-index值进行排列，排列方法如下：
	//以中心点maxArrIndex  先向左减然后向右减   或  先向右减然后向左减
	//startIndex  开始的z-index值
	//$arrItem    jquery对象值
	//maxArrIndex   中心点
	//isLeftAdd    true  先向左减然后向右减   false  先向右减然后向左减
	B.Utility.JqueryCssZ_indexSortCenterLeftRight=function(startIndex,$arrItem,maxArrIndex,isLeftAdd){
		var _isLeftAdd=isLeftAdd&&true;
		if(maxArrIndex>$arrItem.length-1){
			B.error('B.Utility.JqueryCssZ_index()  maxArrIndex>'+($arrItem.length-1));
			return false;
		}
		if(_isLeftAdd){
			for(var i=maxArrIndex;i>=0;i--){
				$arrItem[i].css('z-index',startIndex);
				startIndex--;
			}
			for(var i=maxArrIndex+1;i<$arrItem.length;i++){
				$arrItem[i].css('z-index',startIndex);
				startIndex--;
			}
		}else{
			for(var i=maxArrIndex;i<$arrItem.length;i++){
				$arrItem[i].css('z-index',startIndex);
				startIndex--;
			}
			for(var i=maxArrIndex-1;i>=0;i--){
				$arrItem[i].css('z-index',startIndex);
				startIndex--;
			}
			
		}
		
	}
	//交换query对象的z-index值，注：前提是它们有值
	//如果设置isCheckItem1MaxSwap 为true就会判断如果第2个，大于第1个时才交换
	B.Utility.JquerySwapZ_index=function($item1,$item2,isCheckItem1MaxSwap){
		//isCheckItem1MaxSwap=isCheckItem1MaxSwap||true;
		var tem=$item1.css('z-index');
		if(!isCheckItem1MaxSwap){
			$item1.css('z-index',$item2.css('z-index'));
			$item2.css('z-index',tem);
		}else{
			var z1=$item1.css('z-index');
			var z2=$item2.css('z-index');
			if(z1<z2){
				$item1.css('z-index',$item2.css('z-index'));
				$item2.css('z-index',tem);
			}
		}
	}
	B.Utility.getRandColor = function() {
		return '#'
				+ ('00000' + (Math.random() * 0x1000000 << 0).toString(16))
						.slice(-6);
	}
	
//扩展--------------------------------end
}//end returnObj.extend
return returnObj;
});