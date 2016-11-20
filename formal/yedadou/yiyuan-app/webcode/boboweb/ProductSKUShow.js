define('boboweb/ProductSKUShow',function(require,exports,module){
var returnObj={};
returnObj.extend=function(B){
//扩展--------------------------------start
	/**
	 * 显示sku,
	 * 数据格式参考：
	 * var proprity=[
				  ['颜色','容量','库存','价格'],
				  ['红色','16',10,16],
				  ['蓝色','20',5,18],
				  ['白色','16',5,18]
				];
	    var proprity2=[
		  ['材质','型号','模板','库存','价格'],
		  ['玻璃','A','清新',10,16],
		  ['铝','B','清新',5,18],
		  ['仿木','C','高雅',5,18]
		];
	 * 思路：
	 * 1.格式化成一行一行显示，并去除重复。并保存该属性对应可先的属性值。
	 * 2.把每一行抽象为一个类。
	 * 3.初始化时,把显示的一个sku按钮$对象，用对象key的形式，缓存起来。方便后边，便利显示或隐藏。
	 * @param {[type]} dataProprity [description]
	 * @param {[type]} $container   [description]
	 */
	B.ProductSKUShow=function(dataProprity,$container){
		var THIS=this;
		var proprityCount=dataProprity[0].length-2;
		var arrRow=[];
		var arrValue={};//用：属性1_属性2_..  形式做为下标，来存储库存和价格
		var $row=[];
		var i=0;
		for(;i<proprityCount;i++){
			arrRow.push({});
		}
		var count=dataProprity.length;
		for(i=1;i<count;i++){
			var item=dataProprity[i];
			var j=0;
			var arrValueKey='';
			for(;j<proprityCount;j++){
				//组合成：属性名1,属性名2的格式。
				var arrName=[];
				for(var jj=0;jj<proprityCount;jj++){
					arrName.push(item[jj]);
				}
				if(!arrRow[j][item[j]]){
					arrRow[j][item[j]]={title:item[j],correlationName:arrName};//记录相关的记录行数
				}else{
					arrRow[j][item[j]]['correlationName']=arrRow[j][item[j]]['correlationName'].concat(arrName);
				}
				//合成key键
				if(arrValueKey==''){
					arrValueKey=dataProprity[i][j];
				}else{
					arrValueKey+=','+dataProprity[i][j];
				}
			}
			arrValue[arrValueKey]=[item[proprityCount],item[proprityCount+1]];
		}
		console.log('-----------');
		console.log(arrValue);
		/**
		 * 行类
		 * @param {[type]} index     第几行
		 * @param {[type]} mainTitle 每行的属性名
		 * @param {[type]} doClickItem   点击行元素的回调方法：格式:function(arrCorrelationId)
		 */
		function RowItem(index,mainTitle,doClickItem){
			var _index=index; //第几行
			var _html='';
			var _doClickItem=doClickItem;
			_html+='<div class="item"><div class="left">'+mainTitle+'：</div><div class="right">';
			_html+='</div></div>';
			var _$html=$(_html);
			var _isAppendTo=false;
			var $itemContainer=_$html.find('.right');

			this.addItem=function(title){
				var $a=$('<a class="sku" href="#" >'+title+'</a>');
				$itemContainer.append($a);
				return $a;
			}
			this.getCurrentSelectName=function(){
				return _$html.find('.select').html();  //遍历选中的值，做为选中的值。
			}
			this.appendTo=function($target){
				if(_isAppendTo) return; //只能加一次
				_isAppendTo=true;
				var $sku=_$html.find('.sku');
				//遍历加点击事件
				$sku.each(function(index,item){
					var $this=$(this);
					$this.click(function(e){
						e.preventDefault();
						var $cThis=$(this);
						//console.log(arrRow[_index]);
						//console.log(arrRow[_index][$cThis.html()]);
						var correlationName=(arrRow[_index][$cThis.html()]['correlationName']);
						if($cThis.hasClass('select')){
							$cThis.removeClass('select');
							//THIS.allSkuBtnNoSelect();//回归到所有
							//console.log(index,$cThis.index(),'no select');
						}else{
							$cThis.addClass('select');
							if(_doClickItem) _doClickItem(correlationName); //选中的时候，只显示关联的
							//console.log(index,$cThis.index(),'select');
						}
						//不是当前的按钮，所有选项隐藏
						$sku.each(function(index,item){
							var $TemItem=$(item);
							if($cThis.index()!=$TemItem.index()) $TemItem.removeClass('select');
						});//end $sku.each
					});
					//
				});
				$target.append(_$html);
			}
		}
		//
		function clickItem(correlationName){
			THIS.allSkuBtnNoSelect();
			$.each(correlationName,function(index,item){
				$objCache[item].removeClass('disable');
			});
		}
		var $objCache={};
		var ctem=arrRow.length;
		var arrRI=[];//为了遍历出当前先中的值。
		for(var k=0;k<ctem;k++){
			var item=arrRow[k];
			var mainTitle=dataProprity[0][k];
			var RI=new RowItem(k,mainTitle,clickItem);
			for(key in item){
				var title=item[key].title;
				$objCache[title]=RI.addItem(title); //以属性名为索引，缓冲保存$ 对象，方便后面，点击某个属性，快速显示和隐藏对应关联的属性值。
			}
			arrRI.push(RI);
			RI.appendTo($container);
		}
		/*-------------public 方法 ------------------------*/
		//所有sku选项回归到没有选中的状态。
		this.allSkuBtnNoSelect=function(){
			for(key in $objCache){
				var $a=$objCache[key];
				$a.addClass('disable');
			}
		}
		/**
		 * 获得价格：注如果不传入key,返回当前选中的价格
		 * @param  {[type]} key [description]注：可为空
		 * @return {[type]}     [description]
		 */
		this.getSelectPrice=function(key){
			var _key=key||this.getSelectValue();
			if(_key=='') return undefined;
			return arrValue[_key][1];
		}
		/**
		 * 获得价格：注如果不传入key,返回当前选中的库存
		 * @param  {[type]} key [description] 注：可为空
		 * @return {[type]}     [description]
		 */
		this.getSelectStock=function(key){
			var _key=key||this.getSelectValue();
			if(_key=='') return undefined;
			return arrValue[_key][0];
		}
		//获得当前选中的值。
		this.getSelectValue=function(){
			var strTem='';
			var c=arrRI.length;
			for(var i=0;i<c;i++){
				var nameTem=arrRI[i].getCurrentSelectName();
				if(nameTem==''||nameTem==null){
					return '';
					break;
				}else{
					if(strTem!=''){
						strTem+=','+nameTem;
					}else{
						strTem=nameTem;
					}
				}
			}
			return strTem;
		}
		//console.log(html);
	}
//扩展--------------------------------end
}//end returnObj.extend
return returnObj;
});