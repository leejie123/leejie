
<!DOCTYPE html>
<!-- saved from url=(0041)http://vendor.yedadou.com/UserCenter/Fans -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>每日流水统计</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="http://static.yedadou.com/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/datepicker.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
		<style type="text/css">
			.color-orange {
				color:rgb(225, 100, 119);
			}
			.line-h-15	{
				line-height: 15px;
			}
		</style>
	</head>

	<body class="no-skin">

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="http://vendor.yedadou.com/UserCenter/Fans#tab1">每日流水统计</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="get" action="" >
										<div class="pull-right clearfix">
											<div class='pull-left' style="margin: 0 10px;">
												<!-- <div class="pull-left span-label">商品分类</div> -->
												<div class="pull-left">
													<label style="width: 150px;">
														<select type="text" class="form-control" placeholder="关键字">
															<option value="全部">商品分类</option>
															<option value="全部">全部</option>
															<option value="全部">全部</option>
															<option value="全部">全部</option>
														</select>
													</label>
												</div>
											</div>
											<div class='pull-left' style="margin: 0 10px;">
												<div class="pull-left span-label">日期:</div>
												<div class="input-group input-daterange pull-left">
													<input id="startTime" name="startTime" type="text" class="form-control">
													<span class="input-group-addon">
														<i class="fa fa-exchange"></i>
													</span>
													<input id="endTime" name="endTime" type="text" class="form-control">
												</div>
											</div>
											<div class="input-group  pull-right" style="width:50px;">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-info btn-sm">
													<i class="ace-icon fa fa-search bigger-110"></i> 
														搜索
													</button>
												</span>
											</div>
										</div>
										<!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
										<input type="hidden" name="checkedIds" id="checkedIds" value="">

									</form>
									
								</div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th class="center" width="250">日期</th>
											<th class="center" width="250">支付单数</th>
											<th class="center" width="250">收入流水</th>
										</tr>
									</thead>

									<tbody>
										<!--data-id表示该行数据的ID-->		
									    										
										<tr id="row-1" data-id="oIIZ6s3zp-ZCdiEHiDI6GjGA6hc0" data-uid="1" data-authid="84bf1+uJ62Yry4B1BgFwhWxTyHAdGLvTZbHIgAoJ">
											<td class="center">
												4
											</td>
											<td class="center color-orange">1</td>
											<td class="center">1</td>
										</tr>
									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix"></div>
								<!--表格结束-->

							</div>
						</div>
					</div>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<a href="http://vendor.yedadou.com/UserCenter/Fans#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>

		<!--备注-->
		<div id="tpl-remark" class="hide">
			<div class="row pt10 pr10">
				<div class="col-xs-12">
					<div class="form-group">
						<div class="label-wrapper">
							<label class="control-label" for="title">备注：</label>
						</div>
						<div class="control-wrapper">
							<input type="text" placeholder="" value="" class="form-control">
							<!--<span class="help-block">备注名称（4个汉字或8个字母以内）</span>-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="http://static.yedadou.com/public/assets/js/jquery.js"></script>
		<script src="http://static.yedadou.com/public/assets/js/bootstrap.js"></script>
		<script src="http://static.yedadou.com/public/assets/js/jquery-ui.js"></script>
		<script src="http://static.yedadou.com/public/assets/js/ace/ace.js"></script>
		<script src="http://static.yedadou.com/public/assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="http://static.yedadou.com/public/admin/js/common/common.js"></script>
		<script>
			$(function () {
				$('.input-daterange').datepicker({autoclose:true});
				General.extendDialog(); //扩展对话框
				General.initCheckbox();
			})
		</script>
	</body>
	</html>