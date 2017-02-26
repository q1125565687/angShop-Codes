<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/

namespace Home\Controller;

class FlowController extends \Think\Controller {

	protected $cart = null;

	public function __construct() {

		parent::__construct();

		//单实例，可重造
		$this->cart = \Home\Tool\CartTool::getIns();
	}


	//把商品添加到购物车
	public function add() {

		echo "string--------------------------------------";

		// Goods类实例化
		$goods = D('Goods');

		//无此商品。 get.goods_id -- 地址栏获得
		if( ! $goods->find(I('get.goods_id'))) {
			$this->redirect('/');
		}

		//添加到购物车 ？？ 重复 ？ field ？
		$cart = \Home\Tool\CartTool::getIns();

		$cart->add($goods->goods_id , $goods->goods_name , $goods->shop_price);

		//添加成功后，跳转到结算页面: checkout 方法
		$this->redirect('Home/Flow/checkout');
	}

	//结算
	public function checkout() {

		//显示所购物： print_r($this->cart->items());

		$this->assign('pieces' , $this->cart->calcCnt() );

		$this->assign('goods' , $this->cart->items() );
		
		//总金额
		$this->assign('money' , $this->cart->calcMoney() );
		$this->assign('moneyFormat' , $this->cart->calcMoneyFormat() );

		$this->display();  //显示 checkout.html 
	}


	//下订单：写库，清空购物车
	public function done() {

		//使用model基类，实例化对象
		$ordinfo = M('ordinfo');
		$ordgoods = M('ordgoods');

		//添加订单信息

		//多复制一份 $sn, 为assign 用， Add后，ordinfo会清空
		$ordinfo->ord_sn = $sn = date('Ymd') . mt_rand(1000, 9999);
		$ordinfo->ord_id = cookie('user_id') ? cookie('user_id') : 0;
		$ordinfo->xm = $_POST['xm'];
		$ordinfo->mobile = $_POST['mobile'];
		$ordinfo->address = $_POST['address'];
		$ordinfo->paytype = $_POST['paytype'];

		$ordinfo->money = $this->cart->calcMoney();
		$ordinfo->note = $_POST['note'];
		
		$ordinfo->ordtime = time();

		//生成订单, 返回订单号-主键
		$ordinfo_id = $ordinfo->add();

		//把购物车里的多条信息，写入ordgoods表
		//提前准备二维数组
		$datalist = array();

		foreach($this->cart->items() as $k=>$v) {
			$row = array();

			$row['ordinfo_id'] = $ordinfo_id;
			$row['goods_id'] = $k;
			$row['goods_name'] = $v['goods_name'];
			$row['goods_price'] = $v['shop_price'];
			$row['goods_num'] = $v['num'];

			//二维数组：
			$datalist[] = $row;
		}

		//添加多行，数据在数组里$datalist
		if( ! $ordgoods->addAll($datalist) ) {
			//失败，删除订单信息
			$ordinfo->delete($ordinfo_id);
			exit('order fail !');
		}

		// $ordinfo->add() 后， $ordinfo 会被清空，为下次赋值做准备， 所以用 $sn
		$this->assign('sn' , $sn);
		$this->assign('money' , $this->cart->calcMoney());
		$this->assign('moneyFormat' , $this->cart->calcMoneyFormat() );

		//生成支付表单
       	$cbpay = new \Home\Pay\CBPay();
        $cbpay->v_amount = $this->cart->calcMoney();
        $cbpay->v_oid = $sn;

        //将在html中，显示form 表单
        $this->assign('payform', $cbpay->form());

		//清空购物车
		$this->cart->clear();

		$this->display('done');
	}

	public function pay() {
		//接收第三方支付平台的POST信息
		//内有支付结果，订单号，金额，MD5校验串
		//计算校验串，如通过，更改数据库付款状态
		//$sql = update ordinfo set paystats = 1 where ord_sn = POST 来的订单号。

		//还会有定期的确认数据。

	}
}

?>