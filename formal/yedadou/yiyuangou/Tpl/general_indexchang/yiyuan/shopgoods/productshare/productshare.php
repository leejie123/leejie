<?php include($this->tpl('yiyuan/public:html_header.php')) ?>
		<title>商品列表页</title>
		<style>
		.product-container{
			min-height: 100px;
		    margin: 0;
		    padding: 5px;
		}
		.pastTimes .title{
			height: 30px;
		}
		.pastTimes p{
			line-height:16px;
			font-size: 12px;
		}
		.pastTimes .red{
			color: #f00;
		}
		.pastTimesHead{
			height: 40px;
			padding-top: 3px;
		}
		.pastTimesHead>div:first-child{
			text-align: left;
		}
		.pastTimesHead>div:last-child{
			text-align: right;
		}
		/*头像*/
		.user-image-container{
			width: 80%;
			height: 80%;
			background-color: #fff;
		}
		.user-image-container img{
			position: absolute;
			left: -5px;
			top: 3px;
			width: 50%;
		}
		</style>
	</head>

	<body class="">
		<div class="wrapper">
			<!--公用头部开始 -->
		   <?php include $this->tpl('yiyuan:public/header.php');?>
			<div class="product-container">
				<?php for($i=1;$i<10;$i++){ ?>
				<div class="panel panel-default pastTimes" onclick="location.href='/yiyuan/ShopGoods/ProductShareDetails'">
				  <div class="panel-heading pastTimesHead"><h4>晒单标题晒单标题</h4></div>
				  <div class="panel-body">
				    <div class="container">
				    	<div class="row title">
				    		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-0 margin-0">
				    			<div class="pull-left">会员昵称</div><div class="pull-right">2015-10-23   18:55:58</div>
				    		</div>
				    	</div>
				    	<div class="row">
				  			<div class="user-image-container col-xs-5 col-sm-4 col-md-4 col-lg-4 padding-0 margin-0">
								<a href="#" id="userImage">
									<div class="user-image"><img class="thumbnail" src="http://img.yedadou.com/store/681/7776b06ad1e5f7db95330f8874e18005.png" alt=""></div>
								</a>
							</div>
				  			<div class="col-xs-7 col-sm-8 col-md-8 col-lg-8 padding-0 margin-0 pull-right">
				  				<p>
				  					晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容
				  					晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容
				  					晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容
				  					晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容
				  					晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容晒单内容
				  				</p>
				  			</div>
				    		
				    	</div>
				    </div>
				  </div>
				</div>
				<?php } ?>
			</div>
			<!--公用底部开始-->
			<?php include $this->tpl('yiyuan:public/footer.php') ?>
		</div>
	</body>
</html>