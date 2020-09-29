<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';

class PayController
{
    //START API
    
    public function actionCallback($id,$cur='') //получение платежа
    {     
        $cur='';
        /*$log = '';
        foreach ($_POST as $key => $value) {
            $log .= "$key => $value/";
        }
        Log::add('cp pay '.$log);*/

        //Log::add("Addition ".$id.' - '.$_POST['currency'].' - '.$_POST['amount']);
        //Log::add("Log call ".$_SERVER['REMOTE_ADDR'].' -- '.$_SERVER['HTTP_X_FORWARDED_FOR'].' -- '.$_SERVER['HTTP_USER_AGENT']);
        $merchant_id = $GLOBALS['env']['cp_merch_id'];
        $secret = $GLOBALS['env']['cp_pass'];
        $dtime = date("Y-m-d H:i:s");
        $usr = User::getUserInfo($id);
        $value_in_coin = round($_POST['amount'],8);
        
        $currencies = ['BTC'=>'btc',/*'BCH'=>'bch',*/'ETH'=>'eth','USDT.ERC20'=>'usdt_erc20'];
        $cur = $currencies[$_POST['currency']];
        if (!$currencies[$_POST['currency']] ) {
          Log::add($usr['id'].' '. $dtime.' '."Currency mismatch ".$_POST['currency']." != $cur ".$value_in_coin);
          die('Currency mismatch');
        }

        if( $usr[$cur.'Adr']!= $_POST['address'] ){
            Log::add("".$usr['id'].' '. $dtime."Invalid wallet! ".$usr[$cur.'Adr'].' != '.$_POST['address'].' '.$value_in_coin);
         echo "Invalid wallet! "; exit;
        }

      if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') {
          Log::add($usr['id'].' '. $dtime.' '."IPN Mode is not HMAC".' '.$value_in_coin);
        die('IPN Mode is not HMAC');
    }
    if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
        Log::add($usr['id'].' '. $dtime.' '."No HMAC signature sent ".' '.$value_in_coin);
        die('No HMAC signature sent.');
    }
    $merchant = isset($_POST['merchant']) ? $_POST['merchant']:'';
    if (empty($merchant)) {
        Log::add($usr['id'].' '. $dtime.' '."No Merchant ID passed".' '.$value_in_coin);
        die("No Merchant ID passed");
    }
   
    if ($merchant != $merchant_id) {
        Log::add($usr['id'].' '. $dtime.' '."Invalid Merchant ID".' '.$value_in_coin);
        die("Invalid Merchant ID");
      }
    $request = file_get_contents('php://input');
    if ($request === FALSE || empty($request)) {
        Log::add($usr['id'].' '. $dtime.' '."Error reading POST data".' '.$value_in_coin);
        die('Error reading POST data');
    }

      $hmac = hash_hmac("sha512", $request, $secret );//$secret
    if ($hmac != $_SERVER['HTTP_HMAC']) {
        Log::add($usr['id'].' '. $dtime.' '."HMAC signature does not match".' '.$value_in_coin);
        die('HMAC signature does not match');
    }

      $status = intval($_POST['status']); 

      if ($status >= 100 || $status == 2) {
        $sum = $value_in_coin * Data::course($cur);
        $date = date("Y-m-d");
        User::addVal($id,$sum,'balance');
        $dtime = date("Y-m-d H:i:s");
        Journal::add('add',$id,$sum,$dtime,"Addition",0,"complete",1, $cur,$_POST['txn_id'], $_POST['address']);   
        //Log::add($usr['id'].' '. $dtime.' '.$cur." payment is complete".' '.$sum);
        // Data::cLog("Payment ".$usr['id']." , $dtime , $cur , $sum");
        if($result){
            echo "*ok*";
        }
        } else if ($status < 0) {
        Log::add($usr['id'].' '. $dtime.' '.$cur." payment error".' '.$value_in_coin);
         } else {
        //Log::add($usr['id'].' '. $dtime.' '.$cur." payment is pending".' '.$value_in_coin);
    }
    die('IPN OK'); 
}


public function actionPaywal()
{
    if (!$_SESSION['userId']){
        header("Location: /login"); 
        exit;
    }
    //send cerrency and id 
    $cur = $_POST['cur'];
    $id = $_SESSION['userId'];
   // $longurl = "https://wellbeing.capital/exx/paywal-$cur-id-$id";
  //  $url = Data::short_link($longurl);
    $usr = User::getUserInfo($_SESSION['userId']);
    if((!$usr[$cur.'Adr'] ||$usr[$cur.'Adr']=='')&& $_SESSION['userId']){
        ///////////////////////////////////////////////////////////////
        
       $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $callback_url =  $protocol.$_SERVER['HTTP_HOST'].'/pay/uid='.$_SESSION['userId'].'/cur='.$cur;

        require_once(ROOT .'/res/coinpayments/coinpayments.inc.php');
        $cps = new CoinPaymentsAPI();
        $cps->Setup(Data::key('pri'),Data::key('pub') );
        
        $signs = ['btc'=>'BTC','eth'=>'ETH','bch'=>'BCH','usdt_erc20'=>'USDT.ERC20'];
        $cur_sign = $signs[$cur];

        $req = array(
            'currency' => strtoupper($cur_sign),//'BTC'
            'ipn_url' => $callback_url,
        );
        $result = $cps->api_call('get_callback_address', $req);

        if ($result['error'] == 'ok') {
            $adr = $result['result']['address'];           
        } else {
            print 'Error: '.$result['error']."\n";
        }

       $set =  User::setVal($_SESSION['userId'],$adr,$cur.'Adr');
        if($set){
            echo $adr;
            exit;
        }else{
            echo 'error1' ;  
            exit;
        }
    }else{
        $adr = $usr[$cur.'Adr'] ; 
        echo $adr;
            exit;
    }
    echo 'error2' ;
    exit;
}

    public function actionUsdCallback()
    {    
        //Log::add("Log  ".$_SERVER['REMOTE_ADDR'].' - '.$_SERVER['HTTP_USER_AGENT'].' - '.$_SERVER['HTTP_X_FORWARDED_FOR']);
       // Log::add("usd Addition ".$_POST['PAYMENT_ID'].' - usd - '.$_POST['PAYMENT_AMOUNT']); 
        $dtime = date("Y-m-d H:i:s");
        //up1ZPD84eWz6R3NNBJkETmspT  
        $secret = strtoupper( md5($GLOBALS['env']['pm_pass']) );
        $hash = $_POST['PAYMENT_ID'].':'.
        $_POST['PAYEE_ACCOUNT'].':'.
        $_POST['PAYMENT_AMOUNT'].':'.
        $_POST['PAYMENT_UNITS'].':'.
        $_POST['PAYMENT_BATCH_NUM'].':'.
        $_POST['PAYER_ACCOUNT'].':'.
        $secret.':'.
        $_POST['TIMESTAMPGMT'];

        $hash = strtoupper( md5($hash) );

        if ( $hash != $_POST['V2_HASH'] ) {//ERROr
        // Log::add(, $dtime,"usd error ",0);
            Log::add($_POST['PAYMENT_ID'].' '.$_POST['PAYMENT_UNITS']." V2_HASH error ".$_POST['PAYMENT_AMOUNT']);
            exit('error!!');
        }
        if(Journal::checkBatch($_POST['PAYMENT_ID'], $_POST['PAYMENT_BATCH_NUM'])){
            Log::add($_POST['PAYMENT_ID'].' '.$_POST['PAYMENT_UNITS']." BATCH_NUM error ".$_POST['PAYMENT_AMOUNT']);
            exit('BATCH_NUM error!!');
        }

        User::addVal($_POST['PAYMENT_ID'],$_POST['PAYMENT_AMOUNT'],'balance');
        Journal::add('add',$_POST['PAYMENT_ID'],$_POST['PAYMENT_AMOUNT'],$dtime,"Addition",0,"complete",1,'usd', $_POST['PAYMENT_BATCH_NUM'],$_POST['PAYER_ACCOUNT']);   
        //Log::add($_POST['PAYMENT_ID'].' '. $dtime.' usd '.$_POST['PAYMENT_AMOUNT']." payment is complete");
        $_SESSION['success'] = 'Addition successfull.';
        header("Location: /dashboard"); 
        exit;
    }

    //END API

    public function actionCloseDep()
    {
        Auth::isLoged();

        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        $dep = Deposit::checkDepBelongsUser($_SESSION['userId'], $_POST['id']);
        if(!$dep){
            $errors[] = 'No such a deposit found on this user!';
        }
        $dep = $dep[0];
        if($dep['end']!='0000-00-00'){
            $errors[] = 'Deposit already closed!';
        }

        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /investment"); 
            exit;
        }

        $date = date("Y-m-d");
        $dtime = date("Y-m-d H:i:s");
        $refund = $dep['sum']- $dep['sum']/100*5;
        Deposit::setVal($_POST['id'],$date,'end');
        User::addVal($dep['user'],$refund,'balance');
        Journal::add('oper',$_SESSION['userId'],$refund,$dtime,'Refund from the deposit '.$dep['name'],5,$dep['sum'],0);
        
        Journal::add('closDep',$user["sponsor"],$dep['sum'],$dtime,$user["login"].' canceled the investment',0,'',0);

        header("Location: /investment"); 
        exit;
    }

    public function actionNewdep()
    {
        Auth::isLoged();
        //<=== validation 
        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        //$userMoney = Wallet::get($_SESSION['userId']);
        $depType = Data::depTypes()[$_POST['type']];
        if($user['balance']<$_POST['sum']){
            $errors[] = 'Not enouth money.';
        }
        if($_POST['sum']<$depType['min'] || $_POST['sum']>$depType['max']){
            $errors[] = 'Deposit ammount mismatch.';
        }
        if($user['ban_deps']==1){
            $errors[] = 'Deposits are not allowed.';
        }
        /*if($depType['id']<3 && Deposit::checkDepExists($_SESSION['userId'], $depType['id'])){
            $errors[] = 'Deposit of such type already exists!';
        }*/
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /investment"); 
            exit;
        }

        // end validation ===>
        //<=== create deposit 
        $dtime = date("Y-m-d H:i:s");
        Deposit::add($depType,$_SESSION['userId'],$_POST['name'], $_POST['sum']);
        User::addVal($_SESSION['userId'],-$_POST['sum'],'balance');
        User::addVal($_SESSION['userId'],$_POST['sum'],'persTurnover' );
        Journal::add('oper',$_SESSION['userId'],$_POST['sum'],$dtime,'Start new deposit '.$_POST['name'],0,'',0);

        User::status($user);
        //<===  ===>
        $curUser = User::getUserInfo($user['id']);
        for ($i = 0; $i < 10; $i++) {
            if($curUser['sponsor']>0){
                $sponsor = User::getUserInfo($curUser['sponsor']);
                User::addVal($sponsor['id'],$_POST['sum'],'teamTurnover' );
                User::status(User::getUserInfo($sponsor['id']));//user after change
               
                $curUser = $sponsor;
            }else{
                break;
            }
        } 
        // end referals accruals ===>
       
        header("Location: /investment"); 
        exit;
    }

    ////////////////////

    public function actionDeposits($conf)
    {
      //  Log::add("Log dep ".$_SERVER['REMOTE_ADDR'].' -- '.$_SERVER['HTTP_X_FORWARDED_FOR'].' -- '.$_SERVER['HTTP_USER_AGENT']);
            
        if($conf != 'ef4055d2983c82d08923eb9'){
            echo 'error';
            exit;}
            
        $dtime = date("Y-m-d H:i:s");
        $depTypes = Data::depTypes();
        $accrTable = Data::accrTable();
        $deposits = Deposit::getActive($date);
        foreach ($deposits as $key => $dep){
            $date1 = strtotime($dep['last']);  
            $date2 = strtotime("$dtime");  
            $diff = ($date2 - $date1)/(60*60* $depTypes[$dep['type']]['each']); 
            $curdate = $dep['last'];
           // echo $diff.' diff <br>';
            if($diff >=1){ //change to 1
                $accrNum = $dep['accrNum'];
                $dayAccr = $dep['dayAccr'];
               /* $t1 = 0;
                $t2 = 0;*/
                for ($j=0; $j<$diff-1; $j++) {
                    $fee = rand(10, 15);
                    $curdate = date('Y-m-d H:i:s',strtotime("+".($j+1)*$depTypes[$dep['type']]['each']." hours",strtotime($dep['last'])));
                    $sum = $dep['sum']/100*$depTypes[$dep['type']]['perTime'];
                    $sum = round(($sum - $sum/100*$fee) , 2);// sum-10%
                   
                    Deposit::addVal($dep['id'],$sum,'profit');
                    User::addVal($dep['user'],$sum,'balance');
                    // $dtime to $curdate
                    Journal::add('inv',$dep['user'],$sum,$curdate,'Investment accrual from '.$dep['name'],$depTypes[$dep['type']]['perTime'],$dep['sum'],0);
                    $DepUser = User::getUserInfo($dep['user']);
                    $curUser = $DepUser;
                    //-////////////
                      //  $t1 += $sum;
                        if($accrNum >1){
                            $rand = rand(-14, 9) / 100;//+ потом
                            $pers = $depTypes[$dep['type']]['perTime'] + $rand;
                            $sum = $dep['sum']/100*$pers;
                            $sum = round(($sum - $sum/100*$fee) , 2);// sum-10%
                            
                           // $t2 += $sum;
                            $accrNum -=1; 
                            $dayAccr -=$pers;
                            
                        }else{
                            if($dayAccr>0){
                                //$pers = $depTypes[$dep['type']]['perTime'] + $dayAccr;
                                $sum = $dep['sum']/100*$dayAccr;
                                $sum = round(($sum - $sum/100*$fee) , 2);// sum-10%
                                
                            }
                           /* $t2 += $sum;
                            echo' ========>'.$t1.' =>'.$t2.'<br>';
                            $t1 = 0;
                            $t2 = 0;*/
                            $accrNum = $depTypes[$dep['type']]['times'];
                            $dayAccr = $depTypes[$dep['type']]['perDay'];
                        }
                      //  echo $accrNum.' sum===>'.$sum.'<br>';
                    //-////////////
                    for ($i = 0; $i < 10; $i++) {
                        if($curUser['sponsor']>0){
                            $sponsor = User::getUserInfo($curUser['sponsor']);
                            if($accrTable[$i][$sponsor['status']] >0){
                            $accr = $sum/100 * $accrTable[$i][$sponsor['status']];
                            
                           // echo $i.'====>'.$accr.'<br>';
                            User::addVal($sponsor['id'],$accr,'balance');
                            User::addVal($sponsor['id'],$accr,'refProfit' );
                            // journal
                            // $dtime to $curdate
                            Journal::add('ref',$sponsor['id'],$accr,$curdate,'Sponsorship accrual from '.$DepUser['login'],$accrTable[$i][$sponsor['status']],$sponsor['status'],$i);
                            }
                            $curUser = $sponsor;
                        }else{
                            break;
                        }
                    }
                }
                // $dtime to $curdate
                Deposit::setVal($dep['id'],$accrNum,'accrNum');
                Deposit::setVal($dep['id'],$dayAccr,'dayAccr');
                Deposit::setVal($dep['id'],$curdate,'last'); 
            }
        }
        echo '<br>done';
        exit;
    }

  

    public function actionNewwith()
    {
        Auth::isLoged();
        //<=== validation 
        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        if( $user['bonus']<$_POST['sum']){
            $errors[] = 'Not enouth money.';
        }

        if($_SESSION['user']['login']=='tester1'){
        }
                if($_POST['cur']!='gridPay' && $_POST['cur']!='balance'){
                    $pending = Withdrawal::where("user = {$_SESSION['userId']} AND status='pending'");
                    if(count($pending)>0){
                        $errors[] = 'У вас уже есть заявка на рассмотрении.';
                    }
                }

        if($user['ban_width']==1){
            $errors[] = 'Withdrawals are not allowed.';
        }

        $adrs = ['btc'=>'btc','eth'=>'eth','usdt_erc20'=>'usdt','usd'=>'usd','payeer'=>'payeer', 'qiwi'=>'qiwi', 'advcash'=>'advcash'];
        if($adrs[$_POST['cur']]){
            if(strlen($user['with_'.$adrs[$_POST['cur']]])<=0){
                $errors[] = 'Укажите '.strtoupper($adrs[$_POST['cur']]).' адрес для вывода на странице "Верификация"';
            }else{
                $adr = $user['with_'.$adrs[$_POST['cur']]];
            }
        }else{
            $adr = $_POST['adr'];
        }

        if($_POST['cur']!='balance'){
            $verification = Verification::getBy('user',$_SESSION['userId']);
            if(!$verification || $verification['status']!='confirmed'){
                $errors[] = 'Verify your account first!';
            }
            ////////
            //$usd_to_tok_sum = UserService::get_usd_to_tok_sum($_SESSION['userId']);
            if($user['usd_to_tok_sum'] < $GLOBALS['env']['min_usd_to_tok_sum']){
                $errors[] = "Недостаточный минимальный оборот, текущий = \${$user['usd_to_tok_sum']}, необходимо $".$GLOBALS['env']['min_usd_to_tok_sum'];
            }
            ///////
            if($_POST['sum']<$GLOBALS['env']['min_with_sum']){
                $errors[] = "Минимальная сумма вывода = $".$GLOBALS['env']['min_with_sum'];
            }
            $max_with=Option::get('max_with');
            if($max_with && $_POST['sum']>$max_with){
                $errors[] = "Максимальная сумма вывода = $".$max_with;
            }
           
        }

        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /dashboard"); 
            exit;
        }

        //<=== create withdraw 
        $fee =  Option::get('with_fee');
        $dtime = date("Y-m-d H:i:s");

     
        if($_POST['cur']=='balance'){
            //Withdrawal::add($dtime, $_SESSION['userId'],$_POST['cur'],$_POST['sum'],$_POST['adr'],'',1,'confirmed');
            Withdrawal::addFromArray([ 'user'=>$_SESSION['userId'],'cur'=>$_POST['cur'],
            'date'=>$dtime,
            'sum'=>$_POST['sum'],'address'=>$adr,'status'=>'confirmed']);
            User::addVal($_SESSION['userId'],-$_POST['sum'],'bonus');
            User::addVal($_SESSION['userId'],$_POST['sum'],'balance');
            $_SESSION['success'] = 'Withdrawal successfull.';
        }elseif($_POST['cur']=='gridPay'){
            Withdrawal::addFromArray([ 'user'=>$_SESSION['userId'],'cur'=>$_POST['cur'],
            'date'=>$dtime,
            'sum'=>$_POST['sum'],'address'=>$adr,'status'=>'confirmed']);
            Journal::addFromArray(['type'=>'gridpay_add',
                'user'=>$_SESSION['userId'],
                'sum'=>$_POST['sum'],
                'date'=>$dtime,
                'cur'=>'usd',
                'name'=>'GridPay addition',
                'detail'=>'',
                'adr'=>'',
            ]);
            User::addVal($_SESSION['userId'],-$_POST['sum'],'bonus');
            User::addVal($_SESSION['userId'],$_POST['sum'],'gridPay');
            $_SESSION['success'] = 'Withdrawal successfull.';
        }else{
            $hash = md5("+$dtime+{$_POST['sum']}");
            //Withdrawal::add($dtime, $_SESSION['userId'],$_POST['cur'],$_POST['sum'],$_POST['adr'],$hash);
            Withdrawal::addFromArray([ 'user'=>$_SESSION['userId'],'cur'=>$_POST['cur'],
            'date'=>$dtime,
            'sum'=>$_POST['sum'],'address'=>$adr,'hash'=>$hash,'fee'=>$fee]);
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $emailTo = $user['email'];
            $subject = 'Withdrawal confirmation.';
            $body = "Dear user! \n To confirm your withdrawal, follow the  
            \n <a href='". $protocol.$_SERVER['HTTP_HOST'].'/wconf='.$hash."'>Withdrawal confirmation link</a>. \nBest regards. \n Team of Grid Group.";
            MailService::mail($emailTo, $subject, $body);
            $_SESSION['success'] = "We have sent the email link to your
            email address ($emailTo) to confirm the withdrawal of funds.";
        }

        header("Location: /dashboard"); 
        exit;
    }

    public function actionWithConfirm($hash)
    {
        $lng = Language::get();
        //<=== validation 
        $errors = false;
        $wall_types = ['bon'=>'bonus','tok'=>'TOKbalance','gridPay'=>'gridPay'];
        $url_types = ['bon'=>'dashboard','tok'=>'dashboard','gridPay'=>'gridpay'];
        $with = Withdrawal::getByHash($hash);
        if(!$with){
            echo 'withdrawal not found';exit;
        }else{

        $user = User::getUserInfo($with['user']);
        $wallet = $wall_types[$with['orig']];//($with['orig']!='tok')?'bonus':'TOKbalance';
        if($user[$wallet] < $with['sum']){
            $errors[] = 'Ammount mismatch.';
        }

        if($user['ban_width']==1){
            $errors[] = 'Withdrawals are not allowed.';
        }

        if($with['orig']=='tok'){
            $TokForSale = UserService::getTokForSale($with['user'],Option::get('stage'));
            if($with['sum']>$TokForSale){
                $errors[] = $lng['txt243'].' '.$TokForSale;
            }
        }

        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /{$url_types[$with['orig']]}");
            exit;
        }

        Withdrawal::setVal($with['id'], 'pending', 'status');
        Withdrawal::setVal($with['id'], '', 'hash');
        User::addVal($with['user'],-$with['sum'],$wallet);
        }
        $_SESSION['success']= 'Withdrawal is pending now.';
        header("Location: /{$url_types[$with['orig']]}"); 
        exit;
    }

    public function actionNewadd()
    {
        Auth::isLoged();
        //<=== validation 
       $errors = false;
        if($_POST['sum']<=0){
            $errors[] = 'Invalid ammount!';
        }
        if($_POST['cur']=='none'){
            $errors[] = 'Invalid currensy!';
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /dashboard"); exit;
        }
        // end validation ===>
        User::addVal($_SESSION['userId'],$_POST['sum'],'balance');
        $dtime = date("Y-m-d H:i:s");
        Journal::add('add',$_SESSION['userId'],$_POST['sum'],$dtime,"Addition",0,"complete",1, $_POST['cur'],'', '');  
       
      //Log::add($usr['id'].' '. $dtime.' '.$cur." payment is complete".' '.$sum);
        
        
        $_SESSION['success'] = 1;
        header("Location: /dashboard"); 
        exit;
    }

}