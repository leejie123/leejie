<?php
	class RizhiAction extends BaseAction{
		public function rizhi($id,$model,$caozuo,$staff_id,$zhi,$content){
			$data['user_id'] = $id;
			
			$data['caozuo'] = $caozuo;
			$data['staff_id'] = $staff_id;
			$data['content'] = $content;
			// dump($data);die;
			$data['timestamp'] = time();
			$is_success = $rizhiDb = M("{$model}")->add($data);

			 if(!$is_success)
			 	$this->error('日志事件出错。');
			 return true;
		}
	}