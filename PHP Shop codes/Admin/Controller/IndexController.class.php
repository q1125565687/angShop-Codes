<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/


namespace Admin\Controller;

class IndexController extends \Think\Controller{

	public function index(){
		//echo 'Admin Controller !';
		$this->display();
	}

	public function t(){
		//print_r(D('Goods'));  //父类
		//print_r(D('Home/Goods')); //子类

		//print_r(new \Home\Model\GoodsModel());


		$this->model = D('Home/Goods');

		//var_dump($this->model);

		$this->model->goods_name = 'phone';

		$this->model->goods_sn = 'goods_sn000';
		$this->model->cat_id = '1';
		$this->model->shop_price = 23;
		$this->model->goods_desc = 'goods_desc';

		echo $this->model->add() ? 'OK' : 'Fail';

	}
}





?>