<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>门店业绩</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="{__STATIC_URL__}/public??/assets/css/bootstrap.css,/assets/css/font-awesome.css,/assets/css/jquery-ui.css,/assets/css/datepicker.css,/assets/css/ace-fonts.css,/assets/css/ace.css,/css/public.css,/admin/css/order/shop/list.css"
		/>
	</head>

	<body class="no-skin">

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<!--内容开始-->
					<div class="tabbable">
						<ul class="nav nav-tabs padding-12 tab-color-blue">
							<li class="active">
								<a data-toggle="tab" href="#tab1">门店业绩</a>
							</li>
						</ul>
						<div class="tab-content no-border padding-0 pt10">
							<div id="tab1" class="tab-pane active">
								<!--顶部工具条-->
								<div class="table-head-toolbar clearfix">
									<form id="form1" name="form1" method="post" action="/shop/admin/Sales/StorePerformance/post" enctype="multipart/form-data">
										<div class="pull-right">
											<div class="input-group input-daterange pull-left">
												<input id="startTime" name="startTime" type="text" class="form-control" />
												<span class="input-group-addon">
												<i class="fa fa-exchange"></i>
											</span>
												<input id="endTime" name="endTime" type="text" class="form-control" />
											</div>
											<select name="datetime">
												<option value=""></option>
												<option value="yesterday">昨天</option>
												<option value="week">近7天</option>
												<option value="month">近一个月</option>
											</select>
											<button type="submit" class="btn btn-info btn-sm">
												<span class="ace-icon fa fa-search"></span>确认
											</button>
										</div>
									</form>
								</div>
								<div>
									<h3><b><?php echo $timeDay;?> 销售情况</b></h3>
									<table class="table table-bordered table-vertical-middle">
										<tr>
											<td class="column2">
												<div><h5><a href="/shop/admin/Sales/StorePerformance?view=totalOrders">订单数</a></h5></div>
												<div><h5><b><?php echo val($total,'totalOrders' ,0)?></b></h5></div>
											</td>
											<td class="column2">
												<div><h5><a href="/shop/admin/Sales/StorePerformance?view=turnover">销售额</a></h5></div>
												<div><h5><b><?php echo val($total, 'turnover',0)?></b></h5></div>
											</td>
											<td class="column2">
												<div><h5><a href="/shop/admin/Sales/StorePerformance?view=refund">退款订单</a></h5></div>
												<div><h5><b><?php echo val($total, 'refund',0)?></b></h5></div>
											</td>
											<td class="column2">
												<div><h5><a href="/shop/admin/Sales/StorePerformance?view=refundNum">退款金额(元)</a></h5></div>
												<div><h5><b><?php echo val($total, 'refundNum',0)?></b></h5></div>
											</td>
											<td class="column2">
												<div><h5><a href="/shop/admin/Sales/StorePerformance?view=member">新增会员</a></h5></div>
												<div><h5><b><?php echo val($total, 'member',0)?></b></h5></div>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--内容结束-->
				</div>
				<div id="ChartsContainer" style="min-width:400px;height:400px;"></div>
			</div>
		</div>

		<script src="{__STATIC_URL__}/public/assets/js/jquery.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/bootstrap.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/jquery-ui.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="{__STATIC_URL__}/public/assets/js/ace/ace.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/common/common.js"></script>
		<script src="{__STATIC_URL__}/public/admin/js/sales/store/index.js"></script>
		<script src="{__STATIC_URL__}/public/js/highcharts.js"></script>
		<?php if(!empty($dataJs)) : ?>
		<script>
			$(function () {
			var chartsTitle="过去一周<?php echo $name;?>";//这里是标题
			var chartsSubtitle='';//这里子标题
			var chartsXAxis=[<?php echo $day;?>];
			var chartsYAxis_title='数值';//y轴的标题
			var charsDatas=[{
		        name: '<?php echo $name;?>',
		        data: <?php echo $dataJs;?>
		        /*dataLabels: {
		            enabled: true  //显示值
		        }*/
		    }];
		    $('#ChartsContainer').highcharts({
		        title: {
		            text: chartsTitle
		        },
		        subtitle: {
		            text: chartsSubtitle
		        },
		        xAxis: {
		            categories: chartsXAxis
		        },
		        yAxis: {
		            title: {
		                text: chartsYAxis_title
		            },
		            plotLines: [{
		                value: 0,
		                width: 1,
		                color: '#808080'
		            }]
		        },
		        tooltip: {
		            valueSuffix: '' //值的后缀
		        },
		        legend: {
		            title: {
		                text: 'City<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
		                style: {
		                    fontStyle: 'italic'
		                }
		            },
		            layout: 'vertical',
		            align: 'right',
		            verticalAlign: 'top',
		            x: -10,
		            y: 100
		        },
		        series: charsDatas
		    });
		});
		</script>
		<?php endif;?>
	</body>

</html>