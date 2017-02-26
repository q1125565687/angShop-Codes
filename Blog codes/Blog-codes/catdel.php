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

//Judge if cat_id is used now ?
$str = "select count(*) from art where cat_id = $cat_id" ;

if ($i = mGetOne($str) )
{
	fail('cat_id is used now, can not delete');
	exit;
}
// delete a row 

mQuery("delete from cat where cat_id = $cat_id");

header('Location: catlist.php');

?>