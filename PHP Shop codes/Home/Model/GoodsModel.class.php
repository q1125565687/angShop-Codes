<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

namespace Home\Model;

use \Think\Model;

//RelationModel 具备关联查询能力
class GoodsModel extends \Think\Model\RelationModel {

	//声明和其他表的关联关系： comment 表，有多行评论
	protected $_link = array(
		//一对多关系（or HAS_ONE）
		'comment'  => self::HAS_MANY,
	);

	//自动验证规则，create时用
	protected $_validate = array(
		//每行一小数组，对应一个字段的规则
		array('goods_name' , '4,16' , '商品名应在4-16个字符之间', 1 , 'length', 3 ),
		array('is_best' ,array(0,1), '精品 0 或 1', 0 , 'in', 3),
		
		//不能重复 goods_sn
		array('goods_sn' , '', 'goods_sn repeat', 1 , 'unique', 3),
	
		array('cat_id' , 'ckc', '栏目不对' , 1 , 'callback' , 3), 
		// callback是指回调本类的方法， function回调函数

	);

	//自动填充规则
	protected $_auto = array(
		//每行一小数组，对应一个字段的规则
		array('is_new' , '1' , 1 , 'string' ),
		array('add_time' , 'time' , 1 , 'function'),
		array('last_update' , 'time' , 2 , 'function'),
		
		//不管实际是否填，都自动填充
		array('goods_sn' , 'createSn' , 1 , 'callback'),
		array('goods_weight' , '0' , 3 , 'string'),
	);

	//自动过滤, 只能insert下列字段
	protected $insertfields = 'goods_sn,cat_id,brand_id, goods_name,	shop_price,	market_price, goods_number,click_count,	goods_weight,goods_brief,goods_desc,	thumb_img,goods_img,ori_img,	is_on_sale,is_delete,is_best,is_new,is_hot,	add_time' ;

	//验证该栏目是否已村存在
	protected function ckc() {

		//在Goods Model 中，建立Cat Model的实例，并调用其方法。
		$cat = D('Home/Cat');

		//var_dump($this->cat_id) 打印测试
		//在验证时，$this->cat_id 还是 空 NULL
		//$this->cat_id, 此时还没有赋值。
		//return $cat->find($this->cat_id) ? true : false;
		// 当 find 以NULL 为参数时，TP 返回有问题！

		return $cat->find($_POST['cat_id']) ? true : false;
	}

	protected function createSn() {

		$sn = 'tp_' . date('Ymd') . mt_rand(1000,9999);

		//递归，防止重复
		return $this->where( array('goods_sn' => $sn) )->find() ? $this->createSn() : $sn;
	}
}

?>