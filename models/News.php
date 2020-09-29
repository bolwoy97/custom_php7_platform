<?php

class News
{
    public static function add( $title, $teaser, $text, $img = "")
    {
        $date = date("Y-m-d H:i:s");  
        $db = Db::getConnection();
        $sql = 'INSERT INTO news (date, title, teaser, text, img) '
                . 'VALUES (:date, :title, :teaser, :text, :img)';

        $result = $db->prepare($sql);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':teaser', $teaser, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':img', $img, PDO::PARAM_STR);
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
          die(__LINE__ . ' Invalid user query: ' . $result->errorInfo());
      }
          return  $success;
      }  
      
      public static function get($id){
        $db = Db::getConnection();
        $sql = "SELECT * FROM news  WHERE id = :id ";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT); 
        $result->execute();
        return $row = $result->fetch();
    }

      public static function getAll(){
        $db = Db::getConnection();
        $sql = "SELECT *  FROM news   ORDER BY id DESC "; 
        $result = $db->prepare($sql);
        $result->execute();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }

    public static function getLast($lim){
        $db = Db::getConnection();
        $sql = "SELECT *  FROM news ORDER BY id DESC LIMIT $lim "; 
        $result = $db->prepare($sql);
        $result->execute();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }

    public static function setVal($id, $val, $table )
    {
        $db = Db::getConnection();
        $sql = "UPDATE news 
            SET $table =  :val
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':val', $val, PDO::PARAM_STR);    
        $result->bindParam(':id', $id, PDO::PARAM_INT); 
        return $result->execute();
    }

    public static function update($id, $title, $teaser, $text )
    {
        $db = Db::getConnection();
        $sql = "UPDATE news 
            SET title =  :title, teaser =  :teaser, text =  :text
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':teaser', $teaser, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT); 
        return $result->execute();
    }

    public static function delete($id)
    {
        $db = Db::getConnection();
        $sql = "DELETE FROM news 
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT); 
        return $result->execute();
    }

}
