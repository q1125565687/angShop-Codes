<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/

class Image implements aImage{
	
	static protected $error;

	/**
	* 生成缩略图
	* @param string ori 原始图片路径， 以web根目录为起点，/upload/xxxx, 而不是d:/www
	* @param int width 缩略后的宽
	* @param int height 缩略后的高
	* @return string 缩略后的路径， 以web根目录为起点
	*/
	public static function makeThumb($ori , $width=200 , $height=160) {

		//原图信息
	    list($w, $h, $type) = getimagesize(ROOT . $ori);

	    if(!$w) { //取原图有问题
	        return false;
	    }

	    $func  = array(
	        1 => 'imagecreatefromgif' ,
	        2 => 'imagecreatefromjpeg' ,
	        3 => 'imagecreatefrompng' ,
	        6 => 'imagecreatefromwbmp' ,
	        );

	    if(!isset($func[$type])) {
	        return false; //无法处理该类型
	    }

	    //读取大图, 用数组，下标对应TYPE, 调用相应的打开函数
	    $big = $func[$type](ROOT . $ori);

	    //造小画布
	    $small = imagecreatetruecolor($width, $height);
	    //$white = imagecolorallocate($small, 218, 218, 218);
	    //$white = imagecolorallocate($small, 224, 224, 224);  //#e0e0e0  底色
	    $white = imagecolorallocate($small, 238, 238, 238);  //#EEE  底色

	    imagefill($small, 0, 0, $white);


	    //得到缩放比例
	    $rate = min($width / $w , $height / $h);
	    $rw = $w * $rate;
	    $rh = $h * $rate;

	    imagecopyresampled($small, $big, ($width-$rw)/2, ($height-$rh)/2, 0, 0, $rw, $rh, $w, $h);

	    $path = $ori . '_thumb.png' ;
	    imagepng($small, ROOT . $path);

	    imagedestroy($big);
	    imagedestroy($small);

	    //return $path;

		// 有无 . 在外host上，没有. 因为 ROOT = .   ???
		$cfg = include(ROOT . '/lib/config.php');
		
		//判断web主机/本地调试
		if ( $cfg['user'] == 'root')
			return $path;
		else
		{
			return '.' . $path;
		}
	}

	/**
	* 添加水印
	* @param string ori 原始图片路径，以web根目录为起点
	* @param string $water 水印图片
	* @return string 加水印后的图片路径
	*/
	public static function water($ori , $water){

	}


	/**
	* @return string 错误信息
	*/
	public static function getError(){


	}
}

?>