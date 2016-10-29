<?php
	class intentionModel extends RelationModel{
		protected $_link = array(
			'real' =>array(
				'mapping_type'=>BELONGS_TO,
				'class_name' =>'real',
				'foreign_key' =>'real_id',
				'mapping_name' =>'real',
				),
			);
	}