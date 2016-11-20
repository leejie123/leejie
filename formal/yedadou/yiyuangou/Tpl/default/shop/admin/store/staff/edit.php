<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>编辑员工</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/assets/css/jquery-ui.css" />
	</head>

	<body class="no-skin">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<form method="post" action="" enctype="multipart/form-data" data-submit="auto">
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="user_group"><strong>角色：</strong></label>
							</div>
							<div class="control-wrapper">
								<select id="user_group" name="user_group" class="form-control">
									<option value="0">请选择角色</option>
									<?php foreach ($groups as $key => $group): ?>
										<option value="<?=$group['group_id']?>"<?=$group['group_id']==$user_group ? ' selected' : ''?>><?=$group['group_name']?></option>
									<?php endforeach ?>
								</select>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="userName"><strong>用户名：</strong></label>
							</div>
							<div class="control-wrapper">
								<input type="text" id="userName" name="user_name" class="form-control" value="<?=$user_name?>" disabled>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="password"><strong>密码：</strong></label>
							</div>
							<div class="control-wrapper">
								<input type="password" id="password" name="password" class="form-control" value="" placeholder="">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
								<div class="label-wrapper">
									<label class="" for="confirmNewPassword"><strong>确认新密码：</strong></label>
								</div>
								<div class="control-wrapper">
									<input id="confirmNewPassword" name="confirmPassword" type="password" class="form-control" placeholder="" value="" />
									<span class="help-block">
										注：如果为空，不修改密码
												</span>
								</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="realName"><strong>姓名：</strong></label>
							</div>
							<div class="control-wrapper">
								<input type="text" id="realName" name="real_name" class="form-control" value="<?=$real_name?>">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="phone"><strong>电话：</strong></label>
							</div>
							<div class="control-wrapper">
								<input type="text" id="phone" name="mobile" class="form-control" value="<?=$mobile?>" placeholder="">
								<span class="help-block"></span>
							</div>
						</div>
						
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for="weixin"><strong>绑定微信号：</strong></label>
							</div>
							<div class="control-wrapper">
								<input type="text" id="weixin" name="weixin" class="form-control" value="<?=$weixin?>" placeholder="请输入微信号">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="" for=""><strong>员工状态：</strong></label>
							</div>
							<div class="control-wrapper">
								<label>
									<input name="status" type="radio" class="ace" value="1" <?=$status==1?'checked="checked"':''?>>
									<span class="lbl"> 在职</span>
								</label>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label>
									<input name="status" type="radio" class="ace" value="-1" <?=$status==-1?'checked="checked"':''?>>
									<span class="lbl"> 离职</span>
								</label>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label>
									<input name="status" type="radio" class="ace" value="0" <?=$status==0?'checked="checked"':''?>>
									<span class="lbl"> 未审核</span>
								</label>
								<span class="help-block"></span>
							</div>
						</div>

						<div class="space"></div>
						<div class="button-panel">
							<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit" data-href="/shop/admin/store/staff/update?id=<?=$user_id?>" data-action="submit" data-refresh="parent" data-mask="parent"></i> 保存</button>
							<button id="cancel" type="button" class="btn btn-danger btn-sm" data-action="close"><i class='ace-icon fa fa-times'></i> 取消</button>
						</div>
					</form>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/store/staff/edit.js"></script>
	</body>

</html>