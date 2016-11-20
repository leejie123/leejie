<?php include $this->tpl('yiyuan:pintuan/public/html_header.php') ?>
<title>我的拼团</title>
<link href="{__STATIC_URL__}/public/??css/countdown.css,css/font-awesome.css,front/default/css/detail.css,swipe/css/swiper.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    .winner-tip{
        position: relative;
        width: 40px;
        top: -20px;
        background-color: #f60;
        text-align: center;
        color: #fff;
        border-radius: 5px;
        opacity: 0.9;
        font-size: 10px;
    }
</style>
</head>
<body>
    <?php if (val($detail, 'status', -1) == 1):; ?>
        <!-- <div style="">
            <div id="countDown" class="countDownBox clearfix" style="margin-top:37px;text-align:center;border: 1px solid #f60" data-id="483049" data-endtime="105">
                <div style="background-color:#fff;padding-top:10px;padding-bottom: 10px;border-top: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div class="pCountdown">
                        <div class="g-snav cd-item countdown" data-time="<?php echo val($detail, 'residue_time'); ?>">
                            <div class="g-snav-lst">
                                <b class="hour">00</b><em>时</em>
                            </div>
                            <div class="g-snav-lst"><b class="minute">00</b><em>分</em></div>
                            <div class="g-snav-lst"><b class="second">00</b><em>秒</em></div>
                            <div class="g-snav-lst"><b class="millisecond">00</b><em >毫秒</em></div>
                        </div>
                        <div class="g-snav cd-item">
                            <div class="g-snav-lst">揭晓<br>倒计时
                                <s></s>
                            </div>
                            <div class="g-snav-lst"><b class="hour">玩命加载中。。。</div>
                            <div class="g-snav-lst"><b class="hour">00</b><em>时</em></div>
                            <div class="g-snav-lst"><b class="minute">00</b><em>分</em></div>
                            <div class="g-snav-lst"><b class="second">57</b><em>秒</em></div>
                            <div class="g-snav-lst"><b class="millisecond" id="texting">60</b><em >毫秒</em></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <?php endif; ?>

    <!-- Swiper -->
    <div class="swiper-container" style="z-index:-1000">
        <div class="swiper-wrapper">
            <?php if (!empty($detail['imgs'])):; ?>
            <?php foreach ($detail['imgs'] as $val):; ?>
            <div class="swiper-slide">
                <!-- Required swiper-lazy class and image source specified in data-src attribute -->
                <img data-src="<?php echo $val; ?>"style="height:100%" class="swiper-lazy">
                <!-- Preloader image -->
                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Navigation -->
        <!-- <div class="swiper-button-next swiper-button-white"></div> -->
        <!-- <div class="swiper-button-prev swiper-button-white"></div> -->
    </div>

    <form action="" method="">
        <div class="product_detail">
            <div class="pro_name"><?php echo val($detail, 'goods_title'); ?><br/>
                <span class="sub_title color-grey red1" style="font-size: 14px"><?php echo val($detail, 'goods_sub_title'); ?></span>
            </div>
            <div class="" style="font-size:12px;color: #bbb;margin-top:8px;margin-bottom: 5px;margin-top: 20px;">
                <i class="fa fa-info-circle"></i>
                成功开团并邀请伙伴参与，达到人数即可开奖，随机抽取参团其中一人中奖。人数不足到期自动退款，详见下方玩法介绍
            </div>

            <div class="">
                <?php $status = val($detail, 'status'); ?>
                <div class="g-snav-lst">
                    <?php
                        if ($status == -1) {
                            echo '<div class="pt-btn pt-btn-lg pt-btn-orange text-center" >';
                            echo '<span class="">拼团失败</span>';
                            echo '</div>';
                        } else if ($status == 1) {
                            echo '<div class="pt-btn pt-btn-lg pt-btn-orange text-center" >';
                            echo '<span>剩余时间:</span>';
                            echo '<span id="countdownbtn" data-lefttime="', val($detail, 'residue_time'), '" style="min-width: 80px;"></span>';
                            echo '</div>';
                        } else if ($status > 1) {
                            echo '<div class="pt-btn pt-btn-lg pt-btn-orange text-center" >';
                            echo '拼团成功';
                            echo '</div>';
                        }
                    ?>
                    </div>
                </div>
            </div>

            <div style="margin-top:8px;border-top: 1px solid #ddd;border-bottom: 1px solid #ddd;padding: 5px 15px;color:#777" class="clearfix">
                <?php ?>
                    <p class="detail pull-left" style="width: 30%;text-align:left;">
                        拼团ID<br/>
                        <span style="color:#f60;display:inline-block;width:100%;"><?php echo val($detail, 'id', '--'); ?></span>
                    </p>
                    <p class="detail pull-left" style="width:30%;text-align:center;">
                        参团人数<br/>
                        <span class="grey"><?php echo val($detail, 'join_num', '-'), '/', val($detail, 'player_num', '-'), '人'; ?></span>
                    </p>
                    <p class="detail pull-right" style="margin-bottom: 0px;width: 30%;text-align:right">
                        参团支付<br/>
                        <span class="blue" style="display:inline-block;width:100%;">￥ <?php echo val($detail, 'price', '--'); ?></span>
                    </p>
                <?php ?>
            </div>

            <!-- 中奖名单 -->
            <div class="row-container pt_img clearfix">
                <!-- <div style="float:left;width: 35px;font-size:12px;" id="seemore">查看更多</div> -->
                <div class="users clearfix">
                    <?php if (isset($joins['both'])):; ?>
                        <a class="winner caption"><img src="<?php echo $joins['both']['avatar']; ?>"><div class="winner-tip">中奖</div></a>
                    <?php else: ?>
                        <?php if (isset($joins['master'])):; ?>
                            <?php $temp = val($joins, 'master'); ?>
                            <a class="caption">
                                <?php if (isset($temp['order_status']) && $temp['order_status'] == 1):; ?>
                                    <div class="outWaitPay">支付中</div>
                                <?php endif; ?>
                                <img src="<?php echo isset($temp['avatar']) ? $temp['avatar'] : ''; ?>">
                            </a>
                        <?php endif; ?>
                        <?php if (isset($joins['hit'])):; ?>
                            <a class="winner"><img src="<?php echo $joins['hit']['avatar']; ?>"><div class="winner-tip">中奖</div></a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (!empty($joins['nots'])) foreach ($joins['nots'] as $val):; ?>
                        <a>
                            <?php if ($val['order_status'] == 1):; ?>
                            <div class="outWaitPay">支付中</div>
                            <?php endif; ?>
                            <img src="<?php echo val($val, 'avatar', 'http://placehold.it/200x200'); ?>">
                        </a>
                    <?php endforeach; ?>
                    <a href="/yiyuan/pintuan/show?tid=<?php echo val($detail, 'id'); ?>" class="more1">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>

            <?php $status = val($detail, 'status'); ?>
            <!-- 未开始 -->
            <?php if ($status == 0) { ?>
                <?php if ($self !== false && $self['is_colonel'] == 1):; ?>
                <div class="pd-8">
                    <a style="display:block" class="pt-btn pt-btn-orange pt-btn-lg" href="/yiyuan/pintuan/start/update?tid=<?php echo val($detail, 'id'); ?>">去支付</a>
                </div>
                <?php else: ?>
                <div class="pd-8">
                    <a style="display:block" class="pt-btn pt-btn-orange pt-btn-lg">等待团长开团</a>
                </div>
                <?php endif; ?>
            <!-- 进行中 -->
            <?php  } else if ($status == 1) {?>
                <?php if ($self === false):; ?>
                    <!-- 订单状态 -->
                    <?php if ($detail['player_num'] >= $detail['join_num']):; ?>
                        <div class="pd-8">
                            <a class="pt-btn pt-btn-orange pt-btn-lg" href="/yiyuan/pintuan/join/get?tid=<?php echo val($detail, 'id'); ?>" >加入拼团</a>
                        </div>
                    <?php else: ?>

                        <?php if ($isSoldOut):; ?>
                            <div class="pd-8">
                                <a class="pt-btn pt-btn-orange pt-btn-lg" href="javascript:void(0);" >已售罄</a>
                            </div>
                        <?php else: ?>
                            <div class="pd-8">
                                <a class="pt-btn pt-btn-orange pt-btn-lg" href="/yiyuan/pintuan/start/get?id=<?php echo val($detail, 'pt_goods_id'); ?>" >马上开团</a>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>
                <?php else: ?>
                    <?php if ($self['order_status'] > 1):; ?>
                        <div class="pd-8">
                            <div class="pt-btn pt-btn-orange pt-btn-lg shareBtn">马上邀请小伙伴</div>
                        </div>
                    <?php else: ?>
                        <div class="pd-8">
                            <a style="display:block" class="pt-btn pt-btn-orange pt-btn-lg" href="/yiyuan/pintuan/start/update?tid=<?php echo val($detail, 'id'); ?>">去支付</a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            <!-- 已结束 -->
            <?php } else { ?>

                <?php if ($isSoldOut):; ?>
                    <div class="pd-8">
                        <a class="pt-btn pt-btn-orange pt-btn-lg" href="javascript:void(0);" >已售罄</a>
                    </div>
                <?php else: ?>
                    <div class="pd-8">
                        <a style="display:block"  class="pt-btn pt-btn-orange pt-btn-lg" href="/yiyuan/pintuan/start/get?id=<?php echo val($detail, 'pt_goods_id'); ?>" >马上开团</a>
                    </div>
                <?php endif; ?>

            <?php } ?>

        </div>
    </form>


    <!-- 图文详情&玩法介绍 -->
    <div class="group-block" style="height: 100px;">
        <!--图文详情[START]-->
        <div class="list-container relative">
            <a id="tuwenxiangqing" href="/yiyuan/pintuan/start/get?id=<?php echo val($detail, 'pt_goods_id'); ?>&act=1" data-id="toggle" data-init="0">
                <div class="list-header">
                    <span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/icondetail.png"></span>
                    <span class="list-header-title">图文详情</span>&nbsp;
                    <span class="list-header-icon pull-right "><i class="fa fa-chevron-right color-yellow"></i></span>
                </div>
            </a>
        </div>
        <!--图文详情[END]-->
        <!--玩法介绍[START]-->
        <div class="list-container relative">
            <a href="/yiyuan/pintuan/start?rule=1" id="wanfajieshao" data-id="toggle" data-init="0">
                <div class="list-header">
                    <span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/iconhelp.png"></span>
                    <span class="list-header-title">玩法介绍</span>&nbsp;
                    <span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
                </div>
            </a>
        </div>
        <div id="wanfa-container" style="z-index:10000;position:relative"></div>
        <!--玩法介绍[END]-->
    </div>
    <?php include $this->tpl('yiyuan:pintuan/public/topNavCenter.php') ?>
    <!-- Swiper JS -->
    <script type="text/javascript" src="{__STATIC_URL__}/public/??swipe/js/swiper.min.js,yiyuan/pintuan/Countdown.js,yiyuan/dopage.js"></script>
    <!-- Initialize Swiper -->
    <script>
        $(function(){
            var wfUrl = '/yiyuan/pintuan/start?rule=1';
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 'auto',
                grabCursor: true,
                autoplay: 2500,
                lazyLoading: true,
                autoplay: 2500,
                autoplayDisableOnInteraction: false,
            });
            $window=$(window);
            //设置$body的高度和宽度
            $body=$("body");
            $body.height($window.height());
            var BBL=BOBOLIB_fun().init($,this,$window,$body);
            var app=new MainApp(BBL);
            //弹出分享提示图片
            $('.shareBtn').click(function(){
                var strDiv=$('<div id="shareBtnImg"><img src="{__STATIC_URL__}/public/yiyuan/images/sharetip.png" alt="点击右上角【发送给朋友】或【分享到朋友圈】" width="90%"></div>');
                strDiv.css('text-align','right');
                var bimg=new BBL.BBase(strDiv,{dockType:9,resizeW:.9,resizeH:0.5,offsetX:0,offsetY:0,cssPosition:'fixed'});
                var lockDiv=app.popup(bimg);
                lockDiv=lockDiv.parent().find('#shareBtnImg').prev();
                lockDiv.width(lockDiv.width()+10);
                strDiv.click(function(){
                    app.close();
                });
            });

            /**
             * 剩余时间倒计时正式版
             * 修改方案： 采用构造函数的形式，避免使用setInterval函数，
             *
             */
            var $lefttime=$('#countdownbtn').data('lefttime');
            var second = parseFloat($lefttime);
            if(!isNaN(second)){
                if(second<0) return;
                var $container = $('#countdownbtn');
                var url = $('#countdownbtn');
                var doInterval=function(h,m,s,ms,obj){//回调
                    //console.log(h,m,s,ms);
                    if(isNaN(h)||h<0||m<0||s<0||ms<0){
                        obj.stop();
                        $container.html('00:00:00'); //显示
                        return;
                    }
                    $container.empty();//清空
                    if(h<=9) h='0'+h;
                    if(m<=9) m='0'+m;
                    if(s<=9) s='0'+s;
                    $container.html(h+':'+m+':'+s); //显示
                    if(h==0&&m==0&&s==0) {
                        $container.html('00:00:00'); //显示
                        obj.stop();
                        app.popupWait(1);
                        setTimeout(function() {
                            app.close();
                            //location.reload(true);
                            window.location.href='/yiyuan/pintuan/group?tid=<?php echo val($detail, 'id'); ?>&v=<?=rand()?>';
                            
                        }, 4000);
                        return;
                    }
                }
                var cd=new BCountdown(second,doInterval);
                cd.start();//开始
            }
            /**
             * 计算开团人数以及金额
             */
            var obj = {};
            obj.calculate = function() {
                this.data = {
                    max_quan: null,
                    unit_price:null,
                    product_price: null
                };
                this.init = function ($input) {
                    /**
                     * quan 开团人数
                     * product_price 商品价格
                     * max_quan 最多的人数
                     */
                    var that = this;

                    var max_quan = parseFloat($input.data('max'));
                    var product_price = parseFloat($input.data('price'));
                    this.data.product_price = product_price;
                    this.data.max_quan = max_quan;

                    $input.on('change', function () {
                        var quan = parseFloat($(this).val());

                        if (isNaN(quan) || quan <= 1 || typeof(quan) != 'number') {
                            quan = 2;
                            $(this).val(quan);
                        }

                        if (quan <= that.data.max_quan) {
                            var unit_price = that.data.product_price/quan;
                            unit_price = Math.round(unit_price * 100) / 100;
                            that.data.unit_price = unit_price;

                            $('.unit_price').html(that.data.unit_price);
                        } else {
                                var unit_price = that.data.product_price / quan;
                                unit_price = Math.round(unit_price * 100) / 100;
                                that.data.unit_price = unit_price;

                                $info.find('.quan').val(that.data.max_quan);
                                $('.unit_price').html(that.data.unit_price);
                        }
                     })
                };
            }

            var cal = new obj.calculate();
            cal.init($('.quan'));
            $('#wanfajieshao').on('click', function (e) {
                var $wanfabox = $('#wanfa-container');
                e.preventDefault();
                var that = this;
                if( $(this).hasClass('showdetail')) {
                    $wanfabox.empty();
                    $(that).removeClass('showdetail');
                    $(that).find('.fa-chevron-down').removeClass('fa-chevron-down').addClass('fa-chevron-right');
                } else {
                    var $container = $('#wanfa-container');
                    var loading = app.popupWait(3,2, $container);
                    $wanfabox.load(wfUrl, function (x) {
                        app.close();
                        $(that).addClass('showdetail');
                        $(that).find('.fa-chevron-right').removeClass('fa-chevron-right').addClass('fa-chevron-down');
                    });
                }
            })
        });
    </script>

</body>
</html>