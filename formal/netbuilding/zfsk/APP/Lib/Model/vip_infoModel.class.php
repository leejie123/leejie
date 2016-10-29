<?php
	class vip_infoModel extends RelationModel{
		protected $_link = array(
			'user' =>array(
				'mapping_type'=>BELONGS_TO,
				'class_name'=>'user',
				'foreign_key'=>'uid',
				// 'mapping_name' =>'staff',
				'mapping_fields' => 'username',
				),
			'cate' =>array(
				'mapping_type'=>BELONGS_TO,
				'class_name'=>'cate',
				'foreign_key'=>'cate_id',
				// 'mapping_name' =>'staff',
				),
			);
	}