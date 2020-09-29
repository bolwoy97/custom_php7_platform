<?php

class Deposit
{
    public static function add($type,$user,$sum)//,$turnover,$start,$end,$status,$name,$rate
    {
        $typeId = $type['id'];
        $start = date("Y-m-d H:i:s");
        $last = date("Y-m-d");
        $db = Db::getConnection();
        $sql = 'INSERT INTO deposits (type,user,sum,start,last) '
                            .'VALUES (:typeId,:user,:sum,:start, :last)';
        $result = $db->prepare($sql);
        $result->bindParam(':typeId', $typeId, PDO::PARAM_STR);
        $result->bindParam(':user', $user, PDO::PARAM_STR);
        //$result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sum', $sum, PDO::PARAM_STR);
        $result->bindParam(':start', $start, PDO::PARAM_STR);
        $result->bindParam(':last', $last, PDO::PARAM_STR);
        $success = $result->execute();
        if (!$success) {
            var_dump($result);
            var_dump($result->errorInfo());
          die(__LINE__ . ' Invalid Deposit query: ' . $result->errorInfo());
      }
          return  $success;
    }

    public static function get($id){
      $db = Db::getConnection();
      $sql = "SELECT * FROM deposits WHERE user = :id AND end = '0000-00-00' ORDER BY start  ";
      $result = $db->prepare($sql);
      $result->bindParam(':id', $id, PDO::PARAM_INT);
      $result->execute();
      $res = array();
      while ($row = $result->fetch()) {
          $res[] = $row;
       }
       return $res;
    }

    public static function getClosedById($id){
        $db = Db::getConnection();
        $sql = "SELECT * FROM deposits WHERE user = :id AND end != '0000-00-00' ORDER BY end  ";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
         return $res;
      }


    public static function getActive(){
      $db = Db::getConnection();
      $sql = "SELECT * FROM deposits WHERE end = '0000-00-00'  ";
      $result = $db->prepare($sql);
      //$result->bindParam(':id', $id, PDO::PARAM_INT);
      //$result->bindParam(':date', $date, PDO::PARAM_STR);
      $result->execute();
      $res = array();
      while ($row = $result->fetch()) {
          $res[] = $row;
       }
       return $res;
    }

    public static function getActiveSum($id){
        $db = Db::getConnection();
        $sql = "SELECT SUM(`sum`) FROM deposits WHERE user = :id AND end = '0000-00-00' ";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        //$result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        
         return $res[0][0];
      }

    public static function checkDepExists($user, $type){
      $db = Db::getConnection();
      $sql = 'SELECT * FROM deposits WHERE user = :user AND type = :type ';
      $result = $db->prepare($sql);
      $result->bindParam(':user', $user, PDO::PARAM_INT);
      $result->bindParam(':type', $type, PDO::PARAM_INT);
      $result->execute();
      $res = false;
      while ($row = $result->fetch()) {
          $res[] = $row;
       }
      // var_dump($res);exit;
       return $res;
    }

    public static function checkDepBelongsUser($user, $id){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM deposits WHERE user = :user AND id = :id ';
        $result = $db->prepare($sql);
        $result->bindParam(':user', $user, PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $res = false;
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        // var_dump($res);exit;
         return $res;
      }

    public static function setVal($id, $val, $table)
    {
        $db = Db::getConnection();
        $sql = "UPDATE deposits 
            SET $table =  :val
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':val', $val, PDO::PARAM_STR);    
        $result->bindParam(':id', $id, PDO::PARAM_INT); 
        return $result->execute();
    }

    public static function addVal($id, $val , $table )
    {
        $db = Db::getConnection();
        $sql = "UPDATE deposits 
            SET $table = $table + :val
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':val', $val, PDO::PARAM_STR);    
        $result->bindParam(':id', $id, PDO::PARAM_INT); 
        return $result->execute();
    }

    public static function checkDeposits($id )
    {
        $dtime = date("Y-m-d H:i:s");
        $usr = User::getUserInfo($id);
        $deps = Deposit::get($usr['id']);
        if(empty($deps)){
            User::setVal($usr['id'], 0, 'accrs');
        }else{
            foreach ($deps as $k => $dep) {
                $usr = User::getUserInfo($usr['id']);
                $per400 = $dep['sum']*4;
               if($usr['accrs'] >= $per400){
                    User::addVal($usr['id'], -$per400, 'accrs');
                    $date = date("Y-m-d");
                    Deposit::setVal($dep['id'],$date,'end');
                    Journal::add('oper',$usr['id'],$dep['sum'],$dtime,'Deposit '.$dep['start'].' closed ',0,$dep['sum'],0);
                  
               }else{return;}
            }
        }
        $deps = Deposit::get($usr['id']);
        if(empty($deps)){
            User::setVal($usr['id'], 0, 'accrs');
        }
    }

    public static function getAll(){
        $db = Db::getConnection();
        $sql = "SELECT * FROM deposits    ";
        $result = $db->prepare($sql);
        //$result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $res = array();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
         return $res;
      }

      public static function passiveIncome($dep,$sum,$dtime){
        $accr = $sum/100*1;
                        $user = User::getUserInfo($dep['user']);
                        $curLead = User::getUserInfo($user['leader']);
                        $upline = array();
                        $end = false;
                        for ($i=0; $i <10 ; $i++) {
                            $upline[] = $curLead;
                            if(($curLead['id'] > 0 && $curLead['upBrnch'] == $user['upBrnch']  && $curLead) ){
                                //echo $curLead['login'].' '.$accr.'<br>';
                                $curLead = User::getUserInfo($curLead['leader']);
                            }else{
                               break;
                            }
                        }
                        foreach ($upline as  $usr) {
                            User::addVal($usr['id'], $accr, 'balance');
                            User::addVal($usr['id'], $accr, 'profit');//statistics
                            User::addVal($usr['id'], $accr, 'accrs');
                            Journal::add('pas',$usr['id'],$accr,$dtime,'Passive income from '.$user['login'],0,'',$user['id']);
                            Deposit::checkDeposits($usr['id']);
                        }
      }

      public static function passiveIncomeFix($dep,$sum,$dtime){
     /*   $accr = $sum/100*1;
                        $user = User::getUserInfo($dep['user']);
                        $curLead = User::getUserInfo($user['leader']);
                        $upline = array();
                        $end = false;
                        for ($i=0; $i <10 ; $i++) {
                            if($curLead['upBrnch'] != $user['upBrnch']){
                                $upline[] = $curLead;
                            }
                            if(($curLead['id'] > 0 && $curLead['upBrnch'] == $user['upBrnch']  && $curLead) ){
                                //echo $curLead['login'].' '.$accr.'<br>';
                                $curLead = User::getUserInfo($curLead['leader']);
                            }else{
                               break;
                            }
                        }
                        foreach ($upline as  $usr) {
                            User::addVal($usr['id'], $accr, 'balance');
                            User::addVal($usr['id'], $accr, 'profit');//statistics
                            User::addVal($usr['id'], $accr, 'accrs');
                            Journal::add('pas',$usr['id'],$accr,$dtime,'Passive income from '.$user['login'],0,'',$user['id']);
                            Deposit::checkDeposits($usr['id']);
                        }*/
      }

}
