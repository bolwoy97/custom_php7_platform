<?php

class Gr_payController
{
    public function actionBon_with()
    {
        //var_dump($_POST);exit;
        Auth::isLoged();
        $user = User::getUserInfo($_SESSION['userId']);
        if($_POST['sum']<=0 || !is_numeric($_POST['sum'])){
            $errors[] = 'Invalid amount';
        }
        if( $user['gr_bon']<$_POST['sum']){
            $errors[] = 'Not enouth token.';
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /gr_dashboard"); 
            exit;
        }
        $dtime = date("Y-m-d H:i:s");
        Withdrawal::addFromArray([ 'user'=>$_SESSION['userId'],'cur'=>'gr_bon',
            'rate'=>0,'date'=>$dtime,
            'sum'=>$_POST['sum'],'address'=>$_POST['adr'],'status'=>'pending', 'orig'=>'gr_bon']);
        User::addVal($_SESSION['userId'],-$_POST['sum'],'gr_bon');
        
        $_SESSION['success'] = 'Withdrawal is pending now';
        header("Location: /gr_dashboard"); 
        exit;
    }

    public function actionBuy_tok()
    {
        //var_dump($_POST);exit;
        Auth::isLoged();
        
        $errors = false;
        $user = User::getUserInfo($_SESSION['userId']);
        $cur_stage = Gr_stage::get(Option::get('gr_stage'));
        if($_POST['tok']<=0){
            $errors[] = 'Invalid ammount!';
        }
        

        if(($cur_stage['goal']-$cur_stage['sum'])<$_POST['tok']){
            $tok = $cur_stage['goal']-$cur_stage['sum'];
        }else{
            $tok = $_POST['tok'];
        }
        $tokPrice = $cur_stage['price'];
        $sum = $tok*$tokPrice;
     
        if($user['gr_usd']<$sum){
            $errors[] = 'Not enouth money.';
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /gr_dashboard");
            exit;
        }

       

        User::addVal($_SESSION['userId'],-$sum,'gr_usd');
        User::addVal($_SESSION['userId'], $tok,'gr_tok');
        User::addVal($_SESSION['userId'], $tok,'gr_bon');
        $dtime = date("Y-m-d H:i:s");
        Journal::add('gr_by_tok',$_SESSION['userId'],$tok,$dtime,'Покупка метров',$tokPrice,"complete",0, 'gr_tok','', '',$cur_stage['num']);  
        Journal::add('gr_by_tok_bon',$_SESSION['userId'],$tok,$dtime,'Начисление Grid Back Bonus',$tokPrice,"complete",0, 'gr_bon','', '',$cur_stage['num']);  
      
        Gr_stage::addSum($tok);

        $_SESSION['success'] = "Transaction successful";
        header("Location: /gr_dashboard"); 
        exit;
    }

}
