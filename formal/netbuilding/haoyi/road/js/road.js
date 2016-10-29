(function(){
//test
/* ******************************************************************************************
    LOADING
****************************************************************************************** */

    var mod, modCSSAnimations, modCSSTransforms, modCSSTransitions, modTouch, modAnim;
    var stage = WindowSize();

    $(document).ready(function(){
        mod = window.Modernizr;
        modCSSAnimations  = mod && mod.cssanimations;
        modCSSTransforms  = mod && mod.csstransforms;
        modCSSTransitions = mod && mod.csstransitions;
        modTouch          = mod && mod.touch;
        modAnim           = modCSSTransforms && modCSSTransitions;

        init();
    });

    lexusMagazineOnLoad = function(){
        $('.changeCanvas').changeToCanvas();
        reset();
        setup();
        TweenLite.set($('#header-title'),{z:-300,opacity:0,transformPerspective:1000});
    };

    var stats;
    lexusMagazineReady = function(){
        addEvent();
        introMotion();
        // stats = new Stats();
        // stats.domElement.style.position = 'absolute';
        // stats.domElement.style.top = '0px';
        // $('body')[0].appendChild( stats.domElement );
        // scenes.gotoScene(1,{duration:100, ease:'swing'});
    };


/* ******************************************************************************************
    INITIALIZE    
****************************************************************************************** */

    var $wrap, $contents,$contentsIn,$repeat,$credit;
    var $parallaxBox1;
    var $blackBg;
    function init(){
        $wrap           = $('#wrap');
        $contents       = $('#contents');
        $contentsIn     = $('#contents-in');

        $repeat         = $('.credit-wrap .repeat').css({cursor:'point'});

        $('.empty-space').each(function(){
            var h = $(this).data('height');
            if(typeof h != 'undefined'){
                $(this).css({height:h});
            }
        });
    }


/* ************************************************************
    RESET
************************************************************ */
    function reset(){
        // console.log($contentsIn.height());
    }
/* ******************************************************************************************
    SETUP    
****************************************************************************************** */
    var scenes,skipFlg = false, intro = true;
    var contentsInHeight = 0, contentsInY = 0, contentsInLimit = 0;
    var scroll,scrollBar,scenes;
    var actors = {}, sentenceActors = [];
    var filterImgs = [];
    var parxCaps    = [];
    var bgThums     = [];
    var parx1,parx2,parx3;
    var stageInScenes = [];
    var specs = [], specCubes = [], 
        copyBolds = [], copyBoldPs = [],
        
        boxs = [];
    // var mapSketch;
    function setup(){
        contentsInHeight = $contentsIn.height();
        contentsInLimit = contentsInHeight - stage.height;

        var mapWrap = $("#map-wrap");
        // mapSketch = new Sketch($("#map-wrap"),0,mapWrap.width(),mapWrap.height(),"/magazine/issue5/road/images/brush2.png",{roughSketch:$("#map-img").attr("src")});
        // $("#map-img").remove();
        // mapSketch.drawStart();

        scroll = new Scroll({
            target      : '#wrap',
            speed       : 0.8,
            friction    : 0.94,
            touchSpeed  : 5,
            scrollLimit : 50,
            freeze      : true,
            type        : 'wheel',
            scrollType  : 'y',
            screenFix   : true,
            stats       : false,
            step        : onScroll,
            scrollBar   : {moveTarget:$contentsIn,scrollBarWrap:'.scbar-wrap',option:{dragSpeed:.2,boundSpeed:.5}}
        });

        scrollBar = scroll.scrollBar;

        $blackBg = $('#black-bg');

        $('.img-wrap').each(function(i){
            filterImgs[i] = new FilterIMG(this).bright(1).opacity(0);
            if(i>0)filterImgs[i].hidden(1);
        })


        var total = 0;
        $('.scene').each(function(i){
            var scene = $(this);
            TweenLite.set(scene,{transformPerspective:1000});
            addActor('scene'+i,scene,{});
        });

        $('.bg-thum-wrap').each(function(i){
            var wrap = $(this);
            bgThums[i] = {wrap:wrap,outer:wrap.find('.thum-outer'),inner:wrap.find('.thum-inner'),rotX:0,rotY:0};

            TweenLite.set([bgThums[i].wrap,bgThums[i].inner],{transformPerspective:1000,transformOrigin:'50% 50%'});
        });

        $('.canvasFit').each(function(){
            var img = $(this).imgfit({contain:'contain'});
        });

        // var sp = new SlidingByPosition($wrap,{step:moving});
        // TweenLite.set($('#map-img'),{transformPerspective:1000});

        // var maps = $('.maps').children();
        function moving(e){
            var moveOffset = 10;
            // for(var o in filterImgs){
            //     var imgInfo = filterImgs[o];
            //     if(!imgInfo.statusOn){
            //         imgInfo.wrap.css(rotateCSS32(-e.hry*moveOffset,e.hrx*moveOffset));  
            //     }
            // }
        }

        // easings   = ['.32,.04,.31,.99','.5,.35,.31,.99'];
        $('.spec-inner').each(function(i){
            specCubes[i] = cubeCreate2($(this).parent(),$(this),{cubeRot:'vertical'});
            specCubes[i].cl.rolling(-180);
        });

        var copyBoldCount = 0;
        $('.copy-bold span').each(function(i){
            var span    = $(this).css({position:'relative'}),
                text    = span.text();

            var inner   = $('<div></div>'),
                p       = $('<span></span>').text(text).css({position:'relative',display:'inline-block',width:span.width(),height:span.height()});

            span.css({width:span.width(),height:span.height()});
            span.text('');
            span.append(p);
            var name = 'copyBold_'+i;
            addActor(name,span,{});
            copyBolds[i] = actors[name];
            copyBoldPs[i] = {obj:p,count:copyBoldCount};
            TweenLite.set(span,{pespective:1000});
            TweenLite.set(p,{transformPerspective:1000,transformOrigin:'50% 50%'});
            copyBoldCount++;
            if(span.hasClass('last'))copyBoldCount = 0;
        })


        function cubeCreate2(cubeCon,front,data){
            cubeCon.css({width:cubeCon.innerWidth(), height:cubeCon.innerHeight()});
            // front.css({width:front.innerWidth(), height:front.innerHeight()});
            var size     = { width : cubeCon.width() , height : cubeCon.height() , depth: data.cubeRot=='vertical'?cubeCon.height():cubeCon.width()};
                cube     = $('<div class="cube"></div>').appendTo(cubeCon),
                planes   = {
                    front   : $('<div class="planes"></div>').append(front).appendTo(cube),
                    back    : $('<div class="planes"></div>').appendTo(cube).css({'background':'rgba(255,255,255,.7)'}),
                    top     : $('<div class="planes"></div>').appendTo(cube).css({'background':'rgba(0,0,0,.7)'}),
                    bottom  : $('<div class="planes"></div>').appendTo(cube).css({'background':'rgba(0,0,0,.7)'})
                };
            cube.css(cssTransition(0.4,'cubic-bezier(.5,.35,.31,.99)'));
            return { cl : new CUBE(cube,planes,size,{resize:true}), elem : cube };
        }

        function rotateCSS32(rotX,rotY){
            var css3 = "rotateX("+rotX+"deg) rotateY("+rotY+"deg)";
            return{
                "-webkit-transform" : css3,
                "-moz-transform"    : css3,
                "-o-transform"      : css3,
                "-ms-transform"     : css3,
                "transform"         : css3
            };
        }

        parx1 = new Parallax('#parallaxPhoto1',new Caption('#parx-cap1'));
        parx2 = new Parallax('#parallaxPhoto2',new Caption('#parx-cap2'));
        parx3 = new Parallax('#parallaxPhoto3',new Caption('#parx-cap3'));

        parx1.wrap.hide();
        parx2.wrap.hide();
        parx3.wrap.hide();

        addActor('emsp0_1',$('#emsp0-1'),{});
        addActor('emsp0_2',$('#emsp0-2'),{});
        addActor('emsp0_3',$('#emsp0-3'),{});

        addActor('emsp1_1',$('#emsp1-1'),{});
        addActor('emsp1_2',$('#emsp1-2'),{});

        addActor('emsp2_1',$('#emsp2-1'),{});
        addActor('emsp2_2',$('#emsp2-2'),{});
        addActor('emsp2_3',$('#emsp2-3'),{});
        addActor('emsp2_4',$('#emsp2-4'),{});

        addActor('emsp3_1',$('#emsp3-1'),{});
        addActor('emsp3_2',$('#emsp3-2'),{});
        addActor('emsp3_3',$('#emsp3-3'),{});

        addActor('emsp4_1',$('#emsp4-1'),{});
        addActor('emsp4_2',$('#emsp4-2'),{});
        addActor('emsp4_3',$('#emsp4-3'),{});

        addActor('emsp5_1',$('#emsp5-1'),{});
        addActor('emsp5_2',$('#emsp5-2'),{});

        addActor('emsp6_1',$('#emsp6-1'),{});
        addActor('emsp6_2',$('#emsp6-2'),{});
        // addActor('emsp4_3',$('#emsp4-3'),{});

        addActor('emsp7_1',$('#emsp7-1'),{});
        addActor('emsp7_2',$('#emsp7-2'),{});

        addActor('emsp9_1',$('#emsp9-1'),{});
        addActor('emsp9_2',$('#emsp9-2'),{});



        addActor('sent1_1',$('#sent1-1'),{});
        addActor('sent1_2',$('#sent1-2'),{});

        addActor('sent2_1',$('#sent2-1'),{});
        addActor('sent2_2',$('#sent2-2'),{});
        addActor('sent2_3',$('#sent2-3'),{});

        addActor('sent3_1',$('#sent3-1'),{});
        addActor('sent3_2',$('#sent3-2'),{});
        addActor('sent3_3',$('#sent3-3'),{});

        addActor('sent4_1',$('#sent4-1'),{});

        addActor('sent6_1',$('#sent6-1'),{});


        addActor('emsp8_1',$('#emsp8-1'),{});
        addActor('emsp8_2',$('#emsp8-2'),{});
        addActor('emsp8_3',$('#emsp8-3'),{});
        addActor('emsp8_4',$('#emsp8-4'),{});
        addActor('emsp8_5',$('#emsp8-5'),{});
        addActor('emsp8_6',$('#emsp8-6'),{});


        addActor('sent8_1',$('#sent8-1'),{});
        addActor('sent8_2',$('#sent8-2'),{});
        addActor('sent8_3',$('#sent8-3'),{});
        addActor('sent8_4',$('#sent8-4'),{});
        addActor('sent8_5',$('#sent8-5'),{});
        addActor('sent8_6',$('#spec-p'),{});

        addActor('mapWrap',$('#map-wrap'),{});

        addActor('scene5',$('#scene5'),{});
        addActor('threeBox',$('#threeBox'),{});
        

        $('.box-wrap').each(function(i){
            TweenLite.set($(this),{transformPerspective:1000});
            boxs[i] = {wrap:$(this)};
        })

        $('#spec li').each(function(i){
            var name = 'spec_'+i
            addActor(name,$(this),{});
            specs[i] = actors[name];
        });
        


        sceneAnimtionSet();
        blackBgOpacity(0);
    }

    function addActor(name,target,option){
        actors[name] = new ScrollActor(name,target,scroll.scrollBar.scroll,option);
    }
    function sceneAnimtionSet(){

        /* ************************************************************
            Scene0
        ************************************************************ */
        
        // actors.scene0.addActor(0,1,function(e){
        //     var p = e.progress.crt;
        //         brightImg = filterImgs[0];
        // });

        actors.mapWrap.addActor(0,.6,function(e){
            var p = e.easeProgress('easeInOutPower2');

            $('.maps').each(function(i){
                var z   = ((3-i)*100)+200,
                    rx  = (i*10)+20,
                    y   = (i*10)+50;

                TweenLite.set($(this),{z:z-z*p,opacity:p,rotationX:rx-rx*p,y:y-y*p,transformPerspective:1000});
            })
        });


        var scene5Caption = $('#scene5 .caption');
        actors.threeBox.addActor(0,.5,function(e){
            var p = e.easeProgress('easeInOutPower2');
            TweenLite.set(scene5Caption,{y:200-200*p});
        });

        actors.threeBox.addActor(.7,1,function(e){
            var p = e.easeProgress('easeInOutPower2');
            TweenLite.set(scene5Caption,{y:-200*p});
        });


        // actors.emsp9_1.pointActor(.64,function(e){
        //     if(d){
        //         MagazineFooterOpenTab();
        //     }else{
        //         MagazineFooterCloseTab();
        //     }
        // });

        actors.emsp9_2.pointActor(.1,function(d){
            if(d){
                MagazineFooterOpenTab();
            }else{
                MagazineFooterCloseTab();
            }
        });

        actors.emsp9_2.pointActor(.2,function(d){
            if(d){
                MagazineFooterOpen();
            }else{
                // MagazineFooterCloseTab();
            }
        });

        // actors.emsp9_2.pointActor(1,function(d){
        //     if(d){
        //         MagazineFooterOpen();
        //     }else{
        //         // MagazineFooterCloseTab();
        //     }
        // });

        // MagazineFooterOpenTab();
        // MagazineFooterOpen();

        boxImgMove('threeBox',boxs[0],'easeInOutPower2');
        boxImgMove('threeBox',boxs[1],'easeInOutPower2');
        boxImgMove('threeBox',boxs[2],'easeInOutPower2');

        bgMove('scene0',filterImgs[0],'easeInOutPower1',0,100);
        bgFadeOut('emsp0_3',filterImgs[0],'easeInOutPower1');

        // scene2 
        bgFadeIn('emsp2_1',filterImgs[1],'easeInOutPower1');
        bgFadeIn('emsp2_2',filterImgs[2],'easeInOutPower1');
        bgFadeIn('emsp2_3',filterImgs[3],'easeInOutPower1');

        bgHidden('emsp2_2',filterImgs[1],1);
        bgHidden('emsp2_3',filterImgs[2],1);

        bgFadeOut('emsp2_4',filterImgs[3],'easeInOutPower1');

        bgMove('sent2_1',filterImgs[1],'easeInOutPower1',-10,80);
        bgMove('sent2_2',filterImgs[2],'easeInOutPower1',-60,40);
        bgMove('sent2_3',filterImgs[3],'easeInOutPower1',-10,80);

        bgThumMove('sent2_1',bgThums[0],'easeInOutPower1');
        bgThumMove('sent2_2',bgThums[1],'easeInOutPower1');
        bgThumMove('sent2_3',bgThums[2],'easeInOutPower1');

        // scene4
        bgFadeIn('emsp4_1',filterImgs[4],'easeInOutPower1');
        bgFadeOut('emsp4_3',filterImgs[4],'easeInOutPower1');
        bgMove('scene4',filterImgs[4],'easeInOutPower1',0,100);

        bgThumMove('sent4_1',bgThums[3],'easeInOutPower1');

        // scene5
        bgFadeIn('emsp5_1',filterImgs[5],'easeInOutPower1');
        bgFadeOut('emsp5_2',filterImgs[5],'easeInOutPower1');
        bgMove('scene5',filterImgs[5],'easeInOutPower1',0,100);

        // scene6
        bgFadeIn('emsp6_1',filterImgs[6],'easeInOutPower1');
        bgFadeOut('emsp6_2',filterImgs[6],'easeInOutPower1');
        bgMove('scene6',filterImgs[6],'easeInOutPower1',0,80);

        bgThumMove('sent6_1',bgThums[4],'easeInOutPower1');
        bgThumMove('sent6_1',bgThums[5],'easeInOutPower1');

        // scene7
        bgFadeIn('emsp7_1',filterImgs[7],'easeInOutPower1');
        bgFadeOut('emsp7_2',filterImgs[7],'easeInOutPower1');
        bgMove('scene7',filterImgs[7],'easeInOutPower1',0,80);


        // scene9
        bgFadeIn('emsp9_1',filterImgs[8],'easeInOutPower1');
        bgMove('emsp9_1',filterImgs[8],'easeInOutPower1',-50,50);


        var cubeEasing = ['.32,.04,.31,.99','.5,.35,.31,.99'];
        for(var o in specs){
            cubeRot(o,specs,specCubes);
        }

        for(var o in copyBolds){
            boldView(o,copyBolds,copyBoldPs);
        }

        // copyBold

        function boldView(id,target,cubes){
            var actor = target[id],
                cube = cubes[id].obj,
                count = cubes[id].count;

            TweenLite.to(cube,1,{delay:count*0.1,z:500,y:20,opacity:0,rotationX:90,transformOrigin:'50% 50%',ease:Power4.easeInOut});
            actor.pointActor(.1,function(p){
                if(p){
                    TweenLite.to(cube,1,{delay:count*0.1,y:0,opacity:1,ease:Power4.easeOut});
                    TweenLite.to(cube,1,{delay:count*0.1,z:0,rotationX:0,ease:Power4.easeOut});
                }else{
                    TweenLite.to(cube,1,{delay:count*0.1,z:500,y:20,opacity:0,rotationX:90,transformOrigin:'50% 50%',ease:Power4.easeInOut});
                }
            });

            actor.pointActor(.8,function(p){
                if(p){
                    TweenLite.to(cube,1,{delay:count*0.1,z:500,y:-50,opacity:0,transformOrigin:'50% 100%',rotationX:-90,ease:Power4.easeInOut});
                }else{
                    TweenLite.to(cube,1,{delay:count*0.1,y:0,opacity:1,ease:Power4.easeOut});
                    TweenLite.to(cube,1,{delay:count*0.1,z:0,rotationX:0,ease:Power4.easeOut});
                }
            });
        }

        function cubeRot(id,target,cubes){
            var actor = target[id],
                cube = cubes[id];
            actor.pointActor(.1,function(p){
                if(p){
                    cube.cl.rolling(0);
                }else{
                    cube.cl.rolling(-180);
                }
            });

            actor.pointActor(.9,function(p){
                if(p){
                    cube.cl.rolling(180);
                }else{
                    cube.cl.rolling(0);
                }
            });
        }

        function bgFadeIn(target,imgClass,ease){
            var actor = actors[target];

            actor.pointActor(0,function(p){
                imgClass.hidden(1-p);
                // imgClass.blur(p);
            }); 

            actor.addActor(0,.01,function(e){
                var p = e.easeProgress(ease);
                imgClass.bright(p);
            });

            actor.addActor(0,.4,function(e){
                var p = e.easeProgress(ease);
                imgClass.opacity(p);
            });

            actor.addActor(.4,.75,function(e){
                var p = e.easeProgress(ease);
                imgClass.bright(1-p);
            });

            actor.addActor(0,1,function(e){
                var p = e.easeProgress(ease);
                imgClass.easyObj.translateZ(300-300*p);
            });
        }

        function bgFadeOut(target,imgClass,ease){
            var actor = actors[target];

            actor.addActor(0.3,.8,function(e){
                var p = e.easeProgress(ease);
                imgClass.bright(p);
            });

            actor.addActor(0.7,1,function(e){
                var p = e.easeProgress(ease);
                imgClass.opacity(1-p);
            });

            actor.pointActor(1,function(p){
                imgClass.opacity(1-p);
                imgClass.hidden(p);
            }); 
        }


        function bgMove(target,imgClass,ease,start,offset){
            var actor = actors[target];
            actor.addActor(0,1,function(e){
                var p = e.easeProgress(ease);
                if(imgClass.originImg)imgClass.originImg.moveVertical(start-p*offset);
                if(imgClass.brightImg)imgClass.brightImg.moveVertical(start-p*offset);
                if(imgClass.blurImg)imgClass.blurImg.moveVertical(start-p*offset);
            });
        }

        function bgThumMove(target,bgThum,ease){
            var actor = actors[target],
                wrap = bgThum.wrap;

            actor.addActor(0,.5,function(e){
                var p = e.easeProgress(ease);
                TweenLite.set(wrap,{z:300-300*p,rotationX:90-90*p});
            });

            actor.addActor(.5,.9,function(e){
                var p = e.easeProgress(ease);
                TweenLite.set(wrap,{z:300*p,rotationX:-100*p});
            });

            actor.addActor(.7,.3,function(e){
                var p = e.easeProgress(ease);
            });


            actor.addActor(0,1,function(e){
                var p = e.easeProgress(ease);
                wrap.css({top:100-100*p+'%',marginTop:100-800*p})
            });
        }

        function boxImgMove(target,bgThum,ease){
            var actor = actors[target],
                wrap = bgThum.wrap;

            actor.addActor(0,.4,function(e){
                var p = e.easeProgress(ease);
                TweenLite.set(wrap,{z:-500+500*p, rotationY:180-180*p, y:200-200*p, rotation:30-30*p});
            });

            actor.addActor(.6,1,function(e){
                var p = e.easeProgress(ease);
                TweenLite.set(wrap,{z:-500*p, rotationY:-180*p, y:-200*p, rotation:-30*p});
            });
        }



        function bgHidden(target,imgClass,point){
            var actor = actors[target];
            actor.pointActor(point,function(p){
                imgClass.opacity(1-p);
                imgClass.hidden(p);
            }); 
        }

        /* ************************************************************
            pallax
        ************************************************************ */
        var pallaxs = [
                {firstEleme:'emsp1_1',parxClass:parx1,sentName:'sent1_',sceneNum:2},
                {firstEleme:'emsp3_1',parxClass:parx2,sentName:'sent3_',sceneNum:3},
                {firstEleme:'emsp8_1',parxClass:parx3,sentName:'sent8_',sceneNum:6}
            ]

        for(var i=0; i<pallaxs.length; i++){
            var infos = pallaxs[i];

            for(var j=1; j<=infos.sceneNum; j++){
                pallaxAnimationSet(i,j);
            }
            
        }

        function pallaxAnimationSet(i,j){
            var infos       = pallaxs[i],
                parxCL      = infos.parxClass,
                firstActor  = actors[infos.firstEleme],
                caption     = parxCaps[i];

            if(i == 0, j==1){
                firstActor.pointActor(0,function(p){
                    if(p)parxCL.wrap.show();
                    else parxCL.wrap.hide();
                });

                firstActor.addActor(0,.7,function(e){
                    var p = e.easeProgress('easeInOutPower2');
                    TweenLite.set(parxCL.wrap,{top:150-100*(p)+'%',z:-1000+1000*p,rotation:45-45*p,rotationY:180-p*180});
                    
                });

                firstActor.pointActor(.65,function(p){
                    if(p)parxCL.autoMoveX(558,1);
                    else parxCL.autoMoveX(0,1);
                });

                firstActor.pointActor(.65,function(p){
                    if(!p)parxCL.caption.view('out');
                    else parxCL.caption.view(0);
                });
            }
        
            var sentActor = actors[infos.sentName+j];            
            if(j>1 && j <= infos.sceneNum){
                sentActor.addActor(0,.5,function(e){
                    var p = e.easeProgress('easeInOutQuart');
                    // parxCL.translateX(558*(j-1)+p*558);
                });

                sentActor.pointActor(.25,function(p){
                    if(p)parxCL.autoMoveX(558*(j-1)+558,1.4);
                    else parxCL.autoMoveX(558*(j-2)+558,1.4);
                });

                sentActor.pointActor(.25,function(p){
                    if(p)parxCL.caption.view(j-1);
                    else parxCL.caption.view(j-2);
                });
            }
            
            if(j==infos.sceneNum){
                sentActor.addActor(.5,1,function(e){
                    var p = e.easeProgress('easeInOutPower2');
                    TweenLite.set(parxCL.wrap,{top:50-100*(p)+'%',z:-1000*p,rotation:-45*p,rotationY:-p*180});
                    // parxCL.translateX(558*j+p*558);
                });

                sentActor.pointActor(.7,function(p){
                    if(p)parxCL.autoMoveX(558*j+558,1);
                    else parxCL.autoMoveX(558*(j-1)+558,1);
                });

                
                sentActor.pointActor(.7,function(p){
                    if(p)parxCL.caption.view('out');
                    else parxCL.caption.view(j-1);
                });

                sentActor.pointActor(1,function(p){
                    if(p)parxCL.wrap.hide();
                    else parxCL.wrap.show();
                });
            }   
        }

        
    }

    function introMotion(){
        var offset = {bright:1,opacity:0},
            imgClass = filterImgs[0];

        TweenLite.to(offset, 1.5, {delay:.01,opacity:1, ease:Power1.easeInOut, onUpdate:function(){
            imgClass.opacity(offset.opacity);
        }});

        TweenLite.set($('#bgs'),{z:900,transformPerspective:1000});
        TweenLite.to($('#bgs'), 2, {delay:.5,　z : 0, ease:Power2.easeInOut});

        TweenLite.to($('#header-title'),1.5,{delay:.5,z:0,opacity:1,color:'#fff',ease:Power2.easeInOut})

        TweenLite.to(offset, 2, {delay:.5, bright:0, ease:Power1.easeInOut, onUpdate:function(){
            imgClass.bright(offset.bright);
        },onComplete:function(){
            // intro = false;
            scroll.config.freeze = false;
        }});
    }

    var blackBgAlpha = 0, blackBgAlphaMax = 0.4;
    function blackBgOpacity(alpha){
        blackBgAlpha = alpha;
        $blackBg.css({opacity:blackBgAlpha});
    }

/* ******************************************************************************************
    CLASS
****************************************************************************************** */
    

    /* ************************************************************
        Bright    
    ************************************************************ */

    function FilterIMG(wrap){
        this.wrap       = $(wrap);
        this.originImg  = this.wrap.find('.originImg')[0]?makeEasyObj(this.wrap.find('.originImg')).autoResize(1):undefined;
        this.brightImg  = this.wrap.find('.brightImg')[0]?makeEasyObj(this.wrap.find('.brightImg')).autoResize(1):undefined;
        this.blurImg    = this.wrap.find('.blurImg')[0]?makeEasyObj(this.wrap.find('.blurImg')).autoResize(1):undefined;
        this.darkImg    = null;//this.wrap.find('.black-cover');
        this.easyObj    = makeEasyObj($(wrap));
        this.statusOn    = false;

        TweenLite.set(this.wrap,{transformPerspective:1000,transformOrigin:'50% 50%',transformStyle:"preserve-3d"});

        this.offset = {
            bright  : 0,
            blur    : 0,
            opacity : 1,
            baseOpacity : 1,
            dark : 0,
            darkMax : .4,
            globalAlpha : 1
        }

        this.init = function(){
            this.bright(this.offset.bright);
            return this;
        }

        this.hidden = function(bool){
            this.statusOn = bool;
            if(this.originImg)this.originImg.hidden(bool);
            if(this.brightImg)this.brightImg.hidden(bool);
            if(this.blurImg)this.blurImg.hidden(bool);
        }

        this.visible = function(bool){
            if(this.originImg)this.originImg.visible(bool);
            if(this.brightImg)this.brightImg.visible(bool);
            if(this.blurImg)this.blurImg.visible(bool);
        }

        this.init();
    }

    FilterIMG.prototype.bright = function(offset) {
        if(this.brightImg){
            if(offset<0)offset = 0;
            if(offset>1)offset = 1;
            this.offset.bright = offset;
            this.brightImg.obj.css({opacity:this.offset.bright});
        }
        return this;
    };

    FilterIMG.prototype.blur = function(offset){
        if(this.blurImg){
            if(offset<0)offset = 0;
            if(offset>1)offset = 1;   
            this.offset.blur = offset;
            this.blurImg.obj.css({opacity:this.offset.blur});
        }
        return this;
    }

    FilterIMG.prototype.dark = function(offset){
        if(this.darkImg){
            if(offset<0)offset = 0;
            if(offset>1)offset = 1;   
            this.offset.dark = offset*this.offset.darkMax;
            this.darkImg.css({opacity:this.offset.dark});
        }
        return this;
    }

    FilterIMG.prototype.opacity = function(offset) {
        if(offset<0)offset = 0;
        if(offset>1)offset = 1;
        this.offset.opacity = offset;
        this.wrap.css({opacity:this.offset.opacity});
        return this;
    };

    FilterIMG.prototype.constructor = FilterIMG;



    /* ************************************************************
        #Parallax
    ************************************************************ */

    Parallax = function(container,captionClass){
        var _this   = this;

        this.wrap       = $(container);
        this.inner      = this.wrap.find('.parallaxWrap-inner');
        this.children   = [];
        this.caption    = captionClass;

        this.config = {
            originX : this.inner.width()*0.5,
            originY : this.inner.width()*0.5,
            x : 0,
            y : 0,
            frameW : this.inner.width(),
            frameH : this.inner.height(),
            pespective : 1000
        }

        this.init = function(){
            TweenLite.set(this.wrap,{transformPerspective:1000,transformOrigin:'50% 50%'});
            this.inner.children().each(function(i){
                var ch = $(this),
                    config = _this.config;
                ch.addClass('visibleOff');
                _this.children[i] = {
                    obj : ch,
                    depth : typeof ch.data('depth')=='undefined'?0:ch.data('depth'),
                    marginX : typeof ch.data('marginX')=='undefined'?0:ch.data('marginX'),
                    x : ch.offset().left-_this.inner.offset().left,
                    y : ch.offset().top-_this.inner.offset().top,
                };

                _this.children[i].ratioX    = _this.children[i].x/config.frameW;
                _this.children[i].baseX     = _this.children[i].x;
                _this.children[i].baseY     = _this.children[i].y;

                ch.css({left:0,top:0});
                ch.css(_this.setCSS(_this.children[i].x,_this.children[i].y));
                // TweenLite.set(ch,{x:_this.children[i].x,y:_this.children[i].y});
                ch.hide();
            });

            return this;
        }

        this.init();
        this.update();
    };

    Parallax.prototype.translateX = function(x) {
        if(this.config.x != x)this.config.x = x;
        this.config.x = x;
        this.update();
    };

    Parallax.prototype.autoMoveX = function(x,dur,ease){
        if(this.config.x != x){
            // this.config.x = x;
            var _this = this;
            TweenLite.to(this.config,dur,{x:x,ease:Power4.easeInOut,onUpdate:function(){
                _this.update();
            }});
        }
    }

    Parallax.prototype.update = function(){
        var config = this.config;
        for(var o in this.children){
            var ch = this.children[o];
            // ch.x = -(ch.baseX) * (config.x / 100) * (1-ch.depth);
            var moveRatio  = ch.ratioX-config.x/config.frameW;
            var moveX = moveRatio*config.frameW;

            
            var off = moveRatio*(config.pespective/100*-ch.depth),
                marginX = (1-moveRatio)*ch.marginX;
            ch.x = moveX-off-marginX;

            // if(ch.x < -558) ch.x = -558;
            // if(ch.x > 558) ch.x = 558;

            ch.obj.css(this.setCSS(ch.x,ch.y));
            if(ch.x >= -558 && ch.x <= 558){
                if(ch.obj.hasClass('visibleOff')){
                    ch.obj.removeClass('visibleOff');
                    ch.obj.show();
                }
            }else{
                if(!ch.obj.hasClass('visibleOff')){
                    ch.obj.addClass('visibleOff');
                    ch.obj.hide();
                }
            }
            //TweenLite.set(ch.obj,{x:ch.x});
            // if(ch.x >= -558*2 && ch.x <= 558*2)TweenLite.set(ch.obj,{x:ch.x});
            
        }
    };

    Parallax.prototype.setCSS = function(x,y){
        var css3 = "translateX("+x+"px) translateY("+y+"px)";
        return{
            "-webkit-transform" : css3,
            "-moz-transform"    : css3,
            "transform"         : css3
        };
    }

    Parallax.prototype.constructor = Parallax;


    /* ************************************************************
        Caption
    ************************************************************ */
    
    Caption = function(captionCon){
        var _this       = this;
        this.wrap       = $(captionCon);
        this.inner      = this.wrap.find('.caption-in');
        this.children   = [];
        this.status     = ''; // out , 0,1....

        this.init = function(){

            this.inner.children().each(function(i){
                var child = $(this);
                _this.children[i] = {obj:child,width:child.innerWidth(),left:0}
                _this.children[i].left = 0;

                if(child.text() == 'null') _this.children[i].width = 0;

                if(i>0){
                    var prev = _this.children[i-1],
                        left = prev.width+prev.left;
                    child.css({left:left});
                    _this.children[i].left = left;
                }
            });

            this.view('out');
            return this;
        }

        this.init();
    }
    Caption.prototype.view = function(status){
        if(this.status != status){
            this.status = status;
            if(status == 'out'){
                TweenLite.to(this.wrap,.8,{delay:.1,width:0,ease:Power4.easeInOut});
                TweenLite.to(this.inner,.7,{right:-300,ease:Power4.easeInOut});
            }else{
                TweenLite.to(this.wrap,.7,{delay:.1,width:this.children[status].width,ease:Power4.easeInOut});
                TweenLite.to(this.inner,.8,{delay:.1,right:this.children[status].width+this.children[status].left,ease:Power4.easeInOut});        
            }
        }

        return this;
    }
    Caption.prototype.constructor = Caption;


    /* ************************************************************
        
    ************************************************************ */
    
    function makeEasyObj(obj,option){
        var $obj = $(obj);
        var _bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };
        var newObj = {
            obj         : $obj,
            parent      : $obj.parent(),
            element     : $obj[0],
            duration    : 0,
            perspective : 1000,
            isFit       : false,
            easing      : 'cubic-bezier(.215,.61,.355,1)',
            size        : {width:$obj.width(),height:$obj.height()},
            parentSize  : {width:$obj.parent().width(),height:$obj.parent().height()},
            width       : function(){return $obj.width()},
            height      : function(){return $obj.height()},
            getFitScale : function(){this.isFit = true; return (this.parent.height())/this.height()},
            setTransition : function(duration,easing){
                this.duration   = duration;
                this.easing     = easing;

                var css = this.duration +'s '+this.easing;
                this.obj.css({"-webkit-transition" : css, "transition" : css});
            },
            setDuration : function(duration){
                this.obj.css({"-webkit-transition-duration" : duration+'s', "transition-duration" : duration+'s'});
            },
            x           : 0,
            y           : 0,
            paddingX    : 0,
            paddingY    : 0,
            scale       : 1,
            position    : {perX:0,perY:0,padPerX:0,padPerY:0},
            flags       : {resize:false},
            hidden      : function(bool){
                bool?obj.hide():obj.show();
                bool?this.parent.hide():this.parent.show();
                if(bool){
                    this.parent.css({width:0,height:0});
                }else{
                    this.parent.css({width:'100%',height:'100%'});
                    this.resize();
                }
            },
            visible : function(bool){
                obj.css({visibility:bool?'visible':'hidden'});
            },
            autoResize  : function(bool){
                this.flags.resize = bool;
                var scope = this;
                if(bool){
                    $(window).bind('resize',scope.resize);
                }else{
                    $(window).unbind('resize',scope.resize);
                }

                return this;
            },
            resize      : function(){

                this.size.width = this.obj.width();
                this.size.height = this.obj.height();
                this.parentSize.width = this.parent.width();
                this.parentSize.height = this.parent.height();

                this.paddingHorizon();
                this.paddingVertical();
                this.scaleChange(this.isFit?this.getFitScale():this.scale); 
            },
            rotation : function(x,y){
                TweenLite.set(this.element,{rotationX:x,rotationY:y});
            },
            paddingHorizon : function(offset){
                if(typeof offset != 'undefined'){
                    this.position.padPerX = offset;
                }
                this.paddingX = this.position.padPerX*this.parent.width()*0.01;
                this.moveHorizon();
                
            },
            paddingVertical : function(offset){
                if(typeof offset != 'undefined'){
                    this.position.padPerY = offset;
                }
                this.paddingY = this.position.padPerY*this.parent.height()*0.01;
                this.moveVertical();
            },
            moveHorizon     : function(offset){
                if(!this.element)return;
                if(typeof offset != 'undefined'){
                    this.position.perX = offset;
                }
                this.x = (this.width()-this.parent.width())*this.position.perX*0.01;
                this.x += this.paddingX;

                TweenLite.set(this.element,{top:this.x});
            },
            moveVertical    : function(offset,delay){
                // console.log(typeof this.element)
                if(typeof this.element == 'undefined')return;
                if(typeof offset != 'undefined'){
                    this.position.perY = offset;
                }

                this.y = (this.size.height-this.parentSize.height)*this.position.perY*0.01;
                this.y += this.paddingY;

                TweenLite.set(this.element,{y:this.y});
            },

            translateZ : function(offset){
                if(typeof offset != 'undefined'){
                    this.scale = this.pespective/(this.pespective-offset);
                }

                TweenLite.set(this.element,{z:offset});
            },
            scaleChange : function(offset,delay){
                if(typeof offset != 'undefined'){
                    this.scale = offset;
                }

                if(offset != this.getFitScale())this.isFit = false;
                TweenLite.set(this.element,{scale:this.scale,delay:typeof delay != 'undefined'?delay:0});
            },
            init : function(){
                TweenLite.set(this.element,{y:this.y,transformOrigin:'50% 50%',transformPerspective:1000});
                this.autoResize(this.flags.resize);
                this.resize = _bind(this.resize,this);
                return this;
            }
        };

        return newObj.init();
    }


/* ******************************************************************************************
    EVENT & EVENT HANDLER    
****************************************************************************************** */
    
    function onScroll(p){
        if(skipFlg) return;
        for(var o in actors){
            actors[o].update();
        }

        for(var o in sentenceActors){
            sentenceActors[o].update();
        }
        // stats.update();
    }

    function onScrollDelete(){
        if(scroll) scroll.stopRender();
    }

    function addEvent(){
        $(window).on('keydown', onKeydown);
        $(window).on('resize', onResize);
        $(window).trigger('resize');

        $repeat.bind('click',function(){
            if(scrollBar.config.freeze)return;
            scrollBar.scrollMove(0,4,function(){
                // console.log('Move Completed');
            })
            // if(!skipFlg){}
            // skipFlg = true;
        });
    }

    function onResize(){
        stage = WindowSize();
        contentsInLimit = contentsInHeight - stage.height;

        scroll.onWheel({},0, 0, 0);
    }

    function onKeydown(e){
        if(MagazineNaviStatus() || MagazineFooterStatus())return;
        switch(e.keyCode){
            case 38 : onKeyScrollControl(1); break;
            case 40 : onKeyScrollControl(-1); break;
        }
    }

    var keybordValue = UA.isMac?10:1;
    function onKeyScrollControl(delta){
        for(var i=0; i<10; i++){
            var del = delta*keybordValue;
            if(scroll)scroll.onWheel({},del, del, del);
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


    function cssTransition(duration,easing){
        var css = duration +'s '+easing;
        return {
            "-webkit-transition" : css,
            // "-moz-transition"    : css,
            // "-o-transition"      : css,
            // "-ms-transition"     : css,
            "transition"         : css
        }
    }

    function transitionDR(duration){
        return {
            "-webkit-transition-duration" : duration+'s',
            "-moz-transition-duration"    : duration+'s',
            "-o-transition-duration"      : duration+'s',
            "-ms-transition-duration"     : duration+'s',
            "transition-duration"         : duration+'s'
        }
    }


    jQuery.extend( jQuery.easing,
        {
            def: 'easeOutQuad',
            easeInOutPower1 : function(x,t, b, c, d) {
                var ts=(t/=d)*t;
                var tc=ts*t;
                return b+c*(4*tc*ts + -10*ts*ts + 6*tc + ts);
            },
            easeInOutPower2 : function(x,t, b, c, d) {
                var ts=(t/=d)*t;
                var tc=ts*t;
                return b+c*(5*tc*ts + -13*ts*ts + 9*tc);
            },



        }
    );


/* ******************************************************************************************
    UTIL
****************************************************************************************** */




}).call(this);
