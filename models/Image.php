<?php

class Image
{
    public static function add($params)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO images (name, type ,src) '
                . "VALUES (:name, :type ,'{$params['src']}')";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $params['name'], PDO::PARAM_STR);
        $result->bindParam(':type', $params['type'], PDO::PARAM_STR);
        //$result->bindParam(':src', $src, PDO::PARAM_STR);
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
          die(__LINE__ . ' Invalid images query: ' . $result->errorInfo());
      }
          return  $success;
      }

      public static function updateBy($params, $byTable ,$byVal)
    {
        $db = Db::getConnection();
        $sql = "UPDATE  images SET name=:name, type=:type ,src='{$params['src']}' "
                . "WHERE $byTable = :byVal";
        //echo $sql;exit;
        $result = $db->prepare($sql);
        $result->bindParam(':name', $params['name'], PDO::PARAM_STR);
        $result->bindParam(':type', $params['type'], PDO::PARAM_STR);
        $result->bindParam(':byVal', $byVal, PDO::PARAM_STR);
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
          die(__LINE__ . ' Invalid images update query: ' . $result->errorInfo());
      }
          return  $success;
      }
      
      public static function where($where){
        $db = Db::getConnection();

        $sql = "SELECT *  FROM images WHERE $where ";

        $result = $db->prepare($sql);
        $result->execute();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }


}
