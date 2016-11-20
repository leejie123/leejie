<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>管理供货商</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
</head>

<body class="no-skin">
<link rel="stylesheet" href="{__STATIC_URL__}/public??/js/kindeditor/themes/default/default.css,/admin/css/shop/store/list/add.css" />
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <!--内容开始-->
            <div class="tabbable">
                <ul class="nav nav-tabs padding-12 tab-color-blue">
                    <li class="active">
                        <a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-edit"></i> 供货商信息</a>
                    </li>
                </ul>
                <form method="post" action="update"  data-submit="auto">
                    <div class="tab-content no-border  padding-0 pt10">
                        <div id="tab1" class="tab-pane active">

                            <div class="form-group">
                                <div class="label-wrapper">
                                    <label class="" for="storeNumber"><strong>销售范围：</strong></label>
                                </div>
                                <div class="control-wrapper short">
                                    <input type="text" readonly id="storeNumber" name="supplier_product_type" class="form-control" value="<?=$store['supplier_product_type']?>" placeholder="">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="label-wrapper">
                                    <label class="" for="storeNumber"><strong>供货商编号：</strong></label>
                                </div>
                                <div class="control-wrapper short">
                                    <input type="text" id="storeNumber" readonly name="store_no" class="form-control" value="<?=$store['store_no']?>" placeholder="请输入供货商编号">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-wrapper">
                                    <label class="" for="storeName"><strong>供货商名称：</strong></label>
                                </div>
                                <div class="control-wrapper short">
                                    <input disabled type="text" id="storeName" name="name" class="form-control" value="<?=$store['name']?>" placeholder="请输入供货商名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-wrapper">
                                    <label class="" for="logo"><strong>供货商logo：</strong></label>
                                </div>
                                <div class="control-wrapper short">
                                    <div class="input-group">
                                        <input disabled type="text" value="<?=$store['logo']?>" id="logo" name="logo" class="form-control" placeholder="请直接输入图片地址或使用上传图片按钮上传图片" />
												<span class="input-group-btn">
	       									<button id="upload" disabled type="button" class="btn btn-info btn-sm">上传图片</button>
	      								</span>
                                    </div>
                                    <?php if($store['logo']):?>
                                        <img id="previewImage"  class="preview-image" src="<?=$store['logo']?>" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
                                    <?php else:?>
                                        <img id="previewImage"  class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
                                    <?php endif?>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="label-wrapper">
                                    <label class="" for="description"><strong>供货商介绍：</strong></label>
                                </div>
                                <div class="control-wrapper short">
                                    <textarea id="description" disabled  name="desc" class="form-control height80" placeholder=""><?=$store['desc']?></textarea>
                                </div>
                            </div>
                            <!--									<div class="form-group">-->
                            <!--										<div class="label-wrapper">-->
                            <!--											<label class="" for="dimension"><strong>供货商面积：</strong></label>-->
                            <!--										</div>-->
                            <!--										<div class="control-wrapper">-->
                            <!--											<div class="input-group ">-->
                            <!--												<input type="text" value="--><?//=$store['acreage']?><!--" name="acreage" id="dimension" class="form-control" placeholder="">-->
                            <!--												<span class="input-group-addon">平方米</span>-->
                            <!--											</div>-->
                            <!--										</div>-->
                            <!--									</div>-->
                            <div class="form-group">
                                <div class="label-wrapper">
                                    <label class="" for="title"><strong>电话：</strong></label>
                                </div>
                                <div class="control-wrapper short">
                                    <input id="phone" disabled name="phone" type="text" class="form-control" value="<?=$store['phone']?>" placeholder="请输入电话" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="label-wrapper">
                                    <label class="" for="title"><strong>手机：</strong></label>
                                </div>
                                <div class="control-wrapper short">
                                    <input disabled id="mobile" name="mobile" type="text" class="form-control" value="<?=$store['mobile']?>" placeholder="请输入手机号" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="label-wrapper">
                                    <label class="" for="title"><strong>QQ：</strong></label>
                                </div>
                                <div class="control-wrapper short">
                                    <input disabled id="QQ" name="QQ" type="text" class="form-control" value="<?=$store['QQ']?>" placeholder="请输入QQ号" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="label-wrapper">
                                    <label class="" for=""><strong>所在区域：</strong></label>
                                </div>
                                <div class="control-wrapper short">
                                    <!--分类数据-->

                                    <input disabled type="hidden" name="categoryData" id="addressDataUrl" value='http://tapi.yedadou.com/yedadou/getRegion'/>
                                    <!--											省-->
                                    <input disabled type="hidden" name="province" id="<?=$store['province']?>" value="province"/>
                                    <!--											市-->
                                    <input disabled type="hidden" name="city" "<?=$store['city']?>" value="city"/>
                                    <!--											级-->
                                    <input type="hidden" name="area" id="<?=$store['area']?>" value="area"/>


                                    <select disabled id="category1" name="province" data-tip="请选择省份" value="<?=$store['province']?>">
                                        <option value="<?=$store['province']?>" data-id="0" selected><?=$store['province']?></option>
                                        <!--												<option value="请选择省份" data-id="0" selected>请选择省份</option>-->
                                        <option value="广东省" data-id="440000">广东省</option>
                                        <option value="北京" data-id="110000">北京</option>
                                        <option value="天津" data-id="120000">天津</option>
                                        <option value="河北省" data-id="130000">河北省</option>
                                        <option value="山西省" data-id="140000">山西省</option>
                                        <option value="内蒙古" data-id="150000">内蒙古</option>
                                        <option value="辽宁省" data-id="210000">辽宁省</option>
                                        <option value="吉林省" data-id="220000">吉林省</option>
                                        <option value="黑龙江省" data-id="230000">黑龙江省</option>
                                        <option value="上海" data-id="310000">上海</option>
                                        <option value="江苏省" data-id="320000">江苏省</option>
                                        <option value="浙江省" data-id="330000">浙江省</option>
                                        <option value="安徽省" data-id="340000">安徽省</option>
                                        <option value="福建省" data-id="350000">福建省</option>
                                        <option value="江西省" data-id="360000">江西省</option>
                                        <option value="山东省" data-id="370000">山东省</option>
                                        <option value="河南省" data-id="410000">河南省</option>
                                        <option value="湖北省" data-id="420000">湖北省</option>
                                        <option value="湖南省" data-id="430000">湖南省</option>
                                        <option value="广西" data-id="450000">广西</option>
                                        <option value="海南省" data-id="460000">海南省</option>
                                        <option value="重庆市" data-id="500000">重庆市</option>
                                        <option value="四川省" data-id="510000">四川省</option>
                                        <option value="贵州省" data-id="520000">贵州省</option>
                                        <option value="云南省" data-id="530000">云南省</option>
                                        <option value="西藏" data-id="540000">西藏</option>
                                        <option value="陕西省" data-id="610000">陕西省</option>
                                        <option value="甘肃省" data-id="620000">甘肃省</option>
                                        <option value="青海省" data-id="630000">青海省</option>
                                        <option value="宁夏" data-id="640000">宁夏</option>
                                        <option value="新疆" data-id="650000">新疆</option>
                                        <option value="台湾" data-id="710000">台湾</option>
                                        <option value="香港特别行政区" data-id="810000">香港特别行政区</option>
                                        <option value="澳门特别行政区" data-id="820000">澳门特别行政区</option>
                                    </select>
                                    &nbsp;
                                    <select disabled id="category2" name="city" data-tip="<?=$store['city']?>">
                                        <option value="<?=$store['city']?>"><?=$store['city']?></option>
                                    </select>
                                    &nbsp;
                                    <select disabled id="category3" name="area" data-tip="<?=$store['area']?>">
                                        <option value="<?=$store['area']?>"><?=$store['area']?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-wrapper">
                                    <label class="" for=""><strong>地址：</strong></label>
                                </div>
                                <div class="control-wrapper short">
                                     <div class="input-group">
                                        <input disabled type="text" id="address" name="address" class="form-control"  placeholder="输入地址可搜索" autocomplete="off" value="<?=$store['address']?>"/>
                                                <span class="input-group-btn">
                                            <button disabled id="search" type="button" class="btn btn-info btn-sm"><i class="fa fa-search"></i> 搜索</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-wrapper long">
                                    <label class="" for=""></label>
                                </div>
                                <div class="control-wrapper long">
											<span class="help-block">
												 经度:&nbsp;<input name="longitude" value="<?=$store['longitude']?>" type="text" readonly="readonly" id="longitude" />
												纬度:&nbsp;<input name="latitude" value="<?=$store['latitude']?>" type="text" readonly="readonly" id="latitude" />
											</span>
                                    <div id="mapContainer" class="map-container">

                                    </div>
                                </div>
                            </div>
                            <div class="space-2"></div>
                            <div class="form-group">
                                <div class="label-wrapper">
                                    <label class="" for=""></label>
                                </div>
                                <div class="control-wrapper">
                                    <button class="btn btn-info" id="submitBtn" name="submitBtn" style="display:none" type="submit"><i class="ace-icon fa fa-check"></i> 提交</button>
                                    <button class="btn btn-info" id="edit_btn" name="" type=""><i class="ace-icon fa fa-edit"></i> 修改</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space"></div>
                    <div class="space"></div>
                </form>
            </div>
            <!--内容结束-->
        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>

<!--对话框-->
<div id="modalDialog" class="dialog-content hide">
    <div class="loading-bg">
        <div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div>
    </div>
    <iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="auto"></iframe>
</div>

<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
<script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
<script src="http://api.map.baidu.com/api?v=2.0&ak=ERbdhIdASjrTYg8WrY49D5Uy"></script>
<script src="{__STATIC_URL__}/public/supplierAdmin/store/storeList/edit.js"></script>
<script>
    $('#edit_btn').on('click', function (e) {
        General.stopEvent(e);
        $('*[disabled]').removeAttr('disabled');
        $(this).hide();
        $('#submitBtn').show();
    })
</script>
</body>

</html>