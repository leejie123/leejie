<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>选择挂件</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/datepicker.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/admin/css/order/shop/list.css"
		/>
	</head>
	<body class="no-skin">
		<div class="container-fluid"style="height: 720px;overflow-y: scroll;">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
							<thead>
								<tr>
									<th class="center" width="50">ID</th>
									<th class="center" width="200">预览图</th>
									<th class="center">挂件名称</th>
									<th class="center" width="">标识</th>
									<th class="center" width="">作者</th>
									<th class="center" width="">描述</th>
									<th class="center" width="100">操作</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($widgets as $key => $widget): ?>
								<tr>
									<td align="center"><?=$widget['id']?></td>
									<td align="center"><img src="<?=$widget['thumb']?>" width="200" alt=""></td>
									<td align="center"><?=$widget['name']?></td>
									<td align="center"><?=$widget['tag']?></td>
									<td align="center"><?=$widget['auth']?></td>
									<td align="center"><?=$widget['desc']?></td>
									<td align="center">
										<a href="javascript:;" onclick="parent.addWidget(<?=$widget['id']?>,'<?=$widget['tag']?>','<?=$page_id?>')">添加</a>
									</td>
								</tr>
							<?php endforeach ?>
							</tbody>
						</table>
					</div>
					<!--内容结束-->
				</div>
			</div>
		</div>
		<div class="mod">
			<div class="item">
				
			</div>
		</div>
	</body>
</html>