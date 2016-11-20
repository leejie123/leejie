<?php if(!empty($data)) {?>
	<?php foreach($data as $v):?>
		<?php 
		$id = val($v, 'id', 0);
		$arr = val($term_real, $v['id'], []);
		$isShowTime=isset($v['hit_nick']) && trim($v['hit_nick'])=='';
		?>
	<div class="proItem <?php if($isShowTime) echo 'proItemTime';?>">
		<div class="row clearfix">
			<div id="proimg-<?=$v['id'];?>" onclick="window.location.href='/yiyuan/ShopGoods/ProductDetails?id=<?=$v['id'];?>';" class="col3 proimg"  style="background-image: url(<?php echo val($v,'pic_url', '').'_400x400.jpg';?>)">
			   <?php if($v['goods_code_price']>1&&$v['goods_code_price']<11) {?>
					<div class="tipTag" style="background-image: url({__STATIC_URL__}/public/yiyuan/images/tip<?=floor($v['goods_code_price'])?>.png)"></div>
			   <?php } ?>
			   <div class="tipterm">第（<?=$v['term']?>）期</div>
			</div>
			<div class="proleft">
				<div onclick="window.location.href='/yiyuan/ShopGoods/ProductDetails?id=<?=$v['id'];?>';" class="row title">
				<?php if($isShowTime){ ?>
				<span class="protitle"><?php echo val($v,'goods_title', '');?></span>
				<?php }else{ ?>
				<span class="hituser">中奖者：<?=$v['hit_nick']?></span>
				<?php } ?>
				</div>
				<div class="row title">
					价值：￥<?=$v['goods_price']?>
				</div>
				<?php if(!$isShowTime){ ?>
				<div class="row title">
					揭晓时间：<?=date('Y-m-d H:i:s',$v['hit_time']);?><br>
					购买码：<?=$v['hit_code']?>
				</div>
				<?php } ?>
				<div class="row clearfix">
				<?php if($isShowTime){ ?>
					<div class="clockTip clearfix nowrap" data-id="<?=$v['id'];?>" data-time='<?php echo date('Y/m/d H:i:s', val($v,'end_time',0) ); ?>'>
					    	<div class="left"><img src="http://static.yedadou.com/public/yiyuan/images/clock.jpg" height="15"></div>
					    	<div class="right">揭晓倒计时:点击看详情</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach;?>
<?php }else{?>
<div class="empty">暂无记录</div>
<?php } ?>
