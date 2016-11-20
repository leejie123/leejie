define('boboweb/BFlyToTarget',function(require,exports,module){
var returnObj={};
returnObj.extend=function(B){
//扩展--------------------------------start
	/**
	 * 复制一个目标，飞到别外一个目标上。注：需要一个css3 transition对象定义。 
	 * @param {[type]} $target             要飞到的目标对象
	 * @param {[type]} $targetW             要飞到的目标对象宽
	 * @param {[type]} $targetH             要飞到的目标对象高
	 * @param {[type]} $targetLeft             要飞到的目标对象left
	 * @param {[type]} transitionClassName css3 transition对象定义名
	 * @param {[type]} options             [description]
	 *
	 */
	B.BFlyToTarget=function($target,targetW,targetH,targetLeft,transitionClassName,options){
		transitionClassName=transitionClassName||'BFlyToTarget-defaultTransition';
		var defaults = {
			'opacity':0.8
		};
		var opts = B.$.extend(defaults, options);
		var _toOffset; //移动到的目标
		var _transitionClassName=transitionClassName;
		this.reSetTarget=function($target,targetW,targetH,targetLeft){
			this.$target = $target;
			_toOffset={width:targetW,height:targetH,left:targetLeft};
		}
		/**
		 * 复制当前目标并飞出
		 * @param  {[type]} $fromeTarget 当前目标
		 * @return {[type]}              复制的对象
		 */
	    this.fly=function($fromeTarget){
	    	var cloneOffset=$fromeTarget.offset();
	    	var cloneDiv=$fromeTarget.clone();
	    	cloneDiv.css('position','absolute');
		    B.Utility.Css3SetShowAlpha(cloneDiv,opts.opacity);
		    cloneDiv.css('top',cloneOffset.top+'px');
		    cloneDiv.css('left',cloneOffset.left+'px');
	        cloneDiv.css('width',cloneOffset.width+'px');
	        cloneDiv.css('height',cloneOffset.height+'px');
		    cloneDiv.addClass(_transitionClassName);
		    B.Utility.css3TransitionSetFun(cloneDiv,function(){
		    	cloneDiv.remove();
		    });
		    $fromeTarget.parent().append(cloneDiv);
		    function gotoFun(){
		        var t =document.documentElement.scrollTop||document.body.scrollTop;
		        t+=$(window).height();
		        var left=_toOffset.left+_toOffset.width/2;
		        console.log(_toOffset);
		        var targetH=_toOffset.height/2;
		        t-=targetH;
		        if(!t||!left) console.log('error!','t:'+t,'left:'+left);
		        
		        cloneDiv.css('top',t+'px');
		        cloneDiv.css('left',left+'px');
		        cloneDiv.css('width','1px');
		        cloneDiv.css('height','1px');
		    }
		    setTimeout(gotoFun,5); //延时执行
		    return cloneDiv;
	    }
	    //init
	    this.reSetTarget($target,targetW,targetH,targetLeft);
	}
//扩展--------------------------------end
}//end returnObj.extend
return returnObj;
});