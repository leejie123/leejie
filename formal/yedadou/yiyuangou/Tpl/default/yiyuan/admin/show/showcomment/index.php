<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>晒单回复</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/admin/css/shop/product/list/index.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1">晒单回复</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">

								<div class="table-head-toolbar clearfix">
									<form method="get" action="/yiyuan/admin/show/showComment/get">
										<div class="pull-right clearfix">
											<div class="pull-left">
												<input id="userCount" name="userCount" type="text" class="pname" placeholder="用户ID/昵称" value="<?=isset($search['userCount'])?$search['userCount']:'';?>">
												<input id="goodsCount" name="goodsCount" type="text" class="pcode" placeholder="商品ID/标题" value="<?=isset($search['goodsCount'])?$search['goodsCount']:'';?>">
											</div>
											<button type="submit" class="btn btn-info btn-sm pull-left">
												<i class="ace-icon fa fa-search bigger-110"></i> 搜索
											</button>
										</div>
									</form>
									<!-- <a class="btn btn-success btn-sm" id="id-add" href="/yiyuan/admin/show/ShowComment/delete">删除</a> -->
								</div>
								<div class="space-4"></div>
								<!--表格-->
								<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
									<thead>
										<tr>
											<th class="center" width="30">
												<label class="pos-rel">
													<input id="check-all" type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</th>
											<th class="center">商品名称</th>
											<th class="center">商品ID</th>
											<th class="center">晒单标题</th>
											<th class="center">回复者</th>
											<th class="center">回复者ID</th>
											<th class="center">回复内容</th>
											<th class="center">回复时间</th>
											<th class="center" width="100">管理</th>
										</tr>
									</thead>

									<tbody>
										<!--data-id表示该行数据的ID-->
										<?php if(!empty($data)){?>
										<?php foreach ($data as $key=>$value):?>
										<tr id="row-<?php echo $key; ?>" data-id="<?php echo isset($value['id'])?$value['id']:''; ?>">
											<td class="center">
												<label class="pos-rel">
													<input name="check-row" type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</td>
											<td class="product-wrapper">
													<a href="#" class="blue">
														<span class="title"><?php echo isset($value['goods_title'])?$value['goods_title']:''; ?></span>
													</a>
											</td>
											<td class="center" valign="middle"><?=$value['goods_id']?></td>
											<td class="center" valign="middle"><?=$value['title']?></td>
											<td class="center" valign="middle"><?=$value['nick']?></td>
											<td class="center" valign="middle"><?=$value['uid']?></td>
											<td class="center" valign="middle"><?=$value['content']?></td>
											<td class="center"><?=date('Y-m-d H:i:s',$value['add_time']) ?></td>
											<td class="center">
												<a href="" data-url="/yiyuan/admin/show/ShowComment/delete?id=<?php echo isset($value['id'])?$value['id']:''; ?>&share_id=<?php echo isset($value['share_id'])?$value['share_id']:''; ?>" class="blue" data-id="delete">删除</a>
											</td>
										</tr>
										<?php endforeach;?>
										<?php }?>

									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<?php echo isset($page_html)?$page_html:''; ?>
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
			<div class="loading-bg">
				<div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div>
			</div>
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>
		</div>

		<!--对话框-->
		<div id="dialog-edit" class="hide">
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script type="text/javascript">
			window.kindeditorUpUrl='<?=site_url()?>/shop/admin/product/productList?isUpfile=1';
		</script>
		<script src="{__STATIC_URL__}/public/yiyuan/admin/product/list.js"></script>
	</body>

</html>
