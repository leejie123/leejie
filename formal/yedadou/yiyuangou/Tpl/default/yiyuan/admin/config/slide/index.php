<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>首页轮播</title>
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
								<a data-toggle="tab" href="#tab1">首页轮播</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="post" action="" enctype="multipart/form-data">
										<button class="btn btn-danger btn-sm" id="delete" type="button"><i class="ace-icon fa fa-trash-o"></i> 删除</button>
										<a class="btn btn-info btn-sm" id="add" href="/shop/admin/config/carousel/add"><i class="ace-icon fa fa-plus"></i> 添加</a>
										<!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
										<input type="hidden" name="checkedIds" id="checkedIds" value="" />
									</form>
								</div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th class="center" width="30">
												<label class="pos-rel">
													<input id="check-all" type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</th>
											<th class="center" width="100">ID</th>
											<th class="center">名称</th>
											<th class="center" width="150">创建时间</th>
											<th class="center" width="80">操作</th>
										</tr>
									</thead>
                                        <?php if($carousel) :?>
									<tbody>
										<!--data-id表示该行数据的ID-->
                                        <?php foreach($carousel as $v):?>
										<tr data-id="<?php echo $v['id'];?>">
											<td class="center">
												<label class="pos-rel">
													<input name="check-row" type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</td>
											<td class="center"><?php echo $v['id'];?></td>
											<td class="center"><?php echo $v['name'];?></td>
											<td class="center"><?php echo date("Y-m-d H:i:s", $v['create_time']);?></td>
											<td class="center">
												<a href="/shop/admin/config/carousel/update?id=<?php echo $v['id'];?>" class="blue" data-id="edit">编辑</a>&nbsp;&nbsp;
												<a href="#" class="blue" data-id="delete">删除</a>
											</td>
										</tr>
                                        <?php endforeach;?>
									</tbody>
                                    <?php endif;?>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<?php echo $page_html;?>
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

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/carousel/index.js"></script>
	</body>

</html>