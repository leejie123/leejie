<?php if(!empty($data)){?>
<?php foreach ($data as $key=>$v):?>
<div class="timeline-item clearfix">
	<div class="user">
		<img alt="Susan't Avatar" src="<?php $defaultAvatar = '{__STATIC_URL__}/public/images/default_user.gif'; echo !empty($v['avatar'])?substr($v['avatar'],0,strlen($v['avatar'])-1).'46':$defaultAvatar;?>">
	</div>
	<div class="info">
		<div class="row"><?php echo val($v,'nick', '');?>   <?php if(!empty($v['province'])){?>（<?php echo val($v,'province', '');?> <?php echo val($v,'city', '');?>）<?php } ?></div>
		<div class="row clearfix"><?php echo date('Y-m-d H:i:s',$v['add_time']);?> </div>
		<div class="row clearfix"><?php echo val($v,'content', '');?></div>
	</div>
</div>
<?php endforeach;?>
<?php }?>