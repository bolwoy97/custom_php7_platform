<?php

class Log
{
    public static function add($text)
    {
        $dtime = date("Y-m-d H:i:s");  
        $db = Db::getConnection();
        $sql = 'INSERT INTO log (text, date) '
                . 'VALUES (:text, :dtime)';

        $result = $db->prepare($sql);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':dtime', $dtime, PDO::PARAM_STR);
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
          die(__LINE__ . ' Invalid user query: ' . $result->errorInfo());
      }
          return  $success;
      }
      
      public static function getAll(){
        $db = Db::getConnection();

        $sql = "SELECT *  FROM log   ";

        $result = $db->prepare($sql);
        $result->execute();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }


}
