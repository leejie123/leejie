<?php if(!empty($com)){?>
<?php foreach ($com as $key=>$v):?>
<tr>
	<td><?=$v['buyer_name']?></td>
	<td><?=$v['time']?></td>
	<td><?=$v['goods_amount']?></td>
	<td><?=floor($v['comission_amount'])?></td>
</tr>
<?php endforeach;?>
<?php } ?>

