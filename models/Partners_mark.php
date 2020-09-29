<?php

class Partners_mark
{
    public static function addFromArray($params)
    {

        $db = Db::getConnection();
        $sql = "INSERT INTO partners_marks ( ";
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
        //echo $sql;exit;
        $result = $db->prepare($sql);
        foreach ($params as $key => $value){
            $result->bindParam(":$key", $params[$key], PDO::PARAM_STR);
        }
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
            //$_SESSION['errors'] = $result->errorInfo();
            
          die(__LINE__ . 'partners_marks addFromArray error: ' . $result->errorInfo());
        }
          return  $success;
    }

    public static function where($where){
        $db = Db::getConnection();
        $sql = "SELECT * FROM partners_marks WHERE $where ";
        //echo $sql;exit;
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
        //var_dump($id);exit;
        $db = Db::getConnection();
        $sql = "UPDATE partners_marks 
            SET $table =  :val
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':val', $val, PDO::PARAM_STR);    
        $result->bindParam(':id', $id, PDO::PARAM_INT); 
       
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
          die(__LINE__ . ' Invalid query: ' . $result->errorInfo());
      }
          return  $success;
    }

}
