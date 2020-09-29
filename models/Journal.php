<?php

class Journal
{
    public static function add($type,$user,$sum,$date,$name,$rate,$status,$lvl, $cur='',$detail='', $adr='' , $stage='')
    {
      if($stage==''){
        $stage = Option::get('stage');
      }
        $db = Db::getConnection();
        $sql = 'INSERT INTO journal ( type, user, sum, date, name, rate, status, lvl, cur, detail, adr, stage) '
                            .'VALUES (:type,:user,:sum,:date,:name,:rate,:status , :lvl, :cur, :detail, :adr, :stage)';
        $result = $db->prepare($sql);
        $result->bindParam(':type', $type, PDO::PARAM_STR);
        $result->bindParam(':user', $user, PDO::PARAM_STR);
        $result->bindParam(':sum', $sum, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':rate', $rate, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        $result->bindParam(':lvl', $lvl, PDO::PARAM_STR);
        $result->bindParam(':cur', $cur, PDO::PARAM_STR);
        $result->bindParam(':detail', $detail, PDO::PARAM_STR);
        $result->bindParam(':adr', $adr, PDO::PARAM_STR);
        $result->bindParam(':stage', $stage, PDO::PARAM_STR);
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
            //$_SESSION['errors'] = $result->errorInfo();
            
          die(__LINE__ . '  journal add error: ' . $result->errorInfo());
        }
          return  $success;
    } 

    public static function delete($id)
    {
        $db = Db::getConnection();
        
        $sql = "DELETE FROM journal WHERE id = :id";
        
        $result = $db->prepare($sql);                                  
        $result->bindParam(':id', $id, PDO::PARAM_STR); 
        return $result->execute();
    }

    public static function addFromArray($params)
    {
        if(!isset($params['stage'])){$params['stage']=Option::get('stage');}
        
        $db = Db::getConnection();
        $sql = "INSERT INTO journal ( ";
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
            
          die(__LINE__ . '  journal addFromArray error: ' . $result->errorInfo());
        }
          return  $success;
    }

    public static function checkBatch($id, $batch){
      $db = Db::getConnection();
      $sql = 'SELECT *  FROM journal WHERE user = :id AND detail = :batch ';
      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_STR);
      $result->bindParam(':batch', $batch, PDO::PARAM_STR);
      $result->execute();
     
      return $result->fetch();
  }

  public static function getByType($type){
    $db = Db::getConnection();
    $sql = 'SELECT *  FROM journal WHERE  type = :type ORDER BY id DESC';
    $result = $db->prepare($sql);
    $result->bindParam(':type', $type, PDO::PARAM_STR);
    $result->execute();
    $res =array();
    while ($row = $result->fetch()) {   
      $res[] = $row;
    }
    return $res;
  }
    public static function getByIdType($id, $type){
      $db = Db::getConnection();
      $sql = 'SELECT *  FROM journal WHERE user = :id AND type = :type ORDER BY id DESC';
      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_STR);
      $result->bindParam(':type', $type, PDO::PARAM_STR);
      $result->execute();
      $res =array();
      while ($row = $result->fetch()) {   
        $res[] = $row;
      }
      return $res;
  }

  public static function getEarnings($id){
    $db = Db::getConnection();
    $earns = ['tok'=>0,'bon'=>0,'btc'=>0,'bch'=>0,'eth'=>0,'usd'=>0];

    $sql = "SELECT SUM(sum) FROM journal WHERE user = :id AND type = 'usd_to_tok'  ";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $result->execute();
    $earns['tok'] += $result->fetch()[0];
    //////
    $sql = "SELECT SUM(sum) FROM journal WHERE user = :id AND type = 'bon'  ";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $result->execute();
    $earns['bon'] += $result->fetch()[0];
    //////
    $sql = "SELECT SUM(sum) FROM journal WHERE user = :id AND  type = 'add' AND  cur = 'btc' ";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $result->execute();
    $earns['btc'] += $result->fetch()[0];
    //////
    $sql = "SELECT SUM(sum) FROM journal WHERE user = :id AND  type = 'add' AND  cur = 'bch' ";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $result->execute();
    $earns['bch'] += $result->fetch()[0];
    //////
    $sql = "SELECT SUM(sum) FROM journal WHERE user = :id AND  type = 'add' AND  cur = 'eth' ";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $result->execute();
    $earns['eth'] += $result->fetch()[0];
    //////
    $sql = "SELECT SUM(sum) FROM journal WHERE user = :id AND ( type = 'add' OR type = 'adm_add') AND  cur = 'usd' ";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $result->execute();
    $earns['usd'] += $result->fetch()[0];

    return $earns;
}


  public static function last($id, $lim='all'){
    $db = Db::getConnection();
    $sql = "SELECT *  FROM journal WHERE user = :id AND (type = 'usd_to_tok' OR 
    type = 'bon' OR type = 'add' OR type = 'adm_add' OR type = 'ref_prog_bon' OR type = 'tg_pur' 
    OR type = 'partner_prog_bon') ORDER BY id DESC ";
    if($lim!='all'){
      $sql .= " LIMIT $lim";
    }
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $result->execute();
    return Model::data_from_res($result);
}

public static function lastByType($id, $type, $lim='all'){
  $db = Db::getConnection();
  $sql = "SELECT *  FROM journal WHERE user = :id AND type = :type  ORDER BY id DESC ";
  if($lim!='all'){
    $sql .= " LIMIT $lim";
  }
  $result = $db->prepare($sql);
  $result->bindParam(':id', $id, PDO::PARAM_STR);
  $result->bindParam(':type', $type, PDO::PARAM_STR);
  $result->execute();
  $res =array();
  while ($row = $result->fetch()) {   
    $res[] = $row;
  }
  return $res;
}


public static function setVal($id, $val, $table )
{
    $db = Db::getConnection();
    $sql = "UPDATE journal 
        SET $table =  :val
        WHERE id = :id";
    $result = $db->prepare($sql);
    $result->bindParam(':val', $val, PDO::PARAM_STR);    
    $result->bindParam(':id', $id, PDO::PARAM_INT); 
    return $result->execute();
}


public static function countSumByType($type)
{
    $db = Db::getConnection();
    $sql = "SELECT SUM(sum) FROM journal 
        WHERE type = :type";
    $result = $db->prepare($sql);
    $result->bindParam(':type', $type, PDO::PARAM_STR);  
    $result->execute();
     
    return $result->fetch();
}

public static function getRealAdditions(){
  $db = Db::getConnection();
  $sql = "SELECT *  FROM journal WHERE type = 'add'  ORDER BY id DESC ";
  $result = $db->prepare($sql);
  $result->execute();
  $res =array();
  while ($row = $result->fetch()) {   
    $res[] = $row;
  }
  return $res;
}

public static function getAdmAdditions(){
  $db = Db::getConnection();
  $sql = "SELECT *  FROM journal WHERE type = 'adm_add'  ORDER BY id DESC ";
  $result = $db->prepare($sql);
  $result->execute();
  $res =array();
  while ($row = $result->fetch()) {   
    $res[] = $row;
  }
  return $res;
}

public static function getTokForSale($id, $type, $stage){
  $db = Db::getConnection();
  $sql = "SELECT SUM(`sum`) FROM `journal` WHERE user= :id AND type = :type AND stage < :stage  ";
  $result = $db->prepare($sql);
  $result->bindParam(':id', $id, PDO::PARAM_STR); 
  $result->bindParam(':type', $type, PDO::PARAM_STR);
  $result->bindParam(':stage', $stage, PDO::PARAM_STR); 
  $result->execute();
  return  $result->fetch()[0];
}

/*
public static function sumBy_Id_Type_Detail($id, $type, $detail){
  $db = Db::getConnection();
  $sql = "SELECT SUM(`sum`) FROM `journal` WHERE user= :id AND type = :type AND detail = :detail";
  $result = $db->prepare($sql);
  $result->bindParam(':id', $id, PDO::PARAM_STR); 
  $result->bindParam(':type', $type, PDO::PARAM_STR);
  $result->bindParam(':detail', $detail, PDO::PARAM_STR); 
  $result->execute();
  return  $result->fetch()[0];
}*/


public static function where($where){
  $db = Db::getConnection();
  $sql = "SELECT *  FROM journal WHERE $where ORDER BY id DESC";
  //echo $sql;exit;
  $result = $db->prepare($sql);
  $result->execute();
  return Model::data_from_res($result);
}

public static function all(){
  $db = Db::getConnection();
  $sql = "SELECT *  FROM journal ORDER BY id DESC";
  $result = $db->prepare($sql);
  $result->execute();
  return Model::data_from_res($result);
}


}
