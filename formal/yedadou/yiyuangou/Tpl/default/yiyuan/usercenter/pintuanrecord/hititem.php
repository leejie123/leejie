<?php if(!empty($data)){?>
<?php foreach ($data as $key=>$v):?>
	<div class="listItem">
		<div class="row clearfix itemhead">
			<div class="usrName padding-left5">团ID（<?=$v['tid']?>）</div>
			<div class="date">开奖时间：<?=date('Y-m-d H:i:s',$v['hit_time']);?> </div>
		</div>
		<div class="row clearfix">
			<div class="col3 proimg" style="background-image: url(<?=$v['pic_url']?>)">
				<div class="tip">恭喜中奖!</div>
			</div>
			<div class="content padding-left5">
				<div class="title clearfix"><?=$v['goods_title']?></div>
				<div class="row">
					<div class="left">参与：</div><div class="right"><span class="red1"><?=val($v,'player_num',0)?> </span>人次</div>
				</div>
				<div class="row">
					<div class="left">团长：</div><div class="right"><?=$v['master_nick']?>（<?=$v['master_id']?>）</div>
				</div>
				<?php if($v['order_status']>=3){ ?>
				<div class="row">
					<?php if(!empty($v['share'])){ ?>
					<a href="/yiyuan/UserCenter/ShareOrder?id=<?=$v['share']?>" class="col3 goShare">查看晒单</a>
					<?php }else{ ?>
					<a href="/yiyuan/UserCenter/AddShareOrder?term_id=<?=$v['tid']?>&tuan=1" class="col3 goShare">我要晒单</a>
					<?php }?>
					<a href="/yiyuan/UserCenter/PintuanRecord?act=viewInvoice&invoice=<?=$v['invoice']?>" class="col3 goShare pull-right">查看物流</a>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
<?php endforeach;?>
<?php }else{?>
<div class="empty">暂无记录</div>
<?php }?>
