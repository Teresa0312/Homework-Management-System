<?php
namespace Home\Model;
use Think\Model;

class PasswordsModel extends Model {

	//添加数据的时候允许接收的字段名
	protected $insertFields = array('content', 'qid', 'time', 'uid');
	//修改数据的时候应该接受的字段名
	protected $updateFields = array('id', 'content', 'qid', 'time', 'uid');
	//定义验证规则
	protected $_validate = array( array('content', 'require', '答案内容不可以为空', 1) //答案内容不可以为空

	);

	protected function _before_insert(&$data, $option) {

		$data['time'] = date('Y-m-d H:i:s', time());
		$data['qid'] = $_GET['id'];
		$data['uid'] = session('id');

	}

	public function searchs($qid) {
		$order = array('id' => 'desc');
		if (!empty($qid)) {
			$where = array('qid' => $qid);
		}

		/********实现分页**********/
		//记录总数
		$count = $this -> where($where) -> count();
		//分页显示数目
		$page_num = 1;
		// 实例化分页类 传入总记录数和每页显示的记录数(5)
		$Page = new \Think\Page($count, $page_num);
		//设置上一页和写一页的显示
		$Page -> setConfig('prev', "上一页");
		$Page -> setConfig('next', "下一页");
		// 分页显示输出	,显示分页
		$show = $Page -> show();
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性，显示数据
		$list = $this -> where($where) -> order($order) -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();

		return array('data' => $list, //数据
		'page' => $show, //分页字符串
		);
	}

	public function getpwdinfo($pid){
		$pmodel = D('passwords');
		$qmodel = D('questions');
		$tmodel = D('types');
		$info = $pmodel -> where(array('id' => $pid)) -> find();
		$qdata = $qmodel -> where(array('id' => $info['qid'])) -> find();
		$tdata = $tmodel -> where(array('id' => $qdata['typeid'])) -> find();
		$info['quetitle'] = $qdata['name'];
		$info['qcontent'] = $qdata['content'];
		$info['qstime'] = $qdata['stime'];
		$info['qetime'] = $qdata['etime'];
		$info['qtype'] = $tdata['name'];
		return $info;
	}

}
