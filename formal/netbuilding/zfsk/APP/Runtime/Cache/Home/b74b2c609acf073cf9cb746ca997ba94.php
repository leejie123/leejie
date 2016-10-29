<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>租赁专家</title>
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
     <link rel="stylesheet" href="__PUBLIC__/css/staff.css">
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

<!-- 为你推荐 -->
<section>
    <div class="container">
        <div class="row row-one">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <form class="form-inline" action="<?php echo U('Userstaff/staffLookup');?>" method="post" enctype="multipart/form-data"> 
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="租赁专家姓名" name="truename">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                      </span>
                  </div>
                </form>
           </div>
         <!--   <div class="col-md-3">
                    <div class="btn-group">
                           <button type="button" class="btn btn-default infule">按房源</button>
                           <button type="button" class="btn btn-default dropdown-toggle" 
                              data-toggle="dropdown">
                              <span class="caret"></span>
                           </button>
                           <ul class="dropdown-menu clickto" role="menu">
                              <li><a data-cateid="1">天河区</a></li>
                              <li><a data-cateid="2">海珠区</a></li>
                              <li><a data-cateid="3">越秀区</a></li>
                            </ul>
                    </div>
           </div> -->
         <!--   <div class="col-md-3 mgn">
                    <div class="btn-group">
                           <button type="button" class="btn btn-default infule1">按评论</button>
                           <button type="button" class="btn btn-default dropdown-toggle" 
                              data-toggle="dropdown">
                              <span class="caret"></span>
                           </button>
                           <ul class="dropdown-menu clickto1" role="menu">
                              <li><a  data-cateid="1">好评量</a></li>
                              <li><a  data-cateid="2">评价量</a></li>
                           </ul>
                    </div>
           </div> -->
        </div><!-- /row -->
        <div class="a-d-p"><h3>为你推荐</h3><div class="clear"></div></div>
        <!-- 图片 -->
           <div class="row">
             <?php if(is_array($staff)): $i = 0; $__LIST__ = $staff;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-md-4 mbtm35">
                      <div class="content-one-1">
                            <ul>
                                <li><div class="content-one-1-1" style="background:url('__PUBLIC__/upload/image/real/<?php echo ($vo["staff"]["0"]["top_image"]); ?>');background-size:cover;background-position:center;height:70px;width:70px;"></div></li>
                                <li>
                                     <div class="content-one-1-2 suojin">
                                          <ul>
                                              <li class="zi"><?php echo ($vo["staff"]["0"]["truename"]); ?></li>
                                              <li class="num"><?php echo ($vo["staff"]["0"]["phone"]); ?></li>
                                              <li class="poe"><i class="fa fa-phone-square"></i></li>
                                              <div class="clear"></div>
                                          </ul>
                                          <p>手头房源：租房（<?php echo ($vo["unitQuantity"]); ?>）</p>
                                          <div class="xiaoqu text-limit">熟悉小区：<?php if(is_array($vo['property_id'])): $i = 0; $__LIST__ = $vo['property_id'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i; echo ($id["district_name"]); ?>、<?php endforeach; endif; else: echo "" ;endif; ?></div>
                                     </div>
                                </li>
                                <div class="clear"></div>
                            </ul>
                            <button class="complain">投诉</button>
                            <div class="complainbox">
                                <form method="post" action="<?php echo U('Userstaff/advice');?>">
                                  <input type="hidden" name="cid" value="<?php echo ($vo["staff"]["0"]["id"]); ?>">
                                  <textarea name="content" cols="45" rows="5"></textarea>
                                  <button class="btn-twop">确定</button>
                                  <button class="btn-twop" type="reset">取消</button>
                                </form>                              
                            </div>  
                      </div>
                      <div class="content-one-2">
                          <ul>
                               <li><a href="<?php echo U('Userstaff/detail',array('id' => $vo['staff'][0]['id']));?>"><i class="fa fa-user"></i>了解我</a></li>
                               <li><a href="<?php echo U('Userstaff/detail',array('id' => $vo['staff'][0]['id']));?>"><i class="fa fa-map-marker"></i>看房源</a></li>
                               <li class="li-2w"><a href="<?php echo U('Userstaff/detail',array('id' => $vo['staff'][0]['id']));?>"><i class="fa fa-star"></i>评价</a></li>
                               <div class="clear"></div>
                          </ul>
                      </div>
                  </div><?php endforeach; endif; else: echo "" ;endif; ?>  
           </div><!-- /row -->
           <div class="page-to"><?php echo ($Page); ?></div>
           <div class="a-d-p"><h3>推荐房源</h3><p><a href="<?php echo U('Real/rental');?>">更多</a></p><div class="clear"></div></div>
           <div class="row row-two">
                <div class="a-d-r">
                    <?php if(is_array($recommend)): $i = 0; $__LIST__ = $recommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recommend): $mod = ($i % 2 );++$i;?><div class="col-md-2">
                          <div class="padding">
                              <div class="imagebox1">
                                <a href="<?php echo U('Real/real_neiye', array('id' => $recommend['id']));?>"><div class="s-j-x" style="background:url('__PUBLIC__/upload/image/real/<?php echo ($recommend["real_images"]["0"]["image_url"]); ?>');background-size:cover;background-position:center;height:125px;"><div class="z-f"></div></div></a>
                                 <div class="onimage-content-right">
                                              <span> <?php echo (mb_substr($recommend["property"]["place_name"],0,12,'utf-8')); ?> <?php echo ($recommend["area"]); ?>m<sup>2</sup></span>
                                 </div> 
                              </div>
                            </div>
                       </div><?php endforeach; endif; else: echo "" ;endif; ?>
                     <div class="clear"></div>
                </div>
           </div>
            <div class="a-d-p"><h3>人气小区楼盘</h3><p><a href="<?php echo U('Real/district_zhujiang');?>">更多</a></p><div class="clear"></div></div>
            <div class="row">
                <?php if(is_array($popularity)): $i = 0; $__LIST__ = $popularity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$popularity): $mod = ($i % 2 );++$i;?><div class="col-md-4">
                      <div class="imagebox">
                           <a href="<?php echo U('Real/real_neiye', array('id' => $popularity['id']));?>"><div class="s-j-x1" style="background:url('__PUBLIC__/upload/image/real/<?php echo ($popularity["real_images"]["0"]["image_url"]); ?>');background-size:cover;background-position:center;height:188px;"><div class="sjx"></div></div></a>
                            <div class="onimage-content">
                               <ul>
                                    <li>
                                       <p>
                                          <span><i class="fa fa-map-marker"></i><?php echo ($popularity["property"]["district_name"]); ?><span><?php echo ($popularity["area"]); ?>m<sup>2</sup></span></span>
                                        </p>
                                    </li>
                                    <li>
                                      <p><img src="__PUBLIC__/image/a2015-3.png"><br><span class="e3"><?php echo ($popularity["real_number"]); ?>房</span></p>
                                      <p><img src="__PUBLIC__/image/a2015-1.png"><br><span class="e3"><?php echo ($popularity["hall_number"]); ?>厅</span></p>
                                      <p><img src="__PUBLIC__/image/a2015-2.png"><br><span class="e3"><?php echo ($popularity["toilet_number"]); ?>卫</span></p>
                                      <p><img src="__PUBLIC__/image/a2015-4.png"><br><span class="e3"><?php echo ($popularity["balcony"]); ?>阳</span></p>
                                      <div style="clear:both"></div>
                                    </li>
                                    <li class="li-div">
                                       <div class="li-div-sum"><a href="<?php echo U('Real/real_neiye', array('id' => $popularity['id']));?>"><?php echo ($popularity["price"]); ?>元</a></div>
                                    </li>
                              </ul>
                            </div> 
                        </div>
                  </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
    </div><!-- /container -->
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

         
</body>
</html>