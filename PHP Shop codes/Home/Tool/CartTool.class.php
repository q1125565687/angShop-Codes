<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/

namespace Home\Tool;

abstract class ACartTool {

	/** 抽象类
	* 向购物车中添加1个商品
	* @param $goods_id int 商品id
	* @param $goods_name String 商品名
	* @param $shop_price float 价格
	* @return boolean
	*/
	abstract public function add($goods_id,$goods_name,$shop_price);
	/**
	* 减少购物中1个商品的数量,如果减至0,则从购物车删除此商品
	* @param $goods_id int 商品id
	*/
	abstract public function decr($goods_id);
	/**
	* 从购物车删除某商品
	* @param $goods_id 商品id
	*/
	abstract public function del($goods_id);
	/**
	* 列出购物车所有的商品
	* @return Array
	*/
	abstract public function items();
	/**
	* 返回购物车中有几种商品
	* @return int
	*/
	abstract public function calcType();
	/**
	* 返回购物中商品的个数
	* @return int
	*/
	abstract public function calcCnt();
	/**
	* 返回购物车中商品的总价格
	* @return float
	*/
	abstract public function calcMoney();
	/**
	* 清空购物车
	* @return void
	*/
	abstract public function clear();

}
	
//-------- 继承 A 抽象 I 接口---------------------------------------------------

class CartTool extends ACartTool {

	protected $items = array();  //商品数组，二维; 应该是三维数组 ？？ goods_id 当键

	protected static $ins = null;	//单实例

	/**
	* 在构造函数中，获取session 信息。
	*/
	protected function __construct() {
		
		//parent::__construct(); why ?  可能是因为’抽象类‘

		//判断是否有购物车信息 ？ 有取出，没有-空数组
		$this->items = session('?cart') ? session('cart') : array();
	} 

	/**
	* 获取-单实例
	*/
	public static function getIns() {
		if(self::$ins === null) {
			self::$ins = new self();
		}
		return self::$ins;
	}

	/**
	* 向购物车中添加1个商品
	* @param $goods_id int 商品id
	* @param $goods_name String 商品名
	* @param $shop_price float 价格
	* @return boolean
	*/
	public function add($goods_id, $goods_name, $shop_price) {

		// 是否有goods_id 商品
		if( ! isset($this->items[$goods_id]) ) {
			// 二维数组
			$row = array();
			$row['goods_name'] = $goods_name;
			$row['shop_price'] = $shop_price;
			$row['num'] = 1;
			$this->items[$goods_id] = $row;

		} else {
			// 二维数组
			$this->items[$goods_id]['num'] += 1;
		}
	}

	/**
	* 减少购物中1个商品的数量,如果减至0,则从购物车删除此商品
	* @param $goods_id int 商品id
	*/
	public function decr($goods_id) {

		$this->items[$goods_id]['num'] -= 1;

		if( $this->items[$goods_id]['num'] == 0 ) {
			$this->del($goods_id);
		} 
	}

	/**
	* 从购物车删除某商品
	* @param $goods_id 商品id
	*/
	public function del($goods_id) {

		unset($this->items[$goods_id]);
	}

	/**
	* 列出购物车所有的商品
	* @return Array
	*/
	public function items() {

	 	return $this->items;   
	}

	/**
	* 返回购物车中有几种商品
	* @return int
	*/
	public function calcType() {

		return count($this->items);  //几个单元
	}

	/**
	* 返回购物车中商品的个数
	* @return int
	*/
	public function calcCnt() {

		$cnt = 0;
		foreach($this->items as $v) {
			$cnt += $v['num'];
		}
		return $cnt;
	}

	/**
	* 返回购物车中商品的总价格
	* @return float
	*/
	public function calcMoney() {

		$money = 0.0;
		foreach($this->items as $v) {
			$money += $v['num'] * $v['shop_price'];
		}

		// string formate return :
		return ($money);
	}

	/**
	* 返回购物车中商品的总价格 ,  number_format ---
	* @return float
	*/
	public function calcMoneyFormat() {

		$money = 0.0;
		foreach($this->items as $v) {
			$money += $v['num'] * $v['shop_price'];
		}

		// string formate return :
		return number_format($money);
	}


	/**
	* 清空购物车
	* @return void
	*/
	public function clear() {

		$this->items = array();
	}

	/**
	* 把对象中的items写入session， 析构函数
	*/
	public function __destruct() {
		//保存到session
		session('cart' , $this->items);
	}
}

	//$cart = new CartTool();
	//$cart = CartTool::getIns();

/*  由地址栏判断
	if( $_GET['act'] == 'buy' ) {
		$cart->add(1, 'nokia' , 23.3);
		$cart->add(2, 'nokia1' , 33.3);
		$cart->add(1, 'nokia' , 23.3);
	}

	print_r($cart->items());
*/

?>