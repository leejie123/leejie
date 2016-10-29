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



  <style type="text/css">




#main {
    height: 553px;
    width: 100%;
    margin: 0px auto;
    border: 1px solid #5688CB;
    border-top: 0px;
}

#tooles {
    height: 23px;
    background: #5688CB;
    position: relative;
    z-index: 100;
    color:white;
}

#bside_left {
    width: 25%;
    height: 510px;
    padding: 10px 0px 10px 10px;
    float: left;
    overflow: auto;
}

#cur_city, #no_value {
    height: 20px;
    position: absolute;
    top: 3px;
    left: 10px;
}

#cur_city .change_city {
    margin-left: 5px;
    cursor: pointer;
}


#level {
    margin-left: 20px;
}


.logo_img {
    width: 172px;
    height: 23px;
}

.search {
    width: 280px;
    height: 53px;
    padding-left: 10px;
    float: left;
    margin-left: 15px;
    margin-right: 30px;
}

.search_t {
    width: 200px;
    height: 18px;

    padding: 3px;
    margin-top: 13px;
    line-height: 20px;
}

.search_c {
  display: inline-block;
}


.poi {
    width: 570px;
    height: 41;
    padding-top: 12px;
    float: left;
    position: relative;
}

.poi_note {
    width: 63px;
    line-height: 26px;
    float: left;
}

#poi_cur {
    width: 160px;
    height: 22px;
    margin-right: 10px;
    margin-top: 3px;
    line-height: 26px;

    float: left;
    text-align: center;
}

#addr_cur {
    width: 260px;
    height: 22px;
    margin-right: 5px;
    margin-top: 3px;
    line-height: 26px;

    float: left;
    text-align: center;
}

.btn_copy {
    width: 49px;
    height: 24px;
    background: url(../img/btn_cpoy.png) 0px 0px;
    float: left;
}

.already {
    width: 52px;
    line-height: 26px;
    padding-left: 5px;
    float: left;
    color: red;
    display: none;
}

.info_list {
    margin-bottom: 5px;
    clear: both;
    cursor: pointer;
}

#txt_pannel {
    height: 500px;
}

#city {
    width: 356px;
    height: 433px;
    padding: 10px;
    border: 2px solid #D6D6D6;
    position: absolute;
    left: 44px;
    top: 20px;
    z-index: 999;
    background: #fff;
    overflow: auto;
    color: black;
}

#city .city_class {
    font-size: 12px;
    background: #fff;
}

#city .city_container {
    margin-top: 10px;
    margin-bottom: 10px;
    background: #fff;
}

#city .city_container_left {
    width: 48px;
    float: left;
}

#city .city_container_right {
    width: 289px;
    float: left;
}

#city .close {
    width: 20px;
    height: 20px;
    display: inline-block;
    float: right;
    font-size: 20px;
    font-weight: normal;
    cursor: pointer;
}

#city .city_name {
    line-height: 20px;
    margin-left: 5px;
    color: #2F82C4;
    cursor: pointer;
    display: inline-block;
    font-size: 12px;
}

#curCity {
    margin-right: 5px;
}

.hide {
    display: none;
}

#bside_rgiht {
    width: 72%;
    height: 530px;
    margin-left: 10px;
    border-left: 1px solid #5688CB;
    float: left;
    font-size: 12px;
}

#container {
    width: 100%;
    height: 520px;
    border: 5px solid #fff;
}

#no_value{
    color:red;
    position: relative;
    width:200px;
}

</style>
<!-- add -->
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
            修改房源
          </h1>
        </section>
 <!-- |---------------------------------------------------------| -->
        <!-- Main content -->
        <section class="content">
          

 <!-- |---------------------------------------------------------| -->
          <form class="form-horizontal" action="<?php echo U('My/myrealupdate');?>" method="post" enctype="multipart/form-data">
         
              <fieldset>
              <input value="<?php echo ($real['id']); ?>" type="hidden" name="id">

              <div class="form-group">
                <label class="col-md-4 control-label" >小区名称</label>  
                <div class="col-md-4">
                   <select name="property_id" data-auto-value="<?php echo ($real['property_id']); ?>">
                       <option>请选择小区</option>
                       <?php if(is_array($property)): $i = 0; $__LIST__ = $property;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$property): $mod = ($i % 2 );++$i;?><option value="<?php echo ($property["id"]); ?>" ><?php echo ($property["district_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" >类型</label>  
                <div class="col-md-4">
                   <select name="cate_id" data-auto-value="<?php echo ($real['cate_id']); ?>">
                       <option>请选择类型</option>
                       <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cate["id"]); ?>"><?php echo ($cate["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
                </div>
              </div>

                    <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >装修</label>  
                <div class="col-md-4">
                    <select name="renovation" data-auto-value="<?php echo ($real["renovation"]); ?>">
                        <option value="0">简装修</option>
                        <option value="1">中装修</option>
                        <option value="2">精装修</option>
                        <option value="3">豪华装修</option>
                    </select>
                </div>
              </div>
             
               <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >朝向</label>  
                <div class="col-md-4">
                    <input id="direction" name="direction" value="<?php echo ($real["direction"]); ?>" class="form-control input-md"  type="text">
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >详细地址</label>  
                 <div class="col-md-4">
                <input id="place_name" name="place_name" value="<?php echo ($real["place_name"]); ?>" class="form-control input-md"  type="text">
                </div>
              </div
               <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >具体单位</label>  
                 <div class="col-md-4">
                <input id="building" name="building" value="<?php echo ($real["building"]); ?>" class="form-control input-md"  type="text">
                </div>
              </div>
                <!-- Text input -->
              <div class="form-group">
                <label class="col-md-4 control-label" >楼层高度</label>  
                 <div class="col-md-4">
                <input id="height" name="height" class="form-control input-md"  type="text">
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >面积</label>  
                <div class="col-md-4">
                    <input id="area" name="area" value="<?php echo ($real["area"]); ?>" class="form-control input-md"  type="text">
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >房</label>
                <div class="col-md-4">
                  <input id="real_number" name="real_number" value="<?php echo ($real["real_number"]); ?>" class="form-control input-md"  type="text">
                 </div> 
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >厅</label> 
                <div class="col-md-4"> 
                   <input id="hall_number" name="hall_number" value="<?php echo ($real["hall_number"]); ?>" class="form-control input-md"  type="text">
                </div>   
              </div>
                <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >厨房</label>  
                <div class="col-md-4">                 
                   <input id="toilet_number" name="toilet_number" value="<?php echo ($real["toilet_number"]); ?>" class="form-control input-md"  type="text">
                </div>
              </div>
                <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >阳台</label> 
                <div class="col-md-4">
                   <input id="balcony" name="balcony" value="<?php echo ($real["balcony"]); ?>" class="form-control input-md"  type="text">
                </div> 
              </div>
                <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >价格(元)</label>  
                <div class="col-md-4">
                    <input id="price" name="price" value="<?php echo ($real["price"]); ?>" class="form-control input-md"  type="text">
                </div>
              </div>
          
          
                 <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >交通</label>  
                <div class="col-md-4">
                    <input id="traffic" name="traffic" value="<?php echo ($real["traffic"]); ?>" class="form-control input-md"  type="text">
                </div>
              </div>
               <div class="form-group">
                      <label class="col-md-4 control-label" >建造时间</label>  
                      <div class="col-md-4">
                           <input class="form-control input-md date-picker"  type="text" name="construction_time">
                      </div>
                </div>
         
                 <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >家居家电</label>  
                <div class="col-md-4">
                    <input id="furniture" name="furniture" value="<?php echo ($real["furniture"]); ?>" class="form-control input-md"  type="text">
                </div>
              </div>
                    <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >配套设施</label>  
                <div class="col-md-4">
                    <input id="facilities" name="facilities" value="<?php echo ($real["facilities"]); ?>" class="form-control input-md"  type="text">
                </div>
              </div>      
              <div class="form-group">
                <label class="col-md-4 control-label" >业主</label>  
                <div class="col-md-4">
                    <input id="name" name="name" value="<?php echo ($real["name"]); ?>" class="form-control input-md"  type="text">
                </div>
              </div>
                    <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >联系电话</label>  
                <div class="col-md-4">
                    <input id="phone" name="phone" value="<?php echo ($real["phone"]); ?>" class="form-control input-md"  type="text">
                </div>
              </div>  
                             <!-- Text input-->

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="poi">地理位置</label>  
                <div class="col-md-4">
                <input id="poi" name="poi" placeholder="" class="form-control input-md" type="text" readonly=""> <button class="btn btn-success getPoi" data-toggle="modal" data-target=".bs-example-modal-lg">地图标注</button>
                </div>
              </div>

              <!-- add1 -->
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div style="width:100%;height:727px;position:relative;margin:0px auto;">
                          <div style="height:53px;">
                              <div class="search">
                                  <div class="search_c"><input type="text" class="search_t form-control" onkeypress="if(event.keyCode==13) {btnSearch.click();return false;}"/></div>
                                  <div id="btn_search" class="btn btn-success">搜索</div>
                              </div>
                              <div class="poi">
                                  <div class="poi_note">当前坐标：</div>
                                  <input type="text" id="poi_cur" />
                                  <div class="poi_note">当前地址：</div>
                                  <input type="text" id="addr_cur" />
                              </div>
                          </div>
                          <div id="main">
                          <div id="tooles">
                          <div id="cur_city">
                          <strong>北京市</strong><span class="change_city">[<span style="text-decoration:underline;">更换城市</span>]<span id="level">当前缩放等级：10</span></span>
                          <div id="city" class="hide">
                          <h3 class="city_class">热门城市<span class="close">X</span></h3>
                          <div class="city_container">
                              <span class="city_name">北京</span>
                              <span class="city_name">深圳</span>
                              <span class="city_name">上海</span>
                              <span class="city_name">香港</span>
                              <span class="city_name">澳门</span>
                              <span class="city_name">广州</span>
                              <span class="city_name">天津</span>
                              <span class="city_name">重庆</span>
                              <span class="city_name">杭州</span>
                              <span class="city_name">成都</span>
                              <span class="city_name">武汉</span>
                              <span class="city_name">青岛</span>
                          </div>
                          <h3 class="city_class">全国城市</h3>
                          <div class="city_container">
                              <div class="city_container_left">直辖市</div>
                              <div class="city_container_right">
                                  <span class="city_name">北京</span>
                                  <span class="city_name">上海</span>
                                  <span class="city_name">天津</span>
                                  <span class="city_name">重庆</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">内蒙古</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">呼和浩特</span>
                                  <span class="city_name">包头</span>
                                  <span class="city_name">乌海</span>
                                  <span class="city_name">赤峰</span>
                                  <span class="city_name">通辽</span>
                                  <span class="city_name">鄂尔多斯</span>
                                  <span class="city_name">呼伦贝尔</span>
                                  <span class="city_name">巴彦淖尔</span>
                                  <span class="city_name">乌兰察布</span>
                                  <span class="city_name">兴安盟</span>
                                  <span class="city_name">锡林郭勒盟</span>
                                  <span class="city_name">阿拉善盟</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">山西</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">太原</span>
                                  <span class="city_name">大同</span>
                                  <span class="city_name">阳泉</span>
                                  <span class="city_name">长治</span>
                                  <span class="city_name">晋城</span>
                                  <span class="city_name">朔州</span>
                                  <span class="city_name">晋中</span>
                                  <span class="city_name">运城</span>
                                  <span class="city_name">忻州</span>
                                  <span class="city_name">临汾</span>
                                  <span class="city_name">吕梁</span>

                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">陕西</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">西安</span>
                                  <span class="city_name">铜川</span>
                                  <span class="city_name">宝鸡</span>
                                  <span class="city_name">咸阳</span>
                                  <span class="city_name">渭南</span>
                                  <span class="city_name">延安</span>
                                  <span class="city_name">汉中</span>
                                  <span class="city_name">榆林</span>
                                  <span class="city_name">安康</span>
                                  <span class="city_name">商洛</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">河北</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">石家庄</span>
                                  <span class="city_name">唐山</span>
                                  <span class="city_name">秦皇岛</span>
                                  <span class="city_name">邯郸</span>
                                  <span class="city_name">邢台</span>
                                  <span class="city_name">保定</span>
                                  <span class="city_name">张家口</span>
                                  <span class="city_name">承德</span>
                                  <span class="city_name">沧州</span>
                                  <span class="city_name">廊坊</span>
                                  <span class="city_name">衡水</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">辽宁</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">沈阳</span>
                                  <span class="city_name">大连</span>
                                  <span class="city_name">鞍山</span>
                                  <span class="city_name">抚顺</span>
                                  <span class="city_name">本溪</span>
                                  <span class="city_name">丹东</span>
                                  <span class="city_name">锦州</span>
                                  <span class="city_name">营口</span>
                                  <span class="city_name">阜新</span>
                                  <span class="city_name">辽阳</span>
                                  <span class="city_name">盘锦</span>
                                  <span class="city_name">铁岭</span>
                                  <span class="city_name">朝阳</span>
                                  <span class="city_name">葫芦岛</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">吉林</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">长春</span>
                                  <span class="city_name">吉林</span>
                                  <span class="city_name">四平</span>
                                  <span class="city_name">辽源</span>
                                  <span class="city_name">通化</span>
                                  <span class="city_name">白山</span>
                                  <span class="city_name">松原</span>
                                  <span class="city_name">白城</span>
                                  <span class="city_name">延边</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">黑龙江</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">哈尔滨</span>
                                  <span class="city_name">齐齐哈尔</span>
                                  <span class="city_name">鸡西</span>
                                  <span class="city_name">鹤岗</span>
                                  <span class="city_name">双鸭山</span>
                                  <span class="city_name">大庆</span>
                                  <span class="city_name">伊春</span>
                                  <span class="city_name">牡丹江</span>
                                  <span class="city_name">佳木斯</span>
                                  <span class="city_name">七台河</span>
                                  <span class="city_name">黑河</span>
                                  <span class="city_name">绥化</span>
                                  <span class="city_name">大兴安岭</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">江苏</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">南京</span>
                                  <span class="city_name">无锡</span>
                                  <span class="city_name">徐州</span>
                                  <span class="city_name">常州</span>
                                  <span class="city_name">苏州</span>
                                  <span class="city_name">南通</span>
                                  <span class="city_name">连云港</span>
                                  <span class="city_name">淮安</span>
                                  <span class="city_name">盐城</span>
                                  <span class="city_name">扬州</span>
                                  <span class="city_name">镇江</span>
                                  <span class="city_name">泰州</span>
                                  <span class="city_name">宿迁</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">安徽</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">合肥</span>
                                  <span class="city_name">蚌埠</span>
                                  <span class="city_name">芜湖</span>
                                  <span class="city_name">淮南</span>
                                  <span class="city_name">马鞍山</span>
                                  <span class="city_name">淮北</span>
                                  <span class="city_name">铜陵</span>
                                  <span class="city_name">安庆</span>
                                  <span class="city_name">黄山</span>
                                  <span class="city_name">阜阳</span>
                                  <span class="city_name">宿州</span>
                                  <span class="city_name">滁州</span>
                                  <span class="city_name">六安</span>
                                  <span class="city_name">宣城</span>
                                  <span class="city_name">池州</span>
                                  <span class="city_name">亳州</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">山东</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">济南</span>
                                  <span class="city_name">青岛</span>
                                  <span class="city_name">淄博</span>
                                  <span class="city_name">枣庄</span>
                                  <span class="city_name">东营</span>
                                  <span class="city_name">潍坊</span>
                                  <span class="city_name">烟台</span>
                                  <span class="city_name">威海</span>
                                  <span class="city_name">济宁</span>
                                  <span class="city_name">泰安</span>
                                  <span class="city_name">日照</span>
                                  <span class="city_name">莱芜</span>
                                  <span class="city_name">临沂</span>
                                  <span class="city_name">德州</span>
                                  <span class="city_name">聊城</span>
                                  <span class="city_name">滨州</span>
                                  <span class="city_name">菏泽</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">浙江</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">杭州</span>
                                  <span class="city_name">宁波</span>
                                  <span class="city_name">温州</span>
                                  <span class="city_name">嘉兴</span>
                                  <span class="city_name">绍兴</span>
                                  <span class="city_name">金华</span>
                                  <span class="city_name">衢州</span>
                                  <span class="city_name">舟山</span>
                                  <span class="city_name">台州</span>
                                  <span class="city_name">丽水</span>
                                  <span class="city_name">湖州</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">江西</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">南昌</span>
                                  <span class="city_name">景德镇</span>
                                  <span class="city_name">萍乡</span>
                                  <span class="city_name">九江</span>
                                  <span class="city_name">新余</span>
                                  <span class="city_name">鹰潭</span>
                                  <span class="city_name">赣州</span>
                                  <span class="city_name">吉安</span>
                                  <span class="city_name">宜春</span>
                                  <span class="city_name">抚州</span>
                                  <span class="city_name">上饶</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">福建</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">福州</span>
                                  <span class="city_name">厦门</span>
                                  <span class="city_name">莆田</span>
                                  <span class="city_name">三明</span>
                                  <span class="city_name">泉州</span>
                                  <span class="city_name">漳州</span>
                                  <span class="city_name">南平</span>
                                  <span class="city_name">龙岩</span>
                                  <span class="city_name">宁德</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">湖南</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">长沙</span>
                                  <span class="city_name">株洲</span>
                                  <span class="city_name">湘潭</span>
                                  <span class="city_name">衡阳</span>
                                  <span class="city_name">邵阳</span>
                                  <span class="city_name">岳阳</span>
                                  <span class="city_name">常德</span>
                                  <span class="city_name">张家界</span>
                                  <span class="city_name">益阳</span>
                                  <span class="city_name">郴州</span>
                                  <span class="city_name">永州</span>
                                  <span class="city_name">怀化</span>
                                  <span class="city_name">娄底</span>
                                  <span class="city_name">湘西</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">湖北</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">武汉</span>
                                  <span class="city_name">黄石</span>
                                  <span class="city_name">襄樊</span>
                                  <span class="city_name">十堰</span>
                                  <span class="city_name">宜昌</span>
                                  <span class="city_name">荆门</span>
                                  <span class="city_name">鄂州</span>
                                  <span class="city_name">孝感</span>
                                  <span class="city_name">荆州</span>
                                  <span class="city_name">黄冈</span>
                                  <span class="city_name">咸宁</span>
                                  <span class="city_name">随州</span>
                                  <span class="city_name">恩施</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">河南</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">郑州</span>
                                  <span class="city_name">开封</span>
                                  <span class="city_name">洛阳</span>
                                  <span class="city_name">平顶山</span>
                                  <span class="city_name">焦作</span>
                                  <span class="city_name">鹤壁</span>
                                  <span class="city_name">新乡</span>
                                  <span class="city_name">安阳</span>
                                  <span class="city_name">濮阳</span>
                                  <span class="city_name">许昌</span>
                                  <span class="city_name">漯河</span>
                                  <span class="city_name">三门峡</span>
                                  <span class="city_name">南阳</span>
                                  <span class="city_name">商丘</span>
                                  <span class="city_name">信阳</span>
                                  <span class="city_name">周口</span>
                                  <span class="city_name">驻马店</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">海南</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">海口</span>
                                  <span class="city_name">三亚</span>
                                  <span class="city_name">三沙</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">广东</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">广州</span>
                                  <span class="city_name">深圳</span>
                                  <span class="city_name">珠海</span>
                                  <span class="city_name">汕头</span>
                                  <span class="city_name">韶关</span>
                                  <span class="city_name">佛山</span>
                                  <span class="city_name">江门</span>
                                  <span class="city_name">湛江</span>
                                  <span class="city_name">茂名</span>
                                  <span class="city_name">东沙群岛</span>
                                  <span class="city_name">肇庆</span>
                                  <span class="city_name">惠州</span>
                                  <span class="city_name">梅州</span>
                                  <span class="city_name">汕尾</span>
                                  <span class="city_name">河源</span>
                                  <span class="city_name">阳江</span>
                                  <span class="city_name">清远</span>
                                  <span class="city_name">东莞</span>
                                  <span class="city_name">中山</span>
                                  <span class="city_name">潮州</span>
                                  <span class="city_name">揭阳</span>
                                  <span class="city_name">云浮</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">广西</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">南宁</span>
                                  <span class="city_name">柳州</span>
                                  <span class="city_name">桂林</span>
                                  <span class="city_name">梧州</span>
                                  <span class="city_name">北海</span>
                                  <span class="city_name">防城港</span>
                                  <span class="city_name">钦州</span>
                                  <span class="city_name">贵港</span>
                                  <span class="city_name">玉林</span>
                                  <span class="city_name">百色</span>
                                  <span class="city_name">贺州</span>
                                  <span class="city_name">河池</span>
                                  <span class="city_name">来宾</span>
                                  <span class="city_name">崇左</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">贵州</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">贵阳</span>
                                  <span class="city_name">遵义</span>
                                  <span class="city_name">安顺</span>
                                  <span class="city_name">铜仁</span>
                                  <span class="city_name">毕节</span>
                                  <span class="city_name">六盘水</span>
                                  <span class="city_name">黔西南</span>
                                  <span class="city_name">黔东南</span>
                                  <span class="city_name">黔南</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">四川</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">成都</span>
                                  <span class="city_name">自贡</span>
                                  <span class="city_name">攀枝花</span>
                                  <span class="city_name">泸州</span>
                                  <span class="city_name">德阳</span>
                                  <span class="city_name">绵阳</span>
                                  <span class="city_name">广元</span>
                                  <span class="city_name">遂宁</span>
                                  <span class="city_name">内江</span>
                                  <span class="city_name">乐山</span>
                                  <span class="city_name">南充</span>
                                  <span class="city_name">宜宾</span>
                                  <span class="city_name">广安</span>
                                  <span class="city_name">达州</span>
                                  <span class="city_name">眉山</span>
                                  <span class="city_name">雅安</span>
                                  <span class="city_name">巴中</span>
                                  <span class="city_name">资阳</span>
                                  <span class="city_name">阿坝</span>
                                  <span class="city_name">甘孜</span>
                                  <span class="city_name">凉山</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">云南</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">昆明</span>
                                  <span class="city_name">保山</span>
                                  <span class="city_name">昭通</span>
                                  <span class="city_name">丽江</span>
                                  <span class="city_name">普洱</span>
                                  <span class="city_name">临沧</span>
                                  <span class="city_name">曲靖</span>
                                  <span class="city_name">玉溪</span>
                                  <span class="city_name">文山</span>
                                  <span class="city_name">西双版纳</span>
                                  <span class="city_name">楚雄</span>
                                  <span class="city_name">红河</span>
                                  <span class="city_name">德宏</span>
                                  <span class="city_name">大理</span>
                                  <span class="city_name">怒江</span>
                                  <span class="city_name">迪庆</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">甘肃</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">兰州</span>
                                  <span class="city_name">嘉峪关</span>
                                  <span class="city_name">金昌</span>
                                  <span class="city_name">白银</span>
                                  <span class="city_name">天水</span>
                                  <span class="city_name">酒泉</span>
                                  <span class="city_name">张掖</span>
                                  <span class="city_name">武威</span>
                                  <span class="city_name">定西</span>
                                  <span class="city_name">陇南</span>
                                  <span class="city_name">平凉</span>
                                  <span class="city_name">庆阳</span>
                                  <span class="city_name">临夏</span>
                                  <span class="city_name">甘南</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">宁夏</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">银川</span>
                                  <span class="city_name">石嘴山</span>
                                  <span class="city_name">吴忠</span>
                                  <span class="city_name">固原</span>
                                  <span class="city_name">中卫</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">青海</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">西宁</span>
                                  <span class="city_name">玉树</span>
                                  <span class="city_name">果洛</span>
                                  <span class="city_name">海东</span>
                                  <span class="city_name">海西</span>
                                  <span class="city_name">黄南</span>
                                  <span class="city_name">海北</span>
                                  <span class="city_name">海南</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">西藏</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">拉萨</span>
                                  <span class="city_name">那曲</span>
                                  <span class="city_name">昌都</span>
                                  <span class="city_name">山南</span>
                                  <span class="city_name">日喀则</span>
                                  <span class="city_name">阿里</span>
                                  <span class="city_name">林芝</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          <div class="city_container">
                              <div class="city_container_left"><span class="style_color">新疆</span></div>
                              <div class="city_container_right">
                                  <span class="city_name">乌鲁木齐</span>
                                  <span class="city_name">克拉玛依</span>
                                  <span class="city_name">吐鲁番</span>
                                  <span class="city_name">哈密</span>
                                  <span class="city_name">博尔塔拉</span>
                                  <span class="city_name">巴音郭楞</span>
                                  <span class="city_name">克孜勒苏</span>
                                  <span class="city_name">和田</span>
                                  <span class="city_name">阿克苏</span>
                                  <span class="city_name">喀什</span>
                                  <span class="city_name">塔城</span>
                                  <span class="city_name">伊犁</span>
                                  <span class="city_name">昌吉</span>
                                  <span class="city_name">阿勒泰</span>
                              </div>
                          </div>
                          <div style="clear:both"></div>
                          </div>
                          </div>



                              </div>
                              <div id="bside_left">
                                  <div id="txt_pannel">
                                      <h3>地图拾取</h3>

                                      <p>请在上搜索框输入需要搜索的建筑物</p>

                                      <p>或在地图里面直接选取</p>

                                  </div>

                              </div>
                              <div id="bside_rgiht">
                                  <div id="container"></div>
                              </div>
                          </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-primary confirm-poi">确认</button>
                          </div>
                          </div>
                      </div>
                    </div>
                  </div>
              <!-- add1/ -->
              <div class="form-group">
                <label class="col-md-4 control-label" >视频上传</label>  
                <div class="col-md-4">
                    <textarea id="videoUpload" name="video" type="text"><?php echo ($real["video"]); ?></textarea>
                </div>
              </div>
                 <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >房源详情</label>  
                <div class="col-md-4">
                    <textarea id="editor" name="description" type="text"><?php echo ($real["description"]); ?></textarea>
                </div>
              </div>
             
                   <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" >备注</label>  
                <div class="col-md-4">
                    <textarea id="remarks" name="remarks"  class="form-control input-md"  type="text"><?php echo ($real["remarks"]); ?></textarea>
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
    <script type="text/javascript" src="__PUBLIC__/js/helpers.js"></script>
    
     <script type="text/javascript" src="http://cdn.bootcss.com/moment.js/2.10.3/moment.js"></script>
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://cdn.bootcss.com/bootstrap-datetimepicker/4.14.30/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').dataTable( {
        } );

    });

    $(".date-picker").datetimepicker();
      $(document).ready(function() {
        var ue = UE.getEditor('editor');
        var videoUpload = UE.getEditor('videoUpload');
      });
    </script>

    <!-- ditu -->
    <script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
    <!-- shilihua -->
    <script type="text/javascript" src ="__PUBLIC__/js/ditu.js" ></script>
    <script type="text/javascript">

    $('.confirm-poi').click(function(){
      var location = $('#poi_cur').val();
      $('#poi').attr('value',location);
      $('.bs-example-modal-lg').modal('hide');

      // $('.modal-backdrop').addClass('display','none');
    })


      $('.getPoi').click(function(e){
        e.preventDefault();
      })
    </script>
    <!-- ditu -->
  </body>
</html>