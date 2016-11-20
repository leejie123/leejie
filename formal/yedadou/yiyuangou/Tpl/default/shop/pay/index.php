<?php include $this->tpl('shop:public/html_header.php') ?>
</head>
    <body>
<form method="post" action="/shop/pay" class="form-horizontal">
    <div class="form-group">
    <div class="col-xs-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg">提交</button>
    </div>
  </div>
    <div class="form-group">
    <label  class="col-sm-2 control-label">out_order_sn : </label><div class="col-xs-10"><input  class="form-control" type="text" name="out_order_sn" value="<?=$order_sn?>" /></div>
    </div>
    <div class="form-group">
    <label  class="col-xs-2 control-label">title :</label><div class="col-xs-10"><input  class="form-control"type="text" name="title" value="test" /></div>
    </div>
    <div class="form-group">
    <label  class="col-xs-2 control-label">mch_id :</label><div class="col-xs-10"><input  class="form-control"type="text" name="mch_id" value="8021631053" /></div>
    </div>
    <div class="form-group">
    <label  class="col-xs-2 control-label">amount_fee :</label><div class="col-xs-10"><input  class="form-control"type="text" name="amount_fee" value="0.01" /></div>
    </div>
    <div class="form-group">
    <label  class="col-xs-2 control-label">sign_type :</label><div class="col-xs-10"><input  class="form-control"type="text" name="sign_type" value="MD5" /></div>
    </div>
    <div class="form-group">
    <label  class="col-xs-2 control-label">attach: </label><div class="col-xs-10"><input  class="form-control"type="text" name="attach" value="test" /></div>
    </div>
    <div class="form-group">
    <label  class="col-xs-2 control-label">notify_url: </label><div class="col-xs-10"><input  class="form-control"type="text" name="notify_url" value="http://pay.yedadou.com/apiTest5" /></div>
    </div>
    <div class="form-group">
    <label  class="col-xs-2 control-label">return_url: </label><div class="col-xs-10"><input  class="form-control"type="text" name="return_url" value="http://1047.m.yedadou.com/shop/index" /></div>
    </div>
    <div class="form-group">
    <label  class="col-xs-2 control-label">nonce_str : </label><div class="col-xs-10"><input  class="form-control"type="text" name="nonce_str" value="asdf234sdf" /></div>
    </div>
    <div class="form-group">
    <label  class="col-xs-2 control-label">time_expire :</label> <div class="col-xs-10"><input  class="form-control"type="text" name="time_expire" value="2016-07-16 15:12:40" /></div>
    </div>

</form>
</body>

</html>