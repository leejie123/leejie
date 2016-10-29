<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>会员VIP</title>
     
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
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/huiyuan3.css">
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
         <div class="shoubu">
                  <p class="biaoti">VIP专区</p>
                  <p>VIP会员享有我站每月举办的免费聚会及旅游活动</p>
                  <p>VIP会员可获赠免费每月上门检测维修房屋一次</p>
                  <p>VIP会员可获赠我公司不定期送出的精美礼品</p>
              </div>
              <div class="xiaodaohang">
                   <p class="biaoti">分类信息栏</p>
                   <ul>
                       <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('User/hy_VIP' , array('cate_id' => $vi['id']));?>"><?php echo ($vi["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                       <!-- <li><a href="#">租房故事分享</a></li>
                       <li><a href="#">会员活动</a></li>
                       <li><a href="#">租房交友</a></li>
                       <li><a href="#">同城新闻</a></li>
                       <li><a href="#">大杂烩</a></li>
                       <li><a href="#">租房常见问题问答</a></li> -->
                       <form method="get" action="<?php echo U('User/hy_VIP');?>"><li><input type="text" name="search" class="form-control cd float"><button type="submit" class="btn btn-default float"><i class="fa fa-search"></i></button><div class="clear"></div></li></form>
                       <div class="clear"></div>
                   </ul>
              </div>
              <?php if(is_array($vip_info_list)): $i = 0; $__LIST__ = $vip_info_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="xdhx">
                   <?php if($vo['is_recommend'] == '1'): ?><p class="biaoti">推荐</p>
                   <?php else: ?>
                    <p class="biaoti">非推荐</p><?php endif; ?>
                   <div class="xdhr">
                        <div class="">
                          <p class="p01 yanse"><?php echo (mb_substr($vo["title"],0,20,'utf-8')); ?></p>
                          <p class="p02 jh"><i class="fa fa-user"></i><?php echo ($vo["user"]["username"]); ?></p>
                          <div class="clear"></div>
                        </div>
                        <div>
                            <p class="p01"><?php echo (mb_substr(strip_tags($vo["content"]),0,45,'utf-8')); ?>...</p>
                            <p class="p02"><i class="fa fa-clock-o"></i> <?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></p>
                            <div class="clear"></div>
                        </div>
                   </div>
                   <div class="clear"></div>
                   <div class="image-tobead">
                       <?php if(is_array($vo['photo'])): $i = 0; $__LIST__ = array_slice($vo['photo'],0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vu): $mod = ($i % 2 );++$i;?><div class="background-image liantu float" style="background-image:url('../../../..<?php echo ($vu); ?>');"></div><?php endforeach; endif; else: echo "" ;endif; ?>
                   </div>
                   <hr>
                   <hr>
                   <hr>
                   <hr>
                   <hr>
                   <hr>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
              <!-- <div>
                <p class="biaoti">租房常见问题问答</p>
              </div> -->
              <!-- <div class="xdhx zx">
                   <p class="biaoti">推荐</p>
                   <div class="xdhr">
                        <div class="">
                          <p class="p01 yanse">你还在为租房烦恼吗？</p>
                          <p class="p02 jh"><i class="fa fa-user"></i>小&nbsp;&nbsp;&nbsp;二</p>
                          <div class="clear"></div>
                        </div>
                        <div>
                            <p class="p01">每天更新上千家租房信息 100%真实房源！<br>免费在线咨询+免费看房+免费发布</p>
                            <p class="p02"><i class="fa fa-clock-o"></i> 15:11</p>
                            <div class="clear"></div>
                        </div>
                   </div>
                   <div class="clear"></div>
                   <div class="image-tobead">
                       <div class="background-image liantu float" style="background-image:url('__PUBLIC__/image/z-41.png');"></div>
                       <div class="background-image liantu float" style="background-image:url('__PUBLIC__/image/z-42.png');"></div>
                       <div class="background-image liantu float" style="background-image:url('__PUBLIC__/image/z-43.png');"></div>
                       <div class="background-image liantu float" style="background-image:url('__PUBLIC__/image/z-44.png');"></div>
                       <div class="clear"></div>
                   </div>
                   <hr>
              </div>
              <div class="xdhx">
                   <p class="biaoti">推荐</p>
                   <div class="xdhr">
                        <div class="">
                          <p class="p01 yanse">办公室租赁-首选入驻商务办公室</p>
                          <p class="p02 jh"><i class="fa fa-user"></i>小&nbsp;&nbsp;&nbsp;二</p>
                          <div class="clear"></div>
                        </div>
                        <div>
                            <p class="p01">租金75折+送免租期全新办公室，租期灵活+即租即用+可注册公司！</p>
                            <p class="p02"><i class="fa fa-clock-o"></i> 15:11</p>
                            <div class="clear"></div>
                        </div>
                   </div>
                   <div class="clear"></div>
                   <hr>
              </div>
              <div class="xdhx">
                   <p class="biaoti">推荐</p>
                   <div class="xdhr">
                        <div class="">
                          <p class="p01 yanse">广州 建业五栋大楼A栋楼王8楼整数出租</p>
                          <p class="p02 jh"><i class="fa fa-user"></i>小&nbsp;&nbsp;&nbsp;二</p>
                          <div class="clear"></div>
                        </div>
                        <div>
                            <p class="p01">豪华楼王！风水宝地！客似云来！建业五栋大楼A栋楼王8楼整层出租</p>
                            <p class="p02"><i class="fa fa-clock-o"></i> 15:11</p>
                            <div class="clear"></div>
                        </div>
                   </div>
                   <div class="clear"></div>
                   <div class="image-tobead">
                       <div class="background-image liantu float" style="background-image:url('__PUBLIC__/image/z-41.png');"></div>
                       <div class="background-image liantu float" style="background-image:url('__PUBLIC__/image/z-42.png');"></div>
                       <div class="background-image liantu float" style="background-image:url('__PUBLIC__/image/z-42.png');"></div>
                       <div class="background-image liantu float" style="background-image:url('__PUBLIC__/image/z-44.png');"></div>
                       <div class="clear"></div>
                   </div>
                   <hr>
              </div>
              <div class="xdhx">
                   <p class="biaoti">推荐</p>
                   <div class="xdhr">
                        <div class="">
                          <p class="p01 yanse">你还在为租房烦恼吗？</p>
                          <p class="p02 jh"><i class="fa fa-user"></i>张&nbsp;&nbsp;&nbsp;三</p>
                          <div class="clear"></div>
                        </div>
                        <div>
                            <p class="p01">每天更新上千家租房信息 100%真实房源！<br>免费在线咨询+免费看房+免费发布</p>
                            <p class="p02"><i class="fa fa-clock-o"></i> 15:11</p>
                            <div class="clear"></div>
                        </div>
                   </div>
                   <div class="clear"></div>
                   <hr>
              </div>
              <div class="xdhx">
                   <p class="biaoti">推荐</p>
                   <div class="xdhr">
                        <div class="">
                          <p class="p01 yanse">你还在为租房烦恼吗？</p>
                          <p class="p02 jh"><i class="fa fa-user"></i>李&nbsp;&nbsp;&nbsp;四</p>
                          <div class="clear"></div>
                        </div>
                        <div>
                            <p class="p01">每天更新上千家租房信息 100%真实房源！<br>免费在线咨询+免费看房+免费发布</p>
                            <p class="p02"><i class="fa fa-clock-o"></i> 15:11</p>
                            <div class="clear"></div>
                        </div>
                   </div>
                   <div class="clear"></div>
                   <hr>
              </div>
              <div class="xdhx">
                   <p class="biaoti">推荐</p>
                   <div class="xdhr">
                        <div class="">
                          <p class="p01 yanse">你还在为租房烦恼吗？</p>
                          <p class="p02 jh"><i class="fa fa-user"></i>王&nbsp;&nbsp;&nbsp;五</p>
                          <div class="clear"></div>
                        </div>
                        <div>
                            <p class="p01">每天更新上千家租房信息 100%真实房源！<br>免费在线咨询+免费看房+免费发布</p>
                            <p class="p02"><i class="fa fa-clock-o"></i> 15:11</p>
                            <div class="clear"></div>
                        </div>
                   </div>
                   <div class="clear"></div>
              </div> -->
              <br />
              <br />
              <br />

              <?php if($user['group'] == '2'): ?><form method="post" action="<?php echo U('User/vipactivity_add');?>" enctype="multipart/form-data">
                       <div><p class="fayan">发言</p></div>
                       <div class="form-group">
                              <label class="col-md-1 control-label ma_top">标题</label>
                              <div class="col-md-4"><input type="text" name="title" class="form-control"></div>
                              <label class="col-md-1 control-label ma_top">分类</label>
                              <div class="col-md-4">
                                  <select name="cate_id" class="form-control">
                                      <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vl["id"]); ?>"><?php echo ($vl["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                  </select>
                              </div>
                        </div>
                        <br /><br>
                       <script id="editor" name="content" type="text/plain" style="width: 100%;height:500px;"></script>
                       <div class="col-md-8"></div>
                       <div class="col-md-3 sc"><button class="jfsk-btn yellow sut" type="submit">提交</button></div>
                  </form><?php endif; ?>


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

    <script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.all.js"> </script>
    <script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        var ue = UE.getEditor('editor');
    });

    </script>        
</body>
</html>