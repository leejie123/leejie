<?php
/**
 * Created by PhpStorm.
 * User: lait
 * Date: 2016/1/28
 * Time: 14:40
 */
?>
<?php include $this->tpl('yiyuan/pintuan:public/html_header.php') ?>
<title>图文详情</title>
<link href="{__STATIC_URL__}/public/yiyuan/css/shareDetails.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include $this->tpl('yiyuan:public/subscribe.php') ?>
<div class="listItem">
    <div class="content clearfix">
        <?=htmlspecialchars_decode($data['desc']);?>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $body=$('body');
        $body.height($(window).height());
    });
</script>
</body>
</html>
