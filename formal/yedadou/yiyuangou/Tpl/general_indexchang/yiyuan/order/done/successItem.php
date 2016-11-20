<div id="container">
<div class="headtip">订单号：<?=$order_sn?><br>您成功参与了<?=$num?>件商品的购买，信息如下：</div>
<?php foreach($new_order as $term_id => $v) {
	foreach($v as $goods_id => $va) {
		$arr = val($new_term, $term_id, []);
?>
		<div class="item">
		<div><?=val($arr, 'title', '')?></div>
		<div>第（<span class="red1"><?=val($arr,'term','')?></span>）期 参与<span class="red1"><?=count(val($va,'code', []))?></span>人次</div>
		<div>获得购买码：<?=implode(', ', val($va,'code', []))?></div>
		</div>
<?php	}
} ?>
</div>