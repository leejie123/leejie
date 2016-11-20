<?php if(!empty($money)):?>
<?php foreach($money as $v):?>
<div class="clearfix">
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
<?php else:?>
    <div style="display:table;width:100%;background-color:#f7f7f7;text-align:center;height:400px;font-size:16px;">
        <div style="display:table-cell;color:#666;vertical-align:middle;width:auto;float:none;" >
            近期无任何充值记录
        </div>
    </div>
<?php endif;?>
