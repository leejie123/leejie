
<!DOCTYPE html>
<!-- saved from url=(0041)http://vendor.yedadou.com/UserCenter/Fans -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>幸运订单</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="http://static.yedadou.com/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css">
		<style type="text/css">
			.color-orange {
				color:rgb(225, 100, 119);
			}
			.line-h-15	{
				line-height: 15px;
			}
			.mg-r-10{
				margin-right: 10px;
			}
			.mg-b-10{
				margin-bottom: 10px;
			}

			.bold {
				font-weight: bold
			}
			.pd-b-10{
				padding-bottom: 10px;
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
							<li class="">
								<a href="/yiyuan/admin/WorkMan/DataStatistics" data-url="">数据统计</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab2">幸运订单</a>
							</li>
							<li class="">
								<a href="/yiyuan/admin/WorkMan/Setting" data-url="">设置</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane"></div>
							<div id="tab2" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
										<div class="pull-right">
												<div>
													<span class="mg-r-10">幸运订单统计： <?=$total?>个</span> 
												</div>
										</div>
										<div class="pull-left clearfix">
											<div class="">幸运的订单</div>
										</div>
										<input type="hidden" name="checkedIds" id="checkedIds" value="">
									</form>
									
								</div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th class="center" width="300">订单号</th>
											<th class="center" width="200">工人名称</th>
											<th class="center" width="100">工人ID</th>
											<th class="center" width="250">编码列表</th>
											<th class="center" width="120">参与次数</th>
											<th class="center" width="100">参与时间</th>
											<th class="center" width="250">第几期</th>
											<th class="center" width="300">商品ID</th>
											<th class="center" width="300">期数ID</th>
											<th class="center" width="300">幸运时间</th>
										</tr>
									</thead>

									<?php if(!empty($data)):?>
									<tbody>
										<!--data-id表示该行数据的ID-->
									    	<?php foreach ($data as $key => $value):?>		
										<tr id="row-<?=$value['id']?>" data-id="<?=$value['id']?>" data-uid="<?=$value['buyer_id']?>" data-authid="<?=$value['id']?>">
											<td class="center" valign="middle"><?=$key?></td>
											<td class="center color-orange"><?=$value['buyer_nick']?></td>
											<td class="center color-orange"><?=$value['buyer_id']?></td>
											<td class="center"><?=implode(' ,', $value['code'])?></td>
											<td class="center"><?=count($value['code'])?></td>
											<td class="center"><?=date("Y-m-d H:i:s", $value['add_time'])?></td>
											<td class="center"><?=$value['term']?></td>
											<td class="center"><?=$value['term_id']?></td>
											<td class="center"><?=$value['goods_id']?></td>
											<td class="center"><?=strlen($value['hit_time']) >= 10 ? date("Y-m-d H:i:s", $value['hit_time']) : '--'?></td>
										</tr>
									<?php endforeach;?>
									</tbody>
								<?php endif;?>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<?=$page_html;?></div>
								<!--表格结束-->
							</div>
							<div id="tab3" class="tab-pane"></div>
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

		<div id="template" class="hide">
			<div class="control-wrapper pd-b-10 form-control mg-b-10" style="height: auto;width: 30%">
				<div class="mg-b-10">
					<label class="pull-left bold">ID:</label>
					<input type="" class="form-control" >
				</div>
				<div >
					<label class="pull-left bold" style="display:block;width: 100%;">参与次数:</label><br/>
					<div class="input-group">
						<input id="startTime" name="startTime" type="text" class="form-control">
						<span class="input-group-addon">
							<i class="fa fa-exchange"></i>
						</span>
						<input id="endTime" name="endTime" type="text" class="form-control">
					</div>
				</div>
			</div>

		</div>
		

		<!--对话框-->
		<div id="dialog-edit" class="hide">
		</div>
		<script src="fans.js"></script>
		<script type="text/javascript" src="examin.js"></script>

		<script src="http://static.yedadou.com/public/assets/js/jquery.js"></script>
		<script src="http://static.yedadou.com/public/assets/js/bootstrap.js"></script>
		<script src="http://static.yedadou.com/public/assets/js/jquery-ui.js"></script>
		<script src="http://static.yedadou.com/public/assets/js/ace/ace.js"></script>
		<script src="http://static.yedadou.com/public/admin/js/common/common.js"></script>
	</body>
	</html>