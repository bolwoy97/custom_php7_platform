<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';

class FchangeController
{
    public function actionForm()
    {
        Auth::isLoged();
        //ini_set("display_errors", 1);
        $user = User::getUserInfo($_SESSION['userId']);
        $merchant_name = $GLOBALS['env']['fch_merch_name'];
        
        $url = "https://f-change.biz/obmen/get_merchant_cources/".$merchant_name;
        $obmen_cources_info = json_decode(file_get_contents($url));

        $sum = (isset($_GET['sum'])&&$_GET['sum']>0)?$_GET['sum']:0;

        $wallet_types=['balance', 'gridPay'];
        $wallet_type = (isset($_GET['type'])&&in_array($_GET['type'],$wallet_types))?$_GET['type']:'balance';
        
        if($wallet_type=='gridPay'){
            $info = "Пополнение баланса GridPay {$user['login']}";
        }else {
            $info = "Пополнение баланса {$user['login']}";
        }

        require_once(ROOT.'/views/site/fchange_form.php');
        exit;
    }

    public function actionStatus()
    {
        //Log::add("Log fchange ".$_SERVER['REMOTE_ADDR'].' - '.$_SERVER['HTTP_USER_AGENT'].' - '.$_SERVER['HTTP_X_FORWARDED_FOR']);
      
        $merchant_pass = $GLOBALS['env']['fch_merch_pass']; //укажите Ваш пароль мерчанта

        $post_hash = $_POST['verificate_hash'];
        unset($_POST['verificate_hash']);
        
        $my_hash = "";
        foreach ($_POST AS $key_post=>$one_post) if ($my_hash=="") {$my_hash = $one_post;}
            else $my_hash = $my_hash."::".$one_post;
        
        $my_hash = $my_hash."::".$merchant_pass;
        $my_hash = hash ( "sha256", $my_hash);
        
        if ($my_hash==$post_hash){
            $date = date("Y-m-d");
            $dtime = date("Y-m-d H:i:s");
            $id = $_POST['user_id'];
            $sum = $_POST['amount'];
            $cur = 'usd';
            if(Journal::checkBatch($id, $post_hash)){
                Log::add($id.' '.$_POST['payed_paysys']." fchange batch error ".$sum);
                exit('fchange batch error');
            }

            $wallet_types=['balance', 'gridPay'];
            $wallet_type = (isset($_POST['wallet_type'])&&
            in_array($_POST['wallet_type'],$wallet_types))? $_POST['wallet_type']:'balance' ;
            
            User::addVal($id,$sum,$wallet_type);
            if($wallet_type == 'gridPay'){
                Journal::addFromArray(['type'=>'gridpay_add_fchange',
                'user'=>$id,
                'sum'=>$sum,
                'date'=>$dtime,
                'cur'=>$cur,
                //'rate'=>$stage['price'],
                'name'=>'GridPay addition',
                'detail'=>$post_hash,
                'adr'=>'fchange',
                ]);
            }else{
                Journal::add('add',$id,$sum,$dtime,"Addition",0,"complete",1, $cur,$post_hash, 'fchange');  
            } 
            //Log::add($id.' '. $dtime.' '.$cur." fchange  payment is complete".' '.$sum);
            echo "*ok*";
            }else{
                Log::add($id.' '.$_POST['payed_paysys']." fchange hash error ".$sum);
                exit('fchange hash error');
            }
        exit;
    }

    public function actionSucess()
    {
        $_SESSION['success'] = 'Addition successful.';
        header("Location: /dashboard");
        exit;
    }

    public function actionError()
    {
        $_SESSION['errors'] = ['Addition error.'];
        header("Location: /dashboard");
        exit;
    }

}