<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>首页轮播</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/carousel/index.js"></script>
	</head>
<div class="btn-toolbar">
	<a href="/shop/admin/store/staffGroup/add" class="btn btn-primary"><i class="fa fa-plus"></i> 员工分组</a>
</div>
<div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">员工分组列表</a>
	<div id="page-stats" class="block-body collapse in">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>分组名</th>
				<th>描述</th>
				<th width="80px">操作</th>
			</tr>
			</thead>
			<tbody>							  
			<?php foreach($groups as $group):?>
				<tr>
				<td><?=$group['group_id']?></td>
				<td><?=$group['group_name']?></td>
				<td><?=$group['group_desc']?></td>
				<td>
				<a href="/shop/admin/store/staffGroupPriv?group_id=<?=$group['group_id']?>" title= "修改权限" ><i class="fa fa-lock"></i></a>
				&nbsp;
				<a href="/shop/admin/store/staffGroup/update?group_id=<?=$group['group_id']?>" title= "修改" ><i class="fa fa-pencil"></i></a>
				&nbsp;
				<a data-toggle="modal" href="#myModal"  title= "删除" ><i class="fa fa-remove" href="/shop/admin/store/staffGroup/delete?group_id=<?=$group['group_id']?>#myModal" data-toggle="modal" ></i></a>
				</td>
				</tr>
			<?php endforeach?>
		  </tbody>
		</table>  
	</div>
</div>
<script>
	$('.fa-remove').click(function(e){
		if(!confirm('确定删除该员工分组吗?')){
			return;
		}
		var href = $(this).attr('href');
		window.location.href = href;
	});
</script>
	</body>

</html>