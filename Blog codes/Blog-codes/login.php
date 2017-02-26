<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

require('./lib/init.php');

if(empty($_POST)) {
	
	include(ROOT . '/view/admin/login.html');
} else {

	$u = $_POST['name'];
	$p = $_POST['password'];
	$code = $_POST['code'];

	$sql = "select * from  user where name = '$u' limit 1";

	//select * from  user where name = 'admin'# and password = '$p' limit 1" 用#号注释掉password查询。*** sql注入 ***
	//select * from  user where name = 'a' or 1# and password = '$p' limit 1" 用 or 1 无条件进入。 *** sql注入 ***
	// 

	$user = mGetRow($sql);

	if(empty($user)) {
		$error = 2; //登陆错误提示
		include (ROOT . '/view/admin/login.html');
	} else if ( md5($p . $user['salt']) !== $user['password'] ) {
		$error = 3; //登陆错误提示
		include (ROOT . '/view/admin/login.html');	
	} else{
		setcookie('name' , $user['name']);
		setcookie('salt' , ccode($user['name']));
		setcookie('id' , $user['user_id']);

		header('Location: artlist.php');
	}
}


?>