<!DOCTYPE html>
<html ng-app="app">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>账号权限</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<link rel="stylesheet" href="http://static.yedadou.com/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/datepicker.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
</head>

<body class="no-skin">

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<!--内容开始-->
			<div class="tabbable">
				<ul class="nav nav-tabs padding-12 tab-color-blue">
					<li class="active">
						<a data-toggle="tab" href="#tab1">操作日志</a>
					</li>
				</ul>

				<div class="tab-content no-border padding-0 pt10">
					<div id="tab1" class="tab-pane active">
						<!--表格-->
						<!--顶部工具条-->
						<div class="table-head-toolbar clearfix">
							<form method="get" action="" enctype="multipart/form-data">
								<div class="pull-right">
									<div class="pull-left span-label">日期:</div>
									<div class="input-group input-daterange pull-left">
										<input id="startTime" name="startTime" type="text" class="form-control" />
												<span class="input-group-addon">
													至
												</span>
										<input id="endTime" name="endTime" type="text" class="form-control" />
									</div>

									<button type="submit" name="searchButton" class="btn btn-info btn-sm">
										<span class="ace-icon fa fa-search"></span>搜索
									</button>
								</div>
								<!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
								<input type="hidden" name="checkedIds" id="checkedIds" value="" />
							</form>
						</div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
							<thead>
							<tr>
								<th class="center" width="100">管理员</th>
								<th class="center">登录用户名</th>
								<th class="center" width="">操作时间</th>
								<th class="center" width="">操作内容</th>
							</tr>
							</thead>

							<tbody>
							<!--data-id表示该行数据的ID-->
							<?php if(!$isEmpty):?>
								<?php foreach($data as $v):?>
									<tr id="row-0" data-openid="oIIZ6s_-78EbU0Qb7TxSbmwBZaKk" data-id="1502227" data-authid="6d62ndCSPCI/MoPjZbU+L9xSzo4UGk5p8vHoolQfLVNyV3hU" data-biz_id="1038" data-public_id="wx0e1e4e800b2804b5">
										<td class="center"><?=$v['user_type']?></td>
										<td class="center"><?=$v['user_name']?></td>
										<td class="center"><?=date('Y-m-d H:i:s',$v['optime'])?></td>
										<td class="center">
											<?=$v['details']?>
										</td>
									</tr>
								<?php endforeach; endif;?>
							</tbody>
						</table>
						<!--底部工具条-->
						<div class="table-foot-toolbar clearfix">
							<?=$pageBtnHtml?>
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

<!--对话框-->
<div id="modalDialog" class="dialog-content hide">
	<div class="loading-bg"><div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div></div>
	<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>
</div>

<!--对话框-->
<div id="dialog-edit" class="hide">
</div>
<script src="http://static.yedadou.com/public/assets/js/jquery.js"></script>
<script src="http://static.yedadou.com/public/assets/js/bootstrap.js"></script>
<script src="http://static.yedadou.com/public/assets/js/jquery-ui.js"></script>
<script src="http://static.yedadou.com/public/assets/js/date-time/bootstrap-datepicker.js"></script>
<script src="http://static.yedadou.com/public/assets/js/ace/ace.js"></script>
<script src="http://static.yedadou.com/public/admin/js/common/common.js"></script>
<script src="http://static.yedadou.com/public/supplierAdmin/storeSetting/opera_diary.js"></script>
</body>

</html>