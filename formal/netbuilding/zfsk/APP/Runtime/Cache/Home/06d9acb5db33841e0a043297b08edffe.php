<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <title> 了解租赁专家</title>
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

    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/zulinneiye.css">   
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



<!-- 头部图片 -->
<section>

    <div class="zulin-top">
      <div class="container">
        <div class="expert-info">
          <div class="expert-info-image">
            <img src="__PUBLIC__/upload/image/real/<?php echo ($staffDetail["top_image"]); ?>" class="img-responsive">
          </div>
          <div class="expert-info-detail">
            <ul>
                <li><h6><?php echo ($staffDetail["truename"]); ?></h6> 租赁专家</li>
                <li><i class="fa fa-phone-square"></i> <?php echo ($staffDetail["phone"]); ?></li>
                <li>手头房源：租房（<?php echo ($staffDetail["unitQuantity"]); ?>）</li>
                <li>熟悉小区：<?php if(is_array($staffDetail['property_id'])): $i = 0; $__LIST__ = $staffDetail['property_id'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["district_name"]); ?>、<?php endforeach; endif; else: echo "" ;endif; ?></li>
                <li>客户评价：<?php if($staffDetail["comment_grade"] == 1): ?><i class="fa fa-star"></i><?php endif; ?>
                              <?php if($staffDetail["comment_grade"] == 2): ?><i class="fa fa-star"></i><i class="fa fa-star"></i><?php endif; ?>
                              <?php if($staffDetail["comment_grade"] == 3): ?><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><?php endif; ?>
                              <?php if($staffDetail["comment_grade"] == 4): ?><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><?php endif; ?>
                              <?php if($staffDetail["comment_grade"] == 5): ?><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><?php endif; ?>
                </li>
            </ul>
          </div>
          <div class="expert-info-btn">
            <a href="<?php echo U('User/entrust',array('staff_id' =>$staffDetail['id']));?>" class="jfsk-btn large block yellow">委托此人为我找房</a>
          </div>
          
        </div>
    </div>
  </div>
<!--     <div class="bok">
      <ul>
          <li><div></li>
          <li>
              <div class="right-n">
                    <ul>
                        <li>刘德华 租赁专家</li>
                        <li><i class="fa fa-phone-square"></i>13813813812</li>
                        <li>手头房源：租房（55）</li>
                        <li>熟悉小区：中海花城湾、朱美拉</li>
                        <li>客户评价<i class="fa fa-star"></i><i class="fa fa-star"></i></li>
                    </ul>
              </div>
          </li>
          <div class="clear"></div>
      </ul>
          <a href="#">委托此人为我找房</a>
    </div> -->
</section>
<!-- 中间内容 -->
<section>
     <div class="f-w">
         <div class="f-w-a">
            <a href="#">了解我<i class="fa fa-user"></i></a>
            <div><p>简介：<?php echo ($staffDetail["description"]); ?></p></div>
         </div>
         <div class="f-w-b">
                <?php if(!empty($CommentPro)): ?><form method="post" action="<?php echo U('Userstaff/comment',array('real_id' => $commentId['real_id']));?>">
                        <label class="col-md-1 control-label pingjia">评价<i class="fa fa-star-o"></i></label>
                        <input type="hidden" value="<?php echo ($staffDetail["id"]); ?>" name="staff_id">
                        <div class="tijiao">              
                            <textarea type="textarea" class="tta" rows="8" placeholder="请对我们的租赁专家进行评价" name="comment"></textarea>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                            <label class="checkbox-inline">
                              <input  name="comment_grade" type="radio" value="1" checked>
                              <b>好评</b>
                            </label>
                            <label class="checkbox-inline">
                              <input  name="comment_grade" type="radio" value="2">
                              <b>中评</b>
                            </label>
                            <label class="checkbox-inline">
                              <input  name="comment_grade" type="radio" value="3">
                              <b>差评</b>
                            </label>
                          </div>
                          <div class="clear"></div>
                      </div>

                      <div class="a-h">
                           <ul>
                               <li>快速评论</li>
                               <li><a >服务周到</a></li>
                               <li><a >房源真实</a></li>
                               <li><a >态度好</a></li>
                               <li><a >专业</a></li>
                               <li><a >介绍详细</a></li>
                               <li><a >房源多</a></li>
                               <li><a >房源少</a></li>
                               <li><a >态度差</a></li>
                               <li><a >重信守诺</a></li>
                               <div class="clear"></div>
                           </ul>
                      </div>
                      <button class="jfsk-btn yellow sut" type="submit">提交</button>
                  </form><?php endif; ?>
         </div>
         <div class="f-w-c">
             <div class="btn-group fukk">
                     <a class="fucc">最新评论</a>
              </div>
              <div class="clear"></div>
              <div class="tbe">
                    <table class="table table-bordered">
                      <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($comment["comment"]); ?><br><span><?php echo (date('Y-m-d H:i',$comment["timestamp"])); ?></span></td>
                            <td>成交类型：<?php echo ($comment["transaction_type"]); ?></td>
                            <td>用户：<?php echo ($comment["user"]["nickname"]); ?></td>
                            <?php if($comment['comment_grade'] == '1'): ?><td><span class="rating good">好评</span></td><?php endif; ?>
                            <?php if($comment['comment_grade'] == '2'): ?><td><span class="rating medium">中评</span></td><?php endif; ?>  
                            <?php if($comment['comment_grade'] == '3'): ?><td><span class="rating bad">差评</span></td><?php endif; ?>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
              </div>
            <div class="clear"></div>
         </div>
     </div>
</section>


<!-- 多图区 -->
<section>
  <div class="container">
        <div class="someimage-t">
            <h2>看房源</h2>
          <p><a href="#"></a></p>
          <div class="clear"></div>
        </div>
        <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10 colimage">
                <?php if(is_array($real)): $i = 0; $__LIST__ = $real;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$real): $mod = ($i % 2 );++$i;?><div class="col-md-4">
                      <div class="imagebox">
                            <a href="<?php echo U('Real/real_neiye',array('id' => $real['id']));?>"><div class="s-j-x" style="background:url('__PUBLIC__/upload/image/real/<?php echo ($real["real_images"]["0"]["image_url"]); ?>');background-size:cover;background-position:center;height:188px;">
                             <?php if($real['status'] == 0): ?><div class="ribbon yizu"></div>
                            <?php else: ?>
                                <?php if($real[status] == 1): ?><div class="ribbon daishen"></div>
                                <?php else: ?>
                                   <div class="ribbon verified"></div><?php endif; endif; ?>
                            </div>
                             <?php if($real['recommend'] == 1): ?><div class="tui_jian"><img src="__PUBLIC__/image/tuijian.png"></div><?php endif; ?>
                            </a>
                            <div class="onimage-content">
                               <ul>
                                    <li>
                                       <p>
                                          <span><i class="fa fa-map-marker"></i><?php echo (mb_substr($real["place_name"],0,15,'utf-8')); ?>&nbsp;<span><?php echo ($real["area"]); ?>m<sup>2</sup></span></span>
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
                                       <div class="li-div-sum"><a href="#"><?php echo ($real["price"]); ?>元</a></div>
                                    </li>
                              </ul>
                            </div> 
                        </div>
                  </div><?php endforeach; endif; else: echo "" ;endif; ?>  
  
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
                        var txt ='';
                        $('.a-h > ul > li a').click(function(){
                          txt += $(this).html()+('&nbsp;&nbsp;&nbsp;');
                          $('.tta').html(txt );
                        })
                      })
</script>
         
</body>
</html>