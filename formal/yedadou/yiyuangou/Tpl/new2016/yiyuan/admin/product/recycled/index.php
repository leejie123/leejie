<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>商品回收站</title>
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
								<a data-toggle="tab" href="#tab1">商品回收站</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">

								<div class="table-head-toolbar clearfix">
									<form method="get" action="/yiyuan/admin/product/Recycled">
										<div class="pull-right clearfix">
											<div class="pull-left">
												<input id="productId" name="productId" type="text" class="pid" placeholder="商品ID" value="<?=isset($search['id'])?$search['id']:'';?>">
												<input id="productName" name="productName" type="text" class="pname" placeholder="商品名称" value="<?=isset($search['title'])?$search['title']:'';?>">
												<input id="productCode" name="productCode" type="text" class="pcode" placeholder="商品编码" value="<?=isset($search['code'])?$search['code']:'';?>">
											</div>
											<div class="pull-left">
												<label>
													&nbsp;
													<select id="category" name="category">
														<option value="0" selected>所有分类</option>
														<?php if(!empty($productCate)){?>
														<?php $category = isset($search['category'])?$search['category']:'';?>
														<?php foreach ($productCate as $key=>$value):?>
														<?php if($value['is_parent']){?>
															<option value="<?php echo $value['id'];?>" <?=isset($category) && $category== $value['id']?'selected':'';?>><?php echo $value['name'];?></option>
															<?php if(!empty($value['sub_cate'])){?>
															<?php foreach ($value['sub_cate'] as $k=>$val):?>
															  <option value="<?php echo $val['id'];?>" <?=isset($category) && $category== $val['id']?'selected':'';?>>&nbsp;&nbsp;&nbsp;<?php echo $val['name']?></option>
															<?php endforeach;?>
															<?php }?>
														<?php }else{?>
															<option value="<?php echo $value['id'];?>" <?=isset($category) && $category== $value['id']?'selected':'';?>><?php echo $value['name'];?></option>
														<?php }?>
														<?php endforeach;?>
														<?php }?>
													</select>
													&nbsp;
												</label>
											</div>
											<div class="pull-left span-label" id="returnShowLabel">加入时间:</div>
										    <div class="input-group input-daterange pull-left">
												<input id="startTime" name="startTime" type="text" class="form-control" value="<?=isset($search['start'])?$search['start']:'';?>"/>
												<span class="input-group-addon">
												<i class="fa fa-exchange"></i>
											</span>
												<input id="endTime" name="endTime" type="text" class="form-control" value="<?=isset($search['end'])?$search['end']:'';?>"/>
											</div>
											<button type="submit" class="btn btn-info btn-sm pull-left">
												<i class="ace-icon fa fa-search bigger-110"></i> 搜索
											</button>
											<input name="act" type="hidden" value="search"/>
										</div>
									</form>
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
											<th class="center">分类</th>
											<th class="center" width="100">商品ID</th>
											<th class="center" width="100">属性</th>
											<th class="center" width="100">排序</th>
											<th class="center" width="100">已参与/总需</th>
											<th class="center" width="100">单价(元)</th>
											<th class="center" width="100">期数/总期数</th>
											<th class="center" width="100">操作</th>
										</tr>
									</thead>

									<tbody>
										<!--data-id表示该行数据的ID-->
										<?php if(!empty($products)){?>
										<?php foreach ($products as $key=>$value):?>
												<tr id="row-<?php echo $key; ?>" data-id="<?php echo isset($value['id'])?$value['id']:''; ?>">
											<td class="center">
												<label class="pos-rel">
													<input name="check-row" type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</td>
											<td class="product-wrapper">
												<a href="#">
													<img src="<?php echo isset($value['pic_url'])?$value['pic_url'].'_80x80.jpg':''; ?>" class="table-image pull-left">
												</a>
												<div class="product-info">
													<a href="#" class="blue">
														<span class="title"><?php echo isset($value['title'])?$value['title']:''; ?></span>
													</a>
													<span class="code">商家编码：<?php echo isset($value['code'])?$value['code']:''; ?></span>
												</div>
											</td>
											<td class="center" valign="middle"><?php echo isset($value['cid_name'])?"【".$value['cid_name']."】":''; ?><?php echo val($value,'sub_cid_name','')?"【".$value['sub_cid_name']."】":''; ?></td>
											<td class="center" valign="middle"><?php echo $value['id'];?></td>
											<td class="center blue" valign="middle">
											<?php 
												if($value['tag_recommend']>0) echo '【推荐】</br>';
												if($value['tag_popular']>0) echo '【人气】</br>';
												if($value['tag_new']>0) echo '【新品】';
												if($value['tag_stocking']>0) echo '【年货】';
											?>
											</td>
											<td class="center font-red" valign="middle">1</td>
											<td class="center"><?php echo $value['buy_num'];?></span>/<?php echo $value['code_num'];?></td>
											<td class="center"><?php echo $value['code_price'];?></td>
											<td class="center"><?php echo $value['over_term'];?>/<?php echo $value['term_num'];?></td>
											<td class="center"> 
												<a href="/yiyuan/admin/product/Recycled/update?act=update&id=<?php echo isset($value['id'])?$value['id']:''; ?>" class="blue" data-id="edit">重新开始</a>
												<a href="#" data-url="/yiyuan/admin/product/Recycled/update?act=del&id=<?php echo isset($value['id'])?$value['id']:''; ?>" class="blue" data-id="delete">删除</a>
												<a href="/yiyuan/admin/product/ProductPast/get?goods_id=<?php echo isset($value['id'])?$value['id']:''; ?>" class="blue">往期</a>
											</td>
										</tr>
										<?php endforeach;?>
										<?php }?>
									
									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<div class="pull-left">
<!-- 										<button class="btn btn-danger btn-sm" id="delete2" type="button"><i class="ace-icon fa fa-trash-o"></i> 删除</button> -->
<!-- 										<button class="btn btn-info btn-sm" id="onShelf2" type="button"><i class="ace-icon fa fa-arrow-up"></i> 上架</button> -->
<!-- 										<button class="btn btn-info btn-sm" id="offShelf2" type="button"><i class="ace-icon fa fa-arrow-down"></i> 下架</button> -->
									</div>							
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