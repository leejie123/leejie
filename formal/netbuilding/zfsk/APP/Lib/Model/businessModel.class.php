<?php
	class businessModel extends RelationModel{
		protected $_link = array(
			'user' =>array(
				'mapping_type' =>BELONGS_TO,
				'class_name' =>'user',
				'foreign_key' => 'user_id',
				'mapping_name' =>'user',
				),
			'real' =>array(
				'mapping_type'=>BELONGS_TO,
				'class_name' =>'real',
				'foreign_key' =>'real_id',
				'mapping_name' =>'real',
				),
			'real_cate' =>array(
				'mapping_type'=>BELONGS_TO,
				'class_name' =>'real_cate',
				'foreign_key' =>'cate_id',
				'mapping_name' =>'cate',
				),
			'staff' =>array(
				'mapping_type' =>BELONGS_TO,
				'class_name' =>'staff',
				'foreign_key' =>'staff_id',
				'mapping_name' =>'staff',
			),
		);
	}