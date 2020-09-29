<?php

function error_handler($ex) {
    //echo "exception: " , $exception->getMessage(), "\n";
    $error = $ex->getMessage();
   try {
    Log::add(" error_handler > $error");
   } catch (\Throwable $th) {}
    require_once(ROOT.'/views/tools/on_error_page.php');
    return true;
}
set_exception_handler('error_handler');

function warning_handler($errno, $errstr, $errfile, $errline) {
    /*echo " error: [$errno] $errstr<br>";
    echo " Error on line $errline in $errfile<br>";*/
    $error = $errstr;
    try {
        Log::add(" warning_handler > $error");
       } catch (\Throwable $th) {}
    require_once(ROOT.'/views/tools/on_error_page.php');
    return true;
}
//set_error_handler("warning_handler");