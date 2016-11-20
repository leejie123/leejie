<?php foreach($cart_data as $v):?>
<div class="item clearfix" data-goodsid="<?=$v['goods_id'];?>" data-id="<?=$v['id'];?>" data-termid='<?=$v['term_id'];?>' id="cart-<?=$v['id'];?>">
	<div class="checkbox">
  		<input type="checkbox" data-codeprice="<?=$v['goods_code_price'];?>" data-id="<?=$v['id'];?>" value="<?=$v['id'];?>" class="buySelect" <?php if($v['status'] ==1) echo ' checked="checked"';?> name="buy[]" />
	  	<label></label>
  	</div>
	<div class="proImg" data-url="/yiyuan/ShopGoods/ProductDetails?id=<?=$v['goods_id'];?>&term_id=<?=$v['term_id'];?>" style="background-image: url(<?php echo val($v, 'pic_url', '') ? $v['pic_url']: '{__STATIC_URL__}/public/yiyuan/tem/pro.jpg';?>);"></div>
	<div class="info clearfix">
		<a class="title" href="/yiyuan/ShopGoods/ProductDetails?id=<?=$v['goods_id'];?>&term_id=<?=$v['term_id'];?>"><?=$v['title'];?></a>
		<div class="other">
			<div class="right">
				<a href="#" class="a-del" data-id="<?=$v['id'];?>"><i class="yiyuan-icon icon-trash">&#xe804;</i></a>
			</div>
			<div class="left">
				<div class="tip">第（<span class="red1"><?=$v['term'];?></span>）期
				<?php if($v['status'] ==1):?>剩余 <span class="red1" id="surplusNum-<?=$v['id'];?>"><?=$v['code_num'];?></span>人次</div>
				<div class="add"><span>参与人次：</span>
					<!--a data-id="<?=$v['id'];?>" href="#" class="j_minus">-</a-->
					<input type="tel" value="<?php
					 if($v['quantity']==0||$v['quantity']==1){
					 	if($v['code_num']<5){
							echo 1;
					 	}else{
					 		echo 5;
					 	}
					 	
					 }else{
					 	echo $v['quantity'];
					 }
					 ?>" name="count[<?=$v['id'];?>]" data-last="<?=$v['code_num'];?>" id="quantity-<?=$v['id'];?>"/>
					<!--a href="#" data-id="<?=$v['id'];?>" class="j_plus">+</a-->
				</div>
				<?php else:?>
                    <input type="hidden" name="over[]" value="<?=$v['id'];?>">
                    <span class="red1">已结束</span></div>
				<?php endif?>
			</div>
		</div>
	</div>
	
	<?php if($v['status'] ==1):?>
	<div class="info clearfix">
		<div class="toolTip" id="tipJL-<?=$v['id'];?>">
		抽中几率<?php
				 if($v['quantity']==0||$v['quantity']==1){
				 	if($v['code_num']<5){
						echo 1*$v['goods_code_price'];
				 	}else{
				 		echo 5*$v['goods_code_price'];
				 	}
				 	
				 }else{
				 	echo $v['quantity']*$v['goods_code_price'];
				 }
				 ?>/<?=intval($v['goods_price'])?>
		</div>
		<div class="tool clearfix">
			<a class="a-all <?=$v['code_num']<3?'no':''?>" href="#" data-id="<?=$v['id'];?>" data-toalprice="<?=$v['goods_price']?>" data-codeprice="<?=$v['goods_code_price'];?>">3</a>
			<a class="a-all <?=$v['code_num']<5?'no':''?>" href="#" data-id="<?=$v['id'];?>" data-toalprice="<?=$v['goods_price']?>" data-codeprice="<?=$v['goods_code_price'];?>">5</a>
			<a class="a-all <?=$v['code_num']<10?'no':''?>" href="#" data-id="<?=$v['id'];?>" data-toalprice="<?=$v['goods_price']?>" data-codeprice="<?=$v['goods_code_price'];?>">10</a>
			<a class="a-all <?=$v['code_num']<20?'no':''?>" href="#" data-id="<?=$v['id'];?>" data-toalprice="<?=$v['goods_price']?>" data-codeprice="<?=$v['goods_code_price'];?>">20</a>
			<a class="a-all <?=$v['code_num']<50?'no':''?>" href="#" data-id="<?=$v['id'];?>" data-toalprice="<?=$v['goods_price']?>" data-codeprice="<?=$v['goods_code_price'];?>">50</a>
			<a class="a-all" href="#" data-id="<?=$v['id'];?>" data-toalprice="<?=$v['goods_price']?>" data-codeprice="<?=$v['goods_code_price'];?>">包尾</a>
		</div>
	</div>
	<?php endif?>
</div>
				<input type="hidden" name="goodid[<?=$v['id'];?>]" value="<?=$v['goods_id'];?>">
				<input type="hidden" name="termid[<?=$v['id'];?>]" value="<?=$v['term_id'];?>">
				<input type="hidden" name="" value="<?=$v['goods_code_price'];?>">
<?php endforeach;?>
