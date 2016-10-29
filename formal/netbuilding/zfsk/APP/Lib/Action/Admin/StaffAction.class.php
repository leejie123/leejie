<?php
	class StaffAction extends BaseAction{
		public function index(){
			// dump($this->property_id);die;

			$staff = D('staff')->relation(true)->order('timestamp DESC')->select();
		
			foreach ($staff as $key => $value) {
				$property_id = json_decode($value['property_id'] , true);
				$staff[$key]['property_id'] = $property_id;
				foreach ($staff[$key]['property_id'] as $k => $v) {
					$where['id'] = array('eq' , $v);
					$aaa = M('property')->where($where)->find();
					$staff[$key]['property_id'][$k] = $aaa;
				}
			}
			// print_r($staff);die;
			$this->assign('staff',$staff);
			$this->display();
		}

		public function add(){
			if(IS_POST){
				$data = $this->_post();
				$user = session('user');
				$this->user_id = $user['id'];
				$this->truename = $user['truename'];

				$upload = new UploadAction();
            	$result = $upload->upload('image/real/');
            	if(!$result['status'])
            		$this->error($result['info']);
            	$data['top_image'] = $result['info'][0]['savename'];
            	$data['timestamp'] = time();
            	RizhiAction::rizhi($this->user_id, 'rizhi', '添加', $data['id'], $data, '管理员' . $this->user['truename'] . '添加了用户ID为' . $data['id'] . '的数据');
				if(M('staff')->add($data)){
					$this->success('添加租赁专家成功。',U('Staff/index'));
				}else{
					$this->error('添加租赁专家失败。');
				}
			}else{
				$this->display();
			}
		}
		public function delete(){
			$id = $this->_get('id');
			$user = session('user');
			$this->user_id = $user['id'];
			$this->truename = $user['truename'];
			RizhiAction::rizhi($this->user_id, 'rizhi', '删除', $id, $id, '管理员' . $this->user['truename'] . '删除了用户ID为' . $id . '的数据');
			if(M('staff')->delete($id)){
				$this->success('租赁专家删除成功。');
			}else{
				$this->success('租赁专家删除失败。');
			}
		}
		public function update(){
				// $this->user = $user['id'];	
				// dump($this->user);die;
			$user = session('user');
			$this->user_id = $user['id'];
			$this->truename = $user['truename'];
			if(IS_POST){
				$data = $this->_post();
				$upload = new UploadAction();
            	$result = $upload->upload('image/real/');
            	if($result)
            		$data['top_image'] = $result['info'][0]['savename'];
            	// dump($data);die;
            	RizhiAction::rizhi($this->user_id, 'rizhi', '修改', $data['id'], $data, '管理员' . $this->user['truename'] . '修改了用户ID为' . $data['id'] . '的数据');
            	if(M('staff')->save($data)){
            		$this->success('租赁专家修改成功。',U('Staff/index'));
            	}else{
            		$this->error('租赁专家修改失败。');
            	}
            	

			}else{
				$id =$this->_get('id');
				$where['id'] = array('eq',$id);
				$staffUpdate = M('staff')->where($where)->find();
				$this->assign('staffUpdate',$staffUpdate);
				$this->display();
			}
		}

		//评价列表
		public function evaluation(){
			$id = $this->_get('id');
			$where['staff_id'] = array('eq',$id);
			$this->evaluation = D('business')->relation(true)->where($where)->select();
			// dump($this->evaluation);die;
			$this->display();
		}

		public function three_levels(){
			$id = $this->_get('id');
			$where['id'] = array('eq', $id);
			$staff = M('staff')->where($where)->find();
			$property_id = $staff['property_id']; 
			$this->property_id = json_decode($property_id,true);
			// dump($this->property_id);die;
			$property = M('property')->field('id,district_name')->select();

			foreach ($property as $key => $value) {
				$property[$key]['lis'] = in_array($value['id'] , $this->property_id);
			}
			$this->assign('property',$property);
			$this->assign('staff',$staff);
			// dump($staff);die;
			$this->display();
		}


		public function addLevels(){
			if(!IS_POST)
				$this->error('非法操作！');
			$relation = M('staff'); 
			$property_id = $this->_post('property_id');
			$property_id = json_encode($property_id);
			// $id = $this->_post('id');
			$id = I('post.id');
			// dump($id);die;	
			$where['id'] = array('eq',$id);

			$is_find = $relation->where($where)->find();
			if($is_find['property_id'] != ''){
				if($is_find['property_id'] == $property_id){
					$this->error('授权选项没有改变');
				}
			}

			$data['property_id'] = $property_id; 
			$is_success = $relation->where($where)->save($data);
			
			if(!$is_success)
				$this->error('授权失败！');

			$this->success('授权成功！');	
			
	
		}


		public function follow_up(){
			$id = $this->_get('id');
			$where['user_id'] = array('eq', $id);
			$this->follow_up = M('rizhi')->where($where)->select();
			// dump($this->follow_up);die;
			$this->display();
		}

		public function xiugaipingxing(){
			if(IS_POST){
				$id = $this->_post('id');
				$comment_grade = $this->_post('comment_grade');
				$data['comment_grade'] = $comment_grade;
				$data['id'] = $id;

				if($is_success =M('staff')->save($data)){
					$this->success('修改成功！',U('Staff/index'));
				}else{
					$this->error('修改失败！');
				}
			}else{
				$id = $this->_get('id');
				$where['id'] = array('eq',$id);
				$this->staff = D('staff')->relation(true)->where($where)->select();
				// dump($this->staff);die;
				$this->display();
			}
		}

		public function jiaoyilie(){
			$user = session('user');
			$id = $user['id'];
			$where['staff_id'] =array('eq',$id);
			$business = D('business')->relation(true)->where($where)->order('timestamp DESC')->select();
			$this->assign('business',$business);
			// dump($business);die;
			$this->display();
		}

		public function business(){
			if(IS_POST){
				$data = $this->_post();
				$upload = new UploadAction();
            	$result = $upload->upload('image/user/');

            	if(!$result['status'])
            		$this->error($result['info']);

            	$data['identification_image_positive'] = $result['info'][0]['savename'];
            	$data['identification_image_back'] = $result['info'][1]['savename'];

            	$data['trading_hours'] = time();
            	$data['uniqid'] = uniqid();
            	if(M('business')->add($data)){
            		$this->success('添加新交易成功！');
            	}else{
            		$this->error('添加新交易失败！');
            	}
			}else{
				$user = session('user');
				$id = $user['id'];
				$where['staff_id'] =array('eq',$id);
				$this->user = M('user')->where($where)->select();
				$this->staff_id = $id;
				// dump($this->staff_id);die;
				$this->real = M('real')->where($where)->select();
				$this->real_cate = M('real_cate')->select();
				// dump($this->user);die;
				$this->display();
			}
		
		}
		
		public function businessDelete(){
			$id = $this->_get('id');
			if(M('business')->delete($id)){
				$this->success('房源删除成功。');
			}else{
				$this->success('房源删除失败。');
			}
		}

		public function updateComment(){
			if(IS_POST){
				$data = $this->_post();
				// dump($data);die;
				if(M('business')->save($data)){
					$this->success('修改成功！',U('Staff/index'));
				}else{
					$this->error('修改失败！');
				}
			}else{
				$id = $this->_get('id');
				$where['id'] = array('eq', $id);
				$this->comment = M('business')->where($where)->find();
				// dump($this->comment);die;
				$this->real_cate = M('real_cate')->select();
				$this->display();
			}

		}

		public function deleteComment(){
			$id = $this->_get('id');
			if(M('business')->delete($id)){
				$this->success('删除成功！',U('Staff/index'));
			}else{
				$this->error('删除失败！');
			}
		}
	}