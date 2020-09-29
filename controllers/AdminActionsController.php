<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';

class AdminActionsController
{
   
    public function actionUpdNews()
    {
            Auth::isLogedAdm();

            if(isset($_POST['deleteId'])){
                $new = News::get($_POST['deleteId']);
                if(file_exists(IMG_ROOT.$new['img'])) unlink(IMG_ROOT.$new['img']);
                News::delete($_POST['deleteId']);
            }
            if($_POST['id']=='new'){
                $fileName = '';
                    ///////////////
                    if(isset($_FILES['newsImage'])){
                        $upload = FileService::uploadImgFile($_FILES['newsImage'],'news-'.time(),3.5,'news');
                        if(!isset($upload['errors'])&&isset($upload['fileName'])){
                            $fileName = $upload['fileName'];
                        }else{
                            $errors = $upload['errors'];
                        }
                    }
                    $res = News::add($_POST['title'],$_POST['teaser'],$_POST['text'],$fileName);
                }else{
                    $new = News::get($_POST['id']);
                    $title = ($_POST['title']!='')?$_POST['title']:$new['title'];
                    $teaser = ($_POST['teaser']!='')?$_POST['teaser']:$new['teaser'];
                    $text = ($_POST['text']!='')?$_POST['text']:$new['text'];
                    $res = News::update($_POST['id'], $title,$teaser,$text);
                    ///////////////
                    if(isset($_FILES['newsImage'])){
                        $fileName = (file_exists(IMG_ROOT.$new['img']))? explode('.',$new['img'])[0] : 'news-'.time();
                        $upload = FileService::uploadImgFile($_FILES['newsImage'],$fileName,3.5,'news');
                        if(!isset($upload['errors'])&&isset($upload['fileName'])){
                            News::setVal($new['id'],$upload['fileName'],'img');
                        }else{
                            $errors = $upload['errors'];
                        }
                    }
                //////////////////
                }
                if($errors){
                    $_SESSION['errors'] = $errors;
                }
                header("Location: /adm_news"); 
                exit;
        
            return true;
    }

    public function actionConfirmWith()
    {
        Auth::isLogedAdm();
        $url_types = ['bon'=>'adm_orders','tok'=>'adm_sales','gridPay'=>'adm_gridpay','gr_bon'=>'adm_gr_orders'];
        $with = Withdrawal::get($_POST['id']);
        Withdrawal::setVal($with['id'],'confirmed','status');
        /* if($with['orig']=='tok'){
            $stage = Stage::get(Option::get('stage'));
            $percent = $stage['price']-($stage['price']/100*10);
            User::addVal($with['user'],$with['sum']*$percent,'bonus');
        }*/
        
        header("Location: /{$url_types[$with['orig']]}"); 
        exit;
    }

    public function actionCancelWith()
    {
        //var_dump($_POST);exit;
        Auth::isLogedAdm();
        $wall_types = ['bon'=>'bonus','tok'=>'TOKbalance','gridPay'=>'gridPay','gr_bon'=>'gr_bon'];
        $url_types = ['bon'=>'adm_orders','tok'=>'adm_sales','gridPay'=>'adm_gridpay','gr_bon'=>'adm_gr_orders'];
        $with = Withdrawal::get($_POST['id']);
        Withdrawal::setVal($_POST['id'],$_POST['coment'],'coment');
        Withdrawal::setVal($_POST['id'],'canceled','status');
        User::addVal($with['user'],$with['sum'],$wall_types[$with['orig']]);
        $dtime = date("Y-m-d H:i:s");
        
        
        header("Location: /{$url_types[$with['orig']]}"); 
        exit;
    }

    public function actionUpdprs($id)
    {
        Auth::isLogedAdm();

        $str = '';
        foreach($_POST as $key => $val){
            $str .= " $key => $val /";
        }
        Log::add("adm: id=>$id > ".$str);
           /////////////////////////////////////////////////////////////start edit
           $user = User::getUserInfo($id);
           $lng = Language::get();
           $errors = []; // Store all foreseen and unforseen errors here
           ///////
               if($_POST['name']){
                   if (!User::checkName($_POST['name'])) {
                       $errors[] = ''.$lng['error11'].'';
                   }
                   if (empty($errors))
                       User::setVal($id,$_POST['name'],'name');}
   
               if($_POST['lastname']){
                   if (!User::checkName($_POST['lastname'])) {
                       $errors[] = ''.$lng['error11'].'';
                   }
                   if (empty($errors))
                       User::setVal($id,$_POST['lastname'],'lastname');}
   
                //if($_POST['phone']){User::setVal($id,$_POST['phone'],'phone');}
                if($_POST['login']){
                    $check = User::checkLogin($_POST['login']);
                    if ($check) {
                        foreach($check as $ch){
                            $errors[] = $ch;
                        }
                        $check = false;
                    }
                    if (User::checkLoginExists($_POST['login'])) {
                        $errors[] = ''.$lng['error19'].'';
                    }
                    if (empty($errors))
                        User::setVal($id,$_POST['login'],'login');
                }

               if($_POST['email']){
                   if (!User::checkEmail($_POST['email'])) {
                       $errors[] = ''.$lng['error17'].'';
                   }
                   if (User::checkEmailExists($_POST['email'])) {
                       $errors[] = ''.$lng['error18'].'';
                   }
                   if (empty($errors))
                       User::setVal($id,$_POST['email'],'email');
               }
           
           ///////
               if($_POST['btc']){
                   if (empty($errors))
                       User::setVal($id,$_POST['btc'],'btcWith');}
               if($_POST['eth']){
                   if (empty($errors))
                       User::setVal($id,$_POST['eth'],'ethWith');}
               if($_POST['bch']){
                   if (empty($errors))
                       User::setVal($id,$_POST['bch'],'bchWith');}
               if($_POST['usd']){
                   if (empty($errors))
                       User::setVal($id,$_POST['usd'],'usdWith');}

                       ///////
               if($_POST['twit']){
                if (empty($errors))
                    User::setVal($id,$_POST['twit'],'twit');}
            if($_POST['fb']){
                if (empty($errors))
                    User::setVal($id,$_POST['fb'],'fb');}
            if($_POST['inst']){
                if (empty($errors))
                    User::setVal($id,$_POST['inst'],'inst');}
            if($_POST['vk']){
                if (empty($errors))
                    User::setVal($id,$_POST['vk'],'vk');}
            if($_POST['tg']){
                 if (empty($errors))
                User::setVal($id,$_POST['tg'],'tg');}

           ///////
           if (empty($errors)){
           if (isset($_POST['ch_ban_enter'])) {
                       User::setVal($id,$_POST['ban_enter']?1:0,'ban_enter');
                    }   
                
            if (isset($_POST['ch_ban_width'])) {
                    User::setVal($id,$_POST['ban_width']?1:0,'ban_width');
                 }  
            if (isset($_POST['ch_ban_deps'])) {
                User::setVal($id,$_POST['ban_deps']?1:0,'ban_deps');
             } 
            }
           ///////
            if (isset($_POST['adm_sum'])) {
                if (empty($errors)){
                    User::setVal($id,$_POST['adm_sum'],'balance');
                }
            }
            ///////
            if (isset($_POST['addition'])) {
                $dtime = date('Y-m-d H:i:s');//,strtotime($_POST['date']));
                //var_dump($dtime);exit;
                User::addVal($id,$_POST['sum'],'balance');
                Journal::add('adm_add',$id,$_POST['sum'],$dtime,"Addition",0,"complete",1,'usd', $_SESSION['userId'],'');   
                Log::add($id.' '. $_POST['date'].' usd '.$_POST['sum']."adm addition");
            }
            ///////
            if (isset($_POST['spons_login'])) {
                $spons = User::getByLogin($_POST['spons_login']);
                if (!$spons) {
                    $errors[] = 'No sponsor with such name!';
                }
                if ( $spons['id']<=0 || $id<=0) {
                    $errors[] = 'Wrong sponsor !';
                }
                /*if($user['persTurnover']==0 && $user['teamTurnover']==0 && $user['invProfit']==0 && 
                                $user['refProfit']==0  && $user['totalWith']==0 && 
                                $user['totalBon']==0 ){}else{
                                    $errors[] = 'User already has actions!';
                                }*/
                                    
                if (empty($errors)){
                    User::setVal($id,$spons['id'],'sponsor');
                }
            }
            ///////
            if (isset($_POST['activate'])) {
                if (empty($errors)){
                    User::setVal($id,'','chPasHash');
                }
            }
        ///////
           if (isset($_POST['chPin'])) {
              
               /*if ($_POST['new'] != $_POST['rnew']) {
                   $errors[] = ''.$lng['error15'].'';
               }*/
               if (empty($errors)){
                   User::setVal($id,$_POST['chPin'],'pin');
               }
           }
           ///////
          
           if(isset($_FILES['userImage'])){
               if($_FILES['userImage']['size']>0) {
                   $currentDir = getcwd();
                   $uploadDirectory = IMG_ROOT;
                   $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
                   $fileName = $_FILES['userImage']['name'];
                   $fileSize = $_FILES['userImage']['size'];
                   $fileTmpName  = $_FILES['userImage']['tmp_name'];
                   $fileType = $_FILES['userImage']['type'];
                   $v = explode('.',$fileName);
                   $fileExtension = strtolower(end($v));
                   $fileName = 'user'.$id.'.'.$fileExtension;
                   $uploadPath =  $uploadDirectory . basename($fileName); 
                   if (! in_array($fileExtension,$fileExtensions)) {
                       $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
                   }
                   if ($fileSize > 100000) {
                       $errors[] = "This file is more than 100KB. It has to be less than or equal to 0.5MB";
                   }
                   if (empty($errors)) {
                       if(file_exists(IMG_ROOT.$user['img'])) unlink(IMG_ROOT.$user['img']);
                       $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
   
                       if ($didUpload) {
                        //echo "The file " . basename($fileName) . " has been uploaded";
                       User::setVal($id,$fileName,'img');
                       //$_SESSION['user']['img'] = $fileName;
                       } else {
                           echo "An error occurred somewhere. Try again or contact the admin";
                       }
                   }
               }
           }
   
           /////////////////////////////////////////////////////////////end edit
        if($errors){
            $_SESSION['errors'] = $errors;
        }
        ///////
        header("Location: /adm_user-$id"); 
        exit;
    }

    public function actionSetbonus()
    {
        //var_dump($_POST);exit;
        Auth::isLogedAdm();

        $str = '';
        foreach($_POST as $key => $val){
            $str .= " $key => $val /";
        }
        Log::add(" adm: Setbonus > ".$str);
        
        if(isset($_POST['price']) && $_POST['price']>0 && floatval($_POST['price'])>=0){
            Option::set('bonPrice', $_POST['price']);
        }
        if(isset($_POST['amount']) && $_POST['amount']){
            Option::set('bonAmount', $_POST['amount']);
        }
        if( isset($_POST['status']) && $_POST['status']!=''){
           Option::set('bonStatus', $_POST['status']);
        }

        if( isset($_POST['bonOneHand']) && $_POST['bonOneHand']!='' && floatval($_POST['bonOneHand'])>0){
            Option::set('bonOneHand', $_POST['bonOneHand']);
            User::setValForAll($_POST['bonOneHand'],'bonOneHand');
          
        }
        
        header("Location: /adm_bonus"); 
        exit;
    }

    public function actionSet_tok2()  //holders
    {
        //var_dump($_POST);exit;
        Auth::isLogedAdm();

       /* $str = '';
        foreach($_POST as $key => $val){
            $str .= " $key => $val /";
        }
        Log::add(" adm: Set_tok2 > ".$str);

        if(isset($_POST['tok2_price']) && $_POST['tok2_price']>0 && floatval($_POST['tok2_price'])>0){
            Option::set('tok2_price', $_POST['tok2_price']);
        }
        if(isset($_POST['tok2_goal']) && $_POST['tok2_goal']>0 && floatval($_POST['tok2_goal'])>0){
            Option::set('tok2_goal', $_POST['tok2_goal']);
        }
        if( isset($_POST['tok2OneHand']) && $_POST['tok2OneHand']!='' && floatval($_POST['tok2OneHand'])>0){
            Option::set('tok2OneHand', $_POST['tok2OneHand']);
            User::setValForAll($_POST['tok2OneHand'],'tok2OneHand');
        }*/

        header("Location: /adm_tok2"); 
        exit;
    }

    public function actionRef_prog_set()
    {
        //var_dump($_POST);exit;
        Auth::isLogedAdm();

        $str = '';
        foreach($_POST as $key => $val){
            $str .= " $key => $val /";
        }
        Log::add(" adm: Ref_prog_set > ".$str);
        
        $dtime = date("Y-m-d H:i:s");
        if($_POST['start']){
            Ref_prog::addFromArray(['start'=>$_POST['start'],
                'end'=>$_POST['end'],
                'rates'=>serialize($_POST['rates']),
                'rewards'=>serialize($_POST['rewards']),
                'real_start'=>$dtime
            ]);
            User::setValForAll(0,'ref_prog_max');
            User::setValForAll(0,'ref_prog_sum');
        }
        if($_POST['abort']==1){
            $cur_prog = Ref_progService::getCurrent_adm();
            Ref_prog::setVal($cur_prog['id'], $dtime, 'real_end');
        }

        header("Location: /adm_ref_prog"); 
        exit;
    }

    public function actionSet_opt()
    {
        //var_dump($_POST);exit;
        Auth::isLogedAdm();
        if($_POST['max_with']){
            Option::set('max_with',$_POST['max_with']);
        }
        header("Location: /tw_admin"); 
        exit;
    }

    public function actionPartner_prog_set()
    {
        //var_dump($_POST);exit;
        Auth::isLogedAdm();

        $str = '';
        foreach($_POST as $key => $val){
            $str .= " $key => $val /";
        }
        Log::add(" adm: Partner_prog_set > ".$str);
        
        $dtime = date("Y-m-d H:i:s");
        if($_POST['start']){
            Partner_prog::addFromArray(['start'=>$_POST['start'],
                'end'=>$_POST['end'],
                'real_start'=>$dtime
            ]);
            //User::setValForAll(0,'partner_prog_sum');
        }
        if($_POST['abort']==1){
            $cur_prog = Partner_progService::getCurrent_adm();
            Partner_prog::setVal($cur_prog['id'], $dtime, 'real_end');
        }
        if($_POST['bonus']==1){
            $cur_prog = Partner_progService::getCurrent_adm();
            $user = User::getByLogin($_POST['login']);
            $errors = false;
            if(!$user){
                $errors[] = 'Wrong user!';
            }
            if($_POST['sum']<=0){
                $errors[] = 'Wrong sum!';
            }
            if($errors){
                $_SESSION['errors'] = $errors;
                header("Location: /adm_partner_prog"); exit;
            }
            User::addVal($user['id'],$_POST['sum'],'balance');
            Journal::add('partner_prog_bon',$user['id'],$_POST['sum'],$dtime,"Бонусное начисление",0,"complete",1,'usd','',''.$cur_prog['id']);   
        }

        header("Location: /adm_partner_prog"); 
        exit;
    }


}
