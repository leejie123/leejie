<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>往期揭晓</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/result.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<?php if(!empty($data)){?>
<?php foreach ($data as $key=>$v):?>
<div class="item">
    <div class="row clearfix title">
        <div class="col4 padding2">第（<?=$v['term'];?>）期</div>
        <div class="col70 padding2 text-right">揭晓时间：<?=date('Y-m-d H:i:s',$v['hit_time']);?></div>
    </div>
    <div class="timeline-item clearfix">
    <?php
        preg_match('/http\:\/\/avatar.www.qzone.cc/', val($v,'avatar',''), $pic);
        $avatar = '{__STATIC_URL__}/public/images/default_user.gif'; 
        if(!empty($v['avatar'])) {
            if(!empty($pic)) {
                $avatar = $v['avatar'];
            }else{
                $avatar = substr($v['avatar'],0,strlen($v['avatar'])-1).'46';
            }
        }
    ?>
        <div class="user"  onclick="window.location.href='/yiyuan/ShopGoods/ProductDetails?id=<?=$v['goods_id']?>&term_id=<?=$v['id']?>'">
         <img alt="Susan't Avatar" src="<?php echo $avatar;?>">
        </div>
        <div class="info">
            <div class="row">获奖者：<?=$v['hit_nick'];?></div>
            <?php if(!empty($v['province'])){?>
            <div class="row clearfix">（<?=val($v,'province','');?>  <?=val($v,'city','');?>） </div>
            <?php } ?>
            <div class="row clearfix">幸运号码：<span class="red1"><?=val($v,'hit_code','');?></span></div>
            <div class="row clearfix">本期参与：<span class="red1"><?=val($v,'hit_count','0');?></span>人次</div>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php }?>

<?php include $this->tpl('yiyuan:public/footer.php') ?>
<script type="text/javascript">
    $(function(){
        $body=$('body');
        $body.height($(window).height());
    });
</script>
</body>
</html>
