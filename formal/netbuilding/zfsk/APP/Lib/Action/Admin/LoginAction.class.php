<?php
	class LoginAction extends Action{
		public function index(){
			if(IS_POST){
				$data = $this->_post();
				$where['username'] = array('eq',$data['username']);
				$user =M('staff')->where($where)->find();
				// dump($where);die;
				if($data['username'] != $user['username'])
					$this->error('用户名不存在。');	
				
				$data['password'] = md5($data['password']);
				if($data['password'] != $user['password'])
					$this->error('密码错误。');
				
				$arr = M('staff')->where($where)->find($data);
					
				if($arr){
					unset($user['password']);
					session('user',$user);
					session(C('USER_AUTH_KEY'),$arr['id']);
				// dump($_SESSION);die;
					// dump($arr['id']);die;
					if($user['username']==C('RBAC_SUPERADMIN')){
						session(C('ADMIN_AUTH_KEY'),true);
					}
					import('ORG.Util.RBAC');
					RBAC::saveAccessList();
					// dump($_SESSION);die;
				$whereId['id'] = array('eq', $user['id']);
				$time['logintime'] = time();
				$time['loginip'] = get_client_ip();
				M('staff')->where($whereId)->save($time);
				// dump($time);die;
					$this->success('用户登陆成功。',U('Index/index'));
				}else{
					$this->error('用户登录失败。');
				}
			
			}else{
				$this->display();
			}
		}
	
		public function logout(){

			if(session('user') == null)
				$this->error('你还没有登陆', U('Login/index'));	//判断session中有没有用户

			session('user', null);
			session(C('USER_AUTH_KEY'), null);
			session(C('ADMIN_AUTH_KEY'), null);
			session(_ACCESS_LIST, null);
			$this->success('你已成功登出', U('Index/index'));	//释放session里面的用户。实现退出
			
		}

		public function updatePassword(){
			if(IS_POST){
				$data = $this->_post();
				// dump($data);die;
				if(!$data['password'])
						$this->error('新密码不能为空。');

				if(!$data['passwords'])
					$this->error('确认密码不能为空。');

				$data['password'] = md5($data['password']);
				$data['passwords'] = md5($data['passwords']);
				if($data['password'] != $data['passwords'])
					$this->error('密码不一致，请重新输入。');
				// dump($data);die;
				if(M('staff')->save($data)){
					session('user', null);
					session(C('USER_AUTH_KEY'), null);
					session(C('ADMIN_AUTH_KEY'), null);
					session(_ACCESS_LIST, null);
					$this->success('修改密码成功，请重新登录！', U('Login/index'));
				}else{
					$this->error('修改密码失败！');
				}		
			}else{
				$this->user = session('user');
				$this->display();
			}			
		}
	}
		
	