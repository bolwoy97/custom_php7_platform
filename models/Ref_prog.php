<?php

class Ref_prog
{
    

      public static function addFromArray($params)
      {
          //if(!isset($params['rate'])){$params['rate']=1;}
          $db = Db::getConnection();
          $sql = "INSERT INTO ref_programs ( ";
          $k = 0;
          foreach ($params as $key => $value) {
              $sql .= " $key ";
              $k++;
              if($k<count($params)){$sql .= ' , ';}
          }
          $sql .= " ) VALUES ( ";
          $k = 0;
          foreach ($params as $key => $value) {
              $sql .= " :$key ";
              $k++;
              if($k<count($params)){$sql .= ' , ';}
          }
          $sql .= " )";
          $result = $db->prepare($sql);
          foreach ($params as $key => $value){
              $result->bindParam(":$key", $params[$key], PDO::PARAM_STR);
          }
          $success = $result->execute();
          if (!$success) {
              var_dump($result->errorInfo());
              
            die(__LINE__ . ' ref_programs addFromArray error: ' . $result->errorInfo());
          }
            return  $success;
      }

      
    public static function where($where){
        $db = Db::getConnection();
        $sql = "SELECT *  FROM ref_programs WHERE $where ORDER BY id DESC";
        //echo $sql;exit;
        $result = $db->prepare($sql);
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
      }

    public static function all(){
        $db = Db::getConnection();
        $sql = "SELECT *  FROM ref_programs ORDER BY id DESC";
        $result = $db->prepare($sql);
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }

    public static function setVal($id, $val, $table)
    {
        $db = Db::getConnection();
        $sql = "UPDATE ref_programs 
            SET $table =  :val
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':val', $val, PDO::PARAM_STR);    
        $result->bindParam(':id', $id, PDO::PARAM_INT); 
        $success = $result->execute();
        if (!$success){
            var_dump($result->errorInfo());
            die(__LINE__ . ' Invalid query: ' . $result->errorInfo());
        }
          return  $success;
    }


}
