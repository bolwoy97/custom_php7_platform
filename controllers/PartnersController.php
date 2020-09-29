<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';

class PartnersController
{
    public function actionUnactive_partners()
    {
        //var_dump($_GET);exit;
        Auth::isLoged();
        $user = User::getUserInfo($_SESSION['userId']);
        $lUsers = JournalService::getLastUsersDesk($_SESSION['userId']);
        $partners_marks = Partners_mark::where("user={$_SESSION['userId']}");
        $pn=3;
        require_once(ROOT.'/views/site/partners_unactive.php');
        return true;
    }

    public function actionMark_partner()
    {
        $mark = Partners_mark::where(" user={$_SESSION['userId']} AND partner={$_POST['id']} ")[0];
        if(!$mark){
            //echo '-';
            Partners_mark::addFromArray(['user'=>$_SESSION['userId'],'partner'=>$_POST['id'], 'coment'=>$_POST['coment']]);
        }else{
            //echo '+';
            Partners_mark::setVal($mark['id'], $_POST['coment'], 'coment');
        }
        header("Location: /unactive_partner"); 
        exit;
    }

    

}