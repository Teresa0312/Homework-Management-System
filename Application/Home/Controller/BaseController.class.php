<?php
namespace Home\Controller;

use      Think\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        // 必须先调用父类的构造函数
        parent::__construct();
        // 判断登录
        if (!session('id')) {
            $this->error('必须先登录！', U('Login/login'));
        } else {
            $userModel = D('users');
            $this->assign('id', session('id'));
            $this->assign('username', session('username'));
            $this->assign('usernum', session('usernum'));
			$this->assign('flag', session('flag'));
            $this->assign('sum', $userModel -> getqusnumber(session('id')));
            return TRUE;

        }

    }

}