<?php
 $winnerTipTemplate='<div style="
    position: absolute;
    top: 30px;
    left: 2px;
    width: 39px;
    background-color: #f60;
    color: #fff;
    font-size: 10px;
    text-align: center;
    border-radius: 10px;
    opacity: 0.9;
">中奖</div>';
 foreach ($items as $not):; ?>
    <li>
    	<?php if ($not['order_status'] == 1):; ?>
            <div class="waitPay">支付中</div>
        <?php endif; ?>
    	<a class="<?php 
            $winnerTip='';
    		if ($not['is_colonel'] == 1 && $not['hit'] == 1) {
    			echo 'winner caption';
                $winnerTip=$winnerTipTemplate;
    		} else if ($not['is_colonel'] == 1 && $not['hit'] == 0) {
    			echo 'caption';
    		} else if ($not['is_colonel'] == 0 && $not['hit'] == 1) {
    			echo 'winner';
                $winnerTip=$winnerTipTemplate;
    		}

    	?>" href='#'><img src="<?php echo val($not, 'avatar'); ?>"><?=$winnerTip?></a>
    </li>
<?php endforeach; ?>
