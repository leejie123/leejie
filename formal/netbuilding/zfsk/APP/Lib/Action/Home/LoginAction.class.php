<?php
	class LoginAction extends BaseAction{
		public function login(){
			if(IS_POST){
				$data = $this->_post();
				$where['username'] = array('eq',$data['username']);
				$user =M('user')->where($where)->find();
				// dump($user['username']);die;
				if($data['username'] != $user['username'])
					$this->error('用户名不存在。');	
				
				$data['password'] = md5($data['password']);
				if($data['password'] != $user['password'])
					$this->error('密码错误。');

				

				if(M('user')->select($data)){
					unset($user['password']);
					session('user',$user);
					// dump($user);die;
					$this->success('用户登陆成功。',U('User/member'));
				}else{
					$this->error('用户登录失败。');
				}
			}else{

				$this->display();
			}
		}
		public function zhuce(){
			if(IS_POST){
				$data = $this->_post();

				if(!$data['username'])
					$this->error('用户名不能为空。');

				if(!$data['password'])
					$this->error('密码不能为空。');

				if(!$data['passwords'])
					$this->error('确认密码不能为空。');

				if(!$data['phone'])
					$this->error('手机号码不能为空。');

				$data['password'] = md5($data['password']);
				$data['passwords'] = md5($data['passwords']);
				if($data['password'] != $data['passwords'])
					$this->error('密码不一致，请重新输入。');	
				$where['username'] = array('eq',$data['username']);
				$name = M('user')->where($where)->select();
				if($name)
					$this->error('对不起，用户已存在。');
				// dump($data);die;
				
				$data['timestamp'] = time();

				// dump($data);die;
				if(M('user')->add($data)){
					$this->success('恭喜你，注册成功。',U('User/login'));
				}else{
					$this->error('对不起，注册失败。');
				}
			}else{
				$this->display();
			}
			
		}

		public function logout(){

			if(session('user') == null)
				$this->error('你还没有登陆', U('Login/login'));	//判断session中有没有用户

			session('user', null);
			$this->success('你已成功登出', U('Index/index'));	//释放session里面的用户。实现退出
			
		}
	}