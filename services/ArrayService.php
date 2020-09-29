<?php

class ArrayService
{

    public static function sumValues($myArray){
        $sumArray = array();
        foreach ($myArray as $k=>$subArray) {
        foreach ($subArray as $id=>$value) {
            $sumArray[$id]+=$value;
            }
        }
        return $sumArray;
    }

   
}