<?php

class Db
{
    public static function getConnection()
    {
        if(!isset($GLOBALS['db'])){
            $paramsPath = ROOT . '/config/db_params.php';
            $params = include($paramsPath);
            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
            $db = new PDO($dsn, $params['user'], $params['password']);
            $db->exec("set names utf8");
            $GLOBALS['db'] = $db;
            //
            $sql = "SELECT @@GLOBAL.sql_mode";
            $result = $db->prepare($sql);
            $result->execute();
            $res= $result->fetch();
            if($res != 'NO_ENGINE_SUBSTITUTION'){
                $db->exec("set global sql_mode='NO_ENGINE_SUBSTITUTION'");
            }
            //
        }else{
            $db = $GLOBALS['db'] ; 
        }
        
        return $db;
    }


}
