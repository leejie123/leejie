<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo ($xiaoqu["district_name"]); ?></title>
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

<link rel="stylesheet" href="global.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/xiaoquneiye.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/zhujiangxincheng.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/zhujiangxinchengneiye.css">
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
            <img src="__PUBLIC__/image/f2015-11.png" alt="..." >
            <div class="carousel-caption"></div>
          </div>
          <div class="item">
            <img src="__PUBLIC__/image/f2015-11.png" alt="...">
            <div class="carousel-caption"></div>
          </div>
          <div class="item">
            <img src="__PUBLIC__/image/f2015-11.png" alt="...">
            <div class="carousel-caption"></div>
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
 <div class="text-cont">
     <h2>珠江新城</h2>
     <p>广州珠江新城位于天河、越秀及海珠三区的交接处，东起华南快速干线，南临珠江，北达黄埔大道，地处目前最繁荣的天河北商务区的南面，承天河北浓厚的商务氛围，浑然组成一条城市中轴线，连接东西毗邻
       传统商务区域越秀区和待发展的广州金融城，贯通南北，隔江相对的二沙岛和客村商圈，区位得天独厚。</p>
     <p>珠江新城是广州中心商务区的组成部分，同时也是三个国家中英商务区之一，集国际金融、贸易、商业、文娱、外事、行政和居住区为一体。是广州城市客厅和核心商务区。</p>
     <p>Guangzhou Pearl River New City is located in the junction of Tianhe, Yuexiu and Haizhu district, east of the South China Expressway, west of Canton Road, south of the Pearl River, north Huangpu Road, is located in the most prosperous business district of the southern sky, Hebei, Edward Hebei strong business atmosphere, totally composed of an axis of the city, next to the traditional business area linking the east and the Yuexiu District of Guangzhou city to be developed, north-south, across the river opposite Ershadao and off the village district, area blessed.</p>
     <p>Guangzhou Pearl River New City is part of the central business district, but also one of the three national central business district, a set of international finance, trade, commerce civic affairs, administrative and residential district as a whole. Guangzhou city living and central business district.</p>
 </div>
</section>



<section>
   <div class="container">
   <div class="zhonghai">
     <p><b><?php echo ($xiaoqu["district_name"]); ?></b><br><i class="fa fa-map-marker"></i><?php echo ($xiaoqu["place_name"]); ?></p>
     <div class="clear"></div>
   </div>
   </div>
</section>


<section class="beijingse">
    <div class="container xiaqu">
        <div class="col-md-5">
            <div class="row">
                <a href="#"><div class="background-image guankantu" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($tupian["0"]["property_url"]); ?>');"></div></a>
                <div class="ribbon verified"></div>
                <div class="tuwen-zi">
                     <p>小区名：<?php echo ($xiaoqu["district_name"]); ?></p>
                     <p>所在版块：<?php echo ($xiaoqu["area"]["name"]); ?></p>
                     <p>地址：<?php echo ($xiaoqu["place_name"]); ?></p>
                     <p>开发商：<?php echo ($xiaoqu["developers"]); ?></p>
                     <p>物业公司：<?php echo ($xiaoqu["property"]); ?></p>
                     <p>物业类型：<?php echo ($xiaoqu["property_type"]); ?></p>
                     <p>物业费用：<?php echo ($xiaoqu["property_charges"]); ?>元/平方米.月</p>
                     <p>总建面：<?php echo ($xiaoqu["total_area"]); ?>平方米</p>
                     <p>总户数：<?php echo ($xiaoqu["total_households"]); ?>(户)</p>
                     <p>建造年代：<?php echo (date('Y-m',$xiaoqu["construction_time"])); ?></p>
                     <p>容积率：<?php echo ($xiaoqu["volume_ratio"]); ?></p>
                     <p>停车位：<?php echo ($xiaoqu["parking_space"]); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 fff">
            <div class="row">
              <ul>
                <?php if(is_array($tupian)): $i = 0; $__LIST__ = $tupian;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tupian): $mod = ($i % 2 );++$i; if($key == 0): ?><a><li><div class="background-image yibai biansek" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($tupian["property_url"]); ?>');"></div></li></a>
                  <?php else: ?>
                    <a><li><div class="background-image yibai" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($tupian["property_url"]); ?>');"></div></li></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
            <div class="expert-info-btn">
                     <a href="<?php echo U('User/intention',array('property_id'=>$xiaoqu['id'],'user_id' => $userId['id']));?>" class="jfsk-btn large block yellow">意向租此楼盘</a>
            </div>
        </div>
            <div class="col-md-4">
              <?php if(is_array($staff)): $i = 0; $__LIST__ = $staff;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$staffs): $mod = ($i % 2 );++$i; if($staffs["has_xiaoqu"] == true): ?><div class="row xiaqu">
                          <div class="bak">联系租赁专家</div>
                          <div class="content-one-1">
                                <ul>
                                    <li><div class="content-one-1-1 background-image zhuanjiaxiang" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($staffs["top_image"]); ?>');"></div></li>
                                    <li>
                                         <div class="content-one-1-2">
                                              <ul>
                                                  <li class="zi"><?php echo ($staffs["truename"]); ?></li>
                                                  <li class="num"><?php echo ($staffs["phone"]); ?></li>
                                                  <li class="poe"><i class="fa fa-phone-square"></i></li>
                                                  <div class="clear"></div>
                                              </ul>
                                              <p>手头房源：租房（<?php echo ($staffs["unitQuantity"]); ?>）</p>
                                              <p>熟悉小区：<?php if(is_array($staffs['property_id'])): $i = 0; $__LIST__ = $staffs['property_id'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i; echo ($id["district_name"]); ?>、<?php endforeach; endif; else: echo "" ;endif; ?></p>
                                         </div>
                                    </li>
                                    <div class="clear"></div>
                                </ul>
                          </div>
                          <div class="content-one-2">
                              <ul>
                                   <li><a href="<?php echo U('Userstaff/detail',array('id' => $xiaoqu['id']));?>"><i class="fa fa-user"></i>了解我</a></li>
                                   <li><a href="<?php echo U('Userstaff/detail',array('id' => $xiaoqu['id']));?>"><i class="fa fa-map-marker"></i>看房源</a></li>
                                   <li class="li-2w"><a href="<?php echo U('Userstaff/detail',array('id' => $xiaoqu['id']));?>"><i class="fa fa-star"></i>评价</a></li>
                                   <div class="clear"></div>
                              </ul>
                          </div>
                      </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                
            </div>
    </div>

</section>

<section>
     <div class="container txt">
          <?php echo ($xiaoqu["description"]); ?>
           <a href="#" class="jfsk-btn yellow">周边状况</a> 
     </div>
</section>




<!-- 地图 -->
<section class="section3">
    <div style="height:500px;">
          <div id="mapContainer" data-lng="<?php echo ($xiaoqu["lng"]); ?>" data-lat="<?php echo ($xiaoqu["lat"]); ?>" data-name="<?php echo ($xiaoqu["district_name"]); ?>"></div>
</section>

<section>
    <div class="container">
         <a class="jfsk-btn yellow" href="#">出租屋搜索</a>
         <div class="sousuo">
            <form class="form-inline" action="<?php echo U('Real/chazhao');?>" method="get"> 
            <ul class="pos">
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
                          <div  class="checkbox">
                            <input type="checkbox" class="ab ba" name="supporting[]" value="<?php echo ($vo["name"]); ?>">
                            <span><?php echo ($vo["name"]); ?></span>
                          </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                      <div class="clear"></div>
                    </ul>
                     <p class="kk queding">
                          <button class="sure btn btn-default an" >确定</button>
                          <button class="sure1 btn btn-default an" >取消</button>
                      </p>
                      <input type="hidden"  class="receive">
                  </div>
                </li>
                <li class="ul-li"><button type="submit" class="btn btn-default anniu">按条件搜索</button></li>
                <div class="clear"></div>
            </ul>
            </form>
        </div>
        <div class="row">
            <div class="col-md-8 hiddenX"><div class="background-image dmax" style="background-image:url('__PUBLIC__/image/z-32.png');"></div></div>
            <div class="col-md-3">
                 <div class="sidebarr">
                      <div class="sidebarr rightt">
                           <p class="tjfx">推荐房型</p>
                             <?php if(is_array($realsuiji)): $i = 0; $__LIST__ = $realsuiji;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$realsuiji): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Real/real_neiye',array('id' => $realsuiji['id']));?>"><div class="background-image frr magi" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($realsuiji["real_images"]["0"]["image_url"]); ?>');">
                                   <?php if($realsuiji['status'] == 0): ?><div class="ribbon yizu"></div>
                                <?php else: ?>
                                    <?php if($realsuiji[status] == 1): ?><div class="ribbon daishen"></div>
                                    <?php else: ?>
                                       <div class="ribbon verified"></div><?php endif; endif; ?>  
                                    </if>
                                    <div class="bjt"><p><?php echo ($realsuiji["place_name"]); ?><span><?php echo ($realsuiji["area"]); ?>m<sup>2</sup></span></p></div></div></a><?php endforeach; endif; else: echo "" ;endif; ?>  
                      </div>
                 </div>
            </div>
        </div>
    </div>
</section>


<!-- 多图区 -->
<section>
  <div class="container">
        <a class="jfsk-btn yellow" href="#">推介房源</a>
        <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10 colimage">
                <?php if(is_array($real)): $i = 0; $__LIST__ = $real;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$real): $mod = ($i % 2 );++$i;?><div class="col-md-4">
                      <div class="imagebox">
                            <a href="<?php echo U('Real/real_neiye', array('id' => $real['id']));?>"><?php if($real['recommend'] == 1): ?><div class="tui_jian"><img src="__PUBLIC__/image/tuijian.png"></div><?php endif; ?><div class="background-image small" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($real["real_images"]["0"]["image_url"]); ?>');">
                                <?php if($real['status'] == 0): ?><div class="ribbon yizu"></div>
                                <?php else: ?>
                                    <?php if($real[status] == 1): ?><div class="ribbon daishen"></div>
                                    <?php else: ?>
                                       <div class="ribbon verified"></div><?php endif; endif; ?>
                           
                            </div></a>
                             <?php if($real['recommend'] == 1): ?><div class="tui_jian"><img src="__PUBLIC__/image/tuijian.png"></div><?php endif; ?>
                            <div class="onimage-content">
                               <ul>
                                    <li>
                                       <p>
                                          <span><i class="fa fa-map-marker"></i> <?php echo ($real["place_name"]); ?>&nbsp;<span><?php echo ($real["area"]); ?>m<sup>2</sup></span></span>
                                        </p>
                                    </li>
                                    <li>
                                      <p><img src="__PUBLIC__/image/a2015-3.png"><br><span><?php echo ($real["real_number"]); ?>房</span></p>
                                      <p><img src="__PUBLIC__/image/a2015-1.png"><br><span><?php echo ($real["hall_number"]); ?>厅</span></p>
                                      <p><img src="__PUBLIC__/image/a2015-2.png"><br><span><?php echo ($real["toilet"]); ?>卫</span></p>
                                      <p><img src="__PUBLIC__/image/a2015-4.png"><br><span><?php echo ($real["balcony"]); ?>阳</span></p>
                                      <div style="clear:both"></div>
                                    </li>
                                    <li class="li-div">
                                       <div class="li-div-sum"><a href="#"><?php echo ($real["price"]); ?>元</a></div>
                                    </li>
                              </ul>
                            </div> 
                        </div>
                  </div><?php endforeach; endif; else: echo "" ;endif; ?>
                  
</section>


<!-- 三张图片 -->
<section class="section1">
   <div class="container">
        <a class="jfsk-btn yellow" href="#">小区特色详情</a>
        <div class="row">
            <div class="col-md-4">
                  <div class="three-image">
                      <!-- <div class="img-circle" style="background:url('__PUBLIC__/image/f2015-12.png');background-size:cover;background-position:center;height:200px;"></div> -->
                      <div class="img-circle" style="background:url('__PUBLIC__/image/z-33.png');background-size:cover;background-position:center;height:200px;width:200px;"></div>
                  </div>
            </div>
            <div class="col-md-4">
                  <div class="three-image">
                    <div class="img-circle" style="background:url('__PUBLIC__/image/z-34.png');background-size:cover;background-position:center;height:200px;width:200px;"></div>
                  </div>
            </div>
            <div class="col-md-4">
                  <div class="three-image">
                    <div class="img-circle" style="background:url('__PUBLIC__/image/z-35.png');background-size:cover;background-position:center;height:200px;width:200px;"></div>
                  </div>
            </div>
        </div>
        <div class="suibian">
              <p><span>居</span><?php echo ($xiaoqu["live"]); ?></p>
              <p><span>行</span><?php echo ($xiaoqu["travel"]); ?></p>
              <p><span>购</span><?php echo ($xiaoqu["purchase"]); ?></p>
              <p><span>食</span><?php echo ($xiaoqu["food"]); ?></p>
              <p><span>玩</span><?php echo ($xiaoqu["play"]); ?></p>
        </div>
   </div>
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
</body>
</html>