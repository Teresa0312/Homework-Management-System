<?php
/**
 * Created by PhpStorm.
 * User: 瑾瑜
 * Date: 2017/9/2
 * Time: 17:18
 */
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller {

	//登录验证
	public function login() {
		if (IS_POST) {
			$account = $_POST['account'];
			$pwd = $_POST['password'];
			$model = D('users');
			// 接收表单并且验证表单

			if ($model -> check($account, $pwd)) {
				$this -> success('登录成功!', U('Index/index'));
				exit ;
			}

			$this -> error('登录失败!', U('Login/Login'));
		} else {

			$this -> display();
		}

	}

	//退出登录
	public function logout() {

		$model = D('users');
		$model -> loginout();
		redirect('login');
	}

}
