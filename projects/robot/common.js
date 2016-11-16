/**
 * 非常蛋疼的问题
 * 我把robot这个类迁移到common，结果出现_ 和 bind不识别。
 * 全部加了(function())()也不行。
**/




/**
 * id规范了之后一些功能不能用。

**/

/**
 * var value = '\\s*((\\w|[\u4e00-\u9fa5])*' + value + '(\\w|[\u4e00-\u9fa5])*)\\s*';
 * fn 调试接口(调试接口非常有用，可以测试时哪里的问题。)
**/	
var _ = function(selector, fn) {
	var _selector = '',
		_type = '',
		_$elem;
	if(selector.indexOf('.') > -1) {
		_selector = selector.substring(1);
		return document.getElementsByClassName(_selector);
	} else if(selector.indexOf('#') > -1) {
		_selector = selector.substring(1);
		if(fn) {
			fn(document.getElementById(_selector),_selector)
		}
		return document.getElementById(_selector);
	} else if(selector.indexOf("[name=") > -1) {
		// selector = selector.trim();
		var index = selector.indexOf('[name'),
		     name = /\"(.+)\"/.exec(selector)[1];
		     // console.log(name)
		     returnarr = [];
		$elem = document.getElementsByTagName(selector.substring(0, index));
		for(var i=0;i<$elem.length;i++) {
			if($elem[i].name == name) {
				returnarr.push($elem[i]);
				// break;
			}
		}
		return returnarr;
	} else {
		_type = "name";
		_selector = selector;
		return document.getElementsByTagName(_selector)
	}
}



//first params: function , last: elem;
window.unbind = function() {
	var $elem = arguments[0],
	len = arguments.length,
	evt = arguments[1];
	// fn = arguments[2];
	if(len == 3) {
		if($elem.length != undefined){
			for(var i=0;i<$elem.length;i++) {
		 		if(window.addEventListener) {
				 	$elem[i].addEventListener(evt, null)
		 		} else {
		 			$elem[i].attachEvent(evt, function(e) {
				 	})
		 		}
		 	}
		} else {
			// console.log("----------------");
			// console.log($elem);
			// console.log(fn)
			if(window.addEventListener) {
				 	$elem.addEventListener(evt, function(e) {
			 			fn(e);
				 	})
		 		} else {
		 			$elem.attachEvent(evt, function(e) {
				 	})
		 		}
			}
		}
	}
window.bind = function() {
	var $elem = arguments[0],
	len = arguments.length,
	evt = arguments[1],
	fn = arguments[2];

	// draggable事件
	// if(evt == "drag") {
 // 		if(window.addEventListener) {
	// 		for(var i=0;i<$elem.length;i++) {
	// 			$elem[i].addEventListener("mousedown", function(e) {
	// 				var px = $elem[i].
	// 			})
	// 		}

 // 		}

	// }

	//block 单元测试 如果只有一个元素。
	//元素在哪里调用调用点
	if(len == 3) {
		if($elem.length != undefined){
			for(var i=0;i<$elem.length;i++) {
		 		if(window.addEventListener) {
				 	$elem[i].addEventListener(evt, function(e) {
			 			fn(e);
				 	})
		 		} else {
		 			$elem[i].attachEvent(evt, function(e) {
				 	})
		 		}
		 	}
		} else {
			// console.log("----------------");
			// console.log($elem);
			// console.log(fn)
			if(window.addEventListener) {
				 	$elem.addEventListener(evt, function(e) {
			 			fn(e);
				 	})
		 		} else {
		 			$elem.attachEvent(evt, function(e) {
				 	})
		 		}
			}
		}
	}



function init_tagsSelect() {
	var $tagsSelect = _('.js-tagsSelect');
	for(var i=0;i<$tagsSelect.length;i++) {
		$tagsSelect[i].addEventListener('change', function(e) {
			console.log(e)
		})
	}
}



// init_tagsSelect()


// var tx = _('textarea[name="all"]');
// var data = tx[0].value[1];



//block 自动理解语义
//block 根据语义寻找其他关键
