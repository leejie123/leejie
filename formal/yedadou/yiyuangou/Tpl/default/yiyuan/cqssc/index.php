<form action="/yiyuan/cqssc/get" method="post">
	商品id<input type="text" name="goods_id" value="<?=$goods_id?>"><br/>
	期数id<input type="text" name="term_id" value="<?=$term_id?>"><br/>
	<input type="submit"/>
</form>
<?php if(!empty($result)):?>
	<ol>
	<?php foreach($result as $v):?>
		<li>订单号:<?=$v['order_sn'];?>&nbsp;&nbsp;时间:<?=val($time_date, $v['id'], '');?>------<?=val($time, $v['id'], '');?>&nbsp;&nbsp;购买者:<?=$v['buyer_nick']?></li>
	<?php endforeach;?>
	</ol>
<?php endif;?>
<h4>计算结果</h4>
1. 求和<?=$total?><br/>
2. 最近一期重庆时时彩<?=$opencode?><br/>
3. 求余( (<?=$num?> + <?=$total?>) %  <?=$code_num?> ) = <?=(($num + $total )%$code_num);?><br/>
4. <?=(($num + $total )%$code_num)?> + <?=$startMinCode?> = <?=(($num + $total )%$code_num)+$startMinCode;?><br/>



<?php if(!empty($resultOk)):?>
	<h4>中奖</h4>
	幸运码:<?=val($resultOk, 'code', '');?><br/>
	订单号:<?=val($resultOk, 'order_sn', '');?><br/>
	中奖人:<?=val($resultOk, 'buyer_nick', '');?><br/>
	中奖人id:<?=val($resultOk, 'buyer_id', '');?><br/>
<?php endif;?>