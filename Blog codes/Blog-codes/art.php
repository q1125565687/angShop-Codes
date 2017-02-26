<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

require('./lib/init.php');

//根据地址栏 art_id，读文件信息
$art_id = $_GET['art_id'] + 0;
//+ 0； 或 int， 强制变为数字类型； 保证安全，防止union 字符进入 ！

$sql = 'select * from art where art_id = ' . $art_id;
$art = mGetRow($sql);

//POST判断-非空，若有评论数据，先写库
$fail = false;
if(!empty($_POST)) {
	$comm = array();
	$comm['art_id'] = $art_id;
	
	$comm['nick'] = htmlspecialchars($_POST['nick']);  // 过滤 '' 等,特殊符号


	$comm['content'] = htmlspecialchars($_POST['content']);  
	if( $comm['content'] == ''){
		exit('Empty comment !');
	}

	//以上，应判断非空。
	$comm['pubtime'] = time();
	$comm['ip'] = sprintf('%u' , ip2long(getIp()));

	if( !mExec($comm, 'comment') ) {
		//fail('评论写入失败');
		$fail = true;
	} else {
		//评论写入成功，计数器加 +1
		mQuery('update art set comm=comm+1 where art_id = ' . $art_id);
	}
}

//查询文章所有评论
$sql = 'select * from comment where art_id = ' . $art_id;
$comments = mGetAll($sql);

//query title  -- 最新博文
$sql = 'select art_id , title , pubtime from art order by pubtime desc limit 5';
$news = mGetAll($sql);

//query categories
$sql = 'select * from cat';
$cats = mGetAll($sql);


include(ROOT . '/view/front/art.html');

?>