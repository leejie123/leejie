<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>晒单详情</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/shareDetails.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div class="listItem">
	<div class="title padding-left10"><?=$data['title']?></div>
	<div class="row clearfix">
		<div class="usrName padding-left10"><?=$data['nick']?></div>
		<div class="date"><?=date('Y-m-d H:i:s',$data['add_time'])?></div>
	</div>
	<div class="list clearfix">
		<div class="row clearfix">
			<div class="left padding-left10">中奖商品：</div>
			<div class="proName"><?=$term['goods_title']?></div>
		</div>
		<div class="row clearfix">
			<div class="left padding-left10">本期参与：</div>
			<div class="right">
				<div class="num"><span class="red1"><?=$data['buy_count']?></span> 人次</div>
				<div class="num pull-right">第 （<span class="red1"><?=$term['term']?></span>） 期</div>
			</div>
		</div>
		<div class="row clearfix padding-left10">
			<div class="left">幸运号码：</div>
			<div class="right">
				<?=$term['hit_code']?></span>
			</div>
		</div>
		<div class="row clearfix padding-left10">
			<div class="left">揭晓时间：</div>
			<div class="right"><?=date('Y-m-d H:i:s',$term['hit_time'])?></div>
		</div>
	</div>
	<div class="content clearfix">
		<?=$data['content']?>
		<?php foreach ($shareImg as $key=>$v):?>
		<img src="<?=$v?>_400x400.jpg" />
		<?php endforeach;?>
	</div>
	<div class="timeline-container">
	<?php if(!empty($cCount)){?>
		<div class="timeTip clearfix">
			回复TA
		</div>
		<div id="replyContainer"></div>
	<?php }?>
	</div>
</div>
<a id="btnReturn" href="/yiyuan/UserCenter/ShareOrder/update?id=<?=$data['id']?>">回复TA</a>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
<script type="text/javascript">
	$(function(){
		var urlPageList='/yiyuan/UserCenter/ShareOrder?id=<?=$data['id']?>';
		var $container=$('#replyContainer');
		$window=$(window);
		//设置$body的高度和宽度
		$body=$("body");
		$body.width($window.width()-5);
		$body.height($window.height());
		var BBL=BOBOLIB_fun().init($,this,$window,$body);
		var app=new MainApp(BBL);
		var currentPage=0;
		function showAppWait(){ //节点后面加一个加载的动画条
			var $wait=app.popupWait(3,2,$container);
			$wait.css('display','block');
		    $wait.css('width','10px');
		    $wait.css('margin','25px auto');
		}
		//翻页
		var currentPage=0;
		function loadList(page){
			if(currentPage==page) return;
			isLoadList=true;
			showAppWait();
			currentPage=page;
			url=urlPageList;
			$.ajax({
				url:url,
				data:{page_no:page},
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
					//console.log(data);
					var $data=$(data);
					$data.find('.progress-bar').each(function(){
						var $this=$(this);
						var width=parseInt($this.attr('data-to'))+"%";
						$this.css('width',width);
					});
					$container.append($data);
				},
				error:function(){
					app.close();
					app.alert('提示','网络超时,请重试！');
					isLoadList=false;
				}
			});
		}
		loadList(1);
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
			if( t >=windowScrollEndy) {
				if(isPageEnd) app.close();
				if(isLoadList||isPageEnd){
					return;
				}
				loadList(currentPage+1);
			}
		}
	});
</script>
</body>
</html>
