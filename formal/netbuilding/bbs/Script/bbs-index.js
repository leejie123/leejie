$(function() {
	 var mainBav = $('.mainBav');
		// var bannerWrap = $('.bannerWrap');
		// var navTop = bannerWrap.offset().top;
		var navTop = 100;
		$(window).scroll(function () {
		    var top1 = $(document).scrollTop();
		    if (top1 >= navTop) {
		        mainBav.css({
		            'position': 'fixed',
		            'top': '0',
		            'left': '0',
		            // 'zIndex': '9999',
		            'zIndex': '1',
		        });
		    } else {
		        mainBav.css({
		            'position': 'relative',
		            // 'zIndex': '800',
		            'zIndex': '1',
		        });
		    }
		});

	//倒计时
	 sendmessage = function (name) {
	  var second = 60;
	  $(name).attr("disabled", true);
	  var color = $(name).css('background-color');
	  $(name).attr("style", "background-color : #c1c1c1");
	  function update(num) {
	   if (num == second) {
	    $(name).attr("style", "background-color : "+color);
	    $(name).text("获取验证码");
	    $(name).attr("disabled", false);
	   }
	   else {
	    var printnr = second - num;
	    $(name).text(printnr + "秒后获取");
	   }
	  }
	  function uupdate(i) {
	   return function () {
	    update(i);
	   }
	  }
	  for (var i = 1; i <= second; i++) {
	   setTimeout(uupdate(i), i * 1000);
	  }
	 }

	 $('.sendmessage').bind('click', function(e) {
	 	e.preventDefault()
	 	sendmessage('.sendmessage')
	 })
	// search
	var $search = $('.search');
	$search.find('button').bind('click', function() {
		var value = $search.find('input').val();
		if(value) {
			window.location.href = 'searchResult.html?' +  value; 	
		}
	})

	// 初始化轮播
	$(".fullSlide").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"leftLoop", vis:"auto", autoPlay:true, autoPage:true, trigger:"click" });


	// 直播课程预告
	$('.ctrl').find('li').bind('click', function() {
		var index = $(this).data('index');
		$('.panel-tabs > .panel-tab').eq(index).siblings().hide().end().show();
		$(this).addClass('on').siblings().removeClass('on');
	})

	// tabs
	$('.tabs-header > div').bind('click', function() {
		$(this).addClass('active').siblings().removeClass('active');
		var index = $(this).data('index');
		$('.tabs-body > .tab').eq(index).show().siblings().hide();
	})

	/**
	 * author: lee
	 * step_data:存储原始数据（几张图片）
	 * $tpl_* 可替换模板
	 * isIE() 通过这个函数来实现降级
	 * append() 主函数
	 * scroll() 滚动函数，从上一步滚动到下一步
	 * getAttr() 得到元素的定位
	 * nextStep() 下一步
	**/
	
	// introduce
    var step_data = {
    	step1: {
    		img_link: 'Content/Images/guide1.png',
    	},
    	step2: {
			img_link: 'Content/Images/guide2.png',
    	},
    	step3: {
			img_link: 'Content/Images/guide3.png',
    	},
    	step4: {
    		img_link: 'Content/Images/guide4.png',
    	},
    	step5: {
    		img_link: 'Content/Images/guide5.png',
    	}
    }
    var template = $('#tpl')[0].innerHTML;
    var template1 = $('#tpl1')[0].innerHTML;
    var step1 = template.replace(/#img_link#/, step_data.step1.img_link);
    var step2 = template.replace(/#img_link#/, step_data.step2.img_link);
    var step3 = template.replace(/#img_link#/, step_data.step3.img_link);
    var step4 = template.replace(/#img_link#/, step_data.step4.img_link);
	var Intro = function() {
		this.top;
		this.left;
		this.width;
		this.height;
		this.index;
		this.$elem = '';
		this.$tpl_1 = $(step1)
		this.$tpl_2 = $(step2)	
		this.$tpl_3 = $(step3)
		this.$tpl_4 = $(step4)
		this.$tpl_5 = $($('#tpl1').html())
	}
	Intro.prototype = {
		init: function(params, onclose) {
			var _self = this;
			_self.callback = onclose;
			_self.getAttr(params.target)
			_self.append('1');
		},
		isIE: function() {
			// Microsoft的降级措施
			return navigator.appName.indexOf("Microsoft Internet Explorer")!=-1 && document.all;
		},
		append: function(step) {
			var _self = this;
			_self.index = step;

			var $template;
			switch(step) {
				case '1':
					$template = _self.$tpl_1;
					break;
				case '2':
					$template = _self.$tpl_2;
					break;
				case '3':
					$template = _self.$tpl_3;
					break;
				case '4':
					$template = _self.$tpl_4;
					break;
			}

			// introduce_content
			_self.introduce = $template.css({
				'position': 'absolute',
				'top': _self.top + 120 + 'px',
				'left': _self.left - 30 + 'px',
				'z-index': 3,
			}).appendTo($('.new-main'));
			_self.introduce.show();

			if (step >= 2) {
				_self.introduce.find('.step-next').css('background-image', 'url("Content/Images/nextbtn.png")')
			}
			// hightlight
			_self.hightlight = $('<div></div>').css({
				'position': 'absolute',
				'top': _self.top - 40 + 'px',
				'left': _self.left - 50 + 'px',
				'width': _self.width + 40 + 'px',
				'height': _self.height + 20 + 'px',
				// 'background': 'rgba(255,255,255,.6)',
				// 'background': 'rgb(255,255,255)',
				// 'opacity':'.2',
				'background-image': 'url("Content/Images/1.png")',
				'background-size': 'auto',
				'background-position': 'center',
				'background-repeat': 'no-repeat',
				'z-index': 3,
				// 'border-radius': '50%',
				'padding': '30px',
				'filter': 'alpha(opacity=80)'
			});
			switch (step) {
				case '1':
					_self.hightlight.css({
						'background-image': 'url("Content/Images/1.png")',
						'width': '216px',
						'height': '47px',
						'left': _self.left - 82 + 'px',
						'top': _self.top - 1 + 'px',
					})
					break;
				case '2':
					_self.hightlight.css({
						'background-image': 'url("Content/Images/2.png")',
						'top': _self.top - 100 + 'px',
						'left': _self.left - 94 + 'px',
					})
					_self.introduce.css({
						'top': _self.top + 135 + 'px'
					})
					break;
				case '3': 
					_self.hightlight.css({
						'background-image': 'url("Content/Images/3.png")',
						'top': _self.top - 80 + 'px',
						'left': _self.left - 44 + 'px',
						'width': _self.width + 20 + 'px',
						'height': _self.height + 108 + 'px'
					})
					_self.introduce.css({
						'top': _self.top + 160 + 'px'
					})
					break;
				case '4':
					_self.hightlight.css({
						'background-image': 'url("Content/Images/4.png")',
						'width': _self.width + 80 + 'px',
						'height': _self.height + 108 + 'px',
						'top': _self.top -90 + 'px',
						'left': _self.left - 66 + 'px',
					})
					break;
			}

			_self.hightlight.appendTo($('.new-main'))

			// mask
			_self.mask = $('<div></div>').css({
				'position':'fixed',
				'top': '0px',
				'left': '0px',
				'right': '0px',
				'bottom': '0px',
				'z-index':2,
				'background': 'rgb(0,0,0)',
				// 'background-image': 'url("Content/Images/2.png")',
				'background-size': '100%',
				'background-position':'top left',
				'opacity': '.8',
				'filter': 'alpha(opacity=80)'
			}).appendTo($('.new-main'));
			// _self.mask.bind('click',function() {
			// 	_self.mask.remove();
			// 	_self.hightlight.remove()
			// 	_self.introduce.remove();
			// 	_self.$elem.css({
			// 		// 'z-index': 0
			// 	})
			// })
			_self.introduce.find('.closebtn1').bind('click',function() {
				_self.mask.remove();
				_self.hightlight.remove()
				_self.introduce.remove();
				_self.$elem.css({
					// 'z-index': 0
				})
				_self.callback();
			})

			// bind event
			_self.introduce.find('.step-next').bind('click', function(e) {
				e.preventDefault();
				var $this = $(this);
				_self.nextStep($this)
			})
		},
		getAttr: function($elem) {
			this.top = $elem.offset().top;
			this.left = $elem.offset().left;
			this.width =$elem.width();
			this.height = $elem.height();
			this.$elem = $elem;
			$elem.css({
				// 'z-index': 10
			})
		},
		scroll: function(scrollHeight) {
			var $body = $('body, html');
			$body.stop(true, true).animate({scrollTop: scrollHeight}, 0);
		},
		nextStep: function($this) {
			var _self = this;

			_self.introduce.remove();
			_self.mask.remove();
			_self.hightlight.remove();
			var presentIndex = parseInt(_self.index) + 1;

			// window.location.hash = '#step'+presentIndex;

			_self.$elem = $('#step' + presentIndex);
			$('#step' + _self.index).css('z-index', 0);
			
			// step5 handler
			if (presentIndex == 5) {
				_self.introduce = _self.$tpl_5.css({
					'position': 'fixed',
					'margin': '0 auto',
					'left': '30%',
					'top': '30%',
					'z-index':3
				}).appendTo($('.new-main'));
				_self.introduce.find('.exbtn,.closebtn').bind('click', function() {
					_self.mask.remove();
					_self.introduce.remove();
					if (_self.callback) {
						_self.callback();
					}
					// _self.$elem.css({
					// 	'z-index': 0
					// })
				})

				// mask
				_self.mask = $('<div></div>').css({
					'position':'fixed',
					'top': '0px',
					'left': '0px',
					'right': '0px',
					'bottom': '0px',
					'z-index':1,
					// 'background': 'rgba(0,0,0,.7)'
					'background': 'rgb(0,0,0)',
					'opacity': '.8',
					'filter': 'alpha(opacity=80)'
				}).appendTo($('.new-main'));
				_self.mask.bind('click',function() {
					_self.mask.remove();
					_self.introduce.remove();
				})
				return;	
			}


			// console.log($('#step' + _self.index))
			_self.getAttr(_self.$elem);
			var index = presentIndex.toString();

			_self.scroll(_self.top - 100);

			_self.append(index);
		}
	}

	var isLogin = false;
	// 判断是否登录，调用introduction
	if (!isLogin) {
		var xx = new Intro();
		xx.init({
			target: $('#step1')
		}, function(){
			alert('isdfisdo')
		})
	}

})