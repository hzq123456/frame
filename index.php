<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 **/

define('DS','/');
define('ANT',realpath(''));
define('CORE',ANT.DS.'core');
define('VENDOR',ANT.DS.'vendor');
define('APP',ANT.DS.'app');
define('MODULE','app');

define('DEBUG',true);

include "vendor/autoload.php";

if(DEBUG){
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    ini_set('display_errors','on');
}else{
    ini_set('display_errors','off');
}

include CORE.DS.'common/function.php';

include CORE.DS.'STK.php';

spl_autoload_register('\core\STK::load');

\core\STK::run();



