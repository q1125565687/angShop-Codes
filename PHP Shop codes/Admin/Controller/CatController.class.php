<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

namespace Admin\Controller;

use \Think\Controller;

class CatController extends Controller{

	protected $model = null;

	public function __construct() {
		parent::__construct();
		
		$this->model = D('Home/Cat');
		//调用：$this->model->getTree()) 不成功, 因为: D('/Home/Cat'); Home前多了"/"
	}

	public function add() {

		//常量检测 POST 信息  ， $_POST
		if(!IS_POST) { //添加支路-- 读库Cat，并显示
			
			//new Cat 控制器对象，D -> 实例化
			//$cat = D('Home/Cat');

			// 上级分类
			//取得原有分类信息 from cat table
			//$this->assign('cats', $this->model->getTree());

			$this->assign('cats', $this->model->getTree());

			//显示 add 模板
			$this->display();
		}
		else {   // 提交支路 -存盘
		 	//$cat = D('Home/Cat');
		 	echo $this->model->add($_POST) ? 'ok' : 'fail';
		}
	}

	public function lists(){

		/*
		$this->model->field('goods_id , goods_name , goods_sn ,  shop_price , is_on_sale ,is_best , is_new ,  is_hot , goods_number');
		
		$this->model->order('goods_id desc');

		//var_dump($this->model->select());
		
		$this->assign('goods' , $this->model->select());
		????? unfinsihed  ....................  ？？ 修改 Lists.html

		*/

		$this->display();
	}
}

?>