define('boboweb/BSlide',['boboweb'],function(require,exports,module){
var returnObj={};
returnObj.extend=function(B){
//扩展--------------------------------start
	/**
	 * -------===================================幻灯片=======================----------------
	 */
	/*
	arr=[
		{
			url:'',
			width:0,
			height:0,
			BSlideItemContainer_initW:实际布局宽度,  //如果你把url设置为空的话，需要设置
			BSlideItemContainer_initH:实际布局高度      //如果你把url设置为空的话，需要设置
		},
	];
	bLoadingTipCenter  加载进度条  默认为null
	layoutType 1 叠加，2水平排列  3垂直排列
	fun_init_do null //进入时的回调方法
	fun_end_do null  //离开时的回调方法
	itemStartXInit //整体单元向左或向右偏移的位置。
	BSlideItemLoadImgShowType//如果为插入的是图片。调用了BSlideItemLoadImg，参数showType值
	 */
	//
	B.BSlide=function(arr,width,height,bLoadingTipCenter,layoutType,fun_init_do,fun_end_do,itemStartXInit,BSlideItemLoadImgShowType){
		var THIS=this;
		this.__classType='B.BSlide';
		var _arr=arr;
		var _slideWidth=width;
		var _slideHeight=height;
		var _layoutType=layoutType||1;
		var _nextPreShowCount=1;
		var _bLoadingTipCenter=bLoadingTipCenter||null;
		var fun_end_do=fun_end_do||function(a,b){};
		var fun_init_do=fun_init_do||function(a,b){};
		var _$target=$('<div class=\"BSlide_target\"></div>');
		this.$slideContent=$("<div class=\"BSlide_slideContent\"></div>");
		this.$slideContent.css('position','absolute');
		this.$slideContent.css('left',0);
		this.$slideContent.css('top',0);
		this.$slideContent.appendTo(_$target);
		_$target.css('width',width);
		_$target.css('height',height);
		_$target.css('overflow','hidden');
		this.$target=_$target;
		var _z_index_max=1000;
		var _z_index=_z_index_max;
		//保存所有单个幻灯片
		var _arrSlideItem=[];
		var _itemStartXInit=itemStartXInit||0;
		var _BSlideItemLoadImgShowType=BSlideItemLoadImgShowType||0;
		var _itemStartX=_itemStartXInit;
		//
		var _currentSlideItemIndex=0;
		var _isSlideMoving=false;
		//
		function _init(){
			var slideContent_w=0;
			var slideContent_h=0;
			B.$.each(arr,function(index,item){
				var url=item.url;
				var width=item.width||_slideWidth;
				var height=item.height||_slideHeight;
				var item=THIS.addChild(url,width,height,_bLoadingTipCenter,item.BSlideItemContainer_initW,item.BSlideItemContainer_initH);
				item.url=url;
				if(_layoutType==2){
					slideContent_w+=width;
					if(slideContent_h==0) slideContent_h=height;
				}else if(_layoutType==3){//垂直
					slideContent_h+=height;
					if(slideContent_w==0) slideContent_w=width;
				}
			});
			//这里要$slideContent 的宽和高，如果设置的太小，浏览器会滚动条。
			THIS.$slideContent.css('width',slideContent_w);
			THIS.$slideContent.css('height',slideContent_h);
			//
			var slideItem=_arrSlideItem[0];
			slideItem.start();
			fun_init_do(0,slideItem,THIS);
			_currentSlideItemIndex=0;
			if(_currentSlideItemIndex+1<=_arrSlideItem.length-1){
				var slideItem=_arrSlideItem[_currentSlideItemIndex+1];
				var indexTem=_currentSlideItemIndex+1;
				slideItem.start();
				fun_init_do(indexTem,slideItem,THIS);
			}
			//
		}
		//index,幻灯片下标次数  注：以0开始
		//funNextDo  一次next需要调用的方法，注：这里不需要动画。
		this.setStartIndex=function(index,funNextDo){
			for(var i=0;i<index;i++){
				funNextDo();
			}
			/*
			_currentSlideItemIndex=index;
			if(_layoutType==2){
				THIS.$slideContent.css('left',index*_slideWidth);
			}else if(_layoutType==3){//垂直
				THIS.$slideContent.css('top',index*_slideHeight);
			}
			var item=this.getChildIndex(index);
			item.$target.css('z-index',_z_index_max);
			item.start();
			fun_init_do(index,item,THIS);*/
			
		}
		//是否处于最后一个
		this.getIsPlayEnd=function(){
			return _currentSlideItemIndex==_arrSlideItem.length-1;
		}
		//获得当前开始的设置的z-index值
		this.getStartZ_index=function(){
			return _z_index_max;
		}
		this.getArrChildes=function(){
			return _arrSlideItem;
		}
		this.getChildIndex=function(index){
			if(index>_arrSlideItem.length-1) B.Error('getChildIndex(index) index>'+(_arrSlideItem.length-1));
			return _arrSlideItem[index];
		}
		this.getCurrentShowChild=function(){  //获得当前的显示
			return _arrSlideItem[_currentSlideItemIndex];
		}
		this.getCurrentIndex=function(){//获得当前的游标值
			return _currentSlideItemIndex;
		}
		this.GetIsGetEndIndex=function(){
			//B.debug('isGetEndIndex:',_currentSlideItemIndex,(_arrSlideItem.length-1));
			return _currentSlideItemIndex==_arrSlideItem.length-1;
		}
		this.setItemStartXInit=function(initx){
			_itemStartXInit=initx;
		}
		function _sortItemXY(item,width,height){
			if(_layoutType==2){
				item.$target.css('left',_itemStartX);
				item.$target.css('top',0);
				_itemStartX+=width; //下一个的位置
			}else if(_layoutType==3){//垂直
				item.$target.css('top',_itemStartX);
				item.$target.css('left',0);
				_itemStartX+=height; //下一个的位置
			}else{
				item.$target.css('left',0);
				item.$target.css('top',0);
			}
		}
		this.addChild=function(url,width,height,bLoadingTipCenter,BSlideItemContainer_initW,BSlideItemContainer_initH){
			var item;
			if(url==''){
				item=new B.BSlideItemContainer(width,height,BSlideItemContainer_initW,BSlideItemContainer_initH);
			}else{
				if(B.Utility.isImg(url)){
					item=new B.BSlideItemLoadImg(url,width,height,bLoadingTipCenter,_BSlideItemLoadImgShowType);
				}else{
					item=new B.BSlideItemLoadPage(url,width,height,bLoadingTipCenter);
				}
			}
			item.$target.css('z-index',_z_index);
			_sortItemXY(item,_slideWidth,_slideHeight)
			_z_index--;
			
			_arrSlideItem.push(item);
			THIS.$slideContent.append(item.$target);
			return item;
		}
		var _nextEnd=function(){
			//动画完后，执行的去操作
			if(_currentSlideItemIndex-1>=0){
				var item=_arrSlideItem[_currentSlideItemIndex-1];
				fun_end_do(_currentSlideItemIndex-1,item,THIS);
				//B.debug('_nextEnd:remove:',(_currentSlideItemIndex-1));
				item.end();
			}
			_currentSlideItemIndex++;
			if(_currentSlideItemIndex+1<=_arrSlideItem.length-1){
				var item=_arrSlideItem[_currentSlideItemIndex+1];
				var indexTem=_currentSlideItemIndex+1;
				//B.debug('_nextEnd:start:',(indexTem));
				item.start();
				fun_init_do(indexTem,item,THIS);
			}
			_isSlideMoving=false;
			//B.debug('_nextEnd');
		}//end _nextEnd
		this.next=function(funAnimateDo){
			//B.debug('next..');
			//B.debug('next',_isSlideMoving,(_currentSlideItemIndex+1>_arrSlideItem.length-1));
			if(_isSlideMoving) return false;
			if(_currentSlideItemIndex+1>_arrSlideItem.length-1){
				return false;
			}
			_isSlideMoving=true;
			funAnimateDo(this,_nextEnd);
			return true;
		}
		var _preEnd=function(){
			//动画完后，执行的去操作
			if(_currentSlideItemIndex+1<=_arrSlideItem.length-1){
				var item=_arrSlideItem[_currentSlideItemIndex+1];
				fun_end_do(_currentSlideItemIndex+1,item,THIS);
				//B.debug('_preEnd:remove:',(_currentSlideItemIndex+1));
				item.end();
			}
			_currentSlideItemIndex--;
			if(_currentSlideItemIndex-1>=0){
				var item=_arrSlideItem[_currentSlideItemIndex-1];
				var indexTem=_currentSlideItemIndex-1;
				item.start();
				//B.debug('_preEnd:start:',(indexTem));
				fun_init_do(indexTem,item,THIS);
			}
			_isSlideMoving=false;
		}
		this.pre=function(funAnimateDo){
			//B.debug('pre',_isSlideMoving,(_currentSlideItemIndex-1<0));
			if(_isSlideMoving) return false;
			if(_currentSlideItemIndex-1<0){
				return false;
			}
			_isSlideMoving=true;
			funAnimateDo(this,_preEnd);
			return true;
		}
		this.resize=function(w,h){
			_$target.css('width',w);
			_$target.css('height',h);
			_slideWidth=w;
			_slideHeight=h;
			//如果重新排序,坐标起至设为0
			_itemStartX=_itemStartXInit;
			var arrTem=this.getArrChildes();
			var slideContent_w=0;
			var slideContent_h=0;
			B.$.each(arrTem,function(index,item){
				if(item){
					item.resize(w,h);
					_sortItemXY(item,w,h);
					if(_layoutType==2){
						slideContent_w+=w;
						if(slideContent_h==0) slideContent_h=h;
					}else if(_layoutType==3){//垂直
						slideContent_h+=h;
						if(slideContent_w==0) slideContent_w=w;
					}
				}
			});
			//这里要$slideContent 的宽和高，如果设置的太小，浏览器会滚动条。
			this.$slideContent.css('width',slideContent_w);
			this.$slideContent.css('height',slideContent_h);
		}
		_init();
	}
	//如果是一个空的url，内部将建立一个B.BContainer
	B.BSlideItemContainer=function(toWidth,toHeight,BSlideItemContainer_initW,BSlideItemContainer_initH){
		this.__classType='B.BSlideItemContainer';
		var THIS=this;
		var _container=null;
		this.$target=$('<div id="'+B.getOneDivId()+'"></div>');
		this.$target.css('position','absolute');
		this.$target.css('width',toWidth);
		this.$target.css('height',toHeight);
		this.getContainer=function(){
			return _container;
		}
		//页面开始
		this.start=function(){
			//B.debug('BSlideItemContainer start:',toWidth,toHeight,BSlideItemContainer_initW,BSlideItemContainer_initH);
			_container=new B.BContainer('',BSlideItemContainer_initW,BSlideItemContainer_initH);
			_container.setWH(toWidth,toHeight);
			this.$target.append(_container.$target);
			return true;
		}
		//页面结束
		this.end=function(){
			_container.remove();
			_container=null;
			return true;
		}
		this.resize=function(w,h){
			if(_container!=null){
				_container.setWH(w,h);
			}
			this.$target.css('width',w);
			this.$target.css('height',h);
		}
		return this;
	}//*/
	//幻灯片的的一个元素，它的功能就是加载一个页面 
	B.BSlideItemLoadPage=function(url,toWidth,toHeight,bLoadingTipCenter){
		this.__classType='B.BSlideItemLoadPage';
		var THIS=this;
		var $pageContent=$('<div id="'+B.getOneDivId()+'"></div>');
		$pageContent.css("position", "absolute");
		$pageContent.css('width',width);
		$pageContent.css('height',height);
		var width=toWidth;
		var height=toHeight;
		var _url=url;
		var _$target=$pageContent;
		var _bLoadingTipCenter=bLoadingTipCenter;
		var loadPage=new B.BPageManagement($pageContent);
		loadPage.listenTo(B.BPageManagement.EventError,function(pageManagement,loader, status, xhr){
			//B.debug("自定义：加载页面错误");
			if(_bLoadingTipCenter!=null) _bLoadingTipCenter.loadError();
		});
		loadPage.listenTo(B.BPageManagement.EventTryAgain,function(pageManagement,loader, status, xhr){
			//B.debug("自定义：加载页面重试");
		});
		loadPage.listenTo(B.BPageManagement.EventSuccess,function(pageManagement,loader, status, xhr){
			//B.debug("自定义：加载页面成功");
			if(_bLoadingTipCenter!=null) _bLoadingTipCenter.setVisible(false);
			$pageContent.css('width',width);
			$pageContent.css('height',height);
			loadPage.$currentLoadContentJS.BOBOLIB_setWH(width,height);
		});
		loadPage.listenTo(B.BPageManagement.EventProgress,function(pageManagement,preLoadq,loaded,loadTotal){
			//B.debug("自定义：页面资源预加载进度:",pageManagement,preLoadq,loaded,loadTotal);
			if(_bLoadingTipCenter!=null) _bLoadingTipCenter.setVisible(true,loaded,loadTotal);
		});
		var _url=url;
		var _isStart=false;
		this.$target=_$target;
		//页面开始
		this.start=function(){
			if(_isStart) return false;
			//B.debug('start run',_url);
			loadPage.load(_url);
			_isStart=true;
			return true;
		}
		//页面结束
		this.end=function(){
			if(!_isStart) return false;
			//B.debug('end run',_url);
			_isStart=false;
			loadPage.stopLoad();
			$pageContent.empty();
			//loadPage.loaderKill();
			return true;
		}
		this.resize=function(w,h){
			$pageContent.css('width',w);
			$pageContent.css('height',h);
			loadPage.$currentLoadContentJS.BOBOLIB_setWH(w,h);
			width=w;
			height=h;
		}
		return this;
	}
	//幻灯片的的一个元素，它的功能就是加载一张图片.
	//url地址
	//toWidth,toHeight  宽高
	//bLoadingTipCenter 全局加载的进度条
	//showType 显图片的形式 默认0  通过background-image设置图片  1或其它值 插入一个img
	B.BSlideItemLoadImg=function(url,toWidth,toHeight,bLoadingTipCenter,showType){
		this.__classType='B.BSlideItemLoadImg';
		var _$target;
		var _url=url;
		var width=toWidth;
		var height=toHeight
		var _showType=showType||0;
		var _bLoadingTipCenter=bLoadingTipCenter;
		_$target=$('<div id="'+B.getOneDivId()+'" class="BOBOLIB_BImage"></div>');
		_$target.css('width',width);
		_$target.css('height',height);
		if(_bLoadingTipCenter!=null) _bLoadingTipCenter.setVisible(false);
		this.$target=_$target;
		//页面开始
		this.start=function(){
			if(_showType==0){
				_$target.css("background-image","url("+_url+")");
			}else{
				_$target.html('<img src="'+_url+'" style="text-align: center;max-width:'+width+'px;">');
			}
			
		}
		//页面结束
		this.end=function(){
			if(_showType==0){
				_$target.css("background-image",null);
			}else{
				_$target.html('');
			}
			
		}
		this.resize=function(w,h){
			_$target.css('width',w);
			_$target.css('height',h);
			width=w;
			height=h;
		}
		return this;
	}
//扩展--------------------------------end
}//end returnObj.extend
return returnObj;
});