<?php 
/**
* Init 初始化文件
* @author Ming JIng
*/

//current Line Number
//echo "I am line", __LINE__, '<br />'; 行号
// __DIR__ 魔术常量， current path
//__FILE__ , current file

//绝对根目录, dirname： 向上倒一级； 因为本段初始化代码在 /blog/web/lib/下，所以：
// C:\wamp\www\20160608--Exercise\blog\web 为 ROOT 值： 
define('ROOT' , dirname(__DIR__) );

// echo dirname(__DIR__);
// echo 'ROOT:';
// echo ROOT;

//也可用 include ? 区别 ？ require ：必须的
require(ROOT . '/lib/mysql.php');
require(ROOT . '/lib/func.php');

//echo ROOT . '/lib/func.php';
//C:\wamp\www\20160608--Exercise\blog\web/lib/func.php   认识！！

//为安全，都保证是字符串，防止SQL注入
//递归转移数组, 转移所有单引号' , 过滤非法字符
$_GET = _addslashes($_GET);
$_POST = _addslashes($_POST);
$_COOKIE = _addslashes($_COOKIE);

// addslashes() 函数返回在预定义字符之前添加反斜杠的字符串。
// 预定义字符是：
// 单引号（'）
// 双引号（"）
// 反斜杠（\）
// NULL
// 提示：该函数可用于为存储在数据库中的字符串以及数据库查询语句准备字符串。
// 注释：默认地，PHP 对所有的 GET、POST 和 COOKIE 数据自动运行 addslashes()。
// 所以您不应对已转义过的字符串使用 addslashes()，因为这样会导致双层转义。
// 遇到这种情况时可以使用函数 get_magic_quotes_gpc() 进行检测。


//自动加载class的规则
function autoLoad($className) {
	require(ROOT . '/lib/' . $className . '.class.php');
}

spl_autoload_register('autoLoad'); //注册自动执行

header('content-type=text/html; charset=utf-8');

?>