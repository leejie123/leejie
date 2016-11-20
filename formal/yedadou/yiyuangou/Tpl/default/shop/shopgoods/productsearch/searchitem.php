<?php if(empty($products)){ ?>
	<div class="good-empty">
		<div>
			<span>亲爱的客官</span>
			<span>东家还未上传该宝贝商品哦~</span>
		</div>
	</div>
<?php }else{ ?>
	<!-- items -->
	<div class="pure-g">
	<?php foreach ($products as $key=>$value):?>
		<div class="pure-u-1-2">
			<a class="list">
				<div class="img" style="background-image: url('<?=val($value,'pic_url')?>')"></div>
				<div class="intro"><?=val($value,'title')?></div>
				<p class="">
					<span class="price">¥ <?=val($value,'price')?></span>
					<span href="" class="addCart" onclick="window.location.href='#'"></span>
				</p>
			</a>
		</div>
	<?php if($key % 2 == 1){ ?>
	</div>
	<div class="pure-g">
	<?php } ?>
	<?php endforeach;?>
	</div>
	<!-- items -->
<?php } ?>