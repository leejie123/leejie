<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>运费设置</title>
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
								<a data-toggle="tab" href="#tab1">运费设置</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="post" action="" enctype="multipart/form-data">
										<button class="btn btn-danger btn-sm" id="delete" type="button"><i class="ace-icon fa fa-trash-o"></i> 删除</button>
										<a class="btn btn-info btn-sm" id="add" href="/shop/admin/config/freight/add"><i class="ace-icon fa fa-plus"></i> 添加</a>
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
											<th class="center" width="100">序号</th>
											<th class="center">名称</th>
											<th class="center">运费模式</th>
											<th class="center" width="100">设为默认</th>
											<th class="center" width="100">操作</th>
										</tr>
									</thead>
									<tbody>
										<!--data-id表示该行数据的ID-->
                                        <?php $i = 0; if($freight):?>
                                        <?php foreach($freight as $k=>$v): ?>
                                        <?php $i +=1;?>
                                                <?php $config = json_decode($v['config'], true);?>
                                                <?php if( !array_key_exists( 'is_fixed', $config )):?>
                                        <?php if( $i==1|| $i==3 ):?>
										<tr>
											<td class="" colspan="6"><strong>自定义运费</strong></td>
										</tr>
                                        <?php endif;?>
                                                <?php endif;?>
										<tr data-id="<?php echo $v['id'];?>">
											<td class="center">
												<label class="pos-rel">
													<input name="check-row" type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</td>
											<td class="center"><?php echo $v['id'];?></td>
											<td class="center"><?php echo $v['name'];?></td>
											<td class="text-left">
											</td>
											<td class="center">
												<label class="pos-rel first-radio">
													<input data-href="/shop/admin/config/freight/update?id=<?php echo $v['id'];?>&&isDefault=1" name="isDefault" type="radio" class="ace" value="<?php echo $v['id'];?>" <?php echo $v['is_default'] ? 'checked' : ''?>>
													<span class="lbl"></span>
												</label>
											</td>
											<td class="center">
												<a href="/shop/admin/config/freight/update?id=<?php echo $v['id'];?>" class="blue" data-id="edit">编辑</a> &nbsp;&nbsp;
                                                <?php if( ! array_key_exists( 'is_fixed', $config )):?>
												<a href="#" class="blue" data-id="delete">删除</a>
                                                <?php endif;?>
											</td>
										</tr>
                                        <?php endforeach;?>
                                        <?php endif;?>
									</tbody>
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
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/freight/index.js"></script>
	</body>

</html>