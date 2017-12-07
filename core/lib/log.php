<?php

namespace core\lib;

use core\lib\config;

class log
{
    static $class;
    /**
     * 1.确定日志的存储方式
     * 2.写日志
     */
    public  static function init(){
        //存储方式

        $driver = config::get('driver','log');
        $class = '\core\lib\driver\\'.$driver;

        self::$class = new $class;
    }



    public static function log($name,$file='log'){

        self::$class->log($name,$file);
    }


}