<?php
/**
 * @author Hanzq
 * @datetime 2017-11-24 16:06
 * @link http://www.cnzxsoft.com/
 * @copyright Copyright &copy; 2017 Rights Reserved 中新网安
 */

namespace core;

class STK
{
    public static $classMap = [];
    public $assign = [];

    public static function run()
    {
        //日志启动
        \core\lib\log::init();
        \core\lib\log::log($_SERVER,'server');

        $route = new \core\lib\route();
        $controllerClass = $route->controller;
        $action = $route->action;
        $ctrollerFile = APP . '/controller/' . $controllerClass . '.php';

        if (is_file($ctrollerFile)) {
            include $ctrollerFile;
            $class = 'app\controller\\' . $controllerClass;
            $controller = new $class;
            $controller->$action();

            \core\lib\log::log('controller:'.$controllerClass.'    '.'action:'.$action);

        } else {
            throw new \Exception('Controller Not found' . $ctrollerFile);
        }
    }

    /**
     * 加载类库
     */
    static public function load($class)
    {
        //自动加载类库
        if (isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);

            $file = ANT . DS . $class . '.php';

            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }


    public function assign($name, $data)
    {
        $this->assign[$name] = $data;
    }

    public function display($filename)
    {
        $file = APP . '/views/' . $filename;

        if (is_file($file)) {
           // extract($this->assign);

            $loader = new \Twig_Loader_Filesystem(APP.'/views');

            $twig = new \Twig_Environment($loader, array(
                'cache' => ANT.'/data/twig',
                'debug' => DEBUG,
            ));

            $template = $twig->load($filename);

            $template->display($this->assign?:'');
            include $file;
        }

    }


}