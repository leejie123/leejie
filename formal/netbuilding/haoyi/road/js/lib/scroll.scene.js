(function(){
    var _bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };
    function ScrollActor(id,target,scrollInfo,option,action){
        this.id             = id;
        this.target         = $(target);
        this.parent         = this.target.parent();
        this.progress       = {crt:0,old:0};
        this.progressMargin = 0;
        this.scrollInfo     = scrollInfo;

        this.parentSize     = {width:0,height:0};
        this.targetSize     = {width:0,height:0};
        this.stageSize      = {width:0,height:0};
        this.targetOffset   = {top:0, left:0};
        this.overCheck      = {start:false,end:false};
        this.actors         = [];
        this.pointActors    = [];

        this.action         = action;


        this.config         = {
            absolute : false
        }

        $.extend(this.config,option);

        this.stageOut       = true;

        this.init = function(){
            this.addEvent();
            this.update();
            return this;
        }

        this.addEvent = function(){
            this.onResize    = _bind(this.onResize,this);
            $(window).bind('resize',this.onResize);
            this.onResize();
        }

        this.init();
        return this;
    }

    ScrollActor.prototype.onResize = function(){
        // this.position
        this.parentSize.width = this.parent.width();
        this.parentSize.height = this.parent.height();
        this.targetSize.width = this.target.width();
        this.targetSize.height = this.target.height();
        this.targetSize.innerHeight = this.target.innerHeight();
        this.targetSize.halfHeight = this.target.innerHeight()*0.5;
        this.stageSize = WindowSize();
    }

    ScrollActor.prototype.addActor = function(start,end,fn,option){
        this.actors.push(new Actor(start,end,fn,this,option));
    }

    ScrollActor.prototype.pointActor = function(point,fn){
        this.pointActors.push({point:point,passed:false,callBack:fn});
    }

    ScrollActor.prototype.update = function(){
        var offset  = this.target.offset();
        this.progress.crt = -(offset.top-this.stageSize.height)/(this.targetSize.innerHeight+this.stageSize.height);
        if(this.progress.old == this.progress.crt)return;

        this.pointActorUpdate();

        if(this.progress.crt >= -this.progressMargin-.5 && this.progress.crt <= 2 + this.progressMargin){
            this.childUpdate();
            if(this.action)this.action(this);
            this.overCheck.start = this.overCheck.end = false;
        }else{
            if(!this.overCheck.start && this.progress.crt < -this.progressMargin){
                this.overCheck.start = true;
                this.progress.crt = -this.progressMargin;
                this.childUpdate();
                if(this.action)this.action(this);
            }

            if(!this.overCheck.end && this.progress.crt > 2+this.progressMargin){
                this.overCheck.end = true;
                this.progress.crt = 2+this.progressMargin;
                this.childUpdate();
                if(this.action)this.action(this);
            }

        }

        if(this.progress.crt < 0 || this.progress.crt > 1){
            this.stageOut = true;
        }else{
            this.stageOut = false;
        }
        this.progress.old = this.progress.crt;
    }

    ScrollActor.prototype.childUpdate = function(){
        for(var o in this.actors){
            var actor = this.actors[o];
            actor.update(this.progress.crt);
        }
    }

    ScrollActor.prototype.pointActorUpdate = function(){
        for(var o in this.pointActors){
            var info = this.pointActors[o];

            if(!info.passed && this.progress.crt >= info.point){
                info.passed = true;
                info.callBack(1);
            }

            if(info.passed && this.progress.crt <= info.point){
                info.passed = false;
                info.callBack(0);
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

    ScrollActor.prototype.constructor = ScrollActor;
    this.ScrollActor = ScrollActor;

    function Actor(start,end,action,root,option){
        this.root           = root;
        this.progress       = {crt:0,old:-1};
        this.start          = start;
        this.end            = end;
        this.total          = end-start;
        this.overCheck      = {start:true,end:false};

        this.once           = this.start == this.end?true:null;
        // this.once = false;

        this.config = {
            startFn:function(){},
            endFn:function(){}
        }

        $.extend(this.config,option);

        this.action = action;

        this.init = function(){
            this.update(this.root.progress.crt);
            // console.log(this.overCheck,this.start,this.end);
            return this;
        }

        this.init();
    }

    Actor.prototype.update = function(worldProgress){
        if(worldProgress >= this.start && worldProgress <= this.end){
            this.progress.crt = (worldProgress-this.start)/this.total;
            this.overCheck.start = this.overCheck.end = false;
            if(this.progress.old == this.progress.crt)return;
            
            if(this.action)this.action(this);
        }else{
            if(!this.overCheck.start && worldProgress < this.start){
                // console.log(this.overCheck,this.start,this.end,this.action);
                this.overCheck.start = true;
                this.progress.crt = 0;
                this.config.startFn();
                if(this.action)this.action(this);
            }

            if(!this.overCheck.end && worldProgress > this.end){
                this.overCheck.end = true;
                this.progress.crt = 1;
                this.config.endFn();
                if(this.action)this.action(this);
            }

        }

        this.progress.old = this.progress.crt;
    };

    Actor.prototype.easeProgress = function(easing){
        if(typeof easing !== 'undefined' && typeof $.easing[easing] !== 'undefined'){
            var p = this.progress.crt;
            if(p < 0)p=0;
            if(p > 1)p=1;
            newPogress = $.easing[easing](p,p,0,1,1);
        }
        return newPogress;
    }


    Actor.prototype.constructor = Actor;


}).call(this);