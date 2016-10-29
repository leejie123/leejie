<?php
	class UploadRoomAction extends Action{
		public function index(){
			if(IS_POST){
				$data = $this->_post();

				$data['timestamp'] = time();
				$data['uniqid'] = uniqid();	
				// dump($data);die;
				
				if(!$data['name'])
					$this->error('联系人不能为空。');
				
				if(!$data['phone'])
					$this->error('联系方式不能为空。');

		
				if(M('real_upload')->add($data)){
					$this->success('房源上传成功。');
				}else{
					$this->error('房源上传失败。');
				}
			}else{	
				$this->display();
			}
		}
	}