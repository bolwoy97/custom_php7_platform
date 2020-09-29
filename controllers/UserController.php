<?php



class UserController
{
    
    public static $lng;
    function __construct(){
        self::$lng = Language::get();
    }

    public function actionLogin()
    {
        if (isset($_SESSION['userId'])){ 
            header("Location: /dashboard"); 
            exit;
        }

        if (isset($_POST['login'])) {
            foreach($_POST as $pst){
                if (strpbrk($pst, ' –<>’”.?/:^"*^\';&<>()') ) {
                    $errors[] = self::$lng['error15'];
                }
            }
            $login = $_POST['login'];
            $password = $_POST['password'];
            $errors = false;
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($login, $password);
            if ($userId == false  ) {
                    $errors[] = self::$lng['error22'];
            }else{
                $usr = User::getUserInfo($userId);
                if($usr['chPasHash']=='unprn'){
                  $errors[] = self::$lng['error23'];
                  Data::CustomMessagePage(self::$lng['txt194'],self::$lng['txt193']);
                  exit;
                }
                if($usr['ban_enter']== 1){
                    $errors[] = self::$lng['error24'];
                }
            }

           
            if($errors){
                $_SESSION['errors'] = $errors;
                header("Location: /login"); 
                exit;
            }
            if(!$errors) {
                Auth::logIn($userId,$usr);
                if($usr['chPasHash']!=''){
                    User::setVal($userId,'','chPasHash');               
                }
                UserService::normalize($usr);
                header("Location: /dashboard"); 
                return true;
            }
        }
        require_once(ROOT.'/views/user/login.php');
        return true;
    }

    public function actionRecover()
    {
        $page = '/recover';
        if (isset($_POST['email'])) {
            foreach($_POST as $pst){
                if (strpbrk($pst, ' –<>’”.?/:^"*^\';&<>()') ) {
                    $errors[] = self::$lng['error15'];
                }
            }
            
        $email = $_POST['email'];
        $errors = false;
        
        if (!User::checkEmail($email)) {
            $errors[] = self::$lng['error17'];

        }
        if (!User::checkEmailExists($email)) {
            $errors[] = self::$lng['error25'];
            
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /recover"); 
            exit;
        }
        $hash = User::forgetPas($email);
        //mail($email, "Восстановление пароля", "Восстановление пароля: http://balselek/chpas/".$hash);
        ////////////////////////////
        
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
      $emailTo = $email;
      $subject = self::$lng['txt195'];

      $body = self::$lng['txt196'].  
      "\n <a href='". $protocol.$_SERVER['HTTP_HOST'].'/chpas='.$hash."'>".self::$lng['txt197']."</a>. \n".self::$lng['txt198'];
      MailService::mail($emailTo, $subject, $body);
      Data::CustomMessagePage(self::$lng['txt199'],self::$lng['txt193']);
        return true;
                
            
        }
        
        require_once(ROOT.'/views/user/recover.php');
        return true;
    }

    public function actionRegister($login ='')
    {
        //echo "$login<br>";
        $sponsUser = User::getByLogin($login);
        $snum = $sponsUser['id'];
        if($snum > 0 && $sponsUser ){
            //echo $_SESSION['spons']." $snum test<br>";
            $spons = $snum;
            $_SESSION['spons'] = $snum;
            header("Location: /main"); 
            exit;
            /*if(isset($_SESSION['spons']) ){
            }else{
                setcookie('spons',$snum);
            }*/
            
            // header("Location: /main"); 
            // exit;
            /*if($redir!=''){
            }*/
        }else{
            if(isset($_SESSION['spons']) ){
                $spons = $_SESSION['spons'];
            }else{
                // $spons = 1;
                Data::CustomMessagePage('','Для регистрации необходима реферальная ссылка');
                return true;
            }
            
        }
        $sponsUser = User::getUserInfo($spons);

       // echo User::getUserInfo($_SESSION['spons'])['login'];exit;
        

        if (isset($_POST['email'])) {

            foreach($_POST as $pst){
                if (strpbrk($pst, ' –<>’”.?/:^"*^\';&<>()') ) {
                    $errors[] = self::$lng['error15'];
                }
            }
         

            $email = $_POST['email'];
            $logpart = explode('@',$email)[0];
            $lognum=0;
            $login = explode('@',$email)[0];
            while(User::checkLoginExists($login)){
                $lognum++;
                $login = $logpart.'_'.$lognum;
            } 
            $password = $_POST['password'];
            $errors = false;
           
            if (!User::checkEmail($email)) {
                $errors[] = self::$lng['error17'];
            }

            if (!ValidationService::endsWith($email, '@gmail.com')) {
                $errors[] = 'Неподдерживаемый почтовый сервис, рекомендуется использовать 
                 <a target="blank" href="https://www.google.com/intl/ru/gmail/about/">
                 Gmail (@gmail.com)</a>. ';
            }

            $check = User::checkPassword($password);
            if ($check) {
                foreach($check as $ch){
                $errors[] = $ch;
                }
                $check = false;
            }

            if ($password != $_POST['rpassword']) {
                $errors[] = self::$lng['error15'];
            }

           /* if ($_POST['pin'] != $_POST['rpin']) {
                $errors[] = 'Pincodes don`t match';
            }*/

            if (User::checkEmailExists($email)) {
                $errors[] = self::$lng['error18'];
            }

            if (!User::checkSponsorExists($sponsUser['login'])) {
                $errors[] = self::$lng['error20'];
            }

            if (!isset($_POST['terms'])) {
                $errors[] = self::$lng['error21'];
             }

             if($errors){
                $_SESSION['errors'] = $errors;
                header("Location: /register"); 
                exit;
            }
                //$sponsUser
                $dtime = date("Y-m-d H:i:s");
                $result = User::register($login,$email, password_hash($password, PASSWORD_DEFAULT),
                $sponsUser['id'] ,$dtime);

                $user = User::getByEmail($email);
                $id = $user['id'];

                //////////////////////////// 
                $emailTo = $email;
                $subject = self::$lng['txt200'];
                $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                $link = $protocol.$_SERVER['HTTP_HOST'].'/prov?us='.$id.'&apr='.md5(''.$dtime.''.$email);
             
                $body =self::$lng['txt188']." \n <a href='".
                $protocol.$_SERVER['HTTP_HOST'].'/prov?us='.$id.'&apr='.md5(''.$dtime.''.$email)."'>".self::$lng['txt189']."</a>
                 .\n ".self::$lng['txt190']."\n".self::$lng['txt191'];
                $mail = MailService::mail($emailTo, $subject, $body, 'logo');
               /* if(!$mail){
                    User::delete($id);
                    exit;
                }*/
                /////
                $data = array(
                    'api_secure_code'=>$GLOBALS['env']['api_secure_code'],
                    'user'=>$user,
                );
                $add_grid_user = PostService::send(
                    $GLOBALS['env'][ENV_TYPE]['yard_site'].'tools/DB_MergeController/add_grid_user', $data);
                    //echo $add_grid_user;exit;
                //////          

                Data::CustomMessagePage(self::$lng['txt192'],self::$lng['txt193']);
                return true;
            
        }

        require_once(ROOT.'/views/user/register.php');
        return true;
    }

    
    public function actionAprove()
    {
        //Log::add("Log call ".$_SERVER['REMOTE_ADDR'].' -- '.$_SERVER['HTTP_X_FORWARDED_FOR'].' -- '.$_SERVER['HTTP_USER_AGENT']);

        
        $id = intval($_GET['us']);
        $hash = $_GET['apr'];

        $usr = User::getUserInfo($id);
        $h = md5(''.$usr['date'].''.$usr['email']);
        if($usr['chPasHash']=='unprn' && $h == $hash){
            User::setVal($id,'','chPasHash');
          
            Data::CustomMessagePage(self::$lng['txt201'],self::$lng['txt193']);
            
        }else{
            echo "Incorrect activation data!<br>";
            
        }
        exit;
    }

    public function actionLogout()
    {
        //Auth::isLoged();
        session_unset();
        session_destroy();
        header("Location: /landing");
    }

    
    public function actionChpas($hash)
    {
        
        if (isset($_POST['password'])) {
        foreach($_POST as $pst){
            if (strpbrk($pst, ' –<>’”.?/:^"*^\';&<>()') ) {
                $errors[] = self::$lng['error15'];
            }
        }
        
            $chHash = $hash;
            $errors = false;
           
            $check = User::checkPassword($_POST['password']);
            if ($check) {
                foreach($check as $ch){
                $errors[] = $ch;
                }
                $check = false;
            }
        if ($_POST['password'] != $_POST['rpassword']) {
            $errors[] = self::$lng['error15'];
        }
        if (!User::checkHashExists($chHash)) {
            $errors[] = self::$lng['error26'];
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            require_once(ROOT . '/views/user/change_password.php');
            return true;
        }
        
           if( User::updatePass($chHash,password_hash($_POST['password'], PASSWORD_DEFAULT))){
            
            Data::CustomMessagePage(self::$lng['txt202'],self::$lng['txt193']);
            return true;
           }
        
      }
        require_once(ROOT . '/views/user/change_password.php');
        return true;
   
    }

    public function actionSet_contact()
    {
        //var_dump($_POST);exit;
        if($_POST['phone']){User::setVal($_SESSION['userId'],$_POST['phone'],'contact');}
        if($_POST['country']){
            $country = ['country'=>$_POST['country'],'country_long'=>$_POST['country_long']];
            User::setVal($_SESSION['userId'],serialize($country),'country');
        }
        header("Location: /login"); 
        return;
    }

    public function actionWithdraw_adr()
    {
        //var_dump($_POST);exit;
        $errors = false;
        $adrs = ['btc','eth','usdt','usd','payeer', 'qiwi', 'advcash'];
        foreach ($adrs as $key => $adr) {
            if($_POST['with_'.$adr]){
                $adress_exists = User::where('with_'.$adr.' = "'.$_POST['with_'.$adr].'"');
                if(count($adress_exists)>0){
                    $errors[] = 'Данный адрес '.strtoupper($adr).' уже занят';
                    continue;
                }else{
                    User::setVal($_SESSION['userId'],$_POST['with_'.$adr],'with_'.$adr);
                }
            }
        }
        if($errors){
            $_SESSION['errors'] = $errors;
            header("Location: /verification"); 
            return;
        }
        $_SESSION['success'] = "Data saved";
        header("Location: /verification"); 
        return;
    }

}
