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
.dz-details{
    display: none ! important;
}
#dropzone {
	margin-top: 10px;
    margin-bottom:5px ! important;
}
.padding-right-0{padding-right:0;}
</style>	
		<link href="{__STATIC_URL__}/public/yiyuan/css/send.css" rel="stylesheet" type="text/css" />
		<script src="{__STATIC_URL__}/public/js/dropzone.js"></script>
		<title>测试</title>
	</head>
	<body class="">
		<div class="wrapper">
			<div style="padding: 10px;">
				<div class="head-code">
					<div class="dingdan"><?= $title;?></div>
					<div style="border-bottom: 1px solid #e8e8e8;text-align:center;">订单编号：<?= $orderSn; ?></div>
				</div>

				<div class="image-list">
					<div id="image-list" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox"></div>
					</div>
				</div>
				<div class="mods"></div>
				<form id="formComment" action="/Shop/ShopGoods/ProductComment" method="post">
				<div class="clearfix"> 
					<div class="form-control font-12" style="margin-bottom: 10px;">
						<div class="col-xs-4 padding-right-0">
							<label>
								<input type="radio" name="evaluate" value="2">
							</label>
							强力推荐
						</div>
						<div class="col-xs-4 padding-right-0">
							<label>
								<input type="radio" name="evaluate" value="1">
							</label>
							值得推荐
						</div>
						<div class="col-xs-4 padding-right-0">
							<label>
								<input type="radio" name="evaluate" value="0">
							</label>
							一般般
						</div>
					</div>
					<div class="from-group">
						<textarea placeholder="请输入您的评论内容(最多可输入150个字)" name="content" class="form-control" style="height: 100px;"></textarea>
					</div>
				</div>
				<input type="hidden" id="imglist" name="imglist" value="">
				<input type="hidden" id="goodsId" name="goodsId" value="<?= $goodsId;?>">
				<input type="hidden" id="goodsId" name="orderSn" value="<?= $orderSn;?>">
				<p class="clearfix">
					<span class="pull-right">
						<label>
							<input type="checkbox" name="anonymity" value="1">
						 </label>
						 匿名评论
					</span> 
				</p>
				</form>
				<section>
				  <div id="dropzone">
				  <form action="/Shop/Order/Comment/upLoadFile" class="dropzone needsclick" id="demo-upload" >
				  <div class="dz-message needsclick">
				  	点击上传图片，至少一张，最多四张。
				  </div>
				  </form>
				</div>
				</section>
				<div style="text-align:center">
					<button id='submitComment' class="button-green button-large">提交评论</button>
					<a class="button-green button-large" href="#">返回</a>
				</div>
				
			</div>
		<?php include($this->tpl('shop/public:footer.php')) ?>
	</body>
<script type="text/javascript">
var $formComment=$('#formComment');
$('#submitComment').click(function(){
	$formComment.submit();
});
var $imglist=$("#imglist");
var dropzone = new Dropzone('#demo-upload', {
    parallelUploads: 2,
    thumbnailHeight: 80,
    thumbnailWidth: 80,
    maxFilesize: 10,
    maxFiles:4,
    filesizeBase: 10000,
    success:function(e){
    	var src=e.xhr.response;
    	var v=$imglist.val();
    	if(v!=''){
    		$imglist.val(v+','+src);
    	}else{
    		$imglist.val(src);
    	}
    },
    error:function(e){
      alert('网络超时');
    }
  });
</script>
</html>