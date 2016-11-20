<?php if($act!='point'){?>
	<?php if(!empty($com)){?>
	<?php foreach ($com as $key=>$v):?>
	<tr>
		<td><div class="clearfix" style="width: 60px;height: 30px;overflow: hidden;word-break: normal;word-wrap: break-word;line-height:30px;"><?=$v['buyer_name']?></div></td>
		<td><?=$v['time']?></td>
		<td><?=$v['order_sn']?></td>
		<td><?=floor($v['comission_amount'])?></td>
	</tr>
	<?php endforeach;?>
	<?php } ?>
<?php }else{?>
	<?php if(!empty($point)){?>
	<?php foreach ($point as $key=>$v):?>
	<tr>
		<td><div class="clearfix" style="width: 60px;height: 30px;overflow: hidden;word-break: normal;word-wrap: break-word;line-height:30px;"><?=$v['source_name']?></div></td>
		<td><?=$v['time']?></td>
		<td><?=floor($v['point'])?></td>
	</tr>
	<?php endforeach;?>
	<?php } ?>
<?php }?>
