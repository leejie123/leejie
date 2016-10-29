<?php
return array(
	//'配置项'=>'配置值'
		// 'SHOW_PAGE_TRACE' =>true,
		'APP_NAME' => 'zfsk',
		'SHOW_PAGE_TRACE' =>true,
		'APP_GROUP_LIST' => 'Home,Admin',
	    'DEFAULT_GROUP' => 'Home', //默认分组
	    'DEFAULT_MODULE' => 'Index',
	    'URL_MODEL' => 2,
	    'URL_HTML_SUFFIX' => '.html',
		// 添加数据库配置信息
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => '192.168.2.20', // 服务器地址
		'DB_NAME'   => 'zfsk', // 数据库名
		'DB_USER'   => 'root', // 用户名
		'DB_PWD'    => '', // 密码
		'DB_PORT'   => 3306, // 端口a
		'DB_PREFIX' => 'fk_', // 数据库表前缀
		'VENDOR_PATH' => EXTEND_PATH.'Vendor/',
	    'LOAD_EXT_CONFIG' => 'watermark', // 加载扩展配置文件
		// 添加数据库配置信息 PRODUCTION
		// 'DB_TYPE'   => 'mysql', // 数据库类型
		// 'DB_HOST'   => 'localhost', // 服务器地址
		// 'DB_NAME'   => 'gzymcfmy_db', // 数据库名
		// 'DB_USER'   => 'gzymcfmy_root', // 用户名
		// 'DB_PWD'    => 'iori8735', // 密码
		// 'DB_PORT'   => 3306, // 端口a
		// 'DB_PREFIX' => '', // 数据库表前缀
		// 'VENDOR_PATH' => EXTEND_PATH.'Vendor/',
	 //    'LOAD_EXT_CONFIG' => 'setting', // 加载扩展配置文件
	 //    'COOKIE_EXPIRE' => 	604800,
	 //    'COOKIE_PREFIX' => 'YMCA_',
	    //邮件配置
   	  //RBAC认证配置信息
	    'RBAC_SUPERADMIN' =>'admin',  //超级管理员名称，对应用户表中某一用户名-username
	    'ADMIN_AUTH_KEY' =>'superadmin', //超级管理员识别
	    'USER_AUTH_ON' =>true, //是否需要认证
		'USER_AUTH_TYPE'=>1, //认证类型,1为登录后才认证，2为实时认证
		'USER_AUTH_KEY' =>'authId', // 认证识别号,此名称自己取
		// 'REQUIRE_AUTH_MODULE' =>  需要认证模块
		'NOT_AUTH_MODULE' => 'Index',  //无需认证模块
		'NOT_AUTH_ACTION' => 'addRbacHandle',  //无需认证操作
		// 'USER_AUTH_GATEWAY' =>'/Login/doLogin' 认证网关,此处可以不用
		// 'RBAC_DB_DSN' =>  //数据库连接DSN，公共的，此处可以省略
		'RBAC_ROLE_TABLE' =>'fk_role', //角色表名称
		'RBAC_USER_TABLE' =>'fk_role_user', //用户表名称
		'RBAC_ACCESS_TABLE' =>'fk_access', //权限表名称
		'RBAC_NODE_TABLE' =>'fk_node', //节点表名称

	    'THINK_EMAIL' => array(
	        'SMTP_HOST'   => 'smtp.exmail.qq.com', //SMTP服务器
	        'SMTP_PORT'   => '465', //SMTP服务器端口
	        'SMTP_USER'   => 'isaac.liu@net-building.com', //SMTP服务器用户名
	        'SMTP_PASS'   => 'LogMe1n@Safe', //SMTP服务器密码
	        'FROM_EMAIL'  => 'isaac.liu@net-building.com', //发件人EMAIL
	        'FROM_NAME'   => 'Isaac', //发件人名称
	        'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
	        'REPLY_NAME'  => '', //回复名称（留空则为发件人名称）
	        'TO_NAME' => 'Yuan Yan',
	        'TO_EMAIL' => 'season.lau@gmail.com'    
	    ),

	    'WECHAT_OPTION' => array(
	    	'token'=>'iori8735', //填写你设定的key
		    'encodingaeskey'=>'rULfBEMVVk7DsAaQxWOWOSWOQBgYOsQFPCPNVXozMuB', //填写加密用的EncodingAESKey
		    'appid'=>'wxaa7597eff1a7361f', //填写高级调用功能的app id, 请在微信开发模式后台查询
		    'appsecret'=>'d9c15b3d6c960504adaec1947d702c97', //填写高级调用功能的密钥
		    // 'appid'=>'wxe255a938113962b8', //填写高级调用功能的app id, 请在微信开发模式后台查询
		    // 'appsecret'=>'050406e263f8166c2f8925daa3a42f3a', //填写高级调用功能的密钥
		    'oauth' => false,
		    ),

	    'IS_MEMBER' =>array(
	    	0 =>'普通会员',
	    	1 =>'验证会员',
	    	2 =>'VIP会员', 
	    	),
	    'RENT_STATE' =>array(
	    	0 =>'已租',
	    	1 =>'待租',
	    	2 =>'真房',
	    	),
	    'RENOVATION' =>array(
	    	0 =>'简装修',
	    	1 =>'中装修',
	    	2 =>'精装修',
	    	3 =>'豪华装修',
	    	),
	   'DELIVERY_FORM' =>array(
	   		0 =>'押一付一',
	   		1 =>'押二付一',
	   		2 =>'押二付二',
	   		3 =>'押三付一',
	   		4 =>'押三付二',
	   		5 =>'押三付三',
	   	),
	   'OPEN_STATE' =>array(
	   		0 =>'关闭',
	   		1 =>'开启',
	   	),
	   'IS_APPROVED' =>array(
	   		-1 =>'已拒绝审核',
	   		0 =>'未审核',
	   		1 =>'已通过审核',
	   	),
	   'APPROVE_TYPE' =>array(
	   		'real' =>'房源',
	   		'user' =>'会员',
	   	),
	   'USER_STATUS' =>array(
	   		0 =>'无求租',
	   		1 =>'求租',
	   		2 =>'实客',
	   	),
	   'RECOMMEND' =>array(
	   		0 =>'取消',
	   		1 =>'推荐',
	   	),
	   'EVALUATION_GRADE' =>array(
	   		1 =>'好评',
	   		2 =>'中评',
	   		3 =>'差评',
	   	),
	);
?>