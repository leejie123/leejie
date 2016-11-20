<?php 

	$data =[
		 [
			'name' => '手机',
			'sub_cate' => [
				'相机','相机','相机'	
			]	
		],
		[
			'name' => '男装',
			'sub_cate' => [
				'男装','相机','相机'	
			]	
		],
		[
			'name' => '女装',
			'sub_cate' => [
				'女装','相机','相机'	
			]	
		],
	];	

	echo json_encode($data);

 ?>