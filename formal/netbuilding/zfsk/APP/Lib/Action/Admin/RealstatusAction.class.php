<?php
	class RealstatusAction extends BaseAction{
		public function requsestApprove($user_id, $table, $action, $key, $data, $remarks, $request, $notes){

			$saveData['request_user_id'] = $user_id;
			$saveData['request_timestamp'] = time();
			$saveData['action'] = $action;
			$saveData['key'] = $key;
			$saveData['notes'] = $notes;
			$saveData['request'] = $request;
			$saveData['table'] = $table;
			$saveData['data'] = serialize($data);
			$saveData['remarks'] = $remarks;
			// dump($saveData);die;
			$result = M('status')->add($saveData);

			if(!$result)
				return false;

			return true;

		}

		public function approveRequested($user_id,$request_id,$approve){
			if($approve){

				$where['id'] = array('eq',$request_id );
				$request = M('status')->where($where)->find();
				$table = $request['table'];
				$action = $request['action'];
				$data = unserialize($request['data']);
				// dump($data);
				// dump($request);die;
				
				$result = M($table)->$action($data);
				// echo M()->getlastsql();die;
				// dump($result);die;
				if(!$result)
					return false;

				$saveData['id'] = $request_id;
				$saveData['is_approved'] = '1';
				$saveData['approve_timestamp'] = time();
				$saveData['approve_user_id'] = $user_id;
				
				$saveResult = M('status')->save($saveData);

				if(!$saveResult)
					return fasle;

				return true;

			}else{

				$saveData['id'] = $request_id;
				$saveData['is_approved'] = '-1';
				$saveData['approve_timestamp'] = time();
				$saveData['approve_user_id'] = $user_id;

				$saveResult = M('status')->save($saveData);

				if(!$saveResult)
					return fasle;

				return true;
				
			}
		}
	}