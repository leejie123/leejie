<!DOCTYPE html>
<html ng-app="app">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>会员管理</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public/??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/js/kindeditor/themes/default/default.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css<?=isset($local_css) && !empty($local_css) ? ','.$local_css : ''?>"/>
		<?=isset($remote_css) ? $remote_css : ''?>
		<script src="{__STATIC_URL__}/public/assets/js/ace-extra.js"></script>
	    <script src="{__STATIC_URL__}/public/assets/js/??jquery.js,bootstrap.js,jquery-ui.js,ace/elements.scroller.js,ace/ace.js,ace/ace.ajax-content.js,ace/ace.touch-drag.js,ace/ace.sidebar.js,ace/ace.sidebar-scroll-1.js"></script>
	    <script src="{__STATIC_URL__}/public/assets/js/??ace/ace.submenu-hover.js,ace/ace.widget-box.js,ace/ace.settings.js,ace/ace.settings-rtl.js,ace/ace.settings-skin.js,ace/ace.widget-on-reload.js,ace/ace.searchbox-autocomplete.js"></script>
	    <script src="{__STATIC_URL__}/public/js/??bootstrap-modal.js,bootstrap-switch.min.js,bootbox.min.js"></script>
	    <script src="{__STATIC_URL__}/public/admin/js/??common/common.js"></script>
	    <script src="{__STATIC_URL__}/public/js/kindeditor/kindeditor-all-min.js"></script>
		<script src="{__STATIC_URL__}/public/js/kindeditor/lang/zh_CN.js"></script>
	</head>

	<body class="no-skin">

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1">分享客代理</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--表格-->
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form method="post" action="/Agent/Fans/post" enctype="multipart/form-data">
										<!--<button class="btn btn-info btn-sm" id="sureAdd" type="submit"><i class="ace-icon fa fa-plus"></i> 确认添加</button>-->
										<div class="pull-right clearfix">
											<div class="input-group search-width pull-right">
												<input type="text" name="searchContent" class="form-control" placeholder="ID/昵称/姓名"/>
												<span class="input-group-btn">
													<button type="submit" class="btn btn-info btn-sm">
													<i class="ace-icon fa fa-search bigger-110"></i> 
														搜索
													</button>
												</span>
											</div>
										</div>
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
											<th class="center" width="60">ID</th>
											<th class="center" width="60">头像</th>
											<th class="center">昵称</th>
											<th class="center" width="">真实姓名</th>
											<th class="center">电话</th>
											<th class="center">累计佣金</th>
											<th class="center">团队人数</th>
											<th class="center">推荐人</th>
											<th class="center" width="240">操作</th>
										</tr>
									</thead>

									<tbody>
										<?php   if(!empty($fansData)){?>
										<?php 	foreach ($fansData as $k=>$v):	?>
										<!--data-id表示该行数据的ID-->
										<tr id="row-<?php echo $k;?>" data-id="<?=$v['uid']?>" data-authid="<?php echo authcode($v['uid'],'ENCODE');?>" data-biz_id="<?php echo $v['biz_id'];?>" data-public_id="<?php echo $v['public_id'];?>">
											<td class="center">
												<label class="pos-rel">
													<input name="check-row" type="checkbox" class="ace" />
													<span class="lbl"></span>
												</label>
											</td>
											<td class="center"><?php echo $v['uid'];?></td>
											<td class="center">
												<a href="#" target="_blank">
													<img src="<?php echo $v['avatar'];?>" class="table-image">
												</a>
											</td>
											<td class="center"><?php echo $v['nick'];?></td>
											<td class="center"><?php echo $v['realname'];?></td>
											<td class="center"><?php echo $v['phone'];?></td>
											<td class="center"><?php echo $v['total_comission'];?></td>
											<td class="center"><a href="#" class="blue" data-id="team">团队树(<?=$v['children_count'];?>)</a></td>
											<td class="center"><?php echo $v['parent_nick'];?></td>
											<td class="center">
												<a href="#" class="blue" data-id="manage">管理</a>
											</td>
										</tr>
										<?php endforeach?>
										<?php }?>
									</tbody>
								</table>
								<!--底部工具条-->
								<div class="table-foot-toolbar clearfix">
									<?php echo empty($page_html)?'':$page_html; ?>
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
			<div class="loading-bg"><div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div></div>
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>												
		</div>
		
		<!--对话框-->
		<div id="dialog-edit" class="hide">
		</div>

		<script src="{__STATIC_URL__}/public/admin/js/shop/user/index.js"></script>
	</body>

</html>