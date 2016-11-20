define('boboweb/ScrollDownPage',function(require,exports,module){
var returnObj={};
returnObj.extend=function(B){
	//扩展--------------------------------start
		/**
		 * 向下滚动到底，异步读取下页的数据
		 * @param {[type]} urlPageList [description] 连接地址
		 * @param {[type]} loadendDo   [description] 加载成的回调方法 格式：function(data,obj){}  注：data格式已转化,实例化的ScrollDownPage对象
		 * @param {[type]} uiTip       [description] boboweb ui实例
		 * @param {[type]} $uiWaitParent       [description] 等待提示显示到的父级。注：默认为$body
		 * @param {[type]} $uiWaitClassName       [description] 自定义等待提示的css样式类名。注：默认为：width:10px,margin:25px auto;
		 */
		B.ScrollDownPage=function(urlPageList,loadendDo,uiTip,$uiWaitParent,$uiWaitClassName){
				var $window=B.$window;
				var $body=B.$window;
				var app=uiTip;
				var currentPage=0;
				$waitParent=$uiWaitParent&&B.$body;
				$uiWaitClassName=$uiWaitClassName&&'';
				var _isStop=false;
				function showAppWait(){ //节点后面加一个加载的动画条
					var $wait=app.popupWait(3,2,$waitParent);
					$wait.css('display','block');
					if($uiWaitClassName==''){
						$wait.css('width','10px');
						$wait.css('margin','25px auto');
					}else{
						$wait.addClass($uiWaitClassName);
					}
				}
				//翻页
				var currentPage=0;
				function loadList(page){
					B.debug('loadList:'+page);
					if(currentPage==page) return;
					isLoadList=true;
					showAppWait();
					currentPage=page;
					url=urlPageList;
					$.ajax({
						url:url,
						data:{page_no:page},
						success: function(data){
							app.close();
							isLoadList=false;
							var toData={};
							try{
								toData=$.parseJSON(data);
							}catch(e){
								B.error('json_decode error!! data is:'+data);
							}
							if(loadendDo) loadendDo(toData,this);
						},
						error:function(){
							app.close();
							B.error('网络超时,请重试！#1');
							isLoadList=false;
						}
					});
				}
				loadList(1);
				var isLoadList=true;
				var isPageEnd=false;
				this.stop=function(){
					isPageEnd=true;
					window.onscroll=null;
				}
				this.start=function(){
					isPageEnd=false;
					window.onscroll=doScroll;
				}
				this.changUrl=function(url){
					urlPageList=url;
				}
				this.getUrl=function(){
					return urlPageList;
				}
				function doScroll(){
					//B.debug('doScroll...');
					//变量t就是滚动条滚动时，到顶部的距离
					var windowScrollEndy=document.documentElement.scrollHeight||document.body.scrollHeight;
					windowScrollEndy-=30;
					var viewHeight=document.documentElement.clientHeight||document.body.clientHeight;
					var t =document.documentElement.scrollTop||document.body.scrollTop;
					t+=viewHeight;

					if( t >=windowScrollEndy) {
						B.debug(isPageEnd);
						B.debug(isLoadList);
						B.debug(currentPage);
						if(isPageEnd) app.close();
						if(isLoadList||isPageEnd){
							return;
						}
						loadList(currentPage+1);
					}
				}
				this.start();
		}
	//扩展--------------------------------end
		
};//end returnObj.extend
return returnObj;
});