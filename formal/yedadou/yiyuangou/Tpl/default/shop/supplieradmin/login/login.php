<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>供货商平台-登陆页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="{__STATIC_URL__}/public/??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/admin/css/login2.css" />
    <style type="text/css">
        .logo-image { width: 50px; height: 50px; }
        .page-mask { position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; background-color: #fff; z-index: 9999999; }
        .tip-content { font-size: 20px; text-align: center; width: 100%; position: absolute; left: 0; top: 50%; margin-top: -50px; }
    </style>
</head>

<body class="login-layout">
<!--[if IE]>
<div class='page-mask' id="mask">
    <div class="tip-content">
        本系统暂不支持IE,请使用Chrome内核浏览器（谷歌）或火狐浏览器进入本系统
    </div>
</div>
<![endif]-->
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <a href="./?refresh"><img src="{__STATIC_URL__}/public/admin/images/logoicon.png" class="logo-image"></a>
                            <span class="white" id="id-text2">供货商平台</span>
                        </h1>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-coffee green"></i>
                                        请输入以下信息
                                    </h4>

                                    <div class="space-6"></div>

                                    <form action="" method="post" role="form" onsubmit="return formcheck();">
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="user_name" type="text" class="form-control" placeholder="用户名" />
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="password" type="password" class="form-control" placeholder="密码" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <label class="block clearfix pos-rel">
														<span class="block input-icon input-icon-right">
															<input name="verify_code" type="text" class="form-control" placeholder="验证码" />

														</span>
                                                <!--验证码-->
                                                <div class="code-container">
                                                    <div class="code2 pull-left"><img id="verificationCode" src="<?=site_url()?>/verifyCode?h=32&w=60&f=18" title="点击刷新验证码" /></div>
                                                    <button id="refresh" name="refresh" type="button" class="btn-refresh2" title="点击刷新验证码"><i class="ace-icon fa fa-refresh"></i></button>
                                                </div>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" value="remember-me" name="remember" />
                                                    <span class="lbl"> 一个月内不用再次登入</span>
                                                </label>

                                                <button name="submit" type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">登录</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>

                                    <div class="social-or-login center">
                                        <span class="bigger-110">使用快捷登录</span>
                                    </div>

                                    <div class="space-6"></div>

                                    <div class="social-login center social">
                                        <a class="btn btn-danger" data-target="#weixin-box" title="使用微信登录">
                                            <i class="ace-icon fa fa-weixin"></i>
                                        </a>

                                    </div>
                                </div>
                                <!-- /.widget-main -->

                                <div class="toolbar clearfix">

                                </div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.login-box -->

                        <div id="weixin-box" class="weixin-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header red lighter bigger">
                                        <i class="ace-icon fa fa-weixin"></i>
                                        微信登录
                                    </h4>

                                    <div class="space-6"></div>
                                    <p>
                                        使用微信扫一扫马上登录
                                    </p>
                                    <p>
                                        <img src="{__STATIC_URL__}/public/admin/images/qrcode.jpg" />
                                    </p>

                                </div>
                                <!-- /.widget-main -->

                                <div class="toolbar center social">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        返回用户名登录
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.weixin-box -->
                    </div>
                    <!-- /.position-relative -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.main-content -->
</div>
<!-- /.main-container -->

<!--[if !IE]> -->
<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
<!-- <![endif]-->
<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
<script src="{__STATIC_URL__}/public/js/jquery.cookie.js"></script>
<script src="{__STATIC_URL__}/public/admin/js/login.js"></script>
</body>

</html>