<?php
	
// AJAX check name and password when lost focus from text
// Should check DB


//比较验证码

$code = $_GET['code'];

echo ($code === $_COOKIE['code'])  ? 1 : 0;

?>