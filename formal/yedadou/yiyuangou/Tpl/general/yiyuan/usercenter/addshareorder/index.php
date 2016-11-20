<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>晒单</title>
<link href="http://static.yedadou.com/public/yiyuan/css/send.css" rel="stylesheet" type="text/css" />
<script src="http://static.yedadou.com/public/js/dropzone.js"></script>
</head>
<body>
<div class="listItem">
	<div class="row clearfix">
		<div class="usrName padding-left5">第（<?=$data['term'];?>）期</div>
		<div class="date">揭晓时间：<?=date('Y-m-d H:i:s',$data['hit_time']);?> </div>
	</div>
	<div class="row clearfix">
		<div class="col3 proimg" style="background-image: url(http://static.yedadou.com/public/yiyuan/tem/pro.jpg)"></div>
		<div class="content padding-left5">
			<div class="title">中奖商品：<?=$data['goods_title'];?></div>
			<div class="row">
				<div class="left">参与：</div><div class="right"><span class="red1">1 </span>人次</div>
			</div>
		</div>
	</div>
</div>
<div id="editor">
<form action="/yiyuan/UserCenter/AddShareOrder/add" method="post" id="form">
	<div>标题:</div>
	<div><input type="text" id="title" name="title" class="formItem"/></div>
	<div>内容：</div>
	<div><textarea id="content" name="content" class="formItem"></textarea></div>
	<div class="row clearfix"><input type="button" id="btnSubmit" class="pull-right" value="发布" id="btnSubmit" /></div>
	<input type="hidden" id="imglist" name="imglist" value="">
	<input type="hidden" id="order_id" name="order_id" value="<?=$order['id'];?>">
</form>
<section>
  <div id="dropzone">
  <form action="/yiyuan/common/upLoadFile" class="dropzone needsclick" id="demo-upload" >
  <div class="dz-message needsclick">
  	点击上传图片，至少一张，最多四张
  </div>
</form>
</div>
</section>
</div>
<script type="text/javascript">
$body=$("body");
$window=$(window);
$body.height($window.height());
var BBL=BOBOLIB_fun().init($,this,$window,$body);
var app=new MainApp(BBL);
var $btnSubmit=$('#btnSubmit');
var $form=$('#form');
$btnSubmit.click(function(e){
    e.preventDefault();
    app.popupWait();
    setTimeout(function(){
      app.close();
      $form.submit();
    },4000);
});
var $imglist=$("#imglist");
//参看文档
var dropzone = new Dropzone('#demo-upload', {
    parallelUploads: 2,
    thumbnailHeight: 80,
    thumbnailWidth: 80,
    maxFilesize: 1,
    filesizeBase: 1000,
    success:function(e){
    	console.log(e.xhr.response);
    	var src=e.xhr.response;
    	var v=$imglist.val();
    	if(v!=''){
    		$imglist.val(v+','+src);
    	}else{
    		$imglist.val(src);
    	}
    },
    thumbnail: function(file, dataUrl) {
      if (file.previewElement) {
        file.previewElement.classList.remove("dz-file-preview");
        var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
        for (var i = 0; i < images.length; i++) {
          var thumbnailElement = images[i];
          thumbnailElement.alt = file.name;
          thumbnailElement.src = dataUrl;
        }
        setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
      }
    }

  });
</script>
</body>
</html>
