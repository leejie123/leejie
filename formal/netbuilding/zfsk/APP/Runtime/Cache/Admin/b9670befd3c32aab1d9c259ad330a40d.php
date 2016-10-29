<?php if (!defined('THINK_PATH')) exit();?><html>
  <head>
      <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="__PUBLIC__/Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
                      <a href="#" class="btn btn-default btn-flat">修改密码</a>        
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
            添加用户
         </h1>
        </section>
 <!-- |---------------------------------------------------------| -->
        <!-- Main content -->
        <section class="content">
          

 <!-- |---------------------------------------------------------| -->
        
  <form class="form-horizontal" action="<?php echo U('Rbac/update');?>" method="post" enctype="multipart/form-data">
       <fieldset>
            <div class="form-group">
              <label class="col-md-4 control-label" for="usergroup">所属用户组</label>
              <div class="col-md-4">
              <select id="usergroup" name="role_id" class="form-control">
                  <?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
              </div>
             </div> 
            <div class="form-group">
              <label class="col-md-4 control-label" for="button1id"></label>
              <div class="col-md-8">
              <button id="button1id" name="button1id" class="btn btn-success" type="submit">保存添加</button>
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
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').dataTable( {
        } );

    });
    </script>
  </body>
</html>
</fieldset>
</form>





</body>
</html>