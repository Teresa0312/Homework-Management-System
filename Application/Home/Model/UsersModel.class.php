<?php
namespace Home\Model;
use Think\Model;

class UsersModel extends Model {

	//添加数据的时候允许接收的字段名
	protected $insertFields = array('account', 'username', 'usernum', 'password');
	//修改数据的时候应该接受的字段名
	protected $updateFields = array('id', 'account', 'username', 'usernum', 'password');
	//定义验证规则
	/*	protected $_validate = array(
	 array('account', 'require', '账号不可以为空', 1), //账号不可以为空
	 array('username', 'require', '用户名不可以为空', 1), //用户名不可以为空
	 array('usernum', 'require', '成员期数不可以为空', 1), //成员期数不可以为空
	 array('password', 'require', '密码不可以为空', 1) //密码不可以为空
	 );*/

	protected function _before_insert(&$data, $option) {

		$data['password'] = md5($data['password']);

	}

	protected function _before_update(&$data, $option) {

		$data['password'] = md5($data['password']);

	}

	public function searchs() {
		$order = array('id' => 'asc');

		/********实现分页**********/
		//记录总数
		$count = $this -> count();
		//分页显示数目
		$page_num = 8;
		// 实例化分页类 传入总记录数和每页显示的记录数(5)
		$Page = new \Think\Page($count, $page_num);
		//设置上一页和写一页的显示
		$Page -> setConfig('prev', "上一页");
		$Page -> setConfig('next', "下一页");
		// 分页显示输出	,显示分页
		$show = $Page -> show();
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性，显示数据
		$list = $this -> order($order) -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();
        foreach ($list as $key=>&$val){
           $val['count']=$this->getqusnumber($val['id']);
            
        }
		return array('data' => $list, //数据
		'page' => $show, //分页字符串
		);
	}
	
	//创建函数获取用户的做题数
	public function getqusnumber($userid){
	    $model=D('passwords');;
	    $res=$model->where(array('uid'=>$userid))->count();
	    
	    return $res;
	}

	public function check($user, $pwd) {

		if (empty($user) || empty($pwd)) {
			return false;
		} else {

			$data = $this -> where(array('account' => $user)) -> find();

			if (!empty($data)) {

				$pwds = $data['password'];

				if ($pwds == md5($pwd)) {
					session('id', $data['id']);
					session('username', $data['username']);
					session('usernum', $data['usernum']);
					session('flag', $data['flag']);
					return TRUE;

				} else {
					return false;

				}

			} else {
				return false;
			}

		}
	}

	public function loginout() {

		session(null);
	}

	public function deletes($id) {

		$res = $this -> where(array('id' => $id)) -> delete();
		if ($res) {
			$result['success'] = true;
			$result['msg'] = '用户删除成功';
			return $result;
		} else {
			$result['success'] = false;
			$result['msg'] = '用户删除失败';
			return $result;

		}
	}

	public function alterpwd($pwd,$npwd,$id){
		$pwd = md5($pwd);
		$data['password'] = $npwd;
		$res = $this -> where(array('id' => $id)) -> find();
		if($pwd == $res['password']){
			if(FALSE !== $this -> where(array('id' => $id)) -> save($data) ){
				return true;
			}	
			else{
				return false;
			}
		}	
		else{
			return false;
		}
	}


}
