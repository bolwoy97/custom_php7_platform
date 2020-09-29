<?php

class Verification 
{
    static $table_name = 'verification';

    public static function fields(){
        return [
            'id' =>['type'=>' int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY '],
            'user' =>['type'=>' int(11) '],
            'created' =>['type'=>' datetime  DEFAULT CURRENT_TIMESTAMP '],
            'updated' =>['type'=>' datetime  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'],
            'name' =>['type'=>' tinytext ','required'=>true],
            'lastname' =>['type'=>' tinytext ','required'=>true],
            'birth_date' =>['type'=>' date ','required'=>true],
            'pasp_num' =>['type'=>' tinytext ','required'=>true],
            'pasp_given' =>['type'=>'tinytext ','required'=>true],
            'pasp_given_date' =>['type'=>'tinytext ','required'=>true],
            'country' =>['type'=>' tinytext ','required'=>true],
            'state' =>['type'=>' tinytext ','required'=>true],
            'city' =>['type'=>' tinytext ','required'=>true],
            'adres' =>['type'=>' tinytext ','required'=>true],
           
            /*'card' =>['type'=>' tinytext ','required'=>true],
            'phone' =>['type'=>' tinytext ','required'=>true],*/
            'doc_img' =>['type'=>' tinytext ', 'role'=>'img'],
            'bill_img' =>['type'=>' tinytext ', 'role'=>'img'],
            'status' =>['type'=>' tinytext '],
            'coment' =>['type'=>' text '],
        ];
    }

    public static function createIfNotExists(){
        $db = Db::getConnection();
            $sql = "SELECT * FROM ".self::$table_name;
            $result = $db->prepare($sql);
            $row = $result->execute();
            if(empty($row)) {
                self::createTable();
                return true;
            }
            //var_dump($row);
            return false;
    }

    public static function deleteTable(){
        $db = Db::getConnection();
            $sql = "DROP TABLE ".self::$table_name;
            $result = $db->prepare($sql);
            $row = $result->execute();
            return $row;
    }

    public static function createTable(){
        $db = Db::getConnection();
            
                $sql = "CREATE TABLE `".self::$table_name."` ( ";
                $fields = self::fields();
                $k = 0;
                foreach ($fields as $key => $value) {
                    $sql .= ' `'.$key.'` '.$value['type'].' ';
                    $k++; if($k<count($fields)){$sql .= ',';}
                }
                $sql .= " ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
                //echo $sql;exit;
                $result = $db->prepare($sql);
                $success = $result->execute();
                if (!$success) {
                    var_dump($result->errorInfo());
                    die(__LINE__ . ' Invalid '.self::$table_name.' query: ' . $result->errorInfo());
                }
                return  $success;
    }

    public static function validate($post_object){
        $fields = self::fields();
        $post_fields = array();
        foreach ($fields as $key => $value) {
            if($value['required'] && empty($post_object[$key])){
                return false;
            }
        }
        foreach ($post_object as $key => $value){
            if($fields[$key] && $value && $fields[$key]['required']){
                $post_fields[$key] = $value;
            }else{
                return false;
            }
        }
        if(count($post_fields)>0){
            return $post_fields;
        }
        return false;
    }


    public static function add($post_fields){
        $db = Db::getConnection();

        $sql = "INSERT INTO ".self::$table_name." ( ";
        $k = 0;
        foreach ($post_fields as $key => $value) {
            $sql .= " $key ";
            $k++; if($k<count($post_fields)){$sql .= ',';}
        }  
        $sql .= " ) VALUES ( ";
        $k = 0;
        foreach ($post_fields as $key => $value) {
            $sql .= " :$key ";
            $k++; if($k<count($post_fields)){$sql .= ',';}
        }   
        $sql .=" )";
        //echo $sql;exit;
        $result = $db->prepare($sql);

        foreach ($post_fields as $key => $value) {
            $result->bindParam(":$key", $post_fields[$key], PDO::PARAM_STR);
        }   

        $success = $result->execute();
        if (!$success) {
          var_dump($result->errorInfo());
        die(__LINE__ . ' Invalid '.self::$table_name.' query: ' . $result->errorInfo());
        }
            return  $success;
    }

    public static function getBy($table, $value){
        $db = Db::getConnection();
        $sql = "SELECT * FROM ".self::$table_name." WHERE $table = :value ";
        $result = $db->prepare($sql);
        $result->bindParam(':value', $value, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        if ($row) {
           return $row;
        }
        return false;
    }

    public static function updateBy($table, $val, $post_fields){
        $db = Db::getConnection();
        $sql = "UPDATE ".self::$table_name." SET ";
        //$table =  :val
        $k = 0;
        foreach ($post_fields as $key => $value) {
            $sql .= " $key = :$key ";
            $k++; if($k<count($post_fields)){$sql .= ',';}
        }  
        $sql .= "WHERE $table = :value";
        //echo $post_fields['status'];exit;
        $result = $db->prepare($sql);
        foreach ($post_fields as $key => $value){
            $result->bindParam(":$key", $post_fields[$key], PDO::PARAM_STR);
        }
        $result->bindParam(':value', $val, PDO::PARAM_STR); 
       
        $success = $result->execute();
        if (!$success) {
          var_dump($result->errorInfo());
        die(__LINE__ . ' Invalid '.self::$table_name.' query: ' . $result->errorInfo());
        }
        return  $success;
    }

    public static function getAll(){
        $db = Db::getConnection();
        $sql = "SELECT *
         FROM ".self::$table_name." WHERE user >0";
        $result = $db->prepare($sql);
        $result->execute();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
        return $res;
    }

    public static function setValBy($getTable, $getVal, $setTable, $setVal)
    {
        $db = Db::getConnection();
        $sql = "UPDATE ".self::$table_name." 
            SET $setTable =  :setVal
            WHERE $getTable = :getVal";
        $result = $db->prepare($sql);
        $result->bindParam(':setVal', $setVal, PDO::PARAM_STR);    
        $result->bindParam(':getVal', $getVal, PDO::PARAM_STR); 
       
        $success = $result->execute();
        if (!$success) {
            var_dump($result->errorInfo());
          die(__LINE__ . " Invalid ".self::$table_name." query: " . $result->errorInfo());
      }
          return  $success;
    }



}