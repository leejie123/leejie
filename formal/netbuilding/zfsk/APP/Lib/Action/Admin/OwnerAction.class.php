<?php
	class OwnerAction extends BaseAction{
		public function index(){
			$where['owner'] = array('eq','1');
			$user = M('user')->where($where)->select();
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
					$this->success('新业主添加成功。' ,U('Owner/index'));
				}else{
					$this->error('新业主添加失败。');
				}
			}else{
				$this->display();
			}
		}
	}