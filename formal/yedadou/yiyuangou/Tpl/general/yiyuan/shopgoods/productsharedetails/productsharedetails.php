<?php include($this->tpl('yiyuan/public:html_header.php')) ?>
		<title>商品列表页</title>
		<style>
			.title{font-size: 16px;font-weight: bold;height: 30px;margin: 10px 0;}
			.pageBtn{
				width: 60%;
				margin: 2px auto;
				display: block;
			}
			.red{
				color: #f00;
			}
			.details{
				 margin: 5px;
				 padding: 3px;
				 max-height: 400px;
				 overflow-y: scroll;
			}
			.details img{
				width: 100%;
				min-height: 150px;
			}
			.details{
				font-size: 13px;
				font-weight: normal;
				padding: 10px 25px 0 15px;
			}
			.details a,.article a:hover,article a:active{
				text-decoration: none;
				color:#6180a7;
			}
			.details p{
				text-indent:1.5em;
				line-height: 1.5em;			
			}
		/**参与记录**/
			.dialogs {
			  padding: 9px;
			  position: relative;
			}
			.itemdiv.dialogdiv {
			    padding-bottom: 14px;
			}
			.itemdiv {
			    padding-right: 3px;
			    min-height: 66px;
			    position: relative;
			}
			.itemdiv > .user {
			  display: inline-block;
			  width: 42px;
			  position: absolute;
			  left: 0;
			}
			.itemdiv > .user > img,
			.itemdiv > .user > .img {
			  border-radius: 100%;
			  border: 2px solid #5293C4;
			  max-width: 40px;
			  position: relative;
			}
			.itemdiv > .user > .img {
			  padding: 2px;
			}
			.itemdiv > .body {
			  width: auto;
			  margin-left: 50px;
			  margin-right: 12px;
			  position: relative;
			}
			.itemdiv > .body > .time {
			  display: block;
			  font-size: 11px;
			  font-weight: bold;
			  color: #666;
			  position: absolute;
			  right: 9px;
			  top: 0;
			}
			.itemdiv > .body > .time .ace-icon {
			  font-size: 14px;
			  font-weight: normal;
			}
			.itemdiv > .body > .name {
			  display: block;
			  color: #999;
			}
			.itemdiv > .body > .name > b {
			  color: #777;
			}
			.itemdiv > .body > .text {
			  display: block;
			  position: relative;
			  margin-top: 2px;
			  padding-bottom: 19px;
			  padding-left: 7px;
			  font-size: 13px;
			}
			.itemdiv > .body > .text:after {
			  display: block;
			  content: "";
			  height: 1px;
			  font-size: 0;
			  overflow: hidden;
			  position: absolute;
			  left: 16px;
			  right: -12px;
			  margin-top: 9px;
			  border-top: 1px solid #E4ECF3;
			}
			.itemdiv > .body > .text > .ace-icon:first-child {
			  color: #DCE3ED;
			  margin-right: 4px;
			}
			.itemdiv:last-child > .body > .text {
			  border-bottom-width: 0;
			}
			.itemdiv:last-child > .body > .text:after {
			  display: none;
			}
			.itemdiv.dialogdiv {
			  padding-bottom: 14px;
			}
			.itemdiv.dialogdiv:before {
			  position: absolute;
			  display: block;
			  content: "";
			  top: 0;
			  bottom: 0;
			  left: 19px;
			  width: 3px;
			  max-width: 3px;
			  background-color: #E1E6ED;
			  border: 1px solid #D7DBDD;
			  border-width: 0 1px;
			}
			.itemdiv.dialogdiv:last-child {
			  padding-bottom: 0;
			}
			.itemdiv.dialogdiv:last-child:before {
			  display: none;
			}
			.itemdiv.dialogdiv > .user > img {
			  border-color: #C9D6E5;
			}
			.itemdiv.dialogdiv > .body {
			  border: 1px solid #DDE4ED;
			  padding: 5px 8px 8px;
			  border-left-width: 2px;
			  margin-right: 1px;
			}
			.itemdiv.dialogdiv > .body:before {
			  content: "";
			  display: block;
			  position: absolute;
			  left: -7px;
			  top: 11px;
			  width: 8px;
			  height: 8px;
			  border: 2px solid #DDE4ED;
			  border-width: 2px 0 0 2px;
			  background-color: #FFF;
			  -webkit-box-sizing: content-box;
			  -moz-box-sizing: content-box;
			  box-sizing: content-box;
			  -webkit-transform: rotate(-45deg);
			  -ms-transform: rotate(-45deg);
			  -o-transform: rotate(-45deg);
			  transform: rotate(-45deg);
			}
			.itemdiv.dialogdiv > .body > .time {
			  position: static;
			}
			.itemdiv.dialogdiv > .body > .text {
			  padding-left: 0;
			  padding-bottom: 0;
			}
			.itemdiv.dialogdiv > .body > .text:after {
			  display: none;
			}
			.itemdiv.dialogdiv .tooltip-inner {
			  word-break: break-all;
			}
			.itemdiv.memberdiv {
			  width: 175px;
			  padding: 2px;
			  margin: 3px 0;
			  float: left;
			  border-bottom: 1px solid #E8E8E8;
			}
			@media (min-width: 992px) {
			  .itemdiv.memberdiv {
			    max-width: 50%;
			  }
			}
			@media (max-width: 991px) {
			  .itemdiv.memberdiv {
			    min-width: 33.333%;
			  }
			}
			.itemdiv.memberdiv > .user > img {
			  border-color: #DCE3ED;
			}
			.itemdiv.memberdiv > .body > .time {
			  position: static;
			}
			.itemdiv.memberdiv > .body > .name {
			  line-height: 18px;
			  height: 18px;
			  margin-bottom: 0;
			}
			.itemdiv.memberdiv > .body > .name > a {
			  display: inline-block;
			  max-width: 100px;
			  max-height: 18px;
			  overflow: hidden;
			  text-overflow: ellipsis;
			  word-break: break-all;
			}
			.itemdiv .tools {
			  position: absolute;
			  right: 5px;
			  bottom: 10px;
			  display: none;
			}
			.itemdiv .tools .btn {
			  border-radius: 36px;
			  margin: 1px 0;
			}
			.itemdiv .body .tools {
			  bottom: 4px;
			}
			.itemdiv.commentdiv .tools {
			  right: 9px;
			}
			.itemdiv:hover .tools {
			  display: inline-block;
			}
			.footer {
			    position: fixed;
			    z-index: 99;
			    bottom: -4px;
			    left: 0px;
			    width: 100%;
			    height: 50px;
			    background-color: #f2f2f2;
			    font-size: 12px;
			}
		</style>
	</head>

	<body class="">
		<div class="wrapper">
			<!--公用头部开始 -->
		   <?php include $this->tpl('yiyuan:public/header.php');?>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center title">晒单标题晒单标题</div>
					</div>
					<div class="row" style="margin-bottom: 5px;">
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">会员昵称</div>
						<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="text-align: right;padding-top: 8px;">2015-10-23   18:55:58</div>
					</div>
					<div class="row" style="margin-bottom: 5px;">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">中奖商品：</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">iphone 6s 4.7 4G手机四色，国行正品，全网通用，顺丰包邮</div>
					</div>
					<div class="row" style="margin-bottom: 5px;">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">本期参与：</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 red"><span class="red">2</span> 人次</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 red">第 （<span class="red">34</span>） 期</div>
					</div>
					<div class="row" style="margin-bottom: 5px;">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">幸运号码：</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 red">10000008</div>
					</div>
					<div class="row" style="margin-bottom: 5px;">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">揭晓时间：</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 red">2015-10-23   18:55:58</div>
					</div>
				</div>
				<div class="details">
					<p>晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容</p>
					<p>晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容</p>
					<img alt="" src="http://cdms.weixin.yedadou.com/upload/cdms.weixin.yedadou.com/image/20150715/20150715173004_43416.jpg" />
					<img alt="" src="http://cdms.weixin.yedadou.com/upload/cdms.weixin.yedadou.com/image/20150715/20150715173006_81428.jpg" />
					<img alt="" src="http://cdms.weixin.yedadou.com/upload/cdms.weixin.yedadou.com/image/20150715/20150715173007_83136.jpg" />
					<img alt="" src="http://cdms.weixin.yedadou.com/upload/cdms.weixin.yedadou.com/image/20150715/20150715173011_19600.jpg" />
					<img alt="" src="http://cdms.weixin.yedadou.com/upload/cdms.weixin.yedadou.com/image/20150715/20150715173013_28322.jpg" />
				</div>
				<!--参与记录-->
				<div class="dialogs">
					<?php for($i=1;$i<=3;$i++){ ?>
					<div class="itemdiv dialogdiv">
						<div class="user">
							<img src="http://static.yedadou.com/public/yiyuan/testImg/avatar<?=$i?>.png" />
						</div>

						<div class="body">
							<div class="name">
								<a href="#">会员昵称   （广东省 广州市）</a>
							</div>
							<div class="time">
								<i class="ace-icon fa fa-clock-o"></i>
								<span class="green">（2015-10-24  12:25:36:308）</span>
							</div>
							<div class="text">参与了 1 人次 </div>

							<div class="tools">
								<a href="#" class="btn btn-minier btn-info">
									<i class="icon-only ace-icon fa fa-share"></i>
								</a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
					
			<button class="btn pageBtn">点击下一页</button>
			<div class="container footer">
				<div class="row">
				  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0;margin: 0;"><a type="button" class="btn btn-danger btn-block btn-lg" style="border-radius: 0;">回复TA</a></div>
				</div>
			</div>
		</div>
	</body>
</html>