<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/

class MySQL extends aDB {

	protected $conn = null;

	public function __construct() {
		$this->conn();
		//可以throw 错误
	}


	/**
	* 连接数据库，从配置文件读取配置信息
	*/ 
	public function conn() {
		
		$cfg = include(ROOT . '/lib/config.php');
/*
		echo ( "<h1>Connect to : " . ' host: ' . $cfg['host'] . ' user: ' . $cfg['user'] . " password: " . $cfg['password'] . "</h1>") ;
*/

		$this->conn = mysqli_connect($cfg['host'] , $cfg['user'] , $cfg['password']) ;

		mysqli_query($this->conn, 'use ' . $cfg['dbname']);

		mysqli_query($this->conn, 'set names ' . $cfg['charset']);

		return $this->conn;
	}	

	/**
	* 发送请求，query 查询
	* @param string $sql
	* @param mixed 
	*/
	public function query($sql) {
		return mysqli_query($this->conn, $sql);
		//return mysqli_query($this->conn, $sql, $this->conn);
	}	

	/**
	* 查询多行数据
	* @param string $sql
	* @param array 
	*/
	public function getAll($sql) {

		$rs = $this->query($sql);
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
	* 查询单行数据
	* @param string $sql
	* @param array
	*/
	public function getRow($sql) {
		$rs = $this->query($sql);
		if($rs === false) {
			return false;
		}
		
		return  mysqli_fetch_assoc($rs);
	}	

	/**
	* 查询单个数据， 如 count(*)
	* @param string $sql
	* @param mixed 
	*/	
	public function getOne($sql) {
		$rs = $this->query($sql);
		if($rs === false) {
			return false;
		}
		
		$row = mysqli_fetch_row($rs);

		return $row[0];
	}

	/**
	* 自动创建SQL语句，并执行
	* @param array $data 关联数组 键/值与表的列/值对应 
	* @param string $table 表名字
	* @param string $act 动作/updtae/insert
	* @param string $where 条件，用于update
	* @rerurn int 新插入的行的主键值或影响的行数
	*/	
	public function Exec($data , $table , $act='update' , $where) {
		
		if($act === 'insert') {

			$sql = 'insert into ' . $table . '(';
			$sql .= implode(',', array_keys($data) );
			$sql .= ') values (\'';
			$sql .= implode("','", array_values($data) );
			$sql .= '\')';

			return $this->query($sql) ? lastId() : false;
			
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
}

?>