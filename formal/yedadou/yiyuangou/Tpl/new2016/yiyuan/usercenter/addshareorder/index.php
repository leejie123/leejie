<?php include $this->tpl('yiyuan:public/html_header.php') ?>
<title>晒单</title>
<link href="{__STATIC_URL__}/public/css/pure-min.css" rel="stylesheet" type="text/css" />
<link href="{__STATIC_URL__}/public/yiyuan/new2016/css/??public1.css,send1.css" rel="stylesheet" type="text/css" />
<style>
  label {
    display: inline-block; 
     max-width: 100%; 
     margin-bottom: 5px; 
    font-weight: 700;
  }
</style>

</head>
<body>
<?php if(empty($tuan)){?>
<div class="listItem">
	<div class="row clearfix">
		<div class="usrName padding-left5" style="height:37px;line-height:37px;margin-left:18px;">第（<?=$data['term'];?>）期</div>
		<div class="date"> </div>
	</div>

  <div class="cus-list-input1">
    <div>
      <label>
        揭晓时间
      </label>
      <div class="item-text">
        <?=date('Y-m-d H:i:s',$data['hit_time']);?>
      </div>
    </div>
  </div>

  <div class="cus-list-input1">
    <div>
      <label>
        中奖商品
      </label>
      <div class="item-text" style="text-align:right;text-overflow:ellipsis;overflow:hidden;white-space:no-wrap">
        <?=$data['goods_title'];?>
      </div>
    </div>
  </div>

  <div class="cus-list-input1">
    <div style="border-bottom:0px;">
      <label>
        购买次数
      </label>
      <div class="item-text">
        <span class="red1"><?=$data['count'];?> </span>人次
      </div>
    </div>
  </div>

</div>
<?php }else{?>
<div class="listItem">
  <div class="row clearfix">
    <div class="col3 proimg" style="background-image: url({__STATIC_URL__}/public/yiyuan/tem/pro.jpg)"></div>
  </div>
  <div class="cus-list-input1">
    <div>
      <label>
        团ID
      </label>
      <div class="item-text">
        <?=$data['id'];?>
      </div>
    </div>
  </div>
  <div class="cus-list-input1">
    <div>
      <label>
        开奖时间
      </label>
      <div class="item-text">
        <?=date('Y-m-d H:i:s',$data['hit_time']);?> 
      </div>
    </div>
  </div>
  <div class="cus-list-input1">
    <div>
      <label>
        中奖商品
      </label>
      <div class="item-text" style="text-align:right;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
        <?=$data['goods_title'];?>
      </div>
    </div>
  </div>
  <div class="cus-list-input1">
    <div>
      <label>
        参与
      </label>
      <div class="item-text">
        <span class="red1"><?=$data['player_num'];?> </span>人次
      </div>
    </div>
  </div>
</div>
<?php }?>
<div id="editor">
<form action="" method="post" id="form">
  <div class="cus-list-textarea" style="background:#fff;">
    <div class="">
      <label>
        评论
      </label>
      <div class="item-input">
        <textarea id="content" name="content" style="width:95%;background-color:#f7f7f7"></textarea>
      </div>
    </div>
  </div>
  <input type="hidden" id="tuan" name="tuan" value="<?=$tuan;?>">
	<input type="hidden" id="imglist" name="imglist" value="">
  <input type="hidden" id="order_id" name="order_id" value="<?=val($order,'id','');?>">
  <input type="hidden" id="term_id" name="term_id" value="<?=$data['id'];?>">
  <input type="hidden" id="goods_id" name="goods_id" value="<?=$data['goods_id'];?>">
</form>
<section>
  <div id="dropzone">
  <form action="/yiyuan/common/upLoadFile" class="dropzone" id="demo-upload" >
    <div class="dz-message">
    	点击上传图片，至少一张，最多四张。
    </div>
  </form>
  <div class="row clearfix" style="margin-top:12px;text-align:center;">
    <input type="button" id="btnSubmit" class="cus-btn cus-btn-lg cus-btn-red" value="保存" style="width:90%;margin-bottom: 15px;" />
  </div>
</div>
</section>
</div>
<script src="{__STATIC_URL__}/public/js/dropzone.js"></script>
<script src="{__STATIC_URL__}/public/yiyuan/new2016/js/shortAlert.js"></script>
<script type="text/javascript">
    $body=$("body");
    $window=$(window);
    $body.height($window.height());
    var sAlert=new shortAlert($body);
    var BBL=BOBOLIB_fun().init($,this,$window,$body);
    var app=new MainApp(BBL);
    var $btnSubmit=$('#btnSubmit');
    var $form=$('#form');
    var once = false;
    $btnSubmit.on('click', function(e) {
      e.preventDefault();
      var strContent=$('#content').val();
      strContent=strContent.split(' ').join('');
      if(strContent==''){
        sAlert.show('评论不为空');
        return;
      }
      var imglist=$('#imglist').val();
      var arrC=imglist.split(',');
      if(arrC.length>4){
        sAlert.show('上传图片错误:最多只能上传4张,请重试。',4000);
        dropzone.removeAllFiles();
        return;
      }
      $.ajax({
        url: '/yiyuan/UserCenter/AddShareOrder/post',
        type: 'post',
        data:$form.serialize(),//form序列化
        success:function(data) {
          try {
            var data1 = $.parseJSON(data);
          } catch(e) {

          }
          if (data1.error) {
            sAlert.show(data1.msg);
            return;
          }
          if (data1.success) {
            sAlert.show(data1.msg);
            setTimeout(function() {
              window.location.href = data1.url;
            }, 2000);
          }
        },
        error: function() {
          sAlert.show('网络问题，请稍后重试..')
          return;
        }

      })
    })
    
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
      app.close();
    },
    sending:function(){
       app.popupWait();
    },
    error:function(e){
      sAlert.show('上传图片错误:最多只能上传4张，大小不能超过10M，请重试。',4000);
       app.close();
    },
    maxfilesexceeded:function(file){
      setTimeout(function(){
        dropzone.removeAllFiles();
      },2000);
    },
    init: function() {
      this.on("addedfile", function(file) {
        var removeButton = Dropzone.createElement("<a style=\"position: absolute;top: -8px;right:-8px;z-index: 10000;\"><img width='25' height='25' src=\"{__STATIC_URL__}/public/yiyuan/new2016/images/close.png\"></a>");
        var _this = this;
        removeButton.addEventListener("click", function(e) {
          e.preventDefault();
          e.stopPropagation();
          _this.removeFile(file);
        });
        file.previewElement.appendChild(removeButton);
      });
    }
  });
</script>
</body>
</html>
