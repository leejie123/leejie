<?php if(!empty($data)){?>
	<?php foreach ($data as $key=>$v):?>
	<div class="listItem">
		<div class="row clearfix">
			<div class="title clearfix"><?=$v['title']?></div>
			<div class="col3 proimg"  onclick='window.location.href="/yiyuan/ShopGoods/ProductPastDetails?term_id=<?=$v['term_id']?>";' style="background-image: url(<?=$v['pic_url']?>_400x400.jpg)"><div class="tip">第（<?=$v['term']?>）期</div></div>
			<div class="content padding-left5">
				<div class="row">
					<div class="left">参与：</div><div class="right"><span class="red1"><?=$v['code_count']?> </span>人次</div>
				</div>
				<?php if($v['status']!=1){ ?>
				<div class="row">
					<div class="left">揭晓时间：</div><div class="right"><?=date('Y-m-d H:i:s',$v['hit_time'])?></div>
				</div>
				<?php }else{ ?>
					<div class="row">
					<div class="left">状态：</div><div class="right"><span class="red1">进行中...</span></div>
				</div>
				<?php } ?>
				<div class="row">
					<?php if($v['status']==1){?>
					<div class="left">剩余：</div><div class="right"><span class="red1"><?=$v['code_num']-$v['buy_num']?></span> 人次</div>
					<?php }else{?>
					<div class="left">中奖码：</div><div class="right"><span class="red"><?=$v['hit_code']?></span> <?=$v['hit']>=1?'<span class="red"> 恭喜中奖</span>':' 未中奖';?></div>
					<?php }?>
				</div>
				<div class="row">
					<div class="left">购买码：</div><div class="right code" data-code="<?=$v['code']?>"></div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach;?>
<?php }else{?>
<div class="empty">暂无记录</div>
<?php }?>
