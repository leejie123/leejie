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
		<div class="container-fluid no-padding">
			<div class="row">
				<div class="alert alert-warning center">所有设置保存后生效</div>
				<div class="col-xs-12">
					<!--内容开始-->
					<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" data-submit="auto">
						<div class="form-group">
							<div class="label-wrapper">
								<label class="">会员ID：</label>
							</div>
							<div class="control-wrapper">
								<label class=""><?php echo $fansData['uid'];?></label>
								<input id="userId" name="userId" type="hidden" value="<?php echo $fansData['uid'];?>" />
								<input id="biz_id" name="biz_id" type="hidden" value="<?php echo $fansData['biz_id'];?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="">微信号：</label>
							</div>
							<div class="control-wrapper">
								<label class=""><?php echo $fansData['wx_user'];?></label>
							</div>
						</div>
						<!--<div class="form-group">
							<div class="label-wrapper">
								<label class="font-red">团队展示：</label>
							</div>
							<div class="control-wrapper">
								<label>
									<input name="showType" type="radio" class="ace" value="1" checked/>
									<span class="lbl font-red"> 展示直接发展团队</span>
								</label>
								&nbsp;
								<label>
									<input name="showType" type="radio" class="ace" value="2"/>
									<span class="lbl font-red"> 展示整个团队</span>
								</label>
							</div>
						</div>-->
						<div class="form-group">
							<div class="label-wrapper">
								<label class="">所属上级：</label>
							</div>
							<div class="control-wrapper mtup5">
								<label id="currentParent" class=""><?php echo $fansData['parent_nick'];?></label>
								<input id="parentName" name="parentName" type="hidden" value="<?php echo $fansData['parent_nick'];?>" />
								<input id="formParnetId" name="parentId" type="hidden" value="<?php echo $fansData['uid'];?>" /> &nbsp;&nbsp;
								<!--data-id表示当前粉丝对应的ID-->
								<button data-id="<?=$fansData['uid'];?>" id="changeParent" class="btn btn-info btn-xs" type="button">
									改变上级
								</button>
								&nbsp;
								<!--data-name表示当前显示的名称,data-id表示当前名称对应的ID-->
								<button data-name="厂家" data-id="0" id="belongToVendor" class="btn btn-info btn-xs" type="button">
									归为厂家管理
								</button>
							</div>
						</div>
						<!--<div class="form-group">
							<div class="label-wrapper">
								<label class="">显示上级数目：</label>
							</div>
							<div class="control-wrapper">
								<label>
									<input name="parentCount" type="radio" class="ace" value="1" checked/>
									<span class="lbl"> 全部</span>
								</label>
								&nbsp;
								<label>
									<input name="parentCount" type="radio" class="ace" value="2"/>
									<span class="lbl"> 一个</span>
								</label>
							</div>
						</div>-->
						<div class="form-group">
							<div class="label-wrapper">
								<label class="">真实姓名：</label>
							</div>
							<div class="control-wrapper">
								<label class=""><?php echo $fansData['realname'];?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="">性别：</label>
							</div>
							<div class="control-wrapper">
								<label class=""><?php if($fansData['sex']==1){?>男<?php }elseif($fansData['sex']==2){?>女<?php }else{?>保密<?php }?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="">联系电话：</label>
							</div>
							<div class="control-wrapper">
								<label class=""><?php echo $fansData['phone'];?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="">QQ：</label>
							</div>
							<div class="control-wrapper">
								<label class=""><?php echo $fansData['qq'];?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="">邮箱：</label>
							</div>
							<div class="control-wrapper">
								<label class=""><?php echo $fansData['email'];?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="label-wrapper">
								<label class="">联系地址：</label>
							</div>
							<div class="control-wrapper">
								<label class=""><?php echo $fansData['province'];?><?php echo $fansData['city'];?><?php echo $fansData['street'];?></label>
							</div>
						</div>
						<!--<div class="form-group">
							<div class="label-wrapper">
								<label class="">银行账户信息：</label>
							</div>
							<div class="control-wrapper">
								<label class=""></label>
							</div>
						</div> 
						<div class="form-group">
							<div class="label-wrapper">
								<label class="">首次关注路径：</label>
							</div>
							<div class="control-wrapper">
								<label class="">QRCODE SCAN</label>
							</div>
						</div>-->

						<div class="space"></div>
						<!--<div class="form-group">
							<div class="label-wrapper">
								<label class="" for=""></label>
							</div>
							<div class="control-wrapper">
								<button id="sure" class="btn btn-info btn-sm" type="submit">
									<i class="ace-icon fa fa-save"></i> 申请代理
								</button>
								&nbsp;
								<button id="return" class="btn btn-danger btn-sm" type="button">
									<i class="ace-icon fa fa-undo"></i> 取消
								</button>
							</div>
						</div>-->
						<div class="button-panel">
							<button type="submit" class="btn btn-info btn-sm btn-space-right" data-href="/Agent/Fans/post?html=manage" data-action="submit" data-refresh="parent" data-mask="parent.parent"><i class='ace-icon fa fa-save'></i> 保存设置</button>
							<button id="return" type="button" class="btn btn-danger btn-sm" data-action="close"><i class='ace-icon fa fa-times'></i> 取消</button>
						</div>
					</form>

					<!--内容结束-->
				</div>
			</div>
		</div>
		
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		
		<!--对话框-->
		<div id="modalDialog" class="dialog-content hide">
			<div class="loading-bg"><div class="loading-animation"><i class="fa fa-spinner fa-spin"></i></div></div>
			<iframe id="top-container" name="top-container" width="100%" height="100%" hspace="0" vspace="0" frameborder="0" scrolling="scroll"></iframe>												
		</div>
		
		<script src="{__STATIC_URL__}/public/admin/js/shop/user/manage.js"></script>
	</body>

</html>