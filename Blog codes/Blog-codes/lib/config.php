<?php 

/**
*
* config.php Project Init File, define all kinds important Constant
*
* @author Ming Jing
*
*/

// get ip judge host 
if(getenv('HTTP_X_FORWARDED_FOR') ) {
    $realip = getenv('HTTP_X_FORWARDED_FOR') ;
} elseif (getenv('HTTP_CLIENT_IP') ) {
    $realip = getenv('HTTP_CLIENT_IP') ;
} else {
    $realip = getenv('REMOTE_ADDR') ;
}

mLog( "Client IP : " . $realip . " ; ") ;

/*
echo $_SERVER['SERVER_ADDR'];

echo( "Server IP : " . $_SERVER['SERVER_ADDR'] . " ; ") ;
*/

//用return， 经include引入后，可以直接被赋值给变量

// 000webhost :  

//if ($_SERVER['SERVER_ADDR'] == '31.170.160.169') {


return array(
	'host' => 'my04.winhost.com',
	'user' => 'blog' ,
	'password' => 'JmBcit2015' ,
	'dbname' => 'mysql_110658_blog' ,
	'charset' => 'utf8' ,
	'salt' => '&y%4hjdjGGG00l',
	 );

return array(
	'host' => 'mysql8.000webhost.com',
	'user' => 'a9011254_blog' ,
	'password' => 'blog123' ,
	'dbname' => 'a9011254_blog' ,
	'charset' => 'utf8' ,
	'salt' => '&y%4hjdjGGG00l',
	 );
	

//} else {

// Winhost : if ($_SERVER['SERVER_ADDR'] == '96.31.35.185') {

/*
	
return array(
	'host' => 'my04.winhost.com',
	'user' => 'blog' ,
	'password' => 'JmBcit2015' ,
	'dbname' => 'mysql_110658_blog' ,
	'charset' => 'utf8' ,
	'salt' => '&y%4hjdjGGG00l',
	 );

//}

// ------------ localhost ------------------------------------------------------

return array(
	'host' => 'localhost',
	'user' => 'root' ,
	'password' => '' ,
	'dbname' => '0309blog' ,
	'charset' => 'utf8' ,
	'salt' => '&y%4hjdjGGG00l',
	 );



// ------------ mysql8.000webhost.com  -----------------------------------------
return array(
	'host' => 'mysql8.000webhost.com',
	'user' => 'a9011254_blog' ,
	'password' => 'blog123' ,
	'dbname' => 'a9011254_blog' ,
	'charset' => 'utf8' ,
	'salt' => '&y%4hjdjGGG00l',
	 );



// ------------ mysql8.000webhost.com  -----------------------------------------
return array(
	'host' => 'my04.winhost.com',
	'user' => 'blog' ,
	'password' => 'JmBcit2015' ,
	'dbname' => 'mysql_110658_blog' ,
	'charset' => 'utf8' ,
	'salt' => '&y%4hjdjGGG00l',
	 );
*/

?>