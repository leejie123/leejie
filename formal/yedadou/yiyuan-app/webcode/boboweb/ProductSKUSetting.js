define('boboweb/ProductSKUSetting',function(require,exports,module){
var returnObj={};
returnObj.extend=function(B){
//扩展--------------------------------start
	/**
	 * sku设置：两个下拉列表，联动。显示不同的子类和sku属性。
	 * @param {[type]} $select1        [description]
	 * @param {[type]} $select2        [description]
	 * @param {[type]} select1_data    [description]
	 * @param {[type]} select1_doChang [description]
	 */
	B.ProductSKUSetting=function($select1,$select2,$tableSku,select1_data,select1_doChang){
		var THIS=this;
		var _currentSku=null; //当前选中的sku数据
		var _$currentSkuTbody=null;//当前显示出来的sku列表表格的tbody对象
		var _currentSkuTbodyItem='';//当前显示出来的sku列表表格，添加一行的通用html
		var _currentSkuEmptyData={};//用于add时候，没有传入的时候的空对象。主要是简易模板还未完成的bug.
		this.resetSelect2=function(data,selectId){
			$select2.empty();
			if(!selectId) $select2.append('<option value="0">请选择</option>');
			_currentSku={};
			var skuTem='';
			var optionTem='';
			var optionTem1='';
			$.each(data,function(index,item){
				_currentSku['sku_'+item.id]=item.sku;
				if(selectId&&selectId==item.id){
					if(skuTem=='') skuTem=item.sku;
					optionTem1='<option value="'+item.id+'">'+item.name+'</option>';
				}else{
					optionTem+='<option value="'+item.id+'">'+item.name+'</option>';
				}
			});
			optionTem=optionTem1+optionTem;
			$select2.append(optionTem);
			this.setSku(skuTem);
		}
		this.setSku=function(strData){
			console.log('当前sku:'+strData);
			$tableSku.empty();
			var arrSku=strData.split(',');
			var html='';
			html+='<thead>';
			html+=	'<tr>';
			var c=arrSku.length;

			var htmlSkuValue='';
			_currentSkuEmptyData={}; //建立一个模板用到的空数据
			_currentSkuEmptyData.price='';
			_currentSkuEmptyData.stock='';
			for(var i=0;i<c;i++){
				html+=		'<th>'+arrSku[i]+'</th>';
				_currentSkuEmptyData[arrSku[i]]='';
				htmlSkuValue+='<td><input type="text" value="[:='+arrSku[i]+':]" name="sku['+arrSku[i]+'][]" placeholder="请填写'+arrSku[i]+'信息"></td>';
			}
			html+=		'<th>价格</th>';
			html+=		'<th>库存</th>';
			html+=		'<th>操作</th>';
			html+=	'</tr>';
			html+='</thead>';
			var $html=$(html);
			_$currentSkuTbody=$('<tbody></tbody>');
			$tableSku.append($html);
			$tableSku.append(_$currentSkuTbody);
			//为this.add 方法准备的
			_currentSkuTbodyItem='';
			_currentSkuTbodyItem+=	'<tr>';
			_currentSkuTbodyItem+=htmlSkuValue;
			_currentSkuTbodyItem+=		'<td><input type="text" value="[:=price:]" name="sku[price][]" placeholder="价格"></td>';
			_currentSkuTbodyItem+=		'<td><input type="text" value="[:=stock:]" name="sku[stock][]" placeholder="库存"></td>';
			_currentSkuTbodyItem+=		'<td><a href="#" class="ProductSKUSetting_del">删除</a></td>';
			_currentSkuTbodyItem+='</tr>';

		};
		this.resetSelect1=function(data,selectId){
			$select1.empty();
			var optionTem='';
			var optionTem1='';
			if(!selectId) $select1.append('<option value="0">请选择</option>');
			$.each(data,function(index,item){
				if(selectId&&selectId==item.id){
					optionTem1='<option value="'+item.id+'">'+item.name+'</option>';
				}else{
					optionTem+='<option value="'+item.id+'">'+item.name+'</option>';
				}
			});
			optionTem=optionTem1+optionTem;
			$select1.append(optionTem);
		}
		this.add=function(data){
			if(!_currentSkuTbodyItem) return;
			if(!data){
				data=_currentSkuEmptyData;
			}
			var steTem=B.template(_currentSkuTbodyItem,data);
			var $tem=$(steTem);
			//绑定删除
			$tem.find('.ProductSKUSetting_del').click(function(e){
				e.preventDefault();
				 var isDel=confirm("是否真的要删除");
				 if(isDel==true){
				 	$(this).parent().parent().remove();
				 }
			});
			_$currentSkuTbody.append($tem);
		}
		//---初始化
		this.resetSelect1(select1_data);
		$select1.on('change',function(){
			var $this=$(this);
			var id=$this.val();
			id=parseInt(id);
			if(id==0) return;
			select1_doChang(THIS,id);
			//B.debug('change:'+id);
		});
		$select2.on('change',function(){
			var $this=$(this);
			var id=$this.val();
			id=parseInt(id);
			var sku=_currentSku['sku_'+id];
			THIS.setSku(sku);
		});

	}
//扩展--------------------------------end
}//end returnObj.extend
return returnObj;
});