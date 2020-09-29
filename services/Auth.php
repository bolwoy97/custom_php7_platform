<?php

class Auth
{
    

    public static function toLogIn(){
        header("Location: /login"); 
        exit;
    }

    public static function logIn($userId, $user)
    {
        $_SESSION['userId'] = $userId;
        $_SESSION['check'] = md5('u'.$user['id'].''.$user['login']);
        $_SESSION['user']['login']  = $user['login'];
        $_SESSION['user']['img']  = $user['img'];
        return true;
    }

    public static function logInAdm()
    {
        if($_POST['password']== $GLOBALS['env']['adm_pass']){   
            $_SESSION['admin'] = md5('fhb8'.$GLOBALS['env']['adm_pass']);
            header("Location: /tw_admin"); 
            exit;
        }
    }

    public static function isLoged(){
        if(!isset($_SESSION['userId'])){
            self::toLogIn();
        }
        
        $user = User::getUserInfo($_SESSION['userId']);
        $str = md5('u'.$user['id'].''.$user['login']);
        if($user && ($user ['ban_enter']==1 ||  $str!=$_SESSION['check']) ){
            require_once(ROOT.'/views/user/login.php');exit;
        }
        if($user['contact']==''){
            require_once(ROOT.'/views/user/contact.php');exit;
        }
        if($user['country']==''){
            require_once(ROOT.'/views/user/contact.php');exit;
        }
        //UserService::normalize($user);
        return $user;
    }

    public static function isLogedAdm(){
        $user = self::isLoged();
        if(!isset($_SESSION['admin']) &&  $_SESSION['admin'] != md5('fhb8'.$GLOBALS['env']['adm_pass']) ){
            require_once(ROOT . '/views/admin/login.php'); exit;
        }
    }

    public static function checkRole($role){
        $user = self::isLoged();
        if($user>=$role){
            return true;
        }
        return false;
    }

}