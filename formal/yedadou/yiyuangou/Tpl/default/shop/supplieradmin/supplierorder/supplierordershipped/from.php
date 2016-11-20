<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>填写发货信息</title>
        <meta name="iewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
    </head>

    <body class="no-skin">
        <link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/product/category/add.css" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <!--内容开始-->
                    <form method="post" action=""  data-submit="auto">
                    
                        <div class="form-group">
                            <div class="label-wrapper">
                                <label class="" for="express_name"><strong>快递名称：</strong></label>
                            </div>
                            <div class="control-wrapper short">
                                <select id="express_name" name="express_name" type="text" class="form-control">
                                  <?= $kuaidiOptions; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="label-wrapper">
                                <label class="" for="invoice"><strong>快递单号：</strong></label>
                            </div>
                            <div class="control-wrapper short">
                                <input id="invoice" name="invoice" type="text" class="form-control" value="" placeholder="" />
                            </div>
                        </div>
                        <div class="space"></div>
                        <div class="button-panel">
                            <button type="submit" class="btn btn-info btn-sm btn-space-right" data-href="/shop/supplierAdmin/SupplierOrder/SupplierOrderShipped?orderId=<?= $orderId; ?>&orderSn=<?= $orderSn; ?>&type=<?= $type; ?>" data-action="submit" data-refresh="parent" data-mask="parent"><i class='ace-icon fa fa-check'></i> 发货</button>
                            <button id="cancel" type="button" class="btn btn-danger btn-sm" data-action="close"><i class='ace-icon fa fa-times'></i> 取消</button>
                        </div>
                    </form>
                    <!--内容结束-->
                </div>
            </div>
        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>

        <script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
        <script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
        <script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
        <script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
    </body>

</html>