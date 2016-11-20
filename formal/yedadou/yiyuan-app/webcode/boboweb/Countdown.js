define('boboweb/Countdown',function(require,exports,module){
var returnObj={};
returnObj.extend=function(B){
//扩展--------------------------------start
	//等待一段时间执行一个方法。
	/**
	 * 构造函数
	 * @param {[type]} second     剩余的秒数
	 * @param {[type]} doInterval 每millisec毫秒回调一次:格式如下：function(小时,分,秒,毫秒,Countdown对象)
	 * @param {[type]} millisec   内部setInterval调用的毫秒次数。注：默认为100
	 */
	B.Countdown=function(second,doInterval,millisec){
		this.__classType='Countdown';
		var _millisec=millisec||100;
		var _indexSetInterval=0;
		var _startMillisecond=0;
		var _millisecond=second*1000;//剩余时间毫秒
		this.stop=function(){
			clearSetInterval(_indexSetInterval);
			_indexSetInterval=0;
		}
		this.start=function(){
			if(_indexSetInterval!=0) return;
			_startMillisecond=(new Date()).getTime();
			_indexSetInterval=setInterval(function(){
				var now=(new Date()).getTime();
				var t=_millisecond-(now-_startMillisecond);
				var h,m,s,ms;
				var ts=t/1000;
				h=Math.floor(ts/3600);
				ts-=h*3600;
				m=Math.floor(ts/60);
				ts-=m*60;
				s=Math.floor(ts);
				ms=Math.floor((ts-s)*100);
				//console.log(h,m,s,ms);
				doInterval(h,m,s,ms,this);
			},_millisec);
		}
	}
//扩展--------------------------------end
}//end returnObj.extend
return returnObj;
});