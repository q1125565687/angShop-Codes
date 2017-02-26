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

$sql = 'select * from cat';

$cats = mGetAll($sql);

include(ROOT . '/view/admin/catlist.html');

?>