define('boboweb/BDelay',function(require,exports,module){
var returnObj={};
returnObj.extend=function(B){
//扩展--------------------------------start
	//等待一段时间执行一个方法。
	B.BDelay=function(timeEnd,funDo){
		this.__classType='BDelay';
		var _THIS=this;
		var _timeEnd=timeEnd;
		function _doTimeEnd(){
			funDo(_THIS);
			if(_funEndDo!=null) _funEndDo(_THIS);
		}
		var _idNo=-10000;
		var _id=_idNo;
		var _funEndDo=null;
		//必须执行这个才开始。  funEndDo是别外一个时间到了可以执行的回调方法。可以设置为空.B.BDelayQueue有用到。
		this.start=function(funEndDo){
			_id=setTimeout(_doTimeEnd,timeEnd);
			_funEndDo=funEndDo;
		}
		this.stop=function(){
			if(_id==_idNo){
				//B.debug("BDelay no start..");
				return;
			}
			clearTimeout(_id);
		}
		this.getEndTime=function(){
			return _timeEnd;
		}
	}
	//BDelay运行队列 
	//arrBDelay   BDelay对象数组,注：也可以直接是function
	B.BDelayQueue=function(arrBDelay){
		this.__classType='BDelayQueue';
		var _THIS=this;
		var _arrBDelay=arrBDelay;
		var _arrBDelay_index=0;
		var _currentBDelay=_arrBDelay[_arrBDelay_index];
		function nextDo(){
			_arrBDelay_index++;
			//B.debug('pageAnmiate.1. nextDo:'+_arrBDelay_index,_arrBDelay.length);
			if(_arrBDelay_index>=_arrBDelay.length){
				_arrBDelay_index--;
				return false;
			}
			return true;
		}
		function _currentBDelay_enddo(d){
			if(!nextDo()) return;
			_currentBDelay=_arrBDelay[_arrBDelay_index];
			if(typeof(_currentBDelay)=="function"){
				_currentBDelay();
				if(nextDo()){
					_currentBDelay=_arrBDelay[_arrBDelay_index];
					_currentBDelay.start(_currentBDelay_enddo);
				}
			}
			_currentBDelay=_arrBDelay[_arrBDelay_index];
			//B.debug(_currentBDelay,_arrBDelay_index,_arrBDelay.length);
			_currentBDelay.start(_currentBDelay_enddo);
			
		}
		//init
		_currentBDelay.start(_currentBDelay_enddo);
		//停止运行
		this.stop=function(){
			_currentBDelay.stop();
		}
		//当前运行到哪一个了
		this.getCurrentRunIndex=function(){
			return _arrBDelay_index;
		}
	}
//扩展--------------------------------end
}//end returnObj.extend
return returnObj;
});