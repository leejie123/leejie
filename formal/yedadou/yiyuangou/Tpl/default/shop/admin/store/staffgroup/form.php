<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>添加员工分组</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/assets/css/jquery-ui.css" />
	</head>

	<body class="no-skin">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<form method="post" action="">
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="group_name"><strong>分组名称：</strong></label>
							</div>
							<div class="control-wrapper">
								<input type="text" id="group_name" name="group_name" class="form-control"<?=$is_self ? ' readonly' : ''?> value="<?=val($group,'group_name')?>" placeholder="填写员工分组名称">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="group_desc"><strong>描述：</strong></label>
							</div>
							<div class="control-wrapper">
								<textarea name="group_desc" id="group_desc" cols="80" rows="10"<?=$is_self ? ' readonly' : ''?>><?=val($group,'group_desc')?></textarea>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
							</div>
							<div class="control-wrapper">
								<?php if (!$is_self): ?>
									<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit"><i class="ace-icon fa fa-check"></i> 提交</button>
								<?php endif ?>
							</div>
						</div>
					</form>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
	</body>
</html>