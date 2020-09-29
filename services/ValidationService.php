<?php

class ValidationService
{

    public static function endsWith($str, $lastString) {
        $count = strlen($lastString);
        if ($count == 0) {
           return true;
        }
        return (substr($str, -$count) === $lastString);
     }

   
}