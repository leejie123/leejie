<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <head>
  <title>真房实客 - 公司介绍</title>
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
    <link rel="stylesheet" href="__PUBLIC__/css/introduction.css">
</head>
<body>   
     <!-- 导航栏 -->
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


<!-- 内容 -->
<section>
   <div class="co">
        <div>
          <div class="h2-c"><h2>创始人简介</h2></div>
             <div class="dd">
                <div class="w1">
                    <div><img src="__PUBLIC__/image/s6.png"></div>
                    <p>吕润城</p>
                    <p>广州三人行物业管理有限公司创始人</p>
                </div>
                <div class="w2">
                   <p>1975年生，陕西人，于1994年毕业于广州轻工学院，是三人行物业和真房实客网的创始人。</p>
                   <p>自信、乐观信念坚定，志存高远又奉行脚踏实地的做人做事态度。胸怀梦想，希望能持续凝聚起更多德才兼备的有识之士加入三人行一起打造中国最大的房产交易平台。让房产交易变得轻松、安全和快乐，为社会发展国家富强尽一份力。</p>
                   <p>作为一名企业家的愿景就是通过真房实客网这个平台造福100个以上的千万富翁，让三人行的员工真正实现物质和精神的双富有！</p>
                   <p>欢迎有追求有梦想的各界朋友和精英人士与本人联系。</p>
                </div>
                <div class="clear"></div>
             </div>
        </div>
        <div>
            <div class="h2-c"><h2>企业简介</h2></div>
            <div class="x-j">
                 <p>广州三人行物业管理有限公司创始于2005年，源于圣贤孔子《论语·述而》里边的“三人行,必有我焉;择其善者而从之，其不善者而改之”</p>
                 <p>三人行物业旗下有两个服务品牌，一是专注于帮房东摆脱租房烦琐的租赁托管服务www.zfsk.cn 真房实客网现在已经成为广州中高端租房首选平台，让客户足不出户视频看房、轻松找房又省中介费。</p>
                 <p>肩负着“让租房变得轻松，安全和快乐”的神圣使命，以敬业拼搏为荣，注重学习成长，具有团队精神，愿意承担责任，以三方共赢为核心理念持续为客户创造价值的团队，使三人行物业扎根于广州，放眼于全国，志在成为中国租赁服务业第一品牌。</p>
            </div>
        </div>
        <div>
            <div class="h2-c"><h2>企业文化</h2></div>
            <div class="x-j">
                <p>1.三人行的源由</p>
                <p>源于圣贤孔子《论语·述而》里边的“三人行,必有我焉;择其善者而从之，其不善者而改之。”</p>
                <p>2.三人行物业企业使命</p>
                <p>让租房变得轻松、安全和快乐。</p>
                <p>3.三人行物业发展愿景</p>
                <p>成长为中国租赁服务业的领先者;中高端房屋托管第一品牌！</p>
                <p>4.三人行物业Logo</p>
                <p>5.三人行物业核心价值观</p>
                <p>爱企敬业、学习成长、团队精神、承担责任、利他感恩、三方共赢、创造价值</p>
                <p>6.三人行物业三大纪律</p>
                <p>（1）一切行动听指挥（2）不私下获取利益（3）随时随地维护公司品牌形象。</p>
                <p>7.三人行物业经营理念</p>
                <p>让房东省心，房客舒心，企业可持续发展，实现三方共赢！</p>
                <p>8.三人行房屋管家社会评价</p>
                <p>广州中高端房屋托管第一品牌。</p>
                <p>9.三人行员工的行为宗旨</p>
                <P>勿以恶小而为之，勿以善小而不为；三人行，重在人行。</P>
            </div>
        </div>
        <div>
            <div class="h2-c"><h2>真房实客网简介</h2></div>
            <div class="x-j">
                  <p>真房源，实在客，轻松找房快乐租！</p>
                  <p>真房实客网为三人行物业公司旗下网站，专注于为租房客户提供视频看房，0中介费的租房，为您节省找房时间和中介费，您租房成交后，我们后续还会继续为您提供专业管家服务。</p>
                  <p>本网站的房源分为三种状态</p>
                  <div class="nm">
                  <p class="ca"><span class="q1"></span>真房：代表真实在租的房源，有图片、有视频、验证过房东身份可直接承担，本网保障信息真实性。</p>
                  <p class="ca"><span class="q2"></span>待审：代表真实性有待验证的房源信息，本网会员若有意可邀请租赁专家联系业主看房。</p>
                  <p class="ca"><span class="q3"></span>已租：代表已成交的房源信息，若对同类型房源有兴趣可以表示意愿，租赁专家会帮您留意。</p>
                  <div class="md"><p>真房</p><p>待审</p><p>已租</p></div>
                  </div>
                  <p>The www.zfak.cn is a member of San Ren Xing Company.</p>
                  <p>I can provide 0 intermediary fee rental housing for you ,and you can watch the video to know the details of the house.To save your time to find the house.</p>
                  <p>The site house are divided into three kinds of srate:</p>
                  <p>Real: </p>
                  <p>the house have the serious video, picture,and message.</p>
                  <p>Review:</p>
                  <p>the representative is true remain to be verified availability of information ,the network member if interested can contact the house owners leasing experts invited.</p>
                  <p>Already rent:</p>
                  <p>on behalf of the transaction has been housing information.If the same type of</p>
                  <p>housing are interested can express intention,leasing experts will help you to pay  attention to.</p>
            </div>
        </div>
        <div>
            <div class="h2-c"><h2>招贤纳才</h2></div>
            <div class="x-j">
                <p>广州三人行物业管理有限公司创始于2005年，源于圣贤孔子《论语·述而》里边的“三人行,必有我焉;择其善者而从之，其不善者而改之”</p>
                <p>三人行物业旗下有两个服务品牌，一是专注于帮房东摆脱租房烦琐的租赁托管服务www.zfsk.cn 真房实客网现在已经成为广州中高端租房首选平台，让客户足不出户视频看房、轻松找房又省中介费。</p>
                <p>肩负着“让租房变得轻松，安全和快乐”的神圣使命，以敬业拼搏为荣，注重学习成长，具有团队精神，愿意承担责任，以三方共赢为核心理念持续为客户创造价值的团队，使三人行物业扎根于广州，放眼于全国，志在成为中国租赁服务业第一品牌。</p>

            </div>
        </div>
        <div>
            <div class="h2-c"><h2>联系我们</h2></div>
            <div class="x-j">
                 <p>电话：020-38627325</p>
                 <p>传真：020-38627326</p>
                 <p>三人行物业真房实客网办公室地址：广州市天河区体育西路路7号骏汇大厦中座21D</p>
                 <p>地铁：1号3号线体育西路站G出口旁</p>
                 <p>公交：</p>
                 <p>1.天河站（黄埔大道）下车，体育西路往北100米即到</p>
                 <p>2.BRT体育中心站下车，体育西路往南直走300米左右即到</p>
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

         
</body>
</html>