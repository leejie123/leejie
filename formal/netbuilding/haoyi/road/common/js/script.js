(function($){

	var narrow      = false;
	var header      = $('#globalheader');
	var headerTop   = header.find('.top');
	var menuSec     = header.find('.sec');
	var menuSub     = header.find('.sub');
	var buttonsTop  = headerTop.find('a');
	var buttonsSub   = menuSec.find('a');
	var buttonMenu  = buttonsTop.eq(0);
	var buttonAmaz  = buttonsTop.eq(1);
	var buttonSearch = buttonsTop.eq(2);
	var buttonLang  = buttonsTop.eq(3);
	var buttonLocal = buttonsTop.eq(4);
	var spClose     = header.find('.intsp-btn-close');
	var regions     = header.find('#local .regions a');

	var chageTimerID = null;
	var closeTimerID = null;
	var closeTimeout = 2500;


	/*****************************************************************************************************************
	 * RESPONSIVE
	 *****************************************************************************************************************/

	if(window.useResponsive){
		jQuery.windowSizeChanged(function(){
			narrow = false;
			menuSub.css({display:'none'}).removeClass('open');
			menuSec.css({display:'none'}).removeClass('open');
			buttonsTop.removeClass('selected');
			buttonsSub.removeClass('selected');

			if(Shared.ua.isAndroid){
				menuSub.css({opacity:1});
				menuSec.css({opacity:1});
			}
		}, function(){
			narrow = true;
			menuSub.css({display:'none'}).removeClass('open');
			menuSec.css({display:'none'}).removeClass('open');
			buttonsTop.removeClass('selected');
			buttonsSub.removeClass('selected');
		});
	}else{
		var mapHolder = header.find('.map-holder');
		var globalSites = header.find('.global-sites');
		var globalRegion = globalSites.find('.region');

		// jQuery.addResizeObserver(function(w, h){
		// 	if(w > 1100){
		// 		mapHolder.clearStyle();
		// 		globalSites.clearStyle();
		// 		globalRegion.clearStyle();
		// 	}else{
		// 		mapHolder.css({display:'none'});
		// 		globalSites.css({paddingRight:20});
		// 		globalRegion.css({paddingRight:20});
		// 	}
		// });
	}

	// 横幅1024px未満の場合の横スクロール対応
	if(!Shared.ua.isSmartPhone){
		var winWidth = null;
		var minWidth = 1024;

		jQuery.addResizeObserver(function(w){
			winWidth = w;
		});
		jQuery.addScrollObserver(function(t, b, l, r){
			if(!narrow && winWidth < minWidth){
				if(l < 0) l = 0;
				if(l > minWidth-winWidth) l = minWidth-winWidth;
				//header.css({marginLeft:-l});
			}else{
				//header.css({marginLeft:0});
			}
		});
	}else{
		header.find('a').css('-webkit-tap-highlight-color', 'rgba(0,0,0,0)');
		header.find('.region-title').css('-webkit-tap-highlight-color', 'rgba(0,0,0,0)');
	}



	/*****************************************************************************************************************
	 * INIT
	 *****************************************************************************************************************/

	$('#menu a').each(function(i){
		var rel = this.getAttribute('rel');

		if(rel && rel.indexOf('#') === 0){
			$(this).append('<span class="ind"></span>');
		}
	});

	// if(Shared.css.hasTransition){
	// 	header.transform('translateZ(0)');

	// 	menuSec.css({display:'none', opacity:0, '-webkit-backface-visibility':'hidden'}).transition('all', 400, 'easeInOutQuart').transformOrigin('50%', '0%');
	// 	menuSub.css({display:'none', opacity:0, '-webkit-backface-visibility':'hidden'}).transition('all', 400, 'easeInOutQuart').transformOrigin('50%', '0%');

	// 	if(Shared.ua.isAndroid){
	// 		menuSec.transform('rotateX(-90deg)');
	// 		menuSub.transform('rotateX(-90deg)');
	// 	}else{
	// 		menuSec.transform('perspective(1000px) rotateX(-90deg)');
	// 		menuSub.transform('perspective(1000px) rotateX(-90deg)');
	// 	}

	// 	menuSec.transitionEnd(function(){
	// 		if($(this).hasClass('open')){
	// 			// videoタグのクリック対応
	// 			if(Shared.ua.isiPhone){
	// 				$('.flplayer video, .ytplayer iframe').each(function(){
	// 					if($(this).offset().top < 1000){
	// 						$(this).addClass('video_unclickable');
	// 					}
	// 				});
	// 			}
	// 		}else{
	// 			this.style.display = 'none';
	// 		}
	// 	});
	// 	menuSub.transitionEnd(function(){
	// 		if(!$(this).hasClass('open')) this.style.display = 'none';
	// 	});
	// 	if(Shared.ua.isAndroid){
	// 		menuSec.css({webkitPerspective:'none', opacity:1});
	// 		menuSub.css({webkitPerspective:'none', opacity:1});
	// 	}
	// }else{
	// 	menuSec.css({display:'none', opacity:1});
	// 	menuSub.css({display:'none', opacity:1});
	// }



	/*****************************************************************************************************************
	 * EVENT BINDING
	 *****************************************************************************************************************/

	if(Shared.html.hasTouch){
		closeTimeout = 8000;

		buttonMenu.bind('click',  clickSecButton);
		buttonAmaz.bind('click',  clickSecButton);
		buttonLocal.bind('click', clickSecButton);
		buttonSearch.bind('click', clickSecButton);
		buttonsSub.bind('click',   clickSubButton);
		spClose.bind('click',     closeSp); // narrow only

		// close event
		window.addEventListener('touchend', function(){
			clearTimeout(closeTimerID);
			setCloseTimer();
		}, false);
	}else{
		buttonMenu.bind('click',      clickSecButton);
		buttonAmaz.bind('click',      clickSecButton);
		buttonSearch.bind('click',      clickSecButton);
		buttonMenu.bind('mouseenter', enterSecButton);
		buttonAmaz.bind('mouseenter', enterSecButton);
		buttonSearch.bind('mouseenter', enterSecButton);
		buttonsSub.bind('mouseenter', enterSubButton);
		spClose.bind('click',         closeSp); // narrow only


		// close event
		menuSec.hover(function(){
			clearTimeout(closeTimerID);
		}, function(){
			setCloseTimer();
		});
		menuSub.hover(function(){
			clearTimeout(closeTimerID);
		}, function(){
			setCloseTimer();
		});

		// lang
		buttonLang.hover(function(){
			closeAll();
			buttonLang.addClass('selected');

		}, function(){
			buttonLang.removeClass('selected');
		});
	}



	/*****************************************************************************************************************
	 * ENTER EVENT
	 *****************************************************************************************************************/

	// sub
	function enterSecButton(e){

		if(this.tagName == 'A'){
			var that = this;
		}else{
			var that = this.parentNode;
		}
		var self = $(that);

		if(!self.hasClass('selected')){

			clearTimeout(closeTimerID);

			function _open(){
				self.addClass('selected');

				var selected = buttonsTop.filter('.selected');

				if(menuSub.filter('.open').length > 0){
					closeSub();

					setTimeout(function(){
						selected.each(function(i){
							if(this == that){
								openSec(selected.eq(i));
							}else{
								closeSec(selected.eq(i));
							}
						});
					}, 100);
				}else{
					selected.each(function(i){
						if(this == that){
							openSec(selected.eq(i));
						}else{
							closeSec(selected.eq(i));
						}
					});
				}
			}

			if(e.type == 'mouseenter'){
				clearTimeout(chageTimerID);

				self.addClass('hover').bind('mouseleave', function(){
					self.unbind('mouseleave', arguments.callee);
					self.removeClass('hover');
				});
				chageTimerID = setTimeout(function(){
					if(self.hasClass('hover')){
						_open();
					}
				}, 300);
			}else{
				_open();
			}
		}
	}

	// sub
	function enterSubButton(e){
		if(narrow) return false;

		var that = this;
		var self = $(that);

		clearTimeout(closeTimerID);
		clearTimeout(chageTimerID);

		if(self.hasClass('selected')){
			return false;
		}

		self.addClass('hover').bind('mouseleave', function(){
			self.unbind('mouseleave', arguments.callee);
			self.removeClass('hover');
		});

		if(self.attr('rel')){
			// wait 300msec
			chageTimerID = setTimeout(function(){
				if(self.hasClass('hover')){
					self.addClass('selected');

					var selected = buttonsSub.filter('.selected');

					selected.each(function(i){
						if(this == that){
							openSub(selected.eq(i), e);
						}else{
							closeSub(selected.eq(i));
						}
					});
				}
				self.removeClass('hover');
			}, 300);
		}else{
			// wait 1000msec
			chageTimerID = setTimeout(function(){
				if(self.hasClass('hover')){
					closeSub();
				}
				self.removeClass('hover');
			}, 1000);
		}
	}



	/*****************************************************************************************************************
	 * CLICK BINDING
	 *****************************************************************************************************************/

	// sec
	function clickSecButton(e){
		e.preventDefault();

		var self = $(this);

		if(self.hasClass('selected')){
			if(menuSub.filter('.open').length > 0){
				closeAll();
			}else{
				closeSec(self);
			}
		}else{
			enterSecButton.call(this, e);
		}
	}

	// sub
	function clickSubButton(e){
		if(narrow) return true;

		var that = this;
		var self = $(that);

		if(self.attr('rel')){
			if(self.hasClass('selected')){
				return true; // link
			}else{
				e.preventDefault();

				var selectedButton = buttonsSub.filter('.selected');

				if(selectedButton.length > 0){
					closeSub();

					setTimeout(function(){
						enterSubButton.call(that, e);
					}, 100);
				}else{
					enterSubButton.call(that, e);
				}
			}
		}
	}



	/*****************************************************************************************************************
	 * ANIMATION
	 *****************************************************************************************************************/

	// open sec
	function openSec(button){
		var sec = $('#' + button.attr('href').split('#')[1]);

		sec.addClass('open').css({display:'block'});

		if(Shared.css.hasTransition){
			setTimeout(function(){
				if(button.hasClass('selected')){
					if(Shared.ua.isAndroid){
						sec.transform('rotateX(0deg)').css({opacity:1});
					}else{
						sec.transform('perspective(1000px) rotateX(0deg)').css({opacity:1});
					}
				}
			}, 300);
		}

		if(sec.attr('id') == 'local'){
			//map();
		}
	}

	// open sub
	function openSub(button, e){
		var sub = $(button.attr('rel'));

		sub.addClass('open').css({display:'block'});

		if(e.type == 'click'){
			var delay = 30;
		}else{
			var delay = 300;
		}
		if(Shared.css.hasTransition){
			setTimeout(function(){
				if(button.hasClass('selected')){
					if(Shared.ua.isAndroid){
						sub.transform('rotateX(0deg)').css({opacity:1});
					}else{
						sub.transform('perspective(1000px) rotateX(0deg)').css({opacity:1});
					}
				}
			}, delay);
		}
	}

	// close sec
	function closeSec(button){
		if(button){
			var sec = $('#' + button.attr('href').split('#')[1]);
			button.removeClass('selected');
		}else{
			var sec = menuSec.filter('.open');
			buttonsTop.filter('.selected').not('.intlang').removeClass('selected');
		}

		if(Shared.ua.isiPhone){
			$('.flplayer video, .ytplayer iframe').removeClass('video_unclickable');
		}

		sec.removeClass('open');

		if(Shared.css.hasTransition){
			if(Shared.ua.isAndroid){
				sec.transform('rotateX(-90deg)').css({opacity:1});
			}else{
				sec.transform('perspective(1000px) rotateX(-90deg)').css({opacity:0});
			}
		}else{
			sec.css({display:'none'});
		}
	}

	// close sub
	function closeSub(button){
		if(button){
			var sub = $(button.attr('rel'));
			button.removeClass('selected');
		}else{
			var sub = menuSub.filter('.open');
			buttonsSub.filter('.selected').removeClass('selected');
		}

		sub.removeClass('open');

		if(Shared.css.hasTransition){
			if(Shared.ua.isAndroid){
				sub.transform('rotateX(-90deg)').css({opacity:1});
			}else{
				sub.transform('perspective(1000px) rotateX(-90deg)').css({opacity:0});
			}
		}else{
			sub.css({display:'none'});

		}
	}



	/*****************************************************************************************************************
	 * UTILITY
	 *****************************************************************************************************************/

	// close for narow mode
	function closeSp(e){
		e.preventDefault();
		window.scrollTo(0, 1);
		closeSec();
	}

	// close all menu
	function closeAll(){
		closeSub();
		setTimeout(closeSec, 200);
	}

	// close timer
	function setCloseTimer(){
		clearTimeout(closeTimerID);
		closeTimerID = setTimeout(closeAll, closeTimeout);
	}



})(jQuery);
