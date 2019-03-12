<?php
/**
 * Created by PhpStorm.
 * User: 瑾瑜
 * Date: 2017/9/2
 * Time: 17:23
 */

namespace Home\Controller;
use Think\Controller;

class QuestionsController extends BaseController {

	//添加题目
	public function adds() {
		//
		$typeModel = D('types');
		$typedata = $typeModel -> select();
		if (IS_POST) {
			$model = D('questions');
			if ($model -> create(I('post.'), 1)) {
				if ($model -> add()) {
					$this -> success('题目添加成功', U('Questions/lists'));
					exit ;
				}

			}

			$this -> error($model->getError());
		}
		$this -> assign('tdata', $typedata);
		$this -> display();
	}

	//题目列表
	public function lists() {
		$typeModel = D('types');
		$typedata = $typeModel -> select();
		$qModel = D('questions');
		$data = $qModel -> searchs($tid);
		$this -> assign('tdata', $typedata);
		$this -> assign('data', $data['data']);
		$this -> assign('page', $data['page']);
		$this -> display();
	}

	//修改题目
	public function updates() {
		$typeModel = D('types');
		$typedata = $typeModel -> select();
		$model = D('questions');
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			$data = $model -> where(array('id' => $id)) -> find();
			$this -> assign('data', $data);

		}
		if (IS_POST) {

			if ($model -> create(I('post.'), 2)) {
				if (FALSE !== $model -> save()) {
					$this -> success('题目修改成功', U('lists'));
					exit ;
				}

			}
			$this -> error($model->getError());
		}
		$this -> assign('tdata', $typedata);
		$this -> display();
	}

	//根据题目类型获取对应的答案
	public function qlists() {

		$tid = $_GET['tid'];
		$typeModel = D('types');
		$typedata = $typeModel -> select();
		$qModel = D('questions');
		$data = $qModel -> searchs($tid);
		$this -> assign('tdata', $typedata);
		
        $this->assign('flag',session('flag'));
		$this -> assign('data', $data['data']);
		$this -> assign('page', $data['page']);
		$this -> display();

	}

	public function dels() {
		$id = $_GET['id'];
		$qModel = D('questions');
		$res = $qModel -> deletes($id);
		echo json_encode($res);

	}
	public function getDetails(){
	    
	    $id=$_GET['id'];
	    $qModel=D('Questions');
	    $res=$qModel->getConById($id);
	    echo json_encode($res);
    
	}


}
