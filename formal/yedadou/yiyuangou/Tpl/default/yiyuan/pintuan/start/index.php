<?php include $this->tpl('yiyuan:pintuan/public/html_header.php') ?>
    <title>商品详情</title>
    <style>
        .notice {
            font-size: 12px;
            margin-top: 20px;
            color:#bbb;
        }

        .detail_info {
            border-top: 1px solid #ddd;
            /*border-bottom: 1px solid #ddd;*/
            margin-top: 10px;
        }
        .color-yellow {
            color: #f60;
        }
        .ball-spin-fade-loader {
            position: relative;
            top: -1px;
            left: 25%;
        } 
    </style> 
</head>
<body>
<link rel="stylesheet" href="{__STATIC_URL__}/public/??css/countdown.css,css/font-awesome.css,front/default/css/detail.css,swipe/css/swiper.min.css">

<!-- Swiper -->
<div class="swiper-container">
    <div class="swiper-wrapper">    
        <?php if($data['img_list']){ foreach($data['img_list'] as $v):?>
        <div class="swiper-slide">
            <!-- Required swiper-lazy class and image source specified in data-src attribute -->
            <img data-src="<?php  echo $v;?>" style="height:100%;background-size: 100%;" class="swiper-lazy">
            <!-- Preloader image -->
            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
        </div>
        <?php endforeach;}?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination swiper-pagination-white"></div>
    <!-- Navigation -->
    <!-- <div class="swiper-button-next swiper-button-white"></div> -->
    <!-- <div class="swiper-button-prev swiper-button-white"></div> -->
</div>

<form action="/yiyuan/pintuan/start/add" method="post" >
    <input type="hidden" name="goods_id" value="<?php echo $data['id']?>">
    <div class="product_detail">
        <div class="pro_name">
            <?php echo $data['title']?><br/>
            <span class="sub_title color-grey red1" style="font-size: 14px"><?php echo $data['sub_title']?></span>
        </div>
        <div style="" class="notice">
            <i class="fa fa-info-circle"></i>
            <span>
            成功开团并邀请伙伴参与，达到人数即可开奖，随机抽取参团其中一人中奖。人数不足到期自动退款，详见下方玩法介绍
            </span>
        </div>

        <div style="" class="detail_info">
             <p class="detail">
                <label for=""><strong style="letter-spacing: 5px;">价 值 </strong>:</label> ¥
                <span class="red1"><?php echo $data['price']?></span>
            </p>
            <div class="detail">
                <label for=""><strong>开团人数 </strong>:</label>
                <div class="ct_input">
                    <!-- <i class="fa fa-user"></i> -->
                    <div>
                        <input type="tel" placeholder="参团人数"  name="num" class="quan" data-max="<?php echo $data['max_turnout']?>" data-min="<?php echo $data['min_turnout']?>" data-price="<?php echo $data['price']?>"><br/>
                    </div>
                    <span>本团最多参与人数 <em class="red1"><?=val($data,'max_turnout')?></em> 人</span>
                </div>
            </div>
            <p class="detail">  
                <label for=""><strong>开团金额</strong> :</label> ¥ <span class="unit_price blue">0</span>
            </p>
        <div>
       
        <input class="pt-btn-lg pt-btn  pt-btn-orange" type="submit" name="act" value="马上开团"/>
        <!-- <div class="pt-btn pt-btn-red pt-btn-lg shareBtn">马上邀请小伙伴</div> -->
    </div>
</form>


<!-- 图文详情&玩法介绍 -->
<div class="group-block">
    <!--图文详情[START]-->
    <div class="list-container relative">
        <a id="tuwenxiangqing" href="get?id=<?php echo $data['id']?>&act=1" data-id="toggle" data-init="0">
            <div class="list-header">
                <span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/icondetail.png"></span>
                <span class="list-header-title">图文详情</span>&nbsp;
                <span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
            </div>
        </a>
    </div>
    <!--图文详情[END]-->
    <!--玩法介绍[START]-->
    <div class="list-container relative">
       <!--  <a href="http://1047.m.yedadou.com/shop/test/index?tplName=mobile_playrule" data-id="toggle" data-init="0"> -->
        <a href="/yiyuan/pintuan/start?rule=1" id="wanfajieshao" data-id="toggle" data-init="0">
            <div class="list-header">
                <span class="list-header-image"><img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/iconhelp.png"></span>
                <span class="list-header-title">玩法介绍</span>&nbsp;
                <span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
            </div>
        </a>
    </div>
    <div id="wanfa-container" style="z-index:10000;position:relative"></div>
    <?php include $this->tpl('yiyuan:pintuan/public/topNavCenter.php') ?>
    <script src="{__STATIC_URL__}/public/??swipe/js/swiper.min.js,yiyuan/dopage.js" type="text/javascript"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            grabCursor: true,
            autoplay: 2500,
            lazyLoading: true,
            autoplay: 2500,
            autoplayDisableOnInteraction: false,
        });

        // 弹出分享提示图片
        var urlPageList='/yiyuan/ShopGoods/ProductBuyer?term_id=6415';
        var $container=$('#timeline-container');
        doPage(urlPageList,$container);
        //
        $window=$(window);
        //设置$body的高度和宽度
        $body=$("body");
        //$body.width($window.width()-10);
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

        var wfUrl = '/yiyuan/pintuan/start?rule=1';
        // 计算每人应付价格
        var obj = {};
        obj.calculate = function() {
            this.data = {
                max_quan: null,
                unit_price:null,
                product_price: null
            };
            this.init = function ($info) {
                /**
                 * quan 开团人数
                 * product_price 商品价格
                 * max_quan 最多的人数
                 */
                var that = this;
                var max_quan = parseFloat($info.find('.quan').data('max'));
                var product_price = parseFloat($info.find('.quan').data('price'));
                this.data.product_price = product_price;
                this.data.max_quan = max_quan;

                $info.find('.quan').on('change', function () {
                    var quan = parseInt($(this).val());
                    if (typeof(quan) == 'number') {
                        if (quan <= 1) {
                            quan = 2;
                            $info.find('.quan').val(quan);
                            var unit_price = that.data.product_price / quan;
                             unit_price = (Math.ceil(unit_price*100))/100
                            that.data.unit_price = unit_price;
                            $('.unit_price').html(that.data.unit_price);
                        } else {
                             if (quan <= that.data.max_quan) {
                                var unit_price = that.data.product_price/quan;
                                 unit_price = (Math.ceil(unit_price*100))/100
                                that.data.unit_price = unit_price;
                                $('.unit_price').html(that.data.unit_price);
                            } else {
                                app.alert('错误','不能超过开团人数',function(){
                                    quan = that.data.max_quan;
                                    var unit_price = that.data.product_price / quan;
                                    unit_price = (Math.ceil(unit_price*100))/100
                                    that.data.unit_price = unit_price;
                                    $info.find('.quan').val(that.data.max_quan);
                                    $('.unit_price').html(that.data.unit_price);
                                });
                                
                            }
                        }
                    } else {
                        app.alert('错误','请输入数字');
                    }
                 })

            };
        }

        var cal = new obj.calculate();
        cal.init( $('.product_detail'));
        $('#wanfajieshao').on('click', function (e) {
            var $wanfabox = $('#wanfa-container');
            e.preventDefault();
            var that = this;
            if( $(this).hasClass('showdetail')) {
                $wanfabox.empty();
                $(that).removeClass('showdetail');
                $(that).find('.fa-chevron-down').removeClass('fa-chevron-down').addClass('fa-chevron-right');
            } else {
                $container = $('#wanfa-container')
                var lading = app.popupWait(3,2, $container);
                $wanfabox.load(wfUrl, function (x) {  
                    app.close()  
                    $(that).addClass('showdetail');
                    $(that).find('.fa-chevron-right').removeClass('fa-chevron-right').addClass('fa-chevron-down');
                });
            }
        })

    </script>

</body>
</html>
