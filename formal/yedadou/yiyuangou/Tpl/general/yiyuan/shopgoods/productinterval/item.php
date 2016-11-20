<?php if(!empty($data)) { ?>
<?php foreach ($data as $key=>$v):?>
	<div class="listItem">
		<div class="row clearfix itemhead">
			<div class="usrName padding-left5">第（<?=$v['term']?>）期</div>
			<div class="date">揭晓时间：<?=date('Y-m-d H:i:s',$v['hit_time']);?> </div>
		</div>
		<div class="row clearfix">
			<div class="col3 proimg" style="background-image: url(<?=$v['pic_url']?>)" onclick='window.location.href="/yiyuan/ShopGoods/ProductDetails?id=<?=$v['goods_id'];?>&term_id=<?=$v['id']?>";'>
				<!-- <div class="tip">恭喜中奖!</div> -->				
			</div>
			<div class="content padding-left5">
				<div class="title clearfix"><?=$v['goods_title']?></div>
				<div class="row">
					<div class="left">中奖者：</div><div class="right"><?=$v['hit_nick']?></div>
				</div>
				<div class="row">
					<div class="left">购买码：</div><div class="right"><?=$v['hit_code']?></div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach;?>
</div>
<?php }else{?>
<div class="empty">暂无记录</div>
<?php } ?>