<?php
/**
 * Created by PhpStorm.
 * User: lait
 * Date: 2016/4/6
 * Time: 16:07
 */
if(!empty($data)){
    foreach($data as $v){
?>
<div class="items" data-id="<?php echo isset($v['one'])?$v['id']:''?>" data-url="/yiyuan/UserCenter/ShareOrder?id=<?=val($v,'id','');?>">
    <?php if(isset($v['avatar'])&&$v['avatar']!=''){ ?>
        <img alt="Susan't Avatar" src="<?php $defaultAvatar = '{__STATIC_URL__}/public/images/default_user.gif'; echo !empty($v['avatar'])?substr($v['avatar'],0,strlen($v['avatar'])-1).'46':$defaultAvatar;?>" onClick="window.location.href='/yiyuan/ShopGoods/BuyRecord?buyer_id=<?=$v['uid']?>'">
    <?php } ?>
	<div class="left-item">
		<p>
			<span class="name"><?=val($v,'nick','');?></span>
			<span class="num">期数：<?=val($v,'term','');?></span>
			<span class="time"><?php echo val($v,'add_time','')?date('Y-m-d H:i:s',val($v,'add_time','')):'';?></span>
		</p>
		<p style="margin-bottom:8px;"><?=val($v,'content','');?></p>
		<div>
            <?php if(!empty($v['share_img'])){ $shareImg=explode(',', $v['share_img']);  foreach($shareImg as $v){?>
			<img src="<?=$v;?>" style="width:50px;height:50px;margin-right:8px;" alt="">
            <?php }}?>
		</div>
	</div>
</div>
<?php }}else{?>
<!--    没有晒单记录显示的页面-->



<?php } ?>
