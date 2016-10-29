<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title><?php echo ($real_neiye["property"]["district_name"]); ?>房介绍</title>
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
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/zulinzhuanjia.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/xiaoquneiye.css">



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
<section>
   <div class="container">
   <div class="zhonghai">

     <p><b><?php echo ($real_neiye["property"]["district_name"]); ?></b><br><i class="fa fa-map-marker"></i><?php echo ($real_neiye["property"]["place_name"]); ?>

     <div class="clear"></div>
   </div>
   </div>
</section>


<section class="beijingse">
    <div class="container xiaqu">
        <div class="col-md-5">
            <div class="row">
                <a href="#"><div class="background-image guankantu" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($real_neiye["real_images"]["0"]["image_url"]); ?>');"></div></a>
                <div class="ribbon verified"></div>
                <div class="tuwen-zi">
                     <ul>
                         
                         <li><img src="__PUBLIC__/image/a2015-3.png"><br><span><?php echo ($real_neiye["real_number"]); ?>房</span></li>
                         <li><img src="__PUBLIC__/image/a2015-1.png"><br><span><?php echo ($real_neiye["hall_number"]); ?>厅</span></li>
                         <li><img src="__PUBLIC__/image/a2015-2.png"><br><span><?php echo ($real_neiye["toilet_number"]); ?>卫</span></li>
                         <li><img src="__PUBLIC__/image/a2015-4.png"><br><span><?php echo ($real_neiye["balcony"]); ?>阳</span></li>
                 
                     </ul>
                     <div class="clear"></div>
                     <p><?php echo ($real_neiye["price"]); ?>元/月（<?php echo (searchdict($real_neiye["delivery_form"],"DELIVERY_FORM","value")); ?>）</p>
                     <div class="hr" ></div>
                     <p>小区：<?php echo ($real_neiye["property"]["district_name"]); ?></p>
                     <div class="hr" ></div>
                     <p>交通：<?php echo ($real_neiye["traffic"]); ?></p>
                     <div class="hr" ></div>
                     <p>房屋概况：<?php echo ($real_neiye["area"]); ?>m<sup>2</sup> <?php echo ($real_neiye["direction"]); ?> <?php echo (searchdict($real_neiye["renovation"],"RENOVATION","value")); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;房屋高度：<?php echo ($real_neiye["height"]); ?>米</p>
                     <div class="hr" ></div>
                     <p>家居家电：<?php echo ($real_neiye["furniture"]); ?></p>
                     <div class="hr" ></div>
                     <p>配套设施：<?php echo ($real_neiye["facilities"]); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 fff">
            <div class="row">
              <ul>
                <?php if(is_array($real_neiye['real_images'])): $i = 0; $__LIST__ = array_slice($real_neiye['real_images'],0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$real_image): $mod = ($i % 2 );++$i; if($key == 0): ?><a><li><div class="background-image yibai biansek" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($real_image["image_url"]); ?>');"></div></li></a>
                    <?php else: ?>
                      <a><li><div class="background-image yibai" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($real_image["image_url"]); ?>');"></div></li></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>  
              </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row xiaqu">
                <div class="bak">联系租赁专家</div>
                <div class="content-one-1">
                      <ul>
                          <li><div class="content-one-1-1 background-image zhuanjiaxiang" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($real_neiye["staff"]["top_image"]); ?>');"></div></li>
                          <li>
                               <div class="content-one-1-2">
                                    <ul>
                                        <li class="zi"><?php echo ($real_neiye["staff"]["truename"]); ?></li>
                                        <li class="num"><?php echo ($real_neiye["staff"]["phone"]); ?></li>
                                        <li class="poe"><i class="fa fa-phone-square"></i></li>
                                        <div class="clear"></div>
                                    </ul>
                                    <p>手头房源：租房（<?php echo ($staff["unitQuantity"]); ?>）</p>
                                    <p>熟悉小区：<?php if(is_array($staff['property_id'])): $i = 0; $__LIST__ = $staff['property_id'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["district_name"]); ?>、<?php endforeach; endif; else: echo "" ;endif; ?> </p>
                               </div>
                          </li>
                          <div class="clear"></div>
                      </ul>
                </div>
                <div class="content-one-2">
                    <ul>
                         <li><a href="<?php echo U('Userstaff/detail',array('id' => $real_neiye['staff']['id']));?>"><i class="fa fa-user"></i>了解我</a></li>
                         <li><a href="<?php echo U('Userstaff/detail',array('id' => $real_neiye['staff']['id']));?>"><i class="fa fa-map-marker"></i>看房源</a></li>
                         <li class="li-2w"><a href="<?php echo U('Userstaff/detail',array('id' => $real_neiye['staff']['id']));?>"><i class="fa fa-star"></i>评价</a></li>
                         <div class="clear"></div>
                    </ul>
                </div>
            </div>
            <div class="expert-info-btn">
                 <a href="<?php echo U('User/intention',array('real_id'=>$real_neiye['id']));?>" class="jfsk-btn large block yellow">意向租此单位</a>
            </div>
        </div>
    </div>
</section>


<section>
   <div class="container">
         <?php if(!empty($real_neiye['video'])): ?><div>
            <h2 class="jfsk-btn yellow">房源视频</h2>
            <div class="video">
                 <?php echo ($real_neiye['video']); ?>
            </div>
         </div><?php endif; ?>

         <?php if(!empty($real_neiye['description'])): ?><div class="text">
            <h2 class="jfsk-btn yellow">房源详情</h2>
           <?php echo ($real_neiye["description"]); ?>
         </div><?php endif; ?>

         <div>
            <h2 class="jfsk-btn yellow">房源图片</h2>
            <div class="datu-center">
                <?php if(is_array($real_neiye['real_images'])): $i = 0; $__LIST__ = $real_neiye['real_images'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$real_images): $mod = ($i % 2 );++$i;?><a href="__PUBLIC__/upload/image/real/<?php echo ($real_images["image_url"]); ?>" target="_blank "><div class="background-image datu shuangpai" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($real_images["image_url"]); ?>')"></div></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
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



<script type="text/javascript">
  $(function(){
    $('.yibai').click(function(){
      var x = $(this).css('background-image');
      $('.guankantu').css('background-image',x);
      $('.yibai').removeClass('biansek');
      $(this).addClass('biansek');
    })

  });
</script>
         
</body>
</html>