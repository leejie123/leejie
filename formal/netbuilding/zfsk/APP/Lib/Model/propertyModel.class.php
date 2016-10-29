<?php
	class propertyModel extends RelationModel{
		protected $_link = array(
			'real' =>array(
				'mapping_type'=>HAS_MANY,
				'class_name'=>'real',
				'parent_key'=>'property_id',
				'mapping_name'=>'real',
				),
			'property_image' =>array(
				'mapping_type'=>HAS_MANY,
				'class_name'=>'property_image',
				'parent_key'=>'property_id',
				'mapping_name'=>'images',
				),
			'province_city_area' =>array(
				'mapping_type'=>BELONGS_TO,
				'class_name' =>'province_city_area',
				'foreign_key' =>'area_id',
				'mapping_name' =>'area',
				),
			'staff' =>array(
				'mapping_type'=>BELONGS_TO,
				'class_name'=>'staff',
				'foreign_key'=>'staff_id',
				'mapping_name' =>'staff',
				),

			);
	}