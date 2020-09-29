<?php

class Tg_purchase
{
    public static function add($user, $sum, $adr)
    { 
        $dtime = date("Y-m-d H:i:s");  
        $db = Db::getConnection();
        $sql = 'INSERT INTO tg_purchases (user, sum, adr, date) '
                . 'VALUES (:user, :sum, :adr, :date)';
        $result = $db->prepare($sql);
        $result->bindParam(':user', $user, PDO::PARAM_STR);
        $result->bindParam(':sum', $sum, PDO::PARAM_STR);
        $result->bindParam(':adr', $adr, PDO::PARAM_STR);
        $result->bindParam(':date', $dtime, PDO::PARAM_STR);
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
          die(__LINE__ . ' Invalid tg_purchases query: ' . $result->errorInfo());
      }
          return  $success;
    }


    public static function where($where){
        $db = Db::getConnection();
        $sql = "SELECT *  FROM tg_purchases WHERE $where ";
        $result = $db->prepare($sql);
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }

  

    


}
