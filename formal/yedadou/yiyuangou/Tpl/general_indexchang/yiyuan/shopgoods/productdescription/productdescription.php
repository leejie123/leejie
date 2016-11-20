<?php include($this->tpl('yiyuan/public:html_header.php')) ?>
		<title>商品列表页</title>
		<style>
		.product-container{
			min-height: 100px;
		    margin: 0;
		    padding: 5px;
		}
		</style>
	</head>

	<body class="">
		<div class="wrapper">
			<!--公用头部开始 -->
		   <?php include $this->tpl('yiyuan:public/header.php');?>
			<div class="product-container">
			</div>
			<!--公用底部开始-->
			<?php include $this->tpl('yiyuan:public/footer.php') ?>
		</div>
	</body>
</html>