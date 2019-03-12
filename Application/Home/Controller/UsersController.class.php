<?php
/**
 * Created by PhpStorm.
 * User: 瑾瑜
 * Date: 2017/9/2
 * Time: 17:09
 */

namespace Home\Controller;
 use Think\Controller;
class UsersController extends BaseController {
 
	//添加用户
	public function adds() {
		if (IS_POST) {
			$model = D('users');
			if ($model -> create(I('post.'), 1)) {
				if ($model -> add()) {
					$this -> success('用户添加成功', U('Users/lists'));
					exit ;
				}

			}

			$this -> error('用户添加失败');
		}
		$this -> display();
	}

	//用户列表
	public function lists() {

		$userModel = D('users');

		$data = $userModel -> searchs();

		$this -> assign('data', $data['data']);
		$this -> assign('page', $data['page']);
		$this -> display();
	}

	//删除用户
	public function dels() {
		$id = $_GET['id'];
		$userModel = D('users');
		$res = $userModel -> deletes($id);
		echo json_encode($res);

	}

	//修改用户
	public function updates() {
		$model = D('users');
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			$data = $model -> where(array('id' => $id)) -> find();
			$this -> assign('data', $data);

		}
		if (IS_POST) {

			if ($model -> create(I('post.'), 2)) {
				if (FALSE !== $model -> save()) {
					$this -> success('用户信息修改成功', U('lists'));
					exit ;
				}

			}
		}

		$this -> display();
	}

	public function sets() {
		$id = $_GET['id'];
		$userModel = D('users');
		$res = $userModel -> where(array('id' => $id)) -> setField('flag', '2');

		if ($res) {
			$result['success'] = true;
			$result['msg'] = '管理员设置成功';
		} else {
			$result['success'] = false;
			$result['msg'] = '管理员设置失败';
		}
		echo json_encode($result);

	}

	public function clears() {
		$id = $_GET['id'];
		$userModel = D('users');
		$res = $userModel -> where(array('id' => $id)) -> setField('flag', '0');

		if ($res) {
			$result['success'] = true;
			$result['msg'] = '管理员撤销成功';
		} else {
			$result['success'] = false;
			$result['msg'] = '管理员撤销失败';
		}
		echo json_encode($result);

	}

	public function alters(){
		$pwd = $_POST['password'];
		$npwd = $_POST['newpassword'];
		$userModel = D('users');
		$uid = session('id');
		$res = $userModel ->  alterpwd($pwd,$npwd,$uid);
		if($res){
			$this -> success('密码修改成功',U('Login/login'));
			$userModel -> loginout();
			exit;
		}
		else{
			$this -> error('密码修改失败',U('alterpwd'));
		}
	}

}