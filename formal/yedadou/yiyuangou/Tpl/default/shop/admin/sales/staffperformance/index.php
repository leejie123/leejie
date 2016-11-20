<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>员工业绩</title>
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
								<a data-toggle="tab" href="#tab1">员工业绩</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form id="form1" name="form1" method="get" action="" enctype="multipart/form-data">
										<div class="pull-right">
											<div class="pull-left span-label" id="returnShowLabel">日期:</div>
											<div class="input-group input-daterange pull-left">
												<input id="startTime" name="startTime" type="text" class="form-control" />
												<span class="input-group-addon">
													<i class="fa fa-exchange"></i>
												</span>
												<input id="endTime" name="endTime" type="text" class="form-control" />
											</div>
											<button type="submit" class="btn btn-info btn-sm">
												<span class="ace-icon fa fa-search"></span>搜索
											</button>
										</div>
										<!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
										<input type="hidden" name="t" id="t" value="" />
										<!--input type="hidden" name="issearch" id="issearch" value="1" /-->
									</form>
								</div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th class="center" width="100">角色</th>
											<th class="center">姓名</th>
											<th class="center">代理级别</th>
											<th class="center">上级</th>
											<th class="center">团队树</th>
											<th class="center">下级订单数</th>
											<th class="center">下级销售额（元）</th>
											<th class="center">下级佣金</th>
											<th class="center" width="80">操作</th>
										</tr>
									</thead>
                                        <?php if(!$isEmpty) :?>
									<tbody>
										<!--data-id表示该行数据的ID-->
                                        <?php foreach($itemes as $v):?>
										<tr data-id="<?php echo $v['user_id'];?>">
											<td class="center"><?php echo $v['group_name'];?></td>
											<td class="center"><?php echo $v['real_name'];?></td>
											<td class="center"><?php echo $v['weixin'];?></td>
											<td class="center"><?php echo $v['weixin'];?></td>
											<td class="center"><?php echo $v['weixin'];?></td>
											<td class="center"><?php echo $v['weixin'];?></td>
											<td class="center"><?php echo $v['weixin'];?></td>
											<td class="center"><?php echo $v['weixin'];?></td>
											<td class="center">
												<a href="/shop/admin/sales/carousel/update?id=<?php echo $v['user_id'];?>" class="blue" data-id="edit">查看明细</a>&nbsp;&nbsp;
											</td>
										</tr>
                                        <?php endforeach;?>
									</tbody>
                                    <?php endif;?>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<?php echo $pageBtnsHtml;?>
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
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/order/shop/list.js"></script>
	</body>

</html>