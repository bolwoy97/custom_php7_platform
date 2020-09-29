<?php

class Gr_stage
{

    public static function get($num){
        $db = Db::getConnection();

        $sql = 'SELECT *  FROM gr_stages WHERE num = :num ';

        $result = $db->prepare($sql);
        $result->bindParam(':num', $num, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
       
         return $row;
    }

    public static function getAll(){
        $db = Db::getConnection();
        $sql = 'SELECT *  FROM gr_stages ';
        $result = $db->prepare($sql);
        $result->execute();
        while ($row = $result->fetch()) {
            $res[] = $row;
        }
        return $res;
    }

    public static function set($num, $val, $table )
    {
        $db = Db::getConnection();
        $sql = "UPDATE gr_stages 
            SET $table =  :val
            WHERE num = :num";
        $result = $db->prepare($sql);
        $result->bindParam(':val', $val, PDO::PARAM_STR);    
        $result->bindParam(':num', $num, PDO::PARAM_INT); 
        return $result->execute();
    }

    public static function addVal($num, $val , $table )
    {
        $db = Db::getConnection();
        $sql = "UPDATE gr_stages 
            SET $table = $table + :val
            WHERE num = :num";
        $result = $db->prepare($sql);
        $result->bindParam(':val', $val, PDO::PARAM_STR);    
        $result->bindParam(':num', $num, PDO::PARAM_INT); 
        return $result->execute();
    }


    public static function addSum( $sum)
    {
        $Stage = self::get(Option::get('gr_stage'));
        self::addVal($Stage['num'], $sum,'sum');
        $Stage['sum'] += $sum;
        if($Stage['sum']>= $Stage['goal'] && $Stage['num']<4){
            Option::set('gr_stage',Option::get('gr_stage')+1);
            $diff = $Stage['sum'] - $Stage['goal'];
            $dtime = date("Y-m-d H:i:s");
            self::addVal($Stage['num'], -$diff,'sum');
            self::set($Stage['num'], $dtime,'end');
            $Stage = self::get(Option::get('gr_stage'));//update stage
            self::addVal($Stage['num'], $diff,'sum');
            self::set($Stage['num'], $dtime,'start');
        }
    }

}
