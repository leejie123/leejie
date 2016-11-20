<?php
	  if(!empty($popular)){
	  	$index=0;
	 	foreach($popular as $k=>$v){
	 	$index++;
	 	if($index%2!=0){
	 		if($index!=1) echo '</div>';
	 		echo '<div class="item clearfix">';
	 	}
	?>
		<div>
			<div id="img-<?=$v['id'];?>" class="img" style="background-image: url(<?=$v['pic_url']?>_400x400.jpg)" onclick="window.location.href='/yiyuan/ShopGoods/ProductDetails?id=<?=$v['id'];?>&term_id=<?=$v['term_id'];?> ';">
				<?php if($v['code_price']>1&&$v['code_price']<11) {?>
					<div class="tip" style="background-image: url(http://static.yedadou.com/public/yiyuan/images/tip<?=floor($v['code_price'])?>.png)"></div>
				<?php } ?>
			</div>
			<div class="title"><?=$v['title']?></div>
			<div class="tip">
				<div class="full">
					<div class="tipTitle">价值：￥<?=$v['price']?></div>
					<div class="progress">
					      <div class="progress-bar" data-to="<?=val($v,'per',0);?>" style="width: 0;"></div>
					</div>
					<div class="status">
						<?php $have=$v['total']-$v['buy_num'];
							if($have<0) $have=0;
						?>
						<div><?=$v['buy_num']?><span class="divtip">已买</span></div><div><?=$v['total']?><span class="divtip">总需</span></div><div><?=$have?><span class="divtip">剩余</span></div>
					</div>
				</div>
			</div>
			<?php if($have==0){  //如果买完，这里就不能立即购买了?>
			<div class="tipBtn">
				<div class="addBtn" style="background-color: #999;">
					<a data-id="<?=$v['id'];?>" data-can="0" class="buyToCart" href="#"><i class="yiyuan-icon">&#xe80a;</i></a>
				</div>
				<div class="tipLeft">
					<a href="#" class="goBuy">正在开奖</a>
				</div>
			</div>
			<?php }else{ ?>
			<div class="tipBtn">
				<div class="addBtn">
					<a data-id="<?=$v['id'];?>" data-can="1" class="buyToCart" href="/yiyuan/cart/index/add?goods_id=<?=$v['id'];?>&spec=<?=val($v,'term_id',1);?>"><i class="yiyuan-icon">&#xe80a;</i></a>
				</div>
				<div class="tipLeft">
					<a href="/yiyuan/cart/index/add?goods_id=<?=$v['id'];?>&spec=<?=val($v,'term_id',1);?>" class="goBuy">立即一元抢购</a>
				</div>
			</div>
			<?php } ?>
		</div>
	<?php }
		echo '</div>';
		}
	?>