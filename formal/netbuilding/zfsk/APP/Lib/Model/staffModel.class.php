<?php
	class staffModel extends RelationModel{
		protected $_link =array(
			
			'real' => array(
				'mapping_type' =>HAS_MANY,
				'class_name' =>'real',
				'parent_key' =>'staff_id',	
				'mapping_name' =>'real',
				'mapping_order'=>'timestamp desc',
				),
			'role' => array(
				'mapping_type' =>MANY_TO_MANY,
				'foreign_key' =>'user_id',
				'relation_key' =>'role_id',
				'relation_table' =>'fk_role_user',
				'mapping_fields' =>'id,name',
				),
	
			);
	}