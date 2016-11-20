<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>分享赚积分</title>
<meta name="format-detection" content="telephone=no" />
<link href="{__STATIC_URL__}/public/yiyuan/css/shareMoney-bak.css?v=20150223" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/shareMoney1.css" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
<style>
	.menu .pad {
		background: #fff;
	}

	.menu > a:last-child{
		border-bottom: 0px;
	}
</style>
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
	<!-- <div id="title" style="color:#db3855;height:40px;line-height:40px;margin:0px;">邀请好友成功一元购，可获得积分！</div> -->
	<!-- <div class="sharebtnContainer clearfix">
		<a href="/yiyuan/UserCenter/MyCard" class="btnGetMoney">推广名片</a>
		<a href="/yiyuan/UserCenter/Agent" class="btnGetMoney">申请代理</a>
		<a id="btnGetMoney" class="btnGetMoney">立即分享</a>
	</div> -->
	<div id="mainContianer">
		<div style="margin: 0px; margin-bottom:8px;height:120px;width:100%;background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/pic_sharemoney.png');background-size:100%;background-position:center;background-repeat:no-repeat;"></div>
	    <nav id="menu" class="menu clearfix">
			<a id="nav1" href="#" style="border-bottom:1px solid #d5d5d5;background-image:url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_return.png)"><div class="title"><i></i><span>我的好友（<?=val($treeData,'level1',0);?>）</span></div></a>
			<div class="pad" id="container1">
				
			</div>
			<div id="more1" class="more"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_team.png')"></i><span>加载更多</span></div>
			<a id="nav2" href="#" style="border-top:0px;background-image:url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_return.png)"><div class="title"><span></span>好友的好友（<?=val($treeData,'level2',0)+val($treeData,'level3',0);?>）</div></a>
			<div class="pad" id="container2">
				
			</div>
			<div id="more2" class="more">加载更多</div>
		</nav>
	</div>
	<?php include $this->tpl('yiyuan:public/footer.php') ?>
	<script>
	$(function(){
			//这里是加载的翻页
			var loadUrl='/yiyuan/UserCenter/ShareMoney';
			var $arrContainer=[$("#container1"),$("#container2"),$("#container3")];
			var $arrMore=[$("#more1"),$("#more2"),$("#more3")];
			var arrIscontainerShow=[false,false,false];
			var arrCurrentPage=[0,0,0];
			$window=$(window);
			//设置$body的高度和宽度
			$body=$("body");
			$body.width($window.width());
			$body.height($window.height());
			var BBL=BOBOLIB_fun().init($,this,$window,$body);
			//点击测试
			var app=new MainApp(BBL); 
			$('#btnGetMoney').click(function(){
				var BL=BOBOLIB_fun().init($,this,$(window),$body);
				var lockLayout=new BL.BPopup($body,{ 
					lockLayerColor : "#000",
					lockLayerAlpha : .8,
					cssPosition:'fixed'
				});
				var strDiv=$('<div></div>');
				var img=$('<img src="<?=$url?>">');
				img.css('width','50%');
		    	img.css('margin-top','80%');
		    	img.css('margin-left','25%');
		    	strDiv.append(img);
				strDiv.css('background-repeat','no-repeat');
				strDiv.css('background-position','left top');
				strDiv.css('background-size','100% auto');
				strDiv.css('background-image','url({__STATIC_URL__}/public/yiyuan/images/sharebak.png)');
				strDiv.css('color','#fff');
				strDiv.css('font-size','16px');
				var bimg=new BL.BBase(strDiv,{dockType:9,resizeW:.9,resizeH:0.5,offsetX:0,offsetY:0,cssPosition:'fixed'});
				var $lock=lockLayout.popup(bimg);
				$lock.width($lock.width()+5);
				strDiv.click(function(){
					lockLayout.reomveLockLayer();
				});
			});
			//
			var currentPage=1;
			function clickNav(index){
				var isShow=arrIscontainerShow[index];
				if(!isShow){
					$arrContainer[index].show();
					$arrMore[index].show();
					var page=arrCurrentPage[index];
					if(page==0) loadList(index+1,1);
				}else{
					$arrContainer[index].hide();
					$arrMore[index].hide();
				}
				arrIscontainerShow[index]=!isShow;
			}
			var isNav1=false;
			$('#nav1').click(function(e){
				e.preventDefault();
				clickNav(0);
				if(isNav1){
					$(this).css('background-image', 'url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_return.png)')
				}else{
					$(this).css('background-image', 'url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_down_b.png)')
				}
				isNav1=!isNav1;
			});
			var isNav2=false;
			$('#nav2').click(function(e){
				e.preventDefault();
				clickNav(1);
				if(isNav2){
					$(this).css('background-image', 'url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_return.png)')	
				}else{
					$(this).css('background-image', 'url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_down_b.png)')	
				}
				isNav2=!isNav2;
			});
			$('#nav3').click(function(e){
				e.preventDefault();
				clickNav(2);
				$(this).css('background-image', 'url({__STATIC_URL__}/public/yiyuan/images/sharebak.png)')
			});
			function loadList(type,page){
				app.popupWait();
				url=loadUrl;
				var $container=$arrContainer[type-1];
				$.ajax({
					url:url,
					data:{page_no:page,con:type},
					success: function(data){
						app.close();
						var toData={};
						try{
							toData=$.parseJSON(data);
						}catch(e){
							
						}
						if(toData.error){
							if(toData.end){
								$more.hide();
								return;
							}
							if(toData.msg!='') app.alert('提示',toData.msg);
							return;
						}
						//console.log(data);
						$container.append(data);
						arrCurrentPage[type-1]++;
					},
					error:function(){
						app.close();	
//						app.alert('提示','网络超时,请重试！');
					}
				});
			}
			//loadList(1,1);
			$arrMore[0].click(function(e){
				e.preventDefault();
				loadList(1,arrCurrentPage[0]+1);
			});
			$arrMore[1].click(function(e){
				e.preventDefault();
				loadList(2,arrCurrentPage[1]+1);
			});
			$arrMore[2].click(function(e){
				e.preventDefault();
				loadList(3,arrCurrentPage[2]+1);
			});

		});
	</script>
</body>
</html>
