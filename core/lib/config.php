<?php

namespace core\lib;

class config
{
    static public $config = [];

    static public function get($name, $file)
    {
        /**
         * 1.判断文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         */

        if(isset(self::$config[$file])){
            return self::$config[$file][$name];
        }else{

            $path = ANT . '/core/config/' . $file . '.php';

            if (is_file($path)) {
                $config = include $path;
                if (isset($config[$name])) {
                    self::$config[$file] = $config;
                    return $config[$name];
                } else {
                    throw new \Exception('没有这个配置项' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

}