<?php 
/**
*
* mysql.php mysql操作系系列函数
*
* @author Ming Jing
*
*/

/**
* Connect mysql DB Server 
*
* @return resource
*/
function conn() {

	// static One time ??
	static $conn = null;

	if( $conn === null) {
		// Read Parameter 
		$cfg = include(ROOT . '/lib//config.php');

		//mLog( "Connect to : " . ' host: ' . $cfg['host'] . 'user: ' . $cfg['user'] . "password: " . $cfg['password']) ;

		$conn = mysqli_connect( $cfg['host'] , $cfg['user'] , $cfg['password']);
		
		// 判断连库失败！
		if (!$conn) {
			mLog( "Open DB failed ! " . ' host: ' . $cfg['host'] . 'user: ' . $cfg['user'] . "password: " . $cfg['password']) ;
    		die('Could not connect DB：' . $cfg['host'] . $cfg['user'] . $cfg['password']);
		}

		if( !mysqli_query($conn, 'use '. $cfg['dbname']) ) {
			mLog( "Select DB failed ! --------------------" . $cfg['dbname']) ;
			die('Could not select DB: ' . $cfg['dbname'] );
		}

		if( !mysqli_query($conn, 'set names ' . $cfg['charset']) ) {
			mLog( "Set name charset failed ! --------------------" ) ;			
			die('Could not set names: ' . $cfg['charset']);
		}

	}
	return $conn;
}


/**
* Commit SQL statements 
*
* @string $sql statement
*
* @return resource
*/
function mQuery($sql) {
	$rs = mysqli_query(conn(), $sql);
	mLog($sql);
	if($rs === false) {
		//日志记录错误
		mLog(mysqli_error(conn()));
		fail('mQuery failed');
	} 

	return $rs;
} 

/**
* Query and return multi rows and columns  
* @string $sql statement
* @return array 二维数组
*/

function mGetAll($sql) {
	$rs = mQuery($sql);
	if($rs === false) {
		return false;
	}

	$data = array();
	
	while($row = mysqli_fetch_assoc($rs)) {
		$data[] = $row;
		//?? 
	}
	return $data;

} 

/**
* Query and return a row 
* @string $sql statement
* @return array 一维数组
*/

function mGetRow($sql) {
	$rs = mQuery($sql);
	if($rs === false) {
		return false;
	}
	
	return  mysqli_fetch_assoc($rs);
} 

/** 
* 单个值:
* Query and return a value such as count()  
* @string $sql statement
* @return mixed int/string
*/
function mGetOne($sql) {

	$rs = mQuery($sql);
	if($rs === false) {
		return false;
	}
	
	$row = mysqli_fetch_row($rs);

	return $row[0];
} 


/**
* 获取上一次增删改查所影响的行数
* @return 影响的行数
*/

function mAfRows(){
	return mysqli_affected_rows(conn());
}

/**
* get last insert's Key ID
* @return int Key value
*/ 
function lastId() {
	return mysqli_insert_id(conn());
} 

/**
* Auto build insert/update语句，并执行
* @param array $data 关联数组， key 对应 Column_Name, Value对应要insert/updatede Value
* @param string $table table_name
* @return int insert返回主键值， update返回影响的行数
*/
function mExec($data, $table , $act='insert' , $where='0') {

	if($act === 'insert') {

		$sql = 'insert into ' . $table . '(';
		$sql .= implode(',', array_keys($data) );
		$sql .= ') values (\'';
		$sql .= implode("','", array_values($data) );
		$sql .= '\')';

		return mQuery($sql) ? lastId() : false;
	
	} else if ($act === 'update') {
		$sql = 'update ' . $table . ' set ';
		foreach($data as $k => $v) {
			$sql .= $k . '=' . "'$v',";
		}

		//截除最后多出的一个逗号，
		$sql = substr($sql, 0, -1);

		$sql .= ' where ' . $where;

		return mQuery($sql) ? mAfRows() : false;
	}
}

//快速
function mLog($msg) {
	$log = ROOT . '/lib/log.txt';

	$msg = $msg . " at " . date('Y/m/d H:i:s') . " ; ";

	file_put_contents($log, $msg . "\n" , FILE_APPEND );
}

?>