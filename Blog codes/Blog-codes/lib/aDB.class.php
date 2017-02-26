<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

abstract class aDB {

	// 抽象方法，没有方法体，等子类具体实现

	/**
	* 连接数据库，从配置文件读取配置信息
	*/ 
	abstract public function conn() ;

	/**
	* 发送请求，query 查询
	* @param string $sql
	* @param mixed 
	*/
	abstract public function query($sql);

	/**
	* 查询多行数据
	* @param string $sql
	* @param array 
	*/
	abstract public function getAll($sql);

	/**
	* 查询单行数据
	* @param string $sql
	* @param array
	*/
	abstract public function getRow($sql) ;

	/**
	* 查询单个数据， 如 count(*)
	* @param string $sql
	* @param mixed 
	*/	
	abstract public function getOne($sql) ;

	/**
	* 自动创建SQL语句，并执行
	* @param array $data 关联数组 键/值与表的列/值对应 
	* @param string $table 表名字
	* @param string $act 动作/updtae/insert
	* @param string $where 条件，用于update
	* @rerurn int 新插入的行的主键值或影响的行数
	*/	
	abstract public function Exec($data , $table , $act='update' , $where);


	/**
	* 增-获取上一行产生的主键值，或影响的行数
	* @param string $sql
	* @param mixed 
	*/	
	//abstract public function getOne($sql) {

	//}




}

?>