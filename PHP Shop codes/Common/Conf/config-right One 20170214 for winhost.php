<?php
return array(
	//'配置项'=>'配置值'
	    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'my04.winhost.com', // 服务器地址
    'DB_NAME'               =>  'mysql_110658_shop',          // 数据库名
    'DB_USER'               =>  'myshop',      // 用户名
    'DB_PWD'                =>  'JmBcit2015',          // 密码
    'DB_PORT'               =>  '',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    

    'LOG_RECORD'            => true,        // 默认不记录日志
    'DB_SQL_LOG' 			=> true,
    'URL_PATHINFO_DEPR'     => '/',    //可能有问题 ？？？？？？？？？？？？

    'COO_KEY'               => '*&^*KFJDS(*&(',
    'v_mid'                 => '20272562',
    'v_url'                 => 'http://shop.com',
    'v_key'                 => '#($)*%(#)W(I_)OFD:L3465',

    'URL_MODEL'             => 1,           //  1: normal ;  2 : 使U函数自动生成的链接（url）中没有index.php, 重写模式 rewrite

    // 2： 正则匹配，重写，正则反向引用重写，把假地址翻译成真地址
    // Apache 需要配置，和 .htaccess (放在根目录) 文件书写匹配规则。********************
    // 当然有真实的目录和文件，优先级更高！ 
    // 2 ：TP 的U 函数，生成地址时，也会 匹配，去掉 index.php 
    // TP，Apache和.htaccess ， 三者配合！！！
    
    // 3 兼容模式  s=/xx/xx/...

    //'URL_MODEL'             => 1,           // 利用在$_SERVER中 [pathinfo] 信息 改为： /xx/xxx/xxx/ 方式 
    
    // Apache 支持 pathinfo  ， 而 Nginx 不支持
    
    //'URL_MODEL'             => 0,           //普通模式，& ？ 等常规模式
);


