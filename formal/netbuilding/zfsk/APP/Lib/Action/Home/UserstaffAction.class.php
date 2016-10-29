<?php
	class UserstaffAction extends BaseAction{
		public function index(){
			//租赁专家
			$role[] = '3';
			$role[] = '9';
			$where['role_id'] = array('IN' , $role);
			import('ORG.Util.Page');
	        $count = M('role_user')->where($where)->count();
	        $page = new Page($count,9);
	        $limit = $page->firstRow . ',' . $page->listRows;

			$staff = D('role_user')->relation(true)->where($where)->limit($limit)->select();
			foreach ($staff as $key => $value) {
				$property_id = json_decode($value['staff']['0']['property_id'] , true);
				$staff[$key]['property_id'] = $property_id;

				$whereReal['staff_id'] = array('eq', $value['user_id']);
				$bbb = M('real')->where($whereReal)->select();
				$staff[$key]['real'] = $bbb;

				foreach ($staff[$key]['property_id'] as $k => $v) {
					$where['id'] = array('eq' , $v);
					$aaa = M('property')->where($where)->find();
					$staff[$key]['property_id'][$k] = $aaa;
				}

			
			}
		
			$userStaff = new UserstaffAction();
			$staff = $this->countUnitQuantity($staff);
			$this->assign('staff',$staff);
			$this->assign('Page', $page->show());
			// print_r($staff);die;
			// 推荐房源
			$real = D('real');
			$recommend = $real->relation(true)->limit(6)->select();
			$this->assign('recommend',$recommend);
			// dump($recommend);die;
			// 人气房源
			$popularity = $real->relation(true)->order('clink DESC')->limit(3)->select();
			$this->assign('popularity',$popularity);

		
			$this->display();
		}


		public function countUnitQuantity($userStaff){
// dump($userStaff);
			foreach ($userStaff as $key => $value) {
				// dump($value);die;
				$userStaff[$key]['unitQuantity'] = count($value['real']);
			}
			// dump($userStaff);die;
			return $userStaff;
		}

		public function countIndUnitQuantity($staff){

			$staff['unitQuantity'] = count($staff['real']);

			return $staff;
		}

		public function staffLookup(){
			if(IS_POST){
				$truename = $this->_post('truename');
				$where['truename'] = array('like','%'.$truename.'%');
				// dump($where);die;
				$zulin =D('staff')->where($where)->find();
				if(!$zulin)
					$this->error('对不起！没有搜索到合适的租赁专家。');
	// dump(U('Userstaff/detail', array('id' => $data['id'])));die;
				redirect(U('Userstaff/detail', array('id' => $zulin['id'])));
			}else{
				$this->display();
			}
		}

		public function detail(){
			
			$id = $this->_get('id');

			$whereId['staff_id'] = array('eq', $id);
			import('ORG.Util.Page');
	    	$count = M('real')->where($whereId)->count();
	    	$page = new Page($count,6);
	    	$limit = $page->firstRow . ',' . $page->listRows;
				    	
	    	$real = D('real')->relation(true)->where($whereId)->limit($limit)->select();
			// dump($real);die;
	    	foreach ($real as $key => $value) {
	    		$real[$key]['level'] = count($real)-$key;
	    	}
			$this->assign('real',$real);
			// dump($real);die;
			
			$this->page = $page->show();

			if(!$id)
				$this->error('操作错误。');
			$where['id'] = array('eq',$id);
			$staffDetail = D('real')->relation(true)->where($where)->find();

			// dump($staffDetail);die;

			// $whereStaff['id'] = $staffDetail['staff_id']; 
			$staff =  M('staff')->where($where)->find();
			
			$property_id = json_decode($staff['property_id'] , true);
		
			$staff['property_id'] = $property_id;
			foreach ($staff['property_id'] as $key => $value) {
				$whereStaffId['id'] = array('eq' ,$value);
				$sss = M('property')->where($whereStaffId)->find();
				$staff['property_id'][$key] = $sss;

			}
			$whereReal['staff_id'] = array('eq', $staff['id']);
			$bbb = M('real')->where($whereReal)->select();
			$staff['real'] = $bbb;

			// dump($staff);die;
			$userStaff = new UserstaffAction();
			$staff = $userStaff->countIndUnitQuantity($staff);
			$this->assign('staffDetail',$staff);
			// dump($staff);die;

		
			$comment = D('business')->relation(true)->where($whereId)->order('timestamp DESC')->limit(3)->select();
			$this->assign('comment',$comment);

			$user = $this->currentUser;
			$whereI['staff_id'] = array('eq',$id);
			$whereI['user_id'] = array('eq', $user['id']);
			$whereI['comment'] = array('eq', '');
			$commentId = M('business')->where($whereI)->find();

			$this->assign('commentId' ,$commentId);

			if($user && $commentId)
				$commentPro = true;
			
			$this->assign('CommentPro', $commentPro);
			$this->display();
		}
		
	

		public function comment(){
			if(IS_POST){
				$user = $this->currentUser;
				$real_id = $this->_get('real_id');
				$where['real_id'] = array('eq', $real_id);
				$data = $this->_post();
				$data['timestamp'] = time();
				$where['user_id'] = $user['id'];
				// dump($where);die;
				if(M('business')->where($where)->save($data)){
					$this->success('用户评论成功。');
				}else{
					$this->error('用户评论失败。');
				}
			}
		
		}
		public function advice(){
			if(IS_POST){
				$cid = I('post.cid');
				$user = session('user');
				$user_id = $user['id'];
				$user_phone = $user['phone'];
				$content = I('post.content');
				if(!$cid || !$user_id)
					$this->error('非法操作！');
				if(!$content)
					$this->error('投诉内容不得为空！');
				$data['cid'] = $cid;
				$data['uid'] = $user_id;
				$data['content'] = $content;
				$data['create_time'] = time();
				$data['phone'] = $user_phone;
				// dump($data);die;
				$is_success = M('advice')->add($data);
				if(!$is_success)
					$this->error('投诉失败！');
				$this->success('投诉成功！');
			}else{
				$this->error('非法操作！');
			}
		}

	}