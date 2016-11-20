<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>购物车</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/cart.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div id="mainContianer">
<?php if(empty($cart_data)): ?>
	<div class="empty">
		<img class="tipimg" src="{__STATIC_URL__}/public/yiyuan/images/empty.jpg">
		<div class="title">您的清单还没有任何商品</div>
		<a href="/yiyuan/ShopGoods/ProductList">马上去逛逛~</a></div>
<?php else :?>
	<form id="formgo" action="/yiyuan/order/index" method="post">
	
	</form>
	<div class="more"></div>
<?php endif;?>
</div>
<?php if(!empty($cart_data)): ?>
<div id="menu">
		<div class="tip">合计<span id="moneyTotal" class="red1"><?=$goods_total?></span>元（共<span id="itemCount" class="red1"><?=$cart_goods_num?></span>个商品）</div>
		<div class="btn j-gomoney">去结算</div>
</div>
<?php endif;?>
<?php include $this->tpl('yiyuan:public/topNavCenter.php') ?>
<script type="text/javascript" src="{__STATIC_URL__}/public/yiyuan/dopage.js"></script>
<script>
	$(function(){
		var cache=[];
		function getJqueryE(id){
			if(cache[id]) return cache[id];
			cache[id]=$('#'+id);
			return cache[id];
		}
		function change(){
			var $this1=$(this);
            var v=Number($this1.val());
            if(isNaN(v)) v=0;
             var last=$this1.data('last')||0;
             if(v>last){
            	v=last;
            }
            $this1.val(v);
            resetShowTotal();
		}
		function focus(){
			var $this1=$(this);
			//console.log('获得焦点'+);
            var v=Number($this1.val());
            if(isNaN(v)) v=0;
            $this1.val(v);
		}
		function focusOut(){
			//console.log('失去焦点');
			
		}
		
		var $moneyTotal=$("#moneyTotal"); 
		var $itemCount=$("#itemCount");
		//开始遍历一次，保存所有购物车目录
		function resetShowTotal(){
			//console.log('resetShowTotal');
			var moneyTotalNum=0;
			var proCount=0;
			var $arrC=$('.buySelect');
			$arrC.each(function(){
				var c=$(this);
				var id=c.data('id');
				var codeprice=c.data('codeprice');
				//console.log(codeprice);
				var dQ=getJqueryE('quantity-'+id);
				var itemCount=parseInt(dQ.val());
				if(isNaN(itemCount)){
					return;
				}
				var checked=c.prop('checked');
				if(checked){
					proCount++;
					moneyTotalNum+=itemCount*codeprice;
				}
			});
			if(moneyTotalNum<0) moneyTotalNum=0;
			$moneyTotal.html(moneyTotalNum);
			$itemCount.html(proCount);
		}
		function checkboxOpration(e){
			e.preventDefault();
			var $this=$(this);
			var c=$this.parent().find('.buySelect');
			var id=c.data('id');
			//当前物品数量
			var dQ=getJqueryE('quantity-'+id);
			var itemCount=parseInt(dQ.val());
			//console.log(isNaN(itemCount)+","+itemCount)
			if(isNaN(itemCount)){
				return;
			}
			var checked=!c.prop('checked');
			c.prop('checked',checked);
			resetShowTotal();
		}
		//$('.proImg').click(checkboxOpration);
		//$('.checkbox label').click(checkboxOpration);
		//
		$window=$(window);
		//设置$body的高度和宽度
		$body=$("body");
		$body.width($window.width());
		$body.height($window.height());
		var BBL=BOBOLIB_fun().init($,this,$window,$body);
		var app=new MainApp(BBL);
		$(".j-gomoney").click(function(){
			$("#formgo").submit();
		});
			var urlPageList='/yiyuan/cart/index';
			var $container=$('#formgo');
			doPage(urlPageList,$container,function($data){
				$data.find('.proImg').click(function(){
					window.location.href=$(this).data('url'); 
				});
				$data.find('.checkbox label').click(checkboxOpration);
				$data.find('.a-del').click(function(e){
					e.preventDefault();
					var id=$(this).data('id');
					app.confirm('提示','真的要删除吗?',function(index){
						if(index==0){
							app.popupWait();
							$.ajax({
								url:"/yiyuan/cart/index/delete",
								type:'get',
								data: {id:id},
								success: function(item) {
									app.close();
									$("div[data-id='"+id+"']").remove();
									//window.location.href="/yiyuan/cart/"; 
								}
							})
							//
						}
					});
					//
				});

				$data.find('.a-all').click(function(e){
					e.preventDefault();
					var $this=$(this);
					var codeprice=$this.data('codeprice');
					var toalprice=$this.data('toalprice');
					var val=parseInt($this.html());
					var id=$this.data('id');
					var $toolTip=$this.parent().parent().find('#tipJL-'+id);
					var lastNum=0;
					var maxNum=parseInt($('#surplusNum-'+id).text());
					switch(val){
						case 3:
							lastNum=3;
							break;
						case 5:
							lastNum=5;
							break;
						case 10:
							lastNum=10;
							break;
						case 20:
							lastNum=20;
							break;
						case 50:
							lastNum=50;
							break;
						default:
							lastNum=maxNum;
							break;
					}
					if(lastNum>maxNum) lastNum=maxNum;
					$('#quantity-'+id).val(lastNum);
					lastNum=codeprice*lastNum;
					var totalTem=parseInt(toalprice);
					//alert('抽中几率：'+lastNum+'/'+totalTem);
					$toolTip.html('抽中几率：'+lastNum+'/'+totalTem);
					resetShowTotal();
					//
				});
				$data.find('input[type="tel"]').each(function(){
					var $this=$(this);
					$this[0].addEventListener("input",change,false); 
		            $this[0].addEventListener("focus",focus,false); 
		            //$this[0].addEventListener("focusout",focusOut,false);
				});
				resetShowTotal();
			});
	});
</script>
</body>
</html>
