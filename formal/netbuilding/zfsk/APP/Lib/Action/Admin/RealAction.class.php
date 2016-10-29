<?php
	class RealAction extends BaseAction{
		public function index(){
	
			$real = D('real')->relation(true)->order('timestamp DESC')->select();
			$this->assign('real',$real);
			// dump($real);die;
			$this->display();
		}
		public function add(){
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
					$this->success('新房源添加成功。',U('Real/index'));
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
		public function update(){
			if(IS_POST){
				$data = $this->_post();
				$latlng = explode(',',$data['poi']); 

				$data['lat'] = $latlng[0];
				$data['lng'] = $latlng[1];
				$data['construction_time'] = strtotime($data['construction_time']);
				// dump($data);die;
				if(M('real')->save($data)){
					$this->success('房源更新成功。',U('Real/index'));
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
		public function delete(){
			$id = $this->_get('id');
			if(M('real')->delete($id)){
				$this->success('房源删除成功。');
			}else{
				$this->success('房源删除失败。');
			}
		}

		
		public function trial(){
			
			$where['status'] = array('eq', '0');
			$real = M('real_upload')->where($where)->order('timestamp DESC')->select();
			$this->assign('real',$real);

			// dump($real);die;
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

		public function shenhe(){
			$id = $this->_get('id');
			$where['id'] = array('eq', $id);
			$real = D('real_upload')->where($where)->find();


			$this->assign('real',$real);
			// print_r($real);die;

			$staff = M('staff')->select();
			$this->assign('staff',$staff);
			
	// dump($staff);die;
			$this->display();
		}

		public function tongguo(){
			$data = $this->_post();
			$id = $this->_get('id');
			// dump($id);die;
			if(M('real')->add($data)){
				M('real_upload')->delete($id);
				$this->success('房源审阅通过。',U('Real/index'));
			}else{
				$this->error('房源审阅失败。');
			}
		}

		public function myshenhe(){
			$shenhe = D('status')->relation(true)->select();
			foreach ($shenhe as $key => $value) {
			
				$shenhe[$key]['data'] = unserialize($value['data']);
				$shenhe[$key]['remarks'] = unserialize($value['remarks']);
			}			
			$this->assign('shenhe',$shenhe);
			// dump($shenhe);die;
			$this->display();
		}


		

		public function recommend(){
			$data = $this->_get();
			// dump($data);die;
			if(M('real')->save($data)){
				$this->success('操作成功！');
			}else{
				$this->error('操作失败！');
			}
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