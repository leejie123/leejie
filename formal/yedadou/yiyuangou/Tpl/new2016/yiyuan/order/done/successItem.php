<?php foreach($new_order as $term_id => $v) {
	foreach($v as $goods_id => $va) {
		$arr = val($new_term, $term_id, []);
?>
	<div class="row du0">
		<div class="label">商品名称</div>
		<div class="tip goodsTip"><?=val($arr, 'title', '')?></div>
	</div>
	<div class="row du0">
		<div class="label">期　　数</div>
		<div class="tip">第(<?=val($arr,'term','')?>)期，参与<?=count($va['code'])?>次</div>
	</div>
	<div class="row du0" style="height: auto !important;">
		<div class="label" style="width: 70px;">购 买 码</div>
		<div class="tip codeItem">
		<?php
		$codes=val($va,'code', []);
		echo implode(', ',$codes);
		?>
	</div>
<?php	}
} ?>
