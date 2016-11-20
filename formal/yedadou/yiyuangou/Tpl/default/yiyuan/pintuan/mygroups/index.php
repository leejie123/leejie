<?php if (!empty($items)):; ?>
    <?php foreach ($items as $val):; ?>
    <div class="item-cate2">
        <div class="title" onclick="window.location.href='/yiyuan/pintuan/group?tid=<?php echo val($val, 'id'); ?>';">
           <div class="left"><a href="#"><img src="<?php echo val($val, 'main'), '_300x300.jpg' ?>"></a></div>
           <div class="right">
                <div>
                    <a href="#">
                        <?php $title = val($val, 'goods_title'); echo mb_strlen($title, 'utf-8') > 20 ? mb_substr($title, 0, 20, 'utf-8') . '...' : $title; ?>
                    </a>
                </div>
                 <div class="">
                    <div class="price">价值：¥<span class="red"><?php echo val($val, 'goods_price'); ?></span></div>
                    <div class="count">已参与：<span class="blue"><?php echo val($val, 'join_num'), '/', val($val, 'player_num'); ?></span></div>
                 </div>
                 <?php
                    switch ($val['status']) {
                        case 0:
                            echo '<a class="clock pt-btn-orange pt-btn-sm pt-btn" href="/yiyuan/pintuan/start/update?tid=', val($val, 'id'), '" data-remainingTime="0">去支付</a>';
                            break;
                        case 1:
                            echo '<a class="clock pt-btn-orange pt-btn-sm pt-btn" href="/yiyuan/pintuan/group?tid=', val($val, 'id'), '" data-remainingTime="', val($val, 'residue_time'), '">计算时间中</a>';
                            break;
                        case 2:
                            echo '<a class="clock pt-btn-orange pt-btn-sm pt-btn" href="/yiyuan/pintuan/group?tid=', val($val, 'id'), '" data-remainingTime="0">拼团成功</a>';
                            break;
                        case -1:
                            echo '<a class="clock pt-btn-sm pt-btn pt-btn-fail" href="/yiyuan/pintuan/group?tid=', val($val, 'id'), '" data-remainingTime="0">拼团失败</a>';
                            break;
                    }
                ?>
           </div>
        </div>
        <div class="users clearfix"> 
            <?php if (isset($val['master']) && isset($val['hit']) && $val['hit'] == $val['master']):; ?>
                <a class="winner caption" ><img src="<?php echo val($val, 'master'); ?>" /><div class="winner-tip">中奖</div></a>
            <?php else: ?>
                <?php if (isset($val['master'])):; ?>
                <a class="caption" ><img src="<?php echo val($val, 'master'); ?>" /></a>
                <?php endif; ?>
                <?php if (isset($val['hit'])):; ?>
                <a class="winner" ><img src="<?php echo val($val, 'hit'); ?>" /><div class="winner-tip">中奖</div></a>
                <?php endif; ?>
            <?php endif; ?>

            <?php foreach (val($val, 'joins', []) as $join):; ?>
            <a href="#"><img src="<?php echo $join; ?>" /></a>
            <?php endforeach; ?>
            <div class="more1">
                <a href="/yiyuan/pintuan/show?tid=<?php echo val($val, 'id'); ?>"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

<?php else: ?>
<div class="empty">空</div
<?php endif; ?>
