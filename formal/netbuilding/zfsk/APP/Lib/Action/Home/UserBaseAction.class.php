<?php
	class UserBaseAction extends BaseAction{
		public function _initialize(){
			// dump($user);die;
			parent::_initialize();
			if(!$this->currentUser)
				$this->redirect('Login/login');
		}
	}