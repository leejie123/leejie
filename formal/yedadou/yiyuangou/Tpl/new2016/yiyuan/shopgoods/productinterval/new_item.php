<?php if(!empty($data)) {?>
	<?php foreach($data as $v):?>
		<?php
		$id = val($v, 'id', 0);
		$arr = val($term_real, $v['id'], []);
		$isShowTime=isset($v['hit_nick']) && trim($v['hit_nick'])=='';
		?>
	<div class="proItem <?php if($isShowTime) echo 'proItemTime';?>" onclick="window.location.href='/yiyuan/ShopGoods/ProductPastDetails?term_id=<?=$v['id'];?>';">
		<div class="row clearfix">
			<?php if($v['t_name']=='yiyuan') {?>
			<!-- 一元购 -->
			<div id="proimg-<?=$v['id'];?>" style="margin-bottom:8px;background-image: url(<?php echo val($v,'pic_url', '').'_400x400.jpg';?>)" class="col3 proimg">
			   <?php if($v['goods_code_price']>1&&$v['goods_code_price']<11) {?>
					<div class="tipTag" style="background-image: url({__STATIC_URL__}/public/yiyuan/images/tip<?=floor($v['goods_code_price'])?>.png)"></div>
			   <?php } ?>
			   <div class="tipterm">第（<?=$v['term']?>）期</div>
			</div>
			<?php }else{ ?>
			<!-- 拼团购 -->
                <div id="proimg-<?=$v['id'];?>" onclick="window.location.href='/yiyuan/pintuan/group?tid=<?=$v['id'];?>';" class="col3 proimg"  style="background-image: url(<?php echo val($v,'pic_url', '').'_400x400.jpg';?>)">
                    <div class="tuan-container"><div class="tuan" style="background-image: url({__STATIC_URL__}/public/yiyuan/pintuan/tuantip.png);"></div></div>
                    <div class="tipterm">团ID:<?=$v['id']?></div>
                </div>
            <?php } ?>
			<div class="proleft">
				<div  onclick="window.location.href='/yiyuan/ShopGoods/ProductPastDetails?term_id=<?=$v['id'];?>';" class="row title">
				<?php if($isShowTime){ ?>
				<span class="protitle"><?php echo val($v,'goods_title', '');?></span>
				<?php }else{ ?>
				<span class="hituser">中奖者：<?=$v['hit_nick']?></span>
				<?php } ?>
				<span style="color: #333;line-height:1.4em;font-size:14px;height:2.8em;overflow:hidden;display:inline-block;"><?=val($v,'goods_title','');?></span>
				</div>
				<div class="row title">
					价 &nbsp; 值：￥<?=$v['goods_price']?>
				</div>
				<?php if(!$isShowTime){ ?>
				<div class="row title">
					揭晓时间：<?=date('Y-m-d H:i:s',$v['hit_time']);?><br>
					<?php if($v['t_name']=='yiyuan') {?>
					中 奖 码：<span class="red"><?=$v['hit_code']?></span>
					<?php }else{ ?>
					参与人次：<span class="red"><?=$v['player_num']?></span>
					<?php } ?>
				</div>
				<?php } ?>
				<div class="row clearfix">
				<?php if($isShowTime){ ?>
					<div class="clockTip clearfix nowrap" style="left:0px;top:2px;" data-id="<?=$v['id'];?>" data-time='<?php echo date('Y/m/d H:i:s', val($v,'end_time',0) ); ?>'>
					    	<div class="left"><img src="{__STATIC_URL__}/public/yiyuan/images/clock.jpg" height="15"></div>
					    	<div class="right" onclick="window.location.href='/yiyuan/ShopGoods/ProductPastDetails?term_id=<?=$v['id'];?>';">揭晓倒计时:点击看详情</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach;?>
<?php }else{?>
<div class="empty">暂无记录</div>
<?php } ?>
