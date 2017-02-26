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

//因为Form提交到自身，所以先判断 $_POST

if(empty($_POST)) {
	include(ROOT . '/view/admin/catadd.html');
} else {
	
	if( ($cat['catname'] = $_POST['catname'] ) == '' ) {
		fail('cat name could not be empty');
	}	

	//判断catname重复
	//$sql = "select count(*) from cat where catname='$cat['catname']' ";  //不加【】内的''
	$sql = "select count(*) from cat where catname='$cat[catname]' ";
	if( mGetOne($sql)) {
		fail('catname is there already 已存在！');
	}

	//save in DB
	if(!mExec($cat , 'cat')) {
		fail('catname add fail');
	} else {
		//jump to : catlist.php
		header('Location: catlist.php');
	}
}
?>