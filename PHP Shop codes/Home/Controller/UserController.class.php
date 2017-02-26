<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/

namespace Home\Controller;

class UserController extends \Think\Controller {

	public $model = null;

	protected $cart = null; //购物车

	public function __construct() {
		parent::__construct();
		$this->model = D('User');

		//单实例，购物车 -- 含勾选物品
        		$this->cart = \Home\Tool\CartTool::getIns();
	}

	//注册方法
	public function reg() {

		if(!$_POST) {

		        // For Cart Information show:
		        $this->assign('pieces' , $this->cart->calcCnt() );
		        //总金额
		         $this->assign('moneyFormat' , $this->cart->calcMoneyFormat() );

			// M-V名称不一致，传参
			$this->display('user_login');
		} else {
			//判断输入的验证码
			$verify = new \Think\Verify();

			//检查验证码部分, 正式投运时，放开！！ ------------------------------------------------------------------------
			/*  ？？？？
			if( !$verify->check($_POST['vcode'])){
				echo "Vcode Wrong !";
				exit;
			}
			*/

			// 经过Create的合理性检查，已经把$_POST中的数据
			// 存入Model的对象中了，可以在Model类中使用了。
			if( !$this->model->create() ) {
				echo $this->model->getError();
			} else {
				if ( $user_id = $this->model->reg() ) {
					//注册成功：
					//使model的属性，充满user_id的全部信息，为auth-授权（）做准备
					$this->model->find($user_id);
					//注册成功后，创建cookie，并登录成功
					$this->model->auth();
					$this->redirect('Home/Index/index');
				} else {
					echo 'Reg fail';
					// 失败！
				}
			}
		}
	}

	/**
	* 用户登陆方法
	*/
	public function login() {

		if(!IS_POST) {

        			// For Cart Information show:
		        $this->assign('pieces' , $this->cart->calcCnt() );
		        //总金额
		         $this->assign('moneyFormat' , $this->cart->calcMoneyFormat() );

			//只显示登陆界面
			$this->display('user_login');
		} else {
			//提交后处理：
			//Find 之后，数据库数据会赋值到Model的数据属性上。
			$cond = array('username'=>I('post.username'));

			if( ! $this->model->where($cond)->find()) {
				echo 'user_name select Error';
				return;
			}

			if( ! ($this->model->username === I('post.username') ) ) {
				echo 'user_name === input Error';
				return;
				//？？  规范显示画面
			}

			//用户名对了，再判断password
			if( !$this->model->checkPass(I('post.password')) ) {
				echo 'password input Error !';
				return;
				// ？？？
			}

			//登陆成功
			$this->model->auth(); //授权 cookie
			$this->redirect('Home/Index/index'); //跳转
		}
	}

	public function logout() {
		cookie('user_id' , NULL);
		cookie('username' , NULL);
		cookie('ccode' , NULL);

		$this->redirect('Home/Index/index'); //跳转
	}


	//生成验证码
	public function vcode() {

		$verify = new \Think\Verify();

		$verify->imaheW = 140;
		$verify->imaheH = 30;
		//$verify->fontSize = 20;
		$verify->length = 4;
		$Verify->useNoise = false;
		$verify->entry();
	}
}

?>