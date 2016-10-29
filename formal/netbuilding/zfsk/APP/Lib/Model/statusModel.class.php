<?php
	class statusModel extends RelationModel{
		protected $_link = array(
			'staff' =>array(
				'mapping_type'=>BELONGS_TO,
				'class_name' =>'staff',
				'foreign_key' =>'request_user_id',
				'mapping_name' =>'staff',
				),
			);
	}