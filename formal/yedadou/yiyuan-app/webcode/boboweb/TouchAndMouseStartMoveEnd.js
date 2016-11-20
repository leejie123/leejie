define('boboweb/TouchAndMouseStartMoveEnd',function(require,exports,module){
var returnObj={};
returnObj.extend=function(B){
//扩展--------------------------------start
	//单个的触摸，鼠标：拖动开始，移动，停止   注：鼠标操作 没有remove
	//$targe 操作目录的jquery对象
	//onOff  1开启触摸，2开启鼠标，3都开启
	//按下开始回调：_funStart(_THIS);
	//按下移动回调：_funMove(_THIS,touch_pageX,touch_pageX,left,top,touch);
	//按下松开回调：_funEnd(_THIS,dx,dy);    //dx dy 分别是离开滑过距离
	B.TouchAndMouseStartMoveEnd=function($target,onOff,funStart,funMove,funEnd){
		var _THIS=this;
		/*单指拖动*/ 
		var _$obj=$target;
		var _onOff=onOff||3;
		var _obj =_$obj.get(0);//document.getElementById('circle');
		var _funStart=funStart||function(a){};
		var _funMove=funMove||function(a,b,c,d,e,f){};
		var _funEnd=funEnd||function(a){};
		var _startX=null;
		var _startY=null;
		var _moveEndX=null;  //移动，最后记录的坐标
		var _moveEndY=null;
		var _touchObjPointX=null;  //离左上解的点的距离
		var _touchObjPointY=null;
		var _currentX=null;//当前坐标
		var _currentY=null;
		//pageX/pageX/clientX/clientY/screenX/screenY：一个数值，动作在屏幕上发生的位置（page包含滚动距离,client不包含滚动距离，screen则以屏幕为基准）。
		var _isOpStart=true;
		var _isStart=false;
		var _fun_touchstart=function(event){
			if (event.targetTouches.length == 1) {
				var touch = event.targetTouches[0]; 
				_currentX=touch.pageX;
				_currentY=touch.pageY;
				_startX=touch.pageX;
				_startY=touch.pageY;
				_touchObjPointX=touch.pageX-B.Utility.cssStrToNum(_$obj.css('left'));
				_touchObjPointY=touch.pageY-B.Utility.cssStrToNum(_$obj.css('top'));
				_isStart=true;
				_funStart(_THIS,event);
			}
		}
		var _fun_touchend=function(event){
			//console.log('touchend..'+event.targetTouches.length);
			var dx=0;
			var dy=0;
			if (_moveEndX!=null) dx=_moveEndX-_startX;
			if (_moveEndY!=null) dy=_moveEndY-_startY;
			_startX=_startY=null;
			_isStart=false;
			_moveEndX=null;
			_moveEndY=null;
			_funEnd(_THIS,dx,dy,event);
		}
		var _fun_touchmove=function(event){
			
			//console.log('touchmove..'+event.targetTouches.length);
			if(!_isOpStart) return;
			if(!_isStart) return;
			// 如果这个元素的位置内只有一个手指的话 
			if (event.targetTouches.length == 1) { 
				event.preventDefault();// 阻止浏览器默认事件，重要 
				var touch = event.targetTouches[0]; 
				var left = (touch.pageX-_touchObjPointX); 
				var top = (touch.pageY-_touchObjPointY); 
				_currentX=touch.pageX;
				_currentY=touch.pageY;
				_moveEndX=touch.pageX;
				_moveEndY=touch.pageY;
				//_$obj.css('left',left);
				//_$obj.css('top',top);
				_funMove(_THIS,touch.pageX,touch.pageX,left,top,touch,event);
			} 
		}
		if(_onOff==1||_onOff==3){
			_obj.addEventListener('touchstart', _fun_touchstart, false); 
			_obj.addEventListener('touchend',_fun_touchend, false); 
			_obj.addEventListener('touchmove',_fun_touchmove, false); 
		}
		if(_onOff==2||_onOff==3){
			_$obj.mousedown(function(e){
				e.preventDefault();// 阻止浏览器默认事件，重要 
			//_$obj.on('mousedown',function(e){
				_isStart=true;
				_startX=e.pageX;
				_startY=e.pageY;
				_currentX=e.pageX;
				_currentY=e.pageY;
				_touchObjPointX=_startX-B.Utility.cssStrToNum(_$obj.css('left'));
				_touchObjPointY=_startY-B.Utility.cssStrToNum(_$obj.css('top'));
				_funStart(_THIS,e);
			});
			_$obj.mouseup(function(e){
				e.preventDefault();// 阻止浏览器默认事件，重要 
			//_$obj.on('mouseup',function(e){
				_startX=_startY=null;
				_isStart=false;
				var dx=0;
				var dy=0;
				if (_moveEndX!=null) dx=_moveEndX-_startX;
				if (_moveEndY!=null) dy=_moveEndY-_startY;
				_moveEndX=null;
				_moveEndY=null;
				_funEnd(_THIS,dx,dy,e);
			});
			_$obj.mousemove(function(e){
				e.preventDefault();// 阻止浏览器默认事件，重要 
			//_$obj.on('mousemove',function(e){
				if(!_isOpStart) return;
				if(!_isStart) return;
				var touch = e; 
				_moveEndX=touch.pageX;
				_moveEndY=touch.pageY;
				_currentX=touch.pageX;
				_currentY=touch.pageY;
				var left = (touch.pageX-_touchObjPointX); 
				var top = (touch.pageY-_touchObjPointY); 
				_funMove(_THIS,e.pageX,e.pageX,left,top,touch,e);
			});
		}
		//
		//点击相对元素左上角的横向距离,注:可能为null;
		this.getTouchTargetXDistance=function(){
			return _touchObjPointX;
		}
		//点击相对元素左上角的纵向距离,注:可能为null;
		this.getTouchTargetYDistance=function(){
			return _touchObjPointY;
		}
		//按下时的开始坐标x,注:可能为null;
		this.getStartX=function(){
			return _startX;
		}
		//按下时的开始坐标y,注:可能为null;
		this.getStartY=function(){
			return _startY;
		}
		//当前鼠标或触点坐标x
		this.getCurrentTouchX=function(){
			return _currentX;
		}
		//当前鼠标或触点坐标y
		this.getCurrentTouchY=function(){
			return _currentY;
		}
		this.getTarget=function(){
			return _$obj;
		}
		//是否开始或停止操作
		this.stopOp=function(isStart){
			_isOpStart=isStart;
		}
		//清除这个对象
		this.remove=function(){
			this.stopOp();
			if(_obj){
				_obj.removeEventListener('touchstart', _fun_touchstart, false); 
				_obj.removeEventListener('touchend',_fun_touchend, false); 
				_obj.removeEventListener('touchmove',_fun_touchmove, false); 
			}
			
		}
	}
//扩展--------------------------------end
}//end returnObj.extend
return returnObj;
});