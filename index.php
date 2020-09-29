<?php
// FRONT CONTROLLER

date_default_timezone_set('Europe/Kiev');
session_start();
define('ROOT', dirname(__FILE__));
ini_set("log_errors", 0);
ini_set('memory_limit', '200M');
define("IMG_ROOT", "upload/");

define("START", microtime(true));



	/*
	-- ENV_TYPE
	options:
	* local
	* serv

    */
    if($_SERVER['SERVER_ADDR']=='127.0.0.1'){
        define('ENV_TYPE', 'local');
    }else{
        define('ENV_TYPE', 'serv');
    }
    

require_once(ROOT.'/components/ENV.php');
require_once(ROOT.'/components/Autoload.php');
require_once(ROOT.'/components/ErrorHandling.php');

/*if(!isset($_SESSION['errors'])){
    $_SESSION['errors'] = ['Ведутся технические работы.'];
}*/

// Вызов Router
try{
    Router::run();
}catch(\Throwable $ex){
    error_handler($ex); //from ErrorHandling.php
}

 


