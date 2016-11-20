<?php if(!empty($orders)){?>
<?php foreach ($orders as $k=>$v):?>
<div class="timeline-item clearfix">
	<div class="user">
	<?php
		preg_match('/http\:\/\/ydd.img.yedadou.com/', val($v,'avatar'), $pic);
		$avatar = '{__STATIC_URL__}/public/images/default_user.gif'; 
		if(!empty($v['avatar'])) {
			if(!empty($pic)) {
				$avatar = $v['avatar'];
			}else{
				$avatar = substr($v['avatar'],0,strlen($v['avatar'])-1).'46';
			}
		}
	?>
		<img alt="Susan't Avatar" src="<?php echo $avatar;?>" onclick='window.location.href="/yiyuan/ShopGoods/BuyRecord?buyer_id=<?=$v['buyer_id'];?>";'>
		<!-- <img alt="Susan't Avatar" src="<?php $defaultAvatar = '{__STATIC_URL__}/public/images/default_user.gif'; echo $defaultAvatar;?>" onclick='window.location.href="/yiyuan/ShopGoods/BuyRecord?buyer_id=<?=$v['buyer_id'];?>";'>  -->
	</div>
	<div class="info">
		<div class="row"><?=$v['buyer_nick']?>   <?php if(!empty($v['province'])){?>（<?=val($v,'province','');?> <?=val($v,'city','');?>）<?php } ?></div>
		<div class="row clearfix">参与了 <span class="red1"><?=$v['code_count']?></span> 人次 </div>
		<div class="row clearfix"><?=$v['time_format']?></div>
	</div>
</div>
<?php endforeach;?>
<?php } ?>