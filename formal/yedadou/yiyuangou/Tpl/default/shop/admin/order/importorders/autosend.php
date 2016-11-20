<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>订单导入</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	</head>
	<body class="no-skin">
		
	<div>
	<span>本次正确发货数量:<?php echo count($order_send);?></span>
	<span>订单状态异常:<?php echo count($order_error);?></span>
	<span>订单不存在:<?php echo count($order_not_exist);?></span>
	</div>
	<?php if(!empty($order_error)){ ?>
		
		<table>
		<tr>
		<th>订单号</th>
		<th>异常状态</th>
		</tr>
		<?php foreach ($order_error as $value){?>
		<tr>
			<td><?php echo $value['order_sn']?></td>
		    <td>状态异常</td>
		</tr>
		<?php }?>
		</table>
		
	<?php }?>
	
	
	<?php if(!empty($order_not_exist)){ ?>
		
		<table>
		<tr>
		<th>订单号</th>
		<th>异常状态</th>
		</tr>
		<?php foreach ($order_error as $value){?>
		<tr>
			<td><?php echo $value['order_sn']?></td>
		    <td>订单不存在</td>
		</tr>
		<?php }?>
		</table>
		
	<?php }?>
	
	</body>

</html>