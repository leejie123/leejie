/* ********************************************************************************************************************************************
        ### Magazine Navi
    ******************************************************************************************************************************************** */
(function(){
    var $mnv,$mnvBtn,$mnvTabSocial,$wrap;
    var mnv = {},
        mnvSocialTabs   = {};
    var isWrapZoomOff     = true;

    var isJp = location.href.indexOf('/jp/') != -1;
    var mod,modCSSAnimations,modCSSTransforms,modCSSTransitions,modTouch,modAnim;
    var ua,is_mobile;

    $(document).ready(function(){

        mod                 = window.Modernizr;
        modCSSAnimations    = mod && mod.cssanimations;
        modCSSTransforms    = mod && mod.csstransforms;
        modCSSTransitions   = mod && mod.csstransitions;
        modTouch            = mod && mod.touch;
        modAnim             = modCSSAnimations && modCSSTransitions;

        ua         = navigator.userAgent.toLowerCase();
        is_mobile  = /mobile|android|ip(ad|od|hone)|windows phone/.test(ua);

        // modCSSTransitions = false;

        magazineNavLoad();
    });
    
    function magazineNavLoad(){
        $mnv    = $('#magazine-nav');
        $wrap   = $('#wrap');
        $('body').css({backgroundColor:'#000'})
        
        if($mnv[0]){
            $mnv.load('/magazine/assets/html/magazine-nav' + (isJp? '-jp': '') + '.html',setup);
            if($wrap[0]){
                if($mnv.data('zoomOff') == false){
                    isWrapZoomOff = false;
                }
            }

            if(isWrapZoomOff){
                // TweenLite.set($wrap,{transformOrigin:'50% 50%', transformPerspective:800});
            }


        }
        
        function setup(){
            $mnvBtn         = $mnv.find('.mnav-close');
            $mnvTabSocial   = $mnv.find('.mnav-tab-socialLinks');
            $overlay        = $('#body-overlay');

            /* mnv Close */
            mnv = {
                mode        :   'close',
                lines       :   $mnvBtn.children(),
                isCSSTS     :   modCSSTransitions,
                toggleBtnOpen   : '',
                toggleBtnClose  : '',
                pos         :   {marginLeft : 11, marginTop:9, startTop:12},
                durations   :   {line:0.2,btn:0.5,mnv:0.5},
                ease        :   '.46,.1,.34,1',
                lineEase    :   Power4.easeOut,
                isOverlay   :   $overlay[0],
                transition  :   function(obj,dur,ease,delay){
                                    setTimeout(function(){
                                        obj.css(cssTransition(dur,ease));
                                    },delay);
                                },
                originChange : function(){
                    if(this.isCSSTS){
                        // var orginY = Math.abs(((WindowSize().height-$(window).scrollTop())/$wrap.height())*$wrap.height()*.5-WindowSize().halfY);
                        // console.log(WindowSize().height-$(window).scrollTop());
                        // if($wrap[0])this.transition($wrap,0,this.ease,0);
                        // TweenLite.set($wrap,{transformOrigin:'50% '+orginY+'px', transformPerspective:800});
                        // if($wrap[0])this.transition($wrap,this.durations.mnv,this.ease,10);
                    }
                },
                init        :   function(){
                                    this.originChange();
                                    for(var i=0,n=this.lines.length; i<n; i++){
                                        var line    = $(this.lines[i]),
                                            css     = {top:this.pos.startTop+this.pos.marginTop*i,transformOrigin:'50% 50%'};
                                        if(i == 0)css.left = this.pos.marginLeft;
                                        if(i > 0 && i < 3)css.right = this.pos.marginLeft;
                                        if(i > 2){
                                            css.right = this.pos.marginLeft+1;
                                            css.width = 0;
                                            css.transformOrigin = '100% 50%';
                                            css.top = this.pos.startTop+this.pos.marginTop;
                                            css.rotation = 45;

                                            if(i==4)css.rotation *= -1;
                                        }
                                        TweenLite.set(line,css);

                                        if(this.isCSSTS){
                                            this.transition(line,this.durations.line,this.ease,100);
                                        }
                                    }

                                    if(this.isCSSTS){
                                        this.transition($mnv,this.durations.mnv,this.ease,100);
                                        this.transition($mnvBtn,this.durations.btn,this.ease,100);
                                        this.transition($overlay,this.durations.mnv,this.ease,100);

                                        if($wrap[0])this.transition($wrap,this.durations.mnv,this.ease,100);
                                    }else{
                                        $mnvBtn.empty().css({backgroundColor:'#fff'});
                                        this.toggleBtnOpen = $('<img src="/magazine/common/images-renewal/magazine-nav-open@2x.gif" style="position:absolute" width="44" height="44">').appendTo($mnvBtn);
                                        this.toggleBtnClose = $('<img src="/magazine/common/images-renewal/magazine-nav-close@2x.gif" style="position:absolute" width="44" height="44">').appendTo($mnvBtn).css('opacity',0);
                                    }
                                    $mnvBtn.bind('mouseover',function(){mnv.over()});
                                    $mnvBtn.bind('mouseout',function(){mnv.out()});
                                    $mnvBtn.bind('click',function(){mnv.modeToggle()});
                                    $overlay.bind('click',function(){mnv.modeClose()});

                                    var _this = this;
                                    MagazineNaviStatus = function(){
                                        return _this.mode == 'close'?false:true;
                                    }

                                    return this;
                                },
                over        :   function(){
                                    // return;
                                    var dur = this.isCSSTS?0:this.durations.line*1.5;

                                    if(this.isCSSTS) {
                                        if(this.mode == "close"){
                                            TweenLite.to(this.lines[0],dur,{ease:Power3.easeOut,scale:1,marginLeft:-5});
                                            TweenLite.to(this.lines[2],dur,{ease:Power3.easeOut,scale:1,marginRight:-5});
                                        }else{
                                            TweenLite.to(this.lines[0],dur,{ease:Power3.easeOut,scale:1.3,marginLeft:0,y:9});
                                            TweenLite.to(this.lines[2],dur,{ease:Power3.easeOut,scale:1.3,marginRight:0,y:-9});
                                        }    
                                    }else{
                                        TweenLite.to($mnvBtn,0.3,{opacity:0.9,ease:Power4.easeOut});
                                    }
                                    
                                    
                                },
                out         :   function(){
                                    // return;
                                    var dur = this.isCSSTS?0:this.durations.line*1.5;

                                    if(this.isCSSTS) {
                                        if(this.mode == "close"){
                                            TweenLite.to(this.lines[0],dur,{ease:Power3.easeOut,scale:1,marginLeft:0});
                                            TweenLite.to(this.lines[2],dur,{ease:Power3.easeOut,scale:1,marginRight:0});
                                        }else{
                                            TweenLite.to(this.lines[0],dur,{ease:Power3.easeOut,scale:1,marginLeft:0,y:9});
                                            TweenLite.to(this.lines[2],dur,{ease:Power3.easeOut,scale:1,marginRight:0,y:-9});
                                        }
                                    }else{
                                        TweenLite.to($mnvBtn,0.3,{opacity:1,ease:Power4.easeOut});
                                    }
                                    
                                },
                modeOpen    :   function(){
                    this.mode = 'open';
                    TweenLite.to($mnv,this.isCSSTS?0:this.durations.mnv*1.1,{left:0,ease:Power3.easeInOut});
                    // $('body').attr('data-magazine-nav-expanded', true);

                    $('body').attr('data-magazine-nav-expanded', true);
                    TweenLite.to($overlay,this.isCSSTS?0:this.durations.mnv*1.5,{delay:0.1,opacity:1});

                    if(this.isCSSTS){
                        this.originChange();
                        TweenLite.set($mnvBtn,{backgroundColor:'#fff'});
                        TweenLite.set(this.lines[1],{ease:this.lineEase,backgroundColor:'#888', opacity:0});
                        TweenLite.set(this.lines[0],{ease:this.lineEase,backgroundColor:'#888', scale:1,marginLeft:0,opacity:1,y:9,rotation:45});
                        TweenLite.set(this.lines[2],{ease:this.lineEase,backgroundColor:'#888', scale:1,marginRight:0,opacity:1,y:-9,rotation:-45});
                    }else{
                        TweenLite.to(this.toggleBtnClose,this.durations.icon,{ease:Power4.easeOut,opacity:1});
                    }

                    TweenLite.to($wrap,this.isCSSTS?0:this.durations.mnv*1.5,{marginLeft:200,ease:Power3.easeInOut});
                },
                modeClose   : function(){
                    this.mode = 'close';
                    TweenLite.to($mnv,this.isCSSTS?0:this.durations.mnv*1.5,{left:-345,ease:Power3.easeInOut});

                    if(this.isOverlay){
                        TweenLite.to($overlay,this.isCSSTS?0:this.durations.mnv*1.5,{opacity:0});
                        setTimeout(function(){
                            $('body').attr('data-magazine-nav-expanded', false);
                        },this.isCSSTS?this.durations.mnv*1000:this.durations.mnv*1.5*1000);
                    }

                    if(this.isCSSTS){
                        TweenLite.set($mnvBtn,{backgroundColor:'#000'});
                        TweenLite.set(this.lines[1],{ease:this.lineEase,backgroundColor:'#fff', opacity:1});
                        TweenLite.set(this.lines[0],{ease:this.lineEase,backgroundColor:'#fff', scale:1,marginLeft:0,opacity:1,y:0,rotation:0});
                        TweenLite.set(this.lines[2],{ease:this.lineEase,backgroundColor:'#fff', scale:1,marginRight:0,opacity:1,y:0,rotation:0});
                    }else{
                        TweenLite.to(this.toggleBtnClose,this.durations.icon,{ease:Power4.easeOut,opacity:0});
                    }
                    TweenLite.to($wrap,this.isCSSTS?0:this.durations.mnv*1.5,{marginLeft:0,ease:Power3.easeInOut});
                },
                modeToggle  : function(){
                    var onclickStr = $mnvBtn.attr('onclick');
                    if(this.mode == 'close') {
                        this.modeOpen();
                        if (onclickStr) {
                            $mnvBtn.attr('onclick', onclickStr.replace('_men_ope', '_men_clo'));
                        }
                    } else {
                        this.modeClose();
                        if (onclickStr) {
                            $mnvBtn.attr('onclick', onclickStr.replace('_men_clo', '_men_ope'));
                        }
                    }
                }
            };


            /* mnav tab socialLinks */
            mnvSocialTabs = {
                mode            : 'close',
                btns            : $mnvTabSocial.find('.soc-btn'),
                toggleBtn       : $mnvTabSocial.find('.soc-toggle'),
                toggleBtnOpen   : '',
                toggleBtnClose  : '',
                lines           : $mnvTabSocial.find('.soc-toggle').children(),
                ease            : '.29,.02,.27,1',
                isCSSTS         : modCSSTransitions,
                isMoblieAndTR   : modCSSTransitions && !is_mobile,
                durations       : {base:.25,icon:.2,line:.2},
                toggleSize      : {open:0,close:0},
                toggleBtns      : {open:'',close:''},
                defaultView     : {pc:1,mobile:1},
                eases           : {icon:'.29,.02,.27,1',line:'.46,.1,.34,1'},
                bgOpacity       : 0.3,




                transition  :   function(obj,dur,ease,delay){
                                    setTimeout(function(){
                                        obj.css(cssTransition(dur,ease));
                                    },delay);
                                },
                init : function(){
                    var _this       = this,
                        margin      = 47,
                        openSize    = 0,
                        closeSize   = 0;

                    if(modCSSTransitions){
                        this.toggleBtnOpen = this.toggleBtn.find('.open');
                        this.toggleBtnClose = this.toggleBtn.find('.close');
                    }else{
                        this.durations.base = 0;

                        this.toggleBtnOpen = this.toggleBtn.find('.open');
                        this.toggleBtnClose = this.toggleBtn.find('.close');

                        setTimeout(function(){
                            _this.durations.base = .3;
                        },1000);
                    }

                    this.toggleSize.close = is_mobile?this.defaultView.mobile:this.defaultView.pc*margin+margin-1;

                    $(this.btns).each(function(i){
                        var btn     = $(this),
                            icon    = btn.find('img'),
                            top     = margin*i,
                            bgc     = btn.css('background-Color');

                        if(i<_this.btns.length-1)btn.css({position:'absolute',top:top});
                        $mnvTabSocial.css({height:top+margin-1});

                        if(i==_this.btns.length-1)_this.toggleSize.open = top+margin-1;

                        if(modCSSTransitions){
                            TweenLite.set(btn,{left:0,transformOrigin:'-10% 50%',transformPerspective:1000});
                            TweenLite.set($mnvTabSocial,{perspective:1000});
                            _this.transition($mnvTabSocial,_this.durations.base,_this.ease,100);
                            _this.transition(icon,_this.durations.icon,_this.eases.icon,100);
                            _this.transition(btn,_this.durations.icon,_this.eases.icon,100);
                        }

                        btn.bind('mouseover',function(e){
                            if(i<_this.btns.length-1){
                                if(_this.mode == 'open'){
                                    if(modCSSTransitions){
                                        TweenLite.to(icon,0,{ease:Power4.easeOut,backgroundColor:'rgba(0,0,0,'+_this.bgOpacity+')'});
                                    }else{
                                        TweenLite.to(btn,_this.durations.icon,{ease:Power4.easeOut,opacity:0.8});
                                    }
                                }else{
                                    TweenLite.to(btn,_this.isCSSTS?0:_this.durations.icon,{ease:Power4.easeOut,backgroundColor:bgc,opacity:1});
                                }
                                // else 
                            }else{

                                if(_this.mode == 'open'){
                                    if(modCSSTransitions){
                                        TweenLite.set(_this.toggleBtn,{backgroundColor:'rgba(255,255,255,'+1+')',opacity:1});
                                    }else{
                                        TweenLite.to(_this.toggleBtn,0.3,{backgroundColor:'#fff',ease:Power4.easeOut,opacity:1});
                                    }
                                }else{
                                    if(modCSSTransitions){
                                        TweenLite.set(_this.toggleBtn,{backgroundColor:'rgba(255,255,255,'+1+')',opacity:1});
                                    }else{
                                        TweenLite.to(_this.toggleBtn,0.3,{backgroundColor:'#fff',ease:Power4.easeOut,opacity:1});
                                    }
                                }
                            }

                        });

                        btn.bind('mouseout',function(e){
                            if(i<_this.btns.length-1){
                                var op = 1;
                                if(_this.mode=='close'){
                                    if(i>=_this.defaultView.pc)op = 0;
                                    TweenLite.to(btn,_this.isCSSTS?0:_this.durations.icon,{ease:Power4.easeOut,backgroundColor:_this.isCSSTS?'rgba(0,0,0,'+_this.bgOpacity+')':'#000',opacity:op});
                                }else{
                                    if(modCSSTransitions){
                                        TweenLite.to(icon,_this.isCSSTS?0:_this.durations.icon,{ease:Power4.easeOut,backgroundColor:'rgba(0,0,0,0)'});
                                    }else{
                                        TweenLite.to(btn,_this.durations.icon,{ease:Power4.easeOut,opacity:1});
                                    }
                                    
                                }
                            }else{
                                var op = 1;
                                if(_this.mode == 'open'){
                                    if(modCSSTransitions){
                                        TweenLite.set(_this.toggleBtn,{backgroundColor:'rgba(255,255,255,'+_this.bgOpacity+')',opacity:1});
                                    }else{
                                        TweenLite.to(_this.toggleBtn,0.3,{backgroundColor:'#fff',ease:Power4.easeOut,opacity:0.5});    
                                    }
                                }else{
                                    if(modCSSTransitions){
                                        TweenLite.set(_this.toggleBtn,{backgroundColor:'rgba(255,255,255,'+_this.bgOpacity+')',opacity:1});
                                    }else{
                                        // TweenLite.to(_this.toggleBtn,0.3,{backgroundColor:'#000',ease:Power4.easeOut,opacity:baseOpacity});
                                        TweenLite.to(_this.toggleBtn,0.3,{backgroundColor:'#fff',ease:Power4.easeOut,opacity:0.5});
                                    }
                                }
                            }
                        });

                        if(i==_this.btns.length-1){
                            btn.bind('click',function(){
                                if(_this.mode == 'open'){
                                    _this.close();
                                }else if(_this.mode == 'close'){
                                    _this.open();
                                }
                            });
                        };

                        $(window).bind('socialOpen',function(){
                            if(i<_this.btns.length-1){
                                TweenLite.to(btn,_this.isMoblieAndTR?0:_this.durations.base,{ease:Power4.easeOut,backgroundColor:bgc,opacity:1});
                            }else{
                                if(modCSSTransitions){
                                    TweenLite.to(_this.toggleBtn,0.3,{ease:Power4.easeOut,opacity:1});
                                }else{ // IE 8,9
                                    TweenLite.to(_this.toggleBtn,0.3,{backgroundColor:'#fff',ease:Power4.easeOut,opacity:0.5});    
                                }
                            }


                        });

                        $(window).bind('socialClose',function(){
                            if(i<_this.btns.length-1){
                                btn.trigger('mouseout');
                                if(modCSSTransitions){
                                    TweenLite.set(btn,{
                                        backgroundColor:'rgba(0,0,0,'+_this.bgOpacity+')',
                                        opacity:i<_this.defaultView.mobile?1:0
                                    });    
                                }
                            }else{
                                if(modCSSTransitions){
                                    TweenLite.set(_this.toggleBtn,{backgroundColor:'rgba(255,255,255,'+_this.bgOpacity+')',opacity:1});
                                }else{ // IE 8,9
                                    TweenLite.to(_this.toggleBtn,0.3,{backgroundColor:'#fff',ease:Power4.easeOut,opacity:0.5});    
                                }
                            }
                        });

                        $(window).bind('bandOpen',function(){
                            TweenLite.to(btn,_this.isCSSTS?0:this.durations.base,{ease:Power4.easeOut,delay:0,rotationY:180});
                        });

                        $(window).bind('bandClose',function(){
                            TweenLite.to(btn,_this.isCSSTS?0:this.durations.base,{ease:Power4.easeOut,delay:.2,rotationY:0}); 
                        });

                        $(window).bind('socialOn',function(){
                            _this.open();
                        });

                        $(window).bind('socialOff',function(){
                            _this.close();
                        });
                    });
                    
                    if(is_mobile){
                        // _this.toggleSize.close = margin-1;
                        this.toggleSize.close = this.defaultView.pc*margin+margin-1;
                        $mnvTabSocial.css({top:82});
                    }

                    return this;
                },
                open : function(){
                    var onclickStr = this.toggleBtn.attr('onclick');
                    if (!!onclickStr) {
                        this.toggleBtn.attr('onclick', onclickStr.replace('_soc_ope', '_soc_clo'));
                    }
                    $(window).trigger('socialOpen');
                    this.mode = 'open';
                    TweenLite.to($mnvTabSocial,modCSSTransitions?0:this.durations.base,{ease:Power4.easeOut,height:this.toggleSize.open});

                    if(this.isCSSTS){
                        TweenLite.set(this.toggleBtn,{backgroundColor:'rgba(255,255,255,'+this.bgOpacity+')',opacity:1});
                        this.toggleBtnOpen.css({opacity:0});
                        this.toggleBtnClose.css({opacity:1});
                    }else{
                        TweenLite.to(this.toggleBtnOpen,this.durations.base,{ease:Power4.easeOut,opacity:0});
                        TweenLite.to(this.toggleBtnClose,this.durations.base,{ease:Power4.easeOut,opacity:1});
                    }
                },
                close : function(){
                    var onclickStr = this.toggleBtn.attr('onclick');
                    if (!!onclickStr) {
                        this.toggleBtn.attr('onclick', onclickStr.replace('_soc_clo', '_soc_ope'));
                    }
                    this.mode = 'close';
                    TweenLite.to($mnvTabSocial,modCSSTransitions?0:this.durations.base,{ease:Power4.easeOut,height:this.toggleSize.close});
                    $(window).trigger('socialClose');

                    if(this.isCSSTS){
                        this.toggleBtnOpen.css({opacity:1});
                        this.toggleBtnClose.css({opacity:0});
                    }else{
                        TweenLite.to(this.toggleBtnOpen,this.durations.base,{ease:Power4.easeOut,opacity:1});
                        TweenLite.to(this.toggleBtnClose,this.durations.base,{ease:Power4.easeOut,opacity:0});
                    }

                },
                bandOpen : function(){
                    $(window).trigger('bandOpen');
                },
                bandClose : function(){
                    $(window).trigger('bandClose');
                }
            }

            mnv.init().modeClose();
            mnvSocialTabs.init().close();
            initIssuesToggle();
            addTrackingCode();

            function addTrackingCode () {
                var $el = $mnv.find('[data-ga-str]'),
                    match = /^(?:\/jp)?\/magazine\/issue(\d+)\/([\w\.-]{3})/.exec(location.pathname);

                $el.each(function () {
                    var gaStr = $(this).attr('data-ga-str'),
                        onclickStr = $(this).attr('onclick') || '',
                        label = !!match?
                            gaStr.replace('{{issue}}', match[1]).replace('{{series}}', match[2]):
                            gaStr.replace('i{{issue}}_{{series}}', 'top');
                    $(this).attr('onclick', "_gaq.push(['_trackEvent','Link','Click','" + label + "',,'true']);" + onclickStr);
                });
            }

            function initIssuesToggle () {

                var $button = $mnv.find('.mnav-issues-toggle'),
                    $list = $mnv.find('.mnav-issues-list');

                $button.on('click', toggleList);
                $list.toggle($button.attr('data-expanded') === 'true');


                function toggleList () {
                    var expanded = $button.attr('data-expanded') === 'true',
                        onclickStr = $button.attr('onclick');
                    $button.attr('data-expanded', !expanded);
                    if (onclickStr) {
                        $button.attr('onclick', expanded? onclickStr.replace('_men_iss_clo', '_men_iss_ope'): onclickStr.replace('_men_iss_ope', '_men_iss_clo'));
                    }
                    $list.slideToggle({
                        duration: 125,
                        easing: 'swing'
                    });
                }
            }

        }
    }

    function WindowSize(){
        var size = { width:0, height:0, halfX:0, halfY:0};
        if (document.documentElement.clientHeight) {
            size.width  = document.documentElement.clientWidth;
            size.height = document.documentElement.clientHeight;
            size.halfX  = document.documentElement.clientWidth * 0.5;
            size.halfY  = document.documentElement.clientHeight * 0.5;
        } else if (document.body.clientHeight) {
            size.width  = document.body.clientWidth;
            size.height = document.body.clientHeight;
            size.halfX  = document.body.clientWidth * 0.5;
            size.halfY  = document.body.clientHeight * 0.5;
        } else if (window.innerHeight) {
            size.width  = window.innerWidth;
            size.height = window.innerHeight;
            size.halfX  = window.innerWidth * 0.5;
            size.halfY  = window.innerHeight * 0.5;
        }
        return size;
    }
    
    function cssTransition(duration,easing,option){
        var css = typeof option != 'undefined'?option:''+ duration +'s cubic-bezier('+easing+')';
        return {
            "-webkit-transition" : css,
            "-moz-transition"    : css,
            "transition"         : css
        }
    }
}).call(this)