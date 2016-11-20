    <!DOCTYPE html>
<!-- saved from url=(0041)http://vendor.yedadou.com/UserCenter/Fans -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>订单列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css">
    <style type="text/css">
        .mg-b-10 {
            margin-bottom: 10px;
        }
        .color-orange {
            color:rgb(225, 100, 119);
        }
        .line-h-15  {
            line-height: 15px;
        }
        .item > span {
            margin-right: 10px;
        }
        label {
            float: left;
        }
        .short {
            max-width: 560px;
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
                            <a href="/yiyuan/pintuan/admin/order/orderList">订单列表</a>
                        </li>
                        <li class="active">
                            <a data-toggle="tab" href="javascript:void(0);">订单详情</a>
                        </li>
                    </ul>

                    <div class="tab-content no-border padding-0 pt10">
                        <div id="tab1" class="tab-pane active">
                            <div class="well">
                                <div class="clearfix">
                                    <label for=""><strong>商品ID：</strong></label>
                                    <div>
                                        <?php echo val($tuan, 'pt_goods_id', '--'); ?>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>商品标题：</strong></label>
                                    <div>
                                        <?php echo val($tuan, 'goods_title', '--'); ?>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>拼团ID：</strong></label>
                                    <div>
                                        <?php echo val($tuan, 'id', '--'); ?>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>人数：</strong></label>
                                    <div>
                                        <?php echo val($tuan, 'join_num', '--'); ?>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>参与人员：</strong></label>
                                    <div class="item">
                                        <?php if (!empty($joins)) foreach ($joins as $val):; ?>
                                            <span <?php echo $val['order_sn'] == $tuan['hit_order_sn'] ? 'class="color-orange"' : ''; ?>><?php
                                                echo $val['nick'], '（', $val['uid'], '）'; 
                                            ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>状态：</strong></label>
                                    <div>
                                        <?php 
                                            switch ($tuan['status']) {
                                                case -1:
                                                    echo '失败';
                                                    break;                                                
                                                case 0:
                                                    echo '未开始';
                                                    break;                                                
                                                case 1:
                                                    echo '已开始';
                                                    break;                                                
                                                case 2:
                                                    echo '成功';
                                                    break;                                                
                                                case 3:
                                                    echo '已发货';
                                                    break;                                                
                                                default:
                                                    echo '--';
                                                    break;
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>中奖人：</strong></label>
                                    <div>
                                        <span class="color-orange"><?php echo val($tuan, 'hit_nick', '--'); ?></span>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>揭晓时间：</strong></label>
                                    <div>
                                        <?php echo date('Y-m-d H:i:s', val($tuan, 'end_time', 0)); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="well">
                                <div class="clearfix">
                                    <label for=""><strong>购买者ID：</strong></label>
                                    <div>
                                        <?php echo val($join, 'uid', '--'); ?>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>购买时间：</strong></label>
                                    <div>
                                        <?php echo date('Y-m-d H:i:s', val($join, 'join_time', 0)); ?>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>支付金额：</strong></label>
                                    <div>
                                        <?php echo val($join, 'user_price', '--'); ?>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>购买者昵称：</strong></label>
                                    <div>
                                        <?php echo val($join, 'nick', '--'); ?>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>状态：</strong></label>
                                    <div class="">
                                        <span class="color-orange"><?php echo $join['hit'] == 1 ? '中奖' : '未中奖'; ?></span>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>收件人：</strong></label>
                                    <div>
                                        <?php echo val($info, 'consignee', '--'); ?>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>手机号码：</strong></label>
                                    <div>
                                        <span class=""><?php echo val($info, 'phone', '--'); ?></span>
                                    </div>
                                </div>
                                <div  class="clearfix">
                                    <label for=""><strong>收货地址：</strong></label>
                                    <div>
                                        <?php
                                            $address = [];
                                            $address[] = val($info, 'province', '--');
                                            $address[] = val($info, 'city', '--');
                                            $address[] = val($info, 'street', '--');
                                            $address[] = val($info, 'address', '--');
                                            echo join(' ', $address);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php if ($tuan['hit_order_sn'] == $orderSn):; ?>
                            <div class="well short">
                                <?php if ($join['order_status'] == 2) { ?>
                                <form action="/yiyuan/pintuan/admin/order/shipped" method="post">
                                    <input type="hidden" name="orderSn" value="<?php echo $tuan['hit_order_sn']; ?>" />
                                    <div  class="clearfix mg-b-10">
                                        <label for=""><strong>订单状态：</strong></label>
                                        <div>待发货</div>
                                    </div>
                                    <div  class="clearfix">
                                        <label for=""><strong>物流公司：</strong></label>
                                        <div class="input-group">
                                            <select id="express" name="express" class="form-control" style="width:150px;">
                                            <?php echo $kuaidiOptions; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div  class="clearfix">
                                        <label for=""><strong>快递单号：</strong></label>
                                        <div class="input-group">
                                            <input type="text" name="invoice" class='form-control' placeholder="" style="width:150px;">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <button class="btn btn-info btn-sm">发货</button>
                                    </div>
                                </form>
                                <?php } else if ($join['order_status'] > 2) { ?>
                                <form action="/yiyuan/pintuan/admin/order/shipped/update" method="post">
                                    <input type="hidden" name="orderSn" value="<?php echo $tuan['hit_order_sn']; ?>" />
                                    <div  class="clearfix mg-b-10">
                                        <label for=""><strong>订单状态：</strong></label>
                                        <div>
                                            <?php
                                                switch ($join['order_status']) {
                                                    case 2:
                                                        echo '待发货';
                                                        break;
                                                    case 3:
                                                        echo '已发货';
                                                        break;
                                                    case 4:
                                                        echo '已退款';
                                                        break;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div  class="clearfix">
                                        <label for=""><strong>物流公司：</strong></label>
                                        <div class="input-group">
                                            <select id="express" name="express" class="form-control" style="width:150px;">
                                            <?php echo $kuaidiOptions; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div  class="clearfix">
                                        <label for=""><strong>快递单号：</strong></label>
                                        <div class="input-group">
                                            <input type="text" name="invoice" class='form-control' placeholder="" value="<?php echo isset($logistics['invoice']) ? $logistics['invoice'] : ''; ?>" style="width:150px;">
                                        </div>
                                    </div>
                                    <div class="input-group" style="padding-top: 10px;">
                                        <button class="btn btn-info btn-sm">更改发货信息</button>
                                        <!-- <input value="更改发货信息" type="button" id="changeFa"> -->
                                        <a href="/yiyuan/pintuan/admin/order/Logistics?invoice=<?php echo isset($logistics['invoice']) ? $logistics['invoice'] : ''; ?>">查看物流</a>
                                    </div>
                                </form>
                                <?php }; ?>
                            </div>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>
                <!--内容结束-->
            </div>
        </div>
    </div>

    <script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
    <script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
    <script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
    <script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
    <script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
    <script type="text/javascript">
        $(function () {
            General.extendDialog(); //扩展对话框
            General.initCheckbox();
        })
    </script>
</body>
</html>