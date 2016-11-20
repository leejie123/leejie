
<!DOCTYPE html>
<!-- saved from url=(0041)http://vendor.yedadou.com/UserCenter/Fans -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>数据统计</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css">
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
							<li class="active">
								<a data-toggle="tab" href="#tab1">数据统计</a>
							</li>
							<!-- http://vendor.yedadou.com/UserCenter/Fans#tab1 -->
							<li class="">
								<a href="/yiyuan/admin/WorkMan/LuckyOrder">幸运订单</a>
							</li>
							<li class="">
								<a href="/yiyuan/admin/WorkMan/Setting">设置</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="post" action="" >
										<!--<button class="btn btn-info btn-sm" id="sureAdd" type="submit"><i class="ace-icon fa fa-plus"></i> 确认添加</button>-->
										<div class="pull-right">
											<div>
												<span class="mg-r-10">已有工人数量： <?=val($set_robot, 'robot_number', 0)?>人  </span> 
												<span class="mg-r-10">参与商品数量： <?=count(val($set_robot, 'goods_purchase', []))?>个</span> 
												<span class="mg-r-10">参与的订单统计：<?=$total_join;?>单</span> 
												<span class="mg-r-10">命中的订单统计： <?=$total_lucky;?>单</span>
											</div>
										</div>
										<div class="pull-left clearfix">
											<!-- <div class="pull-left">
												<label>
													<input type="text" placeholder="商品名称/商品编码">
												</label>
											</div>
											<div class="input-group search-width pull-right">
												<select class="form-control" name="">
													<option value="全部">全部</option>
													<option value="审核不通过">审核通过</option>
													<option value="审核通过">审核不通过</option>
												</select>
												<span class="input-group-btn">
													<button type="submit" class="btn btn-info btn-sm">
													<i class="ace-icon fa fa-search bigger-110"></i> 
														搜索
													</button>
												</span>
											</div> -->
											<div class="">参与的订单</div>
										</div>
										<!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
										<input type="hidden" name="checkedIds" id="checkedIds" value="">

									</form>
									
								</div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<!-- <th class="center" width="140">
												<label class="pos-rel">
													<input id="check-all" type="checkbox" class="ace">
													<span class="lbl"></span>
												</label>
												<button type="button" id="deleteAll" class="check-all btn btn-info btn-xs">删除</button>
											</th> -->
											<th class="center" width="300">订单号</th>
											<th class="center" width="200">工人名称</th>
											<th class="center" width="100">工人ID</th>
											<th class="center" width="250">编码列表</th>
											<th class="center" width="120">参与次数</th>
											<th class="center" width="100">参与时间</th>
											<th class="center" width="250">第几期</th>
											<th class="center" width="300">商品ID</th>
											<th class="center" width="300">期数ID</th>
											<th class="center" width="300">是否幸运</th>
											<th class="center" width="300">幸运时间</th>
										</tr>
									</thead>
									<?php if(!empty($data)):?>
									<tbody>
										<!--data-id表示该行数据的ID-->		
									    	<?php foreach ($data as $key => $value):?>									
										<tr id="row-<?=$value['id']?>" data-id="<?=$value['id']?>" data-uid="<?=$value['buyer_id']?>" data-authid="<?=$value['id']?>">
											<td class="center" valign="middle"><?=$value['order_sn']?></td>
											<td class="center color-orange"><?=$value['buyer_nick']?></td>
											<td class="center color-orange"><?=$value['buyer_id']?></td>
											<td class="center"><?=$value['code']?></td>
											<td class="center"><?=$value['num']?></td>
											<td class="center"><?=date("Y-m-d H:i:s", $value['add_time'])?></td>
											<td class="center"><?=$value['term']?></td>
											<td class="center"><?=$value['term_id']?></td>
											<td class="center"><?=$value['goods_id']?></td>
											<td class="center"><?=strstr($value['hit'] , '1') ? '是': '否'?></td>
											<td class="center"><?=strlen($value['hit_time']) >= 10 ? date("Y-m-d H:i:s", $value['hit_time']) : '--'?></td>
										</tr>
									<?php endforeach;?>
									</tbody>
								<?php endif;?>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<?=$page_html;?>
								</div>
								<!--表格结束-->
							</div>
							<div id="tab2"></div>
							<div id="tab3"></div>
						</div>
					</div>
					<!--内容结束-->
				</div>
			</div>
		</div>

		<a href="http://vendor.yedadou.com/UserCenter/Fans#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
	</body>
	</html>