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
				<div onclick="window.location.href='/yiyuan/ShopGoods/ProductDetails?id=<?=$v['id'];?>&term_id=<?=$v['term_id']?>';" class="row title">
					<?php echo val($v,'title', '');?>
				</div>
				<div style="line-height: 18px;color:#666;font-size: 12px;margin: 4px 0;margin-top:0px;">价值：￥ <?php echo val($v,'price', '');?></div>
				<div class="row clearfix">
				<?php if(val($v,'end_time',0) > 0 && val($v,'interval_time',0) == 0){ ?>
					<div class="clockTip clearfix nowrap" data-id="<?=$v['id'];?>" data-time='<?php echo date('Y/m/d H:i:s', val($v,'end_time',0) ); ?>'>
					    	<div class="left"><img src="{__STATIC_URL__}/public/yiyuan/images/clock.jpg" height="15"></div>
					    	<div class="right">揭晓倒计时:点击看详情</div>
					</div>
				<?php } else { ?>
					<div class="col4 addBtn">
						<a data-id="<?=$v['id'];?>" class="buyToCart" href="/yiyuan/cart/index/add?goods_id=<?=$v['id'];?>&spec=<?=val($v, 'term_id', 0);?>">
							<!-- <i class="yiyuan-icon">&#xe80a;</i> -->
						</a>
					</div>
					<div class="progressContainer clearfix">
						<div class="progress">
						<?php
							$num = $v['code_num'];
							$proc = $num > 0 ? round(val($v, 'buy_num', 0) / $num * 100) : 0;
						?>
							<div class="progress-bar" data-to="<?= $proc ?>"></div>
						</div>
						 <div class="states clearfix">
						    	<div class="states-left">总需人次： <?php echo val($v, 'code_num', 0);?></div>
						    	<div class="states-right">剩余： <span class="blue"><?php echo val($v,'last_num', 0);?></span></div>
						</div> 
					</div>
				    <?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach;?>
<?php endif;?>
<?php include $this->tpl('yiyuan:public/qrcode.php')  ?>
