<?php if(!empty($data)){?>
<?php foreach ($data as $key=>$v):?>
	<div class="listItem">
		<div class="row clearfix itemhead">
			<div class="usrName">第<?=$v['term']?>期</div>
			<div class="date">揭晓时间：<?=date('Y-m-d H:i:s',$v['hit_time']);?> </div>
		</div>
		<div class="row clearfix">
			<div class="col3 proimg" style="background-image: url(<?=$v['pic_url']?>)">
				<div class="tip">恭喜中奖!</div>				
			</div>
			<div class="content">
				<div class="title clearfix" style="line-height: normal;height: auto;white-space: nowrap;margin: 12px 0;overflow: hidden;text-overflow: ellipsis;"><?=$v['goods_title']?></div>
				<div class="row">
					<div class="left">购买次数：</div><div class="right"><span class=""><?=val($v,'hit_count',1)?> </span>人次</div>
				</div>
				<div class="row">
					<div class="left">中 奖 码：</div><div class="right"><a style="color:#db3855;"><?=$v['hit_code']?></a></div>
				</div>
				<?php if($v['send']==1){ ?>
				<div class="row">
					<?php if(!empty($v['share'])){ ?>
					<a href="/yiyuan/UserCenter/ShareOrder?id=<?=$v['share']?>" class="cus-btn cus-btn-red-border cus-btn-sm">查看晒单</a>
					<?php }else{ ?>
					<a href="/yiyuan/UserCenter/AddShareOrder?term_id=<?=$v['id']?>" class="cus-btn cus-btn-red-border cus-btn-sm">我要晒单</a>
					<?php }?>
					<a href="/yiyuan/UserCenter/BingoList?act=viewInvoice&invoice=<?=$v['invoice']?>" class="cus-btn cus-btn-orange-border cus-btn-sm" style="margin-left:18px;">查看物流</a>
				</div> 
				<?php }?>
			</div>
		</div>
	</div>
<?php endforeach;?>
<?php }else{?>
<div class="cus-empty">
	<div>
		<p>亲，我猜您一定是在积攒运气开大奖~</p>
		<a href="/yiyuan/index" class="cus-btn cus-btn-lg cus-btn-red" style="width:153px;">立即前往开大奖</a>
	</div>
</div>
<?php }?>
