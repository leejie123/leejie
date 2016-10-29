<?php

	class PropertyAction extends Action{

		public function getPropertiesForLBS(){

			$neLat = $this->_get('neLat');
			$neLng = $this->_get('neLng');
			$swLat = $this->_get('swLat');
			$swLng = $this->_get('swLng');

			$where['lat'] = array('between', array($swLat, $neLat));
			$where['lng'] = array('between', array($swLng, $neLng));

			// dump($where);

			$properties = D('property')->relation(true)->where($where)->select();

			foreach ($properties as $key => $value) {
				$properties[$key]['count'] = count($value['real']);
			}

			// dump($properties);

			$this->ajaxReturn($properties, '获取列表成功', 1);
		}


	}