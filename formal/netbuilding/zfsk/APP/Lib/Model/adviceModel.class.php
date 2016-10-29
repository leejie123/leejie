<?php
	class adviceModel extends RelationModel{
		protected $_link = array(
			'user' =>array(
				'mapping_type'=>BELONGS_TO,
				'class_name'=>'user',
				'foreign_key'=>'uid',
				// 'mapping_name' =>'staff',
				'mapping_fields' => 'username,phone',
				),
			'staff' =>array(
				'mapping_type'=>BELONGS_TO,
				'class_name'=>'staff',
				'foreign_key'=>'cid',
				// 'mapping_name' =>'staff',
				'mapping_fields' => 'truename',
				),
			);
	}