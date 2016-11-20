<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>计算详情</title>
<link href="http://static.yedadou.com/public/yiyuan/css/logdetails.css" rel="stylesheet" type="text/css" />
<style type="text/css">

</style>
</head>
<body>
<div class="header">
	<div>计算公式</div>
	<div>[(数值A<?php if($winningRule == 2 && $opencode > 0) :?>+数值B<?php endif;?>)÷商品所需人次]取余数 + <?=$startMinCode?></div>
</div>
<div class="pad pad-bottom">
	<div class="title">计算结果</div>
	<div class="code">幸运号码:<span class="red1"><?=val($term_data, 'hit_code', 0)?></span></div>
	<div>
		全站参与时间记录总和: <?=$total?><br/>
		<?php if($winningRule == 2 && $opencode > 0):?>
		第<?=$cqssc_term?>期时时彩开奖: <?=$opencode?><br/>
		<?php endif;?>
		商品总需人次:<?=$code_num?><br/>
		<?php if($winningRule == 2 && $opencode > 0):?>
		(<?=$total?> + <?=$opencode?>) ÷ <?=$code_num?>取余数 = <?=$ok?><br/>
		<?php else:?>
		<?=$total?> ÷ <?=$code_num?>取余数 = <?=$answer?><br/>
		<?php endif;?>
		幸运码: <?=$startMinCode?>+ <?=$answer?> = <span class="red1"><?=$ok?></span>
	</div>
</div>
<div class="pad">
	<div class="title">数值A</div>
	<div>=截止该商品开奖时间点前最后100条全站参与记录</div>
	<div>
		<a class="right" href="#" id="showbtn">展开 <span id="btnTip">↓</span></a>
		<div class="left">=<?=$total?></div>
	</div>
</div>
<div class="table" id="list">
	<div>
		<a>用户帐号</a>
		<div>夺宝时间</div>
	</div>
	<?php if(!empty($result)):?>
		<?php foreach($result as $v):?>
	<div class="clearfix">
		<a><?=$v['buyer_nick'];?></a>
		<div class="left"><?=val($time_date, $v['id'], 0)?><span class="red1">→<?=val($time, $v['id'], 0)?></span></div>
	</div>
		<?php endforeach?>
	<?php endif;?>
</div>
<?php if($winningRule == 2 && $opencode > 0):?>
<div class="pad">
	<div class="title">数值B</div>
	<div>=最近一期中国福利彩票“老时时彩”的开奖结果</div>
	<div>
		<a class="right" href="http://caipiao.163.com/award/cqssc/20151207.html">开奖查询</a>
		<div class="left"><?=$opencode?>(第<?=$cqssc_term?>期) </div>
	</div>
</div>
<?php endif;?>
<?php include $this->tpl('yiyuan:public/footer.php') ?>
<script type="text/javascript">
$(function(){
	var $list=$('#list');
	var isShow=false;
	var $btnTip=$('#btnTip');
	$('#showbtn').click(function(e){
		e.preventDefault();
		isShow=!isShow;
		if(!isShow){
			$btnTip.text('↑');
			$list.hide();
		}else{
			$btnTip.text('↓');
			$list.show();
		}
	});
});
</script>

</body>
</html>
