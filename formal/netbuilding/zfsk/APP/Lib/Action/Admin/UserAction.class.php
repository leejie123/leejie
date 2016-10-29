<?php
	class UserAction extends BaseAction{
		public function index(){
			$user = M('user')->order('timestamp DESC')->select();
			$this->assign('user',$user);
			// dump($user);die;
			$this->display();
		}

		public function add(){
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
					$this->success('新用户添加成功。',U('User/index'));
				}else{
					$this->error('新用户添加失败。');
				}
			}else{
				$this->display();
			}
		}

		public function delete(){
			$id = $this->_get('id');
			if(M('user')->delete($id)){
				$this->success('用户删除成功。');
			}else{
				$this->error('用户删除失败。');
			}
		}

		public function update(){
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
		public function shenyue(){
			if(IS_POST){
				$data = $this->_post();
				// dump($data);die;
				if(M('user')->save($data)){
					$this->success('审核成功。',U('User/trial'));
				}else{
					$this->error('审核失败。');
				}
			}else{
				$id = $this->_get('id');
				$where['id'] = array('eq',$id);
				$trial = M('user')->where($where)->find();
				$this->assign('trial', $trial);

				$staff = M('staff')->select();
				$this->assign('staff',$staff);
				
				$this->display();
			}
		}


		public function trial(){

			$trial = D('user')->relation(true)->order('timestamp DESC')->select();
			$this->assign('trial', $trial);
			// dump($trial);die;
			$this->display();
		}
		
		public function qiuzu(){
			$where['group'] = array('eq','0');
			$this->display();
		}

		public function vip(){
			$where['group'] = array('eq','2');
			// $vip_user = M('user')->where($where)->select();
			// $this->assign('vip_user',$vip_user);
			// $this->display();

			import('ORG.Util.Page');
			$userDb = M('user');
			$count = $userDb->count();
			$page = new Page($count,10);
			$limit = $page->firstRow . ',' . $page->listRows;
			$vip_user = $userDb->where($where)->limit($limit)->order('timestamp DESC')->select();
			$this->assign('vip_user',$vip_user);
			// dump($vip_user);
			$this->display();
		}

		public function vipactivity(){

			import('ORG.Util.Page');
			$vip_infoDb = D('vip_info');
			$count = $vip_infoDb->count();
			$page = new Page($count,10);
			$limit = $page->firstRow . ',' . $page->listRows;
			$vip_info_list = $vip_infoDb->relation(true)->where($where)->limit($limit)->order('create_time DESC')->select();
			$this->assign('vip_info_list',$vip_info_list);
			
			// dump($vip_info_list);

			$this->display();
		}
		public function vipactivity_detail(){
			$id = I('get.id');
			if(!$id)
				$this->error('非法操作！');
			$where['id'] = array('eq',$id);
			$vip_infoDb = D('vip_info');
			$vipactivity_detail = $vip_infoDb->relation(true)->where($where)->find();
			$this->assign('vipactivity_detail',$vipactivity_detail);
			$this->display();
		}
		public function vipactivity_delete(){
			$id = I('get.id');
			if(!$id)
				$this->error('非法操作！');
			$where['id'] = array('eq',$id);
			$vip_infoDb = M('vip_info');
			$is_success = $vip_infoDb->relation(true)->where($where)->delete();
			if(!$is_success)
				$this->error('删除VIP信息失败！');
			$this->success('删除VIP信息成功！');
		}
		public function vipactivity_save(){
			if(IS_POST){
				$id = I('post.id');
				$title = I('post.title');
				$content = I('post.content');
				$is_recommend = I('post.is_recommend');
				$cate_id = I('post.cate_id');
				if(!$id || !$title || !$content || !$cate_id)
					$this->error('含有未填写内容!');
				$data['id'] = $id;
				$data['title'] = $title;
				$data['content'] = $content;
				$data['is_recommend'] = $is_recommend;
				$data['cate_id'] = $cate_id;
				// dump($data);die;
				$vip_infoDb = M('vip_info');
				$is_success = $vip_infoDb->save($data);
				if(!$is_success)
					$this->error('修改VIP活动信息失败！');
				$this->success('修改VIP活动信息成功！',U('User/vipactivity'));
			}else{
				$id = I('get.id');
				if(!$id)
					$this->error('非法操作！');


				$cateDb = M('cate');
				$cate_list = $cateDb->select();



				$where['id'] = array('eq',$id);
				$vip_infoDb = D('vip_info');
				$vipactivity_detail = $vip_infoDb->relation(true)->where($where)->find();
				$this->assign('vipactivity_detail',$vipactivity_detail);
				$this->assign('cate_list',$cate_list);
				$this->display();
			}
		}

		public function complaint(){
			import('ORG.Util.Page');
			$adviceDb = D('advice');
			$count = $adviceDb->count();
			$page = new Page($count,16);
			$limit = $page->firstRow . ',' . $page->listRows;
			$advice_list = $adviceDb->relation(true)->where($where)->limit($limit)->order('create_time DESC')->select();
			$this->assign('advice_list',$advice_list);
			
			// dump($advice_list);

			$this->display();
		} 

		public function complaint_delete(){
			$id = I('get.id');
			if(!$id)
				$this->error('非法操作！');
			$where['id'] = array('eq',$id);
			$adviceDb = M('advice');
			$is_success = $adviceDb->where($where)->delete();
			if(!$is_success)
				$this->error('删除投诉与建议失败！');
			$this->success('删除投诉与建议成功！');
		}


		public function complaint_detail(){
			$id = I('get.id');
			if(!$id)
				$this->error('非法操作！');
			$where['id'] = array('eq',$id);
			$adviceDb = D('advice');
			$complaint_detail = $adviceDb->relation(true)->where($where)->find();
			$this->assign('complaint_detail',$complaint_detail);
			// dump($complaint_detail);
			$this->display();
		}

		public function addvipactivity(){
			if(IS_POST){
				$data = $this->_post();
				// dump($data);die;
				if(M('vip_info')->add($data)){
					$this->success('添加成功！',U('User/vipactivity'));
				}else{
					$this->error('添加失败！');
				}
			}else{
				$this->user = session('user');
				// dump($this->user);die;
				$this->cate = M('cate')->select();
				$this->display();
			}
		
		}
	}