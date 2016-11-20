
<!DOCTYPE html>
<html ng-app="app">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>修改价格</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="http://static.yedadou.com/public/??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css"/>
				<script src="http://static.yedadou.com/public/assets/js/ace-extra.js"></script>
	    <script src="http://static.yedadou.com/public/assets/js/??jquery.js,bootstrap.js,jquery-ui.js,ace/elements.scroller.js,ace/ace.js,ace/ace.ajax-content.js,ace/ace.touch-drag.js,ace/ace.sidebar.js,ace/ace.sidebar-scroll-1.js"></script>
	    <script src="http://static.yedadou.com/public/assets/js/??ace/ace.submenu-hover.js,ace/ace.widget-box.js,ace/ace.settings.js,ace/ace.settings-rtl.js,ace/ace.settings-skin.js,ace/ace.widget-on-reload.js,ace/ace.searchbox-autocomplete.js"></script>
	    <script src="http://static.yedadou.com/public/js/??bootstrap-modal.js,bootstrap-switch.min.js,bootbox.min.js"></script>
	    <script src="http://static.yedadou.com/public/admin/js/??common/common.js"></script>
	    <script src="http://static.yedadou.com/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="http://static.yedadou.com/public/js/kindeditor/lang/zh_CN.js"></script>
	</head>

	<body class="no-skin">
		<style type="text/css">
			.mg-b-15{
				margin-bottom:15px;
			}
			.fa-close:hover {
				background-color: red;
			}
			span > em {
				font-style: normal;
			}
			.color-red {
				color: red;
			}
			#attr_wrap > span{
				margin-bottom:5px;
			}
			#attr_select > span {
				margin-right: 5px;
				margin-bottom:5px;
			}
		</style>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<form class="form-horizontal" method="post" action="/Advanced/Qrcode/add?data=1" >
						<!--LBS回复-->
						<div class="panel panel-default">
							<div class="panel-heading"><i class="fa fa-edit"></i> 修改价格</div>
							<div class="panel-body">
								<div class="well well-info	">
									重置本期商品的【价格】会导致已经生成的交易记录清空！（已参与人数为【0】的商品不受影响）下一期商品的价格也会是本次设置的新价格！
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label" for="sceneName"><strong>商品标题</strong></label>
									<div class="col-xs-12 col-sm-6 col-md-8">
										<a href="">iphone 6s 4.7 4G手机四色，国行正品，全网通用，顺丰包邮</a>
										<!-- <span class="help-block">6~12字符，允许数字及大小写字母</span> -->
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label" for="sceneName"><strong>当前期</strong></label>
									<div class="col-xs-12 col-sm-6 col-md-8">
										<span>第 <em class="color-red">(2)</em> 期</span>
										<!-- <span class="help-block">6~12字符，允许数字及大小写字母</span> -->
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label" for="sceneName"><strong>当次商品售价</strong></label>
									<div class="col-xs-12 col-sm-6 col-md-8">
										<span class="color-red">1元</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label" for="sceneName"><strong>已参与人次</strong></label>
									<div class="col-xs-12 col-sm-6 col-md-8">
										<span class="color-red">0次</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label" for="sceneName"><strong>总需人次</strong></label>
									<div class="col-xs-12 col-sm-6 col-md-8">
										<span class="color-red">1188次</span>
										<div class="help-block">* 向上取整(4488/ 1) = 4488</div>
									</div> 
								</div>
								
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label" for=""><strong>总需人次</strong></label>
									<div class="col-xs-12 col-sm-6 col-md-8">
										<span class="color-red">1188次</span>
										<div class="help-block">* 向上取整(4488/ 1) = 4488</div>
									</div> 
								</div>
								<div class="form-group clearfix">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label" for=""><strong>新的单次售价</strong></label>
									<div class="input-group">
										<input type="text" value="1.00" name="" id="wx_price" class="form-control" placeholder="">
										<span class="input-group-addon">元</span>
									</div>
								</div>
								<div class="form-group clearfix">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label" for=""><strong>新的总售价</strong></label>
									<div class="input-group">
										<input type="text" value="1.00" name="" id="wx_price" class="form-control" placeholder="">
										<span class="input-group-addon">元</span>
									</div>
								</div>
								
							</div>
						</div>
						<button class="btn btn-info btn-xs" id="submitBtn" data-action="close" type="submit"><i class="ace-icon fa fa-check"></i> 确定</button>
						<button class="btn btn-danger btn-xs" id="submitBtn" type="submit"><i class="ace-icon fa fa-check"></i> 取消</button>
						<div class="space"></div>
					</form>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		
	</body>

</html>