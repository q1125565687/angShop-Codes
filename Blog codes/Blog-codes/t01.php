<?php 

require('./lib/init.php');

    // 1. 造画布
	$w = 90;
	$h = 35;
    $im = imagecreatetruecolor($w, $h);

    // 2. 造颜料
    $red = imagecolorallocate($im, 255, 0, 0);
    $gray = imagecolorallocate($im, 150, 150, 150);
    $white = imagecolorallocate($im, 255, 255, 255);
    $yellow = imagecolorallocate($im, 0, 255, 255);

    // 3. 铺底色和写字
    imagefill($im, 0, 0, $gray);

    imagefilledrectangle ( $im , 1 , 1 , $w-2 , $h-2, $yellow );

    imagesetpixel ( $im , 0 , 0 , $white );
    imagesetpixel ( $im , 0 , 1 , $white );
    imagesetpixel ( $im , 1 , 0 , $white );
    imagesetpixel ( $im , 1 , 1 , $gray );

	imagesetpixel ( $im , $w-1 , $h-1 , $white );
	imagesetpixel ( $im , $w-2 , $h-1 , $white );
	imagesetpixel ( $im , $w-1 , $h-2 , $white );
	imagesetpixel ( $im , $w-2 , $h-2 , $gray );


 	imagesetpixel ( $im , 0 , $h-1 , $white );
    imagesetpixel ( $im , 1 , $h-1 , $white );
    imagesetpixel ( $im , 0 , $h-2 , $white );
    imagesetpixel ( $im , 1 , $h-2 , $gray );


	imagesetpixel ( $im , $w-1 , 0 , $white );
	imagesetpixel ( $im , $w-2 , 0 , $white );
	imagesetpixel ( $im , $w-1 , 1 , $white );
	imagesetpixel ( $im , $w-2 , 1 , $gray );

    imagestring($im, 5, 20, 7, randStr(4), $red);

    // 4. 输出
    header('content-type: image/png');
    //imagepng($im, "./yzm.png");
    imagepng($im);


    // 5. 销毁
    imagedestroy($im);


//header('Location: login.php');


?>