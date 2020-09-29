<?php
    
class LanguageController
{
    public function actionSet($lng)
    {
        $array = Language::langArray();
        $lng = $array[strtoupper($lng)];
        //echo $lng;exit;
        if($lng){
            $_SESSION['lang'] = $lng;
            if($_SESSION['userId']){
                User::setVal($_SESSION['userId'],$lng,'lang');
            }
        }
        header("Location:  {$_SERVER['HTTP_REFERER']}"); 
        return;
    }

}
