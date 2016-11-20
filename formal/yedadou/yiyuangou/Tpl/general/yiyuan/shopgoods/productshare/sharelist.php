<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>晒单</title>
<link href="http://static.yedadou.com/public/yiyuan/css/shareList.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--空的时候显示这个-->
<!--div class="empty">暂无记录</div-->
<!--如果不为空-->
<?php for($i=0;$i<5;$i++){ ?>
<div class="listItem">
	<div class="title padding-left5">晒单标题晒单标题</div>
	<div class="row clearfix">
		<div class="usrName padding-left5">会员昵称</div>
		<div class="date">2015-10-23   18:55:58</div>
	</div>
	<div class="row clearfix">
		<div class="col3 proimg" style="background-image: url(http://static.yedadou.com/public/yiyuan/tem/pro.jpg)"></div>
		<div class="content padding-left5">
			晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容
		</div>
	</div>
</div>
<?php } ?>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
</body>
</html>
