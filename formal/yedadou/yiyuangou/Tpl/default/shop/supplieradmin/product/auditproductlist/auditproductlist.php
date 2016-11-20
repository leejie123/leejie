<?php
/**
 * Created by PhpStorm.
 * User: lait
 * Date: 2016/1/7 0007
 * Time: 15:23
 */
?>

<!DOCTYPE html>
<!-- saved from url=(0041)http://vendor.yedadou.com/UserCenter/Fans -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>待审核列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="http://static.yedadou.com/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css">
    <style type="text/css">
        .color-orange {
            color:rgb(225, 100, 119);
        }
        .line-h-15	{
            line-height: 15px;
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
                    <li class="active">
                        <a data-toggle="tab" href="http://vendor.yedadou.com/UserCenter/Fans#tab1">待审核列表</a>
                    </li>
                </ul>

                <div class="tab-content no-border padding-0 pt10">
                    <div id="tab1" class="tab-pane active">
                        <!--表格-->
                        <!--顶部工具条-->
                        <div class="table-head-toolbar clearfix">
                            <form method="get" action="get" >
                                <!--<button class="btn btn-info btn-sm" id="sureAdd" type="submit"><i class="ace-icon fa fa-plus"></i> 确认添加</button>-->
                                <div class="pull-right clearfix">
                                    <div class="pull-left">
                                        <label>
                                            <input type="text" name="name" placeholder="商品名称/商品编码">
                                        </label>
                                    </div>
                                    <div class="input-group search-width pull-right">
                                        <select class="form-control" name="state">
                                            <option value="">全部</option>
                                            <option value="1">审核中</option>
                                            <option value="-1">审核不通过</option>
                                        </select>
												<span class="input-group-btn">
													<button type="submit" class="btn btn-info btn-sm">
                                                        <i class="ace-icon fa fa-search bigger-110"></i>
                                                        搜索
                                                    </button>
												</span>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
                            <thead>
                            <tr>
                                <th class="center" width="140">
                                    <form method="post" action="post" >
                                        <!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
                                        <input type="hidden" name="checkedIds" id="checkedIds" value="">

                                        <label class="pos-rel">
                                            <input id="check-all" type="checkbox" class="ace">
                                            <span class="lbl"></span>
                                        </label>
                                        <button type="submit" class="btn btn-info btn-sm">

                                            删除
                                        </button>
                                    </form>
                                </th>
                                <!-- <th class="center" width="60">用户ID</th> -->
                                <!-- <th class="center" width="200">头像</th> -->
                                <th class="center" width="500">商品名称</th>
                                <!-- <th class="center" width="100">门店ID</th> -->
                                <!-- <th class="center" width="250">门店名称</th> -->
                                <th class="center" width="100">供货价</th>
                                <th class="center" width="100">参考销售价</th>
                                <th class="center" width="100">运费模板</th>
                                <th class="center" width="100">库存</th>
                                <th class="center" width="250">审核状态</th>
                                <th class="center" width="300">说明</th>
                                <th class="center" width="300">操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!--data-id表示该行数据的ID-->
                            <?php if($data): foreach($data as $v):?>
                            <tr id="row-1" data-id="<?php echo $v['id'];?>" data-uid="1" data-authid="84bf1+uJ62Yry4B1BgFwhWxTyHAdGLvTZbHIgAoJ" >
                                <td class="center">
                                    <label class="pos-rel">
                                        <input name="check-row" data-click='select' type="checkbox" class="ace" value="<?php echo $v['id'];?>">
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <!-- <td class="center" valign="middle"><span>1</span><span class="label label-success"></span>
                                </td> -->
                                <!-- <td class="center">
                                    <img src="46(1)" class="table-image">
                                </td> -->
                                <td class="" valign="middle">
                                    <img src="<?php echo $v['img']?>" class="table-image pull-left">
                                    <div style="margin-left:70px;">
                                        <a href="#"><?php echo $v['title']?></a>
                                        <span style="display:block">商家编码：<?php echo $v['code']?>	</span>
                                    </div>
                                </td>
                                <!-- <td class="center color-orange">005</td> -->
                                <!-- <td class="center">
                                    广州天河区旗舰店
                                </td> -->
                                <td class="center color-orange"><?php echo $v['cost_price']?></td>
                                <td class="center color-orange"><?php echo $v['market_price']?></td>
                                <td class="center color-orange"><?php echo $v['freight']?></td>
                                <td class="center color-orange"><?php echo $v['stock']?></td>
                                <td class="center"><?php echo $v['state']==='0'?'审核中':'审核不通过' ?></td>
                                <td class="center"><?php echo $v['state_desc']?></td>
                                <td class="center">
                                    <a href="<?php echo $v['id']?>" class="pass line-h-15" data-id="pass">编辑</a>
                                    <!-- <a href="#" class="dispass line-h-15" data-id="dispass ">不通过</a> -->
                                </td>
                            </tr>
                            <?php endforeach;endif; ?>
                            </tbody>
                        </table>
                        <!--底部工具条-->

                        <div class="table-foot-toolbar clearfix"></div>
                        <?=$pageBtnsHtml?>
                        <!--表格结束-->

                    </div>
                </div>
            </div>
            <!--内容结束-->
        </div>
    </div>
</div>

<a href="http://vendor.yedadou.com/UserCenter/Fans#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
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


<!--对话框-->
<div id="dialog-edit" class="hide">
</div>
<script src="fans.js"></script>
<script type="text/javascript" src="examin.js"></script>

<script src="http://static.yedadou.com/public/assets/js/jquery.js"></script>
<script src="http://static.yedadou.com/public/assets/js/bootstrap.js"></script>
<script src="http://static.yedadou.com/public/assets/js/jquery-ui.js"></script>
<script src="http://static.yedadou.com/public/assets/js/ace/ace.js"></script>
<script src="http://static.yedadou.com/public/admin/js/common/common.js"></script>
<script type="text/javascript">
//    $(function() {
//
//        init_checkbox()
//
//
//        /**
//         * 更新已被选中的行ID
//         */
//         function update_id() {
//            var ids = [];
//            var id;
//            $('input[type=checkbox][name=check-row]:checked').each(function(index, element) {
//                id = $(this).closest("tr").attr("data-id");
//                ids.push(id);
//            });
//            try {
//                if ($("#addToGroup").length > 0) {
//                    if (ids.length > 0) {
//                        $("#addToGroup").removeAttr("disabled");
//                    } else {
//                        $("#addToGroup").attr("disabled", "disabled");
//                    }
//                }
//            } catch (e) {
//                Common.log(e);
//            }
//            $("#checkedIds").val(ids.join(","));
//        }
//
//    })
//     function init_checkbox() {
//        //点击"全选"复选框
//        $("#check-all").on("click", function(e) {
//            $('input[type=checkbox][data-click=select]').prop('checked', $(this).prop('checked'));
//                update_id();
//            });
//            $("input[type=checkbox][data-click=select]").on("click", function(e) {
//                update_id();
//            });
//            try {
//                if ($("#addToGroup").length > 0) {
//                    $("#addToGroup").attr("disabled", "disabled");
//                }
//            } catch (e) {
//                Common.log(e);
//            }
//        }
General.initCheckbox();

</script>
</body>
</html>
