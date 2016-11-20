<?php
/**参团明细
 * Created by PhpStorm.
 * User: lait
 * Date: 2016/1/23 0023
 * Time: 14:18
 */
?>


<!DOCTYPE html>
<!-- saved from url=(0041)http://vendor.yedadou.com/UserCenter/Fans -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>参与明细</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css">
    <style type="text/css">
        .color-orange {
            color:rgb(225, 100, 119);
        }
        .line-h-15	{
            line-height: 15px;
        }
        .item > span {
            margin-right: 10px;
        }
        span > em {
            font-style: normal;
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
                        <a  href="/yiyuan/pintuan/admin/record/recordList/get?id=<?=$tuan['pt_goods_id']?>">拼团记录</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#">参与明细</a>
                    </li>
                </ul>

                <div class="tab-content no-border padding-0 pt10">
                    <div id="tab1" class="tab-pane active">
                        <!--表格-->
                        <!--顶部工具条-->
                        <div class="table-head-toolbar clearfix">
                        </div>
                        <div class="well">
                            <div>
                                <label for=""><strong>商品ID：</strong></label>
                                <?=$tuan['pt_goods_id']?>
                            </div>
                            <div>
                                <label for=""><strong>商品标题：</strong></label>
                                <span><?=$tuan['goods_title']?></span>
                            </div>
                            <div>
                                <label for=""><strong>商品总价格：</strong></label>
                                <span><?=$tuan['goods_price']?></span>
                            </div>
                            <div>
                                <label for=""><strong>拼团ID：</strong></label>
                                <span><?=$tuan['id']?></span>
                            </div>
                            <div>
                                <label for=""><strong>人数：</strong></label>
                                <span><?=$tuan['join_num']?></span>
                            </div>
                            <div class="item">
                                <label for=""><strong>参与人员：</strong></label>
                                <?php if($data){ foreach($data as $v):?>
                                <span <?php echo $v['hit']?"class='color-orange'":'';?>><?php echo $v['nick']?>（<?php echo $v['uid']?>）</span>
                                <?php endforeach;}?>
                            </div>
                            <div class="item">
                                <label for=""><strong>状态：</strong></label>
                                <span>
                                    <?php
                                    switch($tuan['status']){
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
                                </span>
                            </div>
                            <div class="item">
                                <span><strong>中奖人：</strong><em class="color-orange"><?=$tuan['hit_nick']?></em></span>
                                <span>揭晓时间：<?=empty($tuan['end_time'])?'--':date('Y-m-d H:i:s',$tuan['end_time'])?></span>
                            </div>
                        </div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
                            <thead>
                            <tr>
                                <th class="center" width="500">订单号</th>
                                <th class="center" width="500">购买时间</th>
                                <th class="center" width="500">购买者</th>
                                <th class="center" width="500">支付金额</th>
                                <th class="center" width="300">订单状态</th>
                                <th class="center" width="300">是否中奖</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!--data-id表示该行数据的ID-->
                            <?php if($data){ foreach($data as $v): ?>
                            <tr <?php echo $v['hit']?"class='color-orange'":''?> id="row-1" data-id="oIIZ6s3zp-ZCdiEHiDI6GjGA6hc0" data-uid="1" data-authid="84bf1+uJ62Yry4B1BgFwhWxTyHAdGLvTZbHIgAoJ">
                                <td class="center">
                                    <?php echo $v['order_sn']?>
                                </td>
                                <td class="center"><span><?php echo date('Y-m-d H:i:s',$v['join_time']) ?></span></td>
                                <td class="center"><?php echo $v['nick']?>（<?php echo $v['uid']?>）</td>
                                <td class="center">￥<?php echo $v['user_price']?>元</td>
                                <td class="center">
                                    <?php
                                        switch($v['order_status']){
                                            case 1;
                                                $value='未支付';
                                                break;
                                            case 2;
                                                $value=$v['hit']?"已支付,待发货":'已支付';
                                                break;
                                            case 3;
                                                $value="已发货";
                                                break;
                                            case 4;
                                                $value="已退款";
                                                break;

                                        }

                                    echo $value;
                                    ?>
                                </td>
                                <td class="center"><?php echo $v['hit']?'中奖':'否';?></td>
                            </tr>
                            <?php endforeach;}?>
                            </tbody>
                        </table>
                        <!--底部工具条-->
                        <div class="table-foot-toolbar clearfix"></div>
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
<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
</body>
</html>
