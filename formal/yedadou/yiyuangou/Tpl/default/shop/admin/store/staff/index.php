<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>员工管理</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1">员工管理</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="post" action="" enctype="multipart/form-data">
										<button data-href="/shop/admin/store/staff/add" class="btn btn-info btn-sm" id="add" type="button"><i class="ace-icon fa fa-plus"></i> 添加员工</button>
									</form>
								</div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th class="center" width="100">角色</th>
											<th class="center" width="100">登录账号</th>
											<th class="center">姓名</th>
											<th class="center" width="100">电话</th>
											<th class="center" width="150">账号创建时间</th>
											<th class="center" width="100">员工状态</th>
											<th class="center" width="100">操作</th>
										</tr>
									</thead>

									<tbody>
										<?php if(!$isEmpty):?>
										<?php foreach ($itemes as $arr):?>
										<?php $startIndex++;?>
										<tr>
											<td class="center"><?=$arr['group_name']?></td>
											<td class="center"><?=$arr['user_name']?></td>
											<td class="center"><?=$arr['real_name']?></td>
											<td class="center"><?=$arr['mobile']?></td>
											<td class="center"><?php 
											$date=$arr['login_time'];
											echo date("Y-m-d h:i:s",$date);
											?></td>
											<td class="center"><?php 
											$status=($arr['status']);
											switch($status){
												case -1:
													echo '离职';
													break;
												case 1:
													echo '在职';
													break;
												case 0:
													echo '未审核';
													break;
												default:
													echo '未知';
													break;
											}
											?></td>
											<td class="center">
												<a href="/shop/admin/store/staff/update?id=<?=$arr['user_id']?>" class="blue" data-id="edit">[编辑]</a>
												<a href="/shop/admin/store/staff/delete?id=<?=$arr['user_id']?>" class="blue" data-id="delete">[删除]</a>
											</td>
										</tr>
										<?php endforeach?>
										<?php endif?>
									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<?=$pageBtnsHtml?>
								</div>
								<!--表格结束-->

							</div>
						</div>
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
		<script src="{__STATIC_URL__}/public/admin/js/shop/store/staff/index.js"></script>
	</body>

</html>