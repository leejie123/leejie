<?php if(!empty($data)){?>
<?php //print_r($data); ?>
<?php foreach ($data as $key=>$v):?>
<div class="listItem">
	<div class="user">
		<?php if(isset($v['avatar'])&&$v['avatar']!=''){ ?>
		<img alt="Susan't Avatar" src="<?php $defaultAvatar = '{__STATIC_URL__}/public/images/default_user.gif'; echo !empty($v['avatar'])?substr($v['avatar'],0,strlen($v['avatar'])-1).'46':$defaultAvatar;?>" onClick="window.location.href='/yiyuan/ShopGoods/BuyRecord?buyer_id=<?=$v['uid']?>'">
		<?php } ?>
	</div>
	<div class="content" style="height:38px;margin-bottom:8px;">
		<div class="header">
			<div class="name">
				<span style="float:left;"><?=$v['nick']?></span>
<!--				<div class="time" style="float:right">--><?//=date('Y-m-d H:i:s',$v['add_time'])?><!--</div>-->
			</div>
			<div class="" style="color:#999;line-height: 14px;overflow: hidden;height:14px;text-overflow:ellipsis">获奖商品：第<span><?=val($v,'term',1)?></span>期	<span><?=$v['goods_title']?></span></div>
		</div>
	</div>
	<div class="content cloud clearfix" onClick="window.location.href='/yiyuan/UserCenter/ShareOrder?id=<?=$v['id']?>'">
		<!-- <div class="clearfix title"><?=$v['title']?></div> -->
		<?php if($v['is_pintuan']==1){?>
		<div class="clearfix">团ID:<?=val($v,'term_id',1)?></div>
		<?php }else{?>
		<?php }?>
		<div class="details">
			<div><?=$v['content']?></div>
			<div class="imglist clearfix">
				<div class="img">
				<?php $share_img=$v['share_img'];
					$arrImages=explode(',',$share_img);
					if(!empty($arrImages)){
						foreach ($arrImages as $key1 => $value1) {
							echo '<img src="'.$value1.'_300x300.jpg"> ';
						}
					}
				?>	
				</div>
			</div>
		</div>

	</div>
	<div class="foot-comm clearfix" style="margin-left:50px;">
        <span class="left" style="color: #999;"><?=date('Y-m-d H:i:s',$v['add_time'])?></span>
		<span class="right">
			<a class="<?php
            $niceIds=val($_COOKIE,'is_nice',[]);//是否点赞
            $niceIds && $niceIds=unserialize($niceIds);//有值就反序列划
            if(in_array($v['id'],$niceIds)) {
                echo 'over-red';
            }else{
                echo '';
            }

            ?> zan" data-id="<?=$v['id']?>"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_zan.png');" id="zan"></i><span><?php echo $v['is_nice']?$v['is_nice']:'赞';?></span></a>
			<a href="/yiyuan/UserCenter/ShareOrder?id=<?=$v['id']?>" class="<?php echo $v['comment']?'over-blue':'';?>"><i style="background-image:url('{__STATIC_URL__}/public/yiyuan/new2016/images/btn_comment.png');"></i><span><?php echo $v['comment']?"{$v['comment']}":'评论';?></span></a>
		</span>
    </div>
	<!-- <div class="content comment" id="comment" style="border-left: 2px solid #eee;padding-bottom:10px;">
		<div>
			<img src="http://placehold.it/200x200" style="border-radius:50%;float:left;margin:8px;width:24px;height:24px;" alt="">
			<p style="margin:0px;line-height:38px;height:32px;color:#333;">
				<span>FCC</span>
				<span style="color:#ccc;">回复</span>
				<span>令狐冲</span>
			</p>
		</div>
		<p style="margin:0px;line-height:10px;color:#666;line-height:1.5em;padding-left:10px;">中奖的礼物是：</p>
	</div> -->
	<!-- <div class="tip1 clearfix">
		<div class="time"><?=date('Y-m-d H:i:s',$v['add_time'])?></div>
		<div class="extra">
			<span>
				<i style="background-image:url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_zan.png)"></i>赞
			</span>
			<span>
				<i style="background-image:url({__STATIC_URL__}/public/yiyuan/new2016/images/btn_comment.png)"></i>评论
			</span>
		</div>
	</div> -->
</div>
<?php endforeach;?>
<?php }else{?>
<div class="cus-empty" id="mainContainer_empty">
	<div>
        <p>亲，您还没有晒单记录哦~</p>
        <a href="/yiyuan/index" class="cus-btn cus-btn-lg cus-btn-red" style="width:120px;">立即购买立即晒单</a>
        <!-- <a href="/yiyuan/ShopGoods/ProductCate" class="cus-btn cus-btn-lg cus-btn-red" style="width:120px;">立即购买</a> -->
    </div>
</div>
<?php }?>