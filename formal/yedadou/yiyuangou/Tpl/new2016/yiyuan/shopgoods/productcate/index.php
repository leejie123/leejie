<?php include $this->tpl('yiyuan:public/html_header.php') ?>
	<link href="{__STATIC_URL__}/public/newcss/css/??pure-min.css,public.css" rel="stylesheet" type="text/css" />
	<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/??productcate.css" rel="stylesheet" type="text/css" />
	<title>分类浏览</title>
</head>
<body>
<div class="pure-g cate-list">
	<div class="<?=$classStr?>" onclick="location.href='/yiyuan/ShopGoods/ProductList?sort=new'">
	    <a><img src="{__STATIC_URL__}/public/newcss/img/ico-list.jpg"><span>全部商品</span></a>
	</div>
	<?php 
if(!empty($data)){
	$cateCount=8;
	$forClassIndex=2;
	$i=1;
	foreach ($data as $key => $value) {
		$name=$value['name'];
		$img=$value['pic_url'];
		if($img=='') $img='{__STATIC_URL__}/public/newcss/img/cus-icon-other.png';
		$url='/yiyuan/ShopGoods/ProductList?cid='.$value['id'];
		$classStr='pure-u-1-3 brd0';
		if($i==1||$forClassIndex==4){
			$forClassIndex=1;
			$classStr.=' bl0';
		}
		if($i%3==0) $classStr.=' rowend';
		$forClassIndex++;
		$i++;
		if($i==$cateCount-1||$i==$cateCount-2||$i==$cateCount) $classStr.=' bd1';
	?>
	    <div class="<?=$classStr?>" onclick="location.href='<?=$url?>'">
	    	<a><img src="<?=$img?>"><span><?=$name?></span></a>
	    </div>
	<?php }
} ?>
	</div>
<?php include $this->tpl('yiyuan:public/footerNav.php') ?>
</body>
</html>
