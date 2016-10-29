<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>搜索结果</title>
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

<section class="search-padding">
	<div class="container search-se">
		<h3>您搜索的结果：</h3> 
		<div class="row">
      <?php if(is_array($real)): $i = 0; $__LIST__ = $real;if( count($__LIST__)==0 ) : echo "对不起，无法搜索到符合你需求的房源。" ;else: foreach($__LIST__ as $key=>$real): $mod = ($i % 2 );++$i;?><div class="col-md-4 mbtm">
       			<div class="imagebox">
                            <a href="<?php echo U('Real/real_neiye',array('id' => $real['id']));?>"><div class="background-image small" style="background-image:url('__PUBLIC__/upload/image/real/<?php echo ($real["real_images"]["0"]["image_url"]); ?>')">
                           <?php if($real['status'] == 0): ?><div class="ribbon yizu"></div>
                            <?php else: ?>
                                <?php if($realsuiji[status] == 1): ?><div class="ribbon daishen"></div>
                                <?php else: ?>
                                   <div class="ribbon verified"></div><?php endif; endif; ?>  
                            </div>
                            <?php if($real['recommend'] == 1): ?><div class="tui_jian"><img src="__PUBLIC__/image/tuijian.png"></div><?php endif; ?>
                            </a>
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
                                      <p><img src="__PUBLIC__/image/a2015-2.png"><br><span><?php echo ($real["toilet_number"]); ?>卫</span></p>
                                      <p><img src="__PUBLIC__/image/a2015-4.png"><br><span><?php echo ($real["balcony"]); ?>阳</span></p>
                                      <div style="clear:both"></div>
                                    </li>
                                    <li class="li-div">
                                       <div class="li-div-sum"><a class="cp9" href="<?php echo U('Real/real_neiye',array('id' => $real['id']));?>"><?php echo ($real["price"]); ?>元</a></div>
                                    </li>
                              </ul>
                            </div> 
                </div>
       		</div><?php endforeach; endif; else: echo "对不起，无法搜索到符合你需求的房源。" ;endif; ?>
		</div>
	</div>
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
</body>
</html>