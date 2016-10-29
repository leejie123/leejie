<?php
	class PropertyAction extends BaseAction{
		public function index(){
			$where['romotion'] = array('neq','1');
			$property = D('property')->relation(true)->where($where)->order('timestamp DESC')->select();
			$this->assign('property', $property);
			// dump($property);die;
			$this->display();
		}

		public function delete(){
			$id = $this->_get('id');
			if(M('property')->delete($id)){
				$this->success('房源删除成功。');
			}else{
				$this->success('房源删除失败。');
			}
		}
		public function promotion(){
			if(IS_POST){
				$data = $this->_post();
				$latlng = explode(',',$data['poi']); 

				$data['lat'] = $latlng[0];
				$data['lng'] = $latlng[1];
				$data['timestamp'] = time();
				// dump($data);die;
				if(M('property')->add($data)){
					$this->success('推介成功！');
				}else{	
					$this->error('推介失败！');
				}
			}
			$where['romotion'] = array('eq','1');
			$this->romotion = D('property')->relation(true)->where($where)->order('timestamp DESC')->select();
			$this->display();
		}


		public function addtuijie(){
			$user = session('user');
			$this->id = $user['id'];

			$this->real = M('property')->select();

			$this->display();
		}

		public function upload(){
				if(IS_POST){
				$data = $_FILES;
				
				$upload = new UploadAction();
            	$result = $upload->upload('image/real/');

            	if(!$result['status'])
            		$this->error($result['info']);
           		foreach ($result['info'] as $key => $value) {
           			$result['property_url'][] = $value['savename'];
           		}
       			$shuzi = count($result['property_url']);
       			for ($i=0; $i < $shuzi; $i++) { 
       				$arr[$i]['property_url'] = $result['property_url'][$i];
       				$arr[$i]['property_id'] = $this->_post('property_id');
       			}

            	// dump($arr);die;	
	            if(M('property_image')->addAll($arr)){
						$this->success('小区图片添加成功。');
					}else{
						$this->error('小区图片添加失败。');
					}
			}else{
				$property_id = $this->_get('id');
				$this->assign('property_id',$property_id);

				$where['property_id'] = $property_id;
				$this->tupian = M('property_image')->where($where)->select();
				// dump($this->tupian);die;
				$this->display();
			}
		}

		public function deleteTupian(){
			$id = $this->_get('id');
			if(M('property_image')->delete($id)){
				$this->success('小区删除成功。');
			}else{
				$this->success('小区删除失败。');
			}
		}

		public function update(){
			if(IS_POST){
				$data = $this->_post();
				$latlng = explode(',',$data['poi']); 

				$data['lat'] = $latlng[0];
				$data['lng'] = $latlng[1];
				$data['construction_time'] = strtotime($data['construction_time']);
				// dump($data);die;
				if(M('property')->save($data)){
					$this->success('小区更新成功！');
				}else{
					$this->error('小区更新失败！');
				}
			}else{
				$id =$this->_get('id');
				$where['id'] = array('eq', $id);
				$this->property = M('property')->where($where)->find();
				// dump($this->property);die;
				$area = M('province_city_area')->select();
				$this->assign('area',$area);
				
				$this->display();
			}
		}
		public function add(){
			if(IS_POST){
				$data = $this->_post();
				$latlng = explode(',',$data['poi']); 

				$data['lat'] = $latlng[0];
				$data['lng'] = $latlng[1];
				$data['construction_time'] = strtotime($data['construction_time']);
				if(M('property')->add($data)){
					$this->success('小区添加成功。',U('Property/index'));
				}else{
					$this->error('小区添加失败。');
				}
			}else{
				$area = M('province_city_area')->select();
				$this->assign('area',$area);
				$this->display();
			}
		}
		public function recommend(){
			$data = $this->_get();
			// dump($data);die;
			if(M('property')->save($data)){
				$this->success('操作成功！');
			}else{
				$this->error('操作失败！');
			}
		}

		public function three_levels(){
			$id = $this->_get('id');
			$where['id'] = array('eq', $id);
			$property = M('property')->where($where)->find();
			// $this->assign('property',$property);
			$staff_id = $property['staff_id']; 
			$this->staff_id = json_decode($staff_id,true);


			$staff = M('staff')->field('id,truename')->select();


			foreach ($staff as $key => $value) {
				$staff[$key]['ccc'] = in_array($value['id'] , $this->staff_id);
			}
			$this->assign('property ',$property);
			$this->assign('staff' , $staff);
			$this->display();
		}


		public function addLevels(){
			if(!IS_POST)
				$this->error('非法操作！');
			
			$id = $this->_post('id');
			$where['id'] = array('eq',$id);
			$relation = M('property');  
			$staff_id = I('post.staff_id');
			// dump($id);die;
			$staff_id = json_encode($staff_id);


			// dump($aaa);die;
			$data['staff_id'] = $staff_id; 

			$is_success = $relation->where($where)->save($data);
			
			if(!$is_success)
				$this->error('授权失败！');
			$this->success('授权成功！');
		}

	}