
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<?php if(!empty($data)){?>
<?php foreach ($data as $key=>$v):?>
	<div class="listItem">
		<div class="row clearfix itemhead">
			<div class="usrName padding-left5">第（<?=$v['term']?>）期</div>
			<div class="date">揭晓时间：<?=date('Y-m-d H:i:s',$v['hit_time']);?> </div>
		</div>
		<div class="row clearfix">
			<div class="col3 proimg" style="background-image: url(<?=$v['pic_url']?>)">
				<div class="tip">恭喜中奖!</div>
			</div>
			<div class="content padding-left5">
				<div class="title clearfix"><?=$v['goods_title']?></div>
				<div class="row">
					<div class="left">参与：</div><div class="right"><span class="red1"><?=val($v,'hit_count',1)?> </span>人次</div>
				</div>
				<div class="row">
					<div class="left">购买码：</div><div class="right"><?=$v['hit_code']?></div>
				</div>
				<?php if($v['send']==1){ ?>
				<div class="row">
					<?php if(!empty($v['share'])){ ?>
					<a href="/yiyuan/UserCenter/ShareOrder?id=<?=$v['share']?>" class="col3 goShare">查看晒单</a>
					<?php }else{ ?>
					<a href="/yiyuan/UserCenter/AddShareOrder?term_id=<?=$v['id']?>" class="col3 goShare">我要晒单</a>
					<?php }?>
					<a href="/yiyuan/UserCenter/BingoList?act=viewInvoice&invoice=<?=$v['invoice']?>" class="col3 goShare pull-right">查看物流</a>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
<?php endforeach;?>
<?php }else{?>
<div class="empty">暂无记录</div>
<?php }?>
