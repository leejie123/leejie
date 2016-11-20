/**
 * mockdata 需要加密
 * 关联键值：id
 * 判断权限的service
 * 需要有个紧急关闭的接口，这样就不能登录，在维修中。必须具有安全性。其他链接也是动不了的。可以提供一个global方法。或者可以加一个锁，就拿不到数据了。或者使用高级别的控制权限。用对象控制
 * 下面实现了两个数据库引擎，但是都是查询而已，js语言还做不到写文件，除非用另外localsotrage，或者cookie，但是存储都不是很大。除非能够写入到文件中。
**/
var service  = function () {
	this.isavailable = false;
	this.ROOT_URL = "";
	//global config暴露了公共的属性不好，不过暂时做一个开关。
	// this.islocked = false;

	//设置访问权限的代码。比如上下级关系等。但是在前端页面上需要现实出来，告诉读者被锁。可以用弹框来表示。咋没暂时用alert
	//还有就是需要这个方法来取消另外的方法。这个很麻烦。可能会有问题，其实可以设置他为null，
	//比如islocked会影响到登陆页，各个部分都会。需要跳转？会影响到的是一些客户的权限，但是另外一些客户是影响不到的。
	//权限可以和user来绑定。因为id是极其秘密的，所以不容易拿到。所以修改数据库比较麻烦，一开始加入黑名单要注意。
	//权限是通过用户和来判断的。
	//需要有等级管理列表。可以有权限判断是否要给下级看到
	// this.lockedData([7],true);
	// 两个数据之间还应该做一个层，可见性。

}
service.prototype.setcontrol = function() {
	//control layer
	//can set some projects visible
	//params commonly is `id`
	console.log(arguments);

	//set some sort of limitation.and invoke in login.
	this.isavailable = true;
	this.islocked = true;
}
//控制一部分访问权限，可以控制到返回数据类型等。还可以扩展。但是这个要把这些变量嵌入到代码。可以在每个权限配备一个limitation的字段。
//注意在另外的地方，logout要清除cookie
service.prototype.lockedData = function(user_ids, islocked) {
	for(var i=0;i<user_ids.length;i++) {
		if(Tools.getCookie("user_id") == user_ids[i]) {
			this.islocked = islocked;
			if(islocked) {
				Tools.setCookie("islocked", true, 10000);
				alert("系统维护中，或者管理员您的登录权限被管理员收回。请联系管理员");
			}
			break;
		}
	}
}

service.prototype.getUser = function() {
	//有个想法，就是能够和手机号码以及短信来生成账号密码。然后登录。不过这个就不能设定权限。不，也可以，可以用tag，加一个字段来保存。
	//注册成为问题。不能够注册。因为没法写入数据库，除非用html5的storage,不过现在暂时还是用mockdata，虚拟数据。还需要提示被锁的消息
	var mockData = [
		//权限最低
		{
			"id": 7,
			"username": "visitor",
			"password": "visitor",
			"islocked": "false"
		},
		//游客的权限的附加权限，可以进阶看到的作品，比如做的比较好的。
		//最高权限，可以看到所有的作品，简历和各个部分都是不一样的。有些栏目是不开放权限的，一些tags，比如效果比较好的。这样做是有风险，但是营销就要这样。
		{
			"id": 8,
			"username": "extra",
			"password": "extra",
			"islocked": "false"
		},
		{
			"id":1,
			"username": "root",
			"password": "root1",
			"islocked": "true"
		},
		//权限第二，可以看到一部分作品，
		{
			"id":2,
			"username": "ydd",
			"password": "ydd",
		},
		{
			"id": 3,
			"username": "svj",
			"password":"svj"
		},
		{
			"id": 4,
			"username":"swj",
			"password": "swj"
		},
		//精品推荐
		{
			"id": 5,
			"username":"pride",
			"password":"pride"
		}
	];
	if(!this.islocked) {
		return mockData;
	}
}

service.prototype.getProject = function(id) {
	var self = this;
	if (id == 8) {
		self.isavailable = true;
	} 
	//这一部分缺少排序的功能。后面补充吧。
	//projects是元数据 mockdata是让元数据排序等，增加索引
	//tags用于filter，不过projects数据必须有权限。但是mockdata的数据权限已经设定好。有权限的话可以访问mock。
	//搜索绝对不能从元数据中查找，因为还要经过一个权限。
	//按照这种元数据的排序，那么他的顺序是会影响的，所以，要找个办法。不然只能不改变顺序。有的时候这个数据库系统准确性是取决于录入的准确性，多了空格都有问题

	var tips = "javascript:alert('您现在登录的是测试账户，请联系15112060248或者email：1376342485@qq.com索要其他账户')";
	var projects = [
		/* 0 */
		{
			"protime": "2015-6",
			"proname": "mdxsh",
			"prointro": "该项目运行在微信客户端，“免单星生活”是由广州五角星影视文化发展有限公司发起并运营的一个创新性公益平台，有情怀有梦想又好玩。平台于2015年7月正式试运营。我们希望用自己的镜头，去记录一些人，去帮扶一些人。关键词：捐款，众筹，免单生活",
			"prolink": tips,
			"protech":"【技术】用jquery和自定义一套css和js的组件",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["wb", "wechat", "mdxsh", "2015-6"]
		},
		/* 1 */
		{
			"protime": "2015-7",
			"proname": "aymm",
			"prointro": "手机端商城，面向对象是家庭主妇。可以在上面购物，聊天等，有一个页面像微信的朋友圈，可以互发动态。",
			"prolink": tips,
			"protech":"【技术】用一些插件，比如瀑布流，lazyload，ionic框架（不过后来去掉了这个框架。）",
			"prodetail":'【项目细节】这个也是手机端的项目。原本想要用ionic+angular开发，后来去掉。css原生开发，不过没有用meta标签去做，网页上面的字体也没有用rem，轮播图自己手写，但是没有缓动效果，感觉没有原生那么好。',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["wb", "wechat", "aymm", "2015-6"]
		},
		/* 2 */
		{
			"protime": "2015-7",
			"proname": "xml",
			"prointro": "该项目是卖沉香，佛珠的网站。可以发站内信<br/>关键词：商城，论坛，响应式布局",
			"prolink": tips,
			"protech":"【技术】1、ajax加载商品，2、bootstrap框架",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["wb", "desktop", "2015-7", "电商", "论坛", "discuz", "xml"]
		},
		/* 3 */
		{
			"protime": "2015-7",
			"proname": "cxg",
			"prointro": "和xml的网站是同一个类型，增加手机端，响应式布局，配备论坛<br/>关键词：沉香，商城，手机端，论坛",
			"prolink": tips,
			"protech":"【技术】1、ajax加载商品，2、bootstrap框架",
			"prodetail":'【项目细节】datetimepicker，jquery，jqueryui等',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["wb", "desktop", "商城", "电商", "cxg", "论坛", "会员等级", "2015-7"]
		},
		/* 4 */
		{
			"protime": "2015-7",
			"proname": "gzymca",
			"prointro": "公益项目修改和添加功能",
			"prolink": tips,
			"protech":"【技术】完善之前项目，添加功能",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["公益项目", "wb", "desktop", "2015-7", "企业展示"]
		},
		/* 5 */
		{
			"protime": "2015-7",
			"proname": "gzywca",
			"prointro": "公益项目修改和添加功能",
			"prolink": tips,
			"protech":"【技术】完善之前项目，添加功能",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["公益项目", "wb", "desktop", "2015-7", "企业展示"]
		},
		/* 6 */
		{
			"protime": "2015-8",
			"proname": "sjpt",
			"prointro": "手机商城网站,页面的逻辑比较复杂。包括填写地址，送货信息，类型的选择（这一部分逻辑比较复杂），评价，质检等。配合另外的前端做页面",
			"prolink": "http://leejie123.github.io/leejie/formal/netbuilding/sjpt/Index-chanpin.html",
			"protech":"【技术】1、ajax加载商品，2、bootstrap框架，3、选择不同类型的手机，并展示在页面，4、定义手机外壳",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["wb",'sjpt', "desktop", "手机", "商城", "业务逻辑复杂" ]
		},
		/* 7 */
		{
			"protime": "2015-8",
			"proname": "haoyi",
			"prointro": "该项目是展示网站，是灏毅设计公司的一个网站，目的是吸引人的眼球，做的高大上，所以交互成为重点。",
			"prolink": tips,
			"protech":"【技术】对交互要求比较高",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["wb", "desktop", "设计", "高大上", "展示网站", "交互效果好", "企业网站", "交互"]
		},
		/* 8 */
		{
			"protime": "2015-9",
			"proname": "ypt",
			"prointro": "该项目是电商的app，快递生鲜食品的电商app。两个客户端，一个是快递员端，一个是客户端。主要逻辑是，客户在客户端下单，客户端连接了附近的一些超市，可以在客户端上选择最近的超市下订单。有日用品，生鲜产品等。然后客户端需要保证有一定的余额才可以下单。快递员端，就是app可以发现最近的超市哪里需要送快递，然后就到商店去把这些食品送到客户手里，然后在客户接收的时候称重和计算价钱，最后在快递员客户端填写价格以及点击完成任务。当然了，我发现网上也有一款类似的软件《小蜜蜂》",
			"prolink": tips,
			"protech":"【技术】1、用framework7，template7框架 2、定位快递员位置以及导航，基于地图的应用（这部分逻辑是技术总监做的）3、判断状态，是否有快递员接单，是否已经送出 4、关于业务方面的，就是售后以及问题处理等。5、链接附近商家（技术总监调用接口。）",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["ypt", "wb", "mobile", "电商", "app", "业务逻辑复杂", "framework7"]
		},
		/* 9 */
		{
			"protime": "2015-9",
			"proname": "lehuo",
			"prointro": "该项目是杂志手机客户端，可以看杂志。模仿乐活做的客户端。",
			"prolink": self.isavailable? 'http://leejie123.github.io/leejie/formal/yedadou/lehuo/www/index.html' : tips,
			"protech":"【技术】1、angularjs + ionic，2、用codova打包app",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["lehuo", "wb", "mobile", "angularjs", "ionic", "app"]
		},
		/* 10 */
		{
			"protime": "2015-11",
			"proname": "sxb",
			"prointro": "该项目是实习招聘网站，逻辑不是很复杂，功能简单，主要是一些模块的设计和数据库表设计。前端部分有，选择地区，选择实习岗位，登录，注册， 填写实习资料，企业也有后台，不过比较偏向于企业。",
			"prolink": tips,
			"protech":"【技术】jquery，ajax，bootstrap",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["desktop", "wb", "电商", "招聘", "后台管理系统"]
		},
		/* 11 */
		{
			"protime": "2015-11",
			"proname": "一元购拼团",
			"prointro": "主要是配合后台写js的定时器。业务逻辑不是很复杂，但是结合了这个电商平台的分销系统，会员等级，积分等的一些逻辑。",
			"prolink": tips,
			"protech":"【技术】js定时器",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["ydd", "2016-12", "电商", "拼团"]
		},
		/* 12 */
		{
			"protime": "2016-",
			"proname": "yddPay",
			"prointro": "该项目是支付系统的后台，接入微信支付，前端业务逻辑简单",
			"prolink": tips,
			"protech":"【技术】借助pure定义一套css框架",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			]
		},
		/* 13 */
		{
			"protime": "2016-",
			"proname": "重构一元购",
			"prointro": "之前的一元购有几套模板，可以切换模板。这个项目是增加一套ui模板，业务逻辑基本不变。在php的原有代码修改结构，把原来跳转页面变为异步加载。",
			"prolink": tips,
			"protech":"【技术】",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】 ",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["ydd","重构", "一元购", "电商", "wechat"]
		},
		/* 14 */
		{
			"protime": "2016-",
			"proname": "一元购app",
			"prointro": "把微信的客户端做成app，hybrid app。",
			"prolink": self.isavailable? 'http://leejie123.github.io/leejie/formal/netbuilding/':tips,
			"protech":"【技术】1、grunt，2、requirejs等",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["ydd","重构", "一元购", "电商", "app", "mobile", "requirejs", "grunt"]
		},
		/* 15 */
		{
			"protime": "2016-",
			"proname": "bbs",
			"prointro": "这个项目是bbs论坛。流程比较规范，产品经理通过需求分析，做出原型，然后交付ui，然后就给前端做页面。总的有三大板块，视频区，发帖，发布作品。公司是b2b做电商平台，培训那些商家用自己做的软件。",
			"prolink": self.isavailable? 'http://leejie123.github.io/leejie/formal/netbuilding/':tips,
			"protech":"【技术】定义一套css，js框架。",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["ydd","重构", "一元购", "电商", "app", "mobile", "requirejs", "grunt"]
		},
		/* 16 */
		{
			"protime": "2016-",
			"proname": "bbs",
			"prointro": "这个项目是大后台。业务逻辑复杂，多层级，复杂不容易理清线索。后台用dot net",
			"prolink": self.isavailable?'http://leejie123.github.io/leejie/formal/netbuilding/':tips,
			"protech":"【技术】",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["ydd","重构", "一元购", "电商", "app", "mobile", "requirejs", "grunt"]
		},
		/* 17 */
		{
			"protime": "2015-",
			"proname": "zfsk",
			"prointro": "这个项目是大后台。业务逻辑复杂，多层级，复杂不容易理清线索。后台用dot net",
			"prolink": tips,
			"protech":"【技术】",
			"prodetail":'【项目细节】',
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["ydd","重构", "一元购", "电商", "app", "mobile", "requirejs", "grunt"]
		},
		/* 18 */
		{
			"protime": "2015",
			"proname": "app",
			"prointro": "这是h5前端页面",
			"prolink": self.isavailable ? 'http://leejie123.github.io/leejie/formal/netbuilding/App/account.html': tips,
			"protech": "【技术】",
			"prodetail": "【技术细节】",
			"prodoc": "【前端文档】",
			"proimages": [
				"avatar1.jpg","avatar1.jpg","avatar1.jpg"
			],
			"tags": ["app", "手机", "mobile", "demo"]
		}
	];
	var mockData = [
		//最低权限无xml,sxb(10),aymm
		{
			"id": 7,
			"data": [
				projects[0], projects[3], projects[4], 
				projects[5], projects[7], projects[8], projects[9], 
				projects[11], projects[12], projects[13], projects[14], 
			]
		},
		{
			"id": 1,
			"data": [
				projects[0],projects[1],projects[2], projects[3], projects[4], 
				projects[5], projects[6], projects[7], projects[8], projects[9], 
				projects[10], projects[11], projects[12], projects[13], projects[14], 
				projects[15], projects[16]
			]
		},
		//比较精品的项目，练习我才能看到。
		{
			"id": 8,
			"data": [
				// projects[1], projects[2], projects[6], projects[7]
				projects[6],projects[9], projects[14], projects[15], projects[16], projects[18]
			]
		},
		{
			"id": 2,
			"data": [

			]
		}
	]

	//不得已写到这里，增加搜索功能
	//但是这个由两层循环，貌似没那么好。
	//最好加一个单元测试
	//因为元数据和组合数据分开，所以，返还的需要用searchResult.data;
	//那就另外一个断定是否需要搜索metadata
	//最好能够做单元测试
	//searchresult和project返还的数据格式不一样，需要转换一下，这也是设计不合理的地方，但是不影响使用。
	//接近于实现一套数据库语言。
	//设计思想可以这样，操作结果集。
	this.search = function(id, keyword, searchMetadata) {
		var searchResult = [];
		if(keyword) {
			var str = "\d?" + keyword + "\d?",
			    reg = new RegExp(str),
			    //重新调用自身，获得数据
			    searchData =  this.getProject(id).data;
			if(searchMetadata == true) {
			    searchData =  projects;
			}
			for(var i=0;i<searchData.length;i++) {
				if(searchData[i].tags != undefined && searchData[i].tags.length > 0 ) {
					for(var j=0;j<searchData[i].tags.length;j++) {
						if(reg.test(searchData[i].tags[j])) {
							searchResult.push(searchData[i]);
						}			
					}
				}
			}
			if(!this.islocked) {
				console.log(searchResult)
				return searchResult.data = searchResult;
			}
		} else {
			return;
		}
	}

	if(id == "") {
		alert("非法登录");
		window.location.href = "./login.html";
		return;
	}
	for (var i=0;i<mockData.length;i++) {
		if (mockData[i].id == id) {
			if(!this.islocked) {
				return mockData[i];
				break;
			}
		}
	}
	return "";
}
//可以设置一些开关，都和一些东西关联。然后关联性也不要太强。容易控制，注意还可以切换模板，以及开关。
service.prototype.getPopedom = function() {
	var self = this;
	this.checkLogin();
	var getPopedom = "";
	switch(Tools.getCookie("user_id")) {
		//user_id变成了string类型
		//可以直接返回json的user
		case "1": 
			getPopedom = "root";
			break;
		case "7":
			getPopedom = "visitor";
			break;
		case "8":
			getPopedom = "extra";
			break;
		default:
			getPopedom = "visitor";
	}
	if(!this.islocked) {
		return getPopedom;
	}
}

service.prototype.checkLogin = function() {
	//get cookie islogin();
	var path = location.pathname,
	    islogin = Tools.getCookie("user_id"),
	    self = this;
	// console.log(islogin)
	if(!(/login.html/).test(path)) {
		if(!islogin) {
			window.location.href = "./login.html";
			return;
		}
	}
	return true;
}

service.prototype.logout = function() {
	Tools.removeCookie("user_id");
	Tools.removeCookie("islocked");
	if(!(/login.html/).test(location.pathname)) {
		window.location.href = "./login.html";
		return;
	}
}


/**
 * tools function
**/
window.Tools = {
	//实现jquery的一部分逻辑，到时候替换成jq,jq选择器
	_:function(selector) {
		var type = "";
		if(selector.indexOf('.') > -1) {
			selector = selector.substring(1);
			return document.getElementsByClassName(selector);
		} else if (selector.indexOf('#') > -1) {
			selector = selector.substring(1);
			return document.getElementById(selector);
		} else {
			return document.getElementsByName(selector);
		}
		// console.log(selector);
	},
	setCookie:function(name,value,expires)
	{
		var oDate=new Date();
		oDate.setDate(oDate.getDate()+expires);
		document.cookie=name+'='+value+';expires='+oDate;
	},
	getCookie:function(name)
	{
		var arr=new Array();
		arr=document.cookie.split("; ");
		var i=0;
		for(i=0; i<arr.length;i++)
		{
			arr2=arr[i].split("=");
			if(arr2[0]==name)
			{
				return arr2[1];
			}
		}
		return '';
	},
	removeCookie:function (name)
	{
		window.Tools.setCookie(name,'随便什么值，反正都要被删除了',-1);
	}
}