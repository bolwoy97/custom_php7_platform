<?php

class Withdrawal
{
    /*public static function add($date,$user, $cur, $sum, $address, $hash='', $rate=1, $status='unactive',$orig = 'bon')
    {
        $stage = Option::get('stage');
        $db = Db::getConnection();
        $sql = 'INSERT INTO withdrawal (date,  user, orig, cur, sum, address,status, hash, rate, stage) '
                            . 'VALUES (:date, :user, :orig, :cur,  :sum, :address,:status, :hash, :rate, :stage)';
        $result = $db->prepare($sql);
        $result->bindParam(':user', $user, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':orig', $orig, PDO::PARAM_STR);
        $result->bindParam(':cur', $cur, PDO::PARAM_STR);
        $result->bindParam(':sum', $sum, PDO::PARAM_STR);
        $result->bindParam(':address', $address, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        $result->bindParam(':hash', $hash, PDO::PARAM_STR);
        $result->bindParam(':rate', $rate, PDO::PARAM_STR);
        $result->bindParam(':stage', $stage, PDO::PARAM_STR);
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
            //$_SESSION['errors'] = $result->errorInfo();
            
          die(__LINE__ . ' Invalid user query: ' . $result->errorInfo());
        }
          return  $success;
    } */

    public static function addFromArray($params)
    {
        if(!isset($params['rate'])){$params['rate']=1;}
        if(!isset($params['status'])){$params['status']='unactive';}
        if(!isset($params['orig'])){$params['orig']='bon';}
        if(!isset($params['stage'])){$params['stage']=Option::get('stage');}
        if(!isset($params['fee'])){$params['fee']=0;}

        $db = Db::getConnection();
        $sql = "INSERT INTO withdrawal ( ";
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
            
          die(__LINE__ . 'withdrawal addFromArray error: ' . $result->errorInfo());
        }
          return  $success;
    }

    public static function get($id){
        $db = Db::getConnection();
        $sql = 'SELECT *  FROM withdrawal WHERE id = :id ORDER BY id DESC';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();
        return $row = $result->fetch();
    }

    public static function getByHash($hash){
        $db = Db::getConnection();
        $sql = 'SELECT *  FROM withdrawal WHERE hash = :hash ';
        $result = $db->prepare($sql);
        $result->bindParam(':hash', $hash, PDO::PARAM_STR);
        $result->execute();
        return  $result->fetch();
    }

    public static function getByUser($id){
        $db = Db::getConnection();
        $sql = 'SELECT *  FROM withdrawal WHERE user = :id ORDER BY id DESC';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }

    /* public static function getByStatus($status){
        $db = Db::getConnection();
        $sql = "SELECT *  FROM withdrawal WHERE status = :status AND orig != 'tok' ORDER BY id DESC";
        $result = $db->prepare($sql);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }

   public static function getSalesByStatus($status){
        $db = Db::getConnection();
        $sql = "SELECT *  FROM withdrawal WHERE status = :status AND orig = 'tok' ORDER BY id DESC";
        $result = $db->prepare($sql);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }*/


    public static function setVal($id, $val, $table)
    {
        //var_dump($table);exit;
        $db = Db::getConnection();
        $sql = "UPDATE withdrawal 
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

    public static function getAll(){
        $db = Db::getConnection();
        $sql = "SELECT * FROM withdrawal WHERE status='pending' OR status='canceled' OR status='confirmed' ORDER BY id DESC  ";
        $result = $db->prepare($sql);
        //$result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
         return $res;
      }

      public static function getLast($id, $lim='all'){
        $db = Db::getConnection();
        $sql = "SELECT * FROM withdrawal  WHERE user = :id AND (status='pending' OR status='canceled' OR status='confirmed') ORDER BY id DESC ";
        if($lim!='all'){
            $sql .= "LIMIT $lim";
          }
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
         return $res;
      }

      public static function sumBy_Id_Orig_Stage($id, $orig){
        $db = Db::getConnection();
        $sql = "SELECT SUM(`sum`) FROM `withdrawal` WHERE user= :id AND orig=:orig AND (status='confirmed' OR status='pending')";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR); 
        $result->bindParam(':orig', $orig, PDO::PARAM_STR);  
        //$result->bindParam(':stage', $stage, PDO::PARAM_STR); 
        $result->execute();
        return  $result->fetch()[0];
      }

      /*public static function where($where){
        $db = Db::getConnection();
        $sql = "SELECT *  FROM withdrawal WHERE ";
        foreach ($where as  $k => $param) {
            $sql .= " $param[0] $param[1] :$param[0] ";
            if($k<count($where)-1){$sql .= ' AND ';}
        } 
        $sql .= " ORDER BY id DESC";
        $result = $db->prepare($sql);
        foreach ($where as $k => $param){
            $result->bindParam(":$param[0]", $where[$k][2], PDO::PARAM_STR);
        }
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }*/

    public static function where($where){
        $db = Db::getConnection();
        $sql = "SELECT *  FROM withdrawal WHERE $where ORDER BY id DESC";
        //echo $sql;exit;
        $result = $db->prepare($sql);
        $result->execute();
        return Model::data_from_res($result);
      }

    public static function all(){
        $db = Db::getConnection();
        $sql = "SELECT *  FROM withdrawal ORDER BY id DESC";
        $result = $db->prepare($sql);
        $result->execute();
        return Model::data_from_res($result);
    }

    public static function delete($id)
    {
        $db = Db::getConnection();
        $sql = "DELETE FROM withdrawal WHERE id = :id";
        $result = $db->prepare($sql);                                  
        $result->bindParam(':id', $id, PDO::PARAM_STR);     
        return $result->execute();
    }



}
