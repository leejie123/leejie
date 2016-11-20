<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>商品列表</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/datepicker.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
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
							<li class="active">
								<a data-toggle="tab" href="">商品列表</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="get" action="/yiyuan/pintuan/admin/product/productList/get" >								
										<div class="pull-right clearfix">
											<div class="pull-left">
												<label>
													<input type="text" name="id" placeholder="商品ID">
													<input type="text" name="keywords" placeholder="商品名称/关键字">
												</label>
											</div>
											<div class='pull-left' style="margin: 0 10px;">
												<div class="pull-left span-label">加入时间:</div>
												<div class="input-group input-daterange pull-left">
													<input id="startTime" name="startTime" type="text" class="form-control">
													<span class="input-group-addon">
														<i class="fa fa-exchange"></i>
													</span>
													<input id="endTime" name="endTime" type="text" class="form-control">
												</div>
											</div>
											<div class="input-group  pull-right" style="width:50px;">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-info btn-sm">
													<i class="ace-icon fa fa-search bigger-110"></i> 
														搜索
													</button>
												</span>
											</div>
											<input name="act" type="hidden" value="search"/>
										</div>

									</form>

                                    <!--                                    导出商品信息-->
                                    <form action="/Yiyuan/Pintuan/Admin/Product/ProductList/post" method="post">
                                        <!--已经被选中的id,以逗号分隔,每次操作复选框时会自动更新该控件的值-->
                                        <input type="hidden" name="checkedIds" id="checkedIds" value="" />
                                        <input class="btn btn-info btn-sm" type="submit" style="width: 60px;" id="export" name="导出" value="导出"/>
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
											<th class="center" width="650">商品名称</th>
											<th class="center" width="250">商品ID</th>
											<th class="center" width="250">排序</th>
											<th class="center" width="250">拼团价（元）</th>
											<th class="center" width="300">已开团/总库存</th>
											<th class="center" width="200">操作</th>
										</tr>
									</thead>

									<tbody>
										<!--data-id表示该行数据的ID-->
										<?php if(!empty($data)){?>
										<?php foreach ($data as $key => $value):?>											
										<tr id="row-1" data-id="<?php echo isset($value['id'])?$value['id']:''; ?>" data-uid="1" data-authid="84bf1+uJ62Yry4B1BgFwhWxTyHAdGLvTZbHIgAoJ">
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input name="check-row" type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
											<td class="" valign="middle">
												<img src="<?=val($value,'pic_url','')?>" class="table-image pull-left">
												<div style="margin-left:70px;">
													<a href="#"><?=val($value,'title','')?></a>	
												</div>
											</td>
											<td class="center">
												<?=val($value,'id','0')?>
											</td>
											<td class="center"><?=val($value,'sort_order','99999')?></td>
											<td class="center"><?=val($value,'price','0')?></td>
											<td class="center"><?=val($value,'stock_static')-val($value,'stock')?>/<?=val($value,'stock_static','0')?></td>
											<td class="center">
												<a href="/yiyuan/pintuan/admin/product/productInfo/get?id=<?=val($value,'id','0')?>" class="dispass line-h-15">编辑</a>
                                                </br>
                                                <a href="/yiyuan/pintuan/admin/product/productList/delete?id=<?=val($value,'id','0')?>" class="dispass line-h-15" onclick="return confirm('您确认删除该商品吗？')">删除</a>
												</br>
												<a href="/yiyuan/pintuan/admin/record/recordList/get?id=<?php echo $value['id']?>">拼团记录</a><br/>
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

		<a href="http://vendor.yedadou.com/UserCenter/Fans#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>

		<!--备注`-->
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
			$(function () {
				$('.input-daterange').datepicker({autoclose:true});
				General.extendDialog(); //扩展对话框
				General.initCheckbox();

			})
		</script>
	</body>
	</html>