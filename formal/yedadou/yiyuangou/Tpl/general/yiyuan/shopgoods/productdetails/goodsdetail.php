<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>图文详情</title>
<link href="http://static.yedadou.com/public/yiyuan/css/shareDetails.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="listItem">
	<div class="content clearfix">
		<?=htmlspecialchars_decode($data['desc']);?>
	</div>
</div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
</body>
</html>
