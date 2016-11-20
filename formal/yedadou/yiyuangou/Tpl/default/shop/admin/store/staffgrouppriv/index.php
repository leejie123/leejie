<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>添加员工分组</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/assets/css/jquery-ui.css" />

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>

	</head>
<body class="no-skin">
<div class="container-fluid">
<form method="post" action="">
选择分组：
<select name="group_id" onchange="javascript:location.replace('/shop/admin/store/staffGroupPriv?group_id='+this.options[this.selectedIndex].value)" style="margin:5px 0px 0px">
	<?php foreach($groups as $group):?>
		<option value="<?=$group['group_id']?>"<?=$group_id==$group['group_id'] ? ' selected' : ''?>><?=$group['group_name']?></option>
	<?php endforeach?>
</select>
<div class="space"></div>
<h2>设置权限：</h2>
<?php if ($is_self): ?>
	<h6 style="color:red">你不能修改自已所在分组的权限</h6>
<?php endif ?>
<h6><input type="checkbox" id="selectall"<?=$is_self ? ' disabled' : ''?>><label for="selectall">全选</label></h6>
<?php foreach($role_list as $role):?>
	<?php if(isset($role['menu_info']) && count($role['menu_info']) >0):?>
		<div class="block">
			<h4>
				<b><a href="#page-stats_<?=$role['module_id']?>" class="block-heading" data-toggle="collapse"><?=$role['module_name']?></a></b>
			</h4>
			<div id="page-stats_<?=$role['module_id']?>" class="block-body collapse in">
			<?php foreach($role['menu_info'] as $menu):?>
				<?php if($menu['father_menu']==0):?>
					<div style="border-bottom:1px dotted #ccc;" class="privs">
						<label style="display: inline-block;font-size: 12px;width: 180px"><input type="checkbox" name="menu_ids[]" value="<?=$menu['menu_id']?>"<?=in_array($menu['menu_id'],$group_role) ?  ' checked="checked"' : ''?><?=$is_self ? ' disabled' : ''?>><?=$menu['menu_name']?></label>
						<?php foreach($role['menu_info'] as $menu2):
							if($menu2['father_menu']==$menu['menu_id']):?>
								<label style="display: inline-block;font-size: 12px;width: 180px"><input type="checkbox" name="menu_ids[]" value="<?=$menu2['menu_id']?>"<?=in_array($menu2['menu_id'],$group_role) ?  ' checked="checked"' : ''?><?=$is_self ? ' disabled' : ''?>><?=$menu2['menu_name']?></label>
							<?php endif;
						endforeach?>
					</div>
				<?php endif?>
			<?php endforeach?>
			</div>
		</div>
	<?php endif?>
<?php endforeach?>										
<div class="space"></div>
	<div align="center">
	<?php if (!$is_self): ?>
		<button class="btn btn-primary">提交</button>
	<?php endif ?>
	</div>
</form>
</div>
<script>
	$('.privs label').on('change','input',function(e){
		if($(this).parent().index()==0){
			$(this).parent().siblings().find('input').prop('checked',$(this).prop('checked'));
		}else{
			if($(this).parent().parent().find('label').filter(function(index) {
				return index>0;
			}).find('input:checked').length>0){
				$(this).parent().parent().find('label').eq(0).find('input').prop('checked',true);
			}
		}
	});
	$('#selectall').on('change',function(e){
		$('.privs input').prop('checked',$(this).prop('checked'));
	})
</script>
<div class="space"></div>
</body>
</html>
