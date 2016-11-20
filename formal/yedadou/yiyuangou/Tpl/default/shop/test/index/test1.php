<!-- 这个是test1模板页 -->
<!-- {__STATIC_URL__} -->
<?php 

// echo 'dsfiaosdifdsiofds';
	// $data =[
	// 	 [
	// 		'name' => '手机',
	// 		'sub_cate' => [
	// 			'相机','相机','相机'	
	// 		]	
	// 	]
	// ];	
	// 


	// print_r($data);
	// $data1 = [
 //  				{
 //  					'name': '手机',
 //  					"sub_cate": [
	//   					'相机1',
	//   					'相机1',
	//   					'相机1'
 //  					]},
 //  				{
 //  					"name": '相机',
 //  					"sub_cate": [
 //  					'相机2',	
 //  					'相机2',
 //  					'相机2'
 //  					]
 //  				}
 //  				,{	
 //  					"name": "数码",
 //  					"sub_cate": [
 //  					'相机3',
 //  					'相机3',
 //  					'相机3'
 //  					]
 //  				},
 //  				{	
 //  					"name": "男装",
 //  					"sub_cate": [
 //  					'相机3	',
 //  					'相机3',
 //  					'相机3'
 //  					]
  			// 	}
  			// ]
 ?>
 <?php
// //这里php代码
// $arrData=[
// 	'a'=>1,
// 	'b'=>2,
// 	'c'=>['c1','c2','c3']
// ];
// //转换json字符串
// echo '<hr>';
// echo '转换json字符串:';
// echo '<hr>';
// echo json_encode($arrData);

// //下面是自行传的get参数
// echo '<hr>';
// echo '下面是自行传的get参数:';
// echo '<hr>';
// print_r($_GET);
// ?>

<?php 



$data = [ 
    "success"=> true,
    "msg"=> "没有错误",
    "data"=> [ 
        "items"=> [
            [ 
                "id"=> "8736",
                "goods_id"=> "3048",
                "uid"=> "58",
                "title"=> "好东西啊啊啊啊",
                "pic_url"=> "",
                "price"=> "998.00",
                "spec"=> ",",
                "quantity"=> "1",
                "add_time"=> "1453356453",
                "stock"=> "999",
                "detail_url"=> "http://1047.m.yedadou.com/shop/shopGoods/ProductDetails?id=3048",
                "over"=> false,
                "total_price"=> 998
            ]
        ],
        "end"=> false
    ]
];
var_dump($data) ;


 ?>