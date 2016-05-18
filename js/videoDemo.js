// require(['BigVideo', 'jquery', 'jquery-ui', 'imagesloaded','jquery-ui', 'videojs', 'Modernizr', 'EventEmmiter'], function( ) {
   //  		var videolist = new Vue({
   //  			el: '.video-list',
   //  			data: {
   //  				list: [
   //  					{
   //  						title: 'Video #1',
   //  						link: 'https://www.dropbox.com/s/z3mjaxopbc8sxpe/river.mp4?dl=0',
   //  					},
   //  					{
   //  						title: 'Video #1',
   //  						link: 'https://www.dropbox.com/s/z3mjaxopbc8sxpe/river.mp4?dl=0',
   //  					},
   //  					{
   //  						title: 'Video #1',
   //  						link: 'https://www.dropbox.com/s/z3mjaxopbc8sxpe/river.mp4?dl=0',
   //  					}

   //  				]
   //  			}
   //  		})
			// var main = new Vue({
			// 	el: '.main',
			// 	data: 
			// 		{text: [
			// 				{
			// 					title: 'sfjsoifjsajfisjif',
			// 					p: '<p>Take a look at the source for this example to see how to implement a BigVideo.js playlist on a website. In addition to the normal functionality of BigVideo.js, I&rsquo;ve added an auto-hide script to this example, so the content fades out away when you stop moving the mouse (unless you are over the playlist nav). Take a look and feel free to implement that if it makes sense.</p>' + '<p>Take a look at the source for this example to see how to implement a BigVideo.js playlist on a website. In addition to the normal functionality of BigVideo.js, I&rsquo;ve added an auto-hide script to this example, so the content fades out away when you stop moving the mouse (unless you are over the playlist nav). Take a look and feel free to implement that if it makes sense.</p>',
			// 					h2: '<h2>Fullscreen Background Video Website With Playlist Example</h2>',
			// 					h1: '<h1>BigVideo<span class="dimmed"><small>.</small>js</span></h1>'
			// 				},
			// 				{
			// 					title: 'sfjsoifjsajfisjif',
			// 					p: '<p>Take a look at the source for this example to see how to implement a BigVideo.js playlist on a website. In addition to the normal functionality of BigVideo.js, I&rsquo;ve added an auto-hide script to this example, so the content fades out away when you stop moving the mouse (unless you are over the playlist nav). Take a look and feel free to implement that if it makes sense.</p>' + '<p>Take a look at the source for this example to see how to implement a BigVideo.js playlist on a website. In addition to the normal functionality of BigVideo.js, I&rsquo;ve added an auto-hide script to this example, so the content fades out away when you stop moving the mouse (unless you are over the playlist nav). Take a look and feel free to implement that if it makes sense.</p>',
			// 					h2: '<h2>Fullscreen Background Video Website With Playlist Example</h2>',
			// 					h1: '<h1>BigVideo<span class="dimmed"><small>.</small>js</span></h1>'
			// 				},
			// 			]
			// 		}
			// })
            // Use Modernizr to detect for touch devices, 
            // then serve them alternate background image content
            var isTouch = Modernizr.touch;
            
            // vars for auto hiding
            var isShowingPlaylist = false;
            var isHidden = false;
            var autoHideTimer;
            var $showContentButton = $('<div class="touchscreen-show-button box">Back</div>')
            
            // initialize BigVideo
            var BV = new $.BigVideo({forceAutoplay:isTouch});
            BV.init();
            // show background image
            BV.show('img/background-dock.jpg');

            // Playlist button click starts video, enables autohiding
            $('.playlist-btn').on('click', function(e) {
                e.preventDefault();
                BV.show($(this).attr('href'));
                autoHide(true);
                isShowingPlaylist = true;
            })

            // Turn off autohiding when mouse is over the nav 
            // (not necessary for touchscreens)
            if (!isTouch) {
                $('.nav')
                    .on('mouseover', function() {
                        if (isShowingPlaylist) autoHide(false);
                    })
                    .on('mouseout', function() {
                        if (isShowingPlaylist) autoHide(true);
                    });
            } else {
                // add button to show content on touchscreen
                $('body').prepend($showContentButton);
            }

            function autoHide(enable) {
                if (enable) {
                    isHidden = true;
                    $('body').on('mousemove', function(event){
                        if (isHidden) {
                            isHidden = false;
                            $('.nav, .main').removeClass('transparent');
                        }
                        clearTimeout(autoHideTimer);
                        autoHideTimer = setTimeout(function() {
                            isHidden = true;
                            $('.nav, .main').addClass('transparent');
                        }, 1000);
                    });    
                } else {
                    clearTimeout(autoHideTimer);
                    $('body').off('mousemove');
                    $('.nav, .main').removeClass('transparent');
                }
            }
// })	