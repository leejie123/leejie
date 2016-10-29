<?php
	class BaseAction extends Action{
		public function _initialize(){
			// print_r($_SESSION);die;
			$user = session('user');
			// dump($user);
			if(!$user){
				$this->error('请登录再继续。',U('Login/index'));
			}


			if(session(C('ADMIN_AUTH_KEY'))){
				$node = D('node')->relation(true)->where('level=2')->order('sort')->select();
				// dump($node);
			}else{
				$node = D('node')->relation(true)->where('level=2')->order('sort')->select();
				$module='';
				$node_id='';
				$accessList=$_SESSION['_ACCESS_LIST'];
				// print_r($node);
				foreach ($accessList as $key => $value) {
					foreach ($value as $key1 => $value1) {
						$module=$module.','.$key1;
						foreach ($value1 as $key2 => $value2) {
							$node_id = $node_id.','.$value2;
						}
					}
				}

				foreach ($node as $key => $value) {
					// dump($value['name']);
					if(!in_array(strtoupper($value['name']), explode(',', $module))){
						unset($node[$key]);
					}else{

					}
				}

				foreach ($value['node'] as $key1 => $value1) {
					if(!in_array($value1['id'], explode(',', $node_id))){
						unset($node[$key]['node'][$key1]);
					}
				}
			}

			// dump($_SESSION);die;
			$this->assign('node',$node);




			$notAuth =in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE')))||in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION'))); 
			if(C('USER_AUTH_ON')&&!$notAuth){
				// $this->error('');
				import('ORG.Util.RBAC');
				if(!RBAC::AccessDecision('Admin')){
					$this->error('没有权限。',U('Index/index'));
				}
			}
			
				// dump($_SESSION);die;
			$where['id'] = array('eq',$user['id']);
			$this->staffUser = D('staff')->relation(true)->where($where)->find();
		}		
	}