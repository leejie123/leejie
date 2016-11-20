
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <!-- <meta http-equiv="refresh" content="5"> -->
</head>
<body>
<style>
	ul li{
		line-height: 40px;
	}
	ol li{
		line-height: 40px;
	}
</style>
<form action="" method="'get">
	
	<table>
		<tr>
			<td>是否开启机器人  0 为关闭， 1为开启</td>
			<td><input name="is_open_robot" value="<?=val($config, 'is_open_robot')?>" type="text"/></td>
		</tr>
		<tr>
			<td>机器人数量</td>
			<td><input name="robot_number" value="<?=val($config, 'robot_number')?>" type="text"/></td>
		</tr>
		<tr>
			<td>商品范围 ex 221,222</td>
			<td><input name="rodot_goods" value="<?=val($config, 'rodot_goods')?>" type="text"/></td>
		</tr>
		<tr>
			<td>机器人中奖概率</td>
			<td><input name="winning_probability" value="<?=val($config, 'winning_probability')?>" type="text"/></td>
		</tr>
		<tr>
			<td>机器人单次购买限额</td>
			<td><input name="purchase_limit" value="<?=val($config, 'purchase_limit')?>" type="text"/></td>
		</tr>
		<input type="submit" />
	</table>
</form>


<h3>订单    }<span style=" color: red;">是否机器人购买:  1是   0否 |</span><span style=" color: red;">是否中奖:  1是   0否 </span></h3>
<?php if(!empty($order)):?>
<ol>
	<?php foreach($order as $v):?>
	<li>商品id：<?php echo $v['goods_id'];?>&nbsp;&nbsp;期数： <?php echo $v['term'];?>&nbsp;&nbsp;购买者id:<?=$v['buyer_id']?>&nbsp;&nbsp;购买者名字:<?=$v['buyer_nick']?>&nbsp;&nbsp;是否中奖:<?=$v['hit']?>&nbsp;&nbsp;期数id:<?=$v['term_id']?>&nbsp;&nbsp;是否机器人购买:<?=$v['is_robot_buy']?>&nbsp;&nbsp;订单号：<?=$v['order_sn']?>&nbsp;&nbsp;幸运号:<?=$v['code']?>&nbsp;&nbsp;时间:<?=date("Y-m-d H:i:s", $v['add_time'])?></li>
	<?php endforeach;?>
</ol>
<?php endif;?>

<h3>机器人根据概率中奖期数,商品</h3>
<?php if(!empty($period)):?>
<ul>
	<?php foreach($period as $v):?>
	<li>商品id：<?php echo $v['goods_id'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中奖期数： <?php echo $v['term'];?></li>
	<?php endforeach;?>
</ul>
<?php endif;?>

<h3>期数,商品    |<span style=" color: red;">是否机器人中奖:  1是   0否 </span></h3>
<?php if(!empty($term_data)):?>
<ul>
	<?php foreach($term_data as $v):?>
	<li>期数id：<?php echo $v['id']; ?>&nbsp;&nbsp;商品id：<?php echo $v['goods_id']; ?>&nbsp;&nbsp;期数： <?php echo $v['term'];?> &nbsp;&nbsp;总幸运码：<?=$v['code_num']?>&nbsp;&nbsp;已购买幸运码：<?=$v['buy_num']?>&nbsp;&nbsp;是否机器人中奖：<?=$v['is_robot_winning']?>&nbsp;&nbsp;中奖用户id:<?=$v['hit_uid']?>&nbsp;&nbsp;中奖幸运码:<?=$v['hit_code']?></li>
	<?php endforeach;?>
</ul>

<h3>机器人</h3>
<?php if(!empty($robot)):?>
<ul>
	<?php foreach($robot as $v):?>
	<li>机器人用户id：<?php echo $v['uid'];?>&nbsp;&nbsp;&nbsp;&nbsp;机器人名称： <?php echo $v['nick'];?>&nbsp;&nbsp;&nbsp;&nbsp;机器人地区：<?php echo $v['area'];?></li>
	<?php endforeach;?>
</ul>
<?php endif;?>
<?php endif;?>
<script src="http://static.yedadou.com/public/assets/js/jquery.js"></script>
<script src="http://static.yedadou.com/public/assets/js/bootstrap.js"></script>
<script src="http://static.yedadou.com/public/assets/js/jquery-ui.js"></script>
<script type="text/javascript">
		$(function(){
			var setInterval_id=0;
			var url='<?=$site_url?>/yiyuan/SetRobot';//进址
			var data={};//参数
			function refresh(){
				$.ajax({
						url:url,
						data:data,
						success: function(data){//成功
							console.log(data);
						},
						error:function(){//失败
							
						}
				});
			}
			
			$('#start').click(function(){
				setInterval(refresh,3000);
			});
		});
</script>
<button id="start">开始刷新</button>