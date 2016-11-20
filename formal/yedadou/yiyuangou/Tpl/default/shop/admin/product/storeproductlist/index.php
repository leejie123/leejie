<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>门店商品列表</title>
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
								<a data-toggle="tab" href="#tab1">门店商品列表</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">

								<div class="clearfix">
									<form method="get" action="/shop/admin/product/storeProductList" enctype="multipart/form-data">
										<div class="pull-right clearfix">
											<div class="pull-left">
											   <input name="search"  value='1' type="hidden" >
											   <input name="forWidget"  value='<?=$forWidget?>' type="hidden" >
												<input id="productId" value="<?php if(!empty($goods_id))echo $goods_id; ?>" name="goods_id" type="text" class="pid" placeholder="商品ID">
												<input id="productName" value="<?php if(!empty($title))echo $title; ?>" name="title" type="text" class="pname" placeholder="商品名称">
												<input id="productCode" value="<?php if(!empty($code))echo $code; ?>" name="code" type="text" class="pcode" placeholder="商品编码">
											</div>
											<div class="pull-left">
												<label>
													&nbsp;
													<select id="category" name="category">
														<option value="0" selected>所有分类</option>
														<?php if(!empty($productCate)){?>													
														<?php foreach ($productCate as $key=>$value):;?>
														
														<?php if($value['is_parent']){?>
															<option value="cid=<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
															<?php if(!empty($value['sub_cate'])){?>
															<?php foreach ($value['sub_cate'] as $k=>$val):?>
															  <option value="sub_cid=<?php echo $val['id'];?>"  <?php if(!empty($cate_id)&&$cate_id==$val['id'] )echo 'selected' ?>>&nbsp&nbsp&nbsp<?php echo $val['name']?></option>
															<?php endforeach;?>
															<?php }?>
														<?php }else{?>
															<option value="cid=<?php echo $value['id'];?>" <?php if(!empty($cate_id)&&$cate_id==$value['id'])echo 'selected' ?>><?php echo $value['name'];?></option>
														<?php }?>
														<?php endforeach;?>
														<?php }?>
														
													</select>
													&nbsp;
												</label>
												<label>
												    是否上架
													<select id="isOnShelf" name="status">
														<option value="0" selected>全部</option>
														<option value="1">上架</option>
														<option value="2">未上架</option>
													</select>
													&nbsp;
												</label>
											</div>
											<button type="submit" class="btn btn-info btn-sm pull-left">
												<i class="ace-icon fa fa-search bigger-110"></i> 搜索
											</button>
										</div>
									</form>
								</div>
								<div class="space-4"></div>
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="post" action="" enctype="multipart/form-data">
										<button class="btn btn-danger btn-sm" id="delete" type="button"><i class="ace-icon fa fa-trash-o"></i> 删除</button>
										<button class="btn btn-info btn-sm" id="onShelf" type="button"><i class="ace-icon fa fa-arrow-up"></i> 上架</button>
										<button class="btn btn-info btn-sm" id="offShelf" type="button"><i class="ace-icon fa fa-arrow-down"></i> 下架</button>
										<a class="btn btn-success btn-sm" id="id-add" href="/shop/admin/product/addStoreProduct"><i class="ace-icon fa fa-plus"></i> 添加商品</a>
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
											<th class="center" width="400">商品名称</th>
											<th class="center">商品URL</th>
											<th class="center" width="100">分类</th>
											<th class="center" width="100">商品排序</th>
											<th class="center" width="100">微信价格</th>
											<th class="center" width="100">微信库存</th>
											<th class="center" width="100">微信销量</th>
											<th class="center" width="100">商品状态</th>
											<th class="center" width="150">添加时间</th>
											<th class="center" width="100">操作</th>
										</tr>
									</thead>

									<tbody>
										<!--data-id表示该行数据的ID-->
										<?php if(!empty($products)){?>
										<?php foreach ($products as $key=>$value):?>
												<tr id="row-<?php echo $key; ?>" data-id="<?php echo isset($value['goods_id'])?$value['goods_id']:''; ?>">
											<td class="center">
												<label class="pos-rel">
													<input name="check-row" type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</td>
											<td class="product-wrapper">
												<a href="javascript:void(0);">
													<img src="<?php echo isset($value['pic_url'])?$value['pic_url'].'_80x80.jpg':''; ?>" class="table-image pull-left">
												</a>
												<div class="product-info">
<!-- 													<a href="javascript:void(0);" class="blue"> -->
														<span class="title"><?php echo isset($value['title'])?$value['title']:''; ?></span>
<!-- 													</a> -->
													<span class="code"><?php echo isset($value['code'])?$value['code']:''; ?></span>
												</div>
											</td>
											<td class="center"><?php echo site_url()."/shop/shopGoods/ProductDetails?id=".$value['goods_id']; ?></td>									
											<td class="center"><?php 
											if(!empty($productCate)){
									           
												$cid_name = '';
												$sub_cid_name = '';
												if(!empty($value['cid'])){
													$cid_name = isset($productCate[$value['cid']]['name'])?$productCate[$value['cid']]['name']:'';
												}
												if(!empty($value['sub_cid'])){
													if(!empty($productCate[$value['cid']]['sub_cate'])){
														foreach ($productCate[$value['cid']]['sub_cate'] as $item){														
															if($item['id'] == $value['sub_cid'])
																$sub_cid_name= $item['name'];
														}
													}
												}
												echo $cid_name.$sub_cid_name;
											}
												
											?></td>
											<td class="center"><?php echo isset($value['sort_order'])?$value['sort_order']:''; ?></td>
											<td class="center font-red" valign="middle"><?php echo isset($value['wx_price'])?$value['wx_price']:''; ?></td>
											<td class="center"><?php echo isset($value['wx_stock'])?$value['wx_stock']:''; ?></td>
											<td class="center"><?php echo isset($value['sale_num'])?$value['sale_num']:''; ?></td>
											<td class="center">
											<?php 
											
											$status = isset($value['status'])?$value['status']:'';
											switch ($status){
												
												case 1:
													echo '上架';
													break;
												case 2: 
													echo '下架';
													break;
												case 3:
													echo '定时';
													break;
												default:
													echo '未设定';
											}
											?>
											
											</td>
											<td class="center"><?php echo isset($value['add_time'])?date('Y-m-d H:i:s',$value['add_time']):''; ?></td>
											<td class="center"> 
												<?php if($forWidget!='1'){?>
												<a href="/shop/admin/product/updateStoreProduct?page_no=<?php echo empty($page_no)?0:$page_no;?>&goods_id=<?php echo isset($value['goods_id'])?$value['goods_id']:''; ?>" class="blue" data-id="edit">编辑</a>
												<a href="javascript:void(0);" class="blue" data-id="delete">删除</a>
												<?php }else{?>
												<?php //fei 2015-10-22  所于挂件选择商品信息里，弹出的地址会调用这个页面，并通过下面选择来进行传值?>
												<a href="#" class="blue" data-sent="<?php
												//id
												echo isset($value['goods_id'])?$value['goods_id']:'';
												echo ',';
												//标题
												echo isset($value['title'])?$value['title']:'';
												echo ',';
												//图片地址
												 echo isset($value['pic_url'])?$value['pic_url']:''; 
												 echo ',';
												 //连接地址
												 echo site_url()."/shop/shopGoods/ProductDetails?id=".$value['goods_id'];
												  echo ',';
												 //价格
												 echo isset($value['wx_price'])?$value['wx_price']:'';
												?>" data-id="forWidgetSelectPro">选择</a>
												<?php }?>
											</td>
										</tr>
										<?php endforeach;?>
										<?php }?>
									
									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<div class="pull-left">
										<button class="btn btn-danger btn-sm" id="delete2" type="button"><i class="ace-icon fa fa-trash-o"></i> 删除</button>
										<button class="btn btn-info btn-sm" id="onShelf2" type="button"><i class="ace-icon fa fa-arrow-up"></i> 上架</button>
										<button class="btn btn-info btn-sm" id="offShelf2" type="button"><i class="ace-icon fa fa-arrow-down"></i> 下架</button>
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
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script type="text/javascript">
			window.kindeditorUpUrl='<?=site_url()?>/shop/common/upLoad';
		</script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/product/storeproduct/index.js"></script>
	</body>

</html>