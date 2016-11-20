<?php include $this->tpl('shop:public/html_header.php') ?>
<link rel="stylesheet" href="{__STATIC_URL__}/public/front/default/css/detail.css?t=201511201" />
    <title>商品详情</title>
    <style type="text/css">
    body {
        background-color: rgb(242,242,242);
    }
    .bg-white{
        background-color: #fff;
    }
    .reco_img > ul {
        padding: 0px;
        /*overflow-x:scroll;*/
    }

    .reco_img > ul > li {
        width: 17%;
        margin-right: 10px;
    }
    .reco_img > ul > li {
        float: left;
        list-style: none;
    }
    .reco_img > ul > li:last-child{
        margin-right: 0px;
    }
    .reco_img > ul > li > img{
        /*width: 60px;
        height: 60px;*/
        width: 100%;
        height: 60px;
    }
    .comment{
        padding: 0 5px;
    }

    .comment-item{
        background-color: rgba(255, 167, 22, .6);
        color: #000;
        border: 1px solid #ffa716;
            padding: 3px 10px; 
        margin-right: 2px;
        border-radius: 5px;
        /*height: 27px;*/
        display: inline-block;
        margin-bottom: 5px;
        float: left;
        margin-right: 5px;
        font-size: 9px;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 31%;
    }

    .bg-red {
        background-color: #df1314;
    }

    .bg-orange {
        background-color: #ffa716;
    }

    .select_attr {
        padding:0 10px;
        margin:10px 0;
    }

    .select_attr:hover {
        background-color: rgba(255, 167, 22, .6);
    }

    .text-limit {
        white-space: nowrap;
        display: inline-block;
        max-width: 100px;
        text-overflow:ellipsis;
        overflow:hidden;
    }

    .normal {
        font-style: normal;
    }
    </style>

    <style>
    /* SIMPLE DEMO STYLES */
    body {
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
      font-size: 12px;
      line-height: 1.6;
    }
    .container {
      margin: 50px;
      max-width: 700px;
    }
    .container img {
      width: 100%;
    }
    .container .pull-left {
      width: 55%;
      float: left;
      margin: 20px 20px 20px -80px;
    }
    @media (min-width: 750px) {
      body {
        font-size: 16px;
        line-height: 1.6;
      }
      .container {
        margin: 100px auto;
      }
    }
    </style>
</head>
    <div class="wrapper">
        <!--公用头部开始 -->
        <?php include $this->tpl('shop:public/header.php') ?>

        <!-- 滑动图片列表 -->
        <div class="image-list">
            <div id="image-list" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#image-list" data-slide-to="" class="active"></li>
                    <li data-target="#image-list" data-slide-to=""></li>
                    <li data-target="#image-list" data-slide-to=""></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <a href="#">
                            <img src="http://wx.qlogo.cn/mmopen/TUTkVStdiaGDXnRmdgmtT9TiaHfwXgw8Q3siaF5NuMKqOWQwuDriayJXPLfaMicOGD4esO7g09HicDFRRicyjPsKJIB0HxbE2Tv285d/46" alt="" class="img-responsive">
                            <div class="carousel-caption"></div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="http://wx.qlogo.cn/mmopen/TUTkVStdiaGDibXJcEMPD8kFtXoMgqzfzd26DYbibyaltACUdHH1icxaqVKnPAT8TnSR11IymdiaS38MyDVbFqqOiaMLlkOLSYlibgV/46" alt="" class="img-responsive">
                            <div class="carousel-caption"></div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="http://wx.qlogo.cn/mmopen/ibzbm1FfBENgqh18AFXYu54svL63peBd1RsF6VudmN9eEZKv3tB4BXL6LTCBuCPMicfQ8zK8D0iaQqEViaEgkSRLh3ckPhAoMjfo/46" alt="" class="img-responsive">
                            <div class="carousel-caption"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--商品信息-->
        <div class="product-info">
            <!--商品ID-->
            <input type="hidden" name="productId" id="productId" value="<?= $details['id']; ?>"  />
            <div class="product-title bold">
                <?= $details['title']; ?> <a href="/Shop/Comment/CommentList?orderSn=2016011267570605668">去评论</a>
            </div>
            <div class="sub-title-container">
                <span title="切换收藏状态" class="favorite pull-right" data-auto="ajax" data-href="/shop/UserCenter/favorites/add?id=<?= $details['id']; ?>" data-tip="操作进行中" data-show-tip="false" data-submit-id="" data-success-function="toggleFavorit" data-show-response="false">
                    <?php if ($details['is_collection'] > 0):; ?>
                        <i class="fa fa-star"></i><span>已收藏</span>
                    <?php else: ?>
                        <i class="fa fa-star-o"></i><span>收藏</span>
                    <?php endif; ?>
                </span>
                <span class="sub-title red1">
                    <?= $details['sub_title']; ?>
                </span>
            </div>
            <div class="row-container"><span class="row-label bold">原价</span><span class="row-content original-price">¥<span id="originalPrice"><?= $details['market_price']; ?></span></span></div>
            <div class="row-container"><span class="row-label bold">商城价</span><span class="row-content red1 bold">¥<span id="price"><?= $details['wx_price']; ?></span></span></div>
            <div class="row-container"><span class="row-label bold">库存</span><span class="row-content"><span id="stock" class="red1 bold"><?= $details['total']; ?></span> 件</span></div>

            <?php if ($isEmptyparam === 1):; ?>
            <!-- 如没有属性，就在页面上显示数量和总价   start -->
            <div class="row-container num-container">
                <span class="row-label bold">数量</span>
                <span class="row-content">
                    <div class="" style="display: inline-block; ">
                        <div class="input-group num-input">
                            <span class="input-group-btn">
                                <button id="minus" class="btn btn-default" type="button"><i class="fa fa-minus"></i></button>
                            </span>
                            <input id="count" name="count" type="text" class="form-control text-center" placeholder="" value="1" max="<?php $_shop_goods = val($productConfig,'ShopGoods');echo val($_shop_goods,'limit_num',0)?>"/>
                            <span class="input-group-btn">
                                <button id="plus" class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                            </span>
                        </div>
                    </div>
                </span>
            </div>
            <div class="row-container mt10">
                <span class="row-label bold red1">总价</span>
                <span class="row-content bold red1">¥<span id="totalMoney"><?= $details['wx_price']; ?></span></span>
            </div>
            <!-- 如没有属性，就在页面上显示数量和总价   end -->
            <?php endif;?>
        
            <?php if ($isEmptyparam === 0):; ?>
            <!-- 弹出sku   start -->
            <div class="modal" id="windowSku" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document" style="position: absolute;bottom: 0px;width: 100%;margin: 0;">
                <div class="modal-content">
                  <div class="modal-header"style="background-color: #f0ad4e;border-color: #eea236;width: 80%;height: 40px;color: #fff;margin: 0 auto;position: absolute;top: -40px;left: 10%;border-radius: 15px 15px 0 0;">
                    <h5 class="modal-title" style="text-align:center;" id="myModalLabel">请选择商品属性</h5>
                  </div>
                  
                  <div class="modal-body">
                    <!--没有多属性时不生成sku这个div  start-->
                    <div id="sku" class="sku">  
                        <input type="hidden" name="skuData" id="skuData" value='<?= $details['data']; ?>'/>
                        <?php foreach ($details['param'] as $name => $skus): ?>
                        <div class="row-container clearfix">
                            <span class="row-label bold" style="float: left;"><?= $name; ?>：</span>
                            <span class="row-content" style="float: left;">
                                <?php foreach ($skus as $sku):; ?>
                                <a href="#" class="property" data-value=""><?= $sku; ?></a>
                                <?php endforeach; ?>
                            </span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!--没有多属性时不生成sku这个div  end-->

                    <div class="row-container num-container">
                        <span class="row-label bold">数量</span>
                        <span class="row-content">
                            <div class="" style="display: inline-block; ">
                                <div class="input-group num-input">
                                    <span class="input-group-btn">
                                        <button id="minus" class="btn btn-default" type="button"><i class="fa fa-minus"></i></button>
                                    </span>
                                    <input id="count" name="count" type="text" class="form-control text-center" placeholder="" value="1" max="<?= $details['limit_num']; ?>"/>
                                    <span class="input-group-btn">
                                        <button id="plus" class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                                    </span>

                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="row-container mt10">
                        <span class="row-label bold red1">总价</span>
                        <span class="row-content bold red1">¥<span id="totalMoney"><?= $details['wx_price']; ?></span></span>
                    </div>
                  </div>
                  

                  <div class="modal-footer" style="padding: 0">
                    <button type="button" id="windowSkuBtnOk" class="btn btn-warning btn-block btn-lg" style="background-color: #EC1F1F;border-color: #CC1127;">确定</button>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <!-- 弹出sku   end -->
            <a href="#" class="button-share" data-auto-target="#shareTip">立即分享 &nbsp;<i class="fa fa-share"></i></a>
        </div>

        <?php if ($isEmptyparam === 0):; ?>
        <div class="product-selecttype" id="btnPopSku">
            选择尺寸颜色分类
            <span class="list-header-icon pull-right"><i class="fa fa-chevron-right color-yellow"></i></span>
        </div>
        <?php endif; ?>

    

        <!-- 评论 start -->
        <div class="comment bg-white" style="padding:10px 10px;">
            <div style="margin-bottom:10px;">朋友圈好友评价（<?php echo val($commentCount, 'total'); ?>）</div>
            <div class="clearfix">
                <span class="comment-item">强烈推荐<em class="badge bg-orange pull-right normal"><?php echo val($commentCount, 'i'); ?></em> </span>
                <span class="comment-item">值得推荐<em class="badge bg-orange pull-right normal"><?php echo val($commentCount, 'd'); ?></em></span>
                <span class="comment-item">一般般 <em class="badge bg-orange pull-right normal"><?php echo val($commentCount, 'g'); ?></em></span>
            </div>

            <?php if (!empty($newestIntense)): ?>
            <div class="comment_container">
                <div>
                    <div class="clearfix" style="margin:5px 0;">
                        <a href="">
                            <img src="<?php echo val($newestIntense, 'user_img'); ?>" style="width:60px;height:60px;float:left;margin-right:10px;">
                        </a>
                        <span style="font-weight:bold;line-height: 40px;" class="text-limit"><?php echo val($newestIntense, 'user_name'); ?></span>
                        <span style="color:red;float:right;line-height:40px;">
                        <?php
                            switch (val($newestIntense, 'evaluate')) {
                                case '0':
                                    echo '一般般';
                                    break;
                                case '1':
                                    echo '值得推荐';
                                    break;
                                case '2':
                                    echo '强烈推荐';
                                    break;
                                default:
                                    echo '--';
                                    break;
                            }
                        ?>
                        </span>
                    </div>
                    <p><?php echo val($newestIntense, 'content'); ?></p>
                    <div class="reco_img clearfix">
                        <ul>
                            <?php 
                                $imgList = val($newestIntense, 'img_list');
                                if (!empty($imgList)):
                                    foreach (explode(',', $imgList) as $val):; 
                            ?>
                                <li><img src="<?php echo $val; ?>"></li>
                            <?php 
                                    endforeach;
                                endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <div style="display:block;margin-top:10px;" class="text-center">
                <button class="btn btn-info" id="see_more" data-url="/shop/comment/more">查看更多评价</button>
            </div>
        </div>
        <!-- 评价 end -->


        <!--分享提示框-->
        <div id="shareTip" class="mask-bg hide" data-auto-hide>
            <div class="middle-outer">
                <div class="middle-inner text-center" id="shareimg">
                    <div id="shareimg">
                        <div><img src="{__STATIC_URL__}/public/front/default/images/sharebak.png" class="bak"></div>
                        <div><img src="<?= $url; ?>" class="qcode" alt="<?= $url; ?>"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--分期付款-->
        <!--
        <div class="period-container single">
            <span class="tags"><i class="fa fa-tags"></i> </span>
            <span class="period-title">分期付款</span>
            <span class="period-content">分期好享受，时尚轻松购！</span>
            <a href="#">
                <span class="period-apply pull-right">点击申请
                    <span class="">
                     <img src="{__STATIC_URL__}/public/front/default/images/demo/icon/circle-right.png" alt="" />
                    </span>
                </span>
            </a>
        </div>
        -->

        <!--图文详情和产品参数-->
        <div class="tabs-container">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active ml10"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">图文详情</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">产品参数</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active text-center" id="home" style="padding-top: 8px;">
                    <?php // echo $productConfig['goodsConfig'] ? html_entity_decode($productConfig['goodsConfig']['desc']) :''?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile"><?php // echo $productConfig['goodsConfig'] ? html_entity_decode($productConfig['goodsConfig']['property']) :''?></div>
            </div>
        </div>

        <!--公用底部开始-->
        <footer class="footer-menu clearfix" id="footer">
            <div class="footer-logo pull-left">
                <div class="middle-outer">
                    <div class="middle-inner text-center">
                        <a href="/shop/"><img src="<?= $storeLogo; ?>" alt=""  height="23"/></a>
                    </div>
                </div>
            </div>
            <div class="footer-container">
                <div class="footer-item add-to-card">
                    <!--href是#不变,data-href是点击时添加到购物车的地址-->
                    <a href="#" data-href="/shop/cart/index/add" id="addProductToCart" data-isEmptyparam="<?=$isEmptyparam?>">
                        <div class="middle-outer">
                            <div class="middle-inner text-center white">
                                加入购物车
                            </div>
                        </div>
                    </a>
                </div>
                <div class="footer-item buy">
                    <!--href是#不变,data-href是点击时的购买地址-->
                    <a href="#" data-href="/shop/cart/index/add" id="buy" data-isEmptyparam="<?=$isEmptyparam?>">
                        <div class="middle-outer">
                            <div class="middle-inner text-center white">
                                立即购买
                            </div>
                        </div>
                    </a>
                </div>
                <div class="footer-item">
                    <a href="/shop/cart/">
                        <div class="middle-outer">
                            <div class="middle-inner text-center" id="movieBuyEnd">
                                <img class="" src="{__STATIC_URL__}/public/front/default/images/demo/icon/cart.png" height="15">
                                <div class="footer-text">
                                    购物车
                                </div>
                                <span id="cartProductCount" class="label label-danger cart-product-count"><?=$shop_cart_num?></span>
                                <span id="cartAnimationCount" class="cart-add-count">+<span>1</span></span>
                            </div>
                        </div>
                    </a>
                </div>      
            </div>
        </footer>
        <?php include $this->tpl('shop:public/footer_share.php') ?>
        </div>
    </body>
    <script src="{__STATIC_URL__}/public/js/jquery.fly.min.js"></script>
    <script src="{__STATIC_URL__}/public/front/default/js/detail_new.js?v=20151115"></script>
    <script src="{__STATIC_URL__}/public/front/default/js/detail_addAttr.js"></script>
</html>