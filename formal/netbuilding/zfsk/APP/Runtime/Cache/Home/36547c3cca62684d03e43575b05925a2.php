<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <title>真房实客 - 首页</title>
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
</head>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css">
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

<div class="two">

  <!-- 三排框 -->
<section class="section02">
   <div class="container">
   <div class="row">
    <div class="col-md-4 jz">
      <div class="thumbnail">
          <a href="<?php echo U('Real/rental');?>" class="a001">视频看房</a>
        <div class="img-circle" ></div><img src="__PUBLIC__/image/a04.png" alt="..."  >
        <div class="caption">
          <div class="dv1">
          <p class="p1">我们拍摄物业视频<br>您登陆网站查看<br>You can see the room's video on our website<br>省时看房</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 jz">
      <div class="thumbnail">
          <a href="<?php echo U('Real/rental');?>" class="a001">0中介费租到房服务</a>
        <img src="__PUBLIC__/image/a06.png" alt="..." class="img-circle">
        <div class="caption">
          <div class="dv1">
          <p class="p1">不收取任何中介费<br>全程为您提供<br>0 agency fees one to one service<br>免费服务</p>
          </div>
        </div>
      </div>
    </div> 
    <div class="col-md-4 jz">
      
      <div class="thumbnail">
          <a href="<?php echo U('Userstaff/index');?>" class="a001">1对1专家服务</a>
        <img src="__PUBLIC__/image/a05.png" alt="..." class="img-circle">
        <div class="caption">
          <div class="dv1">
          <p class="p1">专家全程专业跟进<br>确保房源真实性<br>Ensure that housing real to ensure the safety of trading<br>保障交易安全</p>
          </div>
        </div>
      </div>
    </div>
   </div>
    </div>
</section>


  

  <!-- 大图片框2 -->
 <section class="section2 index">
       <div class="container-fluid">
          <div class="col thumbnail div02">
<!--               <h1 class="h0001">你可以接受的价格？</h1>
              <h4 class="h0002">买房是件大事。我们可以帮你出多少钱，你必须与工作和您的按揭过程带来更为清晰的图。</h4>
              <img src="image/a07.png">
              <form>
                    <button id="button2id" name="button2id" class="btn btn-danger btn1" >立即行动</button>
              </form> -->
          </div>
       </div>
</section >
    <!-- 分隔条 -->
  <section class="section3">
     <div class="div03">
          <ul class="ul01">
             <li>分类：</li>
             <li><a href="<?php echo U('Index/index');?>" >全部</a></li>
             <?php if(is_array($fenlei)): $i = 0; $__LIST__ = $fenlei;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fenlei): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/index',array('cate_id' => $fenlei['id']));?>"><?php echo ($fenlei["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
     </div>
     <div class="clear"></div>
  </section>


  <!-- 脚端文本 -->
<section>
    <div class="container-fluid">
       
         <p class="row">
            <h2 class="tjfy">推荐房源</h2>
            <div class="paixu"> 
              <?php if($prams['gaodi'] == 'gaodi'): ?><a href="<?php echo U('Index/index',array('digao' => digao));?>" class="jfsk-btn ylw-block">按价格低到高排序</a>    
                  <?php else: ?>
                      <?php if($prams['digao'] == 'digao'): ?><a href="<?php echo U('Index/index',array('gaodi' => gaodi));?>" class="jfsk-btn ylw-block">按价格高到低排序</a>   
                      <?php else: ?>
                          <a href="<?php echo U('Index/index',array('digao' => digao));?>" class="jfsk-btn ylw-block">按价格低到高排序</a><?php endif; endif; ?>
                
            <?php if($prams['jiuxin'] == 'jiuxin'): ?><a href="<?php echo U('Index/index',array('xinjiu' => xinjiu));?>" class="jfsk-btn ylw-block">按时间新到旧排序</a>
            <?php else: ?>
                  <?php if($prams['xinjiu'] == 'xinjiu'): ?><a href="<?php echo U('Index/index',array('jiuxin' => jiuxin));?>" class="jfsk-btn ylw-block">按时间旧到新排序</a>
                  <?php else: ?>
                    <a href="<?php echo U('Index/index',array('xinjiu' => xinjiu));?>" class="jfsk-btn ylw-block">按时间新到旧排序</a><?php endif; endif; ?>
            </div>
            <?php if(is_array($real)): $i = 0; $__LIST__ = $real;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$real): $mod = ($i % 2 );++$i;?><div class="col-md-4 div11">
                <div class="div13">
                <a href="<?php echo U('Real/real_neiye',array('id' => $real['id']));?>"><div class="background-image big" style="background-image: url('__PUBLIC__/upload/image/real/<?php echo ($real["real_images"]["0"]["image_url"]); ?>')"></div></a>
                  <?php if($real['status'] == 0): ?><div class="ribbon yizu"></div>
                  <?php else: ?>
                      <?php if($real[status] == 1): ?><div class="ribbon daishen"></div>
                      <?php else: ?>
                         <div class="ribbon verified"></div><?php endif; endif; ?>
                  <?php if($real['recommend'] == 1): ?><div class="tui_jian"><img src="__PUBLIC__/image/tuijian.png"></div><?php endif; ?>
                <div class="hover-expanded">
                  <ul>
                    <li>
                       <p>
                          <span><i class="fa fa-map-marker"></i> <?php echo ($real["place_name"]); ?></span>
                          <span><?php echo ($real["price"]); ?>元</span>
                          <span><?php echo ($real["area"]); ?>m<sup>2</sup></span>
                        </p>
                    </li>
                    <li>
                       <p>交通：<?php echo ($real["traffic"]); ?></p>
                    </li>
                    <li>
                       <p>家居家电：<?php echo ($real["furniture"]); ?></p>
                    </li>
                    <li>
                       <p>配套设施：<?php echo ($real["facilities"]); ?></p>
                    </li>
                  </ul>
                </div>
                </div>
              </div><?php endforeach; endif; else: echo "" ;endif; ?>
        
         </p>
    </div> 
    <div class="div03">
          <ul class="ul03">
             <?php echo ($Page); ?>
          </ul>
     </div>
     <div class="clear"></div>
</section>
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


</div>    
  
<script type="text/javascript">

$('li.dropdown').mouseover(function() {   

     $(this).addClass('open');    
        }).mouseout(function() {      
       $(this).removeClass('open');   
        }); 



</script>
         
</body>
</html>