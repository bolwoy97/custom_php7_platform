<?php

class Option
{
    public static function add($name, $value)
    { 
        $db = Db::getConnection();
        $sql = 'INSERT INTO options (name, value) '
                . 'VALUES (:name, :value)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':value', $value, PDO::PARAM_STR);
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
          die(__LINE__ . ' Invalid Option query: ' . $result->errorInfo());
      }
          return  $success;
    }

    public static function get($name){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM options WHERE name = :name ';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        return $row['value'];
    }

    public static function set($name, $value){ 
        if(self::get($name)!==null){
            return self::setVal($name, $value);
        }
        return self::add($name, $value);
    }

    public static function setVal($name, $value){ 
        $db = Db::getConnection();
        $sql = "UPDATE options 
            SET value = :value 
            WHERE name = :name";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name , PDO::PARAM_STR);    
        $result->bindParam(':value', $value  , PDO::PARAM_STR);
        //$res = $result->execute();
        return  $result->execute();
    }

    public static function addVal($name, $val , $table='value' )
    {
        $db = Db::getConnection();
        $sql = "UPDATE options 
            SET $table = $table + :val
            WHERE name = :name";
        $result = $db->prepare($sql);
        $result->bindParam(':val', $val, PDO::PARAM_STR);    
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();
    }

    


}
