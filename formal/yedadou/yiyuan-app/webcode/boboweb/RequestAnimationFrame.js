define('boboweb/RequestAnimationFrame',function(require,exports,module){
var returnObj={};
returnObj.extend=function(B){
//扩展--------------------------------start
	//------------定义RequestAnimationFrame
	//执行：B.setRequestAnimationFrame() 后。
	//就可以调用requestAnimationFrame   取消cancelAnimationFrame
	B.setRequestAnimationFrame=function() {
	    var lastTime = 0;
	    var vendors = ['webkit', 'moz', 'ms'];
	    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
	        window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
	        window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] ||    // name has changed in Webkit
	                                      window[vendors[x] + 'CancelRequestAnimationFrame'];
	    }

	    if (!window.requestAnimationFrame) {
	        window.requestAnimationFrame = function(callback, element) {
	            var currTime = new Date().getTime();
	            var timeToCall = Math.max(0, 16.7 - (currTime - lastTime));//16.7 = 1000 / 60, 即每秒60帧
	            var id = window.setTimeout(function() {
	                callback(currTime + timeToCall);
	            }, timeToCall);
	            lastTime = currTime + timeToCall;
	            return id;
	        };
	    }
	    if (!window.cancelAnimationFrame) {
	        window.cancelAnimationFrame = function(id) {
	            clearTimeout(id);
	        };
	    }
	}
//扩展--------------------------------end
}//end returnObj.extend
return returnObj;
});