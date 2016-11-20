<?php if (!empty($items)):; ?>
    <?php foreach ($items as $val):; ?>
    <div class="item-cate1">
        <div class="title">
            <div class="left"><a href="/yiyuan/pintuan/start/get?id=<?php echo val($val, 'id'); ?>"><img src="<?php echo val($val, 'pic_url'), '_300x300.jpg'; ?>" /></a></div>
            <div class="right">
            <div>
                <a href="/yiyuan/pintuan/start/get?id=<?php echo val($val, 'id'); ?>"><?php echo val($val, 'title'); ?></a></div>
                 <div class="clearfix">
                    <div class="price">价值：¥<span class="red1"><?php echo val($val, 'price'); ?></span></div>
                    <div class="count">剩余：<span style="color:#22AAff"><?php echo val($val, 'stock'); ?></span></div>
                 </div>
                 <div class="clearfix">
                     <?php if (val($val, 'stock', 0) > 0):; ?>
                    <a href="/yiyuan/pintuan/start/get?id=<?php echo val($val, 'id'); ?>" class="btn orange" style="width:50%;float:right">我要开团</a>
                    <?php else: ?>
                    <a href="javascript:void(0);" class="btn closed" style="width:50%;float:right">已抢光</a>
                    <?php endif; ?>
                 </div>
           </div>
        </div>
    </div>
    <?php endforeach; ?>

<?php else: ?>
<div class="empty">空</div>
<?php endif; ?>
