<?php

class User
{

    public static function register($login, $email, $password, $sponsor ,$dtime)
    {

        $bonOneHand = Option::get('bonOneHand');
        $tok2OneHand = Option::get('tok2OneHand');

        $chPasHash = 'unprn';//unprn

        $db = Db::getConnection();

        $sql = 'INSERT INTO users ( login, email,  password, sponsor ,chPasHash ,date ,bonOneHand , tok2OneHand) '
                . 'VALUES ( :login, :email, :password, :sponsor, :chPasHash, :dtime ,:bonOneHand ,:tok2OneHand)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
       
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':sponsor', $sponsor, PDO::PARAM_STR);
        $result->bindParam(':chPasHash', $chPasHash, PDO::PARAM_STR);
        $result->bindParam(':dtime', $dtime, PDO::PARAM_STR);
        $result->bindParam(':bonOneHand', $bonOneHand, PDO::PARAM_STR);
        $result->bindParam(':tok2OneHand', $tok2OneHand, PDO::PARAM_STR);
        
      $success = $result->execute();
      if (!$success) {
          var_dump($result->errorInfo());
        die(__LINE__ . ' Invalid user query: ' . $result->errorInfo());
    }
        return  $success;
    }  
    
    public static function where($where, $tables='*'){
        $db = Db::getConnection();
        $sql = "SELECT $tables FROM users WHERE $where ";
        //echo $sql;exit;
        $result = $db->prepare($sql);
        $result->execute();
        return Model::data_from_res($result);
      }

    public static function delete($id)
    {
        $db = Db::getConnection();
        
        $sql = "DELETE FROM users WHERE id = :id";
        
        $result = $db->prepare($sql);                                  
        $result->bindParam(':id', $id, PDO::PARAM_INT);     

        return $result->execute();
    }
 
    public static function setTempWallet($id,$name, $twal)
    {
        $db = Db::getConnection();
        
        $sql = "UPDATE users 
            SET $name = :twal
            WHERE id = :id";
        
        $result = $db->prepare($sql);                                  
        $result->bindParam(':id', $id, PDO::PARAM_INT);    
        //$result->bindParam(':name', $name, PDO::PARAM_STR);     
        $result->bindParam(':twal', $twal, PDO::PARAM_STR);    

        return $result->execute();
    }

    public static function checkUserData($login, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE login = :login OR email = :login';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user['id'];
        }
        return false;
    }

    public static function checkUserPin($id, $pin)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE id = :id AND pin = :pin ';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }
        return false;
    }
   

    
    public static function getUserInfo($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE id = :id ';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();
        if ($user ) {
           return $user;
        }
        return false;
    }

  


    public static function forgetPas($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email ';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user ) {
           
            $db = Db::getConnection();
             $sql = "UPDATE users 
                 SET chPasHash = :chPasHash
                  WHERE email = :email";
             
             $result = $db->prepare($sql);   

            $chPasHash = md5($user['login'].$user['id']);

             $result->bindParam(':chPasHash', $chPasHash , PDO::PARAM_STR);    
             $result->bindParam(':email', $email, PDO::PARAM_STR); 
             $res = $result->execute();
            
             return  $chPasHash;

        }
        return false;
    }

    public static function setBestStat($id, $val){
        $db = Db::getConnection();
        $sql = "UPDATE users 
            SET bestStat = :val
             WHERE id = :id";
        $result = $db->prepare($sql);   
        $result->bindParam(':val', $val , PDO::PARAM_STR);    
        $result->bindParam(':id', $id, PDO::PARAM_STR); 
        $res = $result->execute();
        return $res ;
    }

    public static function updatePass($hash, $password){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE chPasHash = :hash ';
        $result = $db->prepare($sql);
        $result->bindParam(':hash', $hash, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user ) {
            $db = Db::getConnection();
             $sql = "UPDATE users 
                 SET chPasHash = :nulHash , password = :password
                  WHERE chPasHash = :chPasHash";
             $result = $db->prepare($sql);   
            $chPasHash = md5($user['login'].$user['id']);
            $nulHash = "";
             $result->bindParam(':nulHash', $nulHash  , PDO::PARAM_STR);    
             $result->bindParam(':chPasHash', $hash , PDO::PARAM_STR);    
             $result->bindParam(':password', $password, PDO::PARAM_STR); 
             $res = $result->execute();
             return  true;
        }
        return false;
    }


    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkLogin($login)
    {
        $lang = Language::get();

        $ers = false;
        if (strlen($login) < 4) {
            $ers[] = ''.$lang['error27'].'';
        }

        if(!preg_match("/^[A-Za-z][A-Za-z0-9]{3,31}$/",$login)){
            $ers[] = ''.$lang['error28'].'';
        }

        if(preg_match("/(admin)/i",$login)){
            $ers[] = ''.$lang['error29'].'';
        }
        return $ers;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public static function checkPassword($password)
    {
        $lang = Language::get();
        $ers = false;
        if (strlen($password) < 6) {
            $ers[] = ''.$lang['error33'].'';
        }
        if(!preg_match("/^\S{5,31}$/",$password)){
            //$ers[] = ''.$lang['error15'].'';
            $ers[] = 'Wrong pasword';
        }
        return $ers;
    }
	
    /**
     * Проверяет email
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkPhone($phone)
    {
        if(preg_match("/^\+*[0-9]{10,12}$/", $phone)) {
            return true;
          }
      
        return false;
    }


    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }
    public static function checkHashExists($hash)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE chPasHash = :hash';

        $result = $db->prepare($sql);
        $result->bindParam(':hash', $hash, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }
    public static function checkLoginExists($login)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE login = :login';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }
    
    public static function checkSponsorExists($sponsor)
    {
        $db = Db::getConnection();

        $sql = "SELECT COUNT(*) FROM users WHERE login = :sponsor AND chPasHash != 'unprn' ";

        $result = $db->prepare($sql);
        $result->bindParam(':sponsor', $sponsor, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()){
            return true;
        }
        return false;
    }
    
    public static function getByLogin($login){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE login = :login ';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user ) {
            return $user;
        }
        return false;
    }

    public static function getByEmail($email){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE email = :email ';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user ) {
            return $user;
        }
        return false;
    }  
  
    public static function getRefs( $id ){
        $res = array();
        $db = Db::getConnection();
        $sql = "SELECT *
         FROM users WHERE sponsor = :id AND  chPasHash != 'unprn' ";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();
        while ($row = $result->fetch()) {
            $res[] = $row;
         } 
         return $res;
    }

    public static function getLvl($id,$amount=1){
        $Levels = array();
        $UserService = new UserService();
        $lvl1 = $UserService::getBy_reducable('sponsor',$id);//User::getRefs($id);
        $Levels[]= $lvl1;
        for ($i = 0; $i < $amount-1; $i++) {
            $lvl2 = array();
            foreach($lvl1 as $k1=>$lv){                   
                $temp =  $UserService::getBy_reducable('sponsor',$lv['id']);//User::getRefs($lv['id']);
             if($temp){
                 foreach($temp as $k2=> $t){
                 $lvl2[] = $t;
                 } 
                }
            }
            if(count($lvl2)>0){
                $Levels[]= $lvl2;
                $lvl1=$lvl2;
            }else{
                return $Levels; 
            }
        }
        return $Levels;
    }

    public static function getRefsEco( $id ){
        $res = array();
        $db = Db::getConnection();
        $sql = "SELECT id  FROM users WHERE sponsor = :id AND  chPasHash != 'unprn' ";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();
        while ($row = $result->fetch()) {
            $res[] = $row;
         } 
         return $res;
    }

    public static function getLvlEco($id,$amount=1){
        $Levels = array();
        $lvl1 = User::getRefsEco($id);
        $Levels[]= $lvl1;
        for ($i = 0; $i < $amount-1; $i++) {
            $lvl2 = array();
            foreach($lvl1 as $lv){                   
                $temp = User::getRefsEco($lv['id']);
             if($temp){
                 foreach($temp as $t){
                 $lvl2[] = $t;
                 } 
                }
            }
            if($lvl2){
                $Levels[]= $lvl2;
                $lvl1=$lvl2;
            }else{
                return $Levels; 
            }
        }
        
        return $Levels;
    }

    public static function getRefsFromArr( $arr, $login ){
        $res = false;
        foreach($arr as $us){
            if($us['sponsor'] == $login){
                $res[] = $us;
            }
        }
         return $res;
    }


    public static function getAll(){
        $db = Db::getConnection();
        $sql = "SELECT * FROM users  WHERE chPasHash != 'unprn' "; //  WHERE chPasHash != 'unprn'
        $result = $db->prepare($sql);
        $result->execute();
        //return Model::data_from_res($result);
        while ($row = $result->fetch()) {
            $res[$row['id']] = $row;
        }
        return $res;
    }

   


    public static function getUnprn(){
        $db = Db::getConnection();

        $sql = "SELECT *  FROM users  WHERE  chPasHash = 'unprn' ";

        $result = $db->prepare($sql);
       // $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }


    public static function setVal($id, $val, $table)
    {
        //var_dump($table);exit;
        $db = Db::getConnection();
        $sql = "UPDATE users 
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

    public static function setValForAll( $val, $table)
    {
        //var_dump($table);exit;
        $db = Db::getConnection();
        $sql = "UPDATE users 
            SET $table =  :val
            WHERE 1";
        $result = $db->prepare($sql);
        $result->bindParam(':val', $val, PDO::PARAM_STR);    
        //$result->bindParam(':id', $id, PDO::PARAM_INT); 
       
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
          die(__LINE__ . ' Invalid query: ' . $result->errorInfo());
      }
          return  $success;
    }

    public static function addVal($id, $val , $table )
    {
        $db = Db::getConnection();
        $sql = "UPDATE users 
            SET $table = $table + :val
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':val', $val, PDO::PARAM_STR);    
        $result->bindParam(':id', $id, PDO::PARAM_INT); 
        return $result->execute();
    }

    public static function status($user)
    {
        $statuses = Data::statuses();
        $status = $user['status'];
        $earned_statuses = false;
        $dtime = date("Y-m-d H:i:s");
        if(($status+1) >= count($statuses)){
            return true;
        }
        for ($i = $status+1; $i < count($statuses); $i++){
            if($user['persTurnover']>=$statuses[$i]['pers'] && $user['teamTurnover']>=$statuses[$i]['team']){
                $earned_statuses[] = $i;
            }
        }
        if($earned_statuses){
            foreach($earned_statuses as $stat){
                $stts = $stat;
                User::addVal($user['id'],$statuses[$stat]['revard'],'balance');
                Journal::add('bon',$user['id'],$statuses[$stat]['revard'],$dtime,'Bonus accrual on '.$statuses[$stts]['name'].' status',0,'',0);
                //User::addVal($user['id'],$statuses[$stat]['revard'],'totalBon');
            }
            User::setVal($user['id'],$stts,'status');
            //return true;
        }
        return false;
    }

    public static function last_by_sponsor($id, $lim){
        $db = Db::getConnection();
        $sql = "SELECT *  FROM users WHERE sponsor = :id AND chPasHash != 'unprn' ORDER BY id DESC LIMIT $lim ";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();
        $res =array();
        while ($row = $result->fetch()) {   
          $res[] = $row;
        }
        return $res;
      }

}
