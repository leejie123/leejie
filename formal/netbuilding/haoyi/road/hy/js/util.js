(function(){
    SlidingByPosition = function(wrap,option){
        var _this = this,renderID;
        var config = {
            mouse       : true,
            fliction    : .5,
            center      : true,
            step        : function(){}
        }

        $.extend(config,option);
        
        this.mouse              = { x:0,y:0,rx:0,ry:0,hrx:0,hry:0 };
        this.mouseClone         = { x:0,y:0,rx:0,ry:0,hrx:0,hry:0 };
        this.wrapSize           = { width:wrap.width(), height:wrap.height(), halfW : wrap.width()*0.5, halfH : wrap.height()*0.5};
        this.removeTimer;

        this.stopRender = function(){
            if(typeof _this.removeTimer == 'undefined'){
                positionCal(wrapSize.halfW,wrapSize.halfH);
                _this.removeTimer = setTimeout(function(){
                    stopRender();
                    clearTimeout(_this.removeTimer);
                    _this.removeTimer = undefined;
                },2000);    
            }
        }

        function init(){
            wrap.on('mouseover',function(){
                fliction = .5;
                if(typeof _this.removeTimer != 'undefined'){
                    clearTimeout(_this.removeTimer);
                    _this.removeTimer = undefined;
                }
                startRender();
            });
            wrap.on('mouseout',function(){
                if(typeof _this.removeTimer == 'undefined'){
                    _this.removeTimer = setTimeout(function(){
                        stopRender();
                        clearTimeout(_this.removeTimer);
                        _this.removeTimer = undefined;
                    },1000);    
                }
            });
            wrap.on('mousemove',function(e){
                var p = wrap.offset(),
                x = e.clientX - p.left,
                y = e.clientY - p.top;
                positionCal(x,y);
            });


            $(window).on('resize',function(){
                _this.wrapSize.width  = wrap.width();
                _this.wrapSize.height = wrap.height(); 
                _this.wrapSize.halfW  = wrap.width()*0.5; 
                _this.wrapSize.halfH  = wrap.height()*0.5;

                positionCal(_this.wrapSize.halfW,_this.wrapSize.halfH);
            });
        };

        function positionCal(x,y){
            _this.mouse.x = x; 
            _this.mouse.y = y;
            _this.mouse.rx = x / _this.wrapSize.width;
            _this.mouse.ry = y / _this.wrapSize.height;

            _this.mouse.hrx = (_this.mouse.rx-0.5)*2;
            _this.mouse.hry = (_this.mouse.ry-0.5)*2;
        }

        function startRender(){
            if(typeof renderID == 'undefined'){
                renderID = requestAnimationFrame(onRender);
            }
        }

        function stopRender(){
            cancelAnimationFrame(renderID);
            renderID = undefined;
        }

        function onRender(){
            renderID = requestAnimationFrame(onRender);
            for(var o in _this.mouseClone){
                _this.mouseClone[o] += (_this.mouse[o]-_this.mouseClone[o])*0.02;
            }
            animation();
        }

        function animation(){
            config.step(_this.mouseClone);
        }

        init();
        animation();
        return this;
    }

    SlidingByPosition.prototype.constructor = SlidingByPosition;
    this.SlidingByPosition = SlidingByPosition;

}).call(this)