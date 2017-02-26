<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

require('./lib/init.php');

//判断是否点击了栏目链接，catname 链接，则从地址栏得到cat_id
//if(isset($_GET['cat_id'])) {}

$cat_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;
if($cat_id) {
	// and 上各种筛选条件
	$where = ' and art.cat_id=' . $cat_id;
} else {
	$where = '';
}

//判断注册状态：
$login = false;
if( acc() ) {
	$login = true;
} 

$db = new MySQL();

$cnt = $db->getOne('select count(*) from art where 1 ' . $where) ; //总条数, 可能是有条件筛选或无条件，where 1 利于以后 and 拼接
//$num = 2; //每页条数
$curr = isset($_GET['page']) ? $_GET['page'] : 1;  //点击页码--来自地址栏，或缺省第一页

//创建分页对象
$page = new Page($cnt , $curr);
$maxPageNum = ceil($cnt / $page->recordPerPage);  //最大页号

//得到页码数组
$pages = $page->pagnation();

//计算limit参数：
//$offset = ($curr -1) * $num;

//query articals, 根据当前页号，显示相应的文章  
$sql = 'select art_id , comm, tags, art.cat_id , catname , title , content, pubtime, thumb ';
$sql  .= 'from art left join cat on art.cat_id = cat.cat_id where 1 ' . $where;
$sql .= ' order by pubtime desc limit ' . $page->offset . ',' . $page->recordPerPage;

//echo $sql;

$arts = $db->getAll($sql);

//query title
$sql = 'select art_id , title , pubtime from art order by pubtime desc limit 5';
$news = $db->getAll($sql);

//query categories
$sql = 'select * from cat';
$cats = $db->getAll($sql);

error_reporting(E_ALL ^ E_DEPRECATED);

//load the RSS class code
require_once("magpierss/rss_fetch.inc");

//fetch the rss
$rssfeed = fetch_rss("http://rss.theweathernetwork.com/weather/cabc0308");

//get an array of items
$arrayOfItems = $rssfeed->items;

//the first item has today's weather
$today = $arrayOfItems[0];

$imgName = "./images/ic_clear.png";
if (strpos($today['description'], 'Partly cloudy') !== false) {
    $imgName = "./images/ic_light_clouds.png";
} else if ( strpos($today['description'], 'Overcast') !== false ) {
	$imgName = "./images/ic_cloudy.png";
	
}

//the second item has tomorrow's prediction
$tomorrow = $arrayOfItems[1];

//each item is an associative array...

//模板文件 - 显示
//include('./view/front/index.html');

include(ROOT . '/view/front/index.html');

?>					

