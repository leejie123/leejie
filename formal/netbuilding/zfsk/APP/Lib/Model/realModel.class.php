<?php
	class realModel extends RelationModel{
		protected $_link =array(
			'staff' =>array(
				'mapping_type' =>BELONGS_TO,
				'class_name' =>'staff',
				'foreign_key' =>'staff_id',
				'mapping_name' =>'staff',
				),
			'real_images' =>array(
				'mapping_type' =>HAS_MANY,
				'class_name' =>'real_images',
				'parent_key' =>'real_id',
				'mapping_name' =>'real_images',
				),
			'property' => array(
				'mapping_type' =>BELONGS_TO,
				'class_name' =>'property',
				'foreign_key' =>'property_id',
				'mapping_name' =>'property',
				),
			'real_cate' =>array(
				'mapping_type' =>BELONGS_TO,
				'class_name' =>'real_cate',
				'foreign_key' => 'area_id',
				'mapping_name' =>'areax',
				),
			'user' =>array(
				'mapping_type' =>BELONGS_TO,
				'class_name' =>'user',
                'foreign_key'=>'user_id',
                'mapping_name'=>'user',
				),	
			);
	}