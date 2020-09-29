<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';

class GridpayController
{
    public function actionSend()
    {
        //var_dump($_POST);exit;
        Auth::isLoged();
        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        if( $_POST['sum'] <= 0){
            $errors[] = 'Wrong amount';
        }
        if( $user['gridPay']<$_POST['sum']){
            $errors[] = 'Not enouth money.';
        }
        $recipient = User::getByLogin($_POST['login']);
        if(!$recipient){
            $errors[] = 'Wrong user';
        }
        
        //$usd_to_tok_sum = UserService::get_usd_to_tok_sum($_SESSION['userId']);
        if($user['usd_to_tok_sum'] < $GLOBALS['env']['min_usd_to_tok_sum']){
            $errors[] = "Недостаточный минимальный оборот, текущий = \${$user['usd_to_tok_sum']}, необходимо $".$GLOBALS['env']['min_usd_to_tok_sum'];
        }
        
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /gridpay"); 
            return true;
        }

        $dtime = date("Y-m-d H:i:s");
        User::addVal($_SESSION['userId'],-$_POST['sum'],'gridPay');
        Journal::addFromArray(['type'=>'gridpay_send',
            'user'=>$_SESSION['userId'],
            'sum'=>$_POST['sum'],
            'date'=>$dtime,
            'cur'=>'usd',
            'name'=>'GridPay send to '.$recipient['login'],
            'detail'=>$recipient['login'],
            'adr'=>$recipient['id'],
        ]);

        User::addVal($recipient['id'],$_POST['sum'],'gridPay');
        Journal::addFromArray(['type'=>'gridpay_rec',
            'user'=>$recipient['id'],
            'sum'=>$_POST['sum'],
            'date'=>$dtime,
            'cur'=>'usd',
            'name'=>'GridPay recievement from '.$user['login'],
            'detail'=>$user['login'],
            'adr'=>$user['id'],
        ]);

        $_SESSION['success'] = 'Transaction successfull';
        header("Location: /gridpay"); 
        return true;
    }

    public function actionWith()
    {
        Auth::isLoged();
        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        $untrack_cur = ['balance','gr_usd'];
        if( $user['gridPay']<$_POST['sum']){
            $errors[] = 'Not enouth money.';
        }

        if($_SESSION['user']['login']=='tester1'){
        }
                if($_POST['cur']!='gr_usd' && $_POST['cur']!='balance'){
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
        
        if(!in_array($_POST['cur'],$untrack_cur)){
            if(strlen($_POST['name'])<=1){
                $errors[] = 'Wrong name!';
            }
            if(strlen($_POST['phone'])<=4){
                $errors[] = 'Wrong phone!';
            }
            
            //$usd_to_tok_sum = UserService::get_usd_to_tok_sum($_SESSION['userId']);
            if($user['usd_to_tok_sum'] < $GLOBALS['env']['min_usd_to_tok_sum']){
                $errors[] = "Недостаточный минимальный оборот, текущий = \${$user['usd_to_tok_sum']}, необходимо $".$GLOBALS['env']['min_usd_to_tok_sum'];
            }

            if($_POST['sum']<$GLOBALS['env']['min_with_sum']){
                $errors[] = "Минимальная сумма вывода = $".$GLOBALS['env']['min_with_sum'];
            }
            $max_with=Option::get('max_with');
            if($max_with && $_POST['sum']>$max_with){
                $errors[] = "Максимальная сумма вывода = $".$max_with;
            }
        }
        if($user['ban_width']==1){
            $errors[] = 'Withdrawals are not allowed.';
        }
        $verification = Verification::getBy('user',$_SESSION['userId']);

        if(in_array($_POST['cur'],$untrack_cur) && (!$verification || $verification['status']!='confirmed')){
            $errors[] = 'Verify your account first!';
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /gridpay"); 
            return true;
        }

        if(isset($_POST['name']) && isset($_POST['phone'])){
            User::setVal($_SESSION['userId'],$_POST['name'],'name');
            User::setVal($_SESSION['userId'],$_POST['phone'],'phone');
        }

        $fee = Option::get('with_fee');
        $dtime = date("Y-m-d H:i:s");
        if($_POST['cur']=='gr_usd'){
            $cur_stage = Gr_stage::get(Option::get('gr_stage'));
            Withdrawal::addFromArray([ 'user'=>$_SESSION['userId'],'cur'=>$_POST['cur'],
            'date'=>$dtime, 'sum'=>$_POST['sum'],
            'address'=>$adr,'status'=>'confirmed', 'orig'=>'gridPay']);
            Journal::addFromArray(['type'=>'gr_add',
                'user'=>$_SESSION['userId'],
                'sum'=>$_POST['sum'],
                'date'=>$dtime,
                'cur'=>'usd',
                'name'=>'Пополнение баланса',
                'detail'=>'',
                'adr'=>'gridPay',
                'stage'=>$cur_stage['num'],
            ]);
            User::addVal($_SESSION['userId'],-$_POST['sum'],'gridPay');
            User::addVal($_SESSION['userId'],$_POST['sum'],'gr_usd');
            $_SESSION['success'] = 'Withdrawal successfull.';
        }elseif($_POST['cur']=='balance'){
            Withdrawal::addFromArray([ 'user'=>$_SESSION['userId'],'cur'=>$_POST['cur'],
            'date'=>$dtime,'sum'=>$_POST['sum'],
            'address'=>$adr,'status'=>'confirmed', 'orig'=>'gridPay']);
            User::addVal($_SESSION['userId'],-$_POST['sum'],'gridPay');
            User::addVal($_SESSION['userId'],$_POST['sum'],'balance');
            $_SESSION['success'] = 'Withdrawal successfull.';
        }else{
            $hash = md5("+$dtime+{$_POST['sum']}");
            Withdrawal::addFromArray([ 'user'=>$_SESSION['userId'],'cur'=>$_POST['cur'],
            'date'=>$dtime,
            'sum'=>$_POST['sum'],'address'=>$adr,'fee'=>$fee,
            'hash'=>$hash, 'status'=>'unactive', 'orig'=>'gridPay']);
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $emailTo = $user['email'];
            $subject = 'Withdrawal confirmation.';
            $body = "Dear user! \n To confirm your withdrawal, follow the  
            \n <a href='". $protocol.$_SERVER['HTTP_HOST'].'/wconf='.$hash."'>Withdrawal confirmation link</a>. \nBest regards. \n Team of Grid Group.";
            MailService::mail($emailTo, $subject, $body);
            $_SESSION['success'] = 'We have sent the email link to your
            email address to confirm the withdrawal of funds.';
        }

        header("Location: /gridpay"); 
        return true;
    }

    public function actionBal_to_gp()
    {
        //var_dump($_POST);exit;
        Auth::isLoged();
        
        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        if( $user['balance']<$_POST['sum']){
            $errors[] = 'Not enouth money.';
        }
        if($_POST['sum']<$GLOBALS['env']['min_with_sum']){
            $errors[] = "Минимальная сумма вывода = $".$GLOBALS['env']['min_with_sum'];
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /dashboard"); 
            exit;
        }

        $dtime = date("Y-m-d H:i:s");
        Withdrawal::addFromArray([ 'user'=>$_SESSION['userId'],'cur'=>'gridPay',
            'date'=>$dtime,
            'sum'=>$_POST['sum'],'address'=>'balance','status'=>'confirmed']);
            Journal::addFromArray(['type'=>'gridpay_add',
                'user'=>$_SESSION['userId'],
                'sum'=>$_POST['sum'],
                'date'=>$dtime,
                'cur'=>'usd',
                'name'=>'GridPay addition',
                'detail'=>'',
                'adr'=>'balance',
            ]);
            User::addVal($_SESSION['userId'],-$_POST['sum'],'balance');
            User::addVal($_SESSION['userId'],$_POST['sum'],'gridPay');
            $_SESSION['success'] = 'Withdrawal successfull.';

        header("Location: /dashboard"); 
        exit;
    }
}