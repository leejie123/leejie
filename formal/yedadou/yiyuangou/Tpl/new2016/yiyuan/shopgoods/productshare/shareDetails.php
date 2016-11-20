<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>晒单</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/shareDetails.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="listItem">
	<div class="title padding-left10">晒单标题晒单标题</div>
	<div class="row clearfix">
		<div class="usrName padding-left10">会员昵称</div>
		<div class="date">2015-10-23   18:55:58</div>
	</div>
	<div class="list clearfix">
		<div class="row clearfix">
			<div class="left padding-left10">中奖商品：</div>
			<div class="proName">iphone 6s 4.7 4G手机四色，国行正品，全网通用，顺丰包邮</div>
		</div>
		<div class="row clearfix">
			<div class="left padding-left10">本期参与：</div>
			<div class="right">
				<div class="num"><span class="red1">2</span> 人次</div>
				<div class="num pull-right">第 （<span class="red1">34</span>） 期</div>
			</div>
		</div>
		<div class="row clearfix padding-left10">
			<div class="left">幸运号码：</div>
			<div class="right">
				10000008
			</div>
		</div>
		<div class="row clearfix padding-left10">
			<div class="left">揭晓时间：</div>
			<div class="right">2015-10-23   18:55:58</div>
		</div>
	</div>
	<div class="content clearfix">
		晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容
		<img src="{__STATIC_URL__}/public/yiyuan/tem/slid1.png" />
		<img src="{__STATIC_URL__}/public/yiyuan/tem/slid2.png" />
		<img src="{__STATIC_URL__}/public/yiyuan/tem/slid3.png" />
	</div>
	<div class="timeline-container">
		<div class="timeTip clearfix">
			2015-11-2
		</div>
		<?php for($i=0;$i<5;$i++){ ?>
		<div class="timeline-item clearfix">
			<div class="user">
				<img alt="Susan't Avatar" src="{__STATIC_URL__}/public/yiyuan/tem/avatar1.png">
			</div>
			<div class="info">
				<div class="row">会员昵称   （广东省 广州市）</div>
				<div class="row clearfix">2015-10-24  12:25:36:308</div>
				<div class="row clearfix">内容内容内容</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<a id="btnReturn" href="">回复TA</a>

</body>
</html>
