
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<!--     <meta http-equiv="refresh" content="3"> -->
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
			<td>是否开启蜘蛛  0 为关闭， 1为开启</td>
			<td><input name="is_open_robot" value="<?=val($config, 'is_open_robot')?>" type="text"/></td>
		</tr>
		<tr>
			<td>蜘蛛数量</td>
			<td><input name="robot_number" value="<?=val($config, 'robot_number')?>" type="text"/></td>
		</tr>
		<tr>
			<td>商品范围 ex 221,222</td>
			<td><input name="rodot_goods" value="<?=val($config, 'rodot_goods')?>" type="text"/></td>
		</tr>
	<!-- 	<tr>
			<td>蜘蛛中奖概率</td>
			<td><input name="winning_probability" value="<?=val($config, 'winning_probability')?>" type="text"/></td>
		</tr> -->
		<tr>
			<td>蜘蛛单次购买限额</td>
			<td><input name="purchase_limit" value="<?=val($config, 'purchase_limit')?>" type="text"/></td>
		</tr>
		<tr>
			<td>地区</td>
			<td>
				<div class="edit-label pull-left">
													<label>
														*地区:
													</label>
												</div>
												<div class="edit-wrapper">
												<br><br>
												<br>
													<select id="category1" name="province" data-tip="省份">
														<option value="请选择省份" data-id="0" selected>请选择省份</option>
														<option value="广东省" data-id="440000">广东省</option>
														<option value="北京" data-id="110000">北京</option>
														<option value="天津" data-id="120000">天津</option>
														<option value="河北省" data-id="130000">河北省</option>
														<option value="山西省" data-id="140000">山西省</option>
														<option value="内蒙古" data-id="150000">内蒙古</option>
														<option value="辽宁省" data-id="210000">辽宁省</option>
														<option value="吉林省" data-id="220000">吉林省</option>
														<option value="黑龙江省" data-id="230000">黑龙江省</option>
														<option value="上海" data-id="310000">上海</option>
														<option value="江苏省" data-id="320000">江苏省</option>
														<option value="浙江省" data-id="330000">浙江省</option>
														<option value="安徽省" data-id="340000">安徽省</option>
														<option value="福建省" data-id="350000">福建省</option>
														<option value="江西省" data-id="360000">江西省</option>
														<option value="山东省" data-id="370000">山东省</option>
														<option value="河南省" data-id="410000">河南省</option>
														<option value="湖北省" data-id="420000">湖北省</option>
														<option value="湖南省" data-id="430000">湖南省</option>
														<option value="广西" data-id="450000">广西</option>
														<option value="海南省" data-id="460000">海南省</option>
														<option value="重庆市" data-id="500000">重庆市</option>
														<option value="四川省" data-id="510000">四川省</option>
														<option value="贵州省" data-id="520000">贵州省</option>
														<option value="云南省" data-id="530000">云南省</option>
														<option value="西藏" data-id="540000">西藏</option>
														<option value="陕西省" data-id="610000">陕西省</option>
														<option value="甘肃省" data-id="620000">甘肃省</option>
														<option value="青海省" data-id="630000">青海省</option>
														<option value="宁夏" data-id="640000">宁夏</option>
														<option value="新疆" data-id="650000">新疆</option>
														<option value="台湾" data-id="710000">台湾</option>
														<option value="香港特别行政区" data-id="810000">香港特别行政区</option>
														<option value="澳门特别行政区" data-id="820000">澳门特别行政区</option>
													</select>
													<br>
													<br>
													<select id="category2" name="city" data-tip="城市">
														<option value="请选择城市" data-id="0" selected>请选择城市</option>
													</select>
													<br>
													<br>
													<select id="category3" name="area" data-tip="区域" style="display: none;">
														<option value="请选择区域" data-id="0" selected>请选择区域</option>
													</select>
													<button id="addOneAdress">添加一个地区</button>
												</div>

			</td>
		</tr>
		<tr>
			<td>添加一个地区</td>
			<td><textarea rows="3" cols="20" id="batArea" name="batArea" style="width:500px;"><?=val($config, 'set_area', '')?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" style="width: 100px;height:30px" /></td>
		</tr>
		
	</table>
</form>


<!-- <h3>订单    }<span style=" color: red;">是否机器人购买:  1是   0否 |</span><span style=" color: red;">是否中奖:  1是   0否 </span></h3>
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
<?php endif;?> -->

<h3>期数,商品   <!--  |<span style=" color: red;">是否机器人中奖:  1是   0否 </span> --></h3>
<?php if(!empty($term_data)):?>
<ul>
	<?php foreach($term_data as $v):?>
	<li>期数id：<?php echo $v['id']; ?>&nbsp;&nbsp;商品id：<?php echo $v['goods_id']; ?>&nbsp;&nbsp;期数： <?php echo $v['term'];?> &nbsp;&nbsp;总幸运码：<?=$v['code_num']?>&nbsp;&nbsp;已购买幸运码：<?=$v['buy_num']?><!-- &nbsp;&nbsp;是否机器人中奖：<?=$v['is_robot_winning']?> -->&nbsp;&nbsp;中奖用户id:<?=$v['hit_uid']?>&nbsp;&nbsp;中奖幸运码:<?=$v['hit_code']?></li>
	<?php endforeach;?>
</ul>
<?php endif;?>
<h3>蜘蛛</h3>
<?php if(!empty($robot)):?>
<ul>
	<?php foreach($robot as $v):?>
	<li>蜘蛛用户id：<?php echo $v['uid'];?>&nbsp;&nbsp;&nbsp;&nbsp;蜘蛛名称： <?php echo $v['nick'];?>&nbsp;&nbsp;&nbsp;&nbsp;蜘蛛地区：<?php echo $v['area'];?></li>
	<?php endforeach;?>
</ul>
<?php endif;?>
<script src="{__STATIC_URL__}/public/??js/jquery.min.js,js/bootstrap.min.js,js/jquery.cookie.js,js/hammer.min.js,front/default/js/public/public.js"></script>
<script type="text/javascript">
$(function(){
	var $category1=$("#category1");
	var $category2=$("#category2");
	var $category3=$("#category3");
	var levelTip1 = $("#category1").attr("data-tip"); //一级分类提示
	var levelTip2 = $("#category2").attr("data-tip"); //二级分类提示
	var levelTip3 = $("#category3").attr("data-tip"); //三级分类提示
	var idNotSelect = "0"; //不选分类时的ID
	var addressDataUrl = '<?=rtrim(\Lib\App\Config::get('ydd_api_url'),'/')?>/getRegion';
	//初始化一级分类
	function initCategory() {
		//根据一级分类切换二级分类
		$("#category1").on("change", function(e) {
			changeCategory();
		});
		//根据二级分类切换三级分类
		/*$("#category2").on("change", function(e) {
			changeCategory2();
		});*/
	};
	//根据一级分类切换二级分类
	function changeCategory() {
		var id = $("#category1 option:selected").attr("data-id");
		var str = '';
		str += '<option value="' + levelTip2 + '" data-id="' + idNotSelect + '" selected>' + levelTip2 + '</option>';
		$("#category2").html(str);
		var str3 = '<option value="' + levelTip3 + '" data-id="' + idNotSelect + '" selected>' + levelTip3 + '</option>';
		$("#category3").html(str3);
		if (id !== "0") {
			$("#category2,#category3").prop("disabled", "disabled");
			var url = addressDataUrl + "?type=city&id=" + id;
			//加载市
			$.ajax({
				type: "GET",
				url: url,
				cache: false,
				dataType: 'jsonp',
				success: function(data) {
					try {
						$.each(data.city, function(key, value) {
							str += '<option value="' + value + '" data-id="' + key + '">' + value + '</option>';
							$("#category2").html(str).prop("disabled", false);
						});
					} catch (e) {}
				},
				error: function() {
					try {
						General.alert("获取市失败,请检查网络连接");
					} catch (e) {}
				}
			});
		} else {

		}
	};
	//根据二级分类切换三级分类
	function changeCategory2() {
		var id = $("#category2 option:selected").attr("data-id");
		var str = '';
		str += '<option value="' + levelTip3 + '" data-id="' + idNotSelect + '" selected>' + levelTip3 + '</option>';
		$("#category3").html(str);
		if (id !== "0") {
			$("#category3").prop("disabled", "disabled");
			var url = addressDataUrl + "?type=area&id=" + id;
			//加载市
			$.ajax({
				type: "GET",
				url: url,
				cache: false,
				dataType: 'jsonp',
				success: function(data) {
					try {
						$.each(data.area, function(key, value) {
							str += '<option value="' + value + '" data-id="' + key + '">' + value + '</option>';
							$("#category3").html(str).prop("disabled", false);
						});
					} catch (e) {}
				},
				error: function() {
					try {
						General.alert("获取区域失败,请检查网络连接");
					} catch (e) {}
				}
			});
		} else {

		}
	}
	initCategory();

	var $batArea=$('#batArea');
	$('#addOneAdress').click(function(e){
		e.preventDefault();
		if($category1.val()=='请选择省份'){
			alert('请选择省份 :{');
			return;
		}
		if($category2.val()=='请选择城市'||$category2.val()=='城市'){
			alert('请选择城市 :{');
			return;
		}
		var tem=$category1.val()+' '+$category2.val();
		if($batArea.val()==''){
			$batArea.val(tem);
		}else{
			$batArea.val($batArea.val()+','+tem);
		}
	});
});
</script>