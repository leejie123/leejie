<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>栏目分类</title>
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

			.mg-r-5{
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
								<a data-toggle="tab" href="javascript:void(0)">栏目分类</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<div class="row" style="padding:20px;">
									<!-- 第一部分 开始 -->
									<div class="col-xs-6">
										<div style="width: 100%;margin-bottom: 15px;">
											<a href="/shop/admin/tag/tag/add" class="btn btn-info btn-xs" target="sort_container"><i class="fa fa-plus"></i> 添加分类</a>
										</div>
										<div>
										<?php if(!empty($goodsTags)){?>
										<?php foreach ($goodsTags as $key=>$value):?>
											<div class="tree_" data-id='<?=val($value,'id')?>'>
												<div class="clearfix"> 
													<span class="pull-left btn btn-info btn-xs" data-click="show"><i class="fa fa-caret-up"></i><?=val($value,'tag_name')?></span>
													<div class="pull-right">
														<a href="/shop/admin/tag/tag/update?id=<?=val($value,'id')?>" class="btn btn-info btn-xs mg-r-5" target="sort_container"><i class="fa fa-edit"></i> 编辑</a>
														<a href="" class="btn btn-info btn-xs mg-r-5" data-click="del" data-url="/shop/admin/tag/tag/delete?id=<?=val($value,'id')?>"><i class="fa fa-close"></i> 删除</a>
														<?php if(val($value,'display')){?>
														<a class="btn btn-info btn-xs mg-r-5" href="/shop/admin/tag/tag/update?id=<?=val($value,'id')?>&display=0"><i class="fa fa-plus"></i> 隐藏</a>
														<?php }else{?>
														<a class="btn btn-info btn-xs mg-r-5" href="/shop/admin/tag/tag/update?id=<?=val($value,'id')?>&display=1"><i class="fa fa-plus"></i> 显示</a>
														<?php }?>
														<a href="/shop/admin/tag/tag/add?pid=<?=val($value,'id')?>" class="btn btn-info btn-xs btn-xs-5" target="sort_container"><i class="fa fa-plus"></i> 添加子分类</a>
													</div>
												</div>		
												<ul>
												<?php if(val($value,'child')){?>
												<?php foreach ($value['child'] as $k=>$v):?>
													<li class="clearfix">
														<span class="pull-left"><i class="fa fa-paw"></i><?=val($v,'tag_name')?> </span> 
														<span class="pull-right"> 
															<a  href="/shop/admin/tag/tag/update?id=<?=val($v,'id')?>" target="sort_container">编辑</a> 
															
														<?php if(val($v,'display')){?>
														<a href="/shop/admin/tag/tag/update?id=<?=val($v,'id')?>&display=0">隐藏</a> 
														<?php }else{?>
														<a href="/shop/admin/tag/tag/update?id=<?=val($v,'id')?>&display=1">显示</a> 
														<?php }?>
															<a href="" data-click="del" data-url="/shop/admin/tag/subTag/delete?id=<?=val($v,'id')?>">删除</a>
														</span>
													</li>
												<?php endforeach;?>
												<?php }?>
													
												</ul>
											</div>
										<?php endforeach;?>
										<?php }?>
										</div>
									</div>
									<!-- 第一部分 开始 -->

									<!-- 第二部分 开始-->
									<div class="col-xs-6">
										<form class="form-horizontal" method="post" action="/Advanced/Qrcode/add?data=1" >
											<div class="panel panel-default">
												<div class="panel-heading">编辑区</div>
												<div class="panel-body">
													<iframe  width="100%" max-height="600" style="height: 500px;" name="sort_container"></iframe>
												</div>
											</div>
											<div class="space"></div>
										</form>
									</div>
									<!--第二部分 结束-->
								</div>
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

		<!--对话框-->
		<div id="modalDialog" class="dialog-content hide">
			<div class=	"loading-bg">
				<div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div>
			</div>
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>	
		</div>

		<!--对话框-->
		<div id="dialog-edit" class="hide">
		</div>
		<script src="http://static.yedadou.com/public/assets/js/jquery.js"></script>
		<script src="http://static.yedadou.com/public/assets/js/bootstrap.js"></script>
		<script src="http://static.yedadou.com/public/assets/js/jquery-ui.js"></script>
		<script src="http://static.yedadou.com/public/assets/js/ace/ace.js"></script>
		<script src="http://static.yedadou.com/public/admin/js/common/common.js"></script>
		<script type="text/javascript">
			$(function() {
				General.extendDialog(); //扩展对话框
				/*树形菜单	*/
				$(document).on('click', 'span[data-click="show"]', function(e) {
					// General.stopEvent(e);
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

				// sort-edit 大分类编辑
				$(document).on('click', 'a[data-click="sort_edit"]', function (e) {
					General.stopEvent(e);
					var url = $(this).data('url');
					$('.panel').find('iframe').attr('src', url);
				})

				/*编辑属性*/
				$(document).on('click', 'a[data-click="edit"]', function(e) {
					General.stopEvent(e);
					var url = $(this).data('url');
					General.showDialogWidthHeight('编辑', url, 500, 500);
				})

				/*添加分类*/
				$(document).on('click', 'a[data-click="addParentSort"]', function (e) {
					General.stopEvent(e);
					var url = $(this).data('url');
					General.showDialogWidthHeight('添加分类', url, 500, 500);
				})

				/*添加子分类*/
				// $(document).on('click', 'a[data-click="add_sort"]', function(e) {
				// 	General.stopEvent(e);
				// 	var url = $(this).data('url');
				// 	window.location.href = url;
				// })

				// 显示
				$(document).on('click', 'a[data-click="show_"]', function(e){
					alert('dsvdsv');
					General.stopEvent(e);
					var url = $(this).data('url');
					var id = $(this).closest('.tree_').data('id');
						$.ajax({
							url: url,
							data: {
								id:  id
							},
							type: 'POST',
							success: function (data) {
								
								var data = $.parseJSON(data);
								if (data.success) {
									General.alert(data.info);
									window.location.href = url;
								} else {
									General.alert(data.info);
								}
							}
						})
					
				})

				// 删除父分类
				$(document).on('click', 'a[data-click="del_sort"]', function (e) {
					General.stopEvent(e);
					var li = $(this).closest('.tree_').find('ul > li');
					// console.log(li.length)
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