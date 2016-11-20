var a=1454646464;
define('boboweb/ui/UITip',function(require,exports,module){
	var returnObj={};
returnObj.extend=function(B){
//扩展--------------------------------start
	B.UITip=function(themeType,lockLayerColor,lockLayerAlpha){
		var THIS=this;
		var _waitType=1;
		if(typeof(themeType)=='undefined') themeType=100;
		lockLayerColor=lockLayerColor||"#000";
		lockLayerAlpha=lockLayerAlpha||.8;
		var lockLayout=new B.BPopup(B.$body,{  //保存当前弹出引用
			lockLayerColor : lockLayerColor,
			lockLayerAlpha : lockLayerAlpha,
			cssPosition:'fixed'
		});
		var $currentAfterTarget;
		this.changeThemeType=function(type,waitType){
				themeType=type;
				_waitType=waitType;
		}
		this.getThemeType=function(){
			return themeType;
		}
		var _popupWait=null; //保存当前等待的引用。防止多次生成
		var _popupWaitTip=null;
		/**
		 * 显示一个加载动画
		 * @param  {[type]} t     动画类型 1 大的旋转 2吃豆人 3小的旋转
		 * @param  {[type]} showt 显示方式：1 弹出锁屏 2 加到目标节点后面
		 * @param  {[type]} $afterTarget  如果显示方式设置2,需要这里设置加到哪个目标节点后面
		 * @return {[type]}       [description]
		 */
		this.popupWait=function(t,showt,$afterTarget){
			if(_popupWait) return;
			var type=t||_waitType;
			var strDiv;
			var $strDiv;
			var showtype=showt||1;
			switch(type){
			case 2://吃豆人
				strDiv='<div><div class="pacman">';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='</div></div>';
				$strDiv=$(strDiv);
				break;
			case 3://在文档底部加上旋转加载的动画
				strDiv='<div><div class="loader-inner ball-spin-fade-loader">';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='</div></div>';
				$strDiv=$(strDiv);
				$strDiv.css(B.CSS3_prefix+'transform','scale(0.5,0.5)');
				break;
			default://普通的旋转加载
				strDiv='<div><div class="loader-inner ball-spin-fade-loader">';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='<div></div>';
				strDiv+='</div></div>';
				$strDiv=$(strDiv);
				break;
			}
			if(showtype==1){
				_popupWait=new B.BBase($strDiv,{dockType:9,resizeW:0,resizeH:0,offsetX:0,offsetY:0,cssPosition:'fixed'});
				lockLayout.popup(_popupWait).click(function(e){e.preventDefault();});
			}else{
				if($afterTarget){
					$afterTarget.after($strDiv);
					$currentAfterTarget=$strDiv;
				}
			}
			return $strDiv;
		}
		this.close=function(){
			if(lockLayout) lockLayout.reomveLockLayer();
			if($currentAfterTarget) $currentAfterTarget.remove();
			_popupWait=null;
		}
		this.select=function(type,head,msg,doFun,tip1,tip2){
			var html='';
			if(type==1){
				tip1=tip1||'是';
				tip2=tip2||'否';
				//confirm
				switch(themeType){
					case 1:
						html+='<div class="boboPanel clearfix" style="width:30%">';
						html+='    <div class="bheader">';
						html+='	        <div class="btitle">'+head+'</div>';
						html+='	        <a href="" class="bclose"><b></b></a>';
						html+='     </div>';
						html+='     <div class="btitle">';
						html+=msg;
						html+='     </div>';
						html+='     <div class="bfooter">';
						html+='     <a href="#" class="boboBtn boboCol3 boboBakBlue">'+tip1+'</a><a href="#" class="boboBtn boboCol3 boboPullRight boboBakRed">'+tip2+'</a>';
						break;
					case 2:
						html+='<div class="boboPanel clearfix">';
						html+='    <div class="bheader">';
						html+='	        <div class="btitle">'+head+'</div>';
						html+='	        <a href="" class="bclose"><b></b></a>';
						html+='     </div>';
						html+='     <div class="btitle">';
						html+=msg;
						html+='     </div>';
						html+='     <div class="bfooter">';
						html+='     <a href="#" class="boboBtnBlock boboBakBlue bbtn clearfix">'+tip1+'</a><a href="#" class="boboBtnBlock boboBakRed bbtn clearfix">'+tip2+'</a>';
						break;
					default:
						html+='<div class="boboPanel clearfix">';
						html+='     <div class="btitle">';
						html+=msg;
						html+='     </div>';
						html+='     <div class="bfooter">';
						html+='     <a href="#" class="boboBtn3 boboCol40 boboBakBlue">'+tip1+'</a><a href="#" class="boboBtn3 boboCol40 boboPullRight boboBakRed">'+tip2+'</a>';
						break;
				}
				html+='     </div>';
				html+='</div>';
			}else{
				tip1=tip1||'好的';
				//alert
				switch(themeType){
				case 1:
					html+='<div class="boboPanel clearfix" style="width:30%">';
					html+=	'<div class="bheader">';
					html+=		'<div class="btitle">'+head+'</div>';
					html+=			'<a href="" class="bclose"><b></b></a>';
					html+=		'</div>';
					html+=	'<div class="btitle">';
					html+=msg;
					html+=	'</div>';
					html+=	'<div class="bfooter">';
					html+=		'<a href="#" class="boboBtn boboBakBlue boboCol3 boboPullCenter">'+tip1+'</a>';
					break;
				case 2:
					html+='<div class="boboPanel clearfix">';
					html+=	'<div class="bheader">';
					html+=		'<div class="btitle">'+head+'</div>';
					html+=			'<a href="" class="bclose"><b></b></a>';
					html+=		'</div>';
					html+=	'<div class="btitle">';
					html+=msg;
					html+=	'</div>';
					html+=	'<div class="bfooter">';
					html+=		'<a href="#" class="boboBtn boboBakBlue bbtn boboPullCenter">'+tip1+'</a>';
					break;
				default:
					html+='<div class="boboPanel clearfix">';
					html+=	'<div class="btitle">';
					html+=msg;
					html+=	'</div>';
					html+=	'<div class="bfooter">';
					html+=		'<a href="#" class="boboBtn boboBakBlue bbtn boboPullCenter">'+tip1+'</a>';
					break;
				}
				html+=	'</div>';
				html+='</div>';
			}
			var $div=$(html);
			$div.find('.bclose').click(function(e){
				e.preventDefault();
				THIS.close();
				if(doFun) doFun(100);
			});
			$div.find('.bfooter>a').click(function(e){
				e.preventDefault();
				var $this=$(this);
				THIS.close();
				if(doFun) doFun($this.index());
			});
			var bTip=new B.BBase($div,{dockType:9,resizeW:0,resizeH:0,offsetX:0,offsetY:0,cssPosition:'fixed'});
			lockLayout.popup(bTip);
			return bTip.$target;
		}
		this.popup=function(bbase){
			lockLayout.popup(bbase);
			return bbase.$target;
		}
		this.alert=function(head,msg,doFun,tip1,tip2){
			this.select(0,head,msg,doFun,tip1,tip2);
			return this;
		}
		this.confirm=function(head,msg,doFun,tip1,tip2){
			this.select(1,head,msg,doFun,tip1,tip2);
			return this;
		}
		this.popupWebUrl=function(head,url,doFun,height,width){
			var html='';
			if(height==undefined) height=$(window).height();
			if(width==undefined) width='90%';
			var iframeH=height-100;
			html+='<div class="boboPanel clearfix" style="width:'+width+';">';
			html+=	'<div class="bheader">';
			html+=		'<div class="btitle">'+head+'</div>';
			html+=		'<a href="" class="bclose"><b></b></a>';
			html+=	'</div><div class="clearfix" style="height:'+iframeH+'px;overflow-y: scroll;-webkit-overflow-scrolling:touch;">';
			html+=	'<iframe class="clearfix" name="top-container" width="100%" height="1000" hspace="0" vspace="0" frameborder="0" scrolling="scroll" src="'+url+'"></iframe>';
			html+='</div></div>';
			var $div=$(html);
			$div.find('.bclose').click(function(e){
				e.preventDefault();
				THIS.close();
				if(doFun) doFun();
			});
			$div.find('iframe').load(url,function(){
				var $this=$(this);
				var document=$(this).prop('contentWindow').document;
		        if(document) {
		            $this.height(document.body.scrollHeight);
		         }
			});
			var bTip=new B.BBase($div,{dockType:9,resizeW:0,resizeH:0,offsetX:0,offsetY:0,cssPosition:'fixed'});
			lockLayout.popup(bTip);
			return bTip.$target;
		}
		this.shortAlert=function(tip,time,funCloseDo,w,h){
			new this.ClassShortAlert().show(tip,time,funCloseDo,w,h);
		}
		/**
		 * 短暂的提示框:注需要new
		 * @param  {[type]} $container [description]
		 * @return {[type]}            [description]
		 */
		this.ClassShortAlert=function($container){
			var THIS=this;
			$window=$(window);
			var _$container=$container||$(body);
			var _$tip=null;
			var clearTimeout_index=0;
			this.close=function(){//删除
				if(_$tip!=null){
					clearTimeout(clearTimeout_index);
					_$tip.remove();
					_$tip=null;
				}
			}
			/**
			 * 显示一个延时弹框
			 * @param  string tip        提示
			 * @param  number time       多久关闭，默认为2000
			 * @param  function funCloseDo 关闭会掉函数
			 * @param  number h          高度，默认为40
			 * @param  number w          宽度，默认为自动
			 * @return {[type]}            [description]
			 */
			this.show=function(tip,time,funCloseDo,w,h){//显示
				THIS.close();
				h=h||40;
				time=time||3000;
				_$tip=$('<div>'+tip+'</div>');
				_$tip.css('position','fixed');
				_$tip.css('color','#fff');
				_$tip.css('background-color','#666');
				_$tip.css('text-align','center');
				_$tip.css('padding','5px 20px');
				_$tip.css('border-radius','5px');
				_$tip.css('font-size','14px');
				_$container.append(_$tip);
				w=w||_$tip.width();
				w+=25;
				//console.log(w,$window.width());
				var x=($window.width()-w)/2;
				var y=($window.width()-h)/2;
				_$tip.css('left',x);
				_$tip.css('top',y);
				clearTimeout_index=setTimeout(function(){
					THIS.close();
					if(funCloseDo) funCloseDo(THIS);
				},time);
			}
		}
	}
//扩展--------------------------------end
}//end returnObj.extend
return returnObj;
});