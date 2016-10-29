<?php
	class BaseAction extends Action{

		public $currentUser;
		public function _initialize(){
			$this->currentUser =session('user');
			$this->assign('user', $this->currentUser);


			$footer2 = M('showcase')->select();
			$this->assign('footer2',$footer2);
			// dump($footer2);die;

			
		}
	}