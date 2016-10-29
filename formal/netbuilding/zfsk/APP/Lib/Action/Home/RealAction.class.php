<?php
	class RealAction extends BaseAction{
		public function detail(){
				
			$this->display();
		}
		
		public function rental(){
			$gaodi = $this->_get('gaodi');
	        $digao = $this->_get('digao');
	        $xinjiu = $this->_get('xinjiu');
	        $jiuxin = $this->_get('jiuxin');

	        if($digao)
	            $order = 'square_price ASC';
	        if($gaodi)
	            $order = 'square_price DESC';
	        if($xinjiu)
	            $order = 'timestamp ASC';
	        if($jiuxin)
	            $order = 'timestamp DESC';

			import('ORG.Util.Page');
			$real = D('real');
			$count = $real->count();
			$page = new Page($count,12);
			$limit = $page->firstRow . ',' . $page->listRows;
			$house = $real->relation(true)->limit($limit)->order('status DESC','recommend DESC',$order)->select();
			foreach ($house as $key => $value) {
				$house[$key]['level'] = count($house)-$key;
			}

			$this->assign('house',$house);
			$this->page = $page->show();

			// $where['group'] = array('eq', '1');
			$where['recommend'] = array('eq','1');
 			$recommend = $real->relation(true)->where($where)->order('rand()')->limit(3)->select();
			$this->assign('recommend',$recommend);
			// print_r($recommend);die;	

			$cate = M('real_cate')->select();
			$this->assign('cate',$cate);
			
			$prams = $this->_get();      
     		$this->assign('prams',$prams);

     		$this->supporting = M('real_supporting')->select();
     		// dump($this->supporting);die;

			$this->display();
		}
		public function real_neiye(){
			$id = $this->_get('id');
			if(!$id)
				$this->error('操作错误。');
			$where['id'] = array('eq',$id);
			$real_neiye = D('real')->relation(true)->where($where)->find();
			$this->assign('real_neiye',$real_neiye);
			// dump($real_neiye);die;
			$whereStaff['id'] = $real_neiye['staff_id']; 

			$staff =  M('staff')->where($whereStaff)->find();
			// dump($staff);die;
			$whereReal['staff_id'] = array('eq', $staff['id']);
			$bbb = M('real')->where($whereReal)->select();
			$staff['real'] = $bbb;
			$property_id = json_decode($staff['property_id'] , true);
			$staff['property_id'] = $property_id;
			foreach ($staff['property_id'] as $key => $value) {
				$whereStaffId['id'] = array('eq' ,$value);
				$sss = M('property')->where($whereStaffId)->find();
				$staff['property_id'][$key] = $sss;
			}
			
			$userStaff = new UserstaffAction();
			$staff = $userStaff->countIndUnitQuantity($staff);
			$this->assign('staff',$staff);
			// dump($staff);die;
			M('real')->where($where)->setInc('clink');

		
			$this->display();
		}

		
		
		public function chazhao(){

			$leixing = $this->_get('leixing');

			$huxing = $this->_get('huxing');

			$zujin = $this->_get('zujin');

			$supporting = $this->_get('supporting');
			// dump($_GET);
			// $peitao = $this->_get('peitao');
			
			if($leixing)
				$where['cate_id'] = array('eq',$leixing);

			if($huxing)
				$where['real_number'] = array('eq', $huxing);

			if($zujin){
				$zujin = explode('-', $zujin);
				$where['price'][] = array('gt', $zujin[0]);
				$where['price'][] = array('lt', $zujin[1]);
			}

			if(!empty($supporting)){
				foreach ($supporting as $key => $value) {
					$where['facilities'][] = array('like', '%' . $value . '%');
				}
			}
			
			import('ORG.Util.Page');
	        $count = M('real')->where($where)->count();
	        $page = new Page($count,9);
	        $limit = $page->firstRow . ',' . $page->listRows;
// dump($where);
			$chazhao = D('real')->relation(true)->limit($limit)->where($where)->order('status DESC',$order)->select();	
			$this->assign('chazhao',$chazhao);
			$this->assign('Page', $page->show());
			// dump($chazhao);die;
			$this->display();
			
		}
		public function search(){
			if(IS_POST)
				$data = $this->_post();
				
				if($data['type'] != 'all' && $data['type'] != '')
					$where['cate_id'] = array('eq', $data['type']);
				
				$where['place_name'] = array('like','%'.$data['name'].'%');
				// dump($where);die;
				$real = D('real')->relation(true)->where($where)->order('status DESC','recommend DESC')->select();
				// print_r($real);die;
				$this->assign('real', $real);
				// dump($real);die;
				$this->display();
			
		}


		public function district_zhujiang(){
			$gaodi = $this->_get('gaodi');
	        $digao = $this->_get('digao');
	        $xinjiu = $this->_get('xinjiu');
	        $jiuxin = $this->_get('jiuxin');

	        if($digao)
	            $order = 'square_price ASC';
	        if($gaodi)
	            $order = 'square_price DESC';
	        if($xinjiu)
	            $order = 'timestamp ASC';
	        if($jiuxin)
	            $order = 'timestamp DESC';

			import('ORG.Util.Page');
			$count = M('property')->count();
			$page = new Page($count,9);
			$limit = $page->firstRow . ',' . $page->listRows;

			$property = D('property')->relation(true)->limit($limit)->order('recommend DESC', $order)->select();
			foreach ($house as $key => $value) {
				$house[$key]['level'] = count($house)-$key;
			}
			$this->assign('property',$property);
			$this->page = $page->show();
			// dump($property);die;
			$cate = M('real_cate')->select();
			$this->assign('cate',$cate);

			$prams = $this->_get();      
     		$this->assign('prams',$prams);

     		$this->supporting = M('real_supporting')->select();

			$this->display();
		}

		public function xiaoquneiye(){
		
				$id = $this->_get('id');
				$where['id'] = array('eq',$id);
				$xiaoqu = D('property')->relation(true)->where($where)->limit(6)->find();
				$staff = M('staff')->select();
				foreach ($staff as $key => $value) {
					$property_id = json_decode($value['property_id'] ,true);
					$staff[$key]['property_id'] = $property_id;
					$count = count($property_id);
					$staff[$key]['has_xiaoqu'] = in_array($xiaoqu['id'],$staff[$key]['property_id']);
					// dump($value);die;
					$whereReal['staff_id'] = array('eq', $value['id']);
					$realfang = M('real')->where($whereReal)->select();
					$staff[$key]['real'] = $realfang;
					

					foreach ($staff[$key]['property_id'] as $k => $v) {
						$where['id'] = array('eq' , $v);
						$aaa = M('property')->where($where)->find();
						$staff[$key]['property_id'][$k] = $aaa;	
				
					}

				}
				$userStaff = new UserstaffAction();
				$staff = $userStaff->countUnitQuantity($staff);
				$this->assign('xiaoqu',$xiaoqu);
				$this->assign('staff',$staff);
				// dump($staff);die;
				$tiaojian['property_id'] = $xiaoqu['id'];
					
				
				$tupian = M('property_image')->where($tiaojian)->limit(6)->select();
				// dump($tupian);die;
				$this->assign('tupian',$tupian);

				$user = $this->currentUser;
				$where['user_id'] = array('eq',$user['id']);
				$userId = M('user')->where($where)->find();
				$this->assign('userId',$userId);
				
				$whereId['property_id'] = array('eq',$xiaoqu['id']);
				$real = D('real')->relation(true)->where($whereId)->order('status DESC')->select();
				$this->assign('real', $real);

				$whereId['recommend'] = array('eq','1');

				$whereId['status'] = array('eq','2');
				$realsuiji = D('real')->relation(true)->where($whereId)->order('rand()')->limit(4)->select();
				// print_r($realsuiji);die;
				$this->assign('realsuiji',$realsuiji);

				$cate = M('real_cate')->select();
				$this->assign('cate',$cate);

				$this->supporting = M('real_supporting')->select();
				$this->display();
					
		}

	
	}