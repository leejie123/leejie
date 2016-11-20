<?php if(!empty($data)){?>
	<?php foreach ($data as $key=>$v):?>
	<div class="listItem">
		<div class="row clearfix">
			<div class="title clearfix"><?=$v['goods_title']?></div>
			<div class="col3 proimg"  onclick='window.location.href="/yiyuan/pintuan/group?tid=<?=$v['tid']?>";' style="background-image: url(<?=$v['pic_url']?>_400x400.jpg)"><div class="tip">ID:（<?=$v['tid']?>）</div></div>
			<div class="content padding-left5">
				<div class="row">
					<div class="left">参与：</div><div class="right"><span class="red1"><?=$v['join_num']?> </span>人次</div>
				</div>
				<div class="row">
					<div class="left">参与时间：</div><div class="right"><?=date('Y-m-d H:i:s',$v['join_time'])?></div>
				</div>
				<div class="row">
					<?php if($v['status']==1){ ?>
					<div class="left">状态：</div><div class="right"><span class="red1">进行中...</span></div>
					<?php }elseif($v['status']==0){ ?>
					<div class="left">状态：</div><div class="right"><span class="red1">未开始</span></div>
					<?php }elseif($v['status']==-1){ ?>
					<div class="left">状态：</div><div class="right"><span class="red1">拼团失败</span></div>
					<?php }elseif($v['status']==2){ ?>
					<div class="left">状态：</div><div class="right"><span class="red1">已开奖</span></div>
					<?php } ?>
				</div>
				<?php if($v['status']>=1){?>
				<div class="row">
					<div class="left">中奖者：</div><div class="right"><span class="red"><?=$v['hit_nick']?></span>（<?=$v['hit_uid']?>）</div>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
	<?php endforeach;?>
<?php }else{?>
	<div class="empty">暂无记录</div>
<?php }?>
