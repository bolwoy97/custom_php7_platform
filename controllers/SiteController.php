<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';
//htmlentities()

class SiteController
{

    public function actionIndex()
    {
        Auth::isLoged();
       
        $dtime = date("Y-m-d H:i:s");
        $user = User::getUserInfo($_SESSION['userId']);
        

        if($_POST['data']=='partners'){
            $lUsers = JournalService::getLastUsersDesk($_SESSION['userId']);
            $res = TableService::prepare($lUsers,[], $_POST['search'] ,$_POST['page'],$_POST['perPage']);
            echo json_encode($res);
            exit;
        }elseif($_POST['data']=='actions'){
            $withs = Withdrawal::where("user = {$_SESSION['userId']} AND status !='unactive' 
            AND orig !='gridPay' AND orig !='gr_bon'");
            $journal = Journal::last($_SESSION['userId']);
            $comb_jor = JournalService::combineWithsAndJournal($withs, $journal);
            $res = TableService::prepare($comb_jor,[], $_POST['search'] ,$_POST['page'],$_POST['perPage']);
            echo json_encode($res);
            exit;
        }
        

        //$lastUsers = User::last_by_sponsor($_SESSION['userId'], 5);
        $news = News::getLast(4);

        //$Accrs = Journal::getEarnings($_SESSION['userId']);
        /* $frstStage = Stage::get(0);
        $diff= strtotime($frstStage['start']) - time();*/
        
        $Stage = Stage::get(Option::get('stage'));
        $stage_sum = StageService::get_sum_usd();

        $bonStatus = Option::get('bonStatus');
        $bonAmount = Option::get('bonAmount');
        //$user['bonOneHand']
        $tokPrice = Data::tokPrice();
        if($bonStatus=='on' && $bonAmount>0 && $user['bonOneHand']>0){
            $tokPrice = Option::get('bonPrice');
        }
        $tok2Price = TokenService::get_tok2_price();
      
        $TokForSale = UserService::getTokForSale($_SESSION['userId'],Option::get('stage'));

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $refLink = $protocol.$_SERVER['HTTP_HOST'].'/r-'.$user['login'];

        $pn=1;
        
        require_once(ROOT.'/views/site/dashboard.php');
        return true;
    }

    public function actionOperations()
    {
        Auth::isLoged();
        $dtime = date("Y-m-d H:i:s");
        $user = User::getUserInfo($_SESSION['userId']);
       
        if($_POST['data']=='actions'){
            $withs = Withdrawal::where("user = {$_SESSION['userId']} AND status !='unactive' 
            AND orig !='gridPay'  AND orig !='gr_bon'");
            $journal = Journal::last($_SESSION['userId']);
            $comb_jor = JournalService::combineWithsAndJournal($withs, $journal);
            $rows=['operation', 'amount', 'date', 'status_show', 'stage_show'];
            $res = TableService::prepare($comb_jor,$rows, $_POST['search'] ,$_POST['page'],$_POST['perPage']);
            echo json_encode($res);
            exit;
        }
        
        $pn=4;
        require_once(ROOT.'/views/site/operations.php');
        return true;
    }

    public function actionPartners()
    {
        Auth::isLoged();
        $user = User::getUserInfo($_SESSION['userId']);
        $lUsers = JournalService::getLastUsersDesk($_SESSION['userId']);
        $partners_marks = Partners_mark::where("user={$_SESSION['userId']}");


        $pn=3;
        require_once(ROOT.'/views/site/partners.php');
        return true;
    }
  
    public function actionNews()
    {
        Auth::isLoged();
        $news = News::getAll();
        $user = User::getUserInfo($_SESSION['userId']);
        $pn=6;
        require_once(ROOT.'/views/site/news.php');
        return true;
    }

    public function actionNewsView($id)
    {
        Auth::isLoged();
        $new = News::get($id);

        $user = User::getUserInfo($_SESSION['userId']);
        if($user['last_new']<$id){
            User::setVal($_SESSION['userId'],$id,'last_new');
        }
        
        $pn=6;
        require_once(ROOT.'/views/site/news-view.php');
        return true;
    }

    public function actionBuy_tok2($id)
    {
        Auth::isLoged();

        $dtime = date("Y-m-d H:i:s");
        $user = User::getUserInfo($_SESSION['userId']);

        $Stage = Stage::get(Option::get('stage'));
        $stage_sum = StageService::get_sum_usd();
        $tokPrice = TokenService::get_tok2_price();
        $tok2_sum = Option::get('tok2_sum');
        $tok2_goal = Option::get('tok2_goal');
        $tok2_slider_sum = ($tok2_sum>$tok2_goal)?$tok2_goal:$tok2_sum;

        $journal = Journal::getByIdType($_SESSION['userId'], 'usd_to_2tok');
        $comb_jor = JournalService::combineWithsAndJournal([], $journal);


        require_once(ROOT.'/views/site/buy_tok2.php');
        return true;
    }

    public function actionAll_operations()
    {
        
        Auth::isLoged();
        if($_POST['data']=='actions'){
            ini_set('memory_limit', '500M');
            $journal = Journal::where("type = 'add' OR type = 'adm_add' OR
            type = 'usd_to_tok' OR type = 'usd_to_2tok' OR type = 'partner_prog_bon'");
            $withs = Withdrawal::where("status != 'unactive'");
            $comb_jor = JournalService::combineWithsAndJournal($withs, $journal);
            $rows=['operation', 'user_show_hid', 'amount', 'date', 'status_show', 'stage_show'];
            $res = TableService::prepare($comb_jor,$rows, $_POST['search'] ,$_POST['page'],$_POST['perPage']);
            echo json_encode($res);
            exit;
        }
        $user = User::getUserInfo($_SESSION['userId']);
        require_once(ROOT.'/views/site/all_operations.php');
        return true;
    }

    public function actionGridpay()
    {
        Auth::isLoged();
        $user = User::getUserInfo($_SESSION['userId']);
        
        $withs = Withdrawal::where("user = {$_SESSION['userId']} AND status !='unactive' 
        AND orig='gridPay'");
        $journal = Journal::where("user={$_SESSION['userId']} AND type LIKE 'gridpay_%' ");
        $comb_jor = JournalService::combineWithsAndJournal($withs, $journal);
        $comb_jor = array_slice($comb_jor,0,15);

        /*if($_SESSION['user']['login']=='tester1'){
            require_once(ROOT.'/views/site/gridpay_test.php');
            return true;
        }*/
        require_once(ROOT.'/views/site/gridpay.php');
        return true;
    }

    
    public function actionRef_prog()
    {
        Auth::isLoged();
        $cur_ref_prog = Ref_progService::getCurrent();
        if(!$cur_ref_prog){
            Data::CustomMessagePage('','На данный момент бонусных программ не проводится','/dashboard');
                return true;
        }
        $user = User::getUserInfo($_SESSION['userId']);
        $ref_prog_recs = Journal::where("user={$user['id']} AND type='ref_prog_lvl' AND adr='{$cur_ref_prog['id']}'");
        foreach($cur_ref_prog['rates'] as $k=> $ref){
            $cur_ref_prog['turnover'][$k] = 0;
            foreach ($ref_prog_recs as  $ref_rec) {
                if($ref_rec['lvl']== $k){
                    $cur_ref_prog['turnover'][$k] += $ref_rec['sum'];  
                }
            }
        }

        $ref_prog_bons = Journal::where("user={$user['id']} AND type='ref_prog_bon' AND adr='{$cur_ref_prog['id']}'");
        $ref_prog_sum = 0;
        foreach ($ref_prog_bons as $ref_prog_bon) {
            $ref_prog_sum += $ref_prog_bon['sum'];
        }
        //var_dump($ref_prog_recs);
        //exit;
        require_once(ROOT.'/views/site/ref_prog.php');
        return true;
    }

    public function actionTools()
    {
        Auth::isLoged();
        $user = User::getUserInfo($_SESSION['userId']);
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $refLink = $protocol.$_SERVER['HTTP_HOST'].'/r-'.$user['login'];
        $gif_baners = ['green.gif','pink.gif','Pink-and-Gold-Retail-Leaderboard-3.gif','violet.gif','anma.gif'];
        $img_baners = ['00.png','01.png','02.png','03.png'];
        $packs=[10,50];
        $tg_purchases = Tg_purchase::where("user={$_SESSION['userId']}");
        $last_pack = $packs[count($packs)-1];
        $purchs_done = false;
        foreach ($tg_purchases as $key => $tg_purchase) {
            if($tg_purchase['sum'] == $last_pack){
                $purchs_done = true;
            }
        }
        //var_dump($tg_purchases);exit;
        require_once(ROOT.'/views/site/tools.php');
        return true;
    }

    public function actionPartner_prog()
    {
        Auth::isLoged();
        $last_partner_prog = Partner_prog::where(" 1 ORDER BY real_start DESC")[0];
        $cur_partner_prog = Partner_progService::getCurrent();
        if(!$last_partner_prog){
            Data::CustomMessagePage('','На данный момент бонусных программ не проводится','/dashboard');
                return true;
        }
        $user = User::getUserInfo($_SESSION['userId']);
        $partner_prog_bons = Journal::where("user={$user['id']} AND type='partner_prog_bon' AND adr='{$last_partner_prog['id']}'");
        $partners = User::where("sponsor={$user['id']} AND date>='{$last_partner_prog['start']}'
                AND date<='{$last_partner_prog['end']}' AND usd_to_tok_sum>=".$GLOBALS['env']['partner_prog_sum']);
        $partners_prog_count = count($partners);

        $top_users = Partner_progService::top_users($last_partner_prog);

        require_once(ROOT.'/views/site/partner_prog.php');
        return true;
    }

    public function actionP_2_p()
    {
        Auth::isLoged();
        if($_POST['data']=='outcome'){ //status != 'unactive'
            $withs = Withdrawal::where("status = 'pending' AND cur!='gr_usd' AND cur!='balance' 
            AND cur!='gridPay' AND cur!='balance'");
            $comb_jor = JournalService::combineWithsAndJournal($withs, []);
            $rows=['operation', 'user_show_hid', 'amount', 'date', 'status_show', 'stage_show'];
            $res = TableService::prepare($comb_jor,$rows, $_POST['search'] ,$_POST['page'],$_POST['perPage']);
            echo json_encode($res);
            exit;
        }elseif($_POST['data']=='income'){
            $journal = Journal::where("(type = 'add' OR type = 'adm_add') AND date >= '2020-08-04 01' ");
            $comb_jor = JournalService::combineWithsAndJournal([], $journal);
            $rows=['operation', 'user_show_hid', 'amount', 'date', 'status_show', 'stage_show'];
            $res = TableService::prepare($comb_jor,$rows, $_POST['search'] ,$_POST['page'],$_POST['perPage']);
            echo json_encode($res);
            exit;
        }
        require_once(ROOT.'/views/site/p_2_p.php');
        return true;
    }
    
}
