<?php
	class userModel extends RelationModel{
		protected $_link = array(
			'real' => array(
				'mapping_type' =>MANY_TO_MANY,
				'foreign_key' =>'user_id',
				'relation_key' =>'real_id',
				'relation_table' =>'fk_intention',
				'mapping_name' =>'realname',
				),
			'staff' =>array(
				'mapping_type' =>BELONGS_TO,
				'class_name' =>'staff',
                'foreign_key'=>'staff_id',
                'mapping_name'=>'staff',
				),

			);
	}