<?php if(!empty($data)){?>
<?php foreach ($data as $key=>$v):?>
	<div class="listItem" style="height:130px;">
		<div class="row clearfix itemhead" style="margin:0px;margin-top:8px;width:auto;height:24px;line-height:24px;padding:0 18px;border-bottom:1px solid #eee;">
			<div class="usrName padding-left5" style="float:left">团ID（<?=$v['tid']?>）</div>
			<div class="date" style="float:right">开奖时间：<?=date('Y-m-d H:i:s',$v['hit_time']);?> </div>
		</div>
		<div class="row clearfix" style="width:auto;padding:0 10px;margin-top:0px;">
			<div class="col3 proimg" style="background-image: url(<?=$v['pic_url']?>)">
				<div class="tip">恭喜中奖!</div>
			</div>
			<div class="content padding-left5">
				<div class="title clearfix" style="line-height: normal;height: auto;padding: 0px;overflow: hidden;text-overflow: ellipsis;color: black;"><?=$v['goods_title']?></div>
				<div class="row">
					<div class="left">参团人数：</div><div class="right"><span class="red1"><?=val($v,'player_num',0)?> </span>人次</div>
				</div>
				<div class="row">
					<div class="left">团 &nbsp; 长：</div><div class="right"><?=$v['master_nick']?>（<?=$v['master_id']?>）</div>
				</div>
				<?php if($v['order_status']>=3){ ?>
				<div class="row">
					<?php if(!empty($v['share'])){ ?>
					<a href="/yiyuan/UserCenter/ShareOrder?id=<?=$v['share']?>" class="cus-btn cus-btn-sm cus-btn-red-border">查看晒单</a>
					<?php }else{ ?>
					<a href="/yiyuan/UserCenter/AddShareOrder?term_id=<?=$v['tid']?>&tuan=1" class="cus-btn cus-btn-sm cus-btn-red-border">我要晒单</a>
					<?php }?>
					<a href="/yiyuan/UserCenter/PintuanRecord?act=viewInvoice&invoice=<?=$v['invoice']?>" class="cus-btn cus-btn-sm cus-btn-orange-border" style="margin-left:15px;">查看物流</a>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
<?php endforeach;?>
<?php }else{?>
<div class="cus-empty">
	<div>
		<p>多多参团，幸运之神肯定会降临哒~</p>
		<a href="/yiyuan/pintuan/index" class="cus-btn cus-btn-lg cus-btn-red" style="width:120px;">立即去开团</a>
	</div>
</div>
<?php }?>
