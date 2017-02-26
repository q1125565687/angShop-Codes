<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/

abstract class aUpload {

	public $allowExt = array('jpg' , 'jpng' , 'png' , 'rar');
	public $maxSize = 1; //最大上传， 以M为单位

	protected $error = ''; //错误信息


	/**
	* 分析$_FILES中$name域的信息，比如：$_FILES中的['pic']
	* @param string $name 表单中file表单项的name值
	* @return array 上传文件的信息，包含(tmp_name, oname[不含后缀的文件名]， ext[后缀]， size)
	*/
	abstract public function getInfo($name);

	/**
	* 创建目录，在当前网站的upload目录中，按年/月日 创建目录
	* @return string 目录路径 /upload/2016/0707
	*
	*/
	abstract public function createDir();

	/**
	* 生成随机文件名
	* @param int $len 随机字符串的长度
	* @return string 指定长度
	*/
	abstract public function randStr($len = 8); 


	/**
	* 上传文件
	* @param string $name 表单中file表单项的name值
	* @return string 上传文件目录路径 /upload/2016/0707/a.jpg
	*/
	abstract public function up($name);
	/**
	* 检测文件类型，如只允许：jpg, png, jpeg, rar, 不允许exe
	* @param $ext 文件后缀
	* @return boolean
	*/
	abstract public function checkType($ext);

	/**
	* 检测文件类大小
	* @param $size 文件大小
	* @return boolean
	*/
	abstract protected function checkSize($size);

	/**
	* 读取错误信息
	*/
	public function getError() {
		return $this->$error;
	}

}

?>