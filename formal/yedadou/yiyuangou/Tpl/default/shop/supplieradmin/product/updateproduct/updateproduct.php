<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>编辑门店商品</title>
		<meta name="iewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap-datetimepicker.css,/admin/css/shop/product/list/add.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li>
								<a href="/shop/admin/product/storeProductList">门店商品列表</a>
							</li>
							<li class="active">
								<a data-toggle="tab" href="#tab1"><i class="ace-icon fa fa-edit"></i> 编辑商品</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<form method="post" action="/shop/admin/product/updateStoreProduct?page_no=<?php echo empty($page_no)?0:$page_no;?>" >
								<input type='hidden' value="<?php echo $goods_id;?> " name='goods_id'/>
									<div class="space-2"></div>
									<div class="tabbable">
										<ul class="nav nav-tabs" id="productTab">
											<li class="">
												<a data-toggle="tab" href="#t1">基本信息</a>
											</li>
											<li class="">
												<a data-toggle="tab" href="#t2">商品参数</a>
											</li>											
											<li class="">
												<a data-toggle="tab" href="#t4">分销设置</a>
											</li>
											<li class="">
												<a data-toggle="tab" href="#t5">其它设置</a>
											</li>
										</ul>

										<div class="tab-content padding-0 pt10">
											<div id="t1" class="tab-pane active clearfix">
											
											 <div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>排序：</strong></label>
													</div>
													<div class="control-wrapper short">													
														<label>
															<input name="sort_order" type="text"  value="<?php echo $productShopStoreGoods['sort_order'];?>" >			
														</label>																																										
													</div>
												</div>
												
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>商品分类：</strong></label>
													</div>
													<div class="control-wrapper short">
														<!--分类数据-->
														<input type="hidden" name="categoryData" id="categoryData" value='<?php echo $cateJson;?>' /> 
														<select id="category1" name="category1" data-tip="请选择一级分类">
														<?php if(!empty($cate)){?>
														<?php if(empty($productShopGoods['cid']) ||empty($productShopGoods['sub_cid']) ){?>
														<option  value="">请选择一级分类</option>
														<?php }?>
														<?php foreach ($cate as $key=>$value):?>
														<option  value="<?php echo $value['id']?>"  <?php if($productShopGoods['cid']==$value['id']) echo "selected";?>><?php echo $value['name']?></option>
														<?php endforeach;?>
														<?php }?>
														</select>
														&nbsp;
														<select id="category2" name="category2" data-tip="请选择二级分类">
														<?php if(!empty($cate)){?>
														<?php if(empty($productShopGoods['cid']) ||empty($productShopGoods['sub_cid'])){?>
														<option  value="">请选择二级分类</option>
														<?php }?>
														<?php foreach ($cate as $key=>$value):?>
														<?php if(!empty($value['sub_cate'])){?>
														<?php foreach ($value['sub_cate'] as $k=>$val):?>
														<option  value="<?php echo $val['id']?>" <?php if($productShopGoods['sub_cid']==$val['id']) echo "selected";?>><?php echo $val['name']?></option>
														<?php endforeach;?>
														<?php }?>							
														<?php endforeach;?>
														<?php }?>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="title"><strong>商品标题：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="title" name="title" type="text" class="form-control" value="<?php echo $productShopGoods['title']?>" placeholder="最多只能输入30个汉字或60个英文字符" />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="subTitle"><strong>商品副标题：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="subTitle" name="sub_title" type="text" class="form-control" value="<?php echo $productShopGoods['sub_title']?>" placeholder="" />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>是否上架：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div>
															<label>
																<input name="shelf" type="radio" class="ace" value="1" <?php echo $productShopStoreGoods['status']==1?'checked':''; ?> />
																<span class="lbl"> 立即上架</span>
															</label>
															&nbsp;
															<label>
																<input name="shelf" type="radio" class="ace" value="2" <?php echo $productShopStoreGoods['status']==2?'checked':'';?> />
																<span class="lbl"> 暂不上架</span>
															</label>
															&nbsp;
															<label>
																<input name="shelf" type="radio" class="ace" value="3" <?php echo $productShopStoreGoods['status']==3?'checked':''; ?> />
																<span class="lbl"> 定时上下架</span>
															</label>
														</div>
														<div id="shelfTimeContainer" class="time-container <?php echo $productShopStoreGoods['status']!=3?'hide':''; ?>">
															<label class="" for="upTime">上架时间：</label>
															<input id="upTime" name="upTime" type="text" class="" value="<?php echo $productShopStoreGoods['list_time']?date('Y-m-d H:i',$productShopStoreGoods['list_time']):null;?>" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<label class="" for="downTime">下架时间：</label>
															<input id="downTime" name="downTime" type="text" class="" value="<?php echo $productShopStoreGoods['off_list_time']?date('Y-m-d H:i',$productShopStoreGoods['off_list_time']):null;?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="wx_price"><strong>微信价：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="<?php echo $productShopStoreGoods['wx_price']?>" name="wx_price" id="wx_price" class="form-control" placeholder="">
															<span class="input-group-addon">元</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="marketPrice"><strong>市场价：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="<?php echo $productShopGoods['market_price']?>" name="market_price" id="marketPrice" class="form-control" placeholder="">
															<span class="input-group-addon">元</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="costPrice"><strong>成本价：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="<?php echo $productShopGoods['cost_price']?>" name="cost_price" id="costPrice" class="form-control" placeholder="">
															<span class="input-group-addon">元</span>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="serialNumber"><strong>编码：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="serialNumber" name="code" type="text" class="form-control" value="<?php echo $productShopGoods['code']?>" placeholder="" />
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>库存信息：</strong></label>
													</div>
													<div class="control-wrapper short">
														<table class="table table-striped table-bordered table-hover table-vertical-middle">
															<thead>
																<tr>
																<?php 
																												
																	$data= isset($productShopGoodsConfig['sku_name'])?$productShopGoodsConfig['sku_name']:'';
																	$sku_name =json_decode($data,true);
																	
																?>
																	
																	<th class="center"><input type="text" value="<?php echo empty($sku_name[0])?'属性1':$sku_name[0]?>" name="sku_name[]" class="form-control" placeholder=""></th>
																	<th class="center"><input type="text" value="<?php echo empty($sku_name[0])?'属性2':$sku_name[1]?>" name="sku_name[]" class="form-control" placeholder=""></th>
																	<th class="center">价格</th>
																	<th class="center">库存</th>
																	<th class="center" width="70">操作</th>
																</tr>
															</thead>
															<?php 
						
															$data= isset($productShopGoodsConfig['sku'])?$productShopGoodsConfig['sku']:'';
															$sku =json_decode($data,true);												
															?>
															<tbody id="parameterTable">
															<?php if(!empty($sku)){?>
															<?php foreach ($sku as $key=>$value):?>
																<tr>
																	<td class="">
																		<input type="text" value="<?php echo $value['param1'];?>" name="sku[param1][]" class="form-control" placeholder="">
																	</td>
																	<td class="">
																		<input type="text" value="<?php echo $value['param2'];?>" name="sku[param2][]" class="form-control" placeholder="">
																	</td>
																	<td class="">
																		<input type="text" value="<?php echo $value['price'];?>" name="sku[price][]" class="form-control" placeholder="">
																	</td>
																	<td class="">
																		<input type="text" value="<?php echo $value['stock'];?>" name="sku[stock][]" class="form-control" placeholder="">
																	</td>
																	<td class="center pt14">
																		<a href="#" class="blue" data-id="delete">删除</a>
																	</td>
																</tr>
																
																<?php endforeach;?>
																<?php }?>
															</tbody>
														</table>
														<div class="space-4"></div>
														<button class="btn btn-info btn-xs" id="add" type="button"><i class="ace-icon fa fa-plus"></i> 增加</button>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="wx_stock"><strong>微信库存：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="<?php echo $productShopStoreGoods['wx_stock']?>" name="wx_stock" id="wx_stock" class="form-control" placeholder="">
															<span class="input-group-addon">件</span>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="sale_num"><strong>微信销量：</strong></label>
													</div>
													<div class="control-wrapper short">
														<div class="input-group ">
															<input type="text" value="<?php echo $productShopStoreGoods['sale_num']?>" name="sale_num" id="sale_num" class="form-control" placeholder="初始基数">
															<span class="input-group-addon">件</span>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong style="display: block;">商品图片：</strong><span  class="font-red" style="float: left;">(单张<2M)</span></label>
													</div>
													<div class="control-wrapper ">
														<ul class="image-list" id="imageList">
														<?php
														 $data= isset($productShopGoodsConfig['img_list'])?$productShopGoodsConfig['img_list']:'';				 
														 $img_list =json_decode($data);
														 if(!empty($img_list)){
														 foreach ($img_list as $key=>$value):
														?>
															<li>
																<img id="previewImage<?php echo $key+1;?>" class="preview-image" src="<?php echo $value?$value:'{__STATIC_URL__}/public/admin/images/noupload.png' ;?>" >
																<input type="hidden" name="img_list[]" id="imageUrl<?php echo $key+1;?>" value="<?php echo $value;?>" />
																<button class="btn btn-info btn-xs" id="upload<?php echo $key+1;?>" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel<?php echo $key+1;?>" type="button">删除</button>
															</li>
														<?php endforeach;?>
														<?php }else{?>
														<li>
																<img id="previewImage1" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
																<input type="hidden" name="img_list[]" id="imageUrl1" value="" />
																<button class="btn btn-info btn-xs" id="upload1" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel1" type="button">删除</button>
															</li>
															<li>
																<img id="previewImage2" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
																<input type="hidden" name="img_list[]" id="imageUrl2" value="" />
																<button class="btn btn-info btn-xs" id="upload2" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel2" type="button">删除</button>
															</li>
															<li>
																<img id="previewImage3" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
																<input type="hidden" name="img_list[]" id="imageUrl3" value="" />
																<button class="btn btn-info btn-xs" id="upload3" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel3" type="button">删除</button>
															</li>
															<li>
																<img id="previewImage4" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
																<input type="hidden" name="img_list[]" id="imageUrl4" value="" />
																<button class="btn btn-info btn-xs" id="upload4" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel4" type="button">删除</button>
															</li>
															<li>
																<img id="previewImage5" class="preview-image" src="{__STATIC_URL__}/public/admin/images/noupload.png" onerror="this.src='{__STATIC_URL__}/public/admin/images/noupload.png'">
																<input type="hidden" name="img_list[]" id="imageUrl5" value="" />
																<button class="btn btn-info btn-xs" id="upload5" type="button">上传</button>
																<button class="btn btn-info btn-xs" id="uploaddel5" type="button">删除</button>
															</li>
														
														<?php }?>
														</ul>
													</div>
												</div> 
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="description"><strong>商品详情：</strong></label>
													</div>
													<div class="control-wrapper long">
														<textarea id="description" name="desc" class="form-control height80" placeholder=""><?php echo isset($productShopGoodsConfig['desc'])?$productShopGoodsConfig['desc']:'';?></textarea>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>运费模式：</strong></label>
													</div>
													<div class="control-wrapper">
													
														<label class="pos-rel mr20">								
																<input name="alone_freight" type="checkbox"  class="ace" value="1" <?php echo $productShopStoreGoods['alone_freight']==1?'checked':null; ?> >
																<span class="lbl">独立运费</span>
																
														</label>
														<label id="alone_freight_fee" class="time-container <?php echo $productShopStoreGoods['alone_freight']==1?null:'hide'; ?>">
															<input name="alone_freight_fee" type="text" value='<?php echo $productShopStoreGoods['alone_freight_fee'];?>' placeholder="0">&nbsp;元
														</label>
													   <span class="help-block" style='color: #949494'>
																说明：启用独立运费，此商品将以设定的运费按件数形式进行计费
														</span>
													</div>
													
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>减库存：</strong></label>
													</div>
													<div class="control-wrapper short">
														<label>
															<input name="auto_inv" type="radio" class="ace" value="2" <?php echo $productShopStoreGoods['auto_inv']==2?'checked':''; ?>>
															<span class="lbl"> 付款减库存</span>
														</label>
														
														&nbsp;
														<label>
															<input name="auto_inv" type="radio" class="ace" value="1" <?php echo $productShopStoreGoods['auto_inv']==1?'checked':''; ?>>
															<span class="lbl"> 拍下减库存</span>
														</label>
														&nbsp;
														<label>
															<input name="auto_inv" type="radio" class="ace" value="0" <?php echo $productShopStoreGoods['auto_inv']==0?'checked':''; ?>>
															<span class="lbl"> 不减库存</span>
														</label>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>限购：</strong></label>
													</div>
													<div class="control-wrapper short">
													
														<label>
															<input name="limit" type="radio" class="ace" value="1" <?php echo $productShopGoods['type']!='limit'?'checked':''; ?>>
															<span class="lbl"> 不限购</span>
														</label>
														&nbsp;
														<label>
															<input name="limit" type="radio" class="ace" value="2" <?php echo $productShopGoods['type']=='limit'?'checked':''; ?>>
															<span class="lbl"> 限购</span>
														</label>
														<label id="purchaseCount" class="time-container <?php echo $productShopGoods['type']=='limit'?'':'hide'; ?>">
															<input name="limit_num" type="text" value='<?php echo $productShopGoods['limit_num']?>'>&nbsp;件
														</label>
													</div>
												</div>

											</div>
											<div id="t2" class="tab-pane active clearfix">												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="parameter"><strong>商品参数：</strong></label>
													</div>
													<div class="control-wrapper long">
														<textarea id="parameter" name="property" class="form-control height80" placeholder=""><?php echo isset($productShopGoodsConfig['property'])?$productShopGoodsConfig['property']:'' ?></textarea>
													</div>
												</div>
											</div>
											<div id="t4" class="tab-pane clearfix">
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>参与分销：</strong></label>
													</div>
													<div class="control-wrapper short">
														<label>
															<input name="is_commission" type="radio" class="ace" value="1" <?php echo $productShopStoreGoods['is_commission']==1?'checked':''; ?>>
															<span class="lbl"> 是</span>
														</label>
														&nbsp;&nbsp;&nbsp;
														<label>
															<input name="is_commission" type="radio" class="ace" value="2" <?php echo $productShopStoreGoods['is_commission']==2?'checked':''; ?>>
															<span class="lbl"> 否</span>
														</label>
													</div>
												</div>
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>自定义分销规则：</strong></label>
													</div>
													<div class="control-wrapper short">
														<label>
															<input id='commission_role_yes' name="commission_role" type="radio" class="ace" value="2" <?php echo $productShopStoreGoods['commission_role']==2?'checked':''; ?>>
															<span class="lbl"> 是</span>
														</label>
														&nbsp;&nbsp;&nbsp;
														<label>
															<input id='commission_role_no' name="commission_role" type="radio" class="ace" value="1"  <?php echo $productShopStoreGoods['commission_role']==1?'checked':''; ?>>
															<span class="lbl"> 否</span>
														</label>
													</div>
												</div>
												
												
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for="base"><strong>返佣基数：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="base" name="commission" type="text" class="form-control" value="<?php echo $productShopStoreGoods['commission']?>" placeholder="" />
														<span class="help-block">
															说明：佣金计算方式为：返佣基数*分佣比例，你也可以不设置返佣基数，系统默认商品单价为返佣基数。 
														</span>
													</div>
												</div>
												<div  id='fansCommission' <?php echo $productShopStoreGoods['commission_role']==1?'style="display:none"':''; ?>>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>代理商返佣比例：</strong></label>
													</div>
													<div class="control-wrapper short">
														<table class="table table-bordered">
															<tbody>
																<tr>
																	<th class="center" width="100">等级</th>
																	<th class="center">代理商名称</th>
																	<th class="center" width="150">分佣比例</th>
																</tr>
																<?php 
																$commission_config = json_decode($productShopStoreGoods['commission_config'],true);					
																?>
																
																<?php if(isset($commission['agent']['grade'])){?>
																<?php foreach ($commission['agent']['grade'] as $key=>$value):?>
																
																<tr>
																	<td class="center"><?php echo $key; ?></td>
																	<td class="center"><?php echo $value; ?></td>
																	<td class="center">
																		<div class="input-group short">
																			<input type="text" value="<?php echo isset($commission_config['agent'][$key])?$commission_config['agent'][$key]:''; ?>" name="percent[]" class="form-control"><span class="input-group-addon">%</span>
																		</div>
																	</td>
																</tr>
																
																<?php endforeach;?>
																<?php }else{?>
																
																<a href="javascript:void(0);">请联系管理员设置代理商等级</a>
																<?php }?>
																
															</tbody>
														</table>
													</div>
												</div>
												<div class="form-group">
													<div class="label-wrapper">
														<label class="" for=""><strong>粉丝返佣比例：</strong></label>
													</div>
													<div class="control-wrapper short">
														<table class="table table-bordered">
															<tbody>
																<tr>
																	<th class="center">粉丝层级</th>
																	<th class="center">全局分佣比例</th>
																	<th class="center" width="150">自定义分佣比例</th>
																</tr>
																<tr>
																	<td class="center">厂家</td>
																	<td class="center"></td>
																	<td class="center"></td>
																</tr>
																<?php 
																$commission_config = json_decode($productShopStoreGoods['commission_config'],true);
																if(!empty($commission_config['share'])){		
																$count = count($commission_config['share']);																														
																?>
																<?php foreach ($commission_config['share'] as $key=>$value):?>
																
																<?php if($key+1 == $count){?>
																<tr>
																	<td class="center">购买者</td>
																	<td class="center"><?php echo isset($commission['fans'][$key])?$commission['fans'][$key]:''; ?></td>
																	<td class="center">
																		<div class="input-group short">
																			<input type="text" value="<?php echo $value; ?>" name="share[]" class="form-control"><span class="input-group-addon">%</span></div>
																	</td>
																</tr>
																<?php }else{?>
																<tr>
																	<td class="center">分享者</td>
																	<td class="center"><?php echo !empty($commission['fans'][$key])?$commission['fans'][$key]:''; ?></td>
																	<td class="center">
																		<div class="input-group short">
																			<input type="text" value="<?php echo $value; ?>" name="share[]" class="form-control"><span class="input-group-addon">%</span></div>
																	</td>
																</tr>
																<?php }?>
																<?php endforeach;?>
																<?php }else{?>
																<?php if(!empty($commission['fans'])){?>									
																<?php $count = count($commission['fans']);?>
																<?php foreach ($commission['fans'] as $key=>$value):?>
																
																<?php if($key+1 == $count){?>
																<tr>
																	<td class="center">购买者</td>
																	<td class="center"><?php echo $value; ?></td>
																	<td class="center">
																		<div class="input-group short">
																			<input type="text" value="" name="share[]" class="form-control"><span class="input-group-addon">%</span></div>
																	</td>
																</tr>
																
																<?php }else{?>
																<tr>
																	<td class="center">分享者</td>
																	<td class="center"><?php echo $value; ?></td>
																	<td class="center">
																		<div class="input-group short">
																			<input type="text" value="" name="share[]" class="form-control"><span class="input-group-addon">%</span></div>
																	</td>
																</tr>
																<?php }?>
																<?php endforeach;?>
																<?php }?>
																<?php }?>
																
															</tbody>
														</table>
														<span class="help-block">
															佣金比例总和不能超过100% 
														</span>
													</div>
												</div>
												</div>
											</div>

									<div id="t5" class="tab-pane clearfix">
												<div class="form-group" >
													<div class="label-wrapper">
														<label class="" for=""><strong>购买本商品可获得：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="base" name="afterBuyPoint" type="text" value="<?php echo json_decode(val($productShopGoodsPoint,'afterBuyPoint', 0));?>" style="width: 200px;"/>&nbsp;积分
													</div>
												</div>
												<div class="form-group" >
													<div class="label-wrapper">
														<label class="" for=""><strong>分享本商品获得:</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="base" name="afterSharePoint" type="text" value="<?php echo json_decode(val($productShopGoodsPoint,'afterSharePoint', 0));?>" style="width: 200px;" />&nbsp;积分
														<!--&nbsp;&nbsp;最多可获得:<input id="base" name="pointObtain" type="text" value="<?php //echo json_decode(val($productShopGoodsPoint,'pointObtain'));?>" style="width: 50px;" />&nbsp;次 *不限次数请不要输入-->
													</div>
												</div>
												<div class="form-group" >
													<div class="label-wrapper">
														<label class="" for=""><strong>购买本商品使用积分限额：</strong></label>
													</div>
													<div class="control-wrapper short">
														<input id="base" name="afterBuyPointToUse" type="text" value="<?php echo $pricePoint;?>" style="width: 200px;" disabled/>&nbsp;积分
													</div>
												</div>
											</div>

										</div>
									</div>
										</div>
									</div>
									<div class="space"></div>
									<button class="btn btn-info" id="submitBtn" name="submitBtn" type="submit"><i class="ace-icon fa fa-check"></i> 提交</button>
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

		<!--模板-属性表格行-->
		<table class="hide">
			<tbody id="tpl-parameter">
				<tr>
					<td class="">
						<input type="text" value="" name="sku[param1][]" class="form-control" placeholder="">
					</td>
					<td class="">
						<input type="text" value="" name="sku[param2][]" class="form-control" placeholder="">
					</td>
					<td class="">
						<input type="text" value="" name="sku[price][]" class="form-control" placeholder="">
					</td>
					<td class="">
						<input type="text" value="" name="sku[stock][]" class="form-control" placeholder="">
					</td>
					<td class="center pt14">
						<a href="#" class="blue" data-id="delete">删除</a>
					</td>
				</tr>
			</tbody>
		</table>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/moment.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/zh-cn.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datetimepicker.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/js/Sortable.min.js"></script>
		<script type="text/javascript">
			window.kindeditorUpUrl='<?=site_url()?>/shop/common/upLoad';
		</script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/product/storeproduct/edit.js"></script>
	</body>

</html>