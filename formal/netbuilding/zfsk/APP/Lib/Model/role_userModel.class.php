<?php
	class role_userModel extends RelationModel{
		protected $_link = array(
			'staff' =>array(
				'mapping_type'=>HAS_MANY,
				'class_name'=>'staff',
				'foreign_key'=>'id',
				'parent_key'=>'user_id',
				),
			);
	}