<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>商城模板</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css" />
	</head>

	<body class="no-skin">
		<link rel="stylesheet" href="{__STATIC_URL__}/public/admin/css/shop/config/shopTemplate/index.css" />
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1">商城模板</a>
							</li>
						</ul>

						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<div class="alert alert-warning">
									<strong>温馨提示：</strong> 鼠标移动到一个模板上,再点击右边的"使用"按钮可以将该模板设置为商城的当前模板
								</div>
								<div class="head-title">选择商城模板</div>
								<div class="type-container">
									<label class="pos-rel">
										<input name="templateType" type="radio" class="ace" value="" checked>
										<span class="lbl"> 全部</span>
									</label>
								<?php foreach ($tpls as $cate_id => $_): ?>
									<label class="pos-rel">
										<input name="templateType" type="radio" class="ace" value="<?=$cate_id?>">
										<span class="lbl"> <?=$cates[$cate_id]?></span>
									</label>
								<?php endforeach ?>
								</div>
								<div id="templateContainer" class="template-container">
									<?php foreach ($tpls as $cate_id => $_tpls): ?>
									<div class="type-content active" data-cid="<?=$cate_id?>">
										<ul>
											<?php foreach ($_tpls as $tpl): ?>
											<li>
												<div class="detail">
													<img class="preview-image" src="<?=$tpl['thumb']?>">
													<div class="check-sign<?=($tpl['theme']!=$shop_template || (empty($shop_template) && $tpl['theme']=='default')) ? ' hide' : ''?>"><i class="ace-icon fa fa-check"></i></div>
												</div>
												<div class="operation">
													<label class="pos-rel">
														<?=$tpl['name']?>[<?=$tpl['theme']?>]
													</label>
													<button data-href="/tplConfig/?app_id=<?=$tpl['app_id']?>&theme=<?=$tpl['theme']?>&id=<?=$tpl['id']?>" type="button" class="btn btn-info btn-minier pull-right">配置</button>
													<?php if ($shop_template != $tpl['theme']): ?>
														<button data-href="/shop/admin/config/shopTemplate/update?theme=<?=$tpl['theme']?>" type="button" class="btn btn-info btn-minier pull-right">使用</button>
													<?php endif ?>
												</div>
											</li>
											<?php endforeach ?>
										</ul>
									</div>
									<?php endforeach ?>
								</div>
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

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/shop/config/shopTemplate/index.js"></script>
		
	</body>

</html>