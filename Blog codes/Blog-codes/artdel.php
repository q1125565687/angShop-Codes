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

//地址栏上传来的：$_GET['art_id']
$sql = 'delete from art where art_id=' . $_GET['art_id'];

//mAfrows() 影响几行？
mQuery($sql) && mAfrows() ? succ('删除成功 ！') : fail('删除失败 ！');



?>