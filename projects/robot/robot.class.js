var Robot = (function() {
	//不可以有两个window 哦那load
	//智能机器人
	//历史记录可以备份。
	//自定义业务类型
	//切换成unix模式，用help可以打字
	//将搜索的内容做了一个有机的整合
	//从子句来分析，然后被用户使用之后反馈。
	//查字典，然后返回什么意义。看看机器是如何理解的。
	//Intelligent是只能机器的接口
	//多语言
	//随机库，存储一些东西可以看到这些库存中用random返回 randomTopice
	var Base = function() {
		//this 可见性
		this.title = "dfsfd";
		this.xx = function() {
		}
	}
	var Intellgent = function() {
		this.msg = "";
		this. xx = "";
	}
	var Robot = function() {
		this.tpl =  '<div class="avatar"> \
						<img src="http://placehold.it/30x30"> \
					</div>\
					<div class="content"> \
						#content# \
					</div>' ;
		this.$sendMsg_input = _("#sendMsg").children[0];

		this.$sendMsg_btn = _("#sendMsg").children[1];
		this.parent = _(".talkModule")[0].children[1];
		this.$cls = _(".clearsc");
		this.$randomTopice = _(".randomTopice");
		this.$randomTopiceClick = _(".random");
		this.$robot = _('.talkModule')[0];
		Base.call(this);
		Intellgent.call(this)
	}
	// Robot.prototype = new Base();
	Robot.prototype = {

		mockdata:{
			"msg":"您好，请问有什么可以帮到您？",
			"data": {
				"wenhou": "你好"
			},
			//增加主题
			//注意不要重复。
			//加入后台
			//排序算法以前有的还要不要加进去？
			//已经看过了，就把他删掉。然后重新推荐。
			"randomTopice": [
				{
					"id": 1,
					"topic":"您是不是觉得无聊？那么试试以下关键词咯：爱玩，有意思",
					"page": "你好，如何学一门语言，从直觉和理性两方面。首先要熟悉基本架构，会说，懂得别人在说什么，首先会简单用，这算入门了。接着是理性，全方面，系统性的认识。",
					"links": ['http://www.baidu.com']
				},
				{
					"id": 2,
					"topic":"你是在为事业烦恼？你的事业发展遇到了瓶颈？想要知道如何突破？",
					"page": "jidfjisjof",
					"links": ['http://www.baidu.com']

				},
				{
					"id": 3,
					"topic":"这里可能会加入一些人工智能，比如一些人脸识别算法，以及一些除噪算法等。",
					"page": "没错，我就是智能机器人joken，请叫我joke",
					"links": ['http://www.baidu.com']

				},
				{
					"id": 4,
					"topic":"你也喜欢金庸小说？很好.",
					"page": "sdjfosjif",
					"links": ['http://www.baidu.com']

				},
				{
					"id": 5,
					"topic":"你是在问如何入门一门语言吗？.",
					"page": "那么高手中的高手是赵元任，所以推荐一下播客：<a href=''>《快活家赵元任》</a>",
					"links": ['http://www.baidu.com']

				},
				{
					"id": 6,
					"topic":"很不巧，我们是同行，做的都是it，",
					"page": "",
					"links": ['http://www.baidu.com']

				},
				{
					"id": 7,
					"topic":"hello world.",
					"page": "",
					"links": ['http://www.baidu.com']

				},
				{
					"id": 8,
					"topic":"一个笑话：总监问：你简历上写的工作年限只有一年，为什么,你说已经有二年工作经验了？应聘者：加班",
					"page": "",
					"links": ['http://www.baidu.com']

				},
				{
					"id": 9,
					"topic":"职场总是非常坑",
					"page": "所以远离职场",
					"links": ['http://www.baidu.com']
				}
				
			],
			 
		},
		//设置几种智能问答并且推断用户，形成推荐。
		//另外一个进程，模拟线程
		//这里的设计还不够。

		//ui:random 不同类型背景会变色。

		//需要有非常强的操作模板的能力
		//还有一个逻辑就是选择会话快，然后保存，导出，或者导入。需要一个导入接口。意思为还原界面。
		robot: function(data) {
			//测试接口
			//用匹配的模式可能太差了。需要机器能够理解。这样吧，给几个问题，需要机器理解一下。然后学习成为经验，然后如果错误再修改经验。
			//modal 模式，需要匹配的
			//收集： 节日，关键词，情感（各种分类，自己收集成为一个受控词表，关键词表，和人的活动息息相关。）
			//之前做的那个数据库集刚好可以用在这里
			//增加业务类型
			//一个强大的模拟器，可以推测出他到底想要什么。上一次的输入和这一次的输入可以累计，判断出现的字词，一般是拿到名词有的时候可能会动词也是关键。
			//不仅可以有限定任务，自定义任务，（自定义查询）我觉得用checkbox来让用户来判断是否选择这个搜索项是可以的。或者使用功能按钮，也可以。还有random的功能。
			//之所以要做收藏夹的原因，就是网络上不能保存我之前看过的东西。页面。我需要把他们collect出来，还有能不能还原上下文关系。
			//分类。可以把查出的几条数据用一个框框框起来，然后把已经查过的关键字放在旁边。可以通过时间refer关键字

			//模式总结 能够识别名词，动词，副词。
			//问候语
			//动作+名词
			//态度
			//评价 名词（“产品”）+态度副词（“不好”）
			//定义 是什么
			//怎么做 如何学xx
			//导航，告诉别人怎么做  “试试”
			var test_data = [
				"我想了解一下",
				"你好",
				"你好，我想了解一下xxx",
				"天好热。",
				"你这机器不好。",
				"理想是什么？"
			]
			var self = this,
				reg = "",
				model = "",
				reg = "(\\w|[\u4e00-\u9fa5])*[" + data.msg + "](\\w|[\u4e00-\u9fa5])*";
				reg = new RegExp(reg);
				console.log(reg)

			//下面是定义好的回复模式，但是不够智能。
			var reply_type = {
				modal1: function() {
					if(data.msg == "关键字") {
						self.showDialog({msg:"<a target='_blank' href='http://www.baidu.com'>baidu</a>"}, 1)
					} else if(data.type == "random") {
	  	
					} else if(data.msg.trim() == "help") {
						self.showDialog({msg:"关键词，情感，理想，创业，事业，文化，日历，各种服务等。"}, 1)
					} else {
						self.showDialog({msg:"没有相应的内容，您可以尝试搜索关键字：关键字，或者输入help"}, 1)
					}
				},
				modal2: function() {
					// var msg = "你是在为事业烦恼？你的事业发展遇到了瓶颈？想要知道如何突破？";
					//暂时想到用what，how ，why + 权重来判断。
					//百分百被三个模式分配是不准确的，但是只要类型够多，类型的关键字足够充足，就可以
					//判断一个是语句想要了解什么
					var searchdata =  {
						"type": {
							"why11": ["事业", "瓶颈", "突破", "发展"],
							"why": ["为什么", "原因","问", "请问"],
							//how一种建议，
							"how": ["如何", "?", "？", "怎样", "怎么", "怎么样"],
							"wish": ["想", "我想", "希望", "愿望", "想要"],
							"ability": ["能够", "能"],
							"pingjia": ["好","不好", "不错"]
						},
						"career" :{
							"doctor": ["病人", "医生", "医师", "患者", "病", "患者", "药", "患者", ""],
							"it": ["前端", "后台", "angular", "game", "程序", "开发", "患者"],
						}
					} 

					//判断职业
					var quan = 0; 

					//换算百分比
					//注意计算重复匹配
					//这里通用了一个格式：
					//{how:0pingjia:1why:0why11:0wish:0}					
					function search(msg, searchdata) {
						//result: 返回所有的结果
						//predicate：返回有匹配的结果
						var result = {},
							predicate = {},
							total = 0;
						for(i in searchdata) {
							result[i] = 0;
							for(var j=0;j<searchdata[i].length;j++) {
								if(msg.indexOf(searchdata[i][j]) > -1) {
									// console.log(searchdata[i][j])
									result[i] += 1;
									predicate[i] = result[i];
								}
							}
						} 

						// for (i in result) {
						// 	total += result[i];
						// }
						// for (i in result) {
						// 	result[i] = result[i]/total*100;
						// }
						return {predicate:predicate, result:result};
					} 
					//从上面的百分比做进一步分析。
					//应该把搜索的数据保存起来，然后到第十次的时候在分析一下。 
					function analyse(result) {

					}
					var xx = search(data.msg, searchdata.type);
					//block 判断权重，判断是否为判断句

					//模式一：流程：判断句子类型，然后根据类型给出分类关键词。这样可以达到给出建议的目的。

					//例句分析，目标：能够理解句子
					//如果测试句子是：“你好吗？”
					//我 想 做 一点不一样的事情，你有什么 建议 吗？
					//- 例词提取： 想 做 建议 吗 ？
					//- 难点： 组合 “一点不一样的事情”
					//- 您可以参照  建议部分（人生，职业发展，人格， 心理学， 。。。按照关键词：建议：人生或者建议：职业发展）就可以获取您想要的。（这个则是取决于自己收集和整理知识以及知识联系性，知识框架全部全面。）
					console.log(xx)
					if(xx.why11) {
						alert("")
					}

					if(xx.wish) {
						alert("您这个是假设或者是愿望")
					}

					if(xx.why) {
						alert("您的这个问句是提问类型")
					}
					if (xx.how) {
						alert("您的这个句子是问怎么做。或者反问类型，或者询问")
					}
					if(xx.pingjia) {
						alert("这个是评价")
					}
					console.log(quan)
					//可以通过权重，也就是说，如果出现的多的话就可以通过这句话的字眼出现的字数判断是什么句式。
					//第一步：提取关键字，然后通过关键字组合去搜索数据库符合并集的结果
					//第二步：提取整行的语义，然后搜索数据库相通语义的结果，这个优先级比较高。


					//互动可以继续下去，然后收集二十次的互动结果分析。
					//比如二十次中doctor平均出现了10次以上那么可以断定是doctor。这就说明，关键字非常重要，因为医生的话，患者也有可能会知道和了解，需要根据职业特性。还要把各种条件结果联合判断。比如

					//接下来开发回复模块
					//或者想到另外一种方案：比如“想” -- “想要，想听，想说，想做，想法”可以想字然后就进入了愿望的那一个模块。然后就是经过组词，想做，想说。然后给出答案。
					//回复模块，首先是组句。

				}
			}
			 
			reply_type.modal2();
			//另外的只能回复
			//自定义回复模式
			
		},
		closeRobet: function() {
			this.$robot.setAttribute('style', "display:none");
		},
		showDialog: function(msg, type) {
			//回复一定是这种通用格式
			//其实里面如果有多少条都可以循环出来会更好，算了。
			console.log(msg)
			var self = this,
				tmp = this.tpl,
				classname = '';
				// console.log(tmp)
			tmp = tmp.replace("#content#", msg.msg);
			// console.log(self.parent);
			if(typeof msg.msg == Array) {
				//判断是否有多个输入，调用多次
			}

			var el = document.createElement('div');
			switch(type) {
				//1是admin ， 2是user
				case 1: 
					classname = "left item";
					break;
				case 2: 
					classname = 'right item';
					break;
				default :
					classname = "left item"
			}

			if(msg.init) {
				msg.init(el);
			}
			if(msg.clickable) {
				if(msg.type=="random" && msg.cb ) {
					bind(el, 'click', function() {
						msg.cb(el);
					})	
				} else if(msg.cb) {
					bind(el, 'click', function() {
						msg.cb(el);
					})	
				}
			}
			if(msg.id) {
				el.setAttribute("value", msg.id);
			}

			msg.className?el.setAttribute('class', classname+ ' ' + msg.className): el.setAttribute('class', classname);
			

			el.innerHTML = tmp;
			// console.log(el)
			self.parent.appendChild(el)
		},
		init: function() {

			var self = this;
			//初始化显示
			self.showDialog(self.mockdata);
			//clearscreen;
			bind(self.$cls, 'click', function() {
				self.parent.innerHTML = "";
			})
			
			//发送消息按钮
			bind(self.$sendMsg_btn, "click", function() {
				var value = self.$sendMsg_input.value;
				//block 只能识别，需要什么内容
				self.showDialog({msg: value},2);
				self.robot({msg:value})
			})

			
			//这一个层级展示topic,这些层级都可以用开关来控制，可以传输一个json文件来控制层级。有一个最高的权限
			//层级太深。
			bind(self.$randomTopice, "click", function() {
				//这一部份需要有个关键词，关联词来吧这些数据对接，是id还是page_id

				var i = Math.ceil(Math.random()*self.mockdata.randomTopice.length-1);
				// console.log(i,self.mockdata.randomTopice[i].topic);
				//这个层级展示content
				self.showDialog({
					msg:self.mockdata.randomTopice[i].topic, 
					className:"random border-b",
					type:"random",
					clickable: true,
					id: self.mockdata.randomTopice[i].id,
					init:function(el) {
						el.setAttribute("style", "cursor:pointer")
						el.setAttribute("draggable", "true");
						$box = _('.box');
						for(var i=0;i<$box.length;i++) {
							$box[i].ondragenter = function(e) {
								alert("加入收藏"+e.toElement.getAttribute("value"))
							}
							$box[i].ondrop = function() {
								alert()
							}
						}
					},
					cb: function(el) {

						//绑定事件(可以拖入收藏夹)这个稍后做，被卡住了。
						
						
						// bind(el, "mousedown", function(e) {
						// 	alert()
						// 	var x = e.pageX,
						// 		y = e.pageY,
						// 		px = self.parent.offsetLeft,
						// 		py = self.parent.offsetTop;
						// 		bind(el, 'mouseover', function(e1) {
						// 			alert()
						// 			var x1 = e1.pageX,
						// 				y1 = e1.pageY,
						// 				cx = x1 - x + "px",
						// 				cy = y1 - y + "px";
						// 		el.setAttribute("style", "transform:translate(" + cx + ","+ cy +")");

						// 		})
						// })
						// console.log(el.children[0].innerHTML);
						var id = el.getAttribute("value"),
							returndata = {};
						for (var i=0;i<self.mockdata.randomTopice.length;i++) {
							if(self.mockdata.randomTopice[i].id == id) {
								returndata = self.mockdata.randomTopice[i];
								break;
							}
						}

						//这一个层级点击可以展示链接等。
						self.showDialog({msg: returndata.page,clickable:true,cb:function(el) {
							var returnlinks = "";
							for(var i=0;i<returndata.links.length;i++) {
								returnlinks += "<a href=" + returndata.links[i] + ">" + returndata.links[i]+"</a>";
							}
							self.showDialog({msg:  returnlinks,})
						}})
					}
				},1)
			})

		}

	}
	return Robot;
})()
