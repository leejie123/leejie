<?php if(!empty($tree)){ ?>
<?php foreach ($tree as $key=>$v):?>
<div class="clearfix">
	<div class="ico">
		<img src="<?=$v['avatar'] ?>">
	</div>
	<div class="title">
		<?=$v['nick'] ?>
	</div>
	<div class="money">
		<span class="red"><?=$v['total_order'] ?></span>单 <!-- 佣金/<span class="red">￥0</span> -->
	</div>
</div>
<?php endforeach;?>
<?php } ?>