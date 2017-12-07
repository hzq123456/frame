<?php

namespace core\lib;

class route
{
    public $controller;

    public $action;

    public function __construct()
    {


        /**
         * 1.隐藏index.php
         * 2.获取URL 参数部分
         * 3.返回对应控制器和方法
         */

        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode('/', trim($path, '/'));

            if (isset($pathArr[0])) {
                $this->controller = $pathArr[0].'Controller';
                unset($pathArr[0]);
            }
            if (isset($pathArr[1])) {
                $this->action = $pathArr[1].'Action';
                unset($pathArr[1]);
            } else {
                $this->action = 'index';
            }
            //url多余部分转换成 GET
            for ($i = 2; $i <= count($pathArr); $i = $i + 2) {
                $_GET[$pathArr[$i]] = $pathArr[$i + 1];
            }

        } else {
            $this->controller = 'indexController';
            $this->action = 'indexAction';
        }


    }


}