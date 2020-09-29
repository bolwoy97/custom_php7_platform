<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';

ini_set('memory_limit', '500M');
class AdminController
{
    public function actionAdmin()
    {
        
        if(isset($_POST['password'])){
            Auth::logInAdm();
        }
        Auth::isLogedAdm();
        $users = User::getAll();
        
        $countAdditions = Journal::countSumByType('add')[0];
        $countTOK = Journal::countSumByType('usd_to_tok')[0];
        $countBonusTOK = Journal::countSumByType('bon')[0];

        if($_POST['login']){
            $user = User::getByLogin($_POST['login']);
            if($user){
                header("Location: /adm_user-{$user['id']}"); 
                exit;
            }else{
                $_SESSION['errors'] = ['User not found'];
            }
        }

        $pn=1;
        require_once(ROOT . '/views/admin/adm-home.php');
        return true;
    }

    public function actionAll_users()
    {
        Auth::isLogedAdm();
       
        //$user = User::getUserInfo($_SESSION['userId']);
        $users = User::getAll();
        $unprn = User::getUnprn();
        
        require_once(ROOT . '/views/admin/adm-all_users.php');
        return true;
    }

    
    public function actionAdditions()
    {
        Auth::isLogedAdm();
        
        $user = User::getUserInfo($_SESSION['userId']);
        $users = User::getAll();

        $realAdditions = Journal::getRealAdditions();
        $admAdditions = Journal::getAdmAdditions();

        require_once(ROOT . '/views/admin/adm-additions.php');
        return true;
    }

    public function actionFinance()
    {
        Auth::isLogedAdm();
        $user = User::getUserInfo($_SESSION['userId']);
        $users = User::getAll();
        $invProfit = 0;
        $refProfit = 0;
        $totalCont = 0;
        $totalWith = 0;
            foreach($users as $us){
                $invProfit += $us['invProfit'];
                $refProfit += $us['refProfit'];
                $totalCont += $us['totalCont'];
                $totalWith += $us['totalWith'];
            }

           $pn=3;
             require_once(ROOT . '/views/admin/adm-finance.php');
   
        return true;
    }

    public function actionOrders()
    {
        Auth::isLogedAdm();
        $pending = Withdrawal::where("status='pending' AND (orig='bon' OR orig='')");
        $confirmed = Withdrawal::where("status='confirmed' AND (orig='bon' OR orig='')");
        $canceled = Withdrawal::where("status='canceled' AND (orig='bon' OR orig='')");
            /*$total = array('usd'=>0, 'btc'=>0, 'eth'=>0, 'bch'=>0, );
            foreach ($confirmed as $with) {
                $total[$with['cur']] += $with['sum'];
            }*/

            $pn=3;
             require_once(ROOT . '/views/admin/adm-orders.php');
  
        return true;
    }

    public function actionGridpay()
    {
        Auth::isLogedAdm();
        $additions = Journal::where("type LIKE 'gridpay_add%' ");
        
        $pending = Withdrawal::where("status='pending' AND orig='gridPay' ");
        $confirmed = Withdrawal::where("status='confirmed' AND orig='gridPay'");
        $canceled = Withdrawal::where("status='canceled' AND orig='gridPay' ");

        require_once(ROOT . '/views/admin/adm-gridpay.php');
        return true;
    }

    public function actionGridpay_transfers()
    {
        Auth::isLogedAdm();
        $transfers = Journal::where("type ='gridpay_send' OR type ='gridpay_rec' ");
      
        require_once(ROOT . '/views/admin/adm-gridpay_transfers.php');
        return true;
    }
   

    public function actionSales()
    {
        Auth::isLogedAdm();
            $pending = Withdrawal::where("status='pending' AND orig='tok'");
            $confirmed = Withdrawal::where("status='confirmed' AND orig='tok'");
            $canceled = Withdrawal::where("status='canceled' AND orig='tok'");
            require_once(ROOT . '/views/admin/adm-sales.php');
  
        return true;
    }

    public function actionNews()
    {
                Auth::isLogedAdm();
                $news = News::getAll();

                $pn=2;
                require_once(ROOT . '/views/admin/adm-news.php');
       
            return true;
    }

    public function actionUser($id = 0 )
    {
        Auth::isLogedAdm();
        
        if($id==0){$id=$_SESSION['userId'];}
        $user = User::getUserInfo($id);
        if(!$user){echo 'wrong user!';exit;}
        // $deps = Data::depTypes();
        //$myDeposits = Deposit::get($id);
        $Journal = Journal::last($user["id"]);

        $GP_withs = Withdrawal::where("user = {$user['id']} AND status !='unactive' 
        AND orig='gridPay'");
        $GP_journal = Journal::where("user={$user['id']} AND type LIKE 'gridpay_%' ");
        $GP_journal = JournalService::combineWithsAndJournal($GP_withs, $GP_journal);

        $tok2_jor = Journal::lastByType($user["id"], 'usd_to_2tok');
        
        $levels = User::getLvl($id,11);
        
        //$Accrs = Journal::getEarnings($id);
        // $additions = Journal::get($id, 'add');
        // $withs = Withdrawal::getByUser($id);
        
        $iter =0; $upline = array();
        $sponsId = $user['sponsor'];
        while ($sponsId != 0) {
            $sponsor = User::getUserInfo($sponsId);
            if($sponsor && $sponsId != 0 && $iter <=5){
                $iter++;
                 $upline[] = $sponsor;
                 $sponsId =$sponsor['sponsor'];
                }else{break;}
             }
             $upline = array_reverse($upline);
             $pn = 4;
             
             $TokForSale = UserService::getTokForSale($id,Option::get('stage'));
             
        $sales = Withdrawal::where("orig = 'tok' AND user =$id");
             
        require_once(ROOT . '/views/admin/adm-user.php');
        return true;
    }
 

    public function actionVerifications()
    {
        Auth::isLogedAdm();
        $Verifications = Verification::getAll();
        require_once(ROOT . '/views/admin/adm-verifications.php');
        return true;
    }

    public function actionUser_verif($id = 0)
    {
        Auth::isLogedAdm();
        $Verif = Verification::getBy('user',$id);
        if(isset($_POST['confirm'])){
            Verification::setValBy('user',$id, 'status', 'confirmed');
            Verification::setValBy('user',$id, 'coment', '');
            $_SESSION['success']= 'Verification confirmed';
            header("Location: /adm_verifications");exit;
        }
        if(isset($_POST['pending'])){
            Verification::setValBy('user',$id, 'status', 'pending');
            Verification::setValBy('user',$id, 'coment', '');
            $_SESSION['success']= 'Verification pending';
            header("Location: /adm_verifications");exit;
        }
        if(isset($_POST['cancel'])){
            Verification::setValBy('user',$id, 'status', 'canceled');
            Verification::setValBy('user',$id, 'coment', $_POST['coment']);
            $_SESSION['errors']= ['Verification canceled'];
            header("Location: /adm_verifications");exit;
        }
        $User = User::getUserInfo($Verif['user']);
        require_once(ROOT . '/views/admin/adm-user_verif.php');
        return true;
    }

    public function actionLogs()
    {
        Auth::isLogedAdm();
        $logs = Log::getAll();
        $pn=6;
        require_once(ROOT . '/views/admin/adm-logs.php');
        return true;
    }

    public function actionBonus()
    {
        Auth::isLogedAdm();
        $adm_bon = Journal::getByType('adm_bon');
        require_once(ROOT . '/views/admin/adm-bonus.php');
        return true;
    }

    public function actionTok2()
    {
        Auth::isLogedAdm();

        $journal = Journal::getByType('usd_to_2tok');

        require_once(ROOT . '/views/admin/adm-tok2.php');
        return true;
    }

    public function actionRef_prog()
    {
        Auth::isLogedAdm();
        $cur_ref_prog = Ref_progService::getCurrent_adm();
        if($cur_ref_prog){
            //AND date >= '{$cur_ref_prog['start']}' AND date <= '{$cur_ref_prog['end']}'
            $cur_recs = Journal::where("type='ref_prog' AND adr='{$cur_ref_prog['id']}' ");
        }
        $all_recs = Journal::where("type='ref_prog' ");
        require_once(ROOT . '/views/admin/adm-ref_prog.php');
        return true;
    }

    public function actionGr_orders()
    {
        Auth::isLogedAdm();

        $pending = Withdrawal::where("status='pending' AND orig='gr_bon' ");
        $confirmed = Withdrawal::where("status='confirmed' AND orig='gr_bon'");
        $canceled = Withdrawal::where("status='canceled' AND orig='gr_bon' ");
        require_once(ROOT . '/views/admin/adm-gr_orders.php');
        return true;
    }

    public function actionUnact_users()
    {
        Auth::isLogedAdm();
        $min_turn = $GLOBALS['env']['min_usd_to_tok_sum'];
        $unact_users = User::where("usd_to_tok_sum<=$min_turn"); 
        require_once(ROOT . '/views/admin/adm_unact_users.php');
        return true;
    }

    public function actionTg_purchases()
    {
        Auth::isLogedAdm();
        $tg_purchases = Tg_purchase::where("1");
        require_once(ROOT . '/views/admin/adm_tg_purchases.php');
        return true;
    }

    public function actionPartner_prog()
    {
        Auth::isLogedAdm();
        $last_partner_prog = Partner_prog::where(" 1 ORDER BY real_start DESC")[0];
        //var_dump($last_partner_prog);exit;
        $cur_partner_prog = Partner_progService::getCurrent_adm();
        if($last_partner_prog){
            $cur_recs = Journal::where("type='partner_prog_bon' AND adr='{$last_partner_prog['id']}' ");
            $top_users = Partner_progService::top_users($last_partner_prog);
        }
       
        $all_recs = Journal::where("type='partner_prog_bon' ");
        require_once(ROOT . '/views/admin/adm-partner_prog.php');
        return true;
    }

    public function actionPartner_prog_flags()
    {
        Auth::isLogedAdm();
        $country_list = array();
        $users = User::where("country != ''");
        foreach ($users as $key => $user) {
            $country=unserialize($user['country']);
            $country_list[$country['country']]['code']= $country['country'];
            $country_list[$country['country']]['name']= $country['country_long'];
            $country_list[$country['country']]['users'][]= $user;
        }
        usort($country_list, function ($item1, $item2) {
            return count($item2['users'])>count($item1['users']);
         });
        foreach ($country_list as $key => $country) {
           echo $country['code'],' => ',$country['name'],' => ',count($country['users']),'<br>';
        }
        return true;
    }

    public function actionScript_partner_prog()
    {
        Auth::isLogedAdm();
        $users = User::where("date >= '2020-07-22' AND date <= '2020-08-01' AND usd_to_tok_sum>=".$GLOBALS['env']['min_usd_to_tok_sum']);
        foreach ($users as $key => $user) {
            echo $user['login'],' => ',$user['date'],' => ',$user['usd_to_tok_sum'],'<br>';
        }
        return true;
    }

    public function actionP_2_p()
    {
        Auth::isLogedAdm();
        
        if($_POST['delete']){
            $str = '';
            foreach($_POST as $key => $val){
                $str .= " $key => $val /";
            }
            Log::add("adm: p_2_p > ".$str);
            //var_dump($_POST);exit;
            if($_POST['delete_type']=='with'){
                Withdrawal::delete($_POST['delete_id']);
            }else{
                Journal::delete($_POST['delete_id']);
            }
        }

        $withs = Withdrawal::where("status = 'pending' AND cur!='gr_usd' AND cur!='balance' 
        AND cur!='gridPay' AND cur!='balance'");
        $outcome = JournalService::combineWithsAndJournal($withs, []);

        $journal = Journal::where("(type = 'add' OR type = 'adm_add') AND date >= '2020-08-04 01'  ");
        $income = JournalService::combineWithsAndJournal([], $journal);

        require_once(ROOT . '/views/admin/adm-p_2_p.php');
        return true;
    }

}
