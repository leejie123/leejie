<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
      <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="__PUBLIC__/Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="__PUBLIC__/Font-Awesome-master/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="__PUBLIC__/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="__PUBLIC__/Admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="__PUBLIC__/Admin/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.css"> -->
  <script type="text/javascript" src="__PUBLIC__/Admin/upload/dropzone.js"></script>
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/upload/dropzone.css">
  <script type="text/javascript" src="__PUBLIC__/Admin/upload/dropzone.js"></script>
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/upload/dropzone.css">
  <!-- 自己增加的 -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/shangchuan.css" media="all">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/ThinkBox/css/ThinkBox.css" media="all">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/uploadify-v3.1/uploadify.css" media="all">
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
    <!-- head -->
    
      <!-- Main Header -->                                                                                   <!-- 主标题 -->
      <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo U('SP/listPatient');?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->                                       <!-- 对于侧边栏迷你50x50像素迷你标志 -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->                                     <!-- 规则状态和移动设备的标志 -->
          <span class="logo-lg"><b>真房实客</b>管理后台</span>
        </a>

        <!-- Header Navbar -->                                                                        <!-- 标题导航栏 -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->                                                                <!-- 侧边栏切换按钮 -->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">切换导航</span>                                                <!-- 切换导航 -->
          </a>
          <!-- Navbar Right Menu -->                                                                     <!-- 导航栏右键菜单 -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->                  
             <!--  <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">你有4条信息</li>                                
                  <li>
                    <ul class="menu">
                      <li>            
                        <a href="#">
                          <div class="pull-left">
                            <img src="__PUBLIC__/Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            支持团队
                            <small><i class="fa fa-clock-o"></i> 5 分钟</small>            
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>                        
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">看到所有的信息</a></li>                   
                </ul>
              </li>                                          -->

              <!-- <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">你有10个通知</li>                                      
                  <li>
                    <ul class="menu">
                      <li>                        
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i>5个新成员加入到今天          
                        </a>
                      </li>      
                    </ul>
                  </li>
                  <li class="footer"><a href="#">查看所有</a></li>                          
                </ul>
              </li> -->
              <!-- <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">你有9个任务</li>                                       
                  <li>
                    <ul class="menu">
                      <li>                           
                        <a href="#">
                          <h3>
                            设计一些按钮                                                    
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">完成20%</span>                               
                            </div>
                          </div>
                        </a>
                      </li>                                        
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">查看所有任务</a>                                                 
                  </li>
                </ul>
              </li> -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php if($staffUser['top_image'] == ''): ?>__PUBLIC__/Admin/dist/img/user2-160x160.jpg<?php else: ?>__PUBLIC__/upload/image/real/<?php echo ($staffUser["top_image"]); endif; ?>" class="user-image" alt="User Image"/>
                                                                               
                  <span class="hidden-xs"><?php if($staffUser['truename'] != ''): echo ($staffUser["truename"]); else: echo ($staffUser["username"]); endif; ?>&nbsp;<?php echo ($staffUser['role'][0]['name']); ?></span>                      
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php if($staffUser['top_image'] == ''): ?>__PUBLIC__/Admin/dist/img/user2-160x160.jpg<?php else: ?>__PUBLIC__/upload/image/real/<?php echo ($staffUser["top_image"]); endif; ?>" class="img-circle" alt="User Image" />
                  </li>
<!--                   <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">追随者</a>                                       
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">销售</a>                                         
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">朋友 </a>                                        
                    </div>
                  </li> -->
                  <li class="user-footer">
                    <div class="pull-left"> 
                      <a href="<?php echo U('Login/updatePassword');?>" class="btn btn-default btn-flat">修改密码</a>        
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo U('Login/logout');?>" class="btn btn-default btn-flat">登出</a>       
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->                               
<!--               <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>
      

      <!-- Control Sidebar -->                                                                                       <!-- 控制栏 -->
      <aside class="control-sidebar control-sidebar-dark">                
        <!-- Create the tabs -->                                                                                    <!-- 创建标签 -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->                                                                                           <!-- 选项卡窗格 -->
        <div class="tab-content">
          <!-- Home tab content -->                                                                               <!-- 家庭标签内容 -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">最近的活动</h3>                                               <!-- 最近的活动 -->
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">兰登的生日 </h4>                                <!-- 兰登的生日 -->
                    <p>将会在4月23号24时</p>                                                           <!-- 将会在4月23号24时 -->
                  </div>
                </a>
              </li>              
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">任务进展</h3> 
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    自定义模板设计
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>                                    
                </a>
              </li>                         
            </ul><!-- /.control-sidebar-menu -->         

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">统计标签内容</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">            
            <form method="post">
              <h3 class="control-sidebar-heading">一般设置</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                 报表面板使用
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  关于此一般设置选项的一些信息
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    <!-- sidebar -->
    
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php if($staffUser['top_image'] == ''): ?>__PUBLIC__/Admin/dist/img/user2-160x160.jpg<?php else: ?>__PUBLIC__/upload/image/real/<?php echo ($staffUser["top_image"]); endif; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php if($staffUser['truename'] != ''): echo ($staffUser["truename"]); else: echo ($staffUser["username"]); endif; ?></p><?php echo ($staffUser['role'][0]['name']); ?>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> 已登录</a>
            </div>
          </div>

          <!-- search form (Optional) -->
<!--           <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">功能列表</li>
            <!-- Optionally, you can add icons to the links -->
              <?php if(is_array($node)): $i = 0; $__LIST__ = $node;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="treeview">
                  <a href="#"><i class='fa fa-link'></i> <span><?php echo ($vo["title"]); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <?php if(is_array($vo['node'])): $i = 0; $__LIST__ = $vo['node'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li><?php if($sub['is_menu_display'] == 1): ?><a href="__APP__/Admin/<?php echo ($vo["name"]); ?>/<?php echo ($sub["name"]); ?>"><?php echo ($sub["title"]); ?></a><?php endif; ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            上传图片
          </h1>
        </section>
 <!-- |---------------------------------------------------------| -->
        <!-- Main content -->
        <section class="content">
          

 <!-- |---------------------------------------------------------| -->
          <form class="form-horizontal" action="<?php echo U('Property/upload');?>" method="post" enctype="multipart/form-data">
              <fieldset>
              <input type="hidden" value="<?php echo ($property_id); ?>" name="property_id">	
              <div class="form-group">
                <label class="col-md-4 control-label" >图片上传(可多选)</label>  
                <div class="col-md-4">
                    <input id="file" name="property_url[]" class="form-control input-md" type="file" multiple>
                </div>
              </div>
          
              <!-- Button (Double) -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                  <button id="button1id" name="button1id" class="btn btn-success">提交</button>
                  <button id="button2id" name="button2id" class="btn btn-default">重置</button>
                </div>
              </div>
               <div class="form-group">
                  <div class="col-md-2"> </div>
                  <div class="col-md-8"> 
                    <table class="table table-striped">
                        <tr>
                          <td>ID</td>
                          <td>图片</td>
                          <td>操作</td>
                        </tr>
                      <?php if(is_array($tupian)): $i = 0; $__LIST__ = $tupian;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tupian): $mod = ($i % 2 );++$i;?><tr>
                          <td><?php echo ($key+1); ?></td>
                          <td><a href="__PUBLIC__/upload/image/real/<?php echo ($tupian["property_url"]); ?>"><i class="fa fa-file-image-o"></i></a></td>
                          <td><a href="<?php echo U('Property/deleteTupian',array('id' => $tupian['id']));?>">删除</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                  </div>
                </div>

              </fieldset>
          </form>
<!-- |---------------------------------------------------------| -->



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<!--  |---------------------------------------------------------| -->

      <!-- footer -->
           <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
        </div>
        <!-- Default to the left  默认为左 -->
        <!-- <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved. --> 公司版权，保留所有权利。 
      </footer>
    </div><!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="__PUBLIC__/Admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="__PUBLIC__/Admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="__PUBLIC__/Admin/dist/js/app.min.js" type="text/javascript"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
    <script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.all.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/uploadify-v3.1/jquery.uploadify-3.1.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/ThinkBox/jquery.ThinkBox.js"></script>
    <!-- 自己增加 -->
    
        <script type="text/javascript">
      $(document).ready(function() {
        var ue = UE.getEditor('editor');
      });
      function getElementOffset(e){
         var t = e.offsetTop;
         var l = e.offsetLeft;
         var w = e.offsetWidth;
         var h = e.offsetHeight-1;

         while(e=e.offsetParent) {
         t+=e.offsetTop;
         l+=e.offsetLeft;
         }
         return {
         top : t,
         left : l,
         width : w,
         height : h
         }
      }

      function copyUrl(o){
          var imgurl = $(o).parent().parent().attr('data-src');
          var input_field = $('#copytocpbord').find('input[type=text]');
          var input_btn = $('#copytocpbord').find('input[type=button]');
          var pos = getElementOffset(o);
          input_field.val(imgurl);
          
          if(pos.left+360 > document.documentElement.clientWidth){
              $('#copytocpbord').css('left',document.documentElement.clientWidth-360);
          }else{
              $('#copytocpbord').css('left',pos.left);
          }
          $('#copytocpbord').css('top',pos.top+pos.height);
          $('#copytocpbord').show();
          
          clipobj = copy_clip(imgurl,'cp_click','click_cp_button');
          $('#copytocpbord').find('input[name=close]').unbind('click').bind('click',function(){
          $('#copytocpbord').hide();
              clipobj.destroy();
        });
      }
      function click_cp_button(){
          var pos = getElementOffset($('#cp_click').get(0));
          $('#copyedok').css('left',pos.left);
          $('#copyedok').css('top',pos.top);
          $('#copyedok').show().animate({opacity: 1.0}, 1000).fadeOut();
          $('#copytocpbord').animate({opacity: 1.0}, 1000).fadeOut();
      }
      function copy_clip(copy,bid,func){
        var clip = new ZeroClipboard.Client();
        clip.setText('');
        clip.setHandCursor( true );
        clip.addEventListener('mouseOver',function(client) { 
          clip.setText(copy);
        });

        clip.addEventListener('complete',function(o){
            clip.destroy();
          eval(func+'();');
        })
        clip.glue(bid);
        return clip;
      }

      function rename_pic(o){
          var info = $(o).parent();
          var info_txt = info.text();
        var str=$(o).parent().parent().attr('data-path'); 
        var arr=str.split('+');
        var path=arr[0];
          info.html('<input id="input_id" type="text" value="'+info_txt+'" class="ipt_2" />');
          var input = $('#input_id');
          input.focus();
          input.select();
          input.blur(
              function(){
            if(info_txt!=this.value){
              var album=$('#album').val();
              var str1=path+'+'+info_txt;
              var str2=path+'+'+this.value;
              str=album.replace(str1,str2);
              //alert(str1+str2);
              info.html('<a onclick="rename_pic(this)">'+this.value+'</a>');
              $('#album').val(str);
            }else{
              info.html('<a onclick="rename_pic(this)">'+this.value+'</a>');
            }
              }
          );
          /*input.unbind('keypress').bind('keypress',
              function(e){
                  if(e.keyCode == 13){
                      input.blur();
                  }
              }
          );*/
      }
      function rename_pic1(o){
          var info = $(o).parent().parent().find('.info');
          var info_txt = info.text();
        var path=$(o).parent().parent().attr('data-path');
          info.html('<input id="input_id" type="text" value="'+info_txt+'" class="ipt_2" />');
          var input = $('#input_id');
          input.focus();
          input.select();
          input.blur(
              function(){
            if(info_txt!=this.value){
              var album=$('#album').val();
              var arr=path.split('+');
              var str2=arr[0]+'+'+this.value;
              str=album.replace(path,str2);
              info.html('<a onclick="rename_pic(this)">'+this.value+'</a>');
              $('#album').val(str);
            }else{
              info.html('<a onclick="rename_pic(this)">'+this.value+'</a>');
            }
              }
          );
      }
      function del_pic(o){
        var parent=$(o).parent().parent();
        var str=parent.attr('data-path'); 
        var arr=str.split('+');
        var path=arr[0];  
        if(confirm('确定要删除吗？')){
          $.ajax({
            type: "POST",   //访问WebService使用Post方式请求
            url: '<<?php echo U("Uploadify/del");?>>', //调用WebService的地址和方法名称组合---WsURL/方法名
            data:"path="+encodeURI(path),
            success: function(data){  
              parent.animate({opacity: 'hide' }, "slow");
              var album=$('#album').val();
              var tmp=album.replace(str+',','');
              var tmp1=tmp.replace(','+str,'');
              var tmp2=tmp1.replace(str,'');
              $('#album').val(tmp2);
            }
          });
        }
      }
      function set_pic_cover(o){
        var str=$(o).parent().parent().attr('data-path');
        var arr=str.split('+');
        $('#cover').val(arr[0]);      
        var pos = getElementOffset($(o).parent().parent().find('span.img').get(0));
        //var pos = getElementOffset(o);   
          $('#info_msg').css('top',pos.top+20);
        $('#info_msg').css('left',pos.left);
        //$('#info_msg').css('top',pos.top-50);
        $('#info_msg').html('已设为封面');
        //$('#info_msg').show();
        $('#info_msg').show().animate({opacity: 1.0}, 1000).fadeOut();
        $("div[class='selected']").hide();
        $(o).parent().parent().find("div[class='selected']").show();
      }
      $(function (){
          $("#upload").uploadify({
            'queueSizeLimit' : 20,
            'removeTimeout' : 0.5,
            'preventCaching' : true,
            'multi'    : true,
            'swf'       : '__PUBLIC__/js/uploadify-v3.1/uploadify.swf',
            'uploader'    : '<<?php echo U("Uploadify/upload");?>>?PHPSESSID=<<?php echo ($data["session_tem"]); ?>>',//PHPSESSID为登录用户要用到的，在判断登录的地方用到
            'buttonText'  : '<img src="__PUBLIC__/images/add.png">',
            'width'     : '84',
            'height'    : '30',
            'fileTypeExts'  : '*.jpg; *.png; *.gif;',
            'onUploadSuccess' : function(file, data, response){
              console.log(data);
              var data = $.parseJSON(data); 
              if(data['status'] == 0){
                $.ThinkBox.error(data['info'],{'delayClose':3000});
                return;
              }
              //var img='<img src="__PIC_URL__/'+data['data']+'?random='+Math.random()+'" width="100" height="80" /> ';
              var img='<li data-src="__PIC_URL__/'+data['data']+'" data-path="'+data['data']+'+未命名"><span class="img"><img src="__PIC_URL__/'+data['data']+'?random='+Math.random()+'" width="100" height="80" border="0"/></span><span class="info"><a onclick="rename_pic(this)">未命名</a></span><span class="control"><a href="javascript:void(0)" onclick="copyUrl(this)"><img src="__PUBLIC__/images/copyu.gif" alt="复制网址" title="复制网址" /></a><a href="javascript:;" onclick="del_pic(this)" ><img src="__PUBLIC__/images/delete.gif" alt="直接删除" title="直接删除" /></a><a href="javascript:void(0)" onclick="set_pic_cover(this)"><img src="__PUBLIC__/images/cover.gif" alt="设为封面" title="设为封面" /></a><a href="javascript:void(0)" onclick="rename_pic1(this)"><img src="__PUBLIC__/images/rename.gif" alt="修改标题" title="修改标题" /></a></span><div class="selected" ></div></li>'
              //两个预览窗口赋值
              $('#pic_list').append(img);
              //隐藏表单赋值
              /*第一张图片为封面*/
              if(!$('#cover').val()){
                $('#cover').val(data['data']);
                $("div[class='selected']").show();
              }
              $('#album').val($('#album').val()+','+data['data']+'+未命名');
               }
          });
        });
    </script>
  </body>
</html>