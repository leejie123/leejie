<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>订单列表</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/datepicker.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/admin/css/order/shop/list.css"
        />
        <style>
        .point{
            cursor: pointer;
            color:#00D5FF;
        }
        .toolbar{
            margin-top: 10px;
        }
        </style>
    </head>
    <body class="no-skin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <!--内容开始-->
                    <!--表格-->
                    <div>
                        <!--顶部工具条-->
                        <div class="table-head-toolbar clearfix">
                            <form id="form1" name="form1" method="get" action="" >
                                <div class="pull-left">
                                    <a target="_blank" id="export" name="export" class="btn btn-info btn-sm" herf="#" data-url="/shop/supplierAdmin/SupplierOrder/ExportSupplierOrder">导出所选订单</a>
                                    <a target="_blank" id="exportAll" name="exportAll" class="btn btn-info btn-sm" href="/shop/supplierAdmin/SupplierOrder/ExportSupplierOrder?<?= $export; ?>">导出所有</a>
                                </div>
                                <div class="pull-right">
                                    <!--除了已退款状态下显示-->
                                    <div class="pull-left span-label" id="returnShowLabel">下单日期:</div>
                                    <!--已退款状态下显示-->
                                    <div class="pull-left span-label hide" id="normalShowLabel">申请日期:</div>
                                    <div class="input-group input-daterange pull-left">
                                        <input id="startTime" name="startTime" value="<?= get('startTime', '', 'strip_tags,trim'); ?>" type="text" class="form-control" />
                                        <span class="input-group-addon">
                                        <i class="fa fa-exchange"></i>
                                    </span>
                                        <input id="endTime" name="endTime" type="text" value="<?= get('endTime', '', 'strip_tags,trim'); ?>" class="form-control" />
                                    </div>
                                    <input id="order_sn" name="orderSn" type="text" value="<?= get('orderSn', '', 'strip_tags,trim'); ?>" placeholder="订单号" />
                                    <button type="submit" class="btn btn-info btn-sm">
                                        <span class="ace-icon fa fa-search"></span>搜索
                                    </button>
                                </div>
                                <!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
                                <!--input type="hidden" name="issearch" id="issearch" value="1" /-->
                                <input type="hidden" name="type" value="<?= $type; ?>" />
                                <input type="hidden" name="orderSns" id="checkedIds" value="" />
                            </form>
                        </div>
                        <!--订单列表-->
                        <div>
                            <div class="panel-heading">
                            <div class="toolbar">
                                <label class="pos-rel">
                                    <input id="check-all" type="checkbox" class="ace">
                                    <span class="lbl"></span>
                                </label>
                                <span>
                                    共找到 <?= $count; ?> 个订单条
                                </span>
                            </div>
                            <?php if ($type == 2):; ?>                                              
                            <div class="right">
                                <a id="import" class="btn btn-info btn-sm" href="javascript:void(0)">批量发货</a>   
                            </div>                  
                            <?php endif; ?>
                            <!--单个订单开始-->
                            <?php if (!empty($orders)):; ?>
                            <?php foreach ($orders as $order):?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <label class="pos-rel">
                                        <input name="check-row" type="checkbox" class="ace" data-id="<?= $order['order_sn']; ?>">
                                        <span class="lbl"></span>
                                    </label>
                                    <span class="order-number">订单编号：<?= $order['order_sn']; ?></span>
                                    <span class="order-time">订单时间：<?= date("Y-m-d H:i:s",$order['create_time']); ?></span>
                                    <div class="pull-right">
                                    <?php if ($order['status'] ==2 && $order['refund_status'] == 0):; ?>
                                        <a data-parame="orderId=<?= $order['id']; ?>&orderSn=<?= $order['order_sn']?>&type=<?= $type; ?>" class="btn btn-info btn-xs" data-id="send">发货</a>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <table class="table table-bordered table-vertical-middle">
                                    <tbody>
                                        <tr data-id="<?= $order['order_sn']; ?>">
                                           <!--  <td class="column1" width="20">
                                                <input name="exportCheck" type="checkbox" class="ace" value="<?= $order['order_sn']; ?>">
                                                <span class="lbl"></span>
                                            </td> -->
                                            <td class="column1" width="500">
                                                <?php foreach ($order['items'] as $item):; ?>
                                                <table>
                                                    <tbody>
                                                        <tr class="">
                                                            <td class="product-image">
                                                                <div class="middle-outer ">
                                                                    <div class="middle-inner">
                                                                        <a href="#">
                                                                            <img src="<?= $item['pic_url']; ?>_80x80.jpg">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-left product-detail">
                                                                <div class="middle-outer ">
                                                                    <div class="middle-inner">
                                                                        <div class="product-name">
                                                                            商品名称:<?= $item['title']; ?>
                                                                        </div>
                                                                        <div class="model">
                                                                            型号规格:<?= $item['spec']; ?>
                                                                        </div>
                                                                        <div class="serial-number">
                                                                            商品编码:<?= $item['goods_id']; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="quantity">
                                                                <div class="middle-outer">
                                                                    <div class="middle-inner">
                                                                        数量:<?= $item['quantity']; ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="money">
                                                                <div class="middle-outer">
                                                                    <div class="middle-inner">
                                                                        <?= $item['price']; ?>元
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <?php endforeach; ?>
                                            </td>
                                            <td class="column2">
                                                <div class="middle-outer">
                                                    <div class="middle-inner">
                                                        <div class="receive-member">
                                                            收货人：<?= val($order['info'], 'consignee'); ?>
                                                        </div>
                                                        <div class="phone-number">
                                                            <?= val($order['info'], 'phone'), val($order['info'], 'tel'); ?>
                                                        </div>
                                                        <div class="address">
                                                            <?= val($order['info'], 'province'), val($order['info'], 'city'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column3">
                                                <div class="middle-outer">
                                                    <div class="middle-inner">
                                                        <div class="state">
                                                            <?= App\Mod\SupplierOrder::parseOrderStatus($order['status'], $order['refund_status'], $order['create_time']); ?>
                                                        </div>
                                                        <div class="detail">
                                                            <a href="/shop/supplierAdmin/SupplierOrder/SupplierOrderDesc?orderSn=<?= $order['order_sn']; ?>" class="blue" data-id="detail">订单详情</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column4">
                                                <div class="middle-outer">
                                                    <div class="middle-inner">
                                                        <div class="total">
                                                            <?php 
                                                                $sum = 0;
                                                                foreach ($order['items'] as $item) {
                                                                    $sum += $item['quantity'] * $item['price'];
                                                                }
                                                                echo $sum + $order['freight_fee'];
                                                            ?>元
                                                        </div>
                                                        <div class="freight">
                                                            （含运费<?= $order['freight_fee']; ?>元）
                                                        </div>
                                                        <!--待付款和待发货状态没有查看物流按钮,其它状态都有该按钮btn btn-info btn-xs showExpressSome-->
                                                        <div class="logistics">
                                                            <?php if ($order['info']['express_name'] != '' && $type == 3):; ?>
                                                            <a data-q="com=<?= $order['info']['express_name']; ?>&nu=<?= $order['info']['invoice']; ?>" class="point showExpressSome new-color">查看物流</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php if ($type == 7):; ?>
                                            <td class="column4">
                                                <div class="middle-outer">
                                                    <div class="middle-inner">
                                                    <?=  App\Mod\SupplierOrder::parseAfterSaleStatus($order['refund_status']); ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php endif; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php endforeach; ?>

                            <?php else:?>

                            <?php endif; ?> 
                            <!--单个订单结束-->
                        </div>
                        <!--底部工具条-->
                        <div class="clearfix">
                            <!--<div class="pull-left">总计2条,当前显示第1到2条</div>-->
                            <?= $pageHtml; ?>
                        </div>
                    </div>
                    <!--表格结束-->
                    <div class="space"></div>
                    <!--内容结束-->
                </div>
            </div>
        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
        
        <!--对话框-->
        <div id="modalDialog" class="dialog-content hide">
            <div class="loading-bg"><div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div></div>
            <iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>                                               
        </div>
        <!--对话框-->
        <div id="dialog-edit" class="hide">
        </div>
        <script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datepicker.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
        <script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
        <script type="text/javascript">
        /******************** 
            作用:订单列表
            作者:蔡俊雄
            版本:V1.0
            时间:2015-07-27
        ********************/

        $(function() {
            General.extendDialog();
            $('.input-daterange').datepicker({autoclose:true});
    
            //发货
            $("a[data-id='send']").click(function(e){
                $parame=$(this).attr('data-parame');
                console.log($parame);
                //弹出发货填写窗口
                var url='/shop/supplierAdmin/SupplierOrder/SupplierOrderShipped?'+$parame;
                var title="填写发货信息";
                General.showDialogWidthHeight(title,url,600,200);
                /*
                var url=$(this).attr('href');
                //location.href =url;
                var data={};
                if(url!=''){
                    Common.ajaxPostWantResult(url,data,'发货',window);
                }*/
                General.stopEvent(e);
            });

            //查看物流
            $('.showExpressSome').click(function(e){
                var q=$(this).data('q');
                console.log(q);
                General.showDialog('查看物流',"http://www.kuaidi100.com/chaxun?"+q);
            });
                    
            $("#import").click(function(){
                var title =  '导入订单';
                var url = '/shop/supplierAdmin/SupplierOrder/SupplierOrderBatchShipped'
                showImportDialog(title,url);
            });

            /**
             * 显示"导入"窗口
             * @param {String} title 弹出窗口的标题
             */
            function showImportDialog(title,url){
                General.showDialogWidthHeight(title,url,500,300);
            }

            /**
             * 退款
             */
            $("a[data-id='refund']").click(function(e){
                var url=$(this).attr('href');
                var msg='是否真的要退款吗';
                var title='真的吗？';
                var okFun=function(data){
                    var data={};
                    if(url!=''){
                        Common.ajaxPostWantResult(url,data,'',window);
                    }
                };
                var cancelFun=function(){};
                var data=url;
                General.confirm(msg, title, okFun, cancelFun, data);
                //
                General.stopEvent(e);
            });

            /**
             * 退款
             */
            $("a[data-id='close']").click(function(e){
                var url=$(this).attr('href');
                var msg='是否真的要关闭售后吗';
                var title='真的吗？';
                var okFun=function(data){
                    var data={};
                    if(url!=''){
                        Common.ajaxPostWantResult(url,data,'',window);
                    }
                };
                var cancelFun=function(){};
                var data=url;
                General.confirm(msg, title, okFun, cancelFun, data);
                //
                General.stopEvent(e);
            });

            /**
             * 导出所选
             */
            General.initCheckbox();
            $("#form1 a[name='export']").click(function (e) {
                General.stopEvent(e);   
                var url = $(this).data('url');
                var startTime = $('#startTime').val();
                var endTime = $('#endTime').val();
                var order_sn = $('#order_sn').val();
                var consignee = $('consignee').val();
                var okFun = function () {
                    var data = {};
                    if (startTime) {
                        data.startTime = startTime;
                    }
                    if (endTime) {
                        data.endTime = endTime;
                    }
                    if (order_sn) {
                        data.order_sn = order_sn;
                    }
                    if (consignee) {
                        data.consignee = gosignee;
                    }
                    data.id = $('#checkedIds').val();
                    if (url != '') {
                        Common.ajaxPostWantResult(url, data, '', window);
                    }
                };
                var cancelFun = function() {alert(1)};

                General.confirm('您确定要导出订单吗？', '导出所选订单', okFun, cancelFun)
            });
        });


        //-----------------表格中的复选框操作-----------------
        /**
         * 初始化表格中的复选框事件监听
         */
        General.initCheckbox = function() {
            //点击"全选"复选框
            $("#check-all").on("click", function(e) {
                $('input[type=checkbox][name=check-row]').prop('checked', $(this).prop('checked'));
                General.updateCheckedIds();
            });
            $("input[type=checkbox][name=check-row]").on("click", function(e) {
                General.updateCheckedIds();
            });
            try {
                if ($("#addToGroup").length > 0) {
                    $("#addToGroup").attr("disabled", "disabled");
                }
            } catch (e) {
                Common.log(e);
            }
        }

        /**
         * 更新已被选中的行ID
         */
        General.updateCheckedIds = function() {
            var ids = [];
            var id;
            $('input[type=checkbox][name=check-row]:checked').each(function(index, element) {
                id = $(this).attr("data-id");
                ids.push(id);
            });
            try {
                if ($("#addToGroup").length > 0) {
                    if (ids.length > 0) {
                        $("#addToGroup").removeAttr("disabled");
                    } else {
                        $("#addToGroup").attr("disabled", "disabled");
                    }
                }
            } catch (e) {
                Common.log(e);
            }
            $("#checkedIds").val(ids.join(","));
        }
        </script>
    </body>

</html>