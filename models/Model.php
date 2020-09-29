<?php

class Model
{
    public static function data_from_res($result){
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }

}
