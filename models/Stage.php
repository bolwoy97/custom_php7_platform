<?php

class Stage
{

    

    public static function get($num){
        $db = Db::getConnection();

        $sql = 'SELECT *  FROM stages WHERE num = :num ';

        $result = $db->prepare($sql);
        $result->bindParam(':num', $num, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
       
         return $row;
    }

    public static function set($num, $val, $table )
    {
        $db = Db::getConnection();
        $sql = "UPDATE stages 
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
        $sql = "UPDATE stages 
            SET $table = $table + :val
            WHERE num = :num";
        $result = $db->prepare($sql);
        $result->bindParam(':val', $val, PDO::PARAM_STR);    
        $result->bindParam(':num', $num, PDO::PARAM_INT); 
        return $result->execute();
    }


    public static function addSum( $sum)
    {
        $Stage = Data::curStage();
        Stage::addVal($Stage['num'], $sum,'sum');
        $Stage['sum'] += $sum;
        if($Stage['sum']>= $Stage['goal']){
            Option::set('stage',Option::get('stage')+1);
            $diff = $Stage['sum'] - $Stage['goal'];
            $dtime = date("Y-m-d H:i:s");
            Stage::addVal($Stage['num'], -$diff,'sum');
            Stage::set($Stage['num'], $dtime,'end');
            $Stage = Data::curStage();//update stage
            Stage::addVal($Stage['num'], $diff,'sum');
            Stage::set($Stage['num'], $dtime,'start');
        }

    }

}
