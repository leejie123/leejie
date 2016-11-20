<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>添加虚拟评论</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for=""><strong>评论商品：</strong></label>
							</div>
							<div class="control-wrapper">
								<label class="font-red" for="">商品名称</label>
							</div>
						</div>
						<div class="form-group clearfix">
							<div class="label-wrapper">
								<label class="" for=""><strong>评论用户：</strong></label>
							</div>
							<div class="control-wrapper">
								<label class="user-box">
									<input name="userId[]" type="checkbox" class="ace" value="6">
									<span class="lbl"> 虚拟用户名称1</span>
								</label>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="user-box">
									<input name="userId[]" type="checkbox" class="ace" value="8">
									<span class="lbl"> 虚拟用户名称2</span>
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="level"><strong>评论等级：</strong></label>
							</div>
							<div class="control-wrapper">
								<input type="text" id="level" name="level" class="form-control" value="" placeholder="请输入评论等级">
								<span class="help-block font-red">(评论等级为1-5)</span>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="content"><strong>评论内容：</strong></label>
							</div>
							<div class="control-wrapper">
								<textarea id="content" name="content" class="form-control height80" placeholder="请输入评论内容"></textarea>
							</div>
						</div>
						<div class="space"></div>
						<div class="button-panel">
							<button type="submit" class="btn btn-info btn-sm btn-space-right" data-href="" data-action="submit" data-refresh="parent" data-mask="parent"><i class='ace-icon fa fa-check'></i> 确定</button>
							<button id="cancel" type="button" class="btn btn-danger btn-sm" data-action="close"><i class='ace-icon fa fa-times'></i> 取消</button>
						</div>
					</form>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
	</body>

</html>