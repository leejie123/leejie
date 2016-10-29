<?php
	class UserAction extends UserBaseAction{
		
		public function member(){
			if(IS_POST){
				$data = $this->_post();
				
				if(M('user')->save($data)){
					$this->success('求租要求信息发布成功。');
				}else{
					$this->error('求租要求信息发布失败。');
				}
			}else{
				$user = $this->currentUser;
				$where['id'] = array('eq',$user['id']);
				$real =D('user')->relation(true)->where($where)->find();

				$wherea['user_id'] = array('eq' , $real['id']);
				// dump($real);die;
				$is_real = D('intention')->relation(true)->where($wherea)->select();
				
				foreach ($is_real as $k => $v) {
					$whereReal['real_id'] = array('eq' , $v['real_id']);
					$real = M('real_images')->where($whereReal)->limit(1)->getField('image_url');
					$is_real[$k]['image'] = $real;
				}
				$this->assign('real',$is_real);
					// print_r($is_real);die;

				$this->display();
			}
		}

		public function tenant(){
			if(IS_POST){
				$data = $this->_post();
				$data['timestamp'] = time();
				// dump($data);die;
				if(M('tenant')->add($data)){
					$this->success('推荐租客成功。');
				}else{
					$this->error('推荐租客失败。');
				}
			}
		}

		public function hy_fuwu(){
			$user = $this->currentUser;
			// dump($user);die;
			$where['id']= array('eq',$user['id']);
			$users = D('user')->relation(true)->where($where)->find();
			// print_r($users['id']);die;
			$wherea['user_id'] = array('eq' , $users['id']);
			$is_real = D('intention')->relation(true)->where($wherea)->select();
			
			foreach ($is_real as $k => $v) {
				$whereReal['real_id'] = array('eq' , $v['real_id']);
				$real = M('real_images')->where($whereReal)->limit(1)->getField('image_url');
				$is_real[$k]['image'] = $real;
			}
			// $users['aaa'] = $is_a;
			$this->assign('users',$users);
			$this->assign('real',$is_real);
			// print_r($is_real);die;
			
			$whereId['user_id']= array('eq',$user['id']);
			$staffDetail = D('real')->relation(true)->where($whereId)->find();
			$this->assign('staffDetail',$staffDetail);
				// dump($staffDetail);die;
			
		
			$whereStaff['id'] = $user['staff_id']; 
			// dump($whereStaff);die;
			$staff =  M('staff')->where($whereStaff)->find();
		
			$property_id = json_decode($staff['property_id'] , true);
			$staff['property_id'] = $property_id;
			foreach ($staff['property_id'] as $key => $value) {
				$whereStaffId['id'] = array('eq' ,$value);
				$sss = M('property')->where($whereStaffId)->find();
				$staff['property_id'][$key] = $sss;
			}
			// print_r($staff);die;

			$userStaff = new UserstaffAction();
			$staff = $userStaff->countIndUnitQuantity($staff);
			$this->assign('staff',$staff);

		// print_r($real);die;
			$this->display();
		}

		public function hyny_zuke(){
			$this->display();
		}

		public function hy_wdzl(){
			if(IS_POST){
				$user = $this->currentUser;
				$where['id'] = array('eq',$user['id']);
				$data['group'] = $this->_post('group');
				$data['name'] = $this->_post('name');
				$data['sex'] = $this->_post('sex');
				$data['identification_card_num'] = $this->_post('identification_card_num');
				$data['other_identification'] = $this->_post('other_identification');
				$data['address'] = $this->_post('address');
				$data['operation_post'] = $this->_post('operation_post');
				$data['fixed_telephone'] = $this->_post('fixed_telephone');
				$data['state'] = $this->_post('state');

				$upload = new UploadAction();
            	$result = $upload->upload('image/user/');

            	if(!$result['status'])
            		$this->error($result['info']);

            	$data['identification_image_positive'] = $result['info'][0]['savename'];
            	$data['identification_image_back'] = $result['info'][1]['savename'];

            	
            	// dump($data);die;

				if(M('user')->where($where)->save($data)){
			
					$this->success('升级成功，请耐心等待通过。');
				}else{
					$this->error('升级失败，请确认信息完整。');
				}

			}else{
				$this->display();
			}
		}
		public function entrust(){
			$user = $this->currentUser;
			$data['staff_id'] = $this->_get('staff_id');
			$data['id'] = $user['id'];
			// dump($data);die;
			
			if(M('user')->save($data)){
				$this->success('委托成功。');
				
			}else{
				$this->error('委托失败。');
			}
		}

		public function intention(){
			$user = $this->currentUser;
			$data['property_id'] = $this->_get('property_id');
			$data['user_id'] = $user['id'];

			$where['user_id'] = array('eq',$data['user_id']);
			$where['property_id'] = array('eq', $data['property_id']);
			$intention = M('intention')->where($where)->select();
			if($intention)
				$this->error('对不起，您已经收藏楼盘！');
			
			// dump($data);die;
			
			if(M('intention')->add($data)){
				$this->success('楼盘收藏成功。');
			}else{
				$this->error('楼盘收藏失败。');
			}
		}	

		public function hy_VIP(){
			
			$cate_id = I('get.cate_id');
			$search = I('get.search');
			if($cate_id)
				$where['cate_id'] = array('eq',$cate_id);
			if($search)
				$where['title|content'] = array('like',"%{$search}%");



			$cateDb = M('cate');
			$cate_list = $cateDb->limit(6)->select();




			import('ORG.Util.Page');
			$vip_infoDb = D('vip_info');
			$count = $vip_infoDb->count();
			$page = new Page($count,7);
			$limit = $page->firstRow . ',' . $page->listRows;
			$vip_info_list = $vip_infoDb->relation(true)->where($where)->limit($limit)->select();

			
			foreach ($vip_info_list as $key => $value) {
				$image = json_decode($value['image'],true);
				$vip_info_list[$key]['photo'] = $image;
			}


			$this->assign('vip_info_list',$vip_info_list);

			// dump($vip_info_list);





			$this->assign('cate_list',$cate_list);
			$this->display();
		}

		public function vipactivity_add(){
			if(IS_POST){
				$title = I('post.title');
				$content = $this->_POST('content',false); 
				$cate_id = I('post.cate_id');

				// var_dump($content);die;
				if(!$title)
					$this->error('标题不能为空！');				
				if(!$content)
					$this->error('内容不能为空！');


            	$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
	            preg_match_all($pattern,$content,$photos);			//$photos   //就是抽取出来的数组;			
	            $image = json_encode($photos['1']);

	            $user = session('user');
	            $user_id = $user['id'];
	            
	            $data['title'] = $title;
	            $data['content'] = $content;
	            $data['image'] = $image;
	            $data['uid'] = $user_id;
	            $data['cate_id'] = $cate_id;
	            $data['create_time'] = time();

	            $is_success = M('vip_info')->add($data);
	            if(!$is_success)
	            	$this->error('发表失败！');
	            $this->success('发表成功!');


				// dump($photos['1']);die;



			}else{
				$this->error('非法操作！');
			}
		}

	}