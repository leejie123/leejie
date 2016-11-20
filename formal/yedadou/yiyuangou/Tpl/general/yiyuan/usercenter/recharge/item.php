<?php if(!empty($money)):?>
<?php foreach($money as $v):?>
<div>
	<div><?=val($v,'money', 0)?></div>
	<div>
	<?php switch ($v['type']) {
		case 3:
			echo "微信充值";
			break;
		
		default:
			echo "管理员充值";
			break;
	}?></div>
	<div><?=date("Y-m-d H:i:s", val($v,'add_time', time()))?></div>
</div>
<?php endforeach; ?>
<?php endif;?>
