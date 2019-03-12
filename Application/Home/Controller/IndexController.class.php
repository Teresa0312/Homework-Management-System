<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

	public function index() {

		$typeModel = D('types');
		$typedata = $typeModel -> select();

		$this -> assign('tdata', $typedata);
		$this -> display();
	}

	public function hello() {

		$this -> display();
	}

}
