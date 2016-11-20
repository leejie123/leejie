<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>一元购记录</title>
<meta name="format-detection" content="telephone=no" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/myOrder1.css" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/public1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<!-- <div style="display:block;height:50px;line-height:50px;font-size:16px;color:#fff;background-color:#db3855;text-align:center;">一元购记录</div> -->
<nav id="menu" class="menu clearfix" style="margin-bottom:0px;">
	<a class="over" href="/yiyuan/UserCenter/YiyuanRecord?status=going" style="background: none">全部</a>
	<a href="/yiyuan/UserCenter/YiyuanRecord?status=going" style="background: none">进行中</a>
	<a href="/yiyuan/UserCenter/YiyuanRecord?status=hit" style="background: none">已揭晓</a>
</nav>
<!-- <div style="width:100%;height:100%;display:table">
	<div style="display:table-cell">
		
	</div>
</div> -->

<div id="container" class="clearfix" style="height: 100%;">
	
</div>
<div style="margin-bottom: 80px;height: 1px;"></div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
</body>
<script>
	$(function(){
		//这里是加载的翻页
		var loadUrl='/yiyuan/UserCenter/YiyuanRecord?status=<?=$sta;?>';
		var $container=$("#container");
		$container_empty=$('#'+$container.attr('id')+'_empty');	
		$container_empty.hide();
		$window=$(window);
		//设置$body的高度和宽度
		$body=$("body");
		$body.width($window.width());
		$body.height($window.height()-80);
		var BBL=BOBOLIB_fun().init($,this,$window,$body);
		//点击测试
		var app=new MainApp(BBL);
		//
		function showAppWait(){ //节点后面加一个加载的动画条
			var $wait=app.popupWait(3,2,$container);
			$wait.css('display','block');
		    $wait.css('width','10px');
		    $wait.css('margin','25px auto');
		}
		var arrA=[];
		var currentSelectIndex=0;
		var currentPage=0;
		$('#menu a').each(function(){
			var $this=$(this);
			arrA.push($this);
			$this.click(function(e){
				e.preventDefault();
				var $this=$(this);
				if(currentSelectIndex==$this.index()) return;
				arrA[currentSelectIndex].removeClass('over');
				currentSelectIndex=$this.index();
				//console.log(currentSelectIndex);
				$this.addClass('over');
				currentPage=0;
				isLoadList=true;
				isPageEnd=false;
				$container.empty();
				//console.log($this.index());
				loadList($this.index()+1,1);
				//
			});
			//
		});
		//翻页
		var currentPage=0;
		function loadList(type,page){
			//console.log('loadList....'+type+","+page);
			if(currentPage==page) return;
			isLoadList=true;
			showAppWait();
			currentPage=page;
			url=loadUrl;
			$.ajax({
				url:url,
				data:{page_no:page,con:type},
				success: function(data){
					app.close();
					isLoadList=false;
					var toData={};
					try{
						toData=$.parseJSON(data);
					}catch(e){
						
					}
					if(toData.error){
						if(toData.end){
							isPageEnd=true;
							return;
						}
						if(toData.msg!='') app.alert('提示',toData.msg);
						return;
					}
					var $data=$(data);
					//console.log($data);
					//初始化点击查看幸运码
					$data.find(".code").each(function(){
						var $this=$(this);
						var data=$this.data('code');
						var loadCodeUrl=data;
						var btna=$('<a href="#">查看</a>');
						var isLoadCode=false;
						btna.click(function(e){
							e.preventDefault();
							if(isLoadCode) return;
							isLoadCode=true;
							app.popupWait(1,1);
							var page_no=1;
							$.ajax({
								url:loadCodeUrl,
								data:{page_no:page_no},
								success: function(data){
									app.close();
									isLoadCode=false;
									var arrData=data.split(',');
									var strOut='';
									$.each(arrData,function(index,item){
										//console.log(index+','+item);
										if (index !== 0) {
											if(index%3==0){
												strOut+='<br>';
											}else{
												strOut+='&nbsp;&nbsp;';
											}
										}
										strOut+=item;
									});
									app.alert('第四期购买码',strOut);
									// if ($('.boboPanel')) {
									// 	$('<div class="title1">第四期购买码<div>').insertBefore($('.boboPanel'))
									// }
								},
								error:function(){
									app.close();
									isLoadList=false;
								}
							});//加载幸运码end
			     			});
						$this.append(btna);

					});
					$container.append($data);
				},
				error:function(){
					app.close();
					isLoadList=false;
//					app.alert('提示','网络超时,请重试！');
				}
			});
		}
		loadList(1,1);
		var isLoadList=true;
		var isPageEnd=false;
		//滚动条是否滚到底部
		window.onscroll=function(){
			//变量t就是滚动条滚动时，到顶部的距离
			var windowScrollEndy=document.documentElement.scrollHeight||document.body.scrollHeight;
			windowScrollEndy-=30;
			var viewHeight=document.documentElement.clientHeight||document.body.clientHeight;
			var t =document.documentElement.scrollTop||document.body.scrollTop;
			t+=viewHeight;
			//console.log(t+","+windowScrollEndy);
			if( t >=windowScrollEndy) {    
				if(isLoadList||isPageEnd) return;
				loadList(currentSelectIndex+1,currentPage+1);
				//console.log('加载..');
			}
		}
	});
</script>
</html>
