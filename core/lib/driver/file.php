<?php

namespace core\lib\driver;


use core\lib\config;

class file
{
    public $path;

    public function __construct()
    {
        $option = config::get('option', 'log');

        $this->path =$option['path'];// '/home/vagrant/Code/myframe/data/';
    }

    public  function log($data, $file = 'log')
    {
        /**
         * 1.确定文件存储位置是否存在
         * 新建目录
         * 2.写入日志
         */

        if (!is_dir($this->path)) {
            mkdir($this->path, '0777', true);
        }

        if(!is_writable($this->path)){
            throw new \Exception('data 目录不可写！');
        }

        return  file_put_contents($this->path.'/'.$file.'-'.date('Y-m-d').'.log', date('Y-m-d H:i:s').json_encode($data).PHP_EOL,FILE_APPEND);

    }


}