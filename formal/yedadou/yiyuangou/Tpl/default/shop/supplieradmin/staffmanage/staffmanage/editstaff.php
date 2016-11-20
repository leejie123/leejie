<?php
/**
 * Created by PhpStorm.
 * User: lait
 * Date: 2016/1/5 0005
 * Time: 18:23
 */?>
<?php
/**
 * Created by PhpStorm.
 * User: lait
 * Date: 2016/1/5 0005
 * Time: 18:12
 */
?>
<!DOCTYPE html>
<html ng-app="app">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>员工管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="http://static.yedadou.com/public/??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css"/>
    <script src="http://static.yedadou.com/public/assets/js/ace-extra.js"></script>
    <script src="http://static.yedadou.com/public/assets/js/??jquery.js,bootstrap.js,jquery-ui.js,ace/elements.scroller.js,ace/ace.js,ace/ace.ajax-content.js,ace/ace.touch-drag.js,ace/ace.sidebar.js,ace/ace.sidebar-scroll-1.js"></script>
    <script src="http://static.yedadou.com/public/assets/js/??ace/ace.submenu-hover.js,ace/ace.widget-box.js,ace/ace.settings.js,ace/ace.settings-rtl.js,ace/ace.settings-skin.js,ace/ace.widget-on-reload.js,ace/ace.searchbox-autocomplete.js"></script>
    <script src="http://static.yedadou.com/public/js/??bootstrap-modal.js,bootstrap-switch.min.js,bootbox.min.js"></script>
    <script src="http://static.yedadou.com/public/admin/js/??common/common.js"></script>
    <script src="http://static.yedadou.com/public/js/kindeditor/kindeditor-all-min.js"></script>
    <script src="http://static.yedadou.com/public/js/kindeditor/lang/zh_CN.js"></script>
</head>

<body class="no-skin">

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <!--内容开始-->
            <div class="tabbable">
                <ul class="nav nav-tabs padding-12 tab-color-blue">
                    <li>
                        <a href="staff_manager.html">员工管理</a>
                    </li>

                    <li class="active">
                        <a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-plus"></i> 新增员工账号</a>
                    </li>
                </ul>

                <div class="tab-content no-border padding-0 pt10">
                    <div id="tab1" class="tab-pane active pt10">
                        <form class="form-horizontal" method="post" action="/Advanced/Qrcode/add?data=1" enctype="multipart/form-data">
                            <!--LBS回复-->
                            <div class="panel panel-default">
                                <div class="panel-heading">新增员工账号</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" for="sceneName"><strong>登录账户</strong></label>
                                        <div class="col-xs-12 col-sm-6 col-md-8">
                                            <input id="sceneName" name="account" type="text" class="form-control" placeholder="请输入登录账户" value="">
													<span class="help-block">6~12字符，允许数字及大小写字母
													</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" for="keyword"><strong>员工姓名：</strong></label>
                                        <div class="col-xs-12 col-sm-6 col-md-8">
                                            <input id="keyword" name="name" type="text" class="form-control" placeholder="请输入员工姓名" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" for="keyword"><strong>联系手机：</strong></label>
                                        <div class="col-xs-12 col-sm-6 col-md-8">
                                            <input id="keyword" name="mobile" type="text" class="form-control" placeholder="请输入手机号码" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" for="keyword"><strong>联系邮箱：</strong></label>
                                        <div class="col-xs-12 col-sm-6 col-md-8">
                                            <input id="keyword" name="email" type="text" class="form-control" placeholder="请输入邮箱" value="">
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: -8px;">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label"><strong>角色权限：</strong></label>
                                        <div class="col-xs-12 col-sm-6 col-md-8" style="padding-top: 7px;">
                                            <label>
                                                <input name="char_pre" type="radio" class="ace" value="QR_SCENE" checked/>
                                                <span class="lbl"> 管理员</span>
                                            </label>
                                            &nbsp;
                                            <label>
                                                <input name="char_pre" type="radio" class="ace" value="QR_LIMIT_SCENE"/>
                                                <span class="lbl"> 客服</span>
                                            </label>
                                            &nbsp;
                                            <label>
                                                <input name="char_pre" type="radio" class="ace" value=""/>
                                                <span class="lbl"> 财务</span>
                                            </label>
                                            &nbsp;
                                            <label>
                                                <input name="char_pre" type="radio" class="ace" value=""/>
                                                <span class="lbl"> 仓库</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" for="expireTime"><strong>登录密码：</strong></label>
                                        <div class="col-xs-12 col-sm-6 col-md-8">
                                            <input id="expireTime" name="expireTime" type="password" class="form-control" placeholder="" value="">
													<span class="help-block">
														6~20位字符
													</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" for="expireTime"><strong>请再次输入登录密码：</strong></label>
                                        <div class="col-xs-12 col-sm-6 col-md-8">
                                            <input id="expireTime" name="expireTime" type="password" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-info" id="submitBtn" type="submit"><i class="ace-icon fa fa-check"></i> 提交</button>
                            <button class="btn btn-danger" id="submitBtn" type="submit"><i class="ace-icon fa fa-check"></i> 取消</button>
                            <div class="space"></div>
                        </form>
                    </div>
                </div>
            </div>
            <!--内容结束-->
        </div>
    </div>
</div>
<div class="space"></div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>

<div class="space"></div>

<script src="http://static.yedadou.com/public/admin/js/officialAccounts/advanced/qrcode/add.js"></script>
</body>

</html>

