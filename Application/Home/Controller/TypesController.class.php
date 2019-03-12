<?php
/**
 * Created by PhpStorm.
 * User: 瑾瑜
 * Date: 2017/9/2
 * Time: 17:24
 */
namespace Home\Controller;
use Think\Controller;

class TypesController extends BaseController {

	//添加题目类型
	public function adds() {
		if (IS_POST) {
			$model = D('types');
			if ($model -> create(I('post.'), 1)) {
				if ($model -> add()) {
					$this -> success('题目类型添加成功', U('Types/lists'));
					exit ;
				}

			}

			$this -> error('题目类型添加失败');
		}
		$this -> display();
	}

	//题目类型列表
	public function lists() {

		$typeModel = D('types');
		$data = $typeModel -> searchs();

		$this -> assign('data', $data['data']);
		$this -> assign('page', $data['page']);
		$this -> display();
	}

	//修改题目类型
	public function updates() {
		$model = D('types');
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			$data = $model -> where(array('id' => $id)) -> find();
			$this -> assign('data', $data);

		}
		if (IS_POST) {

			if ($model -> create(I('post.'), 2)) {
				if (FALSE !== $model -> save()) {
					$this -> success('题目类型修改成功', U('lists'));
					exit ;
				}

			}
		}

		$this -> display();
	}

	//删除类型
	public function dels() {
		$id = $_GET['id'];
		$typeModel = D('types');
		$res = $typeModel -> deletes($id);
		echo json_encode($res);

	}

}
