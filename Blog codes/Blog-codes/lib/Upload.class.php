<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/

class Upload extends aUpload {

	/*
	public $allowExt = array('jpg' , 'jpng' , 'png' , 'rar');
	public $maxSize = 1; //最大上传， 以M为单位

	protected $error = ''; //错误信息
	*/

	/**
	* 分析$_FILES中$name域的信息，比如：$_FILES中的['pic']
	* @param string $name 表单中file表单项的name值
	* @return array 上传文件的信息，包含(tmp_name, oname[不含后缀的文件名]， ext[后缀]， size)
	*/
	public function getInfo($name) {
		
		//Array ( [name] => zkeEHbnN.jpg [type] => image/jpeg [tmp_name] => D:\wamp\tmp\phpC887.tmp [error] => 0 [size] => 561276 )
		$data = array();

		$data['tmp_name'] = $_FILES[$name]['tmp_name'];

		//$pos = strrpos($_FILES[$name]['name'] , '.')

		// end 取数组最后一项，explode 以 . 分割成多个数组， 得到后缀
		$t = explode('.', $_FILES[$name]['name']);
		$data['ext'] = end( $t );

		//多一个点的后缀
		$data['ext1'] = strrchr ( $_FILES[$name]['name'] , "." );

		//strripos — 计算指定字符串在目标字符串中最后一次出现的位置（不区分大小写）
		$data['oname'] = substr($_FILES[$name]['name'], 0, strripos ($_FILES[$name]['name'] , "." ));

		$data['size'] = $_FILES[$name]['size'];

		// 打印结果：Array ( [tmp_name] => D:\wamp\tmp\php19FC.tmp [ext] => jpg [ext1] => .jpg [oname] => FQVWqJ [size] => 620888 ) 
    	return $data;
	}


	/**
	* 创建目录，在当前网站的upload目录中，按年/月日 创建目录
	* @return string 目录路径 /upload/2016/0707
	*
	*/
	public function createDir(){
		// 有无 . 在外host上，没有. 因为 ROOT = .   ???
		$cfg = include(ROOT . '/lib/config.php');

		//判断web主机/本地调试
		if ( $cfg['user'] == 'root')
			$path = './upload/' . date('Y/md');
		else
		{
			//Internet Web 加 .  
			$path = '/upload/' . date('Y/md');
		}

		// $str = ROOT . $path;
	 	// echo "In pre create Dir: " . $str ;
	 	// echo "<br />";

	    if(!is_dir(ROOT . $path)) {
	    	// $str = ROOT . $path;
	    	// echo "In before create Dir: " . $str;
	        return mkdir(ROOT . $path, 0777, true) ? $path : false;
	    }

	    //??返回前 加 . ???
	    return $path;
	}

	/**
	* 生成随机文件名
	* @param int $len 随机字符串的长度
	* @return string 指定长度
	*/
	public function randStr($len = 8){
	    $str = 'ABCDEFGHIJKMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';

	    //打乱字符串
	    //str_shuffle($str);

	    //截取
	    return substr(str_shuffle($str), 0, $len);
	}


	/**
	* 上传文件
	* @param string $name 表单中file表单项的name值
	* @return string 上传文件目录路径 /upload/2016/0707/a.jpg
	*/
	public function up($name){

		//开始处理文件（附图）上传
		if( !isset($_FILES['pic']) || $_FILES['pic']['error'] !==0) {
			$this->error = ' $_FILES[pic] 或 $_FILES[pic][error] !==0 ';
			return false;
		}

		//echo $_FILES['pic'];

		$data = $this->getInfo($name);
		
		if( ! $this->checkType($data['ext']) ) {
			return false;
		}

		if( ! $this->checkSize($data['size']) ) {
			return false;
		}

		$path = $this->createDir();

		if($path == false){
			//echo "after creatDir Return false, Failed ! could not get path";
			fail(' creatDir upload/2016/xxxx');
		}

		$name = $this->randStr();
		//public function randStr($len = 8){
		
		$ext = $data['ext'];

		if ( ! move_uploaded_file($data['tmp_name'], ROOT . $path . '/' . $name . '.' . $ext) ) {
			throw new Exception('移动上传文件出错 ！');
			return false;
		} else {
			return $path . '/' . $name . '.' . $ext; 
		}

		//路径及文件名信息，写入$art数组，然后存盘。
		/*  待处理 ？？？
		$art['pic'] = $path . '/' . $name . '.' . $ext;

		//生成缩略图 , 并入库
		$art['thumb'] = makeThumb($art['pic'], 300, 300);
		*/ 
	}

	/**
	* 检测文件类型，如只允许：jpg, png, jpeg, rar, 不允许exe
	* @param $ext 文件后缀
	* @return boolean
	*/
	public function checkType($ext) {
		if( ! in_array( strtolower($ext), $this->allowExt, true)) {
			$this->error = 'upload file ext error .' ;
			return false;
		}
		return true;
	}

	/**
	* 检测文件类大小
	* @param $size 文件大小
	* @return boolean
	*/
	protected function checkSize($size){
		if( $size > ( $this->maxSize * 1024 * 1024)) {
			$this->error = 'upload file too large';
			return false;
		}
		return true;
	}

	/**
	* 读取错误信息
	*/
	public function getError() {
		return $this->$error;
	}

}

?>