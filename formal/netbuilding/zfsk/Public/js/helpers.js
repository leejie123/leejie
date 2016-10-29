$(function(){

	// 下拉菜单自动选中
	// Usage: 将需要选中的值添加到data-auto-value属性中
	// Example: data-auto-value="1"
	$('select').each(function(k, v){
		var value = $(v).data('auto-value');
		if(value)
			$(v).val(value);		
	})

});