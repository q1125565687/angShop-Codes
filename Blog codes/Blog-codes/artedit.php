<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/


require('./lib/init.php');

if( !acc() ) {
	header('Location: login.php');
	exit;
} 

if(empty($_POST)) {

	//地址栏，获得读取ID信息
	$sql = 'select * from art where art_id=' . $_GET['art_id'];

	//print_r($sql);

	$art = mGetRow($sql);

	if(empty($art)) {
		fail('parameter invalid， 取不到 ');
	}

	$db = new MySQL();

	//query categories ？Add 2017
	$sql = 'select * from cat';
	$cats = $db->getAll($sql);

	include(ROOT . '/view/admin/artedit.html');
} else {
	// After commit, had $_POST message
	// Update rationality checking
	$art = array();

	if (($art['title'] = $_POST['title']) == '' ) {
		exit('biaoti empty !');
	}

	if (($art['content'] = $_POST['content']) == '' ) {
		exit('content empty !');
	}

	if (($art['cat_id'] = $_POST['cat_id']) == '' ) {
		exit('title empty !');
	}

	$art['lastup'] = time();

	mExec($art , 'art' , 'update' , 'art_id=' . $_GET['art_id']) ? succ('修改成功 ！') : fail('修改失败 ！');
}
?>