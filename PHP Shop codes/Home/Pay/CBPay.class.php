<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/


namespace Home\Pay;

// Chinabank 支付类
//MD5生成数字签名

class CBPay {

	public $v_amount;		//价格
	public $v_moneytype = 'CNY' ;
	public $v_oid;			//订单号
							//值 见配置文件
	public $v_mid;			//商户号
	public $v_url;			//
	public $v_key;			//

	public function __construct() {

		//从配置文件取

		$this->v_mid = C('v_mid');
		$this->v_url = C('v_url');
		$this->v_key = C('v_key');
	}

	//生成表单 form 字符串 页面显示 %s占位符 替换 sprintf
    public function form() {
        $form =  '<form action="https://pay3.chinabank.com.cn/PayGate" method="POST">
        <br />
	<fieldset>
            <p>Product   ID ：  <input type="text" name="v_mid" value="%s" /></p>
            <p>Order Number：<input type="text" name="v_oid" value="%s" /></p>
            <p>Total  Amount ： <input type="text" name="v_amount" value="%s" /></p>
            <p>CurrencyType：<input type="text" name="v_moneytype" value="%s" /></p>
            <p>Call Back Port：<input type="text" name="v_url" value="%s" /></p>
            <p>md5 Encryption：<input type="text" name="v_md5info" value="%s" /></p>
            <p><br /></p>
            <p><input type="submit" value="Pay Now => Transfer to Third-Party Payment" /></p>
	</fieldset>
        </form>';

        //用sprintf来格式化，%s以变量替换 计算签名
        // 隐藏显示： hidden  <p><input type="hidden" name="v_mid" value="%s" /></p>

        return sprintf($form , $this->v_mid , $this->v_oid , $this->v_amount , $this->v_moneytype , $this->v_url , $this->sign());
    }

	public function sign() {
		//拼接，MD5, 大写返回
		$str = $this->v_amount . $this->v_moneytype . $this->v_oid . $this->v_mid . $this->v_url . $this->v_key; 

		return strtoupper(md5($str));
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