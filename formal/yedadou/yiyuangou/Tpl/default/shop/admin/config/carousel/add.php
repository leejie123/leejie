<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>添加幻灯片</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
		<style>
			.ke-dialog {
			    position: absolute;
			    margin: 0;
			    padding: 0;
			    top:100px !important;
			}
		</style>
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/js/kindeditor/themes/default/default.css,/admin/css/shop/config/carousel/add.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li>
								<a href="/shop/admin/config/carousel">首页轮播</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-plus"></i> 添加幻灯片</a>
							</li>
						</ul>

						<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
							<div class="tab-content  pt10">
								<div id="tab1" class="tab-pane active">
									<!--内容开始-->
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for="carouselName"><strong>轮播名称：</strong></label>
										</div>
										<div class="control-wrapper">
											<input type="text" id="carouselName" name="carouselName" class="form-control" value="" placeholder="请输入轮播名称">
										</div>
									</div>
									<?php if(1==2){ //暂时隐藏，尺寸没有什么卵用?>
									<div class="form-group">
										<div class="label-wrapper">
											<label class="" for=""><strong>尺寸：</strong></label>
										</div>
										<div class="control-wrapper">
                                            <?php foreach($sizePx as $k=>$v) :?>
											<label>
												<input name="size" type="radio" class="ace" value="<?php echo $v;?>" <?php echo $k ? "" :'checked';?>>
												<span class="lbl"> <?php echo $v;?>像素</span>
											</label>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?php endforeach;?>
										</div>
									</div>
									<?}else{?>
									<input type="hidden" name="size" value="240x700">
									<?php } ?>
									<div class="head-title">轮播图片列表</div>
									<div class="alert alert-warning">
										<strong>温馨提示：</strong> 按住图片拖动，可以改变顺序。<strong>图片尺寸：</strong>为高240或240的倍数，宽度会等比缩放。宽度请尽量设计大一些用于适配大尺寸屏幕。
									</div>
									<button class="btn btn-success btn-sm" id="add" type="button"><i class="ace-icon fa fa-plus"></i> 添加图片</button>
									<div class="image-list">
										<ul id="imageList" class="clearfix">
										</ul>
									</div>
								</div>
							</div>
							<div class="space"></div>
							<button data-href="/shop/admin/config/carousel/add" data-action="submit" data-refresh="window" data-mask="parent" class="btn btn-info" id="submitBtn" name="submitBtn" type="submit"><i class="ace-icon fa fa-check"></i> 提交</button>
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

		<!--添加图片的模板-->
		<div id="tpl-addImage" class="hide">
			<li>
				<img class="carousel-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
				<div class="input-group">
					<input type="text" value="" data-id="url" name="url[]" class="form-control" placeholder="图片地址" />
					<span class="input-group-btn">
						<button data-id="upload" type="button" class="btn btn-info btn-sm mr5">上传</button>
						<button data-id="delete" type="button" class="btn btn-danger btn-sm">删除</button>
					</span>
				</div>
				<div class="space-4"></div>
				<input type="text" value="" data-id="openUrl" name="openUrl[]" class="form-control" placeholder="点击图片后打开的链接地址" />
			</li>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
		<script src="{__STATIC_URL__}/public/js/Sortable.min.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/carousel/add.js"></script>
	</body>

</html>