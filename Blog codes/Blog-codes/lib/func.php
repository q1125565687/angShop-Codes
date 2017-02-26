<?php 

/**
* 封装常用函数
*/

//优雅的提示信息：用html
function succ($msg) {
    $msg = "Successed...  " . $msg;
	$type = 'succ';
	include(ROOT . '/view/admin/info.html');
	exit;
}

function fail($msg) {
    $msg = "Failed...  " . $msg;
	$type = 'fail';
	include(ROOT . '/view/admin/info.html');
	exit;
}

//获得IP，不成功 
function getIp() {
    static $realip = NULL;

    if ($realip !== NULL) {
        return $realip;
    }

    if(getenv('HTTP_X_FORWARDED_FOR') ) {
        $realip = getenv('HTTP_X_FORWARDED_FOR') ;
    } elseif (getenv('HTTP_CLIENT_IP') ) {
        $realip = getenv('HTTP_CLIENT_IP') ;
    } else {
        $realip = getenv('REMOTE_ADDR') ;
    }
    return $realip;
}

/**
* 计算分页代码
* @param int $cnt 总页数, 
* @param $num=5 每页条数, 
* @param $curr=1 当前页号
* @return array
*/
function pagnation($cnt, $num=5 , $curr=1){
    //计算总页数， ceil向上取整
    $max = ceil($cnt / $num);

    //显示5条页码
    if($curr > $max) {
        $curr = $max;
    }

    //最左， -2 为 5条 ： $num=5 ？？
    $left = max($curr - 2, 1 );

    //最右
    $right = min($left + 5 -1 , $max);

    //再最左，当前在最右侧，最左还需要向左移动，要凑足5个。
    $left = max($right - 5 + 1, 1);

    $get = $_GET;  //获得地址栏参数，可能这里面已包含 cat_id 信息（当前显示的某类博文）
    unset($get['page']);   //先删除掉page项，以便后续使用，传入页码

    for ( $arr = array(), $i=$left; $i<=$right ; $i++) {
        
        $get['page'] = $i;

        //键值拼接：键=值&键=值
        $arr[$i] = http_build_query($get);
    }   

    return $arr;
}

/**
* 生成随机字符串
* @param int $len 随机串长度
* @param string
*/
function randStr($len = 4) {
    $str = 'ABCDEFGHIJKMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';

    //打乱字符串
    //str_shuffle($str);

    //截取，打乱
    return substr(str_shuffle($str), 0, $len);
}

/**
* 按日期创建目录，并返回相对目录
*/
function createDir() {

    //修改: './upload/' 加点 .  多一个点，没有影响， ./当前
    //相对于ROOT 
    //$path = '/upload/' . date('Y/md');  // ROOT + $path 

    $path = './upload/' . date('Y/md');   // ？？？
    if(!is_dir(ROOT . $path)) {
        // 不存在，建立目录
        //return mkdir(ROOT . $path, 0777, true) ? $path : false;
        if ( !mkdir(ROOT . $path, 0777, true) ) {
            throw Exception('mkdir failed ');
            return false;
        }
    }
    return $path;
}

/**
* 由文件名获取后缀
*/
function getExt($file) {
    // 用点. 拆开
    $ext = explode('.', $file);
    return end($ext);
}

//缩略图

/**
* 创建等比例缩略图， 2端补白
* @param string $file 原图路径
* @param int $tw 缩略后的宽
* @param int $th 缩略后的高
*/
function makeThumb($file, $tw, $th) {

    //原图信息
    //list($w, $h, $type) = getimagesize(ROOT . '/' . $file);
    list($w, $h, $type) = getimagesize(ROOT . $file);

    if(!$w) { //取原图有问题
        return false;
    }

    //图的类型： gif jpg png bmp
    $func  = array(
        1 => 'imagecreatefromgif' ,
        2 => 'imagecreatefromjpeg' ,
        3 => 'imagecreatefrompng' ,
        6 => 'imagecreatefromwbmp' ,
        );

    if(!isset($func[$type])) {
        return false; //无法处理该类型
    }

    //读取大图, 用数组，下标对应TYPE, 调用相应的打开函数  ----> 函数数组 **
    $big = $func[$type](ROOT . $file);

    //造小画布
    $small = imagecreatetruecolor($tw, $th);
    //$white = imagecolorallocate($small, 218, 218, 218);
    //$white = imagecolorallocate($small, 224, 224, 224);  //#e0e0e0  底色
    $white = imagecolorallocate($small, 238, 238, 238);  //#EEE  底色

    //铺底色
    imagefill($small, 0, 0, $white);

    //得到缩放比例,取小的
    $rate = min($tw / $w , $th / $h);
    $rw = $w * $rate;
    $rh = $h * $rate;

    imagecopyresampled($small, $big, ($tw-$rw)/2, ($th-$rh)/2, 0, 0, $rw, $rh, $w, $h);

    //保存为 png
    $path = $file . '_thumb.png' ;
    imagepng($small, ROOT . $path);

    imagedestroy($big);
    imagedestroy($small);

    return $path;
}

// define('ROOT', 'd:/wamp/wwww/2016/blog/web'); 模拟定义常量 


/* 调试，测试
define('ROOT' , 'd:/wamp/www/20160608--Exercise/blog/web');
makeThumb('/upload/2016/0706/Desert.jpg', 60, 40);
*/

//检测--权限---通过加盐 salt 的COOKIE

function acc() {
    if( ! isset( $_COOKIE['name'] )) {
        return false;
    }

    //名字再计算MD5，salt值在config.php中，并比较cookie中salt值
    return ccode($_COOKIE['name']) === $_COOKIE['salt'] ;
}

//递归转移数组, 转移所有单引号' , 过滤非法字符
function _addslashes($arr) {
    foreach( $arr as $k=>$v ) {
        if(is_string($v)) {
            $arr[$k] = addslashes($v);
            // ？？？ ‘s 号也处理，增加 \ ??
        } else if(is_array($v)) {
            $arr[$k] = _addslashes($v);
        }
    }
    return $arr;
}

//用户名 + 盐 salt
function ccode($name) {
    $cfg = include(ROOT . '/lib/config.php');
    return md5($name . $cfg['salt']);
}

?>