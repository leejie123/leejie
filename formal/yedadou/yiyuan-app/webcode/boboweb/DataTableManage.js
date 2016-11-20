define('boboweb/DataTableManage',function(require,exports,module){
var returnObj={};
returnObj.extend=function(B){
//扩展--------------------------------start
	/**
	 * 数据表
	 * @param {[type]} data [description]
	 * @param {[type]} $tableContainer   [description]
	 * 原理提示：
	 * 1.每一行有一个隐藏的div保存有该行的所有数据的json字符串
	 * 2.所有内容调用用到的class名，都有这个名称为前缀:.BDataTable_
	 */
	B.DataTableManage=function(url,templet,$tableContainer,location,ui,uiWait,uiWaitRemove){
		//console.log('DataTableManage init..');
		//
		this.__classType='DataTable';
		var THIS=this;
		var _templet=templet;
		THIS.DO_TYPE_ROW=1;//行自定义操作
		THIS.DO_TYPE_PAGE=2;//翻页操作
		THIS.DO_TYPE_BAT=3;//批量操作
		THIS.DO_TYPE_SEARCH=4;//搜索操作
		//init
		var _isAjax=false;
		function ajax(doSuccess,data){//注:已集成THIS.render(toData);
			if(_isAjax===true) return;
			_isAjax=true;
			uiWait();
			var sendData=data||'';
			$.ajax({
				url:url,
				data:sendData,
				type:'post',
				error:function(){
					_isAjax=false;
					uiWaitRemove();
					ui.alert('错误',url+'连接超时！');
				},
				success:function(data){
					_isAjax=false;
					var toData=null;
	                try{
	                  toData=$.parseJSON(data);
	                  uiWaitRemove();
	                  //console.log(data);
	                }catch(e){
	                  ui.alert('错误',url+'数据格式错误！');
	                  return;
	                }
	                THIS.render(toData);
	                if(doSuccess) doSuccess(toData);
	                
				}
			});//end $.ajax
		}
		ajax();
		





		function getPageDataItem(page,pageCount,offset,urlPrefix){
			var tem=page+offset
			if(tem>0&&tem<=pageCount){
				return tem;
			}
			return false;
		}
		this.render=function(data){
			if(_templet==''){
				console.log('B.DataTableManage::render():: _templet is empty!!');
				return;
			}
			//如果存在alertMsg
			if('alertMsg' in data){
				ui.alert('提示',data['alertMsg']);
			}
			//格式化出：需要的数据格式
			var _data=data;
			var tableTheadData=[];//行的字段名
			var tableRowShowKey=[];//从每一条记录里获得需要显示的下标属性
			for(var key in _data.tableThead){
				tableTheadData.push(_data.tableThead[key]);
				tableRowShowKey.push(key);
			}
			_data.tableTheadData=tableTheadData;//行的字段名
			_data.tableRowShowKey=tableRowShowKey;
			_data.colsCount=tableTheadData.length+3;
			_data.dataRowJson=[];
			//格式化模板需要的按钮数据
			var page=parseInt(_data.page);
			var currentPage=page;//当前页
			var pageSize=_data.pageSize;
			var pageCount=_data.pageCount;
			var starIndex=(page-1)*pageSize;//编号开始处
			_data.starIndex=starIndex+1;
			var prePage=page-1<1?1:page-1;
			var nextPage=page+1>pageCount?pageCount:page+1;
			//设置翻页数据
			_data.pageBtnPreUrl=prePage;
			_data.pageBtnNextUrl=nextPage;
			_data.pageBtns=[];
			var temData=getPageDataItem(page,pageCount,-2,url);
			if(temData!==false) _data.pageBtns.push(temData);//当前页前2页
			temData=getPageDataItem(page,pageCount,-1,url);
			if(temData!==false) _data.pageBtns.push(temData);//当前页前1页
			 _data.pageBtns.push(getPageDataItem(page,pageCount,0,url));//当前页
			 temData=getPageDataItem(page,pageCount,1,url);
			if(temData!==false) _data.pageBtns.push(temData);//当前页后1页
			 temData=getPageDataItem(page,pageCount,2,url);
			if(temData!==false) _data.pageBtns.push(temData);//当前页后2页


			var cTem=_data.data.length;
			for(var i=0;i<cTem;i++){
				_data.dataRowJson.push(JSON.stringify(_data.data[i]));
			}
			var html=B.template(_templet,_data);
			var $html=$(html);
			//每一行的处理
			$html.find('.BDataTable_row').each(function(index,item){
				var $this=$(this);
				//console.log('html:'+$this.html());
				var strJson=$this.find('.BDataTable_datajson').html();
				//var checkRow=$this.find('.checkRow').prop('checked');
				//console.log('strJson:'+strJson);
				try{
					var rowData=JSON.parse(strJson);
					//console.log(rowData);
					var $BDataTable_diyop=$this.find('.BDataTable_diyop');
					$BDataTable_diyop.data('BDataTable_rowData',rowData);
					$BDataTable_diyop.click(function(e){
						e.preventDefault();
						var $thisA=$(this);
						var rowData=$thisA.data('BDataTable_rowData');
						var label=$thisA.html();
						var url=$thisA.data('url');
						if(url.indexOf('http://')!=-1||url.indexOf('https://')!=-1){
							var queryString=B.Utility.toQueryString(rowData);
							if(queryString!='') url+='?'+queryString;
							location.href=url;
							return;
						}
						var obType=$thisA.data('type');
						var opData={
							label:label,
							url:url,
							type:obType
						};
						function go(){
							//console.log(rowData);
							//console.log(opData);
							var ajaxData={
								type:THIS.DO_TYPE_ROW,
								rowData:rowData,
								opData:opData,
								page:currentPage
							};
							ajax(null,ajaxData);
						}
						var confirm=$thisA.data('confirm');
						if(confirm!=undefined){
							ui.confirm('请确认',confirm,function(index){
								if(index==0) go();
							});
						}else{
							go();
						}

						
					});//end $this.find('.BDataTable_diyop')
				}catch(e){
					B.error('find .BDataTable_diyop error! row index:'+$this.index());
				}
			});//end $html.find('.BDataTable_row')
			//翻页
			$html.find('.BDataTable_pagebtns li>a').each(function(index,item){
				var $this=$(this);
				var page=$this.data('page');
				if(page==undefined){
					$this.click(function(e){
						e.preventDefault();
						var $goPageTxt=$html.find('#goPageTxt');
						page=$goPageTxt.val();
						page=parseInt(page);
						if(!page||page==''){
							$goPageTxt.val('');
							return;
						}
						if(page>pageCount){
							ui.alert('错误','过了最大页数！');
							return;
						}
						var ajaxData={type:THIS.DO_TYPE_PAGE,page:page};
						ajax(null,ajaxData);
					});//end click
				}else{
					//跳页
					$this.click(function(e){
						e.preventDefault();
						var ajaxData={type:THIS.DO_TYPE_PAGE,page:page};
						ajax(null,ajaxData);
					});//end click
				}
				
			});//end $html.find('.BDataTable_pagebtns li>a')
			//全选
			$html.find('.checkAll').click(function(e){
				var $this=$(this);
				$html.find('.checkRow').prop('checked',$this.prop('checked'));
			});
			//搜索
			$html.find('#searchBtn').click(function(e){
				e.preventDefault();

				var keyword=$html.find('#searchKey').val();
				var ajaxData={type:THIS.DO_TYPE_SEARCH,page:currentPage,keyword:keyword};
				ajax(null,ajaxData);

			});
			//批处理
			$html.find('#BDataTable_batOpSelectBtn').click(function(e){
				e.preventDefault();
				var $select=$html.find('#BDataTable_batOpSelect');
				var value=$select.val();
				//console.log('value:'+value);
				if(value==0) return;
				var confirm=undefined;
				//console.log($select.find('option'));
				$select.find('option').each(function(index,item){//遍历寻找当前选重的option
					var $item=$(item);
					//console.log(value,$item.val());
					if(value==$item.val()){
						if(confirm==undefined) confirm=$item.data('confirm');
					}
				});
				//console.log('bat:'+value,'confirm:'+confirm);
				function go(){
					var arrCheckData=[];
					$html.find('.checkRow').each(function(index,item){
						var $thisTem=$(this)
						if($thisTem.prop('checked')){
							var id=$thisTem.data('id');
							arrCheckData.push(id);
						}
						//console.log(index,id);
					});
					var ajaxData={
						type:THIS.DO_TYPE_BAT,
						value:value,
						ids:arrCheckData,
						page:currentPage
					};
					ajax(null,ajaxData);
				}//end go
				if(confirm!=undefined){
					ui.confirm('请确认',confirm,function(index){
						if(index==0) go();
					});
				}else{
					go();
				}

			});//end $html.find('#BDataTable_batOpSelectBtn')
			//
			$tableContainer.empty();
			$tableContainer.append($html);
		}//end this.render

	}

//扩展--------------------------------end
}//end returnObj.extend
return returnObj;
});