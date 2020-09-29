<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';

class PreviewController
{
    public function actionAddwalets()
    {
        Auth::isLoged();
        $user = User::getUserInfo($_SESSION['userId']);
        $wallets = array(
            'btcAdr'=> $user['btcAdr'],
            'ethAdr'=> $user['ethAdr'],
            'bchAdr'=> $user['bchAdr'],
            'usdt_erc20Adr'=> $user['usdt_erc20Adr'],
            'usdAdr'=> "",

           /* 'btcWith'=> $user['btcWith'],
            'ethWith'=> $user['ethWith'],
            'bchWith'=> $user['bchWith'],
            'usdt_ercWith'=> $user['usdt_ercWith'],
            'usdWith'=> $user['usdWith']*/
        );
        
        echo json_encode($wallets);
        exit;
    }

    public function actionApprpin()
    {
        Auth::isLoged();
        $user = User::checkUserPin($_SESSION['userId'], $_POST['pin']);
        if ($user) {
            echo 'OK';exit;
        }
        echo 'error';
        exit;
    }

    public function actionCourses()
    {
        Auth::isLoged();
        
        $courses = array(
            'btc'=> Data::course('btc'),
            'eth'=> Data::course('eth'),
            'bch'=> Data::course('bch'),
            'usdt_erc20'=> Data::course('usdt_erc20'),
            'usd'=> 1
        );
        
        echo json_encode($courses);
        exit;
    }

    public function actionTOKprice()
    {
        Auth::isLoged();
        $res = Data::tokPrice();
        echo json_encode($res);
        exit;
    }

    public function actionTime()
    {
        Auth::isLoged();
        //format 08/18/2019 10:26:00
        $dtime = date("Y.m.d H:i");
        echo $dtime;//date("m/d/Y H:i:s");
        exit;
    }

   
}