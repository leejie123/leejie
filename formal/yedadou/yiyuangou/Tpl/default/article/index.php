<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<meta name="format-detection" content="telephone=no">

		<link rel="stylesheet" href="{__STATIC_URL__}/public/??css/bootstrap.min.css,css/font-awesome.min.css,front/default/css/public/public.css" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public/??css/bootstrap.min.css,css/font-awesome.min.css,front/default/css/public/public.css,front/default/css/textReplyArticle.css" />
		<script src="{__STATIC_URL__}/public/??js/jquery.min.js,js/bootstrap.min.js,js/jquery.cookie.js,js/hammer.min.js,front/default/js/public/public.js"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<title><?=$headerTitle?></title>
	</head>
	<body>
		<div class="wrapper">
		<article class="article">
			<h2><?php echo val($content, 'title', ''); ?></h2>
			<div><span><?=val($content,'author') ? '作者： '.val($content,'author') : ''?></span></div>
			<div class="content">
				<img src="<?php echo val($content, 'picurl', '{__STATIC_URL__}/public/admin/images/noimg.jpg'); ?>" />
				<?php echo htmlspecialchars_decode(val($content, 'content')); ?>
			</div>
		</article>
		</div>
	</body>

</html>