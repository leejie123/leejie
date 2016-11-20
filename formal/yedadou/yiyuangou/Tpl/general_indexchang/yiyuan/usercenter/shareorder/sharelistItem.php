<?php if(!empty($data)){?>
<?php //print_r($data); ?>
<?php foreach ($data as $key=>$v):?>
<div class="listItem">
	<div class="user">
		<?php if(isset($v['avatar'])&&$v['avatar']!=''){ ?>
		<img alt="Susan't Avatar" src="<?php $defaultAvatar = '{__STATIC_URL__}/public/images/default_user.gif'; echo !empty($v['avatar'])?substr($v['avatar'],0,strlen($v['avatar'])-1).'46':$defaultAvatar;?>" onClick="window.location.href='/yiyuan/ShopGoods/BuyRecord?buyer_id=<?=$v['uid']?>'">
		<?php } ?>
	</div>
	<div class="tip"></div>
	<div class="content">
		<div class="header">
			<div class="name"><?=$v['nick']?></div>
			<div class="time"><?=date('Y-m-d H:i:s',$v['add_time'])?></div>
		</div>
	</div>
	<div class="content cloud" onClick="window.location.href='/yiyuan/UserCenter/ShareOrder?id=<?=$v['id']?>'">
		<div class="clearfix title"><?=$v['title']?></div>
		<div class="clearfix"><?=$v['goods_title']?></div>
		<div class="clearfix">期数:<?=$v['term']?></div>
		<div class="clearfix details"><?=$v['content']?>
		<div class="imglist">
		<?php $share_img=$v['share_img'];
			$arrImages=explode(',',$share_img);
			if(!empty($arrImages)){
				foreach ($arrImages as $key1 => $value1) {
					echo '<div class="img"><img  src="'.$value1.'_300x300.jpg"></div> ';
				}
			}
		?>
		</div>
		</div>
	</div>
</div>
<?php endforeach;?>
<?php }?>
