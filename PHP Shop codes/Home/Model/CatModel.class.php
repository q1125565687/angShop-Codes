<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

namespace Home\Model;

use \Think\Model;

class CatModel extends Model{

	protected $cats = array();

	public function __construct(){
		//必须要调用父类的构造函数，初始化
		parent::__construct();

		//读cat表
		$this->cats = $this->field('cat_id, cat_name, parent_id')->select();
	}

	//找出pid栏目下的所以栏目和子孙栏目
	public function getTree($pid = 0, $lev = 0){

		$res = array();
		//递归调用  recursive call ； invoking ； pending
		foreach($this->cats as $k=>$v) {
			if( $v['parent_id'] == $pid ) {
				$v['lev'] = $lev;
				$res[] = $v;
				//下一级的找与拼接
				$res = array_merge($res, $this->getTree($v['cat_id'], $lev+1) );
			}
		}
		return $res;
	}
}


?>