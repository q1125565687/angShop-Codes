<meta charset='utf-8'>

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

$cat_id = $_GET['cat_id'];

//$cat = mGetRow("select * from cat where cat_id = $cat_id");
$cat = mGetRow('select * from cat where cat_id =' . $cat_id);


if(empty($cat)) {
	fail('$_GET 非法参数 invalid parameter');
}

//print_r($cat);

if(empty($_POST)) {
	include(ROOT . '/view/admin/catedit.html');
} else {

	// New Column
	if( ($newcat['catname'] = $_POST['catname'] ) == '' ) {
		fail('cat could not be empty');
	}	

	if(! mExec($newcat , 'cat' , 'update' , 'cat_id=' . $cat_id)) {
		fail('catname modify failed');
	} else {
		header('Location: catlist.php');
	}
}

?>