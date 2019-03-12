<?php
namespace Home\Model;
use Think\Model;

class QuestionsModel extends Model {

	//添加数据的时候允许接收的字段名
	protected $insertFields = array('name', 'stime', 'etime', 'typeid','content');
	//修改数据的时候应该接受的字段名
	protected $updateFields = array('id', 'name', 'stime', 'etime', 'typeid','content');
	//定义验证规则
	protected $_validate = array( array('name', 'require', '题目不可以为空', 1), //题目名不可以为空
	array('stime', 'require', '开始时间不可以为空', 1), //题目名不可以为空
	array('etime', 'require', '结束时间不可以为空', 1), //题目名不可以为空
	array('typeid', 'require', '题目类型不可以为空', 1), //题目名不可以为空
    array('content', 'require', '题目内容不可以为空', 1) //题目名不可以为空
	);

	protected function _before_insert(&$data, $option) {

	}

	public function searchs($tid) {
		$order = array('id' => 'desc');
		
		if (!empty($tid)) {
			$where = array('typeid' => $tid);
			$num = 3;
		} else {
			$num = 8;
		}

		/********实现分页**********/
		//记录总数
		$count = $this -> where($where) -> count();
		//分页显示数目
		
		$page_num = $num;
		
		// 实例化分页类 传入总记录数和每页显示的记录数(5)
		$Page = new \Think\Page($count, $page_num);
		//设置上一页和写一页的显示
		$Page -> setConfig('prev', "上一页");
		$Page -> setConfig('next', "下一页");
		// 分页显示输出	,显示分页
		$show = $Page -> show();
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性，显示数据
		$list = $this -> where($where) -> order($order) -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();
		foreach ($list as $key => $val) {
			$str = $this -> checkAdd($val['id']);
			$list[$key]['add'] = $str;
			$list[$key]['time'] = $this -> comparetime($list[$key]['etime']);
		}

		return array('data' => $list, //数据
		'page' => $show, //分页字符串
		);
	}

	public function deletes($id) {

		$res = $this -> where(array('id' => $id)) -> delete();
		if ($res) {
			$result['success'] = true;
			$result['msg'] = '题目删除成功';
			return $result;
		} else {
			$result['success'] = false;
			$result['msg'] = '题目删除失败';
			return $result;

		}

	}

	//检查当前的用户是否提交该题的答案
	//如果提交了就不能再提交了
	public function checkAdd($id) {
		$uid = session('id');
		$pModel = D('passwords');
		$where['qid'] = $id;
		$where['uid'] = $uid;
		$res = $pModel -> where($where) -> find();
		if ($res) {
			return 'y';
		} else {
			return 'n';
		}

	}

	public function getConById($id){
	    $res=$this->where(array('id'=>$id))->find();
	    $result['name']=$res['name'];
	    $result['content']=$res['content'];
	    
	    return $result;
	    
	}

	//比较时间
	public function comparetime($time){
		if(strtotime($time)-strtotime(date("Y-m-d H:i:s"))<0)
			return "no";
		else
			return "yes";
	}

}
