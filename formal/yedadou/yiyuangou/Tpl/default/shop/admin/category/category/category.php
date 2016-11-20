
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>商品分类</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="http://static.yedadou.com/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css">
		<style type="text/css">
			.color-orange {
				color:rgb(225, 100, 119);
			}
			.line-h-15	{
				line-height: 15px;
			}
			.tree_ {
				margin-bottom:15px;
			}
			.tree_ > ul {
				list-style:none;
				padding-left:0px;
			} 
			.tree_ > ul > li {
				list-style:none;
				padding: 10px;
			}
			.tree_ > ul > li:hover {
				background-color: #eff3f8;
			}
			span > i {
				/*color: #6fb3e0;*/
			}
			.hide_{
				display:none;
			}
			li > span > i {
				color:#6fb3e0;
			}
			.fa-caret-down {
				font-size: 15px;
				margin-right: 5px;
			}
			.fa-caret-up {
				font-size: 15px;
				margin-right: 5px;
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
								<a data-toggle="tab" >商品分类</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
										<form method="post" action="" >
										<a class="btn btn-info btn-sm pull-left" data-click="addParentSort" data-url="/shop/admin/category/category/add"><i class="ace-icon fa fa-plus"></i> 添加分类</a>
										<input type="hidden" name="checkedIds" id="checkedIds" value="">
									</form>
								</div>
								<div class="row" style="padding:20px;">
								
								<?php if(!empty($categorys)){?>
								<?php foreach ($categorys as $value):?>
									<div class="tree_">
										<div class="clearfix"> 
											<span class="pull-left btn btn-info btn-xs" data-click="show"><i class="fa fa-caret-up"></i><?=val($value,'name')?></span>
											<div class="pull-right">
											<a href="" class="btn btn-info btn-xs" data-click="add_sort" data-url="/shop/admin/category/subCategory?parent_id=<?=val($value,'id')?>&cate_name=<?=val($value,'name')?>" ><i class="fa fa-plus"></i> 添加子分类</a>
											<a href="" class="btn btn-info btn-xs" data-click="del_sort" data-url="/shop/admin/category/category/delete?id=<?=val($value,'id')?>"><i class="fa fa-plus"></i> 删除</a>
											</div>
											
										</div>	
										<?php if(!empty($value['child'])){?>
										<ul >
											<?php foreach ($value['child'] as $v):?>
												<li class="clearfix">
												<span class="pull-left"><i class="fa fa-paw"></i><?=val($v,'name')?></span> 
												<span class="pull-right"> 
													<a href="" data-click="edit" data-url="/shop/admin/category/category/update?id=<?=val($v,'id')?>&cate_name=<?=val($value,'name')?>">编辑</a> 
													<a href="" data-click="del" data-url="/shop/admin/category/subCategory/delete?id=<?=val($v,'id')?>">删除</a>
												</span>
											</li>
											<?php endforeach;?>
											
										</ul>
										<?php }?>	
										
									</div>
								
								<?php endforeach;?>
								<?php }?>
								</div>

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
		<div id="modalDialog" class="dialog-content hide">
			<div class="loading-bg">
				<div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div>
			</div>
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>
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
		<script type="text/javascript">
			$(function() {
				General.extendDialog(); //扩展对话框
				/*树形菜单	*/
				$(document).on('click', 'span[data-click="show"]', function() {
					var that = this;
					var li = $(this).closest('.tree_').find('ul > li');
					if (li.length) {
						$(that).closest('.tree_').find('ul').slideToggle('fast', function () {
							if ($(this).attr('style') == 'display: none;') {
								$(that).find('i').attr('class', 'fa fa-caret-up')
							} else {
								$(that).find('i').attr('class', 'fa fa-caret-down')
							}
						});
					} else {
						General.alert('没有子分类')
					}
				})
				

				/*删除*/
				$(document).on('click', 'a[data-click="del"]', function(e) {
					General.stopEvent(e);
					if (confirm('您确定删除该分类吗？')) {
						var url = $(this).data('url');
						window.location.href = url;
					}
				}) 

				/*编辑属性*/
				$(document).on('click', 'a[data-click="edit"]', function(e) {
					General.stopEvent(e);
					var url = $(this).data('url');
					General.showDialogWidthHeight('编辑', url, 500, 0);
				})

				/*添加分类*/
				$(document).on('click', 'a[data-click="addParentSort"]', function (e) {
					General.stopEvent(e);
					var url = $(this).data('url');
					General.showDialogWidthHeight('添加分类', url, 500, 0);
				})

				/*添加子分类*/
				$(document).on('click', 'a[data-click="add_sort"]', function(e) {
					General.stopEvent(e);
					var url = $(this).data('url');
					window.location.href = url;
				})


				// 删除父分类
				$(document).on('click', 'a[data-click="del_sort"]', function (e) {
					General.stopEvent(e);
					var li = $(this).closest('.tree_').find('ul > li');
					var url = $(this).data('url');
					if (li.length) {
						if (confirm('该分类下面有子分类，您确定删除吗？')) {
							window.location.href = url;
						}
					} else {
						if (confirm('您确定删除该分类吗？')) {
							window.location.href = url;
						}
					}
 				})
				

			})

		</script>



	</body>
	</html>