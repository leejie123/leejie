<?php include $this->tpl('shop:public/html_header.php') ?>
	<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/moneyAccount.css" />
	<script src="{__STATIC_URL__}/public/front/default/js/moneyAccount.js"></script>
	<title>资料编辑</title>
	<style type="text/css">
		#usrInfo{
			font-size: 16px;
		}
		
	</style>
	</head>

	<body class="no-skin">
		<div class="wrapper">
			<?php include $this->tpl('shop:public/header.php') ?>
					<?php if(!$isEmpty):?>
  					<form class="form-horizontal" id="usrInfo">
  					  <div class="panel panel-default" style="margin: 10px;">
  					 <div class="panel-body">
					  <div class="form-group">
					    <label for="realname" class="col-sm-2 control-label">真实姓名：</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="realname" name="realname" value="<?=$itemes['realname']?>">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="sex" class="col-sm-2 control-label">性别：</label>
					    <div class="col-sm-10">
					      <select class="form-control" id="sex" name="sex">
							  <option <?php if($itemes['sex']==1):?> selected="true" <?php endif?> value="1">男</option>
							  <option <?php if($itemes['sex']==2):?> selected="true" <?php endif?> value="2">女</option>
							</select>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="phone" class="col-sm-2 control-label">电话：</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="phone" name="phone" value="<?=$itemes['phone']?>">
					    </div>
					  </div>
					   <div class="form-group">
					    <label for="qq" class="col-sm-2 control-label">QQ：</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="qq" name="qq" value="<?=$itemes['qq']?>">
					    </div>
					  </div>
					   <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">邮箱：</label>
					    <div class="col-sm-10">
					      <input type="Email" class="form-control" id="inputPassword3" name="email" value="<?=$itemes['email']?>">
					    </div>
					  </div>
					  	</div>
  					  </div>
					  <div class="container">
					  	<div class="row">
					    <div class="col-sm-5">
					      <button type="submit" class="btn btn-warning btn-block">确定</button>
					    </div>
					    </div>
					  </div>
					</form>
					<?php endif?>
  			
			<div  style="padding: 10px;">
				
			</div>
			<?php include $this->tpl('shop:public/footer.php') ?>
	</body>

</html>