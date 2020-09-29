<?php

class LandController
{

    public function actionIndex()
    {
        try{
        $curStage = Stage::get(Option::get('stage'));
        $news = News::getLast(4);
        }catch(Exception $e){}
        $pn=1;
        require_once(ROOT.'/views/land/index.php');
        return true;
    }

    public function actionEmpty()
    {
        echo '-';
        exit;
    }

    public function actionDisclaimer()
    {
       
        require_once(ROOT.'/views/land/disclaimer.php');
        return true;
    }


}
