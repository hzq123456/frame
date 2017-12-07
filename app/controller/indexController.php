<?php
namespace app\controller;

use core\lib\model;

class indexController extends \core\STK {

    public function indexAction(){

//        $model = new model();
//
//        $data = $model->select('users_copy','*');
//
//        p($data);

       $data = "hello world";
//        $tmp = \core\lib\config::get('controller','route');
//        $tmp = \core\lib\config::get('action','route');
//
//        p($tmp);
        $this->assign('data',$data);



        $this->display('index.php');


//        $model = new \core\lib\model();
//        $sql = "select * from users_copy";
//
//        $ret = $model->query($sql);
//        p($ret->fetchAll());
    }
}

