<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>用户购买记录</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/myOrder.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div class="user">
	<!-- <img alt="Susan't Avatar" src="<?php $defaultAvatar = '{__STATIC_URL__}/public/images/default_user.gif'; echo !empty($buyer['avatar'])?substr($buyer['avatar'],0,strlen($buyer['avatar'])-1).'46':$defaultAvatar;?>"> -->
	<img alt="Susan't Avatar" src="<?php $defaultAvatar = '{__STATIC_URL__}/public/images/default_user.gif'; echo $defaultAvatar;?>">
	<div class="name"><?=$buyer['nick'];?><br>ID:<?=$buyer['uid'];?></div>
</div>
<div id="container" class="clearfix">
</div>
<div style="margin-bottom: 80px;height: 1px;"></div>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
</body>
<script>
	$(function(){
		//这里是加载的翻页
		var loadUrl='/yiyuan/ShopGoods/BuyRecord?buyer_id=<?=$buyer['uid'];?>';
		var $container=$("#container");
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
						var typeData=typeof(data);
						var arr=[];
						if(typeData=='string') arr=data.split(',');
						//console.log(typeData+"||"+data);
						if(typeData=='number'||arr.length==1||data.length<10){
							$this.text(data);
						}else{
							var btna=$('<a href="#">查看</a>');
							btna.click(function(e){
								e.preventDefault();
								var arrData=data.split(',');
								var strOut='';
								$.each(arrData,function(index,item){
									//console.log(index+','+item);
									if(index%4==0){
										strOut+='<br>';
									}else{
										strOut+=',';
									}
									strOut+=item;
								})
								//var reg=new RegExp(',',"g"); //创建正则RegExp对象  
								//var newstr=data.replace(reg,'<br>');  
								app.alert('幸运码',strOut);
							});
							$this.append(btna);
						}
					});
					$container.append($data);
				},
				error:function(){
					app.close();
					isLoadList=false;
					app.alert('提示','网络超时,请重试！');
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
