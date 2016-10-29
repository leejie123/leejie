<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>会员内页-推荐租客</title>
     
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
    <link rel="stylesheet" href="__PUBLIC__/css/member.css"> 
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/huiyuan1.css">
</head>
<body>
     <!-- 导航栏 -->
<!-- 内容 -->
<section>
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


     <div class="container member-page-body">
       <div class="col-md-3 c-m-3">
      <div class="maxdiv">
          <div class="image-1">
                  <img src="__PUBLIC__/image/s5.png" class="img-circle">
                  <p><?php echo ($user["nickname"]); ?></p>
                  <p>级别：<?php echo (searchdict($user["group"],"IS_MEMBER","value")); ?>
                  <?php if($user['group'] != '2'): ?><a href="<?php echo U('User/hy_wdzl');?>">(马上升级)</a><?php endif; ?>  
                  </p>
                  <div class="tuyinying"></div>
          </div>
          <div class="siedebar">
              <ul>
                  <li>
                      <div class="div1"><i class="fa fa-cog"></i></div>
                      <div class="div2"><a href="<?php echo U('User/understand');?>">我的资料</a></div>
                  </li>
                  <li>
                      <div class="div1"><i class="fa fa-home"></i></div>
                      <div class="div2"><a href="<?php echo U('User/hyny_zuke');?>">我的推荐租客</a></div>
                  </li>
                  <li>
                      <div class="div1"><i class="fa fa-star"></i></div>
                      <div class="div2"><a href="<?php echo U('User/hy_VIP');?>">vip专区</a></div>
                  </li>
                  <li>
                      <div class="div1"><i class="fa fa-cog"></i></div>
                      <div class="div2"><a href="<?php echo U('User/hy_fuwu');?>">定制服务</a></div>
                  </li>
              </ul>
          </div>
          <div class="soller">
                <ul>
                    <li><i class="fa fa-mobile"></i><a href="#"> 下载APP</a></li>
                    <li class="side-wenda"><i class="fa fa-comment"></i><a href="#"> 租房常见问题问答</a></li>
                    <li><i class="fa fa-headphones"></i><a class="zaixiankefu"> 在线客服</a></li>
                    <li class="cl"><i class="fa fa-phone"></i> 020-38627326</li>
                    <li><img src="__PUBLIC__/image/s3.png"></li>
                </ul>
          </div>
      </div>
</div>



      <div class="col-lg-8">
      <!-- 会员中心右侧内容开始 -->
        <!-- 内容 -->
          <form method="post" action="<?php echo U('User/tenant');?>" enctype="multipart/form-data">
               <div class="nrnr">
                      <div class="hyan"><a class="zfsk-btn yellow" href="#">会员推荐租客</a></div>
                           <p>通过验证的会员每推荐一名租客在本网站注册成为验证会员</p>
                           <p>您将升级VIP会员通过验证的会员每推荐一名租客在本网站成功租房将获得300元介绍费</p>
                           <div class="hyan"><a href="#">租客需求</a> </div>    
                           <p class="gs">请输入租客需求便于我们更好的为你推荐适合的产业</p>
                           <textarea type="text" rows="10" cols="100" name="demand"></textarea>
                           <div class="form-group xqb">
                                  <label class="col-md-2 control-label ds">租客姓名</label>  
                                  <div class="col-md-4">
                                  <input placeholder="姓名" class="form-control input-md" type="text" name="tenantname">
                                  </div>
                                  <label class="col-md-2 control-label ds" >租客手机</label>  
                                  <div class="col-md-4">
                                  <input placeholder="手机号码" class="form-control input-md" type="text" name="phone" maxlength="11">
                            </div>
                      </div>
                      <div class="btnn yz"><button class="btn btn-success wadd" type="submit">提交验证</button></div>
              </div>
          </form>
      <!-- 会员中心右侧内容结束 -->
      </div>
     </div><!-- /container -->
</section>



   <!-- 页脚 -->
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