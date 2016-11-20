<?php
/**
 * Created by PhpStorm.
 * User: lait
 * Date: 2016/1/11 0011
 * Time: 10:31
 */
?>


<!DOCTYPE html>
<html ng-app="app">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>商品批量审核</title>
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
<style type="text/css">
    .mg-b-15{
        margin-bottom:15px;
    }
    .fa-close:hover {
        background-color: red;
    }
    span > em {
        font-style: normal;
    }
    #attr_wrap > span{
        margin-bottom:5px;
    }
    #attr_select > span {
        margin-right: 5px;
        margin-bottom:5px;
    }

    .color-blue{
        color: #6fb3e0;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <!--内容开始-->
            <form class="form-horizontal" method="post" action="post" >
                <!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
                <input type="hidden" name="checkedIds" id="checkedIds" value="<?php echo $checkedIds;?>">
                <!--LBS回复-->
                <div class="panel panel-default">
                    <div class="panel-heading">商品批量审核</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row mg-b-15" style="text-align:center;">
                                <button type="submit" class="btn btn-info" data-click="pass">审核通过</button>
                                <div class="btn btn-info" data-click="dispass">审核不通过</div>
                                <p style="margin-top:15px;color:#6fb3e0">商品批量审核如果不通过需要填写原因</p>
                            </div>
                            <div id="dispass_reason" style="display:none;">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label color-blue" for="sceneName"><strong><i class="fa fa-info-circle"></i> 请输入审核不通过的原因</strong></label>
                                <div class="col-xs-12 col-sm-6 col-md-8 mg-b-15">
                                    <textarea  name="state_desc" class="form-control" placeholder="审核不通过的原因" value=""></textarea>
                                    <!-- <span class="help-block">6~12字符，允许数字及大小写字母</span> -->
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-8">
                                    <button type="submit" class="btn btn-danger btn-xs submit">提交</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
<script type="text/javascript" src="http://static.yedadou.com/public/supplierAdmin/storeSetting/store_setting.js-delete"></script>
<script type="text/javascript">
    $(document).on('click', 'div[data-click="pass"]', function (e) {
        $('#dispass_reason').hide();
            return confirm('您确定审核通过吗？');
    })

    $(document).on('click', 'div[data-click="dispass"]', function (e) {
        $('#dispass_reason').show();
    })
//    $(document).on('click', '.submit', function(e){
//        General.stopEvent(e);
//        var url = $(this).data('url');
//        window.location.href = url;
//    })
</script>
</body>
</html>
