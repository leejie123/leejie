<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>订单列表</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/product/list/index.css" />
		<div class="container-fluid">
			<div class="">
				<form class="form-horizontal" method="post" action="/yiyuan/pintuan/admin/order/exportOrder/post" data-submit="auto" id="detailForm">
                    <input type="hidden" value="<?=$where?>" name="where"/>
					<div class="space-8"></div>
					<div class="form-group">
						<div class="label-wrapper">
							<label class="" for="userName">导出数据：</label>
						</div>
						<div class="control-wrapper short">
							<div class="pull-right">
								<div class="input-group  pull-left">
									<span class="input-group-addon">	
										第
									</span>
									<input id="startData" name="startData" type="text" class="form-control" value="1" />
									<span class="input-group-addon">	
										条至
									</span>
									<input id="endData" name="endData" type="text" class="form-control" value="500" />
									<span class="input-group-addon">	
										条
									</span>
								</div>
							</div>
							<span>一次最多导出500条</span>
						</div>
					</div>
					<div class="space-8"></div>
					<div class="form-group">
						<div class="label-wrapper">
							<label class="" for=""></label>
						</div>
						<div class="control-wrapper">
<!-- 							<button class="btn btn-info btn-sm" id="submitBtn" name="submitBtn" type="submit"  data-action="submit" data-refresh="window" data-mask="parent"><i class="ace-icon fa fa-save"></i> 保存</button> -->
							<a class="btn btn-info btn-sm" href="javascript:document.getElementById('detailForm').submit();" ><i class="ace-icon fa fa-save"></i> 导出</a >
							&nbsp;
							<button class="btn btn-danger btn-sm" id="return" name="return" type="button" data-action='close'><i class="ace-icon fa fa-undo"></i> 取消</button>
						</div>
					</div>

					<div class="space"></div>
				</form>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
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
		<div id="modalDialog" class="dialog-content hide">
			<div class="loading-bg">
				<div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div>
			</div>
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>
		</div>

		<!--对话框-->
		<div id="dialog-edit" class="hide">
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
	</body>

</html>
