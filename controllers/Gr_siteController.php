<?php

class Gr_siteController
{

    public function actionDashboard()
    {
        Auth::isLoged();
        $user = User::getUserInfo($_SESSION['userId']);
        $cur_stage = Gr_stage::get(Option::get('gr_stage'));

        $jour = Journal::where("(type='gr_by_tok' OR type='gr_by_tok_bon'
         OR type='gr_add') AND user = {$_SESSION['userId']}");
        $with = Withdrawal::where("orig='gr_bon' AND user = {$_SESSION['userId']}");
        $comb_jor = array_merge($jour,$with);

        $cur_stage = Gr_stage::get(Option::get('gr_stage'));
        $all_stages = Gr_stage::getAll();
        //var_dump($with);exit;
        require_once(ROOT.'/views/residence/dashboard.php');
        return true;
    }

    public function actionComplex()
    {
        Auth::isLoged();
        $user = User::getUserInfo($_SESSION['userId']);
        $cur_stage = Gr_stage::get(Option::get('gr_stage'));
        $all_stages = Gr_stage::getAll();
        require_once(ROOT.'/views/residence/complex.php');
        return true;
    }

    public function actionEvents()
    {
        Auth::isLoged();
        $user = User::getUserInfo($_SESSION['userId']);

        require_once(ROOT.'/views/residence/events.php');
        return true;
    }

}
