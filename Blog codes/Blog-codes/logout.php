<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

require('./lib/init.php');

setcookie('name', NULL, 0);
setcookie('id', NULL, 0);
setcookie('salt', NULL, 0);

header('Location: index.php');

?>
