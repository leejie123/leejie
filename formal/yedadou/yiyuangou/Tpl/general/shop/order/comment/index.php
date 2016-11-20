<?php include($this->tpl('shop/public:html_header.php')) ?>
<style type="text/css">

/*右边控件*/
.control-wrapper{
    /*margin-left: 150px;
    margin-right: 12px;
    margin-right: 20px;*/
    width: 100%;
}


.image-list{
    list-style: none;
    padding-top: 10px;
    margin: 0;
}
.image-list li{
    display: inline-block;
    text-align: center;
    margin-right: 10px;
}
.image-list li:last-child{
    margin-right: 0;
}
.image-list li img{
    display: block;
    /*width:100px;*/
    /*height: 100px;*/
    margin-bottom: 10px;
    
    width:80px;
    height: 80px;
}
.preview-image {
  border: 1px solid #eee;
  width: 100px;
  height: 100px;
  padding: 2px;
  border-radius: 3px;
  /*cursor: hand;
  cursor: pointer;*/
  cursor: move;
}
.sortable-ghost {
    opacity: 0.2;
    border: 2px dashed #999;
    overflow: hidden;
}
.mr20{
    margin-right: 20px !important;
}
.time-container{
    padding-top: 20px;
}

.card{
    display: block;
    background-color: #fff;
    padding-bottom: 10px;
    margin-bottom: 10px;
    box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.3);
}

.item {
    padding: 10px;
}

.item-media {
    float: left;
    width: 60px;
    height: 60px;
    background-position: center center;
    background-size: 100%;
    background-repeat: no-repeat;
}

.item-content{
    height: 100px;
    margin-left: 65px;
}

.mg-b-5{
    margin-bottom: 5px;
}

.color-orange {
    color: orange;
}

.style-normal {
    font-style: normal;
}

.font-16 {
    font-size: 16px;
}

.font-14 {
    font-size: 14px;
}

.font-12 {
    font-size: 12px;
}

.head-code {
    width: 100%;
    margin-bottom: 10px;
    text-align:center;
    background-color: #fff;
    padding: 5px 5px;
    box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.3);
}


.dingdan {
    border-radius: 20px;
    background-color: #ddd;
    display:inline-block;
    padding: 5px;
    margin-bottom: 5px;
}
</style>    
        <link rel="stylesheet" href="http://static.yedadou.com/public/front/default/css/index_new.css" />
        <link href="{__STATIC_URL__}/public/yiyuan/css/send.css" rel="stylesheet" type="text/css" />
        <script src="{__STATIC_URL__}/public/js/dropzone.js"></script>
        <title>测试</title>
    </head>
    <body class="">
        <div class="wrapper">
            <header>
                <div class="goback" onclick="history.back(-1);"><i class="fa fa-chevron-left"></i> 返回
                </div>
                <span class="header-title">发表评论</span> 
                <div class="toggle-top-menu" id="toggle-top-menu" mark="top-menu">
                    <i mark="top-menu" class="fa fa-ellipsis-h"></i>
                </div>
                <!--顶部菜单 -->
                <ul class="nav-top-menu none" id="top-menu">
                    <li>
                        <a href="/shop/">
                            <span class="list-title">返回首页</span>
                        </a>
                    </li>
                    <li>
                        <a href="/shop/UserCenter/index">
                            <span class="list-title">会员中心</span>
                        </a>
                    </li>
                    <li>
                        <a href="/shop/UserCenter/MyOrderList">
                            <span class="list-title">我的订单</span>
                        </a>
                    </li>
                    <li>
                        <a href="/shop/cart/">
                            <span class="list-title">购&nbsp;物&nbsp;车</span>
                        </a>
                    </li>
                    <li>
                        <a href="/shop/UserCenter/address">
                            <span class="list-title">收货地址</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="location.reload();">
                            <span class="list-title">刷新页面</span>
                        </a>
                    </li>
                </ul>
            </header>
            <!--公用头部开始12313 -->
            <!-- 滑动图片列表 -->
            <?php if (!empty($order)):; ?>
            <div style="padding: 10px;">
                <div class="head-code">
                    <div class="dingdan">订单编号：<?= $order['order_sn']; ?></div>
                    <div style="border-bottom: 1px solid #e8e8e8;text-align:center;"><?= date('Y-m-d H:i:s', $order['create_time']); ?></div>
                </div>

                <div class="image-list">
                    <div id="image-list" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox"></div>
                    </div>
                </div>
                <div class="mods"></div>
                <?php foreach ($order['items'] as $val):; ?>
                <div class="card">
                    <div class="item">
                        <div class="item-media">
                            <a href="">
                                <div style="background-image: url('http://placehold.it/200x200');width:100%;height:100%;"></div>
                            </a>
                        </div>
                        <div class="item-content">
                            <div  class="mg-b-5">
                                <span style="display:block;margin-bottom: 5px;" class="font-16"><?= $val['title']; ?></span> 
                                <span style="display:block;margin-bottom:10px;" class="font-12">
                                    <em class="color-orange style-normal">数量：<?= $val['quantity']; ?>件</em>
                                </span> 
                                <span class="font-12 color-orange bold">价格：￥<?= $val['price'];?></span>
                            </div>
                        </div>
                        <?php if (!in_array($val['goods_id'], $isComment)):; ?>
                            <a href="/Shop/ShopGoods/ProductComment?orderSn=<?= $order['order_sn']; ?>&goodsId=<?= $val['goods_id']; ?>&title=<?= $val['title']; ?>">去评价</a>
                            <?php else:?>
                            已评价
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
                <div class="head-code">
                    <div class="dingdan">没有该订单</div>
                </div>
            <?php endif; ?>
        <?php include($this->tpl('shop/public:footer.php')) ?>
    </body>

</html>