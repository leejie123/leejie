<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends BaseAction {
    public function index(){
        $gaodi = $this->_get('gaodi');
        $digao = $this->_get('digao');
        $xinjiu = $this->_get('xinjiu');
        $jiuxin = $this->_get('jiuxin');
        // dump($gaodi);die;
        $order = 'status DESC';
        if($digao)
            $order = 'status DESC,price ASC';
        if($gaodi)
            $order = 'status DESC,price DESC';
        if($xinjiu)
            $order = 'status DESC,timestamp ASC';
        if($jiuxin)
            $order = 'status DESC,timestamp DESC';

        $cate_id = $this->_get('cate_id');
        if($cate_id)
            $where['cate_id'] = array('eq', $cate_id);
        // dump($cate_id);die;
        $data = $this->_get();
        // dump($data);die;
        $where['recommend'] = array('eq','1');
        import('ORG.Util.Page');
        $count = M('real')->where($where)->count();
        $page = new Page($count,6);
        $limit = $page->firstRow . ',' . $page->listRows;

  
        
        $real = D('real')->relation(true)->limit($limit)->where($where)->order($order)->select();
        // dump($real);die;
        foreach ($real as $key => $value) {
            $real[$key]['level'] = count($real)-$key;
        }

        $this->assign('real',$real);
        $this->assign('Page', $page->show());
        // dump($real);die;
        $prams = $this->_get();      
        $this->assign('prams',$prams);

        $fenlei = M('real_cate')->select();
        $this->assign('fenlei',$fenlei);
        
        

    	
 		$this->display();
	}
}