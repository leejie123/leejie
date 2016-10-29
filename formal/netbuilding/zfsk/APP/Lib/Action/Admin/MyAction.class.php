<?php
	class MyAction extends BaseAction{
		public function myreal(){
			$user = session('user');	
			$id = $user['id'];
			$where['staff_id'] = array('eq', $id);
			$real = D('real')->relation(true)->where($where)->order('timestamp DESC')->select();
			$this->assign('real',$real);

			// print_r($real);die;
			$this->display();
		}
		public function myproperty(){
			$user = session('user');	
			$id = $user['id'];
			$where['id'] = array('eq', $id);
			$staff = D('staff')->relation(true)->order('timestamp DESC')->where($where)->select();
		
			foreach ($staff as $key => $value) {
				$property_id = json_decode($value['property_id'] , true);
				$staff[$key]['property_id'] = $property_id;
				foreach ($staff[$key]['property_id'] as $k => $v) {
					// dump($v);
					$whereStaff['id'] = array('eq' , $v);
					$bbb = M('property')->where($whereStaff)->find();
					$staff['property_id'][$k] = $bbb;

				}
			}
			// print_r($property);
			$this->assign('staff', $staff);
			// dump($staff);die;
			$this->display();
		}
		public function myuser(){
			$user = session('user');	
			$id = $user['id'];
			$where['staff_id'] = array('eq', $id);
			$user = M('user')->where($where)->order('timestamp DESC')->select();
			$this->assign('user',$user);
			$this->display();
		}
		public function personal_center(){
			$user = session('user');	
			$id = $user['id'];
			$where['id'] = array('eq', $id);
			$staff = M('staff')->where($where)->find();
			$property_id = json_decode($staff['property_id'] , true);
		
			$staff['property_id'] = $property_id;
			foreach ($staff['property_id'] as $key => $value) {
				$whereStaffId['id'] = array('eq' ,$value);
				$sss = M('property')->where($whereStaffId)->find();
				$staff['property_id'][$key] = $sss;
			}
			$this->assign('staff',$staff);
			// print_r($staff);die;
			$whereId['user_id'] = array('eq', $id);
			$this->follow_up = M('rizhi')->where($whereId)->order('timestamp DESC')->select();
			// dump($this->follow_up);die;
			$this->display();
		}

		public function myshenhe(){
			$this->display();
		}

		public function shenheuser(){
			if(IS_POST){
				$data['id'] = $this->_post('id');
				$data['group'] = $this->_post('group');
				$remarks = $this->_post('remarks');
				// dump($remarks);die;
				$user = session('user');
				$notes = '申请人' . $user['truename'] . '请求将ID为' . $data['id'] . '的会员状态修改为' . $data['group'];
				$result = RealstatusAction::requsestApprove($user['id'], 'user', 'save',$data['id'],$data,$remarks,'修改会员状态' ,$notes);
				if(!$result)
					$this->error('审批提交失败');

				$this->success('审批提交成功',U('My/myuser'));
			}else{
				$id = $this->_get('id');
				$where['id'] = array('eq', $id); 
				$this->userUpdateUser = M('user')->where($where)->find();

				$this->display();
			}
		}

		public function userShenhe(){
			$shenhe = D('status')->relation(true)->order('request_timestamp DESC')->select();
			foreach ($shenhe as $key => $value) {
			
				$shenhe[$key]['type'] = searchDict($value['table'], 'APPROVE_TYPE');
				$shenhe[$key]['data'] = unserialize($value['data']);
			}			
			// dump($shenhe);
			$this->assign('shenhe',$shenhe);
			$this->display();
		}

		public function myshenqingjilu(){
			$user = session('user');	
			$id = $user['id'];
			$where['staff_id'] = array('eq', $id);
			$where['is_approved'] = array('eq','1');
			$this->status = M('status')->where($where)->order('request_timestamp DESC')->select();
			// dump($this->status);die;
			$this->display();
		}

		public function myrealupdate(){
			if(IS_POST){
				$data = $this->_post();
				$data['construction_time'] = strtotime($data['construction_time']);
				// dump($data);die;
				if(M('real')->save($data)){
					$this->success('房源更新成功。',U('My/myreal'));
				}else{
					$this->error('房源更新失败。');
				}
			}else{
				$id = $this->_get('id');
				$where['id'] = array('eq',$id);
				$real = D('real')->relation(true)->where($where)->find();
				$this->assign('real',$real);

				$property = M('property')->select();
				$this->assign('property',$property);

				$staff = D('staff')->relation(true)->select();
				$this->assign('staff',$staff);

				$this->cate = M('real_cate')->select();

				// dump($staff['role']);die;
				$this->display();
			}
			
		}

		public function release_status(){
			$id = $this->_get('id');
			$release_status['release_status'] = $this->_get('release_status');
			$where['id'] = array('eq',$id);
			// dump($release_status);die;
			if(M('real')->where($where)->save($release_status)){
				$this->success('更改成功！');
			}else{
				$this->error('更改失败！');
			}
		}

		public function addReal(){
			if(IS_POST){
				
				$data = $this->_post();

				$latlng = explode(',',$data['poi']); 

				$data['lat'] = $latlng[0];
				$data['lng'] = $latlng[1];

				// dump($count);die;
				$user = session('user');
				$this->user_id = $user['id'];
				$this->truename = $user['truename'];

				$upload = new UploadAction();
            	$result = $upload->upload('image/real/');
            	// dump($data);die;
	            	// if(!$result['status'])
	            	// 	$this->error($result['info']);
            	$data['real_image'] = $result['info'][0]['savename'];
            	$data['timestamp'] = time();
            	$data['uniqid'] = uniqid();
            	$data['construction_time'] = strtotime($data['construction_time']);
            	M('property')->add($data['place_name']);

				if(M('real')->add($data)){
            		RizhiAction::rizhi($this->user_id, 'rizhi', '添加', $this->user_id['id'], $data, '管理员' . $this->user['truename'] . '添加了新的房源');
					$this->success('新房源添加成功。',U('My/myreal'));
				}else{
					$this->error('新房源添加失败。');
				}
			}else{
				$property = M('property')->select();
				$this->assign('property',$property);

				$this->cate = M('real_cate')->select();
				// dump($property);die;

				$this->display();
			}
		}

		public function yizu(){
			if(IS_POST){
				// dump($this->_post());die;
				$data['id'] = $this->_post('id');
				$data['status'] = $this->_post('status');
				$remarks = $this->_post('remarks');
				$user = session('user');
				$notes = '申请人' . $user['truename'] . '请求将ID为' . $data['id'] . '的房源状态修改为' . $data['status'];
				$result = RealstatusAction::requsestApprove($user['id'], 'real', 'save', $data['id'], $data, $remarks, '修改房源状态', $notes);
				if(!$result)
					$this->error('审批提交失败');

				$this->success('审批提交成功');
			}else{
				$id = $this->_get('id');
				$where['id'] = array('eq',$id);
				$real = D('real')->relation(true)->where($where)->find();
				$this->assign('real',$real);

				$property = M('property')->select();
				$this->assign('property',$property);

				$staff = M('staff')->select();
				$this->assign('staff',$staff);

				$this->display();
			}
		}

		public function uploadReal(){
			if(IS_POST){
				$data = $_FILES;
				
				$upload = new UploadAction();
            	$result = $upload->upload('image/real/');

            	if(!$result['status'])
            		$this->error($result['info']);
           		foreach ($result['info'] as $key => $value) {
           			$result['image_url'][] = $value['savename'];
           		}
       			$shuzi = count($result['image_url']);
       			for ($i=0; $i < $shuzi; $i++) { 
       				$arr[$i]['image_url'] = $result['image_url'][$i];
       				$arr[$i]['real_id'] = $this->_post('real_id');
       			}

            	// dump($arr);die;
	            if(M('real_images')->addAll($arr)){
						$this->success('房源图片添加成功。');
					}else{
						$this->error('房源图片添加失败。');
					}
			}else{
				$real_id = $this->_get('id');
				$this->assign('real_id',$real_id);

				$where['real_id'] = $real_id;
				$this->tupian = M('real_images')->where($where)->select();
				// dump($this->tupian);die;
				$this->display();
			}
		}
			public function realdelete(){
			$id = $this->_get('id');
			if(M('real')->delete($id)){
				$this->success('房源删除成功。');
			}else{
				$this->success('房源删除失败。');
			}
		}


			public function updateProperty(){
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

				$this->display();
			}
		}

		public function uploadProperty(){
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

				$where['property_id'] = $property_id;
				$this->tupian = M('property_image')->where($where)->select();
				$this->assign('property_id',$property_id);
				// dump($this->tupian);die;
				$this->display();
			}
		}

		public function deleteProperty(){
			$id = $this->_get('id');
			if(M('property')->delete($id)){
				$this->success('小区删除成功。');
			}else{
				$this->success('小区删除失败。');
			}
		}

		public function addUser(){
			if(IS_POST){
				$data = $this->_post();

				$data['password'] = md5($data['password']);
				$data['passwords'] = md5($data['passwords']);
				if($data['password'] !== $data['passwords'])
					$this->error('密码不一致，请重新输入。');	


				$where['username'] = array('eq',$data['username']);
				$name = M('user')->where($where)->select();
						// dump($name);die;
				if($name)
					$this->error('对不起，用户已存在。');

				$data['timestamp'] = time();
		
				if(M('user')->add($data)){
					$this->success('新用户添加成功。',U('My/myuser'));
				}else{
					$this->error('新用户添加失败。');
				}
			}else{
				$this->display();
			}
		}

		public function deleteUser(){
			$id = $this->_get('id');
			if(M('user')->delete($id)){
				$this->success('用户删除成功。');
			}else{
				$this->error('用户删除失败。');
			}
		}

		public function updateUser(){
			if(IS_POST){
				$data = $this->_post();
				$upload = new UploadAction();
            	$result = $upload->upload('image/real/');
            	
            	$data['top_image'] = $result['info'][0]['savename'];
            	// dump($data);die;
            	$data['password'] = md5($data['password']);
            	if(M('user')->save($data)){
            		$this->success('会员修改成功。');
            	}else{
            		$this->error('会员修改失败。');
            	}

			}else{
				$id =$this->_get('id');
				$where['id'] = array('eq',$id);
				$userUpdate = M('user')->where($where)->find();
				$this->assign('userUpdate',$userUpdate);
				$this->display();
			}
		}


		public function updateStaff(){
			$user = session('user');
			$this->user_id = $user['id'];
			$this->truename = $user['truename'];
			if(IS_POST){
				$data = $this->_post();
				$upload = new UploadAction();
            	$result = $upload->upload('image/real/');
            	// dump($result);die;
            	if($result['status'] == '1'){
            		$data['top_image'] = $result['info'][0]['savename'];
            	}
            	// dump($data);die;
            	RizhiAction::rizhi($this->user_id, 'rizhi', '修改', $data['id'], $data, '管理员' . $this->user['truename'] . '修改了用户ID为' . $data['id'] . '的数据');
            	// dump($data);die;
            	if(M('staff')->save($data)){
            		$this->success('租赁专家修改成功。',U('My/personal_center'));
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


		//审核中心		
		public function approve(){

			$id = $this->_get('id');
			$is_approve = $this->_get('is_approve');
			$user = session('user');
			// dump($is_approve);die;
			$result = RealstatusAction::approveRequested($user['id'], $id, $is_approve);
			if(!$result)
				$this->error('操作失败');
			$this->success('操作成功');
			
		}

		public function promotion(){
			if(IS_POST){
				$data = $this->_post();
				$latlng = explode(',',$data['poi']); 

				$data['lat'] = $latlng[0];
				$data['lng'] = $latlng[1];
				$data['timestamp'] = time();
				$data['construction_time'] = strtotime($data['construction_time']);
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


		public function deleteTupian(){
			$id = $this->_get('id');
			if(M('real_images')->delete($id)){
				$this->success('房源图片删除成功。');
			}else{
				$this->success('房源图片删除失败。');
			}
		}

	} 