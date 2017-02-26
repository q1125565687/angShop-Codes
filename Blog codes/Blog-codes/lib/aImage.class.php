<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/

//定义接口：
interface aImage {
	
	//static protected $error; interface 无成员变量

	/**
	* 生成缩略图
	* @param string ori 原始图片路径， 以web根目录为起点，/upload/xxxx, 而不是d:/www
	* @param int width 缩略后的宽
	* @param int height 缩略后的高
	* @return string 缩略后的路径， 以web根目录为起点
	*/
	public static function makeThumb($ori , $width=200 , $height=200); 

	/**
	* 添加水印
	* @param string ori 原始图片路径，以web根目录为起点
	* @param string $water 水印图片
	* @return string 加水印后的图片路径
	*/
	public static function water($ori , $water);


	/**
	* @return string 错误信息
	*/
	public static function getError();

}

?>