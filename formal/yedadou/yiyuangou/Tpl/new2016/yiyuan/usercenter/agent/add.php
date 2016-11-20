<?php include $this->tpl('shop:public/html_header.php') ?>
		<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
		<title>申请代理</title>
		<style>
			.notice {
				margin: 0 18px;
				padding-top: 6px;
				border-top: 1px solid #eee;
			}

			.notice > label {
				color: #333;
				margin-bottom: 8px;
			}

			.notice > div {
				color: #999
			}

			.notice > div > span {
				display:block;
				line-height: 23px;
			}
		</style>
	</head>

	<body class="">
		<div class="wrapper">
			<div class="cart-container">
				<form id="dataForm" method="post" action="/Yiyuan/UserCenter/Agent/post" >
					<div class="cart-not-empty">
						<div class="" id="adressContainer">

							<div class="cus-list-input1" style="padding-right:0px;">
								<div>
									<label class="required">
                                        姓名
									</label>
									<div class="item-input">
										<input type="text" id="realName" name="realname" autofocus="autofocus" placeholder="">
									</div>
								</div>
							</div>

							<div class="cus-list-input1" style="padding-right:0px;">
								<div>
									<label class="required">
                                        手机
									</label>
									<div class="item-input" style="position:relative;">
										<input type="tel" id="phone" name="phone" style="margin-right:-20px;" placeholder="">
										<span style="color:#db3855;position:absolute;top: 15px;font-size: 12px;right: 10px;display:none;">请输入正确的手机号码</span>
									</div>
								</div>

							</div>

							<div class="cus-list-input1" style="padding-right:0px;">
								<div>
									<label class="required">
                                        微信号
									</label>
									<div class="item-input">
										<input type="text" id="weixin" name="wx_user" placeholder="">
									</div>
								</div>
							</div>

							<div class="cus-list-select">
								<div>
									<label class="required">
										申请级别
									</label>
									<div class="item-select">
										<div style="border-bottom: 0px;">
											<div class="cus-select">
												<select id="leveltype" name="level">
													<option value="">选择申请代理级别</option>
			                                        <?php if($agents){ $i=0;  foreach($agents as $v): ?>
			                                            <option value="<?=$v?>"><?=$v?></option>
			                                        <?php endforeach;}?>
												</select>
											</div>	
										</div>
									</div>
								</div>
							</div>
							<div class="cus-list-textarea">
								<div class="">
									<label>
										备注
									</label>
									<div class="item-input">
										<textarea class="" name="comment" id="descripte" placeholder='不能大于18个汉字'></textarea>
									</div>
								</div>
							</div>
							<div class="" style="margin:18px;text-align:center;">
								<button id="save"  class="cus-btn cus-btn-md cus-btn-red" style="margin-right:18px;width: 41.5%" type="button">提交</button>
								<button id="cancel" onclick="history.back(-1);" class="cus-btn cus-btn-grey cus-btn-md" type="button" style="width:41.5%;">取消</button>
							</div>
                            <?php if($service):?>
							<div class="notice">
								<label>申请须知</label>
								<div>
                                    <textarea  readonly="readonly" style="height:150px;border:0px;border-color:RGB(247,247,247);background-color: RGB(247,247,247);" id="service" name="service" class="form-control"><?=$service?></textarea>
								</div>
							</div>
                            <?php endif;?>
						</div>

					</div>
				</form>
			</div>
	</body>
	<script src="{__STATIC_URL__}/public/yiyuan/new2016/js/shortAlert.js"></script>
	<script>
	$(function(){
		$body=$('body');
		$window=$(window);
		$body.height($window.height())
		var sAlert=new shortAlert($body);
		$('#phone').on('change', function() {
			var reg = /^1[3|4|5|7|8]\d{9}$/g;
			var value = $(this).val();
			if (!value == '') {
				if (value.match(reg)) {
					$(this).next().hide();
				} else {
					$(this).next().show();
				}
			} else {
				$(this).next().hide()
			}
		});
		var once = true;
		var $dataForm=$('#dataForm');
		var url=$dataForm.attr('action');
		$('#save').click(function(e){
			e.preventDefault();
			if (once) {
				$.ajax({
					url:url,
					type:'post',
					data:$dataForm.serialize(),//form序列化
					success: function(data) {
						//console.log(data);
						try{
							data=$.parseJSON(data);
						}catch(e){
							sAlert.show('请刷新页面重试..');
							return;
						}
						if(data.error){
							sAlert.show(data.msg);
							console.log(data.msg)
							return;
						}
						sAlert.show(data.msg);
						window.location.href = data.url;
						once = false;
					}
				});
			}

		});
	//
	});
	
	</script>

</html>