<?php
/**拼团记录页面
 * Created by PhpStorm.
 * User: lait
 * Date: 2016/1/22 0022
 * Time: 19:42
 */
?>


<!DOCTYPE html>
<!-- saved from url=(0041)http://vendor.yedadou.com/UserCenter/Fans -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>拼团记录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css">
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
                    <li class="">
                        <a  href="/yiyuan/pintuan/admin/product/productList/get">商品列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#">拼团记录</a>
                    </li>
                </ul>

                <div class="tab-content no-border padding-0 pt10">
                    <div id="tab1" class="tab-pane active">
                        <!--表格-->
                        <!--顶部工具条-->
                        <div class="table-head-toolbar clearfix">
                            <!-- <form method="post" action="" >
                                <div class="pull-right clearfix">
                                    <div class="pull-left">
                                        <label>
                                            <input type="text" placeholder="商品名称/关键字">
                                        </label>
                                    </div>
                                    <div class="input-group search-width pull-right">
                                        <input type="text" placeholder="商品编码">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-info btn-sm">
                                            <i class="ace-icon fa fa-search bigger-110"></i>
                                                搜索
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <input type="hidden" name="checkedIds" id="checkedIds" value="">
                            </form> -->
                        </div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
                            <thead>
                            <tr>
                                <th class="center" width="100">拼团ID</th>
                                <th class="center" width="500">商品名称</th>
                                <th class="center" width="300">商品ID</th>
                                <th class="center" width="250">参团人数</th>
                                <th class="center" width="250">状态</th>
                                <th class="center" width="300">揭晓时间</th>
                                <th class="center" width="300">中奖者</th>
                                <th class="center" width="300">购买明细</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!--data-id表示该行数据的ID-->
                            <?php if($data){ foreach($data as $v): ?>
                            <tr id="row-1" data-id="oIIZ6s3zp-ZCdiEHiDI6GjGA6hc0" data-uid="1" data-authid="84bf1+uJ62Yry4B1BgFwhWxTyHAdGLvTZbHIgAoJ">
                                <td class="center">
                                    <?php echo $v['id']?>
                                </td>
                                <td class="" valign="middle">
                                    <span><?php echo $v['goods_title']?></span>
                                </td>
                                <td class="center"><?php echo $v['pt_goods_id']?></td>
                                <td class="center"><span class="color-orange"><?php echo $v['join_num']?></span>/<span><?php echo $v['player_num']?></span></td>
                                <td class="center">
                                    <?php
                                            switch($v['status']){
                                            case -1;
                                                $status='失败';
                                                break;
                                            case 0;
                                                $status='未开始';
                                                break;
                                            case 1;
                                                $status='进行中';
                                                break;
                                            default:
                                                $status='拼团成功';

                                        }
                                        echo $status;
                                    ?>
                                </td>
                                <td class="center">
                                    <?php
                                    switch($v['status']){
                                        case 0;
                                            $status="<span class='color-orange'>未开始...</span>";
                                            break;
                                        case 1;
                                            $status="<span class='color-orange'>进行中...</span>";
                                            break;
                                        default:
                                            $time=date('Y-m-d H:i:s',$v['end_time']);
                                            $status="<span>{$time}</span>";

                                    }

                                    echo $status;
                                    ?>



                                </td>
                                <td class="center">
                                    <?php
                                        if($v['status']==2 || $v['status']==3){
                                            $value="{$v['hit_nick']}({$v['hit_uid']})";
                                            echo $value;
                                        }else{
                                            echo "--";
                                        }

                                    ?>
                                </td>
                                <td class="center">
                                    <a href="/yiyuan/pintuan/admin/record/inRecord/get?tid=<?php echo $v['id']?>" class="pass line-h-15" >查看</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php }else{echo "没有记录";} ?>
                            </tbody>
                        </table>
                        <!--底部工具条-->
                        <div class="table-foot-toolbar clearfix"></div>
                        <!--表格结束-->
                        <?=$pageBtnsHtml;?>
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

<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
<script type="text/javascript">
    General.initCheckbox();
</script>
</body>
</html>
