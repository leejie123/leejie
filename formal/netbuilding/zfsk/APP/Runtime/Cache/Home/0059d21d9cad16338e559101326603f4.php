<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>广州房源</title> 
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="__PUBLIC__/Admin/bootstrap/css/bootstrap.min.css">
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="__PUBLIC__/Font-Awesome-master/css/font-awesome.min.css">
<!-- <link rel="stylesheet" type="text/css" href="nav.css">
<link rel="stylesheet" type="text/javascript" src="app.js"> -->
<link rel="stylesheet" href="__PUBLIC__/css/global.css">
<link rel="stylesheet" href="__PUBLIC__/css/index.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/wyzf.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/zhujiang.css">
</head>
<body>

<nav class="navbar  navbar-firstpart a_explain">
    <a href="<?php echo U('Index/index');?>"><div class="onelogo"><img src="__PUBLIC__/image/logo2.jpg"></div></a>
    <div class="explain"><p>如没能找到符合您需求的房源，请注册会员，上传您的租房需求，专业团队会根据您的需求为您找房。</p></div>
    <div class="navbar-right1">
      <form class="navbar-form navbar-left" role="search" method="post" action="<?php echo U('Real/search');?>">
        <div class="form-group">
          <input type="text" class="form-control ipt1" placeholder="广州市，海珠区" name="name">
        </div>
        <button type="submit" class="btn btn-default btn01"><i class="fa fa-search"></i></button>
      </form>
    </div>
</nav>
<!-- 2 -->
<nav class="navbar navbar-default navbar-secondpart">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav nav-ul">
        <li class="action"><a href="<?php echo U('Index/index');?>">首页</a></li>
        <li><a href="<?php echo U('Real/district_zhujiang');?>">珠江新城专版</a></li>
        <li><a href="<?php echo U('UploadRoom/index');?>">上传房源</a></li>
        <li><a href="<?php echo U('Real/rental');?>">广州房源</a></li>
        <li><a href="<?php echo U('User/member');?>">会员中心</a></li>
        <li><a href="<?php echo U('Userstaff/index');?>">租赁专家</a></li>
        <li><a href="<?php echo U('Introduction/index');?>" style="border-right:none;">公司介绍</a></li>
      </ul> 
      <ul class="navbar-right">
      <?php if($_SESSION['user'] == ''): ?><li><div class="sj-hidden"><a href="<?php echo U('');?>" class="land-a btn">微信公众号</a><div class="sj-block"><img src="__PUBLIC__/image/s3.png"></div></div></li>
        <li><div class="sj-hidden"><a href="<?php echo U('');?>" class="land-a btn">手机APP</a><div class="sj-block"><img src="__PUBLIC__/image/s3.png"></div></div></li>
        <li><a href="<?php echo U('Login/login');?>" class="land-a btn">登陆</a></li>
        <li><a href="<?php echo U('Login/zhuce');?>" class="land-a btn">注册</a></li>
      <?php else: ?>
        <li><div class="sj-hidden"><a href="<?php echo U('');?>" class="land-a btn">微信公众号</a><div class="sj-block"><img src="__PUBLIC__/image/s3.png"></div></div></li>
        <li><div class="sj-hidden"><a href="<?php echo U('');?>" class="land-a btn">手机APP</a><div class="sj-block"><img src="__PUBLIC__/image/s3.png"></div></div></li>
        <li><?php if($user['username'] == ''): ?><a href="<?php echo U('User/member');?>" class="land-a btn"><?php echo ($user["nickname"]); ?></a><?php else: ?><a href="<?php echo U('User/member');?>" class="land-a btn"><?php echo ($user["username"]); ?></a></li><?php endif; ?>
        <li><a href="<?php echo U('Login/logout');?>" class="land-a btn">退出</a></li><?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- 幻灯片 -->
<section class="section03">
 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="__PUBLIC__/image/7.jpg" alt="..." >
      <div class="carousel-caption">
      
      </div>
    </div>
    <div class="item">
      <img src="__PUBLIC__/image/5.jpg" alt="...">
      <div class="carousel-caption">
       
      </div>
      

    </div>
    <div class="item">
      <img src="__PUBLIC__/image/6.jpg" alt="...">
      <div class="carousel-caption">
       
      </div>
      

    </div>
   
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
 </div>
 <div class="div07">

 <div class="add1" style="width:80%;height:100px;background-image:url('__PUBLIC__/image/text.png');background-position: center center; background-size: auto 100%;background-repeat: no-repeat"></div>
  <div class="div007">

    <div class="div08">
        <div>
          <form method="post" action="<?php echo U('Real/search');?>">
            <div class="input-group fl">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default dropdown-toggle btn02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="dropdown-text">全部</span> <span class="caret"></span></button>
                <ul class="dropdown-menu search-type-dropdown">
                  <li><a href="#" data-cateid='all'>全部</a></li>
                  <li><a href="#" data-cateid='2'>住宅公寓整租</a></li>
                  <li><a href="#" data-cateid='1'>住宅公寓合租</a></li>
                  <li><a href="#" data-cateid='6'>租写字楼</a></li>
                  <li><a href="#" data-cateid='5'>租商铺</a></li>
                </ul>
              </div><!-- /btn-group -->
              <input type="hidden" name="type" class="search-type" value="all" autocomplete="off">
              <input type="text" class="form-control" aria-label="..." placeholder="广州市，海珠区" name="name">
            </div><!-- /input-group -->
            <button type="submit" class="btn btn-danger btn03 fr">搜索</button>
          </form>
          <div style="clear:both"></div>
         </div>
      </div>
  </div>
 </div>
</section>
<!-- 选择区 -->



<section class="gzfy-xqss">
    <div class="maximage-div">
      <!--       <form class="form-inline" action="<?php echo U('Real/xiaoquneiye');?>" method="post" enctype="multipart/form-data">
                  <div class="i-b-div">
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="请输入小区楼盘具体名称" name="district_name">
                        <button type="submit" class="btn btn-default">小区楼盘搜索</button>
                  </div>
            </form> -->
            <form class="form-inline" action="<?php echo U('Real/chazhao');?>" method="get"> 
                <ul>
                  <li class="ul-li">
                    <select name="leixing">
                      <option value="0">类型不限</option>
                      <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cate["id"]); ?>"><?php echo ($cate["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                  </li>
                  <li class="ul-li">
                    <select name="huxing">
                      <option value="0">户型不限</option>
                      <option value="1">一居</option>
                      <option value="2">二居</option>
                      <option value="3">三居</option>
                      <option value="4">四居以上</option>
                    </select>
                  </li>
                  <li class="ul-li">
                    <select name="zujin">
                      <option value="0">租金不限</option>
                      <option value="1000">1000元以下</option>
                      <option value="1000-2000">1000-2000元</option>
                      <option value="2000-3000">2000-3000元</option>
                      <option value="3000-5000">3000-5000元</option>
                      <option value="5000-8000">5000-8000元</option>
                      <option value="8000-12000">8000-12000元</option>
                      <option value="12000-20000">12000-20000元</option>
                      <option value="20000">20000元以上</option>
                    </select>
                  </li>
                  <li class="ul-li">
                    <a class="button1 btn"><span class="zujin">配套</span></a>
                    <div class="format1 nick">
                      <ul>
                          <?php if(is_array($supporting)): $i = 0; $__LIST__ = $supporting;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                              <div class="checkbox">
                                <input type="checkbox" name="supporting[]" value="<?php echo ($vo["name"]); ?>">
                                <span><?php echo ($vo["name"]); ?></span>
                              </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        <div class="clear"></div>
                      </ul>
                       <p class="kk queding">
                            <button class="sure btn btn-default " >确定</button>
                            <button class="sure1 btn btn-default " >取消</button>
                        </p>
                        <input type="hidden"  class="receive">
                    </div>
                  </li>
                 <button type="submit" class="btn btn-default li-btn">按条件搜索</button>
                  <div class="clear"></div>
              </ul>
            </form>
        </div>
</section>
<!-- 多图区 -->
<section>
  <div class="container">
        <div class="row">
            <div class="paixu">
                 <?php if($prams['gaodi'] == 'gaodi'): ?><a href="<?php echo U('Real/rental',array('digao' => digao));?>" class="jfsk-btn ylw-block">按价格低到高排序</a>    
                      <?php else: ?>
                          <?php if($prams['digao'] == 'digao'): ?><a href="<?php echo U('Real/rental',array('gaodi' => gaodi));?>" class="jfsk-btn ylw-block">按价格高到低排序</a>   
                          <?php else: ?>
                              <a href="<?php echo U('Real/rental',array('digao' => digao));?>" class="jfsk-btn ylw-block">按价格低到高排序</a><?php endif; endif; ?>
                    
                <?php if($prams['jiuxin'] == 'jiuxin'): ?><a href="<?php echo U('Real/rental',array('xinjiu' => xinjiu));?>" class="jfsk-btn ylw-block">按时间新到旧排序</a>
                <?php else: ?>
                      <?php if($prams['xinjiu'] == 'xinjiu'): ?><a href="<?php echo U('Real/rental',array('jiuxin' => jiuxin));?>" class="jfsk-btn ylw-block">按时间旧到新排序</a>
                      <?php else: ?>
                        <a href="<?php echo U('Real/rental',array('xinjiu' => xinjiu));?>" class="jfsk-btn ylw-block">按时间新到旧排序</a><?php endif; endif; ?>
            </div>
              <div class="col-md-9 colimage">
                <?php if(is_array($house)): $i = 0; $__LIST__ = $house;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$house): $mod = ($i % 2 );++$i;?><div class="col-md-4 mbtm">
                      <div class="imagebox">
                            <a href="<?php echo U('Real/real_neiye',array('id' => $house['id']));?>"><div class="background-image small" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($house["real_images"]["0"]["image_url"]); ?>');">
                            <?php if($house['status'] == 0): ?><div class="ribbon yizu"></div>
                            <?php else: ?>
                                <?php if($house[status] == 1): ?><div class="ribbon daishen"></div>
                                <?php else: ?>
                                   <div class="ribbon verified"></div><?php endif; endif; ?>
                            </div>
                            </a>
                            <?php if($house['recommend'] == 1): ?><div class="tui_jian"><img src="__PUBLIC__/image/tuijian.png"></div><?php endif; ?>
                            <div class="onimage-content">
                               <ul>
                                    <li>
                                       <p>
                                          <span><i class="fa fa-map-marker"></i> <?php echo (mb_substr($house["place_name"],0,15,'utf-8')); ?>&nbsp;<span><?php echo ($house["area"]); ?>m<sup>2</sup></span></span>
                                        </p>
                                    </li>
                                    <li>
                                      <p><img src="__PUBLIC__/image/a2015-3.png"><br><span><?php echo ($house["real_number"]); ?>房</span></p>
                                      <p><img src="__PUBLIC__/image/a2015-1.png"><br><span><?php echo ($house["hall_number"]); ?>厅</span></p>
                                      <p><img src="__PUBLIC__/image/a2015-2.png"><br><span><?php echo ($house["toilet_number"]); ?>卫</span></p>
                                      <p><img src="__PUBLIC__/image/a2015-4.png"><br><span><?php echo ($house["balcony"]); ?>阳</span></p>
                                      <div style="clear:both"></div>
                                    </li>
                                    <li class="li-div">
                                       <div class="li-div-sum"><a class="cp9" href="<?php echo U('Real/real_neiye',array('id' => $house['id']));?>"><?php echo ($house["price"]); ?>元</a></div>
                                    </li>
                              </ul>                            </div> 

                        </div>
                  </div><?php endforeach; endif; else: echo "" ;endif; ?>  
                  
              </div>
              <div class="col-md-3">
                    <div class="right-sidebar-top">
                         <div class="hotline">客服热线&nbsp;&nbsp; 020-38627326</div>

                    </div>
                    <div class="right-sidebar-image">
                      <div class="backg">
                          <p>推荐房型</p>
                          <?php if(is_array($recommend)): $i = 0; $__LIST__ = $recommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recommend): $mod = ($i % 2 );++$i;?><div class="padding">
                            <div class="imagebox1">
                               <a href="<?php echo U('Real/real_neiye', array('id' => $recommend['id']));?>"> <div class="" style="background:url('__PUBLIC__/upload/image/real/<?php echo ($recommend["real_images"]["0"]["image_url"]); ?>');height:125px;background-size:cover;">
                            <?php if($recommend['status'] == 0): ?><div class="ribbon yizu"></div>
                            <?php else: ?>
                                <?php if($recommend[status] == 1): ?><div class="ribbon daishen"></div>
                                <?php else: ?>
                                   <div class="ribbon verified"></div><?php endif; endif; ?>
                               </div></a>
                               <div class="onimage-content-right">
                                  <span> <?php echo ($recommend["place_name"]); ?> <?php echo ($recommend["area"]); ?>m<sup>2</sup></span>
                               </div> 
                            </div>
                          </div><?php endforeach; endif; else: echo "" ;endif; ?> 
                      </div>
                   </div>
              </div>
        </div>
        
        
  </div>

  <div class="gray-bar">
          <ul class="gray-bar-ul">
             <?php echo ($page); ?>
          </ul>
     </div>
     <div class="clear"></div>
</section>


   <!-- 页脚 -->
<div class="youqinglianjie">
    <ul>
    <?php if(is_array($footer2)): $i = 0; $__LIST__ = $footer2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$footer2): $mod = ($i % 2 );++$i;?><li><div><a href="<?php echo ($footer2['url']); ?>"><img src="__PUBLIC__/upload/image/showcase/<?php echo ($footer2['image']); ?>"></a><p><?php echo ($footer2["name"]); ?></p></div></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
    <!-- 页脚 -->
  <section class="section1">
        <div class="div05">
              <div class="div04"><a href="<?php echo U('Index/index');?>"><img src="__PUBLIC__/image/logo2.jpg"></a></div>
              <p>友情链接：<a href="#">都市圈</a> <a href="#">广州市房地产中介协会</a></p>
              <ul class="ul02">
                   <li><a href="<?php echo U('introduction/index');?>">关于我们</a></li>
                   <li>丨</li>
                   <li><a href="<?php echo U('Service_terms/service_terms');?>">服务条款</a></li>
                   <li>丨</li>
                   <li><a href="<?php echo U('User/member');?>">会员中心</a></li>
                   <li>丨</li>
                   <li><a href="<?php echo U('Real/rental');?>">广州房源</a></li>
                   <li>丨</li>
                   <li><a href="<?php echo U('Userstaff/index');?>">租赁专家</a></li>
                   <li>丨</li>
                   <li><a href="<?php echo U('Introduction/index');?>">免责声明</a></li>
                   <li>丨</li>
                   <li><a href="<?php echo U('Introduction/index');?>">投诉监督</a></li>
                   <li>丨</li>
                   <li><a href="<?php echo U('Introduction/index');?>">招贤纳才</a></li>
                   <li>丨</li>
                   <li><a href="<?php echo U('Introduction/index');?>">联系我们</a></li>
              </ul>
              <div class="clear"></div>
              <p><a href="#">在线客服QQ：点击这里给我们发消息</a>  客服热线:020~38056216 业务合作热线:18928810958</p>
              <p>信产部备案号：粤ICP备10020346号</p>
        </div>
  </section>


  

<div class="main-im">
  <div id="open_im" class="open-im">&nbsp;</div>  
  <div class="im_main" id="im_main">
    <div id="close_im" class="close-im"><a href="javascript:void(0);" title="点击关闭">&nbsp;</a></div>
    <a href="__PUBLIC__/image/zaixiankefu.png" target="_blank" class="im-qq qq-a" title="在线QQ客服">
      <div class="qq-container"></div>
      <div class="qq-hover-c"><img class="img-qq" src="http://demo.lanrenzhijia.com/2015/service0119/images/qq.png"></div>
      <span> QQ在线咨询</span>
    </a>
    <div class="im-tel">
      <div>售前咨询热线</div>
      <div class="tel-num">2292362061</div> 
    </div>
    <div class="im-footer" style="position:relative">
      <div class="weixing-container">
        <div class="weixing-show">
          <div class="weixing-txt">微信扫一扫<br>真房实客</div>
          <img class="weixing-ma" src="__PUBLIC__/image/s3.png">
          <div class="weixing-sanjiao"></div>
          <div class="weixing-sanjiao-big"></div>
        </div>
      </div>
      <div class="go-top"><a href="javascript:;" title="返回顶部"></a> </div>
      <div style="clear:both"></div>
    </div>
  </div>
</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="__PUBLIC__/Admin/bootstrap/js/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="__PUBLIC__/Admin/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/validator/jquery.validate.js"></script>

<script>
$(function(){
  $('#close_im').bind('click',function(){
    $('#main-im').css("height","0");
    $('#im_main').hide();
    $('#open_im').show();
  });
  $('#open_im').bind('click',function(e){
    $('#main-im').css("height","272");
    $('#im_main').show();
    $(this).hide();
  });
  $('.go-top').bind('click',function(){
    $(window).scrollTop(0);
  });
  $(".weixing-container").bind('mouseenter',function(){
    $('.weixing-show').show();
  })
  $(".weixing-container").bind('mouseleave',function(){        
    $('.weixing-show').hide();
  });

  $('.search-type-dropdown > li > a').click(function(){
      var html = $(this).html();
      var cateId = $(this).data('cateid');
      $('.dropdown-text').html(html);
      $('.search-type').val(cateId);
  })
  $(".zaixiankefu").click(function(){
  $("#im_main").css('display','block');
  $("#open_im").css('display','none');
  })
});  

$('.clickto > li > a').click(function(){
  var html = $(this).html();
  var cateId = $(this).data('cateid');
  $('.infule').html(html); 
})   
$('.clickto1 > li > a').click(function(){
  var html1= $(this).html();
  var cateId = $(this).data('cateid');
  $('.infule1').html(html1); 
}) 

 $(function(){
    $('.yibai').click(function(){
      var x=$(this).css('background-image');
      $('.guankantu').css('background-image',x);
      $('.yibai').removeClass('biansek')
      $(this).addClass('biansek')
    })
 })

 $(function(){
    $(".complainbox").css("display","none");
    $(".complain").click(function(){
      $(this).next().css("display","block")
    });
    $(".btn-twop").click(function(){
      $(".complainbox").css("display","none")
    });
 })



 

</script>

<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=9ecca9dc76785ba421921a9e1fd43f04"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $('.button1').click(function(){
      $('.format1').css('display','block');
    })


    $('.sure').click(function(e){
      e.preventDefault();
      var str = "";
      $('.format1').css('display','none')
      var num = $(".checkbox input[name=supporting]:checked").length;
      $(".checkbox input[name=supporting]:checked").each(function(){
        str  = $(this).parent().find('span').html();
        $('.button1 > span').html(' 您选择了' + num +'个');
        $('.receive').html();
      })
  })
    $('.sure1').click(function(e){
      e.preventDefault();
       $('.button1 > span').html('配套');
       $('.format1').css('display','none');
    })
  })  // 珠江新城下拉

$('.equipment').click(function(e){
  e.perventDefault();
  alert('a');
})

var cluster, geolocation;
var markers= [];

var defaultlng = 113.321228;
var defaultlat = 23.123153;
var mapContainerId = 'mapContainer';
var lng = $('#' + mapContainerId).data('lng');
var lat = $('#' + mapContainerId).data('lat');
var district_name = $('#' + mapContainerId).data('name');
var maplng = lng ? lng : defaultlng;
var maplat = lat ? lat : defaultlat;
district_name = district_name ? district_name : '';
//地图初始化&向地图随机加点
var map = new AMap.Map(mapContainerId,{
  resizeEnable: true,
  //二维地图显示视口
  view: new AMap.View2D({
    center: new AMap.LngLat(maplng, maplat),
    zoom:19 
  })
  
});

function init(){
    // alert(lng);
  if(lng && lat && district_name){
      var marker = addMarker(lng, lat, district_name);
      markers.push(marker);
      addCluster();
  }
}

    init();
map.setLang('zh_en');

map.plugin('AMap.Geolocation', function () {
  geolocation = new AMap.Geolocation({
    enableHighAccuracy: true,//是否使用高精度定位，默认:true
    timeout: 10000,          //超过10秒后停止定位，默认：无穷大
    maximumAge: 0,           //定位结果缓存0毫秒，默认：0
    convert: true,           //自动偏移坐标，偏移后的坐标为高德坐标，默认：true
    showMarker: true,        //定位成功后在定位到的位置显示点标记，默认：true
    showCircle: true,        //定位成功后用圆圈表示定位精度范围，默认：true
    panToLocation: true,     //定位成功后将定位到的位置作为地图中心点，默认：true
    zoomToAccuracy:true      //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
  });
  map.addControl(geolocation);
});
// console.log(AMap.event);


  
  // 随机向地图添加500个标注点
  var mapBounds = map.getBounds();
  var sw = mapBounds.getSouthWest();
  var ne = mapBounds.getNorthEast();
  var lngSpan = Math.abs(sw.lng - ne.lng);
  var latSpan = Math.abs(ne.lat - sw.lat);


  map.plugin(["AMap.MapType"], function() {
    var type = new AMap.MapType({defaultType:0});//初始状态使用2D地图
    map.addControl(type);
  });

  function createInfoWindow(data){
    return "<div>" + data.district_name + "</div>";
  }

  function panTo(lng, lat){
        map.setZoomAndCenter(19, [lng, lat]);
        // map.panTo([lng, lat]);
  };


  function clearPropertyList(){
    map.clearMap();
    $('.property-list').html('');
  }

  function addMarker(lng, lat, district_name){
    var markerPosition = new AMap.LngLat(lng, lat);
    var marker = new AMap.Marker({
      //基点位置
      position:markerPosition, 
      //marker图标，直接传递地址url
      icon:"/Public/image/house.png", 
      //相对于基点的位置
      offset:{x:-8, y:-34},
      title  : district_name,
      clickable: true
    });
    // console.log(markerPosition);

    AMap.event.addListener(marker, 'click', function(event){
      // console.log(event);
        //实例化信息窗体
      inforWindow = new AMap.InfoWindow({
          isCustom:true,
          content:createInfoWindow(v),
          size:new AMap.Size(300,300),
      });
      inforWindow.open(map, markerPosition);
    });

    return marker;
  }

  function addProperty(data){

    var container = $('.property-list');

      // <div class="scr-block">
      //     <div class="scr-img background-image oneone" style="background-image:url(__PUBLIC__/image/f2.jpg);"></div>
      //     <div class="wenben-con">
      //         <div class="wenben-con-1"><span>130</span>万</div>
      //         <div class="wenben-con-cent"><span>两室一厅</span><span>69m<sup>2</sup></span><span class="no-border">低层/18层</span></div>
      //         <div class="wenben-con-3"><span>楼盘</span><span>小区</span></div>
      //     </div>
      //     <div class="clear"></div>
      // </div>
    var propertyImage;

    if(!data.images){
      propertyImage = 'http://pic14.nipic.com/20110520/7367585_064451937000_2.jpg';
    }else{
      propertyImage = '/Public/upload/image/real/' + data.images[0]['property_url'];
    }

    var wrapper = $('<div></div>').attr('data-lng', data.lng).attr('data-lat', data.lat).attr('data-id', data.id).addClass('properties goto');
    var propertyImage = $("<div></div>").addClass('scr-img background-image oneone').css('background-image', 'url(' + propertyImage + ')').appendTo(wrapper);

    var propertyContainer = $('<div></div>').addClass('wenben-con');
    var propertyName = $('<div></div>').addClass('wenben-con-1').html(data.district_name).appendTo(propertyContainer);
    var propertyDesc = $('<div></div>').addClass('wenben-con-cent').html(data.place_name).appendTo(propertyContainer);
    var propertyCounts = $('<div></div>').addClass('wenben-con-3').html('共有房源' + data.count + '套').appendTo(propertyContainer);

    var clear = $("<div></div>").addClass('clear');
    // var name = $('<a></a>').attr('data-lng', data.lng).addClass('goto').attr('data-lat', data.lat).html(data.district_name).appendTo(wrapper);

    var marker = addMarker(data.lng, data.lat, data.district_name);
console.log(marker);
    markers.push(marker);

    propertyContainer.appendTo(wrapper);

    clear.appendTo(wrapper);

    container.append(wrapper);
  }
  //添加点聚合
  function addCluster(tag)
  {

      map.plugin(["AMap.MarkerClusterer"],function(){
        cluster = new AMap.MarkerClusterer(map,markers);
console.log(cluster);
      });

  }

  $(document).on('mouseover', '.goto', function(){
    var lng = $(this).data('lng'),
        lat = $(this).data('lat');

    panTo(lng, lat);
  })

  $(document).on('click', '.goto', function(){
    var id = $(this).data('id');
    location.href = '/index.php?s=/Real/xiaoquneiye/id/' + id;
  })

      //输入提示
    function autoSearch() {
        var keywords = document.getElementById("keyword").value;
        var auto;
        //加载输入提示插件
        AMap.service(["AMap.Autocomplete"], function() {
            var autoOptions = {
                city: "广州市" //城市，默认全国
            };
            auto = new AMap.Autocomplete(autoOptions);
            //查询成功时返回查询结果
            if (keywords.length > 0) {
                auto.search(keywords, function(status, result) {
                    autocomplete_CallBack(result);
                });
            }
            else {
                document.getElementById("result1").style.display = "none";
            }
        });
    }

    function keydown(event) {
        var key = (event || window.event).keyCode;
        var result = document.getElementById("result1")
        var cur = result.curSelect;
        if (key === 40) {
            if (cur + 1 < result.childNodes.length) {
                if (result.childNodes[cur]) {
                    result.childNodes[cur].style.background = '';
                }
                result.curSelect = cur + 1;
                result.childNodes[cur + 1].style.background = '#CAE1FF';
                document.getElementById("keyword").value = result.tipArr[cur + 1].name;
            }
        } else if (key === 38) {
            if (cur - 1 >= 0) {
                if (result.childNodes[cur]) {
                    result.childNodes[cur].style.background = '';
                }
                result.curSelect = cur - 1;
                result.childNodes[cur - 1].style.background = '#CAE1FF';
                document.getElementById("keyword").value = result.tipArr[cur - 1].name;
            }
        } else if (key === 13) {
            var res = document.getElementById("result1");
            if (res && res['curSelect'] !== -1) {
                selectResult(document.getElementById("result1").curSelect);
            }
        } else {
            autoSearch();
        }
    }

    //定位选择输入提示关键字
    function focus_callback() {
        if (navigator.userAgent.indexOf("MSIE") > 0) {
            document.getElementById("keyword").onpropertychange = autoSearch;
        }
    }
    document.getElementById("keyword").onkeyup = keydown;

    //输出输入提示结果的回调函数
    function autocomplete_CallBack(data) {
        var resultStr = "";
        var tipArr = data.tips;
        if (tipArr && tipArr.length > 0) {
            for (var i = 0; i < tipArr.length; i++) {
// console.log(tipArr[i]);
                resultStr += "<div id='divid" + (i + 1) + "' class='poi-select' style=\"font-size: 13px;cursor:pointer;padding:5px 5px 5px 5px;\"" + "data-name=" + tipArr[i].name + " data-adcode='" + tipArr[i].adcode + "''>" + tipArr[i].name + "<span style='color:#C1C1C1;'>" + tipArr[i].district + "</span></div>";
            }
        }
        else {
            resultStr = " π__π 亲,人家找不到结果!<br />要不试试：<br />1.请确保所有字词拼写正确<br />2.尝试不同的关键字<br />3.尝试更宽泛的关键字";
        }
        document.getElementById("result1").curSelect = -1;
        document.getElementById("result1").tipArr = tipArr;
        document.getElementById("result1").innerHTML = resultStr;
        document.getElementById("result1").style.display = "block";
    }

    $(document).on('click', '.poi-select', function(){
        if (navigator.userAgent.indexOf("MSIE") > 0) {
            document.getElementById("keyword").onpropertychange = null;
            document.getElementById("keyword").onfocus = focus_callback;
        }
        document.getElementById("result1").style.display = "none";
      $name = $(this).data('name');
      $adcode = $(this).data('adcode');

      $('#keyword').val($name).attr('data-adcode', $adcode);
    })

    $('.map-search').click(function(){
      $keyword = $('#keyword').val();

      var options = {
        city: 440100,
        type: "商务住宅"
      }

      map.plugin(["AMap.PlaceSearch"], function(options) {
          var msearch = new AMap.PlaceSearch();  //构造地点查询类
          AMap.event.addListener(msearch, "complete", placeSearch_CallBack); //查询成功时的回调函数

          msearch.setCity(440100);

          msearch.search($keyword);  //关键字查询查询

      });
    })


    //输出关键字查询结果的回调函数
    function placeSearch_CallBack(data) {
        //清空地图上的InfoWindow和Marker
        
        windowsArr = [];
        marker = [];
        map.clearMap();
        var resultStr1 = "";
        var poiArr = data.poiList.pois;
        var resultCount = poiArr.length;
        // console.log(resultCount);
        for (var i = 0; i < resultCount; i++) {
            resultStr1 += "<div id='divid" + (i + 1) + "' onmouseover='openMarkerTipById1(" + i + ",this)' onmouseout='onmouseout_MarkerStyle(" + (i + 1) + ",this)' style=\"font-size: 12px;cursor:pointer;padding:0px 0 4px 2px; border-bottom:1px solid #C1FFC1;\"><table><tr><td><img src=\"http://webapi.amap.com/images/" + (i + 1) + ".png\"></td>" + "<td><h3><font color=\"#00a6ac\">名称: " + poiArr[i].name + "</font></h3>";
            resultStr1 += createContent(poiArr[i].type, poiArr[i].address, poiArr[i].tel) + "</td></tr></table></div>";
            addmarker(i, poiArr[i]);
        }
        map.setFitView();
        var bounds = map.getBounds();
        console.log(bounds);
        getPropertyList(bounds);
    }

        //添加查询结果的marker&infowindow
    function addmarker(i, d) {
        var lngX = d.location.getLng();
        var latY = d.location.getLat();
        var markerOption = {
            map: map,
            icon:"/Public/image/poi.png",
            position: [lngX, latY]
        };
        var mar = new AMap.Marker(markerOption);
        marker.push([lngX, latY]);

        var infoWindow = new AMap.InfoWindow({
            content: "<h3><font color=\"#00a6ac\">  " + (i + 1) + ". " + d.name + "</font></h3>" + createContent(d.type, d.address, d.tel),
            size: new AMap.Size(300, 0),
            autoMove: true,
            offset: new AMap.Pixel(0, -30)
        });
        windowsArr.push(infoWindow);
        var aa = function(e) {
            infoWindow.open(map, mar.getPosition());
        };
        mar.on( "mouseover", aa);
    }

    function createContent(type, address, tel) {  //窗体内容
        type=parseStr(type);
        address=parseStr(address);
        tel=parseStr(tel);
        var s=[];
        s.push("地址：" +address);
        s.push("电话：" +tel);
        s.push("类型：" +type);
        return s.join("<br>");
    }

        //infowindow显示内容
    function parseStr(p){
        if(!p || p == "undefined" || p == " undefined"||p=="tel"){
            p="暂无";
        }
        return p;
    }

    function getPropertyList(Bounds){

      var data = {
        neLat: Bounds.northeast.lat, 
        neLng: Bounds.northeast.lng, 
        swLat: Bounds.southwest.lat, 
        swLng: Bounds.southwest.lng
      };

      $.getJSON('/Property/getPropertiesForLBS.html', data, function(json){

        if(json.status){
          clearPropertyList();
          if(json.data){
            $.each(json.data, function(k,v){

              addProperty(v);
            })
            addCluster(0);
          }else{
// console.log(json.data);
            $('.property-list').html('对不起, 暂时没有找到相关结果。')
          }

        }
        // console.log(json);

      })
    }

</script>

<script type="text/javascript">
$("#result1").css("display","none");
$('#keyword').keyup(function(){
  if($('#keyword').val())
    {
        $('.form-inline').css('display','none');
    }
    else{
      $('.form-inline').css('display','block');
    }
})

  
</script>
<script type="text/javascript">

  $('.filter-select > li').click(function(){
    $this = $(this);
    $this.parents('.filter-select').find('li').removeClass('active');
    $this.addClass('active');
  })
</script>
</body>
</html>