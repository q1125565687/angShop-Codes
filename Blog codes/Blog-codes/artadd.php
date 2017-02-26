<meta charset='utf-8'>

<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

//first import init.php file, 定义各种重要常量
require('./lib/init.php');
/*
if( !acc() ) {
	header('Location: login.php');
	exit;
} 
*/
//区别有无POST值，区分表单页，还是提交操作。
if(empty($_POST)) {

	$db = new MySQL();

	//query categories ？Add 2017
	$sql = 'select * from cat';
	$cats = $db->getAll($sql);

	// Form page
	include(ROOT . '/view/admin/artadd.html');
} else {
	
	//合理性检查，并提交、存盘。用自己封装的函数。

	// print_r($_POST);
	// exit;
	
	// if (($title = $_POST['title']) == '' ) {
	// 	exit('biaoti empty !');
	// }

	// if (($content = $_POST['content']) == '' ) {
	// 	exit('content empty !');
	// }

	// if (($cat_id = $_POST['cat_id']) == '' ) {
	// 	exit('title empty !');
	// }

	// $conn = mysqli_connect('localhost' , 'root' , '');

	// mysqli_query($conn, 'use 0309blog');
	// mysqli_query($conn, 'set name utf8');

	// $pubtime = time();

	// $sql = "insert into art (title, cat_id, content, pubtime) value ('$title', $cat_id , '$content' , '$pubtime')";
	// //echo $sql;

	// echo mysqli_query($conn, $sql) ? '发布成功' : '失败！';
	//exit;

	$art = array(); // Empty Array

	if (($art['title'] = $_POST['title']) == '' ) {
		exit('biaoti empty !');
	}

	if (($art['content'] = $_POST['content']) == '' ) {
		exit('content empty !');
	}

	if (($art['cat_id'] = $_POST['cat_id']) == '' ) {
		exit('title empty !');
	}

	$art['pubtime'] = time();

	//开始处理文件（附图）上传
	/* 原：面向过程代码：
	if( isset($_FILES['pic']) && $_FILES['pic']['error']===0) {
		//存在【pic】，并上传成功
		//print_r($_FILES['pic']);
		
		$path = createDir();
		$name = randStr(6);
		$ext = getExt($_FILES['pic']['name']);

		move_uploaded_file($_FILES['pic']['tmp_name'], ROOT . $path . '/' . $name . '.' . $ext);

		//路径及文件名信息，写入$art数组，然后存盘。
		$art['pic'] = $path . '/' . $name . '.' . $ext;

		//生成缩略图 , 并入库
		$art['thumb'] = makeThumb($art['pic'], 300, 300);
	} */

	$up = new Upload();

	$up->allowExt = array('jpeg' , 'jpg' , 'png' , 'gif');

	if( $path = $up->up('pic') ) {
		// 存入


		$cfg = include(ROOT . '/lib/config.php');

		//判断web主机/本地调试
		if ( $cfg['user'] == 'root')
			$art['pic'] = $path;
		else
		{
			//Internet Web 加 .  
			$art['pic'] = '.' . $path;
		}

		//缩略图片处理
		$art['thumb'] = Image::makeThumb($path , 200 , 160);
	} else {
		echo $up->getError();
	}

	//获取文章标签
	//准备，PHP, Linux, Mysql整体写入标签字段, 以逗号分开
	$tags = trim($_POST['tags'], ',');  //去掉两边的逗号
	$art['tags'] = $tags; 			// tags先整体存入art表

	//$sql = "insert into art (title, cat_id, content, pubtime) value ('$title', $cat_id , '$content' , '$pubtime')";
	//echo mExec($art, 'art') ? succ('发布成功 !') : fail('发布失败！');
	//echo mQuery($sql) ? '发布成功' : '失败！';
	// ? succ('发布成功 !') : fail('发布失败！');

	//文章插入后，返回的主键值： $art_id。
	$art_id = mExec($art, 'art');
	if(!$art_id) {
		fail('发布失败！'); 
	}

	//标签 , 文章与标签是一对多的关系，便于按类tags查询文章
	if( $tags ) {
		$tag = array();		//tag:  PHP, Linux, Mysql
		$tag['art_id'] = $art_id;

		$rs = true;
		foreach(explode(',', $tags ) as $t) {   //先以逗号拆开，再循环
			$tag['tag'] = $t;
			$rs = $rs && mExec($tag, 'tag');    //循环存入tag 表，每条入库都判断 *******************  ！！
		}

		//三次/多条入库都成功性判断
		if( !$rs ) {
			//失败，文章与标签都删掉
			mQuery('delete from tag where art_id=' . $art_id);
			mQuery('delete from art where art_id=' . $art_id);  //删除文章
			fail('发布失败， 回退 ！');
		}
	}

	succ('发布成功 ！');

	//左联接，查询文件标签
	//select art.* , tag.* from art left join tag on art.art_id = tag.art_id  where art.art_id = 5;

	//ALTER TABLE art ADD tags char( 30 ) NOT NULL default ''
}
	

?>