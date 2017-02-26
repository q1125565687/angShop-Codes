<?php 

//查询博文并输出
require('./lib/init.php');

$login = false;
if( !acc() ) {
	header('Location: login.php');
	exit;
} 

$login = true;  // 为显示登陆信息。

/**
* 查询博文并输出
* @author Ming Jing
*/

//两张表的关联查询：left join  : 原没有页码
//$sql = 'select art_id, title, pubtime, catname from art left join cat on art.cat_id=cat.cat_id order by pubtime desc' ;
//$arts = mGetAll($sql);


//---------------------------------------- 根据页码数显示 -------------------------------------------------------------------
$db = new MySQL();

$cnt = $db->getOne('select count(*) from art ' ) ; //总条数, 可能是有条件筛选或无条件，where 1 利于以后 and 拼接
$curr = isset($_GET['page']) ? $_GET['page'] : 1;  //点击页码--来自地址栏，或缺省第一页

//创建分页对象
$page = new Page($cnt , $curr);

//设置每页代码数： 10条记录
$page->setrecPerPage(10);

$maxPageNum = ceil($cnt / $page->recordPerPage);  //最大页号

//得到页码数组
$pages = $page->pagnation();

//print_r($pages);
//print_r($page);

//计算limit参数：
//$offset = ($curr -1) * $num;

//query articals, 根据当前页号，显示相应的文章  

$sql = 'select art_id, title, pubtime, catname ';
$sql  .= 'from art left join cat on art.cat_id=cat.cat_id where 1 ' ;
$sql .= ' order by pubtime desc limit ' . $page->offset . ',' . $page->recordPerPage;

//echo $sql;

$arts = $db->getAll($sql);


include(ROOT . '/view/admin/artlist.html');


?>