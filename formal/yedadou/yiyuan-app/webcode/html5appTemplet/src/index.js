seajs.config({
  // 别名配置
  alias: {
    '$': 'zepto.min',
    'zepto_touch_and_fx':'touch_and_fx',
    'boboweb':'bobowebpath/boboweb',
    'path':'lib/path.min',//简单的路由类https://github.com/mtrpcic/pathjs
    'imgpreload':'lib/jqueryplug/jquery.imgpreload.min.js',//图片预加载插件 https://github.com/farinspace/jquery.imgpreload
  },
  // 路径配置
  paths: {
   'bobowebpath':'boboweb'
  },
  // 变量配置
  vars: {
  },
  // 调试模式
  debug: true,
  // 文件编码
  charset: 'utf-8'
});
define('main',['$','boboweb','path.min','boboweb/ui/UITip','boboweb/imgpreload','json.js','iSlider/js/iSlider.js','iSlider/js/iSlider.plugin.dot.js','../Device.js','../Service.js'],function(require,exports,module){
   var B=require('boboweb');
    B.init({'isDebug':true},require)
    .extend('boboweb/ui/UITip');
    var Service=require('app/Service');
    var Device=require('app/Device');
    var ui=new B.UITip();
    var MainJS={};
    B.MainJS=MainJS;
    Service.init(MainJS);
    Device.init(MainJS);
    MainJS.ui=ui;
    MainJS.Service=Service;
    //添加版本号，调出ajax打印信息
    $('#appVersion').click(function(){
      ui.alert('网络调试信息',MainJS.Service.getDebugInfo());
    });
    //
    MainJS.Device=Device;
    MainJS.$=$;
    MainJS.$pageContainer=$('#pageContainer');
  //初始化时的加载度条
  function LoadingTip(loadingTipDivId,loadingTipTextDivId){
    var $loadingTip=$('#'+loadingTipDivId);
    var $loadingTipTextDivId=$loadingTip.find('#'+loadingTipTextDivId);
    this.show=function(tipText){
      $loadingTip.show();
      tipText&&$loadingTipTextDivId.html(tipText);
    }
    this.hide=function(){
      $loadingTip.hide();
    }
  }
  var startTip=new LoadingTip('loadingTip','loadTipP');//初始化进度条
  //模拟测试进度条----------------start
  /*var startTip_testIndex=0;
  var startTip_setIntervalId=setInterval(function(){
    startTip.show(startTip_testIndex+++'%');
    if(startTip_testIndex>100){
      clearInterval(startTip_setIntervalId);
      startTip.hide();
      main(this);
    }
  },10);//end setInterval*/
  //模拟测试进度条----------------end

  //批量的预加载
  //
  var preLoadImages=[];
  //这是测试数据
  /*for(var i=0;i<1;i++){
    preLoadImages.push(i+'.jpg');
  }*/
  //B.Utility.addPrefixString(preLoadImages,'images/');
  B.extend('boboweb/imgpreload');
  var systemPreLoadQ=new B.BPreloadQueue(preLoadImages);
  systemPreLoadQ.listenTo(B.BPreloadQueue.EventComplete,function(preLoadq){
    //B.debug("批量加载完成");
    startTip.hide();
    main()
  });
  systemPreLoadQ.listenTo(B.BPreloadQueue.EventProgress,function(preLoadq,loaded,loadTotal){
    //B.debug("批量加载进度:",preLoadq,loaded,loadTotal);
    var p=parseInt((loaded/loadTotal)*100);
    startTip.show(p+'%');
  });
  systemPreLoadQ.start();

  //应用开始的地方
  function main(){
      function loadConfigFile(){
        startTip.show('配置中..');
        function iSliderInit(data){
          //暂时去掉幻灯提示时：隐藏这行代码1/3
         /* $iSliderWrapper=$('<div id="iSlider-wrapper"></div>');
            MainJS.$pageContainer.append($iSliderWrapper);
            B.extend('iSlider/js/iSlider.js');
            var list=[];
            var cTem=data.startSlider.length;
            for(var i=0;i<cTem;i++){
              list.push({content:data.startSlider[i]});
            }
            var startSlider = new iSlider({
                dom:$iSliderWrapper[0],
                data: list,
                isLooping: 1,
                isOverspread: 1,
                animateTime: 800, // ms
                plugins: ['dot']
            });
            //点击跳过
            var $btnTip=$('<a href="#" style="color: #fff;width: 100px;position: absolute;text-align: center;right: 10px;border-radius: 2px;border: 1px solid;opacity: 0.8;bottom: 5px;right: 1px;">跳过</a>');
            MainJS.$pageContainer.append($btnTip);*/
            function exitTipSlide(){
                //暂时去掉幻灯提示时：隐藏这行代码2/3
                //startSlider.destroy();
                //$iSliderWrapper.remove();
                //-------

                var $footerNav=$("#footerNav");
                var arrNav=[
                  'http://1034.w.zhj.test.yedadou.cn/yiyuan/',
                  'http://1034.w.zhj.test.yedadou.cn/yiyuan/ShopGoods/ProductInterval',
                  'http://1034.w.zhj.test.yedadou.cn/yiyuan/ShareOrder/index?act=show',
                  'http://1034.w.zhj.test.yedadou.cn/yiyuan/cart/index',
                  'http://1034.w.zhj.test.yedadou.cn/yiyuan/UserCenter/'
                ];
                $footerNav.find('nav>a').click(function(e){
                  e.preventDefault();
                  var $this=$(this);
                  Device.popupWebUrl('',arrNav[$this.index()]);
                });
                $footerNav.show();
                //路由------------------------------------------------start
                Path.map("#home").to(function(){
                  MainJS.loadPage('home.html');
                });
                Path.map("#testList").to(function(){
                  MainJS.loadPage('testList.html');
                });
                Path.map("#systemTest").to(function(){
                  MainJS.loadPage('systemTest.html');
                });
                //路由------------------------------------------------end
                






                //开始路由
                Path.root("#home");
                Path.listen();
            }
            //暂时去掉幻灯提示时：隐藏这行代码3/3
            //$btnTip.click(exitTipSlide());
            exitTipSlide();
          }//end iSliderInit
        //暂时不加载本地资源
        /*startTip.hide();
        var iniData='{"success":true,"startSlider":["data\/startSlider\/1.jpg","data\/startSlider\/2.jpg","data\/startSlider\/3.jpg","data\/startSlider\/4.jpg"]}';
        iniData=$.parseJSON(iniData);
        iSliderInit(iniData);*/
        //加载配置文件
        Service.ajax(ServerURL,{
          success:function(data,msg){
              //console.log(data);
              startTip.hide();
              if('startSlider' in data){
                //预加载，提示
                //console.log('开始预加载');
                startTip.show('加载中..');
                var preData=[];
                var cTem=data.startSlider.length;
                for(var i=0;i<cTem;i++){
                  preData.push(data.startSlider[i]);
                }
                var preLoadQ=new B.BPreloadQueue(preData);
                preLoadQ.listenTo(B.BPreloadQueue.EventComplete,function(preLoadq){
                  startTip.hide();
                  iSliderInit(data);
                });
                preLoadQ.listenTo(B.BPreloadQueue.EventProgress,function(preLoadq,loaded,loadTotal){
                  //B.debug("批量加载进度:",preLoadq,loaded,loadTotal);
                  var p=parseInt((loaded/loadTotal)*100);
                  startTip.show(p+'%');
                });
                preLoadQ.start();
              }
          },
          error:function(data,msg,type){
            //console.log('error:');
            startTip.hide();
            if(type==1){
              startTip.show('没有找到配置文件');
            }else{
              startTip.show('配置文件格式不对');
            }
            //console.log('type:'+type);
          }
        });
      }// end loadConfigFile
     loadConfigFile();
     //初始化分页加载
      var $pageContainer=$("#pageContainer");
      loadPage=new B.BPageManagement($pageContainer,MainJS);
      loadPage.listenTo(B.BPageManagement.EventError,function(pageManagement,loader, status, xhr){
         //B.debug("自定义：加载页面错误");
      });
      loadPage.listenTo(B.BPageManagement.EventTryAgain,function(pageManagement,loader, status, xhr){
         //B.debug("自定义：加载页面重试");
      });
      loadPage.listenTo(B.BPageManagement.EventSuccess,function(pageManagement,loader, status, xhr){
          //B.debug("自定义：加载页面成功");
      });
      loadPage.listenTo(B.BPageManagement.EventProgress,function(pageManagement,preLoadq,loaded,loadTotal){
          //B.debug("自定义：页面资源预加载进度:",pageManagement,preLoadq,loaded,loadTotal);
      });
      MainJS.loadPage=function(filename){
        loadPage.load('page/'+filename);
      };
     
    }//end function main()
});//end define
seajs.use("main");
//启动
try{
  var app = {
      // Application Constructor
      initialize: function() {
          this.bindEvents();
      },
      // Bind Event Listeners
      //
      // Bind any events that are required on startup. Common events are:
      // 'load', 'deviceready', 'offline', and 'online'.
      bindEvents: function() {
          document.addEventListener('deviceready', this.onDeviceReady, false);
      },
      // deviceready Event Handler
      //
      // The scope of 'this' is the event. In order to call the 'receivedEvent'
      // function, we must explicitly call 'app.receivedEvent(...);'
      onDeviceReady: function() {
          app.receivedEvent('deviceready');
          setTimeout(function(){ //延时关闭启动画面。
            navigator.splashscreen.hide();
          },2000);
      },
      // Update DOM on a Received Event
      receivedEvent: function(id) {
      }
  };
  app.initialize();
}catch(e){

}

