<?php
	class RbacAction extends BaseAction{
		public function addRole(){
			$this->display();
		}

		//添加角色表单处理
		public function addRbacHandle(){
			if(M('role')->add($_POST)){
				$this->success('添加成功！',U('Rbac/addRole'));
			}
		}

		//角色管理（角色列表）
		public function roleList(){
			$this->role = M('role')->select();
			$this->display();
		}

		//添加权限
		public function addNode(){
			$this->userNode = M('node')->where('level!=4')->order('sort')->select();
			// dump($this->node);
			$this->display();
		}

		//添加节点表单处理
		public function addNodeHandle(){
			$node = M('node');
			$node->create();
			if($node->add()){
				$this->success('添加成功！',U('Rbac/nodeList'));
			}
		}

		//权限管理(权限列表)
		public function nodeList(){
			import('ORG.Util.Tree');
			$node = M('node')->order('sort')->select();
			$this->nodelist = Tree::create($node);
			// dump($this->node);
			$this->display();
		}

		//删除权限
		public function deletenode(){
			$id = $this->_get('id');
			// dump($id);
			$where['id'] = array('eq',$id);
			if(M('node')->where($where)->delete()){
				$this->success('删除成功！',U('Rbac/nodeList'));
			}
		}

		//添加用户
		public function addUser(){
			$this->role = M('role')->select();
			$this->display();
		}

		//添加用户处理
		public function addUserHandle(){
			$data = $this->_post();
			$where['username'] = array('eq',$data['username']);
			$staff = M('staff')->where($where)->find();
			// dump($staff);die;
			if($data['username'] == $staff['username'])
				$this->error('用户名已存在。');	

			$upload = new UploadAction();
        	$result = $upload->upload('image/staff/');

			$data['username'] = $this->_post('username');
			$data['password'] = md5($this->_post('password'));
			$data['logintime'] = time();
			$data['loginip'] = get_client_ip();
			$data['status'] = 1;
			$uid = M('staff')->add($data);
			// dump($uid);die;
			if($uid){
				//用户添加成功后添加用户角色表
				$role['role_id'] = $this->_post('role_id');
				$role['user_id'] = $uid;
				M('role_user')->add($role);
				$this->success('添加成功！',U('Rbac/addUser'));
			}else{
				$this->error('添加失败！');
			}
		}

		public function saveUserHandle(){
			if(IS_POST){
				$data = $this->_post();
				$where['user_id'] =array('eq',$data['user_id']);
				$modify = M('role_user')->where($where)->select();
				// dump($modify);die;
				if(!$modify){
					M('role_user')->add($data);
					$this->success('修改成功！',U('Rbac/userList'));
				}elseif($modify){
					M('role_user')->save($data);
					$this->success('修改成功！',U('Rbac/userList'));
				}else{
					$this->error('修改失败！');
				}
			}else{
				$this->id = $this->_get('id');
				$this->role = M('role')->select();
				$this->display();
			}

		}

		public function deleteuser(){
			$id = $this->_get('id');
			// dump($id);
			$where['id'] = array('eq',$id);
			$whereId['user_id'] = array('eq',$id);
			if(M('staff')->where($where)->delete()){
				$this->success('删除成功！',U('Rbac/userList'));
				M('role_user')->where($whereId)->delete();
			}
		}


		//用户列表
		public function userList(){
			$this->user = D('staff')->field('password',true)->relation(true)->select();
			// dump($this->user);
			$this->display();
		}

		public function access(){

			import('ORG.Util.Tree');
			$rid = $this->_get('rid');
			$node = M('node')->order('sort')->select();
			$node = Tree::create($node);

			$data = array();  //$data用于存放最新数组，里面包含当前用户组是否有每一个权限
		
			$access = M('access');

			foreach ($node as $value){
				$where['role_id'] = array('eq',$rid);
				$where['node_id'] = array('eq',$value['id']);

				$count = $access->where($where)->count();
				// dump($count);
				if($count){
					$value['access'] = 1;
				}else{
					$value['access'] = 0;
				}
				$data[] = $value;
			}
			$this->nodelist = $data;
			$this->rid = $rid;
			// dump($this->nodelist);
			$this->name = M('role')->getFieldById($rid,'name');

			$this->display();
		}

		//添加角色权限表
		public function setAccess(){
			$rid=$this->_post('rid');
			// dump($rid);die;
			$where['role_id'] = array('eq',$rid);
			$access = M('access');  
			$access->where($where)->delete();//清空当前角色的所有权限

			if(isset($_POST['access'])){
				
				$data = array();
				foreach ($_POST['access'] as $value) {
					$tmp = explode('_', $value);
					// dump($tmp);die;
					$data[] = array(
						'role_id' =>$rid,
						'node_id' =>$tmp[0],
						'level' =>$tmp[1],
					);
				}
				// dump($data);die;
				if($access->addAll($data)){
					$this->success('修改成功！',U('Rbac/roleList'));
				}else{
					$this->error('修改失败！');
				}
			}else{
				$this->error('清空成功！');
			}
		}

		public function updatejuese(){
			$id = $this->_get('id');
			if(M('role')->delete($id)){
				$this->success('删除成功！',U('Rbac/roleList'));
			}else{
				$this->error('删除失败！');
			}
		}

		public function updateStaff(){
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
	}