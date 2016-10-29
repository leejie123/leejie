<?php
	class nodeModel extends RelationModel{
		protected $_link = array(
			'node' =>array(
				'mapping_type' =>HAS_MANY,
				'parent_key' =>'pid',
				'mapping_name' =>'node',
				'mapping_order'=> 'sort',
				),
			);
	}