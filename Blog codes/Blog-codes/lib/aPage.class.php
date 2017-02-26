<?php 
/*---------------------
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
-----------------------*/

abstract class aPage {

	/**
	* 计算分页代码
	* @param int $num 总条目
	* @param int $cnt 每页条数
	* @param int $curr 
	**/

	abstract public function pagnation();

}

?>