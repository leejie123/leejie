
<!DOCTYPE html>
<!-- saved from url=(0041)http://vendor.yedadou.com/UserCenter/Fans -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>商品列表</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="http://static.yedadou.com/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css">
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
							<li class="">
								<a  href="http://vendor.yedadou.com/UserCenter/Fans#tab1">商品列表</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="http://vendor.yedadou.com/UserCenter/Fans#tab1">商品往期</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
										<form method="post" action="" >
										<!--<button class="btn btn-info btn-sm" id="sureAdd" type="submit"><i class="ace-icon fa fa-plus"></i> 确认添加</button>-->
										<div class="pull-right clearfix">
											<div class="pull-left">
												<label>
													<input type="text" placeholder="商品名称/关键字">
												</label>
											</div>
											<div class="input-group search-width pull-right">
												<input type="text" placeholder="商品编码">
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
											<th class="center" width="100">ID</th>
											<th class="center" width="500">商品名称</th>
											<th class="center" width="300">期数</th>
											<th class="center" width="250">已参与/总需</th>
											<th class="center" width="250">单价（元）</th>
											<th class="center" width="300">限时</th>
											<th class="center" width="300">揭晓时间</th>
											<th class="center" width="300">中奖者</th>
											<th class="center" width="300">操作</th>
										</tr>
									</thead>

									<tbody>
										<!--data-id表示该行数据的ID-->		
									    										
										<tr id="row-1" data-id="oIIZ6s3zp-ZCdiEHiDI6GjGA6hc0" data-uid="1" data-authid="84bf1+uJ62Yry4B1BgFwhWxTyHAdGLvTZbHIgAoJ">
											<td class="center">
												1
											</td>	
											<td class="" valign="middle">
													<span>韩版秋装女装大码韩版秋装女装大码韩版秋装女装大码韩版秋装女装大码</span>	
													
											</td>
											<td class="center"><span class="color-orange">3</span>/<span>15615</span></td>
											<td class="center"><span class="color-orange">3</span>/<span>15615</span></td>
											<td class="center color-orange">100</td>
											<td class="center">未设置</td>
											<td class="center"><span class="color-orange">进行中...</span>or <span>2015-12-12 11:11</span></td>
											<td class="center">会员昵称</td>
											<td class="center">
												<a href="http://1047.m.yedadou.com/shop/test/index?tplName=buydetail" class="pass line-h-15" data-id="pass">查看</a>
											</td>
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

		<!--对话框-->
		

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
		<script type="text/javascript">
			General.initCheckbox();
		</script>
	</body>
	</html>