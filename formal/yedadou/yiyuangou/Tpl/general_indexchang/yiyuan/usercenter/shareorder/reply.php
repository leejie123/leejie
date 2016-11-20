<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>回复</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/send.css" rel="stylesheet" type="text/css" />
<script src="{__STATIC_URL__}/public/js/dropzone.js"></script>
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div id="editor">
<form action="" method="post">
	<div>内容：(150字以内)</div>
	<div><textarea id="content" name="content" class="formItem"></textarea></div>
	<div class="row clearfix"><input type="submit" id="btnSubmit" class="pull-right" value="发布" /></div>
	<input type="hidden" id="id" name="id" value="<?=$replyId?>">
</form>
</div>
</body>
</html>
