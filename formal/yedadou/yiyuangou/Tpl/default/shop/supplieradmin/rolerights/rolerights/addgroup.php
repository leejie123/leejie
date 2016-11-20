<?php
/**
 * Created by PhpStorm
 * User: lait
 * Date: 2016/1/5 0005
 * Time: 11:26
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
    <style type="text/css">
        .mr20 {
            margin-right: 20px;
        }

        /*reset*/
        .form-horizontal .control-label {
            padding-top: 0px;
        }
    </style>
</head>

<body class="no-skin">

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <!--内容开始-->
            <div class="tabbable">
                <ul class="nav nav-tabs padding-12 tab-color-blue">
                    <li>
                        <a href="get">账号权限</a>
                    </li>

                    <li class="active">
                        <a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-plus"></i> 新增角色</a>
                    </li>
                </ul>

                <div class="tab-content no-border padding-0 pt10">
                    <div id="tab1" class="tab-pane active pt10">
                        <form class="form-horizontal" method="post" action="add" enctype="multipart/form-data">
                            <!--LBS回复-->
                            <div class="panel panel-default">
                                <div class="panel-heading">新增角色</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" for="sceneName"><strong>角色名称</strong></label>
                                        <div class="col-xs-12 col-sm-6 col-md-8">
                                            <input id="sceneName" name="name" type="text" class="form-control" placeholder="请输入角色的名称" value="">
													<span class="help-block">6~12字符，允许数字及大小写字母
													</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" id=""  for="keyword"><strong>角色权限：</strong></label>
                                    </div>
                                    <?php $a=0; foreach($data as $v):?>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" id=""  for="keyword"><strong></strong></label>
                                        <div class="col-xs-12 col-sm-6 col-md-8">
                                            <label class="pos-rel mr20 item">
                                                <input name="rights[<?php echo $a++ ?>]" type="checkbox" id="mdmgr-check-all" class="ace" value="<?php echo $v['id']?>">
                                                    <span class="lbl"> <strong><?php echo $v['text']?></strong></span>
                                            </label>
                                            <?php   foreach($v['child'] as $value):?>
                                            <label class="pos-rel mr20">
                                                <input name="rights[<?php echo $a++ ?>]" data-slect="<?php echo $v['id']?>" type="checkbox" class="ace" value="<?php echo $value['id']?>">
                                                <span class="lbl"><?php echo $value['text']?></span>
                                            </label>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <button class="btn btn-info"  type="submit"><i class="ace-icon fa fa-check"></i> 提交</button>
                            <button class="btn btn-danger" data-url="get" id="submitBtn" type="submit"><i class="ace-icon fa fa-check"></i> 取消</button>
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
<script type="text/javascript">
    //-----------------选择-----------------
    var character_limit = {
        data:[],
        initCheckbox_ : function(parentCheck, name) {
            // $(parentCheck).on('click', function(e) {
                $('input[type=checkbox][data-slect=' + name + ']').prop('checked', $(parentCheck).prop('checked'));
                character_limit.updateCheckIds(name);
            // })
            $('input[type=checkbox][data-slect='+ name +']').on('click', function(e) {
                character_limit.updateCheckIds(name);
                var checkbox = $('input[data-slect=' + name + ']');
                var checkedbox = $('input[data-slect=' + name + ']:checked');
                var uncheckedbox = checkbox.length - checkedbox.length;

                if (uncheckedbox) {
                    $(this).closest('.form-group').find('.item >input').prop('checked', false);
                } else {
                    $(this).closest('.item').find('input').attr('checked', 'checked');
                }
            })
        },
        updateCheckIds : function(name) {
            character_limit.data[name] = [];
            character_limit.data['characterName'] = $('#sceneName').val();
            var checkedbox = $('input[name=' + name + ']:checked');
            $.each(checkedbox, function(index, value) {
                (character_limit.data[name]).push($(value).val());
                // $(this).closest('label').siblings().prop('checked', !$(this).prop('checked'))
            })
        }
    }


    var item_input = $('.item');
    $(item_input).find('input').on('click', function () {
        var that = this;
        var name = $(this).attr('value');
        character_limit.initCheckbox_(that, name)
    })
    // character_limit.initCheckbox_('smgr-check-all', 'spgl');
    // character_limit.initCheckbox_('mdmgr-check-all', 'mdgl');
    // character_limit.initCheckbox_('ddmgr-check-all', 'ddgl');
    // character_limit.initCheckbox_('xsmgr-check-all', 'xsgl');
    // character_limit.initCheckbox_('dnmgr-check-all', 'ddgl');
    // character_limit.initCheckbox_('mdmgr-check-all', 'mdgl');
    // character_limit.initCheckbox_('xtmgr-check-all', 'xtmgr');
    // character_limit.initCheckbox_('cwjs-check-all', 'cwjs');
    $('#submitBtn').on('click', function(e) {
        General.stopEvent(e);
        var url = $(this).data('url');
        window.location.href = url;
        console.log(character_limit.data);
    })

</script>
</body>

</html>
