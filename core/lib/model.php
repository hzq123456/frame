<?php

namespace core\lib;

class model extends \Medoo\Medoo
{

    public function __construct()
    {

        $option = [
            'database_type' => 'mysql',
            'database_name' => 'ant',
            'server' => 'localhost',
            'username' => 'homestead',
            'password' => 'secret',
            'charset' => 'utf8'
        ];
        parent::__construct($option);
//        $dsn = 'mysql:host=localhost;dbname=ant';
//        $username = 'homestead';
//        $passwd = 'secret';
//
//        try {
//            parent::__construct($dsn, $username, $passwd);
//        } catch (\PDOException $e) {
//            p($e->getMessage());
//        }

    }


}