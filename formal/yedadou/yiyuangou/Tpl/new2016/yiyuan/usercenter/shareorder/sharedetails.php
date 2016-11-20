<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>晒单详情</title>
<meta name="format-detection" content="telephone=no" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/shareDetails1.css" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/css/send.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div class="listItem">
	<!-- <div class="title padding-left10"><?=$data['title']?></div> -->
	<div class=" clearfix" style="height:36px;line-height:36px;margin: 0px;background-color:#fff;">
		<div class="usrName padding-left10"><?=$data['nick']?></div>
		<div class="date"><?=date('Y-m-d H:i:s',$data['add_time'])?></div>
	</div>
	<?php if($data['is_pintuan']==1){?>
	<div class="list clearfix" >
		<div class="clearfix">
			<div class="left padding-left10">中奖商品</div>
			<div class="proName"><?=$tData['goods_title']?></div>
		</div>
		<div class="clearfix">
			<div class="left padding-left10">本期参与</div>
			<div class="right">
				<div class="num"><span class="red1"><?=val($data,'buyer_num',1)?></span> 人次</div>
				<div class="num pull-right">团ID<span class="red1"><?=$tData['id']?></span> </div>
			</div>
		</div>
		<div class="clearfix padding-left10">
			<div class="left">开奖时间</div>
			<div class="right"><?=date('Y-m-d H:i:s',$tData['hit_time'])?></div>
		</div>
	</div>
	<?php }else{ ?>
	<div class="list clearfix" style="margin: 0px;">
		<div class="clearfix">
			<div class="left padding-left10">中奖商品</div>
			<div class="proName"><?=$tData['goods_title']?></div>
		</div>
		<div class="clearfix">
			<div class="left padding-left10">参与期数</div>
			<div class="right"><?=$tData['term']?></div>
		</div>
		<!-- <div class="clearfix">
			<div class="left padding-left10">中奖商品：</div>
			<div class="proName"><?=$tData['goods_title']?></div>
		</div> -->
		<div class="clearfix">
			<div class="left padding-left10">本期参与</div>
			<div class="right">
				<div class="num"><span class="red1"><?=val($data,'buy_count',1)?></span> 人次</div>
				<!-- <div class="num pull-right">第 （<span class="red1"><?=$tData['term']?></span>） 期</div> -->
			</div>
		</div>
		<div class="clearfix padding-left10">
			<div class="left">幸运号码</div>
			<div class="right">
				<span class="red1"><?=$tData['hit_code']?></span> 
			</div>
		</div>
		<div class="clearfix padding-left10">
			<div class="left">揭晓时间</div>
			<div class="right"><?=date('Y-m-d H:i:s',$tData['hit_time'])?></div>
		</div>
	</div>

	<?php }?>
	<div class="content clearfix" style="margin:0px;background-color: #fff;color:#333;">
		<div><?=$data['content']?></div>
		<?php foreach ($shareImg as $key=>$v):?>
		<img src="<?=$v?>_400x400.jpg" />
		<?php endforeach;?>
	</div>
	<div class="extra clearfix" style="margin-top:0px;">
		<a href="#" target="#tar_b" id="comment1" data-url="/yiyuan/UserCenter/ShareOrder/update?id=<?=$data['id']?>">
			<i style="background-image:url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_comment.png)"></i> <span>评论</span>
		</a>
		<a class="zan <?php
        $niceIds=val($_COOKIE,'is_nice',[]);//是否点赞
        $niceIds && $niceIds=unserialize($niceIds);//有值就反序列划
        if(in_array($data['id'],$niceIds)) {
            echo 'over-red';
        }else{
            echo '';
        }

        ?>" data-id="<?=$data['id']?>">
			<i style="background-image:url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_zan.png)"></i>
			<span><?php echo $data['is_nice']?$data['is_nice']:'赞';?></span>
		</a>
	</div>
	<div id="comment_container"></div>
	<div class="timeline-container">
		<?php if(!empty($cCount)){?>
			<!-- <div class="timeTip clearfix">
				回复TA
			</div> -->
			<div id="replyContainer" style="background-color:#fff;padding-top:8px;"></div>
		<?php }?>
	</div>
	
	<!-- <div id="tar_b"></div> -->
</div>
<script src="{__STATIC_URL__}/public/yiyuan/new2016/js/??shortAlert.js,editAddress1.js"></script> 
<script type="text/javascript">
	$(function(){

		var urlPageList='/yiyuan/UserCenter/ShareOrder?id=<?=$data['id']?>';
		var $container=$('#replyContainer');
		$window=$(window);
		//设置$body的高度和宽度
		$body=$("body");
		var sAlert = new shortAlert($body)

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
					} catch(e) {

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
//					app.alert('提示','网络超时,请重试！');
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

		var once = true;
	$('.zan').on('click', function() {
		var id = $(this).data('id');
		var $text = $(this).find('span');
		var text = parseInt($text.text(), 10);
		var $this = $(this)
		if (once) {
			$.ajax({
				url: '/yiyuan/ShareOrder/Index/update',
				type: 'get', 
				data: {
					id: id
				},
				success: function(data) {
					try{
						var data1 = $.parseJSON(data);
					} catch(e) {

					}
					if (data1.error) {
						return;
					}
					if (data1 && !data1.error) {
						if (isNaN(text)) {
							$text.text('1');
						} else {
							$text.text(text + 1);
						}
						$this.addClass('over-red');
						// once = false;
					}
					once = false;
				},
				error: function(data) {
					alert('出现了错误，请稍后重试');
				}
			})
		}
	})
$.fn.scrollTo =function(options){
        var defaults = {
            toT : 0,    //滚动目标位置
            durTime : 500,  //过渡动画时间
            delay : 30,     //定时器时间
            callback:null   //回调函数
        };
        var opts = $.extend(defaults,options),
            timer = null,
            _this = this,
            curTop = _this.scrollTop(),//滚动条当前的位置
            subTop = opts.toT - curTop,    //滚动条目标位置和当前位置的差值
            index = 0,
            dur = Math.round(opts.durTime / opts.delay),
            smoothScroll = function(t){
                index++;
                var per = Math.round(subTop/dur);
                if(index >= dur){
                    _this.scrollTop(t);
                    window.clearInterval(timer);
                    if(opts.callback && typeof opts.callback == 'function'){
                        opts.callback();
                    }
                    return;
                }else{
                    _this.scrollTop(curTop + index*per);
                }
            };
        timer = window.setInterval(function(){
            smoothScroll(opts.toT);
        }, opts.delay);
        return _this;
    };
	$('#comment1').on('click', function(e) {
		//var windowScrollEndy=document.documentElement.scrollHeight||document.body.scrollHeight;
		//var windowScrollEndy = $('body').scrollHeight;
		e.preventDefault();
		var url = $(this).data('url');
		if (once) {
			$.get(url, function(data) {
			    $window.scrollTo({toT:$window.scrollTop()+500});
				var $data = $(data);
				$data.find('#btnSubmit').on('click', function(e) {
					e.preventDefault();
					var id = $data.find('#id').val();
					var content = $data.find('#content').val();
					showAppWait();
					$.ajax({
						url:'/yiyuan/UserCenter/ShareOrder/add',
						type:'post',
						data:{'id':id, 'content': content},
						success:function(dataR) {
							try{
								var dataR1 = $.parseJSON(dataR);
							} catch(e) {

							}
							console.log(dataR)
							if (dataR1.error) {
								sAlert.show(dataR1.msg);
								return;
							}
							if (dataR1.success) {
								sAlert.show(dataR1.msg);
								app.close()
								setTimeout(function(){
									window.location.href = dataR1.url;
								}, 3000)
							}
						},
						error: function() {
							sAlert.show('网络错误，请稍后重试..')
						}
					})
				});
				$('#comment_container').append($data);
				once = false;
			})
		}
	})
	});

</script>
</body>
</html>
