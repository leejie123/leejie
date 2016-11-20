<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>选择微信消息模板</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th width="60">序号</th>
											<th width="100">模板名称</th>
											<th>模板ID</th>
											<th width="60">操作</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($msg_tpls as $msg_tpl):?>
										<tr>
											<td class="id"><?=$msg_tpl['id']?></td>
											<td><?=$msg_tpl['name']?></td>
											<td class="tpl_id"><?=$msg_tpl['tpl_id']?></td>
											<td><a href="javascript:;" class="select_item">选取</a></td>
										</tr>
									<?php endforeach?>
									</tbody>
								</table>
								<!--表格结束-->

							</div>
						</div>
					</div>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/js/treetable/jquery.treetable.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script>
		var inputId = '<?=get('input_id')?>';
		if(inputId==''){
			alert('非法请求');
			window.parent.General.closeDialog();
		}
		$('.select_item').click(function(){
			var id = $(this).parent().siblings('.id').text();
			window.parent.selectTemplate(id,inputId);
		});
		</script>
	</body>
</html>