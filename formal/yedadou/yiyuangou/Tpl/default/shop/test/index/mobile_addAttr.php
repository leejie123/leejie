<html>
	<head>
		<title>this is attr</title>
		<meta charset="utf-8">
		<style>
			.attr > span {
				display:inline-block;
				padding: 10px;
				margin-bottom: 5px;
				border: 1px solid #ddd;
				border-radius: 5px;
			}
			.popup{
				    position: absolute;
				    left: 0;
				    bottom: 0;
				    width: 100%;
				    height: 200px;
				    z-index: 11000;
				    background: #fff;
				    box-sizing: border-box;
			}
			.modal-in {
				transform: translate3d(0,0,0);
			}

			.toolbar {
				background-color: #ddd;
			}

			.toolbar a{
				color: #fff;
				text-decoration: none;
			}
		</style>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<link rel="stylesheet" href="http://static.yedadou.com/public/??css/bootstrap.min.css,css/font-awesome.min.css,front/default/css/public/public.css" />
	</head>
	<body>
		<a href="" open-picker><strong>open picker</strong></a>
		<div class="popup">
			<div class="toolbar clearfix" style="padding: 10px;"> 
				<span class="pull-right">
					<a href="" close-picker>打开</a>
				</span>
				<span class="pull-left">
					<a href="">关闭</a>
				</span>
			</div>
			<div>
				<label for=""><strong>颜色</strong></label>
				<span class="attr">
					<a href="" class="btn btn-info btn-xs">ssd</a>
				</span>
			</div>
		</div>
		<!-- <div class="popup">
			<select name="" id="">
				<option value="dsifos">sdfiosid	</option>
				<option value="dsifos">sdfiosid	</option>
				<option value="dsifos">sdfiosid	</option>
				<option value="dsifos">sdfiosid	</option>
				<option value="dsifos">sdfiosid	</option>
			</select>
		</div> -->
		<!-- <div class="form-control">
			<div class="">
				<i class="fa fa-clock-o" style="font-size: 20px;"></i>
				现在还没有任何属性
			</div>
		</div> -->
	<!-- 	<div class="form-control clearfix" style="position:fixed;bottom:0px;left: 0px;height: auto;">
			<label for="" >颜色：</label>
			<div class="attr">
				<span class="btn btn-xs btn-info">白色</span>
				<span class="btn btn-xs btn-info">白色</span>
				<span class="btn btn-xs btn-info">白色</span>
				<span class="btn btn-xs btn-info">白色</span>
			</div>
		</div> -->
	</body>
	
	<script src="http://static.yedadou.com/public/??js/jquery.min.js,js/bootstrap.min.js,js/jquery.cookie.js,js/hammer.min.js,front/default/js/public/public.js"></script>
	<script type="text/javascript">
	var proprity=[
			  ['颜色','容量','库存','价格'],
			  ['红色','16',10,16],
			  ['蓝色','20',5,18],
			  ['白色','16',5,18],
			];
    var proprity2=[
		  ['材质','型号','模板','库存','价格'],
		  ['玻璃','A','清新',10,16],
		  ['铝','B','清新',5,18],
		  ['仿木','C','高雅',5,18],
		];

  	function SKUlist(dataProprity){
	  	 var proprityCount=dataProprity[0].length-2;
	  	 var arrRow=[];
	  	 var $row=[];
	  	 var i=0;
	  	 for(;i<proprityCount;i++){
	  	 	arrRow.push({});
	  	 }
	  	 var count=dataProprity.length;
	  	 for(i=1;i<count;i++){
	  	 	var item=dataProprity[i];
	  	 	var j=0;
	  	 	for(;j<proprityCount;j++){
	  	 		if(!arrRow[j][item[j]]){
	  	 			arrRow[j][item[j]]=[i];
	  	 			console.log([i])
	  	 		}else{
	  	 			arrRow[j][item[j]].push(i);
	  	 		}
	  	 	}
	  	 }
	  	 var parent = $('.attr');
	  	 //测试
	  	 console.log(arrRow)
	  	 var ctem=arrRow.length;
	  	 for(var k=0;k<ctem;k++){
  	 	$('<span class="btn btn-info btn-xs">' + arrRow[k] + '</span>').appendTo(parent)
	  	 	console.log(arrRow[k]);
	  	 }
  	}
 SKUlist(proprity);
</script>
	<script src="http://static.yedadou.com/public/??js/jquery.min.js,js/bootstrap.min.js,js/jquery.cookie.js,js/hammer.min.js,front/default/js/public/public.js"></script>
	
</html>
