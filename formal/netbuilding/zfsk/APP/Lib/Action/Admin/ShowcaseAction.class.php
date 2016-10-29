<?php
	class ShowcaseAction extends BaseAction{
		public function index(){
			$showcase = M('showcase')->select();
			$this->assign('showcase',$showcase);
		 	$this->display();
		}
		public function add(){
			if(IS_POST){
				$data = $this->_post();
				$upload = new UploadAction();
	        	$result = $upload->upload('image/showcase/');
	        	
            	if(!$result['status'])
            		$this->error($result['info']);

	        	$data['image'] = $result['info'][0]['savename'];
	        	// dump($data);die;
	        	if(M('showcase')->add($data)){
	        		$this->success('友情商家添加成功。',U('Showcase/index'));
	        	}else{
	        		$this->error('友情商家添加失败。');
	        	}
        	}else{
        		$this->display();
        	}
		}

		public function update(){
			if(IS_POST){
				$data = $this->_post();
				$upload = new UploadAction();
	        	$result = $upload->upload('image/showcase/');
	        	
            	if(!$result['status'])
            		$this->error($result['info']);

	        	$data['image'] = $result['info'][0]['savename'];
	        	$where['id'] = array('eq', $data['id']);
	        	// dump($data);die;
	        	if(M('showcase')->where($where)->save($data)){
	        		$this->success('友情商家修改成功。',U('Showcase/index'));
	        	}else{
	        		$this->error('友情商家修改失败。');
	        	}
        	}else{
				$id = $this->_get('id');
				$where['id'] = array('eq', $id);
				$showcase = M('showcase')->where($where)->find();
				$this->assign('showcase',$showcase);
				// dump($showcase);die;
				$this->display();
			}
		}

		public function delete(){
			$id = $this->_get('id');
			if(M('showcase')->delete($id)){
				$this->success('房源删除成功。');
			}else{
				$this->success('房源删除失败。');
			}
		}
	}