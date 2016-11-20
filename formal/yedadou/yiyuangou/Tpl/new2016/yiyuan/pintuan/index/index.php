<?php include $this->tpl('yiyuan:pintuan/public/html_header.php') ?>
<title><?=$shopName?></title>
<!-- <link rel="stylesheet" href="{__STATIC_URL__}/public/yiyuan/pintuan/pt_index.css"> -->
<link rel="stylesheet" href="{__STATIC_URL__}/public/yiyuan/new2016/css/pt_index1.css">
<link rel="stylesheet" href="{__STATIC_URL__}/public/css/font-awesome.css">
<style type="text/css">
    

    /*captain和winner*/
    .winner:after {
        content: '';
        position: absolute;
        display: inline-block;
        top: -20px;
        left: 12px;
        width: 40px;
        height: 40px;
        transform: rotate(-9deg);
        background-image: url('{__STATIC_URL__}/public/front/default/images/demo/icon/queen.png');
        background-position: center center;
        background-size: 100%;
    }
    .winner-tip{
        position: relative;
        width: 40px;
        top: -20px;
        background-color: #f60;
        text-align: center;
        color: #fff;
        border-radius: 5px;
        opacity: 0.9;
        font-size: 10px;
    }
    .caption{
        position: relative;
    }
    .caption:before {
        content: '';
        position: absolute;
        display: inline-block;
        z-index: 1000000000;
        top: -4px;
        left: -9px;
        transform: rotate(4deg);
        width: 18px;
        height: 18px;
        background-repeat: no-repeat;
        background-image: url('{__STATIC_URL__}/public/front/default/images/demo/icon/captain.png');
        background-position: center center;
        background-size: 100%;
    }
    
</style>
</head>
<body>
    <div class="hotProitem clearfix">
        <div class="title clearfix" style="height:50px;">
            <a id="btncate1" href="#" class="over hotbtn">全部商品</a>
            <a id="btncate2" href="#" class="hotbtn">我的拼团</a>
        </div>
        <div id="mainContianer" class="clearfix">
        </div>
    </div>
    <?php include $this->tpl('yiyuan:pintuan/public/topNavCenter.php') ?>
    <script type="text/javascript">
        $(function(){
            $window=$(window);
            //设置$body的高度和宽度
            $body=$("body");
            //$body.width($window.width()-10);
            $body.height($window.height());
            var $cartProductCount=$('#cartProductCount');
            if(parseInt($cartProductCount.text())==0) $cartProductCount.hide();
            var BBL=BOBOLIB_fun().init($,this,$window,$body);
            var app=new MainApp(BBL);
            var targetW=$window.width()*0.2;
            var targetLeft=targetW*3;
            //翻页
            function doPage(loadendDo){
                        var allGoodsUrl = '/yiyuan/pintuan/allGoods';//'http://1047.m.yedadou.com/shop/test/index?tplName=pintuanIndexList';//
                        var myGroupsUrl = '/yiyuan/pintuan/myGroups';//'http://1047.m.yedadou.com/shop/test/index?tplName=pintuanIndexList2';//
                        var urlPageList=allGoodsUrl;
                        var $container=$('#mainContianer');
                        var currentType=1;
                        $btns=$('.hotbtn');
                        $btns.click(function(e){
                            e.preventDefault();
                            var $this=$(this);
                            var type=$this.index()+1;
                            if(currentType==type) return;
                            $btns.eq(currentType-1).removeClass('over');
                            currentType=type;
                            $btns.eq(currentType-1).addClass('over');
                            if(currentType==1){
                                urlPageList=allGoodsUrl;
                            }else{
                                urlPageList=myGroupsUrl;
                            }
                            currentPage=1;
                            arrTimeTips=[];
                            $container.empty();
                            loadList(currentPage);
                            isLoadList=true;
                            isPageEnd=false;
                        })
                        $window=$(window);
                        //设置$body的高度和宽度
                        $body=$("body");
                        //$body.width($window.width()-5);
                        $body.height($window.height());
                        var BBL=BOBOLIB_fun().init($,this,$window,$body);
                        var app=new MainApp(BBL);
                        var currentPage=0;
                        
                        function showAppWait(){ //节点后面加一个加载的动画条
                            var $wait=app.popupWait(3,2,$container);
                            $wait.css('display','block');
                            $wait.css('width','10px');
                            $wait.css('margin','25px auto');
                        }
                        //翻页
                        var currentPage=0;
                        function loadList(page){
                            isLoadList=true;
                            showAppWait();
                            currentPage=page;
                            url=urlPageList;
                            $.ajax({
                                url:url,
                                data:{page_no:page},
                                success: function(data){
                                    app.close();
                                    isLoadList=false;
                                    var toData={};
                                    try{
                                        toData=$.parseJSON(data);
                                    }catch(e){
                                        
                                    }
                                    if(toData.error){
                                        if(toData.end){
                                            isPageEnd=true;
                                            return;
                                        }
                                        //if(toData.msg!='') app.alert('提示',toData.msg);
                                        return;
                                    }
                                    //console.log(data);*/
                                    var $data=$(data);

                                    if(currentType==2){
                                        //倒计时初始化
                                        var arrTimeTips=[];
                                        $data.find(".clock").each(function(){
                                            $thisTip=$(this);
                                            var t=$thisTip.data('remainingtime')||'';
                                            t=parseInt(t);
                                            //console.log('t:'+t);
                                            if(t>0){
                                                arrTimeTips.push([$thisTip,t]);
                                            }else{
                                                if(t<0) $thisTip.html('点击看详情');
                                            }
                                        });//end find(".clock")

                                        var timeIndex=0;
                                        var _startMillisecond=(new Date()).getTime();
                                        var colockTipInterval=setInterval(function(){
                                            var now=(new Date()).getTime();
                                            var offsetMilliSecond=now-_startMillisecond;
                                                timeIndex+=1;
                                                var c=arrTimeTips.length;
                                                for(var i=0;i<c;i++){
                                                    var arrTem=arrTimeTips[i];
                                                    if(!arrTem) break;
                                                    var $item=arrTem[0];
                                                    var _millisecond=arrTem[1]||0;
                                                    if(_millisecond<0) _millisecond=0;
                                                    _millisecond=_millisecond*1000;
                                                    var t=_millisecond-(now-_startMillisecond);
                                                    var h,m,s,ms;
                                                    var ts=t/1000;
                                                    h=Math.floor(ts/3600);
                                                    ts-=h*3600;
                                                    m=Math.floor(ts/60);
                                                    ts-=m*60;
                                                    s=Math.floor(ts);
                                                    ms=Math.floor((ts-s)*100);
                                                    if(h<0) h=0;
                                                    if(m<0) m=0;
                                                    if(s<0) s=0;
                                                    if(ms<0) ms=0;
                                                    var str='剩余时间:';
                                                    if(h>9){
                                                        str+= h+ ":";
                                                    }else{
                                                        str+= "0"+h+ ":";
                                                    }
                                                    if(m>9){
                                                        str+= m + ":";
                                                    }else{
                                                        str+= "0"+m + ":";
                                                    }
                                                    if(s>9){
                                                        str+= s;//秒
                                                    }else{
                                                        str+= "0"+s;//秒
                                                    }
                                                    str+=':';
                                                    if(ms>9){
                                                        str+= ms;
                                                    }else{
                                                        str+= "0"+ms;
                                                    }
                                                    $item.html(str);
                                                    //console.log(h,m,s,ms);
                                                    if((m==0&&s==0&&h==0)){ //结束
                                                        arrTimeTips.splice(i,1);
                                                        $item.html('点击看详情');
                                                        i--;
                                                    }
                                                }
                                            if(c==0) clearInterval(colockTipInterval);
                                         },100);  //end setInterval
                                    }//end if(currentType==2){
                                    

                                    if(loadendDo) loadendDo($data);
                                    $container.append($data);

                                },
                                error:function(){
                                    app.close();
                                    isLoadList=false;
                                }
                            });
                        }
                        loadList(1);
                        var isLoadList=true;
                        var isPageEnd=false;
                        //滚动条是否滚到底部
                        window.onscroll=function(){
                            //变量t就是滚动条滚动时，到顶部的距离
                            var windowScrollEndy=document.documentElement.scrollHeight||document.body.scrollHeight;
                            windowScrollEndy-=30;
                            var viewHeight=document.documentElement.clientHeight||document.body.clientHeight;
                            var t =document.documentElement.scrollTop||document.body.scrollTop;
                            t+=viewHeight;
                            if( t >=windowScrollEndy) {
                                if(isPageEnd) app.close();
                                if(isLoadList||isPageEnd){
                                    return;
                                }
                                loadList(currentPage+1);
                            }
                        }
                        return [BBL,app];
                    }
            doPage(function($data){
        
            });
        });
    </script>
</body>
</html>