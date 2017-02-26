<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/


namespace Home\Model;

use \Think\Model;

class UserModel extends Model {

	//验证信息数组：正则6~16个字母或数字
	protected $_validate = array(
		array('username' , '/^\w{6,16}$/' , 'User Name: 6~16 character or figures' , 1 , 'regex' , 3) , 
		array('email' , 'email' , '邮件地址不对 Email Error' , 1, '' , 3),
		array('password' , '6,16' , '密码长度至少6位, password err', 1 , 'length' , 3),
		array('cfmpassword' , 'password' , '2次密码不一致, password not same' , 1, 'confirm' ,3),
		);

	public function reg() {
		$this->encPass();

		// create 在Controller 中
		return $this->add();
	}

	/**
	* 对明文密码加盐，加密
	* @return 加密后的MD5密码
	*/
	protected function encPass() {
		$this->salt();  //生成盐
		//经过create之后，所以信息都已在data中，并可以在Model对象中this->xx, 使用了
		$this->password = md5($this->password . $this->salt);
	}

	//检测密码是否正确
	public function checkPass($password) {
		//保存库内的password
		$selfpass = $this->password; //MD5 password

		//$selfpass = 'a1b6223a8bf0bf42979fbc30667840bb';
		//echo "selfpass :" ;
		//echo $selfpass;
		//echo $this->password;

		$this->password = $password; //User input password

		//利用encPass()函数，重复加密过程
		$this->encPass();

		
		return $selfpass === $this->password;
	}

	/**
	* 创建用户的盐
	*/
	protected function salt() {
		//没盐
		if(!$this->salt) {
			$this->salt = $this->randStr();
		}
		return $this->salt;
	}

	//随机字符串
	protected function randStr($length = 8) {
		$str = ' ABCDEFGHJKLMNOPQUVWXYZabcdefghjklmnopqrstuvwxyz0123456789' ;
		return substr(str_shuffle($str), 0, $length);
	}

	/**
	* 给用户分配cookie 授权
	*/
	public function auth() {
		cookie('user_id' , $this->user_id);
		cookie('username' , $this->username);
		//自定义函数 function.php  common/common 下，自己加载
		cookie('ccode' , encCookie($this->user_id, $this->username));
	}
}

?>