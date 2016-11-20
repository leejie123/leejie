<?php
/**
 * Created by PhpStorm.
 * User: lait
 * Date: 2016/1/5 0005
 * Time: 15:12
 */
?>

<!DOCTYPE html>
<html ng-app="app">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>账号权限</title>
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
                    <li class="active">
                        <a data-toggle="tab" href="#tab1">账号权限</a>
                    </li>
                </ul>

                <div class="tab-content no-border padding-0 pt10">
                    <div id="tab1" class="tab-pane active">
                        <!--表格-->
                        <!--顶部工具条-->
                        <div class="table-head-toolbar clearfix">
                            <div class="pull-left">微商城</div>
                            <div class="pull-right">
                                <a href="add" class="btn btn-success btn-sm"><i class="ace-icon fa fa-plus"></i> 新增员工账号</a>
                            </div>
                        </div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
                            <thead>
                            <tr>
                                <th class="center" width="100">员工姓名</th>
                                <th class="center">登录账号</th>
                                <th class="center" width="">角色权限</th>
                                <th class="center" width="">操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!--data-id表示该行数据的ID-->
                            <?php foreach($user as $v):?>
                            <tr id="row-0" data-openid="oIIZ6s_-78EbU0Qb7TxSbmwBZaKk" data-id="1502227" data-authid="6d62ndCSPCI/MoPjZbU+L9xSzo4UGk5p8vHoolQfLVNyV3hU" data-biz_id="1038" data-public_id="wx0e1e4e800b2804b5">
                                <td class="center"><?php echo $v['real_name']?></td>
                                <td class="center"><?php echo $v['user_name']?></td>
                                <td class="center"><?php echo $v['name']?></td>
                                <td class="center">
                                    <a href="/shop/SupplierAdmin/StaffManage/StaffManage/update?id=<?php echo $v['user_id']?>" data-url="/shop/SupplierAdmin/StaffManage/StaffManage/update?id=<?php echo $v['user_id']?>" data-id="reset_info">修改信息</a>
                                    <a href="/shop/SupplierAdmin/StaffManage/StaffManage/delete?id=<?php echo $v['user_id']?>" data-id="delete">删除</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <!--底部工具条-->
                        <div class="table-foot-toolbar clearfix">
                        </div>
                        <!--表格结束-->
                    </div>
                </div>
            </div>
            <!--内容结束-->
        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>

<!--备注-->
<div id="tpl-remark" class="hide">
    <div class="row pt10 pr10">
        <div class="col-xs-12">
            <div class="form-group">
                <div class="label-wrapper">
                    <label class="control-label" for="title">备注：</label>
                </div>
                <div class="control-wrapper">
                    <input type="text" placeholder="" value="" class="form-control">
                    <!--<span class="help-block">备注名称（4个汉字或8个字母以内）</span>-->
                </div>
            </div>
        </div>
    </div>
</div>

<!--对话框-->
<div id="modalDialog" class="dialog-content hide">
    <div class="loading-bg"><div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div></div>
    <iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>
</div>

<!--对话框-->
<div id="dialog-edit" class="hide">
</div>
<script type="text/javascript" src="http://static.yedadou.com/public/supplierAdmin/storeSetting/store_setting.js"></script>
</body>

</html>
