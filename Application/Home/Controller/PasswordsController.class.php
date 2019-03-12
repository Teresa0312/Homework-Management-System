<?php
/**
 * Created by PhpStorm.
 * User: 瑾瑜
 * Date: 2017/9/2
 * Time: 17:24
 */

namespace Home\Controller;
use Think\Controller;

class PasswordsController extends BaseController {

	public function adds() {
		//

		$id = $_GET['id'];

		$qModel = D('questions');
		$qdata = $qModel -> where(array('id' => $id)) -> find();

		$typeModel = D('types');
		$typedata = $typeModel -> select();
		if (IS_POST) {
			$model = D('passwords');
			if ($model -> create(I('post.'), 1)) {
				if ($model -> add()) {
					$this -> success('答案添加成功', U('Passwords/lists?id=' . $id));
					exit ;
				}

			}

			$this -> error('答案添加失败');
		}
		$this -> assign('qdata', $qdata);
		$this -> assign('tdata', $typedata);
		$this -> display();
	}

	//题目答案列表
	public function lists() {
		$typeModel = D('types');
		$typedata = $typeModel -> select();
		$id = $_GET['id'];
		$qModel = D('questions');
		$qdata = $qModel -> where(array('id' => $id)) -> find();
		$uModel = D('users');
		$udata = $uModel -> select();
		$qModel = D('passwords');
		$data = $qModel -> searchs($id);
		$this -> assign('qdata', $qdata);
		$this -> assign('udata', $udata);
		$this -> assign('tdata', $typedata);
		$this -> assign('data', $data['data']);
		$this -> assign('page', $data['page']);
		$this -> display();
	}

	//修改答案
	public function updates() {
		$pmodel = D('passwords');
		if(!empty($_GET['id'])){
			$info = $pmodel -> getpwdinfo($_GET['id']);
			$this -> assign('data',$info);
		}
		if(IS_POST){
			$alter['content'] = $_POST['content'];
			$alter['time'] = date("Y-m-d H:i:s");
			if($pmodel -> create(I($alter))){
				if(FALSE != $pmodel -> where(array('id' => $_GET['id'])) -> save()){
					$this -> success('答案修改成功',U('lists?id='.$info['qid']));
					exit;
				}
			}
			$this -> error($pmodel->getError());
		}
		$this -> display();
	}

	//根据题目类型获取对应的题目
	public function qlists() {

		$tid = $_GET['tid'];
		$typeModel = D('types');
		$typedata = $typeModel -> select();
		$qModel = D('questions');
		$data = $qModel -> searchs($tid);
		$this -> assign('tdata', $typedata);

		$this -> assign('data', $data['data']);
		$this -> assign('page', $data['page']);
		$this -> display();
	}

}
