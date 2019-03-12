<?php
namespace Home\Model;
use Think\Model;

class TypesModel extends Model {

	//添加数据的时候允许接收的字段名
	protected $insertFields = array('name');
	//修改数据的时候应该接受的字段名
	protected $updateFields = array('id', 'name');
	//定义验证规则
	protected $_validate = array( array('name', 'require', '题目类型不可以为空', 1) //题目名不可以为空

	);

	protected function _before_insert(&$data, $option) {

	}

	public function searchs() {
		$order = array('id' => 'desc');

		/********实现分页**********/
		//记录总数
		$count = $this -> count();
		//分页显示数目
		$page_num = 5;
		// 实例化分页类 传入总记录数和每页显示的记录数(5)
		$Page = new \Think\Page($count, $page_num);
		//设置上一页和写一页的显示
		$Page -> setConfig('prev', "上一页");
		$Page -> setConfig('next', "下一页");
		// 分页显示输出	,显示分页
		$show = $Page -> show();
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性，显示数据
		$list = $this -> order($order) -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();

		return array('data' => $list, //数据
		'page' => $show, //分页字符串
		);
	}

	public function deletes($id) {

		$res = $this -> where(array('id' => $id)) -> delete();
		if ($res) {
			$result['success'] = true;
			$result['msg'] = '类型删除成功';
			return $result;
		} else {
			$result['success'] = false;
			$result['msg'] = '类型删除失败';
			return $result;

		}

	}

}
