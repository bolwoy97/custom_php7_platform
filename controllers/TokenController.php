<?php

class TokenController
{

    public function actionWithdraw()
    {
        
        Auth::isLoged();
        $lng=Language::get();
        //<=== validation 
        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        $fee = 10;
        $stage = Stage::get(Option::get('stage'));
        $dtime = date("Y-m-d H:i:s");

        if( $user['TOKbalance']<$_POST['sum']){
            $errors[] = 'Not enouth token.';
        }
        
        if($_SESSION['user']['login']=='tester1'){
        }
                if($_POST['cur']!='gridPay'){
                    $pending = Withdrawal::where("user = {$_SESSION['userId']} AND status='pending'");
                    if(count($pending)>0){
                        $errors[] = 'У вас уже есть заявка на рассмотрении.';
                    }
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
        
        if($user['ban_width']==1){
            $errors[] = 'Withdrawals are not allowed.';
        }

        $verification = Verification::getBy('user',$_SESSION['userId']);
        if(!$verification || $verification['status']!='confirmed'){
            $errors[] = 'Verify your account first!';
        }

        //$usd_to_tok_sum = UserService::get_usd_to_tok_sum($_SESSION['userId']);
        if($user['usd_to_tok_sum'] < $GLOBALS['env']['min_usd_to_tok_sum']){
            $errors[] = "Недостаточный минимальный оборот, текущий = \${$user['usd_to_tok_sum']}, необходимо $".$GLOBALS['env']['min_usd_to_tok_sum'];
        }

        if($_POST['sum']*$stage['price']<$GLOBALS['env']['min_with_sum']){
            $errors[] = "Минимальная сумма вывода = $".$GLOBALS['env']['min_with_sum'];
        }
        $max_with=Option::get('max_with');
        if($max_with && $_POST['sum']*$stage['price']>$max_with){
            $errors[] = "Максимальная сумма вывода = $".$max_with;
        }

        $TokForSale = UserService::getTokForSale($_SESSION['userId'],Option::get('stage'));
        if($_POST['sum']>$TokForSale){
            $errors[] = $lng['txt243'].' '.$TokForSale;
        }

        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /dashboard"); 
            exit;
        }

        //<=== create withdraw 
        

        if($_POST['cur']=='gridPay'){
            $sum_usd = $_POST['sum']*$stage['price'];
            //echo $sum_usd;exit;
            Withdrawal::addFromArray([ 'user'=>$_SESSION['userId'],'cur'=>$_POST['cur'],
            'rate'=>$stage['price'],'date'=>$dtime,
            'sum'=>$_POST['sum'],'address'=>$adr,'status'=>'confirmed', 'orig'=>'tok']);
            Journal::addFromArray(['type'=>'gridpay_add',
                'user'=>$_SESSION['userId'],
                'sum'=>$_POST['sum'],
                'date'=>$dtime,
                'cur'=>'tok',
                'rate'=>$stage['price'],
                'name'=>'GridPay addition',
                'detail'=>'',
                'adr'=>'',
            ]);
            User::addVal($_SESSION['userId'],-$_POST['sum'],'TOKbalance');
            User::addVal($_SESSION['userId'],$sum_usd,'gridPay');
            $_SESSION['success'] = 'Withdrawal successfull.';
        }else{
            $hash = md5("+$dtime+{$_POST['sum']}");
            /*Withdrawal::add($dtime, $_SESSION['userId'],$_POST['cur'],$_POST['sum'],
            $_POST['adr'],$hash, $stage['price']-($stage['price']/100*$fee),'unactive','tok');*/
            Withdrawal::addFromArray([ 'user'=>$_SESSION['userId'],'cur'=>$_POST['cur'],
            'date'=>$dtime,
            'sum'=>$_POST['sum'],'address'=>$adr,'fee'=>$fee,
            'hash'=>$hash, 'rate'=>$stage['price']-($stage['price']/100*$fee),
            'status'=>'unactive', 'orig'=>'tok']);
           
            
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $emailTo = $user['email'];
            $subject = 'Token sale confirmation.';

            $body = "Dear user! \n To confirm your withdrawal, follow the  
            \n <a href='". $protocol.$_SERVER['HTTP_HOST'].'/wconf='.$hash."'>Withdrawal confirmation link</a>. \nBest regards. \n Team of Grid Group.";
            MailService::mail($emailTo, $subject, $body);
            //User::addVal($_SESSION['userId'],-$_POST['sum'],'bonus');
            
            $_SESSION['success'] = 'We have sent the email link to 
            your email address to confirm the withdrawal of funds.';
        }
        header("Location: /dashboard"); 
        exit;
    }

    public function actionUsd_to_tok($sum)
    {
        Auth::isLoged();
        
        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        // $Stage = Data::curStage();
        if($sum<=0){
            $errors[] = 'Invalid ammount!';
        }
       
        $detail = '';
        //$sum = $_POST['sum'];//usd
        $tokPrice = Data::tokPrice();
        $tok = $sum/$tokPrice;
        if($_POST['bonus']){
            $bonAmount = Option::get('bonAmount');
            if(Option::get('bonStatus')=='on' && $bonAmount>0 && $user['bonOneHand']>0){
                $tokPrice = Option::get('bonPrice');
                if($bonAmount>0){
                    $bonus_usd_to_tok = true; // транзакция идет по бонусу
                    $detail = 'bonus';
                    $tok = $sum/$tokPrice; //сколько юзер хочет приобрести
                    if($bonAmount-$tok < 0){ //сколько можно приобрести
                        $tok = $bonAmount;
                        $sum = $tok*$tokPrice;
                    }
                    if($user['bonOneHand']<$tok){
                        //$errors[] = 'Бонусов доступно: '.$user['bonOneHand'].'GRD';
                        $tok = $user['bonOneHand'];
                        $sum = $tok*$tokPrice;
                    }
                }
            }else{
                $errors[] = 'Bonus program has ended';
            }
        }
     
        if($tokPrice<0.01){
            $errors[] = 'Invalid price!';
        }
        if($user['balance']<$sum){
            $errors[] = 'Not enouth money.';
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /dashboard"); 
            exit;
        }

        
        User::addVal($_SESSION['userId'],-$sum,'balance');
        User::addVal($_SESSION['userId'], $tok,'TOKbalance');
        $dtime = date("Y-m-d H:i:s");
        Journal::add('usd_to_tok',$_SESSION['userId'],$tok,$dtime,"Token Purchase",$tokPrice,"complete",0, 'tok',$detail, '');  
        
        if($bonus_usd_to_tok){ //отдельная запись в журнал админки 
            Option::addVal('bonAmount', -$tok);
            Journal::add('adm_bon',$_SESSION['userId'],$tok,$dtime,"Bonus Token Purchase",$tokPrice,"complete",0, 'tok','', '');   
            User::addVal($_SESSION['userId'], -$tok,'bonOneHand');
        }

        //ref prog
            $cur_ref_prog = Ref_progService::getCurrent();
            if($cur_ref_prog){
                Journal::add('ref_prog',$_SESSION['userId'],$tok,$dtime,"ref programm token purchase".$user['login'],$tokPrice,"complete",0, 'tok',"$detail", $cur_ref_prog['id']);   
                $ref_prog_lvls = count($cur_ref_prog['rates']);
                $sponsId = $user['sponsor'];
                for ($i=1; $i <= $ref_prog_lvls; $i++) { 
                    $sponsor = User::getUserInfo($sponsId);
                    if($sponsor){
                        $ref_sum = $sum/100*$cur_ref_prog['rates'][$i];
                        User::addVal($sponsor["id"], $ref_sum,'ref_prog_sum');
                        Journal::add('ref_prog_lvl',$sponsor["id"],$ref_sum,$dtime,$user['id'],$tokPrice,"complete",$i, 'tok',"$detail", $cur_ref_prog['id']); 
                        Ref_progService::CheckReward($sponsor ,$cur_ref_prog); 
                        $sponsId = $sponsor['sponsor'];
                    }else{break;}
                }
            }
        //end ref prog

        //partner prog
        /* $cur_partner_prog = Partner_progService::getCurrent();
         if($cur_partner_prog){
             $sponsor = User::getUserInfo($user['sponsor']);
            if($sponsor){
                 User::addVal($sponsor["id"], $sum,'partner_prog_sum');
                 Journal::add('partner_prog_lvl',$sponsor["id"],$sum,$dtime,$user['id'],$tokPrice,"complete",1, 'tok',"$detail", $cur_partner_prog['id']); 
            }
         }*/
        //end partner prog

        Stage::addSum($tok);
        Stage::addVal(Option::get('stage'), $sum, 'usd_sum');

        $sponsId = $user['sponsor'];
        $refAccrs = Data::refAccrs();
        $refAccrsCount = count($refAccrs);
        for ($i=0; $i < $refAccrsCount; $i++) { 
            $sponsor = User::getUserInfo($sponsId);
            if($sponsor){
                $ref_tok = $sum/100*$refAccrs[$i];
                User::addVal($sponsor["id"], $ref_tok,'bonus');
                Journal::add('bon',$sponsor["id"],$ref_tok,$dtime,"Referal bonus",0,"complete",0, 'usd','tok', $user['id']);  
                //Stage::addSum($ref_tok);
                $sponsId = $sponsor['sponsor'];
            }else{break;}
        }

        $_SESSION['success'] = "Transaction successful";
        return $sum;
    }


    public function actionUsd_to_2tok($sum)
    {
        Auth::isLoged();
        
        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        //$tokPrice = Option::get('tok2_price');
        $tokPrice = TokenService::get_tok2_price();
        //$sum = $_POST['sum'];//usd
        $tok = $sum/$tokPrice; 
        ////
        if($sum<=0){
            $errors[] = 'Invalid ammount!';
        }
        if($tokPrice<0.01){
            $errors[] = 'Invalid price!';
        }
        if($user['balance']<$sum ){
            $errors[] = 'Not enouth money.';
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /dashboard"); 
            exit;
        }
        
        User::addVal($_SESSION['userId'],-$sum,'balance');
        User::addVal($_SESSION['userId'], $tok,'TOK_2balance');
        //User::addVal($_SESSION['userId'], -$tok,'tok2OneHand');
        $dtime = date("Y-m-d H:i:s");
        Journal::add('usd_to_2tok',$_SESSION['userId'],$tok,$dtime,"Token 2 Purchase",$tokPrice,"complete",0, 'tok','', '');  
      
        //Option::addVal('tok2_goal', -$tok);

        Stage::addSum($tok);
        Stage::addVal(Option::get('stage'), $sum, 'usd_sum');
        

        //ref prog
            $cur_ref_prog = Ref_progService::getCurrent();
            if($cur_ref_prog){
                Journal::add('ref_prog',$_SESSION['userId'],$tok,$dtime,"ref programm token_2 purchase".$user['login'],$tokPrice,"complete",0, 'tok2','', $cur_ref_prog['id']);   
                $ref_prog_lvls = count($cur_ref_prog['rates']);
                $sponsId = $user['sponsor'];
                for ($i=1; $i <= $ref_prog_lvls; $i++) { 
                    $sponsor = User::getUserInfo($sponsId);
                    if($sponsor){
                        $ref_sum = $sum/100*$cur_ref_prog['rates'][$i];
                        User::addVal($sponsor["id"], $ref_sum,'ref_prog_sum');
                        Journal::add('ref_prog_lvl',$sponsor["id"],$ref_sum,$dtime,$user['id'],$tokPrice,"complete",$i, 'tok2','', $cur_ref_prog['id']); 
                        Ref_progService::CheckReward($sponsor ,$cur_ref_prog);    
                        $sponsId = $sponsor['sponsor'];
                    }else{break;}
                }
            }
        //end ref prog  

        

        $sponsId = $user['sponsor'];
        $refAccrs = Data::refAccrs();
        $refAccrsCount = count($refAccrs);
        for ($i=0; $i < $refAccrsCount; $i++) { 
            $sponsor = User::getUserInfo($sponsId);
            if($sponsor){
                $ref_tok = $sum/100*$refAccrs[$i];
                User::addVal($sponsor["id"], $ref_tok,'bonus');
                Journal::add('bon',$sponsor["id"],$ref_tok,$dtime,"Referal bonus",0,"complete",0, 'usd','tok2', $user['id']);  
                //Stage::addSum($ref_tok);
                $sponsId = $sponsor['sponsor'];
            }else{break;}
        }

        $_SESSION['success'] = "Transaction successful";
        return $sum;
        //exit;
    }

    public function actionUsd_to_tok_and_tok2()
    {
        //var_dump($_POST);exit;
        Auth::isLoged();
        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        if($_POST['sum']<=0){
            $errors[] = 'Invalid ammount!';
        }
        if($user['balance']<$_POST['sum']){
            $errors[] = 'Not enouth money.';
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /dashboard"); 
            exit;
        }

        $sum = $_POST['sum']/2;
        $sum = self::actionUsd_to_tok($sum);
        $usd_to_tok_sum = $sum;
        $usd_to_tok_sum += self::actionUsd_to_2tok($sum);

        User::addVal($user['id'], $usd_to_tok_sum, "usd_to_tok_sum"); 
      
        header("Location: /dashboard"); 
        exit;
    }

    public function actionUsd_to_tok2_only()
    {
        Auth::isLoged();
        $user = User::getUserInfo($_SESSION['userId']);
        $sum = $_POST['sum'];
        $usd_to_tok_sum = self::actionUsd_to_2tok($sum);
        User::addVal($user['id'], $usd_to_tok_sum, "usd_to_tok_sum"); 
        header("Location: /buy/tok2"); 
        exit;
    }

    public function actionUsd_to_tg_tok()
    {
        //var_dump($_POST);exit;
        Auth::isLoged();
        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        if($_POST['sum']<=0){
            $errors[] = 'Invalid ammount!';
        }
        if($user['balance']<$_POST['sum']){
            $errors[] = 'Not enouth money.';
        }
        $tg_purchases = Tg_purchase::where("user={$_SESSION['userId']}");
        if(count($tg_purchases)==0 && strlen($_POST['tg_adr'])<=1){
            $errors[] = 'Invalid address!';
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /tools"); 
            exit;
        }
        
        if(count($tg_purchases)==0){
            $tg_adr = $_POST['tg_adr'];
        }else{
            $tg_adr = $tg_purchases[0]['adr'];
        }
        $dtime = date("Y-m-d H:i:s");  
        User::addVal($user['id'],  -$_POST['sum'], "balance"); 
        Tg_purchase::add($_SESSION['userId'], $_POST['sum'], $tg_adr);
        Journal::add('tg_pur',$user["id"],$_POST['sum'],$dtime,"Покупка телеграм бота",0,"complete",0, 'usd','', $tg_adr);  

        $_SESSION['success'] = "Transaction successful";
        header("Location: /tools"); 
        exit;
    }



}