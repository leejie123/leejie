<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>商品分类</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/js/treetable/css/jquery.treetable.css,/js/treetable/css/jquery.treetable.theme.default.css,/admin/css/shop/product/category/index.css" />
		<style>
			/*分类图标,title-icon后的数字是对应的id号*/
			
			<?php if(!empty($productCate)){?>
			<?php foreach ($productCate as $key=>$value):?>
			span.title-icon<?php echo $value['id'];?> {
			  background-image: url(<?php echo $value['pic_url'];?>) !important;
			  background-size: 16px 16px;
			}
			<?php if(isset($value['sub_cate'])){?>
			<?php foreach ($value['sub_cate'] as $k=>$val):?>
			span.title-icon<?php echo $val['id'];?> {
			  background-image: url(<?php echo $val['pic_url'];?>) !important;
			  background-size: 16px 16px;
			}
			<?php endforeach;?>
			<?php }?>
			<?php endforeach;?>
			<?php }?>
		</style>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1">商品分类</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">

								<!--表格-->
								<!--顶部工具条-->
								<!-- 计算当前最大的排序值 -->
								<?php 
											$sort_order = 0;
											if(!empty($productCate)){
												$data = end($productCate);												
												$sort_order = $data['sort_order'];
										 	}
										 	$sort_order += 1;
										 	?>
								<div class="table-head-toolbar clearfix">
									<a class="btn btn-info btn-sm" id="add" href="javascript:void(0);" data-order=<?php echo $sort_order;?>><i class="ace-icon fa fa-plus"></i> 添加分类</a>
								</div>
								<!--<table id="dynamic-table" class="table table-striped  table-hover table-vertical-middle">-->
								<form action="/yiyuan/admin/product/category"  method='post'>
								<table id="dynamic-table" class="">
									<thead>
										<tr>
											<th class="center" width="200">分类</th>
											<th class="center" width="100">分类ID</th>
											<th class="center" width="100">排序</th>
											<th class="center" width="100">是否显示</th>
											<th class="center" width="">链接</th>
											<th class="center" width="200">操作</th>
										</tr>
									</thead>

									<tbody>
										<!--data-id表示该行数据的ID-->
										
										<?php if(!empty($productCate)){?>
										<?php foreach ($productCate as $key=>$value):?>
										
										<!-- 计算当前最大的排序值 -->
										<?php  
											$sort_order = 0;
											if(!empty($value['sub_cate'])){
												$data = end($value['sub_cate']);
												$sort_order = $data['sort_order'];
										 	}
										 	$sort_order +=1;
										 	?>
										<tr data-tt-id="<?php echo $value['id']?>" data-id="<?php echo $value['id'];?>" data-order=<?php echo $sort_order;?> >
											<td class="center" valign="middle"><span class='title-icon<?php echo $value['id'];?>'><?php echo $value['name'];?></span></td>
											<td class="center"><?php echo $value['id']; ?></td>
											<td class="center"><?php echo $value['sort_order'];?></td>
											<td class="center">
												<label class="pos-rel">
													<input class="parent ace"   type="checkbox"  <?php echo $value['display']?'checked':''; ?> />											
													<span class="lbl"></span>
													<input class="parent"  type='hidden' name="display[<?php echo $value['id']?>]" value="<?php echo $value['display']?>">
												</label>
											</td>
											<td class="center">
												<input name="link[]" type="text" class="form-control" readonly="readonly" value="<?php echo site_url()."/shop/ShopGoods/ProductList?cid=".$value['id'];?>" placeholder="">
											</td>
											<td class="text-left">
												<a href="javascript:void(0);" class="blue" data-id="edit">编辑</a> &nbsp;&nbsp;
												<a href="javascript:void(0);" class="blue" data-id="delete">删除</a> &nbsp;&nbsp;
												<a href="javascript:void(0);" class="blue" data-id="add">添加子分类</a>
											</td>
										</tr>
										<?php if(isset($value['sub_cate'])){?>
										<?php foreach ($value['sub_cate'] as $k=>$val):?>
											<tr data-tt-parent-id="<?php echo $value['id']?>" data-tt-id="<?php echo $val['id']?>" data-id="<?php echo $val['id']?>" >
												<td class="center" valign="middle"><span class='title-icon<?php echo $val['id']?>'><?php echo $val['name']?></span></td>
												<td class="center"><?php echo $val['id']?></td>
												<td class="center"><?php echo $val['sort_order']?></td>
												<td class="center">
													<label class="pos-rel">
														<input class="sub ace"  type="checkbox" <?php echo $val['display']?'checked':''; ?> />														
														<span class="lbl"></span>
														<input type='hidden' name="display[<?php echo $val['id']?>]" value="<?php echo $val['display']?>">
													</label>
												</td>
												<td class="center">
													<input name="link[]" type="text" class="form-control" readonly="readonly" value=" <?php echo site_url()."/shop/ShopGoods/ProductList?sub_cid=".$val['id'];?> " placeholder="">
												</td>
												<td class="text-left">
													<a href="javascript:void(0);" class="blue" data-id="edit">编辑</a> &nbsp;&nbsp;
													<a href="javascript:void(0);" class="blue" data-id="delete">删除</a>
												</td>
											</tr>
										<?php endforeach;?>
										<?php }?>

										<?php endforeach;?>
										<?php }?>
										
									
									</tbody>
								</table>
								<!--表格结束-->
                                <div class="space"></div>
									<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit"><i class="ace-icon fa"></i> 保存</button>
									<div class="space"></div>
								
								</form>
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
		<script src="{__STATIC_URL__}/public/js/treetable/jquery.treetable.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script type="text/javascript">
			window.kindeditorUpUrl='<?=site_url()?>/yiyuan/common/upLoad';
		</script>
		<script src="{__STATIC_URL__}/public/yiyuan/admin/category/index.js"></script>
	</body>

</html>