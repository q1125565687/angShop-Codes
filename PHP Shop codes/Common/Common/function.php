<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/

//自动加载的函数
//自定义函数

function encCookie($user_id, $username) {
	return md5($user_id . '|' . $username . '|' . C('COO_KEY'));
}

?>