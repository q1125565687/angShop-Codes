<?php


    if(getenv('HTTP_X_FORWARDED_FOR') ) {
        $realip = getenv('HTTP_X_FORWARDED_FOR') ;
    } elseif (getenv('HTTP_CLIENT_IP') ) {
        $realip = getenv('HTTP_CLIENT_IP') ;
    } else {
        $realip = getenv('REMOTE_ADDR') ;
    }


echo $realip;

if ($realip === '127.0.0.1')
     echo "string";
else
     echo "string nn ";
?> 