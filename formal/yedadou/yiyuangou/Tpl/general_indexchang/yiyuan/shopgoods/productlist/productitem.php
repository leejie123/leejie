<?php if(!empty($data)) :?>
	<?php foreach($data as $v):?>
		<?php $id = val($v, 'id', 0);?>
		<?php $arr = val($term_real, $v['id'], []); ?>	
	<div class="proItem">
		<div class="row clearfix">
			<div id="proimg-<?=$v['id'];?>" onclick="window.location.href='/yiyuan/ShopGoods/ProductDetails?id=<?=$v['id'];?>&term_id=<?=$v['term_id']?>';" class="col3 proimg"  style="background-image: url(<?php echo val($v,'pic_url', '').'_400x400.jpg';?>)">
			<?php if($v['code_price']>1&&$v['code_price']<11) {?>
					<div class="tipTag" style="background-image: url({__STATIC_URL__}/public/yiyuan/images/tip<?=floor($v['code_price'])?>.png)"></div>
				<?php } ?>
			</div>
			<div class="proleft">
				<div onclick="window.location.href='/yiyuan/ShopGoods/ProductDetails?id=<?=$v['id'];?>&term_id=<?=$v['term_id']?>';" class="row title"><?php echo val($v,'title', '');?></div>
				<div class="row clearfix">
					<div class="col4 addBtn">
						<a data-id="<?=$v['id'];?>" class="buyToCart" href="/yiyuan/cart/index/add?goods_id=<?=$v['id'];?>&spec=<?=val($v, 'term_id', 0);?>"><i class="yiyuan-icon">&#xe808;</i></a>
					</div>
					<div class="progressContainer clearfix">
						<div class="progress">
						<?php
							$num = $v['code_num'];
							$proc = $num > 0 ? round(val($v, 'buy_num', 0) / $num * 100) : 0;
						?>
					      <div class="progress-bar" data-to="<?= $proc ?>"></div>
					    </div>
					    <div class="states">
					    	<div class="states-left">总需<?php echo val($v, 'code_num', 0);?>人次</div>
					    	<div class="states-right">剩余<span class="blue"><?php echo val($v,'last_num', 0);?></span></div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach;?>
<?php endif;?>
<?php include $this->tpl('yiyuan:public/qrcode.php')  ?>
