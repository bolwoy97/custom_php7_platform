<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';

class VerificationController
{
    public function actionSubmit()
    {
        header("Access-Control-Allow-Origin: * ");
        //var_dump($_FILES);exit;
        Auth::isLoged();
        $post_fields = Verification::validate($_POST);
        if(!$post_fields || !isset($_FILES) || !isset($_SESSION['userId'])){
            Log::add('verif error pst id='.$_SESSION['userId'].' - '.implode("|",$_POST));
            $_SESSION['errors'] = ['Invalid verification data'];
            header("Location: /verification");exit;}
        Verification::createIfNotExists();
        $verification = Verification::getBy('user',$_SESSION['userId']);
        $disable_statuses = ['pending', 'confirmed'];
        if(in_array($verification['status'],$disable_statuses)){
            $_SESSION['errors']= ['Verification already pending!'];
            header("Location: /verification");exit;}

        $images = array('doc_img', 'bill_img');
        foreach ($images as $img) {

            if(isset($_FILES[$img]) && $_FILES[$img]['size']>0 && $_FILES[$img]['error']==0 ){
                /*$fileName = (file_exists(IMG_ROOT.$verification[$img])
                &&$verification[$img]!='')? explode('.',$verification[$img])[0] : "$img-".$_SESSION['userId'].'-'.time();
                */
                $row = Image::where(" name = '{$verification[$img]}' ")[0];
                if($row){
                    $fileName = $verification[$img];
                }else{
                    $fileName = "$img-".$_SESSION['userId'].'-'.time();
                }
                try{
                    $upload = FileService::uploadImgMysql($_FILES[$img],$fileName,2,'verification');
                }catch(Exception $ex){
                    Log::add('catch verif error img id='.$_SESSION['userId'].' - '.$ex.' - '.implode("|",$ex));
                    $_SESSION['errors']= ['Invalid verification images'];
                    header("Location: /verification");exit;
                }
                if(!isset($upload['errors'])&&isset($upload['fileName'])){
                    $fileName = $upload['fileName'];
                }else{
                    $_SESSION['errors'] = $upload['errors'];
                    header("Location: /verification");exit;
                    
                }
                $post_fields[$img] = $fileName;
            }else{
                Log::add('verif error img id='.$_SESSION['userId'].' - '.implode("|",$_FILES['doc_img']).' - '.implode("|",$_FILES['bill_img']));
                $_SESSION['errors']= ['Invalid verification images'];
                header("Location: /verification");exit;
            }
        }
        $post_fields['user'] = $_SESSION['userId'];
        $post_fields['status'] = 'pending';
        if($verification){
            //var_dump($post_fields);exit;
            Verification::updateBy('user',$_SESSION['userId'],$post_fields);
            $_SESSION['success']= 'Verification data updated';
        }else{
            Verification::add($post_fields);
            $_SESSION['success']= 'Verification data submited';
        }
        header("Location: /verification");exit;
    }

    public function actionPage()
    {
        header("Access-Control-Allow-Origin: * ");
        Auth::isLoged();
        $user = User::getUserInfo($_SESSION['userId']);
        $Ver = Verification::getBy('user',$_SESSION['userId']);
        require_once(ROOT.'/views/site/verification.php');
        return true;
    }


}