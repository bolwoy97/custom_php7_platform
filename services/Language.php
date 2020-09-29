<?php

class Language
{

    public static function get($type ='site')
    {
        if(isset($_SESSION['userId'])){
            $lng = User::getUserInfo($_SESSION['userId'])['lang'];

            if($lng != ''){
                $lng = $lng;
            }else{
                if(isset($_SESSION['lang'])){
                    $lng = $_SESSION['lang'];
                }else{//+-
                $lng ='RU';
                }
                User::setVal($_SESSION['userId'],$lng,'lang');
            }
        }elseif(isset($_SESSION['lang'])){
            $lng = $_SESSION['lang'];
            if(isset($_SESSION['userId'])){//+-
                User::setVal($_SESSION['userId'],$lng,'lang');
            }
        }else{
            $lng ='RU';
        }
        if(!isset($_SESSION['lang'])){
            $_SESSION['lang'] = $lng;
        }
       /* echo $lng;
        exit;*/
        require(ROOT ."/res/langs/$type/lang-$lng.php");
        return $lng;
    }

    public static function curLang()
    {
        if(isset($_SESSION['userId'])){
            $lng = User::getUserInfo($_SESSION['userId'])['lang'];

            if($lng != ''){
                $lng = $lng;
            }else{
                if(isset($_SESSION['lang'])){
                    $lng = $_SESSION['lang'];
                }else{//+-
                $lng ='RU';
                }
                User::setVal($_SESSION['userId'],$lng,'lang');
            }
        }elseif(isset($_SESSION['lang'])){
            $lng = $_SESSION['lang'];
            if(isset($_SESSION['userId'])){//+-
                User::setVal($_SESSION['userId'],$lng,'lang');
            }
        }else{
            $lng ='RU';
        }
        if(!isset($_SESSION['lang'])){
            $_SESSION['lang'] = $lng;
        }
        return $lng;
    }

 

    public static function langArray()
    {
        return array('RU'=>'RU', 'EN'=>'EN' );
    }



}
