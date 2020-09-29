<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';

class ToolsController
{
    public function actionTest()
    {
        $user = User::where("login = 'bolwoy97'")[0];
        $user['id'] = 5;
        echo  PostService::send(
            $GLOBALS['env'][ENV_TYPE]['yard_site'].'tools/DB_MergeController/add_grid_user', $user);
        exit;
    }

    public function actionSeed($conf)
    {
        if($conf != 'ef4055d2983c82d08923eb9'){
            echo 'error';
            exit;}

            
        echo 'seed';
        exit;
    }
    
    public function actionSet_usd_to_tok_sum_for_all()
    {
        Auth::isLoged();    
        //$_SESSION['utts_id'] =0;exit;
        $min_turn = $GLOBALS['env']['min_usd_to_tok_sum'];
        if(!isset($_SESSION['utts_id'])){
            $_SESSION['utts_id'] =0;
        }
        echo $_SESSION['utts_id'].'-<br>';
        $all_users = array_chunk(User::where("usd_to_tok_sum<=$min_turn AND id >= {$_SESSION['utts_id']}"),300)[0]; 
        foreach ($all_users as $user) {
            $usd_to_tok_sum = UserService::get_usd_to_tok_sum($user['id']);
            User::setVal($user['id'], $usd_to_tok_sum, "usd_to_tok_sum"); 
            $_SESSION['utts_id'] = $user['id'];
        }
        echo $_SESSION['utts_id'];exit;
    }
    
       

    public function actionGetImg()
    {
        if(isset($_GET['by'])) {
            $row = Image::where(" {$_GET['by']} = '{$_GET['val']}' ")[0];
            header("Content-type: " . $row["type"]);
            echo $row["src"];
        }
        exit;
    }

    

    
    public function actionGetcourses()
    {
                $courses = Data::courseFromCP();
                $perc = 2;
                $btcC = $courses['btc'] - ($courses['btc']/100*$perc);
                $ethC = $courses['eth'] - ($courses['eth']/100*$perc);
                $bchC = $courses['bch'] - ($courses['bch']/100*$perc); 
                $usdt_erc20C = $courses['usdt_erc20'] - ($courses['usdt_erc20']/100*$perc);            
                //var_dump($courses);
                if($btcC>0){
                    Option::set('btc_course',$btcC);
                }
                if($ethC>0){
                    Option::set('eth_course',$ethC);
                }
                if($bchC>0){
                    Option::set('bch_course',$bchC);
                }
                if($usdt_erc20C>0){
                    Option::set('usdt_erc20_course',$usdt_erc20C);
                }

                echo 'BTC => '.$btcC.'<br>';
                echo 'ETH => '.$ethC.'<br>';
                echo 'BCH => '.$bchC.'<br>';
                echo 'USDT.ERC20 => '.$usdt_erc20C.'<br>';
                echo 'ok' ;
                exit;
                
     
    }

    
    public function actionDev($dev)
    {   
        if($dev == 1 ){
            $_SESSION['dev_mode'] = 1;
        }else{
            unset($_SESSION["dev_mode"]);
        }

        header("Location: /dahsboard"); 
        exit;
    }

  
    public function  actionCaptcha()
    {   
        $md5_hash = md5(rand(0,999));
        $captcha = substr($md5_hash, 15,5);
     
        $_SESSION['captcha'] = $captcha;
     
        $width = 200;
        $height = 50;
     
        $image = ImageCreate($width,$height);
        // Colours
        $text1 = imagecolorallocate($image, rand(100,200), rand(50,100), rand(0,100));
        $text2 = imagecolorallocate($image,  rand(100,200), rand(50,100), rand(0,100));
        $text3 = imagecolorallocate($image,  rand(10,100), rand(0,255), rand(10,100));
        $text4 = imagecolorallocate($image,  rand(10,100), rand(0,255), rand(10,100));
        $textM = imagecolorallocate($image, rand(170,255), 69, rand(0,100));
        $bg = imagecolorallocate($image, rand(10,69), rand(0,69), rand(0,69));

        // Making Background
        imagefill($image, 0, 0, $bg);
     
        // Carving Text into the image
        $font= "res/custom/font.ttf";
        imagettftext($image, rand(15,30), rand(-5,20), rand(10,90), rand(25,60), $text3, $font, '~~~~~~~~~~~~~~~');
        imagettftext($image, rand(15,30), rand(-5,20), rand(10,90), rand(25,60), $text4, $font, '---------------');
        imagettftext($image, rand(20,26), rand(-5,16), rand(10,80), rand(40,50), $textM, $font, $captcha);
        imagettftext($image, rand(15,30), rand(-5,20), rand(10,90), rand(25,60), $text1, $font, '~~~~~~~~~~~~~~~');
        imagettftext($image, rand(5,15), rand(-5,20), rand(10,90), rand(25,60), $text2, $font, 'cccccccccccccc');
        imagettftext($image, rand(15,30), rand(-5,20), rand(10,90), rand(25,60), $textM, $font, '---------------');
        // Informing Browser there is a jpeg image file is coming
        header("Content-Type: image/jpeg");
     
        //Converting Image into JPEG
        imagejpeg($image);
        // Clearing Cache
        imagedestroy($image);
        exit;
    }

    public function  actionCaptcha1()
    {
        require_once  'res/geetest/lib/class.geetestlib.php';
        require_once 'res/geetest/config/config.php';
        $GtSdk = new GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
        session_start();
        $data = array(
                "user_id" => "test", # Идентификатор пользователя сайта
                "client_type" => "web", #Web: браузер на компьютере; h5: браузер на телефоне, включая полностью встроенный web_view в мобильном приложении; native: способ имплантации приложения через собственный SDK
                "ip_address" => "127.0.0.1" # Пожалуйста, перенесите IP-адрес, указанный при подтверждении запроса пользователя
            );
        $status = $GtSdk->pre_process($data, 1);
        $_SESSION['gtserver'] = $status;
        $_SESSION['user_id'] = $data['user_id'];
        echo $GtSdk->get_response_str();
        exit;
    }


}