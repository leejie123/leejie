<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>订单导入</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	</head>
	<body class="no-skin">
		
	<form  action="/shop/admin/order/importOrders" method="post" enctype="multipart/form-data"> 
    <input type="file" name="file">
    <div>
    <input type="submit" class="btn" value="确认">  
    <input type="button" class="btn" value="取消">  
    </div>
</form> 
		
	</body>

</html>