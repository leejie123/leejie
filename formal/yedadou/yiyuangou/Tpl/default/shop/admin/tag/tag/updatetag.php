<!DOCTYPE html>
<html ng-app="app">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="http://static.yedadou.com/public/??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css"/>
	</head>

	<body class="no-skin">
		<style type="text/css">
			.mg-b-15{
				margin-bottom:15px;
			}
			.fa-close:hover {
				background-color: red;
			}
			span > em {
				font-style: normal;
			}
			#attr_wrap > span{
				margin-bottom:5px;
			}
			#attr_select > span {
				margin-right: 5px;
				margin-bottom:5px;
			}
		</style>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<form class="form-horizontal" method="post" action="" >
					
						<div>
							<div class="panel-heading"><i class="fa fa-info-circle"></i> 编辑一级栏目</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label" for="sceneName"><strong>栏目名称</strong></label>
								<div class="col-xs-12 col-sm-6 col-md-8">
									<input id="sceneName" name="tag_name" type="text" class="form-control"  value="<?=val($tag,'tag_name')?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label" for="sceneName"><strong>栏目链接</strong></label>
								<div class="col-xs-12 col-sm-6 col-md-8">
									<input id="sceneName" name="tag_url" type="text" class="form-control" value="" disabled >
								</div>
							</div> 
							
						</div>
						<input type="hidden" name="goods_ids" id="checkedIds" value="<?=val($tag,'goods_ids')?>" />
						<div>
							<table id="dynamic-table" class="table table-striped table-bordered table-hover table-vertical-middle">
								<thead>
									<tr>
										<th class="center" width="30">
											<label class="pos-rel">
												<input id="check-all" type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</th>
										<th class="center" width="120">商品编号</th>
										<th class="center" >缩略图像</th>
										<th class="center">商品名称</th>
<!-- 										<th class="center" width="120">商品状态</th> -->
										<th class="center">已属分类</th>
									</tr>
								</thead>
								<?php if(!empty($goods)){?>
								<tbody>
									<!--data-id表示该行数据的ID-->	
									<?php foreach ($goods as $key=>$value):?>									
									<tr id="row-0" data-id="" ">
										<td class="center">
											<label class="pos-rel">
												<input name="check-row" type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</td>
										<td class="center" valign="middle"><span><?=val($value,'id')?></span><span class="label label-success"></span>
										</td>
										<td class="center">
												<img src="<?=val($value,'pic_url')?>" class="table-image">
										</td>
										<td class="center" valign="middle"><span><?=val($value,'title')?></span><span class="label label-success"></span>
										</td>
<!-- 										<td class="center"> -->
<!-- 										上架</td> -->
										<td class="center">
										<?php
										 if(val($value,'tags')){
											$tag_string = implode(',', $value['tags']);
											echo $tag_string;
										}?></td>
									</tr>
									<?php endforeach;?>
								</tbody>
								<?php }?>
							</table>
						</div>
						<!-- table end -->

						<div class="form-group" style="margin-top: 10px;">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
							<div class="col-xs-12 col-sm-6 col-md-8">
								<button class="btn btn-info btn-xs" style="margin-right: 50px;" id="submitBtn" data-action="close" type="submit"><i class="ace-icon fa fa-check"></i> 保存</button>
								<button class="btn btn-danger btn-xs" id="submitBtn" type="submit"><i class="ace-icon fa fa-check"></i> 取消</button>
								<div class="space"></div>
							</div>
						</div>
					</form>
					<!--内容结束-->
				</div>
			</div>
		</div>
		<script src="http://static.yedadou.com/public/assets/js/ace-extra.js"></script>
	    <script src="http://static.yedadou.com/public/assets/js/??jquery.js,bootstrap.js,jquery-ui.js,ace/elements.scroller.js,ace/ace.js,ace/ace.ajax-content.js,ace/ace.touch-drag.js,ace/ace.sidebar.js,ace/ace.sidebar-scroll-1.js"></script>
	    <script src="http://static.yedadou.com/public/assets/js/??ace/ace.submenu-hover.js,ace/ace.widget-box.js,ace/ace.settings.js,ace/ace.settings-rtl.js,ace/ace.settings-skin.js,ace/ace.widget-on-reload.js,ace/ace.searchbox-autocomplete.js"></script>
	    <script src="http://static.yedadou.com/public/js/??bootstrap-modal.js,bootstrap-switch.min.js,bootbox.min.js"></script>
	    <script src="http://static.yedadou.com/public/admin/js/??common/common.js"></script>
	    <script src="http://static.yedadou.com/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="http://static.yedadou.com/public/js/kindeditor/lang/zh_CN.js"></script>
		<script type="text/javascript" src="http://static.yedadou.com/public/supplierAdmin/storeSetting/store_setting.js-delete"></script>
		<script type="text/javascript">
			$(function() {

				General.initCheckbox()
				/**
				*作用：修改编辑属性的文件，让该文件可以编辑属性
				*作者：李端杰
				*
				**/

				/**
				*编辑属性
				*说明：主函数是unique
				**/
				var add_attribute = {
					arr: [],
					init: function () {
						var span = $('#attr_wrap').find('span');
						if (span.length) {
							$.each(span, function (k, v) {
								var xx = $(v).find('em').html();
								// add_attribute.arr.push({'attr': xx});
								add_attribute.arr.push(xx);
								add_attribute.arr.join(',');
							})
						}
					},

					restore: function (attr) {
						add_attribute.arr.push(attr);
					},
				   /**
				   *避免重复创建属性
				   *判断属性栏是否已经有属性
				   *@param [string] attr 要创建的属性值（可选）
				   *unique: 主函数
				   *add_attr：编辑属性的函数
				   *restore：更新数组选项函数
				   *定义了一个success的回调，这个回调已经解决，因为数组的len更新的原因
				   */
					 unique: function (attr, success) {
						if (add_attribute.arr.length && attr) {
							var str = add_attribute.arr.join(',');
							if (add_attribute.arr.indexOf(attr) == -1) {
								console.log(add_attribute.arr.indexOf(attr));
								add_attribute.add_attr(attr, success);
								add_attribute.restore(attr);
							} else {
								General.alert('您编辑的属性已存在')
							}
						} else if (add_attribute.arr.length) {
							General.alert()
						} else if (attr) { 
							$('#attr_wrap').empty();
							add_attribute.add_attr(attr);
							add_attribute.restore(attr);
						} else {
							$('<strong class="grey">请编辑属性</strong>').appendTo('#attr_wrap');
							return false;
						}
					},
					/**
					  *编辑属性到分类属性里
					  *@
					**/
					add_attr: function(attr_val, success) {
						var container = $('#attr_wrap');
						var temp = $('<span class="btn btn-info btn-xs" data-click="del" style="margin-right:3px"><em>' + attr_val + '</em> <i class="fa fa-close"></i></span>').appendTo(container);
						if (success) {
							success();
						}
					},
					// 清除
					remove_attr: function(attr_val) {
						var len = add_attribute.arr.length;
						if (len) {
							for (var i = 0; i < len; i++) {
								if (add_attribute.arr[i] = attr_val) {
									add_attribute.arr.splice(i, 1);
									break;
								}
							}
							len = add_attribute.arr.length;
							if (!len) {
								add_attribute.listener(len);
							}
						}	
					},
					// 监听
					listener: function(len) {
						$('<strong class="grey">请编辑属性</strong>').appendTo('#attr_wrap');
					},
					// 定义数据接口
					get_data: function(url, data, success) {
						$.ajax({
							url: '',
							data: {},
							type: 'GET',
							success: function(data) {

							}
						})
					}
				}

				add_attribute.init();
				init_click()
				var ap = add_attribute.unique();

				// 编辑属性
				function init_click() {
					$('#attr_select > span').on('click' ,function(e) {
						var that = this;
						console.log(that)
						var attr_val = $(this).find('em').html();
						if (attr_val == '' || typeof attr_val == undefined || attr_val == null) {

						} else {
							add_attribute.unique(attr_val, function() {});
							console.log(add_attribute.arr)
							var string = add_attribute.arr.join(',');
							$('#sort_data').val(string);
						}
					})
				}
				

				// 删除属性
				$('body').on('click', 'span[data-click="del"]', function() {
					var that = this;
					$(that).remove();
					var attr = $(that).find('em').html()
					add_attribute.remove_attr(attr)
					// console.log(add_attribute.arr)
					// console.log(add_attribute.arr.length)
				})	
			})
		</script>

	</body>

</html>