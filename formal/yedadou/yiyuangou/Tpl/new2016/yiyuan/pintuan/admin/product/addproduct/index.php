<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>加入拼团商品</title>
        <meta name="iewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
    </head>

    <body class="no-skin">
        <style type="text/css">
            th > input {
                width: 100px;
            }
            .inline{
                display: inline;
            }
        </style>
        <link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap-datetimepicker.css,/admin/css/shop/product/list/add.css" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <!--内容开始-->
                    <div class="tabbable">
                        <ul class="nav nav-tabs padding-12 tab-color-blue">
                            <li>
                                <a href="/yiyuan/admin/product/productList/get">商品列表</a>
                            </li>
                            <li class="active">
                                <a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-edit"></i> 加入拼团</a>
                            </li>
                        </ul>

                        <div class="tab-content no-border padding-0 pt10">
                            <div id="tab1" class="tab-pane active">
                                <form method="post" action="/yiyuan/pintuan/admin/product/addProduct/add" >
                                    <input type='hidden' value="<?php echo val($info, 'id'); ?> " name='goodsId'/>
                                    <div class="space-2"></div>
                                    <div class="tabbable">
                                        <div class="tab-content padding-0 pt10">
                                            <div id="t1" class="tab-pane active clearfix">
                                                <div class="form-group">
                                                    <div class="label-wrapper">
                                                        <label class="" for="title"><strong>商品排序：</strong></label>
                                                    </div>
                                                    <div class="control-wrapper short">
                                                        <div class="input-group ">
                                                            <input type="text" value="99999" name="sort" id="sort" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="label-wrapper">
                                                        <label class="" for="title"><strong>商品标题：</strong></label>
                                                    </div>
                                                    <div class="control-wrapper short">
                                                            <input type="text" value="<?php echo val($info, 'title'); ?>" name="title" id="title" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="label-wrapper">
                                                        <label class="" for="subTitle"><strong>商品副标题：</strong></label>
                                                    </div>
                                                    <div class="control-wrapper short">
                                                            <input type="text" value="<?php echo val($info, 'sub_title'); ?>" name="subTitle" id="subTitle" class="form-control" placeholder="">
                                                    </div>
                                                </div>


                                                <div class="form-group clearfix">
                                                    <div class="label-wrapper">
                                                        <label class="" for="wx_price"><strong>商品总价：</strong></label>
                                                    </div>
                                                    <div class="control-wrapper short">
                                                        <div class="input-group  pull-left" style="margin-top: 7px;">
                                                            <input type="hidden" name="yiyuanPrice" value="<?php echo val($info, 'price', 0); ?>" />
                                                            <?php echo val($info, 'price', 0); ?>元
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="label-wrapper">
                                                        <label class="" for="price"><strong>拼团价：</strong></label>
                                                    </div>
                                                    <div class="control-wrapper short">
                                                        <div class="input-group ">
                                                            <input type="text" value="" name="price" id="price" class="form-control" placeholder="">
                                                            <span class="input-group-addon">元</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="label-wrapper">
                                                        <label class="" for="commission"><strong>团长奖励：</strong></label>
                                                    </div>
                                                    <div class="control-wrapper short">
                                                        <div class="input-group ">
                                                            <input type="text" value="" name="commission" id="commission" class="form-control" placeholder="">
                                                            <span class="input-group-addon">元</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="label-wrapper">
                                                        <label class="" for="stock"><strong>总库存：</strong></label>
                                                    </div>
                                                    <div class="control-wrapper short">
                                                        <div class="input-group ">
                                                            <input type="text" value="" name="stock" id="stock" class="form-control" placeholder="">
                                                            <span class="input-group-addon">件</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="label-wrapper">
                                                        <label class="" for="maxTurnout"><strong>最多参与人数：</strong></label>
                                                    </div>
                                                    <div class="control-wrapper short">
                                                        <div class="input-group ">
                                                            <input type="text" value="" name="maxTurnout" id="maxTurnout" class="form-control" placeholder="最多设置参与人数500人">
                                                            <span class="input-group-addon">人</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="label-wrapper">
                                                        <label class="" for=""><strong style="display: block;">商品图片：</strong><span  class="font-red" style="float: left;">(单张<2M)<br>尺寸为宽640x高360,注：宽度可以大一些加背景适应不同宽度的手机屏幕。</span></label>
                                                    </div>
                                                    <div class="control-wrapper ">
                                                        <ul class="image-list" id="imageList">
                                                            <?php for($i = 1; $i <= 5; $i++):; ?>
                                                            <li>
                                                                <img id="previewImage<?php echo $i; ?>" class="preview-image" src="<?php echo val($info['imgs'], $i - 1, '{__STATIC_URL__}/public/admin/images/noupload.png'); ?>" >
                                                                <input type="hidden" name="imgList[]" id="imageUrl<?php echo $i; ?>" value="<?php echo val($info['imgs'], $i - 1); ?>" />
                                                                <button class="btn btn-info btn-xs" id="upload<?php echo $i; ?>" type="button">上传</button>
                                                                <button class="btn btn-info btn-xs" id="uploaddel<?php echo $i; ?>" type="button">删除</button>
                                                            </li>
                                                            <?php endfor; ?>
                                                        </ul>
                                                    </div>
                                                </div> 

                                                <div class="form-group">
                                                    <div class="label-wrapper">
                                                        <label class="" for="description"><strong>商品详情：</strong></label>
                                                    </div>
                                                    <div class="control-wrapper long">
                                                        <textarea id="description" name="desc" class="form-control height80" placeholder=""><?php echo htmlspecialchars_decode(val($info, 'desc')); ?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                    <div class="space"></div>
                                    <button class="btn btn-info" id="submitBtn" type="submit"><i class="ace-icon fa fa-save"></i> 保存</button>
                                    <div class="space"></div>
                                </form>
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

        <script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
        <script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
        <script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/date-time/moment.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/date-time/zh-cn.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datetimepicker.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-timepicker.js"></script>
        <script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
        <script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
        <script src="{__STATIC_URL__}/public/js/Sortable.min.js"></script>
        <script type="text/javascript">
            window.kindeditorUpUrl='<?=site_url();?>/yiyuan/common/upLoad';
        </script>
        <script src="{__STATIC_URL__}/public/yiyuan/admin/product/add.js"></script>
 
    </body>

</html>