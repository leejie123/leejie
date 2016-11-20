<?php
/**
 * Created by PhpStorm.
 * User: lait
 * Date: 2016/1/26 0026
 * Time: 10:15
 */
?>

<?php include $this->tpl('yiyuan:pintuan/public/html_header.php') ?>
<link rel="stylesheet" href="{__STATIC_URL__}/public/??front/default/css/order.css,assets/css/font-awesome.css,newtpl/default/cart/confirm.css,newtpl/default/pub.css,newlib/boboweb/ui/theme1.css,css/countdown.css,yiyuan/pintuan/kaituan.css"/>
<title><?php echo isset($tuan['desc']) && $tuan['desc']=="立即参团"?'确认参团':'确认开团'?></title>
</head>
<body class="">
<div class="wrapper">
    <!--公用头部开始 -->
    <!--公用头部开始 -->
    <div class="cart-container" style="margin-top: 0px;">
        <form id='payform'>
            <input type="hidden" name="order_sn" value="<?=$order_sn?>"/>
            <div class="top1">
                <div class="pt-btn pt-btn-orange pt-btn-lg" style="margin: 0px;">
                    剩余支付时间：
                    <span id="time" style="min-width: 80px;display:inline-block" data-lefttime="<?php echo $tuan['end_time']?>" data-url="/yiyuan/pintuan/index">
                    </span>
                </div>
            </div>
            <!-- 详情介绍 -->
            <div class="row-content" style="background-color: #fff; ">
                <div>
                    <div style="padding: 10px 0;height:66px;">
                        <div class="item-media">
                            <a href="">
                                <div style="width: 100%;height:100%;background-repeat:no-repeat;background-size: cover;border: 1px solid #ddd;padding: 2px; background-image:url('<?php echo $tuan['img']?>');" class="bg-format"></div>
                            </a>
                        </div>
                        <div class="item-content1 clearfix " style="line-height: 22px;height: 2.8em;overflow: hidden;">
                            <a href="" class="bold text-break"><?php echo $tuan['title']?></a><br/>
							<span class="red1" style="font-size:12px;color:#bbb;line-height:1;"><?php echo $tuan['sub_title']?></span>
                        </div>
                    </div>
                </div>
                <div style="border-top:1px solid #eee;padding: 3px 0;">
                    <div>
                        <label class="label1" for="" ><strong>拼团ID：</strong></label>
                        <span><?php echo $tuan['id']?></span>
                    </div>
                    <div>
                        <label class="label1" for=""><strong>支付金额：</strong></label>
                        <span class="red1"><em>¥</em> <?php echo $tuan['price']?></span>
                    </div>
                    <div>
                        <label class="label1" for=""><strong>参团人数：</strong></label>
                        <span><em class="red1"><?php echo $tuan['join_num']?></em>/<?php echo $tuan['player_num']?></span>
                    </div>
                </div>
            </div>

            <!-- 选择付款 -->
            <div class="row-content" style="background-color: #fff;margin-top: 10px;padding: 10px;">
                <?php if($is_enable_balance):?>
                <div class="block">
					<span class="pull-left">
						余额支付<em class="red1"> <?php echo $tuan['price']?></em>
						<em class="color-grey">(可用余额：<?= val($balance, 'balance', 0);?>)</em>
					</span>
					<span class="pull-right">
						<input type="radio" name="payment" value="balance" <?= val($balance, 'balance', 0)==0 ? ' disabled' : ''?>>
					</span>
                </div>
                <?php endif ?>

                <?php if(!empty($resultPayType)){
                foreach ($resultPayType as $key1 => $value1) {?>
                <div class="block">
					<span class="pull-left">
						<?=$value1['payment_name']?><em class="red1"> <?php echo $tuan['price']?></em>
					</span>

					<span class="pull-right">
						 <input class="<?=$value1['payment_code']?>" type="radio" name="payment" <?=$key1==0 ? ' checked' : ''?> value="<?=$value1['payment_code']?>"/>
					</span>
                </div>
                <?php }}?>
            </div>
            <div class="row-content">
                
            <a id="btnSubmit" type="submit" class="pt-btn pt-btn-lg pt-btn-orange"><?php echo isset($tuan['desc']) && $tuan['desc']=="立即参团"?'确认参团':'确认开团'?></a>
            </div>
        </form>
    </div>
    <script src="{__STATIC_URL__}/public/yiyuan/pintuan/Countdown.js"></script>
    <script>
        /**
         * 支付倒计时正式版
         * 
         */
        $(function(){
            var $btnSubmit=$('#btnSubmit');
            var $payform=$('#payform');
            var isSubmit=false;
            $btnSubmit.click(function(e){
                e.preventDefault();
                if(isSubmit) return;
                isSubmit=true;
                $btnSubmit.css('background-color','#ccc');
                var arrTem=($payform.serializeArray());
                var order_sn=arrTem[0]['value'];
                var payment=arrTem[1]['value'];
                var url='/yiyuan/pintuan/start/post?order_sn='+order_sn+'&payment='+payment;
                window.location.href=url;
            });
            var $container=$('#time');
            var second=Math.floor(parseFloat($container.data('lefttime')/1000));//剩余秒数
            if(!isNaN(second)){
                if(second<0) return;
                var doInterval=function(h,m,s,ms,obj){//回调
                    $container.empty();//清空
                    if(m<=9) m='0'+m;
                    if(s<=9) s='0'+s;
                    if(h<=9) h='0'+ h;
                    if(ms<=9) ms='0'+ ms;
                    if(ms<=99) ms=ms;
                    if(ms>99){ //三位去中间的
                        ms=ms+'';
                        var arrTem=ms.split('');
                        ms=arrTem[0]+arrTem[2];
                    }
                    $container.html(m+':'+s+':'+ms); //显示
                    if(isNaN(h)||h<0||m<0||s<0||ms<0){
                        $container.html('00:00:00'); //显示
                        obj.stop();
                        return;
                    }
                    if(m==0&&s==0&&h==0){
                        obj.stop();
                        $container.html('00:00:00'); //显示
                        return;
                    }
                }
                var cd=new BCountdown(second,doInterval);
                cd.start();//开始
            }
            });
    </script>
</div>
</body>
</html>
































